<?php
	foreach ($get_inv as $key => $value) {
?>
	<tr>
		<td>
			<?= $value->trad_inv ?>
			<input type="hidden" name="inv_no[]" value="<?= $value->trad_inv?>">	
			<input type="hidden" name="ar_no[]" value="<?= $value->ar_no ?>">	
		</td>
		<td>
			other
			<input type="hidden" name="inv_type[]" value="<?= $value->inv_type ?>">	
		</td>
		<td>
			<input type="hidden" name="inv_period[]" value="0">		
		</td>
		<td>
			<?= $value->remart ?>
			<input type="hidden" name="inv_remark[]" value="<?= $value->remart ?>">	
		</td>
		<td>
			<?= $value->systemname ?>
			<input type="hidden" name="inv_system[]" value="<?= $value->systemcode ?>">	
		</td>
		<td>
			<input 
			type="text" 
			name="amt[]" 
			class="pay form-control text-right" 
			row="<?= $value->trad_inv ?>_<?= $value->itrad_id ?>" 
			id="amt<?= $value->trad_inv ?>_<?= $value->itrad_id ?>" 
			amt="<?= $value->amt ?>" 
			value="<?= $value->amt ?>">
			<input type="hidden" name="bill_total[]" value="<?= $value->amt ?>">
			<input type="hidden" name="invi_id[]" value="<?= $value->trad_inv ?>_<?= $value->itrad_id ?>">
			<input type="hidden" value="0" name="ref_trading[]" value="<?= $value->ref_tradid ?>">	
		</td>
		<td>
			0<input type="hidden" value="0" name="advance[]">	
		</td>
		<td>
			0<input type="hidden" value="0" name="amt_advance[]">	
		</td>
		<td>
			0
			<input type="hidden" name="wt[]" value="0" >	
		</td>
		<td>
			0
			<input type="hidden" name="amt_wt[]" value="0" >
		</td>
		<td>
			0<input type="hidden" value="0" name="perRetention[]">
		</td>
		<td>
			0<input type="hidden" value="0" name="amtRetention[]" class="form-control text-right">
		</td>
		<td><?= $value->vat ?>
			<input type="hidden" name="vat[]" id="vat<?= $value->trad_inv ?>_<?= $value->itrad_id ?>" value="<?= $value->vat ?>">
		</td>
		<td>
			<input type="text" name="amt_vat[]" id="amt_vat<?= $value->trad_inv ?>_<?= $value->itrad_id ?>" class="form-control text-right" value="<?= ($value->vat/100)*$value->amt ?>">	
		</td>
		<td>
			<input type="text" name="net_amt[]" id="net_amt<?= $value->trad_inv ?>_<?= $value->itrad_id ?>" class="form-control text-right"  value="<?= $value->amt+($value->vat/100)*$value->amt ?>">
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
		// var wt = ($('#wt'+row).val()*1);
		var vat_amt = (vat*amt)/100;
		// var wt_amt = (wt*amt)/100;
		var nat_amt = (amt+vat_amt);
		if (max_amt >= amt ) {
			$('#amt_vat'+row).val(vat_amt);
			$('#net_amt'+row).val(nat_amt);
		}else{
			$(this).val("");
			$('#amt_vat'+row).val("");
			$('#net_amt'+row).val("");
		}
	});
</script>