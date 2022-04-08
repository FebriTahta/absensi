<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    protected $fillable=[
        'besar','jenis'
    ];
    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }
}
