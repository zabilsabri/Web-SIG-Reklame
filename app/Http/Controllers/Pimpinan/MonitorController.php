<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Reklame;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        $reklames = Reklame::
        orderByRaw(
            "CAST(SUBSTRING_INDEX(nama, ' ', -1) AS UNSIGNED)"
        )
        ->get();

        return view('Pimpinan.Monitor.index', compact('reklames'));
    }

    public function detail($id)
    {
        $reklame = Reklame::find($id);
        $penyewaan = Penyewaan::where('reklame_id', $id)->latest()->first();
        return view('Pimpinan.Monitor.detail')
            ->with(compact('reklame'))
            ->with(compact('penyewaan'));
    }
}
