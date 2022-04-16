<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    protected $fillable=[
        'jam_masuk','jam_pulang','waktu_absen'
    ];
}
