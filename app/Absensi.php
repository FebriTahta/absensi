<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'pegawai_id','tanggal','jam_hadir','jam_pulang','lama_kerja','lama_lembur'
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
