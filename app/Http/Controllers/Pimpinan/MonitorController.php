<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        return view('Pimpinan.Monitor.index');
    }

    public function detail()
    {
        return view('Pimpinan.Monitor.detail');
    }
}
