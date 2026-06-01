<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class UserDownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function idCard()
    {
        $user = Auth::user();
        $settings = Setting::first();
        return view('user_downloads.id_card', compact('user', 'settings'));
    }

    public function certificate()
    {
        $user = Auth::user();
        $settings = Setting::first();
        return view('user_downloads.certificate', compact('user', 'settings'));
    }

    public function visitingCard()
    {
        $user = Auth::user();
        $settings = Setting::first();
        return view('user_downloads.visiting_card', compact('user', 'settings'));
    }

    public function banner()
    {
        $user = Auth::user();
        $settings = Setting::first();
        return view('user_downloads.banner', compact('user', 'settings'));
    }
}
