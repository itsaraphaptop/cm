<div class="table-responsive">
  <table class="table table-striped table-hover table-xxs datatable-basic">
  <thead>
    <tr>
      <th>Book Code</th>
      <th>Book Date</th>
      <th>Remark</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php foreach ($booking as $key => $value) {
    $q = $this->db->query("select project_name from project where project_id='$value->from_project'");
    $res = $q->result();
    foreach ($res as $proname) {
      $project_name = $proname->project_name;
    
    ?>
  <tr>
    <td><?php echo $value->book_code; ?></td>
    <td><?php echo $value->date_book; ?></td>
    <td><?php echo $value->remark; ?></td>
    <td><a id="select<?php echo $value->book_code; ?>" class="label label-primary" data-dismiss="modal">Select</a></td>
  </tr>
  <script>
    $("#select<?php echo $value->book_code; ?>").click(function(){
      $("#flag").val("b");
      $("#bookno").val("<?php echo $value->book_code; ?>");
      $("#bookdate").val("<?php echo $value->date_book; ?>");
      $('#projectname').val("<?php echo $proname->project_name; ?>");
      $("#putprojectid").val("<?php echo $value->from_project ?>");
      $("#depname").val("");
      $("#depid").val("");
      $('#system').val('<?php echo $value->system_book; ?>').trigger('change');
      $("#system").attr('readonly','true');
      $("#memname").val('<?php echo $value->name_book; ?>');
      $("#place").val('<?php echo $value->address_book; ?>');
      $("#c").val('<?php echo $value->remark; ?>');
      $("#body").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#body").load('<?php echo base_url(); ?>inventory/load_bookdetail/<?php echo $value->book_code; ?>/'+$("#putprojectid").val());
      $("#gll").load('<?php echo base_url(); ?>inventory/gl_bookdetail/<?php echo $value->book_code; ?>/'+$("#putprojectid").val());
      $("#bookingg").load('<?php echo base_url(); ?>inventory/load_bookdetail2/<?php echo $value->book_code; ?>/'+$("#putprojectid").val());
    });
  </script>

  <?php } } ?>
  <tbody>
  </tbody>
</table>
  </div>
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 3 ]
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

$('.datatable-basic').DataTable();
</script>
