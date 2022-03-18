<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
$strDate = date("Y-m-d");
?>
<!-- Main content  trans-->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">
		<!-- Highlighting rows and columns -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Select Purchase Order System(PO)</h5>
			</div>
			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-component">
						<li class="active">
							<a href="#bottom-tab1" data-toggle="tab">Project</a>
						</li>
						<li>
							<a href="#bottom-tab2" data-toggle="tab">Department</a>
						</li>
						<li>
							<a href="#bottom-tab" data-toggle="tab">PR Reqursition</a>
						</li>

					</ul>
					<div class="tab-content">
						<div class="tab-pane" id="bottom-tab">
							<div class="table-responsive">
								<table class="table table-hover table-striped table-xxs datatable-basic">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Pr No</th>
											<th class="text-center">Pr Date</th>
											<th class="text-center">Name</th>
											<th class="text-center">Project/Department</th>
											<th class="text-center">System</th>
											<th class="text-center">Remark</th>
											<th class="text-center">File</th>
											<th class="text-center">Express</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $pri=1; foreach ($pr as $p) { ?>


										<tr>
											<td class="text-center">
												<?php echo $pri; ?>
											</td>
											<td class="text-left">
												<?php echo $p->pr_prno; ?>
											</td>
											<td class="text-center">
												<div style="width: 100px;">
													<?php echo DateThai($p->pr_prdate); ?>
												</div>
											</td>
											<td class="text-center">
												<?php echo $p->pr_reqname; ?>
											</td>
											<td class="text-center">
												<?php
													$this->db->select('*');
													$this->db->where('project_id',$p->pr_project);
													$q = $this->db->get('project');
													$res = $q->result();
													$pjname = "";
													foreach ($res as $r) {
													echo  $pjname = $r->project_name;
													}
													?>
												<?php
													$this->db->select('*');
													$this->db->where('department_id',$p->pr_department);
													$q = $this->db->get('department');
													$res = $q->result();
													$department_title = "";
													foreach ($res as $r) {
													echo  $department_title = $r->department_title;
													}
													?>
											</td>
											<td class="text-center">
												<?php
													$this->db->select('*');
													$this->db->where('systemcode',$p->pr_system);
													$q = $this->db->get('system');
													$ss = $q->result();
													$pr_system = "";
													foreach ($ss as $r) {
													echo  $pr_system = $r->systemname;
													}
													?>
											</td>
											<td class="text-left">
												<?php echo $p->pr_remark; ?>
											</td>
											<td class="text-center">
												<?php
													$this->db->select('*');
													$this->db->from('select_file_pr');
													$this->db->where('pr_ref',$p->pr_prno);
													$file=$this->db->get()->result();
													foreach ($file as $f) { ?>
												<b>เอกสารแนบ :
													<a href="<?php echo base_url(); ?>select_file_pr/<?php echo $f->name_file ?>"
													 style="color: red;">Download !!</a>
												</b>
												<?php } ?>
											</td>
											<td class="text-center">
												<?php if($p->express=="1"){ echo "<b style='color :red;'>ด่วน !</b>"; } ?>
											</td>
											<td>
												<span class="label label-success">approve</span>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li>
														<a id="openpo_v" data-toggle="modal" data-target="#openappp<?php echo $p->pr_prno; ?>"
														 data-popup="tooltip" title="" data-original-title="เปิด">
															<i class="icon-folder-open"></i>
														</a>
													</li>
													<li>
														<a class="preload" href="<?php echo base_url(); ?>pr/editpr/<?php echo $p->pr_prno; ?>"
														 data-popup="tooltip" title="" data-original-title="Edit">
															<i class="icon-pencil7"></i>
														</a>
													</li>

													<li>
														<a target="_blank" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_form.mrt&pr=<?php echo $p->pr_prid; ?>&pri=<?php echo $p->pr_prno; ?>"
														 data-popup="tooltip" title="" data-original-title="Print">
															<i class="icon-printer4"></i>
														</a>
													</li>
												</ul>
											</td>
										</tr>
										<?php $pri++; } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php $pri=1; foreach ($pr as $value) { ?>
						<div id="openappp<?php echo $value->pr_prno; ?>" class="modal fade">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">Open Detail PR No.:
											<?php echo $value->pr_prno; ?>
										</h5>
									</div>
									<div class="modal-body">
										<h3>
											<i class=" icon-file-empty"></i> Master</h3>
										<div class="col-md-6">
											<div class="form-group">
												<div class="col-lg-3">
													<div class="form-control-static">
														<p>PR No.:</p>
													</div>
												</div>
												<div class="col-lg-9">
													<div class="form-control-static">
														<p>
															<?php echo $value->pr_prno;?>
														</p>
													</div>
													<!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
													<input type="hidden" class="form-control" id="prapprov<?php echo $value->pr_prno; ?>"
													 value="<?php echo $value->pr_prno;?>" />
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
														<p>
															<?php echo $value->pr_reqname;?>
														</p>
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
														<p>
															<?php echo $value->pr_deliplace;?>
														</p>
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
														<p>
															<?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?>
														</p>
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
														<p>
															<?php
																	$this->db->select('*');
																	$this->db->where('project_id',$value->pr_project);
																	$q = $this->db->get('project');
																	$res = $q->result();
																	$pjname = "";
																	foreach ($res as $r) {
																	echo  $pjname = $r->project_name;
																	}
																?>
															<?php
																$this->db->select('*');
																$this->db->where('department_id',$value->pr_department);
																$q = $this->db->get('department');
																$res = $q->result();
																$department_title = "";
																foreach ($res as $r) {
																echo  $department_title = $r->department_title;
																}
															?>
														</p>
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
														<p>
															<?php echo $value->pr_remark;?>
														</p>
													</div>
												</div>
											</div>
										</div>
										<!--  -->
									</div>
									<div class="panel-body">
										<hr>
										<h3>
											<i class="icon-file-text2"></i> Detail</h3>
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
													<td>
														<?php echo $n; ?>
													</td>
													<td>
														<?php echo substr($valj->pri_costcode, -5); ?>
													</td>
													<td>
														<?php echo $valj->pri_matname; ?>
													</td>
													<td>
														<?php echo $valj->pri_qty; ?>&nbsp;
														<?php echo $valj->pri_unit; ?>
													</td>
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
						<?php $pri++; } ?>
						<div class="tab-pane active" id="bottom-tab1">
							<div class="col-md-12">
								<div class="dataTables_wrapper no-footer">
									<div class="table-responsive">
										<table class="table table-hover table-striped table-xxs datatable-basic">
											<thead>
												<tr>
													<th>Project Code</th>
													<th width="30%" class="text-left">Project Name</th>
													<th class="text-center">Control BOQ</th>
													<th class="text-center">Control Budget</th>
													<th class="text-center">Project Sub</th>
													<th class="text-center">PR</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($getproj as $key => $value) {
													?>
												<tr>
													<td>
														<?php echo $value->project_code; ?>
													</td>
													<td class="text-left">
														<?php echo $value->project_name; ?>
													</td>

													<td class="text-center">
														<?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
													</td>
													<td class="text-center">
														<?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
													</td>
													<td class="text-center">
														<a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $value->project_code;?>">Sub Project</a>
													</td>
													<td class="text-center">
														<a href="#">
															<button class="label label-info" id="pr_<?= $value->project_id; ?>">view pr</button>
															<span class="visible-xs-inline-block position-right">Git updates</span>
															<span class="count badge bg-warning-400">
																<?php echo $value->count; ?>
															</span>
														</a>
														<script type="text/javascript">
															$('#pr_<?= $value->project_id; ?>').click(function(event) {
																$('#pr_vv<?= $value->project_id; ?>').empty();
																var id_pr = "<?= $value->project_id; ?>"
																$.post('<?php echo base_url(); ?>purchase/count_pr', {
																	id_pr: id_pr
																}, function() {}).done(function(data) {
																	$('#view_pr').html(data);
																	$("#v_pr").modal('show');
																});

															});
														</script>
														<div id="view_pr"></div>
													</td>
													<td class="text-center">
														<a href="<?php echo base_url(); ?>purchase/openpo/<?php echo $value->project_id; ?>/p"
														 class="label label-primary">
															<i class="icon-folder-open"></i> Select</a>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?php if ($depid != "" && $depid != "0") {?>
						<?php } ?>
						<div class="tab-pane" id="bottom-tab2">
							<div class="col-md-12">
								<table class="table table-hover table-striped table-xxs datatable-basic">
									<thead>
										<tr>
											<th>Department Code</th>
											<th>Department Name</th>
											<th class="text-center">Control BOQ</th>
											<th width="110px" class="text-center">Control Budget</th>
											<!-- <th class="text-center">Project Sub</th> -->
											<th width="110px">PR</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($getdep as $key => $value) {?>
										<tr>
											<td>
												<?php echo $value->project_code; ?>
											</td>
											<td>
												<?php echo $value->project_name; ?>
											</td>
											<td class="text-center">
												<?php
														if ($value->chkconbqq != 0) {		
													?>
												<input type="checkbox" checked="checked" disabled="disabled">
												<?php
														}else{
													?>
												<input type="checkbox" disabled="disabled">
												<?php
														}
														
													?>
											</td>
											<td class="text-center">
												<?php
														if ($value->chkconbqq != 1) {		
													?>
												<input type="checkbox" checked="checked" disabled="disabled">
												<?php
														}else{
													?>
												<input type="checkbox" disabled="disabled">
												<?php
														}
														
													?>
											</td>
											<!-- <td class="text-center">
												<a class="label label-warning" data-toggle="modal" data-target="#subd<?php echo $value->project_code;?>">Sub Project</a>
											</td> -->
											<td>
												<a href="#">
													<button class="label label-info" id="dep_<?= $value->project_id ?>">
														view pr
													</button>
													<span class="visible-xs-inline-block position-right">Git updates</span>
													<span class="count badge bg-warning-400">
														<?php echo $value->count; ?>
													</span>
												</a>
												<script type="text/javascript">
													$('#dep_<?= $value->project_id ?>').click(function(event) {
														$('#dep_vv<?= $value->project_id ?>').empty();
														var id_pr = "<?= $value->project_id ?>";

														$.post('<?php echo base_url(); ?>purchase/count_wo_dep', {
															id_pr: id_pr
														}, function() {}).done(function(data) {
															$('#view_dep').html(data);
															$("#v_dep").modal('show');
														});

													});
												</script>
												<div id="view_dep"></div>

											</td>
											<td>
												<a href="<?php echo base_url(); ?>purchase/openpo/<?php echo $value->project_id; ?>/p"
												 class="label label-primary">
													<i class="icon-folder-open"></i> Select</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
		<?php foreach ($getproj as $key => $val) {?>
		<div id="sub<?php echo $val->project_code;?>" class="modal fade" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">
							<?php echo $val->project_name;?>
						</h5>
					</div>
					<div class="modal-body">
						<div class="col-md-12">
							<label for="">Sub Project </label>
							<table class="table table-bordered table-xxs table-hover">
								<thead>
									<tr>
										<td class="text-center">No.</td>
										<td class="text-center">Project Code:</td>
										<td class="text-center">Project Name:</td>
										<th class="text-center">Control BOQ</th>
										<th class="text-center">Control Budget</th>
										<td class="text-center">Select</td>

									</tr>
								</thead>
								<tbody>
									<?php
										$this->db->select('*');
										$this->db->where('project_sub',$val->project_id);
										$this->db->where('project_substatus',"Y");
										$sub = $this->db->get('project')->result();
										?>
									<?php $k=1; foreach ($sub as $keysub) { ?>
									<tr>
										<td class="text-center">
											<?php echo $k; ?>
										</td>
										<td class="text-center">
											<?php echo $keysub->project_code; ?>
										</td>
										<td class="text-center">
											<?php echo $keysub->project_name; ?>
										</td>
										<td class="text-center">
											<?php  if($keysub->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
										</td>
										<td class="text-center">
											<?php  if($keysub->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
										</td>
										<td class="text-center">
											<a href="<?php echo base_url(); ?>purchase/openpo/<?php echo $keysub->project_id; ?>/p"
											 class="label label-primary">
												<i class="icon-folder-open"></i> Select</a>
										</td>

									</tr>
									<?php $k++; } ?>
								</tbody>
							</table>
							<br>
						</div>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url(); ?>data_master/project_sub/<?php echo $val->project_id; ?>"
						 type="submit" class="label label-info">ADD Sub Project
							<i class="icon-check position-right"></i>
						</a>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php foreach ($getdep as $key => $val) {?>
		<div id="subd<?php echo $val->project_code;?>" class="modal fade" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">
							<?php echo $val->project_name;?>
						</h5>
					</div>
					<div class="modal-body">
						<div class="col-md-12">
							<label for="">Sub Project </label>
							<table class="table table-bordered table-xxs table-hover">
								<thead>
									<tr>
										<td class="text-center">No.</td>
										<td class="text-center">Project Code:</td>
										<td class="text-center">Project Name:</td>
										<th class="text-center">Control BOQ</th>
										<th class="text-center">Control Budget</th>
										<td class="text-center">Select</td>

									</tr>
								</thead>
								<tbody>
									<?php
										$this->db->select('*');
										$this->db->where('project_sub',$val->project_id);
										$this->db->where('project_substatus',"Y");
										$sub = $this->db->get('project')->result();
										?>
									<?php $k=1; foreach ($sub as $keysub) { ?>
									<tr>
										<td class="text-center">
											<?php echo $k; ?>
										</td>
										<td class="text-center">
											<?php echo $keysub->project_code; ?>
										</td>
										<td class="text-center">
											<?php echo $keysub->project_name; ?>
										</td>
										<td class="text-center">
											<?php  if($keysub->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
										</td>
										<td class="text-center">
											<?php  if($keysub->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
										</td>
										<td class="text-center">
											<a href="<?php echo base_url(); ?>purchase/openpo/<?php echo $keysub->project_id; ?>/p"
											 class="label label-primary">
												<i class="icon-folder-open"></i> Select</a>
										</td>

									</tr>
									<?php $k++; } ?>
								</tbody>
							</table>
							<br>
						</div>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url(); ?>data_master/project_sub/<?php echo $val->project_id; ?>"
						 type="submit" class="label label-info">ADD Sub Project
							<i class="icon-check position-right"></i>
						</a>
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- Highlighting rows and columns -->
		<!-- /highlighting rows and columns -->
	</div>
	<!-- /content area -->
</div>
<!-- /main content -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!-- /core JS files -->
<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '100px',
			targets: [2]
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
	$('.datatable-basic').DataTable();
</script>
<script type="text/javascript">
	$('#po_purchase').attr('class', 'active');
	$('#new_po').attr('style', 'background-color:#dedbd8');
</script>