@extends('layouts.admin')

@section('title', 'Renewal Receipt - ' . $renewal->receipt_no)

@section('content')
<style>
    .receipt-container { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-top: 10px solid #28a745; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .receipt-header { border-bottom: 2px dashed #ddd; padding-bottom: 20px; margin-bottom: 20px; text-align: center; }
    .receipt-row { display: flex; justify-content: space-between; margin-bottom: 15px; border-bottom: 1px solid #f1f1f1; padding-bottom: 10px; }
    @media print { body * { visibility: hidden; } .receipt-container, .receipt-container * { visibility: visible; } .receipt-container { position: absolute; left: 0; top: 0; margin: 0; padding: 20px; box-shadow: none; border-top: 5px solid #28a745; } .no-print { display: none !important; } }
</style>

<div class="text-center mb-4 no-print">
    <a href="{{ route('renewals.index') }}" class="btn btn-secondary shadow-sm"><i class="bi bi-arrow-left"></i> Back to Renewals</a>
    <button onclick="window.print()" class="btn btn-primary shadow-sm ms-2"><i class="bi bi-printer"></i> Print Receipt</button>
    <a href="{{ route('renewals.show', ['renewal' => $renewal->id, 'download' => 'pdf']) }}" class="btn btn-danger shadow-sm ms-2"><i class="bi bi-file-pdf"></i> Download PDF</a>
</div>

<div class="receipt-container rounded-3">
    <div class="receipt-header">
        <h4 class="fw-bold text-success mb-1">Gramin Welfare Charitable Trust</h4>
        <div class="text-muted small">Bal Vivah Roktham Project - Annual Renewal Receipt</div>
    </div>
    
    <div class="receipt-row">
        <span class="text-muted">Receipt No:</span>
        <strong class="text-dark">{{ $renewal->receipt_no }}</strong>
    </div>
    <div class="receipt-row">
        <span class="text-muted">Date:</span>
        <strong class="text-dark">{{ $renewal->created_at->format('d/M/Y h:i A') }}</strong>
    </div>
    <div class="receipt-row">
        <span class="text-muted">Child Registration No:</span>
        <strong class="text-dark">{{ $renewal->child->registration_no }}</strong>
    </div>
    <div class="receipt-row">
        <span class="text-muted">Child Name:</span>
        <strong class="text-dark">{{ $renewal->child->name }}</strong>
    </div>
    <div class="receipt-row">
        <span class="text-muted">Renewal Year:</span>
        <strong class="text-dark">{{ $renewal->renewal_year }}</strong>
    </div>
    <div class="receipt-row">
        <span class="text-muted">Payment Mode:</span>
        <strong class="text-dark">{{ $renewal->payment_mode }}</strong>
    </div>
    <div class="receipt-row border-0 mb-0 pt-3 bg-light px-3 rounded">
        <span class="fw-bold text-dark fs-5">Total Amount Paid:</span>
        <strong class="text-success fs-4">₹{{ number_format($renewal->amount, 2) }}</strong>
    </div>
    
    <div class="mt-5 pt-3 border-top text-center text-muted small">
        <p class="mb-1">Thank you for your continuous support towards the Bal Vivah Roktham Project.</p>
        <p class="mb-0">Collected By: <strong>{{ $renewal->user->name ?? 'Admin' }}</strong></p>
    </div>
</div>
@endsection
