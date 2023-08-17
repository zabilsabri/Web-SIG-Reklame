<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklame;
use DataTables;
use App\Models\Penyewaan;
use DB;
use Carbon\Carbon;

class SewaReklameController extends Controller
{
    public function index()
    {
        $reklames = Reklame::with('penyewaan')->get();
        return view('Admin.Penyewaan Reklame.index')->with('data', $reklames);
    }

    public function edit($id)
    {
        $penyewaan = Penyewaan::with('reklame')->find($id);
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
        $reklame = Reklame::find($request->id_reklame);

        $penyewaan->reklame_id = $request->id_reklame;
        $penyewaan->nama = $request->nama_penyewa;
        $penyewaan->perusahaan = $request->nama_perusahaan;
        $penyewaan->jenis = $request->jenis_iklan;
        $penyewaan->tgl_pasang = $request->tgl_pasang;
        $penyewaan->tgl_jatuh_tempo = $request->jth_tempo;

        $tgl_pasang = Carbon::parse($request->tgl_pasang);
        $tgl_jatuh_tempo = Carbon::parse($request->jth_tempo);

        $diff = $tgl_pasang->diffInMonths($tgl_jatuh_tempo);

        if($diff == 0){
            $diff = 1;
        }
        
        $total_harga_sewa = $diff * (int)$reklame -> getRawOriginal('harga');

        $penyewaan->total_harga = $total_harga_sewa;

        $penyewaan->save();


        return response()->json([
            'status' => 'success'
        ]);

        
    }

    public function editProcess(Request $request, $id)
    {
        $penyewaan = Penyewaan::find($id);
        $reklame = Reklame::find($penyewaan->reklame_id);

        $penyewaan->nama = $request->nama_penyewa;
        $penyewaan->perusahaan = $request->nama_perusahaan;
        $penyewaan->jenis = $request->jenis_iklan;
        $penyewaan->tgl_pasang = $request->tgl_pasang;
        $penyewaan->tgl_jatuh_tempo = $request->jth_tempo;

        $tgl_pasang = Carbon::parse($request->tgl_pasang);
        $tgl_jatuh_tempo = Carbon::parse($request->jth_tempo);

        $diff = $tgl_pasang->diffInMonths($tgl_jatuh_tempo);

        if($diff == 0){
            $diff = 1;
        }
        
        $total_harga_sewa = $diff * (int)$reklame -> getRawOriginal('harga');

        $penyewaan->total_harga = $total_harga_sewa;

        $penyewaan->save();

        return back()->with('success', 'Data Penyewaan Reklame Telah Diedit!');
    }

    public function destroy($id)
    {
        $penyewaan = Penyewaan::where('id', $id)->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
