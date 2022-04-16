<?php

namespace App\Http\Controllers;
use Validator;
use DataTables;
use App\Pegawai;
use App\Penggajian;
use App\Absensi;
use PDF;
use Illuminate\Http\Request;

class PenggajianAdmin extends Controller
{
    public function page_penggajian(Request $request)
    {
        $val = date('Y-m');
        if ($request->ajax()) {
            # code...
            $data = Penggajian::where('tanggal', date('Y-m'))->with('pegawai')->get();
            return DataTables::of($data)
                    ->addColumn('nama', function($data){
                        return $data->pegawai->nama;
                    })
                    ->addColumn('opsi', function($data){
                        $actionBtn  = '<a href="#" data-nama="'.$data->pegawai->nama.'" data-jabatan="'.$data->pegawai->jabatan->jabatan.'" data-tanggal="'.$data->tanggal.'" data-total_lama_kerja="'.$data->total_lama_kerja.'" data-gaji_pokok="'.$data->gaji_pokok.'" data-total_lama_lembur="'.$data->total_lama_lembur.'"
                        data-gaji_lembur="'.$data->gaji_lembur.'" data-gaji_tunjangan="'.$data->gaji_tunjangan.'" data-gaji_bersih="'.$data->gaji_bersih.'" data-toggle="modal" data-target="#modalprint" data-id="'.$data->id.'" class="btn btn-sm text-white" style="margin-bottom:5px; background-color:blue; border-radius:15px"><i class="fa fa-print"></i></a>';
                        
                        return $actionBtn;
                    })
            ->rawColumns(['opsi','nama'])
            ->make(true);
        }

        $pegawai_tutup_buku = Pegawai::whereHas('penggajian', function ($query) use ($val){
            $query->where('tanggal',$val);
        })->get()->count();
        $pegawai_tutup_buku2 = Pegawai::whereHas('penggajian', function ($query) use ($val){
            $query->where('tanggal',$val);
        })->get();
        if ($pegawai_tutup_buku2->count() > 0) {
            # code...
            $list=[];
            foreach ($pegawai_tutup_buku2 as $key => $value) {
                # code...
                $list[] = $value->id; 
            }
            $daftar_pegawai = Pegawai::whereNotIn('id',$list)->get();
        }else {
            # code...
            $list=0;
            $daftar_pegawai = Pegawai::all();
        }

        $total_pegawai = Pegawai::all()->count();
        $pegawai_menunggu = $total_pegawai - $pegawai_tutup_buku;
        
        
        return view('new2.penggajian',compact('pegawai_tutup_buku','val','total_pegawai','pegawai_menunggu','daftar_pegawai'));
    }

    public function tabel_pegawai_penerima_gaji(Request $request, $val)
    {
        if ($request->ajax()) {
            # code...
            $data = Penggajian::where('tanggal', $val)->with('pegawai')->get();
            return DataTables::of($data)
                    ->addColumn('nama', function($data){
                        return $data->pegawai->nama;
                    })
                    ->addColumn('opsi', function($data){
                        $actionBtn  = '<a href="#" data-nama="'.$data->pegawai->nama.'" data-jabatan="'.$data->pegawai->jabatan->jabatan.'" data-tanggal="'.$data->tanggal.'" data-total_lama_kerja="'.$data->total_lama_kerja.'" data-gaji_pokok="'.$data->gaji_pokok.'" data-total_lama_lembur="'.$data->total_lama_lembur.'"
                        data-gaji_lembur="'.$data->gaji_lembur.'" data-gaji_tunjangan="'.$data->gaji_tunjangan.'" data-gaji_bersih="'.$data->gaji_bersih.'" data-toggle="modal" data-target="#modalprint" data-id="'.$data->id.'" class="btn btn-sm text-white" style="margin-bottom:5px; background-color:blue; border-radius:15px"><i class="fa fa-print"></i></a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi','nama'])
            ->make(true);
        }
    }

    public function cari_tutup_buku(Request $request, $val)
    {
        if ($request->ajax()) {
            # code...
            $pegawai_tutup_buku = Pegawai::whereHas('penggajian', function ($query) use ($val){
                $query->where('tanggal',$val);
            })->get()->count();
            $pegawai_tutup_buku2 = Pegawai::whereHas('penggajian', function ($query) use ($val){
                $query->where('tanggal',$val);
            })->get();
            if ($pegawai_tutup_buku2->count() > 0) {
                # code...
                $list=[];
                foreach ($pegawai_tutup_buku2 as $key => $value) {
                    # code...
                    $list[] = $value->id; 
                }
                $daftar_pegawai = Pegawai::whereNotIn('id',$list)->get();
            }else {
                # code...
                $list=0;
                $daftar_pegawai = Pegawai::all();
            }
    
            $total_pegawai = Pegawai::all()->count();
            $pegawai_menunggu = $total_pegawai - $pegawai_tutup_buku;

            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Menampilkan jumlah pegawai yang tutup buku dan menunggu proses penggajian',
                  'pegawai_ok' => $pegawai_tutup_buku.' Pegawai',
                  'pegawai_wait' => $pegawai_menunggu.' Pegawai',
                  'daftar_pegawai' => $daftar_pegawai,
                  'tanggal' => $val,
                ]
            );
        }
    }

    public function print(Request $request)
    {
        $nama = $request->nama;
        $jabatan = $request->jabatan;
        $tanggal = $request->tanggal;
        $total_lama_kerja = $request->total_lama_kerja;
        $gaji_pokok = $request->gaji_pokok;
        $total_lama_lembur = $request->total_lama_lembur;
        $gaji_lembur = $request->gaji_lembur;
        $gaji_tunjangan = $request->gaji_tunjangan;
        $gaji_bersih = $request->gaji_bersih;


        $pdf = PDF::loadview('laporan_gaji_pdf',compact('nama','tanggal','jabatan','total_lama_kerja','gaji_pokok','total_lama_lembur','gaji_lembur'
    ,'gaji_tunjangan','gaji_bersih'));
        return $pdf->download('laporan-pegawai.pdf');
    }

    public function proses_pembukuan(Request $request)
    {
        $val = $request->bulan;
        $thn = substr($request->bulan,0,4);
        $bln = substr($request->bulan,5,2);
        //get absensi
        $data = Absensi::where('pegawai_id', $request->daftar_pegawai)->whereMonth('created_at', $bln)->whereYear('created_at', $thn)->get();
        $pega = Pegawai::find($request->daftar_pegawai);
        //total gaji tiap bulan berdasarkan jabatan
        $gaji_pokok = $pega->jabatan->gajipokok; 
        $gaji_lembur = $pega->jabatan->gajilembur; 
        // return 'Gaji Pokok'.$data->sum('lama_kerja')*$gaji_pokok.' jabatan : '.$pega->jabatan->jabatan. 'lama_kerja :'. $data->sum('lama_kerja').' lama lembur :' .$data->sum('lama_lembur').' total lemburan :'.$data->sum('lama_lembur')*$pega->jabatan->gajilembur;

        $masuk_kerja = $data->sum('lama_kerja') + $data->sum('lama_lembur');
        if ($masuk_kerja > 0) {
            # code...
            if ($request->ajax()) {
                # add code...
                if ($pega->jabatan->tunjangan->count() > 0) {
                    # code...
                    $nominal = 0;
                    foreach ($pega->jabatan->tunjangan as $key => $value) {
                        # code...
                        $nominal += $value->besar;
                    }
                    $penggajian     = Penggajian::updateOrCreate(
                        [
                            'id' => $request->id,
                        ],
                        [
                            'pegawai_id' => $request->daftar_pegawai,
                            'tanggal' => $request->bulan,
                            'total_lama_kerja' => $data->sum('lama_kerja'),
                            'gaji_pokok' => $data->sum('lama_kerja')*$gaji_pokok,
                            'total_lama_lembur' => $data->sum('lama_lembur'),
                            'gaji_lembur' => $data->sum('lama_lembur')*$gaji_lembur,
                            'gaji_tunjangan' => $nominal * $data->where('status','ontime')->count(),
                            'gaji_bersih' => ($data->sum('lama_kerja')*$gaji_pokok)+($data->sum('lama_lembur')*$gaji_lembur)
                        ]
                    );
                }else {
                    # code...
                    $penggajian     = Penggajian::updateOrCreate(
                        [
                            'id' => $request->id,
                        ],
                        [
                            'pegawai_id' => $request->daftar_pegawai,
                            'tanggal' => $request->bulan,
                            'total_lama_kerja' => $data->sum('lama_kerja'),
                            'gaji_pokok' => $data->sum('lama_kerja')*$gaji_pokok,
                            'total_lama_lembur' => $data->sum('lama_lembur'),
                            'gaji_lembur' => $data->sum('lama_lembur')*$gaji_lembur,
                            'gaji_tunjangan' => '0',
                            'gaji_bersih' => ($data->sum('lama_kerja')*$gaji_pokok)+($data->sum('lama_lembur')*$gaji_lembur)
                        ]
                    );
                }
                
                
    
    
                $pegawai_tutup_buku = Pegawai::whereHas('penggajian', function ($query) use ($val){
                    $query->where('tanggal',$val);
                })->get()->count();
                $pegawai_tutup_buku2 = Pegawai::whereHas('penggajian', function ($query) use ($val){
                    $query->where('tanggal',$val);
                })->get();
                if ($pegawai_tutup_buku2->count() > 0) {
                    # code...
                    $list=[];
                    foreach ($pegawai_tutup_buku2 as $key => $value) {
                        # code...
                        $list[] = $value->id; 
                    }
                    $daftar_pegawai = Pegawai::whereNotIn('id',$list)->get();
                }else {
                    # code...
                    $list=0;
                    $daftar_pegawai = Pegawai::all();
                }
        
                $total_pegawai = Pegawai::all()->count();
                $pegawai_menunggu = $total_pegawai - $pegawai_tutup_buku;
    
                return response()->json(
                    [
                      'status'  => 200,
                      'message' => 'Pembukuan diproses',
                      'pegawai_ok' => $pegawai_tutup_buku.' Pegawai',
                      'pegawai_wait' => $pegawai_menunggu.' Pegawai',
                      'daftar_pegawai' => $daftar_pegawai,
                      'tanggal' => $val,
                    ]
                );
            }
        }else {
            # code...
            return response()->json(
                [
                  'status'  => 400,
                  'message' => 'Tidak dapat memproses pembukuan Pegawai yang tidak masuk kerja',
                ]
            );
        }
        
        
    }
}
