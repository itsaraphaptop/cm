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
    <link href="<?php echo base_url();?>dist/css/font-awesome.min.css" rel="stylesheet">


    <![endif]-->
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
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }
       .pdf-footer {
            position: relative;
            bottom: .2in;


            padding-top: 20px;


        }

        #example{margin-top: 80px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
    </style>



<body>



<?php foreach ($res as $val) {
    $vendername = $val->po_vender;
    $vaddress = $val->vender_address;
    $vsale = $val->vender_sale;
    $vtel = $val->vender_tel;

    $podate = $val->po_podate;
    $pono = $val->po_pono;
    $projectcode = $val->project_code;
    $project = $val->project_name;
    $dptcode = $val->department_code;
    $dptname = $val->department_title;
    $quono = $val->po_quono;
    $deliver = $val->po_deliverydate;
    $remark = $val->po_remark;
    $place = $val->po_place;
    $term = $val->vender_credit;
    $reqname = $val->po_prname;
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
        <a href="<?php echo base_url(); ?>index.php/purchase/newpo" type="button" class="btn btn-warning navbar-btn" ><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onClick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
                  <div id="example" >
                    <div class="page-container">
                    <div class="pdf-page size-a4">
                    <div class="pdf-header">
                 <span class="company-logo">





                    <div class="row">
                        <div class="col-xs-12">
                        <form class="form-inline">
                    <div class="form-group">
                    <p style="margin-top:-10px;"> <img src="<?php echo base_url();?>/dist/img/logo.png" class="img-responsive" style="height:45px;"></p>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                    <div class="form-group">
                        <p style="font-size:16px; margin-top:-8px; margin-left:10px;">บริษัท เมฆา-เอส จำกัด</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:10px;">166 หมู่ 10 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:10px;"> จ.สมุทรปราการ 10270</p>
                    </div>
                        </div><!-- end col-xs-6 -->
                        <div class="col-xs-6">
                    <div class="form-group ">
                        <p style="font-size:12px; margin-top:-8px; margin-left:50px;" >เลขประจำตัวผู้เสียภาษี : 0-1055056087-92-9</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:50px;" >Tel : 02-101-2388, 02-136-4379</p>
                        <p style="font-size:11px; margin-top:-8px; margin-left:50px;" >Fax : 02-136-4380</p>
                        <p style="font-size:11px; margin-top:-25px; margin-left:270px;" >Page :1/1</p>
                    </div>
                        </div><!-- end col-xs-6 -->
                    </div><!-- end row -->

                    </div>
                    </div>

         <legend></legend>
             <p class="ex1" style="font-size:11px; margin-top:-15px; margin-left:10px;">  Contact Office 2082
              ม.10 ถ.สุขุมวิท107 ซ.แบริ่ง 30 ต.สำโรงเหนือ อ.เมืองสมุทรปราการ จ.สมุรปราการ 10270</p>


                        <div class="form-group" style="margin-left: 280px; margin-top:-1px;font-size:18px;">
                        <p>Purchase Order</p>
                        </div>

                        <div class="form-group" style="margin-left: 315px; margin-top:-15px;font-size:18px;">
                        <p>ใบสั่งซื้อ</p>
                        </div>



                <div class="row" style="margin-top:-10px;">
                <div class="col-xs-6">
                   <div class="panel panel-default">



                       <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;">
                           <div class="row">
                               <div class="col-xs-4">
                            <p>ส่ง / To :</p>
                               </div>
                               <div class="col-xs-8">
                                   <?php echo $vendername;?><br><?php echo $vaddress;?>
                               </div>

                           </div>
                           <br>
                           <div class="row">
                               <div class="col-xs-4">
                            <p>เรียน / Attn :</p>
                               </div>
                               <div class="col-xs-8">
                                   <?php echo $vsale;?>
                               </div>

                           </div>
                            <div class="row">
                               <div class="col-xs-4">
                            <p>โทรศัพท์ / Tel :</p>
                               </div>
                               <div class="col-xs-8">
                                   <?php echo $vtel;?>
                               </div>

                           </div>
                          <br>
                       </div>

                      </div>
                  </div>

               <div class="col-xs-6">
                 <div class="panel panel-default" >
                      <div class="form-group" style="margin-left: 15px; margin-top:10px; font-size:11px; margin-bottom:0px;">
                              <div class="row">
                               <div class="col-xs-5">
                            <p>วันที่ใบสั่งซื้อ :</p>
                               </div>
                               <div class="col-xs-7">
                                  <?php echo $podate; ?>
                               </div>

                           </div>

                     <div class="row">
                               <div class="col-xs-5">
                            <p>เลขที่ใบสั่งซื้อ / PO.No.:</p>
                               </div>
                               <div class="col-xs-7">
                                   <?php echo $pono; ?>
                               </div>

                           </div>

                           <div class="row">
                               <div class="col-xs-5">
                            <p>โครงการ / Project :</p>
                               </div>
                               <div class="col-xs-7">
                                 <?php echo $projectcode; ?><?php echo $dptcode; ?> - <?php echo $project; ?><?php echo $dptname; ?>
                               </div>

                           </div>
                               <div class="row">
                               <div class="col-xs-5">
                            <p>Quotation No. :</p>
                               </div>
                               <div class="col-xs-7">
                                  <?php echo $quono; ?>
                               </div>

                           </div>
                            <div class="row">
                               <div class="col-xs-5">
                            <p>วันที่ / Date</p>
                               </div>
                               <div class="col-xs-7">
                               <?php echo $deliver;?>
                               </div>

                           </div>

                          </div>
                  </div>
                 </div>
                </div>




                     <p class="ex1" style="font-size:11px;">  รายการสินค้าที่สั่งซื้อ/ORFER DETAIL </p>
                     <p class="ex1" style="font-size:10px; margin-top: -10px;">ผู้ขายจะส่งสินค้าให้เป็นตามเงื่อนไขที่ได้เสนอไว้กับบริษัทฯดังต่อไปนี้/supplier shall
                         supply the following items in good order and condition as per quotation namely </p>

                         <table class="table table-bordered"style="font-size:11px;">
                        <thead>
                            <tr align="center" >
                            <td>No.</td>
                                <td width="10%;"><p>รหัสต้นทุน <br>Cost Code </p></td>
                                <td><p>รายการ <br>Description</p></td>
                                <td width="5%;"><p>จำนวน <br>Quantity</p></td>
                                <td width="5%;"><p>หน่วย <br>Unit</p></td>
                                <td width="8%;"><p>ส่วนลด <br>Discount</p></td>
                                <td width="12%;" style="font-size:10px"><p>ราคาต่อหน่วย <br>Unit Price</p></td>
                                <td width="15%;"><p>จำนวนเงิน <br>Amount</p></td>
                            </tr>
                        </thead>


                    <tbody>
                        <?php
                        $i=1;
                            $total = 0;
                            $discount = 0;
                             foreach($resi as $pval){
                              ?>
                            <?php 
                              $this->db->select('*');
                              $this->db->where('poi_ref',$pval->poi_ref);
                              $query = $this->db->get('po_item');
                              $num = $query->num_rows();
                             ?>
                            <tr >
                                <?php $sum = $pval->poi_priceunit*$pval->poi_qty;?>
                                <td align="center"><?php echo $i; ?></td>
                                <td align="center"><?php echo substr($pval->poi_costcode, -5);?></td>
                                <td><?php echo $pval->poi_matname;?></td>
                                <td class="text-right"><?php echo $pval->poi_qty;?></td>
                                <td class="text-right"><?php echo $pval->poi_unit?></td>
                                <td class="text-right"><?php echo $pval->poi_discountper1?> %</td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_priceunit, 2, '.', ',');?></td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_disamt, 2, '.', ',');?></td>
                            </tr>

                          <?php
                          $i++;
                              $total = $total+$sum;

                              $s1 =($pval->poi_priceunit  - (($pval->poi_discountper1 * $pval->poi_priceunit )/ 100))*$pval->poi_qty;
                  $s = $s1- (($pval->poi_discountper2 * $s1 )/ 100);

                              $discount = $sum - $s;
                              }  if ($num=="1") {?>
                                 <?php for ($n=0; $n <7 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php  } if ($num=="2") {?>
                            <?php for ($n=0; $n <6 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="3"){ ?>
                             <?php for ($n=0; $n <5 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="4"){ ?>
                             <?php for ($n=0; $n <4 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="5"){ ?>
                             <?php for ($n=0; $n <3 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="6"){ ?>
                             <?php for ($n=0; $n <2 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php }elseif($num=="7"){ ?>
                             <?php for ($n=0; $n <1 ; $n++) { ?>
                              <tr >
                                <td align="center"></td>
                                <td style=" padding-top: 15px; padding-bottom: 15px;"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>

                       </tbody>
                         </table>
                                    <div class="footer" >
                          <div class="col-xs-6"  >
                         <div class="row text-left" style="margin-top:-10px;">
                            หมายเหตุ : <?php echo $remark;?><br>
                         </div>
                          </div>



                 <div class="row text-right" style="margin-top:-10px;">
                        <div class="col-xs-2 col-xs-offset-8">
                            <p>
                              <strong>
                                Sub Total : <br>

                                Discount : <br>
                                TAX : <br>
                                Total : <br>
                              </strong>
                            </p>
                        </div>
                    <div class="col-xs-2">
                        <?php
                            $t = $total2-$discount2;
                            $tax = ($t*7/100); ?>
                              <strong>
                                <?php echo number_format((double)$total2, 2, '.', ',');?> บาท<br>

                                <?php echo number_format((double)$exdisamt, 2, '.', ',');?> บาท<br>
                                <?php echo number_format((double)$tax, 2, '.', ',');?> บาท<br>
                                <?php echo number_format((double)$t+$tax,2, '.', ',');?> บาท<br>
                              </strong>
                    </div>
                 </div>


 <div class="pdf-footer" style="margin-top: -10px;">
 <p style="margin-top: -15px; font-size: 11px; margin-right: 100px;">สถานที่ส่งสินค้า/Delivery place : <?php echo $place;?></p>
 <p style="margin-top: -10px; font-size: 11px;">วันที่ส่งสินค้า/Delivery date   :    <?php echo $deliver;?></p>
 <p style="margin-top: -25px; font-size: 11px; margin-left: 220px;">กำหนดการชำระเงิน / Term of payment  :    <?php echo $term;?> วัน</p>

        <table class="table table-bordered" >
            <thead>
              <tr>
              <td align="middle"><p><br><?php echo $username; ?><br></p></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
            </thead>
            <tbody>
               <tr>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt; font-weight:normal;">
                       ผู้จัดทำ <br>Entried/Printed by <br><br>Date :<?php echo  $podate; ?></td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       แผนกจัดซื้อ <br>Purchasing Department <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt; line-height: 9pt;  font-weight:normal">
                       ผู้มีอำนาจลงนาม <br>Authorized Signature <br><br>Date :____/____/_____</td>
               <td align="center"><p style=" font-size:8pt;  line-height: 9pt;  font-weight:normal">
                       ผู้ขาย <br>Supplier Signature and Stamp <br><br>Date :____/____/_____</td>
               </tr>

              </tbody>
       </table>

        <p style="margin-top: -15px; font-size: 10px;">หมายเหตุ :  1. การวางบิลและการเก็บเงิน จะต้องแนบใบสั่งซื้อต้นฉบับ มาด้วยทุกครั้ง</p>
        <p style="margin-top: -10px; font-size: 10px; margin-left: 48px;">2. การส่งสินค้าทุกครั้งต้องแนบใบกำกับภาษี</p>
        <p style="margin-top: -10px; font-size: 10px; margin-left: 48px;">3. เอกสารต้องเกี่ยวกับการส่งสินค้า จะต้องระบุหมายเลข/วันที่ใบสั่งซื้อลงในใบกำกับภาษี</p>
        <p style="margin-top: -50px; font-size: 10px; margin-left: 420px;">4. กำหนดการวางบิลคือ ศุกร์ที่ 2,4 ของเดือน</p>
        <p style="margin-top: -10px; font-size: 10px; margin-left: 420px;">5. กำหนดการรับเช็คคือ ศุกร์ที่ 1,3 ของเดือน</p>

  </div>





                         </div>
                         </div>
                         </div>
                         </div>

</body>
</html>
