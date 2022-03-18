<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการอนุมัติใบเบิกเงินย่อยทั้งหมด</span></div>
  <div class="panel-body">
      <table id="datasource"  class="table table-striped" style="font-size:12px;">
          <thead>
          <tr>
              <th>เลขที่ใบขอเบิก</th>
              <th>ชื่อผู้ขอเบิก</th>
              <th>โครงการ</th>
              <th>รายละเอียดใบขอเบิก</th>
              <th>สถานะ</th>
              <!-- <th>เปิด</th> -->
              <th>อนุมัติ</th>
              <th>ไม่อนุมัติ</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($res as $val) {?>

                  <tr>
                      <td><?php echo $val->docno;?></td>
                      <td><?php echo $val->vender; ?></td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->remark;?></td>
                      <td><?php if( $val->approve == "approve") {echo "<span class='label label-success'>อนุมัติแล้ว</span>";} elseif ($val->approve == "wait") {echo "<span class='label label-warning'>รอการอนุมัติ</span>";} ?></td>
                      <!-- <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#open<?php echo $val->docno;?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button>  </td> -->
                      <?php if( $val->approve == "approve") {?>
                      <td><button class="btn btn-default btn-block btn-xs" disabled="" data-toggle="modal" data-target="#approve<?php echo $val->docno;?>"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> อนุมัติ</button>  </td>
                      <td><button class="btn btn-default btn-block btn-xs" disabled="" data-toggle="modal" data-target="#disapprove<?php echo $val->docno;?>"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> ไม่อนุมัติ</button>  </td>
                      <?php }else{ ?>
                      <td><button class="btn btn-success btn-block btn-xs" data-toggle="modal" data-target="#approve<?php echo $val->docno;?>"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> อนุมัติ</button>  </td>
                      <td><button class="btn btn-danger btn-block btn-xs" data-toggle="modal" data-target="#disapprove<?php echo $val->docno;?>"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> ไม่อนุมัติ</button>  </td>
                      <?php } ?>
                      

                  </tr>
          <?php } ?>


      </tbody>
      </table>
  </div>
</div>
<!-- open modal -->
<?php foreach ($res as $val2) {?>
<!-- approve modal -->

  <div class="modal fade" id="approve<?php echo $val2->docno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายระเอียดใบขอเบิก</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">เลขที่ใบขอเบิก</label>
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
             <div class="row">
               <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการ</span></div>
                      <table class="table table-bordered table-striped table-hover" >
                        <thead>
                         <tr>
                          <th>รหัสต้นทุน</th>
                          <th>ชื่อวัสดุ</th>
                          <th>จำนวน</th>
                          <th>จำนวนเงิน</th>
                          <th>จำนวนเงิน(VAT)</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php   $n =1;?>

                          <?php
                          $prpr = $val2->docno;
                          $this->db->select('*');
                          $this->db->where('pettycashi_ref', $prpr);
                          $q =  $this->db->get('pettycash_item');
                          $res = $q->result();
                          foreach ($res as $valj){ ?>
                        <tr>
                         <td><?php echo substr($valj->pettycashi_costcode, -5); ?></td>
                          <td><?php echo $valj->pettycashi_expens; ?></td>
                           <td><?php echo $valj->pettycashi_amount; ?>&nbsp;<?php echo $valj->pettycashi_unit; ?></td>
                           <td><?php echo number_format($valj->pettycashi_unitprice,2); ?></td>
                           <td><?php echo number_format($valj->pettycashi_netamt,2); ?> บาท</td>
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

                   <input type="hidden" id="prcode" value="<?php echo $valj->pettycashi_ref; ?>">
                   <input type="hidden" id="prid" value="<?php echo $valj->pettycashi_id; ?>">
                 </div>
                 <div class="col-md-4">
                   <button class="btnapp btn btn-success btn-block" data-dismiss="modal" data-app="<?php echo $valj->pettycashi_ref; ?>" data-id="<?php echo $valj->pettycashi_id; ?>" type="submit"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> อนุมัติ</button>
                 </div>
              </div>
             </div>
         </div>
     </div>
   </div>
 </div>
  <!-- close approve modal -->


<?php } ?>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();
// } );
    $('.btnapp').click(function(){
    var url="<?php echo base_url(); ?>index.php/pettycash/approvepettycash";
      var dataSet={
          code: $(this).data('app')
        };
      $.post(url,dataSet,function(data){

         $('#loaddata').load('<?php echo base_url();?>index.php/pettycash/view_appr_pettycash');
      });
  });
</script>
