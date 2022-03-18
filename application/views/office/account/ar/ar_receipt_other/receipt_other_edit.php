<style type="text/css">
    .panel-body{
        padding-bottom:100px;
    }
</style>
<div class="page-header">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>ใบแจ้งหนี้ อื่นๆ (Receipt Other)</h3>
            </div>
        </div>

        
        <?php
            foreach ($ar_header as $key => $value) {
                
        ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4><b>AR No : </b><?= $value->ar_no ?></h4>
            </div>
        </div>
        
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Invoice No.:</label>
                            <input type="text" class="form-control" id="ot_code" name="ot_code" placeholder="Invoice No" readonly="true" value="<?= $value->ref_invice ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Date: </label>
                            <input type="date" id="ot_date" name="ot_date" class="form-control" value="<?= $value->date_invice ?>" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label class="display-block">Type:</label>
                            <?php
                                if ($value->type == "service") {
                            ?>
                                <label class="radio-inline">
                                    <input type="radio" id="service" name="type" value="service" readonly="true" checked="checked" >
                                    Service
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="trading" name="type" value="trading" readonly="true">
                                    Trading
                                </label>
                            <?php
                                }else{
                            ?>
                                <label class="radio-inline">
                                    <input type="radio" id="service" name="type" value="service" readonly="true" >
                                    Service
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="trading" name="type" value="trading" readonly="true" checked="checked" >
                                    Trading
                                </label>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label class="display-block">Tax:</label>
                            <?php
                                if ($value->tax == "yes") {
                            ?>
                                <label class="radio-inline">
                                    <input type="radio" id="tax_no" name="tax" value="no" readonly="true">
                                    No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="tax_yes" name="tax" value="yes" readonly="true" checked="checked">
                                    Yes
                                </label>

                            <?php
                                }else{
                            ?>
                                <label class="radio-inline">
                                    <input type="radio" id="tax_no" name="tax" value="no" readonly="true" checked="checked">
                                    No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="tax_yes" name="tax" value="yes" readonly="true">
                                    Yes
                                </label>
                            <?php
                                }
                            ?>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="hidden" name="gl" id="gl_input" value="true">
                        <div class="form-group">
                            <label class="display-block text-semibold">&nbsp;</label>
                            
                                <?php
                                    if ($value->gl == "true") {
                                ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="ch_gl" readonly="true" checked="checked">gl
                                    </label>
                                <?php
                                    }else{
                                ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="ch_gl" readonly="true">gl
                                    </label>
                                <?php
                                    }
                                ?>

                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Department / Project Code:</label>
                            <input type="text" class="form-control" name="pro_code" id="pro_code" readonly="readonly" value="<?= $value->project_code ?>">
                            
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label>Department / Project Name:</label>
                            <input type="text" class="form-control" name="pro_name" id="pro_name" readonly="readonly" value="<?= $value->project_name ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>System:</label>
                            <input type="text" class="form-control" name="sys_head_name" id="sys_head_name" readonly="readonly" value="<?= $value->system_name ?>">
                            <input type="hidden" class="form-control" name="sys_head_id" id="sys_head_id" readonly="readonly" value="<?= $value->system_id ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Ref no:</label>
                            <input type="text" id="ot_ref_no" name="ot_ref_no" class="form-control" readonly="true" value="<?= $value->ref_no ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Ref Date: </label>
                            <input type="date" id="ot_ref_date" name="ot_ref_date" class="form-control" readonly="true" value="<?= $value->ref_date ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Type of income:</label>
                            <input type="text" id="income_name" name="income_name" class="form-control" readonly="true" value="<?= $value->income_name ?>">
                            <input type="hidden" id="income_id" name="income_id" value="<?= $value->income_code ?>">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Customer Code:</label>
                            <input type="text" class="form-control" name="cus_code" id="cus_code" readonly="readonly" value="<?= $value->customer_code ?>">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label>Customer Name:</label>
                            <input type="text" class="form-control" name="cus_name" id="cus_name" readonly="readonly" value="<?= $value->customer_name ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>CR Term:</label>
                            <div class="input-group">
                                <input type="text" name="ot_crterm" id="cr_term" class="form-control" readonly="true" value="<?= $value->cr_term ?>">
                                <span class="input-group-addon">Days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Due Date:</label>
                            <input type="date" name="ot_duedate" id="duedate" class="form-control" readonly="true" value="<?= $value->due_date ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>% W/T:</label>
                            <input type="text" name="ot_wt" id="ot_wt" class="form-control" readonly="true" value="<?= $value->wt ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>% VAT:</label>
                            <input type="text" name="ot_vat" id="ot_vat" class="form-control" readonly="true" value="<?= $value->vat ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Currency:</label>
                            <input type="text" name="ot_currency_id" id="currency" class="form-control" readonly="true" value="<?= $value->currency_name_th ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Exchang rate:</label>
                            <div class="input-group">
                                <input type="text" name="ot_exchangrate" id="ot_exchangrate" class="form-control" readonly="true" value="<?= $value->exchang_rate ?>">
                                <span class="input-group-addon">Baht</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Remark : </label>
                            <textarea name="ot_remark" class="form-control" id="ot_remark" rows="5" readonly="true"><?= $value->remark ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                <form id="other_form" action="#" method="post">
                    <input type="hidden" name="ar_no" value="<?= $value->ar_no ?>">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Date : </label>
                            <input type="date" name="date_ar" class="form-control" value="<?= $value->ar_date ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Year : </label>
                            <input type="test" name="year_ar" class="form-control" value="<?= $value->year ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Pariod : </label>
                            <input type="text" name="pariod_ar" class="form-control" value="<?= $value->pariod ?>">
                        </div>
                    </div>
                
                </div>
            </div>
        <?php
            }
        ?>
            <div class="row form-group">
                <button type="button" class="btn btn-success" id="save_other"><i class="icon-floppy-disk"></i> Save</button>
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
                        <?php
                            $i = 0;
                            foreach ($ar_detail as $d_key => $value_d) { 
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $value_d->system_name ?></td>
                                <td>
                                    <input type="text" name="acc_code[]" id="acc_code<?= $i ?>" class="form-control" value="<?= $value_d->acc_code ?>" readonly="readonly" >
                                    <input type="hidden" name="id[]" value="<?= $value_d->id ?>"> 
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="acc_name[]" id="acc_name<?= $i ?>" readonly="readonly" value="<?= $value_d->acc_name ?>">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $i ?>')"><i class="icon-search4"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $value_d->cost_code ?></td>
                                <td><?= $value_d->debit ?></td>
                                <td><?= $value_d->credit ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                    </form>
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
    $("[name='tax'] , #ch_gl , [name='type']").click(function(event) {
        return false;
    });

    function acc(id){
        $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#account_code").load(`<?php echo base_url(); ?>ar/account_code_by_rows/${id}`);
        $('#myAccount').modal('show');
    }

 $(function(){
  $("#save_other").click(function(){

       var formData = new FormData($("#other_form")[0]); 
       

      $.ajax({
            url: '<?= base_url() ?>acc_active/edit_ar_other',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

              try{
                 console.log(data);

                 var json = jQuery.parseJSON(data);
                 if(json.status == true){

                    swal({ 
                        title: 'Success',
                        text: json.message,
                        type: "success" 
                    },
                    function(){
                        window.location.href = '<?= base_url() ?>ar/other_list';
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
  });
});

    
</script>