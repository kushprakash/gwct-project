<?php

namespace App\Http\Controllers;

use App\Models\SocialActivity;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SocialActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:social-activity-list|social-activity-create|social-activity-edit|social-activity-delete', ['only' => ['index','show']]);
        $this->middleware('permission:social-activity-create', ['only' => ['create','store']]);
        $this->middleware('permission:social-activity-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:social-activity-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $activities = SocialActivity::with('category', 'creator')->latest()->paginate(10);
        return view('social_activities.index', compact('activities'));
    }

    public function create()
    {
        $categories = ActivityCategory::where('status', true)->get();
        return view('social_activities.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_category_id' => 'required|exists:activity_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'beneficiary_count' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('social_activities', 'public');
                $imagePaths[] = $path;
            }
        }

        SocialActivity::create([
            'activity_category_id' => $request->activity_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'beneficiary_count' => $request->beneficiary_count,
            'images' => $imagePaths,
            'created_by' => Auth::id(),
            'status' => true
        ]);

        return redirect()->route('social-activities.index')
                         ->with('success', 'Social Activity created successfully.');
    }

    public function show(SocialActivity $socialActivity)
    {
        return view('social_activities.show', compact('socialActivity'));
    }

    public function edit(SocialActivity $socialActivity)
    {
        $categories = ActivityCategory::where('status', true)->get();
        return view('social_activities.edit', compact('socialActivity', 'categories'));
    }

    public function update(Request $request, SocialActivity $socialActivity)
    {
        $request->validate([
            'activity_category_id' => 'required|exists:activity_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'beneficiary_count' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = $socialActivity->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('social_activities', 'public');
                $imagePaths[] = $path;
            }
        }

        $socialActivity->update([
            'activity_category_id' => $request->activity_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'beneficiary_count' => $request->beneficiary_count,
            'images' => $imagePaths,
            'status' => $request->has('status')
        ]);

        return redirect()->route('social-activities.index')
                         ->with('success', 'Social Activity updated successfully.');
    }

    public function destroy(SocialActivity $socialActivity)
    {
        if ($socialActivity->images) {
            foreach ($socialActivity->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $socialActivity->delete();
        return redirect()->route('social-activities.index')
                         ->with('success', 'Social Activity deleted successfully.');
    }
}
