<?php
	foreach ($get_inv as $key => $value) {
?>
	<tr>
		<td>
			<?= $value->ot_code ?>
			<input type="hidden" name="inv_no[]" value="<?= $value->ot_code ?>">	
			<input type="hidden" name="ar_no[]" value="<?= $value->ar_no ?>">	
		</td>
		<td>
			other
			<input type="hidden" name="inv_type[]" value="other">	
		</td>
		<td>
			<input type="hidden" name="inv_period[]" value="0">		
		</td>
		<td>
			<?= $value->ot_remark ?>
			<input type="hidden" name="inv_remark[]" value="<?= $value->ot_remark ?>">	
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
			row="<?= $value->ot_code ?>_<?= $value->ot_id ?>" 
			id="amt<?= $value->ot_code ?>_<?= $value->ot_id ?>" 
			amt="<?= $value->otde_amount-$value->bill_total ?>" 
			value="<?= $value->otde_amount-$value->bill_total ?>">
			<input type="hidden" name="bill_total[]" value="<?= $value->bill_total ?>">
			<input type="hidden" name="invi_id[]" value="<?= $value->ot_code ?>_<?= $value->ot_id ?>">
			<input type="hidden" value="0" name="ref_other[]" value="<?= $value->ref_other ?>">	
		</td>
		<td>
			0<input type="hidden" value="0" name="advance[]">	
		</td>
		<td>
			0<input type="hidden" value="0" name="amt_advance[]">	
		</td>
		<td>
			<?= $value->ot_wt ?>
			<input type="hidden" name="wt[]" id="wt<?= $value->ot_code ?>_<?= $value->ot_id ?>" value="<?= $value->ot_wt ?>" readonly="true" >	
		</td>
		<td>
			<input type="text" name="amt_wt[]" class="pay form-control text-right" value="<?= $value->otde_atamt ?>" id="amt_wt<?= $value->ot_code ?>_<?= $value->ot_id ?>" readonly="true" >
		</td>
		<td>
			0<input type="hidden" value="0" name="perRetention[]">
		</td>
		<td>
			0<input type="hidden" value="0" name="amtRetention[]" class="form-control text-right">
		</td>
		<td><?= $value->ot_vat ?>
			<input type="hidden" name="vat[]" id="vat<?= $value->ot_code ?>_<?= $value->ot_id ?>" value="<?= $value->ot_vat ?>">
		</td>
		<td>
			<input type="text" name="amt_vat[]" id="amt_vat<?= $value->ot_code ?>_<?= $value->ot_id ?>" class="form-control text-right" value="<?= $value->otde_vat ?>">	
		</td>
		<td>
			<input type="text" name="net_amt[]" id="net_amt<?= $value->ot_code ?>_<?= $value->ot_id ?>" class="form-control text-right"  value="<?= $value->otde_netamount ?>">
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
		var wt = ($('#wt'+row).val()*1);
		var vat_amt = (vat*amt)/100;
		var wt_amt = (wt*amt)/100;
		var nat_amt = (amt+vat_amt)-wt_amt;
		if (max_amt >= amt ) {
			$('#amt_vat'+row).val(vat_amt);
			$('#amt_wt'+row).val(wt_amt);
			$('#net_amt'+row).val(nat_amt);
		}else{
			$(this).val("");
			$('#amt_vat'+row).val("");
			$('#amt_wt'+row).val("");
			$('#net_amt'+row).val("");
		}
	});
</script>