<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
