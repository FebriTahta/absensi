<?php

namespace App\Http\Controllers;
use App\Tunjangan;
use App\Jabatan;
use Validator;
use DataTables;
use Illuminate\Http\Request;

class JabatanAdmin extends Controller
{
    public function page_jabatan(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data   = Jabatan::orderBy('id','desc');
            return DataTables::of($data)
                    ->addColumn('opsi', function($data){
                        $actionBtn  = '<a href="#" data-toggle="modal" data-jabatan="'.$data->jabatan.'" data-gajipokok="'.$data->gajipokok.'" data-target="#modaledit" data-id="'.$data->id.'" class="btn btn-sm text-white" style="margin-bottom:5px; background-color:blue;"><i class="fa fa-pencil"></i></a>';
                        $actionBtn .= '<a data-id="'.$data->id.'" style="margin-bottom:5px" data-toggle="modal" data-target="#modaldell" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a>';
                        return $actionBtn;
                    })
                    ->addColumn('tunjangan', function($data){
                        if ($data->tunjangan->count() > 0) {
                            # code...
                            $tunjangan=[];
                            foreach ($data->tunjangan as $key => $value) {
                                # code...
                                $tunjangan[] = $value->jenis;
                            }
                            return $tunjangan;
                        }else {
                            # code...
                            return '-';
                        }
                    })
            ->rawColumns(['opsi','tunjangan'])
            ->make(true);
        }

        $tunjangan = Tunjangan::all();
        return view('new2.jabatan',compact('tunjangan'));
    }

    public function post_jabatan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jabatan'   => 'required',
            'gajipokok' => 'required',
           
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Jabatan::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'jabatan'          => $request->jabatan,
                    'gajipokok'        => $request->gajipokok,
                ]
            );

            if ($request->tunjangan_id !== null) {
                # code...
                foreach ($request->tunjangan_id as $key => $value) {
                    # code...
                    $data->tunjangan()->attach($value);
                }
            }
            
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Jabatan has been Added'
                ]
            );
        }
    }

    public function update_jabatan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jabatan'   => 'required',
            'gajipokok' => 'required',
           
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Jabatan::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'jabatan'          => $request->jabatan,
                    'gajipokok'        => $request->gajipokok,
                ]
            );

            if ($data->tunjangan->count() > 0) {
                # code...
                foreach ($data->tunjangan as $key => $value) {
                    # code...
                    $data->tunjangan()->detach($value->id);
                }
            }

            if ($request->tunjangan_id !== null) {
                # code...
                foreach ($request->tunjangan_id as $key => $value) {
                    # code...
                    $data->tunjangan()->syncWithoutDetaching($value);
                }
            }
            
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Jabatan has been Added'
                ]
            );
        }
    }

    public function dell_jabatan(Request $request)
    {
        $data = Jabatan::find($request->id);
        if ($data->tunjangan->count() > 0) {
            # code...
            foreach ($data->tunjangan as $key => $value) {
                # code...
                $data->tunjangan()->detach($value->id);
            }
        }
        $data->delete();
        return response()->json(
            [
              'status'  => 200,
              'message' => 'Jabatan has been Removed'
            ]
        );
    }
}
