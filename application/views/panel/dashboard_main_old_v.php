<style>
	.box-visible{ margin-top: 10px;}
	.containerbox {
	     /*position: absolute;*/
	     z-index: 1;
	     top: 0;
	     left: 0;
	     width: 100%;
	     height: 100%;
	     overflow: auto;
	     background: url('<?php echo base_url();?>assets/images/bgsc_glay.png') top center no-repeat;

	}
	.cardheader {
    background-color: #494a49;
    color: white;
    padding: 10px;
}
.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
		color: white;
}
.bg-box{
	background-color: rgb(81, 82, 85);
}
.bg-box-default{
	background-color: rgb(255, 255, 255);
}
.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;

    line-height: 120px;
    background: rgba(0,0,0,0.2);
}
.info-box-content {
    padding: 5px 10px;
    margin-left: 90px;
}
.info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}
.info-box .progress, .info-box .progress .progress-bar {
    border-radius: 0;
		background-color: rgb(3, 171, 0);
}
.info-box .progress {
    background: rgba(0,0,0,0.2);
    margin: 5px -10px 5px -10px;
    height: 2px;
}
.progress-description, .info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>



			<!-- Main content -->
			<div class="content-wrapper containerbox">

				<!-- Page header -->

				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
					<!-- dashboard content -->
					<div class="form-group box-visible">
						<div class="col-md-4">
							 <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="img-responsive" style="max-height: 70px;" data-pin-nopin="true">
						</div>
						<!-- ชั่วคราว -->
						<div class="col-md-4 col-md-offset-4">
								<div class="info-box bg-box-default">

								</div>

						</div>

						<!-- ใช้อันนี้ -->
						<!-- <div class="col-md-4 col-md-offset-4">
								<div class="info-box bg-box">
									<span class="info-box-icon"><i class="fa fa-users fa-4x" aria-hidden="true"></i></span>
<?php $n=50; $per = $count/50*100; ?>
									<div class="info-box-content">
		                    <span class="info-box-text">Users Limits</span>
		                    <span class="info-box-number"><?php if($n>=50){echo $count ;?> / UNLIMITED<?php }else{ echo $count;?>  / 50<?php } ?> </span>

		                    <div class="progress">
		                        <div class="progress-bar" style="width: <?php echo $per; ?>%"></div>
		                    </div>
		                    <span class="progress-description">
		                        Buy More Users Access  <a href="#" class="label label-danger">Buy User</a>
		                    </span>
		                </div>
								</div>

						</div> -->
					</div>
					<div class="form-group">
<!-- OF SYSTWEM -->
							<div class="col-md-4">
								<div class="panel panel-flat border-top-lg border-top-warning">
										<div class="panel-heading">
											<h6 class="panel-title" data-i18n="nav.dash.ofmenu" data-i18n-target="span"><span></span></h6>
											<div class="heading-elements">
												<ul class="icons-list">
																	<li><a data-action="collapse"></a></li>
																</ul>
															</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

										<img src="<?php echo base_url(); ?>assets/images/modul/of.jpg" width="387px;" height="220px;" />

										<div class="panel-footer">
											<ul>
												<li><a href="<?php echo base_url(); ?>office/newpr" class="preload label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="Open">Open</a></li>
											</ul>

											<ul class="pull-right">
												<li class="dropdown">
													<a href="#" data-popup="tooltip" title="" data-original-title=""><i class="icon-three-bars"></i></a>
												</li>
											</ul>
										</div>
									</div>
							</div>
<!-- /OF System -->
<?php
								$session_data = $this->session->userdata('sessed_in');
								$username = $session_data['username'];
							  $this->db->select("*");
							  $this->db->where('m_user',$username);
							  $query = $this->db->get('menu_right');
							  $res = $query->result();
							  foreach ($res as $e) {
							  	$master = $e->m_master;
							  	$mpm = $e->m_pm;
							  	$map = $e->m_ap;
							  	$mic = $e->m_ic;
							  	$mpo = $e->m_po;
							  	$mapprove = $e->pettycash_approve;
							  	$mpr = $e->pr_approve;
							  	$mar = $e->m_ar;
							  }
							  if ($mpo!="true") {
							  }else{
						 ?>
<!-- PO SYSTWEM -->
							<div class="col-md-4">
								<div class="panel panel-flat border-top-lg border-top-warning">
										<div class="panel-heading">
											<h6 class="panel-title">Purchase Order System</h6>
											<div class="heading-elements">
												<ul class="icons-list">
																	<li><a data-action="collapse"></a></li>
																</ul>
															</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

											<img src="<?php echo base_url(); ?>assets/images/modul/po.jpg" width="387px;" height="220px;" />

										<div class="panel-footer">
											<ul>
												<li><a href="#" class="preload label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="Open">Open</a></li>
											</ul>

											<ul class="pull-right">
												<li class="dropdown">
													<a href="#" data-popup="tooltip" title="" data-original-title=""><i class="icon-three-bars"></i></a>
												</li>
											</ul>
										</div>
									</div>
							</div>
<!-- /PO System -->
<?php }?>
<?php if ($mic!="true") {}else{ ?>
<!-- IC SYSTWEM -->
							<div class="col-md-4">
								<div class="panel panel-flat border-top-lg border-top-warning">
										<div class="panel-heading">
											<h6 class="panel-title">Inventory System</h6>
											<div class="heading-elements">
												<ul class="icons-list">
																	<li><a data-action="collapse"></a></li>
																</ul>
															</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

											<img src="<?php echo base_url(); ?>assets/images/modul/inventory.jpg" width="387px;" height="220px;" />

										<div class="panel-footer">
											<ul>
												<li><a href="<?php echo base_url(); ?>inventory/open" class="preload label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="Open">Open</a></li>
											</ul>

											<ul class="pull-right">
												<li class="dropdown">
													<a href="#" data-popup="tooltip" title="" data-original-title=""><i class="icon-three-bars"></i></a>
												</li>
											</ul>
										</div>
									</div>
							</div>
<!-- /IC System -->
<?php } ?>
<?php if ($map!="true") {}else{?>
<!-- AP SYSTWEM -->
							<div class="col-md-4">
								<div class="panel panel-flat border-top-lg border-top-success">
										<div class="panel-heading">
											<h6 class="panel-title">AP System</h6>
											<div class="heading-elements">
												<ul class="icons-list">
																	<li><a data-action="collapse"></a></li>
																</ul>
															</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

											<img src="<?php echo base_url(); ?>assets/images/modul/ap.jpg" width="387px;" height="220px;" />

										<div class="panel-footer">
											<ul>
												<li><a href="#" class="preload label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="Open">Open</a></li>
											</ul>

											<ul class="pull-right">
												<li class="dropdown">
													<a href="#" data-popup="tooltip" title="" data-original-title=""><i class="icon-three-bars"></i></a>
												</li>
											</ul>
										</div>
									</div>
							</div>
<!-- /AP System -->
<?php } ?>
<?php if ($mar!="true") {}else{?>
<!-- AR SYSTWEM -->
							<div class="col-md-4">
								<div class="panel panel-flat border-top-lg border-top-success">
										<div class="panel-heading">
											<h6 class="panel-title">AR System</h6>
											<div class="heading-elements">
												<ul class="icons-list">
																	<li><a data-action="collapse"></a></li>
																</ul>
															</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

											<img src="<?php echo base_url(); ?>assets/images/modul/ar.jpg" width="387px;" height="220px;" />

										<div class="panel-footer">
											<ul>
												<li><a href="#" class="preload label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="Open">Open</a></li>
											</ul>

											<ul class="pull-right">
												<li class="dropdown">
													<a href="#" data-popup="tooltip" title="" data-original-title=""><i class="icon-three-bars"></i></a>
												</li>
											</ul>
										</div>
									</div>
							</div>
<!-- /AR System -->
<?php } ?>
<?php if ($mpm=="true") { ?>
<!-- PM SYSTWEM -->
							<div class="col-md-4">
								<div class="panel panel-flat border-top-lg border-top-success">
										<div class="panel-heading">
											<h6 class="panel-title">Management System</h6>
											<div class="heading-elements">
												<ul class="icons-list">
																	<li><a data-action="collapse"></a></li>
																</ul>
															</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

											<img src="<?php echo base_url(); ?>assets/images/modul/pm.jpg" width="387px;" height="220px;" />

										<div class="panel-footer">
											<ul>
												<li><a href="<?php echo base_url(); ?>management/pm_overview" class="preload label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="Open">Open</a></li>
											</ul>

											<ul class="pull-right">
												<li class="dropdown">
													<a href="#" data-popup="tooltip" title="" data-original-title=""><i class="icon-three-bars"></i></a>
												</li>
											</ul>
										</div>
									</div>
							</div>
<!-- /PM System -->
<?php } ?>
					</div>
					<!-- /dashboard content -->


					<!-- Footer -->
 							<div class="footer text-muted">
 								© 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
 							</div>
 							<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
		</div>
