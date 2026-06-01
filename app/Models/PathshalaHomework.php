<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathshalaHomework extends Model
{
    protected $table = 'pathshala_homework';
    
    protected $fillable = [
        'class_level',
        'pathshala_subject_id',
        'homework_date',
        'title',
        'description',
        'attachment',
        'teacher_id'
    ];

    protected $casts = [
        'homework_date' => 'date'
    ];

    public function subject()
    {
        return $this->belongsTo(PathshalaSubject::class, 'pathshala_subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
