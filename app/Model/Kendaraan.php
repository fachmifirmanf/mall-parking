<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = ['id','id_jenis_kendaraan','plat_nomor'];
    
    public function jenis()
    {
        return $this->belongsTo(JenisKendaraan::class, 'id_jenis_kendaraan','id');
    }
}
