<?php

namespace App\Http\Controllers;

use App\Models\PathshalaExam;
use App\Models\PathshalaSubject;
use App\Models\PathshalaExamSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PathshalaExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pathshala-exam-list|pathshala-exam-create|pathshala-exam-edit|pathshala-exam-delete', ['only' => ['index','show']]);
        $this->middleware('permission:pathshala-exam-create', ['only' => ['create','store']]);
        $this->middleware('permission:pathshala-exam-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pathshala-exam-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $query = PathshalaExam::with(['examSubjects.subject', 'creator'])->latest();
        
        if (!Auth::user()->hasRole('Super Admin')) {
            $query->where('created_by', Auth::id());
        }

        if ($request->filled('class_level')) {
            $query->where('class_level', $request->class_level);
        }

        $exams = $query->paginate(15);
        return view('pathshala.exams.index', compact('exams'));
    }

    public function create()
    {
        $subjects = PathshalaSubject::where('status', 'Active')->orderBy('class_level')->orderBy('name')->get();
        return view('pathshala.exams.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_level' => 'required|integer|min:1|max:5',
            'session_year' => 'required|string|max:20',
            'subjects' => 'required|array|min:1',
            'subjects.*' => 'exists:pathshala_subjects,id',
            'exam_dates' => 'required|array',
            'total_marks' => 'required|array',
            'passing_marks' => 'required|array'
        ]);

        $exam = PathshalaExam::create([
            'name' => $request->name,
            'class_level' => $request->class_level,
            'session_year' => $request->session_year,
            'created_by' => Auth::id()
        ]);

        foreach ($request->subjects as $subject_id) {
            PathshalaExamSubject::create([
                'pathshala_exam_id' => $exam->id,
                'pathshala_subject_id' => $subject_id,
                'exam_date' => $request->exam_dates[$subject_id] ?? null,
                'total_marks' => $request->total_marks[$subject_id] ?? 100,
                'passing_marks' => $request->passing_marks[$subject_id] ?? 30,
            ]);
        }

        return redirect()->route('pathshala-exams.index')->with('success', 'Exam created successfully with subjects.');
    }

    public function edit(PathshalaExam $pathshalaExam)
    {
        if (!Auth::user()->hasRole('Super Admin') && $pathshalaExam->created_by != Auth::id()) {
            abort(403);
        }
        $pathshalaExam->load('examSubjects');
        $subjects = PathshalaSubject::where('status', 'Active')->where('class_level', $pathshalaExam->class_level)->orderBy('name')->get();
        return view('pathshala.exams.edit', compact('pathshalaExam', 'subjects'));
    }

    public function update(Request $request, PathshalaExam $pathshalaExam)
    {
        if (!Auth::user()->hasRole('Super Admin') && $pathshalaExam->created_by != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'session_year' => 'required|string|max:20',
            'subjects' => 'required|array|min:1',
            'subjects.*' => 'exists:pathshala_subjects,id',
            'exam_dates' => 'required|array',
            'total_marks' => 'required|array',
            'passing_marks' => 'required|array'
        ]);

        $pathshalaExam->update([
            'name' => $request->name,
            'session_year' => $request->session_year,
        ]);

        // Sync subjects manually
        $existingSubjects = $pathshalaExam->examSubjects->pluck('pathshala_subject_id')->toArray();
        $newSubjects = $request->subjects;

        // Delete removed subjects
        PathshalaExamSubject::where('pathshala_exam_id', $pathshalaExam->id)
            ->whereNotIn('pathshala_subject_id', $newSubjects)
            ->delete();

        // Update or Create
        foreach ($newSubjects as $subject_id) {
            PathshalaExamSubject::updateOrCreate(
                [
                    'pathshala_exam_id' => $pathshalaExam->id,
                    'pathshala_subject_id' => $subject_id
                ],
                [
                    'exam_date' => $request->exam_dates[$subject_id] ?? null,
                    'total_marks' => $request->total_marks[$subject_id] ?? 100,
                    'passing_marks' => $request->passing_marks[$subject_id] ?? 30,
                ]
            );
        }

        return redirect()->route('pathshala-exams.index')->with('success', 'Exam updated successfully.');
    }

    public function destroy(PathshalaExam $pathshalaExam)
    {
        if (!Auth::user()->hasRole('Super Admin') && $pathshalaExam->created_by != Auth::id()) {
            abort(403);
        }
        $pathshalaExam->delete();
        return redirect()->route('pathshala-exams.index')->with('success', 'Exam deleted successfully.');
    }

    // Ajax method to get subjects for a class
    public function getSubjectsByClass(Request $request)
    {
        $class_level = $request->class_level;
        $subjects = PathshalaSubject::where('class_level', $class_level)->where('status', 'Active')->get();
        return response()->json($subjects);
    }
}
