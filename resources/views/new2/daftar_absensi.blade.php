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
                    <h5 class="txt-dark" style="text-transform: uppercase">Daftar Absensi Hari Ini</h5>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="exampleModalLabel1">Pegawai Baru</h5>
                    </div>
                    <form id="formadd"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="rfid_id" placeholder="SCAN KTP" value="123123123">
                                </div>
                                
                                <hr>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Pegawai">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <select name="jabatan_id" class="form-control" id="" required>
                                        <option value="">*Jabatan</option>
                                       
                                    </select>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tempat & Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group transparent">
                                            <span class="input-group-addon ">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            
                                            <input type="date" placeholder="tanggal lahir" class="form-control" name="tgl">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group transparent">
                                            <span class="input-group-addon ">
                                                <i class="fa fa-map"></i>
                                            </span>
                                            
                                            <input type="text" placeholder="tempat lahir" class="form-control" name="ttl">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <input type="number" class="form-control" name="telp"
                                        placeholder="Telephone">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-map"></i>
                                    </span>
                                    <textarea name="alamat" id="" cols="30" rows="3" class="form-control">Alamat lengkap</textarea>
                                </div>
                                <br>
                                <hr>
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
                        <h5 class="modal-title" id="exampleModalLabel1">Update Pegawai</h5>
                    </div>
                    <form id="formedit"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                <div class="input-group transparent">
                                   
                                    <input type="hidden" class="form-control" name="id" id="id" placeholder="SCAN KTP" >
                                    <input type="hidden" class="form-control" name="rfid_id" id="rfid_id" placeholder="SCAN KTP" >
                                </div>
                                
                                <hr>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pegawai">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <select name="jabatan_id" class="form-control" id="jabatan_id" required>
                                        <option value="">*Jabatan</option>
                                        
                                    </select>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tempat & Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group transparent">
                                            <span class="input-group-addon ">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            
                                            <input type="date" placeholder="tanggal lahir" id="tgl" class="form-control" name="tgl">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group transparent">
                                            <span class="input-group-addon ">
                                                <i class="fa fa-map"></i>
                                            </span>
                                            
                                            <input type="text" placeholder="tempat lahir" id="ttl" class="form-control" name="ttl">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <input type="number" class="form-control" id="telp" name="telp"
                                        placeholder="Telephone">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-map"></i>
                                    </span>
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control">Alamat lengkap</textarea>
                                </div>
                                <br>
                                <hr>
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
                        <h5 class="modal-title" id="exampleModalLabel1">Remove Pegawai</h5>
                    </div>
                    <form id="formdell"> @csrf
                        <div class="modal-body">

                            <div class="row-fluid">
                                
                                <div class="input-group transparent">
                                   <p>Yakin akan menghapus Pegawai tersebut ?</p>
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
            var rfid_id = button.data('rfid_id')
            var nama = button.data('nama')
            var telp = button.data('telp')
            var alamat = button.data('alamat')
            var tgl = button.data('tgl')
            var ttl = button.data('ttl')
            var jabatan_id = button.data('jabatan_id')
            console.log(rfid_id);
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #nama').val(nama);
            modal.find('.modal-body #telp').val(telp);
            modal.find('.modal-body #alamat').val(alamat);
            modal.find('.modal-body #tgl').val(tgl);
            modal.find('.modal-body #ttl').val(ttl);
            modal.find('.modal-body #rfid_id').val(rfid_id);
            modal.find('.modal-body #jabatan_id').val(jabatan_id);
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
                ajax: "{{route('page.daftar_absensi')}}",
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
        });

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "/admin-pegawai-post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding Pegawai');
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
                url: "{{ route('dell.pegawai') }}",
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
                url: "{{ route('post.pegawai') }}",
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
