<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bond Certificate - {{ $child->registration_no }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php 
            $primaryColor = isset($setting) && isset($setting->theme_colors['primary']) ? $setting->theme_colors['primary'] : '#2c3e50';
            $accentColor = isset($setting) && isset($setting->theme_colors['accent']) ? $setting->theme_colors['accent'] : '#d4af37';
        ?>
        body { background: #f4f6f9; font-family: 'Times New Roman', Times, serif; }
        .certificate {
            background: #fff;
            max-width: 800px;
            margin: 40px auto;
            padding: 50px;
            border: 15px solid {{ $primaryColor }};
            outline: 5px solid {{ $accentColor }};
            outline-offset: -10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
        }
        .header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 40px; border-bottom: 2px solid {{ $accentColor }}; padding-bottom: 20px; }
        .header-left { flex: 1; display: flex; align-items: center; gap: 20px; }
        .company-logo { max-width: 100px; max-height: 100px; object-fit: contain; }
        .company-info h1 { font-weight: bold; color: {{ $primaryColor }}; font-size: 2.2rem; text-transform: uppercase; margin: 0; }
        .company-info p { font-size: 1.1rem; color: #555; margin-top: 5px; font-style: italic; }
        .content { font-size: 1.1rem; line-height: 1.8; color: #333; text-align: justify; }
        .highlight { font-weight: bold; color: {{ $accentColor }}; font-size: 1.2rem; border-bottom: 1px dotted #333; display: inline-block; padding: 0 10px; }
        .photo-box {
            width: 120px;
            height: 150px;
            border: 2px solid #333;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            color: #888;
            flex-shrink: 0;
            margin-left: 20px;
        }
        .photo-box img { width: 100%; height: 100%; object-fit: cover; }
        .footer-signatures { display: flex; justify-content: flex-end; margin-top: 60px; }
        .sign-line { width: 200px; text-align: center; padding-top: 10px;margin-top: -50px; font-weight: bold; }
        @media print {
            body { background: #fff; }
            .certificate { margin: 0; border: none; box-shadow: none; outline: none; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body>

    <div class="text-center mt-3 no-print">
        <a href="{{ route('children.index') }}" class="btn btn-secondary">Back to List</a>
        <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer"></i> Print</button>
    </div>

    <div class="certificate">
        <div style="display: flex; justify-content: space-between; font-weight: bold; color: {{ $accentColor }}; margin-bottom: 20px;margin-top: -30px; font-size: 0.9rem; text-transform: uppercase;">
            <div>
                @if(isset($setting) && $setting->registration_no)
                    Reg No: {{ $setting->registration_no }}
                @endif
            </div>
            <div>Since: 2012</div>
        </div>

        <div class="header">
            <div class="header-left">
                @if(isset($setting) && $setting->company_logo)
                    <img src="{{ asset('storage/' . $setting->company_logo) }}" alt="Logo" class="company-logo">
                @endif
                <div class="company-info">
                    <h1>{{ $setting->company_title ?? 'Gramin Welfare Charitable Trust' }}</h1>
                    <p>Bal Vivah Roktham Project - Official Bond Certificate</p>
                </div>
            </div>
            
            @if($child->child_photo)
                <div class="photo-box">
                    <img src="{{ asset('storage/' . $child->child_photo) }}" alt="Child Photo">
                </div>
            @else
                <div class="photo-box">Photo Here</div>
            @endif
        </div>

        <div class="content">
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <div><strong>Registration No:</strong> <span style="color: {{ $accentColor }};">{{ $child->registration_no }}</span></div>
                <div><strong>Date:</strong> {{ $child->created_at->format('d/m/Y') }}</div>
            </div>

            <p>This certificate is proudly awarded to <span class="highlight">{{ strtoupper($child->name) }}</span>, 
            child of <span class="highlight">{{ strtoupper($child->parent_name) }}</span>, 
            residing at <span class="highlight">{{ $child->address ?? 'the registered village' }}</span>.</p>
            
            <p>We officially register them under the <strong>Bal Vivah Roktham Project</strong>, an initiative to eradicate child marriage and promote education.</p>
            
            <p><strong>Child Details:</strong></p>
            <ul style="list-style-type: none; padding: 0;">
                <li><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($child->dob)->format('d/m/Y') }} (Age: {{ $child->age_at_registration }} Years)</li>
                <li><strong>Gender:</strong> {{ $child->gender }}</li>
                <li><strong>Registration Fee Received:</strong> ₹{{ $child->registration_fee }}</li>
            </ul>

            <div style="background-color: #f8f9fa; padding: 15px; border-left: 4px solid {{ $accentColor }}; margin: 20px 0;">
                <strong>Benefits upon Maturity:</strong><br>
                At marriage age completion (18 years), the NGO will provide support between <strong>₹5,000 to ₹25,000</strong> to assist with welfare and development.
            </div>

            <p style="margin-top: 30px; font-style: italic; color: #555;">
                * By this bond, the trust pledges support to the child until the legal age of marriage (18 years), provided annual renewals are maintained.
            </p>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: 50px;">
            <!-- QR Code Area (Left) -->
            <div style="text-align: center;">
                @if($child->qr_code)
                    <img src="{{ asset('storage/' . $child->qr_code) }}" alt="QR Code" width="100">
                    <div style="font-size: 10px; margin-top: 5px;">Scan to Verify</div>
                @endif
            </div>

            <!-- Stamp and Signature Area (Right) -->
            <div style="text-align: center; position: relative;">
                @if(isset($setting) && $setting->stamp_signature)
                    <img src="{{ asset('storage/' . $setting->stamp_signature) }}" alt="Stamp" style="max-height: 90px; position: absolute; left: -80px; bottom: 10px; opacity: 0.8; transform: rotate(-10deg);">
                @endif
                
                <div class="sign-line">
                    @if(isset($setting) && $setting->authorized_signatory_sign)
                        <img src="{{ asset('storage/' . $setting->authorized_signatory_sign) }}" alt="Signature" style="max-height: 150px; display: block; margin: 0 auto -10px auto;">
                    @endif
                    {{ $setting->authorized_signatory ?? 'Authorized Signatory (GWCT)' }}
                </div>
            </div>
        </div>
    </div>

</body>
</html>
