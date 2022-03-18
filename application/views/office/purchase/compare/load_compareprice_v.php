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
    <?php $n=1; foreach ($res as $e) {?>
    <tr>
      <td><?php echo $e->pr_prno; ?></td>
      <td><?php echo $e->useradd; ?></td>
      <td><span class="label label-success"><?php echo $e->pr_approve; ?></span></td>
      <td><a type="button" id="se<?php echo $n;?>" class="label bg-teal" name="button" data-dismiss="modal"
        data-prno<?php echo $n;?>="<?php echo $e->pr_prno; ?>" data-dates<?php echo $n;?>="<?php echo $e->pr_prdate; ?>" data-place<?php echo $n;?>="<?php echo $e->pr_deliplace; ?>"
      > Select</a></td>
    </tr>

<script>
  $("#se<?php echo $n;?>").click(function(){
    $("#prno").val($(this).data('prno<?php echo $n;?>'));
    $("#place").val($(this).data('place<?php echo $n;?>'));
    $("#docdate").val($(this).data('dates<?php echo $n;?>'));
    $("#invoice").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#invoice").load('<?php echo base_url(); ?>purchase/pritem_compare_old/'+"<?php echo $e->pr_prno; ?>");
  });
</script>
    <?php $n++; } ?>
  </tbody>
</table>
<!-- Core JS files -->
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
