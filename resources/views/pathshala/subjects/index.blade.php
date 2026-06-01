@extends('layouts.admin')

@section('title', 'Subject Management - Gramin Pathshala')

@section('content')
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-4">
        <form action="{{ route('pathshala-subjects.index') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-medium">Filter by Class Level</label>
                <select name="class_level" class="form-select" onchange="this.form.submit()">
                    <option value="">All Classes</option>
                    <option value="1" {{ $class_level == 1 ? 'selected' : '' }}>Class 1</option>
                    <option value="2" {{ $class_level == 2 ? 'selected' : '' }}>Class 2</option>
                    <option value="3" {{ $class_level == 3 ? 'selected' : '' }}>Class 3</option>
                    <option value="4" {{ $class_level == 4 ? 'selected' : '' }}>Class 4</option>
                    <option value="5" {{ $class_level == 5 ? 'selected' : '' }}>Class 5</option>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Pathshala Subjects</h5>
        <a href="{{ route('pathshala-subjects.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-circle me-1"></i> Add Subject</a>
    </div>
    <div class="card-body pt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Class Level</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subjects as $index => $subject)
                        <tr>
                            <td>{{ $subjects->firstItem() + $index }}</td>
                            <td class="fw-bold text-dark">{{ $subject->name }}</td>
                            <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Class {{ $subject->class_level }}</span></td>
                            <td>
                                @if($subject->status == 'Active')
                                    <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pathshala-subjects.edit', $subject->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-pencil text-primary"></i></a>
                                <form action="{{ route('pathshala-subjects.destroy', $subject->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-light border" onclick="return confirm('Delete this subject?')"><i class="bi bi-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No subjects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $subjects->links() }}
        </div>
    </div>
</div>
@endsection
