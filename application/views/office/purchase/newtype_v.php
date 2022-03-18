
<div class="row" style="margin-left:10px;">
    <div class="col-md-4">
        <div class="form-group">
            
            <h4>หมวดหมู่วัสดุ</h4>
        </div>
    </div>
    <div style="margin-top:5px; margin-left:810px;">
        <div class="form-group">
            <button data-toggle="modal" data-target="#addmat" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มใหม่</button>
        </div>
    </div>
</div>

<table id="datasource" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th width="10%">Code</th>
        <th>Material Name</th>
        <th width="20%">วันที่สร้าง</th>
        <th width="10%">เลือก</th>
    </tr>
    </thead>
    <tbody>

    <?php $n=1; foreach ($cmattype as $val) {?>
            <tr>
                <td><?php echo $val->mattype_code;?></td>
                <td><?php echo $val->mattype_name;?></td>
                <td><?php echo $val->createdate;?></td>
                <td><button id="openmatgroup<?php echo $val->mattype_code;?>" class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เลือก</button> </td>
                

            </tr>
<script>
     $('#openmatgroup<?php echo $val->mattype_code;?>').click(function(){
        $('#loadbox<?php echo $n; ?>').load('<?php echo base_url(); ?>index.php/purchase/opennewmatgroup/<?php echo $val->mattype_code;?>');
    });
</script>
    <?php $n++; } ?>
</tbody>
</table>