


<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
						</div>

						<div class="heading-elements">
							<form class="heading-form" action="#">
								<div class="form-group">
									<div class="daterange-custom" id="reportrange">
										<div class="daterange-custom-display"></div>
										<span class="badge bg-danger-400">24</span>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i>NinjaERP</a></li>
							
							<li class="active">Safety 's Dashboard</li>
						</ul>

						<ul class="breadcrumb-elements">
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-user position-left"></i>
									พนักงาน
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="<?php echo base_url(); ?>safety/employee_list"><i class="icon-user-lock"></i>รายชื่อพนังงาน</a></li>
									<li><a href="<?php echo base_url(); ?>safety/New_Employee"><i class="icon-user-plus"></i>เพิ่มพนักงาน</a></li>
									<li><a href="#"><i class="icon-vcard"></i>ตั้งค่าพนักงาน</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Traffic sources -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title">สร้างพนักงานใหม่</h6>
							<div class="heading-elements">
								
							</div>
						</div>

						<div class="container-fluid">
							<div class="row">
								<!-- <div class="col-lg-4">
									<ul class="list-inline text-center">
										<li>
											<a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
										</li>
										<li class="text-left">
											<div class="text-semibold">New visitors</div>
											<div class="text-muted">2,349 avg</div>
										</li>
									</ul>

									<div class="col-lg-10 col-lg-offset-1">
										<div class="content-group" id="new-visitors"></div>
									</div>
								</div> -->

								<!-- <div class="col-lg-4">
									<ul class="list-inline text-center">
										<li>
											<a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
										</li>
										<li class="text-left">
											<div class="text-semibold">New sessions</div>
											<div class="text-muted">08:20 avg</div>
										</li>
									</ul>

									<div class="col-lg-10 col-lg-offset-1">
										<div class="content-group" id="new-sessions"></div>
									</div>
								</div> -->

								<div class="col-lg-4">
									<ul class="list-inline text-center">
										<li>
											<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
										</li>
										<li class="text-left">
											<div class="text-semibold">จำนวนพนักงานทั้งหมด</div>
											<div class="text-muted"><span class="status-mark border-success position-left"></span> 98 คน</div>
										</li>
									</ul>

									<div class="col-lg-10 col-lg-offset-1">
										<div class="content-group" id="total-online"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="position-relative" id="traffic-sources"></div>
					</div>
					<!-- /traffic sources -->


					<!-- Quick stats boxes -->
				

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
