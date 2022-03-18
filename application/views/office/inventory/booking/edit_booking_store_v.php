			<div class="content-wrapper">
				<div class="page-header">
				<div class="content">
<?php 
 $session_data = $this->session->userdata('sessed_in');
 $username = $session_data['username'];
 $compcode = $session_data['compcode'];
?>

<?php foreach ($res as $key => $value) {
	$code = $value->book_code;
	$date = $value->date_book;
	$address = $value->address_book;
	$remark = $value->remark;
	$msg = $value->message;
	$duedate = $value->duedate;
} ?>
					<!-- Highlighting rows and columns -->
					<form class="form-horizontal" action="<?php echo base_url(); ?>inventory_active/udp_booking" method="post">
						<div class="panel panel-flat">
							<div class="panel-heading">

								<div class="form-group">
									<div class="col-lg-2">
										<h5 class="panel-title">Multiple columns</h5>
									</div>
									<div class="col-lg-2">
										<span class="label label-primary label-rounded"><?= $value->type_ic ?></span>
									</div>
								</div>

							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
											<legend class="text-semibold"><i class="icon-reading position-left"></i> project <?php echo $project; ?></legend>

											<div class="form-group">
												<label class="col-lg-3 control-label">Booking Code:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="trcode" name="trcode" placeholder="Booking Code AutoRun" readonly="readonly" value="<?php echo $code; ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Project Name</label>
												<div class="col-lg-9">
													<select class="form-control" id="fromproject" name="fromproject">
														<?php foreach ($getproj as $value) {?>
															<option value="<?php echo $value->project_id; ?>"><?php echo $value->project_name; ?></option>
													<?php	} ?>

													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">User Reserve:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" readonly="readonly" id="name" name="name" value="<?php echo $name; ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Remark:</label>
												<div class="col-lg-9">
													<textarea rows="5" readonly="" cols="5" class="form-control" id="remark" name="remark" placeholder="Enter your message here"><?php echo $remark; ?></textarea>
												</div>
											</div>
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
						                	<legend class="text-semibold"><i class="icon-truck position-left"></i> Booking TO</legend>

															<div class="form-group">
																<label class="col-lg-3 control-label">Booking Date: </label>
																<div class="col-lg-9">
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																	<input type="date" readonly="" class="form-control" id="trdate" name="trdate" value="<?php echo $date; ?>">
																</div>
															</div>
															</div>

															<!-- <div class="form-group">
																<label class="col-lg-3 control-label">To Project</label>
																<div class="col-lg-9">
																	<select class="select-menu2-color" id="toproject" name="toproject">
																		<?php foreach ($getproj as $value) {?>
																			<option value="<?php echo $value->project_id; ?>"><?php echo $value->project_name; ?></option>
																	<?php	} ?>
																	</select>
																</div>
															</div> -->
											<div class="form-group">
																<label class="col-lg-3 control-label">Delivery Date : </label>
																<div class="col-lg-9">
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																	<input type="date" readonly=""class="form-control " id="duedate" name="duedate" value="<?php echo $duedate; ?>">
																</div>
															</div>
															</div>
											<div class="form-group">
												<label class="col-lg-3 control-label">Address:</label>
												<div class="col-lg-9">
													<input type="text" readonly="" placeholder="Enter your message here" id="place" name="place" class="form-control" value="<?php echo $address; ?>">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Additional message:</label>
												<div class="col-lg-9">
													<textarea rows="5" readonly="" cols="5" class="form-control" id="placeother" name="placeother" placeholder="Enter your message here"><?php echo $msg; ?></textarea>
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
														<th>#</th>
														<th>Matterail Code</th>
														<th>Materail Name</th>
														<th>Qty</th>
														<th>Unit Name</th>
														<!-- <th>Action</th> -->
													</tr>
												</thead>
												<tbody id="body">
													<?php $n=1; foreach ($resi as $key => $value) {?>
													<tr>
														<td><?php echo $n; ?></td>
														<td><?php echo $value->mat_code; ?></td>
														<td><?php echo $value->mat_name; ?></td>
														<td><?php echo $value->qty; ?></td>
														<td><?php echo $value->unit; ?></td>
														<!-- <td>
															<ul class="icons-list">
																<li><a data-toggle="modal" data-target="#edit" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
																<li><a href="#" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>
															</ul>
														</td> -->
													</tr>
													<?php $n++; } ?>
												</tbody>
											</table>
										</div>
								</div>
								<div class="text-right">
									<a type="button" href="<?php echo base_url(); ?>inventory/open_booking/open" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>
									<a class="btn btn-primary" href="<?php echo base_url(); ?>report/viewerload?type=ic&typ=ic_booking&var1=<?php echo $code; ?>&var2=<?php echo $compcode;?>" target="_blank" data-popup="tooltip"  title="" data-original-title="Print"><i class="icon-printer2"></i> Print</a>
									<!-- <a class="btn btn-primary" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ic_booking.mrt&doccode=<?php echo $code; ?>" target="_blank" data-popup="tooltip"  title="" data-original-title="Print"><i class="icon-printer2"></i> Print</a> -->
									 	<!-- <a data-toggle="modal" data-target="#insertrow" class="insertrow btn btn-info"><i class=" icon-add-to-list"></i> Add Rows</a> -->
										<button type="submit" class="btn bg-success" disabled=""><i class="icon-floppy-disk position-left"></i>Save</button>
									
										
									 <a class="btn bg-danger"><i class="icon-close2 position-left"></i> Close</a>
								</div>
							</div>
						</div>
					</form>
					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

			<div id="insertrow" class="modal fade">
			 <div class="modal-dialog modal-lg">
				 <div class="modal-content ">
					 <div class="modal-header bg-info">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h5 class="modal-title">เพิ่มรายการ</h5>
					 </div>

					 <div class="modal-body">
									 <div class="row">
										 <div class="col-xs-6">
										 <label for="">เลือกวัสดุ</label>
											 <div class="input-group">
												 <input type="text" id="newmatname" disabled="true" placeholder="เลือกวัสดุ" class="form-control input-sm">
												 <input type="hidden" id="newmatcode"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
												 <!-- <input type="hidden" id="storetotol"> -->
													 <span class="input-group-btn" >
														 <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openstore"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
													 </span>
											 </div>
										 </div>
										 <div class="col-xs-6">
											 <label for="">จำนวนคงเหลือในคลัง</label>
											 <input type="number" disabled="true" class="form-control" id="storetotol">
										 </div>
										 </div>
										 <div class="row">
											 <div class="col-xs-6">
												 <div class="form-group">
																	 <label for="qty">ปริมาณ</label>
																	 <input type="number" id="qty" placeholder="กรอกปริมาณ" class="form-control" >
												 </div>
											 </div>
											 <div class="col-xs-6">
													 <div class="input-group">
														 <label for="unit">หน่วย</label>
														 <input type="text" id="unit" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">
													 <span class="input-group-btn" >
														 <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
													 </span>
												 </div>
											 </div>
									 </div>
									 <div class="row">
										<div class="col-xs-12">
												 <div class="form-group">
														<label for="endtproject">หมายเหตุ</label>

																<textarea rows="4" cols="50" type='text' id="remarkitem" class="form-control" ></textarea>
																<input type="hidden" id="costname" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
																<input type="hidden" id="codecostcode" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
											 </div>
												 </div>
										</div>
					 </div>

					 <div class="modal-footer">
						 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						 <button type="button" id="addtorow" data-dismiss="modal" class="btn btn-info">Insert</button>
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
			        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
			      </div>
			        <div class="panel-body">
			        </div>
			        <div id="loadmodal"></div>
			  </div>
			</div> <!--end modal -->
			<script>
					$(".insertrow").click(function(){
						var aa = $("#fromproject").val();
					});
					$(".openun").click(function(){
							var aa = $("#fromproject").val();

					  $("#loadmodal").load('<?php echo base_url(); ?>inventory/load_modal_mat_store_by_project/'+aa);
					    // $('#datasource').DataTable();
					});
					$("#addtorow").click(function(event) {
					addrow();
					$("#newmatname").val('');
					$('#newmatcode').val('');
					$('#storetotol').val('');
					$('#textstore').text('0');
					$('#qty').val('');
					$("#remarkitem").val('');
					});
			</script>
			<script>
			function addrow()
			{
				$('td[class="text-center"]').closest('tr').remove();
				var row = ($('#body tr').length-0)+1;

				var qty = $('#qty').val();
				var matname = $("#newmatname").val();
				var matcode = $("#newmatcode").val();
				var unit = $("#unit").val();
				var remark = $("#remarkitem").val();
				var costcode = $("#codecostcode").val();
				var costname = $("#costname").val();
				var tr = '<tr id="'+row+'">'+
									 '<td>'+row+'</td>'+
									 '<td>'+matcode+'<input type="hidden" name="matcodei[]" value="'+matcode+'" /></td>'+
									 '<td>'+matname+'<input type="hidden" name="matnamei[]" value="'+matname+'" /></td>'+
									 '<td>'+qty+'<input type="hidden" name="qtyi[]" value="'+qty+'" /></td>'+
									 '<td>'+unit+'<input type="hidden" name="uniti[]" value="'+unit+'" /></td>'+
									 '<td class="hidden-center">'+
											'<ul class="icons-list">'+
											 // '<li><a href="#" data-popup="tooltip" data-toggle="modal" data-target="#edit_modal'+row+'" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
											'<li><a id="delete" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+
										'</ul>'+
										'<input type="hidden" name="costcodei[]" value="'+costcode+'" />'+
										'<input type="hidden" name="costnamei[]" value="'+costname+'" />'+
										'<input type="hidden" name="remarki[]" value="'+remark+'" />'+

									'</td>'+

								'</tr>';
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
			}
			</script>
