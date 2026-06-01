@extends('layouts.admin')

@section('title', 'Register New Child')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Child Registration Form</h5>
                <p class="text-muted small">Bal Vivah Roktham Project</p>
            </div>
            <div class="card-body">
                <form action="{{ route('children.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Child Details -->
                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">1. Child Details</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Child Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" required max="{{ date('Y-m-d') }}">
                            @error('dob') <div class="invalid-feedback">{{ $message }}</div> @else <small class="text-muted">Must be 15 years old or younger.</small> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Parent Details -->
                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">2. Parent Details</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Parent/Guardian Name <span class="text-danger">*</span></label>
                            <input type="text" name="parent_name" class="form-control @error('parent_name') is-invalid @enderror" value="{{ old('parent_name') }}" required>
                            @error('parent_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Parent Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="parent_mobile" class="form-control @error('parent_mobile') is-invalid @enderror" value="{{ old('parent_mobile') }}" required>
                            @error('parent_mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Parent Aadhaar No.</label>
                            <input type="text" name="parent_aadhaar" class="form-control @error('parent_aadhaar') is-invalid @enderror" value="{{ old('parent_aadhaar') }}">
                            @error('parent_aadhaar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Location Details -->
                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">3. Location Mapping</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select name="state_id" id="state_id" class="form-select" required>
                                <option value="">-- Select State --</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">District <span class="text-danger">*</span></label>
                            <select name="district_id" id="district_id" class="form-select" required disabled>
                                <option value="">-- Select District --</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Block <span class="text-danger">*</span></label>
                            <select name="block_id" id="block_id" class="form-select" required disabled>
                                <option value="">-- Select Block --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Panchayat <span class="text-danger">*</span></label>
                            <select name="panchayat_id" id="panchayat_id" class="form-select" required disabled>
                                <option value="">-- Select Panchayat --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Village <span class="text-danger">*</span></label>
                            <select name="village_id" id="village_id" class="form-select" required disabled>
                                <option value="">-- Select Village --</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Full Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <!-- Document Uploads -->
                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">4. Document Uploads</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Child Photo <span class="text-danger">*</span></label>
                            <input type="file" name="child_photo" class="form-control @error('child_photo') is-invalid @enderror" accept="image/*" required>
                            @error('child_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Child Aadhaar Photo <span class="text-danger">*</span></label>
                            <input type="file" name="aadhaar_photo" class="form-control @error('aadhaar_photo') is-invalid @enderror" accept="image/*" required>
                            @error('aadhaar_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Birth Certificate <span class="text-danger">*</span></label>
                            <input type="file" name="birth_certificate_photo" class="form-control @error('birth_certificate_photo') is-invalid @enderror" accept="image/*" required>
                            @error('birth_certificate_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="alert alert-info border-0 shadow-sm d-flex align-items-center">
                        <i class="bi bi-info-circle-fill fs-3 text-info me-3"></i>
                        <div>
                            <strong>Registration Fee:</strong> The system will automatically charge ₹500 for ages 0-10, and ₹1000 for ages 11-15. This amount will be deducted from your wallet upon approval.
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('children.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-check-circle me-1"></i> Register & Generate Bond</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function fetchLocations(url, targetSelectId, selectedValue = null) {
        const targetSelect = document.getElementById(targetSelectId);
        targetSelect.innerHTML = '<option value="">Loading...</option>';
        targetSelect.disabled = true;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                targetSelect.innerHTML = '<option value="">-- Select --</option>';
                data.forEach(item => {
                    let isSelected = (selectedValue == item.id) ? 'selected' : '';
                    targetSelect.innerHTML += `<option value="${item.id}" ${isSelected}>${item.name}</option>`;
                });
                targetSelect.disabled = false;
                
                // Trigger change event if there is a selected value so the chain continues
                if(selectedValue) {
                    targetSelect.dispatchEvent(new Event('change'));
                }
            });
    }

    const stateSelect = document.getElementById('state_id');
    const districtSelect = document.getElementById('district_id');
    const blockSelect = document.getElementById('block_id');
    const panchayatSelect = document.getElementById('panchayat_id');

    stateSelect.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/districts/' + this.value, 'district_id');
    });

    districtSelect.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/blocks/' + this.value, 'block_id');
    });

    blockSelect.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/panchayats/' + this.value, 'panchayat_id');
    });

    panchayatSelect.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/villages/' + this.value, 'village_id');
    });

    // Auto-load if old values exist
    const oldState = "{{ old('state_id') }}";
    const oldDistrict = "{{ old('district_id') }}";
    const oldBlock = "{{ old('block_id') }}";
    const oldPanchayat = "{{ old('panchayat_id') }}";
    const oldVillage = "{{ old('village_id') }}";

    if (oldState) {
        fetchLocations('/api/locations/districts/' + oldState, 'district_id', oldDistrict);
        // The chain will continue automatically via the dispatchEvent inside fetchLocations
        
        // Setup timeout to continue chain if needed since fetch is async
        setTimeout(() => {
            if (oldDistrict) fetchLocations('/api/locations/blocks/' + oldDistrict, 'block_id', oldBlock);
        }, 500);
        
        setTimeout(() => {
            if (oldBlock) fetchLocations('/api/locations/panchayats/' + oldBlock, 'panchayat_id', oldPanchayat);
        }, 1000);
        
        setTimeout(() => {
            if (oldPanchayat) fetchLocations('/api/locations/villages/' + oldPanchayat, 'village_id', oldVillage);
        }, 1500);
    }
});
</script>
@endpush
@endsection
