<div class="table-responsive">
<table class="table table-hover table-bordered table-xxs basic">
  <thead>
    <tr>
      <th>No.</th>
      <th>Invoice No</th>
      <th>Project Name</th>
      <th>Invoice Date</th>
      <th>Period</th>
      <th>Active</th>
    </tr>
  </thead>
  <tbody>
  <?php $n=1; foreach ($per as $key) {   
  ?>
    <tr>
      <td><?php echo $n; ?></td>
      <td><?php echo $key->inv_no; ?></td>
      <td><?php echo $key->project_name; ?></td>
      <td><?php echo $key->inv_date; ?></td>
      <td><?php echo $key->inv_period; ?></td>
      <td>
      <button class="load_inv<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid<?php echo $n;?>="<?php echo $key->project_code;?>" data-projname<?php echo $n;?>="<?php echo $key->project_name;?>" data-peri<?php echo $n;?>="<?php echo $key->inv_period;?>" data-dismiss="modal">เลือก</button></td>
      <script>
      $('.load_inv<?php echo $n; ?>').click(function(){
        $("#projectid").val($(this).data('projid<?php echo $n;?>'));
        $("#projectname").val($(this).data('projname<?php echo $n;?>'));
        $("#period").val($(this).data('peri<?php echo $n;?>'));
        $('#refname').val('<?php echo $key->ref_cer;?>');
        $('#invono').val('<?php echo $key->inv_no;?>');
        $("#invoicedown").load('<?php echo base_url(); ?>index.php/ar/ret_edit_invoicedown/'+"<?php echo $key->inv_no;?>/"+"<?php echo $key->inv_period;?>");
      });
      </script>
      <?php $n++; } ?>
    </tr>
  </tbody>
</table>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.basic').DataTable();
</script>
