<?php foreach ($getproj as $value) {
$acc_secondary = $value->acc_secondary;
$act_name = $value->act_name;
}
?>
<!-- Main content  trans-->
			<div class="content-wrapper">


				<!-- Content area -->
				<div class="content">



					<!-- Highlighting rows and columns -->
					<form id="formpost" class="form-horizontal" action="<?php echo base_url(); ?>inventory_active/save_transfer" method="post">
						<div class="panel panel-flat">
								<div class="panel-heading">
									<div class="col-lg-10">
										<h5 class="panel-title">Transfer</h5>
									</div>
									<div class="col-lg-2 pull-right">
										<button type="button" class="show_ic btn bg-teal-400 btn-labeled" data-toggle="modal" data-target="#show_list"><b><i class="icon-plus-circle2"></i></b>Select</button>
									</div>
								</div><br/>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
												<div class="form-group">
												<label class="col-lg-3 control-label">Transfor Code:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="trcode" name="trcode" placeholder="Transfer Code AutoRun" readonly="readonly" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">From Project</label>
												<div class="col-lg-9">
													<select class="select-menu2-color" id="fromproject" name="fromproject">
														<?php foreach ($getproj as $value) {?>
															<option value="<?php echo $value->project_id; ?>"><?php echo $value->project_name; ?></option>
													<?php	} ?>

													</select>
													<input type="hidden"   name="ac_cr_code" value="<?php echo $acc_secondary; ?>">
													<input type="hidden"   name="ac_cr_name" value="<?php echo $act_name; ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Requestor:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" readonly="readonly" id="name" name="name" value="<?php echo $name; ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Remark:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" id="remark" name="remark" placeholder="Enter your message here"></textarea>
												</div>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
															<div class="form-group">
																<label class="col-lg-3 control-label">Transfer Date: </label>
																<div class="col-lg-9">
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																	<input type="text" class="form-control daterange-single" id="trdate" name="trdate">
																</div>
															</div>
															</div>

															<div class="form-group">
																<label class="col-lg-3 control-label">To Project</label>
																<div class="col-lg-9">
																	<select class="select-menu2-color" id="toproject">
																		<option value="" id="now_project" ></option>
																		<?php foreach ($getprojall as $value) {
																			$tpp = $value->project_id;
																			$ass = $value->project_maddress;
																			?>
																		
																			<option value="<?php echo $value->project_id?>"><?php echo $value->project_name; ?></option>
																			
																	<?php	} ?>
																	</select>

															
																</div>
															</div>
															<input type="hidden"  id="ac_dr_code" name="ac_dr_code" >
															<input type="hidden"  id="ac_dr_name" name="ac_dr_name" >
															<input type="hidden" name="toproject" id="ckktoproject" value="">
	
													
											<div class="form-group">
												<label class="col-lg-3 control-label">Address:</label>
												<div class="col-lg-9">
													<div id="palcei"><input type="text" placeholder="Enter your message here" value="<?php echo @$ass; ?>" id="place" name="place" class="form-control"></div>
												</div>
											</div>
											<script>
															$("#toproject").change(function(){
															var project = $("#toproject").val();
															var wh_repl = project.split('-');
															$("#ckktoproject").val(wh_repl[0]);
															$("#place").val(wh_repl[1]);
															$("#ac_dr_code").val(wh_repl[2]);
															$("#ac_dr_name").val(wh_repl[3]);

															});
														</script>
											<div class="form-group">
												<label class="col-lg-3 control-label">Additional message:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" id="placeother" name="placeother" placeholder="Enter your message here"></textarea>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
								<div class="form-group">
										<div class="table-responsive">
											<table class="table table-bordered table-xxs">
												<thead>
													<tr>
														<th>No.</th>
														<th>CostCode</th>
														<th>Matterail Code</th>
														<th>Materail Name</th>
														<th>Warehouse</th>
														<th>Qty</th>
														<th>Unit</th>
														<th>Price/Unit</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="body">
													<tr>
														<td colspan="10" class="text-center">Not Data</td>
													</tr>
												</tbody>
											</table>
										</div>
								</div>
								<input type="hidden" id="chksave" value="" name="chk_insert">
								<input type="hidden" id="b_no" value="" name="b_no">
<div id="gl"></div>

								<div class="text-right">
									 <a data-toggle="modal" data-target="#insertrow" class="insertrow btn btn-primary"><i class="icon-plus22"></i> Add Rows</a>
									<button type="button" id="savee" class="btn btn-success"><i class="icon-floppy-disk position-left"></i>Save</button>
									 <a class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
								</div>
							</div>
							
						</div>
					</form>
					<!-- /highlighting rows and columns -->


<div id="show_list" class="modal fade" role="dialog">
	<div class="modal-dialog modal-full">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BOOKING TRANSFER</h4>
			</div>
			<div class="modal-body">
				<div id="data_show"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<script>

	var project_id = "<?= $this->uri->segment(3); ?>";
	// alert(project_id);
	$("#data_show").load('<?php echo base_url(); ?>inventory/modal_transfer/'+project_id);





$("#savee").click(function(e){

	if ($("#place").val()=="") {
	swal({
         title: "Please Fill Address!",
         // text: "danger",
         confirmButtonColor: "#FF0000",
         // type: "success"
   	});
   	$("#palcei").html('<input type="text" placeholder="Enter your message here" id="place" name="place" class="form-control border-warning">');
   	$("#place").focus();
	}else if($("#chksave").val()==""){
		swal({
         title: "Please Select Materail !",
         // text: "danger",
         confirmButtonColor: "#FF0000",
         // type: "success"
   	});
	}else if ($("#ckktoproject").val()=="") {
	swal({
         title: "Please Fill To Project!",
         // text: "danger",
         confirmButtonColor: "#FF0000",
         // type: "success"
   	});
}else{
					var frm = $('#formpost');
				    frm.submit(function (ev) {
				        $.ajax({
				            type: frm.attr('method'),
				            url: frm.attr('action'),
				            data: frm.serialize(),
				            				success: function (data) {

				            					// console.log(data);
												swal({
											            title: $.trim(data),
											            text: "Save Completed!!.",
											            // confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
											       $("#savee").prop("disabled",true);
												 setTimeout(function() {
												window.location.href = "<?php echo base_url(); ?>inventory/edit_transfer_store/"+$.trim(data);
												}, 500);
				            }
				        });
				        ev.preventDefault();

				    });




	 $("#formpost").submit(); //Submit  the FORM
    }
});
</script>


				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

			<div class="modal fade" id="insertrow"  tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog modal-lg">
				 <div class="modal-content ">
					 <div class="modal-header bg-info">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h5 class="modal-title">Add Item</h5>
					 </div>

					 <div class="modal-body">
					 				<div class="row">
					 					<div class="col-md-6">
					 					<label for="">WareHouse</label>
					 						<?php $q = $this->db->query("SELECT * from ic_proj_warehouse where project_id='$projsegment'")->result(); ?>
					 						<select class="form-control" name="whi" id="whi">
						 						<?php foreach ($q as $key => $value) {?>
						 							<option value="<?php echo $value->whcode; ?>"><?php echo $value->whname; ?></option>
						 							
						 						<?php } ?>
					 						</select>
					 					</div>
					 				</div>
					 				<script>
					 					$("#whi").change(function(){
					 						var whcode = $("#whi").val();
					 						$("#newmatname").val("");
					 						$("#newmatcode").val("");
					 						$("#storetotol").val("");
					 						$("#qty").val("");
					 						$("#unit").val("");
					 						$("#unitprince").val("");
					 						$("#discprince").val("");
					 						$("#totprice").val("");

					 					});
					 				</script>
									 <div class="row">
										 <div class="col-xs-6">
										 <label for="">Materail Name</label>
											 <div class="input-group">
												 <input type="text" id="newmatname" disabled="true" placeholder="Materail Name" class="form-control ">
												 <input type="hidden" id="newmatcode"  placeholder="Materail Name" class="form-control">
												 <input type="hidden"  class="form-control" id="store_id" value="0">

												 <input type="hidden"  class="form-control" id="jobcode" value="">
												 <input type="hidden"  class="form-control" id="jobname" value="">
												 <!-- <input type="hidden" id="storetotol"> -->
													 <span class="input-group-btn" >
														 <button class="openun btn btn-info" data-toggle="modal" data-target="#openstore"><span class="glyphicon glyphicon-search"></span></button>
													 </span>
											 </div>
										 </div>
										 
										 <div class="col-xs-6">
											 <label for="">QTY Balance</label>
											 <input type="number" disabled="true" class="form-control" id="storetotol" value="0">
										 </div>
										 </div>
										 <div class="row">
											 <div class="col-xs-6">
												 <div class="form-group">
																	 <label for="qty">QTY</label>
																	 <input type="text" id="qty" placeholder="QTY" class="form-control" >
																	 <input type="hidden" id="unitprince" placeholder="QTY" class="form-control" >
																	 <input type="hidden" id="discprince" placeholder="QTY" class="form-control" >
																	 <input type="hidden" id="totprice" placeholder="QTY" class="form-control" >
												 </div>
											 </div>
											 <script>
											 		$("#qty").keyup(function(){
														intOnly($(this));
													});
											 </script>
											 <div class="col-xs-6">
													 <div class="input-group">
														 <label for="unit">Unit Name</label>
														 <input type="text" id="unit" readonly="true" placeholder="Unit Name" class="form-control ">
													 <span class="input-group-btn" >
														 <button class="openun btn btn-info" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span></button>
													 </span>
												 </div>
											 </div>
									 </div>
									 <div class="row">
										<div class="col-xs-12">
												 <div class="form-group">
														<label for="endtproject">Remark</label>

																<textarea rows="4" cols="50" type='text' id="remarkitem" class="form-control" ></textarea>
																<input type="hidden" id="costname" readonly="true" placeholder="" class="form-control ">
																<input type="hidden" id="codecostcode" readonly="true" placeholder="" class="form-control ">
											 </div>
												 </div>
										</div>
					 </div>

					 <div class="modal-footer">
						 
						 <button type="button" data-dismiss="modal" id="addtorow" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i> Insert</button>
						 <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
					 </div>
				 </div>
			 </div>
			</div>

			<!-- modal store -->
			 <div class="modal fade" id="openstore" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header bg-info">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Select Materail</h4>
			      </div>
			        <div class="panel-body">
			        </div>
			        <div id="loadmodal"></div>
			  </div>
			</div> <!--end modal -->
			<?php foreach ($getproj as $pro) { ?>
			<input type="hidden" id="primary" value="<?php echo $pri = $pro->acc_primary; ?>" name="acc_primary">	
			<input type="hidden" id="secondary" value="<?php echo $pri = $pro->acc_secondary; ?>" name="acc_secondary">
			<?php } ?>
			<script>
			 $("#gl").hide();
					$(".insertrow").click(function(){
						var aa = $("#fromproject").val();
					});
					$(".openun").click(function(){
							var aa = $("#fromproject").val();
							var bb = $("#whi").val();

					  $("#loadmodal").load('<?php echo base_url(); ?>inventory/load_modal_mat_store_by_projecttransfer/'+aa+'/'+bb);
					    // $('#datasource').DataTable();
					});
					$("#addtorow").click(function(event) {
						if (parseFloat($("#qty").val())>parseFloat($("#storetotol").val())) {
							swal({
											            title: "",
											            text: "ยอดโอนย้ายมากกว่าใน Store!!.",
											            confirmButtonColor: "#66BB6A",
											            type: "error"
											        });
							$('#qty').val('0');
							$('#qty').focus();
							$('#qty').select();
						}else if($("#storetotol").val()=="0" || $("#qty").val()=="" || $("#qty").val()=="0"){
							swal({
											            title: "",
											            text: "กรุณาเลือกวัสดุ!!.",
											            confirmButtonColor: "#66BB6A",
											            type: "error"
											        });
							$('#qty').val('0');
							$('#qty').focus();
							$('#qty').select();
						}else{

							
							
							addrow();
							$("#newmatname").val("");
							$('#newmatcode').val("");
							$('#storetotol').val('0');
							$('#textstore').text('0');
							$('#qty').val('0');
							$("#remarkitem").val("");
							$('#unitprince').val("");
							$('#discprince').val("");
							$('#totprice').val("");
							$("#chksave").val("save");

						}


					});
			</script>
			<script>
			function addrow()
			{
				$('td[class="text-center"]').closest('tr').remove();
				var row = ($('#body tr').length-0)+1;

				var qty = $('#qty').val();
				var qhfrom = $("#whi").val();
				var cjjj = $("#ckktoproject").val();
				var matname = $("#newmatname").val();
				var matcode = $("#newmatcode").val();
				var unit = $("#unit").val();
				var remark = $("#remarkitem").val();
				var costcode = $("#codecostcode").val();
				var costname = $("#costname").val();
				var unitprince = $("#unitprince").val();
		  		var	discprince = $("#discprince").val();
				var totprice = $("#totprice").val();
				var secondary = $("#secondary").val();
				var primary = $("#primary").val();
				var store_id = $("#store_id").val();
				var tot = qty * unitprince ;
				var jobcode = $('#jobcode').val(); 
				var jobname = $('#jobname').val();
				var tr = '<tr id="'+row+'">'+
									
									 '<td clss>'+row+'<input type="hidden" name="store_id[]" value="'+store_id+'" /></td>'+
									 '<td clss>'+costcode+'</td>'+
									 '<td>'+matcode+'<input type="hidden" name="matcodei[]" value="'+matcode+'" /></td>'+
									 '<td>'+matname+'<input type="hidden" name="matnamei[]" value="'+matname+'" /></td>'+
									
									 '<td>'+qhfrom+'<input type="hidden" name="whformi[]" value="'+qhfrom+'" /></td>'+
									
									 '<td>'+qty+'<input type="hidden" name="qtyi[]" value="'+qty+'" /></td>'+
									 '<td>'+unit+'<input type="hidden" name="uniti[]" value="'+unit+'" /></td>'+
									 '<td>'+unitprince+'</td>'+
									 '<td>'+'<input type="text" class="form-control input-xs" name="remarki[]" value="'+remark+'" />'+'</td>'+
									 '<td class="hidden-center">'+
											'<ul class="icons-list">'+
											 // '<li><a href="#" data-popup="tooltip" data-toggle="modal" data-target="#edit_modal'+row+'" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
											'<li><a id="delete'+row+'" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
										'</ul>'+
										'<input type="hidden" name="costcodei[]" value="'+costcode+'" />'+
										'<input type="hidden" name="costnamei[]" value="'+costname+'" />'+
										''+
										'<input type="hidden" name="unitprincei[]" value="'+unitprince+'" />'+
										'<input type="hidden" name="discprincei[]" value="'+discprince+'" />'+
										'<input type="hidden" name="totpricei[]" value="'+totprice+'" />'+
										'<input type="hidden" name="tot[]" value="'+tot+'" />'+


										'<input type="hidden" name="jobcode[]" value="'+jobcode+'" />'+
										'<input type="hidden" name="jobname[]" value="'+jobname+'" />'+
									'</td>'+

								'</tr>'+
								'<script>'+
									'$("#delete'+row+'").click(function(){this.closest("tr").remove();;});'+
								'<\/script>';
					$('#body').append(tr);
					 var modal = '<div id="edit_modal'+row+'" class="modal fade">'+
								'<div class="modal-dialog modal-lg">'+
									'<div class="modal-content ">'+
										'<div class="modal-header bg-info">'+
											'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
											'<h5 class="modal-title">เพิ่มรายการ'+row+''+matname+'</h5>'+
										'</div>'+

										'<div class="modal-body">'+
														'<div class="row">'+
															'<div class="col-xs-6">'+
															'<label for="">เลือกวัสดุ</label>'+
																'<div class="input-group">'+
																	'<input type="text" id="newmatname'+row+'" disabled="true" placeholder="เลือกวัสดุ" class="form-control input-sm" value="'+matname+'">'+
																	'<input type="hidden" id="newmatcode'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="'+matcode+'">'+
																		'<span class="input-group-btn" >'+
																			'<button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
																'</div>'+
															'</div>'+
															'<div class="col-xs-6">'+
																'<label for="">รายการต้นทุน</label>'+
																	'<div class="input-group">'+
																		'<input type="text" id="costname'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+costname+'">'+
																		'<input type="hidden" id="codecostcode'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+costcode+'">'+
																			'<span class="input-group-btn" >'+
																				'<button class="btn btn-info btn-sm" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
																			'</span>'+
																	'</div>'+
																'</div>'+
															'</div>'+
															'<div class="row">'+
																'<div class="col-xs-6">'+
																	'<div class="form-group">'+
																						'<label for="qty">ปริมาณ</label>'+
																						'<input type="text" id="qtyf'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+qty+'">'+
																	'</div>'+
																'</div>'+
																'<div class="col-xs-6">'+
																		'<div class="input-group">'+
																			'<label for="unit">หน่วย</label>'+
																			'<input type="text" id="unit'+row+'" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+unit+'">'+
																		'<span class="input-group-btn" >'+
																			'<button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
																		'</span>'+
																	'</div>'+
																'</div>'+
														'</div>'+
														'<div class="row">'+
														 '<div class="col-xs-12">'+
																	'<div class="form-group">'+
																		 '<label for="endtproject">หมายเหตุ</label>'+

																				 '<textarea rows="4" cols="50" type="text" id="remarkitem'+row+'" class="form-control" >'+remark+'</textarea>'+

																'</div>'+
																	'</div>'+
														 '</div>'+
										'</div>'+

										'<div class="modal-footer">'+
											'<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
											'<button type="button" id="edittorow'+row+'" data-dismiss="modal" class="btn btn-info">Edit Row</button>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
			$('#editrow').append(modal);

			var trr = 
			'<div class="form-group">'+
				'<div class="table-responsive">'+
					'<table class="table table-bordered table-xxs">'+
						'<tr id="'+row+'">'+	
							'<td><input type="text" name="secondary[]" value="'+primary+'" /></td>'+
							'<td><input type="text" name="costcodei[]" value="'+costcode+'" /></td>'+
							'<td><input type="text" name="dr[]" value="'+tot+'" /></td>'+
							'<td><input type="text" name="cr[]" value="0" /></td>'+			
							'</td>'+

						'</tr>'+
						'<tr id="'+row+'">'+	
							'<td><input type="text" name="secondary[]" value="'+secondary+'" /></td>'+
							'<td><input type="text" name="costcodei[]" value="'+costcode+'" /></td>'+
							'<td><input type="text" name="dr[]" value="0" /></td>'+	
							'<td><input type="text" name="cr[]" value="'+tot+'" /></td>'+			
							'</td>'+

						'</tr>'+
					'</table>'+
				'</div>'+
			'</div>';
			$('#gl').append(trr);
			}

	$('#imp').attr('class', 'active');
   $('#materials').attr('class', 'active');
   $('#imp_sub9').attr('style', 'background-color:#dedbd8');
			</script>
