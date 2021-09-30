<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public function tunjangan()
    {
        return $this->belongsTo(Tunjangan::class);
    }
}
