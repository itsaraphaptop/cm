<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการอนุมัติใบขอซื้อทั้งหมด</span></div>
  <div class="panel-body">
      <table id="datasource"  class="table table-striped">
          <thead>
          <tr>
              <th>เลขที่ใบขอซื้อ</th>
              <th>โครงการ</th>
              <th>รายละเอียดใบขอซื้อ</th>
              <th>สถานะ</th>
              <th>เปิด</th>
              <th>อนุมัติ</th>
              <th>ไม่อนุมัติ</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($res as $val) {?>

                  <tr>
                      <td><?php echo $val->pr_prno;?></td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->pr_remark;?></td>
                      <td><span class="label label-warning"><?php if( $val->pr_approve == "approve") {echo "อนุมัติแล้ว";} elseif ($val->pr_approve == "wait") {echo "รอการอนุมัติ";} ?></span></td>
                      <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openpr<?php echo $val->pr_prno;?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button>  </td>
                      <td><button class="btn btn-success btn-block btn-xs" data-toggle="modal" data-target="#approvepr<?php echo $val->pr_prno;?>"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> อนุมัติ</button>  </td>
                      <td><button class="btn btn-danger btn-block btn-xs" data-toggle="modal" data-target="#disapprove<?php echo $val->pr_prno;?>"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> ไม่อนุมัติ</button>  </td>

                  </tr>
          <?php } ?>


      </tbody>
      </table>
  </div>
</div>

<!-- open modal -->
<?php foreach ($res as $val2) {?>

  <div class="modal fade" id="openpr<?php echo $val2->pr_prno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
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
 </div>

  <!-- close open modal -->



  <!-- approve modal -->

  <div class="modal fade" id="approvepr<?php echo $val2->pr_prno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
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
                          <th>ราคา</th>
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
                           <td><?php echo $valj->pri_netamt; ?> บาท</td>
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

                   <input type="hidden" id="prcode" value="<?php echo $valj->pri_ref; ?>">
                   <input type="hidden" id="prid" value="<?php echo $valj->pri_id; ?>">
                 </div>
                 <div class="col-md-4">
                   <button class="btnapp btn btn-success btn-block" data-dismiss="modal" data-app="<?php echo $valj->pri_ref; ?>" data-id="<?php echo $valj->pri_id; ?>" type="submit"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> อนุมัติ</button>
                 </div>
              </div>
             </div>
         </div>
     </div>
   </div>
 </div>
  <!-- close approve modal -->


 <!-- Dis Approve modal -->

  <div class="modal fade" id="disapprove<?php echo $val2->pr_prno;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">ล
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายระเอียดใบขอซื้อ</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                <div class="col-md-12">
                <label for="">สาเหตุที่ไม่อนุมัติ</label>
                  <div class="form-group">
                    <textarea name="disapprove" class="form-control" required="" id="disapprove" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
               <input type="hidden" id="prcode" value="<?php echo $valj->pri_ref; ?>">
               <input type="hidden" id="prid" value="<?php echo $valj->pri_id; ?>">
             <div class="modal-footer">
               <div class="row">
                 <div class="col-md-8">

                 </div>
                 <div class="col-md-4">
                   <button class="btndis btn btn-danger btn-block" data-dismiss="modal" data-dis="<?php echo $valj->pri_ref; ?>" data-pid="<?php echo $valj->pri_id; ?>" type="submit"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> ไม่อนุมัติ</button>
                 </div>
              </div>
             </div>
         </div>
     </div>
   </div>
 </div>
  <?php } ?>
 <!-- Close Dis Approve modal -->


<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();
// } );
</script>


<script>
  $('.btnapp').click(function(){
    var url="<?php echo base_url(); ?>index.php/manag/approvepr";
      var dataSet={
          prno: $(this).data('app')
        };
      $.post(url,dataSet,function(data){

         $('#loaddata').load('<?php echo base_url();?>index.php/manag/waitprapprove');
      });
  });
  $('.btndis').click(function(){
    var url="<?php echo base_url(); ?>index.php/office/disapprovepr";
      var dataSet={
          prno: $(this).data('dis'),
          pr_disremark: $('#disapprove').val()
        };
      $.post(url,dataSet,function(data){

         $('#loaddata').load('<?php echo base_url();?>index.php/office/service_approve_pr');
      });
  });
</script>

