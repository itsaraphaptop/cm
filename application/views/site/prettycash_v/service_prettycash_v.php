 <div id="allpettycash" class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>  รายการใบเบิกเงินทั้งหมด</div>
<table id="datasource" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>เลขที่ใบเบิกเงินสด</th>
        <th>ผู้ขอเบิก</th>
        <th>รายละเอียด</th>
        <th>เปิด</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($all as $val) {?>

            <tr>
                <td><?php echo $val->docno;?></td>
                <td><?php echo $val->vender;?></td>
                <td><?php echo $val->remark;?></td>
                <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                

            </tr>
    <?php } ?>
 

</tbody>
</table>
</div>