<div class="row">
    <div class="col-lg-9 col-xl-6 offset-xl-3">
        <h3 class="font-size-h6 mb-5">Signature:</h3>
    </div>
</div>
<div class="col-md-6">
    <form id="formsign" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
            <div class="col-lg-9 col-xl-9">
                <?php if ($getmemb[0]['sign']=="") {?>
                    <img src="<?php echo base_url();?>boostrap4/dist/assets/media/users/blank.png" id="sing" style="max-width:50%">
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>sign/<?=$getmemb[0]['sign'];?>" id="sing" style="max-width:50%">
                <?php } ?>
                <input class="form-control" type="file" name="userfile" size="20" OnChange="showPreviewcomp(this)">
                <button type="button" class="btn btn-primary btn-block" style="margin-top:10px;" id="saveimg" autocomplete="off"> Save Image</button>
            </div>
        </div>
        <input type="hidden" name="m_id" value="<?=$m_id;?>">
    </form>
</div>

<script>
function showPreviewcomp(ele) {
    $('#sing').attr('src', ele.value); // for IE
    if (ele.files && ele.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#sing').attr('src', e.target.result);
        }
        reader.readAsDataURL(ele.files[0]);
    }
}
$("#saveimg").on('click',function () {
    var formData = new FormData($('#formsign')[0]);
                // var file = $('#file').val();
                // frm.submit(function(ev) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>datastore/uploadsignature',
                        type: 'POST',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        success: function(data) {
                            console.log(data);
                            Swal.fire(
                                data,
                                "Your file has been Completed.",
                                "success"
                            )
                        }
                    });
});
</script>