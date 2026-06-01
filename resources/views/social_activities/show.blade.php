@extends('layouts.admin')

@section('title', 'Activity Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
        <a href="{{ route('social-activities.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Back to Activities</a>
        <div>
            <a href="{{ route('social-activities.edit', $socialActivity->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil me-1"></i> Edit</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-2">{{ $socialActivity->category->name }}</span>
                        <h4 class="fw-bold mb-1">{{ $socialActivity->title }}</h4>
                    </div>
                    @if($socialActivity->status)
                        <span class="badge bg-success bg-opacity-10 text-success">Publicly Visible</span>
                    @else
                        <span class="badge bg-secondary bg-opacity-10 text-secondary">Hidden</span>
                    @endif
                </div>
                
                <div class="d-flex flex-wrap gap-4 mb-4 pb-4 border-bottom">
                    <div>
                        <small class="text-muted d-block">Date</small>
                        <strong class="text-dark"><i class="bi bi-calendar-event me-1"></i> {{ $socialActivity->date->format('d M, Y') }}</strong>
                    </div>
                    <div>
                        <small class="text-muted d-block">Location</small>
                        <strong class="text-dark"><i class="bi bi-geo-alt me-1"></i> {{ $socialActivity->location }}</strong>
                    </div>
                    <div>
                        <small class="text-muted d-block">Beneficiaries</small>
                        <strong class="text-dark"><i class="bi bi-people me-1"></i> {{ $socialActivity->beneficiary_count }} People</strong>
                    </div>
                    <div>
                        <small class="text-muted d-block">Reported By</small>
                        <strong class="text-dark"><i class="bi bi-person me-1"></i> {{ $socialActivity->creator->name ?? 'Unknown' }}</strong>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Description</h6>
                    <p class="text-secondary" style="white-space: pre-line;">{{ $socialActivity->description }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h6 class="fw-bold mb-0">Activity Photos</h6>
            </div>
            <div class="card-body pt-3">
                @if($socialActivity->images && count($socialActivity->images) > 0)
                    <div class="row g-2">
                        @foreach($socialActivity->images as $image)
                            <div class="col-6">
                                <a href="{{ asset('storage/' . $image) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Activity Photo" class="img-fluid rounded w-100" style="aspect-ratio: 1; object-fit: cover;">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-images fs-1 d-block mb-3 opacity-50"></i>
                        <p class="mb-0">No photos uploaded.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
