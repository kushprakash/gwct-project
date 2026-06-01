@extends('layouts.admin')

@section('title', 'Exam Management - Gramin Pathshala')

@section('content')
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-4">
        <form action="{{ route('pathshala-exams.index') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-medium">Filter by Class Level</label>
                <select name="class_level" class="form-select" onchange="this.form.submit()">
                    <option value="">All Classes</option>
                    <option value="1" {{ request('class_level') == '1' ? 'selected' : '' }}>Class 1</option>
                    <option value="2" {{ request('class_level') == '2' ? 'selected' : '' }}>Class 2</option>
                    <option value="3" {{ request('class_level') == '3' ? 'selected' : '' }}>Class 3</option>
                    <option value="4" {{ request('class_level') == '4' ? 'selected' : '' }}>Class 4</option>
                    <option value="5" {{ request('class_level') == '5' ? 'selected' : '' }}>Class 5</option>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Exam Management</h5>
        <a href="{{ route('pathshala-exams.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-circle me-1"></i> Create Exam</a>
    </div>
    <div class="card-body pt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Exam Name</th>
                        <th>Class</th>
                        <th>Subjects Included</th>
                        <th>Session</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($exams as $exam)
                        <tr>
                            <td class="fw-bold">{{ $exam->name }}</td>
                            <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Class {{ $exam->class_level }}</span></td>
                            <td>
                                @foreach($exam->examSubjects as $es)
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle me-1 mb-1">{{ $es->subject->name ?? 'Unknown' }}</span>
                                @endforeach
                            </td>
                            <td><span class="badge bg-info bg-opacity-10 text-info">{{ $exam->session_year }}</span></td>
                            <td>
                                <a href="{{ route('pathshala-exams.edit', $exam->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-pencil text-primary"></i></a>
                                <form action="{{ route('pathshala-exams.destroy', $exam->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-light border" onclick="return confirm('Delete this exam?')"><i class="bi bi-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No exams found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $exams->links() }}
        </div>
    </div>
</div>
@endsection
