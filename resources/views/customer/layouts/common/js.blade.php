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
    $('#type').on('change',function(){
            var value = $(this).val();
            if (value=="Passport"){
                console.log(value);
               $('#filegroup2').hide();
            } else {
                 $('#filegroup2').show();
            }
     });
     
     $('#file1').on('change',function(e){
                //get the file name
                var fileName = e.target.files[0].name;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
     
     $('#file2').on('change',function(e){
                //get the file name
                var fileName = e.target.files[0].name;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
            
    $('#file3').on('change',function(e){
                //get the file name
                var fileName = e.target.files[0].name;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })

            
    
     
</script>

<script>
     function isFloat(evt) {
        var charCode = event.which ? event.which : event.keyCode;
        if (
          charCode != 46 &&
          charCode > 31 &&
          (charCode < 48 || charCode > 57)
        ) {
          return false;
        } else {
          //if dot sign entered more than once then don't allow to enter dot sign again. 46 is the code for dot sign
          var parts = evt.srcElement.value.split(".");
          if (parts.length > 1 && charCode == 46) {
            return false;
          }
          return true;
        }
      }
</script>