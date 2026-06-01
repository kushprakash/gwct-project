@extends('layouts.admin')

@section('title', 'Certificates & ID Cards')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h1 class="h3 mb-0 text-gray-800 fw-bold">Certificates & ID Cards</h1>
            <p class="text-muted mb-0">Print student documents by class</p>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="{{ route('pathshala-prints.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="class_level" class="form-label fw-semibold">Select Class</label>
                    <select name="class_level" id="class_level" class="form-select" required>
                        <option value="">-- Select Class --</option>
                        @for($i=1; $i<=12; $i++)
                            <option value="{{ $i }}" {{ request('class_level') == $i ? 'selected' : '' }}>Class {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-search me-2"></i> Fetch Students</button>
                    @if(request('class_level'))
                        <a href="{{ route('pathshala-prints.index') }}" class="btn btn-light border ms-2">Clear</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    @if(request('class_level'))
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">Students in Class {{ request('class_level') }}</h6>
        </div>
        <div class="card-body">
            @if($students->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Roll No</th>
                                <th>Student Name</th>
                                <th>Father's Name</th>
                                <th>Mobile</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td><span class="badge bg-secondary">{{ $student->roll_no ?? 'N/A' }}</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($student->first_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $student->first_name }} {{ $student->last_name }}</div>
                                            <div class="small text-muted">{{ $student->email ?? 'No email' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->mobile_no }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pathshala-prints.id-card', $student->id) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2">
                                        <i class="bi bi-person-badge me-1"></i> I-Card
                                    </a>
                                    
                                    @if($exams->count() > 0)
                                        <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3" onclick="openCertModal({{ $student->id }}, '{{ $student->first_name }} {{ $student->last_name }}')">
                                            <i class="bi bi-award me-1"></i> Certificate
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-outline-secondary rounded-pill px-3" disabled title="No exams available">
                                            <i class="bi bi-award me-1"></i> Certificate
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                    <p class="mt-3 text-muted">No active students found in this class.</p>
                </div>
            @endif
        </div>
    </div>
    @endif
</div>

<!-- Certificate Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="certificateModalLabel"><i class="bi bi-award me-2"></i> Print Certificate</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Generate certificate for: <strong id="certStudentName" class="text-success"></strong></p>
                
                <div class="mb-3">
                    <label class="form-label">Select Session Year</label>
                    <select id="certSessionYear" class="form-select" onchange="filterExams()">
                        <option value="">-- Choose Session --</option>
                        @php
                            $uniqueSessions = $exams->pluck('session_year')->unique();
                        @endphp
                        @foreach($uniqueSessions as $session)
                            <option value="{{ $session }}">{{ $session }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Exam</label>
                    <select id="certExamSelect" class="form-select" disabled>
                        <option value="">-- Select session first --</option>
                        @foreach($exams as $exam)
                            <option value="{{ $exam->id }}" data-session="{{ $exam->session_year }}" class="exam-option" style="display:none;">{{ $exam->exam_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="generateCertBtn" onclick="generateCertificate()" disabled>
                    <i class="bi bi-printer me-2"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentStudentId = null;

    function openCertModal(studentId, studentName) {
        currentStudentId = studentId;
        document.getElementById('certStudentName').textContent = studentName;
        
        // Reset selections
        document.getElementById('certSessionYear').value = '';
        document.getElementById('certExamSelect').value = '';
        document.getElementById('certExamSelect').disabled = true;
        document.getElementById('generateCertBtn').disabled = true;
        
        filterExams(); // Hide all options initially
        
        var myModal = new bootstrap.Modal(document.getElementById('certificateModal'));
        myModal.show();
    }

    function filterExams() {
        const session = document.getElementById('certSessionYear').value;
        const examSelect = document.getElementById('certExamSelect');
        const options = document.querySelectorAll('.exam-option');
        
        examSelect.value = '';
        document.getElementById('generateCertBtn').disabled = true;

        if (session) {
            examSelect.disabled = false;
            let count = 0;
            options.forEach(opt => {
                if (opt.getAttribute('data-session') === session) {
                    opt.style.display = 'block';
                    count++;
                } else {
                    opt.style.display = 'none';
                }
            });
            
            if (count === 0) {
                examSelect.disabled = true;
                examSelect.innerHTML = '<option value="">No exams found for this session</option>';
            } else {
                // Restore original options if previously overwritten
                if (examSelect.options[0].text === 'No exams found for this session') {
                    examSelect.options[0].text = '-- Choose Exam --';
                }
            }
        } else {
            examSelect.disabled = true;
            options.forEach(opt => opt.style.display = 'none');
        }
    }

    document.getElementById('certExamSelect').addEventListener('change', function() {
        document.getElementById('generateCertBtn').disabled = !this.value;
    });

    function generateCertificate() {
        const examId = document.getElementById('certExamSelect').value;
        if (currentStudentId && examId) {
            const url = `{{ url('/pathshala-prints/certificate') }}/${currentStudentId}/${examId}`;
            window.open(url, '_blank');
            bootstrap.Modal.getInstance(document.getElementById('certificateModal')).hide();
        }
    }
</script>
@endpush
