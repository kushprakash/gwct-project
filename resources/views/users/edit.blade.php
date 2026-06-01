@extends('layouts.admin')

@section('title', 'Edit User & Permissions')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Manage User: <span class="text-primary">{{ $user->name }}</span></h5>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Users</a>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <h6 class="fw-bold mb-3 border-bottom pb-2">Basic Details & Role</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-primary fw-bold">Assigned Role</label>
                            <select name="user_type" class="form-select border-primary" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 border-bottom pb-2">Assign Extra (User-wise) Permissions</h6>
                    <p class="text-muted small">Select any additional permissions you want this specific user to have, overriding their base role restrictions.</p>

                    <div class="row g-4 mb-4">
                        @foreach($permissions as $module => $perms)
                        <div class="col-12">
                            <div class="card border-0 bg-light rounded-3 shadow-sm">
                                <div class="card-header bg-white border-bottom-0 pb-0 pt-3">
                                    <h6 class="fw-bold text-success mb-0"><i class="bi bi-plus-circle me-2"></i>{{ $module ?: 'Uncategorized' }} Extra Access</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        @foreach($perms as $permission)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check form-switch bg-white p-2 rounded border">
                                                <input class="form-check-input ms-0 me-2" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="u_perm_{{ $permission->id }}" 
                                                    {{ in_array($permission->name, $userDirectPermissions) ? 'checked' : '' }}>
                                                <label class="form-check-label d-block ms-5" for="u_perm_{{ $permission->id }}" style="cursor: pointer; font-size:0.9rem;">
                                                    {{ ucfirst(str_replace('_', ' ', $permission->name)) }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success px-4 shadow-sm">Save User Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
