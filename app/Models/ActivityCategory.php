<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    protected $fillable = ['name', 'status'];

    public function activities()
    {
        return $this->hasMany(SocialActivity::class);
    }
}
