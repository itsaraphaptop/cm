<div class="content">
	<!-- /info alert -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h6 class="panel-title">
				<i class="icon-cog3 position-left"></i> Setup Bank
				<p></p>
			</h6>
			<div class="heading-elements">
				<button type="button" id="btn_new_bank" class=" btn btn-info">
					<i class="icon-plus-circle2"></i> New Bank</button>
			</div>
		</div>

		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-xxs table-hover datatable-basic" id="bank_table">
					<thead>
						<tr>
							<td>#</td>
							<td>Bank Code</td>
							<td>Bank Name</td>
							<td>Bank Code Standard</td>
							<td>action</td>
						</tr>
					</thead>
					<tbody>

						<?php 
							
							?>
						<?php foreach ($array_bank as $key => $value){ 
							?>
						<tr>

							<td>
								<?=$key+1?>
							</td>
							<td>
								<?=$value["code_bank"]?>
							</td>
							<td>
								<?=$value["name_th"]?>
							</td>
							<td>
								<?=$value["code_standard"]?>
							</td>
							<td>
								<button class="edit_bank btn btn-link" item-id="<?=$value['id']?>" th-name='<?=$value["name_th"]?>'
								 b-code='<?=$value["code_bank"]?>' b-stan='<?=$value["code_standard"]?>'>
									<i class="icon-pencil7"></i>
								</button>
								<button class="del_bank btn btn-link" item-id="<?=$value['id']?>">
									<i class="icon-trash"></i>
								</button>
							</td>

						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- href="
<?=base_url()?>
/data_master/edit_bank_mester_action/
<?=$value['id']?>
-->"

<!-- new bank -->
<div id="add_bank" class="modal fade" data-backdrop="false">
	<div class="modal-dialog">
		<form action="<?=base_url()?>data_master/add_bank_mester_action" method="post">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">New Bank</h5>
				</div>
				<div class="modal-body">
					<div id="n_bank">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Bank Code</label>
									<input type="text" name="code_bank" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Bank Name</label>
									<input type="text" name="name_bank_th" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Bank Code Standard</label>
									<input type="text" name="code_standard" class="form-control">
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
<!-- new bank -->

<!-- edit bank -->
<div id="edit_bank" class="modal fade" data-backdrop="false">
	<div class="modal-dialog">
		<form action="<?=base_url()?>data_master/edit_bank_mester_action" method="post">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Edit Bank</h5>
				</div>
				<div class="modal-body">
					<div id="n_bank">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Bank Code</label>
									<input type="text" id="code_bank" name="code_bank" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Bank Name</label>
									<input type="text" id="name_bank_th" name="name_bank_th" class="form-control">
									<input type="hidden" id="row_id" name="id" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Bank Code Standard</label>
									<input type="text" id="code_standard" name="code_standard" class="form-control">
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
<!-- edit bank -->




<script type="text/javascript">
	// $(function(){
	$("#bank_table").DataTable();
	// })

	// $(document).ready(function() {
		$("#btn_new_bank").click(function() {
			$("#add_bank").modal("show");
		});
		$(".del_bank").click(function() {
			var iddel = $(this).attr('item-id');
			swal({
					title: "ลบข้อมูล?",
					text: "คุณตองการลบใช่หรือไม่ ?",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "ยืนยันการลบ !",
					closeOnConfirm: false
				},
				function() {
					$.post('<?=base_url();?>data_master/del_bank_master', {
						iddel: iddel
					}, function() {
						// console.log(data)
					}).done(function(data) {
						var res = jQuery.parseJSON(data);
						swal('ลบเรียบร้อย', res.mes, 'success');
						location.reload();
					});
					// alert(iddel)
					// swal("Deleted!", "Your imaginary file has been deleted.", "success");
				});

		});
		$(".edit_bank").click(function() {
			var id_row = $(this).attr("item-id");
			var nameTH = $(this).attr("th-name");
			var codeB = $(this).attr("b-code");
			var codeStan = $(this).attr("b-stan");
			//alert(id_row+" "+nameTH+" "+nameEN);

			$("#row_id").val(id_row);
			$("#name_bank_th").val(nameTH);
			$("#code_bank").val(codeB);
			$("#code_standard").val(codeStan);

			$("#edit_bank").modal("show");


		});
	// });
</script>