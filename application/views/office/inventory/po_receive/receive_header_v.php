<style type="text/css">
  selelct:required {
  box-shadow: 4px 4px 20px rgba(200, 0, 0, 0.85);
}
</style>

<?php 
$status = $this->uri->segment(5);
foreach ($res as $val) {
	$pono = $val->po_pono;
	$po_podate = $val->po_podate;
	$venderid = $val->po_venderid;
	$vender = $val->po_vender;
	if ($status == "p") {
		$porijectid = $val->project_id;
		$projcode = $val->project_code;
		$project_name = $val->project_name;
	} else {
		$depid = $val->po_department;
		$depname = $val->department_title;
	}
	$system = $val->po_system;
	$crterm = $val->po_trem;
	$deli = $val->po_deliverydate;
	$pr_code = $val->po_prno;
	$podate = $val->po_podate;
	$systemname = $val->systemname;
} ?>
<!-- Main content -->
<div class="content-wrapper">
	<div class="content">
		<div class="col-md-12">
			<!-- Highlighting rows and columns -->
			<div class="panel panel-flat">
				<div class="panel-body">
					<form name="savepost" id="savepost" method="post" action="<?php echo base_url(); ?>inventory_active/insert_receive_po">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Receive No</label>
									<input type="text" class="form-control" id="poreccode" name="poreccode" placeholder="Receive No" readonly="true">
									<input type="hidden" value="<?php echo $pr_code; ?>" name="pr_code">
									<input type="hidden" value="<?php echo $podate; ?>" name="podate">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Receive Date </label>
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar22"></i></span>
										<input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="porecdate" name="porecdate">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">PO No.</label>
									<input type="text" class="form-control input-sm" id="pono" name="pono" value="<?php echo $pono; ?>" readonly="true">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>PO Date: </label>
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar22"></i></span>
										<input type="date" class="form-control" id="podate" name="podate" readonly="readonly" value="<?php echo $po_podate; ?>">
									</div>
								</div>
							</div>
							
					</div>
					<div class="row">
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Seller / Vender</label>
								<input type="text" class="form-control input-sm" id="vendername" name="vendername" value="<?php echo $vender; ?>" readonly="true">
								<input type="hidden" name="venderid" value="<?php echo $venderid; ?>">
							</div>
						</div>
						<?php if ($status == "p") { ?>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Project Name</label>
								<input type="text" class="form-control input-sm" id="project" value="<?php echo $pj_name[0]->project_name; ?>" readonly="true">
								<input type="hidden" id="projectid" name="projectid" value="<?php echo $porijectid; ?>">
								<input type="hidden" class="form-control input-sm" id="departnam" value="" readonly="true">
								<input type="hidden" id="departid" name="departid" value="">
							</div>
						</div>
						<?php 
				} else { ?>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Department Name</label>
								<input type="text" class="form-control input-sm" id="departnam" value="<?php echo $depname; ?>" readonly="true">
								<input type="hidden" id="departid" name="departid" value="<?php echo $depid; ?>">
							</div>
						</div>
						<?php 
				} ?>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">System Type</label>
								<input type="hidden"  name="systemcode" value="<?php echo $system; ?>">
								<input type="text" class="form-control" readonly="" name="system" value="<?php echo $systemname; ?>">
								
							</div>
						</div>
					</div>
					<div class="row">
						
						
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Invoice No. </label>
								<input type="text" class="form-control input-sm" id="taxno" name="taxno" placeholder="Please Input Tax Invoice Number">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Invoice Date </label>
								<input type="date" class="form-control"  id="taxdate" name="taxdate" >
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Delivery No.</label>
								<input type="text" class="form-control input-sm" id="docode" name="docode" placeholder="Please Input D/O">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Delivery Date</label>
								<input type="date" class="form-control" id="duedate" name="duedate" value="<?php echo $deli; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group" >
								<label class="display-block text-semibold">Service Evaluation</label>
								<div class="panel panel-default border-grey">
									<label>Time</label><br>
									<label class="radio-inline">
										<input type="radio" name="Ontime" id="Ontime" class="styled" >
										On Time
									</label>
									
									<label class="radio-inline">
										<input type="radio" name="Ontime" id="Late" class="styled" >
										Lest
									</label>
									<br>
									<label>Quality</label><br>
									
									<label class="radio-inline">
										<input type="radio" name="Good" id="Good" class="styled" >
										Quality Pass
									</label>
									
									<label class="radio-inline">
										<input type="radio" name="Good" id="Fail" class="styled">
										Quality not Pass
									</label>
									<br>
									<input type="hidden" id="txtGood" name="txtGood" value="">
									<input type="hidden" id="txtontime" name="txtontime" value="">
									<input type="hidden" id="txtLate" name="txtLate" value="">
									<input type="hidden" id="txtFail" name="txtFail" value="">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group" >
								<label class="display-block text-semibold">Quality Evaluation</label>
								<div class="panel panel-default border-grey">
									<label>Standard</label><br>
									<label class="radio-inline">
										<input type="radio" name="radio-inline-left" id="matrd1" class="styled">
										Standard
									</label>
									
									<label class="radio-inline">
										<input type="radio" name="radio-inline-left" id="matrd2" class="styled" >
										Not Standard
									</label>
									<br><label>Complete</label><br>
									<label class="radio-inline">
										<input type="radio" name="complete" id="matrd3" class="styled">
										Complete
									</label>
									
									<label class="radio-inline">
										<input type="radio" name="complete" id="matrd4" class="styled">
										Not Complete
									</label> <br>
									<input type="hidden" id="txtstanddard" name="txtstanddard" value="">
									<input type="hidden" id="txtnotstanddard" name="txtnotstanddard" value="">
									<input type="hidden" id="txtcomplete" name="txtcomplete" value="">
									<input type="hidden" id="txtnotcomplete" name="txtnotcomplete" value="">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<label for="">Credit Term</label>
							<div class="input-group">
								<input type="text" class="form-control input-sm" id="term" name="term" readonly="true"  placeholder="Please Input Term" value="<?php echo $crterm; ?>">
								<span class="input-group-addon">Day</span>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group" style="margin-top: 30px;">
								<!-- <label class="display-block text-semibold">Not Stock Control</label> -->
								<label class="checkbox-inline">
									<input type="checkbox" class="styled" id="allreceive">
									Receive All
								</label>
							</div>
							<input type="hidden" class="styled" id="inputreceiveall" name="flagall" value="">
							<label class="checkbox-inline">
						</div>
							<input type="hidden" class="form-control"  id="ducdate" name="ducdate">
							<input type="hidden" class="styled" id="inputflag" name="flag" value="">
							<!-- <div class="col-md-2">
								<div class="form-group" style="margin-top: 30px;">
									<input type="checkbox" class="styled" id="flag">
									Not Stock Control
								</div>
								
							</div> -->
						</div>
						<script>
$(window).load(function(){
    function newDayAdd(inputDate,addDay){
      var d = new Date(inputDate);
      d.setDate(d.getDate()+addDay);
      mkMonth=d.getMonth()+1;
      mkMonth=new String(mkMonth);
      if(mkMonth.length==1){
          mkMonth="0"+mkMonth;
      }
      mkDay=d.getDate();
      mkDay=new String(mkDay);
      if(mkDay.length==1){
          mkDay="0"+mkDay;
      }   
      mkYear=d.getFullYear();
      return mkYear+"-"+mkMonth+"-"+mkDay; 
  }
  var dates = $("#porecdate").val();
  var cr = parseFloat($("#term").val());
  if (cr) {
  	var duedate=newDayAdd(dates,cr);
  $('#ducdate').val(duedate);
  }else{
  $('#ducdate').val(dates); 	
  }
});


$("#taxdate").change(function(){
  function newDayAdd(inputDate,addDay){
      var d = new Date(inputDate);
      d.setDate(d.getDate()+addDay);
      mkMonth=d.getMonth()+1;
      mkMonth=new String(mkMonth);
      if(mkMonth.length==1){
          mkMonth="0"+mkMonth;
      }
      mkDay=d.getDate();
      mkDay=new String(mkDay);
      if(mkDay.length==1){
          mkDay="0"+mkDay;
      }   
      mkYear=d.getFullYear();
      return mkYear+"-"+mkMonth+"-"+mkDay; 
  }
  var dates = $("#taxdate").val();
  var cr = parseFloat($("#term").val());
  if (cr) {
  	var duedate=newDayAdd(dates,cr);
  $('#ducdate').val(duedate);
  }else{
  $('#ducdate').val(dates); 	
  }
});


$("#duedate").change(function(){
	if ($("#taxdate").val()  == "") {
  function newDayAdd(inputDate,addDay){
      var d = new Date(inputDate);
      d.setDate(d.getDate()+addDay);
      mkMonth=d.getMonth()+1;
      mkMonth=new String(mkMonth);
      if(mkMonth.length==1){
          mkMonth="0"+mkMonth;
      }
      mkDay=d.getDate();
      mkDay=new String(mkDay);
      if(mkDay.length==1){
          mkDay="0"+mkDay;
      }   
      mkYear=d.getFullYear();
      return mkYear+"-"+mkMonth+"-"+mkDay; 
  }
  var dates = $("#duedate").val();
  var cr = parseFloat($("#term").val());
  if (cr) {
  	var duedate=newDayAdd(dates,cr);
  $('#ducdate').val(duedate);
  }else{
  $('#ducdate').val(dates); 	
  }
  }
});	




				$("#Ontime").click(function(){
					$("#txtontime").val("1");
					$("#txtLate").val("0");
				});
				$("#Late").click(function(){
					$("#txtontime").val("0");
					$("#txtLate").val("1");
				});
				$("#Good").click(function(){
					$("#txtGood").val("1");
					$("#txtFail").val("0");
				});
				$("#Fail").click(function(){
					$("#txtGood").val("0");
					$("#txtFail").val("1");
				});

				$("#matrd1").click(function(){
					$("#txtstanddard").val("1");
					$("#txtnotstanddard").val("0");
				});
				$("#matrd2").click(function(){
					$("#txtstanddard").val("0");
					$("#txtnotstanddard").val("1");
				});
				$("#matrd3").click(function(){
					$("#txtcomplete").val("1");
					$("#txtnotcomplete").val("0");
				});
				$("#matrd4").click(function(){
					$("#txtcomplete").val("0");
					$("#txtnotcomplete").val("1");
				});
			</script>
<style>
	.tablew {
  width: 200%;
  max-width: 500%;
  /*overflow-x: scroll;*/
  overflow-x:auto;
}
</style>
			<div class="table-responsive">
			<div class="form-group">
				<table class="tablew table-bordered table-striped table-xxs">
				<thead>
					<tr>
						<th width="3%"></th>
						<th width="10%">Material Code</th>
						<th width="10%">Material Name</th>
						<th width="10%">Cost Code</th>
						<th width="20%">Cost Name</th>
						<!-- <th width="15%">Warehouse</th> -->
						<?php if ($icamt == "true") { ?>
						<th width="5%">Amount After Discount</th>
						<th width="5%">VAT Amount</th>
						<th width="5%">Net Amount</th>
						<?php } else { ?>

						<?php } ?>

						<th width="5%">P/O QTY</th>
						<th width="5%">Price/Unti</th>
						<th width="5%">Unit Name</th>
						<th width="5%">QTY Balance</th>
						<th width="5%">Receive QTY</th>
					</tr>
				</thead>
				<tbody id="bodytable">
					<?php $amounte = 0;
				$vate = 0;
				$netamte = 0;
				$n = 1;
				foreach ($resi as $val) { ?>
						 <tr>

			                <?php $qty = $val->poi_qty;
																		$rece = $val->poi_receive;
																		$total = $qty - $rece;
																		if ($total == "0") { ?>

			                    <?php 
																					} else { ?>
			                    <th>
			                    <!-- <div class="checkbox checkbox-switchery switchery-xs"> -->
					             <label>
					                <input type="checkbox"  id="a<?php echo $n; ?>">
					                <input type="hidden" name="chki[]" id="chki<?php echo $n; ?>" value="">
					              </label>
					            <!-- </div> -->
			                    </th>
			                    <th scope="row"><input type="text" readonly class="form-control input-sm" required  name="matcode[]" value="<?php echo $val->poi_matcode; ?>"></th>
				                <td><?php echo $val->poi_matname; ?><input type="hidden" name="matname[]" value="<?php echo $val->poi_matname; ?>"></td>
				                <td><?php echo $val->poi_costcode; ?><input type="hidden" name="costcode[]" value="<?php echo $val->poi_costcode; ?>"></td>
				                <td><?php echo $val->poi_costname ?><input type="hidden" name="costname[]" value="<?php echo $val->poi_costname ?>"></td>
				                
				                <?php if ($icamt == "true") { ?>
									<td class="text-right"><?php echo number_format($val->poi_amount, 4); ?></td>
				                <td class="text-right"><?php echo number_format($val->poi_vat, 4); ?></td>
				                <td class="text-right"><?php echo number_format($val->poi_netamt, 4); ?></td>

								<?php 
						} else { ?>

								<?php 
						} ?>
				                <td class="text-right"><?php echo number_format($val->poi_qty, 4); ?></td>
				                <td class="text-center"><?php echo $val->poi_priceunit; ?></td>
				                <td class="text-center"><?php echo $val->poi_unit; ?></td>
				              <!--   <td class="text-center"><?php echo number_format($val->poi_qtyic, 4); ?></td>
				                <td class="text-center"><?php echo number_format($val->poi_totqtyic, 4); ?></td>
				                <td class="text-center"><?php echo $val->poi_unitic; ?></td> -->
				                <!-- <td><?php if ($val->poi_receive == "0") {
																													echo $val->poi_qty;
																												} else {
																													echo $val->poi_receive;
																												} ?></td> -->
				                <td id="rece<?php echo $val->poi_id; ?>"><?php if ($val->poi_receive == "0") {
																																																													echo $val->poi_qty;
																																																												} else {
																																																													echo $val->poi_receivetot;
																																																												} ?>
				                <!-- <?php $num = $val->poi_qty - $val->poi_receive;
																								echo $num; ?> -->
				                	<input type="hidden" id="qtylist<?php echo $val->poi_id; ?>" name="qty[]" value="<?php if ($val->poi_receive == "0") {
																																																																																																						echo $val->poi_qty;
																																																																																																					} else {
																																																																																																						echo $val->poi_receive;
																																																																																																					} ?>">
				                </td>
				                <!-- <td id="balance<?php echo $val->poi_id; ?>"><?php if ($val->poi_receive == "0") {
																																																																					echo "0";
																																																																				} else {
																																																																					$num = $val->poi_qty - $val->poi_receive;
																																																																					echo $num;
																																																																				} ?></td> -->
			                    <td>
			                      	<!-- <div id="cc<?php echo $n; ?>"><button type="button" id="refee<?php echo $n; ?>" class="label label-block label-default label-xs" disabled data-toggle="modal" data-target="#modaleditdetail<?php echo $val->poi_id; ?>">รับสินค้า</button></div> -->
									<!-- <a class="label label-block label-warning label-xs" id="delete<?php echo $val->poi_id; ?>">ไม่รับสินค้า</a> -->
									<input type="hidden" id="receinput<?php echo $val->poi_id; ?>" name="receive[]" value="<?php if ($val->poi_receive == "0") {
																																																																																																echo "0";
																																																																																															} else {
																																																																																																$num = $val->poi_qty - $val->poi_receive;
																																																																																																$numrec = $val->poi_qty - $num;
																																																																																																echo $numrec;
																																																																																															} ?>">
				                    <input type="hidden" name="balance[]"  id="balanceinput<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_qty - $val->poi_receive; ?>">
				                    <input type="hidden" name="unit[]" id="unit<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_unit; ?>">
				                    <input type="hidden" name="priceunit[]" id="priceunit<?php echo $val->poi_id; ?>" value="<?php echo ($val->poi_disamt / $val->poi_qty); ?>">
				                    <input type="hidden" name="amount[]" id="amount<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_amount; ?>">
				                    <input type="hidden" name="dis1[]" id="dis1<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_discountper1; ?>">
				                    <input type="hidden" name="dis2[]" id="dis2<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_discountper2; ?>">
				                    <input type="hidden" name="disamt[]" id="disamt<?php echo $val->poi_id; ?>" value="<?php echo ($val->poi_disamt / $val->poi_qty) * $val->poi_qty;; ?>">
				                    <input type="hidden" name="vat[]" id="vat<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_vat; ?>">
				                     <input type="hidden" name="sss[]" id="sss<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_vatper; ?>">
				                    <input type="hidden" name="netamt[]" id="netamt<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_netamt; ?>">
				                    <input type="hidden" name="disex[]" id="disex<?php echo $val->poi_id; ?>" value="<?php echo $val->po_disex; ?>">
				                    <input type="hidden" name="poid[]" id="poid<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_id; ?>">
				                    <input type="hidden" name="cqtyi[]" id="cqtyi<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_qtyic; ?>">
				                    <input type="hidden" name="pqtyi[]" id="pqtyi<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_totqtyic; ?>">
				                    <input type="hidden" name="unitici[]" id="unitic<?php echo $val->poi_id; ?>" value="<?php echo $val->poi_unitic; ?>">
									<input type="text" class="qtyn form-control text-right" name="inputreceipt[]" readonly id="inputreceipt<?php echo $val->poi_id; ?>">
			                   </td>
									<script>
									$(document).on('click', 'a#delete<?php echo $val->poi_id; ?>', function () { // <-- changes
										$(this).closest('tr').remove();
										});
									</script>
			                  <?php 
																			} ?>
			               </tr>
	<script>
	function intOnly(input){
	var regExp = /^\d+(\.\d{1,2})?$/;
	if(!regExp.test(input.val())){
		input.val("") ;
	}
}
	$("#inputreceipt<?php echo $val->poi_id; ?>").keyup(function(){
		intOnly($(this));
	});


var row = ($('#bodytable tr').length-0);
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chki<?php echo $n; ?>").val("Y");
            $("#refee<?php echo $n; ?>").prop("disabled",false);
            $("#cc<?php echo $n; ?>").html('<button type="button" id="refee<?php echo $n; ?>" class="label label-block label-info label-xs" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->poi_id; ?>">รับสินค้า</button>');
            $("#warehouse<?php echo $val->poi_id; ?>").prop("readonly",false);
            var chkk = parseInt($("#chkchk").val());
            var chkkk = parseInt(chkk+1);
            $("#chkchk").val(chkkk);
            $("#inputreceipt<?php echo $val->poi_id; ?>").prop("readonly",false);
             var qttyi = parseInt($("#qtty").val());
            var qttyi = parseInt(qttyi+1);
            $("#qtty").val(qttyi);


        }else{
            $("#chki<?php echo $n; ?>").val("");
            $("#refee<?php echo $n; ?>").prop("disabled",true);
            $("#cc<?php echo $n; ?>").html('<button type="button" id="refee<?php echo $n; ?>" class="label label-block label-default label-xs" disabled data-toggle="modal" data-target="#modaleditdetail<?php echo $val->poi_id; ?>">รับสินค้า</button>');
            $("#warehouse<?php echo $val->poi_id; ?>").prop("readonly",true);
            $("#inputreceipt<?php echo $val->poi_id; ?>").prop("readonly",true);

            var chkk = parseInt($("#chkchk").val());
            var chkkk = parseInt(chkk-1);
            $("#chkchk").val(chkkk);
            var qttyi = parseInt($("#qtty").val());
            var qttyi = parseInt(qttyi-1);
            $("#qtty").val(qttyi);
            $("#inputreceipt<?php echo $val->poi_id; ?>").val("");
            $("#warehouse<?php echo $val->poi_id; ?>").val("");
        }

      });

      $("#warehouse<?php echo $val->poi_id; ?>").change(function(){
      	var chkk = parseInt($("#chkwh").val());
            var chkkk = parseInt(chkk+1);
            $("#chkwh").val(chkkk);
      });
      $("#inputreceipt<?php echo $val->poi_id; ?>").keyup(function(){
      	$("#saveh").prop('disabled',false);
      });

      $("#allreceive").click(function(){
      	if ($("#allreceive").prop("checked")) {
      		$("#inputreceiveall").val("Y");
      		$("#inputreceipt<?php echo $val->poi_id; ?>").val("<?php $num = $val->poi_qty - $val->poi_receive;	echo $num; ?>");
      		$("#inputreceipt<?php echo $val->poi_id; ?>").prop("readonly",false);

      		// $("#rece<?php echo $val->poi_id; ?>").html($("#inputreceipt<?php echo $val->poi_id; ?>").val());
      		// $("#balance<?php echo $val->poi_id; ?>").html("0");
      		// $("#balanceinput<?php echo $val->poi_id; ?>").val("0");
      		// $("#receinput<?php echo $val->poi_id; ?>").val($("#textqty<?php echo $val->poi_id; ?>").val());
      		$("#a<?php echo $n; ?>").prop('checked',true);
      		$("#chki<?php echo $n; ?>").val("Y");
      		 $("#warehouse<?php echo $val->poi_id; ?>").prop("readonly",false);
      		 $("#saveh").prop("disabled",false);
      		 $("#qtty").val(row);
      		 $("#chkchk").val(row);
      		 $("#chkwhrow").val(row);
      		// $("#cc<?php echo $n; ?>").html('<button type="button" id="refee<?php echo $n; ?>" class="label label-block label-info label-xs" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->poi_id; ?>">รับสินค้า</button>');
      	}else{
      		$("#inputreceiveall").val("");
      		$("#inputreceipt<?php echo $val->poi_id; ?>").val("");
      		$("#inputreceipt<?php echo $val->poi_id; ?>").prop("readonly",true);
      		$("#a<?php echo $n; ?>").prop('checked',false);
      		$("#chki<?php echo $n; ?>").val("");
      		$("#warehouse<?php echo $val->poi_id; ?>").prop("readonly",true);
      		$("#warehouse<?php echo $val->poi_id; ?>").val("");
      		$("#saveh").prop("disabled",true);
      		$("#qtty").val(0);
      		$("#chkchk").val(0);
      		$("#chkwhrow").val(0);
      		// $("#cc<?php echo $n; ?>").html('<button type="button" id="refee<?php echo $n; ?>" class="label label-block label-default label-xs" disabled data-toggle="modal" data-target="#modaleditdetail<?php echo $val->poi_id; ?>">รับสินค้า</button>');

      	}
      });
    </script>
					<?php $amounte = $amounte + $val->poi_amount;
				$vate = $vate + $val->poi_vat;
				$netamte = $netamte + $val->poi_netamt;

				$n++;
			} ?>
					<?php if ($icamt == "true") { ?>
							<tr>
								<td colspan="5"></td>
								<td class="text-right"><?php echo number_format($amounte, 4); ?></td>
								<td class="text-right"><?php echo number_format($vate, 4); ?></td>
								<td class="text-right"><?php echo number_format($netamte, 4); ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						<?php 
				} else { ?>
							<tr>
								<td colspan="10"></td>
							</tr>
						<?php 
				} ?>

					</tbody>
				</table>
			</div>
			</div>
				<div class="text-right">
				<br>
				<a href="<?php echo base_url(); ?>inventory/receive_po_list/<?php echo $projcode; ?>/<?php echo $porijectid; ?>/p" id="new" class="btn btn-primary"  name="button"><i class="icon-plus-circle2"></i> New</a>
					 <button type="button" id="print"  class="btn btn-primary" disabled name="button"><i class="icon-printer2"></i> Print</button>
					 <button type="button" id="saveh" class="btn bg-success" disabled name="button"><i class="icon-floppy-disk"></i> Save</button>
					 <a href="<?php echo base_url(); ?>inventory/receive_po_list/<?php echo $projcode; ?>/<?php echo $porijectid; ?>/p" class="preload btn bg-danger" name="button"><i class="icon-close2"></i> Close</a>
					 <input type="hidden" id="qtty" value="0" required>
					 <input type="hidden" id="chkchk" value="0" required>
					 <input type="hidden" id="chkwh" value="0" required>
					 <input type="hidden" id="chkwhrow" value="0" required>
          			<!-- <button type="button" class="print btn btn-success" name="button">พิมพ์</button> -->
				</div>
		</form>
<?php $n = 1;
foreach ($resi as $val2) { ?>
<div class="modal fade" id="modaleditdetail<?php echo $val2->poi_id; ?>" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel"> <?php echo $val2->poi_matname; ?> <?php echo $val2->poi_ref; ?></h4>
            </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    
										<div class="col-md-12">
											<div class="content-group">
												<h5 class="h5qty<?php echo $val2->poi_id; ?> text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> <?php echo $val2->poi_qty; ?></h5>
												<span class="text-muted text-size-small">จำนวนที่สั่งซื้อ</span>
												<input type="hidden" id="textqty<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_qty; ?>">
											</div>
										</div>

										<div class="col-md-12">
											<div class="content-group">
												<h5 class="h5bal<?php echo $val2->poi_id; ?> text-semibold no-margin"><i class="icon-calendar52 position-left text-slate"></i> <?php if ($val2->poi_receive == "0") {
																																																																																																																																											echo $val2->poi_qty;
																																																																																																																																										} else {
																																																																																																																																											$num = $val2->poi_qty - $val2->poi_receive;
																																																																																																																																											echo $num;
																																																																																																																																										} ?></h5>
												<span class="text-muted text-size-small">จำนวนคงค้าง</span>
												<input type="hidden" id="textbal<?php echo $val2->poi_id; ?>" value="<?php if ($val2->poi_receive == "0") {
																																																																																	echo $val2->poi_qty;
																																																																																} else {
																																																																																	$num = $val2->poi_qty - $val2->poi_receive;
																																																																																	echo $num;
																																																																																} ?>">
											</div>
										</div>

										<div class="col-md-12">
											<div class="content-group">
												<h5 class="h5rec<?php echo $val2->poi_id; ?> text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> <?php if ($val2->poi_receive == "0") {
																																																																																																																																						echo "0";
																																																																																																																																					} else {
																																																																																																																																						$num = $val2->poi_qty - $val2->poi_receive;
																																																																																																																																						$numrec = $val2->poi_qty - $num;
																																																																																																																																						echo $numrec;
																																																																																																																																					} ?></h5>
												<span class="text-muted text-size-small">จำนวนที่รับแล้ว</span>
												<input type="hidden" id="textrecevi<?php echo $val2->poi_id; ?>" value="<?php if ($val2->poi_receive == "0") {
																																																																																				echo "0";
																																																																																			} else {
																																																																																				$num = $val2->poi_qty - $val2->poi_receive;
																																																																																				$numrec = $val2->poi_qty - $num;
																																																																																				echo $numrec;
																																																																																			} ?>">
											</div>
										</div>
                    <!--  -->
                  </div>
                   <div class="col-md-6">
                        <strong><p>QTY Balance</p></strong>
                        <input type="number" class="on form-control input-sm" id="remark<?php echo $val2->poi_id; ?>" value="">
                        <input type="hidden" id="id<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_id; ?>">
                        <input type="hidden" id="ref<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_ref; ?>">
                        <input type="hidden" id="pqty<?php echo $val2->poi_id; ?>" value="<?php echo $val2->poi_qty; ?>">
                        <button id="sitem<?php echo $val2->poi_id; ?>" class="btnsend btn btn-primary btn-xs" style="margin-top:10px;">Get Products</button>
                    </div>
                </div>
              </div>
               <div class="modal-footer">
                  <button type="button" class="btnclose btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
          </div>
        </div>
      </div>

      <!-- modal  modal warehouse-->
 <div class="modal fade" id="addwareh" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Warehouse</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="addwarehosue">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
    <script>
       $("#inputreceipt<?php echo $val2->poi_id; ?>").keyup(function() {
       	if (<?php echo $val2->poi_receivetot; ?> ==0) {
       		 if (<?php echo $val2->poi_qty; ?>< $('#inputreceipt<?php echo $val2->poi_id; ?>').val())
      			{
	      	swal({
		      title: "Over QTY!!.",
		      text: "",
		      confirmButtonColor: "#EA1923",
		      type: "error"
	  		});
	        $("#inputreceipt<?php echo $val2->poi_id; ?>").val(0);
	       	$(".h5bal<?php echo $val2->poi_id; ?>").text(<?php if ($val2->poi_receive == "0") {
																																																						echo $val2->poi_qty;
																																																					} else {
																																																						$num = $val2->poi_qty - $val2->poi_receive;
																																																						echo $num;
																																																					} ?>);
	       	$(".h5rec<?php echo $val2->poi_id; ?>").text(<?php if ($val2->poi_receive == "0") {
																																																						echo "0";
																																																					} else {
																																																						$num = $val2->poi_qty - $val2->poi_receive;
																																																						$numrec = $val2->poi_qty - $num;
																																																						echo $numrec;
																																																					} ?>);
      		}
       	}else {
       		 if (<?php echo $val2->poi_receivetot; ?>< $('#inputreceipt<?php echo $val2->poi_id; ?>').val())
      			{
	      	swal({
		      title: "Over QTY!!.",
		      text: "",
		      confirmButtonColor: "#EA1923",
		      type: "error"
	  		});
	        $("#inputreceipt<?php echo $val2->poi_id; ?>").val(0);
	       	$(".h5bal<?php echo $val2->poi_id; ?>").text(<?php if ($val2->poi_receive == "0") {
																																																						echo $val2->poi_qty;
																																																					} else {
																																																						$num = $val2->poi_qty - $val2->poi_receive;
																																																						echo $num;
																																																					} ?>);
	       	$(".h5rec<?php echo $val2->poi_id; ?>").text(<?php if ($val2->poi_receive == "0") {
																																																						echo "0";
																																																					} else {
																																																						$num = $val2->poi_qty - $val2->poi_receive;
																																																						$numrec = $val2->poi_qty - $num;
																																																						echo $numrec;
																																																					} ?>);
      		}
       	}

       });
  $("#sitem<?php echo $val2->poi_id; ?>").click(function(){
  	if ($("#remark<?php echo $val2->poi_id; ?>").val()=="") {
  		$("#receinput<?php echo $val->poi_id; ?>").val($("textrecevi<?php echo $val->poi_id; ?>").val());
  		$("#rece<?php echo $val2->poi_id; ?>").text($("textrecevi<?php echo $val2->poi_id; ?>").val());
  		$("#balanceinput<?php echo $val2->poi_id; ?>").val($("#textbal<?php echo $val2->poi_id; ?>").val());
		$("#balance<?php echo $val2->poi_id; ?>").text($("#textbal<?php echo $val2->poi_id; ?>").val());

		if($("#qtty").val(inputmodal)!=""){
			$("#saveh").prop("disabled",false);
		}
		$("#saveh").prop("disabled",true);
		$('#modaleditdetail<?php echo $val2->poi_id; ?>').modal('toggle');
  	}else if (<?php echo $val2->poi_receive; ?>=="0") {
      if (<?php echo $val2->poi_qty; ?>< $('#remark<?php echo $val2->poi_id; ?>').val())
      {
        alert('Over QTY');
      }else if($('#remark<?php echo $val2->poi_id; ?>').val()=="0"){
      	$("#balance<?php echo $val2->poi_id; ?>").text("0");
      	$('#modaleditdetail<?php echo $val2->poi_id; ?>').modal('toggle');
      }else
      {

      	var qty = parseInt($("#pqty<?php echo $val2->poi_id; ?>").val());
      	var inputmodal = parseInt($("#remark<?php echo $val2->poi_id; ?>").val());
      	var tot = parseInt(qty-inputmodal);
      	$("#receinput<?php echo $val2->poi_id; ?>").val(inputmodal);
      	$("#balanceinput<?php echo $val2->poi_id; ?>").val(tot);
      	$("#rece<?php echo $val2->poi_id; ?>").text(inputmodal);
      	$("#balance<?php echo $val2->poi_id; ?>").text(tot);
				$("#inputreceipt<?php echo $val2->poi_id ?>").val(inputmodal);
				if($("#qtty").val(inputmodal)!=""){
			$("#saveh").prop("disabled",false);
		}
      	$('#modaleditdetail<?php echo $val2->poi_id; ?>').modal('toggle');

      }
    }
    else
    {
     if((<?php echo $val2->poi_qty; ?>-<?php echo $val2->poi_receive; ?>)<$('#remark<?php echo $val2->poi_id; ?>').val())
     {
      alert('Over QTY');
      }
      else
      {

      	var inputmodal = parseInt($("#remark<?php echo $val2->poi_id; ?>").val());
      	var balance = parseInt($("#balanceinput<?php echo $val2->poi_id; ?>").val());
      	var receive = parseInt($("#receinput<?php echo $val2->poi_id; ?>").val());
      	var tot = parseInt(balance-inputmodal);
      	var receivettot = parseInt(receive+inputmodal);
      	$("#receinput<?php echo $val2->poi_id; ?>").val(receivettot);
      	$("#balanceinput<?php echo $val2->poi_id; ?>").val(tot);
      	$("#rece<?php echo $val2->poi_id; ?>").text(receivettot);
      	$("#balance<?php echo $val2->poi_id; ?>").text(tot);
				$("#inputreceipt<?php echo $val2->poi_id ?>").val(inputmodal);
				if($("#qtty").val(inputmodal)!=""){
			$("#saveh").prop("disabled",false);
		}
      	$('#modaleditdetail<?php echo $val2->poi_id; ?>').modal('toggle');
     }
    }
  });
  </script>



  <?php $n++;
} ?>

						</div>
</div>
<!-- / col-md-8 -->
					</div>
					<!-- /highlighting rows and columns -->
				</div>
				<!-- /content area -->
</div>
<script>

	$(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });
    function myFunction() {
    var option_value = document.getElementById("warehouse").value;
    if (option_value == "999") {
        $('#addwareh').modal('show');
        $("#addwarehosue").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
       $("#addwarehosue").load('<?php echo base_url(); ?>setup_wh/loadwarehouse/'+$("#projectid").val());
    }
}

      $("#flag").click(function(){
        if ($("#flag").prop("checked")) {
            $("#inputflag").val("Y");
        }else{
            $("#inputflag").val("");
        }

      });
    </script>



 <script>
var row = ($('#bodytable tr').length-0);

$("#saveh").click(function(e){
	var taxno = $('#taxno').val();
	var docode = $('#docode').val();
	var taxdate = $('#taxdate').val();
	var duedate = $('#duedate').val();
	if ($("#txtontime").val()=="") {
	  swal({
	      title: "Please Select Service Evaluation !!.",
	      text: "",
	      confirmButtonColor: "#EA1923",
	      type: "error"
	  });
	}else if($('#bodytable tr').length == 0){
	  swal({
	      title: "No filer Material !!.",
	      text: "",
	      confirmButtonColor: "#EA1923",
	      type: "error"
	  });
	}else if ($("#txtGood").val()=="") {
	  swal({
	      title: "Please Select Service Evaluation !!.",
	      text: "",
	      confirmButtonColor: "#EA1923",
	      type: "error"
	  });
	}else if ($("#txtcomplete").val()=="") {
	  swal({
	      title: "Please Select Quality Evaluation !!.",
	      text: "",
	      confirmButtonColor: "#EA1923",
	      type: "error"
	  });
	}else if ($("#txtstanddard").val()=="") {
	  swal({
	      title: "Please Select Quality Evaluation !!.",
	      text: "",
	      confirmButtonColor: "#EA1923",
	      type: "error"
	  });
	// }else if (taxno =="" && taxdate!="") {
	//   swal({
	//       title: "Please Fill  Invoic No. OR Invoice Date !!.",
	//       text: "",
	//       confirmButtonColor: "#EA1923",
	//       type: "error"
	//   });
	// }else if (taxno !="" && taxdate=="") {		 
	// 		swal({
	// 	      title: "Please Fill  Invoic No. OR Invoice Date !!.",
	// 	      text: "",
	// 	      confirmButtonColor: "#EA1923",
	// 	      type: "error"
	// 	      });		
	// }
	// else if (taxno =="" && taxdate=="") {		 
	// 		swal({
	// 	      title: "Please Fill  Invoic No. OR Invoice Date !!.",
	// 	      text: "",
	// 	      confirmButtonColor: "#EA1923",
	// 	      type: "error"
	// 	      });		
	}else if(docode !="" && duedate==""){
		swal({
		      title: "Please Fill Delivery No. OR Delivery Date !!.",
		      text: "",
		      confirmButtonColor: "#EA1923",
		      type: "error"
		      });
	}else if(docode =="" && duedate!=""){
		swal({
		      title: "Please Fill Delivery No. OR Delivery Date !!.",
		      text: "",
		      confirmButtonColor: "#EA1923",
		      type: "error"
		      });
	}else if ($("#qtty").val()==0) {
	swal({
         title: "Receive  not found!",
         // text: "danger",
         confirmButtonColor: "#FF0000",
         // type: "success"
   	});
   	}else if ($(".qtyn").val()==0) {
	swal({
         title: "Receive  not found!",
         // text: "danger",
         confirmButtonColor: "#FF0000",
         // type: "success"
   	});
	}else{
		$('.qtyn').attr('readonly',true);
					var frm = $('#savepost');
				    frm.submit(function (ev) {
				    	// $(".page-container").html('<div class="loading">Loading&#8230;</div>');
				        $.ajax({
				            type: frm.attr('method'),
				            url: frm.attr('action'),
				            data: frm.serialize(),
				            				success: function (data) {
												swal({
											            title: data,
											            text: "Save Completed!!.",
											            // confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
												// setTimeout(function() {
												// 	location.reload();
												// },1500);
												$("#poreccode").val($.trim(data));
												$("#saveh").hide();
												$("#taxno").prop("readonly",true);
												$("#docode").prop("readonly",true);
												$("#allreceive").prop("disabled",true);
												$("#flag").prop("disabled",true);
												$("#Ontime").prop("disabled",true);
												$("#Late").prop("disabled",true);
												$("#Good").prop("disabled",true);
												$("#Fail").prop("disabled",true);
												$("#matrd1").prop("disabled",true);
												$("#matrd2").prop("disabled",true);
												$("#matrd3").prop("disabled",true);
												$("#matrd4").prop("disabled",true);

												<?php for ($i = 0; $i < 20; $i++) { ?>
												$("#a<?php echo $i; ?>").prop('disabled',true);
												<?php 
										} ?>
												$("#print").prop("disabled",false);
												 $("#print").click(function(){
													 setTimeout(function() {
															// window.location.href = "<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=receipt.mrt&doccode="+data+"&compcode=<?=$compcode;?>"
															window.location.href = "<?php echo base_url(); ?>report/viewerload?type=ic&typ=receipt&var1="+$.trim(data)+"&var2=<?=$compcode;?>"
													}, 500);
												});
				            }
				        });
				        ev.preventDefault();

				    });




	 $("#savepost").submit(); //Submit  the FORM
    }
});
    </script>
