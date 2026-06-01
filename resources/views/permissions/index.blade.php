@extends('layouts.admin')

@section('title', 'Permission & Module Master')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">Create New Permission</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Module Name</label>
                        <input type="text" name="module_name" class="form-control" required placeholder="e.g., Child Registration" list="moduleList">
                        <datalist id="moduleList">
                            @foreach($permissions as $module => $perms)
                                <option value="{{ $module }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select CRUD Rights to Auto-Generate</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="actions[]" value="view" id="action_view" checked>
                                    <label class="form-check-label" for="action_view">View</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="actions[]" value="create" id="action_create" checked>
                                    <label class="form-check-label" for="action_create">Create</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="actions[]" value="edit" id="action_edit" checked>
                                    <label class="form-check-label" for="action_edit">Edit</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="actions[]" value="delete" id="action_delete" checked>
                                    <label class="form-check-label" for="action_delete">Delete</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 shadow-sm"><i class="bi bi-magic me-1"></i> Auto-Generate Permissions</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Existing Permissions by Module</h5>
            </div>
            <div class="card-body">
                <div class="accordion" id="permissionsAccordion">
                    @forelse($permissions as $module => $perms)
                        @php $moduleSlug = Str::slug($module ?: 'Uncategorized'); @endphp
                        <div class="accordion-item border-0 border-bottom mb-2">
                            <h2 class="accordion-header" id="heading-{{ $moduleSlug }}">
                                <button class="accordion-button bg-light fw-bold text-dark rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $moduleSlug }}">
                                    <i class="bi bi-folder2-open me-2 text-primary"></i> {{ $module ?: 'Uncategorized' }}
                                    <span class="badge bg-secondary ms-auto">{{ $perms->count() }}</span>
                                </button>
                            </h2>
                            <div id="collapse-{{ $moduleSlug }}" class="accordion-collapse collapse show" data-bs-parent="#permissionsAccordion">
                                <div class="accordion-body p-3">
                                    <ul class="list-group list-group-flush">
                                        @foreach($perms as $permission)
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                            <span>
                                                <i class="bi bi-key me-2 text-warning"></i> {{ $permission->name }}
                                            </span>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-link text-danger p-0" onclick="return confirm('Delete this permission?')">Delete</button>
                                            </form>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-muted">No permissions found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
