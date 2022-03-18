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
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Invoice Archive</a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">



					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">AR Voucher Archive</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<div class="text-right">
	                          <a href="<?php echo base_url(); ?>ar/ar_down_payment" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
	                          <a href="<?php echo base_url(); ?>ar/ar/invoice_archaive" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
	                         </div>
						</div>

            <div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
							<table class="table table-hover table-bordered  table-xxs datatable-basic">
							<thead>
								<tr>
									<th width="10%">AP Voucher</th>
									<th width="10%" class="text-center">Inv No.</th>
									<th width="5%" class="text-center">Type</th>
									<th width="35%" class="text-center">Project/Department</th>
									<th width="35%" class="text-center">Owner</th>
									<th width="10%" class="text-center">Date</th>
                  <!-- <th width="5%" class="text-center">Status</th> -->
									<th width="10%" class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $n=1; foreach ($res as $e) {?>
									<tr>
									<td><?php echo $e->vou_no; ?></td>
									<td><?php echo $e->vou_invno; ?></td>
									<td class="text-center"><span class="label label-success"><?php echo $e->vou_invtype; ?></span></td>
									<td class="text-center"><?php echo $e->project_name; ?></td>
									<td class="text-center"><?php echo $e->debtor_name; ?></td>
									<td class="text-center"><?php echo $e->vou_date; ?></td>
                  <!-- <td class="text-center"><span class="label label-success"><?php echo $e->vou_type; ?></span></td> -->
									<td>
										<ul class="icons-list">
												<!-- <li><a data-toggle="modal" data-target="#open" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li> -->
												<li><a class="preload" href="<?php echo base_url(); ?>ar/ar_edit_vorcher/<?php echo $e->vou_no; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
												<!-- <li><a href="<?php echo base_url(); ?>ar_active/del_inv/<?php echo $e->vou_no; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li> -->
												<li><a href="<?php echo base_url(); ?>ar_report/report_voucher/<?php echo $e->vou_no; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
										</ul>
									</td>
									</tr>
									<?php $n++; } ?>
							</tbody>
						</table>
						</div>
          </div>
					</div>
					<!-- /highlighting rows and columns -->
					<!--  -->

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
