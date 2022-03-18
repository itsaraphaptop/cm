<div class="content-wrapper">
  <!-- Page header -->
  <div class="content">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h6 class="panel-title">Credit Note (APS)</h6>
      <div class="heading-elements">
        <div class="col-md-12">
          <ul class="icons-list">
            <li><button class="openporec btn btn-info" id="cvendor" data-toggle="modal" data-target="#openporec"><i class="icon-file-plus"></i> Select</button></li>
          </ul>
        </div>
      </div>
      
    </div>
    <div class="panel-body">
      <form action="<?php echo base_url(); ?>ap_active/addnewcns" id="ff" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group" >
                <label for="">AP No.</label>             
                <input type="text" class="form-control" readonly="true" id="cnap_no" name="cnap_no">
              </div>
            </div>
            <div class="col-md-3">
              <label for="">Vender Name</label>             
              <input type="text" class="form-control" readonly="true" placeholder="ร้านค้า" id="vender" name="vender">
              <input type="hidden" class="form-control" readonly="true" placeholder="ร้านค้า" id="venderid" name="venderid">
            </div>
            <div class="col-md-3">
              <label for="">Project Name</label>
              <input type="text" class="form-control" readonly="true" id="projectname" name="projectname">
              <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid">
            </div>
            <div class="col-sm-3">
              <label for="">System Type</label>
              <input type="text" class="form-control" readonly="true" id="system" name="system">
              <input type="hidden" class="form-control" readonly="true" id="sysid" name="sysid">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">          
            <div class="col-md-3">
              <label for="">Doc Date:</label>              
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                  <input type="date" class="form-control"  readonly="true" id="duedate" name="duedate">
                </div>              
            </div>           
            
            <div class="form-group col-sm-3">
              <label for="">Data Type :</label>
              <select readonly="true" name="datatype" id="datatype" class="form-control">
                <option value="Normal">Normal</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
              <label for="qty">Amount</label>
              <input type="text" id="amount" name="qty" class="form-control text-right" >
              <input type="hidden" id="amountt" name="amount" class="form-control input-sm text-right" >
              <input type="hidden" id="amounttot" name="amountot" class="form-control input-sm text-right" >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
              <label for="price_unit">Vat %</label>
               <input type="text" id="pprice_unit"  readonly="true" name="price_unit" class="form-control text-right" value="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
              <label for="amount">Vat Amount</label>
              <input type="text" id="pamount"  readonly="true" name="pamount" class="form-control text-right">
              <input type="hidden" id="vatt"  readonly="true" name="vatt" class="form-control input-sm text-right">
              <input type="hidden" id="vattot"  readonly="true" name="vattot" class="form-control input-sm text-right">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
              <label for="qty">Net Amount</label>
              <input type="text" id="amt" name="amt" class="form-control text-right"  readonly="true">
              <input type="hidden" id="amttotal" name="amttotall" class="form-control input-sm text-right" >
              <input type="hidden" id="totalamount"  name="amttotal" class="form-control input-sm text-right" >
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">          
            <div class="form-group col-sm-3">
              <label for="">AP Date :</label>
              <input type="date" id="vchdate" name="vchdate" class="form-control daterange-single">
            </div>
            <div class="form-group col-sm-3">
              <label for="">Year :</label>
              <input type="text" id="glyear" name="glyear" value="<?php echo date("Y");?>" class="form-control" readonly="true" >
            </div>
            <div class="form-group col-sm-3">
              <label for="">Period :</label>
              <input type="text" id="glperiod"  readonly="true" name="glperiod" value="<?php echo date("m");?>" class="form-control" >
            </div>          
          </div>
        </div>
        <br>
        <div class="tabbable">
          <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
            <li class=""><a href="#panel-pill3" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> TAX</a></li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane has-padding active" id="panel-pill1" >
              <div id="vat">
              </div>
            </div>
          <div id="panel-pill3" class="tab-pane fade">
            <!-- <div id="tax"> -->
            
            <button type="button" id="addtax" class="btn btn-default">Add Tax</button>
            
            <table class="table table-xxs">
              <thead>
                <tr>
                  <th width="15%">Vender Name</th>
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
                <!-- <tr>
                  <td><input type="text" id="tven" readonly="true" class="form-control input-sm" value=""></td>
                  <td><input type="date" class="form-control input-sm"  value=""></td>
                  <td><input type="text" class="form-control input-sm" name="taxiv" id="taxiv"></td>
                  <td><input type="text" class="form-control input-sm" readonly="true" id="xamt" name="aamt" value=""></td>
                  <td><input type="text" class="form-control input-sm" readonly="true" id="xvat" name="vvat" value=""></td>
                </tr> -->
              </tbody>
            </table>
            <!-- </div> -->
          </div>
        </div>
        <br>
        <div class="modal-footer">
           <div class="form-group">
              <button type="button" id="scnv" class="bsave btn btn-success"><i class="icon-floppy-disk position-left"></i> Save</button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
        </div>
      </form>
    </div>
  </div>
</fieldset>
</div>


<div class="modal fade" data-backdrop="false" id="openporec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Select APS</h5>
      </div>
      <div class="modal-body">
        <div id="modal_recpo">
        </div>
      </div>
    </div>
  </div>
</div>


  <script>
  function set_sys_new(id, name1, name2) {
    const _name1 = $(`#${name1}${id}`).val();
    const _name2 = $(`#${name2}${id}`).val();
    if(_name1 !='' && _name2 !='') {
      // alert('ดึงขาบัญชี')
      $.get("<?=base_url();?>ap/set_sys_new", function () {
      }).done(function(data) {
        let jsonRes = JSON.parse(data);
        $('#acc_no2').val(jsonRes.data.pac_taxvat_due);
        $('#acc_name2').val(jsonRes.data.act_name);
      });
    }else{
      $.get("<?=base_url();?>ap/set_sys_old", function () {
      }).done(function(data) {
        let jsonRes = JSON.parse(data);
        // $('#acc_no2').val(jsonRes.data.pac_taxvat_due);
        // $('#acc_name2').val(jsonRes.data.act_name);
        $('#acc_no2').val(jsonRes.data.pac_taxvat_nodue);
        $('#acc_name2').val(jsonRes.data.act_name);
        
      });
    }
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

    // console.log(vatamt);
  $('#sum_vatamt').html(vatamt);
  });

}

$('#addtax').click(function() {
  //  vender
  // venderid
  var vender = $('#vender').val();
  var vender_id = $('#venderid').val();
  var type_ap = $('#type_ap').val();
  var trlength = $('#body_tax > tr').length+1;
  // alert(trlength);
  var row_tax = `
      <tr>
        <td>
            <input type="text" class="form-control" value="${vender}" readonly="true">
            <input type="hidden" class="form-control" name="vender_id_in[]" value="${vender_id}">
        </td>
        <td><input type="date" class="form-control" onchange="set_sys_new('', 'apvtaxno', 'taxdate')" name="tax_date_in[]"></td>
        <td><input type="text" class="form-control" onchange="set_sys_new('', 'apvtaxno', 'taxdate')" name="taxno_in[]"></td>
        <td><input type="text" class="form-control text-right amt_tax" onkeyup="cal_process()" name="amtvat_in[]" id="amt_tax${trlength}"></td>
        <td><input type="text" class="form-control text-right netamt" onkeyup="cal_process()" name="netamt_in[]" id="netamt_tax${trlength}"></td>
      </tr>`;
      $('#body_tax').append(row_tax);
      cal_process();
 });
  $("#taxiv").keyup(function(){
  var taxiv = $('#taxiv').val();
  var yvatcode = $('#yvatcode').val();
  var yvatname = $('#yvatname').val();
  $('#ac_no').val(yvatcode);
  $('#acc_name').val(yvatname);
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
  $("#amount").keyup(function(){
  var amount = parseFloat($('#amount').val()*1);
  var amt = parseFloat($('#amt').val()*1);
  var total = parseFloat($('#amountt').val()*1);
  var vat = parseFloat($('#pprice_unit').val()*1);
  var vatt = parseFloat($('#vatt').val()*1);
  var vattot = parseFloat($('#vattot').val()*1);
  var totalamount = parseFloat($('#totalamount').val()*1);
  var xamount = (amount*vat)/100;
  var xamtt = (xamount+amount);
  var amttot = (total-amount)*1;

  var amtvt = (vatt-xamount)*1; 
  var tamt = (total- xamtt)*1;

  $('#pamount').val(xamount);
  $('#amt').val(xamtt);
  $('#vvat').val(vat);
  $('#amounttot').val(amttot);
  $('#vattot').val(amtvt);
  $('#dr1').val(xamtt);
  $('#crv').val(xamount);
  $('#crven').val(amount);
  $('#totalamount').val(tamt);
  
  });
</script>
<script>
 
  $("#pprice_unit").keyup(function(){
   
   var amount = parseFloat($('#crven').val()*1);
  var amt = parseFloat($('#amt').val()*1);
  var total = parseFloat($('#amountt').val()*1);
  var vat = parseFloat($('#pprice_unit').val()*1);
  var vatt = parseFloat($('#vatt').val());
  var vattot = parseFloat($('#vattot').val()*1);
  var amttotal1 = parseFloat($('#amttotal').val()*1);
  var totalamount = parseFloat($('#totalamount').val()*1);
  var xamount = (amount*vat)/100;
  var xamtt = (xamount+amount);
  var amttot = (total-amount);
  var vcode = $('#novatcode').val();
  var vnane = $('#novatname').val();
  var amtvt = (vatt-xamount)*1; 
  var tamt = (amttotal1- xamtt)*1;

  $('#pamount').val(xamount);
  $('#amt').val(xamtt);
  $('#vvat').val(vat);
  $('#amounttot').val(amttot);
  $('#vattot').val(amtvt);
  $('#dr1').val(xamtt);
  $('#crv').val(xamount);
  $('#crven').val(amount);
  $('#totalamount').val(tamt);
  $('#vatcode').val(vcode);
  $('#vatname').val(vnane);
  });

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script>

$(".openporec").click(function(){
  $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#modal_recpo').load('<?php echo base_url(); ?>ap/rec_aps');

});
  $( "#cvendor" ).click(function() {
  $(".bsave").prop("disabled",false);
});



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
}else if ($("#vchdate").val()=="") {
  swal({
      title: "กรุณากรอก GL Date !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
    let amount = $('#amount').val()*1;
    let sum_amt = $('#sum_amt').html()*1;
    let sum_vatamt = $('#sum_vatamt').html()*1;
    let vatamt = $('#pamount').val()*1;
    if (amount == sum_amt && vatamt == sum_vatamt) {
      if(amount != 0) {
        // alert('submit')
     var frm = $('#ff');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                              // console.log(data);
                              
                        swal({
                                  title: "Save Completed!!.",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
      
                        setTimeout(function() {
                          window.location.href = data;
                        }, 500);
                       
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

    }
});
</script>

