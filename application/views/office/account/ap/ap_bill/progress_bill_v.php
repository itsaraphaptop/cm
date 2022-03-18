<table class="table table-hover table-xxs table-responsive">
    <thead>
      <tr>
        <th>No.</th>
        <th class="text-center">Material Code</th>
        <th class="text-center">Material Name</th>
        <th class="text-center">QTY</th>
        <th class="text-center">Price/Unit</th>
        <th class="text-center">Amount</th>
        <th class="text-center">This Qty</th>
        <th class="text-center">This Amount</th>
      </tr>
    </thead>
 		<tbody id="bodymat">

				<?php if($de) {
 				   $i=1; foreach ($de as $key) { 
 				?>
 				<tr>
 				<td><?php echo $i; ?></td>
 				<td >
                     <?php 
                    $subheader = substr($key->api_costcode,0,1);
                    if ($subheader != "G") {
                    $subde = substr($key->api_costcode,1,6);
                    }else{
                    $subde = $key->api_costcode;    
                    
                    }
                     ?>
                <input type="text" readonly="true" class="form-control input-sm" name="aps_mc[]" value="<?php echo $key->api_matcode; ?>">
                <input type="hidden" readonly="true" name="sub_cost[]" class="form-control " value="<?php echo $subde; ?>">
                </td>


                <td><input type="text" name="" class="form-control" name="aps_mn[]" value="<?=$key->api_matname;?>" readonly="true"></td>
				<td><input type="text" readonly="true" class="form-control input-sm  text-right" name="aps_qty[]" value="<?php echo $key->api_qty; ?>"></td>
				<td><input type="text" readonly="true" class="form-control input-sm text-right "  name="aps_price[]" value="<?php echo $key->api_amount/$key->api_qty; ?>"></td>
				<td><input type="text" readonly="true" class="form-control input-sm text-right " name="aps_amount[]" value="<?php echo $key->api_amount; ?>"></td>
				 
				<td><input type="text" readonly="true" class="form-control input-sm text-right " name="aps_thqty[]" value="<?php echo $key->api_thisqty; ?>"></td>
				<td><input type="text" readonly="true" class="form-control input-sm text-right " name="aps_thamt[]" value="<?php echo $key->api_thisamount; ?>"></td> 
			</tr>
 			<?php $i++;  ?>
            <?php } ?> 
            <?php }else{ "";  }  ?>
 		</tbody>
</table>