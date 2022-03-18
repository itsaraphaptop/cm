<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Edit Vender
							<p></p>
						</h6>
						<div class="heading-elements">
							<!-- <a href="<?php echo base_url(); ?>data_master/vender_list" class="btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn">
							<i class="icon-undo2"></i> Back</a> -->

							<a type="button" href="<?php echo base_url(); ?>data_master/new_vender" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
						<a class="heading-elements-toggle">
							<i class="icon-menu"></i>
						</a>
					</div>

					<div class="panel-body">
						<?php foreach ($res as $v) {
 $vencode = $v->vender_code;
 $size = $v->vender_size;
 $venstatus = $v->vender_status;
 $biz = $v->vender_name;
 $bizaddr = $v->vender_address;
 $type = $v->vender_taxtype;
 $tax = $v->vender_tax;
 $tel = $v->vender_tel;
 $fax = $v->vender_fax;
 $credit = $v->vender_credit;
 $sale = $v->vender_sale;
 $worktype = $v->vender_worktype;
 $accno = $v->accno;
 $accname= $v->accname;
 $vat = $v->vat;
 $vender_type = $v->vender_type;
 $vender_mobile = $v->vender_mobile;
 $branchtype = $v->branch_type;
 $branchname = $v->branch_name;
 $remark = $v->vender_remark;
} ?>


						<form id="fvender" action="<?php echo base_url(); ?>datastore_active/editnewvender"
						 method="post" class="form-horizontal">
							<div class="col-md-6 col-md-offset-1">

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Business Size : </label>
										<div class="col-lg-9">
											<?php if ($size=="L") {?>
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="L" checked="checked"> Large
											</label>
											<?php }else{?>
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="L"> Large
											</label>
											<?php	} ?>
											<?php if ($size=="M") {?>
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="M" checked="checked"> Middle
											</label>
											<?php }else{ ?>
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="M"> Middle
											</label>
											<?php } ?>
											<?php if ($size=="S") {?>
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="S" checked="checked"> Small
											</label>
											<?php }else{ ?>
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="S"> Small
											</label>
											<?php } ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Business Status :</label>
										<div class="col-lg-9">
											<div class="checkbox checkbox-switch">
												<label>
													<?php if ($venstatus=="on") {?>
													<input type="checkbox" name="bizstatus" data-on-color="success" data-off-color="default" data-on-text="ACTIVE" data-off-text="Blacklist"
													 class="switch" checked="checked">
													<?php }else{ ?>
													<input type="checkbox" name="bizstatus" data-on-color="success" data-off-color="default" data-on-text="ACTIVE" data-off-text="Blacklist"
													 class="switch">
													<?php } ?>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Vender Code :</label>
										<div class="col-lg-6">
											<input class="form-control" id="debcode" name="vencode" readonly value="<?php echo $vencode; ?>"
											 type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Branch :</label>
										<div class="col-lg-3">
											<select class="form-control" name="branch" id="branch">
												<!-- <option value="0">Head Office</option> -->
												  <?php if($branchtype == '0'){ ?><option value="0" selected>Head Office</option><?php } else { ?><option value="0">Head Office</option><?php }?>
												  <?php if($branchtype == '1'){ ?><option value="1" selected>Branch</option><?php } else { ?><option value="1">Branch</option><?php }?>
												<!-- <option value="1">Branch</option> -->
											</select>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control" name="txt_branch" id="txt_branch" value="<?php echo $branchname;?>">
										</div>
									</div>
								</div>
								<script>
									// $(document).ready(function(){
										if ($branchtype==0) {
											$("#txt_branch").hide();
										}else{
											$("#txt_branch").show();
										}
									// });
									$('#branch').change(function(){
										if ($("#branch").val()==0) {
											$("#txt_branch").hide();
											$("#txt_branch").val("");
										}else{
											$("#txt_branch").show();
											$("#txt_branch").val('<?php echo $branchname;?>');
										}
									});
								</script>
								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">TAX ID :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" maxlength="13" id="vtexid" value="<?php echo $tax; ?>"
											 name="vtexid" placeholder="TAX ID" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">TAX Type :</label>
										<div class="col-lg-6">
											<select class="form-control input-sm" id="vtextype" name="vtextype">
												<?php if($type == '1'){ ?>
												<option value="1" selected>ภ.ง.ด.2</option>
												<?php } else { ?>
												<option value="1">ภ.ง.ด.2</option>
												<?php }?>
												<?php if($type == '2'){ ?>
												<option value="2" selected>ภ.ง.ด.3</option>
												<?php } else { ?>
												<option value="2">ภ.ง.ด.3</option>
												<?php }?>
												<?php if($type == '3'){ ?>
												<option value="3" selected>ภ.ง.ด.53</option>
												<?php } else { ?>
												<option value="3">ภ.ง.ด.53</option>
												<?php }?>
												<?php if($type == '4'){ ?>
												<option value="4" selected>ภ.ง.ด.54</option>
												<?php } else { ?>
												<option value="4">ภ.ง.ด.54</option>
												<?php }?>
												<?php if($type == '5'){ ?>
												<option value="5" selected>ภ.ง.ด.1</option>
												<?php } else { ?>
												<option value="5">ภ.ง.ด.1</option>
												<?php }?>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Type Vender :</label>
										<div class="col-lg-6">
											<select id="selectven" name="vender_type" class="form-control">
												<option value="external" <?=( $vender_type=='external' ) ? 'selected="selected"' : ''; ?>>external</option>
												<option value="employee" <?=( $vender_type=='employee' ) ? 'selected="selected"' : ''; ?>>employee</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Vender Name :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" id="vname" value="<?php echo $biz; ?>"
											 name="vname" placeholder="Vender Name" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">VAT % :</label>
										<div class="col-lg-3">
											<input class="form-control input-sm" id="vat" name="vat" value="<?php echo $vat; ?>"
											 placeholder="VAT %" type="number">
										</div>
									</div>
								</div>

							</div>

							<div class="col-md-5">

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Account Code :</label>
										<div class="col-lg-6">
											<div class="input-group">
												<span class="input-group-btn">
													<button class="btn btn-default btn-icon" type="button">
														<i class="icon-user"></i>
													</button>
												</span>
												<input type="text" class="form-control" placeholder="" readonly name="accno" id="accno" value="<?php echo $accno; ?>">
												<div class="input-group-btn">
													<button type="button" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen">
														<i class="icon-search4"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Account Name :</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" readonly name="accountname" id="accountname" value="<?php echo $accname; ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Telephone :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" name="vtel" value="<?php echo $tel; ?>"
											 placeholder="Telephone" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Phone number: </label>
										<div class="col-lg-6">
											<input type="text" class="form-control format-phone-number" name="mobile" placeholder="Enter your phone number" value="<?php echo $vender_mobile;?>">
											<!-- <span class="help-block">(999) 999 - 9999</span> -->
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">FAX :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" name="vfax" value="<?php echo $fax; ?>"
											 placeholder="FAX" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Credit Term :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" id="vcr" name="vcr" value="<?php echo $credit; ?>"
											 placeholder="Credit Term" type="number">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Sale Contact :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" name="vsale" value="<?php echo $sale; ?>"
											 placeholder="Sale Contact" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Address :</label>
										<div class="col-lg-6">
											<textarea class="form-control input-sm" id="vaddr" name="vaddr" cols="50" rows="4" placeholder="Vender Address"><?php echo $bizaddr; ?></textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Remark :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" id="remark" name="remark" placeholder="Vender Address" value="<?=$remark;?>" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label"></label>
										<div class="col-lg-6">
											<div class="form-group">
												<button type="button" class="btn bg-success" id="svender">
													<i class="save icon-floppy-disk"></i> Save</button>
												<a href="<?php echo base_url(); ?>data_master/vender_list" class="btn btn-danger btn-sm">
													<i class="icon-close2"></i> Close</a>
											</div>
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

<div id="accopen" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account</h5>
			</div>

			<div class="modal-body">
				<div class="loadaccchart">

				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="Save" class="boxmessage btn bg-primary-600">Save</button>
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
<script>
	$(".accopen").click(function() {
		$('.loadaccchart').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart").load('<?php echo base_url(); ?>share/accchart');
	});
</script>
<script>
	$("#svender").click(function(e) {
		var cr = ($('#vcr').val());
		// if ($("#vtexid").val() == "") {
		// 	swal({
		// 		title: "กรุณากรอก TAX ID !!.",
		// 		text: "",
		// 		confirmButtonColor: "#EA1923",
		// 		type: "error"
		// 	});

		// } else 
		if ($("#vtextype").val() == "0") {
			swal({
				title: "กรุณาเลือก TAX Type !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#vbusiness").val() == "") {
			swal({
				title: "กรุณาเลือก Business !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} 
		//else if (cr !== "" && !$.isNumeric(cr)) {
		//	swal({
		//		title: "กรุณากรอก Credit Term เป็นตัวเลขเท่านั้น !!.",
		//		text: "",
		//		confirmButtonColor: "#EA1923",
		//		type: "error"
		//	});
		//} 
		else {
			var frm = $('#fvender');
			swal({
				title: "Save Completed!!.",
				text: "Save Completed!!.",
				confirmButtonColor: "#66BB6A",
				type: "success"
			});
			$("#fvender").submit();
		}
	});

	$(".switch").bootstrapSwitch();
	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});
	$('#ma').attr('class', 'active');
	$('#ma5').attr('style', 'background-color:#dedbd8');
	 $('.format-phone-number').formatter({
        pattern: '({{999}}) {{999}} - {{9999}}'
    });
</script>