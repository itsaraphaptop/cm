<div class="content">

	<div class="panel panel-flat">
		<div class="panel-heading">
			<h6 class="panel-title">
				<i class="icon-cog3 position-left"></i> Setup Edit Account
				<p></p>
			</h6>
			<div class="heading-elements">
				<a href="<?php echo base_url(); ?>data_master/accchart_list" class="btn bg-slate  dropdown-toggl ">
					<i class="icon-undo2"></i> Back</a>
				<a type="button" href="<?php echo base_url(); ?>/mekabase/data_master/new_accchart"
				 class="preload btn btn-info">
					<i class="icon-plus-circle2"></i> New</a>
			</div>
			<a class="heading-elements-toggle">
				<i class="icon-menu"></i>
			</a>
		</div>
		<?php foreach ($res as $k) {
									$accid = $k->act_id;
									$acccode = $k->act_code;
									$accname = $k->act_name;
									$accdebit = $k->act_debit;
									$acccredit = $k->act_credit;
									$acttype = $k->act_header;
									$act_h = $k->act_acc_h;
									$act_clost = $k->act_clost;
									$act_status = $k->act_status;
								}
		$this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$act_h);
        $aa=$this->db->get()->result();
		if ($act_h == "") {
        	$aname = "";
        }else{
		foreach ($aa as $key) {
			$aname = $key->act_name;
		}
		}

		if ($act_clost == "") {
			$aname2 = "";
		}else{
		$this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$act_clost);
        $aa2=$this->db->get()->result();
		foreach ($aa2 as $key2) {
			$aname2 = $key2->act_name;
		}

	}
	?>

		<div class="panel-body">

			<div class="row">
				<div class="col-lg-6 col-lg-offset-1">
					<form id="formsave" action="<?php echo base_url(); ?>datastore_active/editacc/<?php echo $accid; ?>"
					 method="post" class="form-horizontal">
						<div class="panel-body">
							<div class="row">
								<div class="form-group">
									<label class="col-lg-3 control-label">Account Code :</label>
									<div class="col-lg-9">
										<input class="form-control" id="acccode" name="acccode" placeholder="Account Code" type="text" value="<?php echo $acccode; ?>">
										<input class="hidden" id="accid" name="accid" type="text" value="<?php echo $accid; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Account Name :</label>
									<div class="col-lg-9">
										<input class="form-control" name="act_name" id="act_name" placeholder="Account Name" type="text" value="<?php echo $accname; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Account Type :</label>
									<div class="col-lg-9">
										<select class="form-control" id="act_header" name="act_header">
											<?php if($acttype == 'H'){ ?>
											<option value="H" selected>Header</option>
											<?php } else { ?>
											<option value="H">Header</option>
											<?php }?>
											<?php if($acttype == 'D'){ ?>
											<option value="D" selected>Detail</option>
											<?php } else { ?>
											<option value="D">Detail</option>
											<?php }?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Account Status :</label>
									<div class="col-lg-9">
										<select class="form-control" id="accstatus" name="accstatus">
											<?php if($act_status == 'on'){ ?>
											<option value="on" selected>Active</option>
											<?php } else { ?>
											<option value="on">Active</option>
											<?php }?>
											<?php if($acttype == '0'){ ?>
											<option value="0" selected>In Active</option>
											<?php } else { ?>
											<option value="0">In Active</option>
											<?php }?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Account Code Header :</label>
									<div class="col-lg-9">
										<div class="input-group">
											<input type="hidden" class="form-control" readonly="readonly" " value="<?php echo $act_h; ?>" name="actcode" id="accno">
											<input type="text" class="form-control" readonly="readonly" " value="<?php echo $act_h. " - ".$aname;
											 ?>" name="actname" id="codename">
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
									<label class="col-lg-3 control-label">Cost To Header :</label>
									<div class="col-lg-9">
										<div class="form-group">
											<div class="input-group">
												<input type="hidden" class="form-control" readonly="readonly" value="<?php echo $act_clost; ?>"
												 name="act_closcose" id="acc_no">
												<input type="text" class="form-control" readonly="readonly" value="<?php echo $act_clost. " - ".$aname2;
												 ?>" name="act_clostname" id="codename2">
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
	$(".setnull").click(function(e) {
		$('#accno').val("");
		$('#accname').val("");
	});
	$(".openact1").click(function() {
		$('#openact1modal').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#openact1modal").load('<?php echo base_url(); ?>share/accchart1');
	});

	$(".openact2").click(function() {
		$('#openact2modal').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#openact2modal").load('<?php echo base_url(); ?>share/accchart2');
	});
	$("#save").click(function(e) {
		if ($("#acccode").val() == "") {
			swal({
				title: "กรุณาเลือก Cheque  No  !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#acc_name").val() == "") {
			swal({
				title: "act_name !!.",
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