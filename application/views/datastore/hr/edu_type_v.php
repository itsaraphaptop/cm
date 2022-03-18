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
      <h6 class="panel-title"><i class="icon-cog3 position-left"></i> ข้อมูลสถาบันการศึกษา  <p></p></h6>
      <div class="heading-elements">
        <a href="<?php echo base_url(); ?>data_master" class="btn border-info text-info-600 btn-flat btn-icon btn-md heading-btn"><i class="icon-undo2"></i> ย้อนกลับ</a>
        <button  type="button" data-toggle="modal" data-target="#newedu" class="newedu btn border-info text-info-600 btn-flat btn-icon btn-md heading-btn"><i class="icon-plus-circle2"></i> เพิ่มสถาบันการศึกษา</button>
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
                      <th>รหัสสถาบันการศึกษา</th>
                      <th>ชื่อสถาบันการศึกษา</th>
                      <th>ชื่อสถาบันการศึกษา (Eng)</th>
                      <th>สาขาวิชา</th>
                      <th>ที่ตั้ง</th>
                      <th>ประเภท</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($res as $v) {?>
                    <tr>
                      <td><?php echo $v->edu_code; ?></td>
                      <td><?php echo $v->edu_name; ?></td>
                      <td><?php echo $v->eduname_eng; ?></td>
                      <td><?php echo $v->edu_major; ?></td>
                      <td><?php echo $v->edu_addre; ?></td>
                      <td>
                      <?php if ($v->type==1) {
                        echo "รัฐบาล";
                      }
                      else {
                        echo "เอกชน";
                        } ?>
                      </td>
                      <td>
                        <ul class="icons-list">
                            <li><li class="text-teal-600" type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#modal_edu<?php echo $v->edu_id;?>"><a href="#"><i class="icon-cog7"></i></a></li>
                            <li>
                            <a href="<?php echo base_url(); ?>index.php/mater_hr/del_edu/<?php echo $v->edu_id;?>"><i class="icon-trash"></i></a>
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

<div id="newedu" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">เพิ่มสถาบันการศึกษา</h5>
      </div>
      <form action="<?php echo base_url(); ?>index.php/mater_hr/addedu" method="post" id="insert">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-3 control-labelt">รหัสสถาบันการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="edu_code" name="edu_code" placeholder="กรุณากรอกรหัสสถาบันการศึกษา">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อสถาบันการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="edu_name" name="edu_name" placeholder="กรุณากรอกชื่อสถาบันการศึกษา">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อสถาบันการศึกษา (Eng):</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="eduname_eng" name="eduname_eng" placeholder="กรุณากรอกชื่อสถาบันการศึกษาภาษาอังกฤษ">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">สาขาวิชา :</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="edu_major" name="edu_major" placeholder="กรุณากรอกสาขาวิชา">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ที่ตั้ง:</label>
            <div class="col-lg-9">
              <textarea rows="5" cols="5" class="form-control" id="edu_addre" placeholder="กรุณากรอกที่ตั้ง"></textarea>
            </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ประเภท :</label>
            <div class="col-lg-9">
              <input type="radio" name="type" id="type" value="1" class="radio-inline">รัฐบาล
              <input type="radio" name="type" id="type" value="2" class="radio-inline">เอกชน
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
<div id="modal_edu<?php echo $vv->edu_id; ?>" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">แก้ไขสถาบันการศึกษา</h5>
      </div>
      <form action="<?php echo base_url(); ?>index.php/mater_hr/upd_edu/<?php echo $vv->edu_id; ?>" method="post" id="upd_edu">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-3 control-labelt">รหัสสถาบันการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="edu_code" name="edu_code" placeholder="กรุณากรอกรหัสสถาบันการศึกษา" value="<?php echo $vv->edu_code; ?>" >
              <input type="hidden" name="edu_id" id="edu_id" value="<?php echo $vv->edu_id; ?>">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อสถาบันการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="edu_name" name="edu_name" placeholder="กรุณากรอกชื่อสถาบันการศึกษา" value="<?php echo $vv->edu_name; ?>">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อสถาบันการศึกษา (Eng):</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="eduname_eng" name="eduname_eng" placeholder="กรุณากรอกชื่อสถาบันการศึกษาภาษาอังกฤษ" value="<?php echo $vv->eduname_eng; ?>">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">สาขาวิชา :</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="edu_major" name="edu_major" placeholder="กรุณากรอกสาขาวิชา" value="<?php echo $vv->edu_major; ?>">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ที่ตั้ง:</label>
            <div class="col-lg-9">
              <textarea rows="5" cols="5" class="form-control" name="edu_addre" id="edu_addre" placeholder="กรุณากรอกที่ตั้ง"><?php echo $vv->edu_addre; ?></textarea>
            </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ประเภท :</label>
            <div class="col-lg-9">
            <?php if ($vv->type == 1) {
              ?>
              <input type="radio" name="type" id="type" value="1" checked class="radio-inline">รัฐบาล
              <input type="radio" name="type" id="type" value="2" class="radio-inline">เอกชน
            <?php
            } else {
            ?>
            <input type="radio" name="type" id="type" value="1" class="radio-inline">รัฐบาล
            <input type="radio" name="type" id="type" value="2" checked class="radio-inline">เอกชน
            <?php
              } ?>
              
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
