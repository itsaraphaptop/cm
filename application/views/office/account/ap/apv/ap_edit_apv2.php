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
  <!-- Page header -->
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li>รายการตั้งเจ้าหนี้ทั้งหมด (Vender)</li>
        </ul>
    </div>
  </div>


<fieldset>
  <div class="panel panel-flat border-top-lg border-top-success">
    <div class="panel-heading">
      <h6 class="panel-title">บันทึกตั้งเจ้าหนี้การค้า (APV)</h6>
      <div class="heading-elements">
        <div class="col-md-12">
          <ul class="icons-list">
            <!-- <li><a href="<?php echo base_url(); ?>ap/ap_main" class="btn btn-info btn-xs"><i class="icon-file-plus"></i> เพิ่มใหม่</a></li> -->
            <!-- <li><button class="openporec btn btn-warning btn-xs" id="cvendor" data-toggle="modal" data-target="#openporec"><i class="icon-file-plus"></i> เลือกรายการรับของ</button></li> -->
          </ul>
        </div>
      </div>
    </div>
    <div class="panel-body">
      <form id="fapv" action="<?php echo base_url(); ?>ap_active/editapv/<?php echo $code; ?>" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">Vender</label>             
              <input type="text" class="form-control" value="<?php echo $ven_name; ?>" readonly="true" placeholder="ร้านค้า" id="vender" name="vender">
              <input type="hidden" class="form-control" value="<?php echo $ven_code; ?>" readonly="true" placeholder="ร้านค้า" id="venderid" name="venderid">
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
                <label for="">TAX Inv No.</label>
              <input type="text" class="form-control" value="<?php echo $taxno; ?>" id="taxno" readonly="" placeholder="Tax No" name="taxno">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">Due Date:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                <input type="date" class="form-control daterange-single" placeholder="วันที่ใบกำกับภาษี" id="duedate" name="duedate" readonly="true" value="<?php echo $apv_duedate; ?>">
              </div>
            </div>
            <div class="col-md-3">
              <label for="">Cr Term</label>              
                <input type="text" value="<?php echo $apv_crterm; ?>" class="form-control" id="crterm" placeholder="เงื่อนไขชำระ" name="crterm">   
            </div>
            <div class="col-md-3">
              <label for="">โครงการ</label>
              <input type="text" value="<?php echo $pro_name; ?>" class="form-control" readonly="true" placeholder="โครงการ" id="projectname" name="projectname">
              <input type="hidden" value="<?php echo $pro_code; ?>" class="form-control" readonly="true" id="projectid" name="projectid">
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>ระบบ</label>
                <input type="text" class="form-control" value="<?php echo $system_name; ?>" readonly="true" placeholder="แผนก" id="system" name="system">
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="">เลขที่ใบรับของ</label>
                <input type="text" class="form-control" readonly="true" value="<?php echo $ic_code; ?>" placeholder="เลขที่ใบรับของ" id="porecx" name="porecx">
              </div>
            </div>
            <div class="col-md-3">
              <label for="">แผนก</label>
              <input type="text" value="<?php echo $dep_name; ?>" class="form-control" readonly="true" placeholder="แผนก" id="departname" name="departname">
              <input type="hidden" value="<?php echo $apv_department; ?>" class="form-control" readonly="true" id="departid" name="departid">
            </div>
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
              <label for="qty">Less Adv.</label>
              <input type="text" id="lessadv" value="<?php echo $apv_lessadv; ?>" name="lessadv" class="form-control" readonly="true" >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
              <label for="qty">Less Ret.</label>
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
                <input type="text" id="amount" readonly="true" name="qty" value="<?php echo number_format($apv_netamt); ?>"  placeholder="กรอกปริมาณ" class="form-control  text-right" >
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label for="price_unit">Vat %</label>
                 <input type="text" id="pprice_unit" readonly="true" maxlength="1" value="<?php echo $apv_vatper; ?>"  name="price_unit" placeholder="ราคา/หน่วย" class="form-control text-right"  >
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="amount">Vat</label>
                <input type="text" id="pamount"  readonly="true" name="pamount" placeholder="กรอกจำนวนเงิน" class="form-control  text-right" value="<?php echo number_format($apv_vat); ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" id="errorcost">
                <label for="qty">Net Amt.</label>
                <input type="text" id="amt" name="amt" class="form-control  text-right" value="<?php echo number_format($apv_totamt); ?>" readonly="true">
              </div>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Data Type :</label>
              <select name="datatype" id="datatype" class="form-control">
                <option value="Normal">Normal</option>
              </select>
            </div>      
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">          
            <div class="form-group col-sm-2">
              <label for="">AP Date :</label>
              <input type="date" id="vchdate" value="<?php echo $apv_date; ?>" name="vchdate" class="form-control daterange-single">
            </div>
            <div class="form-group col-sm-2">
              <label for="">GL Year :</label>
              <input type="text" id="glyear" name="glyear" value="<?php echo $apv_glyear; ?>" class="form-control" readonly="true" >
            </div>
            <div class="form-group col-sm-2">
              <label for="">GL Period :</label>
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
                    <th width="10%">#</th>
                    <th width="10%">Account Code</th>
                    <th width="20%">Account Name</th>
                    <th width="10%">Cost Code</th>
                    <th width="10%">Dr</th>
                    <th width="10%">Cr</th>
                  </tr>
               </thead>
               <?php $i=1;
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
                        <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-default btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
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
                        <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-default btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                    </span>
                  </div>


                </td>
                <?php }else { ?>
                <td>
                 <input type="text" class="form-control" readonly="true" name="ac_no[]" 
                  id="acc_no<?php echo $i; ?>" value="<?php echo $key->acct_no; ?>">  
                </td>
                <?php } ?>

                <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $key->act_name; ?>"  class="form-control " readonly="true"></td> 
                <td><input type="text"  class="form-control input-sm" readonly="true" id="costcode<?php echo $i; ?>" name="costcode"  value="<?php echo $key->costcode; ?>"></td>
                <td><input type="text" class="form-control input-sm text-right dr <?=$amt ?> <?=$vat ?>" name="dr[]" id="dr<?php echo $i; ?>" value="<?php echo $key->amtdr; ?>"></td>
                <td><input type="text" class="form-control input-sm text-right <?=$vender ?>" readonly="true" name="cr[]" id="cr<?php echo $i; ?>" value="<?php echo $key->amtcr; ?>"></td>
              </tr>

            <?php $i++; } ?>
             
             
              </table>
              <script>
              // ice ทำ ice บอกห้ามลบ 
                $(".dr").keyup(function(){
                    var sum = 0;
                    $.each($(".dr"),function(index, el) {
                      //alert($(el).val());
                      sum+=($(el).val()*1);
                    });
                     $(".vender").val(sum);
                     $("#amt").val(sum);

                });

                $(".amount").keyup(function(){
                  var sumamt = 0;
                  var vat = ($('#pprice_unit').val().replace(/,/g,"")*1);
                  $.each($(".amount"),function(index, el) {
                    sumamt+=($(el).val()*1);
                    sumvat = (sumamt*vat)/100;
                  });
                  $("#amount").val(sumamt);  
                  $("#pamount").val(sumvat); 
                  $(".vat").val(sumvat);                
                });
              </script>
             

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
                    <th width="20%">Tax ID</th>
                    <th class="text-center" width="10%">Tax Date</th>
                    <th class="text-center" width="10%">Tax No</th>
                    <th class="text-center" width="10%">Amount</th>
                    <th class="text-center" width="5%">VAT</th>
                  </tr>
                </thead>
                <tbody id="tax_table">
                  <tr>
                    <?php
                    $t = 1; foreach ($tax as $tt) {
                    ?> 
                    <td><input type="text" class="form-control input-sm" value="<?php echo $tt->vender_name ?>"></td>
                    <td><input type="text" class="form-control input-sm" value="<?php echo $tt->ap_taxid ?>"></td>
                    <td><input type="text" class="form-control input-sm" value="<?php echo $tt->ap_taxdate ?>"></td>
                    <td><input type="text" class="form-control input-sm" value="<?php echo $tt->ap_taxno ?>"></td>
                    <td><input type="text" class="form-control input-sm" value="<?php echo $tt->ap_amount ?>"></td>
                    <td><input type="text" class="form-control input-sm" value="<?php echo $tt->ap_vatper ?>"></td>
                  </tr>
                   <?php $t++; } ?> 
                </tbody>
              </table>            
            </div> 
             <a class="insrows btn btn-default btn-xs"><i class="icon-plus22"></i>ADD</a>  
              <script>
                      $(".insrows").click(function(){
                        // $("#tabletax").show();
                        addrow();

                      });
                      function addrow(){
                       
                        // var amt = $('#amt').val();
                        // var vat = $('#vatt').val();
                        var vender = $('#vender').val();
                        // var ventax = $('#ventax').val();
                        var row = ($('#tax_table tr').length-0)+1;
                        var tr = '<tr>'+
                        '<input type="hidden" name="chki[]" value="i">'+
                        '<td>'+
                          '<input type="text" class="form-control" name="vendor_id[]" id="vendor_id'+row+'" value="'+vender+'">'+
                        '</td>'+
                        '<td>'+
                          '<input type="text" name="tax_id[]"  id="tax_id'+row+'" class="form-control" value="" >'+
                        '</td>'+
                        '<td>'+
                          '<input type="text" name="tax_no[]" id="tax_no'+row+'" class="form-control"> '+
                        '</td>'+
                        '<td>'+
                          '<input type="date" name="tax_date[]" id="tax_date'+row+'" class="form-control"> '+
                        '</td>'+
                        '<td>'+
                          '<input type="text" id="amount1'+row+'" style="text-align: right;" value="" class="form-control"> '+
                        '</td>'+
                        '<td>'+
                          '<input type="text" name="vatt1[]" id="vatt1'+row+'" style="text-align: right;" value="7" class="form-control"> '+                          
                        '</td>'+
                        '</tr>';

                        $('#tax_table').append(tr);
                      }
                  </script> 
          </div>
          
        </div>

        <br>
        <div class="modal-footer">
           <div class="form-group">
              <button type="button" id="sapv" class="bsave btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
              <a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
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
        <h4 class="modal-title" id="myModalLabel">เลือกรายการรับของ</h4>
      </div>
      <div class="modal-body">
        <div id="modal_recpo">
        </div>
      </div>
    </div>
  </div>
</div>

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
      var row = $(this).attr("row");
      
      $('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $(".loadaccchart").load('<?php echo base_url(); ?>share/accchart2/'+row);
      $("#accopen").modal("show");
  });

   $("#sapv").click(function(e){
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
        }else if ($("#crterm").val()=="") {
          swal({
              title: "กรุณาเลือก Cr Term !!.",
              text: "",
              confirmButtonColor: "#EA1923",
              type: "error"
          });
        }else{
             var frm = $('#fapv');
                    frm.submit(function (ev) {
                        $.ajax({
                            type: frm.attr('method'),
                            url: frm.attr('action'),
                            data: frm.serialize(),
                                    success: function (data) {
                                swal({
                                          title: "Save Completed!!.",
                                          text: "Save Completed!!.",
                                          // confirmButtonColor: "#66BB6A",
                                          type: "success"
                                      });
                          console.log(data)
                                setTimeout(function() {
                                window.location.href = "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_payvoucher.mrt&no=<?php echo $code; ?>";

                            


                                 }, 500);
                               
                            }
                        });
                        ev.preventDefault();

                    });
                  $("#fapv").submit();
              }
});
       });
</script>



<!-- <script>
  
  $("#amount").keyup(function(){
      //format num
      if (event.which >= 37 && event.which <= 40) {
          event.preventDefault();
      }

      var currentVal = $(this).val();
      var testDecimal = testDecimals(currentVal);
      if (testDecimal.length > 1) {
          console.log("You cannot enter more than one decimal point");
          currentVal = currentVal.slice(0, -1);
      }
      $(this).val(replaceCommas(currentVal));
        //format num

    var amount = ($('#amount').val().replace(/,/g,"")*1);
    var vat = ($('#pprice_unit').val().replace(/,/g,"")*1);
    var xamount = (amount*vat)/100;
    var xamtt = (xamount+amount);
      $('#dr1').val(numberWithCommas(amount));
      $('#dr2').val(numberWithCommas(xamount));
      $('#cr2').val(numberWithCommas(xamtt));
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
      $('#dr1').val(numberWithCommas(amount));
      $('#dr2').val(numberWithCommas(xamount));
      $('#cr3').val(numberWithCommas(xamtt));
      $('#pamount').val(numberWithCommas(xamount));
      $('#amt').val(numberWithCommas(xamtt));
      $('#amtax').val(numberWithCommas(amount));
      $('#vattax').val(numberWithCommas(vat));
      $('#amttax').val(numberWithCommas(xamount));
      $('#vatcode').val(numberWithCommas(vcode));
      $('#vatname').val(numberWithCommas(vnane));
  });

</script> -->