<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th class="text-center">Voucher No.</th>
      <th class="text-center">Voucher Date.</th>
      <th class="text-center">Referent No.</th>
      <th class="text-center">Remark :</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $n=1; foreach ($loadj as $e) {?>
    <tr>
      <td class="text-center"><?php echo $e->vchno; ?></td>
      <td class="text-center"><?php echo $e->vchdate; ?></td>
      <td class="text-center"><?php echo $e->refno; ?></td>
      <td class="text-center"><?php echo $e->remark; ?></td>
      <td class="text-center"><a type="button"  class="se<?php echo $n;?> label bg-teal" name="button" data-dismiss="modal">Select</a></td>
    </tr>

<script>
    $(".se<?php echo $n;?>").click(function(){
      $("#vchno").val("<?php echo $e->vchno; ?>");
      $("#id_vocher").val("<?php echo $e->id_vocher; ?>");
      $("#vchdate").val("<?php echo $e->vchdate; ?>");
      $("#bookcode").val("<?php echo $e->bookcode; ?>");
      $("#refno").val("<?php echo $e->refno; ?>");
      $("#refdate").val("<?php echo $e->refdate; ?>");
      $("#remark").val("<?php echo $e->remark; ?>");
      $("#bookname").val("<?php echo $e->booknamz; ?>");
      $("#chkii").val("Y");
       $("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#table").load('<?php echo base_url(); ?>gl_active/load_journaltable/'+"<?php echo $e->vchno; ?>");
    });
  </script>


    <?php $n++; } ?>
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
