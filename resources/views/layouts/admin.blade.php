<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GWCT ERP') }} - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --bg-color: #f4f6f9;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background: var(--primary-color);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0,0,0,0.1);
            text-align: center;
        }

        #sidebar ul.components {
            padding: 20px 0;
            height: calc(100vh - 80px - 110px); /* Adjust for header and footer */
            overflow-y: auto;
        }

        /* Customize scrollbar for sidebar */
        #sidebar ul.components::-webkit-scrollbar {
            width: 5px;
        }
        #sidebar ul.components::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.1);
        }
        #sidebar ul.components::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px;
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-footer .logout-btn {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.95rem;
            transition: 0.3s;
        }
        
        .sidebar-footer .logout-btn i {
            margin-right: 10px;
        }

        .sidebar-footer .logout-btn:hover {
            background: rgba(255,255,255,0.1);
        }

        .sidebar-footer .version-info {
            color: rgba(255,255,255,0.5);
            font-size: 0.75rem;
            padding: 0 12px;
            margin-top: 10px;
            line-height: 1.4;
        }

        #sidebar ul li a {
            padding: 12px 20px;
            font-size: 0.95rem;
            display: block;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #sidebar ul li a:hover, #sidebar ul li.active > a {
            color: #fff;
            background: rgba(255,255,255,0.1);
            border-left: 4px solid var(--accent-color);
        }

        /* Main Content Styles */
        #content {
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
        }

        /* Top Navbar */
        .top-navbar {
            background: #fff;
            padding: 15px 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-container {
            padding: 25px;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: calc(var(--sidebar-width) * -1);
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                width: 100%;
            }
            #content.active {
                width: 100%;
                transform: translateX(var(--sidebar-width));
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                @php
                    $appSettings = \App\Models\Setting::first();
                @endphp
                
                @if($appSettings && $appSettings->company_logo)
                    <img src="{{ asset('storage/' . $appSettings->company_logo) }}" alt="Logo" class="img-fluid mb-2 rounded bg-white p-1" style="max-height: 60px;"> 
                @else
                    <h4 class="m-0 fw-bold">{{ $appSettings->company_title ?? 'GWCT ERP' }}</h4>
                @endif
                <div class="small text-white-50">None Government Organization</div>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{ url('/home') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                </li>
                
                <li class="px-3 mt-3 mb-1 text-uppercase text-white-50" style="font-size: 0.75rem; font-weight: 600;">Organization</li>
                <li class="{{ request()->is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="bi bi-people"></i> User Management</a>
                </li>
                <li class="{{ request()->is('locations*') ? 'active' : '' }}">
                    <a href="{{ route('locations.index') }}"><i class="bi bi-geo-alt"></i> Location Master</a>
                </li>
                
                <li class="px-3 mt-3 mb-1 text-uppercase text-white-50" style="font-size: 0.75rem; font-weight: 600;">Operations</li>
                <li>
                    <a href="https://banking.cashbez.com/" target="_blank"><i class="bi bi-bank"></i> Banking Service</a>
                </li>
             
                <li class="{{ request()->is('children*') ? 'active' : '' }}">
                    <a href="{{ route('children.index') }}"><i class="bi bi-person-badge"></i> Child Registration</a>
                </li>
                <li class="{{ request()->is('renewals*') ? 'active' : '' }}">
                    <a href="{{ route('renewals.index') }}"><i class="bi bi-calendar-check"></i> Renewals</a>
                </li>
                <li class="{{ request()->is('activity-categories*') ? 'active' : '' }}">
                    <a href="{{ route('activity-categories.index') }}"><i class="bi bi-tags"></i> Activity Categories</a>
                </li>
                <li class="{{ request()->is('social-activities*') ? 'active' : '' }}">
                    <a href="{{ route('social-activities.index') }}"><i class="bi bi-images"></i> Social Activities</a>
                </li>
                <li class="{{ request()->is('pathshala*') ? 'active' : '' }}">
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#pathshalaSubmenu" aria-expanded="{{ request()->is('pathshala*') ? 'true' : 'false' }}" aria-controls="pathshalaSubmenu" class="dropdown-toggle d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-book"></i> Gramin Pathshala</span>
                    </a>
                    <ul class="collapse list-unstyled {{ request()->is('pathshala*') ? 'show' : '' }}" id="pathshalaSubmenu" style="background: rgba(0,0,0,0.15);">
                        <li class="{{ request()->is('pathshala-students*') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('pathshala-students.index') }}" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-person-plus"></i> Student Registration</a>
                        </li>
                        <li class="{{ request()->is('pathshala-attendance*') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('pathshala-attendance.index') }}" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-calendar2-check"></i> Attendance System</a>
                        </li>
                        <li class="{{ request()->is('pathshala-subjects*') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('pathshala-subjects.index') }}" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-journal-text"></i> Subject Management</a>
                        </li>
                        <li class="{{ request()->is('pathshala-homework*') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('pathshala-homework.index') }}" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-pencil-square"></i> Homework & Notes</a>
                        </li>
                        <li class="{{ request()->is('pathshala-exams*') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('pathshala-exams.index') }}" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-file-earmark-text"></i> Exam Management</a>
                        </li>
                        <li class="{{ request()->is('pathshala-results*') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('pathshala-results.index') }}" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-graph-up"></i> Update Results</a>
                        </li>
                        <li class="{{ request()->is('pathshala-prints*') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('pathshala-prints.index') }}" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-award"></i> Certificates & ID Cards</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="bi bi-lightbulb"></i> Skill Development</a>
                </li>
                
                <li class="px-3 mt-3 mb-1 text-uppercase text-white-50" style="font-size: 0.75rem; font-weight: 600;">Finance & Reports</li>
                <li class="{{ request()->is('funds*') ? 'active' : '' }}">
                    <a href="{{ route('funds.index') }}"><i class="bi bi-wallet2"></i> Wallet / Funds</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-bar-chart"></i> Reports</a>
                </li>
                
                <li class="px-3 mt-3 mb-1 text-uppercase text-white-50" style="font-size: 0.75rem; font-weight: 600;">System</li>
                <li class="{{ request()->is('roles*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}"><i class="bi bi-shield-lock"></i> Roles & Permissions</a>
                </li>
                <li class="{{ request()->is('settings*') ? 'active' : '' }}">
                    <a href="{{ route('settings.index') }}"><i class="bi bi-gear"></i> Settings</a>
                </li>
                
                <li class="px-3 mt-3 mb-1 text-uppercase text-white-50" style="font-size: 0.75rem; font-weight: 600;">My Downloads</li>
                <li class="{{ request()->is('user-downloads*') ? 'active' : '' }}">
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#downloadsSubmenu" aria-expanded="{{ request()->is('user-downloads*') ? 'true' : 'false' }}" aria-controls="downloadsSubmenu" class="dropdown-toggle d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-cloud-download"></i> Downloads</span>
                    </a>
                    <ul class="collapse list-unstyled {{ request()->is('user-downloads*') ? 'show' : '' }}" id="downloadsSubmenu" style="background: rgba(0,0,0,0.15);">
                        <li class="{{ request()->routeIs('user-downloads.id-card') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('user-downloads.id-card') }}" target="_blank" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-person-badge"></i> I Card</a>
                        </li>
                        <li class="{{ request()->routeIs('user-downloads.certificate') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('user-downloads.certificate') }}" target="_blank" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-award"></i> Certificate</a>
                        </li>
                        <li class="{{ request()->routeIs('user-downloads.visiting-card') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('user-downloads.visiting-card') }}" target="_blank" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-card-heading"></i> Visiting Card</a>
                        </li>
                        <li class="{{ request()->routeIs('user-downloads.banner') ? 'bg-primary bg-opacity-25' : '' }}">
                            <a href="{{ route('user-downloads.banner') }}" target="_blank" class="ps-4 py-2" style="font-size: 0.85rem;"><i class="bi bi-image"></i> Banner</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
                    <i class="bi bi-box-arrow-left"></i> <span>Sign Out</span>
                </a>
                <div class="version-info">
                    <div>Software Version 1.0.0</div>
                    <div>&copy; {{ date('Y') }} GWCT ERP</div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <nav class="top-navbar">
                <div>
                    <button type="button" id="sidebarCollapse" class="btn btn-light shadow-sm">
                        <i class="bi bi-list"></i>
                    </button>
                    <span class="ms-3 fw-medium text-muted">@yield('title')</span>
                </div>
                
                <div class="d-flex align-items-center">


                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" alt="user" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                       <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>

            <!-- Main Container -->
            <div class="main-container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('sidebarCollapse').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
                document.getElementById('content').classList.toggle('active');
            });
            
            @if(session('success'))
                Swal.fire({ icon: 'success', title: 'Success!', text: {!! json_encode(session('success')) !!} });
            @endif
            @if(session('error'))
                Swal.fire({ icon: 'error', title: 'Error!', text: {!! json_encode(session('error')) !!} });
            @endif
            @if($errors->any())
                Swal.fire({ icon: 'warning', title: 'Validation Error', html: {!! json_encode(implode('<br>', $errors->all())) !!} });
            @endif
        });
    </script>
    @stack('scripts')
</body>
</html>
