<?php 
$datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('ap_pettycash_header');
   $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

   if ($res==0) {
     $apocode = "APO".date($datestring).date($mm)."000"."1";
      $arno ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('ap_id','desc');
     $this->db->limit('1');
     $q = $this->db->get('ap_pettycash_header');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $x1 = $valx->ap_id+1;
     }

     if ($x1<=9) {
        $apocode = "APO".date($datestring).date($mm)."000".$x1;
        $arno = $x1;
     }
     elseif ($x1<=99) {
       $apocode = "APO".date($datestring).date($mm)."00".$x1;
       $arno = $x1;
     }
     elseif ($x1<=999) {
       $apocode = "APO".date($datestring).date($mm)."0".$x1;
       $arno = $x1;
     }
   }
 ?>
<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <form id="formpetty" method="post" action="<?php echo base_url(); ?>ap_petty/add_pettycash">
        <div class="panel panel-flat">
          <div class="panel-heading ">
            <h5 class="panel-title">Account Payable (Petty Cash)</h5>
            <div class="heading-elements">
              <ul class="icons-list">
                <li><a style="color:#FFFFFF " class="openinv btn btn-info " data-toggle="modal" data-target="#openinv"><i class=" icon-file-plus"></i></span> Select</a></li>
              </ul>
            </div>
          </div>

          <div class="panel-body">
            <fieldset>
              <div class="row"> 
                <div class="col-md-2">
                  <div class="form-group">
                    <label>petty Cash No :</label>
                    <input type="text" class="form-control"  name="docno" value="" id="docno" readonly="readonly" value="">
                    <input type="hidden" class="form-control"  name="code" value="<?php echo $apocode; ?>" id="code" readonly="readonly" value="">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Vendor Name :</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                        </span>
                        <input type="text" class="form-control" placeholder="Owner/Customer" readonly   name="vendorname" id="vendorname" >
                        <input type="hidden" name="venderid" id="venderid">
                      </div>
                  </div> 
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Project/Department Name :</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                      </span>
                      <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="" name="projectname" id="namepro">
                      <input type="hidden" readonly="true" value="" class="form-control input-sm" name="projectid" id="putprojectid">
                    </div>
                  </div>
                </div>
              </div>             
              <div class="row">
                <div class="col-md-2">                   
                  <label>System Type:</label>
                  <div id="job" readonly="true">
                  <input type="text" class="form-control" readonly="readonly">
                  </div>                     
                </div>
                <!-- <div class="col-md-5">                
                  <div class="form-group">
                    <label>Department Name :</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                      </span>
                      <input type="text" class="form-control" readonly="readonly" placeholder="Department" value="" name="dename" id="dename">
                      <input type="hidden" readonly="true" value="" class=" form-control input-sm" name="decode" id="decode">
                    </div>
                  </div> 
                </div> -->
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Remark :</label>
                    <input type="text" class="form-control"  name="remark" id="remark" value="" >
                  </div>    
                </div>
              </div>
                <!-- <div class="col-md-3">
                  <div class="form-group">
                    <label>Vender Type: </label>                      
                      <input type="text" class="form-control"  id="voutype" name="voutype" placeholder="Vender Type">
                    </div>
                </div> -->

                <!-- <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Ref No.:</label>
                      <input type="text" class="form-control"  id="refno" name="refno" placeholder="Ref No.">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Currency.:</label>
                      <input type="text" class="form-control text-center" id="currency" name="currency" readonly="true">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Exchange.:</label>
                      <input type="text" class="form-control text-center" id="exchange" name="exchange" value="0.00">
                    </div>
                  </div>
                </div> -->
                <div class="row">
                 <!--  <div class="col-md-4">
                    <label>AP Voucher No:</label>
                    <div class="form-group">
                      <input type="text" class="form-control text-center" id="arno" name="arno" placeholder="AR Voucher No" value=""  readonly="readonly">
                      <input type="hidden" class="form-control text-center" id="apowt" name="apowt" placeholder="AR Voucher No" value=""  readonly="readonly">
                    </div>
                  </div> -->
                <div class="col-md-3">
                  <div class="form-group" >
                    <label>Doc Date: </label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                      <input type="text" readonly="true" class="form-control daterange-single"  id="docdate" name="docdate">
                      <input type="hidden" class="form-control"  id="crterm" name="crterm">
                    </div>
                  </div>
                </div>
                  <div class="col-md-2">
                    <label>AP Date: </label>
                    
                      <input type="date" id="ardate" name="ardate" class="form-control daterange-single">
                  
                  </div>
                  <div class="col-md-2">
                      <label>Year : </label>
                        <input type="text" id="ap_year" name="ap_year" class="form-control" readonly="true" >
                   </div>
                  <div class="col-md-2">
                    <label>Period:</label>                    
                      <input type="text" class="form-control text-center" id="period" name="period" readonly="true">
                    </div>
                </div>
             
            </fieldset>
            <br>
            <div class="row">
              <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                  <li class=""><a href="#p1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i>Expense</a></li>
                  <li class="active"><a href="#p2" data-toggle="tab" aria-expanded="true"><i class=" icon-list-unordered position-left"></i>GL</a></li>
                  <li class=""><a href="#p3" data-toggle="tab" aria-expanded="false"><i class=" icon-calendar22 position-left"></i>Cost Center</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane has-padding " id="p1">
                    <div id="expense" class="table-responsive">
                    </div>
                  </div>
                  <div class="tab-pane has-padding active" id="p2">
                    <div id="gllll" class="table-responsive">
                    </div>
                  </div>
                  <div class="tab-pane has-padding" id="p3">
                    <div id="cost_center" class="table-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="text-right">
              <a href="<?php echo base_url(); ?>ap_petty/ap_pettycash"  class="btn btn-info "><i class="icon-plus22"></i>New</a>
             <!--  <a data-toggle="modal"  id="update" data-target="#retrieve_inv" class="btn btn-default "><i class="icon-stackoverflow"></i>Retrieve</a> -->
              <button type="button" id="sapv" class="bsave btn btn-success "><i class="icon-floppy-disk position-left"></i> Save</button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
        </div>
      </form>
    </div>               
  </div>
</div>

<div id="openinv" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Select Petty Cash</h5>
      </div>

      <div class="modal-body">
        <div id="loadinv">
        </div>
      </div>
      <br>
      <!-- <div class="modal-footer">
        <a type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</a>
      </div> -->
    </div>
  </div>
</div>
<script>
  $(".openinv").click(function(){
    $("#loadinv").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#loadinv").load('<?php echo base_url(); ?>ap_petty/load_pettycash');
  });

  $("#ardate").change(function(event) {
  var de_date = $("#ardate").val();
  var y = de_date.slice(0,4); 
  var m = de_date.slice(5,7);

  $("#period").val(m);
  $("#ap_year").val(y);         

  });                        
</script>
<script>
$("#sapv").click(function(e){
var url="<?php echo base_url(); ?>ap_active/selectdate";
        var dataSet={
        d: $("#ardate").val(),
        y: $("#ap_year").val(),
        m: $("#period").val()
        };
      $.post(url,dataSet,function(data){
      // if (data!="Y") {
        // alert(data);
        // // swal({
        // //   title: "งวดบัญชีผิด กรุณาเลือกวันที่ใหม่ !!.",
        // //   text: "",
        // //   confirmButtonColor: "#EA1923",
        // //   type: "error"
        // // });
        // }else{
        //   alert("skldjflkds");
          var count = $('#gllll > table').length;
          // alert(count);
          if(count > 0) {
            $('#sapv').attr('class', 'btn btn-success disabled');
            $('#icon_save').attr('class', 'icon-spinner2 spinner');

            var frm = $('#formpetty');
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
                                window.location.href = "<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apo_payvoucher.mrt&no=<?php echo $apocode; ?>";
                                  $('#sapv').attr('class', 'btn btn-success btn-xs disabled');
                                  $('#icon_save').attr('class', 'icon-floppy-disk position-left');
                                }, 500);                       
                            }
                        });
                        ev.preventDefault();
                    });
                  $("#formpetty").submit();

          }else{
            swal({
              title: "Select Petty Cash !!.",
              text: "",
              confirmButtonColor: "#EA1923",
              type: "error"
            });
          }
      // }
        });
       });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
