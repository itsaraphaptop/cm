<table class="table table-bordered table-xs">
	<thead>
		<tr>
			<th>#</th>
			<th>Inv. No.</th>
			<th>Inv. Date.</th>
			<th>Project</th>
			<th>Customer</th>
			<th>Net Amount</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php
$i=0;
	foreach ($ic as $key => $value) {
$i++;
?>
	<tr>
		<td><?=$i?></td>
		<td><?=$value->trad_inv?></td>
		<td><?=$value->inv_date?></td>
		<td><?=$value->projectcode?> - <?=$value->projectname?></td>
		<td><?=$value->cus_projectcode?> - <?=$value->cus_projectname?></td>
		<td><?=$value->sum_netamount?></td>
		<td>
			<a class="label bg-blue" data-dismiss="modal" 
			onclick="select_inv('<?=$value->trad_id?>',
								'<?=$value->trad_inv?>',
								'<?=$value->inv_date?>',
								'<?=$value->projectcode?>',
								'<?=$value->projectname?>',
								'<?=$value->cus_projectcode?>',
								'<?=$value->cus_projectname?>',
								'<?=$value->cr_term?>',
								'<?=$value->due_date?>',
								'<?=$value->vat?>',
								'<?=$value->currency_name_en?>',
								'<?=$value->trad_exchange?>')">
			Select
		</a>
		</td>
	</tr>
<?php
	}
?>
	</tbody>
</table>

<script type="text/javascript">
	function select_inv(inv_id,trad_inv,inv_date,projectcode,projectname,cus_projectcode,cus_projectname,cr_term,due_date,vat,curency,exchange) {
		$('#inv_no').val(trad_inv);
		$('#inv_date').val(inv_date);
		$('#project_code').val(projectcode);
		$('#project_name').val(projectname);
		$('#cus_code').val(cus_projectcode);
		$('#cus_name').val(cus_projectname);
		$('#system_name').val();
		$('#vat').val(vat);
		$('#curency').val(curency);
		$('#exchange').val(exchange);
		$('#cr_term').val(cr_term);
		$('#due_date').val(due_date);

		$.get(`<?= base_url() ?>ar/get_inv_detail/${inv_id}`, function() {
		}).done(function(data) {
			
			var json = jQuery.parseJSON(data);
			$.each(json, function(index, val) {
				var amount  = val.itrad_netamount*1;
				var vat_c = vat*1;
				var vat_total = (vat_c/100)*amount;
				var tr = `<tr>
							<td>
								${index+1}
								<input type="hidden" name="system[]" value="${val.itrad_system}">
							</td>
							<td>
								${val.itrad_matcode}
								<input type="hidden" name="mat_code[]" id="mat_code_${index+1}" value="${val.itrad_matcode}">
							</td>
							<td>
								${val.itrad_descrip}
								<input type="hidden" name="mat_name[]" id="mat_name_${index+1}" value="${val.itrad_descrip}">
							</td>
							<td>
								${val.itrad_qty}
								<input type="hidden" name="qty[]" id="qty_${index+1}" value="${val.itrad_qty}">
							</td>
							<td>
								<input type="text" class="form-control text-right priceunit" row="${index+1}" id="price_${index+1}" name="price_unit[]" value="${val.itrad_priceunit}">
							</td>
							<td>
								<input type="text" class="form-control text-right amount" id="amount_${index+1}" name="amount[]" value="${val.itrad_amount}">
							</td>
							<td>
								<input type="text" class="form-control text-right discount" row="${index+1}" id="discount_${index+1}" name="discount[]" value="${val.itrad_discount}">
							</td>
							<td>
								<input type="text" class="form-control text-right netamount" row="${index+1}" id="netamount_${index+1}" name="netamount[]" value="${amount+vat_total}">
							</td>
							<td>
								${val.itrad_doccode}
								<input type="hidden" id="doccode_${index+1}" name="doccode[]" value="${val.itrad_doccode}">
							</td>
						  </tr>`;
				$('#list').html(tr);
			});
	$(".priceunit").keyup(function(event) {
		var row = $(this).attr('row');
		var priceunit = ($(this).val()*1);
		var qty = ($('#qty_'+row).val()*1);
		var amt = priceunit*qty;
		var vat_total = (vat/100)*amt;
		var net_amt = amt+vat_total
		$('#amount_'+row).val(amt);
		$('#netamount_'+row).val(net_amt);
	});
		});
	}
</script>
