<?php

namespace App\Http\Controllers;
use App\Tunjangan;
use Illuminate\Http\Request;

class JabatanAdmin extends Controller
{
    public function page_jabatan(Request $request)
    {
        $tunjangan = Tunjangan::all();
        return view('new.jabatan',compact('tunjangan'));
    }

    public function post_jabatan(Request $request)
    {
        
    }
}
