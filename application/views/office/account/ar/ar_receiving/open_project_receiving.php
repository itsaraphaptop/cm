<div class="content-wrapper">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
			</div>
		</div>
		<div class="content">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Select Project Planning</h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>
				<div class="panel-body">
					<div class="col-md-6">
						<div class="dataTables_wrapper no-footer">
					        <div class="table-responsive">
					            <table class="table table-hover table-bordered  table-xxs datatable-basic">
									<thead>
										<tr>
											<th width="20%" class="text-center">Project Code</th>
											<th width="60%" class="text-center">Project Name</th>
											<th width="20%" class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
											<?php foreach ($getproj as $key => $value) {?>
											<tr>
												<td><?php echo $value->project_code; ?></td>
												<td><?php echo $value->project_name; ?></td>

												<td><a href="<?php echo base_url(); ?>index.php/ar/ar_receiving/<?php echo $value->project_code; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>

											</tr>
											<?php } ?>
									</tbody>
								</table>
				 			</div>
						</div>
					</div>
					<?php if ($depid != "" && $depid != "0") {?>
					<div class="col-md-6">
						<table class="table table-hover table-bordered table-xxs datatable-basic">
							<thead>
								<tr>
									<th>Department Code</th>
									<th>Department Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($getdep as $key => $value) {?>
								<tr>
									<td><?php echo $value->department_code; ?></td>
									<td><?php echo $value->department_title; ?></td>

									<td><a href="<?php echo base_url(); ?>index.php/purchase/openpo/<?php echo $value->department_id; ?>/d" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<?php } ?>
				</div>
          	</div>
		</div>
	</div>
			<!-- /main content -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basic').DataTable();
</script>