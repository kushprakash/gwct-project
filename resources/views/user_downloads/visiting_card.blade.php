<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visiting Card - {{ $user->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
            flex-direction: column;
            gap: 20px;
        }
        
        .visiting-card {
            width: 3.5in;
            height: 2in;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            position: relative;
            box-sizing: border-box;
            border: 1px solid #ccc;
            display: flex;
            overflow: hidden;
        }

        .left-section {
            background-color: #1e3c72;
            color: white;
            width: 35%;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .left-section img.logo {
            max-width: 60px;
            max-height: 60px;
            margin-bottom: 10px;
            background: white;
            padding: 5px;
            border-radius: 5px;
        }

        .qr-code {
            width: 50px;
            height: 50px;
            margin-top: 10px;
            background: white;
            padding: 3px;
        }

        .right-section {
            width: 65%;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .company-name {
            font-size: 10px;
            font-weight: 700;
            color: #1e3c72;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 15px 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .user-name {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            margin: 0 0 2px 0;
        }

        .user-role {
            font-size: 10px;
            color: #666;
            margin: 0 0 15px 0;
            font-weight: 600;
        }

        .contact-info {
            font-size: 9px;
            color: #444;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .contact-row {
            display: flex;
            align-items: center;
        }

        .contact-row i {
            width: 14px;
            color: #1e3c72;
            font-weight: bold;
        }

        @media print {
            body {
                background-color: white;
                display: block;
            }
            .visiting-card {
                box-shadow: none;
                margin: 0 0 20px 0;
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
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="print-btn no-print">Print Visiting Card</button>

    <!-- Front Side -->
    <div class="visiting-card">
        <div class="left-section">
            @if($settings && $settings->company_logo)
                <img src="{{ asset('storage/' . $settings->company_logo) }}" alt="Logo" class="logo">
            @endif
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode($settings->website ?? 'gwct.in') }}" alt="QR" class="qr-code">
        </div>
        <div class="right-section">
            <h4 class="company-name">{{ $settings->company_title ?? 'ORGANIZATION' }}</h4>
            
            <h2 class="user-name">{{ $user->name }}</h2>
            <p class="user-role">{{ $user->roles->first() ? $user->roles->first()->name : 'Member' }}</p>

            <div class="contact-info">
                @if($user->mobile)
                <div class="contact-row">
                    <i>&#9742;</i> {{ $user->mobile }}
                </div>
                @endif
                <div class="contact-row">
                    <i>&#9993;</i> {{ $user->email }}
                </div>
                <div class="contact-row">
                    <i>&#127760;</i> {{ $settings->website ?? 'gwct.in' }}
                </div>
            </div>
        </div>
    </div>

</body>
</html>
