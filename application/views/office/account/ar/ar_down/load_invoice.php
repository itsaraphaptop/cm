<?php
	foreach ($get_inv as $key => $value) {
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
			<input type="text" 
					name="amt[]" 
					class="pay form-control text-right" 
					row="<?= $value->inv_ref ?>_<?= $value->invi_id ?>" 
					id="amt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" 
					amt="<?= $value->inv_downamt-$value->inv_payment ?>" 
					value="<?= $value->inv_downamt-$value->inv_payment ?>">
			<input type="hidden" name="inv_payment[]" value="<?= $value->inv_payment ?>">	
			<input type="hidden" name="invi_id[]" value="<?= $value->inv_ref ?>_<?= $value->invi_id ?>">	
		</td>
		<td>
			0
			<input type="hidden" name="advance[]" value="0">	
		</td>
		<td>
			0
			<input type="hidden" name="amt_advance[]" value="0">	
		</td>
		<td>
			<?= $value->inv_wtper ?>
			<input type="hidden" name="wt[]" id="wt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_wtper ?>" readonly="true" >	
		</td>
		<td>
			<input type="text" name="amt_wt[]" class="pay form-control text-right" value="<?= $value->inv_lesswt ?>" id="amt_wt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" readonly="true" >
		</td>
		<td>0
			<input type="hidden" name="lessadv[]" value="0">
		</td>
		<td>0
			<input type="hidden" name="retention[]" class="form-control text-right" value="0">
		</td>
		<td>
			<?= $value->inv_vatper ?>
			<input type="hidden" name="vat[]" id="vat<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_vatper ?>" readonly="true" >	
		</td>
		<td>
			<input type="text" name="amt_vat[]" class="form-control text-right" value="<?= $value->inv_vatamt ?>" id="amt_vat<?= $value->inv_ref ?>_<?= $value->invi_id ?>" readonly="true" >
		</td>
		<td>
			<input type="text" name="net_amt[]" class="form-control text-right" value="<?= $value->inv_netamt ?>" id="net_amt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" readonly="true" >	



			<!-- def value -->
			<input type="hidden" name="perRetention[]" id="" value="0">
			<input type="hidden" name="amtRetention[]" value="0">
			<!-- def value -->
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
