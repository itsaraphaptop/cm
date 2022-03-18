<div class="row">
  <div class="col-md-12" id="title" style="margin-top:-140px;">
  <div class="row">
    <div class="col-xs-6">
        <h1>MEKA SYSTEM</h1>
        <h3>ระบบบริหารจัดการธุรกิจก่อสร้าง</h3>
        <hr>
      </div>
    <div class="col-xs-2">
      <div class="panel panel-default">
                      <div class="panel-body" style="height:80px; text-align: center;">
                          <h1 style="line-height: 5px;"><?php echo $wait; ?></h1>
                          <p>รายการ</p>
                      </div>
                      <div class="panel-footer">
                          <span class="label label-warning">รออนุมัติ</span>
                      </div>
                    </div>
    </div>
    <div class="col-xs-2">
      <div class="panel panel-default">
                      <div class="panel-body" style="height:80px; text-align: center;">
                          <h1 style="line-height: 5px;"><?php echo $cwaitapp; ?></h1>
                          <p>รายการ</p>
                      </div>
                      <div class="panel-footer">
                          <span class="label label-success">อนุมัติแล้ว</span>
                      </div>
                    </div>
    </div>
    <div class="col-xs-2">
      <div class="panel panel-default">
                      <div class="panel-body" style="height:80px; text-align: center;">
                          <h1 style="line-height: 5px;"><?php echo $all; ?></h1>
                          <p>รายการ</p>
                      </div>
                      <div class="panel-footer">
                          <span class="label label-info label-block">ทั้งหมด</span>
                      </div>
                    </div>
    </div>
  </div>      
</div>
</div>

                  
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการใบขอซื้อทั้งหมด</span></div>
  <div class="panel-body">
      <table id="datasource" class="table table-hover" style="font-size:12px;" cellspacing="0" width="100%">
          <thead>
          <tr>
              <th>เลขที่ใบขอซื้อ</th>
              <th>โครงการ/แผนก</th>
              <th>รายละเอียดใบขอซื้อ</th>
              <th>สถานะ</th>
              <th>เปิด</th>
              <th>แก้ไข</th>
              <th>พิมพ์</th>
              <th>ลบ</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($res as $val) {?>
            <?php if( $val->pr_approve == "approve" && $val->po_open =="open") {?>
                  <tr class="warning">
                      <td id="prcode"><?php echo $val->pr_prno;?> </td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->pr_remark;?></td>
                      <td><?php if( $val->po_open == "open") {echo '<span class="label label-warning">เปิด PO แล้ว</span>';} elseif ($val->pr_approve == "approve") {echo '<span class="label label-warning">อนุมัติแล้ว</span>';} ?></td>
                      
                      <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openpr<?php echo $val->pr_prno;?>" data-pro="<?php echo $val->pr_prno;?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button></td>
                      <td><button disabled class="btn btn-default btn-block btn-xs">แก้ไข</button></a></td>
                      <td><a href="<?php echo base_url(); ?>index.php/report/report_pr/<?php echo $val->pr_prno; ?>" target="blank"><button class="btn btn-warning btn-block btn-xs">พิมพ์</button></a></td>
                      <td><button disabled class="btn btn-danger btn-block btn-xs" id="del<?php echo $val->pr_prno;?>">ลบ</button></td>
                  </tr>
               
              <?php }else if ( $val->pr_approve =="approve") {?>
                  <tr class="success">
                      <td id="prcode"><?php echo $val->pr_prno;?> </td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->pr_remark;?></td>
                      <td><?php if( $val->pr_approve == "approve") {echo '<span class="label label-success">อนุมัติแล้ว</span>';} elseif ($val->pr_approve == "wait") {echo '<span class="label label-warning">รอการอนุมัติ</span>';} ?></td>
                      <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openpr<?php echo $val->pr_prno;?>" data-pro="<?php echo $val->pr_prno;?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button></td>
                      <td><button disabled class="btn btn-default btn-block btn-xs">แก้ไข</button></a></td>
                      <td><a href="<?php echo base_url(); ?>index.php/report/report_pr/<?php echo $val->pr_prno; ?>" target="blank"><button class="btn btn-warning btn-block btn-xs">พิมพ์</button></a></td>
                      <td><button disabled class="btn btn-danger btn-block btn-xs" id="del<?php echo $val->pr_prno;?>">ลบ</button></td>
                  </tr>
             <?php }else{ ?>
                  <tr>
                      <td id="prcode"><?php echo $val->pr_prno;?> </td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->pr_remark;?></td>
                      <td><?php if( $val->pr_approve == "approve") {echo '<span class="label label-success">อนุมัติแล้ว</span>';} elseif ($val->pr_approve == "wait") {echo '<span class="label label-warning">รอการอนุมัติ</span>';} ?></td>
                      <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openpr<?php echo $val->pr_prno;?>" data-pro="<?php echo $val->pr_prno;?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button></td>
                      <td><button id="editprbtn<?php echo $val->pr_prno;?>" class="btn btn-info btn-block btn-xs">แก้ไข</button></a></td>
                      <td><a href="<?php echo base_url(); ?>index.php/report/report_pr/<?php echo $val->pr_prno; ?>" target="blank"><button class="btn btn-warning btn-block btn-xs">พิมพ์</button></a></td>
                      <td><button class="btn btn-danger btn-block btn-xs" id="del<?php echo $val->pr_prno;?>">ลบ</button></td>
                  </tr>
                  <?php } ?>
<script>
      $("#del<?php echo $val->pr_prno;?>").click(function(){
        var url="<?php echo base_url(); ?>index.php/office/delete_prall";
          var dataSet={
            id: "<?php echo $val->pr_prno;?>"
            };
            $.post(url,dataSet,function(data){
               $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
                $('#loaddata').load('<?php echo base_url();?>index.php/office/receice_allpr');

            });
      });
</script>
<script>
$("#editprbtn<?php echo $val->pr_prno;?>").click(function() {
   $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
  $("#loaddata").load('<?php echo base_url(); ?>index.php/office/editpr/<?php echo $val->pr_prno; ?>');
});
</script>
          <?php } ?>

      </tbody>
      </table>
  </div>
</div>

 <!-- modal show detail po detail -->
<?php foreach ($res as $val2) {?>
  
  <div class="modal fade" id="openpr<?php echo $val2->pr_prno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายระเอียดใบขอซื้อ</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">เลขที่ใบขอซื้อ</label>
                    <p><?php echo $val2->pr_prno;?></p>
                    <input type="hidden" class="pr form-control" id="pr" value="<?php echo $val2->pr_prno;?>">
                  </div>
               </div>
               <div class="col-md-6">
                    <label for="">วันที่ขอซื้อ</label>
                    <p><?php echo $val2->pr_prdate; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                    <label for="">ผู้ขอซื้อ</label>
                    <p><?php echo $val2->pr_reqname;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">โครงการ/แผนก</label>
                 <p><?php echo $val2->project_name;?><?php echo $val2->department_title; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">สถานที่ส่งของ</label>
                  <p><?php echo $val2->pr_deliplace;?></p>
               </div>
               <div class="col-md-6">
                    <label for="">วันที่ส่งของ</label>
                    <p><?php echo $val2->pr_delidate; ?></p>
               </div>
             </div>
              <div class="row">
               <div class="col-md-12">
                 <label for="">รายละเอียด</label>
                  <p><?php echo $val2->pr_remark;?></p>
               </div>
             </div>
             <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการขอซื้อ</span></div>
                    <table class="table table-bordered table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>รหัสต้นทุน</th>
                          <th>ชื่อวัสดุ</th>
                          <th>จำนวน</th>
                         </tr>
                      </thead>
                      <tbody>
                          <?php   $n =1;?>

                          <?php 
                          $prpr = $val2->pr_prno;
                          $this->db->select('*');
                          $this->db->where('pri_ref', $prpr);
                          $q =  $this->db->get('pr_item');
                          $res = $q->result();
                          foreach ($res as $valj){ ?>
                        <tr>
                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
                          <td><?php echo $valj->pri_matname; ?></td>
                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
                         </tr>
                          <?php $n++; } ?>
                      </tbody>
                    </table>
                </div>
              </div>
               </div>
             </div>
              <div class="modal-footer">
               <div class="row">
                 <div class="col-md-8">

                 </div>
                 <div class="col-md-4">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
              </div>
         </div>
     </div>
   </div>
 </div> 

  <!-- close open modal -->
	<?php } ?>
<!--
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
<link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
-->
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();
// } );
</script>

 

