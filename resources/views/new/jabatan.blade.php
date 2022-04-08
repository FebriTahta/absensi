@extends('layouts.master')

@section('content')
    <div class="content">
        <ul class="breadcrumb">
            <li>
                <p>JABATAN</p>
            </li>
            <li><a href="#" class="active">Management Data Jabatan</a> </li>
        </ul>

        <div class="row">
            <div class="col-md-4">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4>Form <span class="semi-bold">Jabatan</span></h4>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#grid-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="grid-body no-border">
                        <form id="formadd" >@csrf
                            <div class="row-fluid">
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-tags"></i>
                                    </span>
                                    <input type="text" class="form-control" name="jenis" placeholder="Jenis Jabatan">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-tags"></i>
                                    </span>
                                    <input type="text" class="form-control" name="besar" placeholder="Nominal Gaji Pokok">
                                </div>
                                <br>
                                <div class="input-group transparent">
                                    <label> Pilih Tunjangan</label>
                                    <div class="checkbox radio-success">
                                    @foreach ($tunjangan as $item)
                                    <input id="yes{{$item->id}}" type="checkbox" name="tunjangan_id[]" value="yes">
                                    <label for="yes{{$item->id}}">{{$item->jenis}}</label>
                                    @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="input-group transparent" style="float: right">
                                <input type="submit" id="btnadd" class="btn btn-sm btn-primary" value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('post.jabatan') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Process Adding Product');
                },
                success: function(response) {
                    if (response.status == 200) {
                        // window.location.reload();
                        $("#formadd")[0].reset();
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('SUBMIT!');
                        $('#btnadd').attr('disabled', false);
                        var previews = document.getElementById("preview");
                        previews.src =  '..images/blog/img-01.jpg';
                        toastr.success(response.message);
                    } else {
                        $("#formadd")[0].reset();
                        $('#btnadd').val('SUBMIT!');
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