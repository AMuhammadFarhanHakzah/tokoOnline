<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = "User Profil";
        return view('user.index', compact('title'));
    }
    public function setting()
    {
        $title = "Setting Profil";
        return view('user.setting', compact('title'));
    }
}
