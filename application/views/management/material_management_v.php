
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
							<h5 class="panel-title">Cost Management By Material</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
<?php foreach ($res as $key => $v) {
	$project_id = $v->project_id;
	$projcode = $v->project_code;
	$projname = $v->project_name;
} ?>
						<div class="panel-body">
						<h6><?php echo $projcode; ?> - <?php echo $projname;?></h6>

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
											<th rowspan="2" class="sorting_asc text-center" tabindex="0" aria-controls="DataTables_Table_3" colspan="1" style="width: 100px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Cost Code</th>
											<th rowspan="2" class="sorting_asc text-center" tabindex="0" aria-controls="DataTables_Table_3" colspan="1" style="width: 285px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Cost Name</th>
											<th class="text-center" colspan="5" rowspan="1" style="width: 787px;">Accrual Basis (Inc.VAT)</th>
											<th class="text-center" colspan="5" rowspan="1" style="width: 820px;">Cash Basis  (Inc.VAT)</th>
											<th rowspan="2" class="sorting_asc text-right" tabindex="0" aria-controls="DataTables_Table_3" colspan="1" style="width: 117px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Petty Cash</th>
										</tr>
						        <tr role="row" style="height: 46px;">
						        			<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Username: activate to sort column ascending">Overhead</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Username: activate to sort column ascending">EE</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Position: activate to sort column ascending">AC</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Office: activate to sort column ascending">SN</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Age: activate to sort column ascending">Total</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Username: activate to sort column ascending">Overhead</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Username: activate to sort column ascending">EE</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Position: activate to sort column ascending">AC</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Office: activate to sort column ascending">SN</th>
											<th class="sorting text-center" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" style="width: 117px;" aria-label="Age: activate to sort column ascending">Total</th>
										</tr>
						    </thead>
  								<tbody>
  								<?php
  								$toteecab=0; $totaccab=0; $totsncab=0; $totgcab=0; $totovcab=0;
  								$toteeca=0; $totacca=0; $totsnca=0; $totgca=0; $totovca=0; $pettya=0;
  								foreach ($matc as $ct) {
										$pvover = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='approve' and apv_header.compcode='$compcode' and apv_header.apv_system='1'");
										$reover = $pvover->result();
										$pvee = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='approve' and apv_header.compcode='$compcode' and apv_header.apv_system='3'");
										$reee = $pvee->result();
										$pvac = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='approve' and apv_header.compcode='$compcode' and apv_header.apv_system='2'");
										$reac = $pvac->result();
										$pvsn = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='approve' and apv_header.compcode='$compcode' and apv_header.apv_system='4'");
										$resn = $pvsn->result();
										$pvtot = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='approve' and apv_header.compcode='$compcode'");
										$retot = $pvtot->result();

										// piad
										$pvovera = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='piad' and apv_header.compcode='$compcode' and apv_header.apv_system='1'");
										$reovera = $pvovera->result();
										$pveea = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='piad' and apv_header.compcode='$compcode' and apv_header.apv_system='3'");
										$reeea = $pveea->result();
										$pvaca = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='piad' and apv_header.compcode='$compcode' and apv_header.apv_system='2'");
										$reaca = $pvaca->result();
										$pvsna = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='piad' and apv_header.compcode='$compcode' and apv_header.apv_system='4'");
										$resna = $pvsna->result();
										$pvtota = $this->db->query("select sum(apvi_netamt) as netamt from apv_header LEFT OUTER JOIN apv_detail on apv_detail.apvi_ref=apv_header.apv_code where apv_header.apv_project='$proj' and apv_detail.apvi_matcode='$ct->matcode1' and apv_header.apv_status='piad' and apv_header.compcode='$compcode'");
										$retota = $pvtota->result();

										// petty cash
										$petty = $this->db->query("select sum(pettycashi_netamt) as netamt from pettycash LEFT OUTER JOIN pettycash_item on pettycash_item.pettycashi_ref=pettycash.docno where pettycash.project='$proj' and pettycash_item.pettycashi_expenscode='$ct->matcode1' and pettycash.status='paid' and pettycash.compcode='$compcode';");
										$repetty = $petty->result();
									?>
  									<tr>
											<td><?php echo $ct->matcode1; ?></td>
  										<td><?php echo $ct->matname1; ?></td>
											<?php foreach ($reover as $pover) { ?>
  										<td class="text-right"><?php if($pover->netamt==""){?>
													<?php echo number_format($pover->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($pover->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totovca=$totovca+$pover->netamt; } ?>
											<?php foreach ($reee as $poee) { ?>
											<td class="text-right"><?php if($poee->netamt==""){?>
													<?php echo number_format($poee->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($poee->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $toteeca=$toteeca+$poee->netamt; } ?>
											<?php foreach ($reac as $poac) { ?>
											<td class="text-right"><?php if($poac->netamt==""){?>
													<?php echo number_format($poac->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($poac->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totacca=$totacca+$poac->netamt; } ?>
											<?php foreach ($resn as $posn) { ?>
											<td class="text-right"><?php if($posn->netamt==""){?>
													<?php echo number_format($posn->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($posn->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totsnca=$totsnca+$posn->netamt; } ?>
											<?php foreach ($retot as $potot) { ?>
											<td class="text-right"><?php if($potot->netamt==""){?>
													<?php echo number_format($potot->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($potot->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totgca=$totgca+$potot->netamt; } ?>
  										<!-- piad -->
											<?php foreach ($reovera as $povera) { ?>
  										<td class="text-right"><?php if($povera->netamt==""){?>
													<?php echo number_format($povera->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($povera->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totovcab=$totovcab+$povera->netamt; } ?>
											<?php foreach ($reeea as $poeea) { ?>
											<td class="text-right"><?php if($poeea->netamt==""){?>
													<?php echo number_format($poeea->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($poeea->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $toteecab=$toteecab+$poeea->netamt; } ?>
											<?php foreach ($reaca as $poaca) { ?>
											<td class="text-right"><?php if($poaca->netamt==""){?>
													<?php echo number_format($poaca->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($poaca->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totaccab=$totaccab+$poaca->netamt; } ?>
											<?php foreach ($resna as $posna) { ?>
											<td class="text-right"><?php if($posna->netamt==""){?>
													<?php echo number_format($posna->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($posna->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totsncab=$totsncab+$posna->netamt; } ?>
											<?php foreach ($retota as $potota) { ?>
											<td class="text-right"><?php if($potota->netamt==""){?>
													<?php echo number_format($potota->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($potota->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $totgcab=$totgcab+$potota->netamt; } ?>

											<!-- petty -->
											<?php foreach ($repetty as $pett) { ?>
											<td class="text-right"><?php if($pett->netamt==""){?>
													<?php echo number_format($pett->netamt,2);?>
												<?php }else{?>
													<span class="label label-success"><?php echo number_format($pett->netamt,2);?></span>
												<?php } ?>
											</td>
											<?php $pettya=$pettya+$pett->netamt; } ?>
  									</tr>	<!-- /iconified modal -->
  								<?php } ?>
  								</tbody>
                  				<tbody>
  									<tr>
  										<td class="text-center" colspan="2">Summary</td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totovca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($toteeca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totacca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totsnca,2); ?></span></td>
											<td class="text-right"><span class="label label-success"><?php echo number_format($totgca,2); ?></span></td>
  										<!-- cash -->
											<td class="text-right"><span class="label label-success"><?php echo number_format($totovcab,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($toteecab,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totaccab,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totsncab,2); ?></span></td>
											<td class="text-right"><span class="label label-success"><?php echo number_format($totgcab,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($pettya,2); ?></span></td>
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
