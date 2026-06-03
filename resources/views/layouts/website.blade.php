<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWCT - Gramin Vikas Aur Kalyaan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
   
</head>

<body>
    <!-- Top Header -->
    <header class="top-header">
        <div class="container">
            <div class="header-left">
                <a href="{{ route('website.home') }}" class="logo">
                    <div class="logo-icon"><img src="{{ asset('assets/images/icon.jpg') }}" alt="GWCT Logo"
                            style="width: 100%; height: 100%; object-fit: cover;"></div>
                    <div class="logo-text">
                        <div>ग्रामीण विकास एवं कल्याण</div>
                        <small>Gramin Vikas Aur Kalyaan</small>
                    </div>
                </a>
                <div class="helpline">
                    <i class="fas fa-phone"></i> Helpline: +91 9102132444
                </div>
            </div>
            <div class="header-right">
                <a href="{{ route('website.donate') }}" class="btn-donate">Donate Now <i class="fas fa-heart"></i></a>

                @auth
                    <a href="{{ route('home') }}" class="btn-donate btn-login">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-donate btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                @endauth

                <button class="menu-toggle" id="mobile-menu" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <!-- Nav links -->
            <ul class="nav-menu" id="nav-menu">
                <li><a href="{{ route('website.home') }}"     class="nav-link {{ request()->routeIs('website.home')     ? 'active-link' : '' }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ route('website.about') }}"    class="nav-link {{ request()->routeIs('website.about')    ? 'active-link' : '' }}"><i class="fas fa-info-circle"></i> About Us</a></li>
                <li><a href="{{ route('website.services') }}" class="nav-link {{ request()->routeIs('website.services') ? 'active-link' : '' }}"><i class="fas fa-th-large"></i> Services</a></li>
                <li><a href="{{ route('website.bal-vivah') }}" class="nav-link {{ request()->routeIs('website.bal-vivah') ? 'active-link' : '' }}"><i class="fas fa-heart"></i> Bal Vivah</a></li>
                <li><a href="{{ route('website.gallery') }}"  class="nav-link {{ request()->routeIs('website.gallery')  ? 'active-link' : '' }}"><i class="fas fa-images"></i> Gallery</a></li>
                <li><a href="{{ route('website.apply') }}"    class="nav-link {{ request()->routeIs('website.apply')    ? 'active-link' : '' }}"><i class="fas fa-file-alt"></i> Apply Now</a></li>
                <li><a href="{{ route('website.contact') }}"  class="nav-link {{ request()->routeIs('website.contact')  ? 'active-link' : '' }}"><i class="fas fa-phone"></i> Contact</a></li>
               
            </ul>
        </div>
    </nav>`

    @yield('content')
    <!-- Ways to Give & Social Media & Gallery Highlights Footer -->
    <section class="footer-content">
        <div class="container">


            <div class="footer-grid">
                <div class="footer-section">
                    <h3><i class="fas fa-info-circle"></i> Quick Links</h3>
                    <ul>
                        <li><i class="fas fa-arrow-right"></i> About Us</li>
                        <li><i class="fas fa-arrow-right"></i> Services</li>
                        <li><i class="fas fa-arrow-right"></i> Impact Report</li>
                        <li><i class="fas fa-arrow-right"></i> Contact Us</li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-map-marker-alt"></i> Contact Info</h3>
                    <ul>
                        <li><i class="fas fa-phone"></i> +91 9102132444</li>
                        <li><i class="fas fa-envelope"></i> graminwelfare12@gmail.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> GWCT Office</li>
                        <li><i class="fas fa-clock"></i> Available 9 AM - 6 PM</li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-certificate"></i> Certifications</h3>
                    <ul>
                        <li><i class="fas fa-badge"></i> NGO Registered</li>
                        <li><i class="fas fa-badge"></i> ISO Certified</li>
                        <li><i class="fas fa-badge"></i> Audit Verified</li>
                        <li><i class="fas fa-badge"></i> Transparent Trust</li>
                    </ul>
                </div>
            </div>
    </section>

    <!-- Bottom Footer -->
    <footer class="footer" style="background-color:#1b7e3a; color:white; text-align:center; padding:20px 0;">
        <p>&copy; 2026 <strong>Gramin Welfare Charitable Trust (GWCT)</strong>. All Rights Reserved. | <a href="#"
                style="color:white; text-decoration:underline;">Privacy Policy</a> | <a href="#"
                style="color:white; text-decoration:underline;">Terms of Service</a></p>
    </footer>

    <!-- Apply Form Modal -->
    <div id="applyModal" class="modal">
        <div class="modal-content apply-modal-content">
            <span class="close-modal" onclick="closeApplyModal()">&times;</span>
            <div class="modal-header">
                <img src="{{ asset('assets/images/icon.jpg') }}" alt="Logo" class="modal-logo">
                <h2>Application Form</h2>
                <p id="selectedPostName" class="post-badge"></p>
            </div>
            <form  action="apply-submit.php" method="post"
                enctype="multipart/form-data">
                <input type="hidden" id="formPostName" name="designation" value="" name="post_name">
                <div class="quform-elements">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Name:</label>
                                <input class="form-control" required="" type="text" name="name"
                                    placeholder="Enter Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Father/Husband:</label>
                                <input class="form-control" type="text" name="father"
                                    placeholder="Enter Father/Husband Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">DOB:</label>
                                <input class="form-control" type="date" name="dob">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Religion:</label>
                                <select class="form-control" name="religion">
                                    <option selected="selected" value="">--Select--</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Sikh">Sikh</option>
                                    <option value="Christian">Christian</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Email:</label>
                                <input type="email" required="" name="email" class="form-control"
                                    placeholder="Enter Valid Email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Mobile:</label>
                                <input type="number" required="" name="mob" class="form-control"
                                    placeholder="Enter Mobile Number">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">State:</label>
                                <select class="form-control" required name="state" id="stateid"
                                    onchange="getDistrict()">
                                    <option selected="selected" value="">--Select State--</option>
                                    <option value="1">
                                        Andaman and Nicobar (AN) </option>
                                    <option value="2">
                                        Andhra Pradesh (AP) </option>
                                    <option value="3">
                                        Arunachal Pradesh (AR) </option>
                                    <option value="4">
                                        Assam (AS) </option>
                                    <option value="5">
                                        Bihar (BR) </option>
                                    <option value="6">
                                        Chandigarh (CH) </option>
                                    <option value="7">
                                        Chhattisgarh (CG) </option>
                                    <option value="8">
                                        Dadra and Nagar Haveli (DN) </option>
                                    <option value="9">
                                        Daman and Diu (DD) </option>
                                    <option value="10">
                                        Delhi (DL) </option>
                                    <option value="11">
                                        Goa (GA) </option>
                                    <option value="12">
                                        Gujarat (GJ) </option>
                                    <option value="13">
                                        Haryana (HR) </option>
                                    <option value="14">
                                        Himachal Pradesh (HP) </option>
                                    <option value="15">
                                        Jammu and Kashmir (JK) </option>
                                    <option value="16">
                                        Jharkhand (JH) </option>
                                    <option value="17">
                                        Karnataka (KA) </option>
                                    <option value="18">
                                        Kerala (KL) </option>
                                    <option value="19">
                                        Lakshdweep (LD) </option>
                                    <option value="20">
                                        Madhya Pradesh (MP) </option>
                                    <option value="21">
                                        Maharashtra (MH) </option>
                                    <option value="22">
                                        Manipur (MN) </option>
                                    <option value="23">
                                        Meghalaya (ML) </option>
                                    <option value="24">
                                        Mizoram (MZ) </option>
                                    <option value="25">
                                        Nagaland (NL) </option>
                                    <option value="26">
                                        Odisha (OD) </option>
                                    <option value="27">
                                        Puducherry (PY) </option>
                                    <option value="28">
                                        Punjab (PB) </option>
                                    <option value="29">
                                        Rajasthan (RJ) </option>
                                    <option value="30">
                                        Sikkim (SK) </option>
                                    <option value="31">
                                        Tamil Nadu (TN) </option>
                                    <option value="32">
                                        Tripura (TR) </option>
                                    <option value="33">
                                        Uttar Pradesh (UP) </option>
                                    <option value="34">
                                        Uttarakhand (UK) </option>
                                    <option value="35">
                                        West Bengal (WB) </option>
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">District:</label>
                                <select name="city" required="" class="form-control" id="diss2">
                                    <option selected="selected" value="">--Select District--</option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Block:</label>
                                <input class="form-control" type="text" name="block" placeholder="Enter Block">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Panchayat:</label>
                                <input class="form-control" type="text" name="village" placeholder="Enter Panchayat">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Aadhar No:</label>
                                <input class="form-control" type="text" name="ad_no" placeholder="12-digit Aadhar">
                            </div>
                        </div>
                  
                  <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">PAN No:</label>
                                <input class="form-control" type="text" name="pan_no" placeholder="12-digit Aadhar">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Pin Code:</label>
                                <input class="form-control" type="text" name="pin" placeholder="6-digit Pin">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Qualification:</label>
                                <input class="form-control" type="text" name="qwalification"
                                    placeholder="Highest Qualification">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Address:</label>
                                <input class="form-control" type="text" name="address" placeholder="Enter Full Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group custom-mt-form-group">
                                <label class="control-label">Photo:</label>
                                <input class="form-control" type="file" name="photo" accept="image/*"
                                    onchange="previewPhoto(event)">
                                <div class="photo-preview-container mt-2">
                                    <img id="photoPreview" src="" alt="Photo Preview"
                                        style="display: none; max-width: 100px; border-radius: 5px;">
                                    <div id="uploadPlaceholder" style="font-size: 12px; color: #666;"><i
                                            class="fas fa-camera"></i> Select Photo</div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-actions mt-4 text-center">

                                <button type="submit" name="submit" class="btn-submit-form">Submit Application <i
                                        class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Receipt Modal -->
    <div id="receiptModal" class="modal">
        <div class="modal-content receipt-content">
            <span class="close-modal" onclick="closeReceiptModal()">&times;</span>
            <div id="receiptPrintArea">
                <div class="receipt-header">
                    <img src="{{ asset('assets/images/icon.jpg') }}" alt="Logo" class="receipt-logo">
                    <h2>Application Receipt</h2>
                    <p>Gwerish Nidhan Charitable Trust (GWCT)</p>
                </div>
                <div class="receipt-body">
                    <div class="receipt-photo-section">
                        <img id="receiptPhoto" src="" alt="Applicant Photo">
                    </div>
                    <div class="receipt-details">
                        <div class="receipt-row"><strong>Registration No:</strong> <span id="recRegNo"></span></div>
                        <div class="receipt-row"><strong>Post Applied:</strong> <span id="recPost"></span></div>
                        <div class="receipt-row"><strong>Name:</strong> <span id="recName"></span></div>
                        <div class="receipt-row"><strong>Father/Husband:</strong> <span id="recFather"></span></div>
                        <div class="receipt-row"><strong>Mobile:</strong> <span id="recMobile"></span></div>
                        <div class="receipt-row"><strong>Email:</strong> <span id="recEmail"></span></div>
                        <div class="receipt-row"><strong>Address:</strong> <span id="recAddress"></span></div>
                        <div class="receipt-row"><strong>Panchayat:</strong> <span id="recPanchayat"></span></div>
                        <div class="receipt-row"><strong>Pincode:</strong> <span id="recPincode"></span></div>
                        <div class="receipt-row"><strong>Qualification:</strong> <span id="recQual"></span></div>
                        <div class="receipt-row"><strong>Aadhar:</strong> <span id="recAadhar"></span></div>
                        <div class="receipt-row"><strong>PAN:</strong> <span id="recPan"></span></div>
                    </div>
                </div>
                <div class="receipt-footer">
                    <p>Status: <span class="status-success">SUCCESSFULLY SUBMITTED</span></p>
                    <p>Date: <span id="recDate"></span></p>
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        function getDistrict() {
            var id = $("#stateid").val();
            // Since test.php is not present in local development, we add a fallback log
            console.log("Fetching districts for state ID:", id);
            
            $.post('test.php', {
                states: id
            }, function (data) {
                $("#diss2").html(data);
            }).fail(function() {
                console.warn("test.php not found. Implementation requires a backend server.");
                // Optional: Trigger local fallback here
            });
        }
    </script>

    <style>
.hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 80px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: -23px;
}

@media (max-width: 992px) {
    .navbar::before {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        z-index: 9998;
    }
}

@media (max-width: 992px) {
    .navbar:has(.nav-menu.active)::before {
        display: none !important;
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
    }
}
    </style>
</body>

</html>



  