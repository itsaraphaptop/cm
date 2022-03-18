<!-- Main content -->
<style>
  .form-group{ margin-bottom: 50px;}
  .control-label{ margin-top: 5px; font-size: 11px;}
</style>
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
              <li>Approve Payment (APS)</li>
					</div>
				</div>
				<!-- /page header -->

<?php foreach ($res as $key => $e) {
	$vendername = $e->vender_name;
	$venid = $e->aps_contact;
	$projid = $e->aps_project;
	$depid = $e->aps_department;
	$system = $e->aps_system;
	if ($e->aps_department==0) {
		$qproj = $this->db->query("select project_name from project where project_id='$e->aps_project'");
		$rproj = $qproj->result();
		foreach ($rproj as $key => $value) {
			$projname = $value->project_name;
			$depname ="";
		}
	}else{
		$qdep = $this->db->query("select department_title from department where department_id='$e->aps_department'");
		$rdep = $qdep->result();
		foreach ($rdep as $key => $value) {
		$depname = $value->department_title;
		$projname ="";
		}
	}
} ?>
<form action="<?php echo base_url(); ?>aps_active/approve_paid_aps" method="post">
				<!-- Content area -->
				<div class="content">
				<div class="row">
        	<div class="col-md-12">
						<div class="panel panel-flat border-top-lg border-top-success">
								<div class="panel-heading">
									<h6 class="panel-title">Approve Payment (APS) </h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
    					<label class="col-lg-3 control-label">Supplier:</label>
    					<div class="col-lg-9">
    						<input type="text" class="form-control" name="vendername" readonly value="<?php echo $vendername; ?>">
                            <input type="hidden" id="vcode"  name="vcode" value="<?php echo $venid; ?>">
                          </div>
    										</div>
                    </div>
                    <div class="col-md-4">
                     <div class="form-group">
                        <label class="col-lg-3 control-label">PV No.</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" readonly="true" name="pvno" id="pvno"  placeholder="PV No.">
                        </div>
                     </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">PV Date</label>
                          <div class="col-lg-9">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                              <input type="text" class="form-control daterange-single"  id="apodate" name="apodate">
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Project</label>
                                    <div class="col-lg-9">
                                      <input type="text" class="form-control" readonly="true" id="projectname" placeholder="Project" name="projectname" value="<?php echo $projname; ?>">
                                      <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid" value="<?php echo $projid; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <label class="col-lg-3 control-label">System</label>
                                   <div class="col-lg-9">
                                    <select class="form-control" name="aposystem" id="aposystem">
                                      <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                                      <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                                      <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                                      <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                                      <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
                                    </select>
                                    </div>
                                </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Department</label>
                                    <div class="col-lg-9">
                                      <input type="text" class="form-control" readonly="true" id="departmenttname" placeholder="Department" name="departmenttname" value="<?php echo $depname; ?>">
                                      <input type="hidden" class="form-control" readonly="true" id="departmenttid" name="departmenttid" value="<?php echo $depid; ?>">
                                    </div>
                                  </div>
                                </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Bank:</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                            <input type="text" class="form-control" readonly="readonly" placeholder="Bank Name" name="bankname" id="bankname">
                             <input type="hidden" readonly="true"  class="form-control" name="bankid" id="bankid">
                            <div class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#bankopen"  class="bankopen btn btn-default btn-icon"><i class="icon-search4"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Branch:</label>
    											<div class="col-lg-9">
    												<input type="text" class="form-control" id="branch" name="branch" readonly>
                            <input type="hidden" readonly="true"  class="form-control" name="branchid" id="branchid">
    											</div>
    										</div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Bank Account:</label>
    											<div class="col-lg-9">
    												<input type="text" class="form-control" id="acno" name="acno" readonly >
                            <input type="hidden" class="form-control" id="acid" name="acid" readonly >
    											</div>
    										</div>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Deposit:</label>
    											<div class="col-lg-9">
    												<input type="text" class="form-control" id="type" name="type" readonly>
    											</div>
    										</div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Account No:</label>
    											<div class="col-lg-9">
    												<input type="text" class="form-control" id="bankaccount" name="bankaccount" readonly>
    											</div>
    										</div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Remark:</label>
    											<div class="col-lg-9">
    												<textarea rows="3" cols="40" class="form-control" id="remark" name="remark"></textarea>
    											</div>
    										</div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <ul class="icons-list">
                      <li><button type="button" class="mo btn btn-warning" id="selectapv"><i class="icon-file-plus"></i> APS SELECT</button></li>
                    </ul>
                  </div>
                </div>

                  <table class="table table-bordered table-xxs">
                    <thead>
                      <tr>
                        <th width="5%">Period</th>
                        <th width="5%">Action</th>
                        <th>Voucher No</th>
                        <th>Contact No.</th>
                        <th>Due Date</th>
                        <th>Amount</th>
                        <!-- <th>VAT Amount</th>
                        <th>TOTAL</th> -->
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      <tr>
                        <td colspan="8" class="text-center">No Data</td>
                      </tr>
                    </tbody>
                  </table>
                <div class="panel-body">
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
                    <a href="#" class="btn btn-default btn-xs"><i class="icon-printer"></i> Print</a>
                    <a href="<?php echo base_url(); ?>ap/apv_approve" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
                  </div>
                </div>
							</div>
					</div>
				</div>
        <!--  -->

					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->

				</div>
				<!-- /content area -->
</form>
			</div>
			<!-- /main content -->

      <!-- Disabled backdrop -->
     					<div id="bankopen" class="modal fade" data-backdrop="false">
     						<div class="modal-dialog modal-lg">
     							<div class="modal-content">
     								<div class="modal-header">
     									<button type="button" class="close" data-dismiss="modal">&times;</button>
     									<h5 class="modal-title">Select Bank Account</h5>
     								</div>

     								<div class="modal-body">
                      <div id="modal_bank">

                      </div>
                    </div>

     							</div>
     						</div>
     					</div>
     					<!-- /disabled backdrop -->





<script>
$(".mo").click(function(){
  var aa = $("#vcode").val();
    $('#tbody').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#tbody").load('<?php echo base_url(); ?>ap/modal_aps_approve/'+aa);
});
$(".bankopen").click(function(){
  $('#modal_bank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_bank").load('<?php echo base_url(); ?>share/bank');
});
</script>
