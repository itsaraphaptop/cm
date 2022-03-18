<div class="container">
        
        <div class="panel panel-default">
		        <div class="panel-heading"><h3><span class="glyphicon glyphicon-send"></span> แจ้งปัญหาการใช้งาน</h3></div>
		        <div class="panel-body">
		       <table class="table table-hover">
              <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>สถานะ</th>
                    <th>Approve</th>
                    <th>เปิด</th>
                    <td>แก้ไข</td>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
            <?php $n=1; foreach ($res as $value) { ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $value->b_code; ?></td>
                    <td><?php echo $value->b_subject; ?></td>
                    <td><?php echo $value->b_date; ?></td>
                    <td width="5%"><?php if( $value->b_status == "approve") {echo "<span class='label label-success'>เสร็จงานแล้ว</span>";} elseif ($value->b_status == "wait") {echo "<span class='label label-warning'>รอการอนุมัติ</span>";} elseif($value->b_status == "delete"){echo "<span class='label label-danger'>ยกเลิกรายการ</span>";}?></td>
                    <?php if ($value->b_status=="approve") {?>
                    <td width="5%"><button class="btn btn-block btn-default btn-xs" disabled=""> Aprrove</button></td>
                     <td width="5%"><a href="<?php echo base_url(); ?>index.php/help/showhelp/<?php echo $value->b_code; ?>"><button class="btn btn-block btn-primary btn-xs"> เปิด</button></a></td>
                    <td width="5%"><button class="btn btn-block btn-default btn-xs" disabled=""> แก้ไข</button></td>
                    <td width="5%"><button class="btn btn-block btn-default btn-xs" disabled=""> ลบ</button></td>
                    <?php }else{ ?>
                    <td width="5%"><a href="<?php echo base_url(); ?>index.php/help/approve/<?php echo $value->b_code; ?>"><button class="btn btn-block btn-success btn-xs"> Aprrove</button></a></td>
                    <td width="5%"><a href="<?php echo base_url(); ?>index.php/help/showhelp/<?php echo $value->b_code; ?>"><button class="btn btn-block btn-primary btn-xs"> เปิด</button></a></td>
                    <td width="5%"><a href="<?php echo base_url(); ?>index.php/help/edit/<?php echo $value->b_code; ?>"><button class="btn btn-block btn-info btn-xs"> แก้ไข</button></a></td>
                    <td width="5%"><a href="<?php echo base_url(); ?>index.php/fixbug/delhelp/<?php echo $value->b_code; ?>"><button class="btn btn-block btn-danger btn-xs"> ลบ</button></a></td>
                    <?php } ?>
                   
                </tr>
                <?php $n++; } ?>
            </tbody>
           </table>
</div>
<div class="panel-footer">
    <a href="/"><button class="btn btn-default">กลับหน้าหลัก</button></a>
</div>
</div>
	    	</div>


     