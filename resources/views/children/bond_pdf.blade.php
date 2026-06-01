<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bond Certificate - {{ $child->registration_no }}</title>
    <style>
        <?php 
            $primaryColor = isset($setting) && isset($setting->theme_colors['primary']) ? $setting->theme_colors['primary'] : '#2c3e50';
            $accentColor = isset($setting) && isset($setting->theme_colors['accent']) ? $setting->theme_colors['accent'] : '#d4af37';
        ?>
        body { font-family: 'Times New Roman', Times, serif; background: #fff; margin: 0; padding: 20px; }
        .certificate {
            padding: 30px;
            border: 10px solid {{ $primaryColor }};
            outline: 3px solid {{ $accentColor }};
            outline-offset: -8px;
            position: relative;
        }
        .header { text-align: left; margin-bottom: 30px; border-bottom: 2px solid {{ $accentColor }}; padding-bottom: 10px; }
        .header h1 { font-weight: bold; color: {{ $primaryColor }}; font-size: 26px; text-transform: uppercase; margin: 0; }
        .header p { font-size: 14px; color: #555; margin-top: 5px; font-style: italic; }
        .content { font-size: 14px; line-height: 1.6; color: #333; text-align: justify; }
        .highlight { font-weight: bold; color: {{ $accentColor }}; border-bottom: 1px dotted #333; display: inline-block; padding: 0 5px; }
        .photo-box {
            position: absolute;
            top: 40px;
            right: 40px;
            width: 100px;
            height: 120px;
            border: 2px solid #333;
            background: #eee;
            text-align: center;
            line-height: 120px;
            font-size: 12px;
            color: #888;
        }
        .footer-signatures { width: 100%; margin-top: 50px; }
        .sign-line {  width: 40%; text-align: center; padding-top: 5px; font-weight: bold; font-size: 12px; }
        .sign-left { float: left; }
        .sign-right { float: right; }
        .clear { clear: both; }
        .qr-box { text-align: center; margin-top: 30px; }
        .qr-box img { width: 80px; }
        .benefits { background-color: #f8f9fa; padding: 10px; border-left: 3px solid {{ $accentColor }}; margin: 15px 0; font-size: 13px; }
    </style>
</head>
<body>

    <div class="certificate">
        @if($child->child_photo)
            <?php $photoPath = storage_path('app/public/' . $child->child_photo); ?>
            @if(file_exists($photoPath))
                <div class="photo-box" style="padding: 0; border: 2px solid #333; overflow: hidden;">
                    <img src="{{ $photoPath }}" alt="Child Photo" style="width: 100px; height: 120px;">
                </div>
            @else
                <div class="photo-box">Photo Here</div>
            @endif
        @else
            <div class="photo-box">Photo Here</div>
        @endif

        <div style="width: 100%; font-weight: bold; color: {{ $accentColor }}; margin-bottom: 10px; margin-top: -15px; font-size: 11px; text-transform: uppercase;">
            <div style="float: left;">
                @if(isset($setting) && $setting->registration_no)
                    Reg No: {{ $setting->registration_no }}
                @endif
            </div>
            <div style="float: right;">Since: 2012</div>
            <div style="clear: both;"></div>
        </div>

        <div class="header">
            @if(isset($setting) && $setting->company_logo)
                <?php $logoPath = storage_path('app/public/' . $setting->company_logo); ?>
                @if(file_exists($logoPath))
                    <img src="{{ $logoPath }}" alt="Logo" style="max-height: 80px; display: inline-block; vertical-align: middle; margin-right: 15px;">
                @endif
            @endif
            <div style="display: inline-block; vertical-align: middle;">
                <h1>{{ $setting->company_title ?? 'Gramin Welfare Charitable Trust' }}</h1>
                <p>Bal Vivah Roktham Project - Official Bond Certificate</p>
            </div>
        </div>

        <div class="content">
            <div style="width: 100%; margin-bottom: 15px; font-size: 12px;">
                <div style="float: left;">
                    <strong>Registration No:</strong> <span style="color: {{ $accentColor }};">{{ $child->registration_no }}</span>
                </div>
                <div style="float: right;">
                    <strong>Date:</strong> {{ $child->created_at->format('d/m/Y') }}
                </div>
                <div style="clear: both;"></div>
            </div>

            <p>This certificate is proudly awarded to <span class="highlight">{{ strtoupper($child->name) }}</span>, 
            child of <span class="highlight">{{ strtoupper($child->parent_name) }}</span>, 
            residing at <span class="highlight">{{ $child->address ?? 'the registered village' }}</span>.</p>
            
            <p>We officially register them under the <strong>Bal Vivah Roktham Project</strong>, an initiative to eradicate child marriage and promote education.</p>
            
            <p><strong>Child Details:</strong></p>
            <ul>
                <li><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($child->dob)->format('d/m/Y') }} (Age: {{ $child->age_at_registration }} Years)</li>
                <li><strong>Gender:</strong> {{ $child->gender }}</li>
                <li><strong>Registration Fee Received:</strong> Rs. {{ $child->registration_fee }}</li>
            </ul>

            <div class="benefits">
                <strong>Benefits upon Maturity:</strong><br>
                At marriage age completion (18 years), the NGO will provide support between <strong>Rs. 5,000 to Rs. 25,000</strong> to assist with welfare and development.
            </div>

            <p style="margin-top: 20px; font-style: italic; color: #555; font-size: 11px;">
                * By this bond, the trust pledges support to the child until the legal age of marriage (18 years), provided annual renewals are maintained.
            </p>
        </div>

        <div style="margin-top: 50px; width: 100%;">
            <!-- QR Code Area (Left) -->
            <div style="float: left; text-align: center; width: 100px;">
                @if($child->qr_code)
                    <?php
                        $qrPath = storage_path('app/public/' . str_replace('children/qrcodes/', 'children/qrcodes/', $child->qr_code));
                    ?>
                    @if(file_exists($qrPath))
                        <img src="{{ $qrPath }}" alt="QR Code" style="width: 80px;">
                    @endif
                    <div style="font-size: 9px; margin-top: 2px;">Scan to Verify</div>
                @endif
            </div>

            <!-- Stamp and Signature Area (Right) -->
            <div style="float: right; text-align: center; width: 250px; position: relative;">
                @if(isset($setting) && $setting->stamp_signature)
                    <?php $stampPath = storage_path('app/public/' . $setting->stamp_signature); ?>
                    @if(file_exists($stampPath))
                        <img src="{{ $stampPath }}" alt="Stamp" style="max-height: 80px; position: absolute; left: -20px; top: -30px; opacity: 0.8;">
                    @endif
                @endif
                
                <div class="sign-line" style="width: 100%;  padding-top: 5px; font-weight: bold; font-size: 12px; margin-top: 50px;">
                    @if(isset($setting) && $setting->authorized_signatory_sign)
                        <?php $signPath = storage_path('app/public/' . $setting->authorized_signatory_sign); ?>
                        @if(file_exists($signPath))
                            <img src="{{ $signPath }}" alt="Signature" style="max-height: 150px; display: block; margin: -40px auto -5px auto;">
                        @endif
                    @endif
                    {{ $setting->authorized_signatory ?? 'Authorized Signatory (GWCT)' }}
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

</body>
</html>
