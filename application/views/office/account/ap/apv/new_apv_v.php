<?php 
  $datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('apv_header');
   $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

   if ($res==0) {
     $apvcode = "APV".date($datestring).date($mm)."000"."1";
      $apv_id ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('apv_id','desc');
     $this->db->limit('1');
     $q = $this->db->get('apv_header');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $x1 = $valx->apv_id+1;
     }

     if ($x1<=9) {
        $apvcode = "APV".date($datestring).date($mm)."000".$x1;
        $apv_id = $x1;
     }
     elseif ($x1<=99) {
       $apvcode = "APV".date($datestring).date($mm)."00".$x1;
       $apv_id = $x1;
     }
     elseif ($x1<=999) {
       $apvcode = "APV".date($datestring).date($mm)."0".$x1;
       $apv_id = $x1;
     }
   }
 ?>

<div class="content-wrapper">
  <div class="content">
  <fieldset>
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h6 class="panel-title">Account Payable (APV)</h6>
        <div class="heading-elements">
          <div class="col-md-12">
            <ul class="icons-list">
              
              <li><button class="openporec btn  btn-info btn-xs" id="cvendor" data-toggle="modal" data-target="#openporec"><i class=" icon-file-plus"></i> Select</button></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <form id="fapv" action="<?php echo base_url(); ?>ap_active/addnewap" method="post">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <label for="">Vender Name</label>             
                <input type="text" class="form-control" readonly="true" placeholder="Vender Name" id="vender" name="vender">
                <input type="hidden" class="form-control" readonly="true" placeholder="Vender Name" id="venderid" name="venderid">
                <input type="hidden" class="form-control" value="<?php echo $apvcode; ?>" id="apvcode" name="apvcode">
                <input type="hidden" class="form-control" value="<?php echo $apv_id; ?>" id="apv_id" name="apv_id">
                <input type="hidden" id="po_no">
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="">P/O No.</label>
                  <input type="text" class="form-control" readonly="true" placeholder="P/O No." id="pono" name="pono">
                  <input type="hidden" id="user" value="<?php echo $name; ?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="">Description .</label>
                  <input type="text" class="form-control" readonly="true" placeholder="Description " id="dascr" name="dascr">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="">Tax  No</label>
                <input type="text" class="form-control" id="taxno" placeholder="Tax No" name="taxno">
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
                  <input type="date" class="form-control" value="<?php ?>" id="duedate" name="duedate" readonly="true">
                  <input type="hidden" class="form-control" id="icdate" name="icdate" >
                <!-- </div> -->
              </div>
              <div class="col-md-3">
                <label for="">Credit Term</label>              
                  <input type="text" class="form-control" id="crterm" placeholder="Credit Term" onkeyup="ch_date($(this))" name="crterm">   
              </div>
              <div class="col-md-3">
                <label for="">Project/Department Name</label>
                <input type="text" class="form-control" readonly="true" placeholder="Project Name" id="projectname" name="projectname">
                <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid">
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>System Type</label>
                  <input type="text" class="form-control" readonly="true" placeholder="แผนก" id="system" name="system">
                  <input type="hidden" class="form-control" readonly="true" placeholder="แผนก" id="systemid" name="systemid">
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="">Receive No.</label>
                  <input type="text" class="form-control" readonly="true" placeholder="เลขที่ใบรับของ" id="porecx" name="porecx">
                  <input type="hidden" id="chkk" name="" class="form-control">
                </div>
              </div>
              <!-- <div class="col-md-3">
                <label for="">Department</label>
                <input type="text" class="form-control" readonly="true" placeholder="แผนก" id="departname" name="departname">
                <input type="hidden" class="form-control" readonly="true" id="departid" name="departid">
              </div> -->
              <div class="col-md-1">
                <div class="form-group">
                <input type="hidden" id="po_pono">
                <label>Less Advance</label>
                <input type="text" id="downper" name="downper" class="form-control" >
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" id="downper_value" attr-type="down" name="downper_value" class="form-control less">
                <input type="hidden" id="down_default">
                </div>
              </div>
              <div class="col-md-2 text-center">
                <div class="form-group">
                <label>&nbsp; </label>
                <div></div>
                  <button type="button" id="ch_less" class="btn btn-default">Check LessAdvance</button>
                  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ch_less">Open Modal</button> -->
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                <label>Less Retention</label>
                <input type="text" id="retentionper" name="retentionper" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" id="retention_value" name="retention_value" attr-type="reten" class="form-control less">
                <input type="hidden" id="reten_default">
                </div>
              </div>
            </div>
          </div>        
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group" id="errorcost">
                  <label for="qty">Amount</label>
                  <input type="text" id="amount" name="qty"  placeholder="กรอกปริมาณ" class="form-control  text-right" value="0">
                  <input type="hidden" id="amount_default" class="form-control  text-right" value="0">
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label for="price_unit">Vat %</label>
                   <input type="text" id="pprice_unit" maxlength="1"  name="price_unit" class="form-control text-right" readonly="true">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="amount">VAT Amount</label>
                  <input type="text" id="pamountt"  readonly="true" name="pamount"  class="form-control  text-right">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group" id="errorcost">
                  <label for="qty">Net Amount</label>
                  <input type="text" id="amtt" name="amt" class="form-control text-right" readonly="true">
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
                <input type="date" id="vchdate" name="vchdate" value="<?php ?>" class="form-control daterange-single">
              </div>
              <div class="form-group col-sm-2">
                <label for="">Year :</label>
                <input type="text" id="glyear" name="glyear" class="form-control" readonly="true" >
              </div>
              <div class="form-group col-sm-2">
                <label for="">Period :</label>
                <input type="text" id="glperiod" name="glperiod" class="form-control" readonly="true">
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
              <div id="vat" class="table-responsive">              
              </div>
            </div>
            <div id="panel-pill2" class="tab-pane has-padding ">
              <div id="meterialr" class="table-responsive">
              </div>
            </div>
            <div id="panel-pill3" class="tab-pane has-padding">
              <div id="tax" class="table-responsive">              
              </div>
            </div>
          </div>
          <br>
          <div class="modal-footer">
             <div class="form-group">
                <a href="<?=base_url();?>ap/ap_main" class="btn btn-primary" ><i class="icon-plus-circle2 position-left"></i> New</a>
                <button type="button" id="sapv" class="bsave btn bg-success" ><i id="icon_save" class="icon-floppy-disk"></i> Save</button>
                <a href="#" id="close" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
              </div>
          </div>
          <div id="ch_lessModal" class="modal" role="dialog" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Check LessAdvance</h4>
                </div>
                <div class="modal-body">
                  <div id="content_advance"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">ok</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </fieldset>
  </div>
</div>


<div class="modal fade" id="openporec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select P/O No.</h4>
      </div>
      <div class="modal-body">
        <div id="modal_recpo">
        </div>
      </div>
    </div>
  </div>
</div>

<script>

function down_fun(val) {
  $.get(`<?=base_url();?>ap/less_advance_master/${val}`,
    function () {
    }
  ).done(function(data) {
    $('#glacc').append(data);
  });
}
var delayID=null;

$(".less").on("keyup",function(event){
    
    var val = $(this).val()*1;
    var type = $(this).attr('attr-type');
    if(delayID){ clearTimeout(delayID);} 

    delayID=setTimeout(function(){

        var input_data=$("#sample_input").val();

        // console.log(input_data); // ทำคำสั่งที่ต้องการ
        if (type == 'down') {
          down_bunsee(val);
        }
        
        if (type == 'reten') {
          retention_bunsee(val);
        }
        process_vat();
        delayID=null;

    },1500);                        

});

function process_vat() {
  let down = $('#downper_value').val()*1;
  let amt = $('#amount').val()*1;
  let vat = $('#pprice_unit').val()*1;
  let new_vat = (amt - down)*vat/100;
  $('#pamountt').val(new_vat);
  $('#dr_vat').val(new_vat);
}
$('#amount').keyup(function(){
  var amt_ = $('#amount_default').val()*1;
  var _this = $(this).val()*1;
  if(_this > amt_) {
    $(this).val(amt_);
  }
})                        

function down_bunsee(val) {
  // var val = el.val()*1;
  var val_de = $('#down_default').val()*1;
  if(val > val_de) {
    $('#downper_value').val(val_de);
  }else{
    var row_down = $('#row_down').length;
    if(val > 0 && row_down == 0) {
      down_fun(val);
    }else if(val > 0 && row_down > 0) {
      $('#row_down').remove();
        down_fun(val);
    }else{
      $('#row_down').remove();
    }
  }
  process_reten();
}

function reten_fun(val) {
  $.get(`<?=base_url();?>ap/less_retention_master/${val}`,
    function () {
    }
  ).done(function(data) {
    $('#glacc').append(data);
  });
}

function retention_bunsee(val) {
  // setTimeout(() => {
    // let val = el.val()*1;
    var row_reten = $('#row_retention').length;
    var reten_de = $('#reten_default').val()*1;
    if(val > reten_de) {
      $('#retention_value').val(reten_de);
    }else {
      if(val > 0 && row_reten == 0) {
        reten_fun(val);
      }else if(val > 0 && row_reten > 0) {
        $('#row_retention').remove();
        // setTimeout(() => {
          reten_fun(val);
        // }, 1000);
      }else{
        $('#row_retention').remove();
      }
    }
    process_reten();
    
  // }, 2000);

}

function sumdr_new_1() {
var sumdr_new = 0;
  $('.dr').each(function(index, el){
    sumdr_new += el.value*1;
  });
//   console.log(sumdr_new);
    let format_sumdr_new = numberWithCommas(sumdr_new);
  $('#sffumdr').val(format_sumdr_new);
}

function sumcr_new_2() {
var sumcr_new = 0;
  $('.cr').each(function(index, el){
    sumcr_new += el.value*1;
  });
//   console.log(sumcr_new);
   let format_sumcr_new = numberWithCommas(sumcr_new);
  $('#sffumcr').val(format_sumcr_new);
}

function process_reten() {

  setTimeout(() => {
    let amt = $('#amount').val()*1;
    let down = $('#downper_value').val()*1;
    let vat = $('#pprice_unit').val()*1;
    let reten = $('#retention_value').val()*1;
    let amtdown = amt - down*1;
    // console.log(`${vat}`);
    // console.log(`amount - down = ${amtdown}`);
    let netvat = (amtdown*vat)/100;
    // alert(netvat);
    let summ = amtdown + netvat*1;
    let totol = summ - reten*1;
    console.log(`${amtdown} * ${vat} = ${netvat}`);
    // console.log(`${amtdown} + ${netvat} = ${summ}`);
    // console.log(`${summ} - ${reten} = ${totol}`);
    $('#vender_bu').val(totol);
    sumdr_new_1();
    sumcr_new_2();
  }, 2000);
}
$(".openporec").click(function(){
  $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#modal_recpo').load('<?php echo base_url(); ?>ap/openpo/<?php echo $proid; ?>');
});

  $("#vchdate").change(function(event) {
    var de_date = $("#vchdate").val();
    var y = de_date.slice(0,4); 
    var m = de_date.slice(5,7);

    $("#glperiod").val(m);
    $("#glyear").val(y);         

  }); 

  $("#taxno").keyup(function(){
    var taxno = $('#taxno').val();
    $('#taxiv').val(taxno);
    var vcode = $('#yvatcode').val();
    var yname = $('#yvatname').val();
    $('#vcode').val(vcode);
    $('#vname').val(yname);
  });

  $("#sapv").click(function(e){

    let sffumdr = $('#sffumdr').val().replace(/,/g, '');
    let sffumcr = $('#sffumcr').val().replace(/,/g, '');
    if (sffumdr == sffumcr) {

      let down = $('#downper_value').val()*1;
      let down_de = $('#down_default').val()*1;
      
      if(down > down_de) {
        swal('Warning', 'จ่ายเกินยอดที่หักไว้', 'error');
      }else{
        // alert('submit');
        swal({
          title: "Are you sure?",
          text: "ระบบจะทำการบันทึกข้อมูล ทำรายการต่อไปกด Save",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-success",
          confirmButtonText: "Save!",
          closeOnConfirm: false
        },
        function() {

          var d =  $("#vchdate").val();
          var y =  $("#glyear").val();
          var m =  $("#glperiod").val();


          if($("#crterm").val()=="") {
            swal({
                title: "Please Fill Credit Term!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });

            return false;
          }
          //check period
          // http://127.0.0.1/cm/index.php/data_master/check_period/2020/01
          $.post(`<?=base_url();?>data_master/check_period/${y}/${m}`,
            function () {
            }
          ).done(function(data) {

            let json_res = JSON.parse(data);
            if (json_res.status === false) {

              // ไม่มี ปี/เดือนใน setup period
              swal({
                title: json_res.message,
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
              });
              // ไม่มี ปี/เดือนใน setup period

            }else{

              $('#sapv').attr('class', 'btn btn-success disabled');
              $('#icon_save').attr('class', 'icon-spinner2 spinner');


              // submit
              var frm = $('#fapv');
              // $("#fapv").submit();
              $.post(`<?php echo base_url(); ?>ap_active/addnewap`, frm.serialize(),
                function () {
                }
              ).done(function(data){
                console.log(data);
                  swal({
                      title: "Save Completed!!.",
                      text: "Save Completed!!.",
                      // confirmButtonColor: "#66BB6A",
                      type: "success"
                  });
                  setTimeout(function() {
                  window.location.href = '<?php echo base_url(); ?>ap/ap_edit_apv/<?php echo $apvcode; ?>/apv/'+$('#venderid').val()+'/<?=$this->uri->segment(3);?>';
                    $('#sapv').attr('class', 'btn btn-success btn-xs disabled');
                    $('#icon_save').attr('class', 'icon-floppy-disk position-left');
                 }, 500);
                
              })
            }

          });
        });
      }
   
    }else{
      swal('Wraning', "Not balance! dr and cr", 'error');
    }
  });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script>

  $('#ch_less').click(function() {
    let po_no = $('#po_pono').val();
    let downper_value = $('#downper_value').val()*1;
    if(po_no != '') {

      $.post(`<?=base_url();?>ap/check_advance/${po_no}/${downper_value}`,
        function () { 
        }
      ).done(function(data) {
        $('#ch_lessModal').modal('show');
        $('#content_advance').html(data);
      });

    }else{
      // alert('ว่าง');
    }
  });

  $( "#cvendor" ).click(function() {
  $(".bsave").prop("disabled",false);
});

function ch_date(el) {
  let days = Math.round(el.val()*1);
  // console.log(days);
  $.get(`<?=base_url();?>ap/date/${days}`,
    function () {
    }
  ).done(function(data) {
    $('#duedate').val(data);
  });

}

// content_advance
</script>
