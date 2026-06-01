@extends('layouts.admin')

@section('title', 'Social Activities')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Social Activities</h5>
        <div>
            <a href="{{ route('gallery.index') }}" target="_blank" class="btn btn-outline-primary shadow-sm me-2"><i class="bi bi-images me-1"></i> Public Gallery</a>
            <a href="{{ route('social-activities.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-circle me-1"></i> Add Activity</a>
        </div>
    </div>
    <div class="card-body pt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Beneficiaries</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $activity)
                        <tr>
                            <td>{{ $activity->date->format('d M, Y') }}</td>
                            <td><span class="badge bg-secondary bg-opacity-10 text-secondary">{{ $activity->category->name }}</span></td>
                            <td class="fw-medium">{{ Str::limit($activity->title, 40) }}</td>
                            <td>{{ $activity->location }}</td>
                            <td>{{ $activity->beneficiary_count }}</td>
                            <td>
                                <a href="{{ route('social-activities.show', $activity->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('social-activities.edit', $activity->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('social-activities.destroy', $activity->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-light border text-danger" onclick="return confirm('Delete this activity?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No social activities found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $activities->links() }}
        </div>
    </div>
</div>
@endsection
