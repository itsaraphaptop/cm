<?php foreach ($openvd as $value) { } ?> 

<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
      </div>
      <div class="heading-elements">
        <div class="heading-btn-group">
          <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
          <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
          <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
      </div>
    </div>
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li>Approve Payment </li>
      </ul>
    </div>
  </div>    
  <!-- /page header -->

  <!-- Content area -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat border-top-lg border-top-success">
          <div class="panel-heading">
            <h6 class="panel-title">Confirm Payment Cheque  </h6>
            <div class="heading-elements">
              <ul class="icons-list">
                
              </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
          </div>
        <form id="fpv" action="<?php echo base_url(); ?>ap_cheque/ap_confirm_cheque" method="post">
            <div class="panel-body">              
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-2">
                    <label for="">No :</label><div id="cccc"></div>
                    <input type="text" id="ap_no" name="ap_code" class="form-control" value="<?php echo $value->ap_code; ?>" readonly="true">
                    <input type="hidden" id="ap_vender" name="ap_vender" class="form-control" value="" readonly="true">
                    <input type="hidden" id="api_project" name="project" class="form-control" value="" readonly="true">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Pay to :</label>
                    <input type="text" id="vendor_id" name="vendor_id" class="form-control" value="<?php echo $value->ap_paidto; ?>" readonly="true">
                    <input type="hidden" id="ventax" name="ventax" class="form-control" value="" readonly="true">
                  </div>
                  <div class="form-group col-sm-2">
                    <label for="">Cheque No:</label>
                    <input type="text" id="chno" name="chno" value="<?php echo $value->ap_chno; ?>" class="form-control daterange-single" readonly="true">
                  </div>  
                  <div class="form-group col-sm-2">
                    <label for="">Date:</label>
                    <input type="text" id="chdate" name="chdate" value="<?php echo $value->ap_chnodate; ?>" class="form-control daterange-single" readonly="true">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Bank :</label>
                    <input type="text" id="bank" name="bank" value="<?php echo $value->acc_name; ?>" class="form-control" readonly="true">
                  </div>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">    
                  <div class="form-group col-sm-2">
                    <label for="">Amount :</label>
                    <input type="text" id="amt" name="amt" value="<?php echo $value->amt_ch; ?>" class="form-control" readonly="true">
                  </div>              
                  <div class="form-group col-sm-2">
                    <label for="">VAT :</label>
                    <input type="text" id="vatt" name="vatt" value="<?php echo $value->vat_ch; ?>" class="form-control" readonly="true">
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="">W/T :</label>
                      <input type="text" id="wt" name="wt" value="<?php echo $value->wt_ch; ?>" class="form-control daterange-single" readonly="true">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="">Retention :</label>
                      <input type="text" id="ret" name="ret" class="form-control daterange-single" readonly="true">
                    </div>
                  </div>
                  <div class="form-group col-sm-2">
                    <label for="">Paid Amount :</label>
                    <input type="text" id="pamt" name="pamt" value="<?php echo $value->netamt_ch; ?>" class="form-control" readonly="true">
                  </div> 
                  <div class="form-group col-sm-2">
                    <label for="">Paid Date :</label>
                    <input type="text" id="pdate" name="pdate" class="form-control" readonly="true" value="<?php echo $value->appaid_date; ?>">
                    <input type="hidden" id="period" name="period" class="form-control">
                    <input type="hidden" id="year" name="year" class="form-control">
                  </div>              
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-sm-2">
                  <label for="">PL/PV No :</label>
                    <input type="text" readonly="true" class="form-control" id="ap_pl" name="ap_pl" value="<?php echo $value->ap_pl; ?>">
                  </div>
                    <div class="form-group col-sm-2">
                    <div class="checkbox checkbox-switchery switchery-xs">
                      <label class="display-block">
                        <input type="hidden" class="switchery1" id="" name=""><br>
                        <input type="checkbox" class="styled" id="holdv" name="holdv" value="hv"> Hold Document VAT
                      </label>
                    </div>
                  </div> 
                </div>
              </div>
              <br>

             <!--  <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                  <li class="active"><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>Tax Vender</a></li>
                </ul>
              </div>
 -->
             <!--  <div class="row" id="tabletax">
                <div class="table-responsive" id="invoicedown">
                  <table class="table table-hover table-bordered table-striped table-xxs">
                      <thead>
                        <tr>
                          <th width="25%">Vender</th>
                          <th width="15%">Tax ID</th>
                          <th width="10%">Tax Invice No.</th>
                          <th width="10%">Tax Date</th>
                          <th width="10%">Amount</th>
                          <th width="5%">%</th>
                          <th width="10%">Vat</th>
                          <th width="5%"></th>
                        </tr>
                      </thead>
                      <tbody id="body">
                      </tbody>
                      <tr>
                        <td colspan="4"></td>
                        <td>
                        <input type="text" id="toaaa" value="0" name="" class="form-control" readonly="true" style="text-align: right;">
                        <input type="text" id="toaa" value="0" name="" class="form-control" readonly="true" style="text-align: right;">
                        </td>
                        <td></td>
                        <td><input type="text" id="vatperr" value="0" name="" class="form-control" readonly="true" style="text-align: right;">
                          <input type="text" id="vatper" value="0" name="" class="form-control" readonly="true" style="text-align: right;">
                        </td>
                        <td></td>
                      </tr>
                  </table>
                </div>
              </div>  -->
              <br>
              <div class="text-right">
                <!-- <a class="insrows btn btn-default btn-xs"><i class="icon-plus22"></i>ADD</a> -->                
                 <!--  <button type="button" class="btn btn-success" id="savepv"><i class="icon-box-add" ></i> Save </button> -->
                <a href="#" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
              </div>
              <input type="hidden" id="kamt" name="">
              <input type="hidden" id="toamt" name="">
              <input type="hidden" id="namt" name="">
              <input type="hidden" id="nvat" name="">
              <input type="hidden" id="tovat" name="">
              <script>
                    $("#tabletax").hide();
                    $("#toaa").hide();
                    $("#vatper").hide();
                $(".insrows").click(function(){
                  $("#tabletax").show();
                  addrow();
                });
                  function addrow(){
                    var amt = $('#amt').val();
                    var vat = $('#vatt').val();
                    var vender = $('#vendor_id').val();
                    var ventax = $('#ventax').val();
                    var row = ($('#body tr').length-0)+1;
                    var tr = '<tr>'+
                    '<input type="hidden" name="chki[]" value="i">'+
                    '<td>'+
                      '<input type="text" readonly class="form-control" name="vendor_id[]" id="vendor_id'+row+'" value="'+vender+'">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="tax_id[]" readonly id="tax_id'+row+'" class="form-control" value="'+ventax+'" >'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="tax_no[]" id="tax_no'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="date" name="tax_date[]" id="tax_date'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" readonly="true" id="amount1'+row+'" style="text-align: right;" value="'+amt+'" class="form-control"> '+
                    '<input type="text" name="amount[]" id="amount'+row+'" style="text-align: right;" value="'+amt+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="vatt1[]" readonly="true" id="vatt1'+row+'" style="text-align: right;" value="7" class="form-control"> '+
                    '<input type="text" name="percent[]" id="percent'+row+'" style="text-align: right;" value="7" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    
                    '<input type="text" name="vatt[]" id="vatt'+row+'" style="text-align: right;" readonly="true"  value="'+vat+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<a class="label bg-info" id="edit'+row+'">edit</a>   <a class="label bg-green" id="save'+row+'">OK</a>'+
                    '<a class="label bg-danger" id="del'+row+'">del</a>'+
                    '</td>'+
                    '</tr>'+

                    '<script>'+
                    '$("#save'+row+'").hide();'+
                    '$("#amount'+row+'").hide();'+
                    '$("#vatt1'+row+'").hide();'+
                    '$("#edit'+row+'").click(function(){'+
                    '$("#amount'+row+'").show();'+
                    '$("#percent'+row+'").show();'+
                    '$("#amount1'+row+'").hide();'+
                    '$("#vatt1'+row+'").hide();'+
                    'var amt'+row+' = parseFloat($("#amount'+row+'").val());'+
                    '$("#namt").val(amt'+row+');'+
                    '$("#edit'+row+'").hide();'+
                    '$("#save'+row+'").show();'+
                    '$("#toaaa").hide();'+
                    '$("#vatperr").hide();'+
                    '$("#toaa").show();'+
                    '$("#vatper").show();'+
                    '});'+

                    '$("#amount'+row+'").keyup(function(){'+
                    'var amt'+row+' = parseFloat($("#amount'+row+'").val());'+
                    'var avat'+row+' = parseFloat($("#vatt'+row+'").val());'+
                    'var vatp'+row+' = parseFloat($("#vatt1'+row+'").val());'+
                    'var nvatt'+row+' = (amt'+row+'*vatp'+row+')/100;'+
                    '$("#vatt'+row+'").val(nvatt'+row+');'+
                    '$("#namt").val(amt'+row+');'+
                    '$("#nvat").val(nvatt'+row+');'+
                    '});'+

                    '$("#save'+row+'").click(function(){'+
                    
                    'var tax_no'+row+' = $("#tax_no'+row+'").val();'+
                    'var tax_date'+row+' = $("#tax_date'+row+'").val();'+
                    'var nvat = parseFloat($("#nvat").val());'+
                    'var kamt = parseFloat($("#kamt").val());'+
                    'var vatper = parseFloat($("#vatper").val());'+
                    'var toaa = parseFloat($("#toaa").val());'+
                    'var toamt = parseFloat($("#toamt").val());'+
                    'var namt = parseFloat($("#namt").val());'+
                    'if (tax_no'+row+'=="") {'+
                    'swal({ title: "กรุณากรอกTax No !!.",text: "",confirmButtonColor: "#EA1923",type: "error"});'+
                    '}else if(tax_date'+row+'==""){'+
                    'swal({ title: "กรุณากรอก TAX Date !!.",text: "",confirmButtonColor: "#EA1923",type: "error"});'+
                    '}else{'+
                    'if (kamt==toamt) {'+
                    'var cheamt = kamt -namt;'+
                    '}else{'+
                    'var cheamt = toamt -namt;'+
                    '}'+
                    '$("#save'+row+'").hide();'+
                    'var toa = toaa+namt;'+
                    'var tov = vatper+nvat;'+
                    '$("#toaa").val(toa);'+
                    '$("#toamt").val(cheamt);'+
                    '$("#vatper").val(tov);'+
                    '$("#amount1'+row+'").val(namt);'+
                    '$("#vatt'+row+'").val(nvat);'+
                    '$("#amount1'+row+'").show();'+
                    '$("#vatt1'+row+'").show();'+
                    '$("#amount'+row+'").hide();'+
                    '$("#percent'+row+'").hide();'+
                    '}'+
                    '});'+

                    '<\/script>';
                    $('#body').append(tr);
                }
              </script> 
              <script>
                  $("#savepv").click(function(){
                    var cheamt = parseFloat($("#toamt").val());
                    var kamt = parseFloat($("#kamt").val());
                    if (cheamt != 0 && cheamt != kamt) {
                    swal({ title: "กรุณากรอกจำนวนเงินใหม่ !!.",
                    text: "",
                    confirmButtonColor: "#EA1923",
                    type: "error"});
                    }else if ($("#pdate").val()=="") {
                      swal({
                          title: "กรุณากรอก Paid Date !!.",
                          text: "",
                          confirmButtonColor: "#EA1923",
                          type: "error"
                      });
                    }else{
                    $("#fpv").submit();
                    }
                  });
              </script>  
            </div>
          </form>                      
        </div>
      </div>
    </div>
  </div>
</div>  <!-- /content area -->

<script>
   $(".openinv").click(function(){
   $('#openallmodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#openallmodal").load('<?php echo base_url(); ?>ap_cheque/opencheque');
   });
   $("#pdate").change(function(event) {
  var de_date = $("#pdate").val();
  var y = de_date.slice(0,4); 
  var m = de_date.slice(5,7);

  $("#period").val(m);
  $("#year").val(y);         

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
