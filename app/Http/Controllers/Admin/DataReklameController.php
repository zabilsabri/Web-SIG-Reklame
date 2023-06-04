<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataReklameController extends Controller
{
    public function index()
    {
        return view('Admin.Data Reklame.index');
    }

    public function edit()
    {
        return view('Admin.Data Reklame.edit');
    }
}
