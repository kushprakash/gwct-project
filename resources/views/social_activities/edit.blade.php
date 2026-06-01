@extends('layouts.admin')

@section('title', 'Edit Social Activity')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('social-activities.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Activities</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('social-activities.update', $socialActivity->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Activity Category <span class="text-danger">*</span></label>
                    <select name="activity_category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('activity_category_id', $socialActivity->activity_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $socialActivity->title) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control" value="{{ old('date', $socialActivity->date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Location / Village <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $socialActivity->location) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-medium">Beneficiary Count <span class="text-danger">*</span></label>
                    <input type="number" name="beneficiary_count" class="form-control" value="{{ old('beneficiary_count', $socialActivity->beneficiary_count) }}" min="0" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-medium">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $socialActivity->description) }}</textarea>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-medium">Current Photos</label>
                    @if($socialActivity->images && count($socialActivity->images) > 0)
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @foreach($socialActivity->images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Activity Photo" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted small">No photos uploaded.</p>
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-medium">Add More Photos</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">These will be added to the existing photos. Max 2MB per image.</small>
                </div>
                
                <div class="col-md-12 mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch" name="status" value="1" {{ $socialActivity->status ? 'checked' : '' }}>
                        <label class="form-check-label fw-medium" for="statusSwitch">Publicly Visible</label>
                    </div>
                </div>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update Activity</button>
            </div>
        </form>
    </div>
</div>
@endsection
