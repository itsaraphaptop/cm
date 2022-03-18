<div class="page-header page-header-transparent">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Master </span> - Setup Cost Code</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a class="preload" href="<?php echo base_url(); ?>index.php/data_master">Master</a></li>
							<li class="active">Cost Type</li>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
				</div>

        <div class="content">

					<!-- Info alert -->
					<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
						<h6 class="alert-heading text-semibold">Cost Code components</h6>
						ระบบการจัดข้อมูลรหัสต้นทุน.
				    </div>
				    <!-- /info alert -->

                <div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Cost Type</h6>
									<div class="heading-elements">
									<button  type="button" data-toggle="modal" data-target="#new" class="btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-plus-circle2"></i> New</button>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">

								</div>
                <table class="table table-striped table-xs datatable-basic">
                    <thead>
                    <tr>
                        <th width="5%">Code</th>
                        <th>Cost Name</th>
                        <th width="20%">วันที่สร้าง</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($ccosttype as $val) {?>

                            <tr>
                                <td><?php echo $val->ctype_code;?></td>
                                <td><?php echo $val->ctype_name;?></td>
                                <td><?php echo $val->createdate;?></td>
                                <td width="20%"><a href="<?php echo base_url(); ?>index.php/data_master/setupcostgroupcode/<?php echo $val->ctype_code; ?>" class="preload btn border-primary text-primary-600 btn-flat btn-icon btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</a>
                                <a data-toggle="modal" data-target="#edit<?php echo $val->ctype_id;?>" class="btn border-warning text-warning-600 btn-flat btn-icon btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</a>
                                <a href="<?php echo base_url(); ?>index.php/datastore_active/del_costtypecode/<?php echo $val->ctype_id; ?>" class="preload btn border-danger text-danger-600 btn-flat btn-icon btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</a> </td>

                            </tr>

														<div id="edit<?php echo $val->ctype_id;?>" class="modal fade">
										          <div class="modal-dialog">
										            <div class="modal-content">
										              <div class="modal-header bg-primary">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h5 class="modal-title">New Costcode Type</h5>
										              </div>

										              <div class="modal-body">
																		<form action="<?php echo base_url(); ?>index.php/datastore_active/editcosttype" method="post">
																			<div class="col-md-6">
																					<div class="form-group">
																						<label for="">Type Code</label>
																						<input type="text" class="form-control" readonly="readonly" name="typecode" id="typecode" value="<?php echo $val->ctype_code; ?>" placeholder="Example : G0001">
																					</div>
																			</div>
																			<div class="col-md-6">
																					<div class="form-group">
																						<label for="">Type Name</label>
																						<input type="text" class="form-control" name="typename" id="typename" value="<?php echo $val->ctype_name; ?>" placeholder="Example : ค่าน้ำมัน">
																					</div>
																			</div>

										              </div>
										              <div class="modal-footer">
																		<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
										                <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
										              </div>
																	</form>
										            </div>
										          </div>
										        </div>


                    <?php } ?>


                </tbody>
                </table>

							</div>
            <!-- Footer -->
            <div class="footer text-muted">
             <!--  © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a> -->
            </div>
            <!-- /footer -->
        </div>

				        <div id="new" class="modal fade">
				          <div class="modal-dialog">
				            <div class="modal-content">
				              <div class="modal-header bg-primary">
				                <button type="button" class="close" data-dismiss="modal">&times;</button>
				                <h5 class="modal-title">New Costcode Type</h5>
				              </div>

				              <div class="modal-body">
												<form action="<?php echo base_url(); ?>index.php/datastore_active/addcosttype" method="post">
													<div class="col-md-6">
															<div class="form-group">
																<label for="">Type Code</label>
																<input type="text" class="form-control" name="typecode" id="typecode" value="" placeholder="Example : G0001">
															</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
																<label for="">Type Name</label>
																<input type="text" class="form-control" name="typename" id="typename" value="" placeholder="Example : ค่าน้ำมัน">
															</div>
													</div>

				              </div>
				              <div class="modal-footer">
												<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
				                <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
				              </div>
											</form>
				            </div>
				          </div>
				        </div>
