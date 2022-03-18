
<div class="panel panel-primary">
<div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการ PR ที่อนุมัติแล้ว</div>
<table id="datasource" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>เลขที่ใบขอซื้อ</th>
        <th>ผู้ขอซื้อ</th>
        <th>รายละเอียด</th>
        <th>สถานะ</th>
        <th>เปิด</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($approve as $val) {?>

            <tr>
                <td><?php echo $val->pr_prno;?></td>
                <td><?php echo $val->pr_reqname;?></td>
                <td><?php echo $val->pr_remark;?></td>
                <td><i class="glyphicon glyphicon-check"></i></td>
                <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                

            </tr>
    <?php } ?>
 

</tbody>
</table>

</div>

<div class="panel panel-primary">
 <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการ PR รออนุมัติ</div>
<table id="datasource" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>เลขที่ใบขอซื้อ</th>
        <th>ผู้ขอซื้อ</th>
        <th>รายละเอียด</th>
        <th>สถานะ</th>
        <th>เปิด</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($wait as $val) {?>

            <tr>
                <td><?php echo $val->pr_prno;?></td>
                <td><?php echo $val->pr_reqname;?></td>
                <td><?php echo $val->pr_remark;?></td>
                <td><i class="glyphicon glyphicon-unchecked"></i></td>
                <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                

            </tr>
    <?php } ?>
 

</tbody>
</table>
</div>