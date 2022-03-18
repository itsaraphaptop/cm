<?php 
foreach ($he as $key) {
  
}
 ?>
 <div class="content-wrapper">
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
            </div>
          </div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
              <li>บันทึกลดหนี้ (APS)</li>
              </ul>
          </div>
        </div>
<fieldset>

<div class="panel panel-flat border-top-lg border-top-success">
  <div class="panel-heading">
  <h6 class="panel-title"> แก้ไขใบลดหนี้ (APS)</h6>
  <div class="panel-body">
  <form id="fapd" action="<?php echo base_url(); ?>ap_active/addedit_cns/<?php echo $key->cns_code; ?>" method="post">
  <div class="col-md-12">
    <div class="row">
    <div class="form-group col-sm-2">
      <label for="">Vendor :</label>
      <input type="text" value="<?php echo $key->cns_payto; ?>" id="vendor_id" name="vendor_id" class="form-control" readonly="true">
    </div>
    <div class="form-group col-sm-4">
      <label for="">Vendor Name :</label>
      <div class="input-group" id="errorcost">
      <input type="hidden" value="" name="apdcode">
      <input type="text" value="<?php echo $key->vender_name; ?>" id="namevendor" name="namevendor" class="form-control" readonly="true">
      <span class="input-group-btn">
        <a class="vendor btn btn-primary btn-sm" data-toggle="modal" data-target="#vendor"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
      </span>
      </div>
    </div>
    <div class="form-group col-sm-6">
      <label for="">Tax Inv. No. :</label>
      <input type="text" id="tax_noi" readonly="true" value="<?php echo $key->cns_invno; ?>" name="tax_no" class="form-control" >
    </div>
    
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
    <div class="form-group col-sm-2">
      <label for="">Department :</label>
      <input type="text" id="depart_id" value="" name="depart_id" class="form-control" readonly="true">
    </div>
    <div class="form-group col-sm-4">
      <label for="">Department Name:</label>
      <div class="input-group" id="errorcost">
      <input type="text" id="dpt_title" value="" name="dpt_title" class="form-control" readonly="true">
      <span class="input-group-btn">
        <a class="departm btn btn-primary btn-sm" data-toggle="modal" data-target="#departm"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
      </span>
      </div>
    </div>
    <div class="form-group col-sm-2">
      <label for="">Project :</label>
      <input type="text" id="pre_event" value="<?php echo $key->project_code; ?>" name="pre_event" class="form-control" readonly="true" value="">
    </div>
    <div class="form-group col-sm-4">
      <label for="">Project Name :</label>
      <div class="input-group" id="errorcost">
      <input type="text" value="<?php echo $key->project_name; ?>" id="pre_eventname" name="pre_eventname" class="form-control" readonly="true">
      <span class="input-group-btn">
        <a class="project btn btn-primary btn-sm" data-toggle="modal" data-target="#project"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
      </span>
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
    <div class="col-md-2">
      <div class="form-group" id="errorcost">
      <label for="qty">Amount</label> 
      <input type="text" id="amount" readonly="true" name="qty" value="<?php echo $key->cns_amount; ?>"  placeholder="จำนวนเงิน" class="form-control" >
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
      <label for="price_unit">Vat %</label>
      <input type="text" id="pprice_unit"  readonly="true" value="<?php echo $key->cns_vat; ?>" name="price_unit" class="form-control border-danger border-lg">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
      <label for="amount">Vat</label>
      <input type="text" id="pamount" value="<?php echo $key->cns_vattot; ?>" readonly="true" name="pamount" placeholder="กรอกจำนวนเงิน" class="form-control" >
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group" id="errorcost">
      <label for="qty">Less Adv.</label>
      <input type="text" id="lessadv" value="" name="lessadv" class="form-control" readonly="true" >
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group" id="errorcost">
      <label for="qty">Less Ret.</label>
      <input type="text" id="lessret" value="" name="lessret" class="form-control" readonly="true">
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
    <div class="col-md-2">
      <div class="form-group" id="errorcost">
      <label for="qty">Net Amt.</label>
      <input type="text" id="amt" name="amt" value="<?php echo $key->cns_namt; ?>" class="form-control"  readonly="true">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group" id="errorcost">
      <label for="qty">App. Payment</label>
      <input type="text" id="apay" name="apay" class="form-control" value="" readonly="true">
      </div>
    </div>
    <div class="form-group col-sm-2">
      <label for="">AP Date :</label>
      <input type="date" id="vchdate"  readonly="true"value="<?php echo $key->cns_gldate; ?>"  name="vchdate" class="form-control daterange-single">
    </div>

    <div class="form-group col-sm-2">
      <label for="">GL Year :</label>
      <input type="text" id="glyear" value="<?php echo $key->cns_glyear; ?>" name="glyear" value="" class="form-control" readonly="true" >
    </div>

    <div class="form-group col-sm-2">
      <label for="">GL Period :</label>
      <input type="text" id="glperiod" readonly="true" value="<?php echo $key->cns_glperiod; ?>" name="glperiod" value="" class="form-control" >
    </div>
    <div class="form-group col-sm-2">
      <label for="">Data Type :</label>
      <select name="datatype" readonly="true" id="datatype" class="form-control">
        <option value="Head Office">Head Office</option>
      </select>
    </div>
    </div>
  </div>
  <br>
   <div class="col-md-12">
  <div class="tabbable">
    <ul class="nav nav-tabs nav-tabs-highlight">
    <li class="active"><a href="#pa-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
  
    </ul>
          
    <div class="tab-content">
      <div class="tab-pane has-padding active" id="pa-pill1">
        <div id="www" class="table-responsive">
          <table class="table table-hover table-xxs ">
            <thead>
              <tr>
                <th align="center">A/C</th>
                <th align="center">A/C Name</th>
                <th align="center">Cost Code</th>
                <th align="center">Dr</th>
                <th align="center">Cr</th>
              </tr>
            </thead>
            <tbody id="glacc">
              <?php $i=1; foreach ($gll as $key)  {  ?> 
                <tr>
                  <td>
                    <input type="text" class="form-control" readonly="true" name="ac_no[]" 
                    id="ac_no<?php echo $i; ?>" value="<?php echo $key->acct_no; ?>">      
                  </td>
                  <td><input type="text" id="accountname" value="<?php echo $key->act_name; ?>"  class="form-control " readonly="true"></td> 
                  <td><input type="text"  class="form-control input-sm" readonly="true" id="costcode<?php echo $i; ?>" name="costcode"  value="<?php echo $key->costcode; ?>"></td>
                  <td><input type="text" class="form-control input-sm text-right" readonly="true" name="dr[]" id="dr<?php echo $i; ?>" value="<?php echo $key->amtdr; ?>"></td>
                  <td><input type="text" class="form-control input-sm text-right" readonly="true" name="cr[]" id="cr<?php echo $i; ?>" value="<?php echo $key->amtcr; ?>"></td>
                </tr>
              <?php $i++; } ?>
           </tbody>
          </table>
        </div>
      </div>

    
      </div>
      <br>
    <div class="modal-footer">
      <div class="form-group">
      <a class="addrows btn btn-default btn-xs"><i class="icon-stackoverflow"></i> Add Row</a>
      <button type="submit" class="btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
      <a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
      </div>
    </div>
    </div>
  </div>
</fieldset>
</form>
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

<div class="modal fade" id="departm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header bg-info">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Department</h4>
    </div>
    <div class="modal-body">
    <div id="departmodel"></div>
    </div>
  </div>
  </div>
</div>

<div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header bg-info">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Project</h4>
    </div>
    <div class="modal-body">
    <div id="projectmodel"></div>
    </div>
  </div>
  </div>
</div>

<script>

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


  $("#amount").keyup(function(){
     

   var amount = ($('#amount').val().replace(/,/g,"")*1);
    var vat = ($('#pprice_unit').val().replace(/,/g,"")*1);
    var xamount = (amount*vat)/100;
    var xamtt = (xamount+amount);
      $('#cr3').val(numberWithCommas(amount));
      $('#cr2').val(numberWithCommas(xamount));
      $('#dr1 ').val(numberWithCommas(xamtt));
      $('#pamount').val((xamount));
      $('#amt').val(numberWithCommas(xamtt));
      $('#amtax').val(amount);
      $('#vattax').val(vat);
      $('#amttax').val(xamount);
      });

      $("#rowvat").hide();
      $("#pprice_unit").keyup(function(){
      $("#rowvat").show();
      var amount = parseFloat($('#amtax').val().replace(/,/g,""));
      var vat = parseFloat($('#pprice_unit').val().replace(/,/g,""));
      var xamount = (amount*vat)/100;
      var xamtt = (xamount+amount);
      var vcode = $('#novatcode').val();
      var vnane = $('#novatname').val();
      $('#cr3').val(numberWithCommas(amount));
      $('#cr2').val(numberWithCommas(xamount));
      $('#dr1').val(numberWithCommas(xamtt));
      $('#pamount').val(numberWithCommas(xamount));
      $('#amt').val(numberWithCommas(xamtt));
      $('#amtax').val(numberWithCommas(amount));
      $('#vattax').val(numberWithCommas(vat));
      $('#amttax').val(numberWithCommas(xamount));
      $('#vatcode').val(numberWithCommas(vcode));
      $('#vatname').val(numberWithCommas(vnane));
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
            title: "กรุณากรอก Vat % !!.",
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
   $(".vendor").click(function(){
   $('#vendormodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#vendormodel").load('<?php echo base_url(); ?>index.php/share/vender');
   });

   $(".departm").click(function(){
   $('#departmodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#departmodel").load('<?php echo base_url(); ?>index.php/share/department');
   });


  $(".project").click(function(){
   $('#projectmodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#projectmodel").load('<?php echo base_url(); ?>index.php/ap/modal_project');
   });

$("#saveapd").click(function(e){
  var url="<?php echo base_url(); ?>ap_active/selectdate";
        var dataSet={
        d: $("#vchdate").val(),
        y: $("#glyear").val(),
        m: $("#glperiod").val()
        };
      $.post(url,dataSet,function(data){
      if (data!="Y") {
        swal({
          title: "งวดบัญชีผิด กรุณาเลือกวันที่ใหม่ !!.",
          text: "",
          confirmButtonColor: "#EA1923",
          type: "error"
        });
        }else if ($("#vendor_id").val()=="") {
  swal({
      title: "กรุณาเลือก Vender !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if($("#pre_event").val()==""){
  swal({
      title: "กรุณาเลือก project!!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if($("#cterm").val()==""){
  swal({
      title: "กรุณาเลือก Cr Term!!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
     var frm = $('#fapd');
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
      
                        // setTimeout(function() {
                        // window.location.href = "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apd_payvoucher.mrt&no=<?php echo $apd_code; ?>";
                        // }, 500);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#fapd").submit();
      }
});
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
