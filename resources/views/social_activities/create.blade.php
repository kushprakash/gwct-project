@extends('layouts.admin')

@section('title', 'Add Social Activity')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('social-activities.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Activities</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('social-activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Activity Category <span class="text-danger">*</span></label>
                    <select name="activity_category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('activity_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Location / Village <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Beneficiary Count <span class="text-danger">*</span></label>
                    <input type="number" name="beneficiary_count" class="form-control" value="{{ old('beneficiary_count', 0) }}" min="0" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-medium">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-medium">Upload Photos (Multiple)</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">You can select multiple images. Max 2MB per image.</small>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Save Activity</button>
            </div>
        </form>
    </div>
</div>
@endsection
