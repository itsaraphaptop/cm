<?php $n=1;foreach ($res as $key) { ?>
<tr>                 
<td><?php echo $n; ?></td>  
<td><?php echo $key->transfer_assetcode; ?></td>  
<td><?php echo $key->transfer_assetname; ?></td>  
<td><?php echo $key->transfer_sr; ?></td>  
<td><?php echo $key->transfer_projectname; ?></td>  
<td><?php echo $key->transfer_job; ?></td>  
<td><?php echo $key->transfer_departmentname; ?></td>  
<td><?php echo $key->transfer_liseid; ?></td> 
<td><?php echo $key->transfer_lisename; ?></td>  
<td><?php echo $key->transfer_availablity; ?></td>  
<td><?php echo $key->transfer_id; ?></td>  
<td><?php echo $key->transfer_name; ?></td>   
<td><?php echo $key->transfer_locode; ?></td>   
<td><?php echo $key->transfer_loname; ?></td>   
<td><?php echo $key->transfer_remark; ?></td>   
<td></td> 
<td></td>   
</tr>
<?php $n++; } ?>
<script>
	$(".insertrow").prop('disabled', true);
</script>