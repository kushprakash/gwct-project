<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathshalaExamSubject extends Model
{
    protected $fillable = [
        'pathshala_exam_id',
        'pathshala_subject_id',
        'exam_date',
        'total_marks',
        'passing_marks'
    ];

    protected $casts = [
        'exam_date' => 'date'
    ];

    public function exam()
    {
        return $this->belongsTo(PathshalaExam::class, 'pathshala_exam_id');
    }

    public function subject()
    {
        return $this->belongsTo(PathshalaSubject::class, 'pathshala_subject_id');
    }
}
