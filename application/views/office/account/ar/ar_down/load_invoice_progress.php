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
			<input type="text" name="amt[]" class="pay form-control text-right" row="<?= $value->inv_ref ?>_<?= $value->invi_id ?>" id="amt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" amt="<?= $value->inv_progressamt-$value->inv_payment ?>" value="<?= $value->inv_progressamt-$value->inv_payment ?>">
			<input type="hidden" name="inv_payment[]" value="<?= $value->inv_payment ?>">
			<input type="hidden" name="invi_id[]" value="<?= $value->inv_ref ?>_<?= $value->invi_id ?>">	
		</td>
		<td>
			<?= $value->inv_ilessadv ?>
			<input type="hidden" name="advance[]" id="advance<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_ilessadv ?>">	
		</td>
		<td>
			<input type="text" class="form-control" name="amt_advance[]" id="amt_advance<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_lessadvance ?>">	
		</td>
		<td>
			<?= $value->inv_iwt ?>
			<input type="hidden" name="wt[]" id="wt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_iwt ?>">
		</td>
		<td>
			<input type="text" name="amt_wt[]" class="pay form-control text-right" value="<?= $value->inv_lesswt ?>" id="amt_wt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" readonly="true" >	
		</td>
		<td>
			<?= $value->inv_lessref ?>
			<input type="hidden" name="perRetention[]" id="re_per<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_lessref ?>">
		</td>
		<td>
			<input type="text" name="amtRetention[]" class="pay form-control text-right" value="<?= $value->inv_lessretention ?>" id="retention<?= $value->inv_ref ?>_<?= $value->invi_id ?>" readonly="true" >
		</td>
		<td>
			<?= $value->inv_ivat ?>
			<input type="hidden" name="vat[]" id="vat<?= $value->inv_ref ?>_<?= $value->invi_id ?>" value="<?= $value->inv_ivat ?>">
		</td>
		<td>
			<input type="text" name="amt_vat[]" class="form-control text-right" value="<?= $value->inv_vatamt ?>" id="amt_vat<?= $value->inv_ref ?>_<?= $value->invi_id ?>" readonly="true" >	
		</td>
		<td>
			<input type="text" name="net_amt[]" class="form-control text-right" value="<?= $value->inv_netamt ?>" id="net_amt<?= $value->inv_ref ?>_<?= $value->invi_id ?>" readonly="true" >	
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
		var advance = ($('#advance'+row).val()*1);
		var re_per = ($('#re_per'+row).val()*1);
		var advance_amt = (advance*amt)/100;
		var cut_down = amt-advance_amt;
		var vat_amt = (vat*cut_down)/100;
		var re_per_amt = (re_per*amt)/100;
		var wt_amt = (wt*cut_down)/100;
		var nat_amt = ((cut_down-wt_amt)-re_per_amt)+vat_amt;
		if (max_amt >= amt ) {
			$('#amt_vat'+row).val(vat_amt);
			$('#amt_wt'+row).val(wt_amt);
			$('#retention'+row).val(re_per_amt);
			$('#amt_advance'+row).val(advance_amt);
			$('#net_amt'+row).val(nat_amt);
		}else{
			$(this).val("");
			$('#amt_vat'+row).val("");
			$('#amt_wt'+row).val("");
			$('#net_amt'+row).val("");
		}
	});



</script>