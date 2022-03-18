<?php 
  foreach ($gll as $key) {  

  }
?>

<?php 
  foreach ($he as $he) {  

  }
?>

<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">

  <div class="content">

  <div class="panel panel-flat">
    <div class="panel-heading">
      <h6 class="panel-title">Account Payable (Petty Cash)</h6>

    </div>
    <div class="panel-body">
      <form action="<?php echo base_url(); ?>ap_active/editcno/" id="ff" method="post">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <label for="">APO Code.</label>             
              <input type="text" class="form-control" value="<?php echo $key->ap_no; ?>"  readonly="true" id="cnap_no" name="cnap_no">
              <input type="hidden" class="form-control" readonly="true" id="excode" name="excode">
              <input type="hidden" class="form-control" value="" readonly="true" id="cncode" name="cncode">
              <input type="hidden" class="form-control" value="" readonly="true" id="itemcode" name="itemcode">
            </div>
            <div class="col-md-4">
              <label for="">Vender Name</label>             
              <input type="text" class="form-control" value="<?php echo $key->vender_name; ?>" readonly="true" placeholder="Vender Name" id="vender" name="vender">
              <input type="hidden" class="form-control"  placeholder="ร้านค้า" id="venderid" name="venderid" value="">
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Doc No.</label>
                <input type="text" class="form-control" value="<?php echo $key->doc_no; ?>" readonly="true" placeholder="Doc No" id="pono" name="pono">
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
                <input type="text" class="form-control" value="<?php echo $key->doc_date; ?>" readonly="true" id="duedate" name="duedate">
              </div>
            </div>
         
            <div class="col-md-3">
              <label for="">Project Name</label>
              <input type="text" class="form-control" value="<?php echo $he->project_name; ?>" readonly="true" id="projectname" name="projectname">
              <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid">
            </div>
            <div class="col-md-3">
              <label for="">System Type</label>
              <input type="text" class="form-control" value="<?php echo $he->systemname; ?>" readonly="true" id="systemname" name="systemname">
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
            <label for="">AP Date :</label>
            <input type="date" id="vchdate" value="<?php echo $he->ap_date; ?>" readonly="true" name="vchdate" class="form-control daterange-single">
          </div>

          <div class="form-group col-md-2">
            <label for="">Year :</label>
            <input type="text" id="glyear" readonly="true" value="<?php echo $he->ap_period; ?>" name="glyear" readonly="true" value="" class="form-control" readonly="true" >
          </div>

          <div class="form-group col-md-2">
            <label for="">Period :</label>
            <input type="text" id="glperiod" readonly="true" value="<?php echo $he->ap_year; ?>" name="glperiod" readonly="true" value="" class="form-control" >
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
                      <th class="text-center" width="10%">Acount Code</th>
                      <th class="text-center" width="10%">Cost Code</th>
                      <th class="text-center" width="10%">DR</th>
                      <th class="text-center" width="10%">CR</th>
                    </tr>
                  </thead>
                  <tbody id="ttt">
                   
                  <?php  $i=1;
                      $vender = "";
                       foreach ($gl as $g) {   ?>
                  <tr>
                      
                      <td class="text-center" ><?php echo $g->acct_no; ?></td>
                      <td class="text-center"><?php echo $g->costcode; ?></td>
                      <td class="text-right"><input type="text" class="form-control text-right dr" id="dr" value="<?php echo $g->amtdr; ?>" name=""></td>
                      <?php if ($g->gltype == "VENDER" ) {
                        $vender = "vender";
                      }else{
                        $vender = "";
                      } ?>
                      <td class="text-right <?php echo $vender;?>"  ><?php echo $g->amtcr; ?></td>
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
            <button type="submit" class="bsave btn btn-success" ><i class="icon-floppy-disk position-left"></i> Save</button>
            <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</fieldset>
</div>


  <script>
  // ice ทำ ice บอกห้ามลบ 
    $(".dr").keyup(function(){
        var sum = 0;
        $.each($(".dr"),function(index, el) {
          //alert($(el).val());
          sum+=($(el).val()*1);
        });
         $(".vender").text(sum);
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

