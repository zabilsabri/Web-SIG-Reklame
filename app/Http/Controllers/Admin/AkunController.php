<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        return view('Admin.Akun.index');
    }

    public function detail()
    {
        return view('Admin.Akun.detail');
    }

    public function edit()
    {
        return view('Admin.Akun.edit');
    }
}
