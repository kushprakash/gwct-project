<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildRenewal extends Model
{
    protected $fillable = [
        'child_id', 'user_id', 'amount', 'receipt_no', 'renewal_year', 'payment_mode'
    ];

    public function child() {
        return $this->belongsTo(Child::class);
    }
}
