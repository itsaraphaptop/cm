<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Ref. Name</th>
<th>Type</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $val->project_id;?></th>
<td><?php echo $val->project_name; ?></td>
<td><span class="label label-success">project</apan></td>
<td><button class="opensubc<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opensubc<?php echo $n;?>").click(function(event) {
   
    $("#memname").val("<?php echo $val->project_id; ?>");
    $("#memid").val("<?php echo $val->project_id; ?>");
  });


</script>
<?php $n++; } ?>
<?php   $n2 =$n;?>
<?php foreach ($dep as $val){ ?>
<tr>
<th scope="row"><?php echo $val->department_code;?></th>
<td><?php echo $val->department_title; ?></td>
<td><span class="label label-success">department</apan></td>
<td><button class="opensubc<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opensubc<?php echo $n2;?>").click(function(event) {
   
    $("#memname").val("<?php echo $val->department_code; ?>");
    $("#memid").val("<?php echo $val->department_title; ?>");
  });


</script>
<?php $n2++; } ?>
</tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>

  $('.datatable-basicxc').DataTable();
</script>