<style type="text/css">
	.fixed {
		position: fixed;
		/*background: #fff;*/
		z-index: 10;
		width: 90%;
	}

	.content-wrapper {
		padding-top: 20px;
	}
</style>
<!-- <div class="fixed">
	<div class="page-header">
		<div class="panel-body">
			<div class="content-group-lg">
				<div class="row">
					<div class="col-lg-1"><b>Progress input</b></div>
					<div class="col-lg-10">
						<div class="progress progress-xs">
							<div class="ui-progressbar-striped progress-xxs ui-progressbar-active jui-progressbar ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="60">
								<div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 60%;"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-1 text-left"><b>60%</b></div>
					<div class="col-lg-12"><b>Tender Information</b></div>

				</div>
				<div class="row">
					<div class="col-lg-7">
						<div class="col-lg-2 text-right">Project Name : </div>
						<div class="col-lg-10"><input type="" name="" class="form-control input-sm"></div>
					</div>
					<div class="col-lg-4">
						<div class="col-lg-4 text-right">Status : </div>
						<div class="col-lg-8"><input type="" name="" class="form-control input-sm"></div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-lg-7">
						<div class="col-lg-2 text-right">Start Date : </div>
						<div class="col-lg-4"><input type="" name="" class="form-control input-sm"></div>
						<div class="col-lg-2 text-right">Finish Date : </div>
						<div class="col-lg-4"><input type="" name="" class="form-control input-sm"></div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
</div> -->


<!-- Rounded basic tabs -->
<div class="container-fluid content-wrapper">
	<div class="col-md-12">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title"> Tender</h6>

			</div>
			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-component">
						<li class="active">
							<a href="#basic-rounded-tab1" id="clickproj" data-toggle="tab">Process</a>
						</li>
						<li>
							<a href="#basic-rounded-tab2" id="clickclose" data-toggle="tab">Close</a>
						</li>
						<!-- <li><a href="#basic-rounded-tab2" id="clickdpt" data-toggle="tab">Department</a></li> -->
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="basic-rounded-tab1">
							<div id="loadprj"></div>
						</div>
						<div class="tab-pane" id="basic-rounded-tab2">
							<div id="loadclose"></div>
						</div>
						<!-- <div class="tab-pane" id="basic-rounded-tab2">
							<div id="loaddpt"></div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /rounded basic tabs -->






<!-- /main content -->
<script type="text/javascript">
	$('#boq').attr('class', 'active');
	$('#bill').attr('style', 'background-color:#dedbd8');

	
		$('#loadprj').html("<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>");
		$('#loadprj').load("<?php echo base_url(); ?>bd/select_project");
	

	$("#clickproj").click(function() {
		$('#loadprj').html(
			"<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>"
		);
		$('#loadprj').load("<?php echo base_url(); ?>bd/select_project");
	});
	$("#clickclose").click(function() {
		$('#loadclose').html(
			"<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>"
		);
		$('#loadclose').load("<?php echo base_url(); ?>bd/select_project_close");
	});
	$("#clickdpt").click(function() {
		$('#loaddpt').html(
			"<div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' style='width: 100%'><span class='sr-only'>100% Complete (info)</span></div></div>"
		);
		$('#loaddpt').load("<?php echo base_url(); ?>bd/select_department");
	});
</script>