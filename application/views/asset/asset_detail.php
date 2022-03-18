<?php $n=1;foreach ($res as $key) { ?>
<tr>                 
<td><?php echo $key->matidi; ?></td>  
<td><?php echo $key->matnamei; ?></td>  
<td><?php echo $key->remark; ?></td>  
<td><?php echo $key->price_unit; ?></td>  
<td><?php echo $key->uniti; ?></td>  
<td><?php echo $key->qtyi; ?>
<input type="hidden" name="matidi[]" value="<?php echo $key->matidi; ?>">
<input type="hidden" name="matnamei[]" value="<?php echo $key->matnamei; ?>">
<input type="hidden" name="remark[]" value="<?php echo $key->remark; ?>">
<input type="hidden" name="price_unit[]" value="<?php echo $key->price_unit; ?>">
<input type="hidden" name="uniti[]" value="<?php echo $key->uniti; ?>">
<input type="hidden"  name="amounti[]" value="<?php echo $key->amounti; ?>">
<input type="hidden" name="qtyi[]" value="<?php echo $key->qtyi; ?>">		
</td>  
<td class="countable"><?php echo $key->amounti; ?></td>  
<td></td>  
</tr>
<?php $n++; } ?>

