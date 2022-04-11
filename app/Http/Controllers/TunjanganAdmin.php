<?php

namespace App\Http\Controllers;
use Validator;
use DataTables;
use App\Tunjangan;
use Illuminate\Http\Request;

class TunjanganAdmin extends Controller
{
    public function page_tunjangan(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Tunjangan::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('opsi', function($data){
                        $actionBtn  = '<a href="#" data-toggle="modal" data-jenis="'.$data->jenis.'" data-besar="'.$data->besar.'" data-target="#modaledit" data-id="'.$data->id.'" class="btn btn-sm text-white" style="margin-bottom:5px; background-color:blue;"><i class="fa fa-pencil"></i></a>';
                        $actionBtn .= '<a data-id="'.$data->id.'" style="margin-bottom:5px" data-toggle="modal" data-target="#modaldell" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi'])
            ->make(true);
        }

        return view('new2.tunjangan');
    }

    public function dell_tunjangan(Request $request)
    {
        $data = Tunjangan::find($request->id);
        if ($data->jabatan->count() > 0) {
            # code...
            foreach ($data->jabatan as $key => $value) {
                # code...
                $data->jabatan()->detach($value->id);
            }
        }
        $data->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Tunjangan has been Removed'
            ]
        );
    }

    public function edit_tunjangan($id)
    {
        $tunjangan = Tunjangan::find($id);
        return view('new.tunjangan_edit',compact('tunjangan'));
    }

    public function post_tunjangan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'besar' => 'required',
           
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Tunjangan::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'jenis'          => $request->jenis,
                    'besar'          => $request->besar,
                ]
            );
            
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Tunjangan has been Added'
                ]
            );
        }
    }
}
