@extends('layouts.admin')

@section('title', 'Homework Management - Gramin Pathshala')

@section('content')
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-4">
        <form action="{{ route('pathshala-homework.index') }}" method="GET" class="row g-3 align-items-end">
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
        <h5 class="mb-0 fw-bold">Homework Assignments</h5>
        <a href="{{ route('pathshala-homework.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-circle me-1"></i> Add Homework</a>
    </div>
    <div class="card-body pt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Title</th>
                        <th>Attachment</th>
                        <th>Teacher</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($homeworks as $hw)
                        <tr>
                            <td><span class="text-muted fw-medium">{{ $hw->homework_date->format('d M, Y') }}</span></td>
                            <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Class {{ $hw->class_level }}</span></td>
                            <td class="fw-bold">{{ $hw->subject->name ?? 'N/A' }}</td>
                            <td>{{ Str::limit($hw->title, 30) }}</td>
                            <td>
                                @if($hw->attachment)
                                    <a href="{{ asset('storage/' . $hw->attachment) }}" target="_blank" class="btn btn-sm btn-light border text-primary"><i class="bi bi-paperclip"></i> View</a>
                                @else
                                    <span class="text-muted small">None</span>
                                @endif
                            </td>
                            <td>{{ $hw->teacher->name ?? 'Unknown' }}</td>
                            <td>
                                <a href="{{ route('pathshala-homework.edit', $hw->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('pathshala-homework.destroy', $hw->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-light border text-danger" onclick="return confirm('Delete this homework?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No homework assignments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $homeworks->links() }}
        </div>
    </div>
</div>
@endsection
