<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>comp/<?php echo $compimg; ?>" class="img-responsive" style="height:40px; margin-top:-10px;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               <!-- <li class="active"><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>-->
               <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span  class="glyphicon glyphicon-briefcase"></span> Office Service <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>office/newpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Purchase Requsition</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Pretty Cash</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Approve System</li>
                        <li><a href="#">Approve PR</a></li>
                    </ul>
                </li>-->
                <li><a href="<?php echo base_url(); ?>index.php/panel/office"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Dashboard</a></li>
                
                <!-- <li><a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Budget</a></li> -->
              
            </ul>
             <ul class="nav navbar-nav navbar-right">
             <li><a href="<?php echo base_url(); ?>index.php/help"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Feedback & Support</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding: 8px;"><img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" class="img-rounded" style="height:35px;">  <?php echo $name; ?> <span class="caret"></span></a>
                    <div class="dropdown-menu" style="width:300px;">
                    <div class="row-field" style="margin: 10px;">
                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ข้อมูลผู้ใช้</h3>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                   <img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" class="img-responsive img-rounded">
                            </div>
                            <div class="col-xs-6">
                                <strong>ชื่อผู้ใช้</strong>
                                <h4><?php echo $name; ?></h4>
                                <br>
                                <button class="btn btn-xs btn-warning btn-block" data-toggle="modal" data-target="#img"> เปลี่ยนรูปภาพ</button>
                            </div>
                        </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-xs-6">
                                    <strong>E-Mail</strong>
                                    <p><?php echo $email; ?></p>
                                </div>
                                <div class="col-xs-6">
                                
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-xs-6">
                                     <?php if ($dep=="") {?>
                                        <strong>โครงการ</strong>
                                        <p><?php echo $project; ?></p>
                                    <?php  }else{ ?>
                                        <strong>แผนก</strong>
                                        <p><?php echo $dep; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <a href="<?php echo base_url(); ?>index.php/auth/logout"><button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> ออกจากระบบ</button></a>
                    </div>
                </div>
            </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">จัดการ <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if ($master!="true") {?>
                
            <?php }else{ ?>
            <li><a href="<?php echo base_url(); ?>index.php/datastore/project"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> จัดการข้อมูล</a></li>
            
            <?php } ?>

            <?php if ($user_right!="true") {?>
            <?php }else{ ?>
                <li><a href="<?php echo base_url(); ?>index.php/datastore/permission"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> ระบบจัดการสิทธ์ <span class="label label-warning">Beta</span></a></li>
            <?php } ?>
            <?php if ($username!="admin") {?>
            <?php }else{ ?>
            <li><a href="<?php echo base_url(); ?>index.php/help/list_help"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> รายการปัญหา(FixBug)</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/log/viewlog"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> View Log</a></li>
            <?php } ?>
            <li><a href="#" data-toggle="modal" data-target="#changepassword"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> เปลี่ยนรหัสผ่าน</a></li>
            <li role="separator" class="divider"></li>
            <li ><a href="<?php echo base_url(); ?>index.php/auth/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> ออกจากระบบ </a></li>
          </ul>
        </li>
      </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- modal เปลี่ยนรหัสผ่าน -->
 <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เปลี่ยนรหัสผ่าน</h4>
      </div>
      <form method="post" action="<?php echo base_url(); ?>index.php/auth/changepass">
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                         <input type="hidden" class="form-control input-sm" name="username" value="<?php echo $username; ?>">
                        <input type="password" class="password form-control input-lg" name="password" placeholder="New Password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <button class="change btn btn-primary btn-sm btn-block" name="btnchange" type="submit">Submit</button>
                         <button class="btn btn-default btn-sm btn-block" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
  </div>
</div> <!--end modal -->

<!-- modal รูปภาพ -->
 <div class="modal fade" id="img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Profile</h4>
      </div>     
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-6">
                    <!-- <img src="<?php echo base_url(); ?>dist/img/no_avatar.jpg" id="imgAvatar" alt="Image" class="img-responsive img-rounded"> -->
                       <img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" id="imgAvatar" class="img-responsive img-rounded">
                </div>
                <div class="col-xs-6">
                    <strong>ชื่อผู้ใช้</strong>
                    <h1><?php echo $name; ?></h1>
                    <br>
                    <label for="">เลือกไฟล์ Image</label>
                     <form action="<?php echo base_url(); ?>index.php/upload/uploadprofile" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="userfile" size="20"  OnChange="showPreview(this)">
                        <button type="submit" name="improfile" class="btn btn-primary btn-block" style="margin-top:10px;" data-loading-text="Loading..." id="loadimg" autocomplete="off"> ยืนยันการอัพโหลดรูปภาพ</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
         <div class="modal-footer">
          <!-- <img src="<?php echo base_url();?>dist/img/logo.png" class="img-responsive" style="height:20px; float:left;"> -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> <!--end modal -->






<script>
// $(document).ready(function() {
    $('.change').prop('disabled', true);
// });
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
  function showPreview1(ele)
  {
      $('#imgfix').attr('src', ele.value); // for IE
            if (ele.files && ele.files[0]) {
      
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#imgfix').attr('src', e.target.result);
                }

                reader.readAsDataURL(ele.files[0]);
            }
  }
   $('#loadimg').on('click', function () {
    
  });
   $(".password").change(function(event) {
       $('.change').prop('disabled', false);
   });
</script>



