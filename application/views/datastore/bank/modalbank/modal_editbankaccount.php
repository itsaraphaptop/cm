
<?php foreach ($res as $key){
	$bank_code = $key->bank_code;
	$branch_code = $key->branch_code;
	$acc_no = $key->acc_no;
	$acc_code = $key->acc_code;
	$acc_name = $key->acc_name;
	$acc_type = $key->acc_type;
	} ?>
		
<div class="form-group">
																				<label class="col-lg-3 control-labelt">Bank Code:</label>
																				<div class="col-lg-9">
																					<h5 id="bankcode_branchacc"><?php echo $bank_code; ?></h5>
																				</div>
																			</div><br>

																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Branch Code:</label>
																				<div class="col-lg-9">
																					<h5 id="bankcode_account"><?php echo $branch_code; ?></h5>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Account No.:</label>
																				<div class="col-lg-3">
																					<input type="text" class="form-control" id="eaccnof" placeholder="Enter Account No." value="<?php echo $acc_no; ?>">
																				</div>
																			</div><br>

																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Account Name:</label>
																				<div class="col-lg-3">
																					<input type="text" readonly="" class="form-control" id="eaccname" name="eaccname" placeholder="Enter Account Name" value="<?php echo $acc_name; ?>">
																				</div>
																			</div><br>
																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Account code:</label>
																				<div class="col-lg-3">
																					<div class="input-group">
																					<input type="text" class="form-control" readonly=""  id="eaccnor" name="eaccnor" placeholder="Enter Account code" value="<?php echo $acc_code; ?>">
																					<div class="input-group-btn">
									 												 <button type="button" data-toggle="modal" data-target="#accopenn"  class="accopenn btn btn-default btn-icon"><i class="icon-search4"></i></button>
									 											 </div>
																				</div>
																			</div>
																			</div><br>

																			<div class="form-group">
																				<label class="col-lg-3 control-labelt">Type:</label>
																				<div class="col-lg-3">
																					<select class="form-control" id="eacctype">
																						<option value="<?php echo $acc_type; ?>"><?php echo $acc_type; ?></option>
																			
																						<option value="current">Current</option>
																						<option value="saving">Saving</option>
																						<option value="fix">Fix</option>
																						<option value="fundaccount">Fund Account</option>
																					</select>
																				</div>
																			</div>
<script>
	
	$("#ebankaccount").click(function(){
  	var bank = $("#bank").val();
	var branch = $("#branch").val();
	var bankacc = $("#accountno").val();
	var url="<?php echo base_url(); ?>datastore_active/editaccount/"+bank+"/"+branch+'/'+bankacc;
		var dataSet={
			accno: $("#eaccnof").val(),
			accname: $("#eaccname").val(),
			acctype: $("#eacctype").val(),
			accnor: $("#eaccnor").val(),
		};
		$.post(url,dataSet,function(data){
			$("#accnof").val("");
			$("#accname").val("");
			$("#accnor").val("");
			$("#acctype").val("current");
			$("#accountno").load('<?php echo base_url('data_master/getacconuntno'); ?>'+'/'+bank+'/'+branch+'/'+bankacc);
		});
});
</script>

