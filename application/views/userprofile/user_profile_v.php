<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">




			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">

					<!-- Header content -->
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Pages</span> - Profile</h4>

							<ul class="breadcrumb position-right">
								<li><a href="index.html">Home</a></li>
								<li><a href="user_pages_profile.html">User pages</a></li>
								<li class="active">Profile</li>
							</ul>
						</div>


					</div>
					<!-- /header content -->


					<!-- Toolbar -->
					<div class="navbar navbar-default navbar-xs">
						<ul class="nav navbar-nav visible-xs-block">
							<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
						</ul>

						<div class="navbar-collapse collapse" id="navbar-filter">
							<ul class="nav navbar-nav element-active-slate-400">
								<li class="active"><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Settings</a></li>
							</ul>
						</div>
					</div>
					<!-- /toolbar -->

				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
<?php foreach ($prof as $key => $value) {?>

					
<?php } ?>
						<div class="col-lg-3">

							<!-- User thumbnail -->
							<div class="thumbnail">
								<div class="thumb thumb-rounded thumb-slide">
									<img src="<?php echo base_url() ;?>profile/<?php echo $imgu; ?>" id="imgAvatar" alt="">

								</div>

						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin"><?php echo $name; ?> <small class="display-block"><?php echo $project; ?><?php echo $dep; ?></small></h6>
					    			<ul class="icons-list mt-15">
				                    	<li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
			                    	</ul>
			                    	<br>
							            <form action="<?php echo base_url(); ?>upload/uploadprofile" method="post" enctype="multipart/form-data">
						                    <div class="form-group">
						                    <label>Upload profile image</label>
						                      <input class="form-control" type="file" name="userfile" size="20"  OnChange="showPreview(this)">
						                      <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>

						                        <button type="submit" name="improfile" class="btn btn-primary btn-block" style="margin-top:10px;" data-loading-text="Loading..." id="loadimg" autocomplete="off"> ยืนยันการอัพโหลดรูปภาพ</button>
						                    </div>
					                    </form>
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->


				</div>

				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
<script>

	function showPreview(ele)
  {
      $('#imgAvatar').attr('src', ele.value); // for IE
            if (ele.files && ele.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgAvatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(ele.files[0]);
            }
  }
</script>
