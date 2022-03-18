<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Edit Expens</h6>
						<div class="heading-elements">
							<a type="button" href="<?php echo base_url(); ?>data_master/new_expens" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>

					</div>

					<?php 
foreach ($res as $k) {
    $expens_code = $k->expens_code;
    $expens_name = $k->expens_name;
    $acttype = $k->active;
    $costcode = $k->costcode;
    $costname = $k->costname;
    $ac_name = $k->ac_name;
    $ac_name2 = $k->ac_name2;
    $ac_code = $k->ac_code;
    $ac_code2 = $k->ac_code2;
    $type = $k->type;
}
 ?>

					<div class="panel-body">
						<div class="col-lg-6 col-lg-offset-1">

							<form id="formdata" action="<?php echo base_url(); ?>ap_active/setup_expensother"
							 method="post" class="form-horizontal">
								<div class="panel-body">

									<div class="row">
										<div class="form-group">
											<label class="col-lg-3 control-label">Expens Code :</label>
											<div class="col-lg-9">
												<input type="text" id="id" value="<?php echo $expens_code; ?>" class="form-control"
												 name="id">
												<input type="hidden" value="edit" id="flag" name="flag">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Expens Name :</label>
											<div class="col-lg-9">
												<input type="text" id="epxname" value="<?php echo $expens_name; ?>" class="form-control"
												 name="epxname">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Expens Status :</label>
											<div class="col-lg-9">
												<div class="input-group">
													<select class="form-control" name="status">
														<?php if($acttype == 'true'){ ?>
														<option value="true" selected>Active</option>
														<?php } else { ?>
														<option value="true">Active</option>
														<?php }?>
														<?php if($acttype == 'fase'){ ?>
														<option value="fase" selected>Disable</option>
														<?php } else { ?>
														<option value="fase">Disable</option>
														<?php }?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Cost Code :</label>
											<div class="col-lg-9">
												<div class="input-group">
													<input type="hidden" value="<?php echo $costcode; ?>" class="form-control" name="vcostcode"
													 id="vcostcode" placeholder="" readonly="">
													<input type="text" value="<?php echo $costname; ?>" class="form-control" name="list"
													 id="codenamecost" placeholder="" readonly="">
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
													<input type="text" value="<?php echo $ac_code; ?>" class="form-control" name="accno1"
													 id="accno" placeholder="" readonly="">
													<input type="hidden" value="<?php echo $ac_name; ?>" class="form-control" name="act_name1"
													 id="codename" placeholder="" readonly="">
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
													<input type="text" value="<?php echo $ac_code2; ?>" class="form-control" name="accno2"
													 id="ac_code2" placeholder="" readonly="">
													<input type="hidden" value="<?php echo $ac_name2; ?>" class="form-control" name="act_name2"
													 id="codename2" placeholder="" readonly="">
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
									<a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>index.php/data_master/expensother">
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





<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
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
			<div class="modal-footer">
				<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
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
			<div class="modal-footer">
				<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
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