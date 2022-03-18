<table class="table table-hover table-xxs table-responsive">
    <thead>
      <tr>
        <th class="text-center">Less Other</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Remark</th>
      </tr>
    </thead>
 		<tbody id="bodymat">
			<?php if($head) {
           $i=1; foreach ($head as $key) { 
        ?>
 			<tr>
 				<td><input type="text" readonly="true" class="form-control input-sm" name="aps_b[]" value="<?php echo $key->id_bill; ?>"></td>
				<td><input type="text" readonly="true" class="form-control input-sm text-right" name="aps_lamt[]" value="<?php echo $key->less_amount; ?>"></td>
				<td><input type="text" readonly="true" class="form-control input-sm" name="aps_des[]" value=""></td>	
			</tr>
      <?php } }else{ "";  }  ?>

 		</tbody>
</table>