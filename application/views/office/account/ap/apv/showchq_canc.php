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
 ?>
<div class="content-wrapper">
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
        <li>Approve Payment </li>
      </ul>
    </div>
  </div>    

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat border-top-lg border-top-success">
          <div class="panel-heading">
            <h6 class="panel-title">Approve Payment Cheque </h6>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
          </div>
            <div class="panel-body"> 
            <form id="fapv" action="<?php echo base_url(); ?>ap_cheque/chq_cancle2" method="post"> 
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-2">
                    <label for="">Vender :</label>
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
                    <label for="">Bank :</label>
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
                  
                  <div class="form-group col-sm-2">
                    <label for="">Cheque No. :</label>
                    <input type="text" id="chno" name="ch_no" id="ch_no<?php echo $ap_code;?>" class="form-control"  >
                    <input type="hidden" id="chno" name="canc_no" id="canc_no<?php echo $ap_code;?>" class="form-control" value="<?php echo $ap_chno ?>" >
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="">Chq. Date:</label>
                      <input type="date" value="" name="ch_date" id="ch_date<?php echo $ap_code;?>" class="form-control daterange-single" >
                      <input type="hidden" name="canc_date" id="canc_date<?php echo $ap_code;?>" value="<?php echo $ap_chnodate ?>" class="form-control daterange-single" >
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
                    <input type="text" name="code" id="code<?php echo $ap_code; ?>" value="<?php echo $ap_code; ?>" class="form-control" readonly="true">
                    <input type="hidden"  value="<?php echo $ap_wtcode; ?>" class="form-control" readonly="true">
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
                          <th width="10%">AP/No</th>
                          <th width="10%">Duedate</th>
                          <th width="10%">PO/WO No.</th>
                          <th width="10%">Tax/Inv No.</th>
                          <th width="10%">Paid Net Amount</th>
                          <th width="10%">Less Other</th>
                          <th width="10%">Amount</th>
                          <th width="10%">Advance</th>
                          <th width="10%">Vat</th>
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
              	<button type="submit" class="btn btn-success" id="savepv"><i class="icon-box-add" ></i> Save </button>

                <a href="<?php echo base_url(); ?>ap/apv_approve"  class="btn btn-default btn-xs"><i class="icon-plus22"></i>New</a>
                <a href="#" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
              </div>   
            </div>                   
        </div>
      </div>
    </div>
  </div>
</div> 




<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/internationalization/i18next.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/internationalization_switch_direct.js"></script>


