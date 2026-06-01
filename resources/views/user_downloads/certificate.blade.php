<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Certificate - {{ $user->name }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .certificate-container {
            width: 11in;
            height: 8.5in;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            position: relative;
            box-sizing: border-box;
            padding: 0.5in;
            overflow: hidden;
        }

        .border-outer {
            border: 4px solid #1e3c72;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            padding: 6px;
        }

        .border-inner {
            border: 2px solid #2a5298;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            position: relative;
            background: url('data:image/svg+xml;utf8,<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1" fill="rgba(30,60,114,0.05)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23dots)"/></svg>');
        }

        .header {
            display: flex;
            align-items: center;
            padding: 0 40px;
            margin-top: 20px;
        }

        .logo-box {
            flex: 0 0 100px;
            text-align: left;
        }

        .logo {
            max-height: 80px;
        }

        .title-box {
            flex: 1;
            text-align: center;
            padding-right: 100px;
        }

        .title {
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            font-weight: 700;
            color: #1e3c72;
            margin: 0;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 15px;
            color: #555;
            margin: 5px 0 15px;
            letter-spacing: 1px;
        }

        .content {
            text-align: center;
            padding: 0 50px;
            margin-top: 50px;
        }

        .text-line {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .user-name {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 700;
            color: #2a5298;
            margin: 20px 0;
            font-style: italic;
            border-bottom: 2px solid #ccc;
            display: inline-block;
            padding: 0 50px 10px;
        }

        .details {
            font-size: 20px;
            margin: 30px 0 40px;
            line-height: 1.8;
            color: #444;
        }

        .highlight {
            font-weight: 600;
            color: #1e3c72;
        }

        .footer {
            position: absolute;
            bottom: 40px;
            left: 50px;
            right: 50px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .signature-block {
            text-align: center;
            width: 200px;
        }

        .signature-img {
            max-height: 50px;
            margin-bottom: 5px;
        }

        .signature-line {
            border-top: 1px solid #333;
            padding-top: 5px;
            font-size: 14px;
            font-weight: 600;
        }

        .stamp-box {
            width: 90px;
            height: 90px;
            opacity: 0.7;
        }

        .qr-code {
            width: 80px;
            height: 80px;
            border: 2px solid #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        @media print {
            body {
                background: white;
            }
            .certificate-container {
                box-shadow: none;
                margin: 0;
                padding: 0.25in;
                page-break-inside: avoid;
            }
            @page {
                size: letter landscape;
                margin: 0;
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
        
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 100px;
            color: rgba(30, 60, 114, 0.04);
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            white-space: nowrap;
            pointer-events: none;
            z-index: 0;
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="print-btn no-print">Print Certificate</button>

    <div class="certificate-container">
        <div class="border-outer">
            <div class="border-inner">
                
                <div class="watermark">{{ strtoupper($settings->company_title ?? 'ORGANIZATION') }}</div>

                <div class="header">
                    <div class="logo-box">
                        @if($settings && $settings->company_logo)
                            <img src="{{ asset('storage/' . $settings->company_logo) }}" alt="Logo" class="logo">
                        @endif
                    </div>
                    <div class="title-box">
                        <h1 class="title">Certificate of Appreciation</h1>
                        <p class="subtitle">{{ $settings->company_title ?? 'ORGANIZATION' }}</p>
                    </div>
                </div>

                <div class="content">
                    <p class="text-line">This certificate is proudly presented to</p>
                    <h2 class="user-name">{{ $user->name }}</h2>
                    <p class="text-line">Role: <strong>{{ $user->roles->first() ? $user->roles->first()->name : 'User' }}</strong></p>

                    <p class="details">
                        In recognition of outstanding dedication, excellent performance, and valuable contributions <br>to <span class="highlight">{{ $settings->company_title ?? 'our organization' }}</span>.<br>
                        We deeply appreciate your continued efforts and commitment to our shared goals.
                    </p>
                </div>

                <div class="footer">
                    <div class="signature-block">
                        <p class="signature-line" style="border: none; padding-bottom: 5px;">Date: {{ date('d M, Y') }}</p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode($settings->website ?? 'gwct.in') }}" alt="QR" class="qr-code">
                        <p style="font-size: 10px; margin-top: 5px; color: #666;">{{ $settings->website ?? 'gwct.in' }}</p>
                    </div>

                    <div style="text-align: center;">
                        @if($settings && $settings->official_stamp)
                            <img src="{{ asset('storage/' . $settings->official_stamp) }}" alt="Stamp" class="stamp-box">
                        @endif
                    </div>

                    <div class="signature-block">
                        @if($settings && $settings->authorized_signature)
                            <img src="{{ asset('storage/' . $settings->authorized_signature) }}" alt="Signature" class="signature-img">
                        @else
                            <div style="height: 50px;"></div>
                        @endif
                        <p class="signature-line">Authorized Signatory</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
