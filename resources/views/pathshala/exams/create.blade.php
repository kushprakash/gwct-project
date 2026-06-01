@extends('layouts.admin')

@section('title', 'Create Exam - Gramin Pathshala')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('pathshala-exams.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Exams</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 col-md-10 mx-auto">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Create New Exam (Multiple Subjects)</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('pathshala-exams.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-medium">Exam Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Mid Term Exam" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-medium">Session Year <span class="text-danger">*</span></label>
                    <input type="text" name="session_year" class="form-control" value="{{ old('session_year', date('Y').'-'.(date('Y')+1)) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-medium">Class Level <span class="text-danger">*</span></label>
                    <select name="class_level" id="class_level" class="form-select" required>
                        <option value="">Select Class</option>
                        <option value="1">Class 1</option>
                        <option value="2">Class 2</option>
                        <option value="3">Class 3</option>
                        <option value="4">Class 4</option>
                        <option value="5">Class 5</option>
                    </select>
                </div>
            </div>

            <hr class="my-4">
            
            <h6 class="fw-bold mb-3">Select Subjects & Assign Marks</h6>
            <div id="subjects_container" class="table-responsive">
                <p class="text-muted small">Please select a class first to load subjects.</p>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4" id="submit_btn" disabled>Create Exam</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const classSelect = document.getElementById('class_level');
    const subjectsContainer = document.getElementById('subjects_container');
    const submitBtn = document.getElementById('submit_btn');

    classSelect.addEventListener('change', function() {
        const classLevel = this.value;
        if (!classLevel) {
            subjectsContainer.innerHTML = '<p class="text-muted small">Please select a class first to load subjects.</p>';
            submitBtn.disabled = true;
            return;
        }

        subjectsContainer.innerHTML = '<div class="text-center"><div class="spinner-border text-primary spinner-border-sm" role="status"></div> Loading subjects...</div>';

        fetch(`{{ route('pathshala-exams.get-subjects') }}?class_level=${classLevel}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    subjectsContainer.innerHTML = '<div class="alert alert-warning py-2">No active subjects found for Class ' + classLevel + '. Please add subjects first.</div>';
                    submitBtn.disabled = true;
                    return;
                }

                let html = `
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
                `;

                data.forEach(subject => {
                    html += `
                        <tr>
                            <td>
                                <input class="form-check-input subject-checkbox" type="checkbox" name="subjects[]" value="${subject.id}" onchange="toggleInputs(this, ${subject.id})">
                            </td>
                            <td class="fw-medium">${subject.name}</td>
                            <td>
                                <input type="date" name="exam_dates[${subject.id}]" class="form-control form-control-sm" id="date_${subject.id}" disabled>
                            </td>
                            <td>
                                <input type="number" name="total_marks[${subject.id}]" class="form-control form-control-sm" value="100" min="1" id="total_${subject.id}" disabled>
                            </td>
                            <td>
                                <input type="number" name="passing_marks[${subject.id}]" class="form-control form-control-sm" value="30" min="1" id="passing_${subject.id}" disabled>
                            </td>
                        </tr>
                    `;
                });

                html += `</tbody></table>`;
                subjectsContainer.innerHTML = html;

                // Handle Check All
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
            })
            .catch(error => {
                subjectsContainer.innerHTML = '<div class="text-danger">Failed to load subjects.</div>';
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
