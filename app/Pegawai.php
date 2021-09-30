<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function rfid()
    {
        return $this->belongsTo(Rfid::class);
    }

    public function potongan()
    {
        return $this->belongsToMany(Potongan::class);
    }
}
