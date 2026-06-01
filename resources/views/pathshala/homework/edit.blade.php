@extends('layouts.admin')

@section('title', 'Edit Homework - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('pathshala-homework.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Homework</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 col-md-8 mx-auto">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Edit Homework</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pathshala-homework.update', $pathshalaHomework->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-medium">Homework Date <span class="text-danger">*</span></label>
                    <input type="date" name="homework_date" class="form-control" value="{{ old('homework_date', $pathshalaHomework->homework_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Select Subject & Class <span class="text-danger">*</span></label>
                    <select name="pathshala_subject_id" class="form-select" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ old('pathshala_subject_id', $pathshalaHomework->pathshala_subject_id) == $subject->id ? 'selected' : '' }}>
                                Class {{ $subject->class_level }} - {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium">Homework Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $pathshalaHomework->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium">Description Details</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $pathshalaHomework->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-medium">Update Attachment</label>
                <input type="file" name="attachment" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                <small class="text-muted d-block mt-1">Leave empty to keep existing attachment.</small>
                
                @if($pathshalaHomework->attachment)
                    <div class="mt-2">
                        <a href="{{ asset('storage/' . $pathshalaHomework->attachment) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-paperclip"></i> View Current Attachment</a>
                    </div>
                @endif
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update Homework</button>
            </div>
        </form>
    </div>
</div>
@endsection
