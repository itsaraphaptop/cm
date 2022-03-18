<!-- kendo -->  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="container">
    <style>
        #newpo,#approve_pettycash,#apinvreal,#PM,#apapprovinv,#apinv,#allissue,#issue,#allcpo,#head,#create,#enable,#disable,#approve_pr,#createpo,#pr,#loi,#allpo,#allloi,#approvepo,#prettycash,#allpr,#allpettycash,#receive,#receiveic,#receivepo,#receiveall,#reportall,#callpettycash,#callpr,#allreceive,#stock{cursor: pointer;}
        #allcpo:hover,#head:hover,#create:hover,#enable:hover,#disable:hover,#receive:hover,#callpettycash:hover,#callpr:hover,#allreceive:hover,#stock:hover{background: #ADD6FF;}
    .sidebar-nav a {
    display: block;
    text-decoration: none;
    color: #222;
}
.sidebar-nav ul {
  
    border-bottom: 1px solid #d4d4d4;
   
}
    </style>

    
    <div class="row">
      <div class="col-xs-3">
        <div class="row">
              <div class="col-xs-6">
                       <img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" class="img-responsive img-rounded">
              </div>
              <div class="col-xs-6">
                 <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $name; ?></h3>
                  <?php if ($dep=="") {?>
                      <h5><?php echo $project; ?></h5>
                  <?php  }else{ ?>
                      <h5><?php echo $dep; ?></h5>
                  <?php } ?>
                  <span class="label label-success">online</span>
              </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-xs-3">

            <div class="panel panel-primary">
                <div class="panel-heading">เมนูหลัก</div>
                <div class="list-group">
                <?php if ($moffce!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="head"> <!-- start -->
                          <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span  class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ระบบจัดการในสำนักงาน </a>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                        <ul class="sublist"  id="pr">
                          <a style="margin-top:10px; color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบขอซือใหม่ PR</a>
                        </ul>
                        <ul class="sublist"  id="prettycash">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบเบิกเงินสด</a>
                        </ul>
                        <ul class="sublist"  id="allpr">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบขอซื้อทั้งหมด</a>
                        </ul>
                        <ul class="sublist"  id="allpettycash">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบเบิกเงินสดทั้งหมด</a>
                        </ul>
                        <?php if ($approve!='true') {?>
                          
                        <?php }else{ ?>
                        <ul class="sublist"  id="approve_pr">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp; อนุมัติใบขอซื้อ</a>
                        </ul>
                        <?php } ?>
                        <?php if ($pc_approve!='true') {?>
                         
                        <?php }else{ ?>
                             <ul class="sublist"  id="approve_pettycash">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp; อนุมัติใบเบิกเงินสด <span class="label label-danger">new</span></a>
                        </ul>
                        <?php } ?>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mpo!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="head"> <!-- start -->
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span  class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ระบบใบสั่งซื้อ </a>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                        <!-- <ul class="sublist"  id="createpo">
                          <a style="margin-top:10px; color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบสั่งซือใหม่ PO</a>
                        </ul> -->
                         <ul class="sublist"  id="newpo">
                          <a id="ponew" href="<?php echo base_url(); ?>index.php/purchase/newpo" style="margin-top:10px; color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบสั่งซือใหม่ PO new</a>
                        </ul>
                        <ul class="sublist"  id="loi">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบสั่งจ้าง</a>
                        </ul>
                        <ul class="sublist"  id="allpo">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบสั่งซื้อทั้งหมด</a>
                        </ul>
                        <ul class="sublist"  id="allloi">
                         <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบสั่งจ้างทั้งหมด</a>
                        </ul>
                        <ul class="sublist"  id="approvepo">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp;อนุมติใบสั่งซื้อ</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mic!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="receive">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ระบบคลังวัสดุ</a>
                    </div>
                         
                    <div id="collapse3" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="receivepo">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกรับสินค้าเข้า</a>
                        </ul>
                        <!--<ul class="sublist"  id="receiveic">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าเข้าสต๊อก</a>
                        </ul>-->
                        <ul class="sublist"  id="issue">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกเบิกวัสดุ</a>
                        </ul>
                        <ul class="sublist"  id="allissue">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายการเบิกวัสดุ</a>
                        </ul>
                        <ul class="sublist"  id="receiveall">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; วัสดุคงคลัง</a>
                        </ul>
                        <ul class="sublist"  id="reportall">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายงานรายการวัสดุ</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($map!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="ap">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ระบบเจ้าหนี้ (AP)</a>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="apinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้</a>
                        </ul>
                        <ul class="sublist"  id="apinvreal">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้ <span class="label label-primary">เพิ่มใหม่</span></a>
                        </ul>
                       <!--  <ul class="sublist"  id="apbill">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกรับวางบิล</a>
                        </ul>-->
                        <ul class="sublist"  id="apapprovinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายการชำระจ่ายเจ้าหนี้ทั้งหมด</a>
                        </ul>
                       <!-- <ul class="sublist"  id="appayinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้</a>
                        </ul> -->
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mar!='true') {?>
                      
                   <?php }else{ ?>
                     <div class="list-group-item" id="ar">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ลูกหนี้ (AR)</a>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="receivepo">
                          <a href="#" style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกใบแจ้งหนี้</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกตั้งบัญชีลูกหนี้</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกใบเสร็จรับเงิน</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระตามใบเสร็จ</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mpm!='true') {?>
                      
                    <?php }else{ ?>
                     <div class="list-group-item" id="PM">
                        <a href="<?php echo base_url(); ?>index.php/panel/manag" style="color:#000;"><span  class="glyphicon glyphicon-stats" aria-hidden="true"></span> Management System  <span class="label label-warning">Beta</span></a>
                    </div>
                    <?php } ?>
                </div>

                <div class="panel-footer"></div>
            </div>
        </div>
<!-- end tail -->

<!-- page -->
<div class="col-xs-9" id="title" style="margin-top:-140px;">
  
      <div class="col-xs-12">
        <h1>MAKE SYSTEM</h1>
        <h3>Business Intelligence</h3>
        <hr>
      </div>
</div>
<div class="col-xs-9" id="loaddata">
<form method="post" action="<?php echo base_url(); ?>index.php/po_active/addpo">
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> จัดการใบสั่งซื้อสินค้า</div>

    <div class="panel-body">
    
      <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
              <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบขอซื้อ</a>
            </div>
        </div>
         <div class="col-md-3">
                    <div class="from-group">
                      <label for="">เลขทีใบสั่งซื้อ</label>
                      <input type="text" name="pono" id="pono" class="ppono form-control input-sm" readonly="true">
                    </div>
                  </div>
      </div>
      <div class="row" id="gproject">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">โครงการ</label>
                <input type="text" readonly="true"  class="form-control input-sm" id="projectnam" name="projectnam">
                <input type="hidden" readonly="true"   class="form-control input-sm" id="putproject" name="putproject">
                <span class="input-group-btn">
                  <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="code">ระบบ</label>
              <select class="form-control input-sm" name="system" id="system">
                 <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                 <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                 <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                 <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                 <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
              </select>
            </div>
          </div>
          <div class="col-xs-3" style="margin-top: 2px;">
              <label for="lpodate">วันที่สั่งซื้อ</label>
            <div class="form-group">
              <input type="text" name="podate"  class="form-control input-sm" id="podate">
            </div>
        </div>
      </div>
      <div class="row" id="gdepartment">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">แผนก</label>
                <input type="text" readonly="true"  class="form-control input-sm" id="dptnam" name="dptnam">
                <input type="hidden" readonly="true"   class="form-control input-sm" name="putdpt" id="putdpt">
                <span class="input-group-btn">
                  <button class="opendp btn btn-primary btn-sm" data-toggle="modal" data-target="#opendpt" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
          </div>
      </div>
      <div class="row" style="margin-top:15px;">
        <div class="col-xs-6">
          <div class="input-group">
            <label for="code">ผู้ขอซื้อ</label>
            <input type="text" name="memname" id="memname" readonly="true" placeholder="จ่ายให้กับ" class="form-control input-sm">
            <input type="hidden" name="memid" id="memid">
            <span class="input-group-btn" >
              <button class="openmem btn btn-primary btn-sm" data-toggle="modal" data-target="#openme" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
            </span>
          </div>
        </div>
      </div> <!-- end row -->
      <div class="row" style="margin-top:15px;">
        <div class="col-lg-6">
          <div class="input-group">
            <label for="">ผู้ขาย</label>
            <input type="text" class="form-control input-sm" readonly="true" placeholder="กรอกชื่อร้านค้า" name="vender" id="vender1">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#open" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        <div class="col-xs-3" >
          <div class="form-group">
            <label for="team">เงื่อนไขชำระ</label>
            <input type="text" required="" name="team" placeholder="กรอกเงื่อนไขการชำระ" id="team" class="form-control input-sm">

          </div>
        </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="contact">เบอร์ติดต่อ</label>
              <input type="text" name="contact" placeholder="กรอกเบอร์โทรศํพท์" id="tel" class="form-control input-sm">
            </div>
          </div>
      </div> <!-- end row -->
      <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
            <label for="prno">ใบขอซื้อ</label>
            <input type="text" name="prno" id="prno" placeholder="กรอกเลขที่ใบขอซื้อ" class="form-control input-sm">
          </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
              <label for="contactno">เลขที่สัญญา</label>
              <input type="text" name="contactno"  id="contactno" placeholder="กรอกเลขที่สัญญา" class="form-control input-sm">
            </div>
        </div>
        <div class="col-xs-3">
          <div class="form-group">
            <label for="quono">ใบเสนอราคา</label>
            <input type="text" name="quono"  id="quono" placeholder="กรอกเลขที่เสนอราคา" class="form-control input-sm">
          </div>
        </div>
        <div class="col-xs-3" style="margin-top: 2px;">
          <div class="form-group">
            <label for="deliverydate">วันที่ส่งมอบ</label>
            <input type="text" name="deliverydate" class="form-control input-sm" id="deliverydate">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="place">สถานที่ส่งของ</label>
            <textarea type="text" rows="4" cols="50" name="place" id="place" placeholder="กรอกสถานที่ส่งของ" class="form-control input-sm"></textarea>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="place">หมายเหตุ</label>
            <textarea type="text" rows="4" cols="50" name="remarkh" id="remarkh" placeholder="กรอกหมายเหตุ" class="form-control input-sm"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
        <a class="btn_insert btn btn-primary" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span> เพิมรายการ</a>
          

        </div>
      </div>
      <table class="table table-hover">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th>ต้นทุน</th>
              <th>ชื่อสินค้า</th>
              <th>ปริมาณ</th>
              <th>หน่วย</th>
              <th>ราคา/หน่วย</th>
              <th>จำนวนเงิน</th>
              <th colspan="2">จัดการ</th>

            </tr>
          </thead>
          <tbody id="body">
            
          </tbody>
        </table>
        <div class="row">
        <div class="col-xs-6">
        <a class="btn_insert btn btn-primary" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span> เพิมรายการ</a>
          <button type="submit" class="btn btn-primary" id="savemaster" name="button"><span class="glyphicon glyphicon-save"></span> บันทึก</button>
          <button type="submit" class="btn btn-info" id="editmaster" name="button"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button>
          <button type="button" class="print btn btn-success" name="button" target="blank"><span class="glyphicon glyphicon-print"></span> พิมพ์</button>
        </div>
        </div>
    </div>
 </div>
</form>

<!-- modal เลือกผู้ขอซื้อ -->
  <div class="modal fade" id="openme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                 <table id="tableme" class="table table-hover" >
       <thead>
         <tr>
           <th>No.</th>
           <th>ชื่อผู้ขอเบิก</th>
           <th>แผนก/โครงการ</th>
           <th width="5%">จัดการ</th>
         </tr>
       </thead>
       <tbody>
           <?php   $n =1;?>
           <?php foreach ($resmem as $val){ ?>
         <tr>
          <th scope="row"><?php echo $n;?></th>
           <td><?php echo $val->m_name; ?></td>
           <td><?php echo $val->department_title; ?><?php echo $val->project_name; ?></td>
             <td><button class="openmem btn btn-xs btn-block btn-info" data-toggle="modal"  data-mname="<?php echo $val->m_name;?>" data-mid="<?php echo $val->m_id;?>"  data-dismiss="modal">เลือก</button></td>
         </tr>
           <?php $n++; } ?>
       </tbody>
     </table>
             </div>
         </div>
     </div>
   </div>
 </div> <!--end modal -->
</div>
<!-- modal เลือกร้านค้า -->
 <div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="tablevender" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>ชื่อร้านค้า</th>
          <th>ที่อยู่ร้านค้า</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($res as $val){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $val->vender_name; ?></td>
          <td><?php echo $val->vender_address; ?></td>
            <td><button class="openstore btn btn-xs btn-block btn-info" data-toggle="modal"  data-vname="<?php echo $val->vender_name;?>" data-crteam="<?php echo $val->vender_credit;?>" data-vtel="<?php echo $val->vender_tel; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
  $(".openstore").click(function() {
     $("#vender1").val($(this).data('vname'));
     $("#team").val($(this).data('crteam'));
     $("#tel").val($(this).data('vtel'));
     $('#open').modal('hide');
  });
  </script>

<!-- modal เลือกใบขอซื้อ -->
 <div class="modal fade" id="openpr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกใบขอซื้อ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>เลขที่ใบขอซื้อ</th>
          <th>ผู้ขอซื้อ</th>
          <th>โครงการ</th>
          <th>รายละเอียด</th>
          <th>สถานะใบขอซื้อ</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getpr as $valu){ ?>
        <tr>
         <th scope="row"><?php echo $valu->pr_prno;?></th>
          <td><?php echo $valu->pr_reqname; ?></td>
          <td><?php echo $valu->project_name; ?><?php echo $valu->department_title; ?></td>
          <td><?php echo $valu->pr_remark; ?></td>
          <td><?php if($valu->pr_status=="enable") {echo '<span class="label label-success"> อนุมัติแล้ว </span>';} ?></td>
            <td><button class="openpr btn btn-xs btn-block btn-info" data-toggle="modal" data-vreqname="<?php echo $valu->pr_reqname;?>" data-project="<?php echo $valu->pr_project;?>" data-vsystem="<?php echo $valu->pr_system; ?>" data-vprno="<?php echo $valu->pr_prno; ?>"
              data-vdelivery="<?php echo $valu->pr_deliplace;?>" data-vdepartcode="<?php echo $valu->department_id; ?>" data-vdepart="<?php echo $valu->department_title; ?>" data-vdelidate="<?php echo $valu->pr_delidate; ?>" data-vremark="<?php echo $valu->pr_remark; ?>" data-projname="<?php echo $valu->project_name; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
 
<script>
  $(".openpr").click(function(){
    // $("#savemaster").prop('disabled', false);
    $('#body').html("");
    $("#memname").val($(this).data('vreqname'));
    $("#putproject").val($(this).data('project'));
    $('#projectnam').val($(this).data('projname'));
    $('#dptnam').val($(this).data('vdepart'));
    $("#putdpt").val($(this).data('vdepartcode'));
    $("#system").val($(this).data('vsystem'));
    if ($(this).data('project')=="") {$("#system").val(1);}
    $("#prno").val($(this).data('vprno'));
    $("#place").val($(this).data('vdelivery'));
    $("#deliverydate").val($(this).data('vdelidate'));
    $("#remark").val($(this).data('vremark'));
   addprrow();
   emodal();
  });
function addprrow()/////// function
  {
   var url="<?php echo base_url(); ?>index.php/po_active/getpr";
  var dataSet={
      prno:  $("#prno").val()
    };
  $.post(url,dataSet,function(data){
  
  var tr = data;
   $('#body').append(tr);
      });
  }
  function emodal()/////////function
  {
   var url="<?php echo base_url(); ?>index.php/po_active/modal";
  var dataSet={
      prno:  $("#prno").val()
    };
  $.post(url,dataSet,function(data){
  
  var modal = data;
   $('#emodal').html(modal);
      });
  }

  </script>
   

<div id="emodal"></div>


 </script>
<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="projpaginate" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>รหัสโครงการ</th>
          <th>ชื่อโครงการ</th>
          <th>ที่อยู่โครงการ</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getproj as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
         <td><?php echo $valj->project_code; ?></td>
          <td><?php echo $valj->project_name; ?></td>
          <td><?php echo $valj->project_address; ?></td>
            <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid="<?php echo $valj->project_id;?>" data-projname="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
  <script>
    $(".openproj").click(function(){
      $("#putproject").val($(this).data('projid'));
      $('#projectnam').val($(this).data('projname'));
      $("#putdpt").val("");
      $('#dptnam').val("");
    });
  </script>
  <!-- modal เลือกแผนก -->
 <div class="modal fade" id="opendpt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>รหัสแผนก</th>
          <th>ชื่อแผนก</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getdep as $valj){ ?>
        <tr>
         <td><?php echo $valj->department_code; ?></td>
          <td><?php echo $valj->department_title; ?></td>
            <td><button class="opendp btn btn-xs btn-block btn-info" data-toggle="modal"  data-depid="<?php echo $valj->department_id;?>" data-depname="<?php echo $valj->department_title;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
  <script>
    $(".opendp").click(function(){
      $("#putdpt").val($(this).data('depid'));
      $('#dptnam').val($(this).data('depname'));
      $("#putproject").val("");
      $('#projectnam').val("");
    });
  </script>
 <!--  MOdal po detail -->
<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-xs-6">
                <label for="">รายการซื้อ</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                            </span>
                              <input type="text" id="newmatname"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                              <input type="hidden" id="newmatcode"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                            </div>
              </div>
              <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                                <input type="text" id="costnameint" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                <input type="hidden" id="codecostcodeint" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                              </div>
                            </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="qty">ปริมาณ</label>
                          <input type="text" id="pqtycre" name="qty"  placeholder="กรอกปริมาณ" class="form-control">
                </div>
              </div>
              <div class="col-xs-6">
                                <div class="input-group">
                                  <label for="unit">หน่วย</label>
                                  <input type="text" id="punit" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                              </div>
                            </div>
          </div>
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="price_unit">ราคา/หน่วย</label>
                          <input type="text" id="pprice_unitcre"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                          <label for="amount">จำนวนเงิน</label>
                          <input type="text" id="pamountcre" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control">
                </div>
              </div>
          </div>
           <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                     <label for="endtproject">ส่วนลด 1 (%)</label>
                     <input type='text' id="pdiscper1cre" name="discountper1" placeholder="กรอกส่วนลด" class="form-control"  />
                  </div>
                </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <label for="endtproject">ส่วนลด 2 (%)</label>
                         <input type='text' id="pdiscper2cre" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" />
                      </div>
                    </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                   <label for="endtproject">ส่วนลดพิเศษ</label>
                   <input type='text' id="pdiscexcre" name="discountper2" class="form-control" />
                  </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                     <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                     <input type='text' id="pdisamtcre" name="disamt" class="form-control" />
                    </div>
              </div>
              <div class="col-md-2">
          <div class="form-group">
              <button id="chkpricecre" class="btn btn-primary"style="margin-top:25px;">ดูราคา</button>
          </div>
        </div>
            </div>
            <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">จำนวนเงินสุทธิ</label>

                     <input type='text'id="pnetamtcre" name="netamt" class="form-control" />
                   </div>
                  </div>
            </div>
          <div class="row">
            <div class="col-md-12">
                  <div class="form-group">
                     <label for="endtproject">หมายเหตุ</label>

                     <input type='text' id="premark" name="remark" class="form-control" />
                  </div>
            </div>
          </div>

           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" name="poid" value="">
                    <button type="submit" id="insertpodetailcre" data-dismiss="modal"  class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
                    <button class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
              </div>
          </div>
      </div><!-- panal body -->
    </div>
  </div>
</div>  <!-- end modal PO Detail -->
<div class="modal fade" id="opnewmat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="tablemat" class="table table-hover" >
      <thead>
        <tr>
          <th>รหัสวัสดุ</th>
          <th>ชื่อวัสดุ</th>
          <th>ขนาด</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php
           foreach ($allmaterial as $vali){ ?>
        <tr>
         <td><?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?></td>
          <td><?php echo $vali->matgroup_name; ?></td>
          <td><?php echo $vali->matsubgroup_name; ?></td>
          <td><?php echo $vali->matname; ?></td>
            <td><button class="opennmat btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?>"  data-nmatgroupname="<?php echo $vali->matgroup_name; ?><?php echo $vali->matsubgroup_name; ?>" data-munit="<?php echo $vali->matname; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div> <!-- matcode-->
  </div>
<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="tabcost1" class="col-xs-12">
                    <h4>รายการประเภทต้นทุน 1</h4>
                    <select multiple class="form-control" id="cost1" style="height:150px;">
                    </select>
                </div>
                <div id="tabcost2" class="col-xs-6">

                     <h4>รายการประเภทต้นทุน 2</h4>
                     <select multiple class="form-control" id="cost2" style="height:150px;">

</select>

                </div>
                <div id="tabcost3" class="col-xs-6">
                     <h4>รายการประเภทต้นทุน 3</h4>
                    <select multiple class="form-control" id="cost3" style="height:150px;">
                        </select>
                                   </div>
                 <div id="tabcost4" class="col-xs-6">
                   <h4>รายการประเภทต้นทุน 4</h4>
                    <select multiple class="form-control" id="cost4" style="height:150px;">

</select>

                 </div>


                <div id="cost-control" class="col-xs-12">
                    <hr>

                        <div class="row" style="margin-top:10px;">
                            <div class="col-xs-12">
                        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup">สร้าง CostCode</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->
<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
      </div>
        <div class="panel-body">
            <div class="row">
                <table id="dataunit" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getunit as $valj){ ?>
        <tr>
         <td><?php echo $n;?></td>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openun btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>


          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
 <?php  for ($i=1; $i <=30; $i++) { ?>
<div class="modal fade" id="opnewmated<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header" style="background:#00008b; color:#fff;">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เลือก</h4>
               </div>
                 <div class="modal-body">
                 <div class="row">
                   <div class="form-group">
                     <button class="btn btn-primary btn-xs" id="matrefresh"><i class="fa fa-refresh"></i> Refresh</button>
                   </div>
                 </div>
                     <div class="row" id="mattable<?php echo $i;?>">
                         <table id="tamat<?php echo $i;?>" class="table table-hover" >
               <thead>
                 <tr>
                   <th>รหัสวัสดุ</th>
                   <th>ชื่อวัสดุ</th>
                   <th>ขนาด</th>
                   <th>หน่วย</th>
                   <th width="5%">จัดการ</th>
                 </tr>
               </thead>
               <tbody>
                    <?php foreach ($allmaterial as $vali){?>
                 <tr>
                  <td><?php echo $vali->mattype_code;?><?php echo $vali->matgroup_code;?><?php echo $vali->matsubgroup_code;?></td>
                   <td><?php echo $vali->matgroup_name;?></td>
                   <td><?php echo $vali->matsubgroup_name;?></td>
                   <td><?php echo $vali->matname;?></td>
                     <td><button class="opennmat<?php echo $i;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode<?php echo $i;?>="<?php echo $vali->mattype_code;?><?php echo $vali->matgroup_code;?><?php echo $vali->matsubgroup_code;?>"  data-nmatgroupname<?php echo $i;?>="<?php echo $vali->matgroup_name;?><?php echo $vali->matsubgroup_name;?>" data-munit<?php echo $i;?>="<?php echo $vali->matname;?>" data-dismiss="modal">เลือก</button></td>
                 </tr> 
                 <?php } ?>
               </tbody>
             </table>
                     </div>
                 </div>
             </div>
           </div> 
           </div>
         <div class="modal fade" id="costcodeed<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header" style="background:#00008b; color:#fff;">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
               </div>
                 <div class="modal-body">
                     <div class="row">
                         <div id="tabcost1<?php echo $i;?>" class="col-xs-12">
                             <h4>รายการประเภทต้นทุน 1</h4>
                             <select multiple class="form-control" id="cost1<?php echo $i;?>" style="height:150px;">
                             </select>
                         </div>
                         <div id="tabcost2<?php echo $i;?>" class="col-xs-6">

                              <h4>รายการประเภทต้นทุน 2</h4>
                              <select multiple class="form-control" id="cost2<?php echo $i;?>" style="height:150px;">

         </select>

                         </div>
                         <div id="tabcost<?php echo $i;?>3" class="col-xs-6">
                              <h4>รายการประเภทต้นทุน 3</h4>
                             <select multiple class="form-control" id="cost3<?php echo $i;?>" style="height:150px;">
                                 </select>
                                            </div>
                          <div id="tabcost4<?php echo $i;?>" class="col-xs-6">
                            <h4>รายการประเภทต้นทุน 4</h4>
                             <select multiple class="form-control" id="cost4<?php echo $i;?>" style="height:150px;">

         </select>

                          </div>


                         <div id="cost-control<?php echo $i;?>" class="col-xs-12">
                             <hr>

                                 <div class="row" style="margin-top:10px;">
                                     <div class="col-xs-12">
                                 <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup<?php echo $i;?>">สร้าง CostCode</button>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
           </div>
         </div>
<div class="modal fade" id="newmatmas<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header" style="background:#00008b; color:#fff;">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">เพิ่ม</h4>
               </div>
                 <div class="modal-body">
                     <div class="row">
                         <div id="loadbox<?php echo $i;?>"></div>
                     </div>
                 </div>
             </div>
           </div> 
           </div>
<script>
  // $(document).ready(function() {

    $('#tamat<?php echo $i;?>').DataTable();
   //  $("#matrefresh").click(function(event) {
   //  $("#mattable<?php echo $i;?>").html("<img  src='<?php echo base_url(); ?>dist/img/loading.gif'>");
   //  $("#mattable<?php echo $i;?>").load('<?php echo base_url(); ?>index.php/purchase/getmaterial');
   // });
     
// } );
  $(".opennmat<?php echo $i;?>").click(function(event) {
    $("#newmatname<?php echo $i;?>").val($(this).data('nmatgroupname<?php echo $i;?>'));
    $("#newmatcode<?php echo $i;?>").val($(this).data('mmatcode<?php echo $i;?>'));
    $("#punit<?php echo $i;?>").val($(this).data('munit<?php echo $i;?>'));
    $("#error<?php echo $i;?>").attr("class", "input-group has-success has-feedback");
    $("#openunn<?php echo $i;?>").attr("class", "btn btn-success btn-sm");
    $("#openunc<?php echo $i;?>").attr("class", "btn btn-success btn-sm");
    $(".chnew<?php echo $i; ?>").attr('class', 'btn btn-success btn-sm');
  });


</script>
<script>
  // $(document).ready(function() {
    $("#codeup<?php echo $i;?>").click(function(){});
     $("#gencodebtn<?php echo $i;?>").hide();
     $("#type2<?php echo $i;?>").hide();
     $("#type3<?php echo $i;?>").hide();
     $("#type4<?php echo $i;?>").hide();
     $("#type5<?php echo $i;?>").hide();
     $('#cost-control<?php echo $i;?>').hide();
     $("#cost4<?php echo $i;?>").hide();
     $("#box6<?php echo $i;?>").hide();


     $('#gencode<?php echo $i;?>').on('hidden.bs.modal', function () {
     $("#type1<?php echo $i;?>").show();
     $("#type2<?php echo $i;?>").hide();
     $("#type3<?php echo $i;?>").hide();
     $("#type4<?php echo $i;?>").hide();
     $("#type5<?php echo $i;?>").hide();

     $("#gencodebtn<?php echo $i;?>").hide();


     });

    $('#cost1<?php echo $i;?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1<?php echo $i;?>" ).change(function() {

         var c1 = $('#cost1<?php echo $i;?>').val();
         $('#cost2<?php echo $i;?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2<?php echo $i;?>").show();
         $("#tabcost4<?php echo $i;?>").hide();
    });
    $( "#cost2<?php echo $i;?>" ).change(function() {

         var c2 = $('#cost2<?php echo $i;?>').val();
         $('#cost3<?php echo $i;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4<?php echo $i;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    });
    $( "#cost3<?php echo $i;?>").change(function() {
         $("#tabcost2<?php echo $i;?>").hide();
         $("#tabcost4<?php echo $i;?>").show();
         $("#cost4<?php echo $i;?>").show();

    });
    $( "#cost4<?php echo $i;?>" ).change(function() {
         $("#cost-control<?php echo $i;?>").show();
    });
     $("#btncostup<?php echo $i;?>").click(function(){
       var c1 = $('#cost1<?php echo $i;?>').val();
     var c2 = $('#cost2<?php echo $i;?>').val();
     var c3 = $('#cost3<?php echo $i;?>').val();
     var c4 = $('#cost4<?php echo $i;?>').val();

     var gcostcode = c4 ;
     var codecostcode = c1+''+c2+''+c3;
     $('#codecostcodeint<?php echo $i;?>').val(codecostcode);
     $('#costnameint<?php echo $i;?>').val(gcostcode);
     $('#gcostcode<?php echo $i;?>').html(gcostcode);
     $('#costcode<?php echo $i;?>').modal('hide');
     $("#tabcost4<?php echo $i;?>").hide();

    });


  // });
</script>
<?php  } ?>


 <script>
//   $(document).ready(function() {

// $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
// $("#loaddata").load('<?php echo base_url(); ?>index.php/purchase/pov');
// });
    $(".openun").click(function(){
      $("#punit").val($(this).data('vunit'));
    });
  </script>

  <script>
    $(".openmem").click(function(){
      $("#memname").val($(this).data('mname'));
      $("#memid").val($(this).data('mid'));
    });
  </script>

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#tablemat').DataTable();
    $('#dataunit').DataTable();
    $("#tablevender").DataTable();
    $('#tamat').DataTable();
    $("#datasource").DataTable();
    $("#tableme").DataTable();
// } );
</script>
<script>
  $('#chk').click(function(event) {
  if($('#chk').prop('checked')) {
   $('#newmatname').prop('disabled', false);
} else {
    $('#newmatname').prop('disabled', true);
}
});
</script>
<script>
// $(document).ready(function() {
   $("#pdiscper1cre").val('0');
    $("#pdiscper2cre").val('0');
    $("#pdiscexcre").val('0');
   $("#newmatname").prop('disabled',true);
// });
  $(".opennmat").click(function(event) {
    $("#newmatname").val($(this).data('nmatgroupname'));
    $("#newmatcode").val($(this).data('mmatcode'));
    $("#punit").val($(this).data('munit'));
  });

        $("#href").prop("href", "<?php echo base_url(); ?>index.php/datastore/matcode");

</script>
<script>
  $("#insertpodetailcre").click(function(event) {
    addrow();
    $('#pqtycre').val('');
    $("#newmatname").val('');
    $("#newmatcode").val('');
    $("#punit").val('');
    $("#pprice_unitcre").val('');
    $("#pdisamtcre").val('');
    $("#codecostcodeint").val('');
    $("#costnameint").val('');
    $("#pamountcre").val('');
    $("#pdiscper1cre").val('0');
    $("#pdiscper2cre").val('0');
    $("#pdiscexcre").val('0');
    $("#pnetamtcre").val('');
    $("#premark").val('');
  });
  function addrow()
  {
    var row = ($('#body tr').length-0)+1;
    var qty = $('#pqtycre').val();
    var matname = $("#newmatname").val();
    var matcode = $("#newmatcode").val();
    var unit = $("#punit").val();
    var unitprice = $("#pprice_unitcre").val();
    var totamount = $('#pamountcre').val();
    var pono = $("#pono").val();
    var costcode = $("#codecostcodeint").val();
    var costname =  $("#costnameint").val();
    var discountper1 = $("#pdiscper1cre").val();
    var discountper2 = $("#pdiscper2cre").val();
    var disamt = $("#pdiscexcre").val();
    var remark = $("#premark").val();
    var netamt = $("#pnetamtcre").val();
     var vat = "7";
    var tr = '<tr >' +
          '<th><p>'+row+'</p></th>' +
          '<td><p>'+costname+'</p><input type="hidden" readonly="true" class="form-control input-sm" name="costname[]" value="'+costname+'"></td>' +
          '<td><p>'+matname+'</p><input type="hidden" readonly="true" class="form-control input-sm" name="matname[]" value="'+matname+'"></td>' +
          '<td><p>'+qty+'</p><input type="hidden" readonly="true" class="form-control input-sm" name="qty[]" value="'+qty+'"></td>' +
          '<td><p>'+unit+'</p><input type="hidden" readonly="true" class="form-control input-sm" name="unit[]" value="'+unit+'"></td>' +
          '<td><p>'+unitprice+'</p><input type="hidden" readonly="true" class="form-control input-sm" name="priceunit[]" value="'+unitprice+'"></td>' +
          '<td><p>'+totamount+'</p><input type="hidden" readonly="true" class="form-control input-sm" name="amount[]" value="'+totamount+'"></td>' +
          '<td><a class="edit btn btn-info btn-xs btn-block"> แก้ไข</a></td>'+
          '<td><a class="delete  btn btn-danger btn-xs btn-block"> ลบ</a>'+
          '<input type="hidden" name="costcode[]" value="'+costcode+'" />'+
          '<input type="hidden" name="matcode[]" value="'+matcode+'" />'+
          '<input type="hidden" name="discountper1[]" value="'+discountper1+'" />'+
          '<input type="hidden" name="discountper2[]" value="'+discountper2+'" />'+
          '<input type="hidden" name="disamt[]" value="'+disamt+'" />'+
          '<input type="hidden" name="vat[]" value="'+vat+'" />'+
          '<input type="hidden" name="remark[]" value="'+remark+'" />'+
          '<input type="hidden" name="netamt[]" value="'+netamt+'" /></td>'+
          '</tr>';
      $('#body').append(tr);

  }

  $(document).on('click', 'a.delete', function () { // <-- changes
    var r = confirm("คุณแน่ใจหรือว่าจะลบ?");
if (r == true) {
    $(this).closest('tr').remove();
      return false;
}
     
  });
</script>

<script>
  // $(document).ready(function() {
    $("#codeup").click(function(){});
     $("#gencodebtn").hide();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();
     $('#cost-control').hide();
     $("#cost4").hide();
     $("#box6").hide();


     $('#gencode').on('hidden.bs.modal', function () {
     $("#type1").show();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();

     $("#gencodebtn").hide();


     });


     $('#box1').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1" ).change(function() {
           var b1 = $('#box1').val();
           $('#box2').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2").show();
          $('#vgencode').html('');

    });
    $( "#box2" ).change(function() {
         $("#type1").hide();
         var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         $('#box3').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3").show();
    });
    $( "#box3" ).change(function() {
        var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         var b3 = $('#box3').val();
         $('#box4').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4").show();
         $("#type2").hide();
    });
    $( "#box4" ).change(function() {
         //$("#type4").hide();
         $('#type3').hide();
         $("#gencodebtn").show();
         //$("#type5").show();

    });
    $("#box5").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode').click(function(){
     var b1 = $('#box1').val();
     var b2 = $('#box2').val();
     var b3 = $('#box3').val();
     var b4 = $('#box4').val();
     var b5 = $('#box5').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){
              
              $('#matname').val(data);
              $('#vgencode').html(data);
            });

    });


    $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1" ).change(function() {

         var c1 = $('#cost1').val();
         $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2").show();
         $("#tabcost4").hide();
    });
    $( "#cost2" ).change(function() {

         var c2 = $('#cost2').val();
         $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    });
    $( "#cost3").change(function() {
         $("#tabcost2").hide();
         $("#tabcost4").show();
         $("#cost4").show();

    });
    $( "#cost4" ).change(function() {
         $("#cost-control").show();
    });
     $("#btncostup").click(function(){
       var c1 = $('#cost1').val();
     var c2 = $('#cost2').val();
     var c3 = $('#cost3').val();
     var c4 = $('#cost4').val();

     var gcostcode = c4 ;
     var codecostcode = c1+''+c2+''+c3;
     $('#codecostcodeint').val(codecostcode);
     $('#costnameint').val(gcostcode);
     $('#gcostcode').html(gcostcode);
     $('#costcode').modal('hide');
     $("#tabcost4").hide();

    });


  // });
</script>

<script>
   $('#chkpricecre').click(function(){
    var xqty = $('#pqtycre').val();
    var xprice = $('#pprice_unitcre').val();
    var xamount = xqty*xprice;
    var xdiscper1 = $('#pdiscper1cre').val();
    var xdiscper2 = $('#pdiscper2cre').val();
    var xdiscper3 = $('#pdiscexcre').val();
    var xpd1 = xamount - (xamount*xdiscper1)/100;
    var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
    var xpd3 = xpd2 - (xpd1*xdiscper3)/100;
    var xvat = $('#pvatcre').val();
    
    $('#pamountcre').val(xamount);
    if(xdiscper3 != ''){
        // $('#pdisamtcre').val(xpd3);
        // vxpd3 = xpd3 - (xpd3*xvat)/100;
        // $('#pnetamtcre').val(vxpd3)
        exdiss = xpd2 - xdiscper3;
        $('#pnetamtcre').val(exdiss);
        $('#pdisamtcre').val(exdiss);
      }
    else if(xdiscper2 != ''){
      
             $('#pdisamtcre').val(xpd2);
             vxpd2 = xpd2 - (xpd2*xvat)/100;
             $('#pnetamtcre').val(vxpd2)
    }
    else
    {
    $('#pdisamtcre').val(xpd1);
        vxpd1 = xpd1 - (xpd1*xvat)/100;
        $('#pnetamtcre').val(vxpd1)
    }
    
    
  });
</script>
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
 <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>dist/css/toastr.css" rel="stylesheet">
<script src="<?php echo base_url();?>dist/js/toastr.js"></script>
<script>
  //  $(document).ready(function() {
            $("#podate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });

        // });
   // $("#savemaster").click(function(event) {
   //  toastr.info('please wait..');
   //  $("#savemaster").html('<i class="fa fa-spinner fa-pulse"></i> Loading...');
    

   //  toastr.success('Save Completed');
   // });
function success(){
  toastr.success('Save Completed');
}
   $("#savemaster").on("click",function() {
     setTimeout( success, 2000);
     $(this).html('<i class="fa fa-spinner fa-pulse"></i> Loading...');

      //$(".btn").prop("disabled", true);
      });
</script>
</div>
<!-- end page -->


<!-- tail menu -->
  </div>
        
    </div><!--end row-->
</div>

<script>

    $('#createpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/po');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"createpo"};$.post(url,dataSet,function(data){});
    });
    $('#pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/newpr');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"pr"};$.post(url,dataSet,function(data){});
    });
    $('#allpr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/receice_allpr');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"allpr"};$.post(url,dataSet,function(data){});
    });
    $('#allpettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/pettycash/service_allpettycash');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"allpettycash"};$.post(url,dataSet,function(data){});
    });
    $('#approve_pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/service_approve_pr');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"approve_pr"};$.post(url,dataSet,function(data){});
    });
    $('#loi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/order/newloi');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"loi"};$.post(url,dataSet,function(data){});
    });
    $('#allpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"allpo"};$.post(url,dataSet,function(data){});
    });
    $('#approvepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/service_approve_po');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"approvepo"};$.post(url,dataSet,function(data){});
    });
    $('#allloi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/order/receive_loi');
      $("#title").hide();
    });
    $('#prettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/newprettycash');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"pettycash"};$.post(url,dataSet,function(data){});
    });
    $('#stock').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/stock');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"stock"};$.post(url,dataSet,function(data){});
    });
    $('#allcpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po');
      $("#title").hide();
    });
    $('#receivepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/main_projpo_receive_h');
      $("#title").hide();
    });
    $('#receiveic').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/service_ic_receive_h');
      $("#title").hide();
    });
    $("#receiveall").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/loadinventory');
      $("#title").hide();
    });

    $("#reportall").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/report_issueall');
      $("#title").hide();
    });
    $("#issue").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/docissue');
      $("#title").hide();
    });
    $("#allissue").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/show_all_docissue');
      $("#title").hide();
    });
    $("#apinv").click(function(event) {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/main_pv');
      $("#title").hide();
    });
    $("#apapprovinv").click(function(event) {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapv');
      $("#title").hide();
    });
    $('#apinvreal').click(function(event) {
     $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
     $('#loaddata').load('<?php echo base_url(); ?>index.php/newapo/newpv');
      $("#title").hide();
    });
    $("#approve_pettycash").click(function(event) {
       $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
       $('#loaddata').load('<?php echo base_url(); ?>index.php/pettycash/view_appr_pettycash');
       $("#title").hide();
    });
     $("#ponew").click(function(event) {
       $('#loaddata').html("<img  style='margin-top:100px; margin-left:300px;' src='<?php echo base_url();?>dist/img/360.gif'>");
     
       $("#title").hide();
    });

</script>

 
<!-- kendo end-- >
