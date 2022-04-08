@extends('layouts.master')

@section('content')
    <div class="content">
        <ul class="breadcrumb" style="margin-bottom: 30px">
            <li>
                <p>TUNJANGAN</p>
            </li>
            <li><a href="#" class="active">Management Data Tunjangan</a> </li>
        </ul>

        <div class="row">
            <div class="col-md-4">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4>Form <span class="semi-bold">Tunjangan</span></h4>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#grid-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="grid-body no-border">
                        <form id="formadd"> @csrf
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
                                    <input type="submit" id="btnadd" class="btn btn-sm btn-primary" value="submit">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="grid simple ">
                            <div class="grid-title">
                                <h4>Table <span class="semi-bold">Tunjangan</span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body ">
                                {{-- <table id="example"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable"> --}}
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>Jenis Tunjangan</th>
                                            <th>Besar</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Jenis Tunjangan</th>
                                            <th>Besar</th>
                                            <th>Opsi</th>
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
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                // "bDestroy": true,
                // "bRetrieve": true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('page.tunjangan') }}",
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
                        // window.location.reload();
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('submit!');
                        $('#btnadd').attr('disabled', false);

                        toastr.success(response.message);
                    } else {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('submit!');
                        $('#btnadd').attr('disabled', false);
                        toastr.error(response.message);
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
