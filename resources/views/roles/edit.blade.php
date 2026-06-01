@extends('layouts.admin')

@section('title', 'Assign Permissions: ' . $role->name)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Manage Role: <span class="text-primary">{{ $role->name }}</span></h5>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Roles</a>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Role Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
                    </div>

                    <h6 class="fw-bold mb-3 border-bottom pb-2">Assign Permissions (By Module)</h6>
                    
                    @php 
                        // Group permissions by module if not already grouped
                        $groupedPermissions = $permissions->groupBy('module_name');
                    @endphp

                    <div class="row g-4 mb-4">
                        @foreach($groupedPermissions as $module => $perms)
                        <div class="col-12">
                            <div class="card border-0 bg-light rounded-3 shadow-sm">
                                <div class="card-header bg-white border-bottom-0 pb-0 pt-3">
                                    <h6 class="fw-bold text-primary mb-0"><i class="bi bi-folder2-open me-2"></i>{{ $module ?: 'Uncategorized' }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        @foreach($perms as $permission)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check form-switch bg-white p-2 rounded border">
                                                <input class="form-check-input ms-0 me-2" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}" 
                                                    {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                                <label class="form-check-label d-block ms-5" for="perm_{{ $permission->id }}" style="cursor: pointer; font-size:0.9rem;">
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
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">Update Role & Permissions</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
