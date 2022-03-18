<div class="content-wrapper">
	<div class="content">

		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Select Purchase Requisition System(PR)</h5>
			</div>

			<div class="panel-body">

				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-component">
						<li class="active">
							<a href="#bottom-tab1" data-toggle="tab" aria-expanded="false">Project</a>
						</li>
						<li class="">
							<a href="#bottom-tab2" data-toggle="tab" aria-expanded="true">Department</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="bottom-tab1">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<!-- <div class="form-group">
											<div class="has-feedback has-feedback-left">
												<input type="text" class="form-control input-xlg" id="textpj" placeholder="Filter By Project Name">
												<div class="form-control-feedback">
													<i class="icon-search4 text-muted text-size-base"></i>
												</div>
											</div>
										</div> -->
									</div>
								</div>
								<table class="table table-hover table-striped table-xxs datatable-basic">
									<thead>
										<tr>
											<th class="text-center">Project Code</th>
											<th width="30%" class="text-center">Project Name</th>
											<th class="text-center">Control BOQ</th>
											<th class="text-center">Control Budget</th>
											<th class="text-center">Project Sub</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody id="loadproject">
										<?php foreach ( $getproj as $key => $value ) {?>
										<tr>
											<td class="text-center">
												<?php echo $value->project_code; ?>
											</td>
											<td>
												<?php echo $value->project_name; ?>
											</td>

											<td class="text-center">
												<?php if ( $value->chkconbqq == '1' ) {echo '<input type="checkbox" checked="checked" disabled="disabled">';} else {echo '<input type="checkbox"  disabled="disabled">';}?>
											</td>
											<td class="text-center">
												<?php if ( $value->controlbg == '2' ) {echo '<input type="checkbox" checked="checked" disabled="disabled">';} else {echo '<input type="checkbox"  disabled="disabled">';}?>
											</td>
											<td class="text-center">
												<a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $value->project_code; ?>">Sub Project</a>
											</td>
											<td class="text-center">
												<a href="<?php echo base_url(); ?>office/newpr/<?php echo $value->project_id; ?>/p"
												 class="label label-primary">
													<i class="icon-folder-open"></i> Select</a>
											</td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
							<script type="text/javascript">
								$("#textpj").keyup(function() {
									$('#loadproject').html(
										"<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading..."
									);
									$("#loadproject").load(
										'<?php echo base_url(); ?>share/find_project/' + $("#textpj").val()
									);
								})
							</script>
						</div>

						<div class="tab-pane" id="bottom-tab2">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<!-- <div class="form-group">
											<div class="has-feedback has-feedback-left">
												<input type="text" class="form-control input-xlg" id="textnn" placeholder="Filter By Department Name">
												<div class="form-control-feedback">
													<i class="icon-search4 text-muted text-size-base"></i>
												</div>
											</div>
										</div> -->
									</div>
								</div>
								<table class="table table-hover table-striped table-xxs datatable-basic">
									<thead>
										<tr>
											<th>Department Code</th>
											<th>Department Name</th>
											<th class="text-center">Control BOQ</th>
											<th class="text-center">Control Budget</th>
											<th class="text-center">Project Sub</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="loaddpt">

										<?php foreach ( $getdep as $key => $value ) {?>
										<tr>
											<td>
												<?php echo $value->project_code; ?>
											</td>
											<td>
												<?php echo $value->project_name; ?>
											</td>
											<td class="text-center">
												<?php
if ( $value->chkconbqq != 0 ) {
    ?>
												<input type="checkbox" checked="checked" disabled="disabled">
												<?php
} else {
    ?>
												<input type="checkbox" disabled="disabled">
												<?php
}

    ?>
											</td>
											<td class="text-center">
												<?php
if ( $value->chkconbqq != 1 ) {
        ?>
												<input type="checkbox" checked="checked" disabled="disabled">
												<?php
} else {
        ?>
												<input type="checkbox" disabled="disabled">
												<?php
}

    ?>
											</td>
											<td class="text-center">
												<a class="label label-warning" data-toggle="modal" data-target="#subd<?php echo $value->project_code; ?>">Sub Project</a>
											</td>
											<td class="text-center">
												<a href="<?php echo base_url(); ?>office/newpr/<?php echo $value->project_id; ?>/p"
												 class="label label-primary">
													<i class="icon-folder-open"></i> Select</a>
											</td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>



			</div>

			<script type="text/javascript">
				$("#textnn").keyup(function() {
					$('#loaddpt').html(
						"<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading..."
					);
					$("#loaddpt").load('<?php echo base_url(); ?>share/find_department/' +
						$("#textnn").val());
				})
			</script>



			<!-- Highlighting rows and columns -->

			<!-- /highlighting rows and columns -->




		</div>
		<!-- /content area -->

	</div>
	<!-- /main content -->
	<?php foreach ( $getdep as $key => $val ) {?>

	<div id="subd<?php echo $val->project_code; ?>" class="modal fade" data-backdrop="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">
						<?php echo $val->project_name; ?>
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
									<th>Control BOQ</th>
									<th>Control Budget</th>
									<td class="text-center">Select</td>

								</tr>
							</thead>
							<tbody>
								<?php
$this->db->select( '*' );
    $this->db->where( 'project_sub', $val->project_id );
    $this->db->where( 'project_substatus', "Y" );
    $sub = $this->db->get( 'project' )->result();
    ?>
								<?php $k = 1;foreach ( $sub as $keysub ) {?>
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
										<?php if ( $keysub->controlbg == '2' ) {echo '<input type="checkbox" checked="checked" disabled="disabled">';} else {echo '<input type="checkbox"  disabled="disabled">';}?>
									</td>
									<td class="text-center">
										<?php if ( $keysub->chkconbqq == '1' ) {echo '<input type="checkbox" checked="checked" disabled="disabled">';} else {echo '<input type="checkbox"  disabled="disabled">';}?>
									</td>
									<td class="text-center">
										<a href="<?php echo base_url(); ?>office/newpr/<?php echo $keysub->project_id; ?>/p"
										 class="label label-primary">
											<i class="icon-folder-open"></i> Select</a>
									</td>

								</tr>
								<?php $k++;}?>
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
	<?php }?>
	<?php foreach ( $getproj as $key => $val ) {?>

	<div id="sub<?php echo $val->project_code; ?>" class="modal fade" data-backdrop="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">
						<?php echo $val->project_name; ?>
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
									<th>Control BOQ</th>
									<th>Control Budget</th>
									<td class="text-center">Select</td>

								</tr>
							</thead>
							<tbody>
								<?php
$this->db->select( '*' );
    $this->db->where( 'project_sub', $val->project_id );
    $this->db->where( 'project_substatus', "Y" );
    $sub = $this->db->get( 'project' )->result();
    ?>
								<?php $k = 1;foreach ( $sub as $keysub ) {?>
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
										<?php if ( $keysub->controlbg == '2' ) {echo '<input type="checkbox" checked="checked" disabled="disabled">';} else {echo '<input type="checkbox"  disabled="disabled">';}?>
									</td>
									<td class="text-center">
										<?php if ( $keysub->chkconbqq == '1' ) {echo '<input type="checkbox" checked="checked" disabled="disabled">';} else {echo '<input type="checkbox"  disabled="disabled">';}?>
									</td>
									<td class="text-center">
										<a href="<?php echo base_url(); ?>office/newpr/<?php echo $keysub->project_id; ?>/p"
										 class="label label-primary">
											<i class="icon-folder-open"></i> Select</a>
									</td>

								</tr>
								<?php $k++;}?>
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
	<?php }?>



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



		$('#purchase').attr('class', 'active');
		$('#new_pr').attr('style', 'background-color:#dedbd8');
	</script>