<style>
	ul.documents {
    padding-left: 15px;
    line-height: 1.8;
}
.box-sub {
    flex: 1;
    border: 1px solid #ddd;
    padding: 10px;
    background-color: #fff;
    margin-top: 10px;
}
a {
    color: #313131;
}
</style>
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
							<h5 class="panel-title">Project Status</h5>
							<div class="heading-elements">
								<!-- <ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul> -->
		                	</div>
						</div>

						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<a href="<?php echo base_url(); ?>data_master/setup_project_main"><h1 class="text-semibold no-margin"><?php echo $allproj; ?></h1>
									<span class="text-muted text-size-small">โครงการ</span></a>
								</div>
								<div class="col-md-4">
									<h1 class="text-semibold no-margin"><?php echo $allproj; ?></h1>
									<span class="text-muted text-size-small">โครงการสถานะปกติ</span>

								</div>
								<div class="col-md-4">
									<h1 class="text-semibold no-margin"><?php echo $inv; ?></h1>
									<?php $sumrec = $this->db->query("select sum(vou_netamt) as receipt from ar_receipt_detail");
									$resrec = $sumrec->result();
									foreach ($resrec as $erec) {
										$recnetamt = $erec->receipt;
									}
									?>
									<span class="text-muted text-size-small">ใบแจ้งหนี้ (จำนวนเงิน <?php echo number_format($recnetamt,2); ?>)</span>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<h1 class="text-semibold no-margin"><?php echo $allpo; ?></h1>
									<span class="text-muted text-size-small">ใบสั่งซื้อ</span>
								</div>
								<div class="col-md-4">
									<h1 class="text-semibold no-margin"><?php echo $powait; ?></h1>
									<span class="text-muted text-size-small">ใบสั่งซื้อรอการอนุมัติ</span>

								</div>
								<div class="col-md-4">
									<h1 class="text-semibold no-margin"><?php echo $allpoapp; ?></h1>
									<?php
									$poi_item = $this->db->query("select sum(poi_netamt) as netamt from po_item join po on po.po_pono=po_item.poi_ref where po.apv_open='yes'");
									$res = $poi_item->result();
									foreach ($res as $key => $value) {
										$netamt = $value->netamt;
									}
									 ?>
									<span class="text-muted text-size-small">ใบสั่งซื้อรอการจัดสรร (จำนวนเงิน <?php echo number_format($netamt,2); ?>)</span>
								</div>
							</div>
					  	</div>

          			</div>
					<!-- /highlighting rows and columns -->



					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->
						<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Last Project</h5><span class="text-muted text-size-smalldv">5 Project</span>
							<div class="heading-elements">
								<!-- <ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul> -->
		                	</div>
						</div>

						<div class="panel-body">
						<!-- last project -->
							<table class="table table-bordered table-xxs">
								<thead>
									<tr>
										<th>Project Code</th>
										<th>Project Name</th>
										<th>มูลค่าสัญญา</th>
										<th>แผนต้นทุน</th>
										<th>ต้นทุนจริง</th>
										<th>%</th>
										<th>รายรับ</th>
									</tr>
								</thead>
								<tbody>
								<?php $i=0; $pertot=0; foreach($lastproj as $v) {
									$total = $this->db->query("select Sum(po_item.poi_netamt) as netamt FROM po INNER JOIN po_item ON po.po_pono = po_item.poi_ref WHERE po.ic_status = 'wait' and po.po_project='$v->project_id'");
                    				$gtot = $total->result();
									$sumreceipt = $this->db->query("select sum(vou_netamt) as receipt from ar_receipt_detail where vou_project='$v->project_id'");
									$resereceipt = $sumreceipt->result();
								?>
									<tr>
										<td><?php echo $v->project_code; ?></td>
										<td><?php echo $v->project_name; ?></td>
										<td><?php echo number_format($v->project_value,2); ?></td>
										<td><?php echo $i; ?></td>
										<?php foreach ($gtot as $tot) {?>
											<td><?php echo number_format($tot->netamt,2); ?></td>
										<?php $pertot= $pertot+$tot->netamt; } ?>
										<?php if ($v->project_value=="0") {?>
											<td>
											<label>Budget <span>0%</span></label>
												<div class="progress progress-xxs">
													<div class="progress-bar progress-bar-success" style="width: 0%">
														<span class="sr-only">0% Complete</span>
													</div>
										</div>
											</td>
										<?php }else{?>
										<td>
										<label>Budget <span><?php echo number_format($pertot/$v->project_value*100,2); ?>%</span></label>
										<div class="progress progress-xxs">
											<div class="progress-bar progress-bar-success" style="width: <?php echo number_format($pertot/$v->project_value*100,2); ?>%">
												<span class="sr-only"><?php echo number_format($pertot/$v->project_value*100,2); ?>% Complete</span>
											</div>
										</div>


										</td>
										<?php }?>
										<?php foreach ($resereceipt as $rec) {
											if($rec->receipt==""){
										?>
										<td>0.00</td>
										<?php }else{?>
											<td><?php echo number_format($rec->receipt,2); ?></td>
										<?php } ?>
										<?php } ?>
									</tr>
								<?php }?>
								</tbody>
							</table>
            			</div>
          			</div>
				</div>
				<!-- /content area -->
				<div class="content">
					<!-- Highlighting rows and columns -->

          			</div>
			</div>
			<!-- /main content -->
