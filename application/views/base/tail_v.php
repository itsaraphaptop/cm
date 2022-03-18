<style>
.scroll {

    height: 250px;
    overflow: scroll;
}
	li.user-header {
    /*height: 175px;*/
    padding: 10px;
    text-align: center;
    /*background-color: #37474F;*/
    background-color: #ec971f
}
#user {
    /*height: 175px;*/
    padding: 10px;
    text-align: center;
}
</style>
<!-- Main navbar -->
<?php 
	$session_data = $this->session->userdata('sessed_in');
								$username = $session_data['username'];
								$this->db->select('*');
        $query = $this->db->get('company');
        $res = $query->result();
        foreach ($res as $value) {
            $img = $value->comp_img;

        }
								$m_id =$session_data['m_id'];
							  $this->db->select("*");
							  $this->db->where('m_user',$username);

							  $query = $this->db->get('menu_right');
							  $res = $query->result();
							  foreach ($res as $e) {
							  	$master = $e->m_master;
							  	$mpm = $e->m_pm;
							  	$map = $e->m_ap;
							  	$mic = $e->m_ic;
							  	$mpo = $e->m_po;
							  	$mhr = $e->m_hr;
							  	$mleave = $e->m_leave;
							  	$mapprove = $e->pettycash_approve;
							  	$mpr = $e->pr_approve;
							  }
 ?>
	<div class="navbar navbar-inverse bg-orange-600 navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="/"><img src="<?php echo base_url(); ?>comp/<?php echo $img; ?>" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<!-- <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li> -->
				<li>
					<a class="sidebar-control sidebar-secondary-hide hidden-xs">
						<i class="icon-transmission"></i>
					</a>
				</li>

			</ul>

			<p class="navbar-text"><span class="label bg-success-400">Online</span></p>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown language-switch">
					<a class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>

					<ul class="dropdown-menu">
						<li><a class="english"><img src="<?php echo base_url(); ?>assets/images/flags/gb.png" alt=""> English</a></li>
						<li><a class="thai"><img src="<?php echo base_url(); ?>assets/images/flags/th.png" alt=""> Thailand</a></li>
						<li><a class="lao"><img src="<?php echo base_url(); ?>assets/images/flags/la.png" alt=""> Lao</a></li>
					</ul>
				</li>


				<li class="dropdown">	
				<?php
				$dates= date("Y-m-d");
				$hdate = $this->db->query("SELECT count(emp_member) as nummem from emp_profile_tb where emp_bdate='$dates' ")->result();
				foreach ($hdate as $value) {
					$nummem=$value->nummem;
				if ($value->nummem != 0) {
					$bdate = $this->db->query("SELECT * from emp_profile_tb where emp_bdate='$dates' ")->result();
					  ?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400"><?php echo $nummem; ?></span>
					</a>
					<div class="dropdown-menu dropdown-content width-350">	
							<ul class="media-list dropdown-content-body">
							<?php foreach ($bdate as $key) { ?>
							<li class="media">
								<div class="media-left">
								<img src="<?php echo base_url();?>profile/<?php echo $key->emp_pic;?>" class="img-circle" style="max-height:100px;">
									<span class="badge bg-danger-400 media-badge"></span>
								</div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">วันนี้เป็นวันเกิดของ</span>
									</a>

									<span class="text-muted">คุณ<?php echo $key->emp_name_t; ?></span>
								</div>
							</li>

							<?php } ?>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
							<?php
							}
						}			

						  ?>
								<?php if ($mhr!="true") {}else{?>		
				<li class="dropdown">
				<?php $c = $this->db->query("SELECT count(leave_id) as numle from emp_leave where status_read='N' ")->result();
				foreach ($c as $cc) {
					$num = $cc->numle;
				}
				if ($num!=0) {
				 	$l = $this->db->query("SELECT * from emp_leave JOIN master_leave on master_leave.le_id=emp_leave.type_master JOIN emp_profile_tb on emp_profile_tb.emp_member=emp_leave.emp_member where status_read='N' ")->result();
				
				?>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="leavedown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400"><?php echo $num; ?></span>
					</a>
					<div class="dropdown-menu dropdown-content width-350">	
							<ul class="media-list dropdown-content-body">
								<?php foreach ($l as $ll)  { ?>
								<li class="media">
									<div class="media-left">
										<span class="badge bg-danger-400 media-badge"></span>
									</div>
									<div class="media-body">
										<a href="<?php echo base_url();?>emp_profile/leavedown/<?php echo $ll->emp_id; ?>" class="media-heading text-center">
											<span class="text-semibold ">แจ้งลา <?php echo $ll->name_leave; ?>(<?php echo $ll->leave_detail; ?>)</span>
										</a>

										<span class="text-muted text-center">คุณ<?php echo $ll->emp_name_t; ?></span>
									</div>
								</li>
								<?php } ?>
							</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
				<?php } } ?>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" alt="">
						<span><?php echo $name; ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<!-- <li><a href="<?php echo base_url(); ?>userprofile"><i class="preload icon-user-plus"></i> My profile</a></li> -->
						<!-- <li><a href="#"><i class="icon-coins"></i> My balance</a></li> -->
						<!-- <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li> -->
						<!-- <li class="divider"></li> -->
						<li class="user-header">
													 <img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" class="img-circle" style="max-height:100px;">

													 <p>
															 <?php echo $name; ?>
															 <small></small>
													 </p>
											 </li>
						<?php
							  if ($master!="true") {
							  }else{
						 ?>

						<li><a class="preload" href="<?php echo base_url(); ?>data_master"><i class="icon-cog5"></i> Setup Master</a></li>
						<?php }?>
						<?php if ($username=="admin") {?>
							<li><a href="<?php echo base_url();?>data_structure/forprogrammer"><i class="icon-database2"></i> For Programmer</a></li>
						<?php }?>
						<li><a data-toggle="modal" data-target="#leave" ><i class="glyphicon glyphicon-send"></i>Request Time Off</a></li>
						<li><a data-toggle="modal" data-target="#changepass"><i class="icon-key"></i> Change Password</a></li>


						<li><a href="<?php echo base_url(); ?>auth/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			
			<!-- /main sidebar -->
<!-- modal  Change password-->
 <div class="modal fade" id="changepass" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content bg-slate-800">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
        <div class="modal-body">
        <!-- <div class="panel-body"> -->
            <div class="row">
						<form id="contact" method="post" action="<?php echo base_url(); ?>index.php/auth/changepass">
					        <div class="modal-body">
					        <!-- User thumbnail -->
								<div class="thumb thumb-rounded thumb-slide">
									<img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" alt="">
									<div class="caption">
										<span>
											<a href="<?php echo base_url(); ?>userprofile" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
											<!-- <a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a> -->
										</span>
									</div>
								</div>

						    	<div class="caption text-center">
						    		<h3 class="text-semibold no-margin"><?php echo $name; ?>
						    			<small class="display-block">
						    				<?php if ($dep=="") {?>
						                      <?php echo $project; ?>
						                  	<?php  }else{ ?>
						                     <?php echo $dep; ?>
						                  	<?php } ?>
						                </small>
						            </h3>
					    			<ul class="icons-list mt-15">
				                    	<li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
			                    	</ul>
						    	</div>
					    	<!-- /user thumbnail -->

			                            <br>
					            <div class="row">
					                <div class="col-xs-12">
					                    <div class="form-group">
					                         <input type="hidden" class="form-control input-sm" name="username" value="<?php echo $username; ?>">
					                        <input type="password" class="password form-control input-lg" required="" name="password" placeholder="New Password">
					                    </div>
					                </div>
					            </div>
					            <div class="row">
					                <div class="col-xs-6">
					                    <div class="form-group">
					                        <button class="change btn btn-primary btn-sm btn-block" name="btnchange" type="submit">Submit</button>
					                    </div>
					                </div>
					                <div class="col-xs-6">
					                	<div class="form-group">
					                        <button class="btn btn-default btn-sm btn-block" data-dismiss="modal">Close</button>
					                    </div>
					                </div>
					            </div>
					        </div>
					      </form>
            </div>
            <!-- </div> -->
        </div>
    </div>
  </div>
</div> <!--end modal -->

<script>
			// Accessibility labels
		$('.pickadate-accessibility').pickadate({
				labelMonthNext: 'Go to the next month',
				labelMonthPrev: 'Go to the previous month',
				labelMonthSelect: 'Pick a month from the dropdown',
				labelYearSelect: 'Pick a year from the dropdown',
				selectMonths: true,
				selectYears: true
		});

</script>
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
				    var frm = $('#contact');
				    frm.submit(function (ev) {
				        $.ajax({
				            type: frm.attr('method'),
				            url: frm.attr('action'),
				            data: frm.serialize(),
				            				success: function (data) {
												swal({
											            title: "Change Password!",
											            text: "Change Password Completed!!.",
											            confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>auth/logout";
                                                  }, 2000);
				            }
				        });
				        ev.preventDefault();

				    });
				</script>
