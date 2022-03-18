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
              <li>Approve Payment (APO)</li>
					</div>
				</div>
				<!-- /page header -->


<form action="<?php echo base_url(); ?>ap_active/approve_paid_apo" method="post">
				<!-- Content area -->
				<div class="content">
				<div class="row">
        	<div class="col-md-12">
						<div class="panel panel-flat border-top-lg border-top-success">
								<div class="panel-heading">
									<h6 class="panel-title">Approve Payment (APO) </h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                <div class="panel-body">
                  <?php foreach ($res as $k) {
                    $vendername = $k->apo_vender;
                  } ?>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Supplier:</label>
    											<div class="col-lg-9">
                            <?php if ($vendername==""){ ?>
                              <input type="text" class="form-control" name="vendername" readonly value="">
                            <?php }else{ ?>
    												<input type="text" class="form-control" name="vendername" readonly value="<?php echo $vendername; ?>">
                            <?php } ?>
                            <input type="hidden" id="vcode"  name="vcode" value="<?php echo $vendercod; ?>">
                          </div>
    										</div>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">

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
                      <li><button type="button" class="mo btn btn-primary" id="selectapv"><i class="icon-stackoverflow"></i> APO SELECT</button></li>
                    </ul>
                  </div>
                </div>

                  <table class="table table-bordered table-xxs">
                    <thead>
                      <tr>
                        <th width="5%">#</th>
                        <th width="5%">Action</th>
                        <th>Voucher No</th>
                        <th>PO No.</th>
                        <th>Due Date</th>
                        <th>Amount</th>
                        <th>VAT Amount</th>
                        <th>TOTAL</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      <tr>
                        <td colspan="8" class="text-center">ไม่พบข้อมูล</td>
                      </tr>
                    </tbody>
                  </table>
                <div class="panel-body">
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary"><i class="icon-box-add"></i> SAVE</button>
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
    $("#tbody").load('<?php echo base_url(); ?>ap/modal_apo_approve/'+aa);
});
$(".bankopen").click(function(){
  $('#modal_bank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_bank").load('<?php echo base_url(); ?>share/bank');
});
</script>
