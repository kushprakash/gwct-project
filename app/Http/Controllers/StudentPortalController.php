<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PathshalaStudent;
use App\Models\PathshalaHomework;
use App\Models\PathshalaAttendance;

class StudentPortalController extends Controller
{
    public function index(Request $request)
    {
        $student = null;
        $homeworks = collect();
        $attendance = null;
        
        if ($request->filled('registration_no')) {
            $student = PathshalaStudent::with('creator')
                ->where('registration_no', $request->registration_no)
                ->first();

            if ($student) {
                // Get latest 10 homework assignments for this student's class
                $homeworks = PathshalaHomework::with('subject')
                    ->where('class_level', $student->class_level)
                    ->orderBy('homework_date', 'desc')
                    ->take(10)
                    ->get();
                    
                // Get attendance summary
                $totalDays = PathshalaAttendance::where('pathshala_student_id', $student->id)->count();
                $presentDays = PathshalaAttendance::where('pathshala_student_id', $student->id)
                    ->where('status', 'Present')->count();
                    
                $attendance = [
                    'total' => $totalDays,
                    'present' => $presentDays,
                    'percentage' => $totalDays > 0 ? round(($presentDays / $totalDays) * 100) : 0
                ];
            } else {
                return redirect()->route('student.portal')->with('error', 'Student with Registration No. ' . $request->registration_no . ' not found.');
            }
        }

        return view('student_portal.index', compact('student', 'homeworks', 'attendance'));
    }
}
