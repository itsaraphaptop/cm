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
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">PR Archive</a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-flat border-top-lg border-top-warning">
								<div class="panel-heading">
									<h6 class="panel-title">Petty Cash Pending</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                <div class="dataTables_wrapper no-footer">
                  <table class="table table-hover table-xxs datatable-basic">
                  <thead>
                    <tr>
                      <th>Petty Cash No.</th>
                      <th>Name</th>
                      <!-- <th>Project/Department</th> -->
                      <th>Detail</th>
                      <th>Status</th>
                      <th width="10%" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($getpettycash as $val) {?>
                      <tr>
                      <td><?php echo $val->docno; ?></td>
                      <td><?php echo $val->vender; ?><?php echo $val->member; ?></td>
                      <!-- <td><?php echo $val->project_name; ?><?php echo $val->department_title; ?></td> -->
                      <td><?php echo $val->remark; ?></td>
                      <td><span class="label label-warning">wait approve</span></td>
                      <td>
                        <ul class="icons-list">
                            <li><a data-toggle="modal" data-target="#open<?php echo $val->docno; ?>" data-popup="tooltip" title="" data-original-title="Approve"><i class="icon-checkbox-checked2"></i></a></li>
                            <li><a data-toggle="modal" data-target="#dis<?php echo $val->docno; ?>" data-popup="tooltip" title="" data-original-title="Disapprove"><i class="icon-cancel-square2"></i></a></li>
                        </ul>
                      </td>
                      </tr>

                      <?php	} ?>
                  </tbody>
                </table>
              </div>

								<div class="panel-footer">
									<ul>
										<li><a href="<?php echo base_url(); ?>petty_cash/all_pettycash" class="label label-flat border-warning text-warning-600" data-popup="tooltip" title="" data-original-title="แสดงรายการทั้งหมด">ALL Pending</a></li>
									</ul>

									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" data-popup="tooltip" title="" data-original-title="ALL SHOW"><i class="icon-three-bars"></i></a>
										</li>
									</ul>
								</div>
							</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-flat border-top-lg border-top-success">
								<div class="panel-heading">
									<h6 class="panel-title">Petty Cash Archive</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                <div class="dataTables_wrapper no-footer">
                  <table class="table table-hover table-xxs datatable-basic">
                  <thead>
                    <tr>
                      <th>Petty Cash No.</th>
                      <th>Name</th>
                      <!-- <th>Project/Department</th> -->
                      <th>Detail</th>
                      <th>Status</th>
                      <th width="10%" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($approve as $val) {?>
                      <tr>
                      <td><?php echo $val->docno; ?></td>
                      <td><?php echo $val->vender; ?><?php echo $val->member; ?></td>
                      <!-- <td><?php echo $val->project_name; ?><?php echo $val->department_title; ?></td> -->
                      <td><?php echo $val->remark; ?></td>
                      <td>
                        <?php if ($val->approve=="approve") {?>
                          <span class="label label-success">approved</span>
                      <?php }else{ ?>
                          <span class="label label-danger">disapproved</span>
                      <?php } ?>

                      </td>
                      <td>
                        <ul class="icons-list">
                            <li><a data-toggle="modal" data-target="#open<?php echo $val->docno; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
                            <li><a data-toggle="modal" data-target="#cancel<?php echo $val->docno; ?>" data-popup="tooltip" title="" data-original-title="Cancel"><i class="icon-cancel-square2"></i></a></li>
                        </ul>
                      </td>
                      </tr>

                      <?php	} ?>
                  </tbody>
                </table>
              </div>

								<div class="panel-footer">
									<ul>
										<li><a href="<?php echo base_url(); ?>petty_cash/all_pettycash" class="label label-flat border-success text-success-600" data-popup="tooltip" title="" data-original-title="แสดงรายการทั้งหมด">ALL Approve</a></li>
									</ul>

									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" data-popup="tooltip" title="" data-original-title="ALL SHOW"><i class="icon-three-bars"></i></a>
										</li>
									</ul>
								</div>
							</div>
					</div>
				</div>
        <!--  -->
        <?php foreach ($getpettycash as $val2) {?>
                <div id="open<?php echo $val2->docno; ?>" class="modal fade">
        <div class="modal-dialog modal-full">
          <div class="modal-content ">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Petty Cash No.: <?php echo $val2->docno; ?></h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 content-group">
                  <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
                  <!-- <ul class="list-condensed list-unstyled">
                    <li>2269 Elba Lane</li>
                    <li>Paris, France</li>
                    <li>888-555-2311</li>
                  </ul> -->
                </div>

                <div class="col-md-6 content-group">
                  <div class="invoice-details">
                    <h5 class="text-uppercase text-semibold">Petty Cash #<?php echo $val2->docno; ?></h5>
                    <ul class="list-condensed list-unstyled">
                      <li>Date: <span class="text-semibold"><?php echo $val2->docdate; ?></span></li>
                      <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                    <span class="text-muted">Pay To:</span>
                    <ul class="list-condensed list-unstyled">
                      <li><h5><?php echo $val->member; ?><?php echo $val2->vender; ?></h5></li>

                    </ul>
                </div>

                <div class="col-md-4">
                  <span class="text-muted">Project:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5><?php echo $val2->project_name; ?><?php echo $val2->department_title; ?></h5></li>

                  </ul>
                </div>
                <div class="col-md-4">
                  <span class="text-muted">Date:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5><?php echo $val2->docdate; ?></h5></li>

                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <span class="text-muted">Remark:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5><?php echo $val2->remark; ?></h5></li>

                  </ul>
                </div>
                <div class="col-md-4">
                  <span class="text-muted">System:</span>
                  <ul class="list-condensed list-unstyled">
                    <?php if($val2->system == '1'){ ?><li><h5>OVERHEAD</h5></li>
                    <?php }else if($val2->system == '2'){ ?><li><h5>AC</h5></li>
                    <?php }else if($val2->system == '3'){ ?><li><h5>EE</h5></li>
                    <?php }else if($val2->system == '4'){ ?><li><h5>SN</h5></li>
                    <?php }else if($val2->system == '5'){ ?><li><h5>CIVIL</h5></li>
                      <?php } ?>
                  </ul>
                </div>
              </div>
              <legend class="text-muted"> Detail</legend>
              <div class="row">
                  <div class="table-responsive">
                    <table class="table table-xxs table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cost Code</th>
                          <th>Materail Name</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>Unit Price</th>
                          <th>Amount</th>
                          <th>Vat</th>
                          <th>Tax</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
                        $this->db->select('*');
                        $this->db->where('pettycashi_ref',$val2->docno);
                        $this->db->where('compcode',$compcode);
                        $query = $this->db->get('pettycash_item');
                        $resi = $query->result();
                         $n=1; foreach ($resi as $va) {?>
                           <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo substr($va->pettycashi_costcode,10); ?> - <?php echo $va->pettycashi_costname; ?></td>
                            <td><?php echo $va->pettycashi_expens; ?></td>
                            <td><?php echo number_format($va->pettycashi_amount,2); ?></td>
                            <td><?php echo $va->pettycashi_unit; ?></td>
                            <td><?php echo number_format($va->pettycashi_unitprice,2); ?></td>
                            <td><?php echo number_format($va->pettycashi_amounttot,2); ?></td>
                            <td><?php echo number_format($va->pattycashi_totvat,2); ?></td>
                            <td><?php echo number_format($va->pettycashi_totwh,2); ?></td>
                            <td><?php echo number_format($va->pettycashi_netamt,2); ?></td>
                          </tr>
                        <?php $n++; $qty = $qty+$va->pettycashi_amount;
                        $unitprice = $unitprice+$va->pettycashi_unitprice;
                        $amouttot = $amouttot+$va->pettycashi_amounttot;
                        $vattot = $vattot+$va->pattycashi_totvat;
                        $whtot = $whtot+$va->pettycashi_totwh;
                        $netamt = $netamt+$va->pettycashi_netamt;
                        $docno = $va->pettycashi_ref;
                        } ?>

                      </tbody>
                      <tfooter>

                        <th colspan="3" class="text-center">Total</th>
                        <th><?php echo number_format($qty,2); ?></th>
                        <td></td>
                        <th><?php echo number_format($unitprice,2); ?></th>
                        <th><?php echo number_format($amouttot,2); ?></th>
                        <th><?php echo number_format($vattot,2); ?></th>
                        <th><?php echo number_format($whtot,2); ?></th>
                        <th><?php echo number_format($netamt,2); ?></th>

                      </tfooter>
                    </table>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
								<a href="<?php echo base_url(); ?>pettycash_active/pc_approve/<?php echo $docno; ?>" class="btn btn-success" ><i class="icon-file-check"></i> Approve</a>

              <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>


            </div>
          </div>
        </div>

        <div id="dis<?php echo $val2->docno; ?>" class="modal fade">
<div class="modal-dialog modal-full">
  <div class="modal-content ">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h5 class="modal-title">Petty Cash No.: <?php echo $val2->docno; ?></h5>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-6 content-group">
          <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
          <!-- <ul class="list-condensed list-unstyled">
            <li>2269 Elba Lane</li>
            <li>Paris, France</li>
            <li>888-555-2311</li>
          </ul> -->
        </div>

        <div class="col-md-6 content-group">
          <div class="invoice-details">
            <h5 class="text-uppercase text-semibold">Petty Cash #<?php echo $val2->docno; ?></h5>
            <ul class="list-condensed list-unstyled">
              <li>Date: <span class="text-semibold"><?php echo $val2->docdate; ?></span></li>
              <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
            <span class="text-muted">Pay To:</span>
            <ul class="list-condensed list-unstyled">
              <li><h5><?php echo $val->member; ?><?php echo $val2->vender; ?></h5></li>

            </ul>
        </div>

        <div class="col-md-4">
          <span class="text-muted">Project:</span>
          <ul class="list-condensed list-unstyled">
            <li><h5><?php echo $val2->project_name; ?><?php echo $val2->department_title; ?></h5></li>

          </ul>
        </div>
        <div class="col-md-4">
          <span class="text-muted">Date:</span>
          <ul class="list-condensed list-unstyled">
            <li><h5><?php echo $val2->docdate; ?></h5></li>

          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <span class="text-muted">Remark:</span>
          <ul class="list-condensed list-unstyled">
            <li><h5><?php echo $val2->remark; ?></h5></li>

          </ul>
        </div>
        <div class="col-md-4">
          <span class="text-muted">System:</span>
          <ul class="list-condensed list-unstyled">
            <?php if($val2->system == '1'){ ?><li><h5>OVERHEAD</h5></li>
            <?php }else if($val2->system == '2'){ ?><li><h5>AC</h5></li>
            <?php }else if($val2->system == '3'){ ?><li><h5>EE</h5></li>
            <?php }else if($val2->system == '4'){ ?><li><h5>SN</h5></li>
            <?php }else if($val2->system == '5'){ ?><li><h5>CIVIL</h5></li>
              <?php } ?>
          </ul>
        </div>
      </div>
      <legend class="text-muted"> Detail</legend>
      <div class="row">
          <div class="table-responsive">
            <table class="table table-xxs table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cost Code</th>
                  <th>Materail Name</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Unit Price</th>
                  <th>Amount</th>
                  <th>Vat</th>
                  <th>Tax</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
                $this->db->select('*');
                $this->db->where('pettycashi_ref',$val2->docno);
                $this->db->where('compcode',$compcode);
                $query = $this->db->get('pettycash_item');
                $resi = $query->result();
                 $n=1; foreach ($resi as $va) {?>
                   <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo substr($va->pettycashi_costcode,10); ?> - <?php echo $va->pettycashi_costname; ?></td>
                    <td><?php echo $va->pettycashi_expens; ?></td>
                    <td><?php echo number_format($va->pettycashi_amount,2); ?></td>
                    <td><?php echo $va->pettycashi_unit; ?></td>
                    <td><?php echo number_format($va->pettycashi_unitprice,2); ?></td>
                    <td><?php echo number_format($va->pettycashi_amounttot,2); ?></td>
                    <td><?php echo number_format($va->pattycashi_totvat,2); ?></td>
                    <td><?php echo number_format($va->pettycashi_totwh,2); ?></td>
                    <td><?php echo number_format($va->pettycashi_netamt,2); ?></td>
                  </tr>
                <?php $n++; $qty = $qty+$va->pettycashi_amount;
                $unitprice = $unitprice+$va->pettycashi_unitprice;
                $amouttot = $amouttot+$va->pettycashi_amounttot;
                $vattot = $vattot+$va->pattycashi_totvat;
                $whtot = $whtot+$va->pettycashi_totwh;
                $netamt = $netamt+$va->pettycashi_netamt;
                $docno = $va->pettycashi_ref;
                } ?>

              </tbody>
              <tfooter>

                <th colspan="3" class="text-center">Total</th>
                <th><?php echo number_format($qty,2); ?></th>
                <td></td>
                <th><?php echo number_format($unitprice,2); ?></th>
                <th><?php echo number_format($amouttot,2); ?></th>
                <th><?php echo number_format($vattot,2); ?></th>
                <th><?php echo number_format($whtot,2); ?></th>
                <th><?php echo number_format($netamt,2); ?></th>

              </tfooter>
            </table>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="<?php echo base_url(); ?>pettycash_active/pc_disapprove/<?php echo $docno; ?>" class="btn btn-danger" ><i class="icon-cancel-circle2"></i> DisApprove</a>
      <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>

    </div>


    </div>
  </div>
</div>
        <?php } ?>
        <!--  -->

        <!-- Basic modal-->
                    <?php foreach ($approve as $val2) {?>
                            <div id="open<?php echo $val2->docno; ?>" class="modal fade">
                    <div class="modal-dialog modal-full">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h5 class="modal-title">Petty Cash No.: <?php echo $val2->docno; ?></h5>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6 content-group">
                              <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
                              <!-- <ul class="list-condensed list-unstyled">
                                <li>2269 Elba Lane</li>
                                <li>Paris, France</li>
                                <li>888-555-2311</li>
                              </ul> -->
                            </div>

                            <div class="col-md-6 content-group">
                              <div class="invoice-details">
                                <h5 class="text-uppercase text-semibold">Petty Cash #<?php echo $val2->docno; ?></h5>
                                <ul class="list-condensed list-unstyled">
                                  <li>Date: <span class="text-semibold"><?php echo $val2->docdate; ?></span></li>
                                  <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                                </ul>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                                <span class="text-muted">Pay To:</span>
                                <ul class="list-condensed list-unstyled">
                                  <li><h5><?php echo $val->member; ?><?php echo $val2->vender; ?></h5></li>

                                </ul>
                            </div>

                            <div class="col-md-4">
                              <span class="text-muted">Project:</span>
                              <ul class="list-condensed list-unstyled">
                                <li><h5><?php echo $val2->project_name; ?><?php echo $val2->department_title; ?></h5></li>

                              </ul>
                            </div>
                            <div class="col-md-4">
                              <span class="text-muted">Date:</span>
                              <ul class="list-condensed list-unstyled">
                                <li><h5><?php echo $val2->docdate; ?></h5></li>

                              </ul>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <span class="text-muted">Remark:</span>
                              <ul class="list-condensed list-unstyled">
                                <li><h5><?php echo $val2->remark; ?></h5></li>

                              </ul>
                            </div>
                            <div class="col-md-4">
                              <span class="text-muted">System:</span>
                              <ul class="list-condensed list-unstyled">
                                <?php if($val2->system == '1'){ ?><li><h5>OVERHEAD</h5></li>
                                <?php }else if($val2->system == '2'){ ?><li><h5>AC</h5></li>
                                <?php }else if($val2->system == '3'){ ?><li><h5>EE</h5></li>
                                <?php }else if($val2->system == '4'){ ?><li><h5>SN</h5></li>
                                <?php }else if($val2->system == '5'){ ?><li><h5>CIVIL</h5></li>
                                  <?php } ?>
                              </ul>
                            </div>
                          </div>
                          <legend class="text-muted"> Detail</legend>
                          <div class="row">
                              <div class="table-responsive">
                                <table class="table table-xxs table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Cost Code</th>
                                      <th>Materail Name</th>
                                      <th>Qty</th>
                                      <th>Unit</th>
                                      <th>Unit Price</th>
                                      <th>Amount</th>
                                      <th>Vat</th>
                                      <th>Tax</th>
                                      <th>Total</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
                                    $this->db->select('*');
                                    $this->db->where('pettycashi_ref',$val2->docno);
                                    $this->db->where('compcode',$compcode);
                                    $query = $this->db->get('pettycash_item');
                                    $resi = $query->result();
                                     $n=1; foreach ($resi as $va) {?>
                                       <tr>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo substr($va->pettycashi_costcode,10); ?> - <?php echo $va->pettycashi_costname; ?></td>
                                        <td><?php echo $va->pettycashi_expens; ?></td>
                                        <td><?php echo number_format($va->pettycashi_amount,2); ?></td>
                                        <td><?php echo $va->pettycashi_unit; ?></td>
                                        <td><?php echo number_format($va->pettycashi_unitprice,2); ?></td>
                                        <td><?php echo number_format($va->pettycashi_amounttot,2); ?></td>
                                        <td><?php echo number_format($va->pattycashi_totvat,2); ?></td>
                                        <td><?php echo number_format($va->pettycashi_totwh,2); ?></td>
                                        <td><?php echo number_format($va->pettycashi_netamt,2); ?></td>
                                      </tr>
                                    <?php $n++; $qty = $qty+$va->pettycashi_amount;
                                    $unitprice = $unitprice+$va->pettycashi_unitprice;
                                    $amouttot = $amouttot+$va->pettycashi_amounttot;
                                    $vattot = $vattot+$va->pattycashi_totvat;
                                    $whtot = $whtot+$va->pettycashi_totwh;
                                    $netamt = $netamt+$va->pettycashi_netamt; } ?>

                                  </tbody>
                                  <tfooter>

                                    <th colspan="3" class="text-center">Total</th>
                                    <th><?php echo number_format($qty,2); ?></th>
                                    <td></td>
                                    <th><?php echo number_format($unitprice,2); ?></th>
                                    <th><?php echo number_format($amouttot,2); ?></th>
                                    <th><?php echo number_format($vattot,2); ?></th>
                                    <th><?php echo number_format($whtot,2); ?></th>
                                    <th><?php echo number_format($netamt,2); ?></th>

                                  </tfooter>
                                </table>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <a href="<?php echo base_url(); ?>petty_cash/print_pettycash/<?php echo $va->pettycashi_ref; ?>" class="btn btn-info" >Print</a> -->
                          <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>

                        </div>


                        </div>
                      </div>
                    </div>

                    <div id="cancel<?php echo $val2->docno; ?>" class="modal fade">
            <div class="modal-dialog modal-full">
              <div class="modal-content ">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Petty Cash No.: <?php echo $val2->docno; ?></h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6 content-group">
                      <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
                      <!-- <ul class="list-condensed list-unstyled">
                        <li>2269 Elba Lane</li>
                        <li>Paris, France</li>
                        <li>888-555-2311</li>
                      </ul> -->
                    </div>

                    <div class="col-md-6 content-group">
                      <div class="invoice-details">
                        <h5 class="text-uppercase text-semibold">Petty Cash #<?php echo $val2->docno; ?></h5>
                        <ul class="list-condensed list-unstyled">
                          <li>Date: <span class="text-semibold"><?php echo $val2->docdate; ?></span></li>
                          <!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-muted">Pay To:</span>
                        <ul class="list-condensed list-unstyled">
                          <li><h5><?php echo $val->member; ?><?php echo $val2->vender; ?></h5></li>

                        </ul>
                    </div>

                    <div class="col-md-4">
                      <span class="text-muted">Project:</span>
                      <ul class="list-condensed list-unstyled">
                        <li><h5><?php echo $val2->project_name; ?><?php echo $val2->department_title; ?></h5></li>

                      </ul>
                    </div>
                    <div class="col-md-4">
                      <span class="text-muted">Date:</span>
                      <ul class="list-condensed list-unstyled">
                        <li><h5><?php echo $val2->docdate; ?></h5></li>

                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <span class="text-muted">Remark:</span>
                      <ul class="list-condensed list-unstyled">
                        <li><h5><?php echo $val2->remark; ?></h5></li>

                      </ul>
                    </div>
                    <div class="col-md-4">
                      <span class="text-muted">System:</span>
                      <ul class="list-condensed list-unstyled">
                        <?php if($val2->system == '1'){ ?><li><h5>OVERHEAD</h5></li>
                        <?php }else if($val2->system == '2'){ ?><li><h5>AC</h5></li>
                        <?php }else if($val2->system == '3'){ ?><li><h5>EE</h5></li>
                        <?php }else if($val2->system == '4'){ ?><li><h5>SN</h5></li>
                        <?php }else if($val2->system == '5'){ ?><li><h5>CIVIL</h5></li>
                          <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <legend class="text-muted"> Detail</legend>
                  <div class="row">
                      <div class="table-responsive">
                        <table class="table table-xxs table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Cost Code</th>
                              <th>Materail Name</th>
                              <th>Qty</th>
                              <th>Unit</th>
                              <th>Unit Price</th>
                              <th>Amount</th>
                              <th>Vat</th>
                              <th>Tax</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
                            $this->db->select('*');
                            $this->db->where('pettycashi_ref',$val2->docno);
                            $this->db->where('compcode',$compcode);
                            $query = $this->db->get('pettycash_item');
                            $resi = $query->result();
                             $n=1; foreach ($resi as $va) {?>
                               <tr>
                                <td><?php echo $n; ?></td>
                                <td><?php echo substr($va->pettycashi_costcode,10); ?> - <?php echo $va->pettycashi_costname; ?></td>
                                <td><?php echo $va->pettycashi_expens; ?></td>
                                <td><?php echo number_format($va->pettycashi_amount,2); ?></td>
                                <td><?php echo $va->pettycashi_unit; ?></td>
                                <td><?php echo number_format($va->pettycashi_unitprice,2); ?></td>
                                <td><?php echo number_format($va->pettycashi_amounttot,2); ?></td>
                                <td><?php echo number_format($va->pattycashi_totvat,2); ?></td>
                                <td><?php echo number_format($va->pettycashi_totwh,2); ?></td>
                                <td><?php echo number_format($va->pettycashi_netamt,2); ?></td>
                              </tr>
                            <?php $n++; $qty = $qty+$va->pettycashi_amount;
                            $unitprice = $unitprice+$va->pettycashi_unitprice;
                            $amouttot = $amouttot+$va->pettycashi_amounttot;
                            $vattot = $vattot+$va->pattycashi_totvat;
                            $whtot = $whtot+$va->pettycashi_totwh;
                            $netamt = $netamt+$va->pettycashi_netamt; } ?>

                          </tbody>
                          <tfooter>

                            <th colspan="3" class="text-center">Total</th>
                            <th><?php echo number_format($qty,2); ?></th>
                            <td></td>
                            <th><?php echo number_format($unitprice,2); ?></th>
                            <th><?php echo number_format($amouttot,2); ?></th>
                            <th><?php echo number_format($vattot,2); ?></th>
                            <th><?php echo number_format($whtot,2); ?></th>
                            <th><?php echo number_format($netamt,2); ?></th>

                          </tfooter>
                        </table>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="#" class="btn btn-warning" >Cancel</a>
                  <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>


                </div>
              </div>
            </div>
                    <?php } ?>
                  <!-- /basic modal -->


					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
		<script>
		  $('[data-popup="tooltip"]').tooltip();
		</script>
