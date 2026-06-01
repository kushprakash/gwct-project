<?php

namespace App\Http\Controllers;

use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:activity-category-list|activity-category-create|activity-category-edit|activity-category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:activity-category-create', ['only' => ['create','store']]);
        $this->middleware('permission:activity-category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:activity-category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = ActivityCategory::latest()->paginate(10);
        return view('activity_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('activity_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:activity_categories',
            'status' => 'boolean'
        ]);

        ActivityCategory::create([
            'name' => $request->name,
            'status' => $request->status ?? true
        ]);

        return redirect()->route('activity-categories.index')
                         ->with('success', 'Category created successfully.');
    }

    public function edit(ActivityCategory $activityCategory)
    {
        return view('activity_categories.edit', compact('activityCategory'));
    }

    public function update(Request $request, ActivityCategory $activityCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:activity_categories,name,' . $activityCategory->id,
            'status' => 'boolean'
        ]);

        $activityCategory->update([
            'name' => $request->name,
            'status' => $request->has('status')
        ]);

        return redirect()->route('activity-categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(ActivityCategory $activityCategory)
    {
        $activityCategory->delete();
        return redirect()->route('activity-categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
