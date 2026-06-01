@extends('layouts.admin')

@section('title', 'Add Homework - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('pathshala-homework.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Homework</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 col-md-8 mx-auto">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Upload New Homework</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pathshala-homework.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-medium">Homework Date <span class="text-danger">*</span></label>
                    <input type="date" name="homework_date" class="form-control" value="{{ old('homework_date', date('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Select Subject & Class <span class="text-danger">*</span></label>
                    <select name="pathshala_subject_id" class="form-select" required>
                        <option value="">Choose...</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ old('pathshala_subject_id') == $subject->id ? 'selected' : '' }}>
                                Class {{ $subject->class_level }} - {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium">Homework Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g., Complete Exercise 3.2" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium">Description Details</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Optional details about the homework">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-medium">Attachment Document/Image</label>
                <input type="file" name="attachment" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                <small class="text-muted d-block mt-1">Optional. Max 5MB (PDF, Word, or Images).</small>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Upload Homework</button>
            </div>
        </form>
    </div>
</div>
@endsection
