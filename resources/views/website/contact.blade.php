@extends('layouts.website')

@section('content')

{{-- ===== Hero Banner ===== --}}
<section style="margin-top: -23px;background: linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%); color:white; padding: 70px 0 50px; text-align:center;">
    <div class="container">
        <div style="display:inline-flex; align-items:center; justify-content:center; width:70px; height:70px; background:rgba(255,255,255,0.15); border-radius:50%; font-size:28px; margin-bottom:18px;">
            <i class="fas fa-headset"></i>
        </div>
        <h1 style="font-size:42px; font-weight:900; margin-bottom:12px;">Contact Us</h1>
        <p style="font-size:18px; opacity:0.88;">हमसे संपर्क करें — हम आपकी सहायता के लिए तैयार हैं</p>
        <nav style="margin-top:16px; font-size:14px; opacity:0.7;">
            <a href="{{ route('website.home') }}" style="color:#ffde59; text-decoration:none;">Home</a>
            <span style="margin:0 8px;">›</span> Contact
        </nav>
    </div>
</section>

{{-- ===== Info Cards ===== --}}
<section style="padding:50px 0; background:#f8fffe;">
    <div class="container">
        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:20px;">
            @foreach([
                ['fas fa-map-marker-alt','Our Office','GWCT Office, Village & Post — Gramin Area, Bihar, India','#1b7e3a'],
                ['fas fa-phone-alt','Helpline','<a href="tel:+919102132444" style="color:inherit;text-decoration:none;">+91 9102132444</a><br><small>Mon–Sat, 9 AM – 6 PM</small>','#e67e22'],
                ['fas fa-envelope','Email','<a href="mailto:graminwelfare12@gmail.com" style="color:inherit;text-decoration:none;">graminwelfare12@gmail.com</a>','#3498db'],
                ['fas fa-whatsapp','WhatsApp','<a href="https://wa.me/919102132444" target="_blank" style="color:inherit;text-decoration:none;">+91 9102132444</a><br><small>Chat anytime</small>','#25d366'],
            ] as [$icon, $title, $value, $color])
            <div style="background:white; border-radius:14px; padding:28px 20px; text-align:center; box-shadow:0 4px 18px rgba(0,0,0,0.08); border-top:4px solid {{ $color }};">
                <div style="width:55px; height:55px; background:{{ $color }}; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 14px; font-size:22px; color:white;">
                    <i class="{{ $icon }}"></i>
                </div>
                <h4 style="font-size:15px; font-weight:800; color:#1e3a5f; margin-bottom:8px;">{{ $title }}</h4>
                <p style="font-size:13px; color:#666; line-height:1.7;">{!! $value !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Contact Form + Map ===== --}}
<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; align-items:start;">

            {{-- Contact Form --}}
            <div>
                <span style="color:#1b7e3a; font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:13px;">Send a Message</span>
                <h2 style="font-size:30px; font-weight:900; color:#1e3a5f; margin:10px 0 25px;">We'd Love to Hear From You</h2>

                @if(session('success'))
                <div style="background:#d4edda; border:1px solid #c3e6cb; color:#155724; padding:14px 18px; border-radius:10px; margin-bottom:20px; display:flex; align-items:center; gap:10px;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('website.contact.post') }}" style="display:flex; flex-direction:column; gap:18px;">
                    @csrf

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div>
                            <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Full Name <span style="color:red;">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                placeholder="Your name"
                                style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; transition:border-color 0.3s; box-sizing:border-box;"
                                onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                            @error('name')<small style="color:red;">{{ $message }}</small>@enderror
                        </div>
                        <div>
                            <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Mobile <span style="color:red;">*</span></label>
                            <input type="tel" name="mobile" value="{{ old('mobile') }}" required
                                placeholder="+91 XXXXXXXXXX"
                                style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; transition:border-color 0.3s; box-sizing:border-box;"
                                onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                            @error('mobile')<small style="color:red;">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="your@email.com"
                            style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; transition:border-color 0.3s; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                    </div>

                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Subject <span style="color:red;">*</span></label>
                        <select name="subject" required
                            style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">
                            <option value="">-- Select Subject --</option>
                            <option {{ old('subject')=='Services Inquiry'?'selected':'' }}>Services Inquiry</option>
                            <option {{ old('subject')=='Health Card'?'selected':'' }}>Health Card</option>
                            <option {{ old('subject')=='Loan Application'?'selected':'' }}>Loan Application</option>
                            <option {{ old('subject')=='Child Marriage Report'?'selected':'' }}>Child Marriage Report</option>
                            <option {{ old('subject')=='Volunteering'?'selected':'' }}>Volunteering</option>
                            <option {{ old('subject')=='Other'?'selected':'' }}>Other</option>
                        </select>
                        @error('subject')<small style="color:red;">{{ $message }}</small>@enderror
                    </div>

                    <div>
                        <label style="font-size:13px; font-weight:600; color:#555; display:block; margin-bottom:5px;">Your Message <span style="color:red;">*</span></label>
                        <textarea name="message" rows="5" required
                            placeholder="Write your message here..."
                            style="width:100%; padding:11px 14px; border:1.5px solid #ddd; border-radius:9px; font-size:14px; outline:none; resize:vertical; transition:border-color 0.3s; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#1b7e3a'" onblur="this.style.borderColor='#ddd'">{{ old('message') }}</textarea>
                        @error('message')<small style="color:red;">{{ $message }}</small>@enderror
                    </div>

                    <button type="submit"
                        style="background:linear-gradient(135deg,#1b7e3a,#2ecc71); color:white; border:none; padding:14px 30px; border-radius:10px; font-weight:700; font-size:15px; cursor:pointer; display:inline-flex; align-items:center; gap:10px; transition:all 0.3s; align-self:flex-start;">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>

            {{-- Map + Quick Info --}}
            <div>
                <span style="color:#1b7e3a; font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:13px;">Find Us</span>
                <h2 style="font-size:30px; font-weight:900; color:#1e3a5f; margin:10px 0 20px;">Our Location</h2>

                {{-- Google Map Embed (Bihar placeholder) --}}
                <div class="d-none" style="border-radius:14px; overflow:hidden; box-shadow:0 6px 25px rgba(0,0,0,0.12); margin-bottom:25px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.0!2d85.1376!3d25.5941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDM1JzM4LjgiTiA4NcKwMDgnMTUuNCJF!5e0!3m2!1sen!2sin!4v1609459200000!5m2!1sen!2sin"
                        width="100%" height="280" style="border:0; display:block;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

                {{-- Office hours --}}
                <div style="background:#f8fffe; border-radius:12px; padding:24px;">
                    <h4 style="font-size:16px; font-weight:800; color:#1e3a5f; margin-bottom:15px;"><i class="fas fa-clock" style="color:#1b7e3a; margin-right:8px;"></i>Office Hours</h4>
                    <table style="width:100%; font-size:14px; border-collapse:collapse;">
                        @foreach([
                            ['Monday – Friday','9:00 AM – 6:00 PM'],
                            ['Saturday','9:00 AM – 2:00 PM'],
                            ['Sunday','Closed'],
                        ] as [$day, $time])
                        <tr style="border-bottom:1px solid #eee;">
                            <td style="padding:10px 0; color:#555; font-weight:600;">{{ $day }}</td>
                            <td style="padding:10px 0; color:#1b7e3a; font-weight:700; text-align:right;">{{ $time }}</td>
                        </tr>
                        @endforeach
                    </table>

                    <div style="margin-top:20px; padding:15px; background:linear-gradient(135deg,#1b7e3a,#1e3a5f); border-radius:10px; color:white; text-align:center;">
                        <div style="font-size:13px; opacity:0.85; margin-bottom:4px;">Emergency / Report Child Marriage</div>
                        <a href="tel:+919102132444" style="color:#ffde59; font-size:20px; font-weight:900; text-decoration:none;">
                            <i class="fas fa-phone"></i> +91 9102132444
                        </a>
                    </div>
                </div>

                {{-- Social Links --}}
                <div style="margin-top:20px;">
                    <p style="font-size:13px; color:#888; margin-bottom:12px;">Follow us on social media:</p>
                    <div style="display:flex; gap:12px; flex-wrap:wrap;">
                        @foreach([
                            ['fab fa-facebook-f','Facebook','https://facebook.com','#3b5998'],
                            ['fab fa-instagram','Instagram','https://instagram.com','#e1306c'],
                            ['fab fa-youtube','YouTube','https://youtube.com','#ff0000'],
                            ['fab fa-whatsapp','WhatsApp','https://wa.me/919102132444','#25d366'],
                        ] as [$icon, $label, $url, $color])
                        <a href="{{ $url }}" target="_blank"
                            style="display:inline-flex; align-items:center; gap:7px; background:{{ $color }}; color:white; padding:9px 16px; border-radius:25px; font-size:13px; font-weight:600; text-decoration:none; transition:opacity 0.2s;"
                            onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                            <i class="{{ $icon }}"></i> {{ $label }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== Bottom CTA ===== --}}
<section style="padding:50px 0; background:linear-gradient(135deg,#1b7e3a,#1e3a5f); color:white; text-align:center;">
    <div class="container">
        <h2 style="font-size:28px; font-weight:900; margin-bottom:12px;">Need Immediate Help?</h2>
        <p style="font-size:16px; opacity:0.88; margin-bottom:25px;">Our team is just a call away — available Monday to Saturday</p>
        <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
            <a href="tel:+919102132444"
                style="background:#ffde59; color:#1e3a5f; padding:13px 32px; border-radius:30px; font-weight:800; text-decoration:none; font-size:15px; display:inline-flex; align-items:center; gap:10px;">
                <i class="fas fa-phone"></i> Call Now
            </a>
            <a href="https://wa.me/919102132444" target="_blank"
                style="background:#25d366; color:white; padding:13px 32px; border-radius:30px; font-weight:800; text-decoration:none; font-size:15px; display:inline-flex; align-items:center; gap:10px;">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
