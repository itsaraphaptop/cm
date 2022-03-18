<?php
  $datestring = "Y";
  $mm = "m";
  $dd = "d";

  $this->db->select('*');
  $qu = $this->db->get('cno_header');
  $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

  if ($res==0) {
    $cnocode = "CNO".date($datestring).date($mm)."000"."1";
    $cno_item ="1";
  }else{
    $this->db->select('*');
    $this->db->order_by('cno_item','desc');
    $this->db->limit('1');
    $q = $this->db->get('cno_header');
    $run = $q->result();
    foreach ($run as $valx)
    {
      $x1 = $valx->cno_item+1;
    }

    if ($x1<=9) {
      $cnocode = "CNO".date($datestring).date($mm)."000".$x1;
      $cno_item = $x1;
    }
    elseif ($x1<=99) {
      $cnocode = "CNO".date($datestring).date($mm)."00".$x1;
      $cno_item = $x1;
    } 
    elseif ($x1<=999) {
      $cnocode = "CNO".date($datestring).date($mm)."0".$x1;
      $cno_item = $x1;
    }
  }
?>

<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="content">

<fieldset>
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h6 class="panel-title">Credit Note Petty cash (APO)</h6>
      <div class="heading-elements">
        <div class="col-md-12">
          <ul class="icons-list">
            <li><button class="openporec btn btn-primary" id="cvendor" data-toggle="modal" data-target="#openporec"><i class="icon-file-plus"></i> Select</button></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="panel-body">
      <form action="<?php echo base_url(); ?>ap_active/addnewcno" id="ff" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="">AP No.</label>             
                <input type="text" class="form-control" readonly="true" id="cnap_no" name="cnap_no">
                <input type="hidden" class="form-control" readonly="true" id="excode" name="excode">
                <input type="hidden" class="form-control" value="<?php echo $cnocode ?>" readonly="true" id="cncode" name="cncode">
                <input type="hidden" class="form-control" value="<?php echo $cno_item ?>" readonly="true" id="itemcode" name="itemcode">
              </div>
            </div>
            <div class="col-md-3">
              <label for="">Vender Name</label>             
              <input type="text" class="form-control" readonly="true"  id="vender" name="vender">
              <input type="hidden" class="form-control"   id="venderid" name="venderid" value="">
            </div>
             <div class="col-md-3">
              <label for="">Project/Department Name</label>
              <input type="text" class="form-control" readonly="true" id="projectname" name="projectname">
              <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid">
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="">P/O No.</label>
                <input type="text" class="form-control" readonly="true" placeholder="เลขที่ใบสั่งซื้อ" id="pono" name="pono">
                <input type="hidden" id="user" value="<?php echo $name; ?>">
              </div>
            </div>
            <div class="col-md-2">
                <label for="">System Type</label>
                <input type="text" class="form-control" readonly="true" id="systemname" name="systemname">
                <input type="hidden" class="form-control" readonly="true" id="system" name="system">
                <input type="hidden" class="form-control" readonly="true" id="expens" name="expens">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">Doc Date:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                <input type="text" class="form-control" readonly="true" id="duedate" name="duedate">
              </div>
            </div>        
            <div class="form-group col-md-3">
              <label for="">Data Type :</label>
              <select name="datatype" id="datatype" readonly="true" class="form-control">
                <option value="Normal">Normal</option>
              </select>
            </div>
             <div class="form-group col-md-2">
      <label for="">Date :</label>
      <input type="date" id="vchdate" name="vchdate" class="form-control">
    </div>

    <div class="form-group col-md-2">
      <label for="">Year :</label>
      <input type="text" id="glyear" name="glyear" readonly="true" value="" class="form-control" readonly="true" >
    </div>

    <div class="form-group col-md-2">
      <label for="">Period :</label>
      <input type="text" id="glperiod" name="glperiod" readonly="true" value="" class="form-control" >
    </div>
          </div>
        </div>
        <br>
        <div class="tabbable">
          <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
            <li><a href="#panel-pill2" data-toggle="tab" aria-expanded="false"><i class="icon-list2 position-left"></i> Detail</a></li>
            
          </ul>
        </div>
        <div class="tab-content">
          <div id="panel-pill1" class="tab-pane has-padding active">
              <input type="hidden" name="to" id="to" ><input type="hidden" name="cnamt" id="cnamt" >
              <input type="hidden" name="tov" id="tov" ><input type="hidden" name="cnvat" id="cnvat">
              <input type="hidden" name="toa" id="toa"><input type="hidden" name="cntovat" id="cntovat">
              <input type="hidden" name="totalamt" id="totalamt"><input type="hidden" name="ap_amt" id="ap_amt">
              <input type="hidden" name="cn_apvat" id="cn_apvat"><input type="hidden" name="ap_amttotal" id="ap_amttotal">
              <input type="hidden" name="tax2" id="tax2" ><input type="hidden" name="tax3" id="tax3" >
              <input type="hidden" name="taxdate2" id="taxdate2" ><input type="hidden" name="taxdate3" id="taxdate3" >

              <div class="table-responsive" id="invreceipt">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead class="bg-info">
                    <tr >
                      <th class="text-center"><div style="width:200px;"></div>Expense Subject</th>                      
                      <th class="text-center"><div style="width:200px;"></div>Company / Partnership / stores / other</th>
                      <th class="text-center"><div style="width:100px;"></div>Cost Code</th>                      
                      <th class="text-center"><div style="width:100px;"></div>Amount</th>              
                      <th class="text-center"><div style="width:100px;"></div>Vat %</th>
                      <th class="text-center"><div style="width:100px;"></div>Vat Amount</th>
                      <th class="text-center"><div style="width:100px;"></div>Net Amount</th>
                      <th class="text-center"><div style="width:100px;"></div>Tax No</th>
                      <th class="text-center"><div style="width:100px;"></div>Tax Date</th>
                      <th class="text-center"><div style="width:100px;"></div>Action</th>
                    </tr>
                  </thead>
                  <tbody id="vat">
                  </tbody>
                </table>
              </div>


              <div class="table-responsive" id="detail">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead>
                    <tr >
                      
                    </tr>
                  </thead>
                  <tbody id="det">
                  </tbody>
                </table>
              </div>
            </div>
            <div id="panel-pill2" class="tab-pane has-padding">
              <div id="petty_i"></div>
            </div>
        </div>
        <br>
        <div class="modal-footer">
           <div class="form-group">
              <a class="opendetail btn btn-primary" id="apodetail"><i class="icon-file-plus"></i> Select Item </a>
              <button type="button" id="scnv" class="bsave btn btn-success" ><i class="icon-floppy-disk position-left"></i> Save</button>
              <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
            </div>
        </div>
      </form>
    </div>
  </div>
</fieldset>
</div>


<div class="modal fade" data-backdrop="false" id="openporec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Select APO</h5>
      </div>
      <div class="modal-body">
        <div id="modal_recpo">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" data-backdrop="false" id="opendetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" name="detail" id="cclose" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Select Item APO</h5>
      </div>
      <div class="modal-body">
        <div id="modal_recpodetail">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="close_detail" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



 <script>
 $('#det').hide();
  $("#vchdate").change(function(event) {
  var de_date = $("#vchdate").val();
  var y = de_date.slice(0,4); 
  var m = de_date.slice(5,7);

  $("#glperiod").val(m);
  $("#glyear").val(y);         

  }); 



  $("#scnv").click(function(e){
  var amt = parseFloat($('#amt').val());
  var amtt = parseFloat($('#amttotal').val());
if($("#vchdate").val()==""){
  swal({
      title: "Please Fill Voucher Date !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{

  var row_tr = $('#vat > tr').length;
  if (row_tr > 0) {
     var frm = $('#ff');
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
                          window.location.href = "<?php echo base_url(); ?>ap/ap_reduce_apo";
                        }, 500);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#ff").submit();
  }else{
    swal({
      title: "Please Select Item !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
    });
  }
}
});
</script>


<script>
$(".openporec").click(function(){
  $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#modal_recpo').load('<?php echo base_url(); ?>ap/openapo');
});
$('.opendetail').click(function(){
  var cnap_no = $('#cnap_no').val();
  if(cnap_no !=''){
    $('#opendetail').modal('show');
    $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $('#modal_recpodetail').load('<?php echo base_url(); ?>ap/openapodetail/'+cnap_no);
  }else{
    // $('#opendetail').modal('hide');
    swal({
      title: "กรุณาเลือกใบที่ต้องการลดหนี้ก่อน !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
    });
    // $('#opendetail').modal('hide');
  }
});

$( "#apodetail" ).click(function() {
  $(".bsave").prop("disabled",false);
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

  $('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
   });

</script>

