<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner - {{ $user->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        
        .banner {
            width: 800px;
            height: 400px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            position: relative;
            box-sizing: border-box;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            color: white;
        }

        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
        }

        .circle-2 {
            width: 500px;
            height: 500px;
            bottom: -200px;
            right: -150px;
        }

        .content-left {
            width: 60%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            z-index: 10;
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            max-height: 60px;
            background: white;
            padding: 5px;
            border-radius: 8px;
        }

        .company-title {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin: 0;
            line-height: 1.2;
        }

        .main-text {
            margin-top: 30px;
        }

        .greeting {
            font-size: 16px;
            color: #b0c4de;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .user-name {
            font-size: 42px;
            font-weight: 800;
            margin: 0 0 10px 0;
            color: #fff;
        }

        .user-role {
            font-size: 20px;
            color: #e2e8f0;
            font-weight: 600;
            margin: 0;
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 20px;
        }

        .contact-bar {
            display: flex;
            gap: 20px;
            margin-top: 40px;
            font-size: 14px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .content-right {
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 10;
        }

        .photo-container {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 6px solid rgba(255,255,255,0.3);
            padding: 5px;
            margin-bottom: 30px;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .qr-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: white;
            padding: 10px;
            border-radius: 8px;
        }

        .qr-section img {
            width: 80px;
            height: 80px;
        }

        .website-text {
            color: #1e3c72;
            font-size: 12px;
            font-weight: 700;
            margin-top: 5px;
            text-align: center;
        }

        @media print {
            body {
                background-color: white;
                display: block;
            }
            .banner {
                box-shadow: none;
                margin: 0;
                page-break-inside: avoid;
            }
            .no-print {
                display: none;
            }
        }
        
        .print-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #1e3c72;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="print-btn no-print">Print Banner</button>

    <div class="banner">
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>

        <div class="content-left">
            <div class="header-logo">
                @if($settings && $settings->company_logo)
                    <img src="{{ asset('storage/' . $settings->company_logo) }}" alt="Logo" class="logo">
                @endif
                <h2 class="company-title">{{ $settings->company_title ?? 'ORGANIZATION' }}</h2>
            </div>

            <div class="main-text">
                <div class="greeting">Meet our</div>
                <h1 class="user-name">{{ $user->name }}</h1>
                <p class="user-role">{{ $user->roles->first() ? $user->roles->first()->name : 'Member' }}</p>
            </div>

            <div class="contact-bar">
                @if($user->mobile)
                <div class="contact-item">
                    <span>&#9742;</span> {{ $user->mobile }}
                </div>
                @endif
                <div class="contact-item">
                    <span>&#9993;</span> {{ $user->email }}
                </div>
            </div>
        </div>

        <div class="content-right">
            <div class="photo-container">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=200" alt="User Photo">
            </div>

            <div class="qr-section">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode($settings->website ?? 'gwct.in') }}" alt="QR">
                <div class="website-text">{{ $settings->website ?? 'gwct.in' }}</div>
            </div>
        </div>
    </div>

</body>
</html>
