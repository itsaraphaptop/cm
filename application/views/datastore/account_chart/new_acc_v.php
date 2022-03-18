<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">

				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup New Account
							<p></p>
						</h6>
						<div class="heading-elements">
							<a href="<?php echo base_url(); ?>data_master/accchart_list" class="btn bg-slate  dropdown-toggl ">
								<i class="icon-undo2"></i> Back</a>
							<a type="button" href="<?php echo base_url(); ?>data_master/new_accchart" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
						<a class="heading-elements-toggle">
							<i class="icon-menu"></i>
						</a>
					</div>

					<div class="panel-body">

						<div class="row">
							<div class="col-sm-6 col-sm-offset-1">
								<form id="formsave" action="<?php echo base_url(); ?>datastore_active/addnewacc"
								 method="post" class="form-horizontal">
									<div class="panel-body">
										<div class="row">
											<div class="form-group">
												<label class="col-sm-3 control-label">Account Code :</label>
												<div class="col-sm-9">
													<input type="text" id="acc_code" name="acccode" class="form-control" placeholder="Account Code">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Account Name :</label>
												<div class="col-sm-9">
													<input type="text" name="acc_name" id="acc_name" class="form-control" placeholder="Account Name">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Account Type :</label>
												<div class="col-sm-9">
													<label class="radio-inline">
														<input type="radio" id="act_header" name="act_header" class="styled" value="H"> Header &nbsp;&nbsp;&nbsp;&nbsp;
													</label>
													<label class="radio-inline">
														<input type="radio" id="act_header" checked="checked" class="styled" name="act_header" value="D"> Deatail
													</label>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Account Status :</label>
												<div class="col-sm-9">
													<div class="checkbox checkbox-switch">
														<label>
															<input type="checkbox" name="accstatus" data-on-color="success" data-off-color="default" data-on-text="ACTIVE" data-off-text="Disable"
															 class="switch" checked="checked">
														</label>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Account Code Header :</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="hidden" class="form-control" readonly="readonly" value=" " name="actcode " id="accno ">
														<input type="text " class="form-control " readonly="readonly" value="" name="actname" id="codename">
														<div class="input-group-btn">
															<button type="button" data-toggle="modal" data-target="#openact1" class="openact1 btn btn-info">
																<i class="icon-search4"></i>
															</button>
														</div>
													</div>
													<label class="display-block text-semibold">&nbsp;</label>
													<div class="form-group">
														<button type="button" class="setnull btn btn-default btn-icon">Set Null</button>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Cost To Header :</label>
												<div class="col-sm-9">
													<div class="form-group">
														<div class="input-group">
															<input type="hidden" class="form-control" readonly="readonly" value=" " name="act_closcose " id="accno2 ">
															<input type="text " class="form-control " readonly="readonly" value="" name="act_clostname" id="codename2">
															<div class="input-group-btn">
																<button type="button" data-toggle="modal" data-target="#openact2" class="openact2  btn btn-info">
																	<i class="icon-search4"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-sm-offset-8 col-sm-4 ">
												<div class="form-group pull-right">
													<button type="button" id="save" class="save btn bg-success">
														<span class="icon-floppy-disk"></span> Save</button>
													<a id="fa_close" href="<?php echo base_url(); ?>" class="btn bg-danger">
														<i class="icon-close2"></i> Close</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

</div>


</div>
<div class="modal fade" id="openact1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Select</h4>
			</div>
			<div class="modal-body">
				<div id="openact1modal"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="openact2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Select</h4>
			</div>
			<div class="modal-body">
				<div id="openact2modal"></div>
			</div>
		</div>
	</div>
</div>
<script>
	$(".openact1").click(function() {
		$('#openact1modal').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#openact1modal").load('<?php echo base_url(); ?>share/accchart_h');
	});

	$(".openact2").click(function() {
		$('#openact2modal').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#openact2modal").load('<?php echo base_url(); ?>share/accchart_h2');
	});

	$(".setnull").click(function(e) {
		$('#accno').val("");
		$('#accname').val("");
	});
	$("#save").click(function(e) {
		if ($("#acc_code").val() == "") {
			swal({
				title: "กรุณากรอก Account Code !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#acc_name").val() == "") {
			swal({
				title: "กรุณากรอก Account Name !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#act_header").val() == "D" || $("#accno").val() == "") {
			swal({
				title: "กรุณาเลือก Account Code Header !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});

		} else {
			var frm = $('#formsave');
			frm.submit(function(ev) {
				$.ajax({
					type: frm.attr('method'),
					url: frm.attr('action'),
					data: frm.serialize(),
					success: function(data) {
						swal({
							title: "Save Completed!!.",
							text: "Save Completed!!.",
							// confirmButtonColor: "#66BB6A",
							type: "success"
						});
						setTimeout(function() {
							window.location.href =
								"<?php echo base_url(); ?>data_master/accchart_list";
						}, 500);
					}
				});
				ev.preventDefault();

			});
			$("#formsave").submit();
		}
	});
	$(".switch").bootstrapSwitch();
	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});

	$('#ma').attr('class', 'active');
	$('#ma2').attr('style', 'background-color:#dedbd8');
</script>