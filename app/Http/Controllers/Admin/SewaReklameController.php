<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklame;

class SewaReklameController extends Controller
{
    public function index()
    {
        $reklames = Reklame::get();
        return view('Admin.Penyewaan Reklame.index')
            ->with(compact('reklames'));
    }

    public function edit()
    {
        return view('Admin.Penyewaan Reklame.edit');
    }
}
