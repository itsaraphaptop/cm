<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Depreciation Method</h4>
		</div>
		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
			</div>
		</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">Depreciation Method</li>
			</ul>
			<ul class="breadcrumb-elements">
				<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-gear position-left"></i>
						Settings
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
						<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
					</ul>
				</li>
			</ul>
			<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
		</div>
		<div class="content">
			<form method="post" action="<?php echo base_url(); ?>index.php/asset_active/depremethod_edit">
				<div class="panel panel-flat">
					<div class="panel-heading">
					<?php 
						foreach ($res as $key => $data) {
					?>		
					
						<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
						<div class="panel-body">
							<div class="row">
								<div class="form-group">
									<div class="col-md-3">
										<label>Cost Code: </label>
										<div class="input-group ">
											<input type="text" class="form-control input-xs" name="de_costid" id="codecostcodeint" readonly="true" value="<?= $data->de_costid ?>">
											<input type="text" class="form-control input-xs" name="de_costname" id="costnameint" readonly="true" value="<?= $data->de_costname ?>">
											<span class="input-group-btn" >
												<a class="modalcost btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode" id="costttttt"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
											</span>
										</div>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-5">
										<label class="control-label">Maintenance Name :</label>
										<input type="text" class="form-control input-xs" id="de_maintenance" name="de_maintenance" value="<?= $data->de_maintenance ?>">
										<input type="hidden" value="<?= $data->de_id ?>" name="de_id">
									</div>
									
								</div>
							</div><br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-2">
										<label class="control-label">Next Due:</label>
										<input type="text" class="form-control input-xs" name="de_due" id="de_due" value="<?= $data->de_due ?>">
									</div>
									<div class="col-sm-2">
										<label class="control-label">Alert Before:</label>
										<input type="text" class="form-control input-xs" name="de_before" id="de_before" value="<?= $data->de_before ?>">
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-2">
										<label class="control-label">Next Mile:</label>
										<input type="text" class="form-control input-xs" name="de_mile" id="de_mile" value="<?= $data->de_mile ?>">
									</div>
									
								</div>
							</div><br>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-2">
										
										<div class="form-group">
											<label class="display-block">Lock alert:</label>
										<?php 
												if ($data->de_lock == 1) {
										?>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock" class="styled" checked="true" value="1">
												None
											</label>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock1" class="styled" value="2">
												Date
											</label>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock2" class="styled" value="3">
												Mile
											</label>
										<?php		
												}elseif ($data->de_lock == 2) {
										?>

											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock" class="styled"  value="1">
												None
											</label>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock1" class="styled" checked="true" value="2">
												Date
											</label>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock2" class="styled" value="3">
												Mile
											</label>
										<?php
												}else{
										?>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock" class="styled"  value="1">
												None
											</label>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock1" class="styled" value="2">
												Date
											</label>
											<label class="radio-inline">
												<input type="radio" name="de_lock" id="de_lock2" class="styled" checked="true" value="3">
												Mile
											</label>
										<?php
												}
										?>
											
								
										</div>
									</div>
									
								</div>
							</div><br>
					<?php
							}
					?>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-5">
										
										<!-- <a class="rete btn bg-success" data-toggle="modal" data-target="#ret">Retrieve</a> -->
										<button class="btn bg-info" id="insertpodetail">Save</button>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</form>
			</div>