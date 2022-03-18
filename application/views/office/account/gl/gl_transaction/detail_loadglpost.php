<?php $n=1; 
	  $samtdr = 0;
	  $samtcr = 0;
foreach ($vc as $key) { 
$samtdr = $samtdr+$key->amtdr;
$samtcr = $samtcr+$key->amtcr;
	?>
<tr>
	<td><?php echo $n; ?></td>
	<td><?php echo $key->vchno; ?></td>
	<td><?php echo $key->vchdate; ?></td>
	<td><?php echo $key->acct_no; ?></td>
	<td><?php echo $key->project_name; ?></td>
	<td><?php echo $key->systemname; ?></td>
	<td><?php echo $key->costcode; ?></td>
	<td class="text-right"><?php echo number_format($key->amtdr,2); ?></td>
	<td class="text-right"><?php echo number_format($key->amtcr,2); ?></td>
</tr>

<?php $n++; } ?>
<tr>
<td colspan="7" class="text-center">Total</td>
<td class="text-right"><?php echo number_format($samtdr,2); ?></td>
<td class="text-right"><?php echo number_format($samtcr,2); ?></td>
</tr>