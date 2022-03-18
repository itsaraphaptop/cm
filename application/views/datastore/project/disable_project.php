<h4 style="margin-left:10px;">โครงการที่ปิดงานแล้ว</h4>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>ชื่อโครงการ</th>
        <th>ผู้รับผิดชอบ</th>
        <th>วันที่สร้าง</th>
        <th>จัดการ</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($disable as $val) {?>

        <tr>
            <td><?php echo $val->project_code;?></td>
            <td><?php echo $val->project_name;?></td>
            <td><?php echo $val->project_start;?></td>
            <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>

        </tr>
    <?php } ?>


    </tbody>
</table>