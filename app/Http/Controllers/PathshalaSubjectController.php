<?php

namespace App\Http\Controllers;

use App\Models\PathshalaSubject;
use Illuminate\Http\Request;

class PathshalaSubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pathshala-subject-list|pathshala-subject-create|pathshala-subject-edit|pathshala-subject-delete', ['only' => ['index','show']]);
        $this->middleware('permission:pathshala-subject-create', ['only' => ['create','store']]);
        $this->middleware('permission:pathshala-subject-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pathshala-subject-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $class_level = $request->input('class_level');
        $query = PathshalaSubject::query();
        
        if ($class_level) {
            $query->where('class_level', $class_level);
        }
        
        $subjects = $query->orderBy('class_level')->orderBy('name')->paginate(15);
        return view('pathshala.subjects.index', compact('subjects', 'class_level'));
    }

    public function create()
    {
        return view('pathshala.subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_level' => 'required|integer|between:1,5',
        ]);
        
        // Check uniqueness manually for better error message
        $exists = PathshalaSubject::where('name', $request->name)
                                  ->where('class_level', $request->class_level)
                                  ->exists();
        if ($exists) {
            return back()->withInput()->with('error', 'This subject already exists for Class ' . $request->class_level);
        }

        PathshalaSubject::create([
            'name' => $request->name,
            'class_level' => $request->class_level,
            'status' => 'Active'
        ]);

        return redirect()->route('pathshala-subjects.index')->with('success', 'Subject created successfully.');
    }

    public function edit(PathshalaSubject $pathshalaSubject)
    {
        return view('pathshala.subjects.edit', compact('pathshalaSubject'));
    }

    public function update(Request $request, PathshalaSubject $pathshalaSubject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_level' => 'required|integer|between:1,5',
            'status' => 'required|in:Active,Inactive'
        ]);

        $exists = PathshalaSubject::where('name', $request->name)
                                  ->where('class_level', $request->class_level)
                                  ->where('id', '!=', $pathshalaSubject->id)
                                  ->exists();
        if ($exists) {
            return back()->withInput()->with('error', 'This subject already exists for Class ' . $request->class_level);
        }

        $pathshalaSubject->update([
            'name' => $request->name,
            'class_level' => $request->class_level,
            'status' => $request->status
        ]);

        return redirect()->route('pathshala-subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(PathshalaSubject $pathshalaSubject)
    {
        $pathshalaSubject->delete();
        return redirect()->route('pathshala-subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
