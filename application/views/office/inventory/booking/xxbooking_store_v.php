
<!-- Main content  trans-->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
							</div>
						</div> -->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr"></a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">



					<!-- Highlighting rows and columns -->
					<form class="form-horizontal" action="<?php echo base_url(); ?>inventory_active/save_booking" method="post">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Multiple columns</h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
											<legend class="text-semibold"><i class="icon-reading position-left"></i> project <?php echo $project; ?></legend>

											<div class="form-group">
												<label class="col-lg-3 control-label">Booking Code:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="trcode" name="trcode" placeholder="Booking Code AutoRun" readonly="readonly" >
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
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Name:</label>
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
						                	<legend class="text-semibold"><i class="icon-truck position-left"></i> Booking TO</legend>

															<div class="form-group">
																<label class="col-lg-3 control-label">วันที่จอง: </label>
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
																	<select class="select-menu2-color" id="toproject" name="toproject">
																		<?php foreach ($getprojall as $value) {?>
																			<option value="<?php echo $value->project_id; ?>"><?php echo $value->project_name; ?></option>
																	<?php	} ?>

																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-lg-3 control-label">กำหนดส่งสินค้า : </label>
																<div class="col-lg-9">
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																	<input type="text" class="form-control daterange-single" id="duedate" name="duedate">
																</div>
															</div>
															</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Address:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="Enter your message here" id="place" name="place" class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Additional message:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" id="placeother" name="placeother" placeholder="Enter your message here"></textarea>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
								<div class="container">
									<div class="row">
										<div class="form-group">
											<a id="load" class="btn btn-warning ">Load Material</a>
										</div>
									</div>
								</div>
								<div class="form-group" id="loadtable">
										<div class="table-responsive" >
											<table class="table table-bordered table-xxs">
												<thead>
													<tr>
														<th width="10%">#</th>
														<th>Matterail Code</th>
														<th>Materail Name</th>
														<th>Qty</th>
														<th>Unit</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="body">
													<tr>
														<td colspan="6" class="text-center">Not Data</td>
													</tr>
												</tbody>
											</table>
										</div>
								</div>


								<div class="text-right">
									<a href="<?php echo base_url(); ?>inventory/booking" class="btn btn-default"><i class="icon-plus22"></i> NEW</a>
									 <a data-toggle="modal" data-target="#insertrow" class="insertrow btn btn-info"><i class=" icon-add-to-list"></i> Add Rows</a>
									<button type="submit" class="preload btn btn-primary"><i class="icon-floppy-disk position-left"></i>Save</button>
									 <a class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
								</div>
							</div>
						</div>
					</form>
					<!-- /highlighting rows and columns -->

<script>
	$('#load').click(function(event) {
	$('#loadtable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	$('#loadtable').load('<?php echo base_url(); ?>inventory/load_material_book/'+ $("#fromproject").val()+'/'+'<?php echo $projid; ?>');
	});
</script>


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
									<div id="table"></div>
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
						$('#table').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
						$('#table').load('<?php echo base_url(); ?>inventory/load_material_book/'+ aa);
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

				var qty = $('#qty'+row).val();
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
