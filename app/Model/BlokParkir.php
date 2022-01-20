<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlokParkir extends Model
{
    protected $fillable = ['lantai_id','nama'];
    
      public function lantai()
    {
        return $this->belongsTo(LantaiParkir::class, 'lantai_id','id');
    }
        public function parkir()
    {
        return $this->belongsTo(Parkir::class, 'id','blok_parkir_id');
    }
}
