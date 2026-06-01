@extends('layouts.admin')

@section('title', 'Wallet History')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-3" style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); color: white;">
            <div class="card-body position-relative overflow-hidden p-4">
                <div class="position-absolute" style="right: -20px; top: -20px; opacity: 0.1; font-size: 8rem; pointer-events: none;">
                    <i class="bi bi-wallet2"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-normal mb-1 text-white-50">Current Wallet Balance</h6>
                        <h2 class="mb-0 fw-bold">₹{{ number_format($currentBalance, 2) }}</h2>
                    </div>
                    <div>
                        <a href="{{ route('funds.index') }}" class="btn btn-light shadow-sm fw-medium"><i class="bi bi-plus-circle me-1"></i> Add Funds</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Passbook Transactions</h5>
    </div>
    <div class="card-body pt-3">
        @if($passbooks->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-inbox fs-1 d-block mb-3 opacity-50"></i>
                <p>No passbook history found.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Transaction ID</th>
                            <th>Date & Time</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($passbooks as $passbook)
                            <tr>
                                <td><span class="text-muted">#{{ $passbook->id }}</span></td>
                                <td>{{ $passbook->created_at->format('d M, Y h:i A') }}</td>
                                <td>{{ $passbook->desc }}</td>
                                <td>
                                    @if($passbook->type == 'CR')
                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1"><i class="bi bi-arrow-down-left"></i> Credit</span>
                                    @elseif($passbook->type == 'DR')
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1"><i class="bi bi-arrow-up-right"></i> Debit</span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary">{{ $passbook->type }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold {{ $passbook->type == 'CR' ? 'text-success' : 'text-danger' }}">
                                        {{ $passbook->type == 'CR' ? '+' : '-' }}₹{{ number_format($passbook->amount, 2) }}
                                    </span>
                                </td>
                                <td class="fw-bold">₹{{ number_format($passbook->balance, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $passbooks->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
