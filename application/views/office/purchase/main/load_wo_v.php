<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th width="20%">PR No.</th>
      <th width="20%">PR Req.</th>
      <th width="10%">Status</th>
      <th width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $n = 1;foreach ($loadwo as $e) {?>
    <tr>
      <td><?php echo $e->pr_prno; ?></td>
      <td><?php echo $e->pr_reqname; ?></td>
      <td><span class="label label-success"><?php echo $e->pr_approve; ?></span></td>

      <td><a type="button" id="se<?php echo $n; ?>" class="se<?php echo $e->pr_prno; ?> label bg-teal" data-toggle="modal" data-dismiss="modal" data-target="#loadprv">Select by Item</a></td>
    </tr>

<script>
    $("#se<?php echo $n; ?>").click(function(){
      $("#load_detailpr_v").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#load_detailpr_v").load('<?php echo base_url(); ?>share/loadprdetail_wo/<?php echo $e->pr_prno; ?>/<?php echo $bd; ?>');
      $("#loadpritem").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#loadpritem").load('<?php echo base_url(); ?>share/load_pr_detail_for_wo/<?php echo $e->pr_prno; ?>/<?=$e->pr_project;?>');
      console.log('<?=$projectcode;?>');
      $("#pjunit").load('<?php echo base_url(); ?>share/load_pr_unit_detail/<?php echo $e->pr_prno; ?>/<?=$projectcode;?>');
      // $('#contactamount').val($totalamt);

      $("#prno").val("<?php echo $e->pr_prno; ?>");
      $("#pr_id_ref").val("<?php echo $e->pr_prno; ?>");
      $("#deliverydate").val("<?php echo $e->pr_delidate; ?>");
      $("#memname").val("<?php echo $e->pr_reqname; ?>");
      $("#memid").val("<?php echo $e->pr_memid; ?>");
      $("#system").val("<?php echo $e->pr_system; ?>");
      $("#sstem").html("<input type='hidden' name='system' value='<?php echo $e->pr_system; ?>'><input class='form-control' readonly value='<?php if ($e->pr_system == 1) {echo "OVERHEAD";} elseif ($e->pr_system == 2) {echo "AC";} elseif ($e->pr_system == 3) {echo "EE";} elseif ($e->pr_system == 4) {echo "SN";}?>'>");
      $("#putprojectid").val("<?php echo $e->pr_project; ?>");
      $("#projectname").val("<?php echo $e->project_name; ?>");
      $("#depid").val("<?php echo $e->pr_department; ?>");
      $("#depname").val("<?php echo $e->department_title; ?>");

      // new workorder
      $("#refprdate").val('<?=$e->pr_prdate;?>');
    });



</script>

    <?php $n++;}?>
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


