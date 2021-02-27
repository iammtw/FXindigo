<script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ url('js/sb-admin-2.min.js') }}"></script>
<script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('js/demo/datatables-demo.js') }}"></script>

<script>
     $('#file1').on('change',function(e){
                //get the file name
                var fileName = e.target.files[0].name;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
</script>