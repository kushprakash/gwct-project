@extends('layouts.admin')

@section('title', 'Location Master')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="mb-0 fw-bold">Manage Locations</h5>
        
        <ul class="nav nav-tabs mt-3" id="locationTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab == 'states' ? 'active fw-bold' : '' }}" data-bs-toggle="tab" data-bs-target="#states" type="button" role="tab">States</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab == 'districts' ? 'active fw-bold' : '' }}" data-bs-toggle="tab" data-bs-target="#districts" type="button" role="tab">Districts</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab == 'blocks' ? 'active fw-bold' : '' }}" data-bs-toggle="tab" data-bs-target="#blocks" type="button" role="tab">Blocks</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab == 'panchayats' ? 'active fw-bold' : '' }}" data-bs-toggle="tab" data-bs-target="#panchayats" type="button" role="tab">Panchayats</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab == 'villages' ? 'active fw-bold' : '' }}" data-bs-toggle="tab" data-bs-target="#villages" type="button" role="tab">Villages</button>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="locationTabsContent">
            
            <!-- States Tab -->
            <div class="tab-pane fade {{ $activeTab == 'states' ? 'show active' : '' }}" id="states" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <form action="{{ route('locations.store') }}" method="POST" class="p-3 bg-light rounded border">
                            @csrf
                            <input type="hidden" name="type" value="state">
                            <h6 class="fw-bold mb-3">Add New State</h6>
                            <div class="mb-3">
                                <label class="form-label">State Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add State</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light"><tr><th>ID</th><th>State Name</th><th>Status</th><th>Action</th></tr></thead>
                            <tbody>
                                @foreach($states as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="fw-bold">{{ $item->name }}</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <form action="{{ route('locations.destroy', ['id' => $item->id, 'type' => 'state']) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this state?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Districts Tab -->
            <div class="tab-pane fade {{ $activeTab == 'districts' ? 'show active' : '' }}" id="districts" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <form action="{{ route('locations.store') }}" method="POST" class="p-3 bg-light rounded border">
                            @csrf
                            <input type="hidden" name="type" value="district">
                            <h6 class="fw-bold mb-3">Add New District</h6>
                            <div class="mb-3">
                                <label class="form-label">Select State</label>
                                <select name="state_id" class="form-select" required>
                                    @foreach($states as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">District Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add District</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light"><tr><th>ID</th><th>District Name</th><th>State</th><th>Action</th></tr></thead>
                            <tbody>
                                @foreach($districts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="fw-bold">{{ $item->name }}</td>
                                    <td>{{ $item->state->name ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('locations.destroy', ['id' => $item->id, 'type' => 'district']) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this district?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Blocks Tab -->
            <div class="tab-pane fade {{ $activeTab == 'blocks' ? 'show active' : '' }}" id="blocks" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <form action="{{ route('locations.store') }}" method="POST" class="p-3 bg-light rounded border">
                            @csrf
                            <input type="hidden" name="type" value="block">
                            <h6 class="fw-bold mb-3">Add New Block</h6>
                            <div class="mb-3">
                                <label class="form-label">Select State</label>
                                <select id="block_state_id" class="form-select" required>
                                    <option value="">-- Select State --</option>
                                    @foreach($states as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select District</label>
                                <select name="district_id" id="block_district_id" class="form-select" required disabled>
                                    <option value="">-- Select District --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Block Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add Block</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light"><tr><th>ID</th><th>Block Name</th><th>District</th><th>Action</th></tr></thead>
                            <tbody>
                                @foreach($blocks as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="fw-bold">{{ $item->name }}</td>
                                    <td>{{ $item->district->name ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('locations.destroy', ['id' => $item->id, 'type' => 'block']) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this block?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Panchayats Tab -->
            <div class="tab-pane fade {{ $activeTab == 'panchayats' ? 'show active' : '' }}" id="panchayats" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <form action="{{ route('locations.store') }}" method="POST" class="p-3 bg-light rounded border">
                            @csrf
                            <input type="hidden" name="type" value="panchayat">
                            <h6 class="fw-bold mb-3">Add New Panchayat</h6>
                            <div class="mb-3">
                                <label class="form-label">Select State</label>
                                <select id="panchayat_state_id" class="form-select" required>
                                    <option value="">-- Select State --</option>
                                    @foreach($states as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select District</label>
                                <select id="panchayat_district_id" class="form-select" required disabled>
                                    <option value="">-- Select District --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Block</label>
                                <select name="block_id" id="panchayat_block_id" class="form-select" required disabled>
                                    <option value="">-- Select Block --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Panchayat Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add Panchayat</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light"><tr><th>ID</th><th>Panchayat Name</th><th>Block</th><th>Action</th></tr></thead>
                            <tbody>
                                @foreach($panchayats as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="fw-bold">{{ $item->name }}</td>
                                    <td>{{ $item->block->name ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('locations.destroy', ['id' => $item->id, 'type' => 'panchayat']) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this panchayat?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Villages Tab -->
            <div class="tab-pane fade {{ $activeTab == 'villages' ? 'show active' : '' }}" id="villages" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <form action="{{ route('locations.store') }}" method="POST" class="p-3 bg-light rounded border">
                            @csrf
                            <input type="hidden" name="type" value="village">
                            <h6 class="fw-bold mb-3">Add New Village</h6>
                            <div class="mb-3">
                                <label class="form-label">Select State</label>
                                <select id="village_state_id" class="form-select" required>
                                    <option value="">-- Select State --</option>
                                    @foreach($states as $s) <option value="{{ $s->id }}">{{ $s->name }}</option> @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select District</label>
                                <select id="village_district_id" class="form-select" required disabled>
                                    <option value="">-- Select District --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Block</label>
                                <select id="village_block_id" class="form-select" required disabled>
                                    <option value="">-- Select Block --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Panchayat</label>
                                <select name="panchayat_id" id="village_panchayat_id" class="form-select" required disabled>
                                    <option value="">-- Select Panchayat --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Village Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add Village</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light"><tr><th>ID</th><th>Village Name</th><th>Panchayat</th><th>Action</th></tr></thead>
                            <tbody>
                                @foreach($villages as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="fw-bold">{{ $item->name }}</td>
                                    <td>{{ $item->panchayat->name ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('locations.destroy', ['id' => $item->id, 'type' => 'village']) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this village?')"><i class="bi bi-trash"></i></button>
                                        </form>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    function fetchLocations(url, targetSelectId) {
        const targetSelect = document.getElementById(targetSelectId);
        targetSelect.innerHTML = '<option value="">Loading...</option>';
        targetSelect.disabled = true;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                targetSelect.innerHTML = '<option value="">-- Select --</option>';
                data.forEach(item => {
                    targetSelect.innerHTML += `<option value="${item.id}">${item.name}</option>`;
                });
                targetSelect.disabled = false;
            });
    }

    // Block Form
    const blockState = document.getElementById('block_state_id');
    if(blockState) blockState.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/districts/' + this.value, 'block_district_id');
    });

    // Panchayat Form
    const panchayatState = document.getElementById('panchayat_state_id');
    if(panchayatState) panchayatState.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/districts/' + this.value, 'panchayat_district_id');
    });
    const panchayatDistrict = document.getElementById('panchayat_district_id');
    if(panchayatDistrict) panchayatDistrict.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/blocks/' + this.value, 'panchayat_block_id');
    });

    // Village Form
    const villageState = document.getElementById('village_state_id');
    if(villageState) villageState.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/districts/' + this.value, 'village_district_id');
    });
    const villageDistrict = document.getElementById('village_district_id');
    if(villageDistrict) villageDistrict.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/blocks/' + this.value, 'village_block_id');
    });
    const villageBlock = document.getElementById('village_block_id');
    if(villageBlock) villageBlock.addEventListener('change', function() {
        if(this.value) fetchLocations('/api/locations/panchayats/' + this.value, 'village_panchayat_id');
    });
});
</script>
@endpush
