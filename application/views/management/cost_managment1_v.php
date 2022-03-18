
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
							<h5 class="panel-title">Cost Management</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">


					  </div>
            <div class="table-responsive">
  							<table class="table table-columned" style="font-size:10px;">
  								<!-- <thead>
  									<tr >
											<th class="text-center" width="10%">
												Project Code
											</th>
  										<th class="text-center" width="20%">Project</th>
  										<th class="text-center" width="20%">Purchase Cost</th>
  										<th class="text-center"></th>
  										<th class="text-center" width="10%">Action</th>
  									</tr>
  								</thead> -->
									<thead>
										<tr role="row" style="height: 45px;">
											<th rowspan="2" class="sorting_asc text-center" tabindex="0" aria-controls="DataTables_Table_3" colspan="1" style="width: 285px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Project</th>
											<th class="text-center" colspan="4" rowspan="1" style="width: 787px;">Accrual Basis (Exc.VAT)</th>
											<th class="text-center" colspan="4" rowspan="1" style="width: 820px;">Cash Basis  (Exc.VAT)</th>
											<th rowspan="2" class="sorting_asc text-right" tabindex="0" aria-controls="DataTables_Table_3" colspan="1" style="width: 117px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">P/O <br>Petty Cash <br>Subcontractor</th>
											<th rowspan="2" class="sorting_asc text-center" tabindex="0" aria-controls="DataTables_Table_3" colspan="1" style="width: 150px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Action</th>
										</tr>
						        <tr role="row" style="height: 46px;">
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Username: activate to sort column ascending">EE</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Position: activate to sort column ascending">AC</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Office: activate to sort column ascending">SN</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Age: activate to sort column ascending">Total</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Username: activate to sort column ascending">EE</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Position: activate to sort column ascending">AC</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Office: activate to sort column ascending">SN</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Age: activate to sort column ascending">Total</th>
										</tr>
						    </thead>
  								<tbody>
                    <?php $eesum=0; $acsum=0; $snsum=0; $civilsum=0; $totalsum=0; $ofsum=0; foreach ($actual as $v) {?>
  									<tr>

											<!-- <td><?php echo $v->project_code; ?></td> -->
  										<td><?php echo $v->project_name; ?></td>
  										<td class="text-right"><?php echo number_format($v->ee,2); ?></td>
  										<td class="text-right"><?php echo number_format($v->ac,2); ?></td>
											<td class="text-right"><?php echo number_format($v->sn,2); ?></td>
											<td class="text-right"><span class="label label-success"><?php echo number_format($v->ee+$v->ac+$v->sn,2); ?></span></td>
											<td class="text-right"><?php echo number_format($v->civil,2); ?></td>
											<td class="text-right"><?php echo number_format($v->civil,2); ?></td>
											<td class="text-right"><?php echo number_format($v->civil,2); ?></td>
											<td class="text-right"><span class="label label-success"><?php echo number_format($v->civil,2); ?></span></td>
											<td class="text-right"><span class="label label-warning"><?php echo number_format($v->of,2); ?></span></td>
                      <td>
  											<ul class="icons-list">
  												<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-chart"></i></a></li>
  												<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-stats-dots"></i></a></li>
													<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pie-chart"></i></a></li>
  												<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-stats-growth"></i></a></li>
  											</ul>
  										</td>
  									</tr>

										<div id="chart<?php echo $v->project_id; ?>" class="modal fade">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Cost Management Chart - Project <?php echo $v->project_name; ?></h5>
													</div>

													<div class="modal-body">
														<div class="alert alert-info alert-styled-left text-blue-800 content-group">
																			<span class="text-semibold">Here we go!</span> Cost Management Chart - Project <?php echo $v->project_name; ?>
																			<button type="button" class="close" data-dismiss="alert">×</button>
																	</div>

													<div class="row">
														<div class="col-lg-12">
															<!-- Streamgraph chart -->
															<div class="chart-container">
																<div class="chart" id="d3-streamgraph<?php echo $v->project_id; ?>"></div>
															</div>
															<!-- /streamgraph chart -->


										</div>

													</div>
													</div>

													<div class="modal-footer">
														<button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
														<button class="btn btn-primary"><i class="icon-check"></i> Save</button>
													</div>
												</div>
											</div>
										</div>
										<!-- /iconified modal -->
                    <?php
													$eesum = $eesum+$v->ee;
													$acsum = $acsum+$v->ac;
													$snsum = $snsum+$v->sn;
													$totalsum = $totalsum+($v->ee+$v->ac+$v->sn);
													$ofsum = $ofsum+$v->of;
													$civilsum = $civilsum+$v->civil;
											}
										?>
  								</tbody>
                  <tbody>
  									<tr>
  										<th class="text-center">Summary</th>
  										<td class="text-right"><span class="label label-danger"><?php echo number_format($eesum,2); ?></span></td>
  										<td class="text-right"><span class="label label-danger"><?php echo number_format($acsum,2); ?></span></td>
  										<td class="text-right"><span class="label label-danger"><?php echo number_format($snsum,2); ?></span></td>
											<td class="text-right"><span class="label label-success"><?php echo number_format($totalsum,2); ?></span></td>
											<td class="text-right"><span class="label label-danger"><?php echo number_format($civilsum,2); ?></span></td>
											<td class="text-right"><span class="label label-danger"><?php echo number_format($civilsum,2); ?></span></td>
											<td class="text-right"><span class="label label-danger"><?php echo number_format($civilsum,2); ?></span></td>
											<td class="text-right"><span class="label label-success"><?php echo number_format($civilsum,2); ?></span></td>
											<td class="text-right"><span class="label label-warning"><?php echo number_format($ofsum,2); ?></span></td>
											<td class="text-right"></td>
  									</tr>
  								</tbody>
  							</table>
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
