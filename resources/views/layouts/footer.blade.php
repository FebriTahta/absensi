</div>
<script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"> --}}
<script src="{{ asset('assets/plugins/jquery/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-block-ui/jqueryblockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-select2/select2.min.j') }}s" type="text/javascript"></script>
<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{ asset('webarch/js/webarch.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/chat.js') }}" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/plugins/jquery-block-ui/jqueryblockui.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-select2/select2.min.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/plugins/jquery-ricksaw-chart/js/raphael-min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ricksaw-chart/js/d3.v2.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js') }}"></script> --}}
<script src="{{ asset('assets/plugins/jquery-morris-chart/js/morris.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-slider/jquery.sidr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery-sparkline.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-flot/jquery.flot.animator.min.js') }}"></script>
<script src="{{ asset('assets/plugins/skycons/skycons.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS   -->
<script src="{{ asset('assets/plugins/bootstrap-select2/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
{{-- <script src="{{asset('assets/js/datatables.js')}}" type="text/javascript"></script> --}}
<!-- PAGE JS -->
{{-- <script src="{{ asset('assets/js/dashboard.js') }}" type="text/javascript"></script> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@yield('script')
</body>

</html>
