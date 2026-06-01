<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathshalaAttendance extends Model
{
    protected $fillable = [
        'pathshala_student_id',
        'attendance_date',
        'status',
        'teacher_id'
    ];

    protected $casts = [
        'attendance_date' => 'date'
    ];

    public function student()
    {
        return $this->belongsTo(PathshalaStudent::class, 'pathshala_student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
