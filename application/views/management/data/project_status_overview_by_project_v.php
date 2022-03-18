<style>
	.boxhight{
		padding: 10px 0px 30px;
	}
	.boxexpense{
		height: 250px;
		margin-top: 30px;
	}
</style>

<div class="panel panel-flat">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<h3>OVERVIEW <?php echo $project_mainname; ?></h3>
			</div>
			<div class="col-md-6">
				<div class="col-md-4">
					<!-- <div class="panel">
						<div class="panel-body">
							<h3 class="text-semibold  no-margin"> <?php  echo number_format($aggregate,2); ?></h3>
							<div class="text-muted  text-size-small">Contact + VO</div>
							<div class="heading-elements">
								<a href="<?php echo base_url();?>management/project_status_overview_all/<?php echo $projedcode; ?>/<?php echo $projedid; ?>" class="label label-primary">Open</a>
							</div>
						</div>
					</div> -->
				</div>
				<div class="col-md-4">
					<!-- <div class="panel">
						<div class="panel-body">
							<h3 class="text-semibold no-margin"> <?php echo number_format($project_sumsubvalue,2); ?></h3>
							<div class="text-muted text-size-small">Variation Order</div>
							<div class="heading-elements">
							<a href="<?php echo base_url();?>management/project_overview_by_project_sub/<?php echo $projedcode; ?>/<?php echo $projedid; ?>" class="label label-primary">Open</a>
							</div>
						</div>
					</div> -->
				</div>
				<div class="col-md-4">
					
					<div class="panel bg-info">
						<div class="panel-body">
							<h3 class="text-semibold no-margin"> <?php  echo number_format($project_mainvalue,2); ?></h3>
							<div class="text-muted text-size-small">Contact</div>
							<div class="heading-elements">
								<a href="<?php echo base_url();?>management/project_overview_by_project/<?php echo $projedcode; ?>/<?php echo $projedid; ?>" class="label label-primary">Open</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-component">
					<li class="active"><a href="#basic-rounded-tab1" id="clickoverview" data-toggle="tab">Dashboard</a></li>
					<li><a href="#basic-rounded-tab2" id="clickloadcontact" data-toggle="tab">Forcash</a></li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="basic-rounded-tab1">
						<!-- tab1 -->
						<div class="loadoverview">
						<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>
						</div>
						<!-- /tab1 -->
					</div>
					<div class="tab-pane" id="basic-rounded-tab2">
						<div class="loacontact">
						<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>


<script>
// $(document).ready(function(){
	$(".loadoverview").load('<?php echo base_url();?>management/load_dashboard_overview_all/<?php echo $projedid; ?>/<?php echo $projectcode;?>');
// });
$("#clickoverview").click(function(){
	$(".loadoverview").load('<?php echo base_url();?>management/load_dashboard_overview_all/<?php echo $projedid; ?>/<?php echo $projectcode;?>');
});
$("#clickloadcontact").click(function(){
	$(".loacontact").load('<?php echo base_url();?>management/load_forcash_contact/<?php echo $projedid; ?>');
});
</script>
