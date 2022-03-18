
<?php foreach ($res as $v) {
  $issueno =  $v->book_code;
  $isdocdate =  $v->date_book;
  $isproject =  $v->project_name;
  $isremark = $v->is_remark;
  $system = $v->is_system;
} ?>
<body>

                  <div id="example" >
                    <div class="page-container">
                    <div class="pdf-page size-a4">
                    <div class="pdf-header">





                    <div class="row">
                        <div class="col-xs-3">
                        <form class="form-inline">
                          <div class="form-group">
                          <p style="margin-top:-20px;" > <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:50px;"></p>
                          </div>
                       </form>
                         </div>
                            <div class="col-xs-6">
                                <p style="font-size:20px; margin-top:-20px; margin-left:50px;">Material Requisition Form</p>
                                <p style="font-size:18px; margin-top:-10px; margin-left:110px;">ใบจองวัสดุ</p>
                            </div>
                            <div class="col-xs-12">
                                  <p style="font-size:13px; margin-top:-55px; margin-left:550px;">No. <?php echo $issueno; ?></p>
                                <p style="font-size:13px; margin-top:10px; margin-left:550px;">Date : <?php echo $isdocdate; ?></p>
                            </div>
                   </div><!-- end row -->

                <div class="row">
                <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-12">
                               <div class="row" style="font-size: 15px; margin-top: -5px;">
                                <div class="col-xs-12 margin-left: 300px;">โครงการ : <?php echo $isproject; ?></div>
                                </div>
                            </div>
                            </div>
                          <br>
                          <div class="row" style="font-size: 12.5px; margin-top: -10px;">
                          <div class="col-xs-12">
                                <?php if ($system=="1") {?>
                                <label class="checkbox-inline" >
                                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> OVERHEAD
                                </label>
                                <?php }else{ ?>
                                     <label class="checkbox-inline" >
                                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> OVERHEAD
                                    </label>
                                <?php } ?>
                                <?php if ($system=="2") {?>
                                <label class="checkbox-inline" >
                                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> AC
                                </label>
                                <?php }else{ ?>
                                     <label class="checkbox-inline" >
                                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> AC
                                    </label>
                                <?php } ?>
                                <?php if ($system=="3") {?>
                                <label class="checkbox-inline" >
                                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> EE
                                </label>
                                <?php }else{ ?>
                                     <label class="checkbox-inline" >
                                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> EE
                                    </label>
                                <?php } ?>
                                <?php if ($system=="4") {?>
                                <label class="checkbox-inline" >
                                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> SN
                                </label>
                                <?php }else{ ?>
                                     <label class="checkbox-inline" >
                                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> SN
                                    </label>
                                <?php } ?>
                                <?php if ($system=="5") {?>
                                <label class="checkbox-inline" >
                                  <input type="checkbox" checked id="inlineCheckbox5" value="option5" disabled="disabled"> CIVIL
                                </label>
                                <?php }else{ ?>
                                     <label class="checkbox-inline" >
                                      <input type="checkbox" id="inlineCheckbox5" value="option5" disabled="disabled"> CIVIL
                                    </label>
                                <?php } ?>
                          </div>
                          </div>
                          <br>
                      </div>
                      </div>
                       <!-- </div> -->


                         <table class="table table-bordered"style="font-size:12px;">

                        <thead>
                            <tr align="center" >
                                <td width="5%;">ลำดับ</td>
                                <td>รายการ <br>ชนิด  - ขนาด</td>
                                <td colspan="3" width="20%;">จำนวน <br>เบิก&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp; จ่าย&nbsp;&nbsp;&nbsp;/&nbsp; หน่วยนับ</td></td>
                                <td width="20%;">เพื่อใช้งาน<br>(ระบุพื้นที่ทำงาน)</td>
                                <td width="12%;">Cost Code <br>(รหัสต้นทุน)</td>
                            </tr>
                        </thead>

                    <tbody>
                    <?php $i=1;
                               foreach ($resitem as $mod){ ?>
                        <?php $this->db->select('*');
                              $this->db->where('isi_doccode',$mod->isi_doccode);
                              $query = $this->db->get('ic_issue_d');
                              $num = $query->num_rows();
                        ?>
                            <tr >
                                <td align="center"><?php echo $i; ?></td>
                                <td><?php echo $mod->isi_matname; ?></td>
                                <td align="center" width="7%;"><?php echo $mod->isi_xqty; ?></td><td align="center" width="7%;">  </td><td align="center" width="7%;"> <?php echo $mod->isi_unit; ?> </td></td>
                                <td><?php echo $mod->isi_remark; ?></td>
                                <td align="center" width="12%;"><?php echo $mod->isi_matcode; ?></td>
                            </tr>
                            <?php $i++; } if ($num=="6") {?>
                            <?php for ($i=0; $i <15 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="7") {?>
                            <?php for ($i=0; $i <14 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="8") {?>
                            <?php for ($i=0; $i <13 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="9") {?>
                            <?php for ($i=0; $i <12 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="10") {?>
                            <?php for ($i=0; $i <11 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="11") {?>
                            <?php for ($i=0; $i <10 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="12") {?>
                            <?php for ($i=0; $i <9 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="13") {?>
                            <?php for ($i=0; $i <8 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="14") {?>
                            <?php for ($i=0; $i <7 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="15") {?>
                            <?php for ($i=0; $i <6 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="16") {?>
                            <?php for ($i=0; $i <5 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="17") {?>
                            <?php for ($i=0; $i <4 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="18") {?>
                            <?php for ($i=0; $i <3 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="19") {?>
                            <?php for ($i=0; $i <2 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="20") {?>
                            <?php for ($i=0; $i <1 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                       </tbody>
                         </table>
                       <p style="margin-top: -15px; font-size: 11px;">หมายเหตุ : <?php echo $isremark; ?></p>

      <div class="footer" >
          <div class="pdf-footer">
                         <table class="table table-bordered" >
            <thead>
              <tr>
              </tr>
            </thead>
            <tbody>
               <tr>
               <td align="center"><p style=" font-size:10pt; line-height: 9pt; font-weight:normal; margin-top: 40px;">
                       ผู้ขอเบิก <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:10pt; line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                       ผู้อนุมัติ <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:10pt; line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                       ผู้จ่ายวัสดุ <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:10pt;  line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                       ผู้รับวัสดุ <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               </tr>

              </tbody>
       </table>
       <p style="margin-top: -18px; font-size: 12px;">หมายเหตุ : หมายเหตุ : ห้ามจ่ายพัสดุโดยมามีลายเซ้นอนุมัติโดยเด็ดขาด</p>
       <p style="margin-top: -25px; font-size: 12px; margin-left: 550px;">FM-ST-3,15/09/2015</p>


</div>
</div>
</div>
</div>
