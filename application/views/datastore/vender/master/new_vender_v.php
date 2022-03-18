<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> New Vender / SubContractor</h5>
					</div>

					<div class="panel-body">
						<form id="fvender" action="<?php echo base_url(); ?>datastore_active/addnewvender"
						 method="post" class="form-horizontal">
							<div class="col-md-6 col-md-offset-1">

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Business Size : </label>
										<div class="col-lg-9">
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="L"> Large
											</label>
											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="M" checked="checked"> Middle
											</label>

											<label class="radio-inline">
												<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="S"> Small
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Business Status :</label>
										<div class="col-lg-9">
											<div class="checkbox checkbox-switch">
												<label>
													<input type="checkbox" name="bizstatus" data-on-color="success" data-off-color="default" data-on-text="ACTIVE" data-off-text="Blacklist"
													 class="switch" checked="checked">
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Vender Code :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" id="vencode" name="debcode" readonly placeholder="Vender Code" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">TAX ID :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" maxlength="13" id="vtexid" name="vtexid" placeholder="TAX ID" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Branch :</label>
										<div class="col-lg-3">
											<select class="form-control" name="branch" id="branch">
												<option value="0">Head Office</option>
												<option value="1">Branch</option>
											</select>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control" name="txt_branch" id="txt_branch">
										</div>
									</div>
								</div>
								<script>
									// $(document).ready(function(){
										$("#txt_branch").hide();
									// });
									$('#branch').change(function(){
										if ($("#branch").val()==1) {
											$("#txt_branch").hide();
										}else{
											$("#txt_branch").show();
										}
									});
								</script>
								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">TAX Type :</label>
										<div class="col-lg-6">
											<select class="form-control input-sm" id="vtextype" name="vtextype">
												<option value="0"></option>
												<option value="3">ภ.ง.ด.53</option>
												<option value="1">ภ.ง.ด.2</option>
												<option value="2">ภ.ง.ด.3</option>
												<option value="4">ภ.ง.ด.54</option>
												<option value="5">ภ.ง.ด.1</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Type Vender :</label>
										<div class="col-lg-6">
											<select id="selectven" name="vender_type" class="form-control">
												<option value="external">external</option>
												<option value="employee">employee</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Vender Name :</label>
										<div class="col-lg-6">
										<div class="input-group">
											<input class="form-control input-sm" id="vname" name="vname" placeholder="Vender Name" type="text">
											<input type="text" class="form-control" placeholder="Vender Name" readonly value="" name="mname" id="mname">
											<input type="hidden" name="memid" id="memid" value="">
											<div class="input-group-btn">
												<button type="button" class="openemp btn btn-default btn-icon" data-toggle="modal" data-target="#open">
													<i class="icon-search4"></i>
												</button>
											</div>
										</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">VAT % :</label>
										<div class="col-lg-3">
											<input class="form-control input-sm" id="vat" name="vat" placeholder="VAT %" type="number">
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
												<input type="text" class="form-control" placeholder="" readonly name="accno" id="accno">
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
											<input type="text" class="form-control" readonly name="accountname" id="accountname">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Telephone :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" name="vtel" placeholder="Telephone" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Phone number: </label>
										<div class="col-lg-6">
											<input type="text" class="form-control format-phone-number" name="mobile" placeholder="Enter your phone number">
											<!-- <span class="help-block">(999) 999 - 9999</span> -->
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">FAX :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" name="vfax" placeholder="FAX" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Credit Term :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" id="vcr" name="vcr" placeholder="Credit Term" type="number">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Sale Contact :</label>
										<div class="col-lg-6">
											<input class="form-control input-sm" name="vsale" placeholder="Sale Contact" type="text">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Address :</label>
										<div class="col-lg-6">
											<textarea class="form-control input-sm" id="vaddr" name="vaddr" cols="50" rows="4" placeholder="Vender Address"></textarea>
											
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<label class="col-lg-3 control-label">Remark :</label>
										<div class="col-lg-6">
											<!-- <textarea class="form-control input-sm" id="vaddr" name="vaddr" cols="50" rows="4" placeholder="Vender Address"></textarea> -->
											<input class="form-control input-sm" id="remark" name="remark" placeholder="Remark"/>
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
												<a id="fa_close" href="<?php echo base_url(); ?>data_master/vender_list" class="btn bg-danger">
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
				<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row">
						<div>
							<table class="table table-xxs table-hover datatable-basirc">
								<thead>
									<tr>
										<th>No.</th>
										<th>ชื่อ</th>
										<th>แผนก/โครงการ</th>
										<th width="5%">จัดการ</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;?>
									<?php foreach ( $mem as $val ) {?>
									<tr>
										<th scope="row">
											<?php echo $n; ?>
										</th>
										<td>
											<?php echo $val->m_name; ?>
										</td>
										<td>
											<?php echo $val->department_title; ?>
											<?php echo $val->project_name; ?>
										</td>
										<td>
											<button class="openr<?php echo $n; ?> btn btn-xs btn-block btn-info" data-toggle="modal"
											 data-mname<?php echo $n; ?>="<?php echo $val->m_name; ?>" data-mid<?php echo $n; ?>="<?php echo $val->m_id; ?>" data-dismiss="modal">เลือก</button>
										</td>
									</tr>

									<script>
										$('.openr<?php echo $n; ?>').click(function() {
											$('#memid').val($(this).data('mid<?php echo $n; ?>'));
											$('#mname').val($(this).data('mname<?php echo $n; ?>'));

										})
									</script>

									<?php $n++;}?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#mname").hide();
	$(".openemp").hide();
	$("#selectven").change(function() {
		var select = ($('#selectven').val());
		if (select == "external") {
			$(".openemp").hide();
			$("#vname").show();
			$("#mname").hide();
		} else {
			$(".openemp").show();
			$("#vname").hide();
			$("#mname").show();
		}
	});
	$(".accopen").click(function() {
		$('.loadaccchart').html(
			"<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading..."
		);
		$(".loadaccchart").load('<?php echo base_url(); ?>share/accchart1');
	});


	$("#svender").click(function(e) {
		if ($("#vtexid").val() == "") {
			swal({
				title: "กรุณากรอก TAX ID !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});

		} else if ($("#vtextype").val() == "0") {
			swal({
				title: "กรุณาเลือก TAX Type !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});

		} else if ($("#vcr").val() == "") {
			swal({
				title: "กรุณากรอก Credit Term !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else {
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
</script>


<script>
	$(".switch").bootstrapSwitch();
	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});
</script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/inputs/formatter.min.js"></script> -->

<!-- /core JS files -->
<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '100px',
			targets: [3]
		}],
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		language: {
			search: '<span>Filter:</span> _INPUT_',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: {
				'first': 'First',
				'last': 'Last',
				'next': '&rarr;',
				'previous': '&larr;'
			}
		},
		drawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
		},
		preDrawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
		}
	});
	$('.datatable-basirc').DataTable();
	$('#ma').attr('class', 'active');
	$('#ma5').attr('style', 'background-color:#dedbd8');
	 $('.format-phone-number').formatter({
        pattern: '({{999}}) {{999}} - {{9999}}'
    });
</script>