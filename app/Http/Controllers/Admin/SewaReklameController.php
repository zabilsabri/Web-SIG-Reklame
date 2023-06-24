<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklame;
use DataTables;
use App\Models\Penyewaan;
use DB;

class SewaReklameController extends Controller
{
    public function index()
    {
        $reklames = Reklame::with('penyewaan')->get();
        return view('Admin.Penyewaan Reklame.index')->with('data', $reklames);
    }

    public function edit($id)
    {
        $penyewaan = Penyewaan::with('reklame')->first();
        return view('Admin.Penyewaan Reklame.edit')
            ->with(compact('penyewaan'));
    }

    public function jsonModal($id_reklame){
        $reklameModal = Reklame::with('penyewaan')->find($id_reklame);
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
            ->addColumn('status', function($penyewaan){
                return view('Admin.layout.Table Button.status2')->with('data', $penyewaan);
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
