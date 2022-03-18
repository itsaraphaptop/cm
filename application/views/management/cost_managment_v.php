
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
						<div class="row">

						</div>
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
											<th rowspan="2" class="sorting_asc text-right" tabindex="0" aria-controls="DataTables_Table_3" colspan="1" style="width: 117px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Petty Cash</th>
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
                    <?php $eesum=0; $acsum=0; $snsum=0; $civilsum=0; $totalsum=0; $ofsum=0; foreach ($projectname as $v) {
                    	// AC cash basis
                    	 $baac = $this->db->query("select sum(doci_netamt) as netamt from pv_apo_detail join pv_apo_header on  pv_apo_header.apo_code=pv_apo_detail.doci_ref where pv_apo_header.apo_system='2' and pv_apo_header.apo_project='$v->project_id' and pv_apo_header.apo_status='wait' and pv_apo_header.apo_doctype='apv'");
                    	 $rbaac = $baac->result();
                    	// EE
                    	$baee = $this->db->query("select sum(doci_netamt) as netamt from pv_apo_detail join pv_apo_header on  pv_apo_header.apo_code=pv_apo_detail.doci_ref where pv_apo_header.apo_system='3' and pv_apo_header.apo_project='$v->project_id' and pv_apo_header.apo_status='wait' and pv_apo_header.apo_doctype='apv'");
                    	$rbaee = $baee->result();
                    	// SN
                    	$basn = $this->db->query("select sum(doci_netamt) as netamt from pv_apo_detail join pv_apo_header on  pv_apo_header.apo_code=pv_apo_detail.doci_ref where pv_apo_header.apo_system='4' and pv_apo_header.apo_project='$v->project_id' and pv_apo_header.apo_status='wait' and pv_apo_header.apo_doctype='apv'");
                    	$barsn = $basn->result();
                    	// total
                    	$totalbasis = $this->db->query("select sum(doci_netamt) as netamt from pv_apo_detail join pv_apo_header on  pv_apo_header.apo_code=pv_apo_detail.doci_ref where pv_apo_header.apo_project='$v->project_id' and pv_apo_header.apo_status='wait' and pv_apo_header.apo_doctype='apv'");
                    	$gtotbasis = $totalbasis->result();

                    	// actual cost
                    	$ac = $this->db->query("select Sum(po_item.poi_netamt) as netamt FROM po INNER JOIN po_item ON po.po_pono = po_item.poi_ref WHERE po.ic_status = 'wait' and po.po_system='2' and po.po_project='$v->project_id'");
                    	$rae = $ac->result();
                    	$ee = $this->db->query("select Sum(po_item.poi_netamt) as netamt FROM po INNER JOIN po_item ON po.po_pono = po_item.poi_ref WHERE po.ic_status = 'wait' and po.po_system='3' and po.po_project='$v->project_id'");
                    	$ree = $ee->result();
                    	$sn = $this->db->query("select Sum(po_item.poi_netamt) as netamt FROM po INNER JOIN po_item ON po.po_pono = po_item.poi_ref WHERE po.ic_status = 'wait' and po.po_system='4' and po.po_project='$v->project_id'");
                    	$rsn = $sn->result();
                    	$total = $this->db->query("select Sum(po_item.poi_netamt) as netamt FROM po INNER JOIN po_item ON po.po_pono = po_item.poi_ref WHERE po.ic_status = 'wait' and po.po_project='$v->project_id'");
                    	$gtot = $total->result();
                    	$petty = $this->db->query("select Sum(pettycash_item.pettycashi_netamt) as netamt FROM pettycash INNER JOIN pettycash_item ON pettycash.docno = pettycash_item.pettycashi_ref WHERE pettycash.status = 'paid' and pettycash.project='$v->project_id'");
                    	$qpetty = $petty->result();

                    ?>
  									<tr>

											<!-- <td><?php echo $v->project_code; ?></td> -->
  										<td><?php echo $v->project_name; ?></td>
  										<?php foreach ($ree as $eee) {?>
  										<td class="text-right"><?php echo number_format($eee->netamt,2); ?></td> <!-- EE -->
  										<?php $eesum=$eesum+$eee->netamt; } ?>
  										<?php foreach ($rae as $acc) {?>
  										<td class="text-right"><?php echo number_format($acc->netamt,2); ?></td> <!-- AC -->
  										<?php  $acsum=$acsum+$acc->netamt; } ?>
  										<?php foreach ($rsn as $asn) {?>
  										<td class="text-right"><?php echo number_format($asn->netamt,2); ?></td> <!-- AC -->
  										<?php $snsum=$snsum+$asn->netamt; } ?>
  										<?php foreach ($gtot as $atot) {?>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($atot->netamt,2); ?></span></td>
  										<?php  } ?>
  										<!-- cash basis -->
  										<?php foreach ($rbaac as $bax) {?>
											<td class="text-right"><?php echo number_format($bax->netamt,2); ?></td>
										<?php } ?>
										<?php foreach ($rbaee as $bay) {?>
											<td class="text-right"><?php echo number_format($bay->netamt,2); ?></td>
										<?php } ?>
										<?php foreach ($barsn as $bau) {?>
											<td class="text-right"><?php echo number_format($bau->netamt,2) ?></td>
										<?php } ?>
										<?php foreach ($gtotbasis as $totbasise) {?>
											<td class="text-right"><span class="label label-success"><?php echo number_format($totbasise->netamt,2); ?></span></td>
										<?php } ?>
											<?php foreach ($qpetty as $e) {?>
											<td class="text-right"><span class="label label-success"><?php echo number_format($e->netamt,2); ?></span></td>
											<?php } ?>
                      <!-- <td>
  											<ul class="icons-list">
  												<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-chart"></i></a></li>
  												<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-stats-dots"></i></a></li>
													<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pie-chart"></i></a></li>
  												<li><a data-toggle="modal" data-target="#chart<?php echo $v->project_id; ?>" id="chartid<?php echo $v->project_id; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-stats-growth"></i></a></li>
  											</ul>
  										</td> -->
											<td>
											<div class="btn-group">
												<a href="#" class="label bg-teal dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url(); ?>management/bymat_manage/<?php echo $v->project_code; ?>/<?php echo $v->project_id; ?>"><i class="fa fa-folder-open" aria-hidden="true"></i> By Material</a></li>
													<li><a class="preload" href="<?php echo base_url();?>management/bycost_manage/<?php echo $v->project_code;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> By Cost Code</a></li>
													<li><a id="sweet_combine"><i class="fa fa-trash-o"></i> By Purchase</a></li>
												</ul>
											</div>
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
                    <?php $totalsum=$eesum+$acsum+$snsum; } ?>
  								</tbody>
                  <tbody>
  									<tr>
  										<th class="text-center">Summary</th>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($eesum,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($acsum,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($snsum,2); ?></span></td>
											<td class="text-right"><span class="label label-success"><?php echo number_format($totalsum,2); ?></span></td>
											<td class="text-right"><span class="label label-success"></span></td>
											<td class="text-right"><span class="label label-success"></span></td>
											<td class="text-right"><span class="label label-success"></span></td>
											<td class="text-right"><span class="label label-success"></span></td>
											<td class="text-right"><span class="label label-warning"></span></td>
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
