<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\State;
use App\Models\Passbook;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Assuming we use simple-qrcode for QR generation

class ChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:child-list|child-create|child-edit|child-delete', ['only' => ['index','show']]);
        $this->middleware('permission:child-create', ['only' => ['create','store']]);
        $this->middleware('permission:child-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:child-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $children = Child::with('user')->latest()->paginate(15);
        return view('children.index', compact('children'));
    }

    public function create()
    {
        $states = State::where('status', 1)->get();
        return view('children.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female',
            'parent_name' => 'required|string|max:255',
            'parent_mobile' => 'required|string',
            'parent_aadhaar' => 'nullable|string',
            'state_id' => 'required|exists:states,id',
            'district_id' => 'required|exists:districts,id',
            'block_id' => 'required|exists:blocks,id',
            'panchayat_id' => 'required|exists:panchayats,id',
            'village_id' => 'required|exists:villages,id',
            'address' => 'nullable|string',
            'child_photo' => 'required|image|max:2048',
            'aadhaar_photo' => 'required|image|max:2048',
            'birth_certificate_photo' => 'required|image|max:2048',
        ]);

        $dob = Carbon::parse($request->dob);
        $age = $dob->age;

        if($age > 15) {
            return back()->withInput()->with('error', 'Child must be 15 years old or younger.');
        }

        $fee = ($age <= 10) ? 500 : 1000;
        $user = Auth::user();

        // Check if user has sufficient wallet balance
        if ($user->wallet_balance < $fee) {
            return back()->withInput()->with('error', 'Insufficient wallet balance. You need ₹' . $fee . ' to register this child.');
        }

        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            // Deduct from wallet immediately
            $user->wallet_balance -= $fee;
            $user->save();

            // Log passbook transaction
            Passbook::addTransaction(
                $user->id,
                'Child registration fee deducted',
                'DR',
                $fee
            );

            // Exclude files from the array passed to model constructor
            $childData = collect($validated)->except(['child_photo', 'aadhaar_photo', 'birth_certificate_photo'])->toArray();
            
            $child = new Child($childData);
            $child->user_id = $user->id;
            $child->registration_no = 'GWCT-CH-'.time().rand(10,99);
            $child->age_at_registration = $age;
            $child->registration_fee = $fee;

            if ($request->hasFile('child_photo')) $child->child_photo = $request->file('child_photo')->store('children/photos', 'public');
            if ($request->hasFile('aadhaar_photo')) $child->aadhaar_photo = $request->file('aadhaar_photo')->store('children/aadhaar', 'public');
            if ($request->hasFile('birth_certificate_photo')) $child->birth_certificate_photo = $request->file('birth_certificate_photo')->store('children/birth_certificates', 'public');

            $child->save();

            // Generate QR Code and save it
            $qrCodeName = 'qr_' . $child->id . '_' . time() . '.svg';
            $qrPath = 'public/children/qrcodes/' . $qrCodeName;
            
            $absolutePath = storage_path('app/public/children/qrcodes');
            if (!\Illuminate\Support\Facades\File::exists($absolutePath)) {
                \Illuminate\Support\Facades\File::makeDirectory($absolutePath, 0755, true);
            }
            
            $qrContent = "GWCT Child: " . $child->name . " | Reg: " . $child->registration_no . " | Verify: " . route('children.show', $child->id);
            QrCode::format('svg')->size(200)->generate($qrContent, storage_path('app/' . $qrPath));
            
            $child->qr_code = 'children/qrcodes/' . $qrCodeName;
            $child->save();

            \Illuminate\Support\Facades\DB::commit();

            return redirect()->route('children.show', $child->id)->with('success', 'Child registered successfully. ₹' . $fee . ' deducted from your wallet.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            return back()->withInput()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }

    public function show(Request $request, Child $child)
    {
        $setting = Setting::first();
        if ($request->has('download') && $request->download == 'pdf') {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('children.bond_pdf', compact('child', 'setting'));
            return $pdf->download('GWCT_Bond_' . $child->registration_no . '.pdf');
        }
        return view('children.bond', compact('child', 'setting'));
    }
}
