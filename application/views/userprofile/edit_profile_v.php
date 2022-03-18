<style type="text/css">
#insForm .has-error .control-label,
#insForm .has-error .help-block,
#insForm .has-error .form-control-feedback {
    color: #f39c12;
}

#insForm .has-success .control-label,
#insForm .has-success .help-block,
#insForm .has-success .form-control-feedback {
    color: #18bc9c;
}
.borderless td, .borderless th {
    border: none;
}
</style>
<div class="content">
  <?php foreach ($edu as $key => $value) {
    $emp_title = $value->emp_title;
    $emp_name_t = $value->emp_name_t;
    $emp_nickname = $value->emp_nickname;
    $emp_sex = $value->emp_sex;
    $emp_title_e = $value->emp_title_e;
    $emp_name_e = $value->emp_name_e;
    $emp_idcityzen = $value->emp_idcityzen;
    $emp_tele = $value->emp_tele;
    $emp_email= $value->emp_email;
    $emp_bdate = $value->emp_bdate;
    $emp_status = $value->emp_status;
    $emp_h = $value->emp_h;
    $emp_w = $value->emp_w;
    $emp_brosis = $value->emp_brosis;
    $emp_race = $value->emp_race;
    $emp_nation = $value->emp_nation;
    $emp_religion = $value->emp_religion;
    $emp_child = $value->emp_child;
    $emp_cno = $value->emp_cno;
    $emp_id = $value->emp_id;
    $emp_code = $value->emp_code;
    $emp_age = $value->emp_age;
    } 
    foreach ($com as $company) {
      $emp_member = $company->emp_member;
      $emp_code = $company->emp_code;
    }
    foreach ($con as $contact) {
      $emp_address_now = $contact->emp_address_now;
      $emp_address_book = $contact->emp_address_book;
      $emp_cflname = $contact->emp_cflname;
      $emp_cjob =$contact->emp_cjob;
      $emp_crela = $contact->emp_crela;
      $emp_cplace = $contact->emp_cplace;
      $emp_ctele = $contact->emp_ctele;
    }

    $mem  = $this->db->query("select * from  member where m_position !='3' and m_position !='4'")->result();
    ?>
<div class="panel panel-flat">
  <div class="panel-heading">
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    <div class="panel-body">
              <legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i>Edit Employee Information </h4></legend>
                <ul class="nav nav-tabs nav-tabs-highlight">
         
            <li id="lihome" class="active"><a data-toggle="tab" href="#home" class="glyphicon glyphicon-user">  ข้อมูลส่วนตัว</a></li>
            <li id="limenu1"><a data-toggle="tab" href="#menu1" class="fa fa-flag-o">  ที่อยู่และบุคคลติดต่อได้</a></li>
            <li><a data-toggle="tab" href="#menu2" class="fa fa-graduation-cap">ประวัติ</a></li>
<!--             <li><a data-toggle="tab" href="#menu3" class="glyphicon glyphicon-list-alt">  ทักษะและความสามารถ</a></li> -->
            <!-- <li><a data-toggle="tab" href="#menu4" class="fa fa-group">  ภายในองค์กร</a></li> -->
          </ul>
          <form id="insForm" action="<?php echo base_url(); ?>emp_profile/edit_profile/<?php echo $emp_member; ?>" method="post">
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-xs-3">
                    <label>คำนำหน้า</label>
                    <select  name="emp_title" id="emp_title" class="form-control">
                           <?php if($emp_title == '1'){ ?><option value="1" selected>นาย</option><?php } else { ?><option value="1">นาย</option><?php }?>
                           <?php if($emp_title == '2'){ ?><option value="2" selected>นาง</option><?php } else { ?><option value="2">นาง</option><?php }?>
                           <?php if($emp_title == '3'){ ?><option value="3" selected>นางสาว</option><?php } else { ?><option value="3">นางสาว</option><?php }?>
                         </select>
                  </div>

                  <div class="col-xs-3">
                    <label>ชื่อ - นามสกุล</label>
                    <input type="text" class="form-control" value="<?php echo $emp_name_t;?>" id="emp_name_t" name="emp_name_t">
                  </div>

                  <div class="col-xs-1">
                    <label>ชื่อเล่น</label>
                    <input type="text" class="form-control" value="<?php echo $emp_nickname;?>" id="emp_nickname" name="emp_nickname">
                  </div>

                  <div class="col-xs-2">
                    <label>เพศ</label><br>
                    <?php if ($emp_sex == 1) { ?>
                      <label><input type="radio" id="sex" name="sex" checked value="1">ชาย</label>
                    <label><input type="radio" id="sex" name="sex" value="2">หญิง</label>
                    <?php } else{ ?>
                    <label><input type="radio" id="sex" name="sex" value="1">ชาย</label>
                    <label><input type="radio" id="sex" name="sex" checked value="2">หญิง</label>
                    <?php } ?>
                    
                  </div>
                </div>
                  <br>
                <div class="row">
                  <div class="col-xs-3">
                    <label>คำนำหน้า</label>
                    <select class="form-control" name="emp_title_e" id="emp_title_e">
                      <?php if($emp_title_e== '1'){ ?><option value="1" selected>Mr.</option><?php } else { ?><option value="1">Mr.</option><?php }?>
                      <?php if($emp_title_e== '2'){ ?><option value="2" selected>Ms.</option><?php } else { ?><option value="2">Ms.</option><?php }?>
                      <?php if($emp_title_e== '3'){ ?><option value="3" selected>Mrs.</option><?php } else { ?><option value="3">Mrs.</option><?php }?>
                    </select>
                  </div>

                  <div class="col-xs-3">
                    <label>Name</label>
                    <input type="text" class="form-control" value="<?php echo $emp_name_e;?>" id="emp_name_e" name="emp_name_e">
                  </div>

                  <div class="col-xs-3">
                    <label>บัตรประชาชน</label>
                    <input type="text" class="form-control" value="<?php echo $emp_idcityzen;?>" id="emp_idcityzen" name="emp_idcityzen" maxlength="13">
                  </div>

                  <div class="col-xs-3">
                    <label>เบอร์โทรศัพท์</label>
                    <input type="text" maxlength="10" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" id="emp_tele" name="emp_tele" value="<?php echo $emp_tele;?>">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-xs-3">
                    <label>E-mail</label>
                    <input type="text" class="form-control input-sm" placeholder="xxxxx@example.com" id="emp_email" name="emp_email" value="<?php echo $emp_email;?>"">
                  </div>

                  <div class="col-xs-3">
                    <label>วันเกิด</label>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='date' class="form-control"  id="emp_bdate" name="emp_bdate" value="<?php echo $emp_bdate;?>" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <label>อายุ</label>
                    <div class="form-group">
                        <div class='input-group date'>
                            <input type='text' class="form-control" readonly="true"  id="emp_age" name="emp_age" value="<?php echo $emp_age;?>"  />
                            <span class="input-group-addon">
                                ปี
                            </span>
                        </div>
                    </div>
                  </div>

                  <div class="col-xs-3">
                    <label>สถานะ</label>
                    <select class="form-control input-sm" name="emp_statuss" id="emp_statuss">
                      <?php if($emp_status == 'สมรส'){ ?><option value="สมรส" selected>สมรม</option><?php } else { ?><option value="สมรส">สมรส</option><?php }?>
                      <?php if($emp_status== 'โสด'){ ?><option value="โสด" selected>โสด</option><?php } else { ?><option value="โสด">โสด</option><?php }?>
                      <?php if($emp_status == 'หย่า'){ ?><option value="หย่า" selected>หย่า</option><?php } else { ?><option value="หย่า">หย่า</option><?php }?>
                    </select>
                  </div>
                </div> 

                <div class="row">    
                  <div class="col-xs-3">
                    <label>ส่วนสูง</label>
                    <input type="text" class="form-control input-sm" placeholder="ส่วนสูง" id="emp_h"  name="emp_h" value="<?php echo $emp_h; ?>">
                  </div>

                  <div class="col-xs-3">
                    <label>น้ำหนัก</label>
                    <input type="text" class="form-control input-sm" placeholder="น้ำหนัก" id="emp_w" name="emp_w" value="<?php echo $emp_w; ?>">
                  </div>

                  <div class="col-xs-3">
                    <label>เชื้อชาติ</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกเชื้อชาติ" id="emp_race" name="emp_race" value="<?php echo $emp_race; ?>">
                  </div>

                  <div class="col-xs-3">
                    <label>สัญชาติ</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกสัญชาติ" id="emp_nation" name="emp_nation" value="<?php echo $emp_nation; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-3">
                    <label>ศาสนา</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกศาสนา" id="emp_religion" name="emp_religion" value="<?php echo $emp_religion; ?>">
                  </div>
                  <div class="col-xs-3">
                    <label>จำนวนบุตร</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกจำนวน" id="emp_child" name="emp_child" value="<?php echo $emp_child; ?>">
                  </div>
                  
                  <div class="col-xs-3">
                    <label>จำนวนพี่น้อง</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกจำนวน" id="emp_brosis" name="emp_brosis" value="<?php echo $emp_brosis; ?>">
                  </div>
                  <div class="col-xs-3">
                    <label>เป็นบุตรคนที่</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกลำดับ" id="emp_cno" name="emp_cno" value="<?php echo $emp_cno; ?>">
                  </div>
                </div>
              </div>

              <div id="menu1" class="tab-pane fade">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="comment">ที่อยู่ปัจจุบัน</label>
                      <textarea class="form-control" rows="3" id="emp_address_now" name="emp_address_now"><?php echo $emp_address_now; ?> </textarea>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="comment">ที่อยู่ตามทะเบียนบ้าน</label>
                      <textarea class="form-control" rows="3" id="emp_address_book" name="emp_address_book"><?php echo $emp_address_book; ?> </textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <h3>บุคคลที่สามารถติดต่อได้(กรณีฉุกเฉิน)</h3>
                  <div class="col-xs-3">
                    <label>ชื่อ  -  สกุล</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกชื่อและสกุล" id="emp_cflname" name="emp_cflname" value="<?php echo $emp_cflname; ?>">
                  </div>

                  <div class="col-xs-2">
                      <label>อาชีพ</label>
                      <input type="text" class="form-control input-sm" placeholder="กรอกอาชีพ" id="emp_cjob" name="emp_cjob" value="<?php echo $emp_cjob; ?>">
                  </div>

                  <div class="col-xs-2">
                      <label>เกี่ยวของเป็น</label>
                      <input type="text" class="form-control input-sm" placeholder="ระบุความสัมพันธ์" id="emp_crela" name="emp_crela" value="<?php echo $emp_crela; ?>">
                  </div>

                  <div class="col-xs-3">
                      <label>สถานที่ทำงาน</label>
                      <input type="text" class="form-control input-sm" placeholder="กรอกสถานที่" id="emp_cplace" name="emp_cplace"  value="<?php echo $emp_cplace; ?>">
                  </div>
                  
                  <div class="col-xs-2">
                      <label>เบอร์โทรศัพท์</label>
                      <input type="text" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" id="emp_ctele" name="emp_ctele"  value="<?php echo $emp_ctele; ?>">
                  </div>
                </div>
              </div>

              <div id="menu2" class="tab-pane fade">
                <div class="row">
                  <div class="col-md-12">
                      <h1>ประวัติการศึกษา</h1>
                          <?php
                              $q = $this->db->query("select * from emp_edu_tb where emp_member='$emp_member'");
                              $res = $q->result();
                          ?>
                          <table class="table table-bordered table-xxs table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>ระดับการศึกษา</th>
                                <th>ชื่อสถานศึกษา</th>
                                <th>สาขาวิชา</th>
                                <th>ตั้งแต่ปี</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <?php $n=1; foreach($res as $roww )  {?>
                                <td><?php echo $n;?></td>
                                <td><?php echo $roww->edu_level;?></td>
                                <td><?php echo $roww->edu_name;?></td>
                                <td><?php echo $roww->edu_major;?></td>
                                <td><?php echo $roww->edu_yend;?></td>
                                <td>
                                  <a href="<?php echo base_url(); ?>userprofile/proedit_edu/<?php echo $emp_member; ?>" title="Edit" class="label label-success">แก้ไข</a>
                                  <a href="<?php echo base_url(); ?>userprofile/proedit_edu/<?php echo $emp_member; ?>" title="Delete" class="label label-danger">ลบ</a></td>
                              </tr>
                              <?php $n++;}  ?>
                            </tbody>
                          </table>
                      <a href="<?php echo base_url(); ?>userprofile/proedit_edu/<?php echo $emp_member; ?>" id='add_job<?php echo $roww->emp_member; ?>' class="label label-success pull-left">เพิ่ม</a>
                      <!-- <a  id='delete_row<?php echo $roww->emp_id; ?>' class="pull-right label label-danger">ลบแถว</a><br> -->
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <h1>ประวัติการทำงาน</h1>
                          <?php
                              $q = $this->db->query("select * from emp_job_tb where emp_member='$emp_member'");
                              $res = $q->result();
                          ?>
                          <table class="table table-bordered table-xxs table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th class="text-center">ชื่อบริษัท</th>
                                <th class="text-center">ที่อยู่บริษัท</th>
                                <th class="text-center">ตำแหน่งงาน</th>
                                <th class="text-center">ปีที่ทำ</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <?php $n=1; foreach($res as $roww )  {?>
                                <td><?php echo $n;?></td>
                                <td><?php echo $roww->job_name;?></td>
                                <td><?php echo $roww->job_address;?></td>
                                <td><?php echo $roww->job_position;?></td>
                                <td>ตั้งแต่ปี <?php echo $roww->job_start;?> ถึง <?php echo $roww->job_end;?> ปี</td>
                                <td>
                                  <a href="<?php echo base_url(); ?>userprofile/proedit_job/<?php echo $emp_member; ?>" title="Edit" class="label label-success">แก้ไข</a>
                                  <a href="<?php echo base_url(); ?>userprofile/proedit_job/<?php echo $emp_member; ?>" title="Delete" class="label label-danger">ลบ</a></td>
                              </tr>
                              <?php $n++;}  ?>
                            </tbody>
                          </table>
                      <a href="<?php echo base_url(); ?>userprofile/proedit_job/<?php echo $emp_member; ?>" id='add_job<?php echo $roww->emp_member; ?>' class="label label-success pull-left">เพิ่ม</a>
                      <!-- <a  id='delete_row<?php echo $roww->emp_id; ?>' class="pull-right label label-danger">ลบแถว</a><br> -->
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <h1>ประวัติฝึกอบรม</h1>
                          <?php
                              $q = $this->db->query("select * from emp_train_tb where emp_member='$emp_member'");
                              $res = $q->result();
                          ?>
                          <table class="table table-bordered table-xxs table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th class="text-center" colspan="2">ระยะเวลา</th>
                                <th class="text-center">สถาบัน/หน่วยงาน/บริษัท</th>
                                <th class="text-center">หลักสูตร/ตำแหน่ง</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <?php $n=1; foreach($res as $roww )  {?>
                                <td><?php echo $n;?></td>
                                <td>ตั้งแต่ เดือน  <?php echo $roww->skill_start_month;?> ปี <?php echo $roww->skill_start_years;?></td>
                                <td>จนถึง เดือน  <?php echo $roww->skill_end_month;?> ปี <?php echo $roww->skill_end_years;?></td>
                                <td><?php echo $roww->skill_code;?></td>
                                <td><?php echo $roww->skill_tpos;?></td>
                                <td>
                                  <a href="<?php echo base_url(); ?>userprofile/proedit_train/<?php echo $emp_member; ?>" title="Edit" class="label label-success">แก้ไข</a>
                                  <a href="<?php echo base_url(); ?>userprofile/proedit_train/<?php echo $emp_member; ?>" title="Delete" class="label label-danger">ลบ</a></td>
                              </tr>
                              <?php $n++; }  ?>
                            </tbody>
                          </table>
                      <a href="<?php echo base_url(); ?>userprofile/proedit_train/<?php echo $emp_member; ?>" id='add_job<?php echo $roww->emp_member; ?>' class="label label-success pull-left">เพิ่ม</a>
                      <!-- <a  id='delete_row<?php echo $roww->emp_id; ?>' class="pull-right label label-danger">ลบแถว</a><br> -->
                  </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary btn-xs text-center" id="save" data-toggle="modal" data-target="#mdsave"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
              </div>
            </div>              
            <!-- Modal -->
                <div id="mdsave" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">การบันทึก</h4>
                      </div>
                      <div class="modal-body">
                        <p>SAVE SUCCESS</p>
                      </div>
                      <div class="modal-footer">

                      </div>
                    </div>

                  </div>
                </div>      
          </form>
    </div>
  </div>
</div>        
<script>
 $(window).load(function(){
        var dayBirth = ($('#emp_bdate').val());
        if (dayBirth=="") {
          $("#emp_age").val(""); 
        }else{
        var getdayBirth=dayBirth.split("/");  
        var YB=getdayBirth[2]-543;  
        var MB=getdayBirth[1];  
        var DB=getdayBirth[0];  
           
        var setdayBirth=moment(YB+"-"+MB+"-"+DB);    
        var setNowDate=moment();  
        var yearData=setNowDate.diff(setdayBirth, 'years', true); // ข้อมูลปีแบบทศนิยม  
        var yearFinal=Math.round(setNowDate.diff(setdayBirth, 'years', true),0); // ปีเต็ม  
        var yearReal=setNowDate.diff(setdayBirth, 'years'); // ปีจริง  
        var monthDiff=Math.floor((yearData-yearReal)*12); // เดือน  
        var str_year_month=yearReal+" ปี "+monthDiff+" เดือน"; // ต่อวันเดือนปี  
        $("#emp_age").val(str_year_month); 
    } 
} );    
    $("#emp_bdate").on("change",function(){  
        var dayBirth=$(this).val();  
        var getdayBirth=dayBirth.split("/");  
        var YB=getdayBirth[2]-543;  
        var MB=getdayBirth[1];  
        var DB=getdayBirth[0];  
           
        var setdayBirth=moment(YB+"-"+MB+"-"+DB);    
        var setNowDate=moment();  
        var yearData=setNowDate.diff(setdayBirth, 'years', true); // ข้อมูลปีแบบทศนิยม  
        var yearFinal=Math.round(setNowDate.diff(setdayBirth, 'years', true),0); // ปีเต็ม  
        var yearReal=setNowDate.diff(setdayBirth, 'years'); // ปีจริง  
        var monthDiff=Math.floor((yearData-yearReal)*12); // เดือน  
        var str_year_month=yearReal+" ปี "+monthDiff+" เดือน"; // ต่อวันเดือนปี  
        $("#emp_age").val(str_year_month);  
 
    });  

</script>
