<style>
	.containerbox {
	     /*position: absolute;*/
	     z-index: 1;
	     top: 0;
	     left: 0;
	     width: 100%;
	     height: 100%;
	     overflow: auto;
	     background: url('<?php echo base_url();?>assets/images/bgsc_glayunder.png') top center no-repeat;

	}
  .control-label{
    margin-top: 5px;
  }
</style>
<div class="content-wrapper containerbox">
	<!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ</h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="ap_main"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li>ระบบจัดการบัญชีเจ้าหนี้</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content">
      <form action="<?php echo base_url(); ?>aps_active/addaps" method="post">
			<fieldset>
			<div class="row">
				<div class="panel panel-default border-grey">
                    <div class="panel-heading">
                        <h6 class="panel-title"> Account Payable SubContractor (APS)</h6>
                            <div class="heading-elements">
                            </div>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>


                    <div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
								<button type="button" class="loi btn btn-primary btn-xs" data-toggle="modal" data-target="#selectloi"><i class="icon-stackoverflow"></i> LOI SELECT</button>
    							</div>
							</div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Period:</label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control input-sm" name="period" id="period" readonly>
                      </div>
                </div>
              </div>
               <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">APS Date:</label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control input-sm  daterange-single" name="apsdate" id="apsdate" readonly>
                      </div>
                </div>
              </div>
						</div>
						<div class="row control-label">
							<div class="col-md-3">
								<div class="form-group">
    								<label class="col-lg-4 control-label">APS No.:</label>
	    							<div class="col-lg-8">
	    								<input type="text" class="form-control input-sm" name="apsno" readonly>
	                          		</div>
    							</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
    								<label class="col-lg-4 control-label">LOI No. :</label>
	    							<div class="col-lg-8">
	    								<input type="text" class="form-control input-sm" name="loino" id="loino" readonly>
	                          		</div>
    							</div>
							</div>
              <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Contractor: </label>
                    <div class="col-lg-10" >
                    <input type="text" class="form-control input-sm" name="subconname" id="subconname" readonly>
                      <input type="hidden" class="form-control input-sm" name="subcon" id="subcon" readonly>
                    </div>
                  </div>
              </div>
						</div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Project :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="projname" id="projname" readonly>
                      <input type="hidden" class="form-control input-sm" name="projid" id="projid" readonly>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">System :</label>
                    <div class="col-lg-8">
                       <select class="form-control" name="apssystem" id="apssystem">
                          <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                          <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                          <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                          <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                          <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
                        </select>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
               <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Department :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="depname" id="depname" readonly>
                      <input type="hidden" class="form-control input-sm" name="depid" id="depid" readonly>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Invoice No :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="invno" id="invno" placeholder="Please input Invoice No." required="">
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Invoice Date:</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" class="form-control input-sm daterange-single" name="invdate" id="invdate" placeholder="">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Period Amount</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm text-right" name="amt" id="amt" readonly>
                        <input type="hidden" class="form-control input-sm text-right" name="amth" id="amth" readonly>
                        <span class="input-group-addon bg-success" id="perc">100%</span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Contact Amount</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm text-right" name="camt" id="camt" readonly>
                        <span class="input-group-addon bg-success" id="perc">100%</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">VAT:</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm text-right" name="vat" id="vat" value="0" placeholder="Please input VAT.">
                        <span class="input-group-addon">%</span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">VAT Amt:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm text-right" value="0.00" name="invamt" id="invamt">
											<input type="hidden" class="form-control input-sm text-right" value="0.00" name="invamth" id="invamth">
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">W/T:</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <select class="form-control input-sm" name="wt" id="wt">
                            <option value="1">ไม่มีหัก</option>
                            <option value="2">ค่าบริการ 3%</option>
                            <option value="3">ค่าขนส่ง 1%</option>
                            <option value="4">ค่าเช่า 5%</option>
                            <option value="5">ค่าโฆษณา 2%</option>
                            <option value="6">ดอกเบี้ยจ่าย 15%</option>
                            <option value="7">ค่าจ้างเหมา 3%</option>
                            <option value="8">เงินชดเชย 3%</option>
                            <option value="9">ค่าจ้างแรงงาน 3%</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">W/T Amt:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm text-right" name="wtamt" value="0.00" id="wtamt">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Retention:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="retenrion" id="retenrion">
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Net Amount:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm text-right" name="netamt" value="0.00" id="netamt">
                      <input type="hidden" class="form-control input-sm text-right" name="netamth" value="0.00" id="netamth">
                      <input type="hidden" class="form-control input-sm text-right" name="netamteh" id="netamteh">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Remark:</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" name="remark" id="remark" cols="30" rows="3"></textarea>
                    </div>
                  </div>
              </div>
            </div><br>
               <div class="form-group">
                     <legend class="text-muted">&nbsp;&nbsp; Detail</legend>

                    </div>

                    <div class="container">

  <ul class="nav nav-tabs nav-tabs-highlight">
  <li><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>  GL</a></li>
    <li class="active"><a data-toggle="tab" href="#home"><i class=" icon-wrench position-left"></i>Material</a></li>
    
  </ul>

  <div class="tab-content">
   <div id="menu1" class="tab-pane fade">
   <div class="row" id="glacc">
    <table class="table table-hover table-xxs ">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-center" width="5%"></th>
                      <th class="text-center">Account Code</th>
                      <th class="text-center">Account Name</th>
                      <th class="text-center">Cost Code</th>
                      <th class="text-center">Material</th>
                      <th class="text-center">Dr</th>
                      <th class="text-center">Cr</th>
                    </tr>
                  </thead>
             <tbody >
                  <?php for ($i=1; $i < 6; $i++) { ?>
                    <tr>

                        <td><?php echo $i; ?></td>
                        <td><input type="text" class="form-control input-sm"></td>
                        <td><input type="text" class="form-control input-sm"></td>
                        <td><input type="number" class="form-control input-sm"></td>
                        <td><input type="number" class="form-control input-sm"></td>
                        <td><input type="text" class="form-control input-sm"></td>
                        <td><input type="text" class="form-control input-sm"></td>
                        <td><input type="number" class="form-control input-sm"></td>
            

                    </tr>
                     <?php } ?>
                  </tbody>
                </table>
    </div>
    </div>


    <div id="home" class="tab-pane fade in active">
                   <div class="row" id="table">
                     <div id="table table-responsive">
                      <table class="table table-bordered table-striped table-hover table-xxs">
                        <thead>
                          <tr>
                        <th class="text-center" width="5%">No.</th>
                    <th class="text-center" width="15%">รหัสสินค้า</th>
                    <th class="text-center" width="20%">ชื่อสินค้า</th>
                    <th class="text-center" width="10%">ปริมาณ</th>
                    <th class="text-center" width="15%">หน่วย</th>
                   
                    <th class="text-center" width="15%">จำนวนเงิน </th>
                          </tr>
                        </thead>


                        <tbody id="tbody">
                          <!-- <tr id="nodata">
                            <td colspan="6" class="text-center">No Data</td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                    </div>
    </div>
   
  </div>
</div>
     
                    </div>
                 
                    <br>

                    <div class="modal-footer">
                        <div class="form-group">
    
                          <button type="submit" class="bsave btn btn-primary btn-xs" disabled><i class="icon-floppy-disk position-left"></i> Save</button>
                          <a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
                        </div>
                    </div>
                </div>
			</div>
			</fieldset>
      </form>
         	<!-- Footer -->
        	<div class="footer text-muted">
          		© 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
        	</div>
        	<!-- /footer -->
        </div>
</div>

<!-- Full width modal -->
         <div id="selectloi" class="modal fade">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Select LOI</h5>
               </div>
               <div class="modal-body">
                  <div id="tab">

                  </div>
               </div>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
             </div>
           </div>
         </div>
         <!-- /full width modal -->
        
        
    
 <script>
 	$(".loi").click(function(){
  	$('#tab').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  	$('#tab').load('<?php echo base_url(); ?>ap/load_modal_loi');

});
 </script>

 <script>
 	$("#vat").keyup(function(event) {
 		var amt = $("#amth").val();
 		var vat = $("#vat").val();
 		var vattot = amt*vat/100;
 		var tt = vattot.toFixed(2);
 		$("#invamt").val(formatNumber(tt)) || 0;
		$("#invamth").val('tt') || 0;
    var netamt = amt-vattot;
    var nattot = netamt.toFixed(2);
    $("#netamt").val(formatNumber(nattot))||0;
    $("#netamth").val(nattot)||0;
    $("#netamteh").val(netamt);
 	});
 	$("#wt").change(function(event) {
 		if ($("#wt").val()==1) {
      var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 0;
      var wttot = nt*wt/100;
      var jj = netamt-wttot;
 			$("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);

 		}else if($("#wt").val()==2){
      var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

 			var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
$("#netamth").val(jj)||0;
    $("#netamteh").val(jj);


 		}else if($("#wt").val()==3){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 1;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
 		}else if($("#wt").val()==4){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 5;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
 		}else if($("#wt").val()==5){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 2;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
 		}else if($("#wt").val()==6){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 15;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
 		}else if($("#wt").val()==7){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
 		}else if($("#wt").val()==8){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
 		}else if($("#wt").val()==9){
 			 var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
 		}

 	});

 </script>
