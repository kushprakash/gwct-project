<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User ID Card - {{ $user->name }}</title>
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
        }
        
        .id-card {
            width: 2.125in;
            height: 3.375in;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        .header {
            background-color: #1e3c72;
            color: white;
            text-align: center;
            padding: 10px 5px;
            font-size: 10px;
        }

        .header img {
            max-height: 25px;
            margin-bottom: 2px;
        }
        
        .header h3 {
            margin: 0;
            font-size: 12px;
            font-weight: 700;
        }
        
        .header p {
            margin: 0;
            font-size: 8px;
            opacity: 0.9;
        }

        .photo-area {
            text-align: center;
            margin-top: 10px;
        }

        .photo-area img {
            width: 75px;
            height: 75px;
            border-radius: 5px;
            object-fit: cover;
            border: 2px solid #1e3c72;
        }

        .user-details {
            text-align: center;
            padding: 5px 10px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 700;
            color: #1e3c72;
            margin: 0 0 5px 0;
        }

        .info-row {
            font-size: 9px;
            margin-bottom: 3px;
            color: #333;
            text-align: left;
            padding: 0 10px;
        }

        .info-row span {
            font-weight: 600;
            color: #555;
            display: inline-block;
            width: 50px;
        }

        .footer {
            background-color: #f8f9fa;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            padding: 8px 10px;
            box-sizing: border-box;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            z-index: 10;
        }

        .qr-code {
            width: 35px;
            height: 35px;
        }

        .signature {
            text-align: right;
        }

        .signature img {
            max-height: 20px;
            margin-bottom: 2px;
        }

        .signature p {
            margin: 0;
            font-size: 7px;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 2px;
        }

        @media print {
            body {
                background-color: white;
                display: block;
            }
            .id-card {
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
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="print-btn no-print">Print ID Card</button>

    <div class="id-card">
        <div class="header">
            @if($settings && $settings->company_logo)
                <img src="{{ asset('storage/' . $settings->company_logo) }}" alt="Logo">
            @endif
            <h3>{{ $settings->company_title ?? 'Organization' }}</h3>
            <p>{{ $settings->website ?? 'gwct.in' }}</p>
        </div>

        <div class="photo-area">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=150" alt="User Photo">
        </div>

        <div class="user-details">
            <h4 class="user-name">{{ $user->name }}</h4>
        </div>
        
        <div class="info-row">
            <span>Role</span>: {{ $user->roles->first() ? $user->roles->first()->name : 'User' }}
        </div>
        <div class="info-row">
            <span>Mobile</span>: {{ $user->mobile ?? 'N/A' }}
        </div>
        <div class="info-row">
            <span>Email</span>: {{ $user->email }}
        </div>
        <div class="info-row">
            <span>Valid Till</span>: {{ date('d/m/Y', strtotime('+1 year')) }}
        </div>

        <div class="footer">
            <div>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode(url('/')) }}" alt="QR" class="qr-code">
            </div>
            <div class="signature">
                @if($settings && $settings->authorized_signature)
                    <img src="{{ asset('storage/' . $settings->authorized_signature) }}" alt="Signature">
                @else
                    <div style="height: 20px;"></div>
                @endif
                <p>Authorized Signatory</p>
            </div>
        </div>
    </div>

</body>
</html>
