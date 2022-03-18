
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
							<h5 class="panel-title">Cost Management By Cost Code</h5>
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
  								$totee=0; $totac=0; $totsn=0; $totg=0; $totov=0;
  								$toteeca=0; $totacca=0; $totsnca=0; $totgca=0; $totovca=0; $pett=0;
  								foreach ($costtype as $ct) {
  								$cac = $this->db->query("select substr(poi_costcode,1,5) as typcode, substr(poi_costcode, 6,5) as groupcode, substr(poi_costcode, 11) as sub from po_item");
  												$rac = $cac->result();
  									$costgroup = $this->db->query("select * from cost_group where ctype_code='$ct->ctype_code'");
  									$rgcode = $costgroup->result();
  									foreach ($rgcode as $gpc) {
  										$subg = $this->db->query("select * from cost_subgroup where ctype_code='$ct->ctype_code' and cgroup_code='$gpc->cgroup_code'");
  										$rsub = $subg->result();
  										foreach ($rsub as $subc) {
  											$poi_itemov = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='1' and po.compcode='$compcode' and po.ic_status = 'wait' and po.po_project='$project_id'");
  											$rpoiov = $poi_itemov->result();
  											$poi_itemee = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='3' and po.compcode='$compcode' and po.ic_status = 'wait' and po.po_project='$project_id'");
  											$rpoiee = $poi_itemee->result();
  											$poi_itemac = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='2' and po.compcode='$compcode' and po.ic_status = 'wait' and po.po_project='$project_id'");
  											$rpoiac = $poi_itemac->result();
  											$poi_itemsn = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='4' and po.compcode='$compcode' and po.ic_status = 'wait' and po.po_project='$project_id'");
  											$rpoisn = $poi_itemsn->result();
  											$poi_itemtot = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po.compcode='$compcode' and po.ic_status = 'wait' and po.po_project='$project_id'");
  											$rpoitot = $poi_itemtot->result();


  											// cash
  											 $petty = $this->db->query("select sum(pettycashi_netamt) as netamt from pettycash_item join pettycash on  pettycash.docno=pettycash_item.pettycashi_ref where pettycash.project='$project_id' and pettycash.status='paid' and substr(pettycashi_costcode,1,5)='$subc->ctype_code'");
                    	 					$rpetty = $petty->result();

  											$poi_itemovca = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='1' and po.compcode='$compcode' and po.apv_open = 'yes' and po.po_project='$project_id'");
  											$rpoiovca = $poi_itemovca->result();
  											$poi_itemeeca = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='3' and po.compcode='$compcode' and po.apv_open = 'yes' and po.po_project='$project_id'");
  											$rpoieeca = $poi_itemeeca->result();
  											$poi_itemacca = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='2' and po.compcode='$compcode' and po.apv_open = 'yes' and po.po_project='$project_id'");
  											$rpoiacca = $poi_itemacca->result();
  											$poi_itemsnca = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po_system='4' and po.compcode='$compcode' and po.apv_open = 'yes' and po.po_project='$project_id'");
  											$rpoisnca = $poi_itemsnca->result();
  											$poi_itemtotca = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=poi_ref where substr(poi_costcode,1,5)='$subc->ctype_code' and po.compcode='$compcode' and po.apv_open = 'yes' and po.po_project='$project_id'");
  											$rpoitotca = $poi_itemtotca->result();
  										}

  									}
  									
  								?>
  									<tr>
										<td><?php echo $ct->ctype_name;?></td>
										<?php  foreach ($rpoiov as $key => $ova) {?>
										<td class="text-right"><?php echo number_format($ova->netamt,2);?></td>
										<?php $totov=$totov+$ova->netamt; } ?>
										<?php  foreach ($rpoiee as $key => $pp) {?>
										<td class="text-right"><?php echo number_format($pp->netamt,2);?></td>
										<?php $totee=$totee+$pp->netamt; } ?>
										<?php foreach ($rpoiac as $key => $ac) {?>
										<td class="text-right"><?php echo number_format($ac->netamt,2);?></td>
										<?php $totac=$totac+$ac->netamt; } ?>
										<?php foreach ($rpoisn as $key => $sn) {?>
										<td class="text-right"><?php echo number_format($sn->netamt,2);?></td>
										<?php $totsn=$totsn+$sn->netamt; } ?>
										<?php foreach ($rpoitot as $key => $tot) {?>
										<td class="text-right"><span class="label label-success"><?php echo number_format($tot->netamt,2);?></span></td>
										<?php $totg=$totg+$tot->netamt; } ?>
										<!-- cash -->
										<?php  foreach ($rpoiovca as $key => $ovaca) {?>
										<td class="text-right"><?php echo number_format($ovaca->netamt,2);?></td>
										<?php $totovca=$totovca+$ovaca->netamt; } ?>
										<?php  foreach ($rpoieeca as $key => $ppca) {?>
										<td class="text-right"><?php echo number_format($ppca->netamt,2);?></td>
										<?php $toteeca=$toteeca+$ppca->netamt; } ?>
										<?php foreach ($rpoiacca as $key => $acca) {?>
										<td class="text-right"><?php echo number_format($acca->netamt,2);?></td>
										<?php $totacca=$totacca+$acca->netamt; } ?>
										<?php foreach ($rpoisnca as $key => $snca) {?>
										<td class="text-right"><?php echo number_format($snca->netamt,2);?></td>
										<?php $totsnca=$totsnca+$snca->netamt; } ?>
										<?php foreach ($rpoitotca as $key => $totca) {?>
										<td class="text-right"><span class="label label-success"><?php echo number_format($totca->netamt,2);?></span></td>
										<?php $totgca=$totgca+$totca->netamt; } ?>
										<!-- pettycash -->
										<?php foreach ($rpetty as $key => $peet) {?>
										<td class="text-right"><span class="label label-success"><?php echo number_format($peet->netamt,2);?></span></td>
										<?php $pett=$pett+$peet->netamt; } ?>
  									</tr>	<!-- /iconified modal -->
  								<?php } ?>
  								</tbody>
                  				<tbody>
  									<tr>
  										<td>Summary</td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totov,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totee,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totac,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totsn,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totg,2); ?></span></td>
  										<!-- cash -->
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totovca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($toteeca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totacca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totsnca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($totgca,2); ?></span></td>
  										<td class="text-right"><span class="label label-success"><?php echo number_format($pett,2); ?></span></td>
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
