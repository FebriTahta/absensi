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
            $data   = Absensi::where('tanggal', date("Y-m-d"))->orderBy('id','desc')->with(['pegawai'])->get();
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

    public function page_detail_absensi(Request $request)
    {
        $data = Pegawai::all();
        return view('new2.detail_absensi',compact('data'));
    }

    public function cari_absensi(Request $request)
    {
        $thn = substr($request->bulan,0,4);
        $bln = substr($request->bulan,5,2);

        $data = Absensi::where('pegawai_id', $request->pilih_pegawai)
        ->where('jam_hadir','!=',null)
        ->where('jam_pulang','!=',null)
        ->whereMonth('created_at', $bln)
        ->whereYear('created_at', $thn)
        ->get();

        
        if ($data->count() > 0) {
            # code...
            $tepat_waktu = $data->where('jam_hadir','<','09:00')->count();
            $telat_waktu = $data->where('jam_hadir','>','09:00')->count();
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Menampilkan Detail Absensi Pegawai',
                  'tepat'   => $tepat_waktu,
                  'telat'   => $telat_waktu,
                  'id_pegawai' => $request->pilih_pegawai,
                  'bln'     => $bln,
                  'thn'     => $thn
                ]
            );
        }else {
            # code...
            return response()->json(
                [
                  'status'  => 400,
                  'message' => 'Tidak ditemukan data absensi pegawai tersebut'
                ]
            );
        }
        
    }

    public function cari_absensi_tabel(Request $request, $pegawai_id,$thn,$bln)
    {
        if ($request->ajax()) {
            # code...
            $data   = Absensi::where('pegawai_id', $pegawai_id)->whereMonth('created_at',$bln)->whereYear('created_at',$thn)->get();
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
    }
}
