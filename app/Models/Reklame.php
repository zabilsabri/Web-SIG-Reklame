<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyewaan;

class Reklame extends Model
{
    use HasFactory;

    public function penyewaan(){
    	return $this->hasMany(Penyewaan::class, 'reklame_id', 'id_reklames');
    }

    public function setHargaAttribute($value)
    {
        $this->attributes['harga'] = floatval(preg_replace('/[^\d.]/', '', $value));
    }

    public function getHargaAttribute($value)
    {
        $money_format = number_format($value);
        return "Rp " . $money_format . " / bulan";
    }

    public function idReklame(){
        $id = $this->getRawOriginal('id');
        return "R " . $id;
    }

}
