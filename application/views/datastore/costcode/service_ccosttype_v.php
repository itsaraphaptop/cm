
<h4 style="margin-left:10px;">ประเภทต้นทุน</h4>

<table id="datasource" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Code</th>
        <th>Cost Name</th>
        <th>วันที่สร้าง</th>
        <th>เปิด</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($ccosttype as $val) {?>

            <tr>
                <td><?php echo $val->ctype_code;?></td>
                <td><?php echo $val->ctype_name;?></td>
                <td><?php echo $val->createdate;?></td>
                <td><a href="<?php echo base_url(); ?>index.php/datastore/ccostgroup/<?php echo $val->ctype_code; ?>"><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button></a></td>
                <td><button class="btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
                <td><button class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>

            </tr>
    <?php } ?>


</tbody>
</table>
