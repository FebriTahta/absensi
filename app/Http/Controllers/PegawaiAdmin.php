<?php

namespace App\Http\Controllers;
use App\Tunjangan;
use App\Jabatan;
use Validator;
use DataTables;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiAdmin extends Controller
{
    public function page_pegawai(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data   = Pegawai::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('opsi', function($data){
                        $actionBtn  = '<a href="#" data-jabatan_id="'.$data->jabatan_id.'" data-toggle="modal" data-nama="'.$data->nama.'" data-rfid_id="'.$data->rfid_id.'" data-alamat="'.$data->alamat.'" data-target="#modaledit" data-id="'.$data->id.'" data-telp="'.$data->telp.'" data-tgl="'.$data->tgl.'" data-ttl="'.$data->ttl.'" class="btn btn-sm text-white" style="margin-bottom:5px; background-color:blue;"><i class="fa fa-pencil"></i></a>';
                        $actionBtn .= '<a data-id="'.$data->id.'" style="margin-bottom:5px" data-toggle="modal" data-target="#modaldell" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a>';
                        return $actionBtn;
                    })
                    ->addColumn('jabatan', function($data){
                        return $data->jabatan->jabatan;
                    })
            ->rawColumns(['opsi','jabatan'])
            ->make(true);
        }

        $tunjangan = Tunjangan::all();
        $jabatan = Jabatan::all();
        return view('new2.pegawai',compact('tunjangan','jabatan'));
    }

    public function post_pegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rfid_id'       => 'nullable',
            'jabatan_id'    => 'required',
            'nama'          => 'required',
            'tgl'           => 'required',
            'ttl'           => 'required',
            'alamat'        => 'required',
            'telp'          => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Pegawai::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'rfid_id' => $request->rfid_id,
                    'jabatan_id'          => $request->jabatan_id,
                    'nama'          => $request->nama,
                    'tgl' => $request->tgl,
                    'ttl' => $request->ttl,
                    'alamat' => $request->alamat,
                    'telp'=> $request->telp,
                ]
            );
            
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Pegawai has been Added'
                ]
            );
        }
    }

    public function dell_pegawai(Request $request)
    {
        $data = Pegawai::find($request->id)->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Pegawai has been Removed'
            ]
        );

    }
}
