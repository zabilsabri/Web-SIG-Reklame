<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penyewaan extends Model
{
    use HasFactory;

    public function reklame(){
    	return $this->belongsTo('App\Models\Reklame');
    }

    public function getStatus(){
        $now = date('Y-m-d');
        $tgl_jatuh_tempo = $this->getRawOriginal('tgl_jatuh_tempo');

        if ($now <= $tgl_jatuh_tempo) {
            $diff = now()->diffInDays($tgl_jatuh_tempo, false);
            if ($diff <= 5) {
                return 2;
            }

            return 1;
        } else {
            return 0;
        }
    }

    public function getTglJatuhTempoAttribute($value) {
        if(!isset($value)){
            return "Tersedia";
        } else {
            $tgl_jatuh_tempo = Carbon::parse($value);

            $diff = now()->diffInDays($tgl_jatuh_tempo, false);

            if($diff <= 0){
                return "Tersedia";
            } else {
                return "Tidak ahh";
            }
        }
    }
}
