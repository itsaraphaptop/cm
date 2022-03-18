<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <i class="icon-cog3 position-left"></i> New Business Unit
                            <p></p>
                        </h5>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="<?php echo base_url(); ?>datastore_active/add_business"
                            method="post" enctype="multipart/form-data" id="formcom">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Business Unit :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="business_code" id="bucode" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Bussiness Name :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="business_name" id="buname" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status :</label>
                                            <div class="col-sm-8">
                                                <select class="form-control input-sm" name="status" id="status">
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="footer-modal" style="text-align: right;">
                                                    <a id="savecom" class="btn bg-success">
                                                        <i class="icon-floppy-disk"></i> Save</a>
                                                    <a href="<?php echo base_url(); ?>data_master/bussiness_unit"
                                                        class="btn bg-danger">
                                                        <i class="icon-close2"></i> Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$("#savecom").click(function() {
    if ($("#bucode").val() == "") {
        swal({
            title: "กรุณากรอก Business Unit !!!",
            // text: "danger",
            confirmButtonColor: "#FF0000",
            // type: "success"
        });
    } else if ($("#buname").val() == "") {
        swal({
            title: "กรุณากรอก  Bussiness Name !!!",
            // text: "danger",
            confirmButtonColor: "#FF0000",
            // type: "success"
        });
    } else {
        swal({
            title: "Save Completed!!",
            text: "Save Completed!!.",
            // confirmButtonColor: "#66BB6A",
            type: "success"
        });
        var frm = $('#formcom');
        frm.submit();
    }
});
$('#mg').attr('class', 'active');
$('#mc2').attr('style', 'background-color:#dedbd8');
</script>