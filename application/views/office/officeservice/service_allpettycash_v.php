<div class="row" id="headddd" style="margin-top:-140px;">
  
      <div class="col-xs-12">
        <h1>Account Payable System</h1>
        <h3>ระบบจัดการใบเบิกเงินสด</h3>
        <hr>
      </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการใบเบิกเงินสดทั้งหมด</span></div>
     <div class="panel-body">
      <table class="datatable table table-hover"style="font-size:11px;">
          <thead>
          <tr>
              <th width="10%">เลขที่</th>
              <th width="20%">โครงการ</th>
              <th>รายละเอียดใบเบิกเงินสด</th>
              <th width="10%">สถานะ</th>
              <th width="5%">เปิด</th>
              <th width="5%">แก้ไข</th>
              <th width="5%">พิมพ์</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($res as $val) {?>

                  <tr>
                      <td><?php echo $val->docno;?> </td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->remark;?></td>
                       <td><?php if( $val->approve == "approve") {echo "<span class='label label-success'>อนุมัติแล้ว</span>";} elseif ($val->approve == "wait") {echo "<span class='label label-warning'>รอการอนุมัติ</span>";} ?></td>
                      <td><button class="btn btn-primary  btn-xs btn-block" data-toggle="modal" data-target="#openpr<?php echo $val->docno;?>" style="font-size:11px;"><span class="glyphicon glyphicon-open"></span> เปิดดู</button></td>
                       <?php if( $val->approve == "approve") {?>
                      <td><button class="edith<?php echo $val->doc_id;?> btn btn-info btn-xs btn-block" disabled=""><span class="glyphicon glyphicon-edit" style="font-size:11px;"></span> แก้ไข</button></td>
                      <?php }else{ ?>
                      <td><button class="edith<?php echo $val->doc_id;?> btn btn-info btn-xs btn-block"><span class="glyphicon glyphicon-edit" style="font-size:11px;"></span> แก้ไข</button></td>
                      <?php } ?>
                      <td><a href="<?php echo base_url(); ?>index.php/report/pettycash/<?php echo $val->docno; ?>" target="_blank"><button class="btn btn-warning btn-xs btn-block"><span class="glyphicon glyphicon-print" style="font-size:11px;"></span> พิมพ์</button></a></td>
                  </tr>
<script>
  $(".edith<?php echo $val->doc_id;?>").click(function(event) {
    $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
    $('#loaddata').load('<?php echo base_url(); ?>index.php/pettycash/editpettycash_h/<?php echo $val->doc_id; ?>/<?php echo $val->docno; ?>');
  $("#headddd").hide();
  });
</script>
          <?php } ?>


      </tbody>
      </table>
   </div>
</div>



 <!-- modal show  petty cash Header Detail -->


  <?php foreach ($res as $val2) {?>
  
  <div class="modal fade" id="openpr<?php echo $val2->docno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายละเอียดใบเบิกเงินสด</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">เลขที่ใบเบิกเงินสด</label>
                    <p><?php echo $val2->docno;?></p>
                    <input type="hidden" class="pr form-control" id="pr" value="<?php echo $val2->docno;?>">
                  </div>
               </div>
               <div class="col-md-6">
                    <label for="">วันที่ขอเบิก</label>
                    <p><?php echo $val2->docdate; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                    <label for="">ผู้ขอเบิก</label>
                    <p><?php echo $val2->vender;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">โครงการ/แผนก</label>
                 <p><?php echo $val2->project_name;?><?php echo $val2->department_title; ?></p>
               </div>
             </div>
              <div class="row">
               <div class="col-md-12">
                 <label for="">รายละเอียด</label>
                  <p><?php echo $val2->remark;?></p>
               </div>
             </div>
             <br>
             <div class="row">
               <div class="col-md-12">
               <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการเบิก</span></div>
                  <table class="table table-bordered table-striped table-hover" >
                    <thead>
                      <tr>
                      <th width="5%">#</th>
                        <th>รายการเบิก</th>
                        <th>ร้านค้า</th>
                        <th>จำนวน</th>
                        <th width="10%">จำนวนเงิน</th>
                        <th>หน่วย</th>
                        <th>จำนวนสุทธิ</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php   $n =1; $unitprice=0; $amoun=0; $tot=0;?>
                        <?php 
                        $docno = $val2->docno;
                        $this->db->select('*');
                        $this->db->where('pettycashi_ref', $docno);
                        $q =  $this->db->get('pettycash_item');
                        $res = $q->result();
                        foreach ($res as $valj){ ?>
                      <tr>
                      <td><?php echo $n; ?></td>
                       <td><?php echo $valj->pettycashi_expens; ?></td>
                       <td><?php echo $valj->pettycashi_vender; ?></td>
                       <td><?php echo number_format($valj->pettycashi_unitprice,2); ?></td>
                        <td><?php echo number_format($valj->pettycashi_amount,2); ?></td>
                        <td><?php echo $valj->pettycashi_unit; ?></td>
                        <td><?php echo number_format($valj->pettycashi_netamt,2); ?></td>
                         
                      </tr>
                        <?php $n++; 

                        $unitprice= $unitprice+$valj->pettycashi_unitprice;
                        $amoun = $amoun+$valj->pettycashi_amount;
                        $tot= $tot+$valj->pettycashi_netamt;
                         } ?>
                        <tr>
                          <td colspan="4" align="center">รวม</td>
                          <td><?php echo number_format($amoun,2); ?></td>
                          <td></td>
                          <td><?php echo number_format($tot,2); ?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
               </div>
             </div>
         </div>
     </div>
   </div>
 </div> 
  <?php } ?>


<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('.datatable').DataTable();
// } );
</script>
