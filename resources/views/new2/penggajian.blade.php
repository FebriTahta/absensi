@extends('layouts.new_master')

@section('css')
    <link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark" style="text-transform: uppercase">Penggajian Pegawai </h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin-dashboard">Home</a></li>
                        <li class="active"><span>Penggajian</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="col-lg-12" style="margin-bottom: 20px">
                        <div class="card">
                            <h4>TUTUP BUKU</h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label> PILIH BULAN / TAHUN</label>
                                    <input type="month" value="<?=date('Y-m')?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default card-view pa-0 bg-gradient2">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 txt-light data-wrap-left">
                                                    <span class="block counter"><span class="counter-anim">{{$pegawai_tutup_buku}} Pegawai</span></span>
                                                    <span class="weight-500 uppercase-font block">Tutup Buku</span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
                                                    <i class=" icon-book-open data-right-rep-icon"></i>
                                                </div>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default card-view pa-0 bg-gradient">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-light block counter"><span class="counter-anim">{{$pegawai_menunggu}} Pegawai</span></span>
                                                    <span class="weight-500 uppercase-font block font-13 txt-light">Menunggu</span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <i class="icon-people  data-right-rep-icon txt-light"></i>
                                                </div>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card" style="background-color: white">
                            <div class="card-header" style="background-color: darkgray; padding: 2%; text-align: center">
                                <h5 style="color: white">PILIH PEGAWAI YANG AKAN DIPROSES PEMBUKUAN PENGGAJIAN</h5>
                            </div>
                            <div class="card-body" style="padding: 5%">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="daftar_pegawai">Daftar Pegawai</label>
                                            <select name="pegawai_id" class="form-control" id="daftar_pegawai">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="proses_pegawai">Proses Pembukuan</label><br>
                                            <input type="submit" class="btn btn-primary" style="width: 100%" value="PROSES!">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-lg-12" style="margin-bottom: 20px">
                        <div class="card">
                            <h4>DATA PENERIMA GAJI</h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label> DATA PENGGAJIAN</label>
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-wrap">
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-hover display  pb-30">
                                                        <thead>
                                                            <tr>
                                                                <th>Pegawai</th>
                                                                <th>Tanggal</th>
                                                                <th>Gaji Lembur</th>
                                                                <th>Gaji Pokok</th>
                                                                <th>Gaji Bersih</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Pegawai</th>
                                                                <th>Tanggal</th>
                                                                <th>Gaji Lembur</th>
                                                                <th>Gaji Pokok</th>
                                                                <th>Gaji Bersih</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="exampleModalLabel1">Jabatan Baru</h5>
                    </div>
                    <form id="formadd"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="jabatan" placeholder="Jenis Jabatan">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-book"></i>
                                    </span>
                                    <input type="number" class="form-control" name="gajipokok"
                                        placeholder="Gaji Pokok">
                                </div>
                                <br>
                                <hr>
                                <div class="form-group mb-30">
                                    <label class="control-label mb-10 text-left">Pilih Tunjangan</label>
                                    
                                    <div class="checkbox checkbox-primary">
                                        <div class="row">
                                           
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                                <div class="input-group">
                                    
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" id="btnadd" class="btn btn-sm btn-primary" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="exampleModalLabel1">Update Jabatan</h5>
                    </div>
                    <form id="formedit"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="hidden" id="id" name="id">
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jenis Jabatan">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-book"></i>
                                    </span>
                                    <input type="number" class="form-control" name="gajipokok" id="gajipokok"
                                        placeholder="Gaji Pokok">
                                </div>
                                <br>
                                <hr>
                                <div class="form-group mb-30">
                                    <label class="control-label mb-10 text-left">Pilih Tunjangan</label>
                                    
                                    <div class="checkbox checkbox-primary">
                                        <div class="row">
                                           
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                                <div class="input-group">
                                    
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" id="btnedit" class="btn btn-sm btn-primary" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modaldell" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="exampleModalLabel1">Remove Jabatan</h5>
                    </div>
                    <form id="formdell"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                
                                <div class="input-group transparent">
                                   <p>Yakin akan menghapus Jabatan tersebut ?</p>
                                    <input type="hidden" name="id" id="id">
                                </div>
                                <br>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" id="btndell" class="btn btn-sm btn-danger" value="Ya Hapus!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
@endsection

@section('script')
    <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
    
@endsection