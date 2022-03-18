<?php 
foreach ($he as $hee) {
	$ap_code = $hee->ap_code;
  $ap_wtcode = $hee->ap_wtcode;
	$ap_vender = $hee->ap_vender;
	$vender_name = $hee->vender_name;
	$ap_refno = $hee->ap_refno;
	$ap_refdate = $hee->ap_refdate;
	$ap_bank_id = $hee->ap_bank_id;
	$bank_name = $hee->bank_name;
	$ap_typecheq = $hee->ap_typecheq;
	$ap_trac = $hee->ap_trac;
	$ap_chno = $hee->ap_chno;
	$ap_chnodate = $hee->ap_chnodate;
	$ap_remark = $hee->ap_remark;
	
}
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
 ?>
 
<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Approve Payment Cheque </h6>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
          </div>
            <div class="panel-body">  
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-2">
                    <label for="">Vender Code :</label>
                    <input type="hidden" value="<?php echo $ap_code; ?>" name="app_code">
                    <input type="text" id="vendor_id" name="vendor_id" class="form-control" value="<?php echo $ap_vender; ?>" readonly="true">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="">Vender Name :</label>
                    <input type="text" id="namevender" name="namevender" class="form-control" value="<?php echo $vender_name; ?>" readonly="true">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Ref. No:</label>
                    <input type="text" id="refno" name="refno" class="form-control " value="<?php echo $ap_refno; ?>" readonly="true">
                  </div>  
                  <div class="form-group col-sm-3">
                    <label for="">Ref. Date:</label>
                    <input type="text" id="refdate" value="<?php echo $ap_refdate; ?>" name="refdate" class="form-control" readonly="true">
                  </div>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-2">
                    <label for="">Bank Code :</label>
                    <input type="text" id="bank_id" value="<?php echo $ap_bank_id; ?>" name="bank_id" class="form-control" readonly="true">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="">Bank Name :</label>
                      <input type="text" id="bankname" name="bankname" class="form-control" readonly="true" value="<?php echo $bank_name; ?>">
                  </div>
                  <div class="form-group col-sm-2">
                    <div class="checkbox checkbox-switchery switchery-xs">
                      <label class="display-block">
                      <input type="hidden" value="<?php echo $ap_typecheq ?>" id="type" >
                      <?php if ($ap_typecheq == 1) {
                      	?>
                      	<input type="radio" checked> Cheque<br>
                      	<input type="radio"> Transfer bank<br>
                      	<input type="radio"> Cheque Direc
                     <?php }
                     elseif ($ap_typecheq == 2) {
                      	?>
                      	<input type="radio"> Cheque<br>
                      	<input type="radio" checked> Transfer bank<br>
                      	<input type="radio"> Cheque Direc
                  	<?php  } 
                  		elseif ($ap_typecheq == 3) {
                      	?>
                      	<input type="radio"> Cheque<br>
                      	<input type="radio"> Transfer bank<br>
                        <input type="radio" checked> Cheque Direc
                    <?php  } ?>  
                      </label>
                    </div>
                  </div>
                  <div id="whtaxchk">
                  <div class="col-xs-3">
                      <div class="form-group">
                        <label for=""> TR A/C</label>
                        <input type="text" class="form-control input-sm" value="<?php echo $ap_trac ?>" readonly="true">
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-2">
                    <label for="">Cheque No. :</label>
                    <input type="text" id="chno" name="chno" class="form-control" value="<?php echo $ap_chno ?>" readonly="true">
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="">Chq. Date:</label>
                      <input type="text" value="<?php echo $ap_chnodate ?>" class="form-control daterange-single" readonly="true">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="">Remark :</label>
                    <input type="text" value="<?php echo $ap_remark ?>" class="form-control" readonly="true">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">AP No :</label>
                    <input type="text" value="<?php echo $ap_code; ?>" class="form-control" readonly="true">
                    <input type="hidden" value="<?php echo $ap_wtcode; ?>" class="form-control" readonly="true">
                  </div>                
                </div>
              </div>
              <br>

              <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                  <li class="active"><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>AP</a></li>
                </ul>
              </div>

              <div class="row">
                <div class="table-responsive" id="invoicedown">
                  <table class="table table-hover table-bordered table-striped table-xxs">
                      <thead>
                        <tr>
                          <th width="10%">AP No</th>
                          <th width="10%">Duedate</th>
                          <th width="10%">PO/WO No.</th>
                          <th width="10%">Tax/Inv No.</th>
                          <th width="10%">Paid Net Amount</th>
                          <th width="10%">Less Other</th>
                          <th width="10%">Amount</th>
                          <th width="10%">Advance Amount</th>
                          <th width="10%">Vat Amount</th>
                          <th width="10%">W/T Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php foreach ($de as $dee) {	?>
                      	<tr>
                      		<td><?php echo $dee->api_no; ?></td>
                      		<td><?php echo $dee->api_duedate; ?></td>
                      		<td><?php echo $dee->api_pono; ?></td>
                      		<td><?php echo $dee->api_inv; ?></td>
                      		<td><?php echo $dee->api_netamt; ?></td>
                      		<td></td>
                      		<td><?php echo $dee->api_amt; ?></td>
                      		<td><?php echo $dee->api_adv; ?></td>
                      		<td><?php echo $dee->api_vatamt; ?></td>
                      		<td><?php echo $dee->api_wtamt; ?></td>
                      	<?php } ?>
                      	</tr>
                      </tbody>
                  </table>
                </div>
              </div> 
              <br>
              <div class="text-right">
              	<a class="btn bg-teal-400" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_approve_report.mrt&code=<?php echo $ap_code; ?>&compcode=<?php echo $compcode;?>" target="_blank">Print Cheque</a>

              	<a class="btn btn-warning" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cheque_report.mrt&code=<?php echo $ap_code; ?>&compcode=<?php echo $compcode;?>" target="_blank">Print Voucher</a>

              	<a class="btn btn-success" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_wt.mrt&code=<?php echo $ap_code; ?>&compcode=<?php echo $compcode;?>" target="_blank">Print WT</a>

                <a href="<?php echo base_url(); ?>ap/apv_approve"  class="btn btn-info"><i class="icon-plus22"></i>New</a>
                <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
              </div>   
            </div>                   
        </div>
      </div>
    </div>
  </div>
</div> 

<script>
var wh = ($("#type").val());
if (wh == 2) {
  $("#whtaxchk").show();  
}
if (wh == 1) {
	$("#whtaxchk").hide();
}
if (wh == 3) {
	$("#whtaxchk").hide();
}

</script>

    <!-- /core JS files -->
<script>
  $.extend( $.fn.dataTable.defaults, {  
   
    drawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
 });

</script>
