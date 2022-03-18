
<div class="row" style="margin-left:10px;">
    <div class="col-md-4">
        <div class="form-group">

            <h4>หมวดหมู่วัสดุ</h4>
        </div>
    </div>
    <div class="text-right">
        <div class="form-group">
            <button data-toggle="modal" data-target="#addmat" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มใหม่</button>
        </div>
    </div>
</div>

<table id="datasource" class="table table-striped table-bordered datatablebasic">
    <thead>
    <tr>
        <th width="10%">Code</th>
        <th>Material Name</th>
        <th width="20%">วันที่สร้าง</th>
        <th width="10%">เปิด</th>
        <th width="10%">แก้ไข</th>
        <th width="10%">ลบ</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cmattype as $val) {?>
            <tr>
                <td><?php echo $val->mattype_code;?></td>
                <td><?php echo $val->mattype_name;?></td>
                <td><?php echo $val->createdate;?></td>
                <td><button id="openmatgroup<?php echo $val->mattype_code;?>" class="preload btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                <td><button data-toggle="modal" data-target="#edit<?php echo $val->mattype_code;?>" class="btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
                <td><button id="del<?php echo $val->mattype_code;?>" class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>

            </tr>
<script>
     $('#openmatgroup<?php echo $val->mattype_code;?>').click(function(){
        $('#loadbox').load('<?php echo base_url(); ?>index.php/datastore/getmatgruop/<?php echo $val->mattype_code;?>');
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
                  <label for="typecode">Type Code</label>
                  <input type="text" id="mattype_code" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                  </div>
              </div>
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typename">Type Name</label>
                  <input type="text" id="mattype_name" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                  <button id="savetype" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
              </div>
          </div>
    </div>
        <!-- panal body -->
</div>
</div>
</div>

<?php foreach ($cmattype as $val2) {?>
<div class="modal fade" id="edit<?php echo $val2->mattype_code;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header" style="background:#00008b; color:#fff;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายการ - <?php echo $val2->mattype_code;?></h4>
    </div>
    <div class="modal-body">
        <div class="row">
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typecode">Type Code</label>
                  <input type="text" id="mattype_code<?php echo $val2->mattype_code;?>" value="<?php echo $val2->mattype_code;?>" readonly="true" placeholder="กรอกรหัสประเภท เช่น J"  class="form-control">
                  </div>
              </div>
              <div class="col-xs-6">
                   <div class="form-group">
                  <label for="typename">Type Name</label>
                  <input type="text" id="mattype_name<?php echo $val2->mattype_code;?>" value="<?php echo $val2->mattype_name;?>" placeholder="กรอกชื่ออธิบายรหัส" class="form-control">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12">
                  <button id="edittype<?php echo $val2->mattype_code;?>" data-dismiss="modal" class="btn btn-primary">ยืนยันการแก้ไขข้อมูล</button>
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
  $('#edittype<?php echo $val2->mattype_code;?>').click(function(){
     var url="<?php echo base_url(); ?>index.php/datastore/editmattype";
        var dataSet={
            mattypecode:  $('#mattype_code<?php echo $val2->mattype_code;?>').val(),
            mattypename:  $('#mattype_name<?php echo $val2->mattype_code;?>').val()
            };
        $.post(url,dataSet,function(data){
                alert(data);
                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_cmattype');

        });
  });
  $('#del<?php echo $val2->mattype_code;?>').click(function(){
    var url="<?php echo base_url(); ?>index.php/datastore/delmattype";
        var dataSet={
            mattypecode:  $('#mattype_code<?php echo $val2->mattype_code;?>').val(),
            mattypename:  $('#mattype_name<?php echo $val2->mattype_code;?>').val()
            };
        $.post(url,dataSet,function(data){
                alert(data);
                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_cmattype');

        });
  });
</script>
<?php } ?>


<script>
    $('#savetype').click(function(){
       var url="<?php echo base_url(); ?>index.php/datastore/addmattype";
        var dataSet={
            mattypecode:  $('#mattype_code').val(),
            mattypename:  $('#mattype_name').val()
            };
        $.post(url,dataSet,function(data){
                alert(data);
                $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_cmattype');

        });
    });
$('.datatablebasic').DataTable();
</script>
