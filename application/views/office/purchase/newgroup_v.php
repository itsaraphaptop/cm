
<div class="row" style="margin-left:10px;">
    <div class="col-md-4">
        <div class="form-group">
            
            <h4>ชือวัสดุ</h4>
        </div>
    </div>
    <div style="margin-top:5px; margin-left:720px;">
        <div class="form-group">
        <button id="back" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> ย้อนกลับ</button>
        <button data-toggle="modal" data-target="#addmat" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มใหม่</button>
        </div>
    </div>
</div>

<table id="datasource" class="table table-striped table-bordered">
    <thead>
    <tr>
    <th>#</th>
        <th width="10%">Code</th>
        <th>Material Name</th>
        <th width="10%">เลือก</th>
    </tr>
    </thead>
    <tbody>
    <?php $n=1; foreach ($res as $val) {?>
            <tr>
            <td><?php echo $n; ?></td>
                <td><?php echo $val->matgroup_code;?></td>
                <td><?php echo $val->matgroup_name;?></td>
                <td><button id="opensubgroup<?php echo $val->matgroup_code;?>" class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เลือก</button> </td>
                

            </tr>
<script>
     $('#opensubgroup<?php echo $val->matgroup_code;?>').click(function(){
        $('#loadbox<?php echo $n; ?>').load('<?php echo base_url(); ?>index.php/datastore/getmatsubgroup/<?php echo $val->mattype_code;?>/<?php echo $val->matgroup_code; ?>');
    });
</script>
    <?php $n++; } ?>
</tbody>
</table>