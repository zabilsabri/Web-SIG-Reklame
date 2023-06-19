<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyewaan;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        $res=  Penyewaan::selectRaw('extract(year FROM tgl_pasang) AS year')
        ->distinct()
        ->orderBy('year', 'desc')
        ->get();

        return view('Admin.Laporan Penyewaan.index')->
            with(compact('res'));
    }

    public function detail(Request $request)
    {
        $penyewaans = Penyewaan::whereYear('tgl_pasang', $request->year)->get();
        return view('Admin.Laporan Penyewaan.detail')
            ->with(compact('penyewaans'));
    }
}
