<?php

namespace App\Http\Controllers;
use App\Tunjangan;
use App\Jabatan;
use Illuminate\Http\Request;

class PegawaiAdmin extends Controller
{
    public function page_pegawai(Request $request)
    {
        $tunjangan = Tunjangan::all();
        $jabatan = Jabatan::all();
        return view('new.pegawai',compact('tunjangan','jabatan'));
    }
}
