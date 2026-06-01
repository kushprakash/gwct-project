@extends('layouts.admin')

@section('title', 'Student Profile - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
        <a href="{{ route('pathshala-students.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Students</a>
        <a href="{{ route('pathshala-students.edit', $pathshalaStudent->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil me-1"></i> Edit Profile</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 mb-4 text-center">
            <div class="card-body p-4">
                @if($pathshalaStudent->photo)
                    <img src="{{ asset('storage/' . $pathshalaStudent->photo) }}" alt="{{ $pathshalaStudent->name }}" class="rounded-circle mb-3 border border-3 border-light shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                @else
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 120px; height: 120px;">
                        <i class="bi bi-person text-secondary fs-1"></i>
                    </div>
                @endif
                <h4 class="fw-bold mb-1">{{ $pathshalaStudent->name }}</h4>
                <p class="text-muted mb-2">Reg: {{ $pathshalaStudent->registration_no }}</p>
                
                @if($pathshalaStudent->status == 'Active')
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Active Student</span>
                @elseif($pathshalaStudent->status == 'Graduated')
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Graduated</span>
                @else
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">Dropout</span>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-4 border-bottom pb-2">Student Information</h6>
                
                <div class="row g-4">
                    <div class="col-sm-6">
                        <small class="text-muted d-block mb-1">Class Level</small>
                        <strong class="text-dark">Class {{ $pathshalaStudent->class_level }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block mb-1">Date of Birth</small>
                        <strong class="text-dark">{{ $pathshalaStudent->dob->format('d M, Y') }} ({{ $pathshalaStudent->dob->age }} yrs)</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block mb-1">Gender</small>
                        <strong class="text-dark">{{ $pathshalaStudent->gender }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block mb-1">Father's Name</small>
                        <strong class="text-dark">{{ $pathshalaStudent->father_name }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block mb-1">Mother's Name</small>
                        <strong class="text-dark">{{ $pathshalaStudent->mother_name ?? 'N/A' }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block mb-1">Mobile Number</small>
                        <strong class="text-dark">{{ $pathshalaStudent->mobile }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted d-block mb-1">Registered By</small>
                        <strong class="text-dark">{{ $pathshalaStudent->creator->name ?? 'Unknown' }}</strong>
                    </div>
                    <div class="col-12">
                        <small class="text-muted d-block mb-1">Address</small>
                        <strong class="text-dark">{{ $pathshalaStudent->address ?? 'N/A' }}</strong>
                    </div>
                    <div class="col-12">
                        <small class="text-muted d-block mb-1">Location IDs</small>
                        <span class="text-muted small">
                            State: {{ $pathshalaStudent->state_id }} | 
                            District: {{ $pathshalaStudent->district_id }} | 
                            Block: {{ $pathshalaStudent->block_id }} | 
                            Panchayat: {{ $pathshalaStudent->panchayat_id }} | 
                            Village: {{ $pathshalaStudent->village_id }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
