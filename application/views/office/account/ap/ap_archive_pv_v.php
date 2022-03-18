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
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li>Account Payable Archive</li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">



					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Account Payable Archive</h5>
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
            <div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
							<table class="table table-hover table-xxs datatable-basic">
							<thead>
                <tr>
                  <th>PV CODE</th>
                  <th>PV Type</th>
                  <th>PAY To</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
							</thead>
							<tbody>
									<?php foreach ($res as $val) {
										$mem = $this->db->query("select m_name from member where m_id='$val->apo_member'");
										$resmem = $mem->result();
										$ve = $this->db->query("select vender_name from vender where vender_id='$val->apo_vender'");
										$resven = $ve->result();
									?>
									<tr>
									<td><?php echo $val->apo_code; ?></td>
									<td><?php echo $val->apo_doctype; ?></td>
									<?php if ($val->apo_doctype=="pc") {?>
										<?php foreach ($resmem as $k) { ?>
										<td><?php echo $k->m_name; ?><?php echo $val->apo_vender; ?></td>
										<?php } ?>
									<?php }else if($val->apo_doctype=="apv"){?>
										<?php foreach ($resven as $ke) {?>
										<td><?php echo $ke->vender_name; ?></td>
										<?php } ?>
									<?php }?>
									
									<td><?php echo $val->apo_date; ?></td>
									<td width="10%">
									<?php if ($val->apo_doctype=="pc") { ?>
										<ul class="icons-list">
												<li><a data-toggle="modal" data-target="#openap<?php echo $val->apo_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                       							 <li class="text-default"><a href="<?php echo base_url(); ?>ap/edit_pv_other/<?php echo $val->apo_code; ?>"><i class="icon-pencil7"></i></a></li>
												<!-- <li class="text-default"><i class="icon-trash"></i></li> -->
												<!-- <li><a href="<?php echo base_url(); ?>ap/print_apopv/<?php echo $val->apo_code; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pv_apo.mrt&apocode=<?php echo $val->apo_code; ?>"  data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
										</ul>
									<?php }elseif($val->apo_doctype=="apv"){ ?>
										<ul class="icons-list">
												<li><a data-toggle="modal" data-target="#openap<?php echo $val->apo_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                       							 <li class="text-default"><a href="<?php echo base_url(); ?>ap/edit_approvr_apv/010/PV2016050021"><i class="icon-pencil7"></i></a></li>
												<!-- <li class="text-default"><i class="icon-trash"></i></li> -->
												<li><a href="<?php echo base_url(); ?>ap/print_apopv/<?php echo $val->apo_code; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
										</ul>
									<?php }else{ ?>

									<?php } ?>
									</td>
									</tr>

									<?php	} ?>
							</tbody>
						</table>
						</div>
          </div>
					</div>
					<!-- /highlighting rows and columns -->
					<!--  -->
					<!-- Basic modal apv -->
					
					<!-- /basic modal -->
					<!--  -->
          			<!-- Basic modal apv -->
                      	
                    <!-- /basic modal -->
          <!--  -->

					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
