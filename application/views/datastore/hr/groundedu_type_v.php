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
      <h6 class="panel-title"><i class="icon-cog3 position-left"></i> ข้อมูลวุฒิการศึกษา<p></p></h6>
      <div class="heading-elements">
        <a href="<?php echo base_url(); ?>data_master" class="btn border-info text-info-600 btn-flat btn-icon btn-md heading-btn"><i class="icon-undo2"></i> ย้อนกลับ</a>
        <button  type="button" data-toggle="modal" data-target="#newegroedu" class="newegroedu btn border-info text-info-600 btn-flat btn-icon btn-md heading-btn"><i class="icon-plus-circle2"></i> เพิ่มวุฒิการศึกษา</button>
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
                      <th>รหัสวุฒิการศึกษา</th>
                      <th>ชื่อวุฒิการศึกษา</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($res as $v) {?>
                    <tr>
                      <td width="10%"><?php echo $v->groedu_code; ?></td>
                      <td><?php echo $v->groedu_name; ?></td>
                      <td width="10%">
                        <ul class="icons-list">
                          <li><li class="text-teal-600" type="button" class="btn bg-info btn-sm" data-toggle="modal" data-target="#modal_edudru<?php echo $v->groedu_id;?>"><a href="#"><i class="icon-cog7"></i></a></li>
                            <li>
                            <a href="<?php echo base_url(); ?>index.php/mater_hr/del_edugro/<?php echo $v->groedu_id;?>"><i class="icon-trash"></i></a>
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

<div id="newegroedu" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">เพิ่มวุฒิการศึกษา</h5>
      </div>
      <form action="<?php echo base_url(); ?>index.php/mater_hr/addgroudedu" method="post" id="insert">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-3 control-labelt">รหัสวุฒิการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="groedu_code" name="groedu_code" placeholder="กรุณากรอกรหัสวุฒิการศึกษา">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อวุฒิการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="groedu_name" name="groedu_name" placeholder="กรุณากรอกชื่อวุฒิการศึกษา">
            </div>
        </div><br>

        <div class="modal-footer" style="margin-top:100px;">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php foreach ($res as $vv) {?>
<div id="modal_edudru<?php echo $vv->groedu_id;?>" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">เพิ่มวุฒิการศึกษา</h5>
      </div>
      <form action="<?php echo base_url(); ?>index.php/mater_hr/updgroudedu/<?php echo $vv->groedu_id;?>" method="post" id="insert">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-lg-3 control-labelt">รหัสวุฒิการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="groedu_code" name="groedu_code" value="<?php echo $vv->groedu_code;?>" placeholder="กรุณากรอกรหัสวุฒิการศึกษา">
            </div>
        </div><br>

        <div class="form-group">
          <label class="col-lg-3 control-labelt">ชื่อวุฒิการศึกษา:</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="groedu_name" name="groedu_name" value="<?php echo $vv->groedu_name;?>" placeholder="กรุณากรอกชื่อวุฒิการศึกษา">
            </div>
        </div><br>

        <div class="modal-footer" style="margin-top:100px;">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save changes</button>
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
                 targets: [ 2 ]
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
