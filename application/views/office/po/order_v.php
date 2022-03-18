<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายการใบสั่งจ้างทั้งหมด</span></div>
     <div class="panel-body">
      <table id="datasource" class="table table-striped" style="font-size: 13px;">
          <thead>
          <tr>
              <th>เลขที่ใบจ้างซื้อ</th>
              <th>โครงการ</th>
              <th>ผู้รับเหมา</th>
              <th>รายละเอียดใบจ้างซื้อ</th>
              <!-- <th>สถานะ</th> -->
              <th>เปิด</th>
              <th>แก้ไข</th>
              <th>พิมพ์</th>
              <th>ลบ</th>
          </tr>
          </thead>
          <tbody class="mytable">

          <?php foreach ($res as $val) {?>

                  <tr>
                      <td><?php echo $val->lo_lono;?></td>
                      <td><?php  echo $val->project_name; ?><?php echo $val->department_title; ?></td>
                      <td><?php echo $val->vender_name;?></td>
                      <td><?php echo $val->contactdesc;?></td>
                     <!--  <td><i class="glyphicon glyphicon-check"></i></td> -->
                      <td><button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#openlo<?php echo $val->lo_id;?>"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                      <td><button disabled class="btn btn-default btn-block btn-xs">แก้ไข</button></td>
                      <td><a href="<?php echo base_url(); ?>index.php/report/report_lo/<?php echo $val->lo_lono;?>" target="blank"><button class="btn btn-warning btn-block btn-xs">พิมพ์</button></a></td>
                      <td><button disabled class="btn btn-danger btn-block btn-xs" id="del<?php echo $val->lo_lono;?>">ลบ</button></td>
                  </tr>
          <?php } ?>

   </tbody>
      </table>
    </div>
</div>

<!-- open modal -->
<?php foreach ($res as $val2) {?>
 <!-- modal show detail po detail -->
  <div class="modal fade" id="openlo<?php echo $val2->lo_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายละเอียดใบสั่งจ้าง</h4>
       </div>
         <div class="modal-body">
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">เลขที่ใบสั่งจ้าง</label>
                  <p><?php echo $val2->lo_lono;?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">วันที่เอกสาร</label>
                  <p><?php echo $val2->lodate;?></p>
              </div>
              <div class="col-md-4">
                  <label for="">อ้างอิงใบเสนอราคาเลขที่</label>
                  <p><?php echo $val2->refquono;?></p>
              </div>
             </div>
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">โครงการ/แผนก</label>
                 <p><?php  echo $val2->project_name; ?><?php echo $val2->department_title; ?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">ผู้ว่าจ้าง</label>
                  <p><?php echo $val2->lo_lono;?></p>
              </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">เป็นสัญญา</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">ลักษณะสัญญา</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">มูลค่าสัญญา</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="" >ลดมูลค่า</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">คงเหลือ</label>
                 <p><?php echo $val2->lo_lono;?>วัน</p>
               </div>
               <div class="col-md-4">
                 <label for="">ส่วนลดพิเศษคิดแบบ</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">จำนวนเงินสุทธิ</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">คิดภาษี (%)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">หักภาษี ณ ที่จ่าย</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เรียกเก็บเงิน</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>

             <hr>
             <h4>เงื่อนไขการชำระ</h4>

              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">กำหนดจ่ายเงินเดือนละ(งวด)</label>
                 <p><?php echo $val2->lo_lono;?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">แต่ละงวดชำระ(วัน)</label>
                  <p><?php echo $val2->lo_lono;?></p>
              </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">หลังจาก</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">Payment Condition</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เงินล่วงหน้า(%)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="" >เงินงวดสัญญา(%)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">เงินงวดสัญญา</label>
                 <p><?php echo $val2->lo_lono;?>วัน</p>
               </div>
               <div class="col-md-4">
                 <label for="">จ่ายตามความก้าวหน้า(%)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">จ่ายเมื่อผู้ว่าจ้างส่งงานแก่เจ้าของโครงการแล้ว(วัน)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">หักเงินประกันผลงาน (% ทุกงวดการจ่ายเงิน)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">หักเงินคืนเงินจ่ายล่วงหน้า (% ทุกงวดการจ่ายเงินจนครบ ตามจำนวนเงินล่วงหน้า)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">หักเงินอื่นๆ</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>

             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">ระยะสัญญาเริ่มต้นตั้งแต่</label>
                 <p><?php echo $val2->lo_lono;?></p>
                </div>
              </div>
              <div class="col-md-4">
                  <label for="">ถึง</label>
                  <p><?php echo $val2->lo_lono;?></p>
              </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="">เลยกำหนดปรับวันละ(%)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">จำนวนเงิน(บาท)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">ประกันผลงาน (เดือน)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <label for="" >วันที่ส่งมอบ</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-4">
                 <label for="">สถานที่ส่ง</label>
                 <p><?php echo $val2->lo_lono;?>วัน</p>
               </div>
               <div class="col-md-4">
                 <label for="">โดยใช้ (วางประกัน)</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <label for="">อ้างอิงสัญญา</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
               <div class="col-md-6">
                 <label for="">เงือนไขอื่นๆ</label>
                 <p><?php echo $val2->lo_lono;?></p>
               </div>
             </div>
          



         </div>
     </div>
     </div>
  </div> <!--end modal -->
  <?php } ?>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
<link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();
// } );
</script>


