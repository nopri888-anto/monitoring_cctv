<?php

namespace App\Http\Controllers;

use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.home', compact('user'));
    }
}