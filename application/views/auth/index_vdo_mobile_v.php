<style>
	video#bgvid {
		position: fixed;
		top: 50%;
		left: 50%;
		min-width: 100%;
		min-height: 100%;
		width: auto;
		height: auto;
		z-index: -100;
		-webkit-transform: translateX(-50%) translateY(-50%);
		transform: translateX(-50%) translateY(-50%);
		background: url(<?php echo base_url();
		?>comp/comp_2017-07-12_9766.png) no-repeat;
		background-size: cover;
	}

	video#bgvid {
		transition: 1s opacity;
	}

	.stopfade {
		opacity: .5;
	}

	#{
 padding-top: 20px;
	}

	@media screen and (max-device-width: 800px) {
		html {
			background: url(<?php echo base_url();
			?>comp/comp_2017-07-12_9766.png) #000 no-repeat center center fixed;
		}
		#bgvid {
			display: none;
		}
	}


	#sidebar-wrapper {
		z-index: 1000;
		position: absolute;
		/*left: 250px;*/
		height: 100%;
		margin-right: 1000px;
		overflow-y: auto;
		background: #fff;

	}

	.footer-bottom {
		background: #d8d8d8;
		padding: 15px 0;
		border-top: 1px solid #d9d9d9;
		font-size: 11px;
		color: #777;
	}

	input[type=checkbox] {
		/* Double-sized Checkboxes */
		-ms-transform: scale(3);
		/* IE */
		-moz-transform: scale(3);
		/* FF */
		-webkit-transform: scale(3);
		/* Safari and Chrome */
		-o-transform: scale(3);
		/* Opera */
		padding: 10px;
	}

	/* Might want to wrap a span around your checkbox text */

	.checkboxtext {
		/* Checkbox text */
		font-size: 110%;
		display: inline;
	}

	body {
		font-family: 'Prompt', sans-serif;
	}
</style>
<div id="show_user"></div>
<div class="navbar navbar navbar-default navbar-fixed-top" style="height: 100px;">
	<div class="navbar-header">

	</div>
	<!-- <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a id="user_online" style="margin-top: 3px;">
                        <i class="icon-user-tie fa-5x"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li></li>
                        <li></li>
                        
                    </ul>
                </li>
            
        </ul>
    </div> -->
</div>
<div class="col-xs-12 col-sm-12" id="sidebar-wrapper">
	<div class="sidebar-content">
		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div style="margin:100px;">
					<div style="margin-left:20px; padding-top: 20px;">
						<!-- <img src="<?php echo base_url();?>comp/comp_2017-07-12_9766.png" class="img-responsive"> -->
					</div>

					<div style="margin-top:20px; margin-left:10px; margin-right:10px;">
						<hr>
						<form class="form" action="<?php echo base_url() ?>index.php/auth/login" method="POST">
							<h3 class="form-signin-heading" style="color: black;font-size: 70px;text-align: center;">Master
							</h3>
							<br>

							<div class="form-group">
								<select class="form-control text-center" name="compcode" data-style="bg-slate" style="height: 100px;font-size: 50px;">
									<?php foreach ($company as $value) {?>
									<option value="<?php echo $value->compcode; ?>" data-iconurl="<?php echo base_url(); ?>comp/<?php echo $value->comp_img; ?>">
										<?php echo $value->company_name; ?>
									</option>
									<?php } ?>
								</select>
							</div>
							<label for="inputEmail" class="sr-only">Username</label>
							<input type="text" id="inputEmail" class="form-control text-center" style="height: 100px;font-size: 50px;" placeholder="Username"
							 name="username" required autofocus>
							<br>

							<label for="inputPassword" class="sr-only">Password</label>
							<input type="password" id="inputPassword" class="form-control  text-center" style="height: 100px;font-size: 50px;" placeholder="Password"
							 name="password" required>
							<div class="form-group" align="center">
								<br>
								<input type="checkbox" name="" value="remember-me" />
								<span class="checkboxtext" style="margin-left:20px;height: 100px;font-size: 40px;">
									Remember me
								</span>
								<br>
							</div>
							<!--              <div class="checkbox checkboxtext">
                                    <label>
                                        <input type="checkbox" class="" > <b style="color: black;font-size: 40px;"> Remember me</b>
                                    </label>
                                </div> -->
							<!-- </div> -->

							<button class="btn btn-lg btn-primary btn-block" type="submit" style="height: 100px;font-size: 50px;">Login</button>
						</form>
						<br>
						<!-- <a href="<?php echo base_url() ?>forget_password" style="color: black;height: 100px;font-size: 40px;">
						<u>Forget Password ?</u>
						</a> -->


					</div>

				</div>
			</div>
		</div>


		<!-- /user menu -->
		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">

			</div>
		</div>

		<!-- /main navigation -->
	</div>



</div>







<!-- <video autoplay loop poster="<?php echo base_url();?>dist/img/logo.jpg" id="bgvid"> -->

<!-- <source src="<?php echo base_url();?>dist/img/mm.mp4" type="video/mp4"> -->
<!-- </video> -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		var width = $(window).width();
		// 768
		// alert(width);

		// alert(width);
		$('#user_online').click(function(event) {
			$('#show_user').empty();
			$.post('<?php echo base_url(); ?>auth/user_online_index', function(
				data) {}).done(function(data) {
				$('#show_user').html(data);
				$("#modal_users").modal('show');
			});
		});
	});
</script>