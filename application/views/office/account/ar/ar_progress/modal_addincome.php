<form id="add_income" method="post" action="<?=base_url()?>ar/save_incometype" class="form-horizontal">
    <div class="panel-body">
        <div class="form-group">
            <label class="col-lg-3 control-label">Account Code:</label>
            <div class="col-lg-9">
                <div class="input-group">
                    <input type="text" class="form-control" name="income_code" id="income_code" readonly="readonly">
                    <div class="input-group-btn">
                    <button type="button" class="btn btn-info btn-icon" onclick="ac_code()"><i class="icon-search4"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Income Name:</label>
            <div class="col-lg-9">
                <input type="text" name="income_name" id="income_name" class="form-control" placeholder="Income Name">
            </div>
        </div>
        <div class="text-right">
            <button type="button" id="add_typeincome" class="btn btn-success">Add <i id="ic_addincome" class="icon-arrow-right14 position-right"></i></button>
        </div>
    </div>
</form>




<script>
    $("#add_typeincome").click(function(){
        //income_code = ac_code นะครับ By tae
        let code = $('#income_code').val();
        let name = $('#income_name').val();
        $(this).attr('class', 'btn btn-success disabled');
        $('#ic_addincome').attr('class', 'icon-sync spinner');

        if (code =='' || name == '') {
            swal("เตือน!", "กรุณาระบุข้อมูลให้ครบ!", "error");
            $(this).attr('class', 'btn btn-success');
            $('#ic_addincome').attr('class', 'icon-arrow-right14 position-right');
        }else{
            $('#add_income').submit();
            
        }
    });
    
    function ac_code(){
        $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#account_code").load('<?php echo base_url(); ?>ar/account_code');
        $('#myAccount').modal('show');
    }
</script>