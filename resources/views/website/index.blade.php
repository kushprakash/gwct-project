@extends('layouts.website')
@section('content')
  
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
                    <span class="hero-title-hi">à¤—à¥à¤°à¤¾à¤®à¥€à¤£ à¤­à¤¾à¤°à¤¤ à¤•à¤¾ à¤¸à¤¶à¤•à¥à¤¤à¤¿à¤•à¤°à¤£</span>
                </h1>
                <p class="hero-subtitle">Our Mission in Action | à¤¹à¤®à¤¾à¤°à¤¾ à¤®à¤¿à¤¶à¤¨ à¤¸à¤•à¥à¤°à¤¿à¤¯ à¤¹à¥ˆ</p>
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

    <!-- Objectives Section -->
    <section id="about" class="objectives-section">
        <div class="container">
            <h2>à¤¹à¤®à¤¾à¤°à¥‡ à¤‰à¤¦à¥à¤¦à¥‡à¤¶à¥à¤¯ / Our Objectives</h2>
            <div class="row">
                <!-- Objective 1: Education -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3>à¤¶à¤¿à¤•à¥à¤·à¤¾ à¤”à¤° à¤œà¤¾à¤—à¤°à¥‚à¤•à¤¤à¤¾</h3>
                    <p>à¤—à¥à¤°à¤¾à¤®à¥€à¤£ à¤•à¥à¤·à¥‡à¤¤à¥à¤°à¥‹à¤‚ à¤®à¥‡à¤‚ à¤¶à¤¿à¤•à¥à¤·à¤¾ à¤•à¥‹ à¤¬à¤¢à¤¼à¤¾à¤µà¤¾ à¤¦à¥‡à¤¨à¤¾ à¤”à¤° à¤œà¤¾à¤—à¤°à¥‚à¤•à¤¤à¤¾ à¤«à¥ˆà¤²à¤¾à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Education & Awareness - Rural areas education promotion</p>
                    </div>
                </div>

                <!-- Objective 2: Child Marriage Prevention -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>à¤¬à¤¾à¤² à¤µà¤¿à¤µà¤¾à¤¹ à¤°à¥‹à¤•à¤¥à¤¾à¤®</h3>
                    <p>à¤¬à¤¾à¤² à¤µà¤¿à¤µà¤¾à¤¹ à¤•à¥‡ à¤–à¤¿à¤²à¤¾à¤« à¤•à¤¾à¤°à¥à¤¯ à¤•à¤°à¤¨à¤¾ à¤”à¤° à¤¸à¤®à¤¾à¤œ à¤•à¥‡ à¤¸à¤šà¥‡à¤¤à¤¨ à¤µ à¤¸à¤‚à¤šà¥‡à¤¤à¤¨ à¤•à¥‡ à¤²à¤¿à¤ à¤•à¤¾à¤°à¥à¤¯ à¤•à¤°à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Child Marriage Prevention - Awareness campaigns</p>
                    </div>
                </div>

                <!-- Objective 3: Financial Assistance -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <h3>à¤†à¤°à¥à¤¥à¤¿à¤• à¤¸à¤¹à¤¾à¤¯à¤¤à¤¾ à¤à¤µà¤‚ à¤¬à¥‡à¤°à¥‹à¤œà¤—à¤¾à¤°</h3>
                    <p>à¤—à¤°à¥€à¤¬ à¤µ à¤œà¤°à¥‚à¤°à¤¤à¤®à¤‚à¤¦ à¤²à¥‹à¤—à¥‹à¤‚ à¤•à¥‹ à¤†à¤°à¥à¤¥à¤¿à¤• à¤¸à¤¹à¤¾à¤¯à¤¤à¤¾ à¤•à¤¾ à¤¸à¤‚à¤—à¤ à¤¨ à¤•à¤°à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Financial Aid & Employment - Economic support</p>
                    </div>
                </div>

                <!-- Objective 4: Banking Services -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3>à¤¬à¥ˆà¤‚à¤•à¤¿à¤‚à¤— à¤¸à¥‡à¤µà¤¾à¤à¤‚</h3>
                    <p>à¤¬à¥ˆà¤‚à¤•à¤¿à¤‚à¤— à¤¸à¥‡à¤µà¤¾à¤“à¤‚ à¤•à¥‡ à¤®à¤¾à¤§à¥à¤¯à¤® à¤¸à¥‡ à¤µà¤¿à¤¤à¥à¤¤à¥€à¤¯ à¤¸à¤®à¤¾à¤µà¥‡à¤¶à¤¨ à¤”à¤° à¤¬à¥‡à¤°à¥‹à¤œà¤—à¤¾à¤°à¥€ à¤•à¥‡ à¤…à¤‚à¤¤à¤° à¤‰à¤¤à¥à¤ªà¤²à¤¬à¥à¤§ à¤•à¤°à¤¾à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Banking Services (Suvidha Mitra) - Financial inclusion</p>
                    </div>
                </div>

                <!-- Objective 5: Health Services -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>à¤¸à¥à¤µà¤¾à¤¸à¥à¤¥à¥à¤¯ à¤¸à¥‡à¤µà¤¾à¤à¤‚</h3>
                    <p>à¤¸à¥à¤µà¤¾à¤¸à¥à¤¥à¥à¤¯ à¤•à¤¾à¤°à¥à¤¡ / à¤¸à¥à¤µà¤¾à¤¸à¥à¤¥à¥à¤¯ à¤¸à¥‡à¤µà¤¾à¤“à¤‚ à¤•à¥€ à¤¸à¥à¤µà¤¿à¤§à¤¾ à¤‰à¤ªà¤²à¤¬à¥à¤§ à¤•à¤°à¤¾à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Health Services - Healthcare accessibility</p>
                    </div>
                </div>

                <!-- Objective 6: Women Empowerment -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-female"></i>
                    </div>
                    <h3>à¤®à¤¹à¤¿à¤²à¤¾ à¤¸à¤¶à¤•à¥à¤¤à¤¿à¤•à¤°à¤£</h3>
                    <p>à¤®à¤¹à¤¿à¤²à¤¾à¤“à¤‚ à¤•à¥‹ à¤†à¤¤à¥à¤®à¤¨à¤¿à¤°à¥à¤­à¤° à¤”à¤° à¤¸à¥à¤µà¤¾à¤µà¤²à¤‚à¤¬à¥€ à¤¬à¤¨à¤¾à¤¨à¥‡ à¤•à¥‡ à¤²à¤¿à¤ à¤•à¤¾à¤°à¥à¤¯ à¤•à¤°à¤¨à¤¾ à¤‰à¤¨à¤•à¥‡ à¤…à¤§à¤¿à¤•à¤¾à¤° à¤•à¥‡ à¤²à¤¿à¤ à¤•à¤¾à¤°à¥à¤¯ à¤•à¤°à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Women Empowerment - Rights & Independence</p>
                    </div>
                </div>

                <!-- Objective 7: Agriculture Support -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-tractor"></i>
                    </div>
                    <h3>à¤•à¥ƒà¤·à¤¿ à¤¸à¤¹à¤¾à¤¯à¤¤à¤¾ à¤à¤µà¤‚ à¤ªà¥à¤°à¤¶à¤¿à¤•à¥à¤·à¤£</h3>
                    <p>à¤•à¤¿à¤¸à¤¾à¤¨à¥‹à¤‚ à¤•à¥‹ à¤†à¤§à¥à¤¨à¤¿à¤• à¤•à¥ƒà¤·à¤¿ à¤¸à¤¹à¤¾à¤¯à¤¤à¤¾ à¤”à¤° à¤ªà¥à¤°à¤¶à¤¿à¤•à¥à¤·à¤£ à¤¸à¤¹à¤¾à¤¯à¤¤à¤¾ à¤ªà¥à¤°à¤¦à¤¾à¤¨ à¤”à¤° à¤¸à¤¹à¤¯à¥‹à¤— à¤‰à¤¤à¥à¤ªà¤²à¤¬à¥à¤§ à¤•à¤°à¤¾à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Agriculture Support - Farming & Training</p>
                    </div>
                </div>

                <!-- Objective 8: Equality & Cooperation -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>à¤¸à¤®à¤¾à¤¨à¤¤à¤¾ à¤”à¤° à¤¸à¤¹à¤¯à¥‹à¤—</h3>
                    <p>à¤¸à¤®à¤¾à¤œ à¤®à¥‡à¤‚ à¤¸à¤®à¤¾à¤¨à¤¤à¤¾, à¤­à¤¾à¤ˆà¤šà¤¾à¤°à¥‡, à¤¸à¤®à¤°à¤¸à¤¤à¤¾ à¤”à¤° à¤¸à¤¹à¤¯à¥‹à¤— à¤‰à¤¤à¥à¤ªà¤²à¤¬à¥à¤§ à¤•à¤°à¤¾à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Equality & Cooperation - Community harmony</p>
                    </div>
                </div>

                <!-- Objective 9: Gramin Pathshala -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card">
                    <div class="objective-icon">
                        <i class="fas fa-school"></i>
                    </div>
                    <h3>à¤—à¥à¤°à¤¾à¤®à¥€à¤¨ à¤ªà¤¾à¤ à¤¶à¤¾à¤²à¤¾</h3>
                    <p>à¤—à¥à¤°à¤¾à¤®à¥€à¤£ à¤•à¥à¤·à¥‡à¤¤à¥à¤°à¥‹à¤‚ à¤•à¥‡ à¤¬à¤šà¥à¤šà¥‹à¤‚ à¤•à¥‹ à¤—à¥à¤£à¤µà¤¤à¥à¤¤à¤¾à¤ªà¥‚à¤°à¥à¤£ à¤¶à¤¿à¤•à¥à¤·à¤¾ à¤ªà¥à¤°à¤¦à¤¾à¤¨ à¤•à¤°à¤¨à¤¾ à¤”à¤° à¤¸à¤¶à¤•à¥à¤¤ à¤­à¤µà¤¿à¤·à¥à¤¯ à¤¬à¤¨à¤¾à¤¨à¤¾à¥¤</p>
                    <p class="objective-en">Gramin Pathshala - Rural School Education</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Services Section -->
    <section id="services" class="services-quick">
        <div class="container">
            <h2>Quick Apply for Services / à¤¸à¥‡à¤µà¤¾à¤“à¤‚ à¤•à¥‡ à¤²à¤¿à¤ à¤¤à¥à¤°à¤‚à¤¤ à¤†à¤µà¥‡à¤¦à¤¨ à¤•à¤°à¥‡à¤‚</h2>

            <div class="service-tabs">
                <button class="tab-btn active" onclick="switchTab('loans')">Loan Services (Personal/Business/Kisan
                    Loan)</button>
                <button class="tab-btn" onclick="switchTab('health')">Health Card</button>
                <button class="tab-btn" onclick="switchTab('training')">Training Programs</button>
            </div>

            <!-- Loans Tab -->
            <div id="loans-tab" class="tab-content active">
                <div class="services-grid">
                    <div class="service-box">
                        <div class="service-box-icon">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <h3>All Type Loan Services<br><small>(à¤¸à¤­à¥€ à¤ªà¥à¤°à¤•à¤¾à¤° à¤•à¥€ à¤¬à¤‚à¤¦ à¤²à¥‡à¤µà¤¾à¤ˆ)</small></h3>
                        <p>All Type Loan Services can be soanaded for personal Loan, Business Kiran Loan, Kisan Loan,
                            business and Opportunities.</p>
                        <div class="box-buttons">
                            <button class="btn-small-primary">Apply Online</button>
                            <button class="btn-small-secondary">Check Eligibility</button>
                        </div>
                    </div>

                    <div class="service-box">
                        <div class="service-box-icon">
                            <i class="fas fa-bank"></i>
                        </div>
                        <h3>Government Schemes<br><small>(à¤¸à¤°à¤•à¤¾à¤°à¥€ à¤¯à¥‹à¤œà¤¨à¤¾à¤)</small></h3>
                        <p>Government Schemes of Education, Schemes.</p>
                        <button class="btn-scheme">View Schemes</button>
                    </div>

                    <div class="service-box">
                        <div class="service-box-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <h3>Digital Services<br><small>(à¤¡à¤¿à¤œà¤¿à¤Ÿà¤² à¤¸à¥‡à¤µà¤¾à¤à¤‚)</small></h3>
                        <p>Digital Services for online transactions and services.</p>
                        <button class="btn-scheme">View Schemes</button>
                    </div>

                </div>

                <div class="loan-form">
                    <h3>Apply for Loan</h3>
                    <div class="form-row">
                        <select class="form-input">
                            <option>Select Loan Type</option>
                            <option>Personal Loan</option>
                            <option>Business Loan</option>
                            <option>Kisan Loan</option>
                        </select>
                        <select class="form-input">
                            <option>Select District</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <input type="text" class="form-input" placeholder="Applicant Name">
                        <input type="text" class="form-input" placeholder="Loan Amount Needed">
                    </div>
                    <button class="btn-submit">Submit Application (à¤†à¤µà¥‡à¤¦à¤¨ à¤œà¤®à¤¾ à¤•à¤°à¥‡à¤‚) <i
                            class="fas fa-paper-plane"></i></button>
                </div>
            </div>

            <!-- Health Tab -->
            <div id="health-tab" class="tab-content">
                <div class="service-box-large">
                    <h3>Health Card Services</h3>
                    <p>Apply for or download your health card for medical benefits.</p>
                </div>
            </div>

            <!-- Training Tab -->
            <div id="training-tab" class="tab-content">
                <div class="service-box-large">
                    <h3>Training Programs</h3>
                    <p>Skill development and training programs for rural communities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gramin Pathshala Section -->
    <section id="pathshala" class="gramin-pathshala">
        <div class="container">
            <div class="pathshala-header">
                <h2>à¤—à¥à¤°à¤¾à¤®à¥€à¤¨ à¤ªà¤¾à¤ à¤¶à¤¾à¤²à¤¾ / Gramin Pathshala</h2>
                <p class="pathshala-subtitle">Rural School - Educating Rural Communities</p>
            </div>

            <div class="pathshala-content">
                <div class="pathshala-left">
                    <div class="pathshala-image">
                        <img src="{{ asset('assets/images/open-air-classroom-hauz-khas-delhi-india-th-jan-poor-children-being-taught-volunteers-classes-like-madrasa-36929459.webp') }}"
                            alt="Gramin Pathshala Education">
                    </div>
                    <div class="pathshala-stats">
                        <div class="stat-box">
                            <div class="stat-number">5000+</div>
                            <div class="stat-label" style="color: red;">Students Taught</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number">50+</div>
                            <div class="stat-label" style="color: red;">Rural Centers</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number">100+</div>
                            <div class="stat-label" style="color: red;">Dedicated Teachers</div>
                        </div>
                    </div>
                </div>

                <div class="pathshala-right">
                    <h3>Mission & Vision</h3>
                    <p>Gramin Pathshala is our initiative to provide quality education to children in rural areas where
                        traditional education infrastructure is limited. We believe every child, regardless of their
                        background, deserves access to quality education.</p>

                    <div class="pathshala-programs">
                        <h4>Our Programs</h4>
                        <div class="program-list">
                            <div class="program-item">
                                <i class="fas fa-book"></i>
                                <div>
                                    <h5>Basic Education</h5>
                                    <p>Foundation courses covering mathematics, science, and languages</p>
                                </div>
                            </div>
                            <div class="program-item">
                                <i class="fas fa-laptop"></i>
                                <div>
                                    <h5>Digital Literacy</h5>
                                    <p>Computer skills and internet awareness training</p>
                                </div>
                            </div>
                            <div class="program-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div>
                                    <h5>Skill Development</h5>
                                    <p>Vocational training for employment opportunities</p>
                                </div>
                            </div>
                            <div class="program-item">
                                <i class="fas fa-globe"></i>
                                <div>
                                    <h5>Life Skills</h5>
                                    <p>Personality development and social awareness programs</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pathshala-cta">
                        <button class="btn-pathshala-primary">Learn More</button>
                        <button class="btn-pathshala-secondary">Donate for Education</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <h2>GWCT Gallery / à¤—à¥ˆà¤²à¤°à¥€</h2>

            <div class="gallery-grid">
                <!-- 1. Bal Vivah Rok Tham -->
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/images.jpg') }}" alt="Bal Vivah Rok Tham">
                    <div class="gallery-label">Bal Vivah Rok Tham<br><small>(à¤¬à¤¾à¤² à¤µà¤¿à¤µà¤¾à¤¹ à¤°à¥‹à¤•à¤¥à¤¾à¤®)</small></div>
                </div>
                <!-- 2. Gramin Pathshala -->
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/pathshala.webp') }}" alt="Gramin Pathshala">
                    <div class="gallery-label">Gramin Pathshala<br><small>(à¤—à¥à¤°à¤¾à¤®à¥€à¤¨ à¤ªà¤¾à¤ à¤¶à¤¾à¤²à¤¾)</small></div>
                </div>
                <!-- 3. Banking Service -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=250&h=250&fit=crop"
                        alt="Banking Service">
                    <div class="gallery-label">Banking Service<br><small>(à¤¬à¥ˆà¤‚à¤•à¤¿à¤‚à¤— à¤¸à¥‡à¤µà¤¾)</small></div>
                </div>
                <!-- 4. All Type Loan Service -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=250&h=250&fit=crop"
                        alt="Loan Services">
                    <div class="gallery-label">All Type Loan Service<br><small>(à¤¸à¤­à¥€ à¤ªà¥à¤°à¤•à¤¾à¤° à¤•à¥€ à¤‹à¤£ à¤¸à¥‡à¤µà¤¾)</small></div>
                </div>
                <!-- 5. Health Card -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=250&h=250&fit=crop"
                        alt="Health Card">
                    <div class="gallery-label">Health Card<br><small>(à¤†à¤°à¥‹à¤—à¥à¤¯ à¤•à¤¾à¤°à¥à¤¡)</small></div>
                </div>
                <!-- 6. Skill Training -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=250&h=250&fit=crop"
                        alt="Skill Training">
                    <div class="gallery-label">Skill Training<br><small>(à¤•à¥Œà¤¶à¤² à¤ªà¥à¤°à¤¶à¤¿à¤•à¥à¤·à¤£)</small></div>
                </div>
                <!-- Additional Gallery Items -->
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/camp.jpeg') }}" alt="Community Camp">
                    <div class="gallery-label">Community Camp<br><small>(à¤¸à¤¾à¤®à¥à¤¦à¤¾à¤¯à¤¿à¤• à¤¶à¤¿à¤µà¤¿à¤°)</small></div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=250&h=250&fit=crop"
                        alt="Agriculture Support">
                    <div class="gallery-label">Agriculture Support<br><small>(à¤•à¥ƒà¤·à¤¿ à¤¸à¤¹à¤¾à¤¯à¤¤à¤¾)</small></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bal Vivah Rok Tham Section (Child Marriage Prevention) -->
    <section id="bal-vivah" class="bal-vivah-section">
        <div class="bal-vivah-hero">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=1400&h=600&fit=crop"
                alt="Bal Vivah Rok Tham" class="hero-image">
            <div class="hero-overlay"></div>
            <div class="hero-text">
                <h2>à¤¬à¤¾à¤² à¤µà¤¿à¤µà¤¾à¤¹ à¤°à¥‹à¤•à¤¥à¤¾à¤®</h2>
                <h3>Bal Vivah Rok Tham / Child Marriage Prevention</h3>
                <p>Protecting the Future of Our Girls | à¤¹à¤®à¤¾à¤°à¥€ à¤²à¤¡à¤¼à¤•à¤¿à¤¯à¥‹à¤‚ à¤•à¤¾ à¤­à¤µà¤¿à¤·à¥à¤¯ à¤¸à¥à¤°à¤•à¥à¤·à¤¿à¤¤ à¤•à¤°à¤¨à¤¾</p>
            </div>
        </div>

        <div class="container">
            <!-- Impact Statistics -->
            <div class="bal-vivah-stats">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="stat-content">
                        <h4>2500+</h4>
                        <p>Girls Saved from Early Marriage</p>
                        <p style="font-size: 12px; color: #666;">à¤²à¤¡à¤¼à¤•à¤¿à¤¯à¥‹à¤‚ à¤•à¥‹ à¤¬à¤¾à¤² à¤µà¤¿à¤µà¤¾à¤¹ à¤¸à¥‡ à¤¬à¤šà¤¾à¤¯à¤¾ à¤—à¤¯à¤¾</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-content">
                        <h4>1200+</h4>
                        <p>Girls Continue Education</p>
                        <p style="font-size: 12px; color: #666;">à¤¶à¤¿à¤•à¥à¤·à¤¾ à¤œà¤¾à¤°à¥€ à¤°à¤–à¤¨à¥‡ à¤µà¤¾à¤²à¥€ à¤²à¤¡à¤¼à¤•à¤¿à¤¯à¤¾à¤‚</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h4>5000+</h4>
                        <p>Families Counseled</p>
                        <p style="font-size: 12px; color: #666;">à¤ªà¤°à¤¿à¤µà¤¾à¤°à¥‹à¤‚ à¤•à¥‹ à¤¸à¤²à¤¾à¤¹ à¤¦à¥€ à¤—à¤ˆ</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-village"></i>
                    </div>
                    <div class="stat-content">
                        <h4>80+</h4>
                        <p>Villages Covered</p>
                        <p style="font-size: 12px; color: #666;">à¤—à¤¾à¤‚à¤µà¥‹à¤‚ à¤®à¥‡à¤‚ à¤•à¤¾à¤°à¥à¤¯à¤°à¤¤</p>
                    </div>
                </div>
            </div>

            <!-- Program Overview -->
            <div class="bal-vivah-overview">
                <h3>Our Mission & Approach</h3>
                <p>Child marriage is a violation of human rights and a barrier to development. GWCT is committed to
                    eliminating this practice through awareness campaigns, community engagement, and education
                    initiatives. We work with families, schools, and local authorities to protect girls' rights and
                    ensure their safety, education, and bright future.</p>
            </div>


            <!-- Our Interventions -->
            <div class="bal-vivah-interventions">
                <h3 style="text-align: center; margin-bottom: 30px;">How We Work / à¤¹à¤® à¤•à¥ˆà¤¸à¥‡ à¤•à¤¾à¤® à¤•à¤°à¤¤à¥‡ à¤¹à¥ˆà¤‚</h3>
                <div class="interventions-grid">
                    <div class="intervention-box">
                        <div class="intervention-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4>Awareness Campaigns</h4>
                        <p>à¤¸à¤¾à¤®à¥à¤¦à¤¾à¤¯à¤¿à¤• à¤œà¤¾à¤—à¤°à¥‚à¤•à¤¤à¤¾ à¤…à¤­à¤¿à¤¯à¤¾à¤¨</p>
                        <p style="font-size: 12px; color: #666; margin-top: 10px;">Community awareness programs about
                            the harmful effects of child marriage and girls' education importance.</p>
                    </div>

                    <div class="intervention-box">
                        <div class="intervention-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h4>Family Counseling</h4>
                        <p>à¤ªà¤¾à¤°à¤¿à¤µà¤¾à¤°à¤¿à¤• à¤ªà¤°à¤¾à¤®à¤°à¥à¤¶</p>
                        <p style="font-size: 12px; color: #666; margin-top: 10px;">One-on-one counseling with families
                            to change mindsets and stop child marriages.</p>
                    </div>

                    <div class="intervention-box">
                        <div class="intervention-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4>School Partnerships</h4>
                        <p>à¤¸à¥à¤•à¥‚à¤² à¤­à¤¾à¤—à¥€à¤¦à¤¾à¤°à¥€</p>
                        <p style="font-size: 12px; color: #666; margin-top: 10px;">Working with schools to keep girls
                            enrolled and ensure their continued education.</p>
                    </div>

                    <div class="intervention-box">
                        <div class="intervention-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <h4>Skill Training</h4>
                        <p>à¤•à¥Œà¤¶à¤² à¤ªà¥à¤°à¤¶à¤¿à¤•à¥à¤·à¤£</p>
                        <p style="font-size: 12px; color: #666; margin-top: 10px;">Vocational training programs to make
                            girls economically independent and employable.</p>
                    </div>

                    <div class="intervention-box">
                        <div class="intervention-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h4>Legal Support</h4>
                        <p>à¤•à¤¾à¤¨à¥‚à¤¨à¥€ à¤¸à¤®à¤°à¥à¤¥à¤¨</p>
                        <p style="font-size: 12px; color: #666; margin-top: 10px;">Legal assistance and coordination
                            with authorities to prevent and prosecute child marriages.</p>
                    </div>

                    <div class="intervention-box">
                        <div class="intervention-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Survivor Support</h4>
                        <p>à¤ªà¥€à¤¡à¤¼à¤¿à¤¤à¥‹à¤‚ à¤•à¤¾ à¤¸à¤®à¤°à¥à¤¥à¤¨</p>
                        <p style="font-size: 12px; color: #666; margin-top: 10px;">Post-rescue counseling and
                            rehabilitation programs for girls rescued from child marriage.</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bal-vivah-cta"
                style="text-align: center; padding: 40px 0; background: linear-gradient(135deg, #1b7e3a 0%, #2d9e52 100%); border-radius: 8px; margin: 40px 0; color: white;">
                <h3 style="margin-bottom: 20px; font-size: 28px;">Join Us in Protecting Our Girls' Future</h3>
                <p style="margin-bottom: 30px; font-size: 16px;">à¤¹à¤®à¤¾à¤°à¥€ à¤²à¤¡à¤¼à¤•à¤¿à¤¯à¥‹à¤‚ à¤•à¥‡ à¤­à¤µà¤¿à¤·à¥à¤¯ à¤•à¥€ à¤°à¤•à¥à¤·à¤¾ à¤®à¥‡à¤‚ à¤¹à¤®à¤¾à¤°à¥‡ à¤¸à¤¾à¤¥ à¤œà¥à¤¡à¤¼à¥‡à¤‚
                </p>
                <div class="cta-buttons" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <button class="btn-primary-large"
                        style="padding: 12px 30px; background: white; color: #1b7e3a; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 16px;">Donate
                        Now</button>
                    <button class="btn-secondary-large"
                        style="padding: 12px 30px; background: transparent; color: white; border: 2px solid white; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 16px;">Report
                        Child Marriage</button>
                    <button class="btn-secondary-large"
                        style="padding: 12px 30px; background: transparent; color: white; border: 2px solid white; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 16px;">Get
                        Involved</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Hiring Section -->
    <section id="apply" class="hiring-section">
        <!-- Hiring Alert Banner -->
        <div class="hiring-alert-banner">
            <div class="container">
                <div class="alert-content">
                    <div class="alert-left">
                        <div class="alert-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div>
                            <h2>ðŸ”” HIRING ALERT! ðŸ””</h2>
                            <p>GWCT Social Welfare - Hiring & Organizational Structure Details</p>
                        </div>
                    </div>
                    <div class="alert-ribbon">
                        <span>OPEN POSITIONS</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Hiring Positions Section -->
            <div class="hiring-content">
                <div class="hiring-header">
                    <h2>Available Hiring Positions / à¤‰à¤ªà¤²à¤¬à¥à¤§ à¤ªà¤¦</h2>
                    <p>Join GWCT and make a real difference in rural communities | à¤—à¥à¤°à¤¾à¤®à¥€à¤£ à¤¸à¤®à¥à¤¦à¤¾à¤¯à¥‹à¤‚ à¤®à¥‡à¤‚ à¤µà¤¾à¤¸à¥à¤¤à¤µà¤¿à¤• à¤…à¤‚à¤¤à¤°
                        à¤²à¤¾à¤à¤‚</p>
                </div>

                <!-- Positions Table -->
                <div class="positions-table-wrapper">
                    <table class="positions-table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-briefcase"></i> Position</th>
                                <th><i class="fas fa-layer-group"></i> Level</th>
                                <th><i class="fas fa-graduation-cap"></i> Min. Qualification</th>
                                <th><i class="fas fa-info-circle"></i> Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>District Sangathan Sayojak</strong>
                                    <p class="hindi-text">(à¤œà¤¿à¤²à¤¾ à¤¸à¤‚à¤—à¤ à¤¨ à¤¸à¤¾à¤¯à¥‹à¤œà¤•)</p>
                                </td>
                                <td><span class="level-badge level-district">District</span></td>
                                <td>Matric (10th) or above</td>
                                <td>
                                    <button onclick="openApplyModal('District Sangathan Sayojak')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Block Sangathan Sayojak</strong>
                                    <p class="hindi-text">(à¤¬à¥à¤²à¥‰à¤• à¤¸à¤‚à¤—à¤ à¤¨ à¤¸à¤¾à¤¯à¥‹à¤œà¤•)</p>
                                </td>
                                <td><span class="level-badge level-block">Block</span></td>
                                <td>Matric (10th) or above</td>
                                <td>
                                    <button onclick="openApplyModal('Block Sangathan Sayojak')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Gram Sangathan Sayojak</strong>
                                    <p class="hindi-text">(à¤—à¥à¤°à¤¾à¤® à¤¸à¤‚à¤—à¤ à¤¨ à¤¸à¤¾à¤¯à¥‹à¤œà¤•)</p>
                                </td>
                                <td><span class="level-badge level-gram">Village</span></td>
                                <td>Matric (10th) or above</td>
                                <td>
                                    <button onclick="openApplyModal('Gram Sangathan Sayojak')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Program Coordinator</strong>
                                    <p class="hindi-text">(à¤•à¤¾à¤°à¥à¤¯à¤•à¥à¤°à¤® à¤¸à¤®à¤¨à¥à¤µà¤¯à¤•)</p>
                                </td>
                                <td><span class="level-badge level-district">District</span></td>
                                <td>Bachelor's Degree (12+2)</td>
                                <td>
                                    <button onclick="openApplyModal('Program Coordinator')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Gramin Pathshala (Teacher)</strong>
                                    <p class="hindi-text">(à¤—à¥à¤°à¤¾à¤®à¥€à¤£ à¤ªà¤¾à¤ à¤¶à¤¾à¤²à¤¾ (à¤¶à¤¿à¤•à¥à¤·à¤•))</p>
                                </td>
                                <td><span class="level-badge level-gram">Village</span></td>
                                <td>Matric (10th) or above</td>
                                <td>
                                    <button onclick="openApplyModal('Gramin Pathshala (Teacher)')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Finance Manager</strong>
                                    <p class="hindi-text">(à¤µà¤¿à¤¤à¥à¤¤ à¤ªà¥à¤°à¤¬à¤‚à¤§à¤•)</p>
                                </td>
                                <td><span class="level-badge level-district">District</span></td>
                                <td>Commerce Graduate</td>
                                <td>
                                    <button onclick="openApplyModal('Finance Manager')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <!-- Hiring CTA -->
                <div class="hiring-cta">
                    <h3>Ready to Make a Difference?</h3>
                    <p>à¤†à¤ª à¤…à¤‚à¤¤à¤° à¤²à¤¾à¤¨à¥‡ à¤•à¥‡ à¤²à¤¿à¤ à¤¤à¥ˆà¤¯à¤¾à¤° à¤¹à¥ˆà¤‚? à¤†à¤œ à¤¹à¥€ à¤†à¤µà¥‡à¤¦à¤¨ à¤•à¤°à¥‡à¤‚!</p>
                    <div class="cta-buttons">
                        <button onclick="openApplyModal('General Application')" class="btn-apply-large">Apply Now <i
                                class="fas fa-paper-plane"></i></button>
                        <button class="btn-learn-more">Learn More About GWCT <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <!-- Contact Info -->
                <div id="contact" class="hiring-contact">
                    <h3>Questions About Hiring? / à¤­à¤°à¥à¤¤à¥€ à¤•à¥‡ à¤¬à¤¾à¤°à¥‡ à¤®à¥‡à¤‚ à¤ªà¥à¤°à¤¶à¥à¤¨?</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <strong>Email</strong>
                                <p>careers@gwct.org</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <strong>Phone</strong>
                                <p>+91 9102132444</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong>Office</strong>
                                <p>GWCT Headquarters</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


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


