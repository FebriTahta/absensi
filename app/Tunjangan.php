<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    public function tunjangan()
    {
        return $this->hasMany(Jabatan::class);
    }
}
