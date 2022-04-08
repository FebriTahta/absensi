@include('page/pag_head')
@include('page/pag_navbar')
@include('page/pag_sidebar')
@include('page/pag_contentheader')
<!-- awal halaman content --->


  
  
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pegawai CV. Agus Wahyu</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            @if($data->jabatan !== null)
                            <div class="form-group col-xl-12">
                                <label for="">Nama Pegawai</label>
                                <input type="text" value="{{$data->nama}}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-xl-12">
                                <label for="">Jabatan</label>
                                <input type="text" value="{{$data->jabatan->jabatan}}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-xl-12">
                                <label for="">Gaji Pokok / jam</label>
                                <input type="text" value="@currency($data->jabatan->gajipokok)" class="form-control" readonly>
                            </div>
                            <div class="form-group col-xl-12">
                                <label for="">Tunjangan</label>
                                <input type="text" value="{{$data->jabatan->tunjangan->jenis}} @currency($data->jabatan->tunjangan->besar)" class="form-control" readonly>
                            </div>
                            @foreach($data->potongan as $tod=> $cut)
                            <div class="form-group col-xl-6">
                                <label for="">Jenis Potongan {{$tod+1}}</label>
                                <input type="text" value="{{$cut->jenis}} : @currency($cut->besar)" class="form-control" readonly>
                                
                            </div>
                            @endforeach
                            @endif
                            
                        </div>
                        
                    </div>
                </div>
                <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estimasi Gaji</h3>
                        </div>
                    <div class="card-body">

                        <div class="row">
                            @if($data->jabatan !== null)
                            <div class="form-group col-xl-6">
                                <label for="">Gaji Kotor Tiap Bulan</label>
                                <input type="text" value="@currency(($data->jabatan->gajipokok*8)*26)" class="form-control" readonly>
                            </div>
                            <div class="form-group col-xl-6">
                                <label for="">Gaji 1 Hari</label>
                                <input type="text" value="@currency($data->jabatan->gajipokok*8)" class="form-control" readonly>
                            </div>
                            @endif
                            
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-xl-12">
                                <label for="">Gaji Bersih Tiap Bulan</label>
                                @if($data->jabatan !== null)
                                <input type="text" value="@currency(((($data->jabatan->gajipokok*8)*26)+$data->jabatan->tunjangan->besar) - $data->potongan->sum('besar'))" class="form-control" readonly>
                                @endif
                            </div>
                            
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12 col-xl-12">
                                <input type="radio" id="1" name="1" value="1" onclick="myFunction2()" checked require>
                                <label for="1">Cari Data Perbulan & Tahun</label>
                            </div>
                            <div class="form-group col-12 col-xl-12">
                                <input type="radio" id="2" name="1" value="2" onclick="myFunction()" require>
                                <label for="2">Cari Data Perhari</label>
                            </div>
                            <div id="perhari" class="form-group col-xl-12 col-12 row" style="display:none">
                                <div class="form-group col-6 col-xl-6">
                                    <input type="date" class="form-control" id="dari" name="dari" required>
                                </div>
                                <div class="form-group col-6 col-xl-6">
                                    <input type="date" class="form-control" id="sampai" name="sampai" required>
                                </div>
                                <div class="form-group col-6 col-xl-6">
                                    <button class="form-control btn btn-info" id="filter">Search</button>
                                </div>
                                <div class="form-group col-6 col-xl-6">
                                    <button class="form-control btn btn-danger" id="reset">Reset</button>
                                </div>
                            </div>
                            <div id="perbulan" class="form-group col-xl-12 col-12 row">
                                <div class="form-group col-6 col-xl-6">
                                    <input type="month" class="form-control" id="dari2" name="dari2" required>
                                </div>
                                <div class="form-group col-6 col-xl-6">
                                    <input type="month" class="form-control" id="sampai2" name="sampai2" required>
                                </div>
                                <div class="form-group col-6 col-xl-6">
                                    <button class="form-control btn btn-info" id="filter2">CARI</button>
                                </div>
                                <div class="form-group col-6 col-xl-6">
                                    <button class="form-control btn btn-danger" id="reset2">ULANGI</button>
                                </div>
                            </div>
                            <!-- <div id="perbulan" class="form-group col-xl-6 col-6 row">
                                <div class="form-group col-6">
                                    <input type="month" class="form-control" id="dari" name="dari" required>
                                </div>
                                <div class="form-group col-6">
                                    <input type="month" class="form-control" id="sampai" name="sampai" required>
                                </div>
                            </div> -->
                            
                            
                        </div>
                        <form action="{{route('print')}}" method="get">@csrf
                        <div class="card-body">
                            <!-- <table id="tabel-gaji" class="table table-bordered data-table">
                                <thead style="text-transform:uppercase">
                                    <tr>
                                        <th>lembur</th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform:uppercase">
                                </tbody>
                            </table> -->
                            
                            <p id="cb" style="display:none"></p>
                            <div class="row" id="display detail">
                                <div class="form-group col-xl-3">
                                    <label for="">TOTAL JAM KERJA</label>
                                    <p id="jamkerja">-</p>
                                    <input type="hidden" name="jamkerja" id="jamkerja2" value="">
                                </div>
                                <div class="form-group col-xl-3">
                                    <label for="">TOTAL JAM LEMBUR</label>
                                    <p id="jamlembur">-</p>
                                    <input type="hidden" name="jamlembur" id="jamlembur2" value="">
                                </div>
                                <div class="form-group col-xl-3">
                                    <label for="">TOTAL POTONGAN</label>
                                    <p id="totalpotongan">-</p>
                                    <input type="hidden" name="totalpotongan" id="totalpotongan2" value="">
                                </div>
                                <div class="form-group col-xl-3">
                                    <label for="">TOTAL TUNJANGAN</label>
                                    <p id="totaltunjangan">-</p>
                                    <input type="hidden" name="totaltunjangan" id="totaltunjangan2" value="">
                                </div>
                                <div class="form-group col-xl-3">
                                    <label for="">TOTAL GAJI BERSIH</label>
                                    <p id="totalgajibersih">-</p>
                                    <input type="hidden" name="totalgajibersih" id="totalgajibersih2" value="">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="nama" value="{{$data->nama}}">
                        <input type="hidden" name="jabatan" value="{{$data->jabatan->jabatan}}">
                        <input type="hidden" name="tunjangan" value="{{$data->jabatan->tunjangan->jenis}} - @currency($data->jabatan->tunjangan->besar)">
                        <button type="submit" target="_blank" class="btn btn-primary btn-rounded"><i class="fa fa-print"></i> CETAK</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
	
	<input type="hidden" id="id" value="{{$data->id}}">
	</div>
</div>

<script>
    function myFunction() {
                document.getElementById("perhari").style.removeProperty( 'display' );
                document.getElementById("perbulan").style.display = "none";
                console.log('kelihatan');
            }
            function myFunction2() {
                document.getElementById("perhari").style.display = "none";
                document.getElementById("perbulan").style.removeProperty( 'display' );
                
                console.log('hilang');
            }
//     $(function () {
    
//     var table = $('#tabel-user').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: "{{ route('data_pegawai') }}",
//         columns: [
            
//             {data: 'nama', name: 'nama'},
//             {data: 'action', name: 'action', orderable: false, searchable: false},
//         ]
//     });
    
//   });
var id;
$(document).ready(function(){
id= $('#id').val();
})
function load_data(dari = '', sampai = '')
                {
                    // $('#tabel-gaji').DataTable({
                    //         //karena memakai yajra dan template maka di destroy dulu biar ga dobel initialization
                    //         destroy: true,
                    //         processing: true,
                    //         serverSide: true,
                    //         ajax: {
                    //             url:"/detail-gaji-pegawai/"+id,
                    //             data:{dari:dari, sampai:sampai}
                    //         },
                    //         columns: [
                                
                    //             {
                    //             data:'lembur',
                    //             name:'lembur'
                    //             },
                    //         ]
                    //     });
                    $.ajax({
                        url:"/detail-gaji-pegawai/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari:dari, sampai:sampai},
                        success:function(data) {
                            document.getElementById('cb').innerHTML = data;
                            console.log(data);
                        }
                    });
                    $.ajax({
                        url:"/total-jam-kerja/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari:dari, sampai:sampai},
                        success:function(data) {
                            document.getElementById('jamkerja').innerHTML = data;
                            document.getElementById('jamkerja2').value = data;
                            console.log(data);
                        }
                    });
                    $.ajax({
                        url:"/total-tunjangan/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari:dari, sampai:sampai},
                        success:function(data) {
                            document.getElementById('totaltunjangan').innerHTML = data;
                            document.getElementById('totaltunjangan2').value = data;
                            console.log(data);
                        }
                    });
                    $.ajax({
                        url:"/total-jam-lembur/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari:dari, sampai:sampai},
                        success:function(data) {
                            document.getElementById('jamlembur').innerHTML = data;
                            document.getElementById('jamlembur2').value = data;
                            console.log(data);
                        }
                    });
                    $.ajax({
                        url:"/total-potongan/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari:dari, sampai:sampai},
                        success:function(data) {
                            document.getElementById('totalpotongan').innerHTML = data;
                            document.getElementById('totalpotongan2').value = data;
                            console.log(data);
                        }
                    });
                    $.ajax({
                        url:"/total-gajibersih/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari:dari, sampai:sampai},
                        success:function(data) {
                            document.getElementById('totalgajibersih').innerHTML = data;
                            document.getElementById('totalgajibersih2').value = data;
                            console.log(data);
                        }
                    });
                    
                }

                function load_data2(dari2 = '', sampai2 = '')
                {
                    // $('#tabel-gaji').DataTable({
                    //         //karena memakai yajra dan template maka di destroy dulu biar ga dobel initialization
                    //         destroy: true,
                    //         processing: true,
                    //         serverSide: true,
                    //         ajax: {
                    //             url:"/detail-gaji-pegawai/"+id,
                    //             data:{dari:dari, sampai:sampai}
                    //         },
                    //         columns: [
                                
                    //             {
                    //             data:'lembur',
                    //             name:'lembur'
                    //             },
                    //         ]
                    //     });
                    $.ajax({
                        url:"/cok/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari2:dari2, sampai2:sampai2},
                        success:function(data) {
                            document.getElementById('cb').innerHTML = data;
                            // document.getElementById("bulanan").style.display = "none";
                            document.getElementById('jamkerja').innerHTML = data;
                            document.getElementById('jamkerja2').value = data;
                            console.log(data);
                        }
                    });
                    // $.ajax({
                    //     url:"/detail-gaji-pegawai2/"+id,
                    //     type: 'get',
                    //     dataType: 'json',
                    //     data:{dari2:dari2, sampai2:sampai2},
                    //     success:function(data) {
                    //         document.getElementById('cb').innerHTML = data;
                    //         console.log(data);
                    //     }
                    // });
                    $.ajax({
                        url:"/total-jam-kerja2/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari2:dari2, sampai2:sampai2},
                        success:function(data) {
                            document.getElementById('jamkerja2').innerHTML = data;
                            document.getElementById('jamkerja2').value = data;
                            console.log(data);
                        }
                    });
                    $.ajax({
                        url:"/total-jam-lembur2/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari2:dari2, sampai2:sampai2},
                        success:function(data) {
                            document.getElementById('jamlembur').innerHTML = data;
                            document.getElementById('jamlembur2').value = data;
                            console.log(data);
                        }
                    });
                    $.ajax({
                        url:"/total-potongan2/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari2:dari2, sampai2:sampai2},
                        success:function(data) {
                            document.getElementById('totalpotongan').innerHTML = data;
                            document.getElementById('totalpotongan2').value = data;
                            console.log(data);
                        }
                    });

                    $.ajax({
                        url:"/total-tunjangan2/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari2:dari2, sampai2:sampai2},
                        success:function(data) {
                            document.getElementById('totaltunjangan').innerHTML = data;
                            document.getElementById('totaltunjangan2').value = data;
                            console.log('tunjangan');
                        }
                    });
                    
                    $.ajax({
                        url:"/total-gajibersih2/"+id,
                        type: 'get',
                        dataType: 'json',
                        data:{dari2:dari2, sampai2:sampai2},
                        success:function(data) {
                            document.getElementById('totalgajibersih').innerHTML = data;
                            document.getElementById('totalgajibersih2').value = data;
                            console.log(data);
                        }
                    });
                }

                $('#filter').click(function(){
                    var dari = $('#dari').val();
                    var sampai = $('#sampai').val();
                    if(dari != '' &&  sampai != '')
                    {
                        load_data(dari, sampai);
                    }
                    else
                    {
                        alert('Both Date is required');
                    }
                });

                $('#filter2').click(function(){
                    var dari2 = $('#dari2').val();
                    var sampai2 = $('#sampai2').val();
                    if(dari2 != '' &&  sampai2 != '')
                    {
                        load_data2(dari2, sampai2);
                    }
                    else
                    {
                        alert('Both Date is required');
                    }
                });

                $('#refresh').click(function(){
                    $('#dari').val('');
                    $('#sampai').val('');
                    load_data();
                });

                $('#refresh2').click(function(){
                    $('#dari2').val('');
                    $('#sampai2').val('');
                    load_data2();
                });
</script>
<!-- Akhir halaman content --->
@include('page/page_bottom')