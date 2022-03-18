<div class="page-header">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>บันทึกลดหนี้จากใบแจ้งหนี้จากการจำหน่าย (Reduce Debt Trading)</h3>
            </div>
        </div>
        <form id="form_data_edit">
<?php 
    foreach ($rd_header as $key => $value) {
?>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <label class="display-block"><h4><?= $value->rd_no ?></h4></label>
                <input type="hidden" name="rd_no" value="<?= $value->rd_no ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Invoice No :</label>
                    <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?= $value->ref_inv_no ?>" readonly="true">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Invoice Date :</label>
                    <input type="date" class="form-control" name="inv_date" id="inv_date" value="<?= $value->ref_inv_date ?>" readonly="true">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Project Code :</label>
                    <input type="text" class="form-control" name="project_code" id="project_code" value="<?= $value->project_code ?>" readonly="true">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Project Name :</label>
                    <input type="text" class="form-control" name="project_name" id="project_name" value="<?= $value->project_name ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Customer Code :</label>
                    <input type="text" class="form-control" name="cus_code" id="cus_code" value="<?= $value->cus_code ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Customer Name :</label>
                    <input type="text" class="form-control" name="cus_name" id="cus_name" value="<?= $value->cus_name ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">% Vat :</label>
                    <input type="text" class="form-control" name="vat" id="vat" value="<?= $value->vat ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Currency :</label>
                    <input type="text" class="form-control" name="curency" id="curency" value="<?= $value->currency ?>" readonly="true">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Exchange :</label>
                    <input type="text" class="form-control" name="exchange" id="exchange" value="<?= $value->exchange ?>" readonly="true">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Cr. term :</label>
                    <input type="text" class="form-control" name="cr_term" id="cr_term" value="<?= $value->cr_term ?>" readonly="true">
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="form-group">
                    <label class="display-block">Due Date :</label>
                    <input type="date" class="form-control" name="due_date" id="due_date" value="<?= $value->due_date ?>" readonly="true">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label class="display-block">Remark :</label>
                    <textarea class="form-control" name="remark" rows="4" value="<?= $value->remark ?>"></textarea>
                </div>
            </div>
        </div>
<?php
    }
?>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-xs" width="200%" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center"><div style="width:150px;"></div>Mat. Code</th>
                            <th class="text-center"><div style="width:150px;"></div>Mat. Name</th>
                            <th class="text-center"><div style="width:100px;"></div>QTY</th>
                            <th class="text-center"><div style="width:150px;"></div>Price/Unit</th>
                            <th class="text-center"><div style="width:150px;"></div>Amount</th>
                            <th class="text-center"><div style="width:150px;"></div>Discount</th>
                            <th class="text-center"><div style="width:150px;"></div>Net Amount</th>
                            <th class="text-center"><div style="width:150px;"></div>Ref. IC NO.</th>
                        </tr>
                    </thead>
                    <tbody id="list">
                        <?php
                            $i=0; 
                            foreach ($rd_detail as $key => $data) {
                            $i++;
                        ?>
                        <tr>
                            <td>
                                <?= $i ?>
                                <input type="hidden" name="system[]" value="<?= $data->system ?>">
                            </td>
                            <td>
                                <?= $data->mat_code ?>
                                <input type="hidden" name="mat_code[]" id="mat_code_<?= $i ?>" value="<?= $data->mat_code ?>">
                            </td>
                            <td>
                               <?= $data->mat_name ?>
                                <input type="hidden" name="mat_name[]" id="mat_name_<?= $i ?>" value="<?= $data->mat_name ?>">
                            </td>
                            <td>
                                <?= $data->qty ?>
                                <input type="hidden" name="qty[]" id="qty_<?= $i ?>" value="<?= $data->qty ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control text-right priceunit" row="<?= $i ?>" id="price_<?= $i ?>" name="price_unit[]" value="<?= $data->price_unit ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control text-right amount" id="amount_<?= $i ?>" name="amount[]" value="<?= $data->amount ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control text-right discount" row="<?= $i ?>" id="discount_<?= $i ?>" name="discount[]" value="<?= $data->discount ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control text-right netamount" row="<?= $i ?>" id="netamount_<?= $i ?>" name="netamount[]" value="<?= $data->net_amount ?>">
                            </td>
                            <td>
                                <?= $data->ref_ic_no ?>
                                <input type="hidden" id="doccode_<?= $i ?>" name="doccode[]" value="<?= $data->ref_ic_no ?>">
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:20px;">
               <a class="btn btn-success btn-xs pull-right" id="save_data">Save</a>
            </div>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript">
$(".priceunit").keyup(function(event) {
    var row = $(this).attr('row');
    var priceunit = ($(this).val()*1);
    var qty = ($('#qty_'+row).val()*1);
    var amt = priceunit*qty;
    var vat = ($('#vat').val()*1);
    // alert(amt);
    var vat_total = (vat/100)*amt;
    var net_amt = amt+vat_total
    $('#amount_'+row).val(amt);
    $('#netamount_'+row).val(net_amt);
});

$(function(){
      $("#save_data").click(function(){

           var formData = new FormData($("#form_data_edit")[0]); 
           

          $.ajax({
                url: '<?= base_url() ?>acc_active/ar_reduce_edit',
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {

                  try{
                     console.log(data);
                     var json = jQuery.parseJSON(data);
                     if(json.status == true){

                        swal({ 
                            title: json.ar_rd,
                            text: json.message,
                            type: "success" 
                        },
                        function(){
                            window.location.href = '<?= base_url() ?>ar/ar_reduce';
                        });
                        
                     }else{
                      
                        swal({ 
                            title: "Error",
                            text: json.message,
                            type: "error" 
                        },
                        function(){
                            window.location.href = '<?= base_url() ?>ar/ar_reduce';
                        });
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