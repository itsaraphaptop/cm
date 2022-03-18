<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th width="10%">Inv No.</th>
      <th width="10%">Type:</th>
      <th width="35%">Project</th>
      <th width="35%">Owner</th>
      <th width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($inv as $e) {?>
    <tr>
      <td><?php echo $e->inv_no; ?></td>
      <td><span class="label label-success"><?php echo $e->inv_type; ?></apan></td>
      <td><?php echo $e->project_name; ?></td>
      <td><?php echo $e->debtor_name; ?></td>
      <td>
        <a class="sel<?php echo $i; ?> label label-info" data-dismiss="modal"> Select</a>
      </td>
    </tr>
    <script>
      $(".sel<?php echo $i; ?>").click(function(){
        $("#invno").val('<?php echo $e->inv_no; ?>');
        $("#invdate").val('<?php echo $e->inv_date; ?>');
        $("#type").val('<?php echo $e->inv_type; ?>');
        $("#duedate").val('<?php echo $e->inv_duedate; ?>');
        $("#projectname").val('<?php echo $e->project_name; ?>');
        $("#putprojectid").val('<?php echo $e->inv_project; ?>');
        $("#owner").val('<?php echo $e->debtor_name; ?>');
        $("#venderid").val('<?php echo $e->inv_owner; ?>');
        $("#period").val('<?php echo $e->inv_period; ?>');
        $("#crterm").val('<?php echo $e->inv_credit; ?>');
        $("#po").val('<?php echo $e->inv_contact; ?>');
        $("#poamt").val('<?php echo $e->inv_contactamount; ?>');
        $("#vatper").val('<?php echo $e->inv_vat; ?>');
        $("#wh").val('<?php echo $e->inv_wt; ?>');
        $("#arno").val('<?php echo $e->inv_no; ?>');
        $("#meterial").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#meterial").load('<?php echo base_url(); ?>ar/load_inv_detail/<?php echo $e->inv_no; ?>');
        $("#vat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#vat").load('<?php echo base_url(); ?>ar/load_inv_vat/<?php echo $e->inv_no; ?>');

      });
    </script>
    <?php $i++; } ?>
  </tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

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
