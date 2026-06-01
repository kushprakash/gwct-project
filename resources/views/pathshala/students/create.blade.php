@extends('layouts.admin')

@section('title', 'Register Student - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('pathshala-students.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Students</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Register New Student</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pathshala-students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <h6 class="fw-bold mb-3 text-primary">1. Personal Information</h6>
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Student Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Class <span class="text-danger">*</span></label>
                    <select name="class_level" class="form-select" required>
                        <option value="">Select Class</option>
                        <option value="1" {{ old('class_level') == '1' ? 'selected' : '' }}>Class 1</option>
                        <option value="2" {{ old('class_level') == '2' ? 'selected' : '' }}>Class 2</option>
                        <option value="3" {{ old('class_level') == '3' ? 'selected' : '' }}>Class 3</option>
                        <option value="4" {{ old('class_level') == '4' ? 'selected' : '' }}>Class 4</option>
                        <option value="5" {{ old('class_level') == '5' ? 'selected' : '' }}>Class 5</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Gender <span class="text-danger">*</span></label>
                    <select name="gender" class="form-select" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Father's Name <span class="text-danger">*</span></label>
                    <input type="text" name="father_name" class="form-control" value="{{ old('father_name') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Mother's Name</label>
                    <input type="text" name="mother_name" class="form-control" value="{{ old('mother_name') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" required>
                </div>
            </div>

            <h6 class="fw-bold mb-3 text-primary">2. Location Details</h6>
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">State <span class="text-danger">*</span></label>
                    <select name="state_id" id="state_id" class="form-select" required>
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">District <span class="text-danger">*</span></label>
                    <select name="district_id" id="district_id" class="form-select" required>
                        <option value="">Select District</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Block <span class="text-danger">*</span></label>
                    <select name="block_id" id="block_id" class="form-select" required>
                        <option value="">Select Block</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Panchayat <span class="text-danger">*</span></label>
                    <select name="panchayat_id" id="panchayat_id" class="form-select" required>
                        <option value="">Select Panchayat</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Village <span class="text-danger">*</span></label>
                    <select name="village_id" id="village_id" class="form-select" required>
                        <option value="">Select Village</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                </div>
            </div>

            <h6 class="fw-bold mb-3 text-primary">3. Documents</h6>
            <div class="row mb-4">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-medium">Student Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    <small class="text-muted">Optional. Max 2MB.</small>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Complete Registration</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const stateSelect = document.getElementById('state_id');
    const districtSelect = document.getElementById('district_id');
    const blockSelect = document.getElementById('block_id');
    const panchayatSelect = document.getElementById('panchayat_id');
    const villageSelect = document.getElementById('village_id');

    stateSelect.addEventListener('change', function() {
        if(this.value) {
            fetch(`/api/locations/districts/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                    data.forEach(d => districtSelect.innerHTML += `<option value="${d.id}">${d.name}</option>`);
                });
        }
    });

    districtSelect.addEventListener('change', function() {
        if(this.value) {
            fetch(`/api/locations/blocks/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    blockSelect.innerHTML = '<option value="">Select Block</option>';
                    data.forEach(d => blockSelect.innerHTML += `<option value="${d.id}">${d.name}</option>`);
                });
        }
    });

    blockSelect.addEventListener('change', function() {
        if(this.value) {
            fetch(`/api/locations/panchayats/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    panchayatSelect.innerHTML = '<option value="">Select Panchayat</option>';
                    data.forEach(d => panchayatSelect.innerHTML += `<option value="${d.id}">${d.name}</option>`);
                });
        }
    });

    panchayatSelect.addEventListener('change', function() {
        if(this.value) {
            fetch(`/api/locations/villages/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    villageSelect.innerHTML = '<option value="">Select Village</option>';
                    data.forEach(d => villageSelect.innerHTML += `<option value="${d.id}">${d.name}</option>`);
                });
        }
    });
});
</script>
@endpush
