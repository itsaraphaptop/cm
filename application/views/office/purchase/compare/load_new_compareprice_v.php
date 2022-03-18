<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>Doc No.</th>
      <th>PR Req.</th>
      <th>Status.</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $n=1; foreach ($res as $e) {?>
    <tr>
      <td><?php echo $e->pr_code; ?></td>
      <td><?php echo $e->pr_prno; ?></td>
      <td><?php echo $e->compare; ?></td>
      <td><a type="button" id="se<?php echo $n;?>" class="label bg-teal" name="button" data-dismiss="modal" data-no<?php echo $n;?>="<?php echo $e->pr_code;?>" data-prno<?php echo $n;?>="<?php echo $e->pr_prno; ?>" data-dates<?php echo $n;?>="<?php echo $e->pr_prdate; ?>" data-place<?php echo $n;?>="<?php echo $e->pr_place; ?>" > Select</a></td>
    </tr>

<script>
  $("#se<?php echo $n;?>").click(function(){
   
    $("#no").val($(this).data('no<?php echo $n;?>'));
    $("#prno").val($(this).data('prno<?php echo $n;?>'));
    $("#prc").html($(this).data('prno<?php echo $n;?>'));
    $("#place").val($(this).data('place<?php echo $n;?>'));
    $("#prcplace").html($(this).data('place<?php echo $n;?>'));
    $("#docdate").val($(this).data('dates<?php echo $n;?>'));
    $("#cpcodein").html($(this).data('no<?php echo $n;?>'));
    $("#venderload").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$("#venderload").load('<?php echo base_url();?>purchase/load_compare_vender_add_price/<?php echo $e->pr_code;?>');
    $("#pritem").html("<tr><td colspan='10' class='text-center'>No Data</td></tr>");
    
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
