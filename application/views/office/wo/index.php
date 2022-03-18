<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">WO Decrement</h5>
			<div class="heading-elements">
				<!-- <ul class="icons-list">
							<li><a data-action="collapse"></a></li>
							<li><a data-action="reload"></a></li>
				</ul> -->
			</div>
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
		</div>
		<div class="panel-body">
			<table class="table table-hover" id="myTable">
				<thead>
					<tr>
						<th>Wo No.</th>
						<th>Project</th>
						<th>System</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($rows as $key => $value) { ?>
					<tr>
						<td><a class="wo_no" wo_no="<?=$value['lo_lono'];?>"><?=$value['lo_lono'];?></a></td>
						<td><?=$value['projownername'];?></td>
						<td><?=$value['systemname'];?></td>
						<td></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<br>
			<div id="table_wo">

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#myTable').DataTable();
	$(".wo_no").click(function(event) {

		var wo_no = $(this).attr('wo_no');
		// alert(wo_no);
		// $.post('<?php echo base_url(); ?>po_decrement/table_po/'+wo_no, function() {
		$.post('<?php echo base_url(); ?>wo/table_wo/'+wo_no, function() {

		}).done(function(data) {
			$("#table_wo").html(data);
		});
	});
</script>
<script type="text/javascript">
	$('#wo').attr('class', 'active');
	$('#dec_wo').attr('style', 'background-color:#dedbd8');
</script>