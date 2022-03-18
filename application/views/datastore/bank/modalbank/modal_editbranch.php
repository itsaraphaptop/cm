
<?php foreach ($res as $key){
	$bank_code = $key->bank_code;
	$branch_code = $key->branch_code;
	$branch_name = $key->branch_name;
	$branch_addr = $key->branch_addr;
	} ?>
<div class="form-group">
																<label class="col-lg-3 control-labelt">Bank Code:</label>
																<div class="col-lg-9">
																	<h5 id="bankcode_branch"><?php echo $bank_code;?></h5>
																</div>
															</div><br><br>

															<div class="form-group">
																<label class="col-lg-3 control-labelt">Branch Code:</label>
																<div class="col-lg-9">
																	<input type="text" class="form-control" id="ebranchcode" placeholder="Enter Branch Code" value="<?php echo $branch_code;?>">
																</div>
															</div><br>

															<div class="form-group">
																<label class="col-lg-3 control-labelt">Branch Name:</label>
																<div class="col-lg-9">
																	<input type="text" class="form-control" id="ebranchname" placeholder="Enter Branch Name" value="<?php echo $branch_name;?>">
																</div>
															</div><br>

															<div class="form-group">
																<label class="col-lg-3 control-labelt">Address:</label>
																<div class="col-lg-9">
																	<textarea rows="5" cols="5" class="form-control" id="ebranchaddr" placeholder="Enter Branch Address" ><?php echo $branch_addr;?></textarea>
																</div>
															</div>

															<script>
																
	$("#edbranch").click(function(){
    var bank = $("#bank").val();
  var branch = $("#branch").val();
	var url="<?php echo base_url(); ?>datastore_active/editbranch/"+bank+'/'+branch;
		var dataSet={
			branchcode: $("#ebranchcode").val(),
			branchname: $("#ebranchname").val(),
			branchaddr: $("#ebranchaddr").val()
		};
		$.post(url,dataSet,function(data){
			$("#branchcode").val("");
			$("#branchname").val("");
			$("#branchaddr").val("");
			$("#branch").load('<?php echo base_url('data_master/getbankbranch'); ?>'+'/'+bank);
		});
});
															</script>