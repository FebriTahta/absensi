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
                        $actionBtn = ' <a type="button" class="btn btn-sm btn-info text-white" style="margin-bottom:10px; margin-right:10px;"><i class="fa fa-pencil"></i> UPDATE</a>';
                        $actionBtn .= ' <a href="#" type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#modaldel" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i> REMOVE</a>';
                        return $actionBtn;
                    })
            ->rawColumns(['opsi'])
            ->make(true);
        }

        return view('new.tunjangan');
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
