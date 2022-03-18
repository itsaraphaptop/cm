


<body>
<?php foreach ($res as $v) {
  $issueno =  $v->is_doccode;
  $isdocdate =  $v->is_docdate;
  $isproject =  $v->project_name;
  $isremark = $v->is_remark;
} ?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:50px;">
        </div>
        <div id="navbar" class="collapse navbar-collapse">
         <button type="button" class="btn btn-primary navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
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
                                <p style="font-size:18px; margin-top:-10px; margin-left:90px;">ใบเบิกวัสดุ (ต้นฉบับ)</p>
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
                               <div class="row" style="font-size: 14px;">
                                <div class="col-xs-12 margin-left: 300px;">โครงการ : <?php echo $isproject; ?></div>
                                </div>
                            </div>
                            </div>
                          <br>
                          <div class="row" style="font-size: 12.5px;">
                            <div class="col-xs-3">
                                <div style="margin-top: -10px;" class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> ไฟฟ้าและการสื่อสาร</div></div>
                            <div class="col-xs-4">
                                <div style="margin-top: -10px;" class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> สุขขาภิบาลและป้องกันอัคคีภัย</div></div>
                            <div class="col-xs-3">
                                <div style="margin-top: -10px;" class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> ระบบปรับอากาศ</div>
                            </div>
                            <div class="col-xs-2">
                                <div style="margin-top: -10px;" class="col-xs-12"><span class="glyphicon glyphicon-unchecked"></span> อื่นๆ</div>
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
                    <?php $i=1; foreach ($resi as $mod){ ?>
                            <tr >
                                <td align="center"><?php echo $i; ?></td>
                                <td><?php echo $mod->isi_matname; ?></td>
                                <td align="center" width="7%;"><?php echo $mod->isi_xqty; ?></td><td align="center" width="7%;">  </td><td align="center" width="7%;"> <?php echo $mod->isi_unit; ?> </td></td>
                                <td><?php echo $mod->isi_remark; ?></td>
                                <td align="center" width="12%;"><?php echo $mod->isi_matcode; ?></td>
                            </tr>
                            <?php $i++; } ?>
                       </tbody>
                         </table>
                       <p style="margin-top: -15px;">หมายเหตุ : <?php echo $isremark; ?></p>

      <div class="footer" >
          <div class="pdf-footer">
                         <table class="table table-bordered" >
            <thead>
              <tr>
              <td><p><br></p></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
            </thead>
            <tbody>
               <tr>
               <td align="center"><p style=" font-size:10pt; line-height: 9pt; font-weight:normal;">
                       ผู้ขอเบิก <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:10pt; line-height: 9pt;  font-weight:normal">
                       ผู้อนุมัติ <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:10pt; line-height: 9pt;  font-weight:normal">
                       ผู้จ่ายวัสดุ <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:10pt;  line-height: 9pt;  font-weight:normal">
                       ผู้รับวัสดุ <br><br>ตำแหน่ง.............................. <br><br>Date :____/____/_____</td>
               </tr>

              </tbody>
       </table>
       <p style="margin-top: -18px; font-size: 12px;">หมายเหตุ : หมายเหตุ : ห้ามจ่ายพัสดุโดยมามีลายเซ้นอนุมัติโดยเด็ดขาด</p>
       <p style="margin-top: -25px; font-size: 12px; margin-left: 550px;">FM-ST-3,15/09/2015</p>


   </div>
</div>
</div>
</div>          <!--แผ่น 2 -->

</body>
</html>
