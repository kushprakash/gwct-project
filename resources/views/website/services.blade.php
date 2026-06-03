@extends('layouts.website')

@section('content')
<section class="page-hero" style="margin-top: -23px;background: linear-gradient(135deg, #1e3a5f 0%, #1b7e3a 100%); color:white; padding: 70px 0 50px; text-align:center;">
    <div class="container">
        <h1 style="font-size:42px; font-weight:900; margin-bottom:12px;">Our Services</h1>
        <p style="font-size:18px; opacity:0.9;">हमारी सेवाएं — ग्रामीण भारत के लिए</p>
        <nav style="margin-top:16px; font-size:14px; opacity:0.75;">
            <a href="{{ route('website.home') }}" style="color:#ffde59; text-decoration:none;">Home</a>
            <span style="margin:0 8px;">›</span> Services
        </nav>
    </div>
</section>

<section style="padding:70px 0; background:#fff;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <span style="color:#1b7e3a; font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:13px;">What We Offer</span>
            <h2 style="font-size:34px; font-weight:900; color:#1e3a5f; margin-top:10px;">Services for Rural Communities</h2>
        </div>
        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:28px;">
            @foreach([
                ['fas fa-id-card','Health Card','Comprehensive health card providing access to medical benefits and healthcare services at partner hospitals.','#e74c3c'],
                ['fas fa-fingerprint','AEPS Services','Aadhaar Enabled Payment System — withdraw cash, deposit, and transfer money using just your fingerprint.','#3498db'],
                ['fas fa-exchange-alt','Money Transfer','Send money safely to any bank account in India with minimal charges and instant confirmation.','#9b59b6'],
                ['fas fa-hand-holding-usd','Loan Services','Personal, Business, and Group loans with quick approval and flexible repayment terms.','#e67e22'],
                ['fas fa-graduation-cap','Education Support','Educational support programs for rural children — scholarships, books, and mentorship.','#1b7e3a'],
                ['fas fa-users','Social Work','Community development programs including women empowerment and health awareness camps.','#1e3a5f'],
            ] as [$icon, $title, $desc, $color])
            <div style="background:#f8fffe; border-radius:14px; padding:35px 25px; text-align:center; box-shadow:0 3px 15px rgba(0,0,0,0.07); transition:all 0.3s; border-bottom:4px solid {{ $color }};">
                <div style="width:70px; height:70px; background:{{ $color }}; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; font-size:28px; color:white;">
                    <i class="{{ $icon }}"></i>
                </div>
                <h3 style="font-size:19px; font-weight:800; color:#1e3a5f; margin-bottom:12px;">{{ $title }}</h3>
                <p style="color:#666; line-height:1.7; font-size:14px;">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section style="padding:60px 0; background:linear-gradient(135deg,#1b7e3a,#1e3a5f); color:white; text-align:center;">
    <div class="container">
        <h2 style="font-size:32px; font-weight:900; margin-bottom:15px;">Ready to Get Started?</h2>
        <p style="font-size:17px; opacity:0.9; margin-bottom:30px;">Join thousands of families already benefiting from GWCT services</p>
        <a href="{{ route('website.apply') }}" style="background:#ffde59; color:#1e3a5f; padding:14px 35px; border-radius:30px; font-weight:800; text-decoration:none; font-size:15px; display:inline-block;">
            Apply Now <i class="fas fa-arrow-right" style="margin-left:8px;"></i>
        </a>
    </div>
</section>
@endsection
