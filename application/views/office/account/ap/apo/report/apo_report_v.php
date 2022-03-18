
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

    <body>

      <?php foreach ($editapo as $v) {
        $apono = $v->apo_code;
        $payto = $v->apo_vender;
        $apodate = $v->apo_date;
        $depname = $v->department_title;
        $project_name = $v->project_name;
        $aporemark = $v->apo_remark;
      } ?>
        <div id="example" >
            <div class="page-container">
                <div class="pdf-page size-a4">
                    <div class="pdf-header">
                    <span class="company-logo"></span>
                     <div class="row">
                            <div class="col-xs-12">
                            <form class="form-inline">
                        <div class="form-group">
                        <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>comp/<?php echo $compimg; ?>" class="img-responsive" style="height:45px;"></p>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                        <div class="form-group">
                            <p style="font-size:16px; margin-top:-8px; margin-left:10px;">บริษัท เมฆา-เอส จำกัด</p>
                            <p style="font-size:11px; margin-top:-8px; margin-left:10px;">2082 หมู่ 2 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ</p>
                            <p style="font-size:11px; margin-top:-8px; margin-left:10px;"> จ.สมุทรปราการ 10270</p>
                        </div>
                            </div><!-- end col-xs-6 -->
                            <div class="col-xs-3"></div>
                            <div class="col-xs-3">
                                <div class="panel panel-default" style="margin-top:-30px;">
                                <div class="container" style="margin-left:30px;">
                                  <div class="row">
                                  <br>
                                    <p>No. <?php echo $apono; ?></p>
                                    <p>Date <?php echo  DateThai($apodate); ?></p>
                                    <p></p>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div><!-- end row -->

                        </div>
                        </div>
                            <!-- <p class="ex1" style="font-size:11px; margin-top:-5px; margin-left:10px;">  Contact Office 166
                             ม.10 ถ.สุขุมวิท107 ซ.แบริ่ง 30 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ จ.สมุรปราการ 10270</p> -->


                                       <div class="form-group" style="margin-left: 280px; margin-top:-1px;font-size:18px;">
                                       <p>Payment Voucher</p>
                                       </div>

                                       <div class="form-group" style="margin-left: 300px; margin-top:-15px;font-size:18px;">
                                       <p>ใบสำคัญจ่าย</p>
                                       </div>
                                       <div class="row" style="margin-top:-10px;">
                                       <div class="col-xs-12">
                                          <!-- <div class="panel panel-default"> -->
                                              <!-- <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;"> -->
                                                 <div class="row">
                                                   <div class="col-xs-4">
                                                     <div class="row">
                                                       <div class="col-xs-4">Pay To</div>
                                                       <div class="col-xs-12" style="margin-top:-16px; margin-left:45px; font-size:12px;"><?php echo $payto; ?></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6"><span class="glyphicon glyphicon-unchecked"></span></div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6"><span class="glyphicon glyphicon-unchecked"></span> Transfer Bank</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                      <div class="row">
                                                       <div class="col-xs-6"><span class="glyphicon glyphicon-unchecked"></span> By Cash</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                   </div>
                                                   <div class="col-xs-4">
                                                     <div class="row">
                                                       <div class="col-xs-6">Creditor Code</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6">Bank</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-6">A/C No.</div>
                                                       <div class="col-xs-6"></div>
                                                     </div>
                                                   </div>
                                                   <div class="col-xs-4">
                                                     <div class="row">
                                                       <div class="col-xs-4">AC</div>
                                                       <div class="col-xs-8"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-4">Chq.Date</div>
                                                       <div class="col-xs-8"></div>
                                                     </div>
                                                     <div class="row">
                                                       <div class="col-xs-4">Name</div>
                                                       <div class="col-xs-8"></div>
                                                     </div>
                                                   </div>
                                                 </div>
                                                 <br>
                                                 <div class="row">
                                                   <div class="col-xs-6">
                                                      <div class="row">
                                                       <div class="col-xs-2">Project/department</div>
                                                       <div class="col-xs-6" style="margin-left:65px;"><?php echo $depname; ?><?php echo $project_name; ?></div>
                                                     </div>
                                                   </div>
                                                 </div>
                                                 <div class="row">
                                                   <div class="col-xs-6">
                                                      <div class="row">
                                                       <div class="col-xs-3">Description</div>
                                                       <div class="col-xs-8"><?php echo $aporemark; ?></div>
                                                     </div>
                                                   </div>
<?php foreach ($apoitem as $es) {
$costcode = $es->apo_costcode;
$costname = $es->apo_costname;
}?>
                                                   <div class="col-xs-6">
                                                      <div class="row">
                                                       <div class="col-xs-3">CostCode</div>
                                                       <div class="col-xs-8"><?php echo substr($costcode,10); ?> - <?php echo $costname; ?></div>
                                                     </div>
                                                   </div>
                                                 </div>
                                                 <br>
                                              <!-- </div> -->

                                             <!-- </div> -->
                                         </div>
                                       </div>
                                       <table class="table table-bordered table-xxs">
                                       <thead>
                                          <tr align="center" >
                                              <td width="10%;">No</td>
                                              <td>Description</td>
                                              <td width="5%;">Amount(Baht)</td>
                                              <td width="20%;">Remark</td>
                                          </tr>
                                       </thead>


                                       <tbody>
                                          <?php $i=1; $amount=0; $unitprice=0; $total = 0; $vat = 0; $vattot=0; $whtax = 0; $pwhtax = 0; $netamt=0; ?>
                                          <?php foreach ($apoitem as $e) {
                                            $this->db->select('*');
                                            $this->db->where('apo_ref',$e->apo_ref);
                                            $query = $this->db->get('apo_item');
                                            $num = $query->num_rows();

                                            ?>
                                          <tr >
                                              <td align="center"><?php echo $i; ?></td>
                                              <td><?php echo $e->apo_expens; ?></td>
                                              <td class="text-right"><?php echo number_format($e->apo_amounttot,2); ?></td>
                                              <td><?php echo $e->apo_expenscode; ?></td>
                                          </tr>
                                          <?php if ($e->apo_totvat!=0) {?>
                                          <tr >
                                              <td align="center"></td>
                                              <td> Vat <?php echo $e->apo_vat; ?>% ใบกำกับภาษี: <?php echo $e->apo_invno; ?> วันที่: <?php echo $e->apo_invdate; ?> </td>
                                              <td class="text-right"><?php echo number_format(($e->apo_unitprice*$e->apo_vat)/100,2); ?></td>
                                              <td></td>
                                          </tr>
                                          <?php }else{} ?>
                                          <?php $i++;
                                          $unitprice = $unitprice+$e->apo_unitprice;
                                            $vat = $vat+$e->apo_vat;
                                            $vattot = $vattot+$e->apo_totvat;
                                            $total=($total+$e->apo_unitprice)+($e->apo_unitprice*7/100);
                                            $whtax = $whtax+$e->apo_wh;
                                            $pwhtax = $pwhtax+($e->apo_unitprice*$e->apo_wh/100);
                                            $netamt = $netamt+$e->apo_netamt;
                                            $amount = $amount+$e->apo_amounttot;
                                          } if ($num=="1") {?>
                                          <?php for ($n=0; $n <10 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                          <?php  } if ($num=="2") {?>
                                          <?php for ($n=0; $n <9 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                          <?php }elseif($num=="3"){ ?>
                                           <?php for ($n=0; $n <8 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                          <?php }elseif($num=="4"){ ?>
                                           <?php for ($n=0; $n <5 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                          <?php }elseif($num=="5"){ ?>
                                           <?php for ($n=0; $n <3 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                          <?php }elseif($num=="6"){ ?>
                                           <?php for ($n=0; $n <2 ; $n++) { ?>
                                            <tr >
                                              <td align="center"></td>
                                              <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                              <td class="text-right"></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <?php } ?>
                                           <?php } ?>

                                           <tr >
                                              <td align="center"></td>
                                              <td>ยอดตามใบเสร็จ/Total</td>
                                              <td class="text-right"><?php if ($vattot!=0) {echo number_format($netamt,2);}else{echo number_format($amount,2);}  ?></td>
                                              <td class="text-right"></td>
                                          </tr>
                                          <tr >
                                              <td align="center"></td>
                                              <td>ภาษีหัก ณ ที่จ่าย/ WHT <?php if($whtax=="0"){echo"....";}else{echo $whtax;}  ?> %</td>
                                              <td class="text-right"><?php  if($whtax=="0"){echo"";}else{ echo number_format((double)$pwhtax, 2, '.', ',');}?></td>
                                              <td class="text-right"></td>
                                          </tr>
                                           <tr >
                                              <td align="center"></td>
                                              <td>ยอดจ่ายสุทธิ/Net</td>
                                              <td class="text-right"><?php if($vattot!=0 && $whtax!=0){echo number_format($netamt,2); }elseif ($vattot!=0) {echo number_format($netamt,2);}else{echo number_format($amount,2);} ?></td>
                                              <td class="text-right"></td>
                                          </tr>

                                       </tbody>
                                       </table>

    <?php

    function Convert($amount_number)
    {
        $amount_number = number_format($amount_number, 2, ".","");
        $pt = strpos($amount_number , ".");
        $number = $fraction = "";
        if ($pt === false)
            $number = $amount_number;
        else
        {
            $number = substr($amount_number, 0, $pt);
            $fraction = substr($amount_number, $pt + 1);
        }

        $ret = "";
        $baht = ReadNumber ($number);
        if ($baht != "")
            $ret .= $baht . "บาท";

        $satang = ReadNumber($fraction);
        if ($satang != "")
            $ret .=  $satang . "สตางค์";
        else
            $ret .= "ถ้วน";
        return $ret;
    }

    function ReadNumber($number)
    {
        $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
        $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
        $number = $number + 0;
        $ret = "";
        if ($number == 0) return $ret;
        if ($number > 1000000)
        {
            $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
            $number = intval(fmod($number, 1000000));
        }

        $divider = 100000;
        $pos = 0;
        while($number > 0)
        {
            $d = intval($number / $divider);
            $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
                ((($divider == 10) && ($d == 1)) ? "" :
                ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
            $ret .= ($d ? $position_call[$pos] : "");
            $number = $number % $divider;
            $divider = $divider / 10;
            $pos++;
        }
        return $ret;
    }

     ?>
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

     <table class="table table-bordered table-xxs">
     <tbody>
        <tr>
         <td align="center"> <strong><?php if($vattot!=0 && $whtax!=0){echo Convert($netamt); }elseif ($vattot!=0) {echo Convert($netamt);}else{echo Convert($netamt);} ?></strong> </td>
       </tr>
     </tbody>
     </table>


     <div class="pdf-footer">
     <table class="table table-bordered" >
     <thead>
     <tr>
     <!-- <td width="20%" align="middle"><p><br><?php echo $payto; ?><br></p></td>  ผึ้งขอเปลี่ยน-->
     <td width="20%" align="middle"><p><br><?php echo $user; ?><br></p></td>
     <td width="20%"></td>
     <td align="middle" width="20%"></td>
     <td width="20%"></td>
     <td width="20%"></td>
     </tr>
     </thead>
     <tbody>
     <tr>
     <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
     Prepareed By <br><br><?php echo DateThai($strDate); ?></td>
     <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
     Verified By <br><br>Date :____/____/_____</td>
     <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
     Approved By NinjaERP <br><br>Date :</td>
     <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
     Received By <br><br>Date :____/____/_____</td>
     <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
     Posted By <br><br>Date :____/____/_____</td>
     </tr>

     </tbody>
     </table>
     </div>



                    </div>

                </div>

            </div>
        </div>

    </body>
    </html>
