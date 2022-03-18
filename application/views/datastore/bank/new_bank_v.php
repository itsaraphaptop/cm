<?php 
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>
<style>

	.control-labelt{margin-top: 10px;}
</style>



<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
        <div class="content">
           <!-- /info alert -->
                 <div class="panel panel-flat">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Bank	<p></p></h6>
              <div class="heading-elements">
								<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
              	<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>

              	<button type="button" data-toggle="modal" data-target="#newbank" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New Bank</button>

              	<button type="button" data-toggle="modal" data-target="#newbranch" class="newbranch btn btn-info"><i class="icon-plus-circle2"></i> New Branch</button>

              	<button type="button" data-toggle="modal" data-target="#newaccount" class="newaccount btn btn-info"><i class="icon-plus-circle2"></i> New Account</button>

              	<button type="button" data-toggle="modal" data-target="#editbankk" class="editbank btn btn-primary"><i class="glyphicon glyphicon-wrench"></i> Edit Bank</button>

              	<button type="button" data-toggle="modal" data-target="#editbranch" class="editbranch btn btn-primary"><i class="glyphicon glyphicon-wrench"></i> Edit Branch</button>

              	<button type="button" data-toggle="modal" data-target="#balanceforward" class="balanceforward btn btn-primary"><i class="glyphicon glyphicon-wrench"></i> Edit Forward</button>

              	<button type="button" data-toggle="modal" data-target="#editbankaccount" class="editbankaccount btn btn-primary"><i class="glyphicon glyphicon-wrench"></i> Edit Bank Account</button>

                <button type="button" class="Delete1 editbankaccount btn btn-danger"><i class=" glyphicon glyphicon-wrench"></i> Delete Bank</button>

                <button type="button" class="Delete2 editbankaccount btn btn-danger"><i class=" glyphicon glyphicon-wrench"></i> Delete Branch</button>

                <button type="button" class="Delete3 editbankaccount btn btn-danger"><i class=" glyphicon glyphicon-wrench"></i> Delete Bank Account</button>

                <a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bank.mrt&comp=<?php echo "$compcode" ?>" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
				<!-- <button type="button"  class="Delete1 btn border-danger text-danger-600 btn-flat btn-icon btn-md heading-btn"><i class="glyphicon glyphicon-trash"></i> Delete Bank</button>
				<button type="button"  class="Delete2 btn border-danger text-danger-600 btn-flat btn-icon btn-md heading-btn"><i class="glyphicon glyphicon-trash"></i> Delete Branch</button>
				<button type="button"  class="Delete3 btn border-danger text-danger-600 btn-flat btn-icon btn-md heading-btn"><i class="glyphicon glyphicon-trash"></i> Delete Bank Account</button> -->

              </div>

              <script>
              	 $(".Delete1").click(function(){
              	 var bank = $("#bank").val();
			  	 window.location='<?php echo base_url(); ?>datastore_active/del_back/'+bank;
				 });
              </script>
              <script>
              	 $(".Delete2").click(function(){
              	  var bank = $("#bank").val();
              	  var branch = $("#branch").val();
              	  var bankacc = $("#accountno").val();
			  	 window.location='<?php echo base_url(); ?>datastore_active/del_bank_branch/'+bank+'/'+branch+'/'+bankacc;
				 });
              </script>
              <script>
              	 $(".Delete3").click(function(){
				var bank = $("#bank").val();
              	  var branch = $("#branch").val();
              	  var bankacc = $("#accountno").val();
			  	 window.location='<?php echo base_url(); ?>datastore_active/del_acc/'+bank+'/'+branch+'/'+bankacc;
				 });
              </script>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

            <div class="panel-body">
              <!--  -->
              <div class="row">
                  <div id="tabbank" class="col-md-6">
                      <h4 id="hbank">Bank</h4>
                      <select multiple class="form-control" id="bank" style="height:200px;">
                        <input type="hidden" id="txtbank" >
                      </select>
                  </div>
                  <div id="tabcost2" class="col-md-6">

                       <h4>Branch</h4>
                       <select multiple class="form-control" id="branch" style="height:200px;"></select>

                  </div>
                  <div id="tabcost3" class="col-md-12">
                       <h4>Bank Account</h4>
                      <select multiple class="form-control" id="accountno" style="height:200px;">
                          </select>
                  </div>
              </div>
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
<!--  -->


<!-- Disabled backdrop -->
        <div id="newbank" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">ADD NEW BANK</h5>
              </div>

            <!--  -->
						<div class="modal-body">
										<div class="form-group">
											<label class="col-lg-3 control-labelt">Bank Code:</label>
											<div class="col-lg-9">
                        <div class="input-group">
                          <input type="text" class="form-control" id="bankcode" placeholder="Ex. Kbank">
                          <input type="hidden" name="bank_id" id="bank_id" value="3">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-info btn-icon" id="master_bank_modal" data-toggle="modal" data-target="#master_bank"><i class="icon-search4"></i></button>
                          </div>
                        </div>
											</div>
										</div><br>

										<div class="form-group">
											<label class="col-lg-3 control-labelt">Bank Name:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" id="bankname" placeholder="Enter Bank Name">
											</div>
										</div><br>



										<div class="form-group">
											<label class="col-lg-3 control-labelt">Address:</label>
											<div class="col-lg-9">
												<textarea rows="5" cols="5" class="form-control" id="bankaddr" placeholder="Enter Bank Address"></textarea>
											</div>
										</div>


									</div>
							<!--  -->
                  <div class="modal-footer" style="margin-top:100px;">
                  	<button type="submit" class="btn btn-success" data-dismiss="modal" id="addbank"><i class="icon-floppy-disk"></i> Save</button>
                    <a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
                    
                  </div>
            </div>
          </div>
        </div>

         <div id="editbankk" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Edit BANK</h5>
              </div>
					<div class="modal-body">
						<div id="ebank"></div>
					</div>
                <div class="modal-footer" style="margin-top:100px;">
                	<button type="submit" class="btn btn-primary" data-dismiss="modal" id="editbank"><i class="icon-floppy-disk"></i> Save</button>
                    <a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
                    
                  </div>
            </div>
          </div>
        </div>
<div id="master_bank" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modal_title">Bank</h4>
      </div>
      <div class="modal-body">
        <div id="content_master_bank"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
        <script>
        $('#master_bank_modal').click(function(event) {
          $("#content_master_bank").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#content_master_bank").load('<?php echo base_url(); ?>share/bank_master');
        });
          
  
			  $(".editbank").click(function(){
			  	var bank = $("#bank").val();
			  $('#ebank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			  $("#ebank").load('<?php echo base_url(); ?>data_master/geteditbank/'+bank);
			  });
			  </script>


			   

        <!-- /disabled backdrop -->
        <!-- Disabled backdrop -->
                <div id="newbranch" class="modal fade" data-backdrop="false">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header btn-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">ADD NEW BRANCH</h5>
                      </div>

											<div class="modal-body">
															<div class="form-group">
																<label class="col-lg-3 control-labelt">Bank Code:</label>
																<div class="col-lg-9">
																	<h5 id="bankcode_branch"></h5>
																</div>
															</div><br><br>

															<div class="form-group">
																<label class="col-lg-3 control-labelt">Branch Code:</label>
																<div class="col-lg-9">
																	<input type="text" class="form-control" id="branchcode" placeholder="Enter Branch Code">
																</div>
															</div><br>

															<div class="form-group">
																<label class="col-lg-3 control-labelt">Branch Name:</label>
																<div class="col-lg-9">
																	<input type="text" class="form-control" id="branchname" placeholder="Enter Branch Name">
																</div>
															</div><br>

															<div class="form-group">
																<label class="col-lg-3 control-labelt">Address:</label>
																<div class="col-lg-9">
																	<textarea rows="5" cols="5" class="form-control" id="branchaddr" placeholder="Enter Branch Address"></textarea>
																</div>
															</div>


														</div>
												<!--  -->
					                  <div class="modal-footer" style="margin-top:100px;">
					                    <button type="submit" class="btn btn-primary" data-dismiss="modal" id="addbranch"><i class="icon-floppy-disk"></i> Save</button>
                    					<a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
					                  </div>
                    </div>
                  </div>
                </div>
                 <div id="editbranch" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Edit Branch</h5>
              </div>
					<div class="modal-body">
						<div id="ebranch"></div>
					</div>
                <div class="modal-footer" style="margin-top:100px;">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal" id="edbranch"><i class="icon-floppy-disk"></i> Save</button>
                    <a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
                  </div>
            </div>
          </div>
        </div>

        <script>
			  $(".editbranch").click(function(){
			  	 var bank = $("#bank").val();
  				 var branch = $("#branch").val();
			  $('#ebranch').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			  $("#ebranch").load('<?php echo base_url(); ?>data_master/geteditbranch/'+bank+'/'+branch);
			  });
			  </script>

                <!-- /disabled backdrop -->
                <!-- Disabled backdrop -->
                        <div id="newaccount" class="modal fade" data-backdrop="false">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">ADD NEW BANK ACCOUNT</h5>
                              </div>

															<div class="modal-body">
																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Bank Code:</label>
																				<div class="col-lg-9">
																					<h5 id="bankcode_branchacc"></h5>
																				</div>
																			</div><br>

																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Branch Code:</label>
																				<div class="col-lg-9">
																					<h5 id="bankcode_account"></h5>
																				</div>
																			</div><br><br>
																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Account No.:</label>
																				<div class="col-lg-3">
																					<input type="text" class="form-control" id="accnof" placeholder="Enter Account No.">
																				</div>
																			</div><br>

																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Account Name:</label>
																				<div class="col-lg-3">
																					<input type="text" readonly=""  class="form-control" id="accname" placeholder="Enter Account Name">
																				</div>
																			</div><br>
																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Account code:</label>
																				<div class="col-lg-3">
																					<div class="input-group">
																					<input type="text" readonly="" class="form-control" id="accnor" placeholder="Enter Account code">
																					<div class="input-group-btn">
									 												 <button type="button" data-toggle="modal" data-target="#accopen"  class="accopen btn btn-primary btn-icon"><i class="icon-search4"></i></button>
									 											 </div>
																				</div>
																			</div>
																			</div><br>

																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Type:</label>
																				<div class="col-lg-3">
																					<select class="form-control" id="acctype">
																						<option value="current">Current</option>
																						<option value="saving">Saving</option>
																						<option value="fix">Fix</option>
																						<option value="fundaccount">Fund Account</option>
																					</select>
																				</div>
																			</div>



																		</div>
																<!--  -->
									                  <div class="modal-footer" style="margin-top:20px;">
									                    <button type="submit" class="btn btn-primary" data-dismiss="modal" id="addaccount"><i class="icon-floppy-disk"></i> Save</button>
                    									<a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
									                  </div>
                            </div>
                          </div>
                        </div>
                        <!-- /disabled backdrop -->

            </div>
          </div>
        </div>

        </div>


<div id="balanceforward" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Balance Forward</h5>
              </div>
              <form action="<?php echo base_url(); ?>datastore_active/bankacct" method="post">
					<div class="modal-body">
						<div id="balanceforwardd"></div>
					</div>
                <div class="modal-footer" style="margin-top:100px;">
                	<br>
                    <button type="submit" class="btn btn-success" data-dismiss="modal" id=""><i class="icon-floppy-disk"></i> Save</button>
                    <a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
                  </div>
                  </form>
            </div>
          </div>
        </div>

        <script>
			  $(".balanceforward").click(function(){
			  	 var bank = $("#bank").val();
			  	 var branch = $("#branch").val();
			  	 var bankacc = $("#accountno").val();
			  $('#balanceforwardd').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			  $("#balanceforwardd").load('<?php echo base_url(); ?>data_master/balanceforwardd/'+bank+'/'+branch+'/'+bankacc);
			  });
			  </script>

<div class="rowmat"></div>  
<div id="openunitac" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">A/C</h5>
              </div>
					<div class="modal-body">
				<div id="ac"></div>
					</div>
               
            </div>
          </div>
        </div>
       
                 <div id="editbankaccount" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header btn-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Edit Bank Account</h5>
              </div>
					<div class="modal-body">
						<div id="bankaccount"></div>
					</div>
                <div class="modal-footer" style="margin-top:100px;">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal" id="ebankaccount"><i class="icon-floppy-disk"></i> Save</button>
                    <a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
                  </div>
            </div>
          </div>
        </div>

        		<script>
			  $(".editbankaccount").click(function(){
			  	 var bank = $("#bank").val();
			  	 var branch = $("#branch").val();
			  	 var bankacc = $("#accountno").val();
			  $('#bankaccount').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			  $("#bankaccount").load('<?php echo base_url(); ?>data_master/geteditbankaccount/'+bank+'/'+branch+'/'+bankacc);
			  });
			  </script>

				<div id="accopen" class="modal fade">
			 	<div class="modal-dialog modal-lg">
			 		<div class="modal-content">
			 			<div class="modal-header bg-primary">
			 				<button type="button" class="close" data-dismiss="modal">&times;</button>
			 				<h5 class="modal-title">Account </h5>
			 			</div>
<?php $this->db->select('*');
		$this->db->where('act_status',"on");
		// $this->db->where('compcode', $compcode);
		$query = $this->db->get('account_total');
		$res = $query->result(); ?>
			 			<div class="modal-body">
			 				<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Account Code</th>
<th>Account Name</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->act_code; ?></td>
<td><?php echo $val->act_name; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#accnor").val("<?php echo $val->act_code; ?>");
    $("#accname").val("<?php echo $val->act_name; ?>");
  });
</script>
<?php $n++; } ?>
</tbody>
</table>
			 			</div>
			 			<div class="modal-footer">
			 				<!-- <button type="submit" id="save" class="boxmessage btn btn btn-primary"><i class="icon-floppy-disk"></i> Save</button>
			 				<a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a> -->
			 			</div>
			 		</div>
			 	</div>
			  </div>
			  <div id="accopenn" class="modal fade">
			 	<div class="modal-dialog modal-lg">
			 		<div class="modal-content">
			 			<div class="modal-header bg-primary">
			 				<button type="button" class="close" data-dismiss="modal">&times;</button>
			 				<h5 class="modal-title">Account </h5>
			 			</div>
<?php $this->db->select('*');
		$this->db->where('act_status',"on");
		// $this->db->where('compcode', $compcode);
		$query = $this->db->get('account_total');
		$res = $query->result(); ?>
			 			<div class="modal-body">
			 				<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Account Code</th>
<th>Account Name</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->act_code; ?></td>
<td><?php echo $val->act_name; ?></td>
<td><button class="opendeptorn<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>
<script>
  $(".opendeptorn<?php echo $n;?>").click(function(event) {
    $("#eaccnor").val("<?php echo $val->act_code; ?>");
    $("#eaccname").val("<?php echo $val->act_name; ?>");
  });
</script>
<?php $n++; } ?>
</tbody>
</table>
			 			</div>
			 			<!-- <div class="modal-footer">
			 				<button type="submit" id="save" class="boxmessage btn bg-primary"><i class="icon-floppy-disk"></i> Save</button>
			 				<a id="fa_close" data-dismiss="modal"  class="btn bg-danger"><i class="icon-close2"></i> Close</a>
			 			</div> -->
			 		</div>
			 	</div>
			  </div>
<!-- 			  <script>
			  $(".accopen").click(function(){
			  $('#loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			  $("#loadaccchart").load('<?php echo base_url(); ?>share/accchart1');
			  });
			  </script> -->


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script>
// $(document).ready(function() {
  $("#bank").load('<?php echo base_url('data_master/getbank'); ?>');
  $(".newbank").show();
  $(".newbranch").hide();
  $(".newaccount").hide();

  $(".editbank").hide();
  $(".editbranch").hide();
  $(".editbankaccount").hide(); 
  $(".balanceforward").hide(); 

  $(".Delete1").hide();
  $(".Delete2").hide();
  $(".Delete3").hide(); 
// });
$("#bank").click(function(){
 
  $("#txtbank").val("bank");
  $(".newbank").show();
  $(".newbranch").hide();
  $(".newaccount").hide();
  // $("#branch").html("");
  $("#accountno").html("");

  $(".editbank").show();
  $(".editbranch").hide();
  $(".editbankaccount").hide();
  $(".balanceforward").hide(); 
  $(".Delete1").show();
  $(".Delete2").hide();
  $(".Delete3").hide(); 
})


$("#bank").change(function(){

  var bank = $("#bank").val();
  $("#txtbank").val("bank");
  $(".newbank").show();
  $(".newbranch").hide();
  $(".newaccount").hide();
  $("#branch").load('<?php echo base_url('data_master/getbankbranch'); ?>'+'/'+bank);
  $("#bankcode_branch").text(bank);

 
});

$("#branch").change(function(){
  var bank = $("#bank").val();
  var branch = $("#branch").val();
  if (bank==null) {
    $(".newbank").hide();
    $(".newbranch").hide();
    $(".newaccount").hide();
  }else{
    $(".newbank").hide();
    $(".newbranch").show();
    $(".newaccount").hide();
    $("#txtbank").val("branch");
    $("#accountno").load('<?php echo base_url('data_master/getacconuntno'); ?>'+'/'+bank+'/'+branch);
		$("#bankcode_branchacc").text(bank);
		$("#bankcode_account").text(branch);
  }

});
$("#branch").click(function(){
  var bank = $("#bank").val();
  if (bank==null) {
    $(".newbank").hide();
    $(".newbranch").hide();
    $(".newaccount").hide();

  $(".editbank").hide();
  $(".editbranch").hide();
  $(".editbankaccount").hide();
  $(".balanceforward").hide(); 
  }else{
    $(".newbank").hide();
    $(".newbranch").show();
    $(".newaccount").hide();
    $("#txtbank").val("branch");
    $("#accountno").html("");

  $(".editbank").hide();
  $(".editbranch").show();
  $(".editbankaccount").hide();
  $(".balanceforward").hide(); 

   $(".Delete1").hide();
  $(".Delete2").show();
  $(".Delete3").hide(); 
}
});
$("#accountno").change(function(){
	var bank = $("#bank").val();
  	var branch = $("#branch").val();
	var bankacc = $("#accountno").val();
	if (bank==null && branch==null) {
		(".newbank").hide();
    $(".newbranch").hide();
    $(".newaccount").hide();
	}else{
		$(".newbank").hide();
    $(".newbranch").hide();
    $(".newaccount").show();
    $("#txtbank").val("account");
  }
});
$("#accountno").click(function(){
	var bank = $("#bank").val();
  var branch = $("#branch").val();
	var bankacc = $("#accountno").val();
	if (bank==null && branch==null) {
		(".newbank").hide();
    $(".newbranch").hide();
    $(".newaccount").hide();

     $(".editbank").hide();
  $(".editbranch").hide();
  $(".editbankaccount").hide();
  $(".balanceforward").hide(); 
	}else{
	$(".newbank").hide();
    $(".newbranch").hide();
    $(".newaccount").show();

  $(".editbank").hide();
  $(".editbranch").hide();
  $(".editbankaccount").show();
  $(".balanceforward").show(); 

   $(".Delete1").hide();
  $(".Delete2").hide();
  $(".Delete3").show(); 
  }
});


$("#addbank").click(function(){
	var url="<?php echo base_url(); ?>datastore_active/addbank";
		var dataSet={
			bankcode: $("#bankcode").val(),
			bankname: $("#bankname").val(),
			bankaddr: $("#bankaddr").val()
		};
		$.post(url,dataSet,function(data){
			$("#bankcode").val("");
			$("#bankname").val("");
			$("#bankaddr").val("");
			$("#bank").load('<?php echo base_url(); ?>data_master/getbank');
		});
});

$("#addbranch").click(function(){
  var bank = $("#bank").val();
	var url="<?php echo base_url(); ?>datastore_active/addbranch/"+bank;
		var dataSet={
			branchcode: $("#branchcode").val(),
			branchname: $("#branchname").val(),
			branchaddr: $("#branchaddr").val()
		};
		$.post(url,dataSet,function(data){
			$("#branchcode").val("");
			$("#branchname").val("");
			$("#branchaddr").val("");
			$("#branch").load('<?php echo base_url(); ?>data_master/getbankbranch'+'/'+bank);
		});
});
$("#addaccount").click(function(){
  var bank = $("#bank").val();
	var branch = $("#branch").val();
	var url="<?php echo base_url(); ?>datastore_active/addaccount/"+bank+"/"+branch;
		var dataSet={
			accno: $("#accnof").val(),
			accname: $("#accname").val(),
			acctype: $("#acctype").val(),
			accnor: $("#accnor").val(),
		};
		$.post(url,dataSet,function(data){
			$("#accnof").val("");
			$("#accname").val("");
			$("#accnor").val("");
			$("#acctype").val("current");
			$("#accountno").load('<?php echo base_url(); ?>data_master/getacconuntno'+'/'+bank+'/'+branch);
		});
});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
  $(".datatable-basicxc").DataTable();
$('#ma').attr('class', 'active');
$('#ma1').attr('style', 'background-color:#dedbd8');
</script>

<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_bankaccount');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Book Bank</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Book Bank and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/bank_account.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Book Bank, upload an Excel (.xls) file:</p>
        <div class="form-group">
          <input type="file" class="file-styled" id="file_upload" name="userfile">
        </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="submit" class="uploadfile btn btn-success">Import File</button>
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      </div>
    <?php echo form_close();?>
    <div id="load"></div>
    </div>
  </div>
</div>
<script>
  $(".uploadfile").click(function(){
      $("#load").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
  });
</script>