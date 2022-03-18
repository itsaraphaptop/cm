<table class="table table-xxs table-hover datatable-basicxc3" >
<thead>
<tr>
<th>No.</th>
<th>Asset Code</th>
<th>Asset Name</th>
<th>Write Off Date</th>
<th>Type</th>
<th>Remark</th>
<th>Amount</th>
<th>GL</th>
<th>Voucher No</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->off_asscode; ?></td>
<td><?php echo $val->off_assname; ?></td>
<td><?php echo $val->off_date; ?></td>
<td><?php if($val->off_type=="1"){ echo "Sale"; }else if($val->off_type=="2"){ echo "Expired"; }else if($val->off_type=="3"){ echo "Loss"; } ?></td>
<td><?php echo $val->off_remark; ?></td>
<td><?php echo $val->off_netam; ?></td>
<td></td>
<td></td>
<td><a class="opendeptoriw<?php echo $n;?> btn btn-xs btn-block btn-primary" data-dismiss="modal">SELECT</a></td>
</tr>
<script>
  $(".opendeptoriw<?php echo $n;?>").click(function(event) {
  	$('#deprec').val("");
  	$('#writeoff_h').load('<?php echo base_url(); ?>index.php/share/list_writeoff/<?php echo $val->off_code; ?>');
  	$('#table').load('<?php echo base_url(); ?>index.php/share/modal_list_writeoff/<?php echo $val->off_code; ?>');
  	$('#typei').val("FW");
  	$('#woff').val("<?php echo $val->off_code; ?>");
  });
</script>
<?php $n++; } ?>
</tbody>
</table>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc3").DataTable();
</script>