Main content -->
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


<form action="<?php echo base_url(); ?>ap_active/approve_paid_aps" method="post">
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
                  <?php foreach ($res as $k) {
                    $vendername = $k->vender_name;
                    $projname = $k->project_name;
                    $pvdate = $k->apo_date;
                    $bankcode = $k->apo_bankcode;
                    $branchcode = $k->apo_branchcode;
                    $acccode = $k->apo_bankaccount;
                    $remark = $k->apo_remark;
                  } 
                  $bc = $this->db->query("select bank_name from bank where bank_code = '$bankcode'");
                  $resbc = $bc->result();
                  foreach ($resbc as $b) {
                   $bank_name = $b->bank_name;
                  }
                  $branch = $this->db->query("select branch_name from bank_branch where bank_code = '$bankcode' and branch_code = '$branchcode'");
                  $resbranch = $branch->result();
                  foreach ($resbranch as $e) {
                    $branchname = $e->branch_name;
                  }
                  $bankacc = $this->db->query("select acc_name from bank_account where bank_code = '$bankcode' and branch_code = '$branchcode' and acc_code='$acccode'");
                  $resacc = $bankacc->result();
                  foreach ($resacc as $e) {
                    $accname = $e->acc_name;
                  }
                  ?>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Supplier:</label>
    											<div class="col-lg-9">
    												<input type="text" class="form-control" name="vendername" readonly value="<?php echo $vendername; ?>">
                            <input type="hidden" id="vcode"  name="vcode" value="<?php echo $vendercod; ?>">
                          </div>
    										</div>
                    </div>
                    <div class="col-md-4">
                     <div class="form-group">
                        <label class="col-lg-3 control-label">PV No.</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" readonly="true" name="pvno" id="pvno"  placeholder="PV No." value="<?php echo $pvno; ?>">
                        </div>
                     </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">PV Date</label>
                          <div class="col-lg-9">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                              <input type="text" class="form-control daterange-single"  id="apodate" name="apodate" value="<?php echo $pvdate; ?>">
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
                                      <input type="text" class="form-control" readonly="true" id="departmenttname" placeholder="Department" name="departmenttname">
                                      <input type="hidden" class="form-control" readonly="true" id="departmenttid" name="departmenttid">
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
                            <input type="text" class="form-control" readonly="readonly" placeholder="Bank Name" name="bankname" id="bankname" value="<?php echo $bank_name; ?>">
                             <input type="hidden" readonly="true"  class="form-control" name="bankid" id="bankid" value="<?php echo $bankcode; ?>">
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
    												<input type="text" class="form-control" id="branch" name="branch" readonly value="<?php echo $branchname; ?>">
                            <input type="hidden" readonly="true"  class="form-control" name="branchid" id="branchid" value="<?php echo $branchcode; ?>">
    											</div>
    										</div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
    											<label class="col-lg-3 control-label">Bank Account:</label>
    											<div class="col-lg-9">
    												<input type="text" class="form-control" id="acno" name="acno" readonly value="<?php echo $accname; ?>">
                            <input type="hidden" class="form-control" id="acid" name="acid" readonly value="<?php echo $acccode; ?>">
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
    												<textarea rows="3" cols="40" class="form-control" id="remark" name="remark"><?php echo $remark; ?></textarea>
    											</div>
    										</div>
                    </div>
                  </div>
                  <div class="row">
                    <ul class="icons-list">
                      <li><button type="button" class="mo btn btn-warning" data-toggle="modal" data-target="#apsopen"><i class="icon-file-plus"></i> APS SELECT</button></li>
                    </ul>
                  </div>
                </div>

                  <table class="table table-bordered table-xxs">
                    <thead>
                      <tr>
                        <th width="5%">#</th>
                        <th>Voucher No</th>
                        <th>PO No.</th>
                        <th>Due Date</th>
                        <th>Amount</th>
                        <!-- <th>VAT Amount</th> -->
                        <!-- <th>TOTAL</th> -->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      <?php $n=1; $total=0; foreach ($resi as $vi) {
                        $query = $this->db->query("select * from aps_header where aps_code ='$vi->doci_apcvcode'");
                        $result = $query->result();
                        $queryi = $this->db->query("select sum(apsi_amount) as amt from aps_detail where apsi_ref ='$vi->doci_apcvcode'");
                        $resulti = $queryi->result();
                      ?>
                                <tr>
                                  <td class="text-center"><?php echo $n; ?></td>
                                  <td><?php echo $vi->doci_apcvcode; ?></td>
                                  <td><?php echo $vi->doci_pono; ?></td>
                                  <?php foreach ($result as $e) {?>
                                    <td><?php echo $e->aps_date; ?></td>
                                  <?php } ?>
                                  <?php foreach ($resulti as $e) {?>
                                   <td class="text-right"><?php echo number_format($e->amt,2); ?></td>
                                   <!-- <td class="text-right"><?php echo number_format($e->vattot,2); ?></td> -->
                                  <?php $total=$total+$e->amt;  } ?>                    
                                  <!-- <td class="text-right"><?php echo number_format($vi->doci_netamt,2); ?></td> -->
                                  <td class="text-center">
                                    <ul class="icons-list">
                                      <li><a id="delete<?php echo $vi->doci_apcvcode; ?>" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>
                                    </ul>
                                  </td>
                                </tr>


                                <script>
                                  $("#b<?php echo $n; ?>").click(function(){
                                    if ($("#b<?php echo $n; ?>").prop("checked")) {
                                        $("#chki<?php echo $n;?>").val("Y");
                                    }else{
                                        $("#chki<?php echo $n;?>").val("");
                                    }
                                  });

                                  $(document).on('click', 'a#delete<?php echo $vi->doci_apcvcode; ?>', function () { // <-- changes
                                    var self = $(this);
                                    self.closest('tr').remove();
                                    var apscode = "<?php echo $vi->doci_apcvcode; ?>";
                                    var url="<?php echo base_url(); ?>index.php/ap_active/delpvvdetail";
                                    var dataSet={
                                      ref: apscode
                                      };
                                    $.post(url,dataSet,function(data){
                                      // alert(data);
                                    });
                                  });


                                </script>
                                <?php $n++; } ?>

                    </tbody>
                     <tr>
                                <th colspan="4" class="text-center">Sumary</th>
                                <!-- <th></th> -->
                                <!-- <th></th> -->
                                <th class="text-right"><label id="total"><?php echo number_format($total,2); ?></label><input type="hidden" id="totaltxt" value="<?php echo $total; ?>"></th>
                                <th></th>
                              </tr>
                  </table>
                <div class="panel-body">
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
                    <a href="<?php echo base_url(); ?>ap/print_approveapspv/<?php echo $pvno; ?>" class="btn btn-default btn-xs"><i class="icon-printer"></i> Print</a>
                    <a href="<?php echo base_url(); ?>ap/aps_approve" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
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
    $('#tab').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    // alert(aa);
    $("#tab").load('<?php echo base_url(); ?>ap/modal_load_aps_approve/'+aa);
});
$(".bankopen").click(function(){
  $('#modal_bank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_bank").load('<?php echo base_url(); ?>share/bank');
});


</script>


<!-- Full width modal -->
         <div id="apsopen" class="modal fade">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Select APs</h5>
               </div>

               <div class="modal-body">

               </div>
               <div id="tab">

               </div>
               <br>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
             </div>
           </div>
         </div>
         <!-- /full width modal