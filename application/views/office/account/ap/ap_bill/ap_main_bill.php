<?php 
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
$datestring = "Y";
	 $mm = "m";
	 $dd = "d";

	 $this->db->select('*');
	 $qu = $this->db->get('aps_header');
	 $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

	 if ($res==0) {
	   $apscode = "APS".date($datestring).date($mm)."00"."1";
	    $aps_item ="1";
	 }else{
	   $this->db->select('*');
	   $this->db->order_by('aps_id','desc');
	   $this->db->limit('1');
	   $q = $this->db->get('aps_header');
	   $run = $q->result();
	   foreach ($run as $valx)
	   {
	     $x1 = $valx->aps_id+1;
	   }

	   if ($x1<=9) {
	      $apscode = "APS".date($datestring).date($mm)."00".$x1;
	      $aps_item = $x1;
	   }
	   elseif ($x1<=99) {
	     $apscode = "APS".date($datestring).date($mm)."0".$x1;
	     $aps_item = $x1;
	   }
	//    elseif ($x1<=999) {
	//      $apscode = "APS".date($datestring).date($mm)."0".$x1;
	//      $aps_item = $x1;
	//    }
	 }
 ?>
<div class="content-wrapper">
  <div class="content">
  <fieldset>
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h6 class="panel-title">Account Payable Archive (Bill Vender)</h6>
        <div class="heading-elements">
          <div class="col-md-12">
            <ul class="icons-list">
              <li class="pull-right"><button class="openbill btn btn-info btn-xs " id="cvendor" data-toggle="modal" data-target="#openbill"><i class="icon-file-plus"></i> Select</button></li>
            </ul>
          </div>
        </div>
      </div>
  		<div class="panel-body">
				<form id="faps" action="<?php echo base_url(); ?>ap_active/addnewap_bill" method="post">
					<div class="col-md-12">
					 	<div class="row">
						  <div class="form-group col-sm-3">
							  <label>APS No. :</label>
								<input type="text" readonly="true" name="apsno" value="<?php echo $apscode; ?>" class="form-control" >
								<input type="hidden" readonly="true" name="billno" id="subno" class="form-control" >
								<input type="hidden" id="system" name="system">
								<input type="hidden" id="bill_id" name="bill_id">
							</div>
							<div class="form-group col-sm-3">
							  <label>Tax No. :</label> 
								<input type="text" id="taxno" name="taxno" value="" class="form-control" >
							</div>
							<div class="form-group col-sm-3">
							  <label>Tax Date :</label>
								<input type="date" id="taxdate" name="taxdate" class="form-control" value="<?php echo date('Y-m-d');?>">
							</div>
							<div class="form-group col-sm-3">
						  <label >Data Type :</label>
						  <input type="text" id="datatype" name="datatype" readonly="true" class="form-control" >
						</div>
							
						 </div>
					</div>
					<div class="col-md-12">
					  <div class="row">						
							<div class="form-group col-sm-3">
					      <label for="">Pay to :</label>
					      <input type="hidden" id="acct_no" name="vendercode" class="form-control" >
					      <input type="text" id="nameve" name="payto" class="form-control" readonly="true">     
					     
					    </div>
					    <div class="form-group col-sm-3">
							  <label>Project Name :</label>
								<input type="text" id="pre_eventname" name="pre_eventname" class="form-control" readonly="true">
								<input type="hidden" class="form-control input-sm" name="projid" id="projid">
							</div>
						<div class="form-group col-sm-2">
						  <label >Credit Term :</label>
							<input type="text" id="crterm" name="crterm" class="form-control">
						</div>
						<div class="form-group col-sm-2">
						  <label >Due Date :</label>
							<input type="date" id="duedate" name="duedate" class="form-control">
						</div>
						<!-- <div class="form-group col-sm-2">
		                  <label>System Type</label>
		                  <input type="text" class="form-control" readonly="true"  id="system" name="system">
		                  <input type="text" class="form-control" readonly="true"  id="systemid" name="systemid">
		                </div> -->
					  </div>
					</div>
					<div class="col-md-12">
					  <div class="row">
							<div class="form-group col-sm-3">
							  <label>Less Advance:</label>
								<input type="text" id="ladv" readonly="true" name="ladv" class="form-control text-right">
							</div>
							<div class="col-md-3">
					      <div class="form-group">
				          <label>Less Retention:</label>
				          <input type="text" class="form-control text-right" readonly="true" name="reten" id="reten">
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
			          <input type="text" class="form-control text-right" readonly="true" name="amt" id="amt" >
			          <input type="hidden" class="form-control text-right" name="amth" id="amth">
			          <input type="hidden" class="form-control text-right" name="lessother" id="lessother">		         
				      </div>
					    <div class="col-md-1">
					      <div class="form-group">
					        <label>VAT:</label>
					        <div class="input-group">
			              <input type="text" class="form-control text-right" name="vat" id="vat" value="0" readonly="true">
			              <span class="input-group-addon">%</span>
					        </div>
					      </div>
					    </div>
					    <div class="col-md-2">
					      <div class="form-group">
					        <label>VAT Amount:</label>
			            <input type="text" class="form-control text-right" readonly="true"  name="invamt" id="invamt">
									<input type="hidden" class="form-control text-right" value="0.00" name="invamth" id="invamth">
					      </div>
					    </div>
					    <div class="col-md-2">
					      <div class="form-group">
					        <label>Net Amount:</label>
			            <input type="text" class="form-control text-right" readonly="true" name="netamt" id="netamt">
			            <input type="hidden" class="form-control text-right" name="netamth" id="netamth">
			            <input type="hidden" class="form-control text-right" name="netamteh" id="netamteh">
					      </div>
					    </div>
							<div class="col-md-1">
								<div class="form-group">
								<label>W/T :</label>
									<div class="input-group">
										<input type="text" class="form-control text-right" name="wt_vat" id="wt_vat" readonly="true">
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>	
							<div class="col-md-2">
								<div class="form-group">
									<label>W/T Amount:</label>
									<input type="text" readonly="true" class="form-control text-right" name="wtamt" value="" id="wtamt">
									<input type="hidden" readonly="true" class="form-control text-right" name="ap_wt" value="" id="ap_wt">
									<input type="hidden" readonly="true" class="form-control text-right" name="ap_wtper" value="" id="ap_wtper">
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
									<input type="date" id="vchdate" name="vchdate" class="form-control">
							</div>
							<div class="form-group col-sm-1">
									<label>Year:</label>
									<input type="text" id="glyear" readonly="true" name="glyear" class="form-control">
							</div>
							<div class="col-md-1">
								<div class="form-group">
								<label>Period :</label>
								<input type="text" id="glperiod" readonly="true" name="glperiod" class="form-control">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
								<label>deduct :</label>
								<input type="text" id="de_duct" readonly="true" name="deduct" class="form-control">
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
	     		<div id="m1">
	     		</div>
	    	</div>
	    	<div id="menu2" class="tab-pane fade">
	      	<div id="m2">
	     		</div>
	    	</div>
	    	<div id="menu3" class="tab-pane fade">
	    		<div id="m3">
	     		</div>
	     	</div>
	     	<div id="menu4" class="tab-pane fade">
	    		<div id="m4">
	     		</div>
	     	</div>
	    </div>
			  <br>
				<div class="modal-footer">
				   <div class="form-group">
              <a href="<?=base_url();?>ap/ap_main_bill" class="btn btn-primary" ><i class="icon-plus-circle2 position-left"></i> New</a>
              <button type="button" class="bsave btn btn-success" id="saps"><i id="icon_save" class="icon-floppy-disk position-left"></i> Save</button>
              <!-- <button type="submit" id="saps1111" class="bsave btn btn-success" ><i class="icon-floppy-disk position-left"></i> Save</button> -->
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
				</div>
		  </div>
		</div>

	</form>
</div>
</div>

<div class="modal fade" id="openbill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-full" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Select Bill No.</h4>
        </div>
        <div class="modal-body">
          <div id="modal_bill">
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="vendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header bg-info">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Vender</h4>
    </div>
    <div class="modal-body">
    <div id="vendormodel"></div>
    </div>
  </div>
  </div>
</div>
<script>

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

	$('#crterm').keyup(function() {
		let _val = $(this).val();
		$.post(`<?=base_url();?>ap/date/${_val}`, function () {
				
		}).done(function(data) {
			$('#duedate').val(data);
		});
	});
</script>
 
<script>

	$("#taxiv").click(function(){
      
      $("#novat1").hide();
      $("#novat2").hide();
      $("#yesvat1").show();
      $("#yesvat2").show();
    });
	$(".openbill").click(function(){
  	$('#modal_bill').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  	$('#modal_bill').load('<?php echo base_url(); ?>index.php/ap/open_bill');
	});

	$( "#cvendor" ).click(function() {
  	$("#saveapv").prop("disabled",false);
  	});
$(".vendor").click(function(){
   $('#vendormodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#vendormodel").load('<?php echo base_url(); ?>index.php/share/vender');
   });


$("#saps").click(function(e){

	// data_master/check_period/2020/01
	if($("#crterm").val()=="") {
		  swal({
      title: "กรุณาเลือก Cr Term!!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
	return false;
	}

	let vchdate = $('#vchdate').val();
	let year = $('#glyear').val();
	let glperiod = $('#glperiod').val();

	if (vchdate !='') {
		$.post(`<?=base_url();?>data_master/check_period/${year}/${glperiod}`, function () {
				
		}).done(function(data) {
			let json_res = JSON.parse(data);
			// console.log(json_res);
			if (json_res.status === false) {
				swal({
					title: json_res.message,
					text: '',
					confirmButtonColor: "#EA1923",
					type: 'error'
				})
			}else{
				
				if ($('#amt').val()*1 == $('#sum_amount').html()*1 && $('#invamt').val()*1 == $('#sum_vat_amount').html()*1 ) {
					$('#saps').attr('class', 'btn btn-success disabled');
					$('#icon_save').attr('class', 'icon-spinner2 spinner');
					var frm = $('#faps');

						frm.submit(function (ev) {
								$.ajax({
										type: frm.attr('method'),
										url: frm.attr('action'),
										data: frm.serialize(),
														success: function (data) {
															console.log(data);
															
												swal({
															title: "Save Completed!!.",
															text: "Save Completed!!.",
															// confirmButtonColor: "#66BB6A",
															type: "success"
														});
			
												setTimeout(function() {
													window.location.href ="<?php echo base_url();?>report/viewerloadgl?module=ap&typ=report&reportname=aps_payvoucher.mrt&no=<?php echo $apscode; ?>$compcode=<?php echo $compcode;?>";
													$('#saps').attr('class', 'btn btn-success disabled');
													$('#saps').attr('disabled', 'disabled');
													$('#icon_save').attr('class', 'icon-floppy-disk position-left');
												}, 500);
												
										}
								});
								ev.preventDefault();

						});
					$("#faps").submit();
				}else{
					swal({
						title: "ค่า Amount ไม่สัมพันธ์",
						text: "กรุณาตรวจสอบข้อมูลให้ถูกต้อง",
						// confirmButtonColor: "#66BB6A",
						type: "error"
					});
				}
			}
			
		});
		
	}else{
		swal({
			title: "Plase select AP Date",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
		})
	}
// 	var url="<?php echo base_url(); ?>ap_active/selectdate";
//         var dataSet={
//         d: $("#vchdate").val(),
//         y: $("#glyear").val(),
//         m: $("#glperiod").val()
//         };
//       $.post(url,dataSet,function(data){
//       if (data!="Y") {
//         swal({
//           title: "งวดบัญชีผิด กรุณาเลือกวันที่ใหม่ !!.",
//           text: "",
//           confirmButtonColor: "#EA1923",
//           type: "error"
//         });
// }else if($("#crterm").val()==""){
//   swal({
//       title: "กรุณาเลือก Cr Term!!.",
//       text: "",
//       confirmButtonColor: "#EA1923",
//       type: "error"
//   });
// }else{
// 	$('#saps').attr('class', 'btn btn-success disabled');
// 	$('#icon_save').attr('class', 'icon-spinner2 spinner');
//      var frm = $('#faps');
//             frm.submit(function (ev) {
//                 $.ajax({
//                     type: frm.attr('method'),
//                     url: frm.attr('action'),
//                     data: frm.serialize(),
//                             success: function (data) {
// 															console.log(data);
															
//                         swal({
// 															title: "Save Completed!!.",
// 															text: "Save Completed!!.",
// 															// confirmButtonColor: "#66BB6A",
// 															type: "success"
// 														});
      
//                         setTimeout(function() {
//                         	window.location.href ="<?= $base_url = $this->config->item('url_report');?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=aps_payvoucher.mrt&no=<?php echo $apscode; ?>";
//                         	$('#saps').attr('class', 'btn btn-success disabled');
//                         	$('#saps').attr('disabled', 'disabled');
// 													$('#icon_save').attr('class', 'icon-floppy-disk position-left');
// 												}, 500);
                       
//                     }
//                 });
//                 ev.preventDefault();

//             });
//           $("#faps").submit();
// }
// });
      });
</script>