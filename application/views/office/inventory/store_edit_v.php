
<!-- Main content store-->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Store</a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">

				<div class="row">
					<div class="col-lg-4">
						<!-- Available hours -->
									<div class="panel text-center border-left-lg border-left-pink">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown text-muted">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
						                	</div>

						                	<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="hours-available-progress"></div>
											<!-- /progress counter -->


											<!-- Bars -->
											<div id="hours-available-bars"></div>
											<!-- /bars -->

										</div>
									</div>
									<!-- /available hours -->
					</div>

					<div class="col-lg-4">
						<!-- Productivity goal -->
									<div class="panel text-center border-left-lg border-left-indigo">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown text-muted">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div>

											<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="goal-progress"></div>
											<!-- /progress counter -->

											<!-- Bars -->
											<div id="goal-bars"></div>
											<!-- /bars -->

										</div>
									</div>
									<!-- /productivity goal -->
					</div>

					<div class="col-lg-4">
						<!-- Productivity goal -->
									<div class="panel text-center border-left-lg border-left-success">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown text-muted">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div>

											<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="goal-approve"></div>
											<!-- /progress counter -->

											<!-- Bars -->
											<div id="goal-bars"></div>
											<!-- /bars -->

										</div>
									</div>
									<!-- /productivity goal -->
					</div>
				</div>

					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Store Project - <?php echo $project; ?></h5>
							<div class="heading-elements">
								<a href="<?php echo base_url(); ?>inventory/main_store_list"><span class="label label-default heading-text">Back</span></a>
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
						</div>
              <div class="dataTables_wrapper no-footer">
  						<div class="table-responsive">
							<table class="table table-bordered table-striped table-xxs datatable-basic">
							<thead>
								<tr>
									<th  class="text-center">Material Code</th>
									<th  class="text-center">Material Name</th>
									<th  class="text-center" width="15%">QTY</th>
									<th  class="text-center">Unit</th>
									<th class="text-center">Warehouse</th>
									<!-- <th  class="text-center">Actions</th> -->
								</tr>
							</thead>
							<tbody>
							    <?php $n=0; foreach ($res as $value) {?>
                    			<tr>
  							      <td><?php echo $value->store_matcode; ?></td>
			                      <td><?php echo $value->store_matname; ?></td>
			                      <td>
			                      <div class="input-group">
			                      	<input type="number" class="form-control" id="total<?php echo $n; ?>" value="<?php echo $value->store_total; ?>">
			                      	<div class="input-group-btn">
			                      		<button class="btn btn-success" id="btn<?php echo $n; ?>"> Update</button>
			                      	</div>
			                      </div>
			                      </td>
			                      <td><?php echo $value->store_unit; ?></td>
			                      <td><?php echo $value->whname; ?></td>
                    			</tr>
                    			<script>
                    				$("#btn<?php echo $n; ?>").click(function(){
                    					  var url="<?php echo base_url(); ?>inventory_active/update_store_d";
										  var dataSet={
										  	  storeid : "<?php echo $value->store_id; ?>",
										  	  matcode : "<?php echo $value->store_matcode; ?>",
										  	  project: "<?php echo $value->store_project; ?>",
										      tot : $("#total<?php echo $n; ?>").val(),
										    };
										  $.post(url,dataSet,function(data){
										  	swal({
											            title: "ปรับปรุงยอดเป็น "+data,
											            text: "Save Completed!!.",
											            // confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
										  $('#total<?php echo $n; ?>').val(data);
										  });
										////////////////////////////////
                    				});
                    			</script>
							    <?php $n++; } ?>
							</tbody>
						</table>
						</div>
          </div>
					</div>

					<!-- /highlighting rows and columns -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
<script>
$.extend( $.fn.dataTable.defaults, {
		 autoWidth: false,
		 columnDefs: [{
				 orderable: false,
				 width: '100px',
				 targets: [ 3 ]
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
