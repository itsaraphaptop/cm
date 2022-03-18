<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Location Code</th>
<th>Location Name</th>
<th>Remark</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->location_code; ?></td>
<td><?php echo $val->location_name; ?></td>
<td><?php echo $val->location_remark; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#fa_locationid").val("<?php echo $val->location_code; ?>");
  	$("#fa_locationname").val("<?php echo $val->location_name; ?>");

  	$("#transfer_locode<?php echo $id; ?>").val("<?php echo $val->location_code; ?>");
  	$("#transfer_loname<?php echo $id; ?>").val("<?php echo $val->location_name; ?>");
  });


</script>
<?php $n++; } ?>
</tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc").DataTable();
</script>
