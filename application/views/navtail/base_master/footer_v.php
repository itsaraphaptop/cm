<div class="navbar navbar-default navbar-sm navbar-fixed-bottom" >
						<ul class="nav navbar-nav no-border visible-xs-block">
							<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
						</ul>

						<div class="navbar-collapse collapse" id="navbar-second">
							<div class="navbar-left">
								<ul class="nav navbar-nav">
									<!-- modlue 1  -->
									<li id="btn-user_online"><a href="#"><i class="glyphicon glyphicon-user"></i> Online User</a>
									<!-- modlue 1  -->

									<!-- modlue 2 -->
									<!-- dropdown -->
									<!-- <li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">

											<i class="glyphicon glyphicon-user"></i> <span> Online User </span>
										</a>
										<ul class="dropdown-menu dropdown-menu-left" style="width: 300px;">
											<li ><a href="#"><i class="glyphicon glyphicon-user"></i> Online User</a>
											<li style="max-height: 500px;background-color: #99baef;overflow-y: scroll;">
												<ul>
													<li class="media">
														<div class="media-left">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</div>
														<div class="media-body">
															<a href="#">
																Richard Vango
																<span class="media-annotation pull-right">01:43</span>
															</a>
														</div>
													</li>
													<li class="media">
														<div class="media-left">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</div>
														<div class="media-body">
															<a href="#">
																Richard Vango
																<span class="media-annotation pull-right">01:43</span>
															</a>
														</div>
													</li>

													<li class="media">
														<div class="media-left">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</div>
														<div class="media-body">
															<a href="#">
																Richard Vango
																<span class="media-annotation pull-right">01:43</span>
															</a>
														</div>
													</li>

													<li class="media">
														<div class="media-left">
															<img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt="">
														</div>
														<div class="media-body">
															<a href="#">
																Richard Vango
																<span class="media-annotation pull-right">01:43</span>
															</a>
														</div>
													</li>



												</ul>
											</li>

										</ul>
									</li> -->
									<!-- dropdown -->
									<!-- modlue 2 -->
								</ul>
							</div>

							<div class="navbar-right">
								<ul class="nav navbar-nav">
									<li><a href="#">Page rendered in <strong>{elapsed_time}</strong> seconds.</a> </li>
									<!-- <li><a href="#">Policy</a></li>
									<li><a href="#" class="text-semibold">Upgrade your account</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="icon-cog3"></i>
											<span class="visible-xs-inline-block position-right">Settings</span>
											<span class="caret"></span>
										</a>

										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#"><i class="icon-dribbble3"></i> Dribbble</a></li>
											<li><a href="#"><i class="icon-pinterest2"></i> Pinterest</a></li>
											<li><a href="#"><i class="icon-github"></i> Github</a></li>
											<li><a href="#"><i class="icon-stackoverflow"></i> Stack Overflow</a></li>
										</ul>
									</li> -->
								</ul>
							</div>
						</div>
					</div>

<div id="modal-user" class="modal fade" data-backdrop="false">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">User online</h5>
			</div>
				<div id="user_online_content" class="modal-body">
					<table class="table table-responsive" id="table_user">
						<tr>
							<td>status</td>
							<td>รหัสผนักงาน</td>
							<td>ชื่อ พนักงาน</td>
						</tr>
						<tbody id="tbody-user">

						</tbody>
					</table>
				</div>
		</div>
	</div>

</body>
</html>
<script type="text/javascript">
var online = "<span class='label bg-success-400'>online</span>";
	$(function(){
		$("#btn-user_online").click(function(event) {

				// get json user
				$.get('<?=base_url()?>user_online/get_user', function() {

				}).done(function(data){
					//$("#user_online_content").text(data);
					var json_user =  jQuery.parseJSON(data);
					$("#tbody-user").empty();
					var text_no = "no data";
					if(json_user.length == 0){
						$("#tbody-user").append('<tr><td>'+text_no+'</td><td>'+text_no+'</td><td>'+text_no+'</td></tr>');
					}
					$.each(json_user, function(index, user) {
						console.log(user);
						$("#tbody-user").append(
							'<tr>'+
							'<td>'+((user.LoginStatus == 1) ? online : "" )+'</td>'+
							'<td>'+user.m_code+'</td>'+
							'<td>'+user.m_name+'</td>'+
							'</tr>'
						)

					});
					$("#modal-user").modal("show");
				});

		});
	});
 $(function() {
    // Idle timeout
        $.sessionTimeout({
            heading: "h5",
            title: "Session Timeout",
            message: "Your session is about to expire. Do you want to stay connected?",
            warnAfter: 4000000, // (1.40 minutes)
            redirAfter: 6000000, // ((1.40 hours))
            keepAliveUrl: "/",
            redirUrl: "<?php echo base_url();?>auth/logout",
            logoutUrl: "<?php echo base_url();?>auth/logout"
        });
    });
</script>
