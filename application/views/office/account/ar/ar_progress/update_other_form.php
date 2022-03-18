<div class="page-header">
    <div class="panel panel-flat">
        <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>แก้ไข ใบแจ้งหนี้อื่นๆ</h3>
            </div>
        </div>
        <form id="other_form" action="<?=base_url();?>ar/save_update_other" method="post">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Invoice No.:</label>
                            <input type="hidden" name="id_header_up" value="<?=$header[0]->ot_id;?>" />
                            <input type="text" class="form-control" name="ot_code" placeholder="Invoice No" readonly="true" value="<?=$header[0]->ot_code;?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Date: </label>
                            <input type="date" name="ot_date" class="form-control" value="<?=$header[0]->ot_date;?>">
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label class="display-block">Tax:</label>
    
                            <label class="radio-inline">
                                <input type="radio" class="styled" name="tax" value="no" <?= ($header[0]->ot_tax == 'no') ? 'checked="checked"' : '';?>>
                                No
                            </label>
    
                            <label class="radio-inline">
                                <input type="radio" class="styled" name="tax" value="yes" <?= ($header[0]->ot_tax == 'yes') ? 'checked="checked"' : '';?>>
                                Yes
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="hidden" name="gl" id="gl_input" value="true">
                        <div class="form-group">
                            <label class="display-block text-semibold">&nbsp;</label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="ch_gl" class="styled" <?= ($header[0]->ot_gl == 'true') ? 'checked="checked"' : ''; ?> >
                                gl
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Department Code:</label>
                            <input type="text" class="form-control" name="depart_code" id="depart_code" readonly="readonly" value="<?=$header[0]->ot_cus_code;?>">
                            <input type="hidden" class="form-control" name="ot_department_id" id="depart_id" readonly="readonly" value="<?=$header[0]->ot_cus_code;?>">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label>Department Name:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="depart_name" id="depart_name" readonly="readonly" value="<?=$header[0]->ot_cus_name;?>">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="department()"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Project Code:</label>
                            <input type="text" class="form-control" name="pro_code" id="pro_code" readonly="readonly" value="<?=$header[0]->ot_pro_code;?>">
                            <input type="hidden" class="form-control" name="ot_pro_id" id="pro_id" readonly="readonly" value="<?=$header[0]->ot_pro_id;?>">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label>Project Name:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="pro_name" id="pro_name" readonly="readonly" value="<?=$header[0]->ot_pro_name;?>">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="project()"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>System:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="sys_head_name" id="sys_head_name" readonly="readonly" value="<?=$header[0]->ot_sys_name;?>">
                                <input type="hidden" class="form-control" name="sys_head_id" id="sys_head_id" readonly="readonly" value="<?=$header[0]->ot_system_id;?>">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="system_header()"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Ref no:</label>
                            <input type="text" name="ot_ref_no" class="form-control" value="<?=$header[0]->ot_ref_no;?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Ref Date: </label>
                            <input type="date" name="ot_ref_date" class="form-control" value="<?=$header[0]->ot_ref_date;?>">
                            <!-- <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                <input type="date" class="form-control">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Type of income: </label>
                            <select class="select-search" name="income_id" id="income">
                                <option></option>
                                <option>+ เพิ่ม</option>
                                
                            <?php 
                                foreach ($incometype as $key => $income) { 
                            ?>
                                <option value="<?=$income->income_id;?>" <?= ($header[0]->ot_type_income_id == $income->income_id) ? 'selected="selected"' : '';?>><?=$income->income_name;?></option>
                            <?php 
                                } 
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group">
                            <label>Customer Code:</label>
                            <input type="text" class="form-control" name="cus_code" id="cus_code" readonly="readonly" value="<?=$header[0]->ot_cus_code;?>">
                            <input type="hidden" class="form-control" name="ot_cus_id" id="cus_id" readonly="readonly" value="<?=$header[0]->ot_cus_id;?>">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label>Customer Name:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cus_name" id="cus_name" readonly="readonly" value="<?=$header[0]->ot_cus_name;?>">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="customer()"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>CR Term:</label>
                            <div class="input-group">
                                <input type="text" name="ot_crterm" id="cr_term" class="form-control" value="<?=$header[0]->ot_crterm;?>">
                                <span class="input-group-addon">Days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label>Due Date:</label>
                            <input type="date" name="ot_duedate" id="duedate" class="form-control" readonly="true" value="<?=$header[0]->ot_duedate;?>" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>% W/T:</label>
                            <input type="text" name="ot_wt" id="ot_wt" class="form-control" value="<?=$header[0]->ot_wt;?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>% VAT:</label>
                            <input type="text" name="ot_vat" id="ot_vat" class="form-control" value="<?=$header[0]->ot_vat;?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Currency:</label>
                            <select class="select" name="ot_currency_id" id="currency">
                                <?php
                                    foreach ($currency as $key => $value) {
                                ?>
                                    <option value="<?=$value->currency_id;?>" <?= ($header[0]->ot_currency_id == $value->currency_id) ? 'selected="selected"' : ''; ?>><?=$value->currency_name_th;?></option>
                                <?php
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="form-group">
                            <label>Exchang rate:</label>
                            <div class="input-group">
                                <input type="text" name="ot_exchangrate" class="form-control" value="<?=$header[0]->ot_exchangrate;?>">
                                <span class="input-group-addon">Baht</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Remark:</label>
                            <textarea name="ot_remark" class="form-control" id="" rows="5"><?=stripslashes($header[0]->ot_remark);?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">

                    <table class="table table-bordered table-xs" width="200%" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center"><div style="width:200px;"></div>Description</th>
                                <th class="text-center"><div style="width:80px;"></div>QTY</th>
                                <th class="text-center"><div style="width:100px;"></div>System code</th>
                                <th class="text-center"><div style="width:200px;"></div>System name</th>
                                <th class="text-center"><div style="width:150px;"></div>Price/Unit</th>
                                <th class="text-center"><div style="width:150px;"></div>Amount</th>
                                <th class="text-center"><div style="width:150px;"></div>VAT</th>
                                <th class="text-center"><div style="width:150px;"></div>W/T Amt.</th>
                                <th class="text-center"><div style="width:150px;"></div>Net Amount</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="other_tr">
                        <?php foreach ($detail as $key => $value) { ?>
                            <tr id='row<?=$value->otde_id;?>'>
                                <td><?=$key+1;?><input type="hidden" name="id_detail_up[]" value="<?=$value->otde_id;?>" /></td>
                                <td><input type="text" class="form-control" name="description_up[]" value="<?=$value->otde_des;?>" /></td>
                                <td><input type="text" class="form-control" name="qty_up[]" onkeyup="sum($(this))" attr-id="<?=$value->otde_id;?>" id="qty<?=$value->otde_id;?>" value="<?=$value->otde_qty;?>" /></td>
                                <td><input type="text" class="form-control" name="unit_code_up[]" id="unit_code<?=$value->otde_id;?>" readonly="readonly" value="<?=$value->otde_unit_code;?>" /></td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="unit_name_up[]" id="unit_name<?=$value->otde_id;?>" readonly="readonly" value="<?=$value->otde_unit_name;?>">
                                        <input type="hidden" class="form-control" name="unit_id_up[]" id="unit_id<?=$value->otde_id;?>" readonly="readonly" value="<?=$value->otde_unit_id;?>">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-icon" attr-id="<?=$value->otde_id;?>" onclick="system($(this))"><i class="icon-search4"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" class="form-control" name="price_up[]" onkeyup="sum($(this))" attr-id="<?=$value->otde_id;?>" id="price<?=$value->otde_id;?>" value="<?=$value->otde_priceu;?>"></td>
                                <td><input type="text" class="form-control" name="amount_up[]" id="amount<?=$value->otde_id;?>" attr-id="<?=$value->otde_id;?>"  value="<?=$value->otde_amount;?>" readonly="readonly"></td>
                                <td><input type="text" class="form-control" name="vat_up[]" id="vat<?=$value->otde_id;?>" attr-id="<?=$value->otde_id;?>" value="<?=$value->otde_vat;?>" readonly="readonly"></td>
                                <td><input type="text" class="form-control" name="wt_up[]" id="wtamt<?=$value->otde_id;?>" attr-id="<?=$value->otde_id;?>" value="<?=$value->otde_atamt;?>" readonly="readonly"></td>
                                <td><input type="text" class="form-control" name="netamount_up[]" id="netamount<?=$value->otde_id;?>" attr-id="<?=$value->otde_id;?>" value="<?=$value->otde_netamount;?>" readonly="readonly"></td>
                                <td><a onclick="delRow($(this))" style="color:red;" attr-id="<?=$value->otde_id;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
             <div class="col-md-offset-9 col-md-3 text-right" style="padding-top:20px;">
                <button type="button" class="btn btn-default btn-primary" id="addRow"><i class="icon-plus-circle2"></i> Add row</button>
                <button type="button" class="btn btn-success" id="save"><i class="icon-floppy-disk"></i> Save</button>
                <button type="button" class="btn btn-info" ><i class=" icon-printer4"></i> Print</button>
                <!-- <label class="checkbox-inline">
                    <input type="checkbox" class="styled" checked="checked">
                    Print after Save
                </label> -->
            </div>
            </div>
        </form>
        </div>
</div>

<!-- Modal reuse components -->
<div id="modal" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="modal-title"></h5>
            </div>

            <div class="modal-body">
                <div id="content_modal">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<script>

    $('#ch_gl').click(function(){
        let _val = $(this).prop("checked");
        if (_val === true) {
            $('#gl_input').val("true");
        }else{
            $('#gl_input').val("false");
        }
    });

    function income() {
        $('#modal-title').html('Add income type');
        $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_modal").load('<?php echo base_url(); ?>ar/add_income');
        $('#modal').modal('show');
    }


    $('#income').change(function(){
        let _val = $("#income option:selected").text();
        // alert(_val);
        if (_val == '+ เพิ่ม') {
            income();
            // alert("modal เพิ่ม");
        }
    });

    $('#cr_term').keyup(function(){
        var day = $(this).val()*1;
        $.get("<?=base_url()?>ar/duedate/"+day, function () {  
        }).done(function(data) {
            $('#duedate').val(data);
        });
    });

    //save form
    $('#save').click(function(){
        let _row = $('#other_tr > tr').length;

        if(_row > 0){
            $('form#other_form').submit();
        }else{
            swal("เตือน!", "กรุณาเพิ่มข้อมูลให้ครบ!", "error");
        }
    });
    //save form

    //department modal
    function department() {
        $('#modal-title').html('Select department');
        $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_modal").load('<?php echo base_url(); ?>ar/department_modal');
        $('#modal').modal('show');
    }
    //department modal

    //project modal
    function project() {
        $('#modal-title').html('Select project');
        $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_modal").load('<?php echo base_url(); ?>ar/project_modal');
        $('#modal').modal('show');
    }
    //project modal

    //customer modal
    function customer() {
        $('#modal-title').html('Select customer');
        $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_modal").load('<?php echo base_url(); ?>ar/custommer_modal');
        $('#modal').modal('show');
    }
    //customer modal

    var numrow = 0;
    $('#addRow').click(function() {
        // numrow++;
        var numrow = $('#other_tr > tr').length+1;
        var row =   `<tr id='row${numrow}'>
                        <td>${numrow}</td>
                        <td><input type="text" class="form-control" name="description[]" /></td>
                        <td><input type="text" class="form-control" name="qty[]" onkeyup="sum($(this))" attr-id="${numrow}" id="qty${numrow}" value="0" /></td>
                        <td><input type="text" class="form-control" name="unit_code[]" id="unit_code${numrow}" readonly="readonly" /></td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="unit_name[]" id="unit_name${numrow}" readonly="readonly">
                                <input type="hidden" class="form-control" name="unit_id[]" id="unit_id${numrow}" readonly="readonly">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" attr-id="${numrow}" onclick="unit($(this))"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </td>
                        <td><input type="text" class="form-control" name="price[]" onkeyup="sum($(this))" attr-id="${numrow}" id="price${numrow}" value="0"></td>
                        <td><input type="text" class="form-control" name="amount[]" id="amount${numrow}" attr-id="${numrow}" value="0" readonly="readonly"></td>
                        <td><input type="text" class="form-control" name="vat[]" id="vat${numrow}" attr-id="${numrow}" value="0" readonly="readonly"></td>
                        <td><input type="text" class="form-control" name="wt[]" id="wtamt${numrow}" attr-id="${numrow}" value="0" readonly="readonly"></td>
                        <td><input type="text" class="form-control" name="netamount[]" id="netamount${numrow}" attr-id="${numrow}" value="0" readonly="readonly"></td>
                        <td><a onclick="delRow($(this))" style="color:red;" attr-id="${numrow}"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>`;
        $('#other_tr').append(row);
    });

    //row system
    function unit(el) {
        $('#modal-title').html('Select system');
        var row_sys = el.attr('attr-id');
        $('#modal').modal('show');
        $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $.post("<?php echo base_url(); ?>ar/unit", { row: row_sys }, function () {    
        }).done(function(page){
            $("#content_modal").html(page);
        });
    }

    //row system
    function system_header() {
        $('#modal-title').html('Select system');
        $('#modal').modal('show');
        $("#content_modal").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $.get("<?php echo base_url(); ?>ar/system_header", function () {    
        }).done(function(page){
            $("#content_modal").html(page);
        });
    }



    //del row
    function delRow(el) {
        swal({
            title: "เตือน!",
            text: "คุณต้องการลบรายการนี้ใช่ไหม?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
                var row_id = el.attr('attr-id');
                $.post("<?=base_url();?>ar/del_otde_id", { id: row_id}, function () {    
                }).done(function(data) {
                    let json_res = jQuery.parseJSON(data);
                    if (json_res.status === true) {  
                        swal("Deleted!", json_res.message, "success");
                        $('#row'+row_id).remove();
                    }else{
                        swal("Not Deleted!", json_res.message, "error");
                    }
                });
        });
    }
    //del row

    $('#ot_wt, #ot_vat').keyup(function(){

    });

    function sum(el) {
        var id = el.attr('attr-id');
        var ot_wt = $('#ot_wt').val()*1;
        var ot_vat = $('#ot_vat').val()*1;

        var qty = $('#qty'+id).val()*1;
        var price = $('#price'+id).val()*1;
        var amount = qty*price;
        var wtamt = amount*ot_wt/100;
        var vat = amount*ot_vat/100;
        $('#amount'+id).val(amount);
        $('#vat'+id).val(vat);
        $('#wtamt'+id).val(wtamt);

        netamount(id);
    }

    function netamount(id) {
        // amount,vat,wtamt
        let amount = $('#amount'+id).val()*1;
        let vat = $('#vat'+id).val()*1;
        let wtamt = $('#wtamt'+id).val()*1;
        $('#netamount'+id).val((amount+vat)-wtamt);
    }

</script>