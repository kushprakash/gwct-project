<?php

namespace App\Http\Controllers;

use App\Models\PathshalaStudent;
use App\Models\PathshalaExam;
use App\Models\PathshalaResult;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PathshalaPrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $class_level = $request->input('class_level');
        $students = collect();
        $exams = collect();

        if ($class_level) {
            $studentQuery = PathshalaStudent::where('class_level', $class_level)->where('status', 'Active');
            $examQuery = PathshalaExam::where('class_level', $class_level);
            
            if (!Auth::user()->hasRole('Super Admin')) {
                $studentQuery->where('created_by', Auth::id());
                $examQuery->where('created_by', Auth::id());
            }

            $students = $studentQuery->get();
            $exams = $examQuery->get();
        }

        return view('pathshala.prints.index', compact('class_level', 'students', 'exams'));
    }

    public function printIdCard($id)
    {
        $student = PathshalaStudent::findOrFail($id);
        
        if (!Auth::user()->hasRole('Super Admin') && $student->created_by != Auth::id()) {
            abort(403, 'Unauthorized access to this student.');
        }

        $settings = Setting::first();

        return view('pathshala.prints.id_card', compact('student', 'settings'));
    }

    public function printCertificate($student_id, $exam_id)
    {
        $student = PathshalaStudent::findOrFail($student_id);
        $exam = PathshalaExam::with('examSubjects.subject')->findOrFail($exam_id);

        if (!Auth::user()->hasRole('Super Admin') && $student->created_by != Auth::id()) {
            abort(403, 'Unauthorized access to this student.');
        }

        $results = PathshalaResult::where('pathshala_student_id', $student->id)
            ->whereIn('pathshala_exam_subject_id', $exam->examSubjects->pluck('id'))
            ->get()
            ->keyBy('pathshala_exam_subject_id');

        $settings = Setting::first();

        // Calculate total marks obtained vs total possible marks
        $totalObtained = 0;
        $totalPossible = 0;
        
        foreach($exam->examSubjects as $es) {
            $totalPossible += $es->total_marks;
            if (isset($results[$es->id])) {
                $totalObtained += $results[$es->id]->marks_obtained;
            }
        }

        $percentage = $totalPossible > 0 ? ($totalObtained / $totalPossible) * 100 : 0;
        
        $finalGrade = 'F';
        if ($percentage >= 90) $finalGrade = 'A+';
        elseif ($percentage >= 80) $finalGrade = 'A';
        elseif ($percentage >= 70) $finalGrade = 'B+';
        elseif ($percentage >= 60) $finalGrade = 'B';
        elseif ($percentage >= 50) $finalGrade = 'C';
        elseif ($percentage >= 33) $finalGrade = 'D'; // assuming 33% is minimum overall pass for final grade

        return view('pathshala.prints.certificate', compact('student', 'exam', 'results', 'settings', 'totalObtained', 'totalPossible', 'percentage', 'finalGrade'));
    }
}
