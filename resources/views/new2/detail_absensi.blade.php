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
                <div class="col-md-12">
                    <div id="errList"></div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark" style="text-transform: uppercase">DETAIL ABSENSI</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin-dashboard">Home</a></li>
                        <li class="active"><span>Absensi</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 20px">
                    <div class="card">
                        <h4>CARI DATA ABSENSI</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form id="formsearch"> @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label> PILIH BULAN / TAHUN</label>
                                    <input id="pilih_bulan" name="bulan" type="month" value="<?=date('Y-m')?>" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label> PILIH PEGAWAI</label>
                                    <select name="pilih_pegawai" class="form-control" id="pilih_pegawai" required>
                                        <option value="">-</option>
                                        @foreach ($data as $item)
                                            <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>_</label>
                                    <input type="submit" class="form-control btn btn-sm btn-primary" value="CARI" style="color: white" id="btnsearch">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default card-view pa-0" style="background-color: brown  ">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-light block counter" id="telat"> - Hari</span>
                                                <span class="weight-500 uppercase-font block font-13 txt-light">Telat Masuk</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-circle  data-right-rep-icon txt-light"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default card-view pa-0" style="background-color: cadetblue">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-light block counter" id="tepat"> - Hari</span>
                                                <span class="weight-500 uppercase-font block font-13 txt-light">Tepat Waktu</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-star  data-right-rep-icon txt-light"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">data Table</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Jabatan</th>
                                                        <th>Tangal</th>
                                                        <th>Jam Hadir</th>
                                                        <th>Jam Pulang</th>
                                                        <th>Lama Kerja</th>
                                                        <th>Lama Lembur</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Jabatan</th>
                                                        <th>Tangal</th>
                                                        <th>Jam Hadir</th>
                                                        <th>Jam Pulang</th>
                                                        <th>Lama Kerja</th>
                                                        <th>Lama Lembur</th>
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
    <!-- /Main Content -->
@endsection

@section('script')
    <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
    <script>
        
        $(document).ready(function() {
            
        });

        $('#formsearch').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{route('cari.absensi')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnsearch').attr('disabled', 'disabled');
                    $('#btnsearch').val('Process Searching');
                },
                success: function(response) {
                    if (response.status == 200) {
                        
                        $("#formsearch")[0].reset();
                        // var oTable = $('#example').dataTable();
                        // oTable.fnDraw(false);
                        $('#btnsearch').val('submit!');
                        $('#btnsearch').attr('disabled', false);
                        $('#tepat').html(response.tepat+' Hari');
                        $('#telat').html(response.telat+' Hari');
                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
                        	icon: 'success',
                        	hideAfter: 3500, 
                        	stack: 6
                        });

                        var table = $('#example').DataTable({
                            destroy: true,
                            processing: true,
                            serverSide: true,
                            ajax: "/admin-cari-absensi-tabel/"+response.id_pegawai+"/"+response.thn+"/"+response.bln,
                            columns: [{
                                    data: 'nama_pegawai',
                                    name: 'pegawai.nama'
                                },
                                {
                                    data: 'jabatan',
                                    name: 'jabatan'
                                },
                                {
                                    data: 'tanggal',
                                    name: 'tanggal'
                                },
                                {
                                    data: 'jam_hadir',
                                    name: 'jam_hadir'
                                },
                                {
                                    data: 'jam_pulang',
                                    name: 'jam_pulang'
                                },
                                {
                                    data: 'lama_kerja',
                                    name: 'lama_kerja'
                                },
                                {
                                    data: 'lama_lembur',
                                    name: 'lama_lembur'
                                },
                                
                            ]
                        });
                        
                    } else {
                        $("#formsearch")[0].reset();
                        $('#btnsearch').val('submit!');
                        $('#btnsearch').attr('disabled', false);
                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
                        	icon: 'danger',
                        	hideAfter: 3500, 
                        	stack: 6
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        
    </script>
@endsection
