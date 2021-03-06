<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $fillable=[
        'pegawai_id','tanggal','gaji_lembur','gaji_pokok','gaji_bersih','total_lama_kerja','total_lama_lembur','gaji_tunjangan'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
