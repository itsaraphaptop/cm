 <div class="content-wrapper">
  <div class="content">
  <div class="panel panel-flat">
  <div class="panel-heading">
  <h6 class="panel-title"> Credit Note (APS)</h6>
  <div class="panel-body">
  <form id="fapd" action="<?php echo base_url(); ?>ap_active/addedit_cns" method="post">
  <div class="col-md-12">
    <div class="row">
      <div class="form-group col-sm-3">
        <label for="">CNS No. :</label>
        <input type="text" id="cns_code" name="cns_code" class="form-control" value="<?=$cns_head->cns_code;?>" readonly="true">
      </div>
      <div class="form-group col-sm-3">
      <label for="">Vender Name :</label>
      
      <input type="hidden" name="apdcode">
      <input type="text" name="namevendor" class="form-control" readonly="true" value="<?=$cns_head->vender_name;?>">
      
      </div>
    <!-- <div class="form-group col-sm-3">
      <label for="">Tax  No. :</label>
      <input type="text" id="tax_noi" name="tax_no" class="form-control" >
    </div> -->
    <div class="form-group col-sm-3">
      <label for="">Project Name :</label>
      <input type="text" id="pre_eventname" name="pre_eventname" class="form-control" value="<?=$cns_head->project_name;?>" readonly="true">       
    </div>
    <div class="form-group col-sm-3">
      <label for="">Data Type :</label>
      <select readonly="true" name="datatype" id="datatype" class="form-control">
        <option  value="Head Office">Head Office</option>
      </select>
    </div>
    </div>
  </div>
  
  <div class="col-md-12">
    <div class="row">
    <div class="col-md-3">
      <div class="form-group" id="errorcost">
      <label for="qty">Amount</label>
      <input type="text" id="amount" name="qty" class="form-control text-right" value="<?=$cns_head->cns_amount;?>" onkeyup="process_cal()">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <label for="price_unit">Vat %</label>
      <input type="text" id="pprice_unit" readonly="true" name="price_unit" class="form-control" value="<?=$cns_head->cns_vat;?>">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <label for="amount">Vat Amount</label>
      <input type="text" id="pamount" readonly="true" name="pamount"  class="form-control" value="<?=$cns_head->cns_vattot;?>">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group" id="errorcost">
      <label for="qty">Net Amount.</label>
      <input type="text" id="amt" name="amt" class="form-control" value="<?=$cns_head->cns_namt;?>" readonly="true">
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
     
    <div class="form-group col-sm-2">
      <label for="">AP Date :</label>
      <input type="date" id="vchdate"  name="vchdate" class="form-control" value="<?=date('Y-m-d',strtotime($cns_head->cns_gldate));?>">
    </div>

    <div class="form-group col-sm-2">
      <label for="">Year :</label>
      <input type="text" id="glyear" name="glyear"  class="form-control" readonly="true" value="<?=$cns_head->cns_glyear;?>">
    </div>

    <div class="form-group col-sm-2">
      <label for="">Period :</label>
      <input type="text" id="glperiod" readonly="true" name="glperiod" class="form-control" value="<?=$cns_head->cns_glperiod;?>">
    </div>
    
    </div>
  </div>
  <br>
   <div class="col-md-12">
  <div class="tabbable">
    <ul class="nav nav-tabs nav-tabs-highlight">
    <li class="active"><a href="#pa-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
    <li class=""><a href="#pa-pill2" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> TAX</a></li>
    </ul>
          
    <div class="tab-content">
      <div class="tab-pane has-padding active" id="pa-pill1">
        <div id="www" class="table-responsive">
          <table class="table table-hover table-xxs ">
            <thead>
              <tr>
                <th align="center">Type</th>
                <th align="center">Account Code</th>
                <th align="center">Account Name</th>
                <th align="center">Cost Code</th>
                <th align="center">Dr</th>
                <th align="center">Cr</th>
              </tr>
            </thead>
            <tbody id="glacc">
            <?php foreach ($cns_gl as $key => $gl) {
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

      <div class="tab-pane has-padding" id="pa-pill2">
        <div id="tax" class="table-responsive">
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
            foreach ($cns_tax as $key => $tax) {
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
   
      <button type="button" id="saveapd" class="btn btn-success"><i class="icon-floppy-disk position-left"></i> Save</button>
      <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
      </div>
    </div>
    </div>
  </div>
</fieldset>
</form>
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

<script>
// var delayID=null;
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
cal_process()
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
$("#cterm").change(function(){
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
  var dates = new Date();
  var cr = parseFloat($("#cterm").val());
  var duedate=newDayAdd(dates,cr);
  $('#duedate').val(duedate);
});

$("#tax_noi").keyup(function(){
  var tax_no = $('#tax_noi').val();
  $('#taxiv').val(tax_no);
  });

$("#taxiv").keyup(function(){
  var taxiv = $('#taxiv').val();
  $('#tax_noi').val(taxiv);
  if ($("#pprice_unit").val()==0) {
        swal({
            title: "Please Fill Vat % !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }
    var vcode = $('#yvatcode').val();
    var vnane = $('#yvatname').val();
    $('#vatcode').val(vcode);
    $('#vatname').val(vnane);
  });

$("#vchdate").change(function(event) {
    var de_date = $("#vchdate").val();
    var y = de_date.slice(0,4); 
    var m = de_date.slice(5,7);

    $("#glperiod").val(m);
    $("#glyear").val(y);         

  }); 



</script>

<script>

$("#saveapd").click(function(e){     
  var d = $("#vchdate").val();
  var y = $("#glyear").val();
  var m = $("#glperiod").val();

  $.post(`<?=base_url();?>data_master/check_period/${y}/${m}`,
    function () {
    }
  ).done(function(data) {
    let json_res = JSON.parse(data);
    
    if(json_res.status === false) {
      swal({
        title: json_res.message,
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });

      return false;
    }

    let amount = $('#amount').val()*1;
    let sum_amt = $('#sum_amt').html()*1;
    let sum_vatamt = $('#sum_vatamt').html()*1;
    let vatamt = $('#pamount').val()*1;
    if (amount == sum_amt && vatamt == sum_vatamt) {
      if(amount != 0) {
          var frm = $('#fapd');
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
                          window.location.href= "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apd_payvoucher.mrt&no=<?=$cns_head->cns_code;?>";
                        }, 500);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#fapd").submit();
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
  });
//   var url="<?php echo base_url(); ?>ap_active/selectdate";
//         var dataSet={
//         d: $("#vchdate").val(),
//         y: $("#glyear").val(),
//         m: $("#glperiod").val()
//         };
//       $.post(url,dataSet,function(data){
//       if (data!="Y") {
//         swal({
//           title: "Please Fill Period GL !!.",
//           text: "",
//           confirmButtonColor: "#EA1923",
//           type: "error"
//         });
//         }else if ($("#vendor_id").val()=="") {
//   swal({
//       title: "Please Select  Vender !!.",
//       text: "",
//       confirmButtonColor: "#EA1923",
//       type: "error"
//   });
// }else if($("#pre_event").val()==""){
//   swal({
//       title: "Please Select project!!.",
//       text: "",
//       confirmButtonColor: "#EA1923",
//       type: "error"
//   });
// }else if($("#cterm").val()==""){
//   swal({
//       title: "Please Select Credit Term!!.",
//       text: "",
//       confirmButtonColor: "#EA1923",
//       type: "error"
//   });
// }else{
//   alert('Submit')
//     //  var frm = $('#fapd');
//     //         frm.submit(function (ev) {
//     //             $.ajax({
//     //                 type: frm.attr('method'),
//     //                 url: frm.attr('action'),
//     //                 data: frm.serialize(),
//     //                         success: function (data) {
//     //                     // console.log(data);
//     //                     swal({
//     //                               title: "Save Completed!!.",
//     //                               text: "Save Completed!!.",
//     //                               // confirmButtonColor: "#66BB6A",
//     //                               type: "success"
//     //                           });
      
//     //                     // setTimeout(function() {
//     //                     // window.location.href = "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apd_payvoucher.mrt&no=<?=$cns_head->cns_code;?>";
//     //                     // }, 500);
                       
//     //                 }
//     //             });
//     //             ev.preventDefault();

//     //         });
//     //       $("#fapd").submit();
//     }
// });
       });
</script>


<div id="accopen" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Account </h5>
            </div>

            <div class="modal-body">
                <div class="loadaccchart">

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
                <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
  </div>
  <script>
  $(".accopen").click(function(){
  $('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $(".loadaccchart").load('<?php echo base_url(); ?>share/accchart');
  });
</script>
