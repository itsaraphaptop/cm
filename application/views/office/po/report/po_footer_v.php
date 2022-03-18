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







                          <div class="page-container" style="margin-top:10px;">
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
                        <p style="font-size:11px; margin-top:-25px; margin-left:270px;" >Page :1/<?php if ($dd==1) {echo  "2"; }elseif($dd==2){echo "3";}else{echo "4";} ?></p>
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
<div style="height:500px;">
                         <table class="table table-bordered"style="font-size:11px;">
                        <thead>
                            <tr align="center" >
                                <td width="10%;"><p>ลำดับ <br>Item </p></td>
                                <td width="10%;"><p>รหัสต้นทุน <br>Cost Code </p></td>
                                <td><p>รายการ <br>Description</p></td>
                                <td width="5%;"><p>จำนวน <br>Quantity</p></td>
                                <td width="5%;"><p>หน่วย <br>Unit</p></td>
                                <td width="8%;"><p>ส่วนลด <br>Discount</p></td>
                                <td width="12%;" style="font-size:10px"><p>ราคาต่อหน่วย <br>Unit Price</p></td>
                                <td width="15%;"><p>จำนวนเงิน <br>Amount</p></td>
                            </tr>
                        </thead>
<?php if ($dd==2) {?>
 
                    <tbody>
                        <?php
                        $i=17;
                            $total = 0;
                            $discount = 0;
                            $allnet = 0;
                             foreach($resi as $pval){
                              ?>
                             <?php  $this->db->select('*');
                              $this->db->where('poi_ref',$pval->poi_ref);
                              $this->db->limit('6',6);
                              $query = $this->db->get('po_item');
                              $num = $query->num_rows();
                         ?>
                            <tr >
                                <th scope="row"><?php echo $i; ?></th>
                                <?php $sum = $pval->poi_priceunit*$pval->poi_qty;?>
                                <td align="center"><?php echo substr($pval->poi_costcode, -5);?></td>
                                <td><?php echo $pval->poi_matname;?></td>
                                <td class="text-right"><?php echo $pval->poi_qty;?></td>
                                <td class="text-right"><?php echo $pval->poi_unit?></td>
                                <td class="text-right"><?php echo $pval->poi_discountper1?> %</td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_priceunit, 2, '.', ',');?></td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_disamt, 2, '.', ',');?></td>
                            </tr>

                          <?php $i++; } if ($num=="1") { ?>
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
                            <?php  } if ($num=="2") {?>
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
                            <?php }elseif($num=="3"){ ?>
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
                            <?php }elseif($num=="4"){ ?>
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
                            <?php }elseif($num=="5"){ ?>
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
                            <?php } ?>

                       </tbody>
<?php }else{ ?>
                  <tbody>
                        <?php
                        $i=9;
                            $total = 0;
                            $discount = 0;
                            $allnet = 0;
                             foreach($resi as $pval){
                              ?>
                             <?php  $this->db->select('*');
                              $this->db->where('poi_ref',$pval->poi_ref);
                              $this->db->limit('6',6);
                              $query = $this->db->get('po_item');
                              $num = $query->num_rows();
                         ?>
                            <tr >
                                <th scope="row"><?php echo $i; ?></th>
                                <?php $sum = $pval->poi_priceunit*$pval->poi_qty;?>
                                <td align="center"><?php echo substr($pval->poi_costcode, -5);?></td>
                                <td><?php echo $pval->poi_matname;?></td>
                                <td class="text-right"><?php echo $pval->poi_qty;?></td>
                                <td class="text-right"><?php echo $pval->poi_unit?></td>
                                <td class="text-right"><?php echo $pval->poi_discountper1?> %</td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_priceunit, 2, '.', ',');?></td>
                                <td class="text-right"><?php echo number_format((double)$pval->poi_disamt, 2, '.', ',');?></td>
                            </tr>

                          <?php $i++; } if ($num=="1") { ?>
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
                            <?php  } if ($num=="2") {?>
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
                            <?php }elseif($num=="3"){ ?>
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
                            <?php }elseif($num=="4"){ ?>
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
                            <?php }elseif($num=="5"){ ?>
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
                            <?php } ?>

                       </tbody>
<?php } ?>
                         </table>




                    <div class="footer" >
                          <div class="col-xs-6" style="position:fixed;" >
                         <div class="row text-left" style="margin-top:-10px;">
                            หมายเหตุ : <?php echo $remark;?> <br>
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
                            $t = $total2-$xdsum;
                            $tax = ($xdsum*7/100); ?>
                              <strong>
                                <?php echo number_format((double)$total2, 2, '.', ',');?> บาท<br>

                                <?php echo number_format((double)$exdisamt, 2, '.', ',');?> บาท<br>
                                <?php echo number_format((double)$tax, 2, '.', ',');?> บาท<br>
                                <?php echo number_format((double)$xdsum+$tax,2, '.', ',');?> บาท<br>
                              </strong>
                    </div>
                 </div>

 </div> <!-- ++++++++ -->


   <div class="pdf-footer">

   <div class="pdf-footer" style="margin-top: -10px;">
 <p style="margin-top: 30px; font-size: 11px; margin-right: 100px;">สถานที่ส่งสินค้า/Delivery place : <?php echo $place;?></p>
 <p style="margin-top: -10px; font-size: 11px;">วันที่ส่งสินค้า/Delivery date   :    <?php echo $deliver;?></p>
 <p style="margin-top: -25px; font-size: 11px; margin-left: 220px;">กำหนดการชำระเงิน / Term of payment  :    <?php echo $term;?> วัน</p>

            <table class="table table-bordered">
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
</div><!-- end  pdf-footer -->

</div>



</div>


</body>
</html>
