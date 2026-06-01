<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWCT - Gramin Vikas Aur Kalyaan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Bal Vivah Rok Tham Section Styles */
        .bal-vivah-section {
            background: #f9f9f9;
            padding: 40px 0;
        }

        .bal-vivah-hero {
            position: relative;
            height: 400px;
            margin-bottom: 60px;
            border-radius: 8px;
            overflow: hidden;
        }

        .bal-vivah-hero .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .bal-vivah-hero .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(27, 126, 58, 0.6);
        }

        .bal-vivah-hero .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 2;
            width: 90%;
        }

        .bal-vivah-hero h2 {
            font-size: 42px;
            margin-bottom: 10px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .bal-vivah-hero h3 {
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .bal-vivah-hero p {
            font-size: 16px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* Statistics Grid */
        .bal-vivah-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            border-right: 1px solid #eee;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-icon {
            font-size: 48px;
            color: #1b7e3a;
            margin-bottom: 15px;
        }

        .stat-content h4 {
            font-size: 36px;
            color: #1b7e3a;
            font-weight: bold;
            margin: 10px 0;
        }

        .stat-content p {
            font-size: 14px;
            color: #333;
            margin: 5px 0;
        }

        /* Overview Section */
        .bal-vivah-overview {
            background: white;
            padding: 40px;
            border-radius: 8px;
            margin-bottom: 60px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .bal-vivah-overview h3 {
            color: #1b7e3a;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .bal-vivah-overview p {
            font-size: 15px;
            line-height: 1.8;
            color: #555;
        }

        /* Success Stories Grid */
        .bal-vivah-stories {
            margin-bottom: 60px;
        }

        .stories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .story-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .story-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .story-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .story-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #1b7e3a;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .story-content {
            padding: 25px;
        }

        .story-content h4 {
            color: #1b7e3a;
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .story-subtitle {
            font-size: 13px;
            margin-bottom: 15px;
        }

        .story-content p {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 12px;
        }

        .story-impact {
            background: #f0f8f4;
            padding: 12px;
            border-radius: 5px;
            font-size: 13px;
            color: #1b7e3a;
            border-left: 4px solid #1b7e3a;
        }

        /* Interventions Grid */
        .bal-vivah-interventions {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .interventions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .intervention-box {
            text-align: center;
            padding: 25px;
            border-radius: 8px;
            background: linear-gradient(135deg, #f0f8f4 0%, #ffffff 100%);
            border: 1px solid #e0e0e0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .intervention-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(27, 126, 58, 0.15);
            border-color: #1b7e3a;
        }

        .intervention-icon {
            font-size: 40px;
            color: #1b7e3a;
            margin-bottom: 15px;
        }

        .intervention-box h4 {
            color: #1b7e3a;
            font-size: 16px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .intervention-box p {
            font-size: 13px;
            color: #666;
            line-height: 1.5;
        }

        /* Receipt Styles */
        #receiptPrintArea {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid #eee;
        }

        .receipt-header {
            text-align: center;
            border-bottom: 2px solid #1b7e3a;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .receipt-logo {
            max-width: 80px;
            margin-bottom: 15px;
        }

        .receipt-body {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .receipt-photo-section {
            flex: 0 0 150px;
            text-align: center;
        }

        .receipt-photo-section img {
            width: 150px;
            height: 180px;
            object-fit: cover;
            border: 2px solid #eee;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .receipt-details {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .receipt-row {
            font-size: 14px;
            line-height: 1.6;
            border-bottom: 1px solid #f5f5f5;
            padding-bottom: 5px;
        }

        .receipt-row strong {
            color: #1b7e3a;
            display: inline-block;
            width: 130px;
        }

        .receipt-footer {
            text-align: center;
            border-top: 1px dashed #ccc;
            padding-top: 20px;
            margin-top: 20px;
        }

        .status-success {
            color: #1b7e3a;
            font-weight: bold;
            padding: 5px 15px;
            background: #e8f5e9;
            border-radius: 20px;
            font-size: 12px;
        }

        .qr-code {
            margin: 20px 0;
            color: #333;
        }

        .note {
            font-size: 11px;
            color: #999;
            font-style: italic;
        }

        .receipt-actions {
            text-align: center;
            margin-bottom: 50px;
            padding: 20px;
        }

        .btn-print, .btn-close-receipt {
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin: 5px 10px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-print {
            background: #1b7e3a;
            color: white;
            border: none;
        }

        .btn-print:hover {
            background: #145c2a;
            transform: translateY(-2px);
        }

        .btn-close-receipt {
            background: #f5f5f5;
            color: #333;
            border: 1px solid #ddd;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .bal-vivah-hero {
                height: 300px;
                margin-bottom: 40px;
            }

            .bal-vivah-hero h2 {
                font-size: 32px;
            }

            .bal-vivah-hero h3 {
                font-size: 18px;
            }

            .bal-vivah-hero p {
                font-size: 14px;
            }

            .bal-vivah-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                padding: 30px 20px;
            }

            .stat-item {
                border-right: none;
                border-bottom: 1px solid #eee;
            }

            .stat-item:nth-child(even) {
                border-right: none;
            }

            .stat-item:last-child,
            .stat-item:nth-last-child(2) {
                border-bottom: none;
            }

            .stories-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .interventions-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .intervention-box {
                padding: 15px;
            }

            .intervention-icon {
                font-size: 32px;
            }

            /* Receipt Mobile Responsive */
            #receiptPrintArea {
                margin: 20px 15px;
                padding: 20px;
            }

            .receipt-body {
                flex-direction: column;
                gap: 20px;
                align-items: center;
            }

            .receipt-photo-section {
                flex: 0 0 auto;
            }

            .receipt-details {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .receipt-row strong {
                width: 100%;
                display: block;
                margin-bottom: 2px;
            }

            .btn-print, .btn-close-receipt {
                width: 100%;
                margin: 5px 0;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .bal-vivah-stats {
                grid-template-columns: 1fr;
            }

            .interventions-grid {
                grid-template-columns: 1fr;
            }

            .stat-item {
                border-right: none;
                border-bottom: 1px solid #eee;
                padding: 20px 15px;
            }

            .stat-item:last-child {
                border-bottom: none;
            }
        }

        /* Hiring Section Styles */
        .hiring-section {
            background: linear-gradient(135deg, #f5f5f5 0%, #ffffff 100%);
            padding: 60px 0;
        }

        .hiring-alert-banner {
            background: linear-gradient(135deg, #1b7e3a 0%, #2d9e52 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 60px;
            box-shadow: 0 4px 15px rgba(27, 126, 58, 0.2);
        }

        .alert-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .alert-left {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .alert-icon {
            font-size: 48px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .alert-left h2 {
            font-size: 32px;
            margin: 0;
            font-weight: bold;
        }

        .alert-left p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .alert-ribbon {
            background: linear-gradient(135deg, #FFD700 0%, #FFC700 100%);
            color: #1b7e3a;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transform: rotate(-5deg);
        }

        /* Hiring Content */
        .hiring-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .hiring-header h2 {
            color: #1b7e3a;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .hiring-header p {
            color: #666;
            font-size: 16px;
        }

        /* Positions Table */
        .positions-table-wrapper {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 60px;
            overflow-x: auto;
        }

        .positions-table {
            width: 100%;
            border-collapse: collapse;
        }

        .positions-table thead {
            background: linear-gradient(135deg, #1b7e3a 0%, #0066FF 100%);
            color: white;
        }

        .positions-table th {
            padding: 18px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
        }

        .positions-table td {
            padding: 18px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .positions-table tbody tr:hover {
            background: #f9f9f9;
            transition: background 0.3s ease;
        }

        .positions-table strong {
            color: #1b7e3a;
            display: block;
            margin-bottom: 5px;
        }

        .hindi-text {
            font-size: 12px;
            color: #999;
            margin: 3px 0 0 0;
        }

        .level-badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }

        .level-district {
            background: #1b7e3a;
            color: white;
        }

        .level-block {
            background: #0066FF;
            color: white;
        }

        .level-gram {
            background: #4D94FF;
            color: white;
        }

        .btn-apply-small {
            background: #1b7e3a;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px;
            transition: background 0.3s ease;
        }

        .btn-apply-small:hover {
            background: #003fa3;
        }

        /* Why Join GWCT */
        .why-join-gwct {
            background: white;
            padding: 40px;
            border-radius: 8px;
            margin-bottom: 60px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .why-join-gwct h3 {
            color: #1b7e3a;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .benefit-card {
            text-align: center;
            padding: 25px;
            border-radius: 8px;
            background: linear-gradient(135deg, #f0f4ff 0%, #ffffff 100%);
            border: 1px solid #e0e8ff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 82, 204, 0.15);
            border-color: #1b7e3a;
        }

        .benefit-icon {
            font-size: 40px;
            color: #1b7e3a;
            margin-bottom: 15px;
        }

        .benefit-card h4 {
            color: #1b7e3a;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .benefit-card p {
            font-size: 13px;
            color: #666;
            line-height: 1.5;
        }

        /* Application Process */
        .application-process {
            background: white;
            padding: 40px;
            border-radius: 8px;
            margin-bottom: 60px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .application-process h3 {
            color: #1b7e3a;
            font-size: 28px;
            margin-bottom: 40px;
            text-align: center;
        }

        .process-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .step {
            text-align: center;
            flex: 1;
            min-width: 120px;
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #1b7e3a 0%, #0066FF 100%);
            color: white;
            border-radius: 50%;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .step h4 {
            color: #1b7e3a;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .step p {
            font-size: 12px;
            color: #999;
        }

        .step-arrow {
            color: #1b7e3a;
            font-size: 24px;
            display: none;
        }

        @media (min-width: 768px) {
            .step-arrow {
                display: block;
            }
        }

        /* Hiring CTA */
        .hiring-cta {
            text-align: center;
            background: linear-gradient(135deg, #1b7e3a 0%, #0066FF 100%);
            color: white;
            padding: 40px;
            border-radius: 8px;
            margin-bottom: 40px;
        }

        .hiring-cta h3 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .hiring-cta p {
            font-size: 16px;
            margin-bottom: 25px;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-apply-large {
            background: white;
            color: #1b7e3a;
            border: none;
            padding: 14px 30px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-apply-large:hover {
            background: #f0f4ff;
            transform: translateY(-2px);
        }

        .btn-learn-more {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 12px 28px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .btn-learn-more:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Hiring Contact */
        .hiring-contact {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .hiring-contact h3 {
            color: #1b7e3a;
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .contact-item {
            display: flex;
            gap: 15px;
        }

        .contact-item i {
            font-size: 28px;
            color: #1b7e3a;
        }

        .contact-item strong {
            color: #1b7e3a;
            display: block;
            margin-bottom: 5px;
        }

        .contact-item p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        /* Responsive Design for Hiring */
        @media (max-width: 768px) {
            .alert-content {
                flex-direction: column;
                text-align: center;
            }

            .alert-left {
                flex-direction: column;
            }

            .alert-left h2 {
                font-size: 24px;
            }

            .hiring-alert-banner {
                margin-bottom: 40px;
            }

            .positions-table th,
            .positions-table td {
                padding: 12px 10px;
                font-size: 12px;
            }

            .hiring-header h2 {
                font-size: 28px;
            }

            .benefits-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .benefit-card {
                padding: 15px;
            }

            .process-steps {
                flex-direction: column;
            }

            .step-arrow {
                transform: rotate(90deg);
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn-apply-large,
            .btn-learn-more {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .alert-ribbon {
                font-size: 12px;
                padding: 8px 20px;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
            }

            .positions-table th,
            .positions-table td {
                padding: 10px 8px;
                font-size: 11px;
            }

            .btn-apply-small {
                font-size: 10px;
                padding: 6px 12px;
            }

            .hiring-cta {
                padding: 25px 15px;
            }

            .hiring-cta h3 {
                font-size: 22px;
            }
        }

        /* Mobile Navigation Fixes */
        @media (max-width: 992px) {
            .navbar {
                display: block !important;
                background: linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%) !important;
            }

            .menu-toggle {
                display: flex !important;
                color: white !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            .nav-brand-mobile {
                display: block !important;
                color: white !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            .nav-menu {
                display: none;
            }

            .nav-menu.active {
                display: flex !important;
            }
        }
    </style>
</head>

<body>
    <!-- Top Header -->
    <header class="top-header">
        <div class="container">
            <div class="header-left">
                <div class="logo">
                    <div class="logo-icon"><img src="icon.jpg" alt="GWCT Logo"
                            style="width: 100%; height: 100%; object-fit: cover;"></div>
                    <div class="logo-text">
                        <div>ग्रामीण विकास एवं कल्याण</div>
                        <small>Gramin Vikas Aur Kalyaan</small>
                    </div>
                </div>
                <div class="helpline">
                    <i class="fas fa-phone"></i> Helpline: +91 9102132444
                </div>
            </div>
            <button class="btn-donate">Donate Now <i class="fas fa-heart"></i></button>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
       
            <ul class="nav-menu">
                <li><a href="index.html?#home" class="nav-link">Home</a></li>
                <li><a href="index.html?#about" class="nav-link">About Us</a></li>
                <li><a href="index.html?#services" class="nav-link">Services</a></li>
                <li><a href="index.html?#bal-vivah" class="nav-link">Bal Vivah</a></li>
                <li><a href="index.html?#gallery" class="nav-link">Gallery</a></li>
                <li><a href="index.html?#apply" class="nav-link">Apply Now</a></li>
                <li><a href="pathshala" class="nav-link">Login</a></li>
                <li><a href="index.html?#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section with Carousel -->
    <section id="home" class="hero">
        <div class="carousel">
            <!-- Slide 1: Community Empowerment -->
            <div class="carousel-item active" data-slide-title="Community Empowerment">
                <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1200&h=500&fit=crop"
                    alt="Rural Community" class="hero-img">
                <div class="slide-content">
                    <h2>Community Empowerment</h2>
                    <p>Building stronger, more resilient rural communities</p>
                </div>
            </div>


            <!-- Slide 4: Health Services -->
            <div class="carousel-item" data-slide-title="Health Services">
                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&h=500&fit=crop"
                    alt="Health Care" class="hero-img">
                <div class="slide-content">
                    <h2>Healthcare Access</h2>
                    <p>Making healthcare accessible to every household</p>
                </div>
            </div>

            <!-- Slide 5: Youth Development -->
            <div class="carousel-item" data-slide-title="Youth Development">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&h=500&fit=crop"
                    alt="Youth Programs" class="hero-img">
                <div class="slide-content">
                    <h2>Youth Skill Development</h2>
                    <p>Preparing youth for economic opportunities</p>
                </div>
            </div>

            <!-- Slide 6: Agriculture Support -->
            <div class="carousel-item" data-slide-title="Agriculture Support">
                <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=1200&h=500&fit=crop"
                    alt="Agriculture" class="hero-img">
                <div class="slide-content">
                    <h2>Agricultural Support</h2>
                    <p>Improving farming practices and rural livelihoods</p>
                </div>
            </div>
        </div>

        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-text">
                <h1>
                    <span class="hero-title-en">Empowering Rural India</span>
                    <span class="hero-title-hi">ग्रामीण भारत का सशक्तिकरण</span>
                </h1>
                <p class="hero-subtitle">Our Mission in Action | हमारा मिशन सक्रिय है</p>
            </div>
            <div class="hero-cta-section">
                <div class="hero-cta">
                    <button class="btn-donate-large">Donate to Make a Difference</button>
                </div>
                <div class="hero-join">
                    <h3>Passionate to Serve?</h3>
                    <p>Your Opportunity awaits!</p>
                    <button onclick="openApplyModal('General Staff')" class="btn-join-team">Join Our Team</button>
                </div>
            </div>
        </div>

        <button class="carousel-nav prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="carousel-nav next" onclick="changeSlide(1)">&#10095;</button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <span class="indicator active" onclick="goToSlide(0)"></span>
            <span class="indicator" onclick="goToSlide(1)"></span>
            <span class="indicator" onclick="goToSlide(2)"></span>
            <span class="indicator" onclick="goToSlide(3)"></span>
            <span class="indicator" onclick="goToSlide(4)"></span>
            <span class="indicator" onclick="goToSlide(5)"></span>
        </div>
    </section>
  
  
  
  <?php
  if(isset($_GET['msg'])){ ?>
  
  
  <br><br><br>
  <center><h2><?=  $_GET['msg']; ?></h2></center>
  
  
  
 <?php } else {
    
   
include "conf.php";
    
    $rid=$_GET['rid'];

    $query = mysqli_query($conn, "SELECT * FROM `apply` WHERE `regid` = '$rid'");
    $row = mysqli_fetch_assoc($query);
          
          
  ?>

    <div id="receiptPrintArea">
        <div class="receipt-header">
            <img src="icon.jpg" alt="Logo" class="receipt-logo">
            <h2>Application Receipt</h2>
            <p>Gramin Welfare Project (GWCT)</p>
        </div>
        <div class="receipt-body">
            <div class="receipt-photo-section">
                <img id="receiptPhoto" src="<?= $row['photo'] ?>" alt="Applicant Photo">
            </div>
            <div class="receipt-details">
                <div class="receipt-row"><strong>Registration No:</strong> <span id="recRegNo"><?= $row['regid'] ?></span></div>
                <div class="receipt-row"><strong>Post Applied:</strong> <span id="recPost"><?= $row['designation'] ?></span></div>
                <div class="receipt-row"><strong>Name:</strong> <span id="recName"><?= $row['name'] ?></span></div>
                <div class="receipt-row"><strong>Father/Husband:</strong> <span id="recFather"><?= $row['father'] ?></span></div>
                <div class="receipt-row"><strong>Mobile:</strong> <span id="recMobile"><?= $row['mob'] ?></span></div>
                <div class="receipt-row"><strong>Email:</strong> <span id="recEmail"><?= $row['email'] ?></span></div>
                <div class="receipt-row"><strong>Address:</strong> <span id="recAddress"><?= $row['address'] ?></span></div>
                <div class="receipt-row"><strong>Block:</strong> <span id="recPanchayat"><?= $row['block'] ?></span></div>
                <div class="receipt-row"><strong>Pincode:</strong> <span id="recPincode"><?= $row['pin'] ?></span></div>
                <div class="receipt-row"><strong>Qualification:</strong> <span id="recQual"><?= $row['qwalification'] ?></span></div>
                <div class="receipt-row"><strong>Aadhar:</strong> <span id="recAadhar"><?= $row['ad_no'] ?></span></div>
                <div class="receipt-row"><strong>PAN:</strong> <span id="recPan"><?= $row['pan'] ?></span></div>
            </div>
        </div>
        <div class="receipt-footer">
            <p>Status: <span class="status-success">SUCCESSFULLY SUBMITTED</span></p>
            <p>Date: <span id="recDate"><?= date('d-m-Y',strtotime($row['addon'])) ?></span></p>
            <div class="qr-code">
                <i class="fas fa-qrcode fa-4x"></i>
            </div>
            <p class="note">This is a computer generated receipt.</p>
        </div>
    </div>
    <div class="receipt-actions">
        <button onclick="window.print()" class="btn-print"><i class="fas fa-print"></i> Print Receipt</button>
        <button onclick="closeReceiptModal()" class="btn-close-receipt">Close</button>
    </div>
<?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>

</body>

</html>