<style type="text/css">
    .panel-body{
        padding-bottom:100px;
    }
</style>
<div class="page-header">
    <div class="panel-body">
        <div class="row">
        <button id="select_receipt" class="openinv btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select
        </button>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>บันทึกตั้งบัญชีลูกหนี้จากใบแจ้งหนี้ อื่นๆ (Receipt Other)</h3>
            </div>
        </div>
        <form id="other_form" action="#" method="post">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Invoice No.:</label>
                            <input type="text" class="form-control" id="ot_code" name="ot_code" placeholder="Invoice No" readonly="true">
                            <input type="hidden" name="type" value="other">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Date: </label>
                            <input type="date" id="ot_date" name="ot_date" class="form-control" value="" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label class="display-block">Tax:</label>
                            <label class="radio-inline">
                                <input type="radio" id="tax_no" name="tax" value="no" readonly="true">
                                No
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="tax_yes" name="tax" value="yes" readonly="true">
                                Yes
                            </label>
                        </div>
                      
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="hidden" name="gl" id="gl_input" value="true">
                        <div class="form-group">
                            <label class="display-block text-semibold">&nbsp;</label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="ch_gl" readonly="true">gl
                            </label>
                        </div>
                    </div>
                    <script type="text/javascript">
                            $("[name='tax'] , #ch_gl , [name='type']").click(function(event) {
                               return false;
                            });
                    </script>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Department / Project Code:</label>
                            <input type="text" class="form-control" name="pro_code" id="pro_code" readonly="readonly">
                            <input type="hidden" class="form-control" name="ot_pro_id" id="pro_id" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label>Department / Project Name:</label>
                           <input type="text" class="form-control" name="pro_name" id="pro_name" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Year:</label>
                            <input type="text" id="year" name="year" class="form-control" readonly="true" value="<?= date('Y'); ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Period:</label>
                            <input type="text" class="form-control" name="period" id="period" readonly="readonly" value="<?= date('m'); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>System:</label>
                            <input type="text" class="form-control" name="sys_head_name" id="sys_head_name" readonly="readonly">
                            <input type="hidden" class="form-control" name="sys_head_id" id="sys_head_id" readonly="readonly">
                            <input type="hidden" class="form-control" name="sys_head_code" id="sys_head_code" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Ref no:</label>
                            <input type="text" id="ot_ref_no" name="ot_ref_no" class="form-control" readonly="true">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Ref Date: </label>
                            <input type="date" id="ot_ref_date" name="ot_ref_date" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Type of income:</label>
                            <input type="text" id="income_name" name="income_name" class="form-control" readonly="true">
                            <input type="hidden" id="income_id" name="income_id" class="form-control">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Customer Code:</label>
                            <input type="text" class="form-control" name="cus_code" id="cus_code" readonly="readonly">
                            <input type="hidden" class="form-control" name="ot_cus_id" id="cus_id" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label>Customer Name:</label>
                            <input type="text" class="form-control" name="cus_name" id="cus_name" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <!-- <div class="form-group">
                            <label>Voucher No:</label>
                            <input type="text" name="ot_vouno" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label>CR Term:</label>
                            <div class="input-group">
                                <input type="text" name="ot_crterm" id="cr_term" class="form-control" readonly="true">
                                <span class="input-group-addon">Days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Due Date:</label>
                            <input type="date" name="ot_duedate" id="duedate" class="form-control" readonly="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>% W/T:</label>
                            <input type="text" name="ot_wt" id="ot_wt" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>% VAT:</label>
                            <input type="text" name="ot_vat" id="ot_vat" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Currency:</label>
                            <input type="text" name="ot_currency_id" id="currency" class="form-control" readonly="true">
                            <input type="hidden" name="currency_id" id="currency_id" class="form-control" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Exchang rate:</label>
                            <div class="input-group">
                                <input type="text" name="ot_exchangrate" id="ot_exchangrate" class="form-control" readonly="true">
                                <span class="input-group-addon">Baht</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Remark:</label>
                            <textarea name="ot_remark" class="form-control" id="ot_remark" rows="5" readonly="true"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-xs" width="200%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center"><div style="width:200px;"></div>System</th>
                                <th class="text-center"><div style="width:80px;"></div>A/C</th>
                                <th class="text-center"><div style="width:150px;"></div>A/C NAME</th>
                                <th class="text-center"><div style="width:100px;"></div>Cost Code</th>
                                <th class="text-center"><div style="width:150px;"></div>Debit</th>
                                <th class="text-center"><div style="width:150px;"></div>Credit</th>
                            </tr>
                        </thead>
                        <tbody id="other_tr">
                            
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="row form-group" style="padding-top:20px;">
            <button type="button" class="btn btn-success pull-right" id="save_other"><i id="icon_save" class="icon-floppy-disk"></i> Save</button>
        </div>
    </form>
</div>
</div>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-full">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Account Receivble</h4>
            </div>
            <div class="modal-body">
                <div id="content_modal"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_cost_code" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cost Code</h4>
      </div>
      <div class="modal-body">
        <div id="modal_cost"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div id="myAccount" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Account</h4>
            </div>
            <div class="modal-body">
               <div id="account_code"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


$(function(){
  $("#save_other").click(function(){



    $('#save_other').attr('class', 'btn btn-success disabled pull-right');
    $('#icon_save').attr('class', 'icon-spinner2 spinner');

       var formData = new FormData($("#other_form")[0]); 
       var y = $('#year').val();
       var m = $('#period').val();
       $.get(`<?= base_url(); ?>data_master/check_period/${y}/${m}`, function(data) {
       }).done(function(data) {
            var json = jQuery.parseJSON(data);
            if(json.status == false){
              swal({
                    title: "Please fill Period GL!!.",
                    text: "",
                    confirmButtonColor: "#EA1923",
                    type: "error"
                  });
            }else{

                $.ajax({
                        url: '<?= base_url() ?>acc_active/add_ar_other',
                        type: 'POST',
                        data: formData,
                        async: false,
                        success: function (data) {

                          try{
                             console.log(data);
                             var json = jQuery.parseJSON(data);
                             if(json.status == true){

                                swal({ 
                                    title: json.ar,
                                    text: json.message,
                                    type: "success" 
                                },
                                function(){
                                    window.location.href = '<?= base_url() ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_account_report.mrt&no='+json.ar;
                                });
                                
                             }else{
                              
                                $.simplyToast(json.message, 'danger');
                             }
                          }catch(e){
                                $.simplyToast(e, 'danger');
                          }
                      },
                      cache: false,
                      contentType: false,
                      processData: false
                });
            }
       });
  });
});

function modal_ro() {
    $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#content_modal").load('<?php echo base_url(); ?>ar/receipt_other_modle');
}

    modal_ro();   
</script>