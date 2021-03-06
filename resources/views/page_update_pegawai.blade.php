@include('page/pag_head')
@include('page/pag_navbar')
@include('page/pag_sidebar')
@include('page/pag_contentheader')

<!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Input Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="/updateitempegawai">
				 {{ csrf_field() }}
                <div class="card-body">
				  <div class="form-group">
                    <label for="idpegawai">ID.Pegawai </label>
                    <input 
						type="text" 
						class="form-control" 
						id="idpegawai" 
						placeholder="ID Pegawai"
						autocomplete="off"
						name="id"
						value="{{ $users->id }}"
					readonly>
                  </div>
                  <div class="form-group">
                    <label for="namauser">Nama </label>
                    <input 
						type="text" 
						class="form-control" 
						id="namauser" 
						placeholder="Nama Pegawai"
						autocomplete="off"
						name="nama"
						value="{{ $users->nama }}"
					>
                  </div>
				  <div class="form-group">
					<label>Date Awal:</label>
					<div class="input-group date" id="dateawal" data-target-input="nearest">
						<input 
							type="text" 
							class="form-control datetimepicker-input" 
							data-target="#dateawal" 
							id="tgl-awal"
							name="tgl"
							value="{{ $users->tgl }}"
						>
								<div class="input-group-append" data-target="#dateawal" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
					</div>
				  </div>
				  <div class="form-group">
                    <label for="alamatuser">Tempat Lahir </label>
                    <input 
						type="text" 
						class="form-control" 
						id="alamatuser" 
						placeholder="Tempat Lahir"
						autocomplete="off"
						name="ttl"
						value="{{ $users->ttl }}"
					>
                  </div>
				  <div class="form-group">
                        <label>Jabatan Pegawai</label>
                        <select 
							class="custom-select"
							name="idjabatan"
						required>
						  <option 
									data-select2-id="31" 
									value="{{$users->jabatan->id}}"
								>{{$users->jabatan->jabatan}}</option>
                          @foreach ($jabatan as $index => $jabatan_item)
								<option 
									data-select2-id="31" 
									value="{{ $jabatan_item->id }}"
								>{{ $jabatan_item->jabatan }}</option>
							@endforeach
                        </select>
                   </div>

				   @foreach($users->potongan as $pot)
				   <div class="form-group">
                        <label>Potongan Pegawai</label>
                        <!-- <select 
							class="custom-select"
							name="idjabatan"
						required>
                          @foreach ($potongan as $index => $jabatan_item)
								<option 
									data-select2-id="31" 
									value="{{ $jabatan_item->id }}"
								>{{ $jabatan_item->jenis }}</option>
							@endforeach
                        </select> -->
						<select name="potongan_id" class="form-control" id="">
							<option value="{{$pot->id}}">{{$pot->jenis}}</option>
							@foreach ($potongan as $index => $jabatan_item)
							<option value="{{$jabatan_item->id}}">{{ $jabatan_item->jenis }}</option>
							@endforeach
						</select>
                   </div>
				   @endforeach

				  <div class="form-group">
                    <label for="alamatuser">Alamat </label>
                    <input 
						type="text" 
						class="form-control" 
						id="alamatuser" 
						placeholder="Alamat Pegawai"
						autocomplete="off"
						name="alamat"
						value="{{ $users->alamat }}"
					>
                  </div>
                  <div class="form-group">
                    <label for="notelp">Telp</label>
                    <input 
						type="number" 
						class="form-control" 
						id="notelp" 
						placeholder="0"
						autocomplete="off"
						name="telp"
						value="{{ $users->telp }}"
					>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
		</div>
	</div>
</div>




<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('template/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Page specific script -->
<!-- DataTables  & Plugins -->
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>



<script>
try{
	$('#dateawal').datetimepicker({
			format: 'YYYY-MM-DD'
	});
}catch(e){
	alert(e);
}
</script>
<!-- Akhir halaman content --->
@include('page/page_bottom')