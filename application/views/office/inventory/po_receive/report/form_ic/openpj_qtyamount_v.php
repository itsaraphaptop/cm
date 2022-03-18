
<!-- Main content  trans-->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
							</div>
						</div> -->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>inventory/receive_transfer_store"></a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">
          <!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Select Stock's Project</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
              <table class="table table-hover table-bordered table-xxs">
                <thead>
                  <tr>
                    <th>Project Code</th>
                    <th>Project Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($getproj as $key => $value) {?>
                  <tr>
                    <td><?php echo $value->project_code; ?></td>
                    <td><?php echo $value->project_name; ?></td>
                    
                    <td><a href="<?php echo base_url(); ?>index.php/report_qty/report_qtyamt/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>





					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
