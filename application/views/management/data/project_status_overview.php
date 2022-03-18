<div class="content-wrapper">
    <div class="content">
        <div class="row">

		    <div class="col-md-12">

<div class="panel panel-flat">
	<div class="panel-body">
		<div class="tabbable">
			<ul class="nav nav-tabs nav-tabs-bottom">
				<li class="active"><a href="#bottom-tab1" data-toggle="tab">OVERVIEW </a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="bottom-tab1">
					<div class="row">
					<?php $i=1; foreach ($pj as $key => $value)  { ?>
					  <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
							<?php if ($value->project_img){?>
								<img src="<?php echo base_url(); ?>project/<?php echo $value->project_img;?>" alt="img-responsive">
							<?php }else{ ?>
								<img src="<?php echo base_url(); ?>assets/images/construction2.png" alt="img-responsive">
							<?php } ?>
					      
					      <div class="caption">
					        <h3> <?php echo $value->project_name; ?></h3>
					        <p class="text-muted"><?php echo $value->project_code; ?></p>
					        <p><a href="<?php echo base_url(); ?>management/project_status_overview_all/<?php echo $value->project_code; ?>/<?php echo $value->project_id;?>" class="btn btn-primary btn-xs" role="button">OPEN</a>
									<!-- <p><a href="<?php echo base_url(); ?>management/project_overview_by_project/<?php echo $value->project_code; ?>" class="btn btn-primary btn-xs" role="button">OPEN</a> -->
					      </div>
					    </div>
					  </div>
					  <?php $i++; } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>