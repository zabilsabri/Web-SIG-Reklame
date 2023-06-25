<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklame;
use App\Models\Penyewaan;
use DB;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        
        $data_penyewaans = Penyewaan::select(DB::raw("COUNT(*) as count"), DB::raw("Month(tgl_pasang) as month_number"))
        ->whereYear('tgl_pasang', date('Y'))
        ->groupBy(DB::raw("Month(tgl_pasang)"))
        ->get();

        $data_penyewaan = collect(range(1, 12))->map(
            function ($month) use ($data_penyewaans) {
                $match = $data_penyewaans->firstWhere('month_number', $month);
                return $match ? $match['count'] : 0;
            }
        );

        $jumlah_reklame = Reklame::get()->count();

        $jumlah_penyewaan = Penyewaan::get()->count();

        $penyewaans = Penyewaan::get();

        $jth_tempo = 0;
        $on_progress = 0;

        foreach ($penyewaans as $penyewaan) {
            $tgl_jatuh_tempo = Carbon::parse($penyewaan->getRawOriginal('tgl_jatuh_tempo'));

            $diff = now()->diffInDays($tgl_jatuh_tempo, false);
            if($diff <= 0){
                $jth_tempo++;
            } else {
                $on_progress++;
            }
        }        

        return view('Pimpinan.Home.index')
            ->with(compact('jumlah_penyewaan'))
            ->with(compact('jumlah_reklame'))
            ->with(compact('data_penyewaan'))
            ->with(compact('jth_tempo'))
            ->with(compact('on_progress'));
    }
}
