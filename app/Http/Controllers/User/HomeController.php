<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('User.Home.index');
    }

    public function bantuan()
    {
        return view('User.Bantuan.index');
    }
}
