 <?php foreach ($user as $val) {
$id = $val->m_id;
$mcode = $val->m_code;
$name = $val->m_name;
$proj = $val->m_project;
$depp = $val->department_title;
$tel = $val->m_tel;
$pass = $val->m_pass;
$usern = $val->m_user;
$mail = $val->m_email;
$project = $val->project_name;
$ustatus = $val->m_status;

} ?>
 <div class="panel panel-primary">
            <div class="panel-heading">จัดการข้อมูลผู้ใช้</div>
                <div class="panel-body">
                <div class="row" style="margin-left:10px;">
                    <div class="col-md-4">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="form-group">
                        <button  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มใหม่</button>
                        </div>
                    </div>
                </div>
                            <table id="table_id" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อพนักงาน</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>ใช้งานล่าสุด</th>
                                    <th>เปิด</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($user as $val) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i;?></th>
                                                <td><?php echo $val->m_name;?></td>
                                                <td><?php echo $val->m_user;?></td>
                                                <td><?php echo $val->m_login;?></td>
                                                <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openuser<?php echo $val->m_id; ?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button></td>
                                                <td><button class="btn btn-warning btn-block btn-xs" data-toggle="modal" id="new" data-target="#edituser<?php echo $val->m_id; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
                                                <td><button class="btn btn-danger btn-block btn-xs" id="del<?php echo $val->m_id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>
                                            </tr>

<script>
    $("#del<?php echo $val->m_id;?>").click(function(){
    var url="<?php echo base_url(); ?>index.php/datastore/delete_serviceuser";
        var dataSet={
         id: "<?php echo $val->m_id;?>"
         };
         $.post(url,dataSet,function(data){
            $('#loadbox').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
             $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_user');
         });
    });
</script>
<script>
$('#saveedit<?php echo $val->m_id;?>').click(function(){
  var url="<?php echo base_url(); ?>index.php/datastore/update_serviceuser";
  var dataSet={
                id: "<?php echo $val->m_id;?>",
                ucode : $('#ecode<?php echo $val->m_id;?>').val(),
                uname : $('#ecname<?php echo $val->m_id;?>').val(),
                upass : $('#epass<?php echo $val->m_id;?>').val(),
                uuser : $('#euser<?php echo $val->m_id;?>').val(),
                ustatus : $('#mstatus<?php echo $val->m_id;?>').val(),
                umail : $('#ecmail<?php echo $val->m_id;?>').val(),
                utel : $('#etel<?php echo $val->m_id;?>').val(),
                uproject : $('#ecproject<?php echo $val->m_id;?>').val(),
                udepart : $('#ecdepartment<?php echo $val->m_id;?>').val()

       };
  $.post(url,dataSet,function(data){
  alert(data);
  $('.m_id').val(data);
      });
   $('#saveedit').prop('disabled', true);
            $('#loadbox').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
             $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_user');
  });

</script>
        <!--modal open user -->
        <div class="modal fade" id="openuser<?php echo $val->m_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
                <div class="panel panel-primary">
                       <div style="font-size: 20px;" class="panel-heading">รายละเอียดข้อมูลผู้เข้าใช้งาน</div>
                      <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">รหัสพนักงาน</label>
                                         <p><?php echo $val->m_code;?></p>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">ชื่อพนักงาน</label>
                                         <p><?php echo $val->m_name;?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">อีเมลล์</label>
                                         <p><?php echo $val->m_email;?></p>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">เบอร์โทร</label>
                                         <p><?php echo $val->m_tel;?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-xs-6">
                                    <div class="form-group">
                                    <label for="">ประเภท</label>
                                         <p><?php if($val->m_status == 'm'){ echo "ผู้บริหาร";}
                                         elseif($val->m_status == 'o'){ echo "Office"; }
                                         elseif($val->m_status == 's'){ echo "Site";}?></p>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                    <label for="">โครงการ/แผนก</label>
                                         <p><?php echo $val->project_name;?><?php echo $val->department_title;?></p>
                                    </div>
                                </div>
                            </div>
                              <div class="modal-footer">
                               <div class="row">
                                 <div class="col-md-8">

                                 </div>
                                 <div class="col-md-4">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--endmodal open user -->

                <!-- Modal edituser -->
                <div class="modal fade" id="edituser<?php echo $val->m_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขรายละเอียดผู้ใช้</h4>
                      </div>
                      <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">รหัสพนักงาน</label>
                                 <input type="text" class="form-control input-sm" placeholder="กรอกรหัสพนักงาน" id="ecode<?php echo $val->m_id;?>" readonly="ture" value="<?php echo $val->m_code;?>">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">ชื่อพนักงาน</label>
                                 <input type="text" class="form-control input-sm" placeholder="กรอกชื่อพนักงาน" id="ecname<?php echo $val->m_id;?>" value="<?php echo $val->m_name;?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">อีเมลล์</label>
                                 <input type="text" class="form-control input-sm" placeholder="กรอกอีเมลล์" id="ecmail<?php echo $val->m_id;?>" value="<?php echo $val->m_email;?>">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">เบอร์โทร</label>
                                 <input type="text" class="form-control input-sm" placeholder="กรอกเบอร์โทร" id="etel<?php echo $val->m_id;?>" value="<?php echo $val->m_tel;?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                <label for="">ประเภท</label>
                     <select placeholder="กรอกประเภท" class="form-control input-sm" id="mstatus<?php echo $val->m_id;?>">
                        <?php if($val->m_status == 'md'){ ?><option value="md" selected>ผู้บริหาร</option><?php } else { ?><option value="md">ผู้บริหาร</option><?php }?>
                        <?php if($val->m_status == 'm'){ ?><option value="m" selected>ผู้จัดการ</option><?php } else { ?><option value="m">ผู้จัดการ</option><?php }?>
                        <?php if($val->m_status == 'o'){ ?><option value="o" selected>Offce</option><?php } else { ?><option value="o">Office</option><?php }?>
                        <?php if($val->m_status == 's'){ ?><option value="s" selected>Site</option><?php } else { ?><option value="s">Site</option><?php }?>
                    </select>
                </div>
                        </div>
                        <div class="col-xs-4">
                        <div class="input-group">
                            <label for="project1">แผนก</label>
                                <input type="text" readonly="true" placeholder="เลือกแผนก" class="form-control input-sm input-sm" id="eprojectnam<?php echo $val->m_id;?>" value="<?php echo $val->department_title;?>">
                                <input type="hidden" readonly="true"  class="form-control input-sm input-sm" name="project" id="ecdepartment<?php echo $val->m_id;?>" value="<?php echo $val->m_department;?>">
                                <span class="input-group-btn">
                                <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#eopenproject<?php echo $val->m_id;?>" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                        </div>
            </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6" >
                        <div class="input-group">
                            <label for="project1">โครงการ</label>
                              <input type="text" readonly="true" placeholder="เลือกโครงการ" class="form-control input-sm"  id="eprojectnam1<?php echo $val->m_id;?>" value="<?php echo $val->project_name;?>">
                              <input type="hidden" readonly="true"  class="pproject1 form-control input-sm" name="project1" id="ecproject<?php echo $val->m_id;?>" value="<?php echo $val->m_project;?>">
                              <span class="input-group-btn">
                              <button class="openproj1 btn btn-primary btn-sm" data-toggle="modal" data-target="#eopenproject1<?php echo $val->m_id;?>" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                              </span>
                        </div>
                        </div>
                    </div>
                    <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <h4 class="modal-title" id="myModalLabel">แก้ไขรหัสผ่านผู้ใช้งาน</h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control input-sm" placeholder="กรอกผู้ใช้" id="euser<?php echo $val->m_id;?>" value="<?php echo $val->m_user;?>">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control input-sm" placeholder="กรอกรหัสผู้ใช้" id="epass<?php echo $val->m_id;?>" value="<?php echo $val->m_pass;?>">
                            </div>
                        </div>
                    </div>
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-primary" id="saveedit<?php echo $val->m_id;?>" data-dismiss="modal" >แก้ไข</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--endmodal edituser -->


<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
   
     $('.table').DataTable();
// } );
   $(".openproj1<?php echo $val->m_id;?>").click(function(){
     $("#eprojectnam1<?php echo $val->m_id;?>").val($(this).data('eprojnamep<?php echo $val->m_id;?>'));
     $("#ecproject<?php echo $val->m_id;?>").val($(this).data('eprojidp<?php echo $val->m_id;?>'));
   });
   $(".openproj<?php echo $val->m_id;?>").click(function(){
     $("#eprojectnam<?php echo $val->m_id;?>").val($(this).data('edepname<?php echo $val->m_id;?>'));
     $("#ecdepartment<?php echo $val->m_id;?>").val($(this).data('edepid<?php echo $val->m_id;?>'));
   });
</script>


                                        <?php $i++; } ?>

                                </tbody>
                            </table>
                </div>
        </div>



  <?php foreach ($user as $val2) {?>

                 <!-- modal เลือกแผนก -->
 <div class="modal fade" id="eopenproject<?php echo $val2->m_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกแผนก</h4>
      </div>
        <div class="modal-body">
            <div class="panel">
                <table class="table table-striped table-hover" >
      <thead>
        <tr>
          <th>รหัสแผนก</th>
          <th>ชื่อแผนก</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getdep as $valj){ ?>
        <tr>
         <td><?php echo $valj->department_code; ?></td>
          <td><?php echo $valj->department_title; ?></td>
            <td><button class="openproj<?php echo $val2->m_id;?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-edepid<?php echo $val2->m_id;?>="<?php echo $valj->department_id;?>" data-edepname<?php echo $val2->m_id;?>="<?php echo $valj->department_title;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="eopenproject1<?php echo $val2->m_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="panel">
                <table id="eprojpaginate<?php echo $val2->m_id;?>" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>รหัสโครงการ</th>
          <th>ชื่อโครงการ</th>
          <th>ที่อยู่โครงการ</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getproj as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
         <td><?php echo $valj->project_code; ?></td>
          <td><?php echo $valj->project_name; ?></td>
          <td><?php echo $valj->project_address; ?></td>
            <td><button class="openproj1<?php echo $val2->m_id;?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-eprojidp<?php echo $val2->m_id;?>="<?php echo $valj->project_id;?>" data-eprojnamep<?php echo $val2->m_id;?>="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<?php } ?>