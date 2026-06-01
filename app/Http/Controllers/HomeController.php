<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $passbooks = \App\Models\Passbook::where('user_id', auth()->id())
                        ->orderBy('id', 'desc')
                        ->get();
        return view('home', compact('passbooks'));
    }
}
