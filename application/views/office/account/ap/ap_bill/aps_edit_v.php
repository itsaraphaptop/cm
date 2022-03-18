<?php 
foreach ($he as $key) {
  $aps_code = $key->aps_code;
}
 ?>
<div class="content-wrapper">
  <div class="content">

<div class="panel panel-flat">
  <div class="panel-heading">
		<h6 class="panel-title"> Account Payable Archive (Bill Vender)</h6>
  		<div class="panel-body">
				<div class="col-md-12">
		  <ul class="icons-list">	      
	     </ul>
				</div>	
				<form id="faps" action="<?php echo base_url(); ?>ap_active/edit_aps_bill" method="post">
					<div class="col-md-12">
					 	<div class="row">
						  <div class="form-group col-sm-3">
							  <label>APS No. :</label>
								<input type="text" readonly="true" name="apsno" value="<?php echo $aps_code; ?>" class="form-control" >
								<input type="hidden" id="system" name="system" class="form-control" >
							</div>
							<div class="form-group col-sm-3">
							  <label>Tax No. :</label> 
								<input type="text" id="taxno" name="taxno" value="<?php echo $key->aps_invno;?>"  class="form-control" >
							</div>
							<div class="form-group col-sm-3">
							  <label>Tax Date :</label>
								<input type="date" id="taxdate" name="taxdate" value="<?php echo $key->aps_invdate;?>" class="form-control">
							</div>
							<div class="form-group col-sm-3">
						  <label >Data Type :</label>
						  <input type="text" id="datatype" readonly="true" name="datatype" value="<?php echo $key->aps_datatype;?>" class="form-control" >
						</div>
						 </div>
					</div>
					<div class="col-md-12">
					  <div class="row">
						<div class="form-group col-sm-3">
					      <label for="">Pay to :</label>
					      
					      <input type="hidden" id="acct_no" name="vendercode" class="form-control" >
					      <input type="text" id="nameve" name="payto" value="<?php echo $key->vender_name?>"  class="form-control" readonly="true">		      
					    </div>
					    <div class="form-group col-sm-3">
							  <label>Project Name :</label>
								<input type="text" id="pre_eventname" name="pre_eventname" class="form-control" value="<?php echo $key->project_name;?>" readonly="true">
								<input type="hidden" class="form-control input-sm" name="projid" id="projid">
							</div>
						<div class="form-group col-sm-3">
						  <label >Credit Term :</label>
							<input type="text" id="crterm" name="crterm"  value="<?php echo $key->aps_crterm;?>" class="form-control">
						</div>
						<div class="form-group col-sm-3">
						  <label >Due Date :</label>
							<input type="date" readonly="true" id="duedate" name="duedate" value="<?php echo $key->aps_duedate;?>" class="form-control">
						</div>
						
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="row">
							<div class="form-group col-sm-3">
							  <label>Less  Advance :</label>
								<input type="text" id="ladv" readonly="true" value="<?php echo $key->aps_deduct;?>" name="ladv" class="form-control text-right">
							</div>
							<div class="col-md-3">
					      <div class="form-group">
				          <label>Less Retention:</label>
				          <input type="text" class="form-control text-right" value="<?php echo $key->aps_retention;?>" readonly="true" name="reten" id="reten">
				        </div>	
					    </div>
					    <div class="col-md-6">
					  	<div class="form-group" id="errorcost">
								<label>Remark :</label>
								<input type="text" id="remark" name="remark" class="form-control" >
					  	</div>
						</div>
					  </div>
					</div>						
					<div class="col-md-12">
					  <div class="row">
					  	<div class="form-group col-sm-2">
				        <label>Amount</label>
			          <input type="text" class="form-control text-right" value="<?php echo $key->aps_amount;?>" readonly="true" name="amt" id="amt" >
			          <input type="hidden" class="form-control text-right" name="amth" id="amth">
			          <input type="hidden" class="form-control text-right" name="lessother" id="lessother">		         
				      </div>
					    <div class="col-md-2">
					      <div class="form-group">
					        <label>VAT %:</label>
					        <div class="input-group">
			              <input type="text" class="form-control text-right" value="<?php echo $key->aps_vatper;?>" name="vat" id="vat" value="0" readonly="true">
			              <span class="input-group-addon">%</span>
					        </div>
					      </div>
					    </div>
					    <div class="col-md-2">
					      <div class="form-group">
					        <label>VAT Amount:</label>
			            <input type="text" class="form-control text-right" readonly="true" value="<?php echo $key->aps_vattot;?>"  name="invamt" id="invamt">
									<input type="hidden" class="form-control text-right" value="0.00" name="invamth" id="invamth">
					      </div>
					    </div>
					    <div class="col-md-2">
					      <div class="form-group">
					        <label>W/T Amount:</label>
					        <input type="text" readonly="true" value="<?php echo $key->aps_wttot;?>" class="form-control text-right" name="wtamt" value="" id="wtamt">
					        <input type="hidden" readonly="true" class="form-control text-right" name="ap_wt" value="" id="ap_wt">
					        <input type="hidden" readonly="true" class="form-control text-right" name="ap_wtper" value="" id="ap_wtper">
					      </div>
					    </div>
					    <div class="col-md-2">
					      <div class="form-group">
					        <label>Net Amount:</label>
			            <input type="text" class="form-control text-right"  value="<?php echo $key->aps_netamt;?>" readonly="true" name="netamt" id="netamt">
			            <input type="hidden" class="form-control text-right" name="netamth" id="netamth">
			            <input type="hidden" class="form-control text-right" name="netamteh" id="netamteh">
					      </div>
					    </div>
					    <div class="col-md-2">
							  <div class="form-group" id="errorcost">
								<label>Currency :</label>
								<input type="text" id="curr" name="curr" value="BATH" class="form-control" readonly="true">
							  </div>
							</div>
					 	</div>
					</div>
			 		
					<br>
					<div class="col-md-12">
					  <div class="row">						
						<div class="form-group col-sm-2">
				        <label>AP Date:</label>
				        <input type="date" id="vchdate" readonly="true" value="<?=$key->ap_date;?>" name="vchdate" class="form-control">
				    </div>
				    <div class="form-group col-sm-2">
				        <label>Year:</label>
				        <input type="text" id="glyear" name="glyear" value="<?php echo $key->aps_year;?>" readonly="true" class="form-control">
				     </div>
						<div class="col-md-2">
						  <div class="form-group">
							<label>Period :</label>
							<input type="text" id="glperiod" name="glperiod" value="<?php echo $key->aps_period;?>" readonly="true" class="form-control">
						  </div>
						</div>						
				  </div>
				</div>
						<br>
						<div class="tabbable">
						 	<ul class="nav nav-tabs nav-tabs-highlight">
				  			<li class="active"><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>GL</a></li>
				    		<li><a data-toggle="tab" href="#menu2"><i class="icon-wrench position-left"></i>Progress</a></li>
				    		<li><a data-toggle="tab" href="#menu3"><i class="icon-gradient position-left"></i>Less Other</a></li>
								<li><a href="#menu4" data-toggle="tab"><i class="icon-price-tag position-left"></i> TAX</a></li>
				    	</ul>
				    </div>	  
			  
	   	<div class="tab-content">
	    	<div id="menu1" class="tab-pane fade in active">
	     		
					<div id="m1" class="table-responsive">
          <table class="table table-hover table-xxs ">
            <thead>
              <tr>
                <th>Type</th>
                <th>Account Code</th>
                <th>Account Name</th>
                <th>Cost Code</th>
                <th>Dr</th>
                <th>Cr</th>
              </tr>
            </thead>
            <tbody id="glacc">
						<?php 
							foreach ($gl as $key => $value) {
						?>
							<tr>
								<td>
									<input type="text" class="form-control" value="<?=$value->gltype;?>" readonly="true">
									<input type="hidden" class="form-control" name="id_apgl[]" value="<?=$value->id_apgl;?>">
								</td>
								<td>
									<div class="input-group">
										<input type="text" class="form-control" id="acc_no<?=$key;?>" name="acc_no[]" value="<?=$value->acct_no;?>" readonly="true">
										<span class="input-group-btn" >
												<button type="button"  row="<?=$key;?>" class="btn btn-info btn-icon" onclick="open_acc($(this))"><i class="icon-search4"></i></button>
										</span>
									</div>
								</td>
								<td>
									<input type="text" class="form-control" id="acc_name<?=$key;?>" name="acc_name[]" value="<?=$value->act_name;?>" readonly="true">
								</td>
								<td>
									<input type="text" class="form-control" value="<?=$value->costcode;?>" readonly="true">
								</td>
								<td>
									<input type="text" class="form-control" value="<?=$value->amtdr;?>" readonly="true">
								</td>
								<td>
									<input type="text" class="form-control" value="<?=$value->amtcr;?>" readonly="true">
								</td>
							</tr>
						<?php
							}
						?>
           </tbody>
          </table>
        </div>

	     		
	    	</div>
	    	<div id="menu2" class="tab-pane fade">					
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th class="text-center">Material Code</th>
									<th class="text-center">Material Name</th>
									<th class="text-center">QTY</th>
									<th class="text-center">Price/Unit</th>
									<th class="text-center">Amount</th>
									<th class="text-center">This Qty</th>
									<th class="text-center">This Amount</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								foreach ($detail as $key => $value) {
							?>
								<tr>
									<td><?=$key+1;?></td>
									<td>
										<input type="text" class="form-control" value="<?=$value->apsi_matcode;?>" readonly="true">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->materialname;?>" readonly="true">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->apsi_qty;?>" readonly="true">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->apsi_amount;?>" readonly="true">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->apsi_amount;?>" readonly="true">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->thisqty;?>" readonly="true">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->thisamount;?>" readonly="true">
									</td>
								</tr>
							<?php 
								}
							?>

							</tbody>
						</table>
					</div>
					
	    	</div>
	    	<div id="menu3" class="tab-pane fade">
					
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="text-center">Less Other</th>
									<th class="text-center">Amount</th>
									<th class="text-center">Remark</th>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach ($less as $key => $value) {
							?>
								<tr>
									<td>
										<input type="text" class="form-control" readonly="true" value="<?=$value->id_bill;?>">
									</td>
									<td>
										<input type="text" class="form-control" readonly="true" value="<?=$value->less_amount;?>">
									</td>
									<td>
										<input type="text" class="form-control" readonly="true" value="<?=$value->less_remark;?>">
									</td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
					</div>
					
	     	</div>
	     	<div id="menu4" class="tab-pane fade">
				 
				 <div class="table-responsive">
					 <table class="table table-hover">
						 <thead>
							 <tr>
								 <th>Vender Name</th>
								 <th>Tax ID</th>
								 <th>Tax Date</th>
								 <th>Tax No</th>
								 <th>Amount</th>
								 <th>VAT Amount</th>
							 </tr>
						 </thead>
						 <tbody>
						 	<?php 
						 		foreach ($tax as $key => $value) {
							?>
								<tr>
									<td>
										<input type="text" class="form-control" value="<?=$value->vender_name;?>" readonly="true">
										<input type="hidden" class="form-control" name="ap_id[]" value="<?=$value->ap_id;?>">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->ap_taxid;?>" readonly="true">
									</td>
									<td>
										<input type="date" class="form-control" name="tax_date[]" value="<?=$value->ap_taxdate;?>">
									</td>
									<td>
										<input type="text" class="form-control" name="tax_no[]" value="<?=$value->ap_taxno;?>">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->ap_amtvat;?>" readonly="true">
									</td>
									<td>
										<input type="text" class="form-control" value="<?=$value->ap_netamt;?>" readonly="true">
									</td>
								</tr>

							<?php
							 	}
							?>
						 </tbody>
					 </table>
				 </div>
	     	</div>
	    </div>
			  <br>
				<div class="modal-footer">
				   <div class="form-group">
              <button type="button" id="saps" class="bsave btn btn-success" ><i class="icon-floppy-disk position-left"></i> Save</button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
				</div>
		  </div>
		</div>

	</form>
</fieldset>
</div>

<div id="accopen" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Account </h5>
            </div>

            <div class="modal-body">
                <div id="content_md">

                </div>
            </div>
            <div class="modal-footer">
                <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
  </div>
<script>
  function open_acc(el) {
    $('#accopen').modal('show');
    let _id = el.attr('row');
    // alert(_id)
    $.post(`<?=base_url();?>ap/modal_account/acc_no/acc_name/${_id}`, function () {  
    }).done(function(data) {
      $('#content_md').html(data);
    });
  }
  $("#taxno").keyup(function(){
  var taxno = $('#taxno').val();
  $('#taxiv').val(taxno);
  var vcode = $('#yvatcode').val();
  var yname = $('#yvatname').val();
  $('#vcode').val(vcode);
  $('#vname').val(yname);
  });



	$("#vat").keyup(function() {
		var amt = $('#amt').val();
		var vat = $('#vat').val();
		var vattot = (amt*vat)/100;
		var tt = vattot.toFixed(2);
		$("#invamt").val(tt) || 0;
		$("#invamth").val('tt') || 0;
		var netamt = amt-vattot;
		var nattot = netamt.toFixed(2);
		$("#netamt").val(nattot) ||0;
  });

  $("#amt").keyup(function() {
		var amt = $('#amt').val();
		var vat = $('#vat').val();
		var vattot = (amt*vat)/100;
		var tt = vattot.toFixed(2);
		$("#invamt").val(tt) || 0;
		$("#invamth").val('tt') || 0;
		var netamt = amt-vattot;
		var nattot = netamt.toFixed(2);
		$("#netamt").val(nattot) ||0;

  });
</script>
<script>
	$("#wt").change(function(event) {
		if ($("#wt").val()==1){
			var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $('#netamt').val();
      var wt = 0;
      var wttot = nt*wt/100;
      var jj = netamt-wttot;
 			$("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

		}else if($("#wt").val()==2){
      var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
 			var nt = $("#netamt").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;



 		}else if($("#wt").val()==3){
 			var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $("#netamt").val();
      var wt = 1;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

 		}else if($("#wt").val()==4){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $("#netamt").val();
      var wt = 5;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

 		}else if($("#wt").val()==5){
 			var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $("#netamt").val();
      var wt = 2;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

 		}else if($("#wt").val()==6){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $("#netamt").val();
      var wt = 15;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

 		}else if($("#wt").val()==7){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $("#netamt").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

 		}else if($("#wt").val()==8){
 			var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $("#netamt").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

 		}else if($("#wt").val()==9){
 			var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;
      $("#netamt").val(netamt);
      var nt = $("#netamt").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(jj)||0;

 		}
	});
</script>

 <script>
	$("#vchdate").change(function(event) {
	var de_date = $("#vchdate").val();
	var y = de_date.slice(0,4); 
	var m = de_date.slice(5,7);

	$("#glperiod").val(m);
	$("#glyear").val(y);         

	}); 
</script>
 
<script>

	$("#taxiv").click(function(){
      
      $("#novat1").hide();
      $("#novat2").hide();
      $("#yesvat1").show();
      $("#yesvat2").show();
    });
	

	$( "#cvendor" ).click(function() {
  	$("#saveapv").prop("disabled",false);
  	});
$(".vendor").click(function(){
   $('#vendormodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#vendormodel").load('<?php echo base_url(); ?>index.php/share/vender');
   });


$("#saps").click(function(e){

if ($("#crterm").val()=="") {
	swal({
		title: 'Please Fill Credit Term!!.',
		text: "",
		confirmButonColor: "#EA1923",
		type: "error"
	});
}else{
	let year = $('#glyear').val();
	let mm = $('#glperiod').val();
	$.post(`<?=base_url();?>data_master/check_period/${year}/${mm}`,	function () {
		
	}).done(function(data) {
		let json_res = JSON.parse(data);
		if(json_res.status === false) {
			swal({
				title: json_res.messge,
				text: "",
				confirmButonColor: "#EA1923",
				type: "error"
			});
		}else{
			var frm = $('#faps');
					frm.submit(function (ev) {
							$.ajax({
									type: frm.attr('method'),
									url: frm.attr('action'),
									data: frm.serialize(),
													success: function (data) {
											swal({
																title: "Save Completed!!.",
																text: "Save Completed!!.",
																// confirmButtonColor: "#66BB6A",
																type: "success"
														});
		
											setTimeout(function() {
											window.location.href = "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=aps_payvoucher.mrt&no=<?=$this->uri->segment(3)?>";
											}, 500);
											
									}
							});
							ev.preventDefault();

					});
				$("#faps").submit();
		}
	});

}
});
</script>