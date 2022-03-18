<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>No.</th>
      <th>Receipt No</th>
      <th>Receipt Date</th>
      <th>Project Name</th>
      <th>Vendor Name</th>
      <th>Active</th>
    </tr>
  </thead>
  <tbody>
    <?php $n=1; foreach ($pe as $key) { 
      $ven = $this->db->query("SELECT * from project where project_id = '$key->project' ")->result();      
        foreach ($ven as $pp) {
      }
    ?>
    <tr>   
    <td><?php echo $n; ?></td>
        <td><?php echo $key->docno; ?></td>
        <td><?php echo $key->docdate; ?></td>
        <td><?php echo @$pp->project_name; ?></td>
        <td><?php echo $key->vender; ?></td>
        <td>
          <button class="load_inv<?php echo $n; ?> label label-primary" data-dismiss="modal" data-projname<?php echo $n;?>="<?php echo @$pp->project_name;?>" data-crterm<?php echo $n;?>="<?php echo $key->crterm;?>" data-projid<?php echo $n;?>="<?php echo @$pp->project_id;?>" data-projcode<?php echo $n;?>="<?php echo @$pp->project_code;?>" data-docno<?php echo $n;?>="<?php echo $key->docno; ?>" data-owname<?php echo $n;?>="<?php echo $key->vender; ?>" data-owno<?php echo $n;?>="<?php echo $key->ven_id; ?>" data-date<?php echo $n;?>="<?php echo $key->docdate; ?>" data-dename<?php echo $n;?>="<?php echo $key->department_title;?>" data-deid<?php echo $n;?>="<?php echo $key->department_id;?>">Select</button>
        </td>
      <script>
      $('.load_inv<?php echo $n; ?>').click(function(){
        $("#crterm").val($(this).data('crterm<?php echo $n;?>'));
        $("#docno").val($(this).data('docno<?php echo $n;?>'));
        $("#docdate").val($(this).data('date<?php echo $n;?>'));
        $("#putprojectid").val($(this).data('projid<?php echo $n;?>'));
        $("#namepro").val($(this).data('projname<?php echo $n;?>'));
        $("#venderid").val($(this).data('owno<?php echo $n;?>'));
        $("#vendorname").val($(this).data('owname<?php echo $n;?>'));
        $("#dename").val($(this).data('dename<?php echo $n;?>'));
        $("#decode").val($(this).data('deid<?php echo $n;?>'));
        $("#type").val('Petty Cash');

        // tab GL
        $("#gllll").load('<?php echo base_url(); ?>index.php/ap_petty/load_petty_gl/'+"<?php echo $key->docno;?>/"+"<?php echo $key->project;?>");
        // tab Gl

        //tab Expense
        $("#expense").load('<?php echo base_url(); ?>index.php/ap_petty/load_petty_expense/'+"<?php echo $key->docno;?>/"+"<?php echo $key->project;?>");
        //tab Expense

        //tab Costcenter
        $("#cost_center").load('<?php echo base_url(); ?>ap_petty/load_petty_center/'+"<?php echo $key->docno; ?>/"+"<?php echo $key->project;?>");
        //tab Costcenter

        var url="<?php echo base_url(); ?>ap_active/query_job";
          var dataSet={
            procode : $(this).data('projcode<?php echo $n;?>'),
            decode : $(this).data('decode<?php echo $n;?>')
            };
        $.post(url,dataSet,function(data){
               $("#job").html(data);
        });
      });
      </script>
      <?php $n++; } ?>
    </tr>
  </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '50px',
         targets: [ 0 ]
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
