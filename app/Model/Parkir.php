<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $fillable = ['id','blok_parkir_id','kendaraan_id','status'];
    
      public function blok()
    {
        return $this->belongsTo(BlokParkir::class, 'blok_parkir_id','id');
    }
       public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id','id');
    }
}
