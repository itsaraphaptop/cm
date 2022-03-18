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
<div class="panel panel-flat">
  <div class="panel-body">
    <div class="row">
      <div class="col-md-2 col-md-offset-10">
        <!-- <a  class="btn btn-primary" href="<?php echo base_url(); ?>userprofile/gethr">New Employee</a> -->
      </div>
    </div>

    <div id="loadtable">
      <div class="dataTables_wrapper no-footer">
        <div class="table-responsive">
          <table class="table datatable-basic table-bordered table-striped table-hover dataTable no-footer" id="DataTables_Table_4" role="grid" aria-describedby="DataTables_Table_4_info">
          <thead>
            <tr>
              <th>รูปโปรไฟล์</th>
              <th  class="text-center">รหัสพนักงาน</th>
              <th class="text-center">ชื่อ - นามสกุล</th>
              <th  class="text-center">ชื่อ - นามสกุล (อังกฤษ)</th>
              <th class="text-center">ชื่อตำแหน่ง</th>
              <th class="text-center">แผนก</th>
              <th class="text-center">โครงการ</th>
              <th class="text-center">สถานะ</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($getemp as $value) { ?>
            <tr id="<?php echo $value->emp_code; ?>" >
              <td>
                <div class="media-left">
                  <img src="<?php echo base_url();?>profile/<?php echo $value->emp_pic;?>" class="img-circle" style="max-height:100px;">
                </div>
              </td>
              <td class="text-center"><h6><?php echo $value->emp_code; ?></h6></td>
              
              <td class="text-center"><?php echo $value->emp_name_t; ?></td>
              <td class="text-center"><?php echo $value->emp_name_e; ?></td>
              <?php 
              if ($value->emp_department == "") {
              ?>
              <td></td>
              <?php
              }else {
                ?> 
                <td class="text-center"><?php echo $value->emp_position; ?></td> 
                <?php   
              }
              if ($value->emp_department == "") {
              ?>
              <td></td>
              <?php
              }else {
              $d = $this->db->query("select * from department where department_id='$value->emp_department'")->result(); 
                foreach ($d as $dd) {
                ?> 
                <td class="text-center"><?php echo $dd->department_title; ?></td> 
                <?php   
                  }
              }
              ?>
              
              <?php 
              if ($value->emp_project == "") {
              ?>
              <td></td>
              <?php
              }else {
              $p = $this->db->query("select * from project where project_id='$value->emp_project'");
              $pp=$p->result(); 
              foreach ($pp as $pro) {
              ?>
                <td class="text-center"><?php echo $pro->project_name; ?><?php echo $value->emp_project; ?></td>
              <?php
                }
              }
              ?>
              
                        <td class="text-center">
                          <?php if ($value->emp_stat == "1") { ?>
                          <span class="label label-info" >normal</span>
                          <?php }elseif ($value->emp_stat == "2") { ?>
                          <span class="label label-success">SICK</span>
                          <?php }elseif ($value->emp_stat == "3") { ?>
                          <span class="label label-default">OUT!!</span>
                          <?php } ?>
                        </td>
                        <td>
                          <i class="glyphicon glyphicon-cog position-left"></i>
                          <a class="label label-warning" id="<?php echo $value->emp_member; ?>" data-toggle="modal" href="<?php echo base_url(); ?>userprofile/edit_empp/<?php echo $value->emp_member;?>">แก้ไขข้อมูลส่วนตัว
                          </a>
                          <br>
                          <i class="glyphicon glyphicon-file position-left"></i><a class="empp label label-danger" id="<?php echo $value->emp_member; ?>" data-toggle="modal" href="<?php echo base_url(); ?>userprofile/showemp/<?php echo $value->emp_member;?>">รายงานประจำตัว</a><br>
                          <i class="glyphicon glyphicon-download-alt position-left"></i><a class="empp label label-danger" id="<?php echo $value->emp_member; ?>" data-toggle="modal" href="<?php echo base_url(); ?>userprofile/userimgg/<?php echo $value->emp_member;?>">อัพโหลดรูป</a><br>
                          <i class="glyphicon glyphicon-download-alt position-left"></i><a href="<?php echo base_url(); ?>userprofile/ExportPDF/<?php echo $value->emp_member;?>"  class="emppic label label-success" id="pdf<?php echo $value->emp_member; ?>" >PDF</a>
                        </td>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
  </div>
</div>