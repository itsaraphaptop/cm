<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Pay To</th>
<th>Account expens</th>
<th>Account Cost</th>
<th>Cost Cost</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($exp as $val){ 
	?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->expens_name; ?></td>
<td><?php echo $val->ac_code; ?></td>
<td><?php echo $val->ac_code2; ?></td>
<td><?php echo $val->costcode; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#newmatname").val("<?php echo $val->expens_name; ?>");
    $("#newmatcode").val("<?php echo $val->expens_code; ?>");
    $("#list").val("<?php echo $val->csubgroup_name; ?>");
    $("#vcostcode").val("<?php echo $val->costcode; ?>");
    $("#newmatname<?php echo $id; ?>").val("<?php echo $val->expens_name; ?>");
    $("#newmatcode<?php echo $id; ?>").val("<?php echo $val->expens_code; ?>");  
    $("#ac_code").val("<?php echo $val->ac_code; ?>");   
    $("#aaccode<?php echo $id; ?>").val("<?php echo $val->ac_code; ?>");  
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
