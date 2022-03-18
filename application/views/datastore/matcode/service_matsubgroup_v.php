
<div class="row" style="margin-left:10px;">
    <div class="col-md-4">
        <div class="form-group">

            <h4>ขนาดวัสดุ</h4>
        </div>
    </div>
    <div class="text-right">
        <div class="form-group">
        <button id="back" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> ย้อนกลับ</button>
        <button data-toggle="modal" data-target="#addmat" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มใหม่</button>
        </div>
    </div>
</div>

<table id="datasource" class="table table-striped table-bordered datatablebasic">
    <thead>
    <tr>
        <th width="10%">Code</th>
        <th>Material Name</th>
        <th width="10%">เปิด</th>
        <th width="10%">แก้ไข</th>
        <th width="10%">ลบ</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($res as $val) {?>
            <tr>
                <td><?php echo $val->matsubgroup_code;?></td>
                <td><?php echo $val->matsubgroup_name;?></td>
                <td><button id="openproduct<?php echo $val->matsubgroup_code;?>" class="preload btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                <td><button data-toggle="modal" data-target="#edit<?php echo $val->matsubgroup_code;?>" class="btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
                <td><button id="del<?php echo $val->matsubgroup_code;?>" class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>

            </tr>
<script>
     $('#openproduct<?php echo $val->matsubgroup_code;?>').click(function(){
        $('#loadbox').load('<?php echo base_url(); ?>index.php/datastore/getmatproductgroup/<?php echo $val->mattype_code;?>/<?php echo $val->matgroup_code; ?>/<?php echo $val->matsubgroup_code;?>');
    });
</script>
    <?php } ?>
</tbody>
</table>

<div class="modal fade" id="addmat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header" style="background:#00008b; color:#fff;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการ</h4>
    </div>
    <div class="modal-body">
        <div class="row">
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typecode">SubGroup Code</label>
                  <input type="text" id="matsubgroup_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                  </div>
              </div>
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typename">SubGroup Name</label>
                  <input type="text" id="matsubgroup_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
              <input type="hidden" id="mattypecode" value="<?php echo $type; ?>">
              <input type="hidden" id="matgroupcode" value="<?php echo $group; ?>">
                  <button id="savegroup" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
              </div>
          </div>
    </div>
        <!-- panal body -->
</div>
</div>
</div>

<?php foreach ($res as $val2) { ?>
<div class="modal fade" id="edit<?php echo $val2->matsubgroup_code;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header" style="background:#00008b; color:#fff;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายการ - <?php echo $val2->matsubgroup_code;?></h4>
    </div>
    <div class="modal-body">
        <div class="row">
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typecode">SubGroup Code</label>
                  <input type="text" id="matsubgroup_code<?php echo $val2->matsubgroup_code;?>" value="<?php echo $val2->matsubgroup_code;?>" readonly="true" class="form-control">
                  </div>
              </div>
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typename">SubGroup Name</label>
                  <input type="text" id="matsubgroup_name<?php echo $val2->matsubgroup_code;?>" value="<?php echo $val2->matsubgroup_name;?>" class="form-control">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
              <input type="hidden" id="mattypecode<?php echo $val2->matsubgroup_code;?>" value="<?php echo $type; ?>">
              <input type="hidden" id="matgroupcode<?php echo $val2->matsubgroup_code;?>" value="<?php echo $group; ?>">
                  <button id="editsubgroup<?php echo $val2->matsubgroup_code;?>" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
              </div>
          </div>
    </div>
        <!-- panal body -->
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
  $('#editsubgroup<?php echo $val2->matsubgroup_code;?>').click(function(){
    var url="<?php echo base_url(); ?>index.php/datastore/editmatsubgroup";
        var dataSet={
            mattypecode: $('#mattypecode<?php echo $val2->matsubgroup_code;?>').val(),
            matgroupcode:  $('#matgroupcode<?php echo $val2->matsubgroup_code;?>').val(),
            matsubgroupcode:  $('#matsubgroup_code<?php echo $val2->matsubgroup_code;?>').val(),
            matsubgroupname:  $('#matsubgroup_name<?php echo $val2->matsubgroup_code;?>').val()
            };
        $.post(url,dataSet,function(data){
                var mattype = $('#mattypecode<?php echo $val2->matsubgroup_code;?>').val();
                var matgroup = $('#matgroupcode<?php echo $val2->matsubgroup_code;?>').val();
                alert(mattype+"-"+matgroup);

                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatsubgroup'+'/'+mattype+'/'+matgroup);

        });
  });
  $('#del<?php echo $val2->matsubgroup_code;?>').click(function(){
    var url="<?php echo base_url(); ?>index.php/datastore/delmatsubgroup";
        var dataSet={
            mattypecode: $('#mattypecode<?php echo $val2->matsubgroup_code;?>').val(),
            matgroupcode:  $('#matgroupcode<?php echo $val2->matsubgroup_code;?>').val(),
            matsubgroupcode:  $('#matsubgroup_code<?php echo $val2->matsubgroup_code;?>').val(),
            matsubgroupname:  $('#matsubgroup_name<?php echo $val2->matsubgroup_code;?>').val()
            };
        $.post(url,dataSet,function(data){
                var mattype = $('#mattypecode<?php echo $val2->matsubgroup_code;?>').val();
                var matgroup = $('#matgroupcode<?php echo $val2->matsubgroup_code;?>').val();
                alert(mattype+"-"+matgroup);

                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatsubgroup'+'/'+mattype+'/'+matgroup);

        });
  });
</script>
<?php } ?>



<script>
    $('#savegroup').click(function(){
       var url="<?php echo base_url(); ?>index.php/datastore/addmatsubgroup";
        var dataSet={
            mattypecode: $('#mattypecode').val(),
            matgroupcode:  $('#matgroupcode').val(),
            matsubgroupcode:  $('#matsubgroup_code').val(),
            matsubgroupname:  $('#matsubgroup_name').val()
            };
        $.post(url,dataSet,function(data){
                var mattype = $('#mattypecode').val();
                var matgroup = $('#matgroupcode').val();
                alert(mattype+"-"+matgroup);

                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatsubgroup'+'/'+mattype+'/'+matgroup);

        });
    });
     $('#back').click(function(){
      var mattype = $('#mattypecode').val();
      $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatgruop'+'/'+mattype);
    });
    $('.datatablebasic').DataTable();
</script>
