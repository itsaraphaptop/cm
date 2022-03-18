<div class="content-wrapper">
 <?php
  $datestring = "Y";
  $mm = "m";
  $dd = "d";

  $this->db->select('*');
  $qu = $this->db->get('ap_cheque_header');
  $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

  if ($res==0) {
    $wtcode = "WT".date($datestring).date($mm)."000"."1";
    $acc_id ="1";
  }else{
    $this->db->select('count(ap_wtcode) as count_wt');
    $q = $this->db->get('ap_cheque_header');
    $run = $q->result();
    foreach ($run as $valx)
    {
      $x1 = $valx->count_wt+1;
    }

    if ($x1<=9) {
      $wtcode = "WT".date($datestring).date($mm)."000".$x1;
      $acc_id = $x1;
    }
    elseif ($x1<=99) {
       $wtcode = "WT".date($datestring).date($mm)."00".$x1;
       $acc_id = $x1;
    }
     elseif ($x1<=999) {
      $wtcode = "WT".date($datestring).date($mm)."0".$x1;
      $acc_id = $x1;
    }
  }
 ?>
<?php
  $datestring = "Y";
  $mm = "m";
  $dd = "d";

  $this->db->select('*');
  $qu = $this->db->get('ap_cheque_header');
  $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

  if ($res==0) {
    $jvcode = "AC".date($datestring).date($mm)."000"."1";
    $acc_id ="1";
  }else{
    $this->db->select('*');
    $this->db->order_by('ap_id','desc');
    $this->db->limit('1');
    $q = $this->db->get('ap_cheque_header');
    $run = $q->result();
    foreach ($run as $valx)
    {
      $x1 = $valx->ap_id+1;
    }

    if ($x1<=9) {
      $jvcode = "AC".date($datestring).date($mm)."000".$x1;
      $acc_id = $x1;
    }
    elseif ($x1<=99) {
       $jvcode = "AC".date($datestring).date($mm)."00".$x1;
       $acc_id = $x1;
    }
     elseif ($x1<=999) {
      $jvcode = "AC".date($datestring).date($mm)."0".$x1;
      $acc_id = $x1;
    }
    elseif ($x1<=9999) {
      $jvcode = "AC".date($datestring).date($mm).$x1;
      $acc_id = $x1;
    }

  }
$ven = $this->db->query("SELECT * from vender where vender_code = '$no' ")->result();
  foreach ($ven as $gg) {
    $vendername = $gg->vender_name;
  }
 ?>
<div class="page-header">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Approve Payment Cheque</h6>
            <div class="heading-elements">
              <ul class="icons-list">
                <li style="color: #ffffff"><a class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><i class=" icon-file-plus"></i> Select</a></li>                
              </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
          </div>
          <form id="fapp" action="<?php echo base_url(); ?>ap_active/ap_approve_cheque" method="post">
            <div class="panel-body">              
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-2">
                    <label for="">Vender Code :</label><div id="cccc"></div>
                    <input type="hidden" value="<?php echo $jvcode; ?>" name="app_code">
                    <input type="hidden" value="<?php echo $wtcode; ?>" name="wtcode">
                    <input type="text" id="vendor_id" name="vendor_id" class="form-control" value="<?php echo $no; ?>" readonly="true">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="">Vender Name :</label>
                    <input type="text" id="namevender" name="namevender" class="form-control" value="<?php echo $vendername; ?>" readonly="true">
                  </div>
                  <div class="form-group col-sm-2">
                    <label for="">Paid Type :</label>
                    <select id="paidtype" name="paidtype" class="form-control text-center">
                    <option value=""></option>
                    <?php $option = $this->db->query("SELECT * from option_type")->result(); 
                    foreach ($option as $op) {
                    ?>
                      <option value="<?php echo $op->op_id; ?>"><?php echo $op->op_name; ?></option>
                    <?php } ?>
                    </select>
                  </div> 
                  <div class="form-group col-sm-2">
                    <label for="">Ref. No:</label>
                    <input type="text" id="refno" name="refno" class="form-control daterange-single">
                  </div>  
                  <div class="form-group col-sm-2">
                    <label for="">Ref. Date:</label>
                    <input type="date" id="refdate" name="refdate" class="form-control daterange-single">
                  </div>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-3">
                    <div class="form-group">
                      <label>Bank:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" readonly="readonly" placeholder="Bank" name="bankname" id="bankname" required="true">
                        <input type="hidden" readonly="true" class=" form-control input-sm" name="bankid" id="bankid">                   
                        <input type="hidden" readonly="true" class=" form-control input-sm" name="branchd" id="branchid">
                        <input type="hidden" readonly="true" class=" form-control input-sm" name="acc_code" id="acc_code">
                        <div class="input-group-btn">
                          <button type="button" id="bank_md" class="btn btn-info btn-icon"><i class="icon-search4"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-3">
                      <label>branch:</label>
                      <!-- <div class="input-group"> -->
                        <input type="text" class="form-control" readonly="readonly" placeholder="branch" name="branch" id="branch"> 
                      <!-- </div> -->
                  </div>
                  <div class="form-group col-sm-2">
                    <div class="checkbox checkbox-switchery switchery-xs">
                      <label class="display-block">
                        <input type="radio" id="cheque" checked="checked" name="cheq" value="1"> Cheque<br>
                        <input type="radio" id="whchktax" name="cheq" value="2"> Transfer bank<br>
                        <input type="radio" id="chedi" name="cheq" value="3"> Cheque Direct
                      </label>
                    </div>
                  </div>
                  <div id="whtaxchk">
                    <div class="col-xs-2">
                        <div class="form-group">
                          <label for=""> Transfer Bank A/C</label>
                          <input type="number" class="form-control input-sm" id="trac" value="" name="trac">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                          <label for=""> Date</label>
                          <input type="date" class="form-control input-sm" id="tracdate" value="" name="tracdate">
                        </div>
                    </div>
                  </div>
                  <div id="cheqchk">
                    <div class="form-group col-sm-2">
                      <label for="">Cheque No. :</label>
                      <input type="number" id="chno" maxlength="8" name="chno" class="form-control">
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="">Cheque Date:</label>
                        <input type="date" id="chnodate" name="chnodate" class="form-control daterange-single">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="">Paid To :</label>
                    <input type="text" id="paidto" name="paidto" value="<?php echo $vendername; ?>" class="form-control">
                  </div>   
                  <div class="form-group col-sm-6">
                    <label for="">Remark :</label>
                    <input type="text" id="remark" name="remark" class="form-control">
                    <input type="hidden" id="chkk" name="" class="form-control">
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
                          <th >AP/No</th>
                          <th >Duedate</th>
                          <th >PO/WO No.</th>
                          <th >Tax No.</th>
                          <th >Paid Net Amount</th>
                          <th >Less Other</th>
                          <th >Amount</th>
                          <th >Advance Amount</th>
                          <th >Vat Amount</th>
                          <th >W/T Amount</th>
                        </tr>
                      </thead>
                      <tbody id="all">
                      </tbody>
                      <tr>
                        <td colspan="4">Total</td>
                        <td><input style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" type="text" value="0" id="tot" name="tot"></td>
                        <td><input style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" type="text" value="0" id="less" name="less"></td>
                        <td><input style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" type="text" value="0"  id="toa" name="toa"></td>
                        <td><input  style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" type="text" value="0" id="toadv" name="toadv"></td>
                        <td><input  style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" type="text" value="0" id="tov" name="tov"></td>
                        <td><input  style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" type="text" value="0" id="tow" name="tow"></td>
                      </tr>
                  </table>
                </div>
              </div> 
              <br>
              <div class="text-right">
                  <a href="<?php echo base_url(); ?>ap/openall/<?php echo $no; ?>"  class="btn btn-default btn-xs"><i class="icon-plus22"></i>New</a>                
                  <button type="button" id="saveapp" class="btn btn-success" id="sweet_success"><i id="icon_save" class="icon-floppy-disk position-left"></i> Save </button>                
              </div> 

              <div id="gll" style="display:none">
                <table  class="table table-hover table-bordered table-striped table-xxs">
                  <thead>
                    <tr>
                    </tr>
                  </thead>
                  <tbody id="tablegl">                    
                  </tbody>
                </table>
              </div>  
            </div>
          </form>                      
        </div>
      </div>
    </div>
  </div>
</div>  <!-- /content area -->

<div  id="openbank" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close_md" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Bank</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_bank">
            </div>
            </div>
        </div>
    </div>
  </div>
</div> 

<div class="modal fade" id="openinv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Select</h4>
      </div>
      <div class="modal-body">
        <div id="openallmodal"></div>
      </div>
    </div>
  </div>
</div>



<script>
// $("#gll").hide();
// $(window).load(function(){
//   $("#cccc").load('<?php echo base_url(); ?>index.php/ap_active/ap_clear/<?php echo $no; ?>');
// });
$("#whtaxchk").hide();

$("#whchktax").click(function(){
  $("#whtaxchk").show();  
  $("#cheqchk").hide();
} );
$("#cheque").click(function(){
  $("#whtaxchk").hide();
  $("#cheqchk").show();
  } );
$("#chedi").click(function(){
  $("#whtaxchk").hide();
  $("#cheqchk").show();
  } );
</script>


<script>

   $("#bank_md").click(function(event){
    if ($("#chkk").val()=="") {
      swal({
          title: "Please Select Add Row!!.",
          text: "",
          confirmButtonColor: "#EA1923",
          type: "error"
      });
      return false;
    }else{
      $('#openbank').modal('show');
      $('#modal_bank').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_bank").load('<?php echo base_url(); ?>index.php/share/bank');     
    }
  });            

  //  $(".openinv").click(function(){
   $('#openallmodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#openallmodal").load('<?php echo base_url(); ?>ap/openallmodal/<?php echo $no; ?>');
  //  });

$("#saveapp").click(function(e){
// if ($("#chno").val()=="") {
//   swal({
//       title: "Please Select Cheque  No  !!.",
//       text: "",
//       confirmButtonColor: "#EA1923",
//       type: "error"
//   });
// }else
 if($("#bank_id").val()==""){
  swal({
      title: "Please Select Bank !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
  }else if($("#chnodate").val()==""){
  swal({
      title: "Please Fill Date Cheque !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
  }else if($("#paidtype").val()==""){
swal({
    title: "Please Select Paid Type !!.",
    text: "",
    confirmButtonColor: "#EA1923",
    type: "error"
});
}else if($("#bankid").val()==""){
swal({
    title: "Please Select Bank !!!.",
    text: "",
    confirmButtonColor: "#EA1923",
    type: "error"
});
}else if($("#bankid").val()==""){
swal({
    title: "กรุณาเพิ่มฝังบัญชีธนาคาร !!!.",
    text: "",
    confirmButtonColor: "#EA1923",
    type: "error"
});
}else{

  $('#saveapp').attr('class', 'btn btn-success disabled');
  $('#icon_save').attr('class', 'icon-spinner2 spinner');
  // alert('submit');
    var frm = $('#fapp');
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
                        window.location.href = "<?php echo base_url(); ?>ap/showap_approve/<?=$jvcode; ?>";
                        $('#saveapp').attr('class', 'btn btn-success disabled');
                        $('#saveapp').attr('disabled', 'disabled');
                        $('#icon_save').attr('class', 'icon-floppy-disk position-left');
                      }, 500);
                      
                  }
              });
              ev.preventDefault();

          });
        $("#fapp").submit();
    }
});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/internationalization/i18next.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/internationalization_switch_direct.js"></script>

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
