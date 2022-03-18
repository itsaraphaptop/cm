<div class="panel panel-primary" style="margin-top:10px;" ng-app="app">
  <div class="panel-heading">บันทึกตั้งเจ้าหนี้การค้า</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-4">
      <label for="">ร้านค้า</label>
        <div class="input-group">
          <input type="text" class="form-control input-sm"  placeholder="ร้านค้า" id="vender">
          <span class="input-group-btn">
                   <button class="openvender btn btn-primary btn-sm" data-toggle="modal" data-target="#openvender" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
              </span>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="pono">เลขที่ใบสั่งซื้อ</label>
          <input type="text" class="form-control input-sm"  placeholder="เลขที่ใบสั่งซื้อ"  id="pono" required>
          <input type="hidden" id="user"  value="<?php echo $name; ?>">
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="">เลขที่ใบตั้งเจ้าหนี้</label>
          <input type="text" class="form-control input-sm"  placeholder="เลขที่ใบตั้งเจ้าหนี้" id="apvno">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-4">
        <div class="form-group">
          <label for="">เลขทีใบส่งของ</label>
        <input type="text" class="form-control input-sm"  id="invno" placeholder="เลขทีใบส่งของ">
        </div>
      </div>
      <div class="col-xs-3">
      <label for="">วันที่ส่งมอบ</label>
        <div class="form-group">
          <input type="text" class="form-control"  placeholder="วันที่ส่งมอบ" id="duedate">
        </div>
      </div>
      <div class="col-xs-2">
      <label for="">เงื่อนไขชำระ</label>
        <div class="input-group">
          <input type="text" class="form-control input-sm"  id="cterm" placeholder="เงื่อนไขชำระ">
          <span class="input-group-addon">วัน</span>
        </div>
      </div>
      <div class="col-xs-2">
        <div class="form-group">
        <label for="">วันที่ใบสำคัญจ่าย</label>
          <input type="text" class="form-control" id="apvdate" placeholder="วันที่ใบสำคัญจ่าย">         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-4">
             <label for="project1">โครงการ</label>
       <div class="input-group">
                <input type="text" readonly="true"  class="form-control input-sm" id="projectnam">
                <input type="hidden" readonly="true"  class="form-control input-sm" name="project" id="putproject">
                <span class="input-group-btn">
                  <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
        </div>
        <div class="col-xs-4">
        <div class="form-group">
            <label for="">ระบบ</label>
            <select class="form-control input-sm" name="system" id="system">
                     <?php if($system == 'OVERHEAD'){ ?><option value="OVERHEAD" selected>OVERHEAD</option><?php } else { ?><option value="OVERHEAD">OVERHEAD</option><?php }?>         
                                       <?php if($system == 'AC'){ ?><option value="AC" selected>AC</option><?php } else { ?><option value="AC">AC</option><?php }?>
                                       <?php if($system == 'EE'){ ?><option value="EE" selected>EE</option><?php } else { ?><option value="EE">EE</option><?php }?>
                                       <?php if($system == 'SN'){ ?><option value="SN" selected>SN</option><?php } else { ?><option value="SN">SN</option><?php }?>
                                       <?php if($system == 'CIVIL'){ ?><option value="CIVIL" selected>CIVIL</option><?php } else { ?><option value="CIVIL">CIVIL</option><?php }?>     
                        </select>
          </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="">เลขี่ใบรับของ</label>
          <input type="text" class="form-control input-sm"  placeholder="เลขี่ใบรับของ" id="porecx">
        </div>
      </div>
      </div>
      <div class="row">
      
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="col-xs-4" >
            <div class="input-group">
             <label for="project1">แผนก</label>
                <input type="text" readonly="true"  class="form-control input-sm input-sm" id="dptnam">
                <input type="hidden" readonly="true"  class="form-control input-sm input-sm" name="department" id="putdpt">
                <span class="input-group-btn">
                  <button class="opendp btn btn-primary btn-sm" data-toggle="modal" data-target="#opendpt" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
          </div>
    </div>
    <!-- <div class="row" style="margin-top:10px;">
      <div class="col-xs-4">
      <label for="">จำนวนวเงิน</label>
        <div class="input-group">
          <input type="text" class="form-control input-sm" ng-model="netamt" id="amount" placeholder="จำนวนวเงิน">
          <input type="hidden" class="form-control input-sm" ng-model="tax"  id="tax" value="7" placeholder="ภาษี(%)">
          <span class="input-group-addon">บาท</span>
        </div>
      </div>
      <div class="col-xs-3">
      <label for="">จำนวนรวมภาษี</label>
        <div class="input-group">
          <input type="text" class="form-control input-sm"  id="totamount" placeholder="จำนวนวเงิน">
          <span class="input-group-addon">บาท</span>
        </div>
      </div> -->
      <!--<div class="col-xs-2">
      <label for="">วันที่จ่าย</label>
        <div class="form-group">
          <input type="text" class="form-control"  placeholder="วันที่ส่งมอบ" id="apdate">
        </div>
      </div>-->
    </div>
    <div class="panel-footer">
       <button class="saveh btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
       <button class="btn_insert btn btn-primary" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span> เพิมรายการ</button>
    <button class="edith btn btn-info"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button>
    <button class="print btn btn-warning"><span class="glyphicon glyphicon-print"></span> พิมพ์</button>
    </div>
  </div>
</div>
  <!-- modal เลือกร้านค้า -->
 <div class="modal fade" id="openvender" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="datasource" class="table table-striped" >
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
<div id="loaddetail"></div>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  $(document).ready( function () {
    $(".saveh").prop('disabled', true);
    $(".btn_insert").prop('disabled', true);
    $(".edith").prop('disabled', true);
    $(".print").prop('disabled', true);
    $('#pono').change(function(event) {
    $(".saveh").prop('disabled', false);
    });
} );
</script>
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
     <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<script>
                $('#duedate').kendoDatePicker({
                   format : "yyyy-MM-dd"
                });
                 $('#apdate').kendoDatePicker({
                   format : "yyyy-MM-dd"
                });  
                $('#apvdate').kendoDatePicker({
                   format : "yyyy-MM-dd"
                }); 

</script>

<script>
  $(".openstore").click(function() {
     $("#vender").val($(this).data('vname'));
     $("#cterm").val($(this).data('crteam'));
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


  <script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();
    $("#dataunit").DataTable();
    $("#tablemat").DataTable();
    
// } );
</script>
<script>
  $('.saveh').click(function(event) {
    var url="<?php echo base_url(); ?>index.php/acc_active/apv_h_new";
    var dataset={
      vender: $("#vender").val(),
      pono: $("#pono").val(),
      apvno: $("#apvno").val(),
      invno: $("#invno").val(),
      duedate: $("#duedate").val(),
      cterm: $("#cterm").val(),
      apvdate: $("#apvdate").val(),
      putproject: $("#putproject").val(),
      system: $("#system").val(),
      porecx: $("#porecx").val(),
      putdpt: $("#putdpt").val(),
      user: $("#user").val()
    };
    $.post(url,dataset,function(data){
     alert(data);
     $('#apvno').val(data);
     $('.saveh').prop('disabled', true);
     $('#loaddetail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
     $("#loaddetail").load('<?php echo base_url(); ?>index.php/newapo/pv_detail'+'/'+data);
     $(".btn_insert").prop('disabled', false);
     $(".edith").prop('disabled', false);
      $(".print").prop('disabled', false);
    
////////////////////////////////
    });
  });
</script>
<script>
  $('#insertpodetailcre').click(function(){
  var url="<?php echo base_url(); ?>index.php/acc_active/insapvdetail";
  var dataSet={
      apvno: $('#apvno').val(),
      matcodeb6: $('#newmatcode').val(),
      matname: $('#newmatname').val(),
      codecostcode: $('#codecostcodeint').val(),
      costname: $('#costnameint').val(),
      pqty: $('#pqtycre').val(),
      punit: $('#punit').val(),
      pprice_unit: $('#pprice_unitcre').val(),
      pamountcre: $('#pamountcre').val(),
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
     var apvno = $('#apvno').val();
     $('#loaddetail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $("#loaddetail").load('<?php echo base_url(); ?>index.php/newapo/pv_detail'+'/'+apvno);
    (".btn_insert").prop('disabled', false);
     $(".edith").prop('disabled', false);
      $(".print").prop('disabled', false);
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
 <script>
  $('.print').click(function(){
   var pp = $('#apvno').val();
   var po = $("#pono").val();
     url = "<?php echo base_url(); ?>index.php/report/newapv_report"+"/"+pp+"/"+po;
      $(location).attr("href", url);
  });
</script>


