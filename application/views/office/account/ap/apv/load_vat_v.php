<div class="table table-responsive">
<table class="table table-xxs">
     <thead>
       <tr>
                 <th width="5%" class="text-center">#</th>
                 <th width="15%">รหัสสินค้า</th>
                 <th width="20%">ชื่อสินค้า</th>
                 <!-- <th width="auto">ต้นทุน</th> -->
                 <th class="text-center" width="10%">ปริมาณ</th>
                 <th class="text-center" width="10%">หน่วย</th>
                 <th class="text-center" width="10%">ราคา/หน่วย</th>
                 <th class="text-center" width="5%">ส่วนลด1(%)</th>
                 <th class="text-center" width="5%">ส่วนลด2(%)</th>
                 <th class="text-center" width="5%">ส่วนลดพิเศษ(Amt.)</th>
                 <th class="text-center" width="5%">ภาษี</th>
                 <th class="text-center" width="10%">จำนวนเงิน</th>
                <!--  <th width="5%">ส่วนลด</th> -->
                 <!-- <th width="10%">รวมสุทธิ</th> -->
                 <!-- <th colspan="2" width="auto">จัดการ</th> -->
               </tr>
     </thead>
     <tbody>
       <?php $n=1; $priceunit=0; $totamt=0; $total=0; $vat=0; $disamt1=0; $disamt2=0; $disamt1tot=0; $disamt2tot=0; $disamtex=0; $totnetamt=0; foreach ($poitem as $v) {?>
       <tr>
         <th class="text-center"><?php echo $n; ?></th>
         <th><div class="input-group"><input type="text" class="form-control input-sm" id="newmatcodej<?php echo $n; ?>" name="matcodej[]" value="<?php echo $v->poi_matcode; ?>"><div class="input-group-btn"><button type="button" class="openvat<?php echo $n;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#openvat<?php echo $n; ?>"><i class="icon-search4"></i></button></div></div></th>
         <td>
           <input type="hidden" name="costcodej[]" value="<?php echo $v->poi_costcode; ?>">
           <input type="hidden" name="costnamej[]" value="<?php echo $v->poi_costname; ?>">
           <!-- <input type="text" name="matcodei[]" id="newmatcode<?php echo $n; ?>" value="<?php echo $v->poi_matcode; ?>">  -->
           <input type="text" class="form-control input-sm" name="matnamej[]" readonly id="newmatnamej<?php echo $n;?>" value="<?php echo $v->poi_matname; ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" id="qty<?php echo $n; ?>" name="qtyj[]" value="<?php echo $v->poi_qty; ?>">
         </td>
         <td>
           <div class="input-group"><input type="text" class="form-control input-sm" id="uniti<?php echo $n; ?>" name="unitj[]" value="<?php echo $v->poi_unit; ?>"><div class="input-group-btn"><button type="button" class="gunit<?php echo $n; ?> btn btn-default btn-sm" data-toggle="modal" data-target="#gunit<?php echo $n; ?>"><i class="icon-search4"></i></button></div></div>
         </td>

         <td class="text-center">
           <input type="text" class="form-control input-sm" name="priceunitj[]" value="<?php echo $v->poi_priceunit; ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" name="discount1j[]" value="<?php echo $v->poi_discountper1; ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" name="discount2j[]" value="<?php echo $v->poi_discountper2; ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" name="disexj[]" value="<?php echo $v->po_disex; ?>">
         </td>
         <td  class="text-center">
           <input type="text" class="form-control input-sm" name="vatamtj[]" value="<?php echo ($v->poi_amount*$v->poi_vat/100); ?>">
           <input type="hidden" name="vatperj[]" value="<?php echo ($v->poi_vat); ?>">
         </td>
         <td class="text-center">
           <input type="text" class="form-control input-sm" name="amountj[]" value="<?php echo $v->poi_netamt; ?>">
         </td>
         <!-- <td>#</td> -->
       </tr>
        <div id="openvat<?php echo $n;?>" class="modal fade" data-backdrop="false">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Select Material</h5>
                      </div>

                      <div class="modal-body">
                        <div class="loadmat<?php echo $n;?>">

                        </div>
                      </div>
                      <div class="modal-footer">
                        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(".openvat<?php echo $n;?>").click(function(){
                    $(".loadmat<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                    $(".loadmat<?php echo $n;?>").load('<?php echo base_url(); ?>share/material_id/<?php echo $n; ?>');
                  });
                </script>

       <?php $n++;
       $priceunit = $priceunit+$v->poi_priceunit;
        $vat=$vat+($v->poi_amount*$v->poi_vat/100);
        $total=($total+$v->poi_netamt)+($v->poi_amount*$v->poi_vat/100);
        $disamt1 = $disamt1+(($v->poi_amount*$v->poi_discountper1)/100);
        $disamt1tot = $disamt1tot+($v->poi_amount-$disamt1);
        $disamt2 = $disamt2+($disamt1tot*$v->poi_discountper2)/100;
        $disamt2tot = $disamt2tot+($disamt1tot-$disamt2);
        $disamtex = $disamtex+($disamt2tot-$v->po_disex);
       $totamt = $totamt+$v->poi_amount;
       $totnetamt = $totnetamt+$v->poi_netamt;
      } ?>
       <tr>
         <th colspan="10" class="text-center"> Total</th>
         <!-- <th class="text-center"><?php echo number_format($priceunit,2); ?></th>
         <th class="text-center" ><?php echo number_format($vat,2); ?></th> -->
         <th class="text-center" ><input type="text" class="form-control input-sm" name="totmat" id="totmat" value="<?php echo number_format($totnetamt,2); ?>"></th>
       </tr>
     </tbody>
   </table>
</div>
