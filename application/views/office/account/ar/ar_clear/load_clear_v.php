<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th width="10%">AL No.</th>
      <th width="10%">AR No.</th>
      <th width="10%">Type</th>
      <th width="35%">Project Name</th>
      <th width="35%">Owner/Customer</th>
      <th width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($cl as $e) { ?>
    <tr>
      <td><?php echo $e->vou_no; ?></td>
      <td><?php echo $e->vou_arno; ?></td>
      <td><span class="label label-success"><?php echo $e->vou_type; ?></apan></td>
      <?php 
      $dd = $this->db->query("select * from  project where project_id = '$e->vou_project' ")->result();
      foreach ($dd as $ddd) {
        $name = $ddd->project_name;
      }
      ?>
       <td><?php echo $name; ?></td>
      <?php 
      $ow_d = $this->db->query("select * from debtor where debtor_code = '$e->vou_owner'")->result();
      foreach ($ow_d as $ow_dd) {
        $ow_do = $ow_dd->debtor_name;
      }
       ?>
       <td><?php echo $ow_do; ?></td>
      <td>
        <a class="seldo<?php echo $i; ?> label label-info" data-dismiss="modal" data-projname<?php echo $i;?>="<?php echo $ddd->project_name;?>" data-projid<?php echo $i;?>="<?php echo $ddd->project_id;?>" data-owner<?php echo $i;?>="<?php echo $ddd->project_mnameth;?>" data-idowner<?php echo $i;?>="<?php echo $ddd->project_mcode;?>" data-cno<?php echo $i;?>="<?php echo $e->vou_no; ?>" data-arno<?php echo $i;?>="<?php echo $e->vou_arno; ?>"> Select</a>
      </td>

    </tr>
    <script>
        $(".seldo<?php echo $i; ?>").click(function(){
        $("#reamot").val("<?php echo $e->vou_net; ?>");
        $("#accno").val("<?php echo $e->vou_vno; ?>");
        $("#re_no").val($(this).data('cno<?php echo $i;?>'));
        $("#bankcode").val("<?php echo $e->vou_bankcode; ?>");
        $("#branchcode").val("<?php echo $e->vou_branchcode; ?>");
        $("#arno").val($(this).data('arno<?php echo $i;?>'));
        $("#artype").val("<?php echo $e->vou_type; ?>");
        $("#putprojectid").val($(this).data('projid<?php echo $i;?>'));
        $("#projectname").val($(this).data('projname<?php echo $i;?>'));
        $("#venderid").val($(this).data('idowner<?php echo $i;?>'));
        $("#owner").val($(this).data('owner<?php echo $i;?>'));
       $("#invoice").load('<?php echo base_url(); ?>index.php/ar/ret_clear/'+"<?php echo $e->vou_no;?>");
      });
    </script>
<?php $i++; } ?>
  </tbody>
</table>
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
