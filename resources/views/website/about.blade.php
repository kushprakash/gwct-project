@extends('layouts.website')

@section('content')
<section class="page-hero" style="margin-top: -23px;background: linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%); color:white; padding: 70px 0 50px; text-align:center;">
    <div class="container">
        <h1 style="font-size:42px; font-weight:900; margin-bottom:12px;">About Us</h1>
        <p style="font-size:18px; opacity:0.9;">ग्रामीण विकास एवं कल्याण ट्रस्ट (GWCT) के बारे में</p>
        <nav style="margin-top:16px; font-size:14px; opacity:0.75;">
            <a href="{{ route('website.home') }}" style="color:#ffde59; text-decoration:none;">Home</a>
            <span style="margin:0 8px;">›</span> About Us
        </nav>
    </div>
</section>

<section style="padding: 70px 0; background:#fff;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; align-items:center;">
            <div>
                <span style="color:#1b7e3a; font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:13px;">Our Story</span>
                <h2 style="font-size:34px; font-weight:900; color:#1e3a5f; margin:10px 0 20px;">Empowering Rural India Since Inception</h2>
                <p style="color:#555; line-height:1.8; margin-bottom:15px;">Gramin Welfare Charitable Trust (GWCT) is a registered NGO dedicated to the upliftment of rural communities across India. We work tirelessly to bridge the gap between urban opportunities and rural realities.</p>
                <p style="color:#555; line-height:1.8; margin-bottom:25px;">Our trust focuses on education, health, financial inclusion, child welfare, and skill development — empowering every individual to lead a dignified life.</p>
                <div style="display:flex; gap:30px; flex-wrap:wrap;">
                    <div style="text-align:center;">
                        <div style="font-size:36px; font-weight:900; color:#1b7e3a;">5000+</div>
                        <div style="color:#666; font-size:13px;">Families Impacted</div>
                    </div>
                    <div style="text-align:center;">
                        <div style="font-size:36px; font-weight:900; color:#1b7e3a;">100+</div>
                        <div style="color:#666; font-size:13px;">Villages Covered</div>
                    </div>
                    <div style="text-align:center;">
                        <div style="font-size:36px; font-weight:900; color:#1b7e3a;">50+</div>
                        <div style="color:#666; font-size:13px;">Active Programs</div>
                    </div>
                </div>
            </div>
            <div style="background: linear-gradient(135deg,#f0f8f4,#e8f5e9); border-radius:16px; padding:40px; text-align:center;">
                <img src="{{ asset('assets/images/icon.jpg') }}" alt="GWCT Logo" style="width:120px; height:120px; border-radius:50%; object-fit:cover; box-shadow:0 8px 25px rgba(27,126,58,0.3); margin-bottom:20px;">
                <h3 style="color:#1b7e3a; font-size:22px; font-weight:800;">Gramin Welfare Charitable Trust</h3>
                <p style="color:#555; font-size:14px; margin-top:10px;">NGO Registered | ISO Certified | Audit Verified</p>
                <div style="margin-top:20px; padding:15px; background:#1b7e3a; border-radius:10px; color:white;">
                    <i class="fas fa-phone"></i> +91 9102132444<br>
                    <i class="fas fa-envelope" style="margin-top:8px;"></i> graminwelfare12@gmail.com
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding:60px 0; background:#f8fffe;">
    <div class="container">
        <h2 style="text-align:center; font-size:32px; font-weight:900; color:#1e3a5f; margin-bottom:40px;">Our Mission & Vision</h2>
        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:25px;">
            @foreach([
                ['fas fa-bullseye','Mission','To empower rural communities through education, health, and financial services, creating self-reliant villages across India.'],
                ['fas fa-eye','Vision','A rural India where every individual has equal access to opportunities, healthcare, and dignified living.'],
                ['fas fa-gem','Values','Integrity, Transparency, Community-first approach, and unwavering commitment to social justice.']
            ] as [$icon, $title, $text])
            <div style="background:white; border-radius:14px; padding:35px 25px; text-align:center; box-shadow:0 4px 20px rgba(0,0,0,0.08); border-top:4px solid #1b7e3a;">
                <div style="width:65px; height:65px; background:linear-gradient(135deg,#1b7e3a,#2ecc71); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; font-size:26px; color:white;">
                    <i class="{{ $icon }}"></i>
                </div>
                <h3 style="font-size:20px; font-weight:800; color:#1e3a5f; margin-bottom:12px;">{{ $title }}</h3>
                <p style="color:#666; line-height:1.7; font-size:14px;">{{ $text }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
