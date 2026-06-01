@extends('layouts.admin')

@section('title', 'Pathshala Attendance')

@section('content')
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-4">
        <form action="{{ route('pathshala-attendance.index') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-medium">Select Class <span class="text-danger">*</span></label>
                <select name="class_level" class="form-select" required>
                    <option value="">Choose...</option>
                    <option value="1" {{ $class_level == 1 ? 'selected' : '' }}>Class 1</option>
                    <option value="2" {{ $class_level == 2 ? 'selected' : '' }}>Class 2</option>
                    <option value="3" {{ $class_level == 3 ? 'selected' : '' }}>Class 3</option>
                    <option value="4" {{ $class_level == 4 ? 'selected' : '' }}>Class 4</option>
                    <option value="5" {{ $class_level == 5 ? 'selected' : '' }}>Class 5</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-medium">Attendance Date <span class="text-danger">*</span></label>
                <input type="date" name="attendance_date" class="form-control" value="{{ $attendance_date }}" required max="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-search me-1"></i> Get Students</button>
            </div>
        </form>
    </div>
</div>

@if($class_level)
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Attendance Sheet: Class {{ $class_level }}</h5>
            <span class="badge bg-light text-dark border"><i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($attendance_date)->format('d M, Y') }}</span>
        </div>
        <div class="card-body pt-3">
            @if($students->count() > 0)
                <form action="{{ route('pathshala-attendance.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="class_level" value="{{ $class_level }}">
                    <input type="hidden" name="attendance_date" value="{{ $attendance_date }}">
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">Reg. No</th>
                                    <th width="25%">Student Name</th>
                                    <th width="15%">Gender</th>
                                    <th width="50%">Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    @php
                                        $status = isset($attendances[$student->id]) ? $attendances[$student->id]->status : 'Present';
                                    @endphp
                                    <tr>
                                        <td><span class="text-muted fw-medium">{{ $student->registration_no }}</span></td>
                                        <td class="fw-bold">{{ $student->name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>
                                            <div class="d-flex gap-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="attendance[{{ $student->id }}]" id="present_{{ $student->id }}" value="Present" {{ $status == 'Present' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-success fw-medium" for="present_{{ $student->id }}">
                                                        Present
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="attendance[{{ $student->id }}]" id="absent_{{ $student->id }}" value="Absent" {{ $status == 'Absent' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-danger fw-medium" for="absent_{{ $student->id }}">
                                                        Absent
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="attendance[{{ $student->id }}]" id="leave_{{ $student->id }}" value="Leave" {{ $status == 'Leave' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-warning fw-medium" for="leave_{{ $student->id }}">
                                                        Leave
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-5">Save Attendance</button>
                    </div>
                </form>
            @else
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-people fs-1 d-block mb-3"></i>
                    <h5>No Active Students Found</h5>
                    <p>There are no students registered for Class {{ $class_level }} under your account.</p>
                </div>
            @endif
        </div>
    </div>
@endif
@endsection
