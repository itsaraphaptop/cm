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
    $emp_statuss = $value->emp_statuss;

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

    foreach ($com as $company) {
      $emp_degree = $company->emp_degree;
      $emp_position = $company->emp_position;
      $emp_department = $company->emp_department;
      $emp_project = $company->emp_project;
      $emp_bank = $company->emp_bank;
      $emp_bookbank = $company->emp_bookbank;
      $emp_backmajor = $company->emp_backmajor;
      $emp_insuid = $company->emp_insuid;
      $emp_insuhos = $company->emp_insuhos;
      $emp_lead = $company->emp_lead;
      $emp_lead2 = $company->emp_lead2;
      $emp_start = $company->emp_start;
      $emp_stat = $company->emp_stat;
      $emp_member = $company->emp_member;
      $emp_code = $company->emp_code;
      $emp_pro = $company->emp_pro;
    }
    foreach ($ski as $skill) {
      $skill_lang = $skill->skill_lang;
      $skill_speak = $skill->skill_speak;
      $skill_read = $skill->skill_read;
      $skill_write = $skill->skill_write;
      $e_toelf = $skill->e_toelf;
      $e_toeic = $skill->e_toeic;
      $e_ielts = $skill->e_ielts;
      $e_tuget = $skill->e_tuget;
      $e_cutep = $skill->e_cutep;
    }

    foreach ($oth as $otherskill) {
      $skill1 = $otherskill->s_skill1;
      $skill2 = $otherskill->s_skill2;
      $skill3 = $otherskill->s_skill3;
      $skill4 = $otherskill->s_skill4;
      $skill5 = $otherskill->s_skill5;
      $chkcar = $otherskill->s_cab;
      $s_motor = $otherskill->s_motor;
      $s_truck = $otherskill->s_truck;
      $s_cab = $otherskill->s_cab;
      $s_car = $otherskill->s_car;
      $s_folk = $otherskill->s_folk;
      $s_vehicle_car = $otherskill->s_vehicle_car;
      $s_vehicle_motor = $otherskill->s_vehicle_motor;
      $s_vehicle_truck = $otherskill->s_vehicle_truck;
      $lccar = $otherskill->lccar;
      $lcmotor = $otherskill->lcmotor;
      $lctruck = $otherskill->lctruck;
    }

    foreach ($beh as $behave) {
      $emp_province = $behave->emp_province;
      $emp_travel = $behave->emp_travel;
      $emp_law = $behave->emp_law;
      $emp_drink = $behave->emp_drink;
      $emp_smoke  = $behave->emp_smoke;
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
            <li><a data-toggle="tab" href="#menu3" class="glyphicon glyphicon-list-alt">  ทักษะและความสามารถ</a></li>
            <li><a data-toggle="tab" href="#menu4" class="fa fa-group">  ภายในองค์กร</a></li>
          </ul>
          <form id="insForm" action="<?php echo base_url(); ?>emp_profile/edit_emp" method="post">
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
                      <label><input type="radio" id="sex" name="emp_sex" checked value="1">ชาย</label>
                    <label><input type="radio" id="sex" name="emp_sex" value="2">หญิง</label>
                    <?php } else{ ?>
                    <label><input type="radio" id="sex" name="emp_sex" value="1">ชาย</label>
                    <label><input type="radio" id="sex" name="emp_sex" checked value="2">หญิง</label>
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
                      <?php if($emp_statuss == 'สมรส'){ ?><option value="สมรส" selected>สมรส</option><?php } else { ?><option value="สมรส">สมรส</option><?php }?>
                      <?php if($emp_statuss== 'โสด'){ ?><option value="โสด" selected>โสด</option><?php } else { ?><option value="โสด">โสด</option><?php }?>
                      <?php if($emp_statuss == 'หย่า'){ ?><option value="หย่า" selected>หย่า</option><?php } else { ?><option value="หย่า">หย่า</option><?php }?>
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
                                  <a href="<?php echo base_url(); ?>userprofile/edit_edu/<?php echo $emp_member; ?>" title="Edit" class="label label-success">แก้ไข</a>
                                  <a href="<?php echo base_url(); ?>userprofile/edit_edu/<?php echo $emp_member; ?>" title="Delete" class="label label-danger">ลบ</a></td>
                              </tr>
                              <?php $n++;}  ?>
                            </tbody>
                          </table>
                      <a href="<?php echo base_url(); ?>userprofile/edit_edu/<?php echo $emp_member; ?>" id='add_job<?php echo $roww->emp_member; ?>' class="label label-success pull-left">เพิ่ม</a>
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
                                  <a href="<?php echo base_url(); ?>userprofile/edit_job/<?php echo $emp_member; ?>" title="Edit" class="label label-success">แก้ไข</a>
                                  <a href="<?php echo base_url(); ?>userprofile/edit_job/<?php echo $emp_member; ?>" title="Delete" class="label label-danger">ลบ</a></td>
                              </tr>
                              <?php $n++;}  ?>
                            </tbody>
                          </table>
                      <a href="<?php echo base_url(); ?>userprofile/edit_job/<?php echo $emp_member; ?>" id='add_job<?php echo $roww->emp_member; ?>' class="label label-success pull-left">เพิ่ม</a>
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
                                  <a href="<?php echo base_url(); ?>userprofile/edit_train/<?php echo $emp_member; ?>" title="Edit" class="label label-success">แก้ไข</a>
                                  <a href="<?php echo base_url(); ?>userprofile/edit_train/<?php echo $emp_member; ?>" title="Delete" class="label label-danger">ลบ</a></td>
                              </tr>
                              <?php $n++; }  ?>
                            </tbody>
                          </table>
                      <a href="<?php echo base_url(); ?>userprofile/edit_train/<?php echo $emp_member; ?>" id='add_job<?php echo $roww->emp_member; ?>' class="label label-success pull-left">เพิ่ม</a>
                      <!-- <a  id='delete_row<?php echo $roww->emp_id; ?>' class="pull-right label label-danger">ลบแถว</a><br> -->
                  </div>
                </div>
              </div>

              <div id="menu3" class="tab-pane fade ">
                <h3>ทักษะและความสามารถ</h3>
                <div class="form-inline">
                  <div class="row">
                    <div class="col-xs-2">
                      ความสามารถทางภาษา
                    </div>
                    <div class="col-xs-2">
                      <label class="form-inline" for="e_lang">ภาษา</label>
                      <select  class="form-inline form-control input-sm" id="skill_lang" name="skill_lang"  onchange="change()">
                        <option><?php echo $skill_lang; ?></option>
                        <option>ไม่มี</option>
                        <option>จีน</option>
                        <option>เยอรมัน</option>
                        <option>ญีปุ่น</option>
                        <option value="english">อังกฤษ</option>
                        <option>สเปน</option>
                      </select>
                    </div>

                    <div class="col-xs-2">
                      <label class="form-inline"  for="skill_speak">พูด</label>
                        <select class="form-inline form-control input-sm" id="skill_speak" name="skill_speak">
                        <?php 
                        if($skill_speak== '0'){ ?><option value="0" selected>ดีมาก</option><?php } else { ?><option value="0">ดีมาก</option><?php }?>
                        
                        <?php 
                        if($skill_speak== '1'){ ?><option value="1" selected>ดี.</option><?php } else { ?><option value="1">ดี</option><?php }?>

                        <?php 
                        if($skill_speak== '2'){ ?><option value="2" selected>ปานกลาง</option><?php } else { ?><option value="2">ปานกลาง</option><?php }?>
                        
                        <?php 
                        if($skill_speak== '3'){ ?><option value="3" selected>แย่.</option><?php } else { ?><option value="3">แย่</option><?php }?>
                        
                        <?php 
                        if($skill_speak== '4'){ ?><option value="4" selected>แย่มาก</option><?php } else { ?><option value="4">แย่มาก</option><?php }?>
                      </select>
                    </div>

                    <div class="col-xs-2">
                      <label class="form-inline" for="skill_read">อ่าน</label>
                      <select  class="form-inline form-control input-sm" id="skill_read" name="skill_read">
                        <?php 
                        if($skill_read== '0'){ ?><option value="0" selected>ดีมาก</option><?php } else { ?><option value="0">ดีมาก</option><?php }?>
                        
                        <?php 
                        if($skill_read== '1'){ ?><option value="1" selected>ดี.</option><?php } else { ?><option value="1">ดี</option><?php }?>

                        <?php 
                        if($skill_read== '2'){ ?><option value="2" selected>ปานกลาง</option><?php } else { ?><option value="2">ปานกลาง</option><?php }?>
                        
                        <?php 
                        if($skill_read== '3'){ ?><option value="3" selected>แย่.</option><?php } else { ?><option value="3">แย่</option><?php }?>
                        
                        <?php 
                        if($skill_read== '4'){ ?><option value="4" selected>แย่มาก</option><?php } else { ?><option value="4">แย่มาก</option><?php }?>
                      </select>
                    </div>

                    <div class="col-xs-2">
                      <label class="form-inline" for="skill_read">เขียน</label>
                      <select  class="form-inline form-control input-sm" id="skill_write" name="skill_write">
                        <?php 
                        if($skill_write== '0'){ ?><option value="0" selected>ดีมาก</option><?php } else { ?><option value="0">ดีมาก</option><?php }?>
                        
                        <?php 
                        if($skill_write== '1'){ ?><option value="1" selected>ดี.</option><?php } else { ?><option value="1">ดี</option><?php }?>

                        <?php 
                        if($skill_write== '2'){ ?><option value="2" selected>ปานกลาง</option><?php } else { ?><option value="2">ปานกลาง</option><?php }?>
                        
                        <?php 
                        if($skill_write== '3'){ ?><option value="3" selected>แย่.</option><?php } else { ?><option value="3">แย่</option><?php }?>
                        
                        <?php 
                        if($skill_write== '4'){ ?><option value="4" selected>แย่มาก</option><?php } else { ?><option value="4">แย่มาก</option><?php }?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-2">
                      <label class="form-inline" for="e_toeic">TOEIC</label>
                      <input class="form-inline form-control" id="e_toeic" name="e_toeic" value="<?php echo $e_toeic; ?>">
                    </div>

                    <div class="col-xs-2">
                      <label id="lbe_toelf" class="form-inline" for="e_toelf">TOEFL</label>
                      <input class="form-inline form-control" id="e_toelf" name="e_toelf" value="<?php echo $e_toelf; ?>">
                    </div>
                    
                    <div class="col-xs-2">
                      <label id="lbe_elts" class="form-inline" for="e_ielts">IELTS</label>
                      <input class="form-inline form-control" id="e_ielts" name="e_ielts" value="<?php echo $e_ielts; ?>">
                    </div>

                    <div class="col-xs-2">
                      <label id="lbe_cutep" class="form-inline" for="e_tuget">CU-TEP</label>
                      <input class="form-inline form-control" id="e_tuget" name="e_tuget" value="<?php echo $e_tuget; ?>">
                    </div>

                    <div class="col-xs-2">  
                      <label id="lbe_cutep" class="form-inline" for="e_tuget">CU-TEP</label>
                      <input class="form-inline form-control" id="e_tuget" name="e_tuget" value="<?php echo $e_tuget; ?>">      
                    </div>

                    <div class="col-xs-2">
                        <label id="lbe_tuget" class="form-inline" for="e_cutep">TU-GET</label>
                        <input class="form-inline form-control" id="e_cutep" name="e_cutep" value="<?php echo $e_cutep; ?>">
                    </div>
                  </div>
                    <br>
                  <div class="row">
                    <div class="col-xs-2">
                      <label>ความสามารถในการขับขี่พาหนะ</label>
                    </div>
                    <div class="col-xs-6">
                    <?php if ($s_car=="on") {?>
                       <label class="checkbox-inline"><input name="chkcar" id="chkcar" checked type="checkbox" >รถยนต์</label>
                    <?php  }else{?>
                       <label class="checkbox-inline"><input name="chkcar" id="chkcar"  type="checkbox" >รถยนต์</label>
                   <?php } ?>
                   <?php if ($s_motor=="on") {?>
                      <label class="checkbox-inline"><input name="chkmotor" id="chkmotor" checked  type="checkbox" >รถจักยานยนต์</label>
                      <?php  }else{?>
                      <label class="checkbox-inline"><input name="chkmotor" id="chkmotor"  type="checkbox" >รถจักยานยนต์</label>
                    <?php } ?>
                    <?php if ($s_truck=="on") {?>
                      <label class="checkbox-inline"><input name="chktruck" id="chktruck" checked type="checkbox">รถบรรทุก</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input name="chktruck" id="chktruck"  type="checkbox">รถบรรทุก</label>
                    <?php } ?>
                    <?php if ($s_cab=="on") {?>
                      <label class="checkbox-inline"><input name="chkcab" id="chkcab" checked type="checkbox">รถกระบะ</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input name="chkcab" id="chkcab"  type="checkbox">รถกระบะ</label>
                    <?php } ?>
                    <?php if ($s_folk=="on") {?>
                      <label class="checkbox-inline"><input name="chkfolk" id="chkfolk" checked type="checkbox">รถฟอร์คลิฟท์</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input name="chkfolk" id="chkfolk"  type="checkbox">รถฟอร์คลิฟท์</label>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      มีพาหนะเป็นของตัวเอง
                    </div> 
                    <div class="col-xs-6">
                    <?php if ($s_vehicle_car=="on") {?>
                      <label class="checkbox-inline"><input id="chkhcar"  name="chkhcar" checked type="checkbox" value="on">รถยนต์</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input id="chkhcar"  name="chkhcar" type="checkbox">รถยนต์</label>
                    <?php } ?>
                    <?php if ($s_vehicle_motor=="on") {?>
                      <label class="checkbox-inline"><input id="chkhmotor" name="cchkhmotor" checked type="checkbox">รถจักยานยนต์</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input id="chkhmotor" name="cchkhmotor" type="checkbox">รถจักยานยนต์</label>
                    <?php } ?>
                    <?php if ($s_vehicle_truck=="on") {?>
                      <label class="checkbox-inline"><input id="chkhtruck" name="chkhtruck" checked type="checkbox">รถบรรทุก</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input id="chkhtruck" name="chkhtruck" type="checkbox">รถบรรทุก</label>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      มีใบขับขี่ชนิด
                    </div>
                    <div class="col-xs-6">
                    <?php if ($lccar=="on") {?>
                      <label class="checkbox-inline"><input id="lccar"  name="lccar" checked type="checkbox">รถยนต์</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input id="lccar"  name="lccar" type="checkbox">รถยนต์</label>
                    <?php } ?>
                    <?php if ($lcmotor=="on") {?>
                      <label class="checkbox-inline"><input id="lcmotor" name="lcmotor" checked type="checkbox">รถจักยานยนต์</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input id="lcmotor" name="lcmotor" type="checkbox">รถจักยานยนต์</label>
                    <?php } ?>
                    <?php if ($lctruck=="on") {?>
                      <label class="checkbox-inline"><input id="lctruck" name="lctruck" checked type="checkbox">รถบรรทุก</label>
                    <?php  }else{?>
                      <label class="checkbox-inline"><input id="lctruck" name="lctruck" type="checkbox">รถบรรทุก</label>
                    <?php } ?>  
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      ความสามารถพิเศษอื่นๆ
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-10">
                      1) <input class="form-control" id="skill1" name="skill1" style="margin: 10px;" size="120" value="<?php echo$skill1 ; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-10">
                      2) <input class="form-control" id="skill2" name="skill2" style="margin: 10px;" size="120" value="<?php echo$skill2 ; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-10">
                      3) <input class="form-control" id="skill3" name="skill3" style="margin: 10px;" size="120" value="<?php echo$skill3 ; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-10">
                      4) <input class="form-control" id="skill4" name="skill4" style="margin: 10px;" size="120" value="<?php echo$skill4 ; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-10">
                      5) <input class="form-control" id="skill5" name="skill5" style="margin: 10px;" size="120" value="<?php echo$skill5 ; ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      สามารถปฎิบัติงานต่างจังหวัด
                    </div>
                    <div class="col-xs-6">
                    <?php if ($emp_province=="1") {?>
                      <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo" checked value="1">ไปได้</label>
                      <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo" value="0">ไปไม่ได้</label>
                    <?php  }else{?>
                      <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo"  value="1">ไปได้</label>
                      <label class="radio-inline"><input type="radio" id="rdbgo" name="rdbgo" checked value="0">ไปไม่ได้</label>
                    <?php } ?>
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      สามารถปฎิบัติงานต่างประเทศ
                    </div>
                    <div class="col-xs-6">
                    <?php if ($emp_travel=="1") {?>
                      <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" checked value="1">ไปได้</label>
                      <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" value="0">ไปไม่ได้</label>
                    <?php  }else{?>
                      <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" value="1">ไปได้</label>
                      <label class="radio-inline"><input type="radio" id="rdbgonation" name="rdbgonation" checked value="0">ไปไม่ได้</label>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      ประวัติการถูกดำเนินคดี
                    </div>
                    <div class="col-xs-6">
                    <?php if ($emp_law=="1") {?>
                      <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" checked value="1">เคย</label>
                      <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" value="0">ไม่เคย</label>
                    <?php  }else{?>
                      <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" value="1">เคย</label>
                      <label class="radio-inline"><input type="radio" id="rdblaw" name="rdblaw" checked value="0">ไม่เคย</label>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      ประวัติการดื่มสุรา
                    </div>
                    <div class="col-xs-6">
                    <?php if ($emp_drink=="1") {?>
                      <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink" checked value="1">ดื่ม</label>
                      <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink" value="0">ไม่ดื่ม</label>
                    <?php  }else{?>
                      <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink"  value="1">ดื่ม</label>
                      <label class="radio-inline"><input type="radio" id="rdbdrink" name="rdbdrink" checked value="0">ไม่ดื่ม</label>
                    <?php } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-2">
                      ประวัติสูบบุหรี่
                    </div>
                    <div class="col-xs-6">
                    <?php if ($emp_smoke=="1") {?>
                      <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" checked value="1">สูบ</label>
                      <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" value="0">ไม่สูบ</label>
                    <?php  }else{?>
                      <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" value="1">สูบ</label>
                      <label class="radio-inline"><input type="radio" id="rdbsmoke" name="rdbsmoke" checked value="0">ไม่สูบ</label>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
                                                 
              <div id="menu4" class="tab-pane fade">
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="form-group has-feedback">
                        <label>รหัสพนักงาน</label>
                        <input type="hidden" name="ccode" id="ccode" value="<?php echo $emp_member; ?>" >
                        <input type="text" id="emp_code" name="emp_code" class="form-control input-sm" value="<?php echo $emp_code;?>">
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <label for="emp_lead">วันที่เริ่มงาน</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                          <input type="date" value="<?php echo $emp_start; ?>" class="form-control" id="job_datestart" name="job_datestart">
                        </div>
                    </div>
                    <div class="col-xs-3">
                      <label for="emp_project">โครงการ</label>
                        <select  class="form-inline form-control input-sm" id="emp_project" name="emp_project">
                          <?php 
                          if ($value->emp_project == "") {
                            ?>
                            <option value=""></option>
                          <?php
                          }else{
                          $p = $this->db->query("select * from project where project_id='$value->emp_project;'")->result(); 
                          foreach ($p as $pp) {
                          ?>
                            <option value="<?php echo $pp->project_id; ?>"><?php echo $pp->project_name; ?></option>
                          <?php
                          }
                          }
                          ?>
                          
                          <?php foreach ($pro as $key) { ?>  
                          <option value="<?php echo $key->project_id; ?>"><?php echo $key->project_name; ?></option> 
                           <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-3">
                      <label for="emp_department" >แผนก</label>
                      <select class="form-inline form-control input-sm" id="emp_department"  name="emp_department">
                        <?php
                        if ($value->emp_department == "") {
                        ?>
                          <option value=""></option>
                        <?php 
                        }else{
                          $dd = $this->db->query("select * from department where department_id='$value->emp_department'")->result(); 
                          foreach ($dd as $ddd) {
                          ?>
                          <option value="<?php echo $ddd->department_id; ?>"><?php echo $ddd->department_title; ?></option>
                          <?php
                            }
                          }
                          ?>
                        
                        <?php foreach ($de as $keyy) { ?>  
                          <option value="<?php echo $keyy->department_id; ?>"><?php echo $keyy->department_title; ?></option>
                          <?php } ?>
                      </select>
                    </div>
                    </div>
                    <div class="row">  
                      <div class="col-xs-3">
                        <label for="emp_degree" >ระดับ</label>
                        <select name="emp_degree" id="emp_degree" class="form-control">
                          <option value="<?php echo $emp_degree; ?>"><?php echo $emp_degree; ?></option>
                          <option value="พนักงาน">พนักงาน</option>
                          <option value="ผู้จัดการแผนก">ผู้จัดการแผนก</option>
                          <option value="โครงการ">โครงการ</option>
                          <option value="ผู้บริหาร">ผู้บริหาร</option>
                        </select>
                      </div>
                      <div class="col-xs-3">
                        <label for="" >ตำแหน่ง</label>
                          <input type="text" class="form-control" id="emp_position" name="emp_position" value="<?php echo $emp_position; ?>">
                      </div>
                      <div class="col-xs-3">
                        <label for="emp_lead">ผู้บังคับบัญชาขั้นสูงสุด</label>
                        <select class="form-control" name="emp_lead">
                         <?php 
                          if ($emp_lead==null) {
                            ?><option></option><?php
                          $mm1 = $this->db->query("SELECT * from member where m_id =1 or m_id =2 or m_id =3 or m_id =4 ")->result(); 
                            foreach ($mm1 as $m1) {
                            ?>
                            <option value="<?php echo $m1->m_id; ?>"><?php echo $m1->m_name; ?></option>
                            <?php
                          }
                          } else{
                            $me1 = $this->db->query("SELECT * from member where m_id='$emp_lead'")->result(); 
                            foreach ($me1 as $mem1) {
                            ?>
                            <option value="<?php echo $mem1->m_id; ?>"><?php echo $mem1->m_name; ?></option>
                            <?php } ?>
                            <?php $mm1 = $this->db->query("SELECT * from member where m_id =1 or m_id =2 or m_id =3 or m_id =4 ")->result(); 
                            foreach ($mm1 as $m1) {
                            ?>
                            <option value="<?php echo $m1->m_id; ?>"><?php echo $m1->m_name; ?></option>
                            <?php
                          }
                          }
                            ?>
                      </select>
                      </div>
                      <div class="col-xs-3">
                        <label for="emp_lead2">ผู้บังคับบัญชาขั้นต้น</label>
                        <select class="form-control" name="emp_lead2">
                          <?php 
                          if ($emp_lead2==null) {
                            ?><option></option><?php
                            $p2 = $this->db->query("SELECT * from member where m_id =119 or m_id =16 or m_id =13 or m_id =11 or m_id =12 or m_id =58 or m_id =20 or m_id =91 or m_id =10 or m_id =128 or m_id =78 or m_id =8 or m_id =173 or m_id =129 or m_id =73 ")->result(); 
                            foreach ($p2 as $pp2) {
                          ?>
                          <option value="<?php echo $pp2->m_id; ?>"><?php echo $pp2->m_name; ?></option>
                          <?php
                          } 
                          } else{
                            $me2 = $this->db->query("select * from member where m_id='$emp_lead2'")->result(); 
                            foreach ($me2 as $mem2) {
                              $m_id2 = $mem2->m_id;
                              $m_name2 = $mem2->m_name;
                              }
                            ?>
                            <option value="<?php echo $m_id2; ?>"><?php echo $m_name2; ?></option>
                            <?php
                            $p2 = $this->db->query("SELECT * from member where m_id =119 or m_id =16 or m_id =13 or m_id =11 or m_id =12 or m_id =58 or m_id =20 or m_id =91 or m_id =10 or m_id =128 or m_id =78 or m_id =8 or m_id =173 or m_id =129 or m_id =73 ")->result(); 
                            foreach ($p2 as $pp2) {
                            ?> 
                          <option value="<?php echo $pp2->m_id; ?>"><?php echo $pp2->m_name; ?></option>
                          <?php } ?>
                        </select>
                        <?php 
                          } 
                           ?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-xs-4">
                        <label> บัญชีธนาคาร </label>
                          <select class="form-inline form-control input-lg" id="emp_bank" name="emp_bank">
                            <option selected="กสิกร">กสิกร</option>
                        </select>
                      </div>
                      
                      <div class="col-xs-4">
                        <label class="form-inline" for="emp_bankmajor">สาขา</label>
                        <input type="text" class="form-inline form-control" id="emp_backmajor" name="emp_backmajor" value="<?php echo $emp_backmajor; ?>">
                      </div>
                      
                      <div class="col-xs-4 form-group has-feedback">
                        <label class="form-inline" for="emp_bookbank">เลขที่บัญชี</label>&nbsp;&nbsp;
                         <input type="text" class="form-inline form-control" id="emp_bookbank" name="emp_bookbank" value="<?php echo $emp_bookbank; ?>">
                      </div>
                    </div>
                    <br><br>
                  <div class="row">
                    <div class="col-xs-4">
                      <label for="emp_insuid">เลขที่ประกันสังคม</label>&nbsp;&nbsp;
                      <input type="text" class="form-control" placeholder="เลขประกันสังคม" id="emp_insuidd" name="emp_insuid" value="<?php echo $emp_insuid; ?>">
                    </div>
            
                    <div class="col-xs-4">
                      <label for="emp_hos">โรงพยาบาลรับการรักษา</label>&nbsp;&nbsp;
                      <input type="text" class="form-control input-sm" placeholder="ชื่อโรงพยาบาล" id="emp_hos" name="emp_hos" value="<?php echo $emp_insuhos; ?>">
                      <!-- <input type="text" class="hidden" name="emp_stat" id="emp_stat" value="1"> -->
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-3">
                      <label for="emp_stat">สถานะ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <?php if ($emp_stat=="1") {?>
                      <label class="radio-inline"><input type="radio" id="emp_stat" name="emp_stat" checked value="1">ปกติ</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="radio-inline"><input type="radio" id="emp_stat" name="emp_stat" value="03">ออก</label>
                      <?php  }else{?>
                      <label class="radio-inline"><input type="radio" id="emp_stat" name="emp_stat" value="1">ปกติ</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="radio-inline"><input type="radio" id="emp_stat" name="emp_stat" checked value="3">ออก</label>
                      <?php } ?>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-3">
                      <label for="emp_stat">สถานะงาน &nbsp;&nbsp;</label>
                      <input type="hidden" name="age_work" id="age_work">
                      <input type="hidden" name="age_pro" id="age_pro" value="<?php echo $emp_pro; ?>">
                      <label class="radio-inline"><input type="radio" id="emp_status1" name="emp_status" >ทดลองงาน</label>
                      <label class="radio-inline"><input type="radio" id="emp_status2" name="emp_status">ผ่านโปรแล้ว</label> 
                    </div>
                  </div>
                  <br><br>
                  <button type="submit" class="btn btn-primary btn-xs" id="save" data-toggle="modal" data-target="#mdsave"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
                </div>
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
$("#emp_idcityzen").keyup(function(){
  var idcit = ($('#emp_idcityzen').val());
  $("#emp_insuidd").val(idcit); 
} );
  var DateDiff = {
 
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000));
    }
}

 $(window).load(function(){
    var jobdate=$("#job_datestart").val(); 
    var d1 = new Date(jobdate);
    var d2 = new Date();

    var age_work = (DateDiff.inDays(d1, d2))+1;
    
    if (age_work >= 120) {
      $("#emp_status2").val(1);
      $("#emp_status2").prop("checked",true);
    }else{
      $("#emp_status1").val(1);
      $("#emp_status1").prop("checked",true);
    }
  $("#age_work").val(age_work); 
} );

  $("#job_datestart").on("change",function(){  
    var jobdate=$("#job_datestart").val(); 
    var d1 = new Date(jobdate);
    var d2 = new Date();

    var age_work = (DateDiff.inDays(d1, d2))+1;
    
    if (age_work >= 120) {
      $("#emp_status2").val(1);
      $("#emp_status2").prop("checked",true);
    }else{
      $("#emp_status1").val(1);
      $("#emp_status1").prop("checked",true);
    }
  $("#age_work").val(age_work);

    function newDayAdd(inputDate,addDay){
      var d = new Date(inputDate);
      d.setDate(d.getDate()+addDay);
      mkMonth=d.getMonth()+1;
      mkMonth=new String(mkMonth);
      if(mkMonth.length==1){
          mkMonth="0"+mkMonth;
      }
      mkDay=d.getDate();
      mkDay=new String(mkDay);
      if(mkDay.length==1){
          mkDay="0"+mkDay;
      }   
      mkYear=d.getFullYear();
      return mkYear+"-"+mkMonth+"-"+mkDay; 
  }
  var cr = 120;
  var duedate=newDayAdd(d1,cr);
  $('#age_pro').val(duedate);
} );
    
    $("#emp_bdate").on("change",function(){  
        var dayBirth=$("#emp_bdate").val();  
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
