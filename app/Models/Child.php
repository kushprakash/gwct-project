<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'user_id', 'registration_no', 'name', 'dob', 'gender', 'age_at_registration',
        'parent_name', 'parent_mobile', 'parent_aadhaar',
        'state_id', 'district_id', 'block_id', 'panchayat_id', 'village_id', 'address',
        'aadhaar_photo', 'birth_certificate_photo', 'child_photo',
        'registration_fee', 'qr_code', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function renewals() {
        return $this->hasMany(ChildRenewal::class);
    }
}
