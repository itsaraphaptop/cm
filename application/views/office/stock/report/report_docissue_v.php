
<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NinjaERP Layout</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dist/css/sidebar.css" rel="stylesheet">


    <script src="<?php echo base_url();?>telerik/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>dist/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
     <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />

  <style>
      .navbar-default{background:#1a1e58; color:#fff;}
            </style>

        </head>
        <style>

        body{background: #ddd;}
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
            color font: #000;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.7in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 12px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }
       .pdf-footer {
            position: relative;


            padding-top: -10px;


        }

        #example{margin-top: 80px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>



<body>
<?php foreach ($res as $v) {
  $issueno =  $v->is_doccode;
  $isdocdate =  $v->is_docdate;
  $isproject =  $v->project_name;
  $isremark = $v->is_remark;
  $system = $v->is_system;
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
                               <div class="row" style="font-size: 14px; margin-top: -10px;">
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
                               foreach ($resi as $mod){ ?>
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
                            <?php $i++; } if ($num=="1") {?>
                            <?php for ($i=0; $i <4 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="2") {?>
                            <?php for ($i=0; $i <3 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="3") {?>
                            <?php for ($i=0; $i <2 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="4") {?>
                            <?php for ($i=0; $i <1 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="5") {?>
                            <?php for ($i=0; $i <0 ; $i++) { ?>
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


        <!--แผ่น 2 -->

             <legend></legend>
             <br >

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
                                <p style="font-size:18px; margin-top:-10px; margin-left:110px;">ใบเบิกวัสดุ</p>
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
                               <div class="row" style="font-size: 14px; margin-top: -10px;">
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
                               foreach ($resi as $mod){ ?>
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
                            <?php $i++; } if ($num=="1") {?>
                            <?php for ($i=0; $i <4 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="2") {?>
                            <?php for ($i=0; $i <3 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="3") {?>
                            <?php for ($i=0; $i <2 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="4") {?>
                            <?php for ($i=0; $i <1 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;">  </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td align="center" width="12%;"> </td>
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="5") {?>
                            <?php for ($i=0; $i <0 ; $i++) { ?>
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
       <p style="margin-top: -25px; font-size: 12px; margin-left: 550px;">FM-PM-24,25/08/16</p>

</div>
</div>
</div>
</div>


</body>
</html>
