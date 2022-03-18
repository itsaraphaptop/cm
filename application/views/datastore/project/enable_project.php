
<h4 style="margin-left:10px;">โครงการที่ดำเนินการอยู่</h4>

<table id="datasource" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>ชื่อโครงการ</th>
        <th>ผู้รับผิดชอบ</th>
        <th>วันที่สร้าง</th>
        <th>เปิด</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($enable as $val) {?>

            <tr>
                <td><?php echo $val->project_code;?></td>
                <td><?php echo $val->project_name;?></td>
                <td><?php echo $val->project_engineer;?></td>
                <td><?php echo $val->project_start;?></td>
                <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                <td><button class="edit<?php echo $val->project_code;?> btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
                <td><button class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>

            </tr>
<script>
    $(".edit<?php echo $val->project_code;?>").click(function(event) {
        var pjid = "<?php echo $val->project_code;?>";
        $("#loadbox").html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
       $("#loadbox").load('<?php echo base_url(); ?>index.php/datastore/edit_project'+'/'+pjid);
    });
</script>


    <?php } ?>


</tbody>
</table>
