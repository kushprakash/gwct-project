@extends('layouts.admin')

@section('title', 'Role & Permission Master')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Create New Role</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g., Accountant">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 shadow-sm">Save Role</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Existing Roles</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Role Name</th>
                                <th>Permissions Count</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td><span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 fs-6">{{ $role->name }}</span></td>
                                <td>{{ $role->permissions->count() }} permissions</td>
                                <td class="text-end">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-shield-check me-1"></i> Permissions</a>
                                    @if($role->name !== 'Super Admin')
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger" onclick="return confirm('Delete this role?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
