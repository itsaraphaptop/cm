<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h6 class="panel-title">แก้ไขลดหนี้ (APV)</h6>
      <div class="heading-elements">
      </div>
    </div>
    <div class="panel-body">
      <form action="<?php echo base_url(); ?>ap_active/addedit_cnv" id="ff" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">AP No.</label>    
              <input type="hidden" name="type_ap" value="<?=$cnv_head->type;?>">
              <input type="hidden" name="ap_code" value="<?=$cnv_head->ap_code;?>">             
              <input type="text" class="form-control" readonly="true" id="cnap_no" name="cnap_no" value="<?=$cnv_head->cnv_code;?>">
            </div>
            <div class="col-md-3">
              <label for="">Vender Name</label>             
              <input type="text" class="form-control" readonly="true" placeholder="ร้านค้า" id="vender" name="vender" value="<?=$cnv_head->vender_name;?>">
              <input type="hidden" class="form-control" readonly="true" id="vender_code" name="vender_code_head" value="<?=$cnv_head->cnv_vender;?>">
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="">P/O No.</label>
                <input type="text" class="form-control" readonly="true" placeholder="เลขที่ใบสั่งซื้อ" id="pono" name="pono" value="<?=$cnv_head->cnv_pono;?>">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>System Type</label>
                <input type="hidden" class="form-control" readonly="true" id="system" name="system" value="<?=$cnv_head->cnv_system;?>">
                <input type="text" class="form-control" readonly="true" id="systemname" name="systemname" value="<?=$cnv_head->systemname;?>">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row" >       
            <div class="col-md-3">
              <label for="">Project Name</label>
              <input type="text" class="form-control" readonly="true" id="pro" name="pro" value="<?=$cnv_head->project_name;?>">
              <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid" value="<?=$cnv_head->cnv_project;?>">
            </div>     
            <div class="col-md-3">
              <label for="">Due Date:</label>
              <div class="form-group" >
                <!-- <div class="input-group"> -->
                  <input type="date" class="form-control" readonly="ture" id="duedate" name="duedate" value="<?=$cnv_head->cnv_duedate;?>">
                <!-- </div> -->
              </div>
            </div>            
            <div class="form-group col-sm-3">
              <label for="">Data Type :</label>
              <select name="datatype" id="datatype" class="form-control" readonly="true">
                <option value="Normal" <?= ($cnv_head->datatype == 'Normal') ? 'selected="selected"' : ''; ?>>Normal</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">AP Date :</label>
              <input type="date" id="vchdate" value="<?=$cnv_head->cnv_gldate;?>" name="vchdate" class="form-control daterange-single">
            </div>        
          </div>
        </div><br>
        <!-- <div class="col-md-12">
          <div class="row">
            <div class="col-md-1">
              <div class="form-group">
                <label>Less Adv</label>
                <input type="text" class="form-control input-xs" id="downper" onkeyup="process_cal()">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" class="form-control input-xs" id="down_val" onkeyup="process_cal()">
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label>Less Ret</label>
                <input type="text" class="form-control input-xs" id="reten" onkeyup="process_cal()">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" class="form-control input-xs" id="reten_val" onkeyup="process_cal()">
              </div>
            </div>
          </div>
        </div> -->
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group" id="errorcost">
              <label for="qty">Amount</label>
              <input type="text" id="amount" name="qty" class="form-control input-sm text-right" value="<?=$cnv_head->cnv_netamt;?>" onkeyup="process_cal()" >
              <input type="hidden" id="amountt" name="amount" class="form-control input-sm text-right" >
              <input type="hidden" id="amounttot" name="amountot" class="form-control input-sm text-right" >
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
              <label for="price_unit">Vat %</label>
               <input type="text" id="pprice_unit" name="price_unit" value="<?=$cnv_head->cnv_vatper;?>" class="form-control input-sm text-right" readonly="true">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
              <label for="amount">Vat Amount</label>
              <input type="text" id="pamount"  readonly="true" name="pamount" class="form-control input-sm text-right" value="<?=$cnv_head->cnv_vat;?>">
              <input type="hidden" id="vatt"  readonly="true" name="vatt" class="form-control input-sm text-right">
              <input type="hidden" id="vattot"  readonly="true" name="vattot" class="form-control input-sm text-right">
              </div>
            </div>
            
            <div class="col-md-2">
              <div class="form-group" id="errorcost">
              <label for="qty">Net Amount</label>
              <input type="text" id="amt" name="amt" class="form-control input-sm text-right"  readonly="true" value="<?=$cnv_head->cnv_totamt;?>">
              <input type="hidden" id="amttotal" name="amttotall" class="form-control input-sm text-right" >
              <input type="hidden" id="totalamount"  name="amttotal" class="form-control input-sm text-right" >
              </div>
            </div>
            <div class="form-group col-sm-2">
              <label for="">Year :</label>
              <input type="text" id="glyear" name="glyear"class="form-control input-xs" readonly="true" value="<?=$cnv_head->cnv_glyear;?>">
            </div>

            <div class="form-group col-sm-2">
              <label for="">Period :</label>
              <input type="text" id="glperiod" name="glperiod" class="form-control input-xs" readonly="true" value="<?=$cnv_head->cnv_glperiod;?>">
            </div>            
          </div>

        </div>
        <div class="tabbable">
          <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="true"><i class=" icon-coins position-left"></i> GL</a></li>
            <li class=""><a href="#panel-pill3" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> TAX</a></li>
          </ul>
        </div>
        <div class="tab-content">
          <div  class="tab-pane has-padding active" id="panel-pill1">
            <div class="table-responsive">
              <table class="table table-hover table-xs">
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
                <tbody>
                <?php
                foreach ($cnv_gl as $key => $gl) {
                ?>
                  <tr>
                    <td>
                      <input type="text" name="type[]" class="form-control input-xs" readonly="true" value="<?=$gl->gltype;?>">
                      <input type="hidden" name="id_type[]" class="form-control input-xs" readonly="true" value="<?=$gl->id_apgl;?>">
                    </td>
                    <td>
                      <div class="input-group">
                        <input type="text" name="acc_code[]" class="form-control input-xs" readonly="true" id="acc_code<?=$key+1;?>" value="<?=$gl->acct_no;?>">
                        <span class="input-group-btn">
                          <button type="button" row="<?=$key+1;?>" class="btn btn-info btn-icon input-xs" onclick="account($(this))"><i class="icon-search4"></i></button>
                        </span>  
                      </div>
                    </td>
                    <td><input type="text" name="acc_name[]" id="acc_name<?=$key+1;?>" class="form-control input-xs" readonly="true" value="<?=$gl->act_name;?>"></td>
                    <td><input type="text" name="costcode[]" class="form-control input-xs" readonly="true" value="<?=$gl->costcode;?>"></td>
                    <td><input type="text" name="dr[]" class="form-control input-xs" readonly="true" id="<?=strtolower($gl->gltype).'_dr';?><?=$key+1;?>" value="<?=$gl->amtdr;?>"></td>
                    <td><input type="text" name="cr[]" class="form-control input-xs" readonly="true" id="<?=strtolower($gl->gltype).'_cr';?><?=$key+1;?>" value="<?=$gl->amtcr;?>"></td> 
                  </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          <div id="panel-pill3" class="tab-pane has-padding">
            
            <button type="button" id="addtax" class="btn btn-default">Add Tax</button>
            
            <div id="tax">
            <table class="table table-xxs">
              <thead>
                <tr>
                  <th width="15%">Vender Amount</th>
                  <th class="text-center" width="10%">Tax Date</th>
                  <th class="text-center" width="10%">Tax No</th>
                  <th class="text-center" width="10%">Amount</th>
                  <th class="text-center" width="5%">VAT Amount</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th colspan="3" class="text-center">Total</th>
                  <th id="sum_amt" class="text-right">0</th>
                  <th id="sum_vatamt" class="text-right">0</th>
                </tr>
              <tfoot>
              <tbody id="body_tax">
              <?php
              foreach ($cnv_tax as $key => $tax) {
              ?>
                <tr>
                  <td>
                      <input type="text" class="form-control input-xs" value="<?=$tax->vender_name;?>" readonly="true">
                      <input type="hidden" class="form-control input-xs" name="vender_code[]" value="<?=$tax->vender_code;?>">
                      <input type="hidden" class="form-control input-xs" name="tax_id[]" value="<?=$tax->id;?>">
                  </td>
                  <td><input type="date" class="form-control input-xs" name="tax_date[]" value="<?=$tax->ap_taxdate;?>"></td>
                  <td><input type="text" class="form-control input-xs" name="taxno[]" value="<?=$tax->ap_taxno;?>"></td>
                  <td><input type="text" class="form-control input-xs text-right amt_tax" onkeyup="cal_process()" name="amtvat[]" id="amt_tax<?=$key+1;?>" value="<?=$tax->ap_amtvat;?>"></td>
                  <td><input type="text" class="form-control input-xs text-right netamt" onkeyup="cal_process()" name="netamt[]" id="netamt_tax<?=$key+1;?>" value="<?=$tax->ap_amtvat;?>"></td>
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
              <button type="button" id="scnv" class="bsave btn btn-success" ><i class="icon-floppy-disk position-left"></i> Save</button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
        </div>
      </form>
    </div>
  </div>
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
                <div id="modal_account">
                </div>
            </div>

        </div>
    </div>
  </div>

<div class="modal fade" id="openporec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Select AP</h5>
      </div>
      <div class="modal-body">
        <div id="modal_recpo">
        </div>
      </div>
    </div>
  </div>
</div>



 <script>
 function account(el) {
  //  alert(55)
    let id = el.attr('row');
    $.post(`<?=base_url();?>ap/modal_account/acc_code/acc_name/${id}`,
      function () {   
      }
    ).done(function(data) {
      $('#accopen').modal('show');
      $('#modal_account').html(data);
    });
 }

 $('#addtax').click(function() {
  //  vender
  // vender_code
  var vender = $('#vender').val();
  var vender_code = $('#vender_code').val();
  var type_ap = $('#type_ap').val();
  var trlength = $('#body_tax > tr').length+1;
  // alert(trlength);
  var row_tax = `
      <tr>
        <td>
            <input type="text" class="form-control input-xs" value="${vender}" readonly="true">
            <input type="hidden" class="form-control input-xs" name="vender_code_in[]" value="${vender_code}">
        </td>
        <td><input type="date" class="form-control input-xs" name="tax_date_in[]"></td>
        <td><input type="text" class="form-control input-xs" name="taxno_in[]"></td>
        <td><input type="text" class="form-control input-xs text-right amt_tax" onkeyup="cal_process()" name="amtvat_in[]" id="amt_tax${trlength}"></td>
        <td><input type="text" class="form-control input-xs text-right netamt" onkeyup="cal_process()" name="netamt_in[]" id="netamt_tax${trlength}"></td>
      </tr>`;
      $('#body_tax').append(row_tax);
 })
  $("#vchdate").change(function(event) {
    var de_date = $("#vchdate").val();
    var y = de_date.slice(0,4); 
    var m = de_date.slice(5,7);

    $("#glperiod").val(m);
    $("#glyear").val(y);        

  }); 
</script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script>

$(".openporec").click(function(){
  $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#modal_recpo').load('<?php echo base_url(); ?>ap/openpor');
});
$( "#cvendor" ).click(function() {
  $(".bsave").prop("disabled",false);
});

// var delayID=null;
// var trlength = $('#body_tax').length;

function process_cal() {

    // if(delayID){ clearTimeout(delayID);} 

    // delayID=setTimeout(function(){

      // let downper = $('#downper').val()*1;
      // let retenper = $('#reten').val()*1;
      let vat = $('#pprice_unit').val()*1;
      let vatamt = $('#pamount').val()*1;
      let netamt = $('#amt').val()*1;
      let amount = $('#amount').val()*1;
      // let down_val = (amount*downper)/100;
      // let reten_val = (amount*retenper)/100;
      let vatamt_new = amount * vat/100;
      let jownee = amount + vatamt_new;

      $('#amt').val(jownee);
      $('#pamount').val(vatamt_new);
      // $('#down_val').val(down_val);
      // $('#reten_val').val(reten_val);
      // $('#reten_val').val(reten_val);
      $('#vender_dr1').val(jownee);
      $('#vat_cr2').val(vatamt_new);
      $('#amount_cr3').val(amount);
      cal_process();
      // delayID=null;
    // },500);   
}

cal_process();

function cal_process() {
  var amt = 0;
  var vatamt = 0;
  var vat = $('#pprice_unit').val()*1;

  $('.amt_tax').each(function(index, el) {
    amt += el.value*1;
    // let down = $('#reten_val').val()*1;
    let netamt_tax = el.value * vat/100;
    $(`#netamt_tax${index+1}`).val(netamt_tax);
    // alert(index+1)
    // console.log(amt);
  $('#sum_amt').html(amt);
  });

  $('.netamt').each(function(index, el) {
    vatamt += el.value*1;

  $('#sum_vatamt').html(vatamt);
  });



}



$("#scnv").click(function(e){
  var amt = parseFloat($('#amt').val());
  var amtt = parseFloat($('#amttotal').val());
if (amt > amtt) {
  swal({
      title: "Over Net Amount !!!",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if ($('#taxiv') != "" && $('#taxiv') == "") {
  swal({
      title: "Over Net Amount !!!",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
  var tax_tr = $('#body_tax > tr').length;

  if (tax_tr > 0) {
    // alert(55555)
    let amount = $('#amount').val()*1;
    let sum_amt = $('#sum_amt').html()*1;
    let sum_vatamt = $('#sum_vatamt').html()*1;
    let vatamt = $('#pamount').val()*1;
    if (amount == sum_amt && vatamt == sum_vatamt) {
      if(amount != 0) {
          var frm = $('#ff');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                              // console.log(data);
                              let json_res = JSON.parse(data);

                              if (json_res.status === true) {
                                swal({
                                    title: "Save Completed!!.",
                                    text: json_res.meaasge,
                                    // confirmButtonColor: "#66BB6A",
                                    type: "success"
                                });
                                setTimeout(function() {
                                  // window.location.href = "<?php echo base_url(); ?>ap/ap_reduce_apv";
                                  window.location.href = "<?php echo base_url(); ?>ap/reduce_apv_report";
                                }, 500);
                              }else{
                                swal({
                                    title: "Save Completed!!.",
                                    text: json_res.meaasge,
                                    // confirmButtonColor: "#66BB6A",
                                    type: "error"
                                });
                              }
                              
                              
                       
                    }
                });
                ev.preventDefault();

            });
          $("#ff").submit();
      }else{
        swal({
          title: "Amount Not Value!!!",
          text: "",
          confirmButtonColor: "#EA1923",
          type: "error"
        });
      }
    }else{
      swal({
        title: "Tax Not Balance!!!",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    }
  }else{
    swal({
        title: "กรุณาเพิ่ม Tax!!!",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
    });
  }

      }
});
</script>

