<?php

namespace App\Http\Controllers;
use App\Credential;
use App\Absensi;
use App\Pegawai;
use Validator;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function page_dashboard(Request $request)
    {
        
        $total = Pegawai::whereHas('absensi',function($q){
            $q->where('tanggal',date('Y-m-d'));
        })->count();
        $telat = Pegawai::whereHas('absensi',function($q){
            $q->where('tanggal',date('Y-m-d'))->where('status','telat');
        })->count();
        $ontime = Pegawai::whereHas('absensi',function($q){
            $q->where('tanggal',date('Y-m-d'))->where('status','ontime');
        })->count();
        $credential = Credential::first();
        return view('new.dashboard',compact('credential','total','telat','ontime'));
    }

    public function post_credential(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jam_masuk'   => 'required',
            'jam_pulang' => 'required',
            'waktu_absen'=> 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Credential::updateOrCreate(
                [
                    'id' => 1
                ],
                [
                    'jam_masuk'          => $request->jam_masuk.':00',
                    'jam_pulang'        => $request->jam_pulang.':00',
                    'waktu_absen'        => $request->waktu_absen.':00',
                ]
            );

           
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Credential has been Updated'
                ]
            );
        }
    }

    public function pilih_bulan($val)
    {
        $thn = substr($val,0,4);
        $bln = substr($val,5,2);
        $telat = 0;
        $ontime= 0;
        $absen = Absensi::whereMonth('created_at', $bln)->whereYear('created_at', $thn)->count();
        if ($absen > 0) {
            # code...
            if (Absensi::where('status','telat')->whereMonth('created_at', $bln)->whereYear('created_at', $thn)->count() > 0) {
                # code...
                $telat = round(Absensi::where('status','telat')->whereMonth('created_at', $bln)->whereYear('created_at', $thn)->count()*100/$absen);
            }else {
                # code...
                $telat = 0;
            }

            if (Absensi::where('status','ontime')->whereMonth('created_at', $bln)->whereYear('created_at', $thn)->count() > 0) {
                # code...
                $ontime= round(Absensi::where('status','ontime')->whereMonth('created_at', $bln)->whereYear('created_at', $thn)->count()*100/$absen);
            }else {
                # code...
                $ontime = 0;
            }
            
            
            $pegawai = round($absen/Pegawai::all()->count()*100);
            // $pegawai = $absen;
            return response()->json(
                [
                'status'  => 200,
                'message' => 'Menampilkan data',
                'telat'   => $telat,
                'ontime'  => $ontime,
                'absensi' => $pegawai
                ]
            );
        }else {
            # code...
            return response()->json(
                [
                'status'  => 400,
                'message' => 'belum ada absensi',
              
                
                ]
            );
        }
        
    }
}
