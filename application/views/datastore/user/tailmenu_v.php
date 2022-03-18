<style>
    #new,#all{cursor: pointer;}
</style>
<div class="container">
    <div class="row ">

        <div class="col-xs-12">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ระบบจัดการข้อมูลพนักงาน</h1><hr>
            <div class="" style="height:100px;">

                    <a href="<?php echo base_url();?>index.php/datastore/project">
                        <button class="btn btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการโครงการ<bR> Project</p></div>

                        </div>
                    </button>
                    </a>
                    <a href="<?php echo base_url();?>index.php/datastore/matcode">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการรหัสวัสดุ<br> Matcode</p></div>

                        </div>
                    </button>
                    </a>
                    <a href="<?php echo base_url();?>index.php/datastore/costcode">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการรหัสราคา<br> Costcode</p></div>

                        </div>
                    </button>
                    </a>
                    <a href="<?php echo base_url();?>index.php/datastore/user">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการข้อมูลพนักงาน</p></div>

                        </div>
                    </button>
                    </a>
                    <a href="<?php echo base_url();?>index.php/datastore/vender">
                        <button class="btn btn-primary">
                            <div class="row">
                                <div class="col-xs-3"><h1><span class="glyphicon glyphicon-tent" aria-hidden="true"></span></h1></div>
                                <div class="col-xs-9"> <p style="margin-top:20px;">ร้านค้า/ผู้รับเหมา<bR> Vender</p></div>

                            </div>
                        </button>
                    </a>
                    <a href="<?php echo base_url();?>index.php/datastore/company">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการข้อมูลบริษัท</p></div>

                        </div>
                    </button>
                    </a>

            </div>
        </div>

       </div>
    <div class="row" style="margin-top:10px;">
    <div class="col-xs-3">

        <div class="panel panel-primary">
            <div class="panel-heading">เมนูหลัก</div>

            <div class="list-group">
              <a data-toggle="modal" id="new" data-target="#newuser" class="list-group-item">เพิ่มผู้ใช้งาน</a>
              <a data-toggle="modal" id="all" data-target="#" class="list-group-item">ผู้ใช้งานทั้งหมด</a>
            </div>

            <div class="panel-footer"></div>
        </div>
    </div>
    <div class="col-xs-9" id="loadbox">

    </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มผู้ใช้ใหม่</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">รหัสพนักงาน</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกรหัสพนักงาน" id="ccode" readonly="ture">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">ชื่อพนักงาน</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกชื่อพนักงาน" id="cname">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">อีเมลล์</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกอีเมลล์" id="cmail">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">เบอร์โทร</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกเบอร์โทร" id="ctel">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                <label for="">ตำแหน่ง</label>
                     <select placeholder="กรอกประเภท" class="form-control input-sm" id="ctype">
                       <?php $this->db->select('*');
                       $this->db->order_by('id','asc');
                              $q = $this->db->get('m_position');
                              $res = $q->result();
                              foreach ($res as  $va) {
                        ?>
                       <option value="<?php echo $va->id; ?>"><?php echo $va->p_name; ?></option>

                       <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="input-group">
                    <label for="project1">แผนก</label>
                        <input type="text" readonly="true" placeholder="เลือกแผนก" class="form-control input-sm input-sm" id="projectnam">
                        <input type="hidden" readonly="true"  class="form-control input-sm input-sm" name="project" id="cdepartment">
                        <span class="input-group-btn">
                        <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6" >
                <div class="input-group">
                    <label for="project1">โครงการ</label>
                      <input type="text" readonly="true" placeholder="เลือกโครงการ" class="form-control input-sm"  id="projectnam1">
                      <input type="hidden" readonly="true"  class="pproject1 form-control input-sm" name="project1" id="cproject">
                      <span class="input-group-btn">
                      <button class="openproj1 btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject1" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                      </span>
                </div>
             </div>
        </div>
        <hr>
            <div class="row">
                <div class="col-xs-6">
                    <h4 class="modal-title" id="myModalLabel">สร้างรหัสผ่านผู้ใช้งาน</h4>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control input-sm" placeholder="กรอกผู้ใช้" id="cuser">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control input-sm" placeholder="กรอกรหัสผู้ใช้" id="cpass">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">บันทึก</button>
      </div>
    </div>
  </div>
</div>
<!-- endmodal -->

<!-- modal เลือกแผนก -->
 <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-depid="<?php echo $valj->department_id;?>" data-depname="<?php echo $valj->department_title;?>" data-dismiss="modal">เลือก</button></td>
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
 <div class="modal fade" id="openproject1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="panel">
                <table id="projpaginate" class="table table-striped" >
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
            <td><button class="openproj1 btn btn-xs btn-block btn-info" data-toggle="modal"  data-projidp="<?php echo $valj->project_id;?>" data-projnamep="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
   $(".openproj1").click(function(){
     $("#projectnam1").val($(this).data('projnamep'));
     $("#cproject").val($(this).data('projidp'));
   });
   $(".openproj").click(function(){
     $("#projectnam").val($(this).data('depname'));
     $("#cdepartment").val($(this).data('depid'));
   });
</script>

<script>
  $(document).ready( function () {
    $('#loadbox').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
    $('#loadbox').load('<?php echo base_url(); ?>index.php/datastore/service_user');
} );
  $("#all").click(function(event) {
    $('#loadbox').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
    $('#loadbox').load('<?php echo base_url(); ?>index.php/datastore/service_user');
});

$("#save").click(function(){
var url="<?php echo base_url(); ?>index.php/datastore/adduser";
var dataSet={

                bname : $('#cname').val(),
                bbemail : $('#cmail').val(),
                tel : $('#ctel').val(),
                ntype : $('#ctype').val(),
                department : $('#cdepartment').val(),
                project : $('#cproject').val(),
                user : $('#cuser').val(),
                pass : $('#cpass').val(),
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////
     $('#loadbox').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
    $('#loadbox').load('<?php echo base_url(); ?>index.php/datastore/service_user');
      });
   $('#cname').val("");
    $('#cmail').val("");
    $('#ctel').val("");
    $('#ctype').val("");
    $('#cstatus').val("");
    $('#cdepartment').val("");
    $('#cproject').val("");
    $('#cuser').val("");
    $('#cpass').val("");
////////////////////////////////
  });

</script>
