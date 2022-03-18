<meta charset="utf-8">
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Report Permission Project</h4>
    </div>
    <div class="heading-elements">
      <div class="heading-btn-group">
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
      </div>
    </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
  </div>
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a class="preload" href="<?php echo base_url(); ?>index.php/data_master">Master</a></li>
      <li class="active">Setup Employee</li>
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
    <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
  </div>
</div>

<div class="">
	<!-- column 1 -->
	<div class="col-md-12">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<!-- <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Employee</h6> -->
				<div class="heading-elements">
					<ul class="icons-list">
					</ul>
				</div>
				<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
				<div class="panel-body wrapper" >
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<fieldset class="fieldset-info">
									<legend><div style="text-align: right;"><a href="<?php echo base_url(); ?>index.php/new_permission/report_permission_projects" type="button" class="btn bg-danger" name="button"><i class="icon-close2"></i> Close</a></div><h4><i class="fa fa-user-plus" aria-hidden="true"></i> Permission Project</h4></legend>
									<div class="content">
										<div class="row">
											<table class="table table-hover">
												<thead>
													<tr>
														<?php if($type == "by_project") {?>
														<th>Projects</th>
														<th>Empolyees</th>
														<?php }elseif($type == "by_empolyee"){?>
														<th>Empolyees</th>
														<th>Projects</th>
														<?php }?>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($data as $key => $value_in_data) { ?>
													<tr>
														<td><?=$value_in_data["head"] ?></td>
														<td>
															
															<?php foreach ($value_in_data["detail"] as $key => $name) {  ?>
															<p><?=$key+1 ?>.  <?=$name["name"] ?></p>
															<?php }?>
														</td>
													</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
									</div>
								</fieldset>
								<br>
							</div>
						</div>
					</fieldset>
					<button id="btnExport">Export to xls</button>
				</div>
			</div>
		</div>
	</div>
</div>