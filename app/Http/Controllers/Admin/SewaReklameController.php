<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklame;
use DataTables;
use App\Models\Penyewaan;

class SewaReklameController extends Controller
{
    public function index()
    {
        $reklames = Reklame::get();
        return view('Admin.Penyewaan Reklame.index')
            ->with(compact('reklames'));
    }

    public function edit($id)
    {
        $penyewaan = Penyewaan::with('reklame')->first();
        return view('Admin.Penyewaan Reklame.edit')
            ->with(compact('penyewaan'));
    }

    public function jsonModal($id_reklame){
        $reklameModal = Reklame::find($id_reklame);
        return response()->json([
            'statusWeb' => 'success',
            'reklame' => $reklameModal
        ]);
    }

    public function json()
    {
        $penyewaan = Penyewaan::with('reklame')->get();
        return DataTables::of($penyewaan)
            ->addIndexColumn()
            ->addColumn('aksi', function($penyewaan){
                return view('Admin.layout.Table Button.sewaReklame')->with('data', $penyewaan);
            })
            ->addColumn('tgl_jatuh_tempo', function($penyewaan){
                return $penyewaan->getRawOriginal('tgl_jatuh_tempo');
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $penyewaan = new Penyewaan();
        $penyewaan->reklame_id = $request->id_reklame;
        $penyewaan->nama = $request->nama_penyewa;
        $penyewaan->perusahaan = $request->nama_perusahaan;
        $penyewaan->jenis = $request->jenis_iklan;
        $penyewaan->tgl_pasang = $request->tgl_pasang;
        $penyewaan->tgl_jatuh_tempo = $request->jth_tempo;
        $penyewaan->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function editProcess(Request $request, $id)
    {
        $penyewaan = Penyewaan::find($id);
        $penyewaan->nama = $request->nama_penyewa;
        $penyewaan->perusahaan = $request->nama_perusahaan;
        $penyewaan->jenis = $request->jenis_iklan;
        $penyewaan->tgl_pasang = $request->tgl_pasang;
        $penyewaan->tgl_jatuh_tempo = $request->jth_tempo;
        $penyewaan->save();

        return back();
    }

    public function destroy($id)
    {
        $penyewaan = Penyewaan::where('id', $id)->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
