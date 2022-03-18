<div class="panel panel-flat">
	<div class="panel-body">
		<div class="tabbable">
			<ul class="nav nav-tabs nav-tabs-bottom">
				<li class="active"><a href="#bottom-tab1" data-toggle="tab">OVERVIEW</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="bottom-tab1">
					<div class="row">
					<?php $i=1; for ($i=1; $i < 9 ;) { ?>
					  <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo base_url(); ?>assets/images/Construction2.png" alt="">
					      <div class="caption">
					        <h3>project <?php echo $i; ?></h3>
					        <p>กกกกกกกกกก</p>
					        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
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