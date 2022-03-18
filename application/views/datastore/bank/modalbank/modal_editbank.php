<?php foreach ($res as $key){
	$bank_code = $key->bank_code;
	$bank_name = $key->bank_name;
	$bank_addr = $key->bank_addr;
	} ?>
		


	<div class="form-group">
											<label class="col-lg-3 control-labelt">Bank Code:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" id="ebankcode" placeholder="Ex. Kbank" value="<?php echo $bank_code; ?>" readonly="">
											</div>
										</div><br>

										<div class="form-group">
											<label class="col-lg-3 control-labelt">Bank Name:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" id="ebankname" placeholder="Enter Bank Name" value="<?php echo $bank_name; ?>">
											</div>
										</div><br>



										<div class="form-group">
											<label class="col-lg-3 control-labelt">Address:</label>
											<div class="col-lg-9">
								<textarea rows="5" cols="5" class="form-control" id="ebankaddr" placeholder="Enter Bank Address"><?php echo $bank_addr; ?></textarea>
											</div>
										</div>


	<script>
	$("#editbank").click(function(){

	var bank = $("#bank").val();
	var url="<?php echo base_url(); ?>datastore_active/editbank/"+bank;
		var dataSet={
			bankcode: $("#ebankcode").val(),
			bankname: $("#ebankname").val(),
			bankaddr: $("#ebankaddr").val()
		};
		$.post(url,dataSet,function(data){
			$("#bankcode").val("");
			$("#bankname").val("");
			$("#bankaddr").val("");
			$("#bank").load('<?php echo base_url('data_master/getbank'); ?>');
		});
});
										</script>