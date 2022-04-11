<?php

namespace App\Http\Controllers;
use Validator;
use DataTables;
use App\Pegawai;
use App\Penggajian;
use Illuminate\Http\Request;

class PenggajianAdmin extends Controller
{
    public function page_penggajian(Request $request)
    {
        $pegawai_tutup_buku = Pegawai::whereHas('penggajian', function ($query) {
            $query->where('tanggal',date('Y-m'));
        })->get()->count();
        $total_pegawai = Pegawai::all()->count();
        $pegawai_menunggu = $total_pegawai - $pegawai_tutup_buku;
        return view('new2.penggajian',compact('pegawai_tutup_buku','total_pegawai','pegawai_menunggu'));
    }
}
