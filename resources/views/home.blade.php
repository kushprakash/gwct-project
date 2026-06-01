@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-card {
        border: none;
        border-radius: 12px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }
    .card-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
</style>

<div class="row g-4 mb-4">
    <!-- Total Villages -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="text-muted fw-normal mb-1">Total Villages</h6>
                        <h3 class="mb-0 fw-bold">0</h3>
                    </div>
                    <div class="card-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-houses"></i>
                    </div>
                </div>
                <div class="text-sm">
                    <span class="text-success"><i class="bi bi-arrow-up-short"></i> 0%</span>
                    <span class="text-muted">since last month</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Registrations -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="text-muted fw-normal mb-1">Active Registrations</h6>
                        <h3 class="mb-0 fw-bold">0</h3>
                    </div>
                    <div class="card-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-person-check"></i>
                    </div>
                </div>
                <div class="text-sm">
                    <span class="text-success"><i class="bi bi-arrow-up-short"></i> 0%</span>
                    <span class="text-muted">since last month</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Renewals -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="text-muted fw-normal mb-1">Pending Renewals</h6>
                        <h3 class="mb-0 fw-bold">0</h3>
                    </div>
                    <div class="card-icon bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
                <div class="text-sm">
                    <span class="text-danger"><i class="bi bi-arrow-up-short"></i> Action Needed</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Collection -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card dashboard-card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="text-muted fw-normal mb-1">Total Collection</h6>
                        <h3 class="mb-0 fw-bold">₹0</h3>
                    </div>
                    <div class="card-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-currency-rupee"></i>
                    </div>
                </div>
                <div class="text-sm">
                    <span class="text-success"><i class="bi bi-arrow-up-short"></i> 0%</span>
                    <span class="text-muted">since last month</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Social Activities -->
    <div class="col-12 col-md-4">
        <div class="card dashboard-card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="text-muted fw-normal mb-1">Social Activities</h6>
                        <h3 class="mb-0 fw-bold">0</h3>
                    </div>
                    <div class="card-icon bg-danger bg-opacity-10 text-danger">
                        <i class="bi bi-heart"></i>
                    </div>
                </div>
                <a href="#" class="btn btn-sm btn-outline-danger w-100 mt-2">View Reports</a>
            </div>
        </div>
    </div>

    <!-- Total Students -->
    <div class="col-12 col-md-4">
        <div class="card dashboard-card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="text-muted fw-normal mb-1">Total Students</h6>
                        <h3 class="mb-0 fw-bold">0</h3>
                    </div>
                    <div class="card-icon bg-purple text-purple" style="background-color: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                </div>
                <a href="#" class="btn btn-sm btn-outline-primary w-100 mt-2" style="border-color: #6f42c1; color: #6f42c1;">Pathshala Overview</a>
            </div>
        </div>
    </div>

    <!-- Wallet Balance -->
    <div class="col-12 col-md-4">
        <div class="card dashboard-card shadow-sm h-100" style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); color: white;">
            <div class="card-body position-relative overflow-hidden">
                <div class="position-absolute" style="right: -20px; top: -20px; opacity: 0.1; font-size: 8rem;">
                    <i class="bi bi-wallet2"></i>
                </div>
                <h6 class="fw-normal mb-1 text-white-50">My Wallet Balance</h6>
                <h2 class="mb-4 fw-bold">₹{{ number_format(\App\Models\Passbook::getAvailableBalance(Auth::id()), 2) }}</h2>
                <div class="d-flex gap-2">
                    <a href="{{ url('funds') }}" class="btn btn-light btn-sm px-3 fw-medium">Add Funds</a>
                    <a href="{{ url('wallet_history') }}" class="btn btn-outline-light btn-sm px-3">History</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-lg-8">
        <div class="card dashboard-card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Passbook History</h5>
                <button class="btn btn-sm btn-light"><i class="bi bi-three-dots"></i></button>
            </div>
            <div class="card-body">
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
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($passbooks as $passbook)
                                    <tr>
                                        <td>{{ $passbook->created_at->format('d M, Y H:i') }}</td>
                                        <td>{{ $passbook->desc }}</td>
                                        <td>
                                            @if($passbook->type == 'CR')
                                                <span class="badge bg-success bg-opacity-10 text-success">Credit</span>
                                            @elseif($passbook->type == 'DR')
                                                <span class="badge bg-danger bg-opacity-10 text-danger">Debit</span>
                                            @else
                                                <span class="badge bg-secondary bg-opacity-10 text-secondary">{{ $passbook->type }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="{{ $passbook->type == 'CR' ? 'text-success' : 'text-danger' }}">
                                                {{ $passbook->type == 'CR' ? '+' : '-' }}₹{{ number_format($passbook->amount, 2) }}
                                            </span>
                                        </td>
                                        <td class="fw-bold">₹{{ number_format($passbook->balance, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card dashboard-card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('users.create') }}" class="btn btn-light text-start p-3 border"><i class="bi bi-person-plus text-primary me-2"></i> Create New User</a>
                    <a href="{{ route('children.create') }}" class="btn btn-light text-start p-3 border"><i class="bi bi-file-earmark-text text-success me-2"></i> New Registration</a>
                    <a href="#" class="btn btn-light text-start p-3 border"><i class="bi bi-camera text-danger me-2"></i> Upload Activity</a>
                    <a href="{{ route('funds.index') }}" class="btn btn-light text-start p-3 border"><i class="bi bi-cash-stack text-info me-2"></i> Record Expense / Add Funds</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
