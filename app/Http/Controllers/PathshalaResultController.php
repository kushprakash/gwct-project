<?php

namespace App\Http\Controllers;

use App\Models\PathshalaExam;
use App\Models\PathshalaExamSubject;
use App\Models\PathshalaStudent;
use App\Models\PathshalaResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PathshalaResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pathshala-result-list|pathshala-result-create|pathshala-result-edit|pathshala-result-delete', ['only' => ['index','show']]);
        $this->middleware('permission:pathshala-result-create', ['only' => ['create','store']]);
        $this->middleware('permission:pathshala-result-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pathshala-result-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $exam_id = $request->input('exam_id');
        $exam_subject_id = $request->input('exam_subject_id');
        
        $examsQuery = PathshalaExam::latest();
        if (!Auth::user()->hasRole('Super Admin')) {
            $examsQuery->where('created_by', Auth::id());
        }
        $exams = $examsQuery->get();

        $selectedExam = null;
        $examSubjects = collect();
        $selectedExamSubject = null;
        $students = collect();
        $results = collect();

        if ($exam_id) {
            $selectedExam = PathshalaExam::findOrFail($exam_id);
            $examSubjects = PathshalaExamSubject::with('subject')->where('pathshala_exam_id', $exam_id)->get();

            if ($exam_subject_id) {
                $selectedExamSubject = PathshalaExamSubject::with('subject')->findOrFail($exam_subject_id);
                
                // Get students for this exam's class
                $query = PathshalaStudent::where('class_level', $selectedExam->class_level)->where('status', 'Active');
                if (!Auth::user()->hasRole('Super Admin')) {
                    $query->where('created_by', Auth::id());
                }
                $students = $query->get();

                // Get existing results
                if ($students->count() > 0) {
                    $results = PathshalaResult::where('pathshala_exam_subject_id', $exam_subject_id)
                        ->whereIn('pathshala_student_id', $students->pluck('id'))
                        ->get()
                        ->keyBy('pathshala_student_id');
                }
            }
        }

        return view('pathshala.results.index', compact('exams', 'exam_id', 'selectedExam', 'examSubjects', 'exam_subject_id', 'selectedExamSubject', 'students', 'results'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_subject_id' => 'required|exists:pathshala_exam_subjects,id',
            'marks' => 'required|array',
            'marks.*' => 'nullable|numeric|min:0'
        ]);

        $examSubject = PathshalaExamSubject::with('exam')->findOrFail($request->exam_subject_id);
        $teacher_id = Auth::id();

        foreach ($request->marks as $student_id => $mark) {
            if (is_null($mark) || $mark === '') continue;

            $student = PathshalaStudent::find($student_id);
            if (!$student) continue;

            if (!Auth::user()->hasRole('Super Admin') && $student->created_by != $teacher_id) {
                continue;
            }

            // Calculate Grade based on this specific subject's total/passing marks
            $percentage = ($mark / $examSubject->total_marks) * 100;
            $grade = 'F';
            if ($percentage >= 90) $grade = 'A+';
            elseif ($percentage >= 80) $grade = 'A';
            elseif ($percentage >= 70) $grade = 'B+';
            elseif ($percentage >= 60) $grade = 'B';
            elseif ($percentage >= 50) $grade = 'C';
            elseif ($mark >= $examSubject->passing_marks) $grade = 'D';

            PathshalaResult::updateOrCreate(
                [
                    'pathshala_exam_subject_id' => $examSubject->id,
                    'pathshala_student_id' => $student_id
                ],
                [
                    'marks_obtained' => $mark,
                    'grade' => $grade,
                    'teacher_id' => $teacher_id
                ]
            );
        }

        return redirect()->route('pathshala-results.index', [
            'exam_id' => $examSubject->pathshala_exam_id,
            'exam_subject_id' => $examSubject->id
        ])->with('success', 'Results updated successfully for ' . $examSubject->subject->name);
    }
}
