<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passbook;
use Illuminate\Support\Facades\Auth;

class PassbookController extends Controller
{
    public function index()
    {
        $passbooks = Passbook::where('user_id', Auth::id())
                        ->orderBy('id', 'desc')
                        ->paginate(20);
                        
        $currentBalance = Passbook::getAvailableBalance(Auth::id());

        return view('wallet_history', compact('passbooks', 'currentBalance'));
    }
}
