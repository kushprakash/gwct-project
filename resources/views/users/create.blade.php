@extends('layouts.admin')

@section('title', 'Create User in Hierarchy')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Register Network Node</h5>
                <p class="text-muted small">The user will automatically be assigned under your hierarchy branch.</p>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    
                    <h6 class="fw-bold mb-3 border-bottom pb-2">Basic Details</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address (Optional)</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Aadhaar Number (Optional)</label>
                            <input type="text" name="aadhaar" class="form-control">
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 border-bottom pb-2">Role & Location Mapping</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label class="form-label text-primary fw-medium">Select Hierarchy Level to Create</label>
                            <select name="user_type" id="user_type" class="form-select border-primary" required>
                                <option value="">-- Select Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dynamic Location Selectors -->
                        <div class="col-md-4 location-group" id="group_state" style="display:none;">
                            <label class="form-label">State</label>
                            <select name="state_id" id="state_id" class="form-select">
                                <option value="">-- Select State --</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 location-group" id="group_district" style="display:none;">
                            <label class="form-label">District</label>
                            <select name="district_id" id="district_id" class="form-select" disabled>
                                <option value="">-- Select District --</option>
                            </select>
                        </div>

                        <div class="col-md-4 location-group" id="group_block" style="display:none;">
                            <label class="form-label">Block</label>
                            <select name="block_id" id="block_id" class="form-select" disabled>
                                <option value="">-- Select Block --</option>
                            </select>
                        </div>

                        <div class="col-md-6 location-group" id="group_panchayat" style="display:none;">
                            <label class="form-label">Panchayat</label>
                            <select name="panchayat_id" id="panchayat_id" class="form-select" disabled>
                                <option value="">-- Select Panchayat --</option>
                            </select>
                        </div>

                        <div class="col-md-6 location-group" id="group_village" style="display:none;">
                            <label class="form-label">Village</label>
                            <select name="village_id" id="village_id" class="form-select" disabled>
                                <option value="">-- Select Village --</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">Create User Node</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Role selection logic to show/hide location fields
    document.getElementById('user_type').addEventListener('change', function() {
        const role = this.value;
        const groups = document.querySelectorAll('.location-group');
        groups.forEach(g => g.style.display = 'none');
        
        // Very basic logic to show fields based on role selected. 
        // A Village User needs State->Dist->Block->Panchayat->Village selected.
        if(role) {
            document.getElementById('group_state').style.display = 'block';
            if(['Channel Partner', 'District User', 'Block User', 'Panchayat User', 'Village User'].includes(role)) {
                document.getElementById('group_district').style.display = 'block';
            }
            if(['Block User', 'Panchayat User', 'Village User'].includes(role)) {
                document.getElementById('group_block').style.display = 'block';
            }
            if(['Panchayat User', 'Village User'].includes(role)) {
                document.getElementById('group_panchayat').style.display = 'block';
            }
            if(role === 'Village User') {
                document.getElementById('group_village').style.display = 'block';
            }
        }
    });

    // AJAX fetching logic
    function fetchLocations(url, targetSelectId) {
        const targetSelect = document.getElementById(targetSelectId);
        targetSelect.innerHTML = '<option value="">Loading...</option>';
        targetSelect.disabled = true;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                targetSelect.innerHTML = '<option value="">-- Select --</option>';
                data.forEach(item => {
                    targetSelect.innerHTML += `<option value="${item.id}">${item.name}</option>`;
                });
                targetSelect.disabled = false;
            });
    }

    document.getElementById('state_id').addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/districts/' + this.value, 'district_id');
        else document.getElementById('district_id').innerHTML = '<option value="">-- Select District --</option>';
    });

    document.getElementById('district_id').addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/blocks/' + this.value, 'block_id');
        else document.getElementById('block_id').innerHTML = '<option value="">-- Select Block --</option>';
    });

    document.getElementById('block_id').addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/panchayats/' + this.value, 'panchayat_id');
        else document.getElementById('panchayat_id').innerHTML = '<option value="">-- Select Panchayat --</option>';
    });

    document.getElementById('panchayat_id').addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/villages/' + this.value, 'village_id');
        else document.getElementById('village_id').innerHTML = '<option value="">-- Select Village --</option>';
    });
});
</script>
@endpush
@endsection
