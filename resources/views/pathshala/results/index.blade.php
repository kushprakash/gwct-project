@extends('layouts.admin')

@section('title', 'Update Results - Gramin Pathshala')

@section('content')
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-4">
        <form action="{{ route('pathshala-results.index') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label fw-medium">Select Exam <span class="text-danger">*</span></label>
                <select name="exam_id" class="form-select" onchange="this.form.submit()" required>
                    <option value="">Choose an exam...</option>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->id }}" {{ $exam_id == $exam->id ? 'selected' : '' }}>
                            {{ $exam->name }} - Class {{ $exam->class_level }} ({{ $exam->session_year }})
                        </option>
                    @endforeach
                </select>
            </div>
            @if($selectedExam)
                <div class="col-md-5">
                    <label class="form-label fw-medium">Select Subject <span class="text-danger">*</span></label>
                    <select name="exam_subject_id" class="form-select" onchange="this.form.submit()" required>
                        <option value="">Choose a subject to grade...</option>
                        @foreach($examSubjects as $es)
                            <option value="{{ $es->id }}" {{ $exam_subject_id == $es->id ? 'selected' : '' }}>
                                {{ $es->subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        </form>
    </div>
</div>

@if($selectedExamSubject)
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Update Marks: {{ $selectedExam->name }} - {{ $selectedExamSubject->subject->name }}</h5>
            <span class="badge bg-light text-dark border"><i class="bi bi-info-circle me-1"></i> Total Marks: {{ $selectedExamSubject->total_marks }} | Passing: {{ $selectedExamSubject->passing_marks }}</span>
        </div>
        <div class="card-body pt-3">
            @if($students->count() > 0)
                <form action="{{ route('pathshala-results.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="exam_subject_id" value="{{ $selectedExamSubject->id }}">
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="15%">Reg. No</th>
                                    <th width="30%">Student Name</th>
                                    <th width="25%">Marks Obtained (out of {{ $selectedExamSubject->total_marks }})</th>
                                    <th width="15%">Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    @php
                                        $result = $results->get($student->id);
                                        $marks = $result ? $result->marks_obtained : '';
                                        $grade = $result ? $result->grade : '-';
                                    @endphp
                                    <tr>
                                        <td><span class="text-muted fw-medium">{{ $student->registration_no }}</span></td>
                                        <td class="fw-bold">{{ $student->name }}</td>
                                        <td>
                                            <input type="number" name="marks[{{ $student->id }}]" class="form-control form-control-sm" value="{{ $marks }}" min="0" max="{{ $selectedExamSubject->total_marks }}" step="0.01" placeholder="Enter marks">
                                        </td>
                                        <td>
                                            @if($grade == 'F')
                                                <span class="badge bg-danger">F (Fail)</span>
                                            @elseif($grade != '-')
                                                <span class="badge bg-success">{{ $grade }}</span>
                                            @else
                                                <span class="text-muted small">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-5">Save Results</button>
                    </div>
                </form>
            @else
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-people fs-1 d-block mb-3"></i>
                    <h5>No Students Found</h5>
                    <p>There are no students registered for Class {{ $selectedExam->class_level }} under your account.</p>
                </div>
            @endif
        </div>
    </div>
@endif
@endsection
