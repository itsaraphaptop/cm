

<div class="row">


<br><br>
<?php  foreach ($getimg as $val) {?>



  <center> <img class="img-thumbnail" src="<?php echo base_url() ;?>profile/<?php echo $val->emp_pic; ?>" id="imgAvatar" alt="" width="250" height="300"></center>



<br>
      <center><h6 class="text-semibold no-margin"><?php echo $val->emp_name_t;?>


              <br>
            <form action="<?php echo base_url(); ?>userimg/uploadprofile/<?php echo $val->emp_member;?>" method="post" enctype="multipart/form-data">
              <div class="rows">
                <center><label>Upload profile image</label></center>
                <center><label><input class="form-control" type="file" name="userfile" size="20"  OnChange="showPreview(this)">
                  <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span></label></center>
                <center><label><button type="submit" name="improfile" class="btn btn-primary btn-block" style="margin-top:10px;" data-loading-text="Loading..." id="loadimg" autocomplete="off"> ยืนยันการอัพโหลดรูปภาพ</button></label>
                </div>
              </form>
</div>
<script>

	function showPreview(ele)
  {
      $('#imgAvatar').attr('src', ele.value); // for IE
            if (ele.files && ele.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgAvatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(ele.files[0]);
            }
  }
</script>
  <!-- /user thumbnail -->
        <?php }  ?>
