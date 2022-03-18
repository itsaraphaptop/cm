<?php
	foreach ($get_inv as $key => $value) {
		// echo "<pre>";
		// var_dump($get_inv);
		// die();
?>
	<tr>
		<td>
			<?= $value->inv_ref ?>
			<input type="hidden" name="inv_no[]" value="<?= $value->inv_ref ?>">	
			<input type="hidden" name="ar_no[]" value="<?= $value->inv_receipt ?>">	
		</td>
		<td>
			<?= $inv_type ?>
			<input type="hidden" name="inv_type[]" value="<?= $value->inv_type ?>">	
		</td>
		<td>
			<?= $value->inv_period ?>
			<input type="hidden" name="inv_period[]" value="<?= $value->inv_period ?>">		
		</td>
		<td>
			<?= $value->inv_remark ?>
			<input type="hidden" name="inv_remark[]" value="<?= $value->inv_remark ?>">	
		</td>
		<td>
			<?= $value->systemname ?>
			<input type="hidden" name="inv_system[]" value="<?= $value->inv_system ?>">	
		</td>
		<td>
			<input 
			type="text" 
			name="amt[]" 
			class="pay form-control text-right" 
			row="<?= $value->inv_ref ?>_<?= $value->invi_id ?>" 
			id="amt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" 
			amt="<?= $value->inv_retentionamt-$value->inv_payment ?>" 
			value="<?= $value->inv_retentionamt-$value->inv_payment ?>">
			<input type="hidden" name="inv_payment[]" value="<?= $value->inv_payment ?>">
			<input type="hidden" name="invi_id[]" value="<?= $value->inv_ref ?>_<?= $value->invi_id ?>">	
		</td>
		<td>
			0<input type="hidden" value="0" name="advance[]">	
		</td>
		<td>
			0<input type="hidden" value="0" name="amt_advance[]">	
		</td>
		<td>
			0<input type="hidden" value="0" name="wt[]">
		</td>
		<td>
			0<input type="hidden" value="0" name="amt_wt[]" class="form-control text-right">	
		</td>
		<td>
			0<input type="hidden" value="0" name="perRetention[]">
		</td>
		<td>
			0<input type="hidden" value="0" name="amtRetention[]" class="form-control text-right">
		</td>
		<td><?= $value->inv_vat ?>
			<input type="hidden" name="vat[]" id="vat<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_vat ?>">
		</td>
		<td>
			<input type="text" name="amt_vat[]" id="amt_vat<?= $value->inv_ref ?>_<?= $value->invi_id ?>" class="form-control text-right" value="<?= $value->inv_vatamt ?>">	
		</td>
		<td>
			<input type="text" name="net_amt[]" id="net_amt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" class="form-control text-right"  value="<?= $value->inv_netamt ?>">
		</td>
	</tr>
<?php
	}
?>

<script type="text/javascript">
	$('.pay').keyup(function(event) {
		var row = $(this).attr('row');
		var max_amt = ($(this).attr('amt')*1);
		var amt = ($(this).val()*1);
		var vat = ($('#vat'+row).val()*1);
		var vat_amt = (vat*amt)/100;
		var nat_amt = amt+vat_amt;
		if (max_amt >= amt ) {
			$('#amt_vat'+row).val(vat_amt);
			$('#net_amt'+row).val(nat_amt);
		}else{
			$(this).val("");
			$('#amt_vat'+row).val("");
			$('#amt_wt'+row).val("");
			$('#net_amt'+row).val("");
		}
	});
</script>