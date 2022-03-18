<table class="table table-xxs table-hover datatable-basircf">
  <thead>
    <tr>
      <th>No.</th>
      <th>Pay To</th>
      <th>Project/Department</th>
      <th width="5%">Active</th>
    </tr>
    </thead>
    <tbody>
    <?php   $n =1;?>
    <?php foreach ($res as $val){ ?>
    <tr>
      <th scope="row"><?php echo $n;?></th>
      <td><?php echo $val->m_name; ?></td>
      <td><?php echo $val->department_title; ?><?php echo $val->project_name; ?></td>
      <td><button class="openr<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-projectid<?php echo $n;?>="<?php echo $val->m_project; ?>" data-projectname<?php echo $n;?>="<?php echo $val->project_name; ?>" data-depid<?php echo $n;?>="<?php echo $val->m_department; ?>" data-depname<?php echo $n;?>="<?php echo $val->department_title; ?>" data-mname<?php echo $n;?>="<?php echo $val->m_name;?>" data-mid<?php echo $n;?>="<?php echo $val->m_id;?>"  data-dismiss="modal">SELECT</button></td>
    </tr>

    <script>
    $('.openr<?php echo $n;?>').click(function(){
      $('#advid').val($(this).data('mid<?php echo $n;?>'));
      $('#advname').val($(this).data('mname<?php echo $n;?>'));
       $("#venname").val('');
       $("#projectname").val($(this).data('projectname<?php echo $n;?>'));
       $("#projectid").val($(this).data('projectid<?php echo $n;?>'));
       $("#departmenttname").val($(this).data('depname<?php echo $n;?>'));
       $("#departmenttid").val($(this).data('depid<?php echo $n;?>'));
    })
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
  $('.datatable-basircf').DataTable();
</script>
