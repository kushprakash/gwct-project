@extends('layouts.admin')

@section('title', 'Collect Renewal Payment')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Collect Annual Renewal</h5>
            </div>
            <div class="card-body pt-4">
                <div class="alert bg-primary bg-opacity-10 border-0 mb-4 d-flex align-items-center">
                    <i class="bi bi-person-circle fs-3 text-primary me-3"></i>
                    <div>
                        <h6 class="mb-0 fw-bold text-primary">{{ $child->name }} (Reg: {{ $child->registration_no }})</h6>
                        <small class="text-muted">Parent: {{ $child->parent_name }} | Age: {{ $child->age_at_registration }}</small>
                    </div>
                </div>

                <form action="{{ route('renewals.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="child_id" value="{{ $child->id }}">
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Renewal Amount (₹) <span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control" value="500" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">For Year <span class="text-danger">*</span></label>
                            <select name="renewal_year" class="form-select" required>
                                <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <select name="payment_mode" class="form-control" readonly>
                                <option value="Wallet Deduction" selected>Wallet Deduction</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('renewals.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 shadow-sm"><i class="bi bi-check-circle me-1"></i> Collect & Generate Receipt</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
