
<div class="row" style="margin-left:10px;">
    <div class="col-md-4">
        <div class="form-group">

            <h4>ตรา/ยี่ห้อ</h4>
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
        <th width="10%">แก้ไข</th>
        <th width="10%">ลบ</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($res as $val) {?>
            <tr>
                <td><?php echo $val->matspec_code;?></td>
                <td><?php echo $val->matspec_name;?></td>

                <td><button data-toggle="modal" data-target="#edit<?php echo $val->matspec_code;?>" class="btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
                <td><button id="del<?php echo $val->matspec_code;?>" class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>

            </tr>
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
                  <input type="text" id="matspeccode" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                  </div>
              </div>
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typename">SubGroup Name</label>
                  <input type="text" id="matspecname" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
              <input type="hidden" id="mattypecode" value="<?php echo $type; ?>">
              <input type="hidden" id="matgroupcode" value="<?php echo $group; ?>">
              <input type="hidden" id="matsubgroupcode" value="<?php echo $subgroup; ?>">
              <input type="hidden" id="matproductcode" value="<?php echo $product; ?>">
                  <button id="savegroup" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
              </div>
          </div>
    </div>
        <!-- panal body -->
</div>
</div>
</div>

<?php foreach ($res as $val2) {?>
<div class="modal fade" id="edit<?php echo $val2->matspec_code;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header" style="background:#00008b; color:#fff;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการ - <?php echo $val2->matspec_code;?></h4>
    </div>
    <div class="modal-body">
        <div class="row">
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typecode">SubGroup Code</label>
                  <input type="text" id="matspeccode<?php echo $val2->matspec_code;?>" value="<?php echo $val2->matspec_code;?>" readonly="true" class="form-control">
                  </div>
              </div>
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typename">SubGroup Name</label>
                  <input type="text" id="matspecname<?php echo $val2->matspec_code;?>" value="<?php echo $val2->matspec_name;?>" class="form-control">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
              <input type="hidden" id="mattypecode<?php echo $val2->matspec_code;?>" value="<?php echo $type; ?>">
              <input type="hidden" id="matgroupcode<?php echo $val2->matspec_code;?>" value="<?php echo $group; ?>">
              <input type="hidden" id="matsubgroupcode<?php echo $val2->matspec_code;?>" value="<?php echo $subgroup; ?>">
              <input type="hidden" id="matproductcode<?php echo $val2->matspec_code;?>" value="<?php echo $product; ?>">
                  <button id="editgroup<?php echo $val2->matspec_code;?>" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
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
  $('#editgroup<?php echo $val2->matspec_code;?>').click(function(){
    var url="<?php echo base_url(); ?>index.php/datastore/editmatspec";
        var dataSet={
            mattypecode: $('#mattypecode<?php echo $val2->matspec_code;?>').val(),
            matgroupcode:  $('#matgroupcode<?php echo $val2->matspec_code;?>').val(),
            matsubgroupcode:  $('#matsubgroupcode<?php echo $val2->matspec_code;?>').val(),
            matproductcode:  $('#matproductcode<?php echo $val2->matspec_code;?>').val(),
            matspeccode:  $('#matspeccode<?php echo $val2->matspec_code;?>').val(),
            matspecname:  $('#matspecname<?php echo $val2->matspec_code;?>').val()
            };
        $.post(url,dataSet,function(data){
                var mattype = $('#mattypecode<?php echo $val2->matspec_code;?>').val();
                var matgroup = $('#matgroupcode<?php echo $val2->matspec_code;?>').val();
                var matsubgroup = $('#matsubgroupcode<?php echo $val2->matspec_code;?>').val();
                var matproductcode = $('#matproductcode<?php echo $val2->matspec_code;?>').val();
                alert(mattype+"-"+matgroup+"-"+matsubgroup+"-"+matproductcode);

                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatspec'+'/'+mattype+'/'+matgroup+'/'+matsubgroup+'/'+matproductcode);

        });
  });
$('#del<?php echo $val2->matspec_code;?>').click(function(){
    var url="<?php echo base_url(); ?>index.php/datastore/delmatspec";
        var dataSet={
            mattypecode: $('#mattypecode<?php echo $val2->matspec_code;?>').val(),
            matgroupcode:  $('#matgroupcode<?php echo $val2->matspec_code;?>').val(),
            matsubgroupcode:  $('#matsubgroupcode<?php echo $val2->matspec_code;?>').val(),
            matproductcode:  $('#matproductcode<?php echo $val2->matspec_code;?>').val(),
            matspeccode:  $('#matspeccode<?php echo $val2->matspec_code;?>').val(),
            matspecname:  $('#matspecname<?php echo $val2->matspec_code;?>').val()
            };
        $.post(url,dataSet,function(data){
                var mattype = $('#mattypecode<?php echo $val2->matspec_code;?>').val();
                var matgroup = $('#matgroupcode<?php echo $val2->matspec_code;?>').val();
                var matsubgroup = $('#matsubgroupcode<?php echo $val2->matspec_code;?>').val();
                var matproductcode = $('#matproductcode<?php echo $val2->matspec_code;?>').val();
                alert(mattype+"-"+matgroup+"-"+matsubgroup+"-"+matproductcode);

                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatspec'+'/'+mattype+'/'+matgroup+'/'+matsubgroup+'/'+matproductcode);

        });
  });
</script>
<?php } ?>



<script>
    $('#savegroup').click(function(){
       var url="<?php echo base_url(); ?>index.php/datastore/addmatspec";
        var dataSet={
            mattypecode: $('#mattypecode').val(),
            matgroupcode:  $('#matgroupcode').val(),
            matsubgroupcode:  $('#matsubgroupcode').val(),
            matproductcode:  $('#matproductcode').val(),
            matspeccode:  $('#matspeccode').val(),
            matspecname:  $('#matspecname').val()
            };
        $.post(url,dataSet,function(data){
                var mattype = $('#mattypecode').val();
                var matgroup = $('#matgroupcode').val();
                var matsubgroup = $('#matsubgroupcode').val();
                var matproductcode = $('#matproductcode').val();
                alert(mattype+"-"+matgroup+"-"+matsubgroup+"-"+matproductcode);

                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatspec'+'/'+mattype+'/'+matgroup+'/'+matsubgroup+'/'+matproductcode);

        });
    });
    $('#back').click(function(){
      var mattype = $('#mattypecode').val();
      var matgroup = $('#matgroupcode').val();
      var matsubgroup = $('#matsubgroupcode').val();
      $('#loadbox').load('<?php echo base_url();?>index.php/datastore/getmatproductgroup'+'/'+mattype+'/'+matgroup+'/'+matsubgroup);
    });
    $('.datatablebasic').DataTable();
</script>
