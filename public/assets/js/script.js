// ============ Carousel Functions ============
let currentSlide = 0;
let slides = [];

function updateMobileCaption() {
    if (slides.length === 0) return;
    const activeSlide = slides[currentSlide];
    const title = activeSlide.getAttribute('data-title') || '';
    const desc  = activeSlide.getAttribute('data-desc')  || '';
    const titleEl = document.getElementById('mobileCaptionTitle');
    const textEl  = document.getElementById('mobileCaptionText');
    if (titleEl) titleEl.textContent = title;
    if (textEl)  textEl.textContent  = desc;
}

function changeSlide(direction) {
    if (slides.length === 0) return;
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + direction + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
    updateIndicators();
    updateMobileCaption();
}

function goToSlide(slideIndex) {
    if (slides.length === 0) return;
    slides[currentSlide].classList.remove('active');
    currentSlide = slideIndex % slides.length;
    slides[currentSlide].classList.add('active');
    updateIndicators();
    updateMobileCaption();
}

function updateIndicators() {
    const indicators = document.querySelectorAll('.indicator');
    indicators.forEach((ind, index) => {
        if (index === currentSlide) {
            ind.classList.add('active');
        } else {
            ind.classList.remove('active');
        }
    });
}

// ============ Tab Switching Functions ============
function switchTab(tabName) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.remove('active');
    });

    // Remove active class from all buttons
    const tabButtons = document.querySelectorAll('.tab-btn');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });

    // Show selected tab
    const tabElement = document.getElementById(tabName + '-tab');
    if (tabElement) {
        tabElement.classList.add('active');
    }

    // Add active class to clicked button
    if (event && event.target) {
        event.target.classList.add('active');
    }
}

// Set first tab as active on page load and initialize carousel
document.addEventListener('DOMContentLoaded', () => {
    // Initialize carousel
    slides = document.querySelectorAll('.carousel-item');
    
    // Auto-rotate carousel every 6 seconds
    if (slides.length > 0) {
        setInterval(() => {
            changeSlide(1);
        }, 6000);
        
        // Initialize indicators
        updateIndicators();
        // Sync mobile caption with first slide
        updateMobileCaption();
    }
    
    // Set first tab as active
    const firstTab = document.querySelector('.tab-btn');
    if (firstTab) {
        firstTab.click();
    }
});

// ============ Form Submission ============
document.addEventListener('DOMContentLoaded', () => {
    const submitBtn = document.querySelector('.btn-submit');
    if (submitBtn) {
        submitBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showNotification('Application submitted successfully! We will contact you soon.');
        });
    }
});

// ============ Smooth Scrolling ============
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#') {
            e.preventDefault();
            const element = document.querySelector(href);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});

// ============ Scroll to Top Button ============
const scrollToTopBtn = document.querySelector('.scroll-to-top');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        if (scrollToTopBtn && !scrollToTopBtn.classList.contains('show')) {
            scrollToTopBtn.classList.add('show');
        }
    } else {
        if (scrollToTopBtn && scrollToTopBtn.classList.contains('show')) {
            scrollToTopBtn.classList.remove('show');
        }
    }
});

// ============ Notification System ============
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// ============ Add Scroll to Top Button to Page ============
document.addEventListener('DOMContentLoaded', () => {
    const scrollBtn = document.createElement('button');
    scrollBtn.className = 'scroll-to-top';
    scrollBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    document.body.appendChild(scrollBtn);
});

// ============ Add Animation on Scroll ============
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, {
    threshold: 0.1
});

document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('.service-box, .gallery-item');
    elements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// ============ Form Validation ============
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (form) {
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        let isValid = true;
        
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = '#e74c3c';
            } else {
                input.style.borderColor = 'var(--border-color)';
            }
        });
        
        return isValid;
    }
    return true;
}

// Service Modal
function openServiceModal(service) {
    const serviceContent = {
        'health': {
            title: 'Health Card Services',
            content: `
                <h3>Apply for Health Card</h3>
                <p>Our comprehensive health card provides access to medical benefits and healthcare services.</p>
                <h4>Benefits:</h4>
                <ul>
                    <li>Access to network hospitals</li>
                    <li>Discounted medical services</li>
                    <li>Cashless treatment facility</li>
                    <li>Annual health check-ups</li>
                </ul>
                <p><strong>Documents Required:</strong></p>
                <ul>
                    <li>Aadhar Card</li>
                    <li>Passport Size Photo</li>
                    <li>Proof of Residence</li>
                </ul>
                <button class="btn btn-primary" onclick="closeServiceModal(); openRegisterModal();">Apply Now</button>
            `
        },
        'aeps': {
            title: 'AEPS (Aadhaar Enabled Payment System)',
            content: `
                <h3>AEPS - Secure Digital Payments</h3>
                <p>Withdraw cash and transfer money using your Aadhar card and fingerprint.</p>
                <h4>Services Available:</h4>
                <ul>
                    <li>Cash Withdrawal</li>
                    <li>Cash Deposit</li>
                    <li>Balance Inquiry</li>
                    <li>Money Transfer</li>
                </ul>
                <h4>How to Use:</h4>
                <p>Visit any authorized GWCT service point with your Aadhar card. No other documents needed!</p>
                <button class="btn btn-primary" onclick="alert('AEPS Service Request Submitted');">Request Service</button>
            `
        },
        'transfer': {
            title: 'Money Transfer Services',
            content: `
                <h3>Send Money Anywhere, Anytime</h3>
                <p>Transfer money safely to any bank account in India with minimal charges.</p>
                <h4>Features:</h4>
                <ul>
                    <li>Instant Transfer</li>
                    <li>Competitive Rates</li>
                    <li>24/7 Availability</li>
                    <li>Safe & Secure</li>
                    <li>Receipt on SMS</li>
                </ul>
                <p><strong>Charges:</strong> As per RBI guidelines</p>
                <button class="btn btn-primary" onclick="alert('Money Transfer Service Selected');">Proceed</button>
            `
        },
        'loans': {
            title: 'Loan Services',
            content: `
                <h3>Multiple Loan Options</h3>
                <p>Choose from Personal, Business, or Group Loans based on your needs.</p>
                <h4>Loan Types:</h4>
                <ul>
                    <li><strong>Personal Loan:</strong> Up to ₹5,00,000</li>
                    <li><strong>Business Loan:</strong> Up to ₹10,00,000</li>
                    <li><strong>Group Loan:</strong> Up to ₹15,00,000</li>
                </ul>
                <h4>Quick Process:</h4>
                <p>Minimal documentation • Quick approval • Flexible repayment terms</p>
                <button class="btn btn-primary" onclick="closeServiceModal(); openLoanForm('personal');">Apply for Loan</button>
            `
        },
        'social': {
            title: 'Social Work & Community Programs',
            content: `
                <h3>Our Social Initiatives</h3>
                <p>GWCT is committed to social welfare and community development.</p>
                <h4>Programs:</h4>
                <ul>
                    <li>Educational Support for Rural Children</li>
                    <li>Women Empowerment Programs</li>
                    <li>Health Awareness Camps</li>
                    <li>Community Development Projects</li>
                    <li>Skill Development Training</li>
                </ul>
                <h4>Contact us to participate or get more information!</h4>
                <button class="btn btn-primary" onclick="alert('Social Program Information Requested');">Learn More</button>
            `
        },
        'child': {
            title: 'Bal Vivah Roktham - Anti Child Marriage Initiative',
            content: `
                <h3>Fighting Against Child Marriage</h3>
                <p>GWCT runs active campaigns to prevent child marriage and protect children's rights.</p>
                <h4>Our Focus:</h4>
                <ul>
                    <li>Awareness programs in rural areas</li>
                    <li>Legal support and counseling</li>
                    <li>Education support for girls</li>
                    <li>Community engagement</li>
                    <li>Reporting mechanisms for abuse</li>
                </ul>
                <h4>Helpline & Support:</h4>
                <p><strong>Phone:</strong> 1800-GWCT-HELP</p>
                <p>Available 24/7 for reporting and assistance</p>
                <button class="btn btn-primary" onclick="alert('Anti Child Marriage Support - Contact helpline: 1800-GWCT-HELP');">Get Support</button>
            `
        }
    };

    const modal = document.getElementById('serviceModal');
    const title = document.getElementById('serviceTitle');
    const content = document.getElementById('serviceContent');

    if (serviceContent[service]) {
        title.textContent = serviceContent[service].title;
        content.innerHTML = serviceContent[service].content;
        modal.style.display = 'block';
    }
}

function closeServiceModal() {
    document.getElementById('serviceModal').style.display = 'none';
}

// Switch between login and register
function switchToRegister() {
    closeLoginModal();
    openRegisterModal();
}

function switchToLogin() {
    closeRegisterModal();
    openLoginModal();
}

// ============ Form Handlers ============

function handleLogin(event) {
    event.preventDefault();
    const phone = document.getElementById('loginPhone').value;
    const password = document.getElementById('loginPassword').value;
    
    if (phone.length === 10 && password.length >= 6) {
        alert(`Welcome back! Login successful for ${phone}`);
        closeLoginModal();
        // Reset form
        event.target.reset();
    } else {
        alert('Please enter valid phone number (10 digits) and password (min 6 characters)');
    }
}

function handleRegister(event) {
    event.preventDefault();
    const name = document.getElementById('regName').value;
    const phone = document.getElementById('regPhone').value;
    const email = document.getElementById('regEmail').value;
    const aadhar = document.getElementById('regAadhar').value;
    const password = document.getElementById('regPassword').value;
    
    if (phone.length === 10 && aadhar.length === 12 && password.length >= 6) {
        alert(`Welcome ${name}! Registration successful. Your account has been created. You can now login with your phone number.`);
        closeRegisterModal();
        // Reset form
        event.target.reset();
    } else {
        alert('Please check your inputs:\n- Phone: 10 digits\n- Aadhar: 12 digits\n- Password: minimum 6 characters');
    }
}

function handleLoanApplication(event) {
    event.preventDefault();
    const name = document.getElementById('loanName').value;
    const aadhar = document.getElementById('loanAadhar').value;
    const income = document.getElementById('loanIncome').value;
    const amount = document.getElementById('loanAmount').value;
    const duration = document.getElementById('loanDuration').value;
    const purpose = document.getElementById('loanPurpose').value;
    
    if (aadhar.length === 12 && income > 0 && amount > 0 && duration > 0) {
        alert(`Loan Application Submitted Successfully!\n\nApplicant: ${name}\nLoan Amount: ₹${amount}\nRepayment Period: ${duration} months\n\nYou will receive confirmation SMS shortly.`);
        closeLoanModal();
        event.target.reset();
    } else {
        alert('Please fill all fields correctly:\n- Aadhar: 12 digits\n- Income, Amount, Duration: positive numbers');
    }
}

// ============ Close Modal on Outside Click ============
window.addEventListener('click', (event) => {
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const loanModal = document.getElementById('loanModal');
    const serviceModal = document.getElementById('serviceModal');
    
    if (event.target === loginModal) {
        closeLoginModal();
    }
    if (event.target === registerModal) {
        closeRegisterModal();
    }
    if (event.target === loanModal) {
        closeLoanModal();
    }
    if (event.target === serviceModal) {
        closeServiceModal();
    }
});

// ============ Smooth Scroll for Navigation ============
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            document.querySelector(href).scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// ============ Scroll Effects ============
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const cardObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeIn 0.8s ease-out';
            cardObserver.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all service cards, loan cards, and social cards
document.querySelectorAll('.service-card, .loan-card, .social-card, .step, .contact-card').forEach(el => {
    cardObserver.observe(el);
});

// ============ Active Navigation Link ============
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
    let currentSection = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (scrollY >= (sectionTop - 200)) {
            currentSection = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').slice(1) === currentSection) {
            link.classList.add('active');
        }
    });
});

// ============ Utility Functions ============

// Format currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR'
    }).format(amount);
}

// Validate Aadhar
function isValidAadhar(aadhar) {
    return /^\d{12}$/.test(aadhar.replace(/\s/g, ''));
}

// Validate Phone
function isValidPhone(phone) {
    return /^[6-9]\d{9}$/.test(phone);
}

// ============ Print Loan Statement (Example) ============
function printStatement() {
    window.print();
}

// ============ Apply Form & Receipt Logic ============

function openApplyModal(postName) {
    const modal = document.getElementById('applyModal');
    const postBadge = document.getElementById('selectedPostName');
    const hiddenInput = document.getElementById('formPostName');
    
    if (modal && postBadge && hiddenInput) {
        postBadge.textContent = `Applying for: ${postName}`;
        hiddenInput.value = postName;
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }
}

function closeApplyModal() {
    const modal = document.getElementById('applyModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

function previewPhoto(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('photoPreview');
        const placeholder = document.getElementById('uploadPlaceholder');
        if (output) {
            output.src = reader.result;
            output.style.display = 'block';
        }
        if (placeholder) placeholder.style.display = 'none';
    };
    reader.readAsDataURL(event.target.files[0]);
}

async function handleApplySubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('.btn-submit-form');
    
    // Show loading state
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';

    try {
        // Generate a random registration number
        const registrationNo = 'GWCT' + Math.floor(100000 + Math.random() * 900000);
        
        // Prepare Receipt with current form data
        generateReceipt(formData, registrationNo);

        // Attempting to send to backend (optional for local testing)
        try {
            await fetch(form.action, {
                method: 'POST',
                body: formData
            });
        } catch (e) {
            console.warn("Backend not found, using simulation mode.");
        }

        // UX delay to simulate processing
        await new Promise(resolve => setTimeout(resolve, 1200));
        
        // Success: Close form and show receipt
        closeApplyModal();
        openReceiptModal();
        
        // Clean up
        form.reset();
        const preview = document.getElementById('photoPreview');
        const placeholder = document.getElementById('uploadPlaceholder');
        if (preview) preview.style.display = 'none';
        if (placeholder) placeholder.style.display = 'block';
        
        if (typeof showNotification === 'function') {
            showNotification('Application submitted successfully!', 'success');
        } else {
            alert('Application submitted successfully!');
        }
        
    } catch (error) {
        console.error('Submission error:', error);
        if (typeof showNotification === 'function') {
            showNotification('Something went wrong. Please try again.', 'error');
        }
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    }
}

function generateReceipt(formData, regNo) {
    // Map form names (from index.html) to receipt IDs
    const fields = {
        'recRegNo': regNo,
        'recPost': formData.get('designation'),
        'recName': formData.get('name'),
        'recFather': formData.get('father'),
        'recMobile': formData.get('mob'),
        'recEmail': formData.get('email'),
        'recAddress': formData.get('address'),
        'recPanchayat': formData.get('village'),
        'recPincode': formData.get('pin'),
        'recQual': formData.get('qwalification'),
        'recAadhar': formData.get('ad_no'),
        'recPan': 'N/A' // Field not currently in form
    };

    for (let id in fields) {
        const el = document.getElementById(id);
        if (el) {
            el.textContent = fields[id] || 'Not Provided';
        }
    }

    const recDate = document.getElementById('recDate');
    if (recDate) {
        recDate.textContent = new Date().toLocaleDateString('en-IN', {
            day: '2-digit',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }
    
    // Set Photo in Receipt
    const photoFile = formData.get('photo');
    if (photoFile && photoFile.size > 0) {
        const reader = new FileReader();
        reader.onload = function() {
            const recPhoto = document.getElementById('receiptPhoto');
            if (recPhoto) {
                recPhoto.src = reader.result;
                recPhoto.style.display = 'block';
            }
        };
        reader.readAsDataURL(photoFile);
    }
}

function openReceiptModal() {
    const modal = document.getElementById('receiptModal');
    if (modal) {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closeReceiptModal() {
    const modal = document.getElementById('receiptModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// ============ Document Ready Initialization ============
document.addEventListener('DOMContentLoaded', () => {
    console.log('GWCT Portal loaded successfully');
    
    // Initialize carousel
    slides = document.querySelectorAll('.carousel-item');
    if (slides.length > 0) {
        setInterval(() => {
            changeSlide(1);
        }, 6000);
        updateIndicators();
    }
    
    // Set first tab as active
    const firstTab = document.querySelector('.tab-btn');
    if (firstTab) {
        firstTab.classList.add('active');
        const firstTabName = firstTab.getAttribute('onclick').match(/'([^']+)'/)[1];
        if (firstTabName) {
            const content = document.getElementById(firstTabName + '-tab');
            if (content) content.classList.add('active');
        }
    }

    // Scroll to Top Button Initialization
    const scrollBtn = document.createElement('button');
    scrollBtn.className = 'scroll-to-top';
    scrollBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    document.body.appendChild(scrollBtn);

    // Intersection Observer for animations
    const elements = document.querySelectorAll('.service-box, .gallery-item, .service-card, .loan-card, .social-card, .step, .contact-card');
    elements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // Mobile Menu Toggle Logic
    const menuToggle = document.getElementById('mobile-menu');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle && navMenu) {

        function closeMenu() {
            navMenu.classList.remove('active');
            document.body.style.overflow = ''; // restore scroll
            const icon = menuToggle.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        }

        function openMenu() {
            navMenu.classList.add('active');
            document.body.style.overflow = 'hidden'; // lock scroll behind menu
            const icon = menuToggle.querySelector('i');
            if (icon) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        }

        const toggleMenu = (e) => {
            e.preventDefault();
            e.stopPropagation();
            if (navMenu.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        };

        menuToggle.addEventListener('click', toggleMenu);
        menuToggle.addEventListener('touchstart', toggleMenu, { passive: false });
        
        // Close menu when clicking a nav link
        const navLinks = document.querySelectorAll('.nav-menu a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => closeMenu());
        });

        // Close menu when clicking the backdrop (outside menu panel)
        document.addEventListener('click', (event) => {
            if (navMenu.classList.contains('active')
                && !navMenu.contains(event.target)
                && !menuToggle.contains(event.target)) {
                closeMenu();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navMenu.classList.contains('active')) {
                closeMenu();
            }
        });
    }
});

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    document.body.appendChild(notification);

    // Trigger animation
    setTimeout(() => notification.classList.add('show'), 10);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}


