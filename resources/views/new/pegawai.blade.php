@extends('layouts.master')

@section('content')
    <div class="content">
        <ul class="breadcrumb">
            <li>
                <p>PEGAWAI</p>
            </li>
            <li><a href="#" class="active">Management Data Pegawai</a> </li>
        </ul>

        <div class="row">
            <div class="col-md-4">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4>Form <span class="semi-bold">Pegawai</span></h4>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#grid-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="grid-body no-border">
                        <div class="row-fluid">
                            <div class="input-group transparent">
                                <span class="input-group-addon ">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Nama">
                            </div>
                            <br>
                            <div class="input-group transparent">
                                <span class="input-group-addon ">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir">
                            </div>
                            <br>
                            <div class="input-group transparent">
                                <span class="input-group-addon ">
                                    <i class="fa fa-map"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Tempat Lahir">
                            </div>
                            <br>
                            <div class="input-group transparent">
                                <span class="input-group-addon ">
                                    <i class="fa fa-tags"></i>
                                </span>
                                <select name="" id="" class="form-control" required>
                                    <option value="">*Jabatan</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{$item->id}}">{{$item->jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="input-group transparent">
                                <span class="input-group-addon ">
                                    <i class="fa fa-map"></i>
                                </span>
                                <textarea name="" class="form-control" id="" cols="30" rows="1">Alamat</textarea>
                            </div>
                            <br>
                            <div class="input-group transparent">
                                <span class="input-group-addon ">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input type="number" class="form-control" placeholder="Phone Number">
                            </div>
                            
                            <hr>
                            <div class="input-group transparent" style="float: right">
                              <input type="submit" class="btn btn-sm btn-primary" value="submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
