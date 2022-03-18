
<!DOCTYPE html>
<html lang="en">
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


        #example{margin-top: 80px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}

@media all
{
    .page-break { display:none; }
    .page-break-no{ display:none; }
}
@media print
{
    .page-break { display:block;height:1px; page-break-before:always; }
    .page-break-no{ display:block;height:1px; page-break-after:avoid; }
}
    </style>
        </head>
<?php foreach ($res as $val) {
    $docno = $val->docno;
    $projcode = $val->project_code;
    $project = $val->project_name;
    $dptcode = $val->department_code;
    $department = $val->department_title;
    $empname = $val->vender;
    $pcdate = $val->docdate;
} ?>
<body>

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
                <span class="company-logo"></span>
                 <div class="row">
                        <div class="col-xs-12">
                        <form class="form-inline">
                    <div class="form-group">
                    <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:45px;"></p>
                    <h3 style="margin-top: -40px; margin-left: 250px;">ใบสำคัญเงินสดย่อย</h3>
                    <h4 style="margin-top: -8px; margin-left: 250px;">PETTY CASH VOUCHER</h4>

                    </div>


                <div class="row" style="margin-top:5px;">
                <div class="col-xs-12">
                   <div class="panel panel-default">

                   <div class="row">
                    <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px;">
                               <div class="col-xs-4">
                            <p>รหัสโครงการ/แผนก : <?php echo $projcode;?><?php echo $dptcode; ?></p>
                               </div>
                                <div class="col-xs-4">
                            <p>ชื่อโครงการ : <?php echo $project;?><?php echo $department; ?></p>
                               </div>
                                <div class="col-xs-4">
                            <p>เลขที่ : <?php echo $docno;?></p>
                               </div>
                               <div class="col-xs-8">
                            <p>ชื่อที่อยู่ของผู้รับเงิน : <?php echo $empname;?></p>
                               </div>
                               <div class="col-xs-4">
                            <p>วันที่ : <?php echo $pcdate;?></p>
                               </div>
                           </div>
                        </div>
                      </div>
                  </div>

                </div>

                    </div>
                    </div>

                <table class="table table-bordered"style="font-size:11px;">
                        <thead>
                            <tr align="center" >
                                <td width="5%;"><p>ลำดับ <br><p>Item<br></p></td>
                                <td width="10%;"><p>รหัสต้นทุน <br><p>Cost Code<br></p></td>
                                <td width="8%;"><p>อ้างถึง <br><p>Ref.<br></p></td>
                                <td><p>รายการ <br><p>Item<br></p></td>
                                <td width="8%;"><p>จำนวณ <br><p><br></p></td>
                                <td width="15%;"><p>จำนวนเงิน <br><p>Amount<br></p></td>
                            </tr>
                        </thead>


                    <tbody>
                        <?php
                            $n = 1;
                            $total = 0;
                            $discount = 0;
                            $vat  = 0;
                            $pvat  = 0;
                            $sumvat = 0;
                            $whtax = 0;
                            $pwhtax = 0;
                             foreach($resi as $pval){
                              $this->db->select('*');
                              $this->db->where('pettycashi_ref',$pval->pettycashi_ref);
                              $query = $this->db->get('pettycash_item');
                              $num = $query->num_rows();
                              ?>
                            <tr >
                                <td  align="center"><?php echo $n;?></td>
                                <td align="center"><?php echo substr($pval->pettycashi_costcode,10,5);?></td>
                                <td align="center"><?php echo substr($pval->pettycashi_expenscode, -5);?></td>
                                <td><?php echo $pval->pettycashi_expens;?></td>
                                <td align="center"><?php echo number_format($pval->pettycashi_amount);?></td>
                                <td class="text-right"><?php echo number_format((double)$pval->pettycashi_amount*($pval->pettycashi_unitprice), 2, '.', ',');?></td>
                            </tr>
                          <?php $n++;  $total = $total+$pval->pettycashi_netamt + $pval->pettycashi_unitprice*$pval->pettycashi_wh/100;
                           $vat =  $vat+$pval->pattycashi_totvat;  $pvat = $pvat+$pval->pettycashi_vat;    $whtax = $whtax+$pval->pettycashi_wh;
                           $pwhtax = $pwhtax+($pval->pettycashi_unitprice*$pval->pettycashi_wh/100); } if ($num=="1") {?>

                         <?php for ($n=0; $n <16 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php  } if ($num=="2") {?>
                            <?php for ($n=0; $n <15 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="3"){ ?>
                             <?php for ($n=0; $n <14 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="4"){ ?>
                             <?php for ($n=0; $n <13 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="5"){ ?>
                             <?php for ($n=0; $n <12 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="6"){ ?>
                             <?php for ($n=0; $n <11 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                              <?php }elseif($num=="7"){ ?>
                             <?php for ($n=0; $n <10; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                              <?php }elseif($num=="8"){ ?>
                             <?php for ($n=0; $n <9 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                             <?php }elseif($num=="9"){ ?>
                             <?php for ($n=0; $n <8 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                              <?php }elseif($num=="10"){ ?>
                              <?php for ($n=0; $n <7 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="11"){ ?>
                              <?php for ($n=0; $n <6 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="12"){ ?>
                              <?php for ($n=0; $n <5 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="13"){ ?>
                              <?php for ($n=0; $n <4 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }elseif($num=="14"){ ?>
                              <?php for ($n=0; $n <3 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                            <?php }elseif($num=="15"){ ?>
                              <?php for ($n=0; $n <2 ; $n++) { ?>
                                <tr >
                                  <td align="center"></td>
                                  <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"></td>
                                  <td></td>
                              </tr>
                              <?php } ?>
                             <?php }else{ ?>

                             <?php } ?>


                       </tbody>
                       <tr >

                                  <td colspan="4"> ภาษีมูลค่าเพิ่ม / Vat 7%</td>
                                  <td class="text-right"></td>
                                  <td class="text-right"><?php if($pvat=="0"){echo"";}else{echo number_format((double)$vat, 2, '.', ',');}?></td>
                              </tr>
                                <tr >

                                  <td colspan="4">ภาษีหัก ณ ที่จ่าย  WH/Tax <?php if($whtax=="0"){echo"....";}else{echo $whtax;}  ?> %</td>
                                  <td class="text-right"></td>
                                  <td class="text-right"><?php  if($whtax=="0"){echo"";}else{ echo number_format((double)$pwhtax, 2, '.', ',');}?></td>
                              </tr>
                          <tr >
                                  <td colspan="4"><h6><b> ยอดรวม / Total &nbsp;&nbsp;&nbsp; ( <?php echo Convert($total+$vat+$pwhtax);  ?> ) </b></h6></td>
                                  <td class="text-right"></td>
                                  <td class="text-right"><h6><b><?php echo number_format((double)$total+$pwhtax, 2, '.', ',');?></b></h6></td>
                              </tr>
                    </table>

<!--      <div class="row text-right" style="margin-top:-10px;">
                        <div class="col-xs-2 col-xs-offset-8">
                            <p>
                              <strong>
                                Total : <br>
                              </strong>
                            </p>
                        </div>
                    <div class="col-xs-2">

                              <strong>
                                <?php echo number_format((double)$total, 2, '.', ',');?> บาท<br>
                              </strong>
                    </div>
                 </div>    -->
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

<div  style="margin-top: 10px;">
               <table class="table table-bordered " >
                    <thead>
                      <tr>
                      <td align="middle"><p><br><?php echo $user; ?><br></p></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>
                    </thead>
                    <tbody>
                       <tr>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
                                ผู้ออกเอกสาร / Issued By </td>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                               ผู้อนุมัติ / Approved By</td>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                               ผู้ตรวจสอบ / Checked By</td>
                       <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                               ผู้รับ / Received By</td>
                       </tr>

                      </tbody>
                    </table>
                    <p class="text-right" style="font-size:10px; margin-right:40px;"> ต้นฉบับ-บัญชีการเงิน</p>
                    <p class="text-right" style="font-size:10px; "> FM-AC-02, 22/09/2015</p>
           </div>

                </div>

            </div>

        </div>
    </div>

</body>
</html>