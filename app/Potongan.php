<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    
    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class);
    }
}
