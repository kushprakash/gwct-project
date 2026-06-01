<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\ChildRenewal;
use Illuminate\Support\Facades\Auth;

class ChildRenewalController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:renewal-list|renewal-create|renewal-edit|renewal-delete', ['only' => ['index','show']]);
        $this->middleware('permission:renewal-create', ['only' => ['create','store']]);
        $this->middleware('permission:renewal-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:renewal-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $renewals = ChildRenewal::with(['child', 'child.user'])->latest()->paginate(15);
        return view('renewals.index', compact('renewals'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'registration_no' => 'required|string',
        ]);

        $child = Child::where('registration_no', $request->registration_no)->first();
        
        if (!$child) {
            return redirect()->back()->with('error', 'Child with Registration No. ' . $request->registration_no . ' not found.');
        }

        return view('renewals.create', compact('child'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'amount' => 'required|numeric|min:1',
            'renewal_year' => 'required|integer|min:2024',
            'payment_mode' => 'required|string',
        ]);

        $child = Child::findOrFail($request->child_id);
        $amount = 500; // Fixed amount

        // Check wallet balance
        $currentBalance = \App\Models\Passbook::getAvailableBalance(Auth::id());
        if ($currentBalance < $amount) {
            return back()->with('error', 'Insufficient wallet balance for renewal.');
        }

        // Deduct from wallet
        \App\Models\Passbook::addTransaction(
            Auth::id(),
            "Renewal Fee for " . $child->name . " (" . $child->registration_no . ")",
            'DR',
            $amount
        );

        $renewal = new ChildRenewal();
        $renewal->child_id = $child->id;
        $renewal->user_id = Auth::id(); // The user collecting the payment
        $renewal->amount = $amount;
        $renewal->renewal_year = $request->renewal_year;
        $renewal->payment_mode = 'Wallet Deduction';
        $renewal->receipt_no = 'GWCT-RN-' . time() . rand(10, 99);
        $renewal->save();

        return redirect()->route('renewals.show', $renewal->id)->with('success', 'Renewal payment collected successfully.');
    }

    public function show(Request $request, ChildRenewal $renewal)
    {
        if ($request->has('download') && $request->download == 'pdf') {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('renewals.receipt_pdf', compact('renewal'));
            return $pdf->download('GWCT_Receipt_' . $renewal->receipt_no . '.pdf');
        }
        return view('renewals.show', compact('renewal'));
    }
}
