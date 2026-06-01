<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FundRequest;
use App\Models\Passbook;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class FundRequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('Super Admin')) {
            $requests = FundRequest::with('user')->latest()->get();
        } else {
            $requests = FundRequest::where('user_id', $user->id)->latest()->get();
        }
        $setting = Setting::first();
        
        return view('funds.index', compact('requests', 'user', 'setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_mode' => 'required|string',
            'transaction_id' => 'nullable|string',
        ]);

        FundRequest::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'payment_mode' => $request->payment_mode,
            'transaction_id' => $request->transaction_id,
            'status' => 'Pending'
        ]);

        return redirect()->back()->with('success', 'Fund request submitted successfully.');
    }

    public function approve(Request $request, $id)
    {
        $fundRequest = FundRequest::findOrFail($id);
        
        if ($fundRequest->status !== 'Pending') {
            return redirect()->back()->with('error', 'Request already processed.');
        }

        $fundRequest->status = 'Approved';
        $fundRequest->save();

        $user = $fundRequest->user;
        $user->wallet_balance += $fundRequest->amount;
        $user->save();

        // Log the transaction in the passbook
        Passbook::addTransaction(
            $user->id,
            'Fund request approved (ID: ' . $fundRequest->id . ')',
            'CR',
            $fundRequest->amount
        );

        return redirect()->back()->with('success', 'Fund request approved. Wallet credited.');
    }

    public function reject(Request $request, $id)
    {
        $fundRequest = FundRequest::findOrFail($id);
        
        if ($fundRequest->status !== 'Pending') {
            return redirect()->back()->with('error', 'Request already processed.');
        }

        $fundRequest->status = 'Rejected';
        $fundRequest->save();

        return redirect()->back()->with('success', 'Fund request rejected.');
    }
}
