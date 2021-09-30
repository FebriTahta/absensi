@include('page/pag_head')
@include('page/pag_navbar')
@include('page/pag_sidebar')
@include('page/pag_contentheader')
<!-- awal halaman content --->

  <!-- daterange picker -->
  <link rel="stylesheet" href="template/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  
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
                    <table id="tabel-user" class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-transform:uppercase">
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
	
	
	</div>
</div>


<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="template/plugins/moment/moment.min.js"></script>
<script src="template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Page specific script -->
<!-- DataTables  & Plugins -->
<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="template/plugins/jszip/jszip.min.js"></script>
<script src="template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
    
    var table = $('#tabel-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('data_pegawai') }}",
        columns: [
            
            {data: 'nama', name: 'nama'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
<!-- Akhir halaman content --->
@include('page/page_bottom')