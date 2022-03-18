<div class="page-header">
    <div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>บันทึก ใบแจ้งหนี้อื่นๆ</h3>
        </div>
    </div>
    <form id="other_form" action="<?=base_url();?>ar/save_other" method="post">
        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-7">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label>Invoice No.:</label>
                        <input type="text" class="form-control" name="ot_code" id="inv_no" placeholder="Invoice No">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label>Date: </label>
                        <input type="date" name="ot_date" class="form-control" value="<?=date('Y-m-d');?>">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="display-block">Tax:</label>

                        <label class="radio-inline">
                            <input type="radio" class="styled" name="tax" checked="checked" value="no">
                            No
                        </label>

                        <label class="radio-inline">
                            <input type="radio" class="styled" name="tax" value="yes">
                            Yes
                        </label>
                        <input type="hidden" name="gl" id="gl_input" value="true">
                        <label class="display-block text-semibold">&nbsp;</label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="ch_gl" class="styled" checked="checked">
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
                        <label>Department / Project Code:</label>
                        <input type="text" class="form-control" name="pro_code" id="pro_code" readonly="readonly">
                        <input type="hidden" class="form-control" name="ot_pro_id" id="pro_id" readonly="readonly">
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="form-group">
                        <label>Department / Project Name:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="pro_name" id="pro_name" readonly="readonly">
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
                            <input type="text" class="form-control" name="sys_head_name" id="sys_head_name" readonly="readonly">
                            <input type="hidden" class="form-control" name="sys_head_id" id="sys_head_id" readonly="readonly">
                            <input type="hidden" class="form-control" name="sys_head_code" id="sys_head_code" readonly="readonly">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-info btn-icon" onclick="system_header()"><i class="icon-search4"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Ref no:</label>
                        <input type="text" name="ot_ref_no" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Ref Date: </label>
                        <input type="date" name="ot_ref_date" class="form-control">
                        <!-- <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                            <input type="date" class="form-control">
                        </div> -->
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Type of income:</label>
                        <select class="select-search" name="income_id" id="income">
                            <option value="0"></option>
                            <option>+ เพิ่ม</option>
                        <?php 
                            foreach ($incometype as $key => $income) { 
                        ?>
                            <option value="<?=$income->income_id;?>"><?=$income->income_name;?></option>
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
                        <input type="text" class="form-control" name="cus_code" id="cus_code" readonly="readonly">
                        <input type="hidden" class="form-control" name="ot_cus_id" id="cus_id" readonly="readonly">
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="form-group">
                        <label>Customer Name:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cus_name" id="cus_name" readonly="readonly">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-info btn-icon" onclick="customer()"><i class="icon-search4"></i></button>
                            </div>
                        </div>
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
                            <input type="text" name="ot_crterm" id="cr_term" class="form-control">
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
                        <input type="text" name="ot_wt" id="ot_wt" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label>% VAT:</label>
                        <input type="text" name="ot_vat" id="ot_vat" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label>Currency:</label>
                        <select class="select" name="ot_currency_id" id="currency">
                            <?php
                                foreach ($currency as $key => $value) {
                            ?>
                                <option value="<?=$value->currency_id;?>"><?=$value->currency_name_th;?></option>
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
                            <input type="text" name="ot_exchangrate" class="form-control">
                            <span class="input-group-addon">Baht</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Remark : </label>
                        <textarea name="ot_remark" class="form-control" id="" rows="5"></textarea>
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
                        
                    </tbody>
                </table>
            </div>
        </div>
         <div class="row form-group" style="padding-top:20px;">
            <div class="col-md-11 col-sm-11 col-xs-11">
                <button type="button" class="btn btn-default btn-primary pull-right" id="addRow">
                <i class="icon-plus-circle2"></i> Add row
                </button>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
                <button type="button" class="btn btn-success pull-right" id="save">
                <i id="icon_save" class="icon-floppy-disk"></i> Save
                </button>
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
    if ($('#inv_no').val() == '') {
        swal({
            title: "กรุณากรอก Invoice ",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
        return false;
    }

    if ($('#pro_code').val() == '') {
        swal({
            title: "กรุณาเลือก Department / Project ",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
        return false;
    }

    if ($('#sys_head_name').val() == '') {
        swal({
            title: "กรุณาเลือก System ",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
        return false;
    }

    if ($('#cus_id').val() == '') {
        swal({
            title: "กรุณากรอก CR Term: ",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
        return false;
    }
    
    if ($('#cr_term').val() == '') {
        swal({
            title: "กรุณาเลือก Customer ",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
        return false;
    }

    if ($('#income').val() == '0') {
        swal({
            title: "กรุณาเลือก Type of income ",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
        return false;
    }



        let _row = $('#other_tr > tr').length;
        if ($('#inv_no').val() == 0) {
            swal("เตือน!", "กรุณากรอกเลข Invoice", "error");
            return false;
        }
        if(_row > 0){
            $('#save').attr('class', 'btn btn-success disabled pull-right');
            $('#icon_save').attr('class', 'icon-spinner2 spinner');
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
        numrow++;
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
                $('#row'+row_id).remove();
                swal("Deleted!", "ลบรายการนี้เรียบร้อยแล้ว.", "success");
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
    // //currency
    // $('#currency').change(function() {
    //     var _val = $(this).val();
    //     alert(_val);
    // });
    // //currency

    // // Tax
    // $('input[name="tax"]').change(function() {
    //     var tax = $(this).val();
    //     alert(tax);
    // });
    // // Tax

    // // Type
    // $('input[name="type"]').change(function() {
    //     var type = $(this).val();
    //     alert(type);
    // });
    // // Type
</script>