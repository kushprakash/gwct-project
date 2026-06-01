<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panchayat extends Model
{
    protected $guarded = [];

    public function block() {
        return $this->belongsTo(Block::class);
    }
}
