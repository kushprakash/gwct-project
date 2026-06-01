@extends('layouts.admin')

@section('title', 'Wallet & Fund Requests')

@section('content')

<!-- Bank Account Details Banner -->
@if(isset($setting) && $setting->account_details)
<div class="alert alert-primary border-0 shadow-sm d-flex align-items-center mb-4">
    <i class="bi bi-bank fs-2 me-3 text-primary"></i>
    <div>
        <h5 class="alert-heading fw-bold mb-1">Official NGO Bank Account Details</h5>
        <p class="mb-0 text-dark">
            {{ $setting->account_details }}
        </p>
    </div>
</div>
@endif

<div class="row">
    <!-- Left Side: Add Fund Form -->
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm rounded-3 h-100">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Add Funds to Wallet</h5>
                <p class="text-muted small">Current Balance: <strong class="text-success fs-5">₹{{ number_format(\App\Models\Passbook::getAvailableBalance(Auth::id()), 2) }}</strong></p>
            </div>
            <div class="card-body pt-3">
                <form action="{{ route('funds.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Amount (₹) <span class="text-danger">*</span></label>
                        <input type="number" name="amount" class="form-control" required min="1" placeholder="Enter amount">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Payment Mode <span class="text-danger">*</span></label>
                        <select name="payment_mode" class="form-select" required>
                            <option value="">-- Select --</option>
                            <option value="UPI">UPI</option>
                            <option value="Bank Transfer">Bank Transfer / NEFT</option>
                            <option value="Cash">Cash Handover</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Transaction ID / Reference (Optional)</label>
                        <input type="text" name="transaction_id" class="form-control" placeholder="e.g. UTR or UPI Ref">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 shadow-sm"><i class="bi bi-send me-1"></i> Submit Request</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Side: List of Requests -->
    <div class="col-md-8 mb-4">
        <div class="card border-0 shadow-sm rounded-3 h-100">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Recent Fund Requests</h5>
            </div>
            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                @if($user->hasRole('Super Admin'))
                                <th>User</th>
                                @endif
                                <th>Amount</th>
                                <th>Mode & Ref</th>
                                <th>Status</th>
                                @if($user->hasRole('Super Admin'))
                                <th class="text-end">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $req)
                            <tr>
                                <td>{{ $req->created_at->format('d/m/Y h:ia') }}</td>
                                @if($user->hasRole('Super Admin'))
                                <td>
                                    <strong>{{ $req->user->name }}</strong><br>
                                    <small class="text-muted">{{ $req->user->mobile }}</small>
                                </td>
                                @endif
                                <td class="fw-bold text-success">₹{{ $req->amount }}</td>
                                <td>
                                    {{ $req->payment_mode }}<br>
                                    <small class="text-muted">{{ $req->transaction_id ?? 'N/A' }}</small>
                                </td>
                                <td>
                                    @if($req->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($req->status == 'Approved')
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                
                                @if($user->hasRole('Super Admin'))
                                <td class="text-end">
                                    @if($req->status == 'Pending')
                                        <form action="{{ route('funds.approve', $req->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success shadow-sm" onclick="return confirm('Approve request and add ₹{{ $req->amount }} to wallet?')"><i class="bi bi-check-lg"></i> Approve</button>
                                        </form>
                                        <form action="{{ route('funds.reject', $req->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm ms-1" onclick="return confirm('Reject this request?')"><i class="bi bi-x-lg"></i></button>
                                        </form>
                                    @else
                                        <span class="text-muted small">Processed</span>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="{{ $user->hasRole('Super Admin') ? 6 : 4 }}" class="text-center text-muted py-4">No fund requests found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
