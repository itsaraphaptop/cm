<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Itsaraphap Thanatka">
	<title>NinjaERP Business Intelligence System</title>

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
					<form method="post" action="<?php echo base_url();?>index.php/auth/login" class="form-validate">
						<div class="panel-login panel-body-login login-form">
							<div class="text-center">
								<!-- <div class="icon-object border-success text-success"><i class="icon-reading"></i></div> -->
								<div class="comimg">
									<img  src="<?php echo base_url(); ?>comp/<?php echo $img; ?>" class="img-responsive" />
								</div>

								<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
							</div>
							<div class="content-divider text-muted form-group"><span>Select Company</span></div>
							<div class="form-group">
										<select class="selectbox bootstrap-select-solid bs-select-hidden" name="compcode" data-style="bg-slate">
											<?php foreach ($company as $value) {?>
											<option value="<?php echo $value->compcode; ?>" data-iconurl="<?php echo base_url(); ?>comp/<?php echo $value->comp_img; ?>">
												<?php echo $value->company_name; ?>
											</option>

											<?php } ?>
										</select>
									</div>
								<div class="content-divider text-muted form-group"><span>Login</span></div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="username" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" id="login" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>
							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
							<img src="<?php echo base_url(); ?>assets/images/ssl.jpg">
						</div>
					</form>
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
