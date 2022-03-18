
<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">PR Archive</a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-flat border-top-lg border-top-warning">
								<div class="panel-heading">
									<h6 class="panel-title">PR Pending</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-xxs datatable-basic">
											<thead>
												<tr>
													<th>PR No.</th>
													<?php if ($projid=="") {?>
														<th>Project</th>
													<?php }?>
													<th>Detail</th>
													<th>APPROVE</th>
													<th>DISAPPROVE</th>
												</tr>
											</thead>
											<?php switch ($position) {
												case '1':
											?>
											<tbody>
												<?php $n=1; foreach($getpmwait as $val){?>
													<tr>
														<td><?php echo $val->pr_prno; ?></td>
														<?php if ($projid=="") {?>
														<td><?php echo $val->project_name; ?></td>
														<?php } ?>
														<td><?php echo $val->pr_remark; ?></td>

														<td class="text-center">
															<a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a>
														</td>
														<td class="text-center">
															<a data-toggle="modal" data-target="#dis<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ไม่อนุมัติ" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove</a></td>
													</tr>
													<?php $n++; } ?>
											</tbody>
											<?php
												break;
											case '2':
											?>
											<tbody>
												<!-- ชั่วคราว  -->
												<?php $n=1; foreach($getpmwait as $val){?>
													<tr>
														<td><?php echo $val->pr_prno; ?></td>
														<?php if ($projid=="") {?>
														<td><?php echo $val->project_name; ?></td>
														<?php } ?>
														<td><?php echo $val->pr_remark; ?></td>

														<td class="text-center">
															<a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a>
														</td>
														<td class="text-center">
															<a data-toggle="modal" data-target="#dis<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ไม่อนุมัติ" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove</a></td>
													</tr>
													<?php $n++; } ?>
													<!-- ชั่วคราว  -->
											</tbody>
											<?php	break;
											case '5':
											?>
											<tbody>
												<?php $n=1; foreach($getwait as $val){?>
													<tr>
														<td><?php echo $val->pr_prno; ?></td>
														<?php if ($projid=="") {?>
														<td><?php echo $val->project_name; ?></td>
														<?php } ?>
														<td><?php echo $val->pr_remark; ?></td>

														<td class="text-center">
															<?php if ($position=="1" && $val->pe_approve==""){ ?>
															<a class="label label-info">wait PM Approve</a>	<!-- <a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block disabled"><i class="icon-checkmark2"></i> Aprove</a> -->
															<?php }else{ ?>
															<a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a>
															<?php } ?>
														</td>
														<td class="text-center">
															<a data-toggle="modal" data-target="#dis<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ไม่อนุมัติ" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove</a></td>
													</tr>
													<?php $n++; } ?>
											</tbody>
											<?php } ?>
										</table>
									</div>
								</div>
								<div class="panel-footer">
									<!-- <ul>
										<li><a href="<?php echo base_url(); ?>pr/archive_pr_pending" class="label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="แสดงรายการทั้งหมด">ALL Pending</a></li>
									</ul>
 -->
									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" data-popup="tooltip" title="" data-original-title="ALL SHOW"><i class="icon-three-bars"></i></a>
										</li>
									</ul>
								</div>
							</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-flat border-top-lg border-top-success">
								<div class="panel-heading">
									<h6 class="panel-title">PR Approve</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped  table-xxs datatable-basic">
											<thead>
												<tr>
													<th >PR No.</th>
													<?php if ($projid=="") {?>
														<th>Project</th>
													<?php }?>
													<th>Detail</th>
													<th>Status</th>
													<th>Open</th>
													<th>Cancel</th>
													<th>Print</th>
												</tr>
											</thead>
											<?php switch ($position) {
												case '1':
											?>
											<tbody>
												<?php $n=1; foreach($getappov as $val){?>
													<tr>
														<td><?php echo $val->pr_prno; ?></td>
														<?php if ($projid=="") {?>
														<td><?php echo $val->project_name; ?></td>
														<?php } ?>
														<td><?php echo $val->pr_remark; ?></td>
														<td></td>
														<td class="text-center"><a data-toggle="modal" data-target="#openappp<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="เปิด" class="label label-info label-block"><i class="icon-folder-open2"></i> Open</a></td>
														<td><a data-toggle="modal" data-target="#cancelmodal<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ยกเลิก" class="label label-danger label-block"><i class="icon-cross3"></i> Cancel</a></td>
														<td class="text-center"><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="พิมพ์" class="label label-warning  label-block"<i class=" icon-printer4"></i> Print</a></td>
													</tr>
													<?php $n++; } ?>
											</tbody>
												<?php
													break;
												case '2':
												?>
												<tbody>
													<!-- ชั่วคราว  -->
													<?php $n=1; foreach($getappov as $val){?>
														<tr>
															<td><?php echo $val->pr_prno; ?></td>
															<?php if ($projid=="") {?>
															<td><?php echo $val->project_name; ?></td>
															<?php } ?>
															<td><?php echo $val->pr_remark; ?></td>
															<td></td>
															<td class="text-center"><a data-toggle="modal" data-target="#openappp<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="เปิด" class="label label-info label-block"><i class="icon-folder-open2"></i> Open</a></td>
															<td><a data-toggle="modal" data-target="#cancelmodal<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ยกเลิก" class="label label-danger label-block"><i class="icon-cross3"></i> Cancel</a></td>
															<td class="text-center"><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="พิมพ์" class="label label-warning  label-block"<i class=" icon-printer4"></i> Print</a></td>
														</tr>
														<?php $n++; } ?>
													<!-- ชั่วคราว  -->
												</tbody>
												<?php	break;
												case '5':
												?>
												<tbody>
													<?php $n=1; foreach($getpmappov as $val){?>
														<tr>
															<td><?php echo $val->pr_prno; ?></td>
															<?php if ($projid=="") {?>
															<td><?php echo $val->project_name; ?></td>
															<?php } ?>
															<td><?php echo $val->pr_remark; ?></td>
															<td><?php echo $val->pr_approve; ?></td>
															<td class="text-center"><a data-toggle="modal" data-target="#openappp<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="เปิด" class="label label-info label-block"><i class="icon-folder-open2"></i> Open</a></td>
															<td><a data-toggle="modal" data-target="#cancelmodal<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ยกเลิก" class="label label-danger label-block"><i class="icon-cross3"></i> Cancel</a></td>
															<td class="text-center"><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="พิมพ์" class="label label-warning  label-block"<i class=" icon-printer4"></i> Print</a></td>
														</tr>
														<?php $n++; } ?>
												</tbody>
												<?php } ?>
											<!-- <tbody>
												<?php $n=1; foreach($getappov as $val){?>
													<tr>
														<td><?php echo $val->pr_prno; ?></td>
														<?php if ($projid=="") {?>
														<td><?php echo $val->project_name; ?></td>
														<?php } ?>
														<td><?php echo $val->pr_remark; ?></td>
														<td class="text-center"><a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="เปิด" class="label label-info label-block"><i class="icon-folder-open2"></i> Open</a></td>
														<td><a data-toggle="modal" data-target="#cancelmodal<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ยกเลิก" class="label label-danger label-block"><i class="icon-cross3"></i> Cancel</a></td>
														<td class="text-center"><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="พิมพ์" class="label label-warning  label-block"<i class=" icon-printer4"></i> Print</a></td>
													</tr>
													<?php $n++; } ?>
											</tbody> -->

										</table>
									</div>
								</div>
								<div class="panel-footer">
									<!-- <ul>
										<li><a href="<?php echo base_url(); ?>pr/archive_pr_approve" class="label label-flat border-success text-success-600" data-popup="tooltip" title="" data-original-title="แสดงรายการทั้งหมด">ALL Approve</a></li>
									</ul> -->

									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" data-popup="tooltip" title="" data-original-title="ALL SHOW"><i class="icon-three-bars"></i></a>
										</li>
									</ul>
								</div>
							</div>
					</div>
				</div>
			</div>


					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->
<?php foreach ($getappov as $val) {?>
	<div id="openprr<?php echo $val->pr_prno; ?>" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Open Detail PR No.: <?php echo $val->pr_prno; ?></h5>
				</div>

				<div class="modal-body">
				<h3><i class=" icon-file-empty"></i> Master</h3>
					<div class="col-md-6">
						<div class="form-group">
												<div class="col-lg-3">
													<div class="form-control-static">
														<p>PR No.:</p>
													</div>
												</div>
												<div class="col-lg-9">
												<div class="form-control-static">
													<p><?php echo $val->pr_prno;?></p>
												</div>
													<!-- <input class="form-control" value="<?php echo $val->pr_prno;?>"/>-->
													<input type="hidden" class="form-control" id="prapprov<?php echo $val->pr_prno; ?>" value="<?php echo $val->pr_prno;?>"/>
												</div>
									 </div>
						<div class="form-group">
											<div class="col-lg-3">
													<div class="form-control-static">
														<p>Name:</p>
													</div>
												</div>
											<div class="col-lg-9">
											<div class="form-control-static">
													<p><?php echo $val->pr_reqname;?></p>
													</div>
											</div>
									</div>
									<div class="form-group">
												 <div class="col-lg-3">
													<div class="form-control-static">
														<p>Place:</p>
													</div>
												</div>
													<div class="col-lg-9">
											<div class="form-control-static">
												<p><?php echo $val->pr_deliplace;?></p>
											</div>
											</div>
										</div>
							</div>
							<div class="col-md-6">
									<div class="form-group">
										<div class="col-lg-3">
													<div class="form-control-static">
														<p>PR Date:</p>
													</div>
												</div>
										<div class="col-lg-9">
										<div class="form-control-static">
											<p><?php echo date('d/m/Y' ,strtotime($val->pr_prdate)); ?></p>
										</div>
										</div>
									</div>
									<div class="form-group">
											<div class="col-lg-4">
													<div class="form-control-static">
														<p>Project/Department:</p>
													</div>
												</div>
											<div class="col-lg-8">
											<div class="form-control-static">
												<p><?php echo $val->project_name;?><?php echo $val->department_title; ?></p>
											</div>
											</div>
								</div>
								<div class="form-group">
											<div class="col-lg-3">
													<div class="form-control-static">
														<p>Remark:</p>
													</div>
												</div>
											<div class="col-lg-9">
											<div class="form-control-static">
												<p><?php echo $val->pr_remark;?></p>
											</div>
											</div>
									</div>
							</div>
								 <!--  -->
				</div>

				<div class="panel-body">
				<hr>
				<h3><i class="icon-file-text2"></i> Detail</h3>

				<table class="table table-bordered table-striped table-xxs">
						<thead>
							<tr>
								<th>No.</th>
														<th>รหัสต้นทุน</th>
														<th>ชื่อวัสดุ</th>
														<th>จำนวน</th>
													 </tr>
												</thead>
												<tbody>
														<?php   $n =1;?>

														<?php
														$prpr = $val->pr_prno;
														$this->db->select('*');
														$this->db->where('pri_ref', $prpr);
														$q =  $this->db->get('pr_item');
														$res = $q->result();
														foreach ($res as $valj){ ?>
													<tr>
														<td><?php echo $n; ?></td>
													 <td><?php echo substr($valj->pri_costcode, -5); ?></td>
														<td><?php echo $valj->pri_matname; ?></td>
														 <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
													 </tr>
														<?php $n++; } ?>
												</tbody>
					</table>
				</div>
					<div class="modal-footer">
								<button type="button" class="approv<?php echo $val->pr_prno; ?> btn bg-success-600" data-dismiss="modal">Approve</button>
							</div>
			</div>

		</div>
	</div>
<?php } ?>




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
							<?php foreach ($getwait as $value) {?>
								<!-- Approve Modal -->
								<div id="open<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header bg-success">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Open Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
											<h3><i class=" icon-file-empty"></i> Master</h3>
												<div class="col-md-6">
													<div class="form-group">
									                   	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR No.:</p>
									                   		</div>
									                   	</div>
									                  	<div class="col-lg-9">
									                  	<div class="form-control-static">
									                  		<p><?php echo $value->pr_prno;?></p>
									                  	</div>
									                  		<!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
									                    	<input type="hidden" class="form-control" id="prapprov<?php echo $value->pr_prno; ?>" value="<?php echo $value->pr_prno;?>"/>
									                  	</div>
									               </div>
													<div class="form-group">
										                <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Name:</p>
									                   		</div>
									                   	</div>
										                <div class="col-lg-9">
										                <div class="form-control-static">
										                  	<p><?php echo $value->pr_reqname;?></p>
										                  	</div>
										                </div>
										            </div>
										            <div class="form-group">
										                   <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Place:</p>
									                   		</div>
									                   	</div>
										                  	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_deliplace;?></p>
												            </div>
												            </div>
										              </div>
										        </div>
										        <div class="col-md-6">
											          <div class="form-group">
											          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR Date:</p>
									                   		</div>
									                   	</div>
											          	<div class="col-lg-9">
											          	<div class="form-control-static">
											            	<p><?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></p>
											            </div>
											            </div>
											          </div>
											          <div class="form-group">
												          	<div class="col-lg-4">
									                   		<div class="form-control-static">
									                   			<p>Project/Department:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-8">
												          	<div class="form-control-static">
												            	<p><?php echo $value->project_name;?><?php echo $value->department_title; ?></p>
												            </div>
												            </div>
												      </div>
												      <div class="form-group">
												          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Remark:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_remark;?></p>
												            </div>
												            </div>
												       	</div>
										        </div>
									             <!--  -->
											</div>

											<div class="panel-body">
											<hr>
											<h3><i class="icon-file-text2"></i> Detail</h3>

											<table class="table table-bordered table-striped table-xxs">
													<thead>
														<tr>
															<th>No.</th>
								                          <th>รหัสต้นทุน</th>
								                          <th>ชื่อวัสดุ</th>
								                          <th>จำนวน</th>
								                         </tr>
								                      </thead>
								                      <tbody>
								                          <?php   $n =1;?>

								                          <?php
								                          $prpr = $value->pr_prno;
								                          $this->db->select('*');
								                          $this->db->where('pri_ref', $prpr);
								                          $q =  $this->db->get('pr_item');
								                          $res = $q->result();
								                          foreach ($res as $valj){ ?>
								                        <tr>
																					<td><?php echo $n; ?></td>
								                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
								                          <td><?php echo $valj->pri_matname; ?></td>
								                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
								                         </tr>
								                          <?php $n++; } ?>
								                      </tbody>
												</table>
											</div>
												<div class="modal-footer">
															<button type="button" class="approv<?php echo $value->pr_prno; ?> btn bg-success-600" data-dismiss="modal">Approve</button>
														</div>
										</div>

									</div>
								</div>
								<div id="dis<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-danger">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Disapprove Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
											<div class="col-md-12">
												<label>Remark Disapprove :</label>
												<div class="form-group">

													<textarea name="textdisdetail" class="form-control" id="textdisdetail<?php echo $value->pr_prno; ?>" cols="30" rows="10" placeholder="Example : Do Not Approve"></textarea>
												</div>
											</div>

											</div>
											<div class="modal-footer">
												<button type="button" class="disapprov<?php echo $value->pr_prno; ?> btn bg-danger-600" data-dismiss="modal">Disapprove</button>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(".disapprov<?php echo $value->pr_prno;?>").click(function(event) {

								         var url="<?php echo base_url(); ?>index.php/pr_active/disapprove_pr/<?php echo $value->pr_prid;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->pr_prno; ?>",
                                                  remark: $("#textdisdetail<?php echo $value->pr_prno; ?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                	 swal({
												            title: "Are you sure?",
												            text: "You will not be able to recover this imaginary file PR No.:!"+data,
												            type: "warning",
												            showCancelButton: true,
												            confirmButtonColor: "#EF5350",
												            confirmButtonText: "Yes, delete it!",
												            cancelButtonText: "No, cancel pls!",
												            closeOnConfirm: false,
												            closeOnCancel: false
												        },
												        function(isConfirm){
												            if (isConfirm) {
												                swal({
												                    title: "Deleted!",
												                    text: "Your imaginary file has been deleted.",
												                    confirmButtonColor: "#66BB6A",
												                    type: "success"
												                });
												            }
												            else {
												                swal({
												                    title: "Cancelled",
												                    text: "Your imaginary file is safe :)",
												                    confirmButtonColor: "#2196F3",
												                    type: "error"
												                });
												            }
												        });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve_dep/<?php echo $value->department_id; ?>";
                                                  }, 500);
                                                });
									});
								</script>
								<script>
									$(".approv<?php echo $value->pr_prno; ?> ").click(function(event) {
										  var url="<?php echo base_url(); ?>index.php/pr_active/approve_pr/<?php echo $value->pr_prid;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->pr_prno; ?>"
                                                };
                                                $.post(url,dataSet,function(data){
                                                	 swal({
											            title: "Approved!",
											            text: "Approved PR No."+data,
											            confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>index.php/pr/pr_approve/<?php echo $value->department_id;?>";
                                                  }, 500);
                                                });
									});

								</script>
								<!-- /Approve Modal -->
							<?php } ?>

							<?php foreach ($getpmwait as $value) {?>
								<!-- Approve Modal -->
								<div id="open<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header bg-success">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Open Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
											<h3><i class=" icon-file-empty"></i> Master</h3>
												<div class="col-md-6">
													<div class="form-group">
									                   	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR No.:</p>
									                   		</div>
									                   	</div>
									                  	<div class="col-lg-9">
									                  	<div class="form-control-static">
									                  		<p><?php echo $value->pr_prno;?></p>
									                  	</div>
									                  		<!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
									                    	<input type="hidden" class="form-control" id="prapprov<?php echo $value->pr_prno; ?>" value="<?php echo $value->pr_prno;?>"/>
									                  	</div>
									               </div>
													<div class="form-group">
										                <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Name:</p>
									                   		</div>
									                   	</div>
										                <div class="col-lg-9">
										                <div class="form-control-static">
										                  	<p><?php echo $value->pr_reqname;?></p>
										                  	</div>
										                </div>
										            </div>
										            <div class="form-group">
										                   <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Place:</p>
									                   		</div>
									                   	</div>
										                  	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_deliplace;?></p>
												            </div>
												            </div>
										              </div>
										        </div>
										        <div class="col-md-6">
											          <div class="form-group">
											          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR Date:</p>
									                   		</div>
									                   	</div>
											          	<div class="col-lg-9">
											          	<div class="form-control-static">
											            	<p><?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></p>
											            </div>
											            </div>
											          </div>
											          <div class="form-group">
												          	<div class="col-lg-4">
									                   		<div class="form-control-static">
									                   			<p>Project/Department:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-8">
												          	<div class="form-control-static">
												            	<p><?php echo $value->project_name;?><?php echo $value->department_title; ?></p>
												            </div>
												            </div>
												      </div>
												      <div class="form-group">
												          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Remark:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_remark;?></p>
												            </div>
												            </div>
												       	</div>
										        </div>
									             <!--  -->
											</div>

											<div class="panel-body">
											<hr>
											<h3><i class="icon-file-text2"></i> Detail</h3>

											<table class="table table-bordered table-striped table-xxs">
													<thead>
														<tr>
															<th>No.</th>
								                          <th>รหัสต้นทุน</th>
								                          <th>ชื่อวัสดุ</th>
								                          <th>จำนวน</th>
								                         </tr>
								                      </thead>
								                      <tbody>
								                          <?php   $n =1;?>

								                          <?php
								                          $prpr = $value->pr_prno;
								                          $this->db->select('*');
								                          $this->db->where('pri_ref', $prpr);
								                          $q =  $this->db->get('pr_item');
								                          $res = $q->result();
								                          foreach ($res as $valj){ ?>
								                        <tr>
																					<td><?php echo $n; ?></td>
								                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
								                          <td><?php echo $valj->pri_matname; ?></td>
								                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
								                         </tr>
								                          <?php $n++; } ?>
								                      </tbody>
												</table>
											</div>
												<div class="modal-footer">
															<button type="button" class="approv<?php echo $value->pr_prno; ?> btn bg-success-600" data-dismiss="modal">Approve</button>
														</div>
										</div>

									</div>
								</div>
								<div id="dis<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-danger">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Disapprove Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
											<div class="col-md-12">
												<label>Remark Disapprove :</label>
												<div class="form-group">

													<textarea name="textdisdetail" class="form-control" id="textdisdetail<?php echo $value->pr_prno; ?>" cols="30" rows="10" placeholder="Example : Do Not Approve"></textarea>
												</div>
											</div>

											</div>
											<div class="modal-footer">
												<button type="button" class="disapprov<?php echo $value->pr_prno; ?> btn bg-danger-600" data-dismiss="modal">Disapprove</button>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(".disapprov<?php echo $value->pr_prno;?>").click(function(event) {

								         var url="<?php echo base_url(); ?>index.php/pr_active/disapprove_pr/<?php echo $value->pr_prid;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->pr_prno; ?>",
                                                  remark: $("#textdisdetail<?php echo $value->pr_prno; ?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                	 swal({
												            title: "Are you sure?",
												            text: "You will not be able to recover this imaginary file PR No.:!"+data,
												            type: "warning",
												            showCancelButton: true,
												            confirmButtonColor: "#EF5350",
												            confirmButtonText: "Yes, delete it!",
												            cancelButtonText: "No, cancel pls!",
												            closeOnConfirm: false,
												            closeOnCancel: false
												        },
												        function(isConfirm){
												            if (isConfirm) {
												                swal({
												                    title: "Deleted!",
												                    text: "Your imaginary file has been deleted.",
												                    confirmButtonColor: "#66BB6A",
												                    type: "success"
												                });
												            }
												            else {
												                swal({
												                    title: "Cancelled",
												                    text: "Your imaginary file is safe :)",
												                    confirmButtonColor: "#2196F3",
												                    type: "error"
												                });
												            }
												        });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve_dep/<?php echo $value->department_id; ?>";
                                                  }, 500);
                                                });
									});
								</script>
								<script>
									$(".approv<?php echo $value->pr_prno; ?> ").click(function(event) {
										  var url="<?php echo base_url(); ?>index.php/pr_active/approve_pr/<?php echo $value->pr_prid;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->pr_prno; ?>"
                                                };
                                                $.post(url,dataSet,function(data){
                                                	 swal({
											            title: "Approved!",
											            text: "Approved PR No."+data,
											            confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve_dep/<?php echo $value->department_id;?>";
                                                  }, 500);
                                                });
									});

								</script>
								<!-- /Approve Modal -->
							<?php } ?>

							<?php  foreach ($getappov as $value) {?>
								<div id="openappp<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Open Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
											<h3><i class=" icon-file-empty"></i> Master</h3>
												<div class="col-md-6">
													<div class="form-group">
									                   	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR No.:</p>
									                   		</div>
									                   	</div>
									                  	<div class="col-lg-9">
									                  	<div class="form-control-static">
									                  		<p><?php echo $value->pr_prno;?></p>
									                  	</div>
									                  		<!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
									                    	<input type="hidden" class="form-control" id="prapprov<?php echo $value->pr_prno; ?>" value="<?php echo $value->pr_prno;?>"/>
									                  	</div>
									               </div>
													<div class="form-group">
										                <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Name:</p>
									                   		</div>
									                   	</div>
										                <div class="col-lg-9">
										                <div class="form-control-static">
										                  	<p><?php echo $value->pr_reqname;?></p>
										                  	</div>
										                </div>
										            </div>
										            <div class="form-group">
										                   <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Place:</p>
									                   		</div>
									                   	</div>
										                  	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_deliplace;?></p>
												            </div>
												            </div>
										              </div>
										        </div>
										        <div class="col-md-6">
											          <div class="form-group">
											          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR Date:</p>
									                   		</div>
									                   	</div>
											          	<div class="col-lg-9">
											          	<div class="form-control-static">
											            	<p><?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></p>
											            </div>
											            </div>
											          </div>
											          <div class="form-group">
												          	<div class="col-lg-4">
									                   		<div class="form-control-static">
									                   			<p>Project/Department:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-8">
												          	<div class="form-control-static">
												            	<p><?php echo $value->project_name;?><?php echo $value->department_title; ?></p>
												            </div>
												            </div>
												      </div>
												      <div class="form-group">
												          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Remark:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_remark;?></p>
												            </div>
												            </div>
												       	</div>
										        </div>
									             <!--  -->
											</div>

											<div class="panel-body">
											<hr>
											<h3><i class="icon-file-text2"></i> Detail</h3>

											<table class="table table-bordered table-striped table-xxs">
													<thead>
														<tr>
															<th>No.</th>
								                          <th>รหัสต้นทุน</th>
								                          <th>ชื่อวัสดุ</th>
								                          <th>จำนวน</th>
								                         </tr>
								                      </thead>
								                      <tbody>
								                          <?php   $n =1;?>

								                          <?php
								                          $prpr = $value->pr_prno;
								                          $this->db->select('*');
								                          $this->db->where('pri_ref', $prpr);
								                          $q =  $this->db->get('pr_item');
								                          $res = $q->result();
								                          foreach ($res as $valj){ ?>
								                        <tr>
																					<td><?php echo $n; ?></td>
								                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
								                          <td><?php echo $valj->pri_matname; ?></td>
								                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
								                         </tr>
								                          <?php $n++; } ?>
								                      </tbody>
												</table>
											</div>
												<div class="modal-footer">
															<button type="button" class="btn bg-info-600" data-dismiss="modal">Close</button>
														</div>
										</div>

									</div>
								</div>
								<div id="cancelmodal<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header bg-danger">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Open Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
											<h3><i class=" icon-file-empty"></i> Master</h3>
												<div class="col-md-6">
													<div class="form-group">
									                   	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR No.:</p>
									                   		</div>
									                   	</div>
									                  	<div class="col-lg-9">
									                  	<div class="form-control-static">
									                  		<p><?php echo $value->pr_prno;?></p>
									                  	</div>
									                  		<!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
									                    	<input type="hidden" class="form-control" id="prapprov<?php echo $value->pr_prno; ?>" value="<?php echo $value->pr_prno;?>"/>
									                  	</div>
									               </div>
													<div class="form-group">
										                <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Name:</p>
									                   		</div>
									                   	</div>
										                <div class="col-lg-9">
										                <div class="form-control-static">
										                  	<p><?php echo $value->pr_reqname;?></p>
										                  	</div>
										                </div>
										            </div>
										            <div class="form-group">
										                   <div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Place:</p>
									                   		</div>
									                   	</div>
										                  	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_deliplace;?></p>
												            </div>
												            </div>
										              </div>
										        </div>
										        <div class="col-md-6">
											          <div class="form-group">
											          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>PR Date:</p>
									                   		</div>
									                   	</div>
											          	<div class="col-lg-9">
											          	<div class="form-control-static">
											            	<p><?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></p>
											            </div>
											            </div>
											          </div>
											          <div class="form-group">
												          	<div class="col-lg-4">
									                   		<div class="form-control-static">
									                   			<p>Project/Department:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-8">
												          	<div class="form-control-static">
												            	<p><?php echo $value->project_name;?><?php echo $value->department_title; ?></p>
												            </div>
												            </div>
												      </div>
												      <div class="form-group">
												          	<div class="col-lg-3">
									                   		<div class="form-control-static">
									                   			<p>Remark:</p>
									                   		</div>
									                   	</div>
												          	<div class="col-lg-9">
												          	<div class="form-control-static">
												            	<p><?php echo $value->pr_remark;?></p>
												            </div>
												            </div>
												       	</div>
										        </div>
									             <!--  -->
											</div>

											<div class="panel-body">
											<hr>
											<h3><i class="icon-file-text2"></i> Detail</h3>

											<table class="table table-bordered table-striped table-xxs">
													<thead>
														<tr>
															<th>No.</th>
								                          <th>รหัสต้นทุน</th>
								                          <th>ชื่อวัสดุ</th>
								                          <th>จำนวน</th>
								                         </tr>
								                      </thead>
								                      <tbody>
								                          <?php   $n =1;?>

								                          <?php
								                          $prpr = $value->pr_prno;
								                          $this->db->select('*');
								                          $this->db->where('pri_ref', $prpr);
								                          $q =  $this->db->get('pr_item');
								                          $res = $q->result();
								                          foreach ($res as $valj){ ?>
								                        <tr>
																					<td><?php echo $n; ?></td>
								                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
								                          <td><?php echo $valj->pri_matname; ?></td>
								                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
								                         </tr>
								                          <?php $n++; } ?>
								                      </tbody>
												</table>
											</div>
												<div class="modal-footer">
															<button type="button" class="cance<?php echo $value->pr_prno; ?> btn bg-danger-600" data-dismiss="modal">Cancel</button>
														</div>
										</div>

									</div>
								</div>
								<div id="dis<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-danger">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Disapprove Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
											<div class="col-md-12">
												<label>Remark Disapprove :</label>
												<div class="form-group">

													<textarea name="textdisdetail" class="form-control" id="textdisdetail<?php echo $value->pr_prno; ?>" cols="30" rows="10" placeholder="Example : Do Not Approve"></textarea>
												</div>
											</div>

											</div>
											<div class="modal-footer">
												<button type="button" class="disapprov<?php echo $value->pr_prno; ?> btn bg-danger-600" data-dismiss="modal">Disapprove</button>
											</div>
										</div>
									</div>
								</div>
								<script>
									$(".disapprov<?php echo $value->pr_prno;?>").click(function(event) {

								         var url="<?php echo base_url(); ?>index.php/pr_active/disapprove_pr/<?php echo $value->pr_prid;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->pr_prno; ?>",
                                                  remark: $("#textdisdetail<?php echo $value->pr_prno; ?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                	 swal({
												            title: "Are you sure?",
												            text: "You will not be able to recover this imaginary file PR No.:!"+data,
												            type: "warning",
												            showCancelButton: true,
												            confirmButtonColor: "#EF5350",
												            confirmButtonText: "Yes, delete it!",
												            cancelButtonText: "No, cancel pls!",
												            closeOnConfirm: false,
												            closeOnCancel: false
												        },
												        function(isConfirm){
												            if (isConfirm) {
												                swal({
												                    title: "Deleted!",
												                    text: "Your imaginary file has been deleted.",
												                    confirmButtonColor: "#66BB6A",
												                    type: "success"
												                });
												            }
												            else {
												                swal({
												                    title: "Cancelled",
												                    text: "Your imaginary file is safe :)",
												                    confirmButtonColor: "#2196F3",
												                    type: "error"
												                });
												            }
												        });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>index.php/pr/pr_approve_dep/<?php echo $value->department_id; ?>";
                                                  }, 500);
                                                });
									});
								</script>
								<script>
									$(".cance<?php echo $value->pr_prno; ?> ").click(function(event) {
										  var url="<?php echo base_url(); ?>index.php/pr_active/cancel_pr/<?php echo $value->pr_prid;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->pr_prno; ?>"
                                                };
                                                $.post(url,dataSet,function(data){
                                                	 swal({
											            title: "Cancelled!",
											            text: "Cancelled PR No."+data,
											            confirmButtonColor: "#ff002e",
											            type: "error"
											        });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>index.php/pr/pr_approve_dep/<?php echo $value->department_id; ?>";
                                                  }, 500);
                                                });
									});

								</script>
							<?php } ?>
