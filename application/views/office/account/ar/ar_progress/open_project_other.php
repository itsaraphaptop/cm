<div class="page-header">
	<div class="panel-body">
		<div class="row form-group">
			<h3 class="panel-title">ใบแจ้งหนี้อื่นๆ</h3>
			<hr>
			<div class="col-md-12 col-lg-12 col-sm-12">
				<a href="<?=base_url();?>ar/add_other" class="btn btn-xs btn-success pull-right"><i class="icon-plus-circle2"></i> Add Other</a>
			</div>
		</div>
		<div class="row">
			<div id="archive_other"></div>
		</div>
	</div>
</div>
<script>
	function project() {
		$("#archive_other").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#archive_other").load('<?php echo base_url(); ?>ar/other_project');
	}

	function department() {
		$("#archive_other").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#archive_other").load('<?php echo base_url(); ?>ar/other_department');
	}
	
project();
	// other_project
</script>