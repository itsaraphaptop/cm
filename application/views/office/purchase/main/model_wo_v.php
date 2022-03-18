<div id="v_pr" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">ใบขอซื้อ</h4>
			</div>
			<div class="modal-body">
				<table class="table cell-border">
					<thead>
						<tr>
							<th width="80%">No.PR</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="pr_vv">
				<?php
					foreach ($data as $key => $value) {
						
						
				?>
					<tr>
						<td><?= $value['pr_prno'] ?></td>
						<td style="text-align: center;"><a href="<?php echo base_url(); ?>pr/openpr/<?= $value['pr_prno'] ?>" ><i class="icon-folder-open"></i></a></td>
					</tr>
				<?php
					}
				?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!-- <script type="text/javascript">
$(document).ready(function() {
    $('.cell-border').DataTable();
} );
</script> -->