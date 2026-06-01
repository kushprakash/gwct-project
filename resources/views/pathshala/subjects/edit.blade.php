@extends('layouts.admin')

@section('title', 'Edit Subject - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('pathshala-subjects.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Subjects</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 col-md-8 mx-auto">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Edit Subject</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pathshala-subjects.update', $pathshalaSubject->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-medium">Subject Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $pathshalaSubject->name) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium">Class Level <span class="text-danger">*</span></label>
                <select name="class_level" class="form-select" required>
                    <option value="1" {{ old('class_level', $pathshalaSubject->class_level) == '1' ? 'selected' : '' }}>Class 1</option>
                    <option value="2" {{ old('class_level', $pathshalaSubject->class_level) == '2' ? 'selected' : '' }}>Class 2</option>
                    <option value="3" {{ old('class_level', $pathshalaSubject->class_level) == '3' ? 'selected' : '' }}>Class 3</option>
                    <option value="4" {{ old('class_level', $pathshalaSubject->class_level) == '4' ? 'selected' : '' }}>Class 4</option>
                    <option value="5" {{ old('class_level', $pathshalaSubject->class_level) == '5' ? 'selected' : '' }}>Class 5</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label fw-medium">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-select" required>
                    <option value="Active" {{ old('status', $pathshalaSubject->status) == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status', $pathshalaSubject->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update Subject</button>
            </div>
        </form>
    </div>
</div>
@endsection
