@extends('layouts.admin')

@section('title', 'Edit Student - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('pathshala-students.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Students</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Edit Student Details</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pathshala-students.update', $pathshalaStudent->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <h6 class="fw-bold mb-3 text-primary">1. Personal Information</h6>
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Student Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $pathshalaStudent->name) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Class <span class="text-danger">*</span></label>
                    <select name="class_level" class="form-select" required>
                        <option value="1" {{ old('class_level', $pathshalaStudent->class_level) == '1' ? 'selected' : '' }}>Class 1</option>
                        <option value="2" {{ old('class_level', $pathshalaStudent->class_level) == '2' ? 'selected' : '' }}>Class 2</option>
                        <option value="3" {{ old('class_level', $pathshalaStudent->class_level) == '3' ? 'selected' : '' }}>Class 3</option>
                        <option value="4" {{ old('class_level', $pathshalaStudent->class_level) == '4' ? 'selected' : '' }}>Class 4</option>
                        <option value="5" {{ old('class_level', $pathshalaStudent->class_level) == '5' ? 'selected' : '' }}>Class 5</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" name="dob" class="form-control" value="{{ old('dob', $pathshalaStudent->dob->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Gender <span class="text-danger">*</span></label>
                    <select name="gender" class="form-select" required>
                        <option value="Male" {{ old('gender', $pathshalaStudent->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $pathshalaStudent->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $pathshalaStudent->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Father's Name <span class="text-danger">*</span></label>
                    <input type="text" name="father_name" class="form-control" value="{{ old('father_name', $pathshalaStudent->father_name) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Mother's Name</label>
                    <input type="text" name="mother_name" class="form-control" value="{{ old('mother_name', $pathshalaStudent->mother_name) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $pathshalaStudent->mobile) }}" required>
                </div>
            </div>

            <h6 class="fw-bold mb-3 text-primary">2. Location Details</h6>
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">State <span class="text-danger">*</span></label>
                    <select name="state_id" id="state_id" class="form-select" required>
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ old('state_id', $pathshalaStudent->state_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">District ID <span class="text-danger">*</span></label>
                    <!-- In a real app, you'd populate this via JS based on selected state, but we'll use a text field for simplicity if JS fails -->
                    <input type="text" name="district_id" id="district_id_input" class="form-control" value="{{ old('district_id', $pathshalaStudent->district_id) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Block ID <span class="text-danger">*</span></label>
                    <input type="text" name="block_id" id="block_id_input" class="form-control" value="{{ old('block_id', $pathshalaStudent->block_id) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Panchayat ID <span class="text-danger">*</span></label>
                    <input type="text" name="panchayat_id" id="panchayat_id_input" class="form-control" value="{{ old('panchayat_id', $pathshalaStudent->panchayat_id) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Village ID <span class="text-danger">*</span></label>
                    <input type="text" name="village_id" id="village_id_input" class="form-control" value="{{ old('village_id', $pathshalaStudent->village_id) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $pathshalaStudent->address) }}">
                </div>
            </div>

            <h6 class="fw-bold mb-3 text-primary">3. Documents & Status</h6>
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Update Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    @if($pathshalaStudent->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $pathshalaStudent->photo) }}" alt="Current Photo" class="img-thumbnail" width="100">
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Student Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="Active" {{ old('status', $pathshalaStudent->status) == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Graduated" {{ old('status', $pathshalaStudent->status) == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                        <option value="Dropout" {{ old('status', $pathshalaStudent->status) == 'Dropout' ? 'selected' : '' }}>Dropout</option>
                    </select>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update Student</button>
            </div>
        </form>
    </div>
</div>
@endsection
