<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายารอนุมัติใบสั่งซื้อทั้งหมด</span></div>
    <div class="panel-body">
      <table id="datasource" class="table table-striped" style="font-size: 13px;">
          <thead>
          <tr>
              <th>เลขที่ใบสั่งซื้อ</th>
              <th>โครงการ</th>
              <th>รายละเอียดใบสั่งซื้อ</th>
              <th>สถานะ</th>
              <th>เปิด</th>
              <th>อนุมัติ</th>
              <th>ไม่อนุมัติ</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($res as $val) {?>
                  <tr>
                      <td><?php echo $val->po_pono;?></td>
                      <td><?php echo $val->project_name;?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->po_remark;?></td>
                      <td><?php if( $val->po_approve == "approve") {echo '<span class="label label-success">อนุมัติแล้ว</span>';} elseif ($val->po_approve == "wait") {echo '<span class="label label-warning">รอการอนุมัติ</span>';} ?></td>
                      <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openpo<?php echo $val->po_pono;?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                      <td><button class="btn btn-success btn-block btn-xs" data-toggle="modal" data-target="#approvepr<?php echo $val->po_pono;?>"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> อนุมัติ</button>  </td>
                      <td><button class="btn btn-danger btn-block btn-xs" data-toggle="modal" data-target="#disapprove<?php echo $val->po_pono;?>"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> ไม่อนุมัติ</button>  </td>
                  </tr>
          <?php } ?>

</tbody>
      </table>
 </div>
</div>

<!-- open modal -->
<?php foreach ($res as $val2) {?>

 <!-- modal show detail po detail -->
  <div class="modal fade" id="openpo<?php echo $val2->po_pono;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายระเอียดใบสั่งซื้อ</h4>
       </div>
         <div class="modal-body">
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">เลขที่ใบสั่งซื้อ</label>
                  <p><?php echo $val2->po_pono;?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">ผู้ขอซื้อ</label>
                  <p><?php echo $val2->po_prname; ?></p>
              </div>
              <div class="col-md-4">
                  <label for="">เลขที่ใบขอซื้อ</label>
                  <p><?php echo $val2->po_prno ?></p>
              </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">โครงการ/แผนก</label>
                 <p><?php echo $val2->project_name; ?></p>
               </div>
               <div class="col-md-4">
                 <label for="">ผู้ขาย</label>
                 <p><?php echo $val2->po_vender; ?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เลขที่สัญญา</label>
                 <p><?php echo $val2->po_contact; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">ระบบ</label>
                 <p><?php echo $val2->systemname; ?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เงื่อนไขการชำระ</label>
                 <p><?php echo $val2->po_trem ?>วัน</p>
               </div>
               <div class="col-md-4">
                 <label for="">เลขที่ใบเสนอราคา</label>
                 <p><?php echo $val2->po_quono; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">ผู้ติดต่อ</label>
                 <p><?php echo $val2->po_contact ?></p>
               </div>
               <div class="col-md-4">
                 <label for="">วันที่ส่งมอบ</label>
                 <p><?php echo $val2->po_deliverydate; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">สถานที่ส่งของ</label>
                 <p><?php echo $val2->po_place; ?></p>
               </div>
               <div class="col-md-4">
                 <label for="">รายละเอียด</label>
                 <p><?php echo $val2->po_remark; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-xs-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการสินค้า</span></div>

                     <table class="table table-bordered table-striped table-hover" >
                        <thead>
                          <tr style="font-size:12px;">
                            <th style="font-size:12px;">No.</th>
                            <th>ชื่อสินค้า</th>
                            <th>ต้นทุน</th>
                            <th>ปริมาณ</th>
                            <th >หน่วย</th>
                            <th>ราคา/หน่วย</th>
                            <th>จำนวนเงิน</th>
                            <th>จำนวนเงินหลังหักส่วนลด</th>
                            <th>ภาษี</th>
                            <th>จำนวนเงินสุทธิ</th>
                           <!-- <th>จัดการ</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            <?php $n =1; $qt=0; $total = 0; $unitprice = 0; $amount =0; $disamt=0; $vat=0; ?>
                            <?php
                            $popo = $val2->po_pono;
                            $this->db->select('*');
                            $this->db->where('poi_ref', $popo);
                            $q =  $this->db->get('po_item');
                            $res = $q->result();
                            foreach ($res as $valj){ ?>
                          <tr  style="font-size:12px;">
                            <td style="font-size:12px;" scope="row"><?php echo $n;?></td>
                              <td><?php echo  $valj->poi_matname; ?></td>
                              <td><?php echo  $valj->poi_costname; ?></td>
                              <td><?php echo  number_format($valj->poi_qty); ?></td>
                              <td><?php echo  $valj->poi_unit;?></td>
                              <td><?php echo number_format($valj->poi_priceunit);?></td>
                              <td><?php echo number_format($valj->poi_amount);?></td>
                              <td><?php echo number_format($valj->poi_disamt);?></td>
                              <td><?php echo number_format($valj->poi_vat);?></td>
                              <td><?php echo number_format($valj->poi_netamt);?></td>
                            <!--  <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-dismiss="modal">เลือก</button></td> -->
                          </tr>
                          <?php
                             $n++;
                             $total=$total+$valj->poi_netamt;
                             $unitprice=$unitprice+$valj->poi_priceunit;
                             $amount=$amount+$valj->poi_amount;
                             $vat=$vat+$valj->poi_vat;
                             $disamt=$disamt+$valj->poi_disamt;
                             $qt=$qt+$valj->poi_qty;
                           } ?>
                            <tr><td colspan="3"><div class='text-center'>รวม</div>  </td>
                            <td><?php echo number_format($qt); ?></td>
                            <td></td>
                               <td ><?php echo number_format($unitprice); ?></td>
                               <td ><?php echo number_format($amount); ?></td>
                               <td ><?php echo number_format($disamt); ?></td>
                               <td ></td>
                               <td ><?php echo number_format($total); ?></td>

                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
               <div class="modal-footer">
                 <a href="<?php echo base_url(); ?>index.php/report/report_po/<?php echo $val2->po_pono;?>" target="_blank"><button class="btn btn-info"> พิมพ์</button></a>
               </div>
             </div>
         </div>
     </div>
     </div>
  </div> <!--end modal -->

  <!-- approve modal -->

  <div class="modal fade" id="approvepr<?php echo $val2->po_pono;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายระเอียดใบสั่งซื้อ</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">เลขที่ใบสั่งซื้อ</label>
                    <p><?php echo $val2->po_pono;?></p>
                    <input type="hidden" class="po form-control" id="po" value="<?php echo $val2->po_pono;?>">
                  </div>
               </div>
               <div class="col-md-6">
                    <label for="">วันที่สั่งซื้อ</label>
                    <p><?php echo $val2->po_podate; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                    <label for="">ผู้สั่งซื้อ</label>
                    <p><?php echo $val2->po_prname;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">โครงการ/แผนก</label>
                 <p><?php echo $val2->project_name;?><?php echo $val2->department_title; ?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">สถานที่ส่งสั่งง</label>
                  <p><?php echo $val2->po_place;?></p>
               </div>
               <div class="col-md-6">
                    <label for="">วันที่ส่งสั่งง</label>
                    <p><?php echo $val2->po_deliverydate; ?></p>
               </div>
             </div>
              <div class="row">
               <div class="col-md-12">
                 <label for="">รายละเอียด</label>
                  <p><?php echo $val2->po_remark;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการสั่งซื้อ</span></div>
                      <table class="table table-bordered table-striped table-hover" >
                        <thead>
                          <tr>
                            <th>รหัสต้นทุน</th>
                            <th>ชื่อวัสดุ</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php   $n =1;?>
                             <?php
                          $popo = $val2->po_pono;
                          $this->db->select('*');
                          $this->db->where('poi_ref', $popo);
                          $q =  $this->db->get('po_item');
                          $res = $q->result();
                          foreach ($res as $valj){ ?>

                          <tr>
                           <td><?php echo substr($valj->poi_costcode, -5) ; ?></td>
                            <td><?php echo $valj->poi_matname; ?></td>

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
                   <button class="btnapp btn btn-success btn-block" data-dismiss="modal" data-app="<?php echo $valj->poi_ref; ?>" data-id="<?php echo $valj->poi_id; ?>" ><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> อนุมัติ</button>
                 </div>
              </div>
             </div>
         </div>
        </div>
      </div>
  <!-- close approve modal -->


 <!-- Dis Approve modal -->

  <div class="modal fade" id="disapprove<?php echo $val2->po_pono;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายระเอียดใบสั่งซื้อ</h4>
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
             <div class="modal-footer">
               <div class="row">
                 <div class="col-md-8">

                 </div>
                 <div class="col-md-4">
                   <button class="btndis btn btn-danger btn-block" data-dismiss="modal" data-dis="<?php echo $valj->poi_ref; ?>" data-pid="<?php echo $valj->poi_id; ?>" type="submit"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> ไม่อนุมัติ</button>
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
    var url="<?php echo base_url(); ?>index.php/office/approvepo";
      var dataSet={
          pono: $(this).data('app')
        };
      $.post(url,dataSet,function(data){

         $('#loaddata').load('<?php echo base_url();?>index.php/office/service_approve_po');
      });
  });
  $('.btndis').click(function(){
    var url="<?php echo base_url(); ?>index.php/office/disapprovepo";
      var dataSet={
          pono: $(this).data('dis'),
          po_disremark: $('#disapprove').val()
        };
      $.post(url,dataSet,function(data){

         $('#loaddata').load('<?php echo base_url();?>index.php/office/service_approve_po');
      });
  });
</script>

