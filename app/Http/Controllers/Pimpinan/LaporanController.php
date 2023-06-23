<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $res=  Penyewaan::selectRaw('extract(year FROM tgl_pasang) AS year')
        ->distinct()
        ->orderBy('year', 'desc')
        ->get();

        return view('Pimpinan.Laporan Penyewaan.index', compact('res'));
    }

    public function detail(Request $request)
    {
        $penyewaans = Penyewaan::whereYear('tgl_pasang', $request->year)->get();
        return view('Pimpinan.Laporan Penyewaan.detail', compact('penyewaans'));
    }
}
