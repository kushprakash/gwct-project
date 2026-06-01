<?php

namespace App\Http\Controllers;

use App\Models\SocialActivity;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $categories = ActivityCategory::where('status', true)->get();
        $query = SocialActivity::with('category')->where('status', true);

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('activity_category_id', $request->category_id);
        }

        $activities = $query->latest()->paginate(12);

        return view('gallery.index', compact('activities', 'categories'));
    }
}
