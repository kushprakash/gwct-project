<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialActivity extends Model
{
    protected $fillable = [
        'activity_category_id',
        'title',
        'description',
        'date',
        'location',
        'beneficiary_count',
        'images',
        'created_by',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(ActivityCategory::class, 'activity_category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
