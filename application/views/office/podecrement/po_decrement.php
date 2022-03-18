<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">

		<!-- Highlighting rows and columns -->
		<div class="panel panel-flat">
			<div class="panel-body">
			<div class="row">
				<!-- <div class="col-xs-12 form-group">
					<div class="col-xs-2">
						<label>PR No.</label>
						<input type="text" class="form-control input-xs" id="pr_no">
					</div>
					<div class="col-xs-2">
						<label>JOB :</label>
						<input type="text" class="form-control input-xs" id="job">
					</div>
					<div class="col-xs-2">
						<label>&nbsp;</label>
						<br>
						<button class="btn btn-primary btn-xs" id="search"><i class="icon-search4"></i> ค้นหา</button>
					</div>
				</div> -->
				<div class="col-xs-12 form-group">
					<h5 class="panel-title">Purchase Order Decrement</h5>
					<table class="table table-hover" id="mytable">
						<thead>
							<tr>
								<th>PO No.</th>
								<th>Project/Department</th>
								<th>System</th>
								<th>Place</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($rows as $key => $value) {
						?>
						<tr>
							<td><a onclick="po_decrement($(this))" po_no="<?=$value['po_pono'];?>"><?=$value['po_pono'];?></a></td>
							<td><?=$value['project_name'];?></td>
							<td><?=$value['systemname'];?></td>
							<td><?=$value['po_place'];?></td>
						</tr>
						<?php
							}
						?>
						</tbody>

					</table>
					<br>
					<div id="table_po">

					</div>
				</div>
				<div class="col-xs-12 form-group" >
					<div id="detail_pr"></div>
				</div>

			</div>
			</div>
		</div>
		<!-- /content area -->
	</div>
	<!-- Content area -->
</div>
<!-- /main content -->
<script type="text/javascript">
	$("#mytable").DataTable();

	function po_decrement(e){
		var po_no = e.attr('po_no');

		$.post('<?php echo base_url(); ?>po_decrement/table_po/'+po_no, function(data, textStatus, xhr) {

		}).done(function(data) {
			$("#table_po").html(data);
		});
	}

</script>

<script type="text/javascript">
  $('#po_purchase').attr('class', 'active');
  $('#decrement_po').attr('style', 'background-color:#dedbd8');
</script>