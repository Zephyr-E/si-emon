<script src="{{ url('templates/backend') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ url('templates/backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('templates/backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Select2 -->
<script src="{{ url('templates/backend') }}/select2/dist/js/select2.min.js"></script>
<!-- Bootstrap Datepicker -->
<script src="{{ url('templates/backend') }}/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('templates/backend') }}/js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="{{ url('templates/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('templates/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

    // Select2 Single  with Placeholder
    $('.selectpicker').select2({
      placeholder: "Select a Province",
      allowClear: true
    });   

    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        todayBtn: 'linked',
        todayHighlight: true,
        autoclose: true,        
    });
</script>