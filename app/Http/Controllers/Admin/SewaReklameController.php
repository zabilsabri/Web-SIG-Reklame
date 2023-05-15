<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SewaReklameController extends Controller
{
    public function index()
    {
        return view('Admin.Penyewaan Reklame.index');
    }

    public function edit()
    {
        return view('Admin.Penyewaan Reklame.edit');
    }
}
