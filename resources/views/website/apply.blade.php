@extends('layouts.website')

@section('content')
<section style="margin-top: -23px;background: linear-gradient(135deg, #1e3a5f 0%, #1b7e3a 100%); color:white; padding: 70px 0 50px; text-align:center;">
    <div class="container">
        <h1 style="font-size:42px; font-weight:900; margin-bottom:12px;">Apply Now</h1>
        <p style="font-size:18px; opacity:0.9;">GWCT के साथ जुड़ें — आवेदन करें</p>
        <nav style="margin-top:16px; font-size:14px; opacity:0.75;">
            <a href="{{ route('website.home') }}" style="color:#ffde59; text-decoration:none;">Home</a>
            <span style="margin:0 8px;">›</span> Apply Now
        </nav>
    </div>
</section>

<section style="padding:70px 0; background:#f8fffe;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; align-items:start;">

            {{-- Left: Info --}}
            <div>
                <h2 style="font-size:30px; font-weight:900; color:#1e3a5f; margin-bottom:20px;">Join Our Team / Get Services</h2>
                <p style="color:#555; line-height:1.8; margin-bottom:25px;">Whether you want to work with us as a field volunteer, apply for our services, or register for membership — fill in the application form and we will get back to you.</p>

                <div style="display:flex; flex-direction:column; gap:15px;">
                    @foreach([
                        ['fas fa-user-tie','Field Agent / Volunteer','Earn while serving your community'],
                        ['fas fa-id-card','Health Card Application','Get your family health card'],
                        ['fas fa-hand-holding-usd','Loan Application','Apply for personal or business loan'],
                        ['fas fa-graduation-cap','Pathshala Enrollment','Enroll your child in our school program'],
                    ] as [$icon, $title, $desc])
                    <div style="background:white; border-radius:12px; padding:18px 20px; box-shadow:0 3px 12px rgba(0,0,0,0.07); display:flex; align-items:center; gap:15px;">
                        <div style="width:48px; height:48px; background:linear-gradient(135deg,#1b7e3a,#2ecc71); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px; color:white; flex-shrink:0;">
                            <i class="{{ $icon }}"></i>
                        </div>
                        <div>
                            <div style="font-weight:700; color:#1e3a5f; font-size:15px;">{{ $title }}</div>
                            <div style="color:#888; font-size:13px;">{{ $desc }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Right: Application Form --}}
            <div style="background:white; border-radius:16px; padding:40px; box-shadow:0 8px 30px rgba(0,0,0,0.1);">
                <h3 style="font-size:22px; font-weight:800; color:#1e3a5f; margin-bottom:25px; text-align:center;">
                    <i class="fas fa-file-alt" style="color:#1b7e3a;"></i> Application Form
                </h3>
                <form method="POST" action="#" style="display:flex; flex-direction:column; gap:16px;">
                    @csrf
                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Full Name *</label>
                        <input type="text" name="name" required placeholder="Enter your full name"
                            style="width:100%; padding:11px 15px; border:1.5px solid #ddd; border-radius:8px; font-size:14px; outline:none; transition:border-color 0.3s;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                    </div>
                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Mobile Number *</label>
                        <input type="tel" name="mobile" required placeholder="10-digit mobile number"
                            style="width:100%; padding:11px 15px; border:1.5px solid #ddd; border-radius:8px; font-size:14px; outline:none;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                    </div>
                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Apply For *</label>
                        <select name="apply_for" required
                            style="width:100%; padding:11px 15px; border:1.5px solid #ddd; border-radius:8px; font-size:14px; outline:none; background:white;">
                            <option value="">-- Select --</option>
                            <option>Field Agent / Volunteer</option>
                            <option>Health Card</option>
                            <option>Loan Application</option>
                            <option>Pathshala Enrollment</option>
                            <option>Other Services</option>
                        </select>
                    </div>
                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">District *</label>
                        <input type="text" name="district" required placeholder="Your district"
                            style="width:100%; padding:11px 15px; border:1.5px solid #ddd; border-radius:8px; font-size:14px; outline:none;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                    </div>
                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Message</label>
                        <textarea name="message" rows="3" placeholder="Any additional details..."
                            style="width:100%; padding:11px 15px; border:1.5px solid #ddd; border-radius:8px; font-size:14px; outline:none; resize:vertical;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'"></textarea>
                    </div>
                    <button type="submit"
                        style="background:linear-gradient(135deg,#1b7e3a,#2ecc71); color:white; border:none; padding:13px; border-radius:10px; font-weight:700; font-size:15px; cursor:pointer; transition:all 0.3s;">
                        Submit Application <i class="fas fa-paper-plane" style="margin-left:8px;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
