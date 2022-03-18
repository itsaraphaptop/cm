<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Itsaraphap Thanatka">
	<title>NinjaERP Business Intelligence</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->


	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/login_validation.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/selectboxit.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_selectbox.js"></script>
	<!-- /theme JS files -->
	<style>
	    body {
	    overflow: hidden;
	    color: white;
	}
	iframe {
	     position: absolute;
	     z-index: 1;
	     top: 0;
	     left: 0;
	     width: 100%;
	     height: 100%;
	}
	#mtax {
		margin-top: 600px;
		margin-left: 1000px;
		position: absolute;
		overflow: auto;
		 z-index: 2;
	}
	#containerbox {
	     position: absolute;
	     z-index: 2;
	     top: 0;
	     left: 0;
	     width: 100%;
	     height: 100%;
	     overflow: auto;
	     /*background: url('<?php echo base_url();?>assets/images/bgsc.png') top center no-repeat;*/

	}
	    </style>
</head>
<?php foreach ($img as  $value) {
	$img = $value->comp_img;
} ?>
<body>
<iframe src="http://www.http://www.ninjaerp.co/dist/bg.html"></iframe>

	<!-- Page container -->
	 <div id="containerbox">

	<div class="page-container login-container">
		<!-- <div id="mtax">
			<h1>Construction Information Management System</h1>
		</div> -->

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Form with validation -->
						<div class="panel-login panel-body-login login-form">
							<div class="text-center">
								<!-- <div class="icon-object border-success text-success"><i class="icon-reading"></i></div> -->
								<div class="comimg">
									<img  src="<?php echo base_url(); ?>comp/comp_2017-01-05_8635.jpg" class="img-responsive" />
								</div>

								<h5 class="content-group">ปิดปรับปรุงระบบ</h5>
								<img src="<?php echo base_url(); ?>assets/images/maintenance.jpg" class="img-responsive">
							</div>
						</div>
					<!-- /form with validation -->


					<!-- Footer -->
					<div class="footer text-info">
						<!-- &copy; 2016. <a href="#" class="text-info">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" class="text-info" target="_blank">NinjaERP</a> -->
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
</div>
<script type="text/javascript">
$('select').on('change', function() {
	 $('.comimg').html('<img src="'+$(this).find(':selected').data('iconurl')+'" class="img-responsive" />');
});
</script>
</body>
</html>
