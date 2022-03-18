<?php foreach ($all as $e) {
  $poeno = $e->po_pono;
  $popro = $e->po_project;
  $system = $e->po_system;
  $prno = $e->po_prno;
  $pject = $e->project_name;
  $podate = $e->po_podate;
  $podate = $e->po_podate;
  $depart = $e->po_department;
  $departm = $e->department_title;
  $poprname = $e->po_prname;
  $vender = $e->po_vender;
  $trem = $e->po_trem;
  $contact = $e->po_contact;
  $qno = $e->po_quono;
  $delidate = $e->po_deliverydate;
  $place = $e->po_place;
  $remark = $e->po_remark;
} ?>

<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> แก้ไขใบสั่งซื้อสินค้า</div>
    <div class="panel-body">

     <div class="row">
       <!--  <div class="col-xs-6">
            <div class="form-group">
              <a><button disabled class="btn btn-primary btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบขอซื้อ</button></a>
            </div>
        </div>-->
         <div class="col-md-3">
                    <div class="from-group">
                      <label for="">เลขทีใบสั่งซื้อ</label>
                      <input type="text" name="pono" id="pono" value="<?php echo $poeno; ?>" class="ppono form-control input-sm" readonly="true">
                    </div>
                  </div>
      </div>
      <div class="row" id="gproject">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">โครงการ</label>
                <input type="text" readonly="true"  class="form-control input-sm input-sm" id="projectnam" value="<?php echo $pject; ?>">
                <input type="hidden" readonly="true"  class="form-control input-sm input-sm" name="project" id="putproject" value="<?php echo $popro; ?>">
                <span class="input-group-btn">
                  <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="code">ระบบ</label>
              <select class="form-control input-sm" name="system" id="system" value="<?php echo $syst; ?>">
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
              <input type="text" name="podate" required="" class="form-control input-sm" id="podate" value="<?php echo $podate; ?>">
            </div>
        </div>
      </div>
      <div class="row" id="gdepartment">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">แผนก</label>
                <input type="text" readonly="true"  class="form-control input-sm input-sm" id="dptnam" value="<?php echo $departm ?>">
                <input type="hidden" readonly="true"  class="form-control input-sm input-sm" name="department" id="putdpt" value="<?php echo $depart ?>">
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
            <input type="text" name="memname" id="memname" readonly="true" placeholder="จ่ายให้กับ" class="form-control input-sm" value="<?php echo $poprname; ?>">
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
            <input type="text" class="form-control input-sm" readonly="true" placeholder="กรอกชื่อร้านค้า" name="vender" id="vender1" value="<?php echo $vender ?>">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#open" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        <div class="col-xs-3" >
          <div class="form-group">
            <label for="team">เงื่อนไขชำระ</label>
            <input type="text" name="team" placeholder="กรอกเงื่อนไขการชำระ" id="team" class="form-control input-sm" value="<?php echo $trem ?>">
          </div>
        </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="contact">เบอร์ติดต่อ</label>
              <input type="text" name="contact" placeholder="กรอกเบอร์โทรศํพท์" id="tel" class="form-control input-sm" value="<?php echo $contact ?>">
            </div>
          </div>
      </div> <!-- end row -->
      <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
            <label for="prno">ใบขอซื้อ</label>
				    <input type="text" name="prno" id="prno" placeholder="กรอกเลขที่ใบขอซื้อ" class="form-control input-sm" value="<?php echo $prno; ?>">
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
            <input type="text" name="quono" id="quono" placeholder="กรอกเลขที่เสนอราคา" class="form-control input-sm" value="<?php echo $qno ?>">
          </div>
        </div>
        <div class="col-xs-3" style="margin-top: 2px;">
          <div class="form-group">
            <label for="deliverydate">วันที่ส่งมอบ</label>
            <input type="text" name="deliverydate" class="form-control input-sm" id="deliverydate" value="<?php echo $delidate ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="place">สถานที่ส่งของ</label>
            <textarea type="text" rows="4" cols="50" name="place" id="place" placeholder="กรอกสถานที่ส่งของ" class="form-control input-sm"> <?php echo $place; ?></textarea>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="place">หมายเหตุ</label>
            <textarea type="text" rows="4" cols="50" name="remark" id="remark" placeholder="กรอกหมายเหตุ" class="form-control input-sm"><?php echo $remark ?></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary" id="savemaster" name="update">บันทึก</button>
          <button class="btn_insert btn btn-primary" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span> เพิมรายการ</button>
          <a href="<?php echo base_url(); ?>index.php/report/report_po/<?php echo $poeno; ?>" target="_blank"><button class="btn btn-success">พิมพ์</button></a>
        </div>
      </div>

    </div>
 </div>
 <div id="loaddetail">

 </div>

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
              <!-- <div class="col-md-6">
                <div class="form-group">
                    <label for="costname">รายการต้นทุน</label><br>
                    <a data-toggle="modal"  data-target="#costcode" id="gcostcode" class="btn  btn-primary">CostCode : xxxxx</a>
                    <input type="hidden" id="codecostcode" name="costcode"  placeholder="กรอกรายการต้นทุน" readonly="true" class="form-control">
                    <input type="hidden" id="costname" name="costname"  placeholder="กรอกรายการต้นทุน" readonly="true" class="form-control">

                </div>
              </div> -->
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
                                  <input type="text" id="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">
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
                   <input type='text' id="pdiscexcre" name="discountper2"class="form-control" />
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
               <!--  <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">VAT</label>
                      <select class="form-control" id="ccvatcre" name="cvat">
                                  <option value="1">Include VAT</option>
                                  <option value="2">Exclude VAT</option>
                                  <option value="3">Not VAT</option>
                      </select>
                  </div>
                </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">VAT</label>
                     <input type='text' id="pvatcre" name="vat" class="form-control" />
                   </div>
                </div> -->
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

 <!-- modal เลือกผู้ขอซื้อ -->
  <div class="modal fade" id="openme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                 <table id="vendee" class="table table-bordered table-striped table-hover" >
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
                <table id="datasource11" class="table table-striped" >
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
              data-vdelivery="<?php echo $valu->pr_deliplace;?>" data-vdepartcode="<?php echo $valu->department_code; ?>" data-vdepart="<?php echo $valu->department_title; ?>" data-vdelidate="<?php echo $valu->pr_delidate; ?>" data-vremark="<?php echo $valu->pr_remark; ?>" data-projname="<?php echo $valu->project_name; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

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
  </div>
</div> <!--end modal -->

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
<script>
    $(".openun").click(function(){
      $("#punit").val($(this).data('vunit'));
    });
  </script>

<script>
$('#loaddetai').click(function(){
  $('#loaddetail').load('<?php echo base_url(); ?>office/po_detail');
});



</script>


<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
 <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<script>
  //  $(document).ready(function() {
    $("#loaddetail").load('<?php echo base_url(); ?>index.php/office/editpod/'+$("#pono").val());
  //  });
</script>
<script>
        // $(document).ready(function() {
           $("#pdiscexcre").val('0');
            $("#podate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
            $("#deliverydate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
        // });
</script>


<script>
  $(".openstore").click(function() {
     $("#vender1").val($(this).data('vname'));
     $("#team").val($(this).data('crteam'));
     $("#tel").val($(this).data('vtel'));
     $('#open').modal('hide');
  });
  </script>
  <script>
  $(".openpr").click(function(){
    $("#memname").val($(this).data('vreqname'));
    $("#putproject").val($(this).data('project'));
    $('#projectnam').val($(this).data('projname'));
    $('#dptnam').val($(this).data('vdepart'));
    $("#putdpt").val($(this).data('vdepartcode'));
    $("#system").val($(this).data('vsystem'));
    $("#prno").val($(this).data('vprno'));
    $("#place").val($(this).data('vdelivery'));
    $("#deliverydate").val($(this).data('vdelidate'));
    $("#remark").val($(this).data('vremark'));
    var pr = $(this).data('vprno');
    $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail'+'/'+pr);

  });
  </script>
  <script>
    $(".openproj").click(function(){
      $("#putproject").val($(this).data('projid'));
      $('#projectnam').val($(this).data('projname'));
      $("#putdpt").val("");
      $('#dptnam').val("");
    });
  </script>
  <script>
    $(".opendp").click(function(){
      $("#putdpt").val($(this).data('depid'));
      $('#dptnam').val($(this).data('depname'));
      $("#putproject").val("");
      $('#projectnam').val("");
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
    $('#datasource11').DataTable();
    $('#projpaginate').DataTable();
    $("#tablemat").DataTable();
    $("#vendee").DataTable();
// } );
</script>


<script>
$('#savemaster').click(function(){
  var url="<?php echo base_url(); ?>index.php/office/updatepo";
  var dataSet={
                pono : $('.ppono').val(),
                project : $('#putproject').val(),
                system : $('#system').val(),
                podate : $('#podate').val(),
                department : $('#putdpt').val(),
                memname : $('#memname').val(),
                vender : $('#vender1').val(),
                team : $('#team').val(),
                contact : $('#tel').val(),
                prno : $('#prno').val(),
                contactno : $('#contactno').val(),
                quono : $('#quono').val(),
                deliverydate : $('#deliverydate').val(),
                place : $('#place').val(),
                remark : $('#remark').val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////
  alert("แก้ไขเรียบร้อย");
  $('.ppono').val(data);
      });
   $('.btnedit').prop('disabled', false);
   $('#savemaster').prop('disabled', false);
////////////////////////////////
  });

</script>

  <script>
  $('.print').click(function(){
   var pp = $('.ppono').val();
     url = "<?php echo base_url(); ?>index.php/report/report_po"+"/"+pp;
      $(location).attr("href", url);
  });
</script>
<script>
  $('#insertpodetailcre').click(function(){
  var url="<?php echo base_url(); ?>index.php/po_active/editinspodetail";
  var dataSet={
      ponoi: $('.ppono').val(),
      matcodeb6: $('#newmatcode').val(),
      matname: $('#newmatname').val(),
      codecostcode: $('#codecostcodeint').val(),
      costname: $('#costnameint').val(),
      pqty: $('#pqtycre').val(),
      punit: $('#punitcre').val(),
      pprice_unit: $('#pprice_unitcre').val(),
      pamount: $('#pamountcre').val(),
      pdiscper1: $('#pdiscper1cre').val(),
      pdiscper2: $('#pdiscper2cre').val(),
      pdiscex: $('#pdiscexcre').val(),
      pdisamt: $('#pdisamtcre').val(),
      ccvat: $('#ccvatcre').val(),
      pvat: $('#pvatcre').val(),
      pnetamt: $('#pnetamtcre').val(),
      premark: $('#premarkcre').val(),
      prcode:  $('.pocodecre').val(),
      prid:   $('.pridcre').val(),
      prno: $('#prno').val()
    };
  $.post(url,dataSet,function(data){
     alert(data);
     var prno = $('#prno').val();
       
      $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail'+'/'+prno);
    
////////////////////////////////
  });
});
</script>
<script>
  $(".opennmat").click(function(event) {
    $("#newmatname").val($(this).data('nmatgroupname'));
    $("#newmatcode").val($(this).data('mmatcode'));
    $("#unit").val($(this).data('munit'));
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