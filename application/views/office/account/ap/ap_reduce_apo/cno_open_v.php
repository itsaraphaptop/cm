<?php 
  foreach ($he as $key) {  

  }
?>

<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
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
        <li>เลือกรายการลดหนี้ (Vender)</li>
        </ul>
    </div>
  </div>
<fieldset>
  <div class="panel panel-flat border-top-lg border-top-success">
    <div class="panel-heading">
      <h6 class="panel-title">บันทึกลดหนี้ Petty cash (APO)</h6>
      <!-- <div class="heading-elements">
        <div class="col-md-12">
          <ul class="icons-list">
            <li><button class="openporec btn btn-warning btn-xs" id="cvendor" data-toggle="modal" data-target="#openporec"><i class="icon-file-plus"></i> เลือกรายการลดหนี้</button></li>
          </ul>
        </div>
      </div> -->
    </div>
    <div class="panel-body">
      <form action="<?php echo base_url(); ?>ap_active/editcno/<?php echo $key->cnoi_id ?>" id="ff" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <label for="">AP No.</label>             
              <input type="text" class="form-control" value="<?php echo $key->cno_code ?>"  readonly="true" id="cnap_no" name="cnap_no">
              <input type="hidden" class="form-control" readonly="true" id="excode" name="excode">
              <input type="hidden" class="form-control" value="<?php echo $key->cno_code ?>" readonly="true" id="cncode" name="cncode">
              <input type="hidden" class="form-control" value="<?php echo $key->cno_item ?>" readonly="true" id="itemcode" name="itemcode">
            </div>
            <div class="col-md-4">
              <label for="">Vender</label>             
              <input type="text" class="form-control" value="<?php echo $key->vender_name  ?>" readonly="true" placeholder="ร้านค้า" id="vender" name="vender">
              <input type="hidden" class="form-control"  placeholder="ร้านค้า" id="venderid" name="venderid" value="">
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">P/O No.</label>
                <input type="text" class="form-control" value="<?php echo $key->cno_pono ?>" readonly="true" placeholder="เลขที่ใบสั่งซื้อ" id="pono" name="pono">
                <input type="hidden" id="user" value="<?php echo $name; ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <label for="">Doc Date:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                <input type="text" class="form-control" value="<?php echo $key->cno_duedate ?>" readonly="true" id="duedate" name="duedate">
              </div>
            </div>
         
            <div class="col-md-3">
              <label for="">โครงการ</label>
              <input type="text" class="form-control" value="<?php echo $key->project_name ?>" readonly="true" id="projectname" name="projectname">
              <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid">
            </div>
            <div class="col-md-3">
              <label for="">ระบบ</label>
              <input type="text" class="form-control" value="<?php echo $key->systemname ?>" readonly="true" id="systemname" name="systemname">
              <input type="hidden" class="form-control" readonly="true" id="system" name="system">
              <input type="hidden" class="form-control" readonly="true" id="expens" name="expens">
            </div>
            <div class="form-group col-md-3">
              <label for="">Data Type :</label>
              <select name="datatype" id="datatype" readonly="true" class="form-control">
                <option value="Normal">Normal</option>
              </select>
            </div>
          </div>
        </div>
        
  
  <div class="col-md-12">
    <div class="row">
    <div class="form-group col-md-2">
      <label for="">GL Date :</label>
      <input type="date" id="vchdate" value="<?php echo $key->cno_gldate; ?>" readonly="true" name="vchdate" class="form-control daterange-single">
    </div>

    <div class="form-group col-md-2">
      <label for="">GL Year :</label>
      <input type="text" id="glyear" readonly="true" value="<?php echo $key->cno_glyear; ?>" name="glyear" readonly="true" value="" class="form-control" readonly="true" >
    </div>

    <div class="form-group col-md-2">
      <label for="">GL Period :</label>
      <input type="text" id="glperiod" readonly="true" value="<?php echo $key->cno_glperiod; ?>" name="glperiod" readonly="true" value="" class="form-control" >
    </div>    
    </div>
  </div>
        <br>
        <div class="tabbable">
          <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="active"><a href="#panel-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
            
          </ul>
        </div>
        <div class="tab-content">
          <div id="panel-pill1" class="tab-pane has-padding active"">
              <input type="hidden" name="to" id="to" ><input type="hidden" name="cnamt" id="cnamt" >
              <input type="hidden" name="tov" id="tov" ><input type="hidden" name="cnvat" id="cnvat">
              <input type="hidden" name="toa" id="toa"><input type="hidden" name="cntovat" id="cntovat">
              <input type="hidden" name="totalamt" id="totalamt"><input type="hidden" name="ap_amt" id="ap_amt">
              <input type="hidden" name="cn_apvat" id="cn_apvat"><input type="hidden" name="ap_amttotal" id="ap_amttotal">
              <input type="hidden" name="tax2" id="tax2" ><input type="hidden" name="tax3" id="tax3" >
              <input type="hidden" name="taxdate2" id="taxdate2" ><input type="hidden" name="taxdate3" id="taxdate3" >

              <div class="table-responsive" id="invreceipt">
                <table class="table table-hover table-bordered table-striped table-xxs">
                  <thead>
                    <tr >                    
                      <th class="text-center">Amount</th>              
                      <th class="text-center">%</th>
                      <th class="text-center">Vat</th>
                      <th class="text-center">Net Amount</th>
                    </tr>
                  </thead>
                  <tbody id="ttt">
                  <?php  $i=1;
                      foreach ($he as $key) {  ?>
                  <tr>
                  
                      <td class="text-right"><?php echo $key->cnoi_disamt; ?></td>
                      <td class="text-right"><?php echo $key->cnoi_vatper; ?></td>
                      <td class="text-right"><?php echo $key->cnoi_vat; ?></td>
                      <td class="text-right"><?php echo $key->cnoi_netamt; ?></td>
                  </tr>
                    <?php  $i++; }
                    ?>
                  </tbody>
                </table>
              </div>           
            </div>
        </div>
        <br>
        <div class="modal-footer">
         <div class="form-group">             
            <button type="submit" class="bsave btn btn-primary btn-xs" disabled="disabled"><i class="icon-floppy-disk position-left"></i> บันทึก</button>
            <a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> ปิด</a>
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกรายการลดหนี้</h4>
      </div>
      <div class="modal-body">
        <div id="modal_recpo">
        </div>
      </div>
    </div>
  </div>
</div>

 <script>
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
      title: "กรุณากรอก Voucher Date !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
     var frm = $('#ff');
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
      
                        setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>ap/ap_reduce_apo";
                        }, 500);                       
                    }
                });
                ev.preventDefault();
              });
          $("#ff").submit();
      }
});
</script>


<script>
$(".openporec").click(function(){
   
  $('#modal_recpo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#modal_recpo').load('<?php echo base_url(); ?>ap/opencno/<?php echo $key->cno_code; ?>');

});

// $(".opendetail").click(function(){
//   var dt = $('#cnap_no').val();
//   $('#modal_recpodetail').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
//   $('#modal_recpodetail').load('<?php echo base_url(); ?>ap/openapodetail/'+dt);

// });

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

