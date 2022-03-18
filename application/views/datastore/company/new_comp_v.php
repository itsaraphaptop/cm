<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <i class="icon-cog3 position-left"></i> New Company
                            <p></p>
                        </h5>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/upload/addcompany"
                            method="post" enctype="multipart/form-data" id="formcom">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <img src="<?php echo base_url();?>assets/images/module/icon_company.png"
                                                    id="imgcomp" class="img-responsive">
                                                <input class="form-control" type="file" name="userfile" size="20"
                                                    OnChange="showPreviewcomp(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h5 class="panel-title">
                                            Company (TH)
                                            <p></p>
                                        </h5>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Company Code :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="maincode" id="maincode"
                                                    class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">TAX No. :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="taxno" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Company Name (TH) :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Address 1 (TH) :</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control input-sm" name="address"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Address 2 (TH) :</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control input-sm" name="address2"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">W/T(%) :</label>
                                            <div class="col-sm-8">
                                                <input name="company_wt" id="wt" placeholder="W/T(%)"
                                                    class="form-control input-sm" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Telephone :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tel" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">FAX :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="fax" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">E-Mail :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="email" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Contacts :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contact" id="name"
                                                    class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-sm-offset-1">
                                        <h5 class="panel-title">
                                            Company (EN)
                                            <p></p>
                                        </h5>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Company Code :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="maincodeen" id="maincodeen"
                                                    class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">TAX No. :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="taxnoen" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Company Name (EN) :</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="nameen" name="company_nameEN"
                                                    class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Address 1 (EN) :</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control input-sm" name="address_en"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Address 2 (EN) :</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control input-sm" name="address_en2"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">W/T(%) :</label>
                                            <div class="col-sm-8">
                                                <input name="company_wt" id="wt" placeholder="W/T(%)"
                                                    class="form-control input-sm" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Telephone :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="telen" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">FAX :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="faxen" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">E-Mail :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="emailen" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Contacts :</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contacten" id="name"
                                                    class="form-control input-sm">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="footer-modal" style="text-align: right;">
                                                    <a id="savecomen" class="btn bg-success">
                                                        <i class="icon-floppy-disk"></i> Save</a>
                                                    <a href="<?php echo base_url(); ?>datastore/archive_company"
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
function showPreviewcomp(ele) {
    $('#imgcomp').attr('src', ele.value); // for IE
    if (ele.files && ele.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imgcomp').attr('src', e.target.result);
        }
        reader.readAsDataURL(ele.files[0]);
    }
}
$("#savecom").click(function() {
    if ($("#maincode").val() == "") {
        swal({
            title: "กรุณากรอกรหัสบริษัท !!!",
            // text: "danger",
            confirmButtonColor: "#FF0000",
            // type: "success"
        });
    } else if ($("#name").val() == "") {
        swal({
            title: "กรุณากรอกชื่อบริษัท !!!",
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
// save con en
$("#savecomen").click(function() {
    if ($("#maincodeen").val() == "") {
        swal({
            title: "กรุณากรอกรหัสบริษัท !!!",
            // text: "danger",
            confirmButtonColor: "#FF0000",
            // type: "success"
        });
    } else if ($("#nameen").val() == "") {
        swal({
            title: "กรุณากรอกชื่อบริษัท !!!",
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
</script>