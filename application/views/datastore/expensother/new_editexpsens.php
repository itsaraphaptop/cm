<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Expens</h5>
						<div class="heading-elements">
							<a type="button" href="<?php echo base_url(); ?>data_master/new_expens" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-lg-6 col-lg-offset-1">

							<form id="formdata" action="<?php echo base_url(); ?>ap_active/setup_expensother"
							 method="post" class="form-horizontal">
								<div class="panel-body">

									<div class="row">
										<div class="form-group">
											<label class="col-lg-3 control-label">Expens Code :</label>
											<div class="col-lg-9">
												<input type="text" id="id" value="" class="form-control" name="id">
												<input type="hidden" value="new" id="flag" name="flag">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Expens Name :</label>
											<div class="col-lg-9">
												<input type="text" id="epxname" value="" class="form-control" name="epxname">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Expens Status :</label>
											<div class="col-lg-9">
												<div class="input-group">
													<select class="form-control" name="status">
														<option value="true">Active</option>
														<option value="fase">Disable </option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Cost Code :</label>
											<div class="col-lg-9">
												<div class="input-group">
													<input type="hidden" class="form-control" name="vcostcode" id="vcostcode" placeholder="" readonly="">
													<input type="text" class="form-control " name="list" id="codenamecost" placeholder="" readonly="">
													<div class="input-group-btn">
														<button type="button" data-toggle="modal" data-target="#costcode" class="modalcost btn btn-info btn-icon">
															<i class="icon-search4"></i>
														</button>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">A/C for Employee :</label>
											<div class="col-lg-9">
												<div class="input-group">
													<input type="hidden" class="form-control " name="accno1" id="accno" placeholder="" readonly="">
													<input type="text" class="form-control " name="act_name1" id="codename" placeholder="" readonly="">
													<div class="input-group-btn">
														<button type="button" data-toggle="modal" data-target="#accopen" class="accopen btn btn-info btn-icon">
															<i class="icon-search4"></i>
														</button>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">A/C for External :</label>
											<div class="col-lg-9">
												<div class="input-group">
													<input type="hidden" class="form-control" name="accno2" id="ac_code2" placeholder="" readonly="">
													<input type="text" class="form-control" name="act_name2" id="codename2" placeholder="" readonly="">
													<div class="input-group-btn">
														<button type="button" data-toggle="modal" data-target="#accopen2" class="accopen2 btn btn-info btn-icon">
															<i class="icon-search4"></i>
														</button>
													</div>
												</div>
											</div>
										</div>

										<!-- <div class="form-group">
											<label class="col-lg-3 control-label">Type :</label>
											<div class="col-lg-9">
												<select class="form-control" id="exac_type" name="exac_type" required="">
													<option value=""></option>
													<?php
                        $this->db->select('*');
                        $expense = $this->db->get('m_expense')->result();
                        foreach ($expense as $ex) { ?>
										<option value="<?php echo $ex->id; ?>">
											<?php echo $ex->expense_name; ?>
										</option>
										<?php } ?>
										</select>
									</div>
								</div> -->

						</div>
						<br>
						<div class="row">
							<div class="col-sm-offset-8 col-sm-4 ">
								<div class="form-group pull-right">
									<button type="button" id="saveepx" class="btn btn-success">
										<i class="icon-floppy-disk position-left"></i>Save</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal" id="closeacc">
										<i class="icon-close2"></i> Close</button>
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






<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">CostCode</h4>
			</div>
			<div class="modal-body">
				<div id="modal_cost"></div>
			</div>
		</div>
	</div>
</div>
<div id="accopen" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account </h5>
			</div>

			<div class="modal-body">
				<div class="loadaccchart">

				</div>
			</div>
		</div>
	</div>
</div>
<div id="accopen2" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account </h5>
			</div>

			<div class="modal-body">
				<div class="loadaccchart2">

				</div>
			</div>
		</div>
	</div>
</div>




<script>
	$(".modalcost").click(function() {
		$('#modal_cost').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#modal_cost").load(
			'<?php echo base_url(); ?>index.php/share/costcode');
	});

	$(".accopen").click(function() {
		$('.loadaccchart').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart").load('<?php echo base_url(); ?>share/accchart1');
	});
	$(".accopen2").click(function() {
		$('.loadaccchart2').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart2").load('<?php echo base_url(); ?>share/accchart2');
	});
</script>
<script>
	$("#saveepx").click(function(e) {
		if ($("#id").val() == "") {
			swal({
				title: "กรุณากรอก Expens Code !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#epxname").val() == "") {
			swal({
				title: "กรุณากรอก Expens Name !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#exac_type").val() == "") {
			var frm = $('#exac_type');
			swal({
				title: "กรุณาเลือก Type !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else {
			var frm = $('#formdata');
			swal({
				title: "Save Completed!!.",
				text: "Save Completed!!.",
				confirmButtonColor: "#66BB6A",
				type: "success"
			});
			$("#formdata").submit();
		}
	});
	$('#ma').attr('class', 'active');
	$('#ma6').attr('style', 'background-color:#dedbd8');
</script>