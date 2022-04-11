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
                    <h5 class="txt-dark" style="text-transform: uppercase">Tunjangan Pegawai</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="/admin-dashboard">Home</a></li>
                        <li class="active"><span>Tunjangan</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="button-list mt-25">
                        <button type="button" class="btn btn-primary " data-toggle="modal"
                            data-target="#exampleModal">Tambah Tunjangan Baru</button>
                    </div>
                </div>
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
                                                        <th>Jenis</th>
                                                        <th>Besar</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Jenis</th>
                                                        <th>Besar</th>
                                                        <th>Option</th>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="exampleModalLabel1">Tunjangan Baru</h5>
                    </div>
                    <form id="formadd"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="jenis" placeholder="Jenis Tunjangan">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-book"></i>
                                    </span>
                                    <input type="number" class="form-control" name="besar"
                                        placeholder="Nominal Tunjangan">
                                </div>
                                <br>
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
                        <h5 class="modal-title" id="exampleModalLabel1">Update Tunjangan</h5>
                    </div>
                    <form id="formedit"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-book"></i>
                                    </span>
                                    
                                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Tunjangan">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-book"></i>
                                    </span>
                                    <input type="number" class="form-control" id="besar" name="besar"
                                        placeholder="Nominal Tunjangan">
                                        <input type="hidden" name="id" id="id">
                                </div>
                                <br>
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
                        <h5 class="modal-title" id="exampleModalLabel1">Remove Tunjangan</h5>
                    </div>
                    <form id="formdell"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                
                                <div class="input-group transparent">
                                   <p>Yakin akan menghapus Tunjangan tersebut ?</p>
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
    <script>
        $('#modaledit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var jenis = button.data('jenis')
            var besar = button.data('besar')
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #jenis').val(jenis);
            modal.find('.modal-body #besar').val(besar);
        })
        $('#modaldell').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
        $(document).ready(function() {
            var table = $('#example').DataTable({
                // "bDestroy": true,
                // "bRetrieve": true,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "/admin-tunjangan",
                columns: [{
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'besar',
                        name: 'besar'
                    },
                    {
                        "width": 5,
                        data: 'opsi',
                        name: 'opsi',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('post.tunjangan') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding Tunjangan');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#exampleModal').modal('hide');
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('submit!');
                        $('#btnadd').attr('disabled', false);

                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
                        	icon: 'success',
                        	hideAfter: 3500, 
                        	stack: 6
                        });
                        
                    } else {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('submit!');
                        $('#btnadd').attr('disabled', false);
                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
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

        $('#formdell').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('dell.tunjangan') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndell').attr('disabled', 'disabled');
                    $('#btndell').val('Process Deleting Tunjangan');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldell').modal('hide');
                        $("#formdell")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btndell').val('Ya Hapus!');
                        $('#btndell').attr('disabled', false);

                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
                        	icon: 'warning',
                        	hideAfter: 3500, 
                        	stack: 6
                        });
                    } else {
                        $("#formdell")[0].reset();
                        $('#btndell').val('submit!');
                        $('#btndell').attr('disabled', false);
                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
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

        $('#formedit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('post.tunjangan') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnedit').attr('disabled', 'disabled');
                    $('#btnedit').val('Process Adding Tunjangan');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaledit').modal('hide');
                        $("#formedit")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnedit').val('submit!');
                        $('#btnedit').attr('disabled', false);

                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
                        	icon: 'success',
                        	hideAfter: 3500, 
                        	stack: 6
                        });
                    } else {
                        $("#formedit")[0].reset();
                        $('#btnedit').val('submit!');
                        $('#btnedit').attr('disabled', false);
                        $.toast({
                        	heading: 'Hi Admin',
                        	text: response.message,
                        	position: 'top-right',
                        	loaderBg:'#fec107',
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
