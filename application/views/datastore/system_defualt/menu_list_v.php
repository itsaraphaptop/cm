<!-- Main navbar -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
								</div>

								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-bottom">
											<li class="active"><a href="#label-tab1" data-toggle="tab">SYSTEM <span class="tab1 label bg-slate position-left"> Defualt</span> </a></li>
											<li><a href="#label-tab2" class="tab2" data-toggle="tab"> <span class="label bg-danger position-right">ACCOUNT Breaking</span></a></li>
											<li><a href="#label-tab3" class="tab3" data-toggle="tab"> <span class="label bg-slate position-right">Setup E-mail</span></a></li>
											<!-- <li><a href="#label-tab4" data-toggle="tab">Inactive <span class="label bg-slate position-right">Fixed</span></a></li> -->
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="label-tab1">
												<div id="loadsystem"></div>
											</div>

											<div class="tab-pane" id="label-tab2">
												<div id="loadaccdefualt"></div>
											</div>

											<div class="tab-pane" id="label-tab3">
												<div id="loademail"><p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></div>
											</div>

											<div class="tab-pane" id="label-tab4">
												Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
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
			</div>

			<script type="text/javascript">
			$( window ).on( "load", function() {
		        $("#loadsystem").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
					$("#loadsystem").load('<?php echo base_url(); ?>syscode/system_defualt');
		    });
				$(".tab1").click(function(){
					$("#loadsystem").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
					$("#loadsystem").load('<?php echo base_url(); ?>syscode/system_defualt');
				});
				$(".tab2").click(function(){
					$("#loadaccdefualt").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
					$("#loadaccdefualt").load('<?php echo base_url(); ?>syscode/load_acc_defualt');
				});
				$(".tab3").click(function(){
					$("#loademail").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
					$("#loademail").load('<?php echo base_url(); ?>email/load_setup_email');
				});
				$('#mg').attr('class', 'active');
				$('#mc2').attr('style', 'background-color:#dedbd8');
			</script>