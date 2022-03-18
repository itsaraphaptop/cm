<?php 


foreach ($he as $key) {
  $apv_code = $key->apv_code;
  $apv_pono = $key->apv_pono;
  $apv_duedate = $key->apv_duedate;
  $taxno = $key->apv_inv;
  $apv_crterm = $key->apv_crterm;
  $pro_name = $key->project_name;
  $pro_code = $key->apv_project;
  $apv_netamt = $key->apv_netamt;
  $apv_vat = $key->apv_vat;
  $apv_vatper = $key->apv_vatper;
  $apv_wt = $key->apv_wt;
  $apv_lessadv = $key->apv_lessadv;
  $apv_totamt = $key->apv_totamt;
  $apv_department = $key->apv_department;
  $dep_name = $key->department_title;
  $dep_id = $key->department_id;
  $apv_date = $key->apv_date;
  $system_code = $key->apv_system;
  $system_name = $key->systemname;
  $ven_code = $key->apv_vender;
  $ven_name = $key->vender_name;
  $apv_dascr = $key->apv_dascr;
  $ic_code = $key->apv_do;
  $apv_lessret = $key->apv_lessret;
  $apv_date = $key->apv_date;
  $apv_glyear= $key->apv_glyear;
  $apv_glperiod = $key->apv_glperiod;
  $apv_icdate = $key->apv_icdate;
}

 ?>


<div class="content-wrapper">
  <div class="content">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h6 class="panel-title">Account Apayable (APV)</h6>
    </div>
    <div class="panel-body">
      <form id="fapv" action="<?php echo base_url(); ?>ap_active/editapv/<?php echo $code; ?>" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">Vender Name</label>             
              <input type="text" class="form-control" value="<?php echo $ven_name; ?>" readonly="true" placeholder="Vender Name" id="vender" name="vender">
              <input type="hidden" class="form-control" value="<?php echo $ven_code; ?>" readonly="true" placeholder="Vender Name" id="venderid" name="venderid">
              <input type="hidden" class="form-control" value="<?php echo $apv_icdate; ?>" id="icdate"  name="icdate">
      
            </div>
            <div class="col-md-3">              
                <label for="">P/O No.</label>
                <input type="text" readonly="true" class="form-control" id="user" value="<?php echo $apv_pono; ?>">              
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Description .</label>
                <input type="text" class="form-control" readonly="true" value="<?php echo $apv_dascr; ?>" placeholder="Description " id="dascr" name="dascr">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="">TAX Invoice No.</label>
              <input type="text" class="form-control" value="<?php echo $taxno; ?>" id="taxno" readonly="" placeholder="Tax No" name="taxno">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">Due Date:</label>
              <!-- <div class="input-group"> -->
                <!-- <span class="input-group-addon"><i class="icon-calendar22"></i></span> -->
                <input type="date" class="form-control" placeholder="Due Date" id="duedate" name="duedate" readonly="true" value="<?php echo $apv_duedate; ?>">
              <!-- </div> -->
            </div>
            <div class="col-md-3">
              <label for="">Credit Term</label>              
                <input type="text" value="<?php echo $apv_crterm; ?>" class="form-control" id="crterm" placeholder="Credit Term" name="crterm">   
            </div>
            <div class="col-md-3">
              <label for="">Project Name</label>
              <input type="text" value="<?php echo $pro_name; ?>" class="form-control" readonly="true" placeholder="Project Name" id="projectname" name="projectname">
              <input type="hidden" value="<?php echo $pro_code; ?>" class="form-control" readonly="true" id="projectid" name="projectid">
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>System Type</label>
                <input type="text" class="form-control" value="<?php echo $system_name; ?>" readonly="true" placeholder="System Type" id="system" name="system">
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Receive No.</label>
                <input type="text" class="form-control" readonly="true" value="<?php echo $ic_code; ?>" placeholder="Receive No." id="porecx" name="porecx">
              </div>
            </div>
            <div class="col-md-3">
              <label for="">Department Name</label>
              <input type="text" value="<?php echo $dep_name; ?>" class="form-control" readonly="true" placeholder="Department Name" id="departname" name="departname">
              <input type="hidden" value="<?php echo $apv_department; ?>" class="form-control" readonly="true" id="departid" name="departid">
            </div>
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
              <label for="qty">Less Advance</label>
              <input type="text" id="lessadv" value="<?php echo $apv_lessadv; ?>" name="lessadv" class="form-control" readonly="true" >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
              <label for="qty">Less Retention</label>
              <input type="text" id="lessret" value="<?php echo $apv_lessret; ?>" name="lessret" class="form-control" readonly="true">
              </div>
            </div>
          </div>
        </div>        
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
                <label for="qty">Amount</label>
                <input type="text" id="amount" readonly="true" name="qty" value="<?php echo number_format($apv_netamt); ?>"  placeholder="Amount" class="form-control  text-right" >
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label for="price_unit">Vat %</label>
                 <input type="text" id="pprice_unit" readonly="true" maxlength="1" value="<?php echo $apv_vatper; ?>"  name="price_unit" placeholder="Vat %" class="form-control text-right"  >
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="amount">Vat Amount</label>
                <input type="text" id="pamount"  readonly="true" name="pamount" placeholder="Vat Amount" class="form-control  text-right" value="<?php echo number_format($apv_vat,2); ?>">

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
                <label for="qty">Net Amount</label>
                <input type="text" id="amt" name="amt" class="form-control  text-right" value="<?php echo number_format($apv_totamt); ?>" readonly="true">
              </div>
            </div>
            <!-- <div class="form-group col-sm-3">
              <label for="">Data Type :</label>
              <select name="datatype" id="datatype" class="form-control">
                <option value="Normal">Normal</option>
              </select>
            </div>       -->
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">          
            <div class="form-group col-sm-2">
              <label for="">AP Date :</label>
              <input type="date" id="vchdate" value="<?php echo $apv_date; ?>" name="vchdate" class="form-control">
            </div>
            <div class="form-group col-sm-2">
              <label for="">Year :</label>
              <input type="text" id="glyear" name="glyear" value="<?php echo $apv_glyear; ?>" class="form-control" readonly="true" >
            </div>
            <div class="form-group col-sm-2">
              <label for="">Period :</label>
              <input type="text" id="glperiod" name="glperiod" value="<?php echo $apv_glperiod; ?>" class="form-control" readonly="true">
            </div>          
          </div>
        </div>
        <br>
        <div class="tabbable">
          <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
            <li class=""><a href="#panel-pill2" data-toggle="tab" aria-expanded="false"><i class=" icon-wrench position-left"></i> Material</a></li>
            <li class=""><a href="#panel-pill3" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> TAX</a></li>
           
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane has-padding active" id="panel-pill1">
            <div id="www" class="table-responsive">
              <table class="table table-hover table-xxs ">
                <thead>
                  <tr>
                    <th width="10%">No.</th>
                    <th width="10%">Account Code</th>
                    <th width="20%">Account Name</th>
                    <th width="10%">Cost Code</th>
                    <th width="10%">Dr</th>
                    <th width="10%">Cr</th>
                  </tr>
               </thead>
               <?php $i=1; $crtotal = 0; $drtotal = 0;
            foreach ($gll as $key) {  
              
                $vender = "";
                $amount = "";
                $vat = "";
                if($key->gltype == "VENDER"){
                  $vender ="vender"; 
                }else{
                  $vender = "";
                }

                if($key->gltype == "AMOUNT"){
                   $amt ="amount"; 
                }else{
                  $amt = "";
                }

                if($key->gltype == "VAT"){
                   $vat ="vat"; 
                }else{
                  $vat = "";
                }


              ?>
              <tr>
                <td>
                  <input type="text" class="form-control" readonly="true" name="gltype[]" 
                  id="gltype<?php echo $i; ?>" value="<?php echo $key->gltype; ?>">        
                </td>
                <?php if($key->gltype == "AMOUNT"){ ?>
                <td>
                  <input type="hidden" class="form-control" readonly="true" name="[]" 
                  id="ac_no<?php echo $i; ?>" value="<?php echo $key->acct_no; ?>">  

                  <div class="input-group">
                    <input type="text" class="form-control" readonly="true" name="ac_no[]" 
                    id="acc_no<?php echo $i; ?>" value="<?php echo $key->acct_no; ?>">
                    <span class="input-group-btn" >
                        <button type="button"  row="<?php echo $i; ?>" class="btn btn-info btn-icon" onclick="open_acc($(this))"><i class="icon-search4"></i></button>
                    </span>
                  </div>
                </td>             
                <?php }elseif($key->gltype == "VAT") { ?>

                  <td>
                  <input type="hidden" class="form-control" readonly="true" name="[]" 
                  id="ac_no<?php echo $i; ?>" value="<?php echo $key->acct_no; ?>">  

                  <div class="input-group">
                    <input type="text" class="form-control" readonly="true" name="ac_no[]" 
                    id="acc_no<?php echo $i; ?>" value="<?php echo $key->acct_no; ?>">
                    <span class="input-group-btn" >
                        <button type="button"  row="<?php echo $i; ?>" class="btn btn-info btn-icon" onclick="open_acc($(this))"><i class="icon-search4"></i></button>
                    </span>
                  </div>


                </td>
                <?php }else { ?>
                <td>
                <div class="input-group">
                 <input type="text" class="form-control" readonly="true" name="ac_no[]" 
                  id="acc_no<?php echo $i; ?>" value="<?php echo $key->acct_no; ?>">
                  <span class="input-group-btn" >
                    <button type="button"  row="<?php echo $i; ?>" class="btn btn-info btn-icon" onclick="open_acc($(this))"><i class="icon-search4"></i></button>
                  </span>
                </div>
                </td>
                <?php } ?>

                <td>
                  <input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $key->act_name; ?>"  class="form-control " readonly="true">
                </td> 
                <td><input type="text"  class="form-control input-sm" readonly="true" id="costcode<?php echo $i; ?>" name="costcode"  value="<?php echo $key->costcode; ?>"></td>
                <td><input type="text" class="form-control input-sm text-right dr <?=$amt ?> <?=$vat ?>" name="dr[]" id="dr<?php echo $i; ?>" value="<?php echo $key->amtdr; ?>" readonly="true"></td>
                <td><input type="text" class="form-control input-sm text-right <?=$vender ?>" readonly="true" name="cr[]" id="cr<?php echo $i; ?>" value="<?php echo $key->amtcr; ?>"></td>
              </tr>

            <?php $i++; $crtotal = $crtotal+$key->amtcr; $drtotal = $drtotal+$key->amtdr; } ?>
             <tr>
                  <td colspan="4"></td>
                  <td class="text-right"><b><?php echo number_format($drtotal,2);?></b></td>
                  <td class="text-right"><b><?php echo number_format($crtotal,2);?></b></td>
             </tr>
             
              </table>
            </div>
          </div>
          <div id="panel-pill2" class="tab-pane has-padding ">
            <div id="meterialr" class="table-responsive">
              <table class="table table-hover table-xxs">
                <thead>
                  <tr>
                    <th width="18%">รหัสสินค้า</th>
                    <th width="23%">ชื่อสินค้า</th>
                    <th class="text-center" width="7%">ปริมาณ</th>
                    <th class="text-center" width="9%">หน่วย</th>
                    <th class="text-center" width="7%">ราคา/หน่วย</th>
                    <th class="text-center" >ส่วนลด1(%)</th>
                    <th class="text-center" >ส่วนลด2(%)</th>
                    <th class="text-center" width="10%">จำนวนเงิน</th>
                    <th class="text-center" width="8%">ภาษี %</th>
                    <th class="text-center" width="10%">ภาษี</th>
                    <th class="text-center" width="20%">จำนวนเงินทั้งหมด</th>
                  </tr>
                </thead>
                <tbody  id="bodymat">
                  <?php $m=1; foreach ($detail as $de) {?>                 
                  <tr>
                    <td >
                      <div class="input-group"><input type="text" class="form-control input-sm" id="newmatcode<?php echo $m; ?>" name="matcodei[]" readonly="true" value="<?php echo $de->apvi_matcode; ?>">
                      </div>
                    </td>
                    <td>
                      <input readonly="true" type="text" class="form-control input-sm" readonly="true" name="matnamei[]" id="newmatname<?php echo $m;?>" value="<?php echo $de->apvi_matname; ?>">
                      <input readonly="true" type="hidden" class="form-control input-sm" readonly="true" name="taxid" id="taxid" value="<?php echo $de->apvi_taxid; ?>">
                    </td>
                    <td>
                     <input readonly="true" type="text"  class="form-control input-sm text-right" id="qtyi<?php echo $m; ?>" name="qtyi[]" value="<?php echo number_format($de->apvi_qty); ?>">
                   </td>
                   <td>
                      <div class="input-group"><input readonly="true" type="text" class="form-control input-sm text-right" id="uniti<?php echo $m; ?>" name="uniti[]" value="<?php echo $de->apvi_unit; ?>"><div class="input-group-btn"></div></div>
                    </td>
                    <td>
                      <input readonly="true" type="text"  class="form-control input-sm text-right" name="priceuniti[]" value="<?php echo number_format($de->apvi_priceunit); ?>">
                    </td>

                    <td>
                      <input readonly="true" type="text" class="form-control input-sm text-right" name="discount1i[]" value="<?php echo number_format($de->apvi_discountper1); ?>">
                     </td>
                     <td>
                      <input readonly="true" type="text" class="form-control input-sm text-right" name="discount2i[]" value="<?php echo number_format($de->apvi_discountper2); ?>">
                    </td>
                    <td>
                      <input readonly="true" type="text"  class="form-control input-sm text-right" name="amtt[]" value="<?php echo number_format($de->apvi_disamt); ?>">
                    </td>
                    <td>
                      <input readonly="true" type="text" class="form-control input-sm text-right" name="vatamti[]" value="<?php echo $de->apvi_vat; ?>">
                    </td>
                    <td>
                      <input readonly="true" type="text"  class="form-control input-sm text-right" name="tovat[]" value="<?php echo number_format($de->apvi_vatper); ?>">
                    </td>
                    <td>
                      <input readonly="true" type="text" class="form-control input-sm text-right" readonly name="amounti[]" value="<?php echo number_format($de->apvi_netamt); ?>">
                    </td>
                    <!-- <td>#</td> -->
                  </tr>                         
                  <?php  $m++;  } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div id="panel-pill3" class="tab-pane has-padding">
            <div id="tax" class="table-responsive">              
              <table class="table table-hover table-xxs">
                <thead>
                  <tr>
                    <th width="15%">Vender</th>
                    <th width="10%">Tax ID</th>
                    <th class="text-center" width="5%">Tax Date</th>
                    <th class="text-center" width="10%">Tax No</th>
                    <th class="text-center" width="10%">Amount</th>
                    <th class="text-center" width="10%">VAT Amount</th>
                  </tr>
                </thead>
                <tbody id="tax_table">
                  <tr>
                    <?php
                    $t = 1; foreach ($tax as $tt) {
                    ?> 
                    <td><input type="text" class="form-control input-sm" id="vend" value="<?php echo $tt->vender_name ?>" readonly="true"></td>
                    <td><input type="text" name="tax_id" class="form-control input-sm"  value="<?php echo $tt->vender_tax ?>" readonly="true"></td>
                    <td><input type="date" name="tax_date" class="form-control input-sm" value="<?php echo $tt->ap_taxdate ?>" readonly="true"></td>
                    <td><input type="text" name="tax_no" class="form-control input-sm" value="<?php echo $tt->ap_taxno ?>" readonly="true"></td>
                    <td><input type="text" name="tax_amt" class="form-control input-sm text-right" value="<?=$tt->ap_amtvat; ?>" readonly="true"></td>
                    <td><input type="text" name="tax_vat" class="form-control input-sm text-right" value="<?php echo $tt->ap_netamt ?>" readonly="true"></td>
                  </tr>
                   <?php $t++; } ?> 
                </tbody>
              </table>            
            </div> 
          </div>
          
        </div>

        <br>
        <div class="modal-footer">
           <div class="form-group">
              <a href="<?=base_url();?>ap/ap_main_pro/<?=$pro_id;?>/p" class="boxmessage btn bg-primary-600 btn-xs"><i class=" icon-plus-circle2 position-left"></i> New</a>
              <button type="button" id="sapv" class="btn btn-success btn-xs"><i id="icon_save" class="icon-floppy-disk position-left"></i> Save</button>
              <a href="#" class="btn btn-danger btn-xs"><i class="icon-close2 position-left"></i> Close</a>
            </div>
        </div>
      </form>
    </div>
  </div>
</fieldset>
</div>

<div class="modal fade" id="openporec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Receive No. </h4>
      </div>
      <div class="modal-body">
        <div id="modal_recpo">
        </div>
      </div>
    </div>
  </div>
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
  $('#sapv').click(function(){
    $('#sapv').attr('class', 'btn btn-success disabled');
    $('#icon_save').attr('class', 'icon-spinner2 spinner');
    var frm = $('#fapv');
    $.post("<?php echo base_url(); ?>ap_active/editapv/<?=$code; ?>", frm.serialize(),
      function () {
      }
    ).done(function(data){
      swal({
        title: "Save Completed!!.",
        text: "Save Completed!!.",
        // confirmButtonColor: "#66BB6A",
        type: "success"
      });

      setTimeout(function() {
        window.location.href = "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_payvoucher.mrt&no=<?php echo $code; ?>";
        $('#sapv').attr('class', 'btn btn-success btn-xs');
        $('#icon_save').attr('class', 'icon-floppy-disk position-left');
      }, 500);                               

    });
});

</script>