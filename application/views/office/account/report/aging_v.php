
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
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
							</div>
						</div>
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
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Report Aging - รายงานเงินค้างชำระ</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

							<!-- <div class="category-content text-center">
										<div id="reportrange" class="daterange-custom">
											<div class="daterange-custom-display"></div>
										</div>
									</div> -->

							<div class="row">
								<div class="form-group">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-lg-3 control-label">Start:</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control daterange-single" id="startdate" name="startdate" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-lg-3 control-label">End:</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control daterange-single" id="enddate" name="enddate" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<button type="button" name="button" id="find" class="btn btn-info"><i class="icon-search4"></i> Search</button>
									<a href="#"  id="print" class="btn btn-info"><i class="icon-printer2"></i> Print</a>
								</div>
							</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-lg-3 control-label">Project :</label>
										<div class="col-lg-9">
                      <select class="select-menu2-color" id="toproject" name="toproject">
                        <?php foreach ($getproj as $value) {?>
                          <option value="<?php echo $value->project_id; ?>"><?php echo $value->project_name; ?></option>
                      <?php	} ?>
                      </select>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div id="loadtable">
		              <!-- <div class="dataTables_wrapper no-footer">
		  						<div class="table-responsive">
									<table class="table table-striped table-xs">
									<thead>
										<tr>
											<th  class="text-center">Stock Date</th>
											<th  class="text-center">Material Name</th>
											<th  class="text-center">Type</th>
											<th  class="text-center">Receive</th>
											<th  class="text-center">Issue</th>
											<th  class="text-center">Srock Balance</th>
										</tr>
									</thead>
									<tbody>
		                <?php foreach ($res as $value) {?>
		                  <tr>
		                    <td><h6><?php echo $value->stock_date; ?></h6></td>
		                    <td><?php echo $value->stock_matname; ?></td>
												<td><?php echo $value->stock_type; ?></td>
		                    <td><?php echo $value->stock_qty; ?></td>
		                    <td><?php echo $value->stock_qty; ?></td>
		                    <td class="text-center"><?php echo $value->stock_qty; ?></td>
		                  </tr>
		                <?php } ?>
									</tbody>
								</table>
								</div>
		          </div> -->
						</div>
					</div>
          </div>
					<!-- /highlighting rows and columns -->



					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
			<!-- <script>
				$("#find").click(function(){
					var	startdate =  $("#startdate").val();
					var	enddate =  $("#enddate").val();
					var	material =  $("#material").val();
					// var startdate = $("input[name='daterangepicker_start']").val();
					// var enddate = $("input[name='daterangepicker_end']").val();
					$("#loadtable").load('<?php echo base_url(); ?>index.php/inventory/service_table_stockcard/'+startdate+'/'+enddate+'/'+material);
				});
			</script> -->
