@extends('layouts.website')
@section('content')
  
  
    <!-- Hero Section with Carousel -->
    <section id="home" class="hero">
        <div class="carousel">
            <!-- Slide 1: Community Empowerment -->
            <div class="carousel-item active"
                data-title="Community Empowerment"
                data-desc="Building stronger, more resilient rural communities">
                <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1600&h=900&fit=crop"
                    alt="Rural Community" class="hero-img">
                <!-- Desktop overlay content -->
                <div class="slide-content desktop-slide-content">
                    <div class="slide-badge"><i class="fas fa-leaf"></i> GWCT Initiative</div>
                    <h2>Community Empowerment</h2>
                    <p>Building stronger, more resilient rural communities</p>
                </div>
            </div>

            <!-- Slide 2: Health Services -->
            <div class="carousel-item"
                data-title="Healthcare Access"
                data-desc="Making healthcare accessible to every household">
                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1600&h=900&fit=crop"
                    alt="Health Care" class="hero-img">
                <div class="slide-content desktop-slide-content">
                    <div class="slide-badge"><i class="fas fa-heart"></i> Health Services</div>
                    <h2>Healthcare Access</h2>
                    <p>Making healthcare accessible to every household</p>
                </div>
            </div>

            <!-- Slide 3: Youth Development -->
            <div class="carousel-item"
                data-title="Youth Skill Development"
                data-desc="Preparing youth for economic opportunities">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=1600&h=900&fit=crop"
                    alt="Youth Programs" class="hero-img">
                <div class="slide-content desktop-slide-content">
                    <div class="slide-badge"><i class="fas fa-graduation-cap"></i> Youth Program</div>
                    <h2>Youth Skill Development</h2>
                    <p>Preparing youth for economic opportunities</p>
                </div>
            </div>

            <!-- Slide 4: Agriculture Support -->
            <div class="carousel-item"
                data-title="Agricultural Support"
                data-desc="Improving farming practices and rural livelihoods">
                <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=1600&h=900&fit=crop"
                    alt="Agriculture" class="hero-img">
                <div class="slide-content desktop-slide-content">
                    <div class="slide-badge"><i class="fas fa-tractor"></i> Agriculture</div>
                    <h2>Agricultural Support</h2>
                    <p>Improving farming practices and rural livelihoods</p>
                </div>
            </div>
        </div>

        <!-- Dark gradient overlay -->
        <div class="hero-overlay"></div>

        <!-- Hero main content (title + CTA) - desktop only -->
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
                    <a href="{{ route('website.donate') }}" class="btn-donate-large">Donate to Make a Difference</a>
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
        </div>
    </section>

    <!-- Mobile Caption Strip: shown ONLY on mobile, below the banner -->
    <div class="hero-mobile-caption" id="heroMobileCaption">
        <div class="mobile-caption-icon"><i class="fas fa-leaf"></i></div>
        <div class="mobile-caption-text">
            <h3 id="mobileCaptionTitle">Community Empowerment</h3>
            <p id="mobileCaptionText">Building stronger, more resilient rural communities</p>
        </div>
    </div>

    <!-- Objectives Section -->
    <section id="about" class="objectives-section">
        <div class="container">
            <h2>हमारे उद्देश्य / Our Objectives</h2>
            <div class="objectives-grid row">
                <!-- Objective 1: Education -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3>शिक्षा और जागरूकता</h3>
                        <p>ग्रामीण क्षेत्रों में शिक्षा को बढ़ावा देना और जागरूकता फैलाना।</p>
                        <p class="objective-en">Education & Awareness - Rural areas education promotion</p>
                    </div>
                </div>

                <!-- Objective 2: Child Marriage Prevention -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>बाल विवाह रोकथाम</h3>
                        <p>बाल विवाह के खिलाफ कार्य करना और समाज के सचेतन व संचेतन के लिए कार्य करना।</p>
                        <p class="objective-en">Child Marriage Prevention - Awareness campaigns</p>
                    </div>
                </div>

                <!-- Objective 3: Financial Assistance -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h3>आर्थिक सहायता एवं बेरोजगार</h3>
                        <p>गरीब व जरूरतमंद लोगों को आर्थिक सहायता का संगठन करना।</p>
                        <p class="objective-en">Financial Aid & Employment - Economic support</p>
                    </div>
                </div>

                <!-- Objective 4: Banking Services -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <h3>बैंकिंग सेवाएं</h3>
                        <p>बैंकिंग सेवाओं के माध्यम से वित्तीय समावेशन और बेरोजगारी के अंतर उत्पलब्ध कराना।</p>
                        <p class="objective-en">Banking Services (Suvidha Mitra) - Financial inclusion</p>
                    </div>
                </div>

                <!-- Objective 5: Health Services -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>स्वास्थ्य सेवाएं</h3>
                        <p>स्वास्थ्य कार्ड / स्वास्थ्य सेवाओं की सुविधा उपलब्ध कराना।</p>
                        <p class="objective-en">Health Services - Healthcare accessibility</p>
                    </div>
                </div>

                <!-- Objective 6: Women Empowerment -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-female"></i>
                        </div>
                        <h3>महिला सशक्तिकरण</h3>
                        <p>महिलाओं को आत्मनिर्भर और स्वावलंबी बनाने के लिए कार्य करना उनके अधिकार के लिए कार्य करना।</p>
                        <p class="objective-en">Women Empowerment - Rights & Independence</p>
                    </div>
                </div>

                <!-- Objective 7: Agriculture Support -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-tractor"></i>
                        </div>
                        <h3>कृषि सहायता एवं प्रशिक्षण</h3>
                        <p>किसानों को आधुनिक कृषि सहायता और प्रशिक्षण सहायता प्रदान और सहयोग उत्पलब्ध कराना।</p>
                        <p class="objective-en">Agriculture Support - Farming & Training</p>
                    </div>
                </div>

                <!-- Objective 8: Equality & Cooperation -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>समानता और सहयोग</h3>
                        <p>समाज में समानता, भाईचारे, समरसता और सहयोग उत्पलब्ध कराना।</p>
                        <p class="objective-en">Equality & Cooperation - Community harmony</p>
                    </div>
                </div>

                <!-- Objective 9: Gramin Pathshala -->
                <div class="col-md-4 mb-4">
                    <div class="objective-card h-100">
                        <div class="objective-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <h3>ग्रामीन पाठशाला</h3>
                        <p>ग्रामीण क्षेत्रों के बच्चों को गुणवत्तापूर्ण शिक्षा प्रदान करना और सशक्त भविष्य बनाना।</p>
                        <p class="objective-en">Gramin Pathshala - Rural School Education</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Services Section -->
    <section id="services" class="services-quick">
        <div class="container">
            <h2>Quick Apply for Services / सेवाओं के लिए तुरंत आवेदन करें</h2>

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
                        <h3>All Type Loan Services<br><small>(सभी प्रकार की बंद लेवाई)</small></h3>
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
                        <h3>Government Schemes<br><small>(सरकारी योजनाए)</small></h3>
                        <p>Government Schemes of Education, Schemes.</p>
                        <button class="btn-scheme">View Schemes</button>
                    </div>

                    <div class="service-box">
                        <div class="service-box-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <h3>Digital Services<br><small>(डिजिटल सेवाएं)</small></h3>
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
                    <button class="btn-submit">Submit Application (आवेदन जमा करें) <i
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
    </section>

    <!-- Gramin Pathshala Section -->
    <section id="pathshala" class="gramin-pathshala">
        <div class="container">
            <div class="pathshala-header">
                <h2>ग्रामीन पाठशाला / Gramin Pathshala</h2>
                <p class="pathshala-subtitle">Rural School - Educating Rural Communities</p>
            </div>

            <div class="pathshala-content">
                <div class="pathshala-left">
                    <div class="pathshala-image">
                        <img src="{{ url('assets/images/open-air-classroom-hauz-khas-delhi-india-th-jan-poor-children-being-taught-volunteers-classes-like-madrasa-36929459.webp') }}"
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
                        <a href="{{ route('website.donate') }}" class="btn-pathshala-secondary">Donate for Education</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <h2>GWCT Gallery / गैलरी</h2>

            <div class="gallery-grid">
                <!-- 1. Bal Vivah Rok Tham -->
                <div class="gallery-item">
                    <img src="{{ url('assets/images/images.jpg') }}" alt="Bal Vivah Rok Tham">
                    <div class="gallery-label">Bal Vivah Rok Tham<br><small>(बाल विवाह रोकथाम)</small></div>
                </div>
                <!-- 2. Gramin Pathshala -->
                <div class="gallery-item">
                    <img src="{{ url('assets/images/pathshala.webp') }}" alt="Gramin Pathshala">
                    <div class="gallery-label">Gramin Pathshala<br><small>(ग्रामीन पाठशाला)</small></div>
                </div>
                <!-- 3. Banking Service -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=250&h=250&fit=crop"
                        alt="Banking Service">
                    <div class="gallery-label">Banking Service<br><small>(बैंकिंग सेवा)</small></div>
                </div>
                <!-- 4. All Type Loan Service -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=250&h=250&fit=crop"
                        alt="Loan Services">
                    <div class="gallery-label">All Type Loan Service<br><small>(सभी प्रकार की ऋण सेवा)</small></div>
                </div>
                <!-- 5. Health Card -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=250&h=250&fit=crop"
                        alt="Health Card">
                    <div class="gallery-label">Health Card<br><small>(आरोग्य कार्ड)</small></div>
                </div>
                <!-- 6. Skill Training -->
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=250&h=250&fit=crop"
                        alt="Skill Training">
                    <div class="gallery-label">Skill Training<br><small>(कौशल प्रशिक्षण)</small></div>
                </div>
                <!-- Additional Gallery Items -->
                <div class="gallery-item">
                    <img src="{{ url('assets/images/camp.jpeg') }}" alt="Community Camp">
                    <div class="gallery-label">Community Camp<br><small>(सामुदायिक शिविर)</small></div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=250&h=250&fit=crop"
                        alt="Agriculture Support">
                    <div class="gallery-label">Agriculture Support<br><small>(कृषि सहायता)</small></div>
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
                <h2>बाल विवाह रोकथाम</h2>
                <h3>Bal Vivah Rok Tham / Child Marriage Prevention</h3>
                <p>Protecting the Future of Our Girls | हमारी लड़कियों का भविष्य सुरक्षित करना</p>
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
                        <p style="font-size: 12px; color: #666;">लड़कियों को बाल विवाह से बचाया गया</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-content">
                        <h4>1200+</h4>
                        <p>Girls Continue Education</p>
                        <p style="font-size: 12px; color: #666;">शिक्षा जारी रखने वाली लड़कियां</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h4>5000+</h4>
                        <p>Families Counseled</p>
                        <p style="font-size: 12px; color: #666;">परिवारों को सलाह दी गई</p>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-village"></i>
                    </div>
                    <div class="stat-content">
                        <h4>80+</h4>
                        <p>Villages Covered</p>
                        <p style="font-size: 12px; color: #666;">गांवों में कार्यरत</p>
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
                <h3 style="text-align: center; margin-bottom: 30px;">How We Work / हम कैसे काम करते हैं</h3>
                <div class="interventions-grid row">
                    <div class="col-md-4 mb-4">
                        <div class="intervention-box h-100">
                            <div class="intervention-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h4>Awareness Campaigns</h4>
                            <p>सामुदायिक जागरूकता अभियान</p>
                            <p style="font-size: 12px; color: #666; margin-top: 10px;">Community awareness programs about
                                the harmful effects of child marriage and girls' education importance.</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="intervention-box h-100">
                            <div class="intervention-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4>Family Counseling</h4>
                            <p>पारिवारिक परामर्श</p>
                            <p style="font-size: 12px; color: #666; margin-top: 10px;">One-on-one counseling with families
                                to change mindsets and stop child marriages.</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="intervention-box h-100">
                            <div class="intervention-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h4>School Partnerships</h4>
                            <p>स्कूल भागीदारी</p>
                            <p style="font-size: 12px; color: #666; margin-top: 10px;">Working with schools to keep girls
                                enrolled and ensure their continued education.</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="intervention-box h-100">
                            <div class="intervention-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <h4>Skill Training</h4>
                            <p>कौशल प्रशिक्षण</p>
                            <p style="font-size: 12px; color: #666; margin-top: 10px;">Vocational training programs to make
                                girls economically independent and employable.</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="intervention-box h-100">
                            <div class="intervention-icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <h4>Legal Support</h4>
                            <p>कानूनी समर्थन</p>
                            <p style="font-size: 12px; color: #666; margin-top: 10px;">Legal assistance and coordination
                                with authorities to prevent and prosecute child marriages.</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="intervention-box h-100">
                            <div class="intervention-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <h4>Survivor Support</h4>
                            <p>पीड़ितों का समर्थन</p>
                            <p style="font-size: 12px; color: #666; margin-top: 10px;">Post-rescue counseling and
                                rehabilitation programs for girls rescued from child marriage.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bal-vivah-cta"
                style="text-align: center; padding: 40px 0; background: linear-gradient(135deg, #1b7e3a 0%, #2d9e52 100%); border-radius: 8px; margin: 40px 0; color: white;">
                <h3 style="margin-bottom: 20px; font-size: 28px;">Join Us in Protecting Our Girls' Future</h3>
                <p style="margin-bottom: 30px; font-size: 16px;">हमारी लड़कियों के भविष्य की रक्षा में हमारे साथ जुड़ें
                </p>
                <div class="cta-buttons" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('website.donate') }}" class="btn-primary-large"
                        style="padding: 12px 30px; background: white; color: #1b7e3a; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 16px;">Donate
                        Now</a>
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
                            <h2>🔔 HIRING ALERT! 🔔</h2>
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
                    <h2>Available Hiring Positions / उपलब्ध पद</h2>
                    <p>Join GWCT and make a real difference in rural communities | ग्रामीण समुदायों में वास्तविक अंतर
                        लाएं</p>
                </div>

                <!-- Positions Table -->
                <div class="positions-table-wrapper">
                    <table class="positions-table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-briefcase"></i> Position</th>
                                <th><i class="fas fa-layer-group"></i> Level</th>
                                <th><i class="fas fa-graduation-cap"></i> Min. Qualification</th>
                                <th class="d-none"><i class="fas fa-info-circle"></i> Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>District Sangathan Sayojak</strong>
                                    <p class="hindi-text">(जिला संगठन सायोजक)</p>
                                </td>
                                <td><span class="level-badge level-district">District</span></td>
                                <td>Matric (10th) or above</td>
                                <td class="d-none">
                                    <button onclick="openApplyModal('District Sangathan Sayojak')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Block Sangathan Sayojak</strong>
                                    <p class="hindi-text">(ब्लॉक संगठन सायोजक)</p>
                                </td>
                                <td><span class="level-badge level-block">Block</span></td>
                                <td>Matric (10th) or above</td>
                                <td class="d-none">
                                    <button onclick="openApplyModal('Block Sangathan Sayojak')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Gram Sangathan Sayojak</strong>
                                    <p class="hindi-text">(ग्राम संगठन सायोजक)</p>
                                </td>
                                <td><span class="level-badge level-gram">Village</span></td>
                                <td>Matric (10th) or above</td>
                                <td class="d-none">
                                    <button onclick="openApplyModal('Gram Sangathan Sayojak')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Program Coordinator</strong>
                                    <p class="hindi-text">(कार्यक्रम समन्वयक)</p>
                                </td>
                                <td><span class="level-badge level-district">District</span></td>
                                <td>Bachelor's Degree (12+2)</td>
                                <td class="d-none">
                                    <button onclick="openApplyModal('Program Coordinator')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Gramin Pathshala (Teacher)</strong>
                                    <p class="hindi-text">(ग्रामीण पाठशाला (शिक्षक))</p>
                                </td>
                                <td><span class="level-badge level-gram">Village</span></td>
                                <td>Matric (10th) or above</td>
                                <td class="d-none">
                                    <button onclick="openApplyModal('Gramin Pathshala (Teacher)')"
                                        class="btn-apply-small">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Finance Manager</strong>
                                    <p class="hindi-text">(वित्त प्रबंधक)</p>
                                </td>
                                <td><span class="level-badge level-district">District</span></td>
                                <td>Commerce Graduate</td>
                                <td class="d-none">
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
                    <p>आप अंतर लाने के लिए तैयार हैं? आज ही आवेदन करें!</p>
                    <div class="cta-buttons">
                        <button onclick="openApplyModal('General Application')" class="btn-apply-large d-none">Apply Now <i
                                class="fas fa-paper-plane"></i></button>
                        <button class="btn-learn-more">Learn More About GWCT <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>

                <!-- Contact Info -->
                <div id="contact" class="hiring-contact">
                    <h3>Questions About Hiring? / भर्ती के बारे में प्रश्न?</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <strong>Email</strong>
                                <p>careers@gwct.in</p>
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

        /* Fixed Grid Layout for Exact 3 Columns */
        .objectives-grid.row, .interventions-grid.row {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 25px !important;
            margin: 0 !important;
        }
        .objectives-grid .col-md-4, .interventions-grid .col-md-4 {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        @media (max-width: 991px) {
            .objectives-grid.row, .interventions-grid.row {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 20px !important;
            }
        }
        @media (max-width: 768px) {
            .objectives-grid.row, .interventions-grid.row {
                grid-template-columns: 1fr !important;
                gap: 15px !important;
            }
        }

        /* ========== HERO BANNER STYLES ========== */

        /* Desktop: Full screen hero */
        .hero {
            position: relative !important;
            width: 100vw !important;
            height: 90vh !important;
            min-height: 600px !important;
            overflow: hidden !important;
            display: block !important;
        }
        .hero .carousel,
        .hero .carousel-item {
            position: absolute !important;
            inset: 0 !important;
            width: 100% !important;
            height: 100% !important;
        }
        .hero-img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            object-position: center center !important;
            display: block !important;
        }

        /* Desktop slide-content: glassmorphism pill overlaid on image */
        .desktop-slide-content {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            position: absolute !important;
            bottom: 60px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            width: auto !important;
            min-width: 350px;
            max-width: 600px;
            background: rgba(0, 0, 0, 0.45) !important;
            backdrop-filter: blur(14px) !important;
            -webkit-backdrop-filter: blur(14px) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 60px !important;
            padding: 18px 44px !important;
            text-align: center !important;
            z-index: 10 !important;
            animation: heroBadgeFlyIn 0.7s cubic-bezier(0.22, 1, 0.36, 1) 0.15s both !important;
        }
        @keyframes heroBadgeFlyIn {
            from { opacity: 0; transform: translateX(-50%) translateY(25px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
        .slide-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255, 222, 89, 0.18);
            border: 1px solid rgba(255, 222, 89, 0.4);
            color: #ffde59;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 30px;
            margin-bottom: 10px;
        }
        .desktop-slide-content h2 {
            font-size: 26px !important;
            font-weight: 800 !important;
            color: #ffffff !important;
            text-shadow: 0 2px 8px rgba(0,0,0,0.6) !important;
            margin: 0 0 6px 0 !important;
            letter-spacing: 0.5px !important;
        }
        .desktop-slide-content p {
            font-size: 15px !important;
            color: rgba(255,255,255,0.90) !important;
            margin: 0 !important;
            font-weight: 400 !important;
        }

        /* Hero main content (title + CTA) - desktop centered */
        .hero-overlay {
            background: linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.50) 100%) !important;
        }
        .hero-content {
            position: absolute !important;
            inset: 0 !important;
            margin: 0 auto !important;
            max-width: 1200px !important;
            width: 100% !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 0 40px !important;
            z-index: 5 !important;
        }
        .carousel-indicators {
            bottom: 16px !important;
            z-index: 20 !important;
        }
        .carousel-nav {
            z-index: 20 !important;
        }

        /* Mobile caption strip - hidden on desktop */
        .hero-mobile-caption {
            display: none;
        }

        /* ========== MOBILE: Image full width, caption BELOW ========== */
        @media (max-width: 768px) {
            .hero {
                height: 55vw !important;
                min-height: 220px !important;
                max-height: 360px !important;
            }

            /* Hide desktop overlaid slide content on mobile */
            .desktop-slide-content {
                display: none !important;
            }

            /* Hide desktop hero-content (title+CTA) on mobile */
            .hero-content {
                display: none !important;
            }

            /* Show mobile caption strip below the banner */
            .hero-mobile-caption {
                display: flex !important;
                align-items: center;
                gap: 14px;
                background: linear-gradient(135deg, #1b7e3a 0%, #145c2c 100%);
                color: white;
                padding: 16px 20px;
                width: 100%;
            }
            .mobile-caption-icon {
                background: rgba(255,255,255,0.15);
                width: 44px;
                height: 44px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                color: #ffde59;
                flex-shrink: 0;
            }
            .mobile-caption-text h3 {
                font-size: 16px;
                font-weight: 700;
                margin: 0 0 3px 0;
                color: #ffde59;
            }
            .mobile-caption-text p {
                font-size: 13px;
                margin: 0;
                color: rgba(255,255,255,0.88);
                line-height: 1.4;
            }
        }
    </style>


