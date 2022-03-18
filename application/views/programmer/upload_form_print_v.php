<div class="content-wrapper">
    <div class="content">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Setup Print Form<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
					<div class="tabbable">
						<ul class="nav nav-tabs nav-tabs-component">
							<li class="active"><a href="#CC" data-toggle="tab"><i class="icon-folder6 position-left"></i>Cost Control</a></li>
							<li><a href="#PR" data-toggle="tab"><i class="icon-folder6 position-left"></i> Purchase Requsition</a></li>
							<li><a href="#PO" data-toggle="tab"><i class="icon-folder6 position-left"></i> Purchase Order</a></li>
							<li><a href="#IC" data-toggle="tab"><i class="icon-folder6 position-left"></i> Inventory Management</a></li>
							<li><a href="#FA" data-toggle="tab"><i class="icon-folder6 position-left"></i> Fixed Asset</a></li>
							<li><a href="#AP" data-toggle="tab"><i class="icon-folder6 position-left"></i> Account Payable</a></li>
							<li><a href="#AR" data-toggle="tab"><i class="icon-folder6 position-left"></i> Account Receivable</a></li>
							<li><a href="#GL" data-toggle="tab"><i class="icon-folder6 position-left"></i> Ganaral Ledger</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Other <span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#PM" data-toggle="tab">Project Management</a></li>
									<li><a href="#MT" data-toggle="tab">Master Configuration</a></li>
								</ul>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="CC">
								CC
							</div>
							<div class="tab-pane" id="PR">
								<div class="container-fluid">
									<div class="col-md-6">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Form <small class="position-right"><a href="#" class="label label-primary"> Add</a></small></h6>
											<ul class="media-list">
												<?php foreach ($report as $key => $reportpr) {
													$typepr = $reportpr->module;
													$type = $reportpr->type;
													if ($typepr!="pr" || $type!="form") { }else{
												?>
													<li class="media">
														<div class="media-left media-middle">
															<i class="icon-file-empty icon-2x"></i>
														</div>

														<div class="media-body">
															<?php echo $reportpr->report1;?>
															<ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
																<li><?php echo $reportpr->descreption;?></li>
															</ul>
														</div>

														<div class="media-right">
														<ul class="icons-list icons-list-extended text-nowrap">													
															<li>
																<!-- <a href="#"><i class="icon-upload"></i></a> -->
															</li>

															<li>
																<a href="<?php echo base_url();?>report/designerload?typ=<?php echo $reportpr->report1;?>" target="_blank"><i class="icon-design"></i></a>
															</li>
														</ul>
													</div>
													</li>
												<?php }
												}
												?>
											</ul>
										</div>
									</div>
									<div class="col-md-6">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Report <small class="position-right"><a href="#" class="label label-primary"> Add</a></small></h6>
											<ul class="media-list">
												<?php foreach ($report as $key => $reportpr) {
													$typepr = $reportpr->module;
													$type = $reportpr->type;
													if ($typepr=="pr" && $type=="report_fx") {?>
													<li class="media">
														<div class="media-left media-middle">
															<i class="icon-file-empty icon-2x"></i>
														</div>

														<div class="media-body">
															<?php echo $reportpr->report1;?>
															<ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
																<li><?php echo $reportpr->descreption;?></li>
															</ul>
														</div>

														<div class="media-right">
														<ul class="icons-list icons-list-extended text-nowrap">													
															<li>
																<!-- <a href="#"><i class="icon-upload"></i></a> -->
															</li>

															<li>
																<a href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=DesignerFx&stimulsoft_report_key=<?php echo $reportpr->report1;?>" target="_blank"><i class="icon-design"></i></a>
															</li>
														</ul>
													</div>
													</li>
													<?php }elseif($typepr=="pr" && $type=="report"){?>
													<li class="media">
														<div class="media-left media-middle">
															<i class="icon-file-empty icon-2x"></i>
														</div>

														<div class="media-body">
															<?php echo $reportpr->report1;?>
															<ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
																<li><?php echo $reportpr->descreption;?></li>
															</ul>
														</div>

														<div class="media-right">
														<ul class="icons-list icons-list-extended text-nowrap">													
															<li>
																<!-- <a href="#"><i class="icon-upload"></i></a> -->
															</li>

															<li>
																<a href="<?php echo base_url();?>report/designerload?typ=<?php echo $reportpr->report1;?>" target="_blank"><i class="icon-design"></i></a>
															</li>
														</ul>
													</div>
													</li>
												<?php }elseif ($typepr!="pr"&& $type!="report_fx" && $type!="report" && $type!="form"){?>
													
												<?php }
												}
												?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="PO">
								<div class="container-fluid">
									<div class="col-md-4">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Purchase Order Form <small class="position-right"><a href="#" class="label label-primary position-right"> Add</a></small></h6>
											<ul class="media-list">
												<?php foreach ($report as $key => $reportpo) {
													$typepo = $reportpo->module;
													if ($typepo!="po") { }else{
												?>
													<li class="media">
														<div class="media-left media-middle">
															<i class="icon-file-empty icon-2x"></i>
														</div>

														<div class="media-body">
															<?php echo $reportpo->report1;?>
															<ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
																<li><?php echo $reportpo->descreption;?></li>
															</ul>
														</div>

														<div class="media-right">
														<ul class="icons-list icons-list-extended text-nowrap">													
															<li>
																<!-- <a href="#"><i class="icon-upload"></i></a> -->
															</li>

															<li>
																<a href="<?php echo base_url();?>report/designerload?typ=<?php echo $reportpo->report1;?>" target="_blank"><i class="icon-design"></i></a>
															</li>
														</ul>
													</div>
													</li>
												<?php }
												}
												?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="IC">
								<div class="container-fluid">
									<div class="col-md-4">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Inventory Form <small class="position-right"><a href="#" class="label label-primary"> Add</a></small></h6>
											
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="FA">
								FA
							</div>
							<div class="tab-pane" id="AP">
								<div class="container-fluid">
									<div class="col-md-4">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Account Payable Form <small class="position-right"><a href="#" class="label label-primary"> Add</a></small></h6>
											<ul class="media-list">
												<?php foreach ($report as $key => $reportpr) {
													$typepr = $reportpr->module;
													if ($typepr!="ap") { }else{
												?>
													<li class="media">
														<div class="media-left media-middle">
															<i class="icon-file-empty icon-2x"></i>
														</div>

														<div class="media-body">
															<?php echo $reportpr->report1;?>
															<ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
																<li><?php echo $reportpr->descreption;?></li>
															</ul>
														</div>

														<div class="media-right">
														<ul class="icons-list icons-list-extended text-nowrap">													
															<li>
																<!-- <a href="#"><i class="icon-upload"></i></a> -->
															</li>

															<li>
																<a href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=DesignerFx&stimulsoft_report_key=<?php echo $reportpr->report1;?>" target="_blank"><i class="icon-design"></i></a>
															</li>
														</ul>
													</div>
													</li>
												<?php }
												}
												?>
											</ul>
											
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="AR">
								<div class="container-fluid">
									<div class="col-md-4">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Account Receivable Form <small class="position-right"><a href="#" class="label label-primary position-right"> Add</a></small></h6>
											<ul class="media-list">
												<?php foreach ($report as $key => $reportpr) {
													$typepr = $reportpr->module;
													if ($typepr!="ar") { }else{
												?>
													<li class="media">
														<div class="media-left media-middle">
															<i class="icon-file-empty icon-2x"></i>
														</div>

														<div class="media-body">
															<?php echo $reportpr->report1;?>
															<ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
																<li><?php echo $reportpr->descreption;?></li>
															</ul>
														</div>

														<div class="media-right">
														<ul class="icons-list icons-list-extended text-nowrap">													
															<li>
																<!-- <a href="#"><i class="icon-upload"></i></a> -->
															</li>

															<li>
																<a href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=DesignerFx&stimulsoft_report_key=<?php echo $reportpr->report1;?>" target="_blank"><i class="icon-design"></i></a>
															</li>
														</ul>
													</div>
													</li>
												<?php }
												}
												?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="GL">
								<div class="container-fluid">
									<div class="col-md-4">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Ganaral Lagel Form <small class="position-right"><a href="#" class="label label-primary"> Add</a></small></h6>
											
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="PM">
								PM
							</div>
							<div class="tab-pane" id="MT">
								<div class="container-fluid">
									<div class="col-md-4">
										<div class="content-group">
											<h6 class="text-semibold heading-divided"><i class="icon-folder6 position-left"></i> Master Form <small class="position-right"><a href="#" class="label label-primary"> Add</a></small></h6>
											<ul class="media-list">
												<?php foreach ($report as $key => $reportpr) {
													$typepr = $reportpr->module;
													if ($typepr!="company") { }else{
												?>
													<li class="media">
														<div class="media-left media-middle">
															<i class="icon-file-empty icon-2x"></i>
														</div>

														<div class="media-body">
															<?php echo $reportpr->report1;?>
															<ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
																<li><?php echo $reportpr->descreption;?></li>
															</ul>
														</div>

														<div class="media-right">
														<ul class="icons-list icons-list-extended text-nowrap">													
															<li>
																<!-- <a href="#"><i class="icon-upload"></i></a> -->
															</li>

															<li>
																<a href="<?php echo base_url();?>report/designerload?typ=<?php echo $reportpr->report1;?>" target="_blank"><i class="icon-design"></i></a>
															</li>
														</ul>
													</div>
													</li>
												<?php }
												}
												?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- end tab -->
                </div>
            </div>
        </div>
    </div>
</div>