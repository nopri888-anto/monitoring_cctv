<?php

namespace App\Http\Controllers;

use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }
}