
<style>
      .navbar-default{background:#1a1e58; color:#fff;}
</style>
<style>

        body{background: #ddd;}
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
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

        .size-a4 { width: 8.3in; height: 11.5in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>
        </head>
<?php foreach ($res as $v) {
  $issueno =  $v->is_doccode;
  $isdocdate =  $v->is_docdate;
  $isproject =  $v->project_name;
  $isremark = $v->is_remark;
  $system = $v->is_system;
  $place = $v->is_place;
  $isname = $v->is_reqname;
} ?>
<body>
                  <div id="example">
                    <div class="page-container">
                    <div class="pdf-page size-a4">
                    <div class="pdf-header">
                      <div class="company-logo"></div>
                    <div class="row">
                        <div class="col-xs-3">
                        <form class="form-inline">
                          <div class="form-group">
                          <p style="margin-top:-20px;" > <img src="<?php echo base_url();?>comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:50px;"></p>
                          </div>
                       </form>
                         </div>
                            <div class="col-xs-6">
                                <p style="font-size:20px; margin-top:-20px; margin-left:50px;">Material Requisition Form</p>
                                <p style="font-size:18px; margin-top:-10px; margin-left:90px;">ใบเบิกวัสดุ (ต้นฉบับ)</p>
                            </div>
                            <div class="col-xs-12">
                                  <p style="font-size:13px; margin-top:-55px; margin-left:550px;">No. <?php echo $issueno; ?></p>
                                <p style="font-size:13px; margin-top:10px; margin-left:550px;">Date : <?php echo DateThai($isdocdate); ?></p>
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
                                <td width="5%;">รหัสวัสดุ</td>
                                <td width="50%">รายการ <br>ชนิด  - ขนาด</td>
                                <td colspan="2" width="20%;">จำนวน <br>เบิก&nbsp;&nbsp;&nbsp;/&nbsp; หน่วยนับ</td></td>
                                <td width="20%;">หมายเหตุ</td>
                                <!-- <td width="12%;">Cost Code <br>(รหัสต้นทุน)</td> -->
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
                                <td><?php echo $mod->isi_matcode; ?></td>
                                <td><?php echo $mod->isi_matname; ?></td>
                                <td align="center" width="7%;"><?php echo $mod->isi_xqty; ?></td><td align="center" width="7%;"> <?php echo $mod->isi_unit; ?> </td></td>
                                <td><?php echo $mod->isi_remark; ?></td>
                                <!-- <td align="center" width="12%;"><?php echo $mod->isi_matcode; ?></td> -->
                            </tr>
                            <?php $i++; } if ($num=="1") {?>
                            <?php for ($i=0; $i <4 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td></td>
                                <!-- <td align="center" width="12%;"> </td> -->
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="2") {?>
                            <?php for ($i=0; $i <3 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td></td>
                                <!-- <td align="center" width="12%;"> </td> -->
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="3") {?>
                            <?php for ($i=0; $i <2 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td></td>
                                <!-- <td align="center" width="12%;"> </td> -->
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="4") {?>
                            <?php for ($i=0; $i <1 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td></td>
                                <!-- <td align="center" width="12%;"> </td> -->
                            </tr>
                            <?php } ?>
                            <?php $i++; } if ($num=="5") {?>
                            <?php for ($i=0; $i <0 ; $i++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td align="center" width="7%;"> </td><td align="center" width="7%;"> </td></td>
                                <td></td>
                                <td></td>
                                <!-- <td align="center" width="12%;"> </td> -->
                            </tr>
                            <?php } ?>
                            <?php } ?>
                       </tbody>
                         </table>
                       <p style="margin-top: 15px; font-size: 11px;">หมายเหตุ : <?php echo $isremark; ?></p>
                       <p style="margin-top: 15px; font-size: 11px;">สถานที่ใช้งาน : <?php echo $place; ?></p>
                       <table class="table table-bordered" style="margin-top: 15px; font-size: 11px;">
                         <thead>
                           <tr>

                           </tr>
                         </thead>
                           <tbody>
                             <tr>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;"> <?php echo $isname; ?> </p>
                                       ผู้ขอเบิก <br><br>Date : <?php echo DateThai($isdocdate); ?></td>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                                       ผู้อนุมัติ <br><br>Date :____/____/_____</td>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                                       ผู้จ่ายวัสดุ <br><br>Date :____/____/_____</td>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                                       ผู้รับวัสดุ <br><br>Date :____/____/_____</td>
                             </tr>
                           </tbody>
                       </table>

       <p style="margin-top: 18px; font-size: 12px;">หมายเหตุ : หมายเหตุ : ห้ามจ่ายพัสดุโดยมามีลายเซ้นอนุมัติโดยเด็ดขาด</p>
       <p style="margin-top: 25px; font-size: 12px; margin-left: 550px;">FM-PM-24,25/08/16</p>

        <legend></legend>


</div>
</div>
</div>
</div>
<?php
  function DateThai($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
  }

  $strDate = date("Y-m-d");
  // echo "Time now : ".DateThai($strDate);
?>
</body>
</html>
