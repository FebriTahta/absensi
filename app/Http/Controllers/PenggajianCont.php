<?php

namespace App\Http\Controllers;
use DataTables;
use DB;
use Carbon\Carbon;
use App\Tunjangan;
use App\Jabatan;
use App\Pegawai;
use App\Potongan;
use App\Absensi;
use App\Rfid;
use PDF;
use Illuminate\Http\Request;

class PenggajianCont extends Controller
{
    public function index()
    {
        // $data = Absensi::where('tanggal2','2021-09')->get();
        // return $data;
        // $y=0;
        // for ($i= 1; $i <= 50; $i++) { 
        //     if ( $bagi = $i % 26 == 0 ) {
        //         $z = $i;

        //         $y[] = $z;  
                
        //     }
        // }
        // return $y;
        return view('penggajian.index');
    }

    public function data_pegawai(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('pegawais');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
   
                           $btn = '<a href="/detail-gaji/'.$data->id.'" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function detail_gaji($id)
    {
        $data = Pegawai::where('id',$id)->first();
        return view('penggajian.detail',compact('data'));
    }
    public function detail_gaji_pegawai(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
                // $data   = pegawai::where('id',$id)
                // ->whereBetween('tanggal', array($request->dari, $request->sampai));
                // return DataTables::of($data)
                //         ->addColumn('totalabsen', function($data){
                //             return $data->absensi->count();
                //         })
                //         ->addColumn('totaljam', function($data){
                //             return "test";
                //         })
                        
                // ->rawColumns(['totalabsen','totaljam'])
                // ->make(true);
                $z=0;
                $lembur=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = ($data->count()*8)*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                // return response()->json($datax->pegawai->nama);
                return response()->json(' lemburan : '.$biayalembur.' total masuk kerja '.$data->count().' hari'.' gaji kotor : '.$gajibersih.' total lembur '.$lembur.' jam', 200);
                // $data = Absensi::
                // whereBetween('tanggal', array($request->dari, $request->sampai))
                // ->get()->count();
                // return response()->json($data,200);
            }
        }
    }

    public function total_jam_kerja(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
                $z=0;
                $lembur=0;
                $totaljam=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    if ($value->jam_hadir !== null && $value->jam_pulang !== null) {
                        # code...
                        $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                        $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                        $x[$key]    = $y[$key]-$y1[$key];
                        if ($x[$key] > 8) {
                            # code...
                            $lem[$key]  = $x[$key]-8;
                            if ($lem[$key] > 0) {
                                # code...
                                $lembur += $lem[$key]; 
                            }
                            $z += $x[$key];
                            
                            $totaljam += 8;
                        }else {
                            # code...
                            $totaljam += $x[$key];
                        }
                    }
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = $totaljam*$data3;
                $gajibersih= $gajikotor+$biayalembur-$biayalembur;
                return response()->json(''.$totaljam.' JAM : '. $gajibersih);
            }
        }
    }

    public function total_jam_lembur(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
                $z=0;
                $lembur=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = ($data->count()*8)*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                return response()->json(''.($lembur).' JAM : '. $biayalembur);
            }
        }
    }

    public function total_potongan(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
                $z=0;
                $lembur=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = ($data->count()*8)*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                $absen = $data->count();
                $layakpotong = $absen/26;
                if ($absen > 26 || $absen == 26) {
                    # code...
                        for ($i= 1; $i <= $absen; $i++) { 
                            if ( $bagi = $i % 26 == 0 ) {
                                $z = $i;
                
                                $w[] = $z;  
                                
                            }
                        }
                        $sekiankalipotong = count($w);
                        $potongan = $data2->potongan->sum('besar');
                        $total = $sekiankalipotong*$potongan;
                        
                        return response()->json($total);
                    
                }else {
                    # code...
                    // $potong = 0;
                        return response()->json(0);
                }
                
            }
        }
    }

    public function total_gajibersih(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
                $z=0;
                $lembur=0;
                $totaljam=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                        $totaljam += 8;
                    }else {
                        # code...
                        $totaljam += $x[$key];
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = $totaljam*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                $absen = $data->count();
                $layakpotong = $absen%26;
                if ($absen > 26 || $absen == 26) {
                    # code...
                    for ($i= 1; $i <= $absen; $i++) { 
                        if ( $bagi = $i % 26 == 0 ) {
                            $z = $i;
            
                            $w[] = $z;  
                            
                        }
                    }
                        $sekiankalipotong = count($w);
                        $potongan = $data2->potongan->sum('besar');
                        $totalpotong = $sekiankalipotong*$potongan;
                        $totaltunjang= $sekiankalipotong*$data2->jabatan->tunjangan->besar;
                        $bersih = $gajibersih-$totalpotong;
                        // return response()->json($bersih+$totaltunjang);
                        return response()->json(($gajibersih+$biayalembur+$totaltunjang)-$totalpotong);
                        
                    
                }else {
                    # code...
                    return response()->json($gajibersih);
                }
                
            }
        }
    }

    public function detail_gaji_pegawai2(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari2))
            {
                // $data   = pegawai::where('id',$id)
                // ->whereBetween('tanggal', array($request->dari, $request->sampai));
                // return DataTables::of($data)
                //         ->addColumn('totalabsen', function($data){
                //             return $data->absensi->count();
                //         })
                //         ->addColumn('totaljam', function($data){
                //             return "test";
                //         })
                        
                // ->rawColumns(['totalabsen','totaljam'])
                // ->make(true);
                $z=0;
                $lembur=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal2', array($request->dari2, $request->sampai2))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    if ($value->jam_pulang == null) {
                        # code...
                        return response()->json('ada absen yang tidak terisi');
                    }else{
                        $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                        $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                        $x[$key]    = $y[$key]-$y1[$key];
                        $lem[$key]  = $x[$key]-8;
                        if ($lem[$key] > 0) {
                            # code...
                            $lembur += $lem[$key]; 
                        }
                        $z += $x[$key];
                    }
                    
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = ($data->count()*8)*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                
                
                // return response()->json($datax->pegawai->nama);
                return response()->json($data->count()*8 .' JAM : ' .$gajibersih);
                // return response()->json(' lemburan : '.$biayalembur.' total masuk kerja '.$data->count().' hari'.' gaji kotor : '.$gajibersih.' total lembur '.$lembur.' jam', 200);
                // return response()->json(
                //     '<div class="row" id="display-detail">
                //         <div class="form-group col-xl-3">
                //             <label for="">TOTAL JAM KERJA</label>
                //             <p id="jamkerja">'.($data->count()*8).' JAM </p>
                //             <input type="hidden" name="jamkerja" id="jamkerja2" value="">
                //         </div>
                //         <div class="form-group col-xl-3">
                //             <label for="">TOTAL JAM LEMBUR</label>
                //             <p id="jamlembur">'.$lembur.'</p>
                //             <input type="hidden" name="jamlembur" id="jamlembur2" value="">
                //         </div>
                //         <div class="form-group col-xl-3">
                //             <label for="">TOTAL POTONGAN</label>
                //             <p id="totalpotongan">-</p>
                //             <input type="hidden" name="totalpotongan" id="totalpotongan2" value="">
                //         </div>
                //         <div class="form-group col-xl-3">
                //             <label for="">TOTAL TUNJANGAN</label>
                //             <p id="totaltunjangan">-</p>
                //             <input type="hidden" name="totaltunjangan" id="totaltunjangan2" value="">
                //         </div>
                //         <div class="form-group col-xl-3">
                //             <label for="">TOTAL GAJI BERSIH</label>
                //             <p id="totalgajibersih">'.$lembur.'</p>
                //             <input type="hidden" name="totalgajibersih" id="totalgajibersih2" value="">
                //         </div>
                //     </div>'
                // ,200);
                
                
                // $data = Absensi::
                // whereBetween('tanggal', array($request->dari, $request->sampai))
                // ->get()->count();
                // return response()->json($data,200);
            }
        }
    }

    public function jam_kerja_pegawai(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
            }
        }
    }

    public function total_jam_kerja2(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
                $z=0;
                $lembur=0;
                $totaljam=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    if ($value->jam_hadir !== null && $value->jam_pulang !== null) {
                        # code...
                        $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                        $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                        $x[$key]    = $y[$key]-$y1[$key];
                        if ($x[$key] > 8) {
                            # code...
                            $lem[$key]  = $x[$key]-8;
                            if ($lem[$key] > 0) {
                                # code...
                                $lembur += $lem[$key]; 
                            }
                            $z += $x[$key];
                            
                            $totaljam += 8;
                        }else {
                            # code...
                            $totaljam += $x[$key];
                        }
                    }
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = $totaljam*$data3;
                $gajibersih= $gajikotor+$biayalembur-$biayalembur;
                return response()->json('ngentod');
                return response()->json(''.$totaljam.' JAM : '. $gajibersih);
            }
        }
    }

    public function total_jam_lembur2(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari2))
            {
                $z=0;
                $lembur=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal2', array($request->dari2, $request->sampai2))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = ($data->count()*8)*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                return response()->json(''.($lembur).' JAM : '. "Rp " . number_format($biayalembur,2,',','.'));
            }
        }
    }

    public function total_potongan2(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari2))
            {
                $z=0;
                $lembur=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal2', array($request->dari2, $request->sampai2))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = ($data->count()*8)*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                $absen = $data->count();
                $layakpotong = $absen%26;
                
                
                if ($absen > 26 || $absen == 26) {
                    # code...
                        for ($i= 1; $i <= $absen; $i++) { 
                            if ( $bagi = $i % 26 == 0 ) {
                                $z = $i;
                
                                $w[] = $z;  
                                
                            }
                        }
                        $sekiankalipotong = count($w);
                        $potongan = $data2->potongan->sum('besar');
                        $total = "Rp " . number_format($sekiankalipotong*$potongan,2,',','.');
                        
                        return response()->json($total);
                    
                }else {
                    # code...
                    // $potong = 0;
                        return response()->json(0);
                }
                // return response()->json(count($w));
                
                
            }
        }
    }

    public function total_gajibersih2(Request $request,$id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari2))
            {
                $z=0;
                $lembur=0;
                $totaljam=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal2', array($request->dari2, $request->sampai2))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                        $totaljam += 8;
                    }else {
                        # code...
                        $totaljam += $x[$key];
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = $totaljam*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                $absen = $data->count();
                $layakpotong = $absen%26;
                if ($absen > 26 || $absen == 26) {
                    # code...
                    for ($i= 1; $i <= $absen; $i++) { 
                        if ( $bagi = $i % 26 == 0 ) {
                            $z = $i;
            
                            $w[] = $z;  
                            
                        }
                    }
                        $sekiankalipotong = count($w);
                        $potongan = $data2->potongan->sum('besar');
                        $totalpotong = $sekiankalipotong*$potongan;
                        $totaltunjang= $sekiankalipotong*$data2->jabatan->tunjangan->besar;
                        $bersih = $gajibersih-$totalpotong;
                        // return response()->json($bersih+$totaltunjang);
                        return response()->json(($gajibersih+$biayalembur+$totaltunjang)-$totalpotong);
                        
                    
                }else {
                    # code...
                    return response()->json($gajibersih);
                }
                
                
            }
        }
    }

    public function print(Request $request)
    {
        $nama = $request->nama;
        $jabatan = $request->jabatan;
        $jamkerja = $request->jamkerja;
        $jamlembur = $request->jamlembur;
        $totalpotongan = $request->totalpotongan;
        $totalgajibersih = $request->totalgajibersih;
        $tunjangan = $request->tunjangan;

        $pdf = PDF::loadview('laporan_gaji_pdf',compact('nama','tunjangan','jabatan','jamkerja','jamlembur','totalpotongan','totalgajibersih'));
        return $pdf->download('laporan-pegawai.pdf');
    }

    public function total_tunjangan(Request $request, $id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari))
            {
                $z=0;
                $lembur=0;
                $totaljam=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                        $totaljam += 8;
                    }else {
                        # code...
                        $totaljam += $x[$key];
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = $totaljam*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                $absen = $data->count();
                $layakpotong = $absen%26;
                if ($absen > 26 || $absen == 26) {
                    # code...
                    for ($i= 1; $i <= $absen; $i++) { 
                        if ( $bagi = $i % 26 == 0 ) {
                            $z = $i;
            
                            $w[] = $z;  
                            
                        }
                    }
                        $sekiankalipotong = count($w);
                        $potongan = $data2->potongan->sum('besar');
                        $totalpotong = $sekiankalipotong*$potongan;
                        $totaltunjang= $sekiankalipotong*$data2->jabatan->tunjangan->besar;
                        $bersih = $gajibersih-$totalpotong;
                        // return response()->json($bersih+$totaltunjang);
                        return response()->json($totaltunjang);
                        
                    
                }else {
                    # code...
                    return response()->json(0);
                }
                
            }
        }   
    }

    public function total_tunjangan2(Request $request, $id)
    {
        if(request()->ajax())
        {
            if(!empty($request->dari2))
            {
                $z=0;
                $lembur=0;
                $totaljam=0;
                $data = Absensi::where('pegawai_id',$id)
                ->whereBetween('tanggal', array($request->dari, $request->sampai))
                ->get();
                $data2= Pegawai::find($id);
                foreach ($data as $key => $value) {
                    # code...
                    $y[$key]    = Carbon::parse($value->jam_pulang)->isoFormat('H');
                    $y1[$key]   = Carbon::parse($value->jam_hadir)->isoFormat('H');
                    $x[$key]    = $y[$key]-$y1[$key];
                    $lem[$key]  = $x[$key]-8;
                    if ($lem[$key] > 0) {
                        # code...
                        $lembur += $lem[$key]; 
                        $totaljam += 8;
                    }else {
                        # code...
                        $totaljam += $x[$key];
                    }
                    $z += $x[$key];
                }
                $biayalembur = $lembur*20000;
                $data3= $data2->jabatan->gajipokok;
                $gajikotor = $totaljam*$data3;
                $gajibersih= $gajikotor+$biayalembur;
                $absen = $data->count();
                $layakpotong = $absen%26;
                if ($absen > 26 || $absen == 26) {
                    # code...
                    for ($i= 1; $i <= $absen; $i++) { 
                        if ( $bagi = $i % 26 == 0 ) {
                            $z = $i;
            
                            $w[] = $z;  
                            
                        }
                    }
                        $sekiankalipotong = count($w);
                        $potongan = $data2->potongan->sum('besar');
                        $totalpotong = $sekiankalipotong*$potongan;
                        $totaltunjang= $sekiankalipotong*$data2->jabatan->tunjangan->besar;
                        $bersih = $gajibersih-$totalpotong;
                        // return response()->json($bersih+$totaltunjang);
                        return response()->json($totaltunjang);
                        
                    
                }else {
                    # code...
                    return response()->json(0);
                }
                
            }
        }   
    }
}
