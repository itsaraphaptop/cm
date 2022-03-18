<div class="content-wrapper">
  <?php
  $datestring = "Y";
  $mm = "m";
  $dd = "d";

  $this->db->select('*');
  $qu = $this->db->get('ap_cheque_detail');
  $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

  if ($res==0) {
    $jvcode = "PL".date($datestring).date($mm)."000"."1";
    $acc_id ="1";
  }else{
    $this->db->select('count(api_pl) as count_pl');
    $q = $this->db->get('ap_cheque_detail');
    $run = $q->result();
    foreach ($run as $valx)
    {
      $x1 = $valx->count_pl+1;
    }

    if ($x1<=9) {
      $jvcode = "PL".date($datestring).date($mm)."000".$x1;
      $acc_id = $x1;
    }
    elseif ($x1<=99) {
       $jvcode = "PL".date($datestring).date($mm)."00".$x1;
       $acc_id = $x1;
    }
     elseif ($x1<=999) {
      $jvcode = "PL".date($datestring).date($mm)."0".$x1;
      $acc_id = $x1;
    }
  }
 ?>

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
                <li><a class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Select </a></li>
              </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
          </div>
        <form id="fapd" action="<?php echo base_url(); ?>ap_cheque/ap_confirm_cheque" method="post">
            <div class="panel-body">              
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-2">
                    <label for="">No :</label><div id="cccc"></div>
                    <input type="text" id="ap_no" name="ap_no" class="form-control" value="" readonly="true">
                    <input type="hidden" id="no" name="no" class="form-control" value="" readonly="true">
                    <input type="hidden" value="<?php echo $jvcode; ?>" name="app_code">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Pay to :</label>
                    <input type="text" id="vendor_id" name="vendor_id" class="form-control" value="" readonly="true">
                  </div>
                  <div class="form-group col-sm-2">
                    <label for="">Cheque No:</label>
                    <input type="text" id="chno" name="chno" class="form-control daterange-single" readonly="true">
                  </div>  
                  <div class="form-group col-sm-2">
                    <label for="">Date:</label>
                    <input type="date" id="chdate" name="chdate" class="form-control daterange-single" readonly="true">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Bank :</label>
                    <input type="text" id="bank" name="bank" class="form-control" readonly="true">
                  </div>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">    
                  <div class="form-group col-sm-2">
                    <label for="">Amount :</label>
                    <input type="text" id="amt" name="amt" class="form-control" readonly="true">
                  </div>              
                  <div class="form-group col-sm-1">
                    <label for="">VAT :</label>
                    <input type="text" id="vatt" name="vatt" class="form-control" readonly="true">
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="">W/H :</label>
                      <input type="text" id="wt" name="wt" class="form-control daterange-single" readonly="true">
                    </div>
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Paid Amount :</label>
                    <input type="text" id="pamt" name="pamt" class="form-control" readonly="true">
                  </div> 
                  <div class="form-group col-sm-2">
                    <label for="">Paid Date :</label>
                    <input type="date" id="pdate" name="pdate" class="form-control">
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

              <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                  <li class="active"><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>Tax Vender</a></li>
                </ul>
              </div>

              <div class="row">
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
                        </tr>
                      </thead>
                      <tbody id="body">
                      </tbody>
                  </table>
                </div>
              </div> 
              <br>
              <div class="text-right">
                <a class="insrows btn btn-default btn-xs"><i class="icon-plus22"></i>ADD</a>                
                  <button type="submit" class="btn btn-success" id="sweet_success"><i class="icon-box-add"></i> Save </button>
                <a href="#" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
              </div>
              <script>
                $(".insrows").click(function(){
                  addrow();
                });
                  function addrow(){
                    var row = ($('#body tr').length-0)+1;
                    var tr = '<tr>'+
                    '<input type="hidden" name="chki[]" value="i">'+
                    '<td>'+
                      '<div class="input-group">'+
                      '<input type="text" class="form-control" name="vender_name[]" id="vender_name'+row+'">'+
                      '<input type="hidden" name="vendername[]" id="vendername'+row+'">'+
                      "<div class='input-group-btn'>"+
                      '<a class="btn btn-default btn-icon" data-toggle="modal" data-target="#open_groedu'+row+'"><i class="icon-search4"></i></a>'+
                      '</div>'+
                      '</div>'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="tax_id[]" id="tax_id'+row+'" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="tax_no[]" id="tax_no'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="tax_date[]" id="tax_date'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="amount[]" id="amount'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="percent[]" id="percent'+row+'" class="form-control"> '+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="vatt[]" id="vatt'+row+'" class="form-control"> '+
                    '</td>'+
                    '</tr>';
                    $('#body').append(tr);


                }
              </script>   
            </div>
          </form>                      
        </div>
      </div>
    </div>
  </div>
</div>  <!-- /content area -->

<div class="modal fade" id="openinv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
   $(".openinv").click(function(){
   $('#openallmodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#openallmodal").load('<?php echo base_url(); ?>ap_cheque/opencheque/<?php echo $no; ?>');
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
