<!-- <div>
  <pre>
  <?php var_dump($poitem); ?>
  </pre>
</div> -->
<div class="tab-pane has-padding" id="pa-pill2">



  <div id="tax" class="table-responsive">
    <table class="table table-hover table-xxs">
     <thead>
      <tr>
         <th width="10%">Tax No</th>
         <th width="20%">Material Code</th>
         <th width="20%">Material Name</th>
         <th class="text-center" width="7%">QTY</th>
         <th class="text-center" width="7%">Unit Name</th>
         <th class="text-center" width="7%">Price / Unit</th>
       <!--   <th class="text-center" width="3%">ส่วนลด1(%)</th>
         <th class="text-center" width="3%">ส่วนลด2(%)</th> -->
         <th class="text-center" width="10%">Amount</th>
         <th class="text-center" width="7%">Vat %</th>
         <th class="text-center" width="10%">VAT Amount</th>
         <th class="text-center"><div style="width:120px;"></div>Net Amount</th>
       </tr>
     </thead>
     <tbody  id="bodymat">
       <?php $n=1; foreach ($poitem as $v) {?>
       
       <tr>
       <td><input readonly="true" type="text" class="form-control input-sm" readonly="true" name="poi_ref[]" value="<?php echo $v->poi_ref; ?>"></td>
         <th ><div class="input-group"><input type="text" class="form-control input-sm" id="newmatcode<?php echo $n; ?>" name="matcodei[]" readonly="true" value="<?php echo $v->poi_matcode; ?>">
         </div></th>
         <td>
           <input type="hidden" name="costcodei[]" value="<?php echo $v->poi_costcode; ?>">
           <input type="hidden" name="costnamei[]" value="<?php echo $v->poi_costname; ?>">
           <input type="hidden" name="poi_id[]" value="<?php echo $v->poi_item; ?>">
           <!-- <input type="text" name="matcodei[]" id="newmatcode<?php echo $n; ?>" value="<?php echo $v->poi_matcode; ?>">  -->
           <input readonly="true" type="text" class="form-control input-sm" readonly="true" name="matnamei[]" id="newmatname<?php echo $n;?>" value="<?php echo $v->poi_matname; ?>">
         </td>
         <td>
           <input readonly="true" type="text"  class="form-control input-sm text-right" id="qtyi<?php echo $n; ?>" name="qtyi[]" value="<?php echo $v->poi_receive; ?>">
         </td>
         <td>
           <div class="input-group"><input readonly="true" type="text" class="form-control input-sm text-right" id="uniti<?php echo $n; ?>" name="uniti[]" value="<?php echo $v->poi_unit; ?>"><div class="input-group-btn"></div></div>
         </td>

         <td>
           <input readonly="true" type="text"  class="form-control input-sm text-right" name="priceuniti[]" value="<?php echo $v->poi_priceunit; ?>">
         </td>
<!-- 
         <td>
           <input readonly="true" type="text" class="form-control input-sm text-right" name="discount1i[]" value="<?php echo $v->poi_discountper1; ?>">
         </td>
         <td>
           <input readonly="true" type="text" class="form-control input-sm text-right" name="discount2i[]" value="<?php echo $v->poi_discountper2; ?>">
         </td> -->
        <td>
           <input readonly="true" type="text"  class="form-control input-sm text-right" name="amtt[]" value="<?php echo $v->poi_receive*$v->poi_priceunit; ?>">
         </td>
         <td>
           <input readonly="true" type="text" class="form-control input-sm text-right" name="vatamti[]" value="<?php echo $v->poi_vatper; ?>">
         </td>
         <td>
           <input readonly="true" type="text"  class="form-control input-sm text-right" name="tovat[]" value="<?=$v->poi_vatper*($v->poi_receive*$v->poi_priceunit)/100; ?>">
         </td>
         <td>
           <input readonly="true" type="text" class="form-control input-sm text-right" readonly name="amounti[]" value="<?=$v->poi_vatper*($v->poi_receive*$v->poi_priceunit)/100+$v->poi_receive*$v->poi_priceunit; ?>">
         </td>
         <!-- <td>#</td> -->
       </tr>
               
      <?php  $n++;  } ?>
     </tbody>
   </table>
  </div>
</div>