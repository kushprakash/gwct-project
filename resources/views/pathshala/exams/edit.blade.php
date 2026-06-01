@extends('layouts.admin')

@section('title', 'Edit Exam - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('pathshala-exams.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Exams</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 col-md-10 mx-auto">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Edit Exam: {{ $pathshalaExam->name }}</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pathshala-exams.update', $pathshalaExam->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-medium">Exam Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $pathshalaExam->name) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-medium">Session Year <span class="text-danger">*</span></label>
                    <input type="text" name="session_year" class="form-control" value="{{ old('session_year', $pathshalaExam->session_year) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-medium">Class Level</label>
                    <input type="text" class="form-control bg-light" value="Class {{ $pathshalaExam->class_level }}" readonly>
                    <!-- We don't allow changing class after creation to avoid breaking results -->
                </div>
            </div>

            <hr class="my-4">
            
            <h6 class="fw-bold mb-3">Update Subjects & Assign Marks</h6>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%"><input type="checkbox" id="checkAll" class="form-check-input"></th>
                            <th width="25%">Subject</th>
                            <th width="25%">Exam Date</th>
                            <th width="20%">Total Marks</th>
                            <th width="20%">Passing Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                            @php
                                $examSubject = $pathshalaExam->examSubjects->firstWhere('pathshala_subject_id', $subject->id);
                                $isChecked = $examSubject ? true : false;
                            @endphp
                            <tr>
                                <td>
                                    <input class="form-check-input subject-checkbox" type="checkbox" name="subjects[]" value="{{ $subject->id }}" {{ $isChecked ? 'checked' : '' }} onchange="toggleInputs(this, {{ $subject->id }})">
                                </td>
                                <td class="fw-medium">{{ $subject->name }}</td>
                                <td>
                                    <input type="date" name="exam_dates[{{ $subject->id }}]" class="form-control form-control-sm" id="date_{{ $subject->id }}" value="{{ $isChecked && $examSubject->exam_date ? $examSubject->exam_date->format('Y-m-d') : '' }}" {{ $isChecked ? 'required' : 'disabled' }}>
                                </td>
                                <td>
                                    <input type="number" name="total_marks[{{ $subject->id }}]" class="form-control form-control-sm" value="{{ $isChecked ? $examSubject->total_marks : '100' }}" min="1" id="total_{{ $subject->id }}" {{ $isChecked ? 'required' : 'disabled' }}>
                                </td>
                                <td>
                                    <input type="number" name="passing_marks[{{ $subject->id }}]" class="form-control form-control-sm" value="{{ $isChecked ? $examSubject->passing_marks : '30' }}" min="1" id="passing_{{ $subject->id }}" {{ $isChecked ? 'required' : 'disabled' }}>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4" id="submit_btn">Update Exam</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    checkSubmitButton();

    document.getElementById('checkAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.subject-checkbox');
        checkboxes.forEach(cb => {
            cb.checked = this.checked;
            toggleInputs(cb, cb.value);
        });
        checkSubmitButton();
    });

    const individualCheckboxes = document.querySelectorAll('.subject-checkbox');
    individualCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            checkSubmitButton();
        });
    });
});

function toggleInputs(checkbox, subjectId) {
    const isChecked = checkbox.checked;
    document.getElementById('date_' + subjectId).disabled = !isChecked;
    document.getElementById('total_' + subjectId).disabled = !isChecked;
    document.getElementById('passing_' + subjectId).disabled = !isChecked;
    
    if (isChecked) {
        document.getElementById('date_' + subjectId).setAttribute('required', 'required');
        document.getElementById('total_' + subjectId).setAttribute('required', 'required');
        document.getElementById('passing_' + subjectId).setAttribute('required', 'required');
    } else {
        document.getElementById('date_' + subjectId).removeAttribute('required');
        document.getElementById('total_' + subjectId).removeAttribute('required');
        document.getElementById('passing_' + subjectId).removeAttribute('required');
    }
}

function checkSubmitButton() {
    const checked = document.querySelectorAll('.subject-checkbox:checked').length;
    document.getElementById('submit_btn').disabled = checked === 0;
}
</script>
@endsection
