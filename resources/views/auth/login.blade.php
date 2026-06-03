@extends('layouts.website')

@section('content')
<div class="login-wrapper">
    <div class="login-container">
        <div class="login-card">
            <!-- Left Side: Branding info (hidden on mobile) -->
            <div class="login-brand-panel">
                <div class="brand-overlay"></div>
                <div class="brand-content">
                    <img src="{{ asset('assets/images/icon.jpg') }}" alt="GWCT Logo" class="brand-logo-img">
                    <h2>ग्रामीण विकास एवं कल्याण ट्रस्ट</h2>
                    <h3>Gramin Vikas Aur Kalyaan</h3>
                    <p class="brand-tagline">Empowering Rural India through Education, Healthcare, and Financial Inclusion.</p>
                    <div class="brand-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Secure & Verified Portal</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Instant Access to Services</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Login Form -->
            <div class="login-form-panel">
                <div class="form-header">
                    <h2>Welcome Back</h2>
                    <p>Please log in to access your portal</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="beautified-form">
                    @csrf

                    <!-- Email Input -->
                    <div class="input-group-custom">
                        <label for="email"><i class="fas fa-envelope"></i> {{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control-custom @error('email') is-invalid-custom @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your registered email">
                        @error('email')
                            <span class="error-msg-custom" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="input-group-custom">
                        <div class="label-row">
                            <label for="password"><i class="fas fa-lock"></i> {{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                <a class="forgot-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" class="form-control-custom @error('password') is-invalid-custom @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                        @error('password')
                            <span class="error-msg-custom" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="remember-me-row">
                        <label class="checkbox-container">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            <span class="label-text">{{ __('Remember Me') }}</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login-submit">
                        {{ __('Login') }} <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="form-footer d-none">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* CSS specifically for the beautiful login page */
    .login-wrapper {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 20px;
        background: #f0f7f4;
        margin-top: -23px;
    }

    .login-container {
        width: 100%;
        max-width: 1000px;
    }

    .login-card {
        display: grid;
        grid-template-columns: 1.1fr 1fr;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        min-height: 550px;
    }

    /* Left panel styling */
    .login-brand-panel {
        position: relative;
        background: linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%);
        padding: 50px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brand-overlay {
        position: absolute;
        inset: 0;
        background: url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=1000&fit=crop') no-repeat center center/cover;
        opacity: 0.15;
        mix-blend-mode: overlay;
    }

    .brand-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .brand-logo-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        margin-bottom: 25px;
        border: 3px solid rgba(255, 255, 255, 0.3);
    }

    .login-brand-panel h2 {
        font-size: 26px;
        font-weight: 800;
        color: #ffde59;
        margin-bottom: 5px;
    }

    .login-brand-panel h3 {
        font-size: 16px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 20px;
        letter-spacing: 0.5px;
    }

    .brand-tagline {
        font-size: 14px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 35px;
    }

    .brand-features {
        display: flex;
        flex-direction: column;
        gap: 15px;
        align-items: center;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.1);
        padding: 8px 20px;
        border-radius: 30px;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .feature-item i {
        color: #2ecc71;
    }

    /* Right panel styling */
    .login-form-panel {
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-header {
        margin-bottom: 30px;
    }

    .form-header h2 {
        font-size: 28px;
        font-weight: 800;
        color: #1e3a5f;
        margin-bottom: 6px;
    }

    .form-header p {
        color: #777777;
        font-size: 14px;
    }

    .beautified-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .input-group-custom {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .input-group-custom label {
        font-size: 13px;
        font-weight: 700;
        color: #555555;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .input-group-custom label i {
        color: #1b7e3a;
    }

    .form-control-custom {
        width: 100%;
        padding: 12px 16px;
        font-size: 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        outline: none;
        transition: all 0.3s ease;
        background: #fafafa;
        color: #333333;
        box-sizing: border-box;
    }

    .form-control-custom:focus {
        border-color: #1b7e3a;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(27, 126, 58, 0.1);
    }

    .is-invalid-custom {
        border-color: #e53e3e !important;
        background-color: #fffafb !important;
    }

    .error-msg-custom {
        color: #e53e3e;
        font-size: 12px;
        margin-top: 4px;
        font-weight: 600;
    }

    .label-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .forgot-link {
        font-size: 12px;
        font-weight: 700;
        color: #1b7e3a;
        text-decoration: none;
        transition: color 0.2s;
    }

    .forgot-link:hover {
        color: #155e2a;
        text-decoration: underline;
    }

    /* Remember Me Custom Checkbox */
    .remember-me-row {
        display: flex;
        align-items: center;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        color: #555555;
        user-select: none;
    }

    .checkbox-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        height: 18px;
        width: 18px;
        background-color: #edf2f7;
        border-radius: 4px;
        border: 1.5px solid #cbd5e0;
        transition: all 0.2s;
    }

    .checkbox-container:hover input ~ .checkmark {
        background-color: #e2e8f0;
    }

    .checkbox-container input:checked ~ .checkmark {
        background-color: #1b7e3a;
        border-color: #1b7e3a;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .checkbox-container input:checked ~ .checkmark:after {
        display: block;
    }

    .checkbox-container .checkmark:after {
        left: 6px;
        top: 2px;
        width: 4px;
        height: 8px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    /* Submit Button styling */
    .btn-login-submit {
        background: linear-gradient(135deg, #1b7e3a 0%, #155e2a 100%);
        color: #ffffff;
        border: none;
        padding: 14px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(27, 126, 58, 0.25);
    }

    .btn-login-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(27, 126, 58, 0.35);
        background: linear-gradient(135deg, #1e3a5f 0%, #155e2a 100%);
    }

    .form-footer {
        margin-top: 30px;
        text-align: center;
        font-size: 13px;
        color: #666666;
    }

    .form-footer a {
        color: #1b7e3a;
        text-decoration: none;
        font-weight: 700;
    }

    .form-footer a:hover {
        text-decoration: underline;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .login-card {
            grid-template-columns: 1fr;
        }

        .login-brand-panel {
            display: none;
        }

        .login-form-panel {
            padding: 35px 25px;
        }
    }
</style>
@endsection

