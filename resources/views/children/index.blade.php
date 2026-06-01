@extends('layouts.admin')

@section('title', 'Child Registration (Bal Vivah Roktham)')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Registered Children</h5>
        <a href="{{ route('children.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-circle me-1"></i> Register New Child</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Registration No</th>
                        <th>Child Name</th>
                        <th>Age</th>
                        <th>Parent Name</th>
                        <th>Fee Paid</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($children as $child)
                    <tr>
                        <td class="fw-bold text-primary">{{ $child->registration_no }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($child->child_photo)
                                    <img src="{{ Storage::url($child->child_photo) }}" class="rounded-circle me-2 object-fit-cover" width="40" height="40" alt="photo">
                                @else
                                    <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person"></i>
                                    </div>
                                @endif
                                <div>
                                    <h6 class="mb-0">{{ $child->name }}</h6>
                                    <small class="text-muted">{{ $child->gender }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $child->age_at_registration }} Yrs</td>
                        <td>
                            <div class="mb-0">{{ $child->parent_name }}</div>
                            <small class="text-muted"><i class="bi bi-telephone"></i> {{ $child->parent_mobile }}</small>
                        </td>
                        <td><span class="badge bg-success">₹{{ $child->registration_fee }}</span></td>
                        <td>
                            @if($child->status)
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Active</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('children.show', $child->id) }}" class="btn btn-sm btn-primary border"><i class="bi bi-printer me-1"></i> Bond</a>
                            <button class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No children registered yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $children->links() }}
        </div>
    </div>
</div>
@endsection
