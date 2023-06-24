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

    public function status(){
        // check day difference between now and tgl_jatuh_tempo and wether it's overdue or not
        $now = date('Y-m-d');
        $tgl_jatuh_tempo = $this->getRawOriginal('tgl_jatuh_tempo');

        if ($now <= $tgl_jatuh_tempo) {
            $diff = date_diff(date_create($now), date_create($tgl_jatuh_tempo));
            $diff = $diff->format("%a");
            if ($diff <= 5) {
                return 2;
            }
            return 1;
        } else {
            return 0;
        }
    }

    public function getTglPasangAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getTglJatuhTempoAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}