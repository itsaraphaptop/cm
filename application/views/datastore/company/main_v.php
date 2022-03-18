<?php foreach ($res as $val) {
  $id = $val->company_id;
  $compid = $val->company_code;
  $compname = $val->company_name;
  $comptex = $val->company_taxnum;
  $comptexen = $val->company_taxnumen;
  $compaddr = $val->company_address;
  $compaddr2 = $val->company_address2;
  $compaddr3 = $val->company_address3;
  $comptel = $val->company_tel;
  $compwt = $val->wt_tax;
  $compfax = $val->company_fax;
  $compemail = $val->company_email;
  $compcontract = $val->company_contact;
  $comptelen = $val->company_telen;
  $compfaxen = $val->company_faxen;
  $compemailen = $val->company_emailen;
  $compcontracten = $val->company_contacten;
  $compcode = $val->compcode;
  $compcodeen = $val->compcodeen;
  $type = $val->ic_type;
  $rcompimg = $val->comp_img;
  $company_nameth = $val->company_nameth;
  $company_add_en = $val->company_add_en;
  $company_add_en2 = $val->company_add_en2;
  $company_add_en3 = $val->company_add_en3;
  $rcompimg = $val->comp_img;
  } ?>



<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <i class="icon-cog3 position-left"></i> Edit Company
                            <p></p>
                        </h5>
                    </div>

                    <div class="panel-body">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <div class="panel panel-defualt">
                                        <div class="panel-heading">
                                            <span aria-hidden="true"></span> ขนาด 200x50 px </div>
                                        <div class="panel-body">
                                            <form action="<?php echo base_url(); ?>index.php/upload/uploadcomp"
                                                method="post" enctype="multipart/form-data">
                                                <img src="<?php echo base_url();?>comp/<?php echo $rcompimg; ?>"
                                                    id="imgcomp" class="img-responsive">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="file" name="userfile" size="20"
                                                OnChange="showPreviewcomp(this)">
                                            <input type="hidden" name="imgcompcode" value="<?php echo $compcode; ?>">
                                            <button type="submit" class="btn btn-primary btn-block"
                                                style="margin-top:10px;" id="loadimg" autocomplete="off"> Save
                                                Image</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-horizontal" method="post"
                            action="<?php echo base_url(); ?>datastore/edit_company/<?php echo $id; ?>" id="formcom">
                            <div class="row">

                                <div class="col-sm-4">
                                    <h5 class="panel-title">
                                        Company (TH)
                                        <p></p>
                                    </h5>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Company Code :</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly="true" name="maincode"
                                                value="<?php echo $compcode; ?>" class="form-control input-sm">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">TAX No. :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="taxno" value="<?php echo $comptex; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Company Name (TH) :</label>
                                        <div class="col-sm-8">
                                            <input class="form-control input-sm" type="text" id="name" name="name"
                                                value="<?php echo $company_nameth; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address 1 (TH) :</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control input-sm" name="address1"
                                                rows="3"><?=$compaddr?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address 2 (TH) :</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control input-sm" name="address2"
                                                rows="3"><?=$compaddr2?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">W/T(%) :</label>
                                        <div class="col-sm-8">
                                            <input name="wttax" value="<?php echo $compwt; ?>"
                                                class="form-control input-sm" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Telephone :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="tel" value="<?php echo $comptel; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">FAX :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="fax" value="<?php echo $compfax; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">E-Mail :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="email" value="<?php echo $compemail; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Contacts :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="contact" value="<?php echo $compcontract; ?>"
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
                                            <input type="text" readonly="true" name="maincodeen"
                                                value="<?php echo $compcode; ?>" class="form-control input-sm">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">TAX No. :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="taxnoen" value="<?php echo $comptexen; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Company Name (EN) :</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="name" name="company_nameEN"
                                                value="<?php echo $compname; ?>" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address 1 (EN) :</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control input-sm" name="address_en1"
                                                rows="3"><?php echo $company_add_en; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Address 2 (EN) :</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control input-sm" name="address_en2"
                                                rows="3"><?php echo $company_add_en2; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">W/T(%) :</label>
                                        <div class="col-sm-8">
                                            <input name="wttax" value="<?php echo $compwt; ?>"
                                                class="form-control input-sm" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Telephone :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="telen" value="<?php echo $comptelen; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">FAX :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="faxen" value="<?php echo $compfaxen; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">E-Mail :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="emailen" value="<?php echo $compemailen; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Contacts :</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="contacten" value="<?php echo $compcontracten; ?>"
                                                class="form-control input-sm">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="text-right">
                                                <a id="savecom" class="btn bg-success">
                                                    <i class="icon-floppy-disk"></i> Save</a>
                                                <a id="fa_close"
                                                    href="<?php echo base_url(); ?>datastore/archive_company"
                                                    class="btn bg-danger">
                                                    <i class="icon-close2"></i> Close</a>
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
$("#a").click(function() {
    if ($("#a").prop("checked")) {
        $("#chki").val("avg");
    } else {
        $("#chki").val("fifo");
    }
    var url = "<?php echo base_url(); ?>datastore/setictype";
    var dataSet = {
        id: "<?php echo $id;?>",
        type: $("#chki").val()
    };
    $.post(url, dataSet, function(data) {
        //  callback
    });
});
$("#savecom").click(function() {
    if ($("#name").val() == "") {
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