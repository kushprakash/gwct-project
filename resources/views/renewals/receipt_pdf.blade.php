<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt - {{ $renewal->receipt_no }}</title>
    <style>
        body { font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 20px; color: #333; }
        .receipt-container { width: 100%; max-width: 600px; margin: 0 auto; border: 2px solid #ddd; padding: 30px; border-top: 10px solid #28a745; }
        .header { text-align: center; border-bottom: 2px dashed #ddd; padding-bottom: 15px; margin-bottom: 20px; }
        .header h2 { margin: 0; color: #28a745; font-size: 24px; }
        .header p { margin: 5px 0 0 0; color: #777; font-size: 14px; }
        .row { width: 100%; border-bottom: 1px solid #eee; padding: 10px 0; clear: both; overflow: auto; }
        .row.no-border { border-bottom: none; }
        .label { float: left; width: 40%; color: #666; font-size: 14px; }
        .value { float: left; width: 60%; text-align: right; font-weight: bold; font-size: 14px; }
        .total-row { background-color: #f9f9f9; padding: 15px; margin-top: 15px; border: 1px solid #eee; }
        .total-label { float: left; font-size: 18px; font-weight: bold; }
        .total-value { float: right; font-size: 20px; font-weight: bold; color: #28a745; }
        .footer { text-align: center; margin-top: 40px; padding-top: 15px; border-top: 1px solid #ddd; font-size: 12px; color: #888; }
    </style>
</head>
<body>

<div class="receipt-container">
    <div class="header">
        <h2>Gramin Welfare Charitable Trust</h2>
        <p>Bal Vivah Roktham Project - Official Renewal Receipt</p>
    </div>
    
    <div class="row">
        <div class="label">Receipt No:</div>
        <div class="value">{{ $renewal->receipt_no }}</div>
    </div>
    <div class="row">
        <div class="label">Date:</div>
        <div class="value">{{ $renewal->created_at->format('d/m/Y h:i A') }}</div>
    </div>
    <div class="row">
        <div class="label">Child Registration No:</div>
        <div class="value">{{ $renewal->child->registration_no }}</div>
    </div>
    <div class="row">
        <div class="label">Child Name:</div>
        <div class="value">{{ $renewal->child->name }}</div>
    </div>
    <div class="row">
        <div class="label">Renewal Year:</div>
        <div class="value">{{ $renewal->renewal_year }}</div>
    </div>
    <div class="row">
        <div class="label">Payment Mode:</div>
        <div class="value">{{ $renewal->payment_mode }}</div>
    </div>
    
    <div class="row no-border total-row">
        <div class="total-label">Total Amount Paid:</div>
        <div class="total-value">Rs. {{ number_format($renewal->amount, 2) }}</div>
    </div>
    
    <div class="footer">
        <p>Thank you for your continuous support towards the Bal Vivah Roktham Project.</p>
        <p>Collected By: <strong>{{ $renewal->user->name ?? 'Admin' }}</strong></p>
    </div>
</div>

</body>
</html>
