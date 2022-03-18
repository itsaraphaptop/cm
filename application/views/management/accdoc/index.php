<!-- Main content  trans-->
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Home - Account Document</span></h4>
			</div>
		</div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>management/pm_overview"><i class="icon-home2 position-left"></i> Home</a></li>
				<li><a href="<?php echo base_url(); ?>accdoc/show_accdoc">Account Document</a></li>
			</ul>
		</div>
	</div>
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-2">
						<label>Year :</label>
						<input type="number" id="year" class="form-control" placeholder="Enter Year A.D.">
					</div>
					<div class="col-xs-1">
						<label for="">&nbsp;</label>
						<br>
						<button class="btn btn-default" id="search"><i class="icon-search4"></i> ค้นหา</button>
					</div>
				</div>
				<div id="content">
					
				</div>
			</div>
		</div>
	</div>
	<!-- /content area -->
</div>
<!-- /main content -->
<script type="text/javascript">
	$("#search").click(function() {
		var year = $("#year").val();
		// alert(year);
		if(year != ''){
			if (year.length == 4) {
				$.post('<?php echo base_url(); ?>accdoc/content_accdoc', {year: year}, function() {
				}).done(function(data){
					$('#content').html(data);
				});
				
			}else{
				swal("Error!", "กรุณากรอกปีที่ต้องการ!", "error");
			}
			
		}else{
			// alert('กรุณากรอกปีที่ต้องการ');
			swal("Error!", "กรุณากรอกปีที่ต้องการ!", "error");
		}
		
	});

	$('#inq').attr('class', 'active');
	$('#inq_sub4').attr('style', 'background-color:#dedbd8');
</script>