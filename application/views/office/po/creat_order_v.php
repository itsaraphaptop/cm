<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> เพิ่มใบสั่งจ้างใหม่</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="lono">เลขที่ใบสั่งจ้าง</label>
            <input type="text" name="lolono" placeholder="กรอกเลขที่เอกสาร" class="form-control input-sm" id="lolono">
            </div>
          </div>
        <div class="col-md-4">
          <label for="lodate">วันที่เอกสาร</label>
          <div class="form-group">
            <input type="text" name="lodate" placeholder="กรอกวันที่เอกสาร" class="form-control input-sm" id="lodate" id="lodate">
          </div>
        </div>
      </div> <!-- end row -->
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="refquono">อ้างอิงใบเสนอราคาเลขที่</label>
            <input type="text" name="refquono" placeholder="กรอกอ้างอิงใบเสนอราคาเลขที่" class="form-control input-sm" id="refquono">
          </div>
        </div>
        <div class="col-md-4">
          <label for="quodate">วันที่ใบเสนอราคา</label>
          <div class="form-group">

            <input type="text" name="quodate" placeholder="กรอกวันที่ใบเสนอราคา" class="form-control input-sm" id="quodate">
          </div>
        </div>
      </div> <!-- end row -->
      <div class="row">
        <div class="col-md-4">
          <div class="input-group">
            <label for="project">โครงการ</label>
               <input type="text" name="project" readonly="true"  class="form-control  input-sm" id="projectnam">
               <input type="text" readonly="true"  class="form-control  input-sm" id="projectid">
               <span class="input-group-btn">
                 <button class="openproj btn btn-primary btn-sm" style="margin-top:25px;" data-toggle="modal" data-target="#openproject" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
               </span>
          </div>
        </div>
        <div class="col-md-4" >
            <div class="input-group">
             <label for="project1">แผนก</label>
                <input type="text" readonly="true"  class="form-control  input-sm" id="dptnam">
                <input type="text" readonly="true"  class="form-control input-sm" name="department" id="putdpt">
                <span class="input-group-btn">
                  <button class="opendp btn btn-primary btn-sm" data-toggle="modal" data-target="#opendpt" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
           <label for="project1">ผู้ว่าจ้าง</label>
              <input type="text" readonly="true"  class="form-control  input-sm" id="vend">
              <input type="text" readonly="true"  class="form-control input-sm" name="department" id="vendid">
              <span class="input-group-btn">
                <button class="openvd btn btn-primary btn-sm" data-toggle="modal" data-target="#openvender" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
              </span>
          </div>
        </div>
      </div> <!-- end row -->
      <div class="row" style="margin-top: 10px;">
        <div class="col-md-4">
          <div class="form-group">
            <label for="contacttype">เป็นสัญญา</label>
            <select class="form-control input-sm" name='contacttype' id="contacttype">
              <option value="ค่าแรง">ค่าแรง</option>
              <option value="ค่าของ">ค่าของ</option>
              <option value="ทั้งค่าแรงและค่าของ">ทั้งค่าแรงและค่าของ</option>
              <option value="ค่าเช่า">ค่าเช่า</option>
              <option value="ค่าบริการ">ค่าบริการ</option>
            </select>
          </div>
        </div>
      </div> <!-- end row -->
      <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                        <label for="contactdesc">ลักษณะสัญญา</label>
                                        <input type="text" name="contactdesc" placeholder="กรอกลักษณะสัญญา" class="form-control input-sm" id="contactdesc">
                              </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                            <label for="contactamount">มูลค่าสัญญา</label>
                                                            <input type="text" name="contactamount" placeholder="กรอกมูลค่าสัญญา" class="form-control input-sm" id="contactamount">
                                                  </div>
                                                </div>
                                                 <div class="col-md-4">
                                                  <div class="form-group">
                                                            <label for="disamount">ลดมูลค่า</label>
                                                            <input type="text" name="disamount" placeholder="กรอกลดมูลค่า" class="form-control input-sm" id="disamount">
                                                  </div>
                                                </div>
                                                 <div class="col-md-4">
                                                  <div class="form-group">
                                                            <label for="amtbal">คงเหลือ</label>
                                                            <input type="text" name="amtbal" placeholder="กรอกคงเหลือ" class="form-control input-sm" id="amtbal">
                                                  </div>
                                                </div>
                                            </div><!-- end row -->
                                            <div class="row">
                                                 <div class="col-md-4">
                                                   <div class="form-group">
                                                      <label for="discount">ส่วนลดพิเศษคิดแบบ</label>
                                                      <input type="text" name="discount" placeholder="กรอกส่วนลดพิเศษคิดแบบ" class="form-control input-sm" id="discount">
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                      <label for="netamount">จำนวนเงินสุทธิ</label>
                                                      <input type="text" name="netamount" placeholder="กรอกจำนวนเงินสุทธิ" class="form-control input-sm" id="netamount">
                                                  </div>
                                                </div>
                                            </div><!-- end row -->
                                                                  <div class="row">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                        <label for="vatper">คิดภาษี (%)</label>
                                                        <input type="text" name="vatper" placeholder="กรอกคิดภาษี (%)" class="form-control input-sm" id="vatper">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label type="tax"> หักภาษี ณ ที่จ่าย</label>
                                                        <select class="form-control input-sm" name='tax' id"tax">
                                                            <option value="ไม่มีหัก">ไม่มีหัก</option>
                                                            <option value="ค่าบริการ 3%">ค่าบริการ 3%</option>
                                                            <option value="ค่าขนส่ง 1">ค่าขนส่ง 1%</option>
                                                             <option value="ค่าเช่า 5%">ค่าเช่า 5%</option>
                                                             <option value="ค่าโฆษณา 2%">ค่าโฆษณา 2%</option>
                                                            <option value="ดอกเบี้ยจ่าย 15%">ดอกเบี้ยจ่าย 15%</option>
                                                            <option value="ค่าจ้างเหมา 3%">ค่าจ้างเหมา 3%</option>
                                                             <option value="เงินชดเชย 3%">เงินชดเชย 3%</option>
                                                            <option value="ค่าจ้างแรงงาน 3%">ค่าจ้างแรงงาน 3%</option>
                                                        </select>
                                                </div>
                                             </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                        <label for="amountre">เรียกเก็บเงิน</label>
                                                        <input type="text" name="amountre" placeholder="กรอกเรียกเก็บเงิน" class="form-control input-sm" id="amountre">
                                              </div>
                                            </div>
                                </div><!-- end row -->

                           <div class="panel panel-primary">
                                <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> เงื่อนไขการชำระ</div>
                                <div class="panel-body">
                         <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                        <label for="paypermonth">กำหนดจ่ายเงินเดือนละ(งวด)</label>
                                        <input type="text" name="paypermonth" placeholder="กรอกกำหนดจ่ายเงินเดือนละ(งวด)" class="form-control input-sm" id="paypermonth">
                              </div>
                            </div>
                             <div class="col-md-3">
                              <div class="form-group">
                                        <label for="period">แต่ละงวดชำระ(วัน)</label>
                                        <input type="text" name="contractperiod" placeholder="กรอกแต่ละงวดชำระ(วัน)" class="form-control input-sm" id="contractperiod">
                              </div>
                            </div>
                             <div class="col-md-3">
                              <div class="form-group">
                                        <label for="after">หลังจาก</label>
                                        <select class="form-control input-sm" name="after" id="after">
                                            <option value="1">วันส่งมอบ</option>
                                            <option value="2">วันรับวางบิล</option>
                                        </select>
                              </div>
                            </div>
                             <div class="col-md-3">
                              <div class="form-group">
                                        <label for="paycon">Payment Condition</label>
                                        <select class="form-control input-sm" name="paycon" id="paycon">
                                            <option value="1">CHEQUE</option>
                                            <option value="2">ตั๋วอาวัล</option>
                                            <option value="3">DLC</option>
                                            <option value="4">CASH</option>
                                            <option value="5">BANK TRANSFER</option>
                                        </select>
                              </div>
                        </div>
                         </div><!-- end row -->
                        <div class="row">
                        <div class="col-md-3">
                              <div class="form-group">
                                        <label for="advance">เงินล่วงหน้า(%)</label>
                                        <input type="text" name="advance" placeholder="กรอกเงินล่วงหน้า(%)" class="form-control input-sm" id="advance">
                              </div>
                        </div>
                        <div class="col-md-3">
                              <div class="form-group">
                                        <label for="contractperiod">เงินงวดสัญญา(%)</label>
                                        <input type="text" name="contractperiod" placeholder="กรอกเงินงวดสัญญา(%)" class="form-control input-sm" id="contractperiod">
                              </div>
                        </div>
                         <div class="col-md-3">
                              <div class="form-group">
                                        <label for="annuity_contracts">เงินงวดสัญญา</label>
                                        <select class="form-control input-sm" id="annuitycontracts">
                                            <option value="1">จ่ายเมื่อติดตั้งเสร็จแล้ว</option>
                                            <option value="2">จ่ายเมื่อส่งของเสร็จแล้ว</option>
                                            <option value="3">จ่ายตามความก้าวหน้าของงาน</option>
                                        </select>
                              </div>
                        </div>
                        <div class="col-md-3">
                              <div class="form-group">
                                        <label for="payprogess">จ่ายตามความก้าวหน้า(%)</label>
                                        <input type="text" name="pay_progess" placeholder="กรอกจ่ายตามความก้าวหน้า(%)" class="form-control input-sm" id="payprogess">
                              </div>
                        </div>
                        </div><!-- end row -->
                        <hr>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="empsub">จ่ายเมื่อผู้ว่าจ้างส่งงานแก่เจ้าของโครงการแล้ว(วัน)</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                  <input type="text" name="empsub" placeholder="กรอกจ่ายเมื่อผู้ว่าจ้างส่งงานแก่เจ้าของโครงการแล้ว(วัน)" class="form-control input-sm" id="empsub">
                              </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="lessret">หักเงินประกันผลงาน (% ทุกงวดการจ่ายเงิน)</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="less_ret" placeholder="กรอกหักเงินประกันผลงาน (% ทุกงวดการจ่ายเงิน)" class="form-control input-sm" id="lessret">
                              </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label  for="discount">หักเงินคืนเงินจ่ายล่วงหน้า (% ทุกงวดการจ่ายเงินจนครบ ตามจำนวนเงินล่วงหน้า)</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" name="less_adv_pay" placeholder="กรอกหักเงินคืนเงินจ่ายล่วงหน้า (% ทุกงวดการจ่ายเงินจนครบ ตามจำนวนเงินล่วงหน้า)" class="form-control input-sm" id="lessadv_pay">
                            </div>
                          </div>
                        </div><!-- end row -->
                        <div class="row">
                             <div class="col-md-4">
                              <div class="form-group">
                                        <label for="lessother">หักเงินอื่นๆ</label>
                                        <input type="text" name="less_other" placeholder="กรอกหักเงินอื่นๆ" class="form-control input-sm" id="lessother">
                              </div>
                            </div>
                        </div><!-- end row -->
                         <hr>
                        <div class="row">
                             <div class="col-md-3">
                              <div class="form-group">
                                        <label for="discount">ระยะสัญญาเริ่มต้นตั้งแต่</label>
                                        <input type="text" name="start_contact" placeholder="กรอกระยะสัญญาเริ่มต้นตั้งแต่" class="form-control input-sm" id="startdate">
                              </div>
                             </div>
                               <div class="col-md-3">
                                 <label for="discount">ถึง</label>
                              <div class="form-group">

                                        <input type="text" name="stop_contact" placeholder="กรอกถึงระยะสัญญา" class="form-control input-sm" id="stopdate">
                              </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                             <div class="col-md-3">
                              <div class="form-group">
                                        <label for="discount">เลยกำหนดปรับวันละ(%)</label>
                                        <input type="text" name="perday" placeholder="กรอกเลยกำหนดปรับวันละ(%)" class="form-control input-sm" id="perday">
                              </div>
                            </div>
                              <div class="col-md-3">
                              <div class="form-group">
                                        <label for="discount">จำนวนเงิน(บาท)</label>
                                        <input type="text" name="amount" placeholder="จำนวนเงิน(บาท)" class="form-control input-sm" id="amount">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                        <label for="retention">ประกันผลงาน (เดือน)</label>
                                        <input type="text" name="retention" placeholder="กรอกประกันผลงาน (เดือน)" class="form-control input-sm" id="retention">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                        <label for="dlivery_date">วันที่ส่งมอบ</label>
                                        <div class='input-group date' id='iddate'>
                                            <input type='text'name="dliverydate" placeholder="กรอกวันที่ส่งมอบ" class="form-control input-sm date" id="dliverydate" />
                                        </div>
                                </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                        <label for="location">สถานที่ส่ง</label>
                                        <textarea type="text" rows="4"  name="location" placeholder="กรอกสถานที่ส่ง" class="form-control input-sm" id="location"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                        <label for="put">โดยใช้ (วางประกัน)</label>
                                        <textarea type="text" rows="4"  name="put" placeholder="กรอกโดยใช้ (วางประกัน)" class="form-control input-sm" id="put"></textarea>
                              </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                        <label for="accord_type">อ้างอิงสัญญา</label>
                                        <select class="form-control input-sm" id="accordtype">
                                            <option value="1">มี</option>
                                            <option value="2">ไม่มี</option>
                                        </select>
                              </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                        <label for="accord_contact">อ้างอิงสัญญา</label>
                                        <textarea type="text" rows="4"  name="accord_contact" placeholder="กรอกอ้างอิงสัญญา" class="form-control input-sm" id="accordcontact"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                        <label for="other">เงือนไขอื่นๆ</label>
                                        <textarea class="form-control input-sm" id="other" placeholder="กรอกเงื่อนไข" rows="4"></textarea>
                              </div>
                            </div>
                        </div><!-- end row -->


                                </div>
                                </div><!-- end panel-body-->
                       <div class="row">
                <div class="col-md-5">
                <div class="form-group">
                    <button class="btn btn-primary" name="savelo" type="submit" id="savelo">เพิ่มรายการ</button>
                    <a href="#"></a><button type="button" class="btn btn-warning">กลับหน้าหลัก</button></a>
                  </div>
                </div>

</div>

                        </div><!-- end panel-body-->
                    </div> <!-- end panel -->


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
                                    <table id="openvd" class="table table-striped table-hover" >
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
                                <td><button class="openvd btn btn-xs btn-block btn-info" data-toggle="modal"  data-vname="<?php echo $val->vender_name;?>" data-vid="<?php echo $val->vender_id;?>"  data-dismiss="modal">เลือก</button></td>
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
                                <table id="openproj" class="table table-striped" >
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
                            <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-mprojid="<?php echo $valj->project_id;?>" data-projname="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
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
                                    <table id="opendp" class="table table-striped table-hover" >
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

 <script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();
    $('#openproj').DataTable();
    $('#opendp').DataTable();
    $('#openvd').DataTable();
    $('#lolono').prop('disabled', true);
// } );
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
                // create DatePicker from input HTML element
                $("#lodate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#quodate").kendoDatePicker();
                $("#start_date").kendoDatePicker();
                $("#stop_date").kendoDatePicker();
                $("#dliverydate").kendoDatePicker();
                $("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "MMMM yyyy"
                });
            // });
            </script>
            <script>
              $(".openproj").click(function(){
                $("#projectid").val($(this).data('mprojid'));
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
              $(".openvd").click(function(){
                     $("#vend").val($(this).data('vname'));
                     $("#vendid").val($(this).data('vid'));
              });
            </script>


<script>
$('#savelo').click(function(){
  var url="<?php echo base_url(); ?>index.php/order/addloi";
  var dataSet={
                ilono : $('#lolono').val(),
                iloprno : $('#loprno').val(),
                ilodate : $('#lodate').val(),
                irefquono : $('#refquono').val(),
                iquodate : $('#quodate').val(),
                iprojectnam : $('#projectid').val(),
                iputdpt : $('#putdpt').val(),
                ivendid : $('#vendid').val(),
                icontacttype : $('#contacttype').val(),
                ijobtype : $('#jobtype').val(),
                icontactdesc : $('#contactdesc').val(),

                icontactamount : $('#contactamount').val(),
                idisamount : $('#disamount').val(),
                iamtbal : $('#amtbal').val(),
                idiscount : $('#discount').val(),
                inetamount : $('#netamount').val(),
                ivatper : $('#vatper').val(),
                itax : $('#tax').val(),

                iamountre : $('#amountre').val(),
                ipaypermonth : $('#paypermonth').val(),
                ipaycon : $('#paycon').val(),
                iafter : $('#after').val(),
                iadvance : $('#advance').val(),
                icontractperiod : $('#contractperiod').val(),
                iannuitycontracts : $('#annuitycontracts').val(),

                ipayprogess : $('#payprogess').val(),
                iempsub : $('#empsub').val(),
                ilessret : $('#lessret').val(),
                ilesspay : $('#lessadv_pay').val(),
                ilessother : $('#lessother').val(),
                istartcontact : $('#startdate').val(),
                istopcontact : $('#stopdate').val(),
                iperday : $('#perday').val(),

                iamount : $('#amount').val(),
                iretention : $('#retention').val(),
                ideliverydate : $('#dliverydate').val(),
                ilocation : $('#location').val(),
                iput : $('#put').val(),
                iaccordcontact : $('#contacttype').val(),
                iaccordtype : $('#accordtype').val(),

                iother : $('#other').val(),
                icreatedate : $('#refquono').val(),
                iupdatedate : $('#quodate').val(),
                istatus : $('#projectnam').val(),
                iuser : $('#putdpt').val(),

    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////
  alert("บันทึกหนังสือสั่งจ้าง เลขที่ "+data);
    $('#lolono').val(data);
      });
});
</script>