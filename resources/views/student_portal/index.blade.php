<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Portal - Gramin Pathshala</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f6f9; }
        .hero-section { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 60px 0; text-align: center; }
        .student-card { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .hw-card { border-left: 4px solid #3498db; transition: transform 0.2s; }
        .hw-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="hero-section mb-5">
    <div class="container">
        <i class="bi bi-mortarboard display-3 mb-3 d-block"></i>
        <h1 class="fw-bold">Gramin Pathshala Student Portal</h1>
        <p class="lead opacity-75">Check your homework, attendance, and progress.</p>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form action="{{ route('student.portal') }}" method="GET" class="bg-white p-2 rounded-pill shadow d-flex">
                    <input type="text" name="registration_no" class="form-control border-0 rounded-pill ps-4" placeholder="Enter Student ID (Registration No.)" required>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    @if(session('error'))
        <div class="alert alert-danger shadow-sm border-0 rounded-3 text-center mb-4">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        </div>
    @endif

    @if($student)
        <div class="row g-4">
            <!-- Student Profile Sidebar -->
            <div class="col-md-4">
                <div class="card student-card text-center p-4">
                    <div class="mb-3">
                        @if($student->photo)
                            <img src="{{ asset('storage/' . $student->photo) }}" class="rounded-circle shadow-sm border border-3 border-light" width="120" height="120" style="object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto shadow-sm" style="width: 120px; height: 120px;">
                                <i class="bi bi-person text-secondary display-4"></i>
                            </div>
                        @endif
                    </div>
                    <h4 class="fw-bold mb-1">{{ $student->name }}</h4>
                    <p class="text-muted mb-3">{{ $student->registration_no }}</p>
                    
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-4 fs-6">Class {{ $student->class_level }}</span>
                    
                    <hr class="bg-light">
                    
                    <div class="text-start mt-4">
                        <h6 class="fw-bold text-muted text-uppercase mb-3" style="font-size: 0.8rem;">Attendance Summary</h6>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-secondary">Present Days</span>
                            <span class="fw-bold">{{ $attendance['present'] ?? 0 }} / {{ $attendance['total'] ?? 0 }}</span>
                        </div>
                        <div class="progress mb-2" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: {{ $attendance['percentage'] ?? 0 }}%"></div>
                        </div>
                        <div class="text-end">
                            <small class="text-success fw-bold">{{ $attendance['percentage'] ?? 0 }}%</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Homework Timeline -->
            <div class="col-md-8">
                <h4 class="fw-bold mb-4 border-bottom pb-2">Recent Homework & Notes</h4>
                
                @forelse($homeworks as $hw)
                    <div class="card hw-card mb-3 border-0 shadow-sm rounded-3">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <span class="badge bg-dark bg-opacity-10 text-dark mb-2">{{ $hw->subject->name ?? 'Subject' }}</span>
                                    <h5 class="fw-bold mb-1">{{ $hw->title }}</h5>
                                </div>
                                <span class="text-muted small fw-medium"><i class="bi bi-calendar3 me-1"></i> {{ $hw->homework_date->format('d M, Y') }}</span>
                            </div>
                            
                            @if($hw->description)
                                <p class="text-secondary mt-3 mb-0">{{ $hw->description }}</p>
                            @endif
                            
                            @if($hw->attachment)
                                <div class="mt-3 pt-3 border-top">
                                    <a href="{{ asset('storage/' . $hw->attachment) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class="bi bi-download me-1"></i> Download Attachment
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 bg-white rounded-3 shadow-sm">
                        <i class="bi bi-journal-x fs-1 text-muted mb-3 d-block"></i>
                        <h5>No Homework Found</h5>
                        <p class="text-muted">There are no recent homework assignments for Class {{ $student->class_level }}.</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
