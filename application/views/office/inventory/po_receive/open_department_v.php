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
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Select Department</a></li>
					</div>
				</div>
				<!-- /page header -->
				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat border-top-lg border-top-success">
						<div class="panel-heading">
							<h5 class="panel-title">Select Department</h5>
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
							<table class="table table-bordered table-striped table-xs">
				              <thead>
				              <tr>
				                  <th class="text-center" width="10%">Department Code</th>
				                  <th>Department</th>
				                  <th class="text-center" width="10%">PO Quantity</th>
				                  <th width="5%">เปิด</th>
				              </tr>
				              </thead>
				              <tbody>
				              <?php foreach ($getdep as $val) {
				                $this->db->select('*');
				                $this->db->where('po_department',$val->department_id);
				                $this->db->where('po_approve','approve');
				                $query = $this->db->get('po');
				                $result = $query->num_rows();
				          
				                ?>
				                      <tr>
				                          <td class="text-center"><?php echo $val->department_code;?> </td>
				                          <td><?php echo $val->department_title;?></td>
				                          <td class="text-center"><a class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $result;?>"><?php echo $result;?></a></td>
				                          <td><a href="<?php echo base_url(); ?>index.php/inventory/receive_po_list/<?php echo $val->department_id; ?>" class="preload label label-primary label-block" data-popup="tooltip" title="" data-original-title="เปิด"><i class="icon-folder-open2"></i> OPEN</a></td>
				                      </tr>
				              <?php } ?>
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
<!-- /Main content -->
