@extends('layouts.website')

@section('content')
<div class="forgot-wrapper">
    <div class="forgot-container">
        <div class="forgot-card">
            <div class="forgot-header-panel">
                <img src="{{ asset('assets/images/icon.jpg') }}" alt="GWCT Logo" class="forgot-logo-img">
                <h2>{{ __('Reset Password') }}</h2>
                <p>Enter your email to receive a password reset link</p>
            </div>

            <div class="forgot-body-panel">
                @if (session('status'))
                    <div class="status-alert-custom" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="beautified-form">
                    @csrf

                    <!-- Email Input -->
                    <div class="input-group-custom">
                        <label for="email"><i class="fas fa-envelope"></i> {{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control-custom @error('email') is-invalid-custom @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">
                        @error('email')
                            <span class="error-msg-custom" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-forgot-submit">
                        {{ __('Send Password Reset Link') }} <i class="fas fa-paper-plane"></i>
                    </button>
                </form>

                <div class="forgot-footer">
                    <a href="{{ route('login') }}"><i class="fas fa-arrow-left"></i> Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .forgot-wrapper {
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 20px;
        background: #f0f7f4;
        margin-top: -23px;
    }

    .forgot-container {
        width: 100%;
        max-width: 500px;
    }

    .forgot-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .forgot-header-panel {
        background: linear-gradient(135deg, #1b7e3a 0%, #1e3a5f 100%);
        padding: 40px 30px 30px;
        color: #ffffff;
        text-align: center;
    }

    .forgot-logo-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        margin-bottom: 18px;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .forgot-header-panel h2 {
        font-size: 24px;
        font-weight: 800;
        color: #ffde59;
        margin-bottom: 6px;
    }

    .forgot-header-panel p {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.85);
    }

    .forgot-body-panel {
        padding: 40px 30px;
    }

    .status-alert-custom {
        background: #e6f9ed;
        border-left: 4px solid #2ecc71;
        color: #155724;
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 13px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-alert-custom i {
        color: #2ecc71;
        font-size: 16px;
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

    .btn-forgot-submit {
        background: linear-gradient(135deg, #1b7e3a 0%, #155e2a 100%);
        color: #ffffff;
        border: none;
        padding: 14px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(27, 126, 58, 0.25);
    }

    .btn-forgot-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(27, 126, 58, 0.35);
        background: linear-gradient(135deg, #1e3a5f 0%, #155e2a 100%);
    }

    .forgot-footer {
        margin-top: 25px;
        text-align: center;
        font-size: 13px;
    }

    .forgot-footer a {
        color: #1b7e3a;
        text-decoration: none;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .forgot-footer a:hover {
        text-decoration: underline;
    }
</style>
@endsection

