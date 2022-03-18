<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li>Account Payable Archive</li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">



					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Account Payable Archive</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

						</div>
            <div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
							<table class="table table-hover table-xxs datatable-basic">
							<thead>
                <tr>
                  <th>AP CODE</th>
                  <th>AP Type</th>
                  <th>PAY To</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
							</thead>
							<tbody>
									<?php foreach ($res as $val) {
                    $type = substr($val->code,0,3);
										if ($type=="APV") {
											$typee = substr($val->code,0,3);
										}else{
											$typee = substr($val->code,0,2);
										}
                    ?>
									<tr>
									<td><?php echo $val->code; ?></td>
									<td><?php echo $typee; ?></td>
									<td><?php echo $val->payto; ?></td>
									<td><?php echo $val->date; ?></td>
									<td width="10%">
										<ul class="icons-list">
                      <?php if ($type=="APV") {?>
                        <li><a data-toggle="modal" data-target="#openapv<?php echo $val->code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                        <!-- <li class="text-default"><i class="icon-pencil7"></i></li>
												<li class="text-default"><i class="icon-trash"></i></li> -->
												<li><a href="<?php echo base_url(); ?>ap/print_apv/<?php echo $val->code; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                      <?php }else{ ?>
												<li><a data-toggle="modal" data-target="#openapo<?php echo $val->code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                        <!-- <li class="text-default"><i class="icon-pencil7"></i></li>
												<li class="text-default"><i class="icon-trash"></i></li> -->
												<li><a href="<?php echo base_url(); ?>ap/print_apo/<?php echo $val->code; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                      <?php } ?>
										</ul>
									</td>
									</tr>

									<?php	} ?>
							</tbody>
						</table>
						</div>
          </div>
					</div>
					<!-- /highlighting rows and columns -->
					<!--  -->
					<!-- Basic modal apv -->
												<?php foreach ($res as $val2) {
                          $type = substr($val2->code,0,3);
                          ?>
      									<tr>
															<div id="openapv<?php echo $val2->code; ?>" class="modal fade">
											<div class="modal-dialog modal-lg">
												<div class="modal-content ">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title">APV No.: <?php echo $val2->code; ?></h5>
													</div>
													<div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="display-block text-semibold"> APV No.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->code; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> Pay To.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->payto; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> Receipt No.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->apdo; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> Invoice No.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->inv; ?></label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="display-block text-semibold"> PO No.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->docno; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> APV Date.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->date; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> Due Date.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->duedate; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> Credit Term.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->crterm; ?> Day</label>
                                </div>
                              </div>
                            </div>
													</div>
                          <table class="table table-xxs table-bordered table-striped table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>#</th>
                                <th>#</th>
                                <th>#</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                    $this->db->select('*');
                                    $this->db->where('apvi_ref',$val2->code);
                                    $q=$this->db->get('apv_detail');
                                    $r=$q->result();
                                    foreach ($r as $k) {
                               ?>
                              <tr>
                                <td><?php echo substr($k->apvi_costcode,10); ?></td>
                                <td><?php echo $k->apvi_matname; ?></td>
                                <td><?php echo number_format($k->apvi_amount,2); ?></td>
                                <td><?php echo number_format($k->apvi_vattot,2); ?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                          <br>
													<div class="modal-footer">
														<a href="<?php echo base_url(); ?>ap/print_apv/<?php echo $val2->code; ?>" class="btn btn-info" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a>
														<button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>

													</div>


													</div>
												</div>
											</div>
											<?php } ?>
										<!-- /basic modal -->
					<!--  -->
          <!-- Basic modal apv -->
                      	<?php foreach ($res as $val2) {
                          $type = substr($val2->code,0,3);
                          ?>
                        <tr>
                              <div id="openapo<?php echo $val2->code; ?>" class="modal fade">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">APO No.: <?php echo $val2->code; ?></h5>
                          </div>
                          <div class="modal-body">
                            <!-- detail -->
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="display-block text-semibold"> APO No.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->code; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> Pay To.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->payto; ?></label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="display-block text-semibold"> Petty Cash No.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->docno; ?></label>
                                </div>
                                <div class="form-group">
                                  <label class="display-block text-semibold"> APO Date.</label>
                                  <label class="display-block text-semibold"> <?php echo $val2->date; ?></label>
                                </div>
                              </div>
                            </div>
                            <!-- /detail -->
                          </div>
													 <table class="table table-xxs table-bordered table-striped table-hover">
														 <thead>
															 <tr>
																 <th>Cost Code</th>
																 <th>Expens Name</th>
																 <th>Unit Price</th>
																 <th>Amount</th>
																 <th>VAT</th>
																 <th>Total</th>
															 </tr>
														 </thead>
														 <tbody>
															 <?php $price=0; $totvat=0; $netamt=0;
																	 $this->db->select('*');
																	 $this->db->where('apo_ref', $val2->code);
																	 $query = $this->db->get('apo_item');
																	 $res = $query->result();
																	 foreach ($res as $e) {
																?>
															 <tr>
																 <td><?php echo substr($e->apo_costcode,10); ?>-<?php echo $e->apo_costname; ?></td>
																 <td><?php echo $e->apo_expens; ?></td>
																 <td><?php echo number_format($e->apo_unitprice,2); ?></td>
																 <td><?php echo number_format($e->apo_amount,2); ?></td>
																 <td><?php echo number_format($e->apo_totvat,2); ?></td>
																 <td><?php echo number_format($e->apo_netamt,2); ?></td>
															 </tr>
															 <?php
															 	$price = $price+$e->apo_unitprice;
																$totvat=$totvat+$e->apo_totvat;
																$netamt=$netamt+$e->apo_netamt;
																}
																?>
															 <tr>
																	<td colspan="2" class="text-center">Summary</td>
	 																<td><?php echo number_format($price,2); ?></td>
	 																<td></td>
	 																<td><?php echo number_format($totvat,2); ?></td>
	 																<td><?php echo number_format($netamt,2); ?></td>
															 </tr>
														 </tbody>
													 </table>
													 <br>
                          <div class="modal-footer">
														<a href="<?php echo base_url(); ?>ap/print_apo/<?php echo $val2->code; ?>" class="btn btn-info" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a>
                            <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>

                          </div>


                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    <!-- /basic modal -->
          <!--  -->

					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
