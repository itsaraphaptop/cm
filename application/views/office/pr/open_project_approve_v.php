<div class="content-wrapper">
	<div class="content">
		<!-- Highlighting rows and columns -->

		<div class="panel panel-flat">


			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-component">
						<li class="active">
							<a href="#default-pill1" data-toggle="tab" aria-expanded="false">Project</a>
						</li>
						<li class="">
							<a href="#default-pill2" data-toggle="tab" aria-expanded="true">Department</a>
						</li>
						<li>
							<!-- <a href="#default-pill3" data-toggle="tab" aria-expanded="false">Project Booking</a> -->
						</li>
						<li>
							<!-- <a href="#default-pill4" data-toggle="tab" aria-expanded="true">Department Booking</a> -->
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="default-pill1">
							<div class="col-md-12">
								<div class="dataTables_wrapper no-footer">
									<div class="table-responsive">
										<table class="table table-hover table-striped table-xxs datatable-basic">
											<thead>
												<tr>
													<th width="20%" class="text-center">Project Code</th>
													<th width="60%" class="text-center">Project Name</th>
													<th class="text-center">Control BOQ</th>
													<th class="text-center">Control Budget</th>
													<th>Project Sub</th>
													<th width="20%" class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($getproj as $key => $value) {?>
												<tr>
													<td>
														<?php echo $value->project_code; ?>
													</td>
													<td>
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
														<a href="<?php echo base_url(); ?>pr/pr_approve/<?php echo $value->project_code; ?>/<?php echo $value->project_id; ?>"
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
						<div class="tab-pane" id="default-pill2">
							<div class="col-md-12">
								<table class="table table-hover table-striped table-xxs datatable-basic">
									<thead>
										<tr>
											<th>Department Code</th>
											<th>Department Name</th>
											<th class="text-center">Control BOQ</th>
											<th class="text-center">Control Budget</th>
											<th>Project Sub</th>
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
												<?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
											</td>
											<td class="text-center">
												<?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
											</td>
											<td class="text-center">
												<a class="label label-warning" data-toggle="modal" data-target="#subd<?php echo $value->project_code;?>">Sub Project</a>
											</td>
											<td>
												<a href="<?php echo base_url(); ?>pr/pr_approve/<?php echo $value->project_code; ?>/<?php echo $value->project_id; ?>"
												 class="label label-primary">
													<i class="icon-folder-open"></i> Select</a>
												<!-- <a href="<?php echo base_url(); ?>pr/pr_approve_dep/
												<?php echo $value->project_id; ?>/p" class="label label-primary">
												<i class="icon-folder-open"></i> Select</a> -->
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

						</div>


						<div class="tab-pane" id="default-pill3">
							<div class="col-md-12">
								<div class="dataTables_wrapper no-footer">
									<div class="table-responsive">
										<table class="table table-hover table-bordered  table-xxs datatable-basic">
											<thead>
												<tr>
													<th width="20%" class="text-center">Project Code</th>
													<th width="60%" class="text-center">Project Name</th>
													<th class="text-center">Control BOQ</th>
													<th class="text-center">Control Budget</th>
													<th>Project Sub</th>
													<th width="20%" class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($getproj as $key => $value) {?>
												<tr>
													<td>
														<?php echo $value->project_code; ?>
													</td>
													<td>
														<?php echo $value->project_name; ?>
													</td>
													<td class="text-center">
														<?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
													</td>
													<td class="text-center">
														<?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
													</td>
													<th class="text-center">
														<a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $value->project_code;?>">Sub Project</a>
													</th>
													<td class="text-center">
														<a href="<?php echo base_url(); ?>pr/pr_approve_bk/<?php echo $value->project_code; ?>/<?php echo $value->project_id; ?>"
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


						<div class="tab-pane" id="default-pill4">
							<div class="col-md-12">
								<table class="table table-hover table-bordered table-xxs datatable-basic">
									<thead>
										<tr>
											<th>Department Code</th>
											<th>Department Name</th>
											<th class="text-center">Control BOQ</th>
											<th class="text-center">Control Budget</th>
											<th>Project Sub</th>
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
												<?php  if($value->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
											</td>
											<td class="text-center">
												<?php  if($value->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?>
											</td>
											<td class="text-center">
												<a class="label label-warning" data-toggle="modal" data-target="#subd<?php echo $value->project_code;?>">Sub Project</a>
											</td>
											<td>
												<a href="<?php echo base_url(); ?>pr/pr_approve_dep_bk/<?php echo $value->project_id; ?>/p"
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





		<!-- Highlighting rows and columns -->

		<!-- /highlighting rows and columns -->




	</div>
	<!-- /content area -->

</div>
<!-- /main content -->

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
									<a href="<?php echo base_url(); ?>pr/pr_approve/<?php echo $keysub->project_code; ?>/<?php echo $keysub->project_id; ?>"
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
									<a href="<?php echo base_url(); ?>pr/pr_approve/<?php echo $keysub->project_code; ?>/<?php echo $keysub->project_id; ?>"
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
<script type="text/javascript">
$('#purchase').attr('class', 'active'); 
$('#pr_approve').attr('style', 'background-color:#dedbd8');
</script>