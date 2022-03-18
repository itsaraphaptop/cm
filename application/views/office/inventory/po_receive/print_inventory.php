
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

<body>

<?php foreach ($res as $val) {
	$pono = $val->po_pono;
	$vender = $val->po_vender;
	$porijectid = $val->project_id;
	$projcode = $val->project_code;
	$project_name = $val->project_name;
	$depid = $val->po_department;
	$depname = $val->department_title;
	$systemname = $val->systemname;
	$crterm = $val->po_trem;
	$deli = $val->po_deliverydate;
  

} ?>
<?php foreach ($po_rec as  $value) {
	$poreceiveno = $value->po_reccode;
	$flag = $value->flag_control;
  $po_recdate = $value->po_recdate;
} ?>
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
                                <p style="font-size:18px; margin-top:-10px; margin-left:90px;">ใบรับวัสดุ (ต้นฉบับ)</p>
                            </div>
                            <div class="col-xs-12">
                                  <p style="font-size:13px; margin-top:-55px; margin-left:550px;">No. <?php echo $poreceiveno; ?></p>
                                <p style="font-size:13px; margin-top:10px; margin-left:550px;">Date : <?php echo DateThai($po_recdate); ?></p>
                            </div>
                   </div><!-- end row -->

                <div class="row">
                <div class="col-xs-12">
                          <div class="row">
                            <div class="col-xs-12">
                               <div class="row" style="font-size: 14px; margin-top: -10px;">
                                
                               

                                </div>
                            </div>
                            </div>
                          <br>
                          <div class="row" style="font-size: 13.5px; margin-top: -10px;">

                               <div class="col-xs-12 margin-left: 300px;">เลขที่ใบสั่งซื้อ :  <?php echo $pono; ?>          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  โครงการ : <?php echo $project_name; ?></div><br>
                        		<div class="col-xs-12 margin-left: 300px;">ระบบ : <?php echo $systemname; ?></div>
                          </div>

                          <br>
                      </div>
                      </div>
                       <!-- </div> -->


                         <table class="table table-bordered" style="font-size:12px;">

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
                  
  
                           <?php $n=1; foreach($resi as $val){
						$q = $this->db->query("select whname from ic_proj_warehouse where whcode='$val->ic_warehouse'")->result();
						 foreach ($q as $vale) {
						$whname = $vale->whname;
						}
					?>
                              <tr >

			                <?php $qty = $val->poi_qty;
			                $rece = $val->poi_receive;
			                $total = $qty-$rece;?>
                                <td align="center"><?php echo $n; ?></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"><?php echo $val->poi_matcode;?></td>
                                <td align="center" width="7%;"><?php echo $val->poi_matname; ?> </td>
                                <td align="center" width="7%;"><?php if($val->poi_receive == "0"){ echo "0";}else{$num = $val->poi_qty-$val->poi_receive; $numrec = $val->poi_qty-$num; echo $numrec;}?></td></td>
                                <td><?php echo $val->poi_unit;?></td>
                                <td></td>
                                <!-- <td align="center" width="12%;"> </td> -->
                            </tr>
                          <?php $n++; } ?>
                              <tr align="center" >
                                <td width="5%;"></td>
                                <td width="5%;"></td>
                                <td width="50%"> <br>  </td>
                                <td colspan="2" width="20%;"></td></td>
                                <td width="20%;"></td>
                                <!-- <td width="12%;">Cost Code <br>(รหัสต้นทุน)</td> -->
                            </tr>
                             <tr align="center" >
                                <td width="5%;"></td>
                                <td width="5%;"></td>
                                <td width="50%"> <br>  </td>
                                <td colspan="2" width="20%;"></td></td>
                                <td width="20%;"></td>
                                <!-- <td width="12%;">Cost Code <br>(รหัสต้นทุน)</td> -->
                            </tr>
                             <tr align="center" >
                                <td width="5%;"></td>
                                <td width="5%;"></td>
                                <td width="50%"> <br>  </td>
                                <td colspan="2" width="20%;"></td></td>
                                <td width="20%;"></td>
                                <!-- <td width="12%;">Cost Code <br>(รหัสต้นทุน)</td> -->
                            </tr>
                             
                           
                       </tbody>
                         </table>
                       <p style="margin-top: 15px; font-size: 11px;">หมายเหตุ : </p>
                       <p style="margin-top: 15px; font-size: 11px;">สถานที่ใช้งาน : <?php echo $project_name; ?></p>
                       <table class="table table-bordered" style="margin-top: 15px; font-size: 11px;">
                         <thead>
                           <tr>

                           </tr>
                         </thead>
                           <tbody>
                             <tr>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;">  </p>
                                       ผู้บันทึก <br><br>Date : <?php echo DateThai($po_recdate); ?></td>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                                       ผู้อนุมัติ <br><br>Date :____/____/_____</td>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                                       ผู้จ่ายวัสดุ <br><br>Date :____/____/_____</td>
                               <td class="text-center"><p style="line-height: 9pt;  font-weight:normal; margin-top: 40px;">
                                       ผู้รับวัสดุ <br><br>Date :____/____/_____</td>
                             </tr>
                           </tbody>
                       </table>

       <p style="margin-top: 18px; font-size: 12px;">หมายเหตุ : ห้ามจ่ายพัสดุโดยไม่มีลายเซ้นอนุมัติโดยเด็ดขาด</p>
       <p style="margin-top: 25px; font-size: 12px; margin-left: 550px;"></p>

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
