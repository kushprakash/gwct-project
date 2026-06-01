<?php

namespace App\Http\Controllers;

use App\Models\PathshalaHomework;
use App\Models\PathshalaSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PathshalaHomeworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pathshala-homework-list|pathshala-homework-create|pathshala-homework-edit|pathshala-homework-delete', ['only' => ['index','show']]);
        $this->middleware('permission:pathshala-homework-create', ['only' => ['create','store']]);
        $this->middleware('permission:pathshala-homework-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pathshala-homework-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $query = PathshalaHomework::with(['subject', 'teacher'])->latest();

        // User wize filtering
        if (!Auth::user()->hasRole('Super Admin')) {
            $query->where('teacher_id', Auth::id());
        }

        if ($request->filled('class_level')) {
            $query->where('class_level', $request->class_level);
        }

        $homeworks = $query->paginate(15);
        return view('pathshala.homework.index', compact('homeworks'));
    }

    public function create()
    {
        $subjects = PathshalaSubject::where('status', 'Active')->orderBy('class_level')->orderBy('name')->get();
        return view('pathshala.homework.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pathshala_subject_id' => 'required|exists:pathshala_subjects,id',
            'homework_date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        $subject = PathshalaSubject::findOrFail($request->pathshala_subject_id);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('pathshala/homework', 'public');
        }

        PathshalaHomework::create([
            'class_level' => $subject->class_level,
            'pathshala_subject_id' => $subject->id,
            'homework_date' => $request->homework_date,
            'title' => $request->title,
            'description' => $request->description,
            'attachment' => $attachmentPath,
            'teacher_id' => Auth::id()
        ]);

        return redirect()->route('pathshala-homework.index')->with('success', 'Homework uploaded successfully.');
    }

    public function edit(PathshalaHomework $pathshalaHomework)
    {
        if (!Auth::user()->hasRole('Super Admin') && $pathshalaHomework->teacher_id != Auth::id()) {
            abort(403);
        }
        $subjects = PathshalaSubject::where('status', 'Active')->orderBy('class_level')->orderBy('name')->get();
        return view('pathshala.homework.edit', compact('pathshalaHomework', 'subjects'));
    }

    public function update(Request $request, PathshalaHomework $pathshalaHomework)
    {
        if (!Auth::user()->hasRole('Super Admin') && $pathshalaHomework->teacher_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'pathshala_subject_id' => 'required|exists:pathshala_subjects,id',
            'homework_date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        $subject = PathshalaSubject::findOrFail($request->pathshala_subject_id);

        $attachmentPath = $pathshalaHomework->attachment;
        if ($request->hasFile('attachment')) {
            if ($attachmentPath) Storage::disk('public')->delete($attachmentPath);
            $attachmentPath = $request->file('attachment')->store('pathshala/homework', 'public');
        }

        $pathshalaHomework->update([
            'class_level' => $subject->class_level,
            'pathshala_subject_id' => $subject->id,
            'homework_date' => $request->homework_date,
            'title' => $request->title,
            'description' => $request->description,
            'attachment' => $attachmentPath,
        ]);

        return redirect()->route('pathshala-homework.index')->with('success', 'Homework updated successfully.');
    }

    public function destroy(PathshalaHomework $pathshalaHomework)
    {
        if (!Auth::user()->hasRole('Super Admin') && $pathshalaHomework->teacher_id != Auth::id()) {
            abort(403);
        }

        if ($pathshalaHomework->attachment) {
            Storage::disk('public')->delete($pathshalaHomework->attachment);
        }
        $pathshalaHomework->delete();
        return redirect()->route('pathshala-homework.index')->with('success', 'Homework deleted successfully.');
    }
}
