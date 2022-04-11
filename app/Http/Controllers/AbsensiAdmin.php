<?php

namespace App\Http\Controllers;
use DataTables;
use Validator;
use App\Pegawai;
use App\Absensi;
use Illuminate\Http\Request;

class AbsensiAdmin extends Controller
{
    public function page_daftar_absensi(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data   = Absensi::orderBy('id','desc')->where('tanggal', date("Y-m-d"))->with(['pegawai'])->get();
            return DataTables::of($data)
                    ->addColumn('nama_pegawai', function($data){
                        if ($data->jam_hadir < '09:00:00') {
                            # code...
                            return ' <i class="fa fa-star" style="color:green"> </i> ' . $data->pegawai->nama;
                        }else {
                            # code...
                            return ' <i class="fa fa-circle" style="color:red"> </i> ' . $data->pegawai->nama;
                        }
                        
                    })
                    ->addColumn('jabatan', function($data){
                        return $data->pegawai->jabatan->jabatan;
                    })
            ->rawColumns(['jabatan','nama_pegawai'])
            ->make(true);
        }
        return view('new2.daftar_absensi');
    }
}
