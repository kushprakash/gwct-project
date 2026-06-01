<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathshalaResult extends Model
{
    protected $fillable = [
        'pathshala_exam_subject_id',
        'pathshala_student_id',
        'marks_obtained',
        'grade',
        'remarks',
        'teacher_id'
    ];

    public function examSubject()
    {
        return $this->belongsTo(PathshalaExamSubject::class, 'pathshala_exam_subject_id');
    }

    public function student()
    {
        return $this->belongsTo(PathshalaStudent::class, 'pathshala_student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
