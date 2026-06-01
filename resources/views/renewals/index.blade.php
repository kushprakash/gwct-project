@extends('layouts.admin')

@section('title', 'Child Renewals & Payment Collection')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pt-4 pb-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Recent Renewals</h5>
        <!-- The button would ideally open a modal to search for a child by Registration ID to renew -->
        <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#newRenewalModal"><i class="bi bi-cash-stack me-1"></i> Collect Renewal</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Receipt No</th>
                        <th>Child Reg. No</th>
                        <th>Child Name</th>
                        <th>Amount</th>
                        <th>Year</th>
                        <th>Collected By</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($renewals as $renewal)
                    <tr>
                        <td class="fw-bold text-success">{{ $renewal->receipt_no }}</td>
                        <td>{{ $renewal->child->registration_no }}</td>
                        <td>{{ $renewal->child->name }}</td>
                        <td class="fw-bold">₹{{ $renewal->amount }}</td>
                        <td><span class="badge bg-info text-dark">{{ $renewal->renewal_year }}</span></td>
                        <td>{{ $renewal->user->name ?? 'Admin' }}</td>
                        <td>{{ $renewal->created_at->format('d/m/Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('renewals.show', $renewal->id) }}" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i> View</a>
                            <a href="{{ route('renewals.show', ['renewal' => $renewal->id, 'download' => 'pdf']) }}" class="btn btn-sm btn-danger"><i class="bi bi-file-pdf"></i> PDF</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No renewal payments collected yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $renewals->links() }}
        </div>
    </div>
</div>

<!-- Modal for New Renewal -->
<div class="modal fade" id="newRenewalModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Select Child for Renewal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-4">
                <form action="{{ route('renewals.create') }}" method="GET">
                    <div class="mb-3">
                        <label class="form-label">Enter Child Registration No.</label>
                        <input type="text" name="registration_no" class="form-control" required placeholder="e.g., GWCT-CH-178030130849">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Proceed to Payment Collection</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
