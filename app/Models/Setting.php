<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'company_title',
        'website',
        'company_logo',
        'registration_no',
        'authorized_signatory',
        'authorized_signatory_sign',
        'stamp_signature',
        'account_details',
        'sms_config',
        'email_config',
        'theme_colors'
    ];

    protected $casts = [
        'sms_config' => 'array',
        'email_config' => 'array',
        'theme_colors' => 'array'
    ];
}
