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
      <h6 class="panel-title"><i class="icon-cog3 position-left"></i> ข้อมูลวิทยากรฝึกอบรม<p></p></h6>
      <div class="heading-elements">
        <a href="<?php echo base_url(); ?>data_master" class="btn border-info text-info-600 btn-flat btn-icon btn-md heading-btn"><i class="icon-undo2"></i> ย้อนกลับ</a>
        <button  type="button" data-toggle="modal" data-target="#newtrain" class="newtrain btn border-info text-info-600 btn-flat btn-icon btn-md heading-btn"><i class="icon-plus-circle2"></i> เพิ่มวิทยากรฝึกอบรม</button>
      </div>
      <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
    </div>  
          <div class="panel-body">

                </div>
                <div class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                <table class="table table-xxs table-bordered table-striped datatable-basic">
                  <thead>
                    <tr>
                      <th>รหัสวิทยากรฝึกอบรม</th>
                      <th>ชื่อวิทยากรฝึกอบรม</th>
                      <th>ชื่อสถาบัน</th>
                      <th>เบอร์โทรศัพท์</th>
                      <th>Fax.</th>
                      <th>รายละเอียด</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($res as $v) {?>
                    <tr>
                      <td><?php echo $v->train_code; ?></td>
                      <td><?php echo $v->train_name; ?></td>
                      <td><?php echo $v->train_ins; ?></td>
                      <td><?php echo $v->train_tel; ?></td>
                      <td><?php echo $v->train_fax; ?></td>
                      <td><?php echo $v->train_detail; ?></td>
                      <td>
                        <ul class="icons-list">
                            <li class="text-teal-600" type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#modal_train<?php echo $v->train_id;?>"><a href="#"><i class="icon-cog7"></i></a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/mater_hr/del_train/<?php echo $v->train_id;?>"><i class="icon-trash"></i></a>
                            </li>
                        </ul>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
    </div>
  </div>
</div>

<div id="newtrain" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">เพิ่มวิทยากรฝึกอบรม</h5>
      </div>
      <form action="<?php echo base_url(); ?>index.php/mater_hr/addtrain" method="post" id="insert">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-3 control-labelt">รหัสวิทยากรฝึกอบรม:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_code" name="train_code" placeholder="กรุณากรอกรหัสวิทยากรฝึกอบรม">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อวิทยากรฝึกอบรม:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_name" name="train_name" placeholder="กรุณากรอกชื่อวิทยากรฝึกอบรม">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อสถาบัน :</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_ins" name="train_ins" placeholder="กรุณากรอกชื่อสถาบัน">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">เบอร์โทรศัพท์:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_tel" name="train_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์">
            </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">เบอร์ fax:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_fax" name="train_fax" placeholder="กรุณากรอกเบอร์ fax">
            </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">รายละเอียด:</label>
            <div class="col-lg-9">
              <textarea rows="5" cols="5" class="form-control" id="train_detail" placeholder="กรุณากรอกที่ตั้ง"></textarea>
            </div>
        </div>
        <div class="modal-footer" style="margin-top:100px;">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php foreach ($res as $vv) {?>
<div id="modal_train<?php echo $vv->train_id; ?>" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">แก้ไขข้อมูลวิทยากรฝึกอบรม</h5>
      </div>
      <form action="<?php echo base_url(); ?>index.php/mater_hr/updtrain/<?php echo $vv->train_id; ?>" method="post" id="updtrain">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-3 control-labelt">รหัสวิทยากรฝึกอบรม:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_code" name="train_code" value="<?php echo$vv->train_code; ?>" placeholder="กรุณากรอกรหัสวิทยากรฝึกอบรม">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อวิทยากรฝึกอบรม:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_name" name="train_name" value="<?php echo$vv->train_name; ?>" placeholder="กรุณากรอกชื่อวิทยากรฝึกอบรม">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อสถาบัน :</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_ins" name="train_ins" value="<?php echo$vv->train_ins; ?>" placeholder="กรุณากรอกชื่อสถาบัน">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">เบอร์โทรศัพท์:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_tel" name="train_tel" value="<?php echo$vv->train_tel; ?>" placeholder="กรุณากรอกเบอร์โทรศัพท์">
            </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">เบอร์ fax:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="train_fax" name="train_fax" value="<?php echo$vv->train_fax; ?>" placeholder="กรุณากรอกเบอร์ fax">
            </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">รายละเอียด:</label>
            <div class="col-lg-9">
              <textarea rows="5" cols="5" class="form-control" id="train_detail" name="train_detail" placeholder="กรุณากรอกที่ตั้ง"><?php echo$vv->train_detail;?></textarea>
            </div>
        </div>
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
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script>
        $.extend( $.fn.dataTable.defaults, {
             autoWidth: false,
             columnDefs: [{
                 orderable: false,
                 width: '100px',
                 targets: [ 5 ]
             }],
             dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
             language: {
                 search: '<span>Filter:</span> _INPUT_',
                 lengthMenu: '<span>Show:</span> _MENU_',
                 paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
             },
             drawCallback: function () {
                 $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
             },
             preDrawCallback: function() {
                 $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
             }
         });
        $('.datatable-basic').DataTable();
          $('[data-popup="tooltip"]').tooltip();
        </script>
