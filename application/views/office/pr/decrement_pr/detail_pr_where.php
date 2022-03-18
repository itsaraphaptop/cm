<table class="table table-hover" id="myTable">
	<thead>
		<tr>
			<th>PR No.</th>
			<th>JOB</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rows as $key => $value) { ?>
		<tr>
			<!-- <td colspan="3"><?php //echo '<pre>';print_r($rows);?></td> -->
			<td><a class="pr_no" pr_no="<?=$value['pr_prno'];?>"><?=$value['pr_prno'];?></a></td>
			<td><?=$value['project_name'];?></td>
			<td></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$("#myTable").DataTable();
	$(".pr_no").click(function(event) {
		var _pr_no =$(this).attr('pr_no');
		// alert(_pr_no);
		$.post('<?php echo base_url(); ?>pr/pr_detail/'+_pr_no, function() {
			
		}).done(function(data){
			$("#detail_pr").html(data);
		});
	});
</script>