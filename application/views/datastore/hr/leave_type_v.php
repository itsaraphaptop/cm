<div class="content-wrapper">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/data_master">Setup</a></li>
    </div>
  </div>

  <div class="panel panel-flat">
    <div class="panel-heading">
      <h6 class="panel-title"><i class="icon-cog3 position-left"></i> ข้อมูลการกำหนดสิทธิการลา  <p></p></h6>
      <div class="col-lg-12" style="text-align: right;"><button  type="button" data-toggle="modal" data-target="#neweleave1" class="neweleave1 btn border-info text-info-600 btn-flat btn-icon btn-md heading-btn"><i class="icon-plus-circle2"></i> เพิ่มการลาประเภท</button></div>
      <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>  
   
      <div class="panel-body">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <th>ประเภทการลา</th>
                      <th>จำนวน (วัน/ปี)</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>

                  <?php 
                  foreach ($res as $key) {
                  ?>
                  <td><?php echo $key->name_leave; ?></td>    
                  <td><?php echo $key->day_leave; ?></td>             
                    <td>
                      <ul class="icons-list">
                          <li><li class="text-teal-600" type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#modal_leave<?php echo $key->le_id;?>"><a href="#"><i class="icon-cog7"></i></a></li>
                          <li>
                          <a href="<?php echo base_url(); ?>index.php/mater_hr/del_leave/<?php echo $key->le_id;?>"><i class="icon-trash"></i></a>
                          </li>

                        </ul>
                      </td>
                    </tr>
                    <?php
                  }
                   ?> 
                  </tbody>
          </table> 
        </div>


        <?php foreach ($res as $vv) {?>
          <div id="modal_leave<?php echo $vv->le_id; ?>" class="modal fade" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">แก้ไขข้อมูลประเภทการลา</h5>
                </div>
                <form action="<?php echo base_url(); ?>index.php/mater_hr/upd_leave/<?php echo $vv->le_id; ?>" method="post" id="upd_edu">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-2 control-labelt">ประเภทการลา :</label>
                      <div class="col-lg-4">
                        <input type="hidden" id="leave_id" name="leave_id"  value="<?php echo $vv->le_id; ?>" >
                        <input type="text" class="form-control"  name="name_leave" id="name_leave" value="<?php echo $vv->name_leave; ?>" placeholder="กรุณากรอกประเภทการลา">
                      </div>

                    <label class="col-lg-2 control-labelt">จำนวน (วัน/ปี) :</label>
                      <div class="col-lg-4">
                        <input type="text" class="form-control"  name="day_leave" id="day_leave" value="<?php echo $vv->day_leave; ?>" placeholder="กรุณากรอกประเภทการลา">
                      </div>
                  </div><br> 
                  <div class="modal-footer" style="margin-top:100px;">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
  </div>
</div>
<div id="neweleave1" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">เพิ่มการลาประเภท</h5>
      </div>
      <form action="<?php echo base_url(); ?>index.php/mater_hr/addleave" method="post" id="addleave">
        <div class="modal-body">
          <div class="form-group">
              <label class="col-lg-2 control-labelt">ประเภทการลา :</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" id="name_leave" name="name_leave" placeholder="กรุณากรอกประเภทการลา">
              </div>

              <label class="col-lg-2 control-labelt">จำนวนวันลา :</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" id="day_leave" name="day_leave" placeholder="กรุณากรอกจำนวนวันลา">
              </div>
          </div><br>
          <div class="modal-footer" style="margin-top:50px;">
          <button type="submit" class="btn btn-info">Save changes</button>
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          
        </div>
        </div>
      </form>
    </div>
  </div>
</div>


