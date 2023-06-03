<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Pimpinan.Laporan Penyewaan.index');
    }

    public function detail()
    {
        return view('Pimpinan.Laporan Penyewaan.detail');
    }
}
