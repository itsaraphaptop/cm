<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
   <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">recive Docment TAX</h6>
            <div class="heading-elements">
              <ul class="icons-list">
                <li style="color: #ffffff"><a class="openinv btn btn-info btn-sm" data-toggle="modal" data-target="#openinv"><i class=" icon-file-plus"></i> Select </a></li>
              </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
          </div>
          <form id="tax" action="<?php echo base_url(); ?>ap_cheque/ap_confirm_tax" method="post">
            <div class="panel-body">              
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-sm-3">
                    <label for="">VouCher No :</label><div id="cccc"></div>
                    <input type="text" id="ap_no" name="ap_no" class="form-control" value="" readonly="true">
                    <input type="hidden" id="de_ap" name="de_ap" class="form-control" value="" readonly="true">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Pay to :</label>
                    <input type="text" id="vendor_id" name="vendor_id" class="form-control" value="" readonly="true">
                    <input type="hidden" id="venid" name="ap_vender" class="form-control" value="" readonly="true">
                    <input type="hidden" id="project_id" name="api_project" class="form-control" value="" readonly="true">
                    <input type="hidden" id="ventax" name="ventax" class="form-control" value="" readonly="true">
                  </div>
                  <div class="form-group col-sm-3">
                    <label for="">Cheque No:</label>
                    <input type="text" id="chno" name="chno" class="form-control daterange-single" readonly="true">
                  </div>  
                  <div class="form-group col-sm-3">
                    <label for="">Date:</label>
                    <input type="date" id="chdate" name="chdate" class="form-control daterange-single" readonly="true">
                  </div>                              
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">    
                  <div class="form-group col-sm-3">
                    <label for="">Bank :</label>
                    <input type="text" id="bank" name="bank" class="form-control" readonly="true">
                  </div>   
                  <div class="form-group col-sm-3">
                    <label for="">Amount :</label>
                    <input type="text" id="amt" name="amt" class="form-control" readonly="true">
                  </div>              
                  <div class="form-group col-sm-3">
                    <label for="">VAT Amount :</label>
                    <input type="text" id="vatt" name="vatt" class="form-control" readonly="true">
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Net Amount :</label>
                      <input type="text" id="netamt" name="netamt" class="form-control daterange-single" readonly="true">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">    
                  <div class="form-group col-sm-6">
                    <label for="">Pay to(Cheque) :</label>
                    <input type="text" id="ap_paid" name="ap_paid" class="form-control" value="" readonly="true">
                  </div>                 
                  <div class="form-group col-sm-3">
                    <label for="">Date :</label>
                    <input type="date" id="pdate" name="pdate" class="form-control">
                    <input type="hidden" id="period" name="period" class="form-control">
                    <input type="hidden" id="year" name="year" class="form-control">
                  </div> 
                </div>   
              </div>
              <br>

              <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                  <li class="active"><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>Tax Invoice Document</a></li>
                  <li><a data-toggle="tab" href="#menu2"><i class="icon-wrench position-left"></i>GL</a></li>
                </ul>
              </div>  


              <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">                    
                  <div class="row" id="tabletax">
                    <div class="table-responsive" id="invoicedown">
                      <table class="table table-hover table-bordered table-striped table-xxs">
                        <thead>
                          <tr>
                            <th width="25%">Vender Name</th>
                            <th width="15%">Tax ID</th>
                            <th width="10%">Tax No.</th>
                            <th width="10%">Tax Date</th>
                            <th width="10%">Amount</th>
                            <th width="5%">Vat %</th>
                            <th width="10%">Vat Amount</th>
                            <th width="5%">Active</th>
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
                  </div> 
                  <br>
                  <div class="text-right">
                    <a class="insrows btn btn-info "><i class="icon-plus22"></i>ADD</a>  
                      <button type="button" class="btn btn-success" id="savepv"><i class="icon-box-add" ></i> Save </button>
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
                        '<a class="label bg-danger" id="edit'+row+'">edit</a>   <a class="label bg-green" id="save'+row+'">OK</a>'+
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
                    }else{
                    $("#tax").submit();
                    }
                  });
              </script>  
                </div>
         
                <div id="menu2" class="tab-pane fade">
                  <div id="m2">
                  </div>
                </div>
              </div>
              <br>
            </div>
          </form>                      
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="openinv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full" role="document">
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
   $("#openallmodal").load('<?php echo base_url(); ?>ap_cheque/opentax');
   });

  $("#pdate").change(function(event) {
  var de_date = $("#pdate").val();
  var y = de_date.slice(0,4); 
  var m = de_date.slice(5,7);

  $("#period").val(m);
  $("#year").val(y);         

  }); 
 
</script>

<!-- /main content -->


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

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
  $('.datatable-basic').DataTable();
</script>