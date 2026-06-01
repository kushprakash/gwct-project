<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Activity Gallery - GWCT</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .hero-section { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 60px 0; text-align: center; }
        .activity-card { transition: transform 0.3s ease; border: none; overflow: hidden; border-radius: 12px; }
        .activity-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
        .activity-img-container { position: relative; height: 220px; overflow: hidden; }
        .activity-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
        .activity-card:hover .activity-img { transform: scale(1.05); }
        .activity-badge { position: absolute; top: 15px; left: 15px; z-index: 10; background: rgba(255,255,255,0.9); backdrop-filter: blur(5px); color: #2c3e50; font-weight: 600; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
                GWCT <span class="text-secondary fw-normal">Gallery</span>
            </a>
            <div class="d-flex">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-outline-primary shadow-sm rounded-pill px-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary shadow-sm rounded-pill px-4">NGO Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="hero-section mb-5">
        <div class="container">
            <h1 class="fw-bold mb-3 display-5">Our Impact in Action</h1>
            <p class="lead opacity-75 mb-4 mx-auto" style="max-width: 700px;">Explore the social activities, health camps, and empowerment initiatives conducted by our organization across various villages.</p>
            
            <form action="{{ route('gallery.index') }}" method="GET" class="d-flex justify-content-center">
                <div class="input-group shadow" style="max-width: 500px; border-radius: 30px; overflow: hidden;">
                    <select name="category_id" class="form-select border-0 py-3" aria-label="Category filter">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-light px-4 border-0 text-primary" type="submit"><i class="bi bi-filter me-2"></i> Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mb-5 pb-5">
        
        <div class="row g-4">
            @forelse($activities as $activity)
                <div class="col-md-6 col-lg-4">
                    <div class="card activity-card shadow-sm h-100">
                        <div class="activity-img-container">
                            <span class="activity-badge">{{ $activity->category->name }}</span>
                            @if($activity->images && count($activity->images) > 0)
                                <img src="{{ asset('storage/' . $activity->images[0]) }}" alt="{{ $activity->title }}" class="activity-img">
                            @else
                                <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                    <i class="bi bi-image fs-1 opacity-25"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted"><i class="bi bi-calendar-event me-1"></i> {{ $activity->date->format('d M, Y') }}</small>
                                <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> {{ $activity->location }}</small>
                            </div>
                            <h5 class="card-title fw-bold mb-3">{{ $activity->title }}</h5>
                            <p class="card-text text-muted small mb-4">{{ Str::limit($activity->description, 100) }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto border-top pt-3">
                                <div>
                                    <span class="text-primary fw-bold fs-5">{{ $activity->beneficiary_count }}</span>
                                    <span class="text-muted small">Beneficiaries</span>
                                </div>
                                @if($activity->images && count($activity->images) > 1)
                                    <span class="badge bg-light text-dark border">+{{ count($activity->images) - 1 }} Photos</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-images display-1 text-muted opacity-25 mb-3"></i>
                        <h3>No activities found</h3>
                        <p class="text-muted">Try adjusting your category filter or check back later.</p>
                        @if(request('category_id'))
                            <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary mt-2">Clear Filter</a>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $activities->links() }}
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0 opacity-75">&copy; {{ date('Y') }} GWCT NGO. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
