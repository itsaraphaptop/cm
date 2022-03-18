<table class="table table-hover table-bordered table-xxs basic">
  <thead>
    <tr>
      <th>No.</th>
      <th>Receipt No</th>
      <th>Receipt Date</th>
      <th>Project Name</th>
      <th>Amount</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php $n=1; foreach ($re as $key) { 
  $pp = $this->db->query("SELECT * from project where project_id= '$key->vou_project' ")->result();
  foreach ($pp as $pro) {
    $proname = $pro->project_name;
    }  
  ?>
    <tr>
      <td><?php echo $n; ?></td>
      <td><?php echo $key->vou_no; ?></td>
      <td><?php echo $key->vou_date; ?></td>
      <td><?php echo $proname; ?></td>
      <td><?php echo $key->vou_net; ?></td>
      <td>
      <button class="load_inv<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal"  data-projid<?php echo $n;?>="<?php echo $key->vou_project;?>" data-no<?php echo $n;?>="<?php echo $key->vou_no;?>" data-amt<?php echo $n;?>="<?php echo $key->vou_net;?>" data-date<?php echo $n;?>="<?php echo $key->vou_date;?>" data-dismiss="modal" >Select</button></td>
      <?php 
      $pro = $this->db->query("SELECT * from project where project_id = '$key->vou_project'")->result();
      foreach ($pro as $pp) {
      $proname = $pp->project_name;
      $owname = $pp->project_mnameth;
      $owcode = $pp->project_mcode;
      }
       ?>
      <script>
      $('.load_inv<?php echo $n; ?>').click(function(){
        $("#putprojectid").val($(this).data('projid<?php echo $n;?>'));
        $("#projectname").val("<?php echo $proname; ?>");
        $("#re_no").val($(this).data('no<?php echo $n;?>'));
        $("#reamot").val($(this).data('amt<?php echo $n;?>'));
        $("#owner").val("<?php echo $owname; ?>");
        $("#vou_no").val("<?php echo $key->vou_arno; ?>");
        $("#artype").val("<?php echo $key->vou_type; ?>");
        $("#ardate").val($(this).data('date<?php echo $n;?>'));
        $("#venderid").val("<?php echo $owcode; ?>");
        
        $("#invoice").load('<?php echo base_url(); ?>index.php/ar/ret_receiving/'+"<?php echo $key->vou_no;?>",function(){
            hide_receiving_zero();        
        });
        $("#paird").load('<?php echo base_url(); ?>index.php/ar/ret_paird/'+"<?php echo $key->vou_net;?>");

      });
      </script>
      <?php $n++; } ?>
    </tr>
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


  function hide_receiving_zero(){
    
   
        $("[name='vouamt[]']").each(function(index, el) {
             var value_amt = $(el).val()*1;
              // console.log(index);
              if(value_amt==0){
                $(el).parent().parent().hide();
              }
        });
 
  }
</script>
