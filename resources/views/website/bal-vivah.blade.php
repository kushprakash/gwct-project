@extends('layouts.website')

@section('content')
<section style="margin-top: -23px;background: linear-gradient(135deg, #8e1212 0%, #1e3a5f 100%); color:white; padding: 70px 0 50px; text-align:center;">
    <div class="container">
        <h1 style="font-size:42px; font-weight:900; margin-bottom:12px;">Bal Vivah Roktham</h1>
        <p style="font-size:18px; opacity:0.9;">बाल विवाह रोकथाम अभियान — हमारी प्रतिबद्धता</p>
        <nav style="margin-top:16px; font-size:14px; opacity:0.75;">
            <a href="{{ route('website.home') }}" style="color:#ffde59; text-decoration:none;">Home</a>
            <span style="margin:0 8px;">›</span> Bal Vivah
        </nav>
    </div>
</section>

{{-- Alert banner --}}
<div style="background:#ffde59; padding:14px; text-align:center; font-weight:700; color:#1e3a5f; font-size:15px;">
    <i class="fas fa-exclamation-triangle" style="margin-right:8px; color:#e74c3c;"></i>
    Child Marriage is Illegal in India — Report it: <strong>Helpline +91 9102132444</strong>
</div>

<section style="padding:70px 0; background:#fff;">
    <div class="container">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; align-items:center;">
            <div>
                <span style="color:#c0392b; font-weight:700; text-transform:uppercase; letter-spacing:1px; font-size:13px;">Our Campaign</span>
                <h2 style="font-size:34px; font-weight:900; color:#1e3a5f; margin:10px 0 20px;">Fight Against Child Marriage</h2>
                <p style="color:#555; line-height:1.8; margin-bottom:15px;">GWCT runs active campaigns to prevent child marriage and protect children's rights. We work with communities, schools, and local authorities to create awareness and provide support.</p>
                <p style="color:#555; line-height:1.8; margin-bottom:25px;">Our trained volunteers visit villages regularly to educate families about the harmful effects of child marriage on physical, mental, and emotional development of children.</p>
                <div style="background:#fff5f5; border-left:4px solid #e74c3c; padding:20px; border-radius:0 10px 10px 0;">
                    <strong style="color:#c0392b;">The Law Says:</strong><br>
                    <span style="color:#555; font-size:14px;">As per the Prohibition of Child Marriage Act 2006, the minimum age of marriage is <strong>21 years for boys</strong> and <strong>18 years for girls</strong>.</span>
                </div>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                @foreach([
                    ['fas fa-chalkboard-teacher','Awareness Camps','Regular village-level awareness sessions'],
                    ['fas fa-balance-scale','Legal Support','Free legal aid and counseling services'],
                    ['fas fa-book-open','Education Drive','Keeping girls in school, scholarships'],
                    ['fas fa-phone-alt','24/7 Helpline','Report child marriage anytime'],
                ] as [$icon, $title, $desc])
                <div style="background:#f8f9fa; border-radius:12px; padding:20px; text-align:center;">
                    <div style="font-size:28px; color:#c0392b; margin-bottom:10px;"><i class="{{ $icon }}"></i></div>
                    <h4 style="font-size:14px; font-weight:800; color:#1e3a5f; margin-bottom:6px;">{{ $title }}</h4>
                    <p style="font-size:12px; color:#666;">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section style="padding:60px 0; background:#f8fffe;">
    <div class="container">
        <h2 style="text-align:center; font-size:30px; font-weight:900; color:#1e3a5f; margin-bottom:40px;">Our Impact Numbers</h2>
        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:20px; text-align:center;">
            @foreach([['200+','Cases Prevented'],['50+','Villages Covered'],['1000+','Girls Educated'],['30+','Legal Aid Cases']] as [$num, $label])
            <div style="background:white; border-radius:14px; padding:30px 15px; box-shadow:0 4px 15px rgba(0,0,0,0.08);">
                <div style="font-size:40px; font-weight:900; color:#c0392b;">{{ $num }}</div>
                <div style="color:#666; font-size:14px; margin-top:5px;">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section style="padding:60px 0; background:linear-gradient(135deg,#c0392b,#8e1212); color:white; text-align:center;">
    <div class="container">
        <h2 style="font-size:30px; font-weight:900; margin-bottom:15px;">Report Child Marriage</h2>
        <p style="font-size:16px; opacity:0.9; margin-bottom:25px;">If you witness or suspect a child marriage — act immediately. Your call can save a life.</p>
        <a href="tel:+919102132444" style="background:#ffde59; color:#1e3a5f; padding:14px 40px; border-radius:30px; font-weight:800; text-decoration:none; font-size:16px; display:inline-flex; align-items:center; gap:10px;">
            <i class="fas fa-phone"></i> Call Helpline: +91 9102132444
        </a>
    </div>
</section>
@endsection
