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
              <li><a class="preload" href="<?php echo base_url(); ?>index.php/data_master/setupcostcode">Cost Type</a></li>
							<li><a class="preload" href="<?php echo base_url(); ?>index.php/data_master/setupcostgroupcode/<?php echo $typeid; ?>">Cost Group</a></li>
              <li class="active">Cost SubGroup</li>
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
									<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Cost Groupp	<p><?php echo $typeid; ?> / <?php echo $groupcode; ?></p></h6>
									<div class="heading-elements">
									<a href="<?php echo base_url(); ?>index.php/data_master/setupcostgroupcode/<?php echo $typeid; ?>" class="btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-undo2"></i> Back</a>
                  <button  type="button" data-toggle="modal" data-target="#new" class="btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-plus-circle2"></i> New</button>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">

								</div>
                <table  class="table table-striped datatable-basic">
                    <thead>
                    <tr>
                        <th width="5%">Code</th>
                        <th>Cost Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $n=1; foreach ($subgroup as $val) {?>

                            <tr>
                                <td><?php echo $val->csubgroup_code;?></td>
                                <td><?php echo $val->csubgroup_name;?></td>
                                <td width="15%">
                                  <a data-toggle="modal" data-target="#edit<?php echo $val->csubgroup_id;?>" class="btn border-warning text-warning-600 btn-flat btn-icon btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</a>
                                  <a href="<?php echo base_url(); ?>index.php/datastore_active/del_costsubgroupcode/<?php echo $val->csubgroup_id; ?>/<?php echo $val->cgroup_code;?>/<?php echo $val->ctype_code;?>" class="btn border-danger text-danger-600 btn-flat btn-icon btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</a>
                                </td>

                            </tr>

                            <div id="edit<?php echo $val->csubgroup_id;?>" class="modal fade">
										          <div class="modal-dialog modal-lg">
										            <div class="modal-content">
										              <div class="modal-header bg-primary">
										                <button type="button" class="close" data-dismiss="modal">&times;</button>
										                <h5 class="modal-title">New Costcode Group</h5>
										              </div>

										              <div class="modal-body">
																		<form action="<?php echo base_url(); ?>index.php/datastore_active/editcostsubgroup/<?php echo $val->cgroup_code;?>/<?php echo $val->ctype_code;?>" method="post">
																			<div class="col-md-6">
																					<div class="form-group">
																						<label for="">Group Code</label>
																						<input type="text" class="form-control" readonly="readonly" name="subgroupcode" id="subgroupcode" value="<?php echo $val->csubgroup_code; ?>" placeholder="Example : G0001">
																					</div>
																			</div>
																			<div class="col-md-6">
																					<div class="form-group">
																						<label for="">Type Name</label>
																						<input type="text" class="form-control" name="subgroupname" id="subgroupname" value="<?php echo $val->csubgroup_name; ?>" placeholder="Example : ค่าน้ำมัน">
																					</div>
																			</div>
																			<legend class="text-muted"> Account </legend>
																			<div class="row">
																				<div class="col-md-4">
																					<label>Account No.</label>
																					<div class="input-group">
																					<span class="input-group-btn">
																						<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
																					</span>
																					<input type="text" class="form-control" placeholder="" readonly  name="eaccno" id="eaccno<?php echo $val->csubgroup_id;?>" value="<?php echo $val->accno; ?>">
																					
																					<div class="input-group-btn">
																					<button type="button" class="eaccopen<?php echo $val->csubgroup_id;?> btn btn-default btn-icon" data-toggle="modal" data-target="#eaccopen<?php echo $val->csubgroup_id;?>"><i class="icon-search4"></i></button>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-8">
																				<label for="">Account Name</label>
																				<div class="form-group">
																					<input type="text" class="form-control" readonly name="eaccountname" id="eaccountname<?php echo $val->csubgroup_id;?>" value="<?php echo $val->accname; ?>">
																				</div>
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

                    <?php $n++; } ?>
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
				                <h5 class="modal-title">New Costcode Group</h5>
				              </div>

				              <div class="modal-body">
												<form action="<?php echo base_url(); ?>index.php/datastore_active/addcostsubgroup" method="post">
													<div class="col-md-6">
															<div class="form-group">
																<label for="">Group Code</label>
																<input type="hidden" name="typecode" value="<?php echo $typeid; ?>">
                                <input type="hidden" name="groupcode" value="<?php echo $groupcode; ?>">
																<input type="text" class="form-control" name="subgroupcode" id="subgroupcode" value="" placeholder="Example : G0001">
															</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
																<label for="">Group Name</label>
																<input type="text" class="form-control" name="subgroupname" id="subgroupname" value="" placeholder="Example : ค่าน้ำมัน">
															</div>
													</div>
													<legend class="text-muted"> Account </legend>
													<div class="row">
														<div class="col-md-4">
															<label>Account No.</label>
															<div class="input-group">
															<span class="input-group-btn">
																<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
															</span>
															<input type="text" class="form-control" placeholder="" readonly  name="accno" id="accno" >
															<div class="input-group-btn">
															<button type="button" class="accopen btn btn-default btn-icon" data-toggle="modal" data-target="#accopen"><i class="icon-search4"></i></button>
															</div>
														</div>
													</div>
													<div class="col-md-8">
														<label for="">Account Name</label>
														<div class="form-group">
															<input type="text" class="form-control" readonly name="accountname" id="accountname">
														</div>
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
								<div id="accopen" class="modal fade">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header bg-primary">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Account</h5>
											</div>

											<div class="modal-body">
												<div class="loadaccchart">

												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
												<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
											</div>
										</div>
									</div>
								</div>
<script>
	$(".accopen").click(function(){
		$('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$(".loadaccchart").load('<?php echo base_url(); ?>share/accchart');
	});
</script>

<?php  foreach ($subgroup as $val2) { ?>
<div id="eaccopen<?php echo $val2->csubgroup_id;?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account</h5>
			</div>

			<div class="modal-body">
				<table class="table table-xxs table-hover" >
				<thead>
				<tr>
				<th>No.</th>
				<th>Deptor Name</th>
				<th width="5%">จัดการ</th>
				</tr>
				</thead>
				<tbody>
				<?php   $i=1;?>
				<?php foreach ($resacc as $val){ ?>
				<tr>
				<th scope="row"><?php echo $i;?></th>
				<td><?php echo $val->act_name; ?></td>
				<td><button class="eopendeptor<?php echo $i;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
				</tr>
				<script>
					$(".eopendeptor<?php echo $i;?>").click(function(event) {
						$("#eaccno<?php echo $val2->csubgroup_id;?>").val("<?php echo $val->act_code; ?>");
						$("#eaccountname<?php echo $val2->csubgroup_id;?>").val("<?php echo $val->act_name; ?>");
					});
				</script>
				<?php $i++; } ?>
				</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>
