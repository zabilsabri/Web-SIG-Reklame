<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklame;
use App\Models\Penyewaan;
use DataTables;

class DataReklameController extends Controller
{
    public function index()
    {
        return view('Admin.Data Reklame.index');
    }

    public function json()
    {
        $reklames = Reklame::get();
        return DataTables::of($reklames)
            ->addIndexColumn()
            ->addColumn('detail', function($reklames){
                return view('Admin.layout.Table Button.reklame2')->with('data', $reklames);
            })
            ->addColumn('aksi', function($reklames){
                return view('Admin.layout.Table Button.reklame')->with('data', $reklames);
            })
            ->make(true);
    }

    public function jsonDetail($id)
    {
        $reklames = Reklame::find($id);
        return response()->json([
            'statusWeb' => 'success',
            'reklame' => $reklames
        ]);
    }

    public function store(Request $request)
    {
        $reklame = new Reklame();
        $reklame->nama = $request->nama;
        $reklame->jalan = $request->jalan;
        $reklame->latitude = $request->lattitude;
        $reklame->longitude = $request->longitude;
        $reklame->tinggi = $request->tinggi;
        $reklame->luas = $request->luas;
        $reklame->harga = $request->harga;
        $reklame->lama = $request->lama;
        $reklame->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function editProcess(Request $request, $id)
    {
        $reklame = Reklame::find($id);
        $reklame->nama = $request->nama;
        $reklame->latitude = $request->latitude;
        $reklame->longitude = $request->longitude;
        $reklame->tinggi = $request->tinggi;
        $reklame->luas = $request->luas;
        $reklame->harga = $request->harga;
        $reklame->lama = $request->lama;
        $reklame->save();

        return back();
    }

    public function edit($id)
    {
        $reklame = Reklame::find($id);
        return view('Admin.Data Reklame.edit')
            ->with(compact('reklame'));
    }

    public function destroy($id)
    {
        $reklame = Reklame::where('id', $id)->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
