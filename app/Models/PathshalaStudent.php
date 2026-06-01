<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathshalaStudent extends Model
{
    protected $fillable = [
        'registration_no', 'name', 'class_level', 'dob', 'gender', 'father_name', 'mother_name',
        'mobile', 'address', 'state_id', 'district_id', 'block_id',
        'panchayat_id', 'village_id', 'photo', 'status', 'created_by'
    ];

    protected $casts = [
        'dob' => 'date'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
