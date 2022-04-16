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
                    <h5 class="txt-dark" style="text-transform: uppercase">DASHBOARD</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin-dashboard">Home</a></li>
                        <li class="active"><span>Dashboard</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <div id="errList"></div>
            <!-- Row -->
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 50px">
                    <div class="col-lg-12" style="margin-bottom: 20px">
                        <div class="card">
                            <h4>INFORMASI</h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default card-view pa-0" style="background-color: brown  ">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                                <span class="txt-light block counter"
                                                                    id="telat">{{ $telat }} Pegawai</span>
                                                                <span
                                                                    class="weight-500 uppercase-font block font-13 txt-light">Total
                                                                    Pegawai Telat</span>
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
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default card-view pa-0"
                                        style="background-color: rgb(42, 165, 134)  ">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                                <span class="txt-light block counter"
                                                                    id="ontime">{{ $ontime }} Pegawai</span>
                                                                <span
                                                                    class="weight-500 uppercase-font block font-13 txt-light">Total
                                                                    Pegawai Ontime</span>
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
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default card-view pa-0"
                                        style="background-color: rgb(42, 116, 165)  ">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                                <span class="txt-light block counter" id="masuk">
                                                                    {{ $total }} / {{$pegawais}} Pegawai</span>
                                                                <span
                                                                    class="weight-500 uppercase-font block font-13 txt-light">Total
                                                                    Pegawai Masuk</span>
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
                                <div class="row">
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" style="padding: 10px">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="panel-title txt-dark">Key Metrics</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <label for="">Pilih Bulan</label>
                                                    <input type="month" value="<?= date('Y-m') ?>" class="form-control"
                                                        id="pilih_bulan">
                                                </div>
                                                <div class="panel-body">

                                                    <span class="font-12 head-font txt-dark">Pegawai Telat<span id="p_telat"
                                                            class="pull-right">{{$telatss}}%</span></span>
                                                    <div class="progress mt-10 mb-30">
                                                        <div class="progress-bar progress-bar-danger" id="telats" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100" style="width: {{$telatss}}%"
                                                            role="progressbar"> <span class="sr-only">{{$telatss}}% Complete
                                                                (success)</span> </div>
                                                    </div>
                                                    <span class="font-12 head-font txt-dark">Pegawai Ontime<span
                                                            class="pull-right" id="p_ontime">{{$ontimess}}%</span></span>
                                                    <div class="progress mt-10 mb-30">
                                                        <div class="progress-bar progress-bar-success" id="ontimes" aria-valuenow="80"
                                                            aria-valuemin="0" aria-valuemax="100" style="width: {{$ontimess}}%"
                                                            role="progressbar"> <span class="sr-only">{{$ontimess}}% Complete
                                                                (success)</span> </div>
                                                    </div>
                                                    <span class="font-12 head-font txt-dark">Pegawai Masuk<span
                                                            class="pull-right" id="p_absen">{{$pegawai}}%</span></span>
                                                    <div class="progress mt-10 mb-30">
                                                        <div class="progress-bar progress-bar-inverse" id="masuks" aria-valuenow="85"
                                                            aria-valuemin="0" aria-valuemax="100" style="width: {{$pegawai}}%"
                                                            role="progressbar"> <span class="sr-only">{{$pegawai}}% Complete
                                                                (success)</span> </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="padding: 10px">
                                        <div class="panel panel-default card-view pa-0"
                                            style="background-color: rgb(225, 233, 238)  ">
                                            <div class="block" style="padding: 10px; background-color: white">
                                                <div class="block-header">
                                                    <h5>CREDENTIAL</h5>
                                                </div>
                                                <hr>
                                                @if ($credential == null)
                                                    <form id="formadd">@csrf
                                                        <div class="block-content">
                                                            <br style="margin-top: 20px">
                                                            <div class="form-group">
                                                                <label> Jam Masuk</label>
                                                                <input type="time" name="jam_masuk" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label> Jam Pulang</label>
                                                                <input type="time" name="jam_pulang" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label> Waktu Absen</label>
                                                                <input type="time" name="waktu_absen" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" value="SETUP" class="btn btn-success"
                                                                    id="btnadd">
                                                            </div>
                                                    </form>
                                                @else
                                                    <form id="formadd">@csrf
                                                        <div class="block-content">
                                                            <br style="margin-top: 20px">
                                                            <div class="form-group">
                                                                <label> Jam Masuk</label>
                                                                <input type="time" name="jam_masuk" class="form-control"
                                                                    value="{{ $credential->jam_masuk }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label> Jam Pulang</label>
                                                                <input type="time" name="jam_pulang" class="form-control"
                                                                    value="{{ $credential->jam_pulang }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label> Waktu Absen</label>
                                                                <input type="time" name="waktu_absen" class="form-control"
                                                                    value="{{ $credential->waktu_absen }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" value="SETUP" class="btn btn-success"
                                                                    id="btnadd">
                                                            </div>
                                                    </form>
                                                @endif
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
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
          // $('#telats').css('width',5+'%');
        })
        $("#pilih_bulan").change(function () {
            var value = $(this).val();
            $.ajax({
                type: "GET",
                url: "/admin-dashboard-pilih-bulan/"+value,
                async: true,
                data: {
                    action1: value // as you are getting in php $_POST['action1'] 
                },
                success: function (response) {
                    // notif
                    $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
                        	icon: 'danger',
                        	hideAfter: 3500, 
                        	stack: 6
                        });
                        $('#telats').css('width',response.telat+'%');
                        $('#ontimes').css('width',response.ontime+'%');
                        $('#masuks').css('width',response.absensi+'%');

                        $('#p_telat').html(response.telat+'%');
                        $('#p_ontime').html(response.ontime+'%');
                        $('#p_absen').html(response.absensi+'%');
                    
                }
            });
        });
    </script>
    <script>
        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('post.credential') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Updating Credential');
                },
                success: function(response) {
                    if (response.status == 200) {

                        $("#formadd")[0].reset();
                        $('#btnadd').val('submit!');
                        $('#btnadd').attr('disabled', false);

                        $.toast({
                            heading: 'Hi Admin',
                            text: response.message,
                            position: 'top-right',
                            loaderBg: '#fec107',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                        window.location.reload();
                    } else {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('submit!');
                        $('#btnadd').attr('disabled', false);
                        $.toast({
                            heading: 'Hi Admin',
                            text: response.message,
                            position: 'top-right',
                            loaderBg: '#fec107',
                            icon: 'danger',
                            hideAfter: 3500,
                            stack: 6
                        });
                        $('#errList').html("");
                        $('#errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#errList').append('<div>' + err_values + '</div>');
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
