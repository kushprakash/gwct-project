@extends('layouts.admin')

@section('title', 'Activity Categories')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Activity Categories</h5>
        <a href="{{ route('activity-categories.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-circle me-1"></i> Add Category</a>
    </div>
    <div class="card-body pt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td class="fw-medium">{{ $category->name }}</td>
                            <td>
                                @if($category->status)
                                    <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Active</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('activity-categories.edit', $category->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('activity-categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-light border text-danger" onclick="return confirm('Delete this category?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
