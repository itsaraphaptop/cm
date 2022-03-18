<?php $n=1;foreach ($res as $key) { ?>
<tr>                 
<td class="text-center"><?php echo $n; ?><input type="hidden" name="transfer_no[]" value="<?php echo $key->cod_no; ?>"></td>  
<td class="text-center"><?php echo $key->transfer_assetcode; ?><input type="hidden" name="transfer_assetcode[]" value="<?php echo $key->transfer_assetcode; ?>"><input type="hidden" name="chki[]" value="X"></td>  
<td class="text-center"><?php echo $key->transfer_assetname; ?><input type="hidden" name="transfer_assetname[]" value="<?php echo $key->transfer_assetname; ?>" ></td>  
<td class="text-center"><?php echo $key->transfer_sr; ?><input type="hidden" name="transfer_sr[]" value="<?php echo $key->transfer_sr; ?>"></td>  
<td class="text-center"><?php echo $key->transfer_quantity; ?><input type="hidden" name="transfer_quantity[]" value="<?php echo $key->transfer_quantity; ?>"></td>  
<td class="text-center"><?php echo $key->transfer_liseid; ?><input type="hidden" name="transfer_liseid[]" value="<?php echo $key->transfer_liseid; ?>"></td>  
<td class="text-center"><?php echo $key->transfer_lisename; ?><input type="hidden" name="transfer_lisename[]" value="<?php echo $key->transfer_lisename; ?>"></td>  
<td class="text-center"><?php echo $key->transfer_residual; ?><input type="hidden" name="transfer_residual[]" value="<?php echo $key->transfer_residual; ?>"></td> 
<td class="text-center"><input type="checkbox" name="check[]" id="check<?php echo $n; ?>"  <?php if ($key->checktranfer=='1') { echo 'checked'; } ?>></td>  

<td class="text-center"><input type="text" name="transfer_remark[]" class="form-control input-sm" value="<?php echo $key->transfer_remark; ?>"></td>  
<td class="text-center"><input type="hidden" name="checktranfer1[]" id="checktranfer<?php echo $n; ?>" value="<?php echo $key->checktranfer; ?>"></td>
</tr>

<script>
	$("#check<?php echo $n; ?>").change(function() {
    if(this.checked) {
       $("#checktranfer<?php echo $n; ?>").val(1);
    }else{
    	$("#checktranfer<?php echo $n; ?>").val("");
    }
});
</script>

<?php $n++; } ?>




