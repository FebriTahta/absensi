<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable=[
        'jabatan','gajipokok','gajilembur'
    ];

    public function tunjangan()
    {
        return $this->belongsToMany(Tunjangan::class);
    }
}
