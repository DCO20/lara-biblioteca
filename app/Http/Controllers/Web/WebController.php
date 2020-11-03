<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

