<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<!-- /info alert -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Paid
							<p></p>
						</h5>
						<div class="heading-elements">
							<button type="button" id="btn_new_paid" class=" btn btn-info">
								<i class="icon-plus-circle2"></i> New Paid</button>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-xxs table-hover datatable-basic" id="paid_table">
								<thead>
									<tr>
										<th width="20%">#</th>
										<th>Paid Name</th>
										<th width="20%">action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($array_paid as $key => $value): ?>
									<tr>
										<td>
											<?=$key+1?>
										</td>
										<td>
											<?=$value["name"]?>
										</td>
										<td>
											<a class="edit_paid" item-id="<?=$value['id']?>" paid-name='<?=$value["name"]?>'>
												<i class="icon-pencil7"></i>
											</a>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- add  -->
<div id="add_paid" class="modal fade" data-backdrop="false">
	<div class="modal-dialog">
		<form action="<?=base_url()?>data_master/add_paid_mester_action" method="post">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">New Paid</h5>
				</div>
				<div class="modal-body">
					<div id="n_paid">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Name Paid</label>
									<input type="text" name="name" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="margin-top:10px;">
					<button type="submit" class="btn btn-primary">
						<i class="icon-floppy-disk"></i> Save</button>
					<a id="fa_close" data-dismiss="modal" class="btn bg-danger">
						<i class="icon-close2"></i> Close</a>

				</div>
			</div>
		</form>
	</div>
</div>
<!-- add -->

<!-- edit -->
<div id="edit_paid" class="modal fade" data-backdrop="false">
	<div class="modal-dialog">
		<form action="<?=base_url()?>data_master/edit_paid_mester_action" method="post">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">New Paid</h5>
				</div>
				<div class="modal-body">
					<div id="n_paid">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Name Paid</label>
									<input type="text" id="name" name="name" class="form-control">
									<input type="hidden" id="item-id" name="id" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="margin-top:10px;">
					<button type="submit" class="btn btn-primary">
						<i class="icon-floppy-disk"></i> Save</button>
					<a id="fa_close" data-dismiss="modal" class="btn bg-danger">
						<i class="icon-close2"></i> Close</a>

				</div>
			</div>
		</form>
	</div>
</div>

<!-- edit -->


<script type="text/javascript">
	$("#btn_new_paid").click(function(event) {
		$("#add_paid").modal("show");
	});


	$(".edit_paid").click(function() {
		var item_id = $(this).attr("item-id");
		var name = $(this).attr('paid-name');

		$("#name").val(name);
		$("#item-id").val(item_id);
		$("#edit_paid").modal("show");
	});
</script>