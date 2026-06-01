<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathshalaExam extends Model
{
    protected $fillable = [
        'name',
        'class_level',
        'session_year',
        'created_by'
    ];

    protected $casts = [
        'exam_date' => 'date'
    ];

    public function examSubjects()
    {
        return $this->hasMany(PathshalaExamSubject::class, 'pathshala_exam_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
