@extends('layouts.website')

@section('content')
<section style="margin-top: -23px;background: linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%); color:white; padding: 70px 0 50px; text-align:center;">
    <div class="container">
        <h1 style="font-size:42px; font-weight:900; margin-bottom:12px;">Photo Gallery</h1>
        <p style="font-size:18px; opacity:0.9;">GWCT की गतिविधियों की झलकियाँ</p>
        <nav style="margin-top:16px; font-size:14px; opacity:0.75;">
            <a href="{{ route('website.home') }}" style="color:#ffde59; text-decoration:none;">Home</a>
            <span style="margin:0 8px;">›</span> Gallery
        </nav>
    </div>
</section>

<section style="padding:70px 0; background:#f8fffe;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:32px; font-weight:900; color:#1e3a5f;">Our Work in Action</h2>
            <p style="color:#666; margin-top:10px;">Glimpses of GWCT's impact across rural communities</p>
        </div>

        {{-- Gallery Grid with Unsplash images --}}
        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:20px;">
            @foreach([
                ['https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&h=400&fit=crop','Community Meeting'],
                ['https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=400&fit=crop','Health Camp'],
                ['https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&h=400&fit=crop','Youth Training'],
                ['https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=600&h=400&fit=crop','Agriculture Support'],
                ['https://images.unsplash.com/photo-1509099836639-18ba1795216d?w=600&h=400&fit=crop','Education Drive'],
                ['https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?w=600&h=400&fit=crop','Women Empowerment'],
                ['https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=600&h=400&fit=crop','Child Welfare'],
                ['https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600&h=400&fit=crop','Awareness Camp'],
                ['https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?w=600&h=400&fit=crop','Village Program'],
            ] as [$img, $caption])
            <div style="border-radius:12px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.1); position:relative; cursor:pointer;">
                <img src="{{ $img }}" alt="{{ $caption }}" style="width:100%; height:220px; object-fit:cover; display:block; transition:transform 0.4s;">
                <div style="position:absolute; bottom:0; left:0; right:0; background:linear-gradient(to top, rgba(0,0,0,0.7),transparent); color:white; padding:15px 15px 12px; font-size:14px; font-weight:600;">
                    {{ $caption }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section style="padding:50px 0; background:white; text-align:center;">
    <div class="container">
        <p style="color:#666; font-size:16px;">Want to see more? Follow us on social media for the latest updates.</p>
        <div style="display:flex; gap:15px; justify-content:center; margin-top:20px;">
            @foreach([['fab fa-facebook-f','#3b5998'],['fab fa-instagram','#e1306c'],['fab fa-youtube','#ff0000'],['fab fa-whatsapp','#25d366']] as [$icon, $color])
            <a href="#" style="width:45px; height:45px; background:{{ $color }}; color:white; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:18px; text-decoration:none;">
                <i class="{{ $icon }}"></i>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
