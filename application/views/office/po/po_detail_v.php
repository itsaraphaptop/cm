<?php foreach ($res as $val) {
  $pono = $val->po_pono;
  $project = $val->po_project;
  $projectname = $val->project_name;
  $department = $val->po_department;
  $dpt_name = $val->department_title;
  $system = $val->po_system;
  $podate = $val->po_podate;
  $prname = $val->po_prname;
  $vender = $val->po_vender;
  $term = $val->po_trem;
  $contact = $val->po_contact;
  $poprno = $val->po_prno;
  $contactno = $val->po_contactno;
  $quono = $val->po_quono;
  $deliverydate = $val->po_deliverydate;
  $place = $val->po_place;
  $remark = $val->po_remark;
} ?>

<div class="container">
    <style>
        #allcpo,#head,#create,#enable,#disable,#createpo,#pr,#loi,#allpo,#allloi,#approvepo,#prettycash,#allpr,#receive,#receivepo,#receiveall,#callpettycash,#callpr,#allreceive,#stock{cursor: pointer;}
        #allcpo:hover,#head:hover,#create:hover,#enable:hover,#disable:hover,#receive:hover,#callpettycash:hover,#callpr:hover,#allreceive:hover,#stock:hover{background: #ADD6FF;}
    </style>

    <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> OFFICE</h3>
    <div class="row" style="margin-top:10px;">
        <div class="col-xs-3">

            <div id="office_tail">

            </div>

            <div id="sitedetail" class="panel panel-primary">
                <div class="panel-heading">ข้อมูลใบสั่งซื้อ</div>
                <div class="panel-body" id="allcpo">
                   <div class="col-xs-5" style="border-right:1px solid #ddd; text-align: right; font-weight: bold;">
                    <h1 style="line-height: 20px;"><?php echo $allpo; ?></h1>
                    <small>รายการ</small>
                   </div>
                   <div class="col-xs-7">
                    <strong>รายการใบสั่งซื้อ</strong>
                    <p  style="margin-top:30px;"><button  class="btn btn-xs btn-danger">เปิดทั้งหมด</button></p>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-xs-9" >
          <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> จัดการใบสั่งซื้อสินค้า</div>
              <div class="panel-body">
                <form  action="<?php echo base_url(); ?>office/updatepo" method="post">
                <div class="row">
                <!--  <div class="col-xs-6">
                      <div class="form-group">
                        <a><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบขอซื้อ</button></a>
                      </div>
                  </div> -->
                  <div class="col-md-3">
                    <div class="from-group">
                      <label for="">เลขทีใบสั่งซื้อ</label>
                      <input type="text" name="pono" id="pono" class="ppono form-control input-sm" value="<?php echo $pono; ?>" readonly="true">
                    </div>
                  </div>
                </div>
                <div class="row" id="gproject" style="margin-top: 10px;">
                  <div class="col-xs-6" >
                      <div class="input-group">
                       <label for="project1">โครงการ</label>
                          <input type="text" readonly="true"  class="form-control input-sm" value="<?php echo $projectname; ?>" id="projectnam">
                          <input type="hidden" readonly="true" value="<?php echo $project; ?>"  class="pproject form-control input-sm" name="project" id="putproject">
                          <span class="input-group-btn">
                            <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                          </span>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label for="code">ระบบ</label>
                        <select class="system form-control input-sm" name="system" id="system">
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
                        <input type="text" name="podate" required="" value="<?php echo $podate; ?>" class="podate form-control input-sm" id="podate">
                      </div>
                  </div>
                </div>
                <div class="row" id="gdepartment">
                  <div class="col-xs-6" >
                      <div class="input-group">
                       <label for="project1">แผนก</label>
                          <input type="text" readonly="true" value="<?php echo $dpt_name; ?>"  class="form-control input-sm" id="dptnam">
                          <input type="hidden" readonly="true" value="<?php echo $department; ?>"  class="form-control input-sm input-sm" name="department" id="putdpt">
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
                      <input type="text" name="vender" id="memname" value="<?php echo $prname; ?>" readonly="true" placeholder="จ่ายให้กับ" class="form-control input-sm">
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
                      <input type="text" class="form-control input-sm" value="<?php echo $vender; ?>" readonly="true" placeholder="กรอกชื่อร้านค้า" name="vender" id="vender1">
                      <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#open" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  <div class="col-xs-3" >
                    <div class="form-group">
                      <label for="team">เงื่อนไขชำระ</label>
                      <input type="text" name="team" placeholder="กรอกเงื่อนไขการชำระ"  value=" <?php echo $term; ?>" id="team" class="form-control input-sm">
                    </div>
                  </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label for="contact">เบอร์ติดต่อ</label>
                        <input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="กรอกเบอร์โทรศํพท์" id="tel" class="form-control input-sm">
                      </div>
                    </div>
                </div> <!-- end row -->
                <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label for="prno">ใบขอซื้อ</label>
          				    <input type="text" name="prno" value="<?php echo $poprno; ?>" id="prno" placeholder="กรอกเลขที่ใบขอซื้อ" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-3">
                      <div class="form-group">
                        <label for="contactno">เลขที่สัญญา</label>
                        <input type="text" name="contactno" value="<?php echo $contactno; ?>"  id="contactno" placeholder="กรอกเลขที่สัญญา" class="form-control input-sm">
                      </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label for="quono">ใบเสนอราคา</label>
                      <input type="text" name="quono" value="<?php echo $quono; ?>" id="quono" placeholder="กรอกเลขที่เสนอราคา" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-3" style="margin-top: 2px;">
                    <div class="form-group">
                      <label for="deliverydate">วันที่ส่งมอบ</label>
                      <input type="text" name="deliverydate" value="<?php echo $deliverydate; ?>" class="form-control input-sm" id="deliverydate">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="place">สถานที่ส่งของ</label>
                      <textarea type="text" rows="4" cols="50" name="place" id="place" placeholder="กรอกสถานที่ส่งของ" class="form-control input-sm"><?php echo $place; ?></textarea>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="place">หมายเหตุ</label>
                      <textarea type="text" rows="4" cols="50" name="remark" id="remark" placeholder="กรอกหมายเหตุ" class="form-control input-sm"><?php echo $remark; ?></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-6">
                    <button type="submit" class="btn btn-warning" name="button">แก้ไข</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaldetail">เพิ่มรายการ</button>
                    <button type="button" class="print btn btn-success" name="button">พิมพ์</button>
                  </div>
                </div>
                </form>
              </div>
           </div>
        </div>

          <div class="col-xs-9 col-md-offset-3">
            <div id="loaddata" class="loaddata">

            </div>
          </div>

    </div>


 <!--  MOdal po detail -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    <label for="matname">รายการซื้อ</label><Br>
                    <a data-toggle="modal"   data-target="#gencode" id="vgencode" class="btn  btn-primary">Material Name : xxxxx</a>
                    <input type="hidden" id="matcodeb6" name="matcode" placeholder="กรอกรายการซื้อ" class="matcodeb6 form-control">
                    <input type="hidden" id="matname" name="matname" placeholder="กรอกรายการซื้อ" class="matname form-control">
          </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="costname">รายการต้นทุน</label><br>
                    <a data-toggle="modal"  data-target="#costcode" id="gcostcode" class="btn  btn-primary">CostCode : xxxxx</a>
                    <input type="hidden" id="codecostcode" name="costcode"  placeholder="กรอกรายการต้นทุน" readonly="true" class="codecostcode form-control">
                    <input type="hidden" id="costname" name="costname"  placeholder="กรอกรายการต้นทุน" readonly="true" class="costname form-control">

                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="qty">ปริมาณ</label>
                          <input type="text" id="pqty" name="qty"  placeholder="กรอกปริมาณ" class="qty form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                    <label for="unit">หน่วย</label>
                    <input type="text" id="punit" name="unit" placeholder="กรอกหน่วย" class="punit form-control input-sm">
                  <span class="input-group-btn" >
                    <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                  </span>
                </div>
              </div>
          </div>
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="price_unit">ราคา/หน่วย</label>
                          <input type="text" id="pprice_unit"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="pprice_unit form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                          <label for="amount">จำนวนเงิน</label>
                          <input type="text" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="pamount form-control">
                </div>
              </div>
          </div>
           <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                     <label for="endtproject">ส่วนลด 1 (%)</label>
                     <input type='text' id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด" class="pdiscper1 form-control"  />
                  </div>
                </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <label for="endtproject">ส่วนลด 2 (%)</label>
                         <input type='text' id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด" class="pdiscper2 form-control" />
                      </div>
                    </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                   <label for="endtproject">ส่วนลดพิเศษ</label>
                   <input type='text' id="pdiscex" name="discountper2"class="pdiscex form-control" />
                  </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                     <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                     <input type='text' id="pdisamt" name="disamt" class="pdisamt form-control" />
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">VAT</label>
                      <select class="form-control" id="ccvat" name="cvat">
                                  <option value="1">Include VAT</option>
                                  <option value="2">Exclude VAT</option>
                                  <option value="3">Not VAT</option>
                      </select>
                  </div>
                </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">VAT</label>
                     <input type='text' id="pvat" name="vat" class="pvat form-control" />
                   </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">จำนวนเงินสุทธิ</label>

                     <input type='text'id="pnetamt" name="netamt" class="pnetamt form-control" />
                   </div>
                  </div>
            </div>
          <div class="row">
            <div class="col-md-12">
                  <div class="form-group">
                     <label for="endtproject">หมายเหตุ</label>

                     <input type='text' id="premark" name="remark" class="premark form-control" />
                  </div>
            </div>
          </div>

           <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                    <button type="submit"  class="loaddetai btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</button>
                </div>
              </div>
          </div>



      </div><!-- panal body -->
    </div>
  </div>
</div>  <!-- end modal PO Detail -->

<!--  modal gen matcode and costcode -->
<div class="modal fade" id="gencode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="type1" class="col-xs-6">
                    <h4>รายการประเภทสินค้า 1</h4>
                    <select multiple class="form-control" id="box1" style="height:350px;">
                    </select>
                </div>
                <div id="type2" class="col-xs-6">

                     <h4>รายการประเภทสินค้า 2</h4>
                     <select multiple class="form-control" id="box2" style="height:350px;">

</select>

                </div>
                <div id="type3" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 3</h4>
                    <select multiple class="form-control" id="box3" style="height:350px;">

</select>
                </div>
                <div id="type4" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 4</h4>
                    <select multiple class="form-control" id="box4" style="height:350px;">

</select>
                </div>
                <div id="type5" class="col-xs-6">
                     <select multiple class="form-control" id="box5" style="height:350px;"/>
                </select>
                     <select multiple class="form-control" id="box6" style="height:350px;"/>
</select>
                </div>

                <div class="col-xs-12" id="gencodebtn">
                    <hr>
                    <button class="btn btn-primary" id="btngenmatcode" style="float: right;">สร้าง MatCode</button>
                </div>
            </div>
        </div>
    </div>
  </div>
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
                    <select multiple class="form-control" id="cost4" style="height:150px;">

</select>
                </div>


                <div id="cost-control" class="col-xs-12">
                    <hr>

                        <div class="row" style="margin-top:10px;">
                            <div class="col-xs-12">
                        <button class="btn btn-primary" style="float:right;" id="btncostup">สร้าง CostCode</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->





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
                 <table class="table table-bordered table-striped table-hover" >
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
                <table class="table table-bordered table-striped table-hover" >
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
          <?php foreach ($resv as $val){ ?>
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


<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
          <th>No.</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getunit as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openun btn btn-xs btn-block btn-info" data-toggle="modal"  data-unit="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
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
                <table class="table table-bordered table-striped table-hover" >
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
          <td><?php echo $valu->project_name; ?></td>
          <td><?php echo $valu->pr_remark; ?></td>
          <td><?php if($valu->pr_status=="enable") {echo '<span style="color:#03ab03;text-align:center;"> อนุมัติแล้ว </span>';} ?></td>
            <td><button class="openpr btn btn-xs btn-block btn-info" data-toggle="modal" data-vreqname="<?php echo $valu->pr_reqname;?>" data-project="<?php echo $valu->pr_project;?>" data-vsystem="<?php echo $valu->pr_system; ?>" data-vprno="<?php echo $valu->pr_prno; ?>"
              data-vdelivery="<?php echo $valu->pr_deliplace;?>" data-vdelidate="<?php echo $valu->pr_delidate; ?>" data-vremark="<?php echo $valu->pr_remark; ?>" data-projname="<?php echo $valu->project_name; ?>" data-dismiss="modal">เลือก</button></td>
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
    });
    $( "#box2" ).change(function() {
         $("#type1").hide();
         var b2 = $('#box2').val();
         $('#box3').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b2);
         $("#type3").show();
    });
    $( "#box3" ).change(function() {
         var b3 = $('#box3').val();
         $('#box4').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b3);
         $('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b3);
         $("#type4").show();
         $("#type2").hide();
    });
    $( "#box4" ).change(function() {
         $("#box4").hide();
         $("#type5").show();

    });
    $( "#box5" ).change(function() {
       $("#gencodebtn").show();
    });

    $('#btngenmatcode').click(function(){
     var b1 = $('#box1').val();
     var b2 = $('#box2').val();
     var b3 = $('#box3').val();
     var b4 = $('#box4').val();
     var b5 = $('#box5').val();

     var gmatcode = b5;
     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6').val(b6gmatcode);
     $('#matname').val(gmatcode);
     $('#vgencode').html(gmatcode);
     $('#gencode').modal('hide');
    });

    $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1" ).change(function() {

         var c1 = $('#cost1').val();
         $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);

    });
    $( "#cost2" ).change(function() {

         var c2 = $('#cost2').val();
         $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    });
    $( "#cost3" ).change(function() {
         $("#cost3").hide();
         $("#cost4").show();

    });
    $("#btncostup").click(function(){
       var c1 = $('#cost1').val();
     var c2 = $('#cost2').val();
     var c3 = $('#cost3').val();

     var gcostcode = c4 ;
     var codecostcode = c1+''+c2;
     $('#codecostcode').val(codecostcode);
     $('#costname').val(gcostcode);
     $('#gcostcode').html(gcostcode);
     $('#costcode').modal('hide');

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
     $('#codecostcode').val(codecostcode);
     $('#costname').val(gcostcode);
     $('#gcostcode').html(gcostcode);
     $('#costcode').modal('hide');

    });
  // });
</script>

<script>
        // $(document).ready(function() {
        var p1 = $('.ppono').val();
            $('#loaddata').load('<?php echo base_url('index.php/office/service_po_detail'); ?>'+'/'+p1 );
            $('#office_tail').load('<?php echo base_url(); ?>index.php/office/service_office_tail');
            $("#podate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
            $("#deliverydate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
        // });
</script>

<script>
$('.loaddetai').click(function(){
  var url="<?php echo base_url(); ?>index.php/office/add_podetail";
  var dataSet={
    pono: $(".ppono").val(),
    matcode: $(".matcodeb6").val(),
    matname: $(".matname").val(),
    codecostcode: $(".codecostcode").val(),
    costname: $(".costname").val(),
    pqty: $(".qty").val(),
    punit: $(".punit").val(),
    pprice_unit: $(".pprice_unit").val(),
    pamount: $(".pamount").val(),
    pdiscper1: $(".pdiscper1").val(),
    pdiscper2: $(".pdiscper2").val(),
    pdiscex: $(".pdiscex").val(),
    pdisamt: $(".pdisamt").val(),
    pvat: $(".pvat").val(),
    pnetamt: $(".pnetamt").val(),
    premark: $(".premark").val()
    };
  $.post(url,dataSet,function(data){
    var p1 = $('.ppono').val();
    $('#loaddata').load('<?php echo base_url('index.php/office/service_po_detail'); ?>'+'/'+p1 );
      ///โหลด detail แล้ว ให้เป็นช่องว่าง
    $(".matcodeb6").val(""),
    $(".matname").val(""),
    $(".codecostcode").val(""),
    $(".costname").val(""),
    $(".qty").val(""),
    $(".punit").val(""),
    $(".pprice_unit").val(""),
    $(".pamount").val(""),
    $(".pdiscper1").val(""),
    $(".pdiscper2").val(""),
    $(".pdiscex").val(""),
    $(".pdisamt").val(""),
    $(".pvat").val(""),
    $(".pnetamt").val(""),
    $(".premark").val("")
  });

});
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
    $("#system").val($(this).data('vsystem'));
    $("#prno").val($(this).data('vprno'));
    $("#place").val($(this).data('vdelivery'));
    $("#deliverydate").val($(this).data('vdelidate'));
    $("#remark").val($(this).data('vremark'));
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
    $(".openun").click(function(){
      $("#punit").val($(this).data('unit'));
    });
  </script>
  <script>
    $(".openmem").click(function(){
      $("#memname").val($(this).data('mname'));
      $("#memid").val($(this).data('mid'));
    });
  </script>

  <script>
      $("#pqty,#pprice_unit").keyup(function(){
     if(isNaN($("#pqty").val()))
               {
                   $("#pqty").val('');
               }
      if(isNaN($("#pprice_unit").val()))
            {
                   $("#pprice_unit").val('');
            }
                var sum  = parseFloat($("#pqty").val())*parseFloat($("#pprice_unit").val()) || 0;
                $("#pamount").val(sum);


                 var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;
   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   $('#pdisamt').val(sumdis)|| 0;


    var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;

   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   var sumdis2 = (sumdis*parseFloat($("#pdiscper2").val()))/100 || 0;
   var sumdisf = (sumdis-sumdis2) || 0;
   $('#pdisamt').val(sumdisf)|| 0;


   var sumdisex = sumdisf-parseFloat($("#pdiscex").val()) || 0;
    $('#pdisamt').val(sumdisex)|| 0;

    /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }

$("#pdiscper1").keyup(function(){

   var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;
   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   $('#pdisamt').val(sumdis)|| 0;;

     /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
$("#pdiscper2").keyup(function(){
 var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;

   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   var sumdis2 = (sumdis*parseFloat($("#pdiscper2").val()))/100 || 0;
   var sumdisf = (sumdis-sumdis2) || 0;
   $('#pdisamt').val(sumdisf) || 0;

     /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
$("#pdiscex").keyup(function(){
 var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;

   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   var sumdis2 = (sumdis*parseFloat($("#pdiscper2").val()))/100 || 0;
   var sumdisf = (sumdis-sumdis2) || 0;
   var sumdisex = sumdisf-parseFloat($("#pdiscex").val()) || 0;
    $('#pdisamt').val(sumdisex)|| 0;

      /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
$("#ccvat").change(function(){
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
    });
  </script>

  <script>
  $('.print').click(function(){
   var pp = $('.ppono').val();
     url = "<?php echo base_url(); ?>index.php/report/report_po"+"/"+pp;
      $(location).attr("href", url);
  });
</script>
