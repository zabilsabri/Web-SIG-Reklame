<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        $penyewaans = Penyewaan::all();

        return view('Pimpinan.Monitor.index', compact('penyewaans'));
    }

    public function detail($id)
    {
        $penyewaan = Penyewaan::find($id);
        return view('Pimpinan.Monitor.detail', compact('penyewaan'));
    }
}
