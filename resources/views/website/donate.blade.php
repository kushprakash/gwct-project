@extends('layouts.website')

@section('content')
{{-- ===== Hero Banner ===== --}}
<section style="margin-top: -23px; background: linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%); color:white; padding: 70px 0 50px; text-align:center;">
    <div class="container">
        <div style="display:inline-flex; align-items:center; justify-content:center; width:70px; height:70px; background:rgba(255,255,255,0.15); border-radius:50%; font-size:28px; margin-bottom:18px;">
            <i class="fas fa-heart"></i>
        </div>
        <h1 style="font-size:42px; font-weight:900; margin-bottom:12px;">Support Our Mission</h1>
        <p style="font-size:18px; opacity:0.88;">दान करें — आपका एक छोटा योगदान किसी का जीवन बदल सकता है</p>
        <nav style="margin-top:16px; font-size:14px; opacity:0.7;">
            <a href="{{ route('website.home') }}" style="color:#ffde59; text-decoration:none;">Home</a>
            <span style="margin:0 8px;">›</span> Donate
        </nav>
    </div>
</section>

<section style="padding:60px 0; background:#f8fffe;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1.1fr; gap:50px; align-items:start;">
            
            {{-- Left Side: Bank Account & Payment Details --}}
            <div>
                <span style="color:#1b7e3a; font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:13px;">Step 1: Make Payment</span>
                <h2 style="font-size:30px; font-weight:900; color:#1e3a5f; margin:10px 0 20px;">Official Bank & QR Details</h2>
                <p style="color:#555; line-height:1.7; margin-bottom:30px;">You can scan our QR code or make a direct transfer to our verified bank account. Once completed, please fill in the payment details form on the right.</p>

                <!-- Bank Card -->
                <div style="background:white; border-radius:16px; padding:30px; box-shadow:0 8px 30px rgba(0,0,0,0.06); border-left:5px solid #1b7e3a; margin-bottom:30px;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:20px;">
                        <div style="width:45px; height:45px; background:#e8f5e9; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:22px; color:#1b7e3a;">
                            <i class="fas fa-university"></i>
                        </div>
                        <h3 style="font-size:18px; font-weight:800; color:#1e3a5f; margin:0;">Bank Account Details</h3>
                    </div>
                    
                    <table style="width:100%; border-collapse:collapse; font-size:14px;">
                        @foreach([
                            ['Trust Name', 'Gramin Welfare Charitable Trust'],
                            ['Bank Name', 'State Bank of India (SBI)'],
                            ['Account No.', '401234567890'],
                            ['IFSC Code', 'SBIN0001234'],
                            ['Branch', 'Patna Main Branch'],
                            ['Account Type', 'Current Account'],
                            ['UPI ID', 'gwct@ybl']
                        ] as [$label, $val])
                        <tr style="border-bottom:1px solid #f1f5f9;">
                            <td style="padding:12px 0; color:#666; font-weight:600;">{{ $label }}</td>
                            <td style="padding:12px 0; color:#1e3a5f; font-weight:700; text-align:right;">{{ $val }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>

           
            </div>

            {{-- Right Side: Payment Verification Form --}}
            <div style="background:white; border-radius:20px; padding:40px; box-shadow:0 12px 40px rgba(0,0,0,0.08);">
                <div style="text-align:center; margin-bottom:30px;">
                    <span style="color:#1b7e3a; font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:12px;">Step 2: Submit Proof</span>
                    <h3 style="font-size:22px; font-weight:800; color:#1e3a5f; margin-top:5px;">Verify Your Payment</h3>
                    <p style="color:#777; font-size:13px; margin-top:4px;">Fill details below so we can track and verify your donation</p>
                </div>

                @if(session('success'))
                <div style="background:#e6f9ed; border-left:4px solid #2ecc71; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px; display:flex; align-items:center; gap:10px; font-size:14px; font-weight:600;">
                    <i class="fas fa-check-circle" style="color:#2ecc71;"></i> {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('website.donate.post') }}" style="display:flex; flex-direction:column; gap:18px;">
                    @csrf

                    <div>
                        <label style="font-size:13px; font-weight:700; color:#555; display:block; margin-bottom:5px;">Donor Name <span style="color:red;">*</span></label>
                        <input type="text" name="donor_name" value="{{ old('donor_name') }}" required placeholder="Enter your full name"
                            style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; transition:border-color 0.3s; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                        @error('donor_name')<small style="color:red; font-size:11px;">{{ $message }}</small>@enderror
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div>
                            <label style="font-size:13px; font-weight:700; color:#555; display:block; margin-bottom:5px;">Mobile Number <span style="color:red;">*</span></label>
                            <input type="tel" name="donor_phone" value="{{ old('donor_phone') }}" required placeholder="10-digit mobile"
                                style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; box-sizing:border-box;"
                                onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                            @error('donor_phone')<small style="color:red; font-size:11px;">{{ $message }}</small>@enderror
                        </div>
                        <div>
                            <label style="font-size:13px; font-weight:700; color:#555; display:block; margin-bottom:5px;">Donation Amount (INR) <span style="color:red;">*</span></label>
                            <input type="number" name="amount" value="{{ old('amount') }}" required min="1" placeholder="₹ Amount"
                                style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; box-sizing:border-box;"
                                onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                            @error('amount')<small style="color:red; font-size:11px;">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div>
                            <label style="font-size:13px; font-weight:700; color:#555; display:block; margin-bottom:5px;">Payment Mode <span style="color:red;">*</span></label>
                            <select name="payment_mode" required
                                style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; background:white; box-sizing:border-box;">
                                <option value="">-- Select --</option>
                                <option {{ old('payment_mode')=='Google Pay'?'selected':'' }}>Google Pay</option>
                                <option {{ old('payment_mode')=='PhonePe'?'selected':'' }}>PhonePe</option>
                                <option {{ old('payment_mode')=='Paytm'?'selected':'' }}>Paytm</option>
                                <option {{ old('payment_mode')=='Bank Transfer'?'selected':'' }}>Bank Transfer</option>
                                <option {{ old('payment_mode')=='UPI / Other App'?'selected':'' }}>UPI / Other App</option>
                            </select>
                            @error('payment_mode')<small style="color:red; font-size:11px;">{{ $message }}</small>@enderror
                        </div>
                        <div>
                            <label style="font-size:13px; font-weight:700; color:#555; display:block; margin-bottom:5px;">Transaction ID / UTR <span style="color:red;">*</span></label>
                            <input type="text" name="transaction_id" value="{{ old('transaction_id') }}" required placeholder="e.g. 238210398..."
                                style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; box-sizing:border-box;"
                                onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                            @error('transaction_id')<small style="color:red; font-size:11px;">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <div>
                        <label style="font-size:13px; font-weight:700; color:#555; display:block; margin-bottom:5px;">Remarks (Optional)</label>
                        <textarea name="remarks" rows="3" placeholder="Any comments or special instructions..."
                            style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; resize:vertical; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">{{ old('remarks') }}</textarea>
                        @error('remarks')<small style="color:red; font-size:11px;">{{ $message }}</small>@enderror
                    </div>

                    <button type="submit"
                        style="background:linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%); color:white; border:none; padding:13px; border-radius:10px; font-weight:700; font-size:15px; cursor:pointer; transition:all 0.3s; box-shadow:0 4px 15px rgba(27,126,58,0.25); display:flex; align-items:center; justify-content:center; gap:8px;">
                        Submit Payment Proof <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<section style="padding:50px 0; background:white; text-align:center;">
    <div class="container">
        <h4 style="font-size:16px; font-weight:800; color:#1e3a5f; margin-bottom:10px;"><i class="fas fa-shield-alt" style="color:#1b7e3a; margin-right:8px;"></i>80G Tax Exemption Benefit</h4>
        <p style="color:#666; max-width:700px; margin:0 auto; font-size:13px; line-height:1.6;">All donations made to Gramin Welfare Charitable Trust are eligible for tax deductions under Section 80G of the Income Tax Act. A verified digital receipt will be emailed and issued to you once the transaction is validated by our accounts team.</p>
    </div>
</section>
@endsection
