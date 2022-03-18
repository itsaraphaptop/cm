<?php foreach ($getproj as $val) {?>
							<div class="col-md-4">
								<div class="panel panel-flat border-top-lg border-top-warning">
										<div class="panel-heading">
											<h6 class="panel-title"><?php echo $val->project_name; ?></h6>
											<div class="heading-elements">
												<ul class="icons-list">
																	<li><a data-action="collapse"></a></li>
																	<li><a data-action="reload"></a></li>
																	<li><a data-action="close"></a></li>
																</ul>
															</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

											<img src="<?php echo base_url(); ?>project/<?php echo $val->project_img; ?>" width="372px;" height="278px;" />

										<div class="panel-footer">
											<ul>
												<li><a href="<?php echo base_url(); ?>index.php/inventory/new_doc_issue/<?php echo $val->project_id; ?>" class="preload label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="รับสินค้า">Open</a></li>
											</ul>

											<ul class="pull-right">
												<li class="dropdown">
													<a href="#" data-popup="tooltip" title="" data-original-title=""><i class="icon-three-bars"></i></a>
												</li>
											</ul>
										</div>
									</div>
							</div>
							<?php } ?>