<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Certificate - {{ $student->name }}</title>
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
            padding-right: 100px; /* To visually center text considering left logo */
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
        }

        .text-line {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .student-name {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: #2a5298;
            margin: 10px 0;
            font-style: italic;
            border-bottom: 2px solid #ccc;
            display: inline-block;
            padding: 0 30px 5px;
        }

        .exam-details {
            font-size: 16px;
            margin: 15px 0 20px;
            line-height: 1.5;
        }

        .highlight {
            font-weight: 600;
            color: #1e3c72;
        }

        .results-table {
            width: 80%;
            margin: 0 auto 20px;
            border-collapse: collapse;
        }

        .results-table th, .results-table td {
            border: 1px solid #ddd;
            padding: 6px 10px;
            font-size: 14px;
            text-align: left;
            background: rgba(255,255,255,0.9);
        }

        .results-table th {
            background: #1e3c72;
            color: white;
            font-weight: 600;
            text-align: center;
        }

        .results-table td {
            text-align: center;
        }

        .results-table td:first-child {
            text-align: left;
        }

        .footer {
            position: absolute;
            bottom: 30px;
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
            font-size: 120px;
            color: rgba(30, 60, 114, 0.05);
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
                
                <div class="watermark">GRAMIN PATHSHALA</div>

                <div class="header">
                    <div class="logo-box">
                        @if($settings && $settings->company_logo)
                            <img src="{{ asset('storage/' . $settings->company_logo) }}" alt="Logo" class="logo">
                        @endif
                    </div>
                    <div class="title-box">
                        <h1 class="title">Certificate of Achievement</h1>
                        <p class="subtitle">GRAMIN PATHSHALA EDUCATION SYSTEM</p>
                    </div>
                </div>

                <div class="content">
                    <p class="text-line">This is to proudly certify that</p>
                    <h2 class="student-name">{{ $student->name }}</h2>
                    <p class="text-line">Registration No: <strong>{{ $student->registration_no }}</strong></p>

                    <p class="exam-details">
                        has successfully completed the <span class="highlight">{{ $exam->name }}</span> for <span class="highlight">Class {{ $exam->class_level }}</span><br>
                        during the academic session <span class="highlight">{{ $exam->session_year }}</span>, achieving an overall grade of <span class="highlight" style="font-size: 20px;">{{ $finalGrade }}</span>.
                    </p>

                    <table class="results-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Total Marks</th>
                                <th>Passing Marks</th>
                                <th>Marks Obtained</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exam->examSubjects as $es)
                                @php
                                    $res = $results->get($es->id);
                                @endphp
                                <tr>
                                    <td>{{ $es->subject->name }}</td>
                                    <td>{{ $es->total_marks }}</td>
                                    <td>{{ $es->passing_marks }}</td>
                                    <td>{{ $res ? $res->marks_obtained : '-' }}</td>
                                    <td><strong>{{ $res ? $res->grade : '-' }}</strong></td>
                                </tr>
                            @endforeach
                            <tr style="background: rgba(30, 60, 114, 0.1);">
                                <th>Total</th>
                                <th>{{ $totalPossible }}</th>
                                <th>-</th>
                                <th>{{ $totalObtained }}</th>
                                <th>{{ $percentage > 0 ? round($percentage, 2) . '%' : '-' }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="footer">
                    <div class="signature-block">
                        <p class="signature-line" style="border: none; padding-bottom: 5px;">Date of Issue: {{ date('d M, Y') }}</p>
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
