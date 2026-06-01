@extends('layouts.admin')

@section('title', 'System Settings')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="mb-0 fw-bold">General Settings</h5>
                <p class="text-muted small">Manage organization details and system configurations</p>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">Organization Info</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Company Title</label>
                            <input type="text" name="company_title" class="form-control" value="{{ old('company_title', $setting->company_title) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Website</label>
                            <input type="text" name="website" class="form-control" value="{{ old('website', $setting->website) }}" placeholder="e.g. gwct.in">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Registration No.</label>
                            <input type="text" name="registration_no" class="form-control" value="{{ old('registration_no', $setting->registration_no) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company Logo</label>
                            <input type="file" name="company_logo" class="form-control" accept="image/*">
                            @if($setting->company_logo)
                                <img src="{{ asset('storage/' . $setting->company_logo) }}" alt="Logo" class="mt-2" height="50">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Account Details</label>
                            <textarea name="account_details" class="form-control" rows="3" placeholder="Bank Name, Account No, IFSC Code, etc.">{{ old('account_details', $setting->account_details) }}</textarea>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">Signatory Config</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Authorized Signatory Name/Title</label>
                            <input type="text" name="authorized_signatory" class="form-control" value="{{ old('authorized_signatory', $setting->authorized_signatory) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Authorized Signatory Signature Image</label>
                            <input type="file" name="authorized_signatory_sign" class="form-control" accept="image/*">
                            @if($setting->authorized_signatory_sign)
                                <img src="{{ asset('storage/' . $setting->authorized_signatory_sign) }}" alt="Signature" class="mt-2" height="40">
                            @endif
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Official Stamp Image (Optional)</label>
                            <input type="file" name="stamp_signature" class="form-control" accept="image/*">
                            @if($setting->stamp_signature)
                                <img src="{{ asset('storage/' . $setting->stamp_signature) }}" alt="Stamp" class="mt-2" height="60">
                            @endif
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">SMS & Email Config</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">SMS API Key</label>
                            <input type="text" name="sms_config[api_key]" class="form-control" value="{{ old('sms_config.api_key', $setting->sms_config['api_key'] ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">SMS Sender ID</label>
                            <input type="text" name="sms_config[sender_id]" class="form-control" value="{{ old('sms_config.sender_id', $setting->sms_config['sender_id'] ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">SMS MID</label>
                            <input type="text" name="sms_config[mid]" class="form-control" value="{{ old('sms_config.mid', $setting->sms_config['mid'] ?? '') }}">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">SMTP Host</label>
                            <input type="text" name="email_config[host]" class="form-control" value="{{ old('email_config.host', $setting->email_config['host'] ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">SMTP Port</label>
                            <input type="text" name="email_config[port]" class="form-control" value="{{ old('email_config.port', $setting->email_config['port'] ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Encryption (tls/ssl)</label>
                            <input type="text" name="email_config[encryption]" class="form-control" value="{{ old('email_config.encryption', $setting->email_config['encryption'] ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">SMTP Username</label>
                            <input type="text" name="email_config[username]" class="form-control" value="{{ old('email_config.username', $setting->email_config['username'] ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">SMTP Password</label>
                            <input type="password" name="email_config[password]" class="form-control" value="{{ old('email_config.password', $setting->email_config['password'] ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">From Email Address</label>
                            <input type="email" name="email_config[from_address]" class="form-control" value="{{ old('email_config.from_address', $setting->email_config['from_address'] ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">From Name</label>
                            <input type="text" name="email_config[from_name]" class="form-control" value="{{ old('email_config.from_name', $setting->email_config['from_name'] ?? '') }}">
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 border-bottom pb-2 text-primary">Theme Customization</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Primary Color</label>
                            <input type="color" name="theme_colors[primary]" class="form-control form-control-color w-100" value="{{ old('theme_colors.primary', $setting->theme_colors['primary'] ?? '#2c3e50') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Accent Color</label>
                            <input type="color" name="theme_colors[accent]" class="form-control form-control-color w-100" value="{{ old('theme_colors.accent', $setting->theme_colors['accent'] ?? '#3498db') }}">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
