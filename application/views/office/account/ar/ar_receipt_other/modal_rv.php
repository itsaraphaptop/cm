<table class="table table-bordered table-xs">
	<thead>
		<tr>
			<th>#</th>
			<th>Receipt No</th>
			<th>Project</th>
			<th>Description</th>
			<th>Receipt Net Amount</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php
	$i=0;
	foreach ($rv as $key => $value) {
	$i++;
?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $value->recoipt_no ?></td>
		<td><?= $value->project_code ?> - <?= $value->project_name ?></td>
		<td><?= $value->remark ?></td>
		<td class="text-right"><?= $value->rept_amt ?></td>
		<td>
			<span class="label bg-blue add_rv"
			recoipt_no="<?= $value->recoipt_no ?>" 
			project_code="<?= $value->project_code ?>" 
			project_name="<?= $value->project_name ?>" 
			cus_code="<?= $value->cus_code ?>" 
			cus_name="<?= $value->cus_name ?>" 
			rept_amt="<?= $value->rept_amt ?>" 
			vat_amt="<?= $value->vat_amt ?>" 
			less_other_price="<?= $value->less_other_price ?>" 
			currency_name="<?= $value->currency_name ?>" 
			exchange="<?= $value->exchange ?>"
			to_bank_name="<?= $value->to_bank_name ?>" 
			to_bank_branch="<?= $value->to_bank_name ?>" 
			to_bank_acno="<?= $value->to_bank_acno ?>" 
			to_bank_acid="<?= $value->to_bank_acid ?>" 
			voucher_date="<?= $value->voucher_date ?>"
			data-dismiss="modal">
				<i class="icon-checkmark"></i> Select
			</span>
		</td>
	
	</tr>
<?php
	}
?>
	</tbody>
</table>

<script type="text/javascript">
	$('.add_rv').click(function(event) {
		var rv_no = $(this).attr('recoipt_no');
		var rv_date = $(this).attr('voucher_date');
		var project_code = $(this).attr('project_code');
		var project_name = $(this).attr('project_name');
		var cus_code = $(this).attr('cus_code');
		var cus_name = $(this).attr('cus_name');
		var rept_amt = $(this).attr('rept_amt');
		var vat_amt = $(this).attr('vat_amt');
		var less_other_price = $(this).attr('less_other_price');
		var currency_name = $(this).attr('currency_name');
		var exchange = $(this).attr('exchange');
		var ac_code = $(this).attr('to_bank_acid');
		var to_bank = $(this).attr('to_bank_branch')+` `+$(this).attr('to_bank_acno');
		var bank = $(this).attr('to_bank_acno');
		var bank_id = $(this).attr('to_bank_acid');
		var vat_code = '<?= $vat_code ?>';
		var vat_name = '<?= $vat ?>';
		var not_vat_code = '<?= $not_vat_code ?>';
		var not_vat = '<?= $not_vat ?>';
		var acc_code = '<?= $acc_code ?>';
		var acc_name = '<?= $acc_name ?>';
		$('#v_no').val(rv_no);
		$('#rv_no').val(rv_no);
		$('#rv_date').val(rv_date);
		$('#project_code').val(project_code);
		$('#project_name').val(project_name);
		$('#customer_code').val(cus_code);
		$('#customer_name').val(cus_name);
		$('#rcpt_net_amt').val(rept_amt);
		$('#currency').val(currency_name);
		$('#exchange').val(exchange);
		$('#paid_net_amt').val(rept_amt);
		$('#to_bank').val(to_bank);
		$('#less_other').val(less_other_price);
		$('#ac_code').val(ac_code);

		var tr = `<tr>
					<td>1</td>
					<td>
						${bank_id}
						<input type="hidden" name="acc_code_1" value="${bank_id}">
					</td>
					<td>
						${bank}
						<input type="hidden" name="acc_name_1" value="${bank}">
					</td>
					<td>
						<div class="input-group">
						    <input type="text" name="cost_code_1" readonly="" id="cost_code_1" class="form-control">
						    <div class="input-group-btn">
						        <a class="btn btn-info btn-icon selectcostcode" row="1"><i class="icon-search4"></i></a>
						    </div>
						</div>
					</td>
					<td class="text-right">
						${rept_amt}
						<input type="hidden" name="debit_1" value="${rept_amt}">
					</td>
					<td></td>
				 </tr>
				 <tr>
					<td>2</td>
					<td>
						${vat_code}
						<input type="hidden" name="acc_code_2" value="${vat_code}">
					</td>
					<td>
						${vat_name}
						<input type="hidden" name="acc_name_2" value="${vat_name}">
					</td>
					<td>
						<div class="input-group">
						    <input type="text" name="cost_code_2" readonly="" id="cost_code_2" class="form-control">
						    <div class="input-group-btn">
						        <a class="btn btn-info btn-icon selectcostcode" row="2"><i class="icon-search4"></i></a>
						    </div>
						</div>
					</td>
					<td class="text-right">
						${vat_amt}
						<input type="hidden" name="debit_2" value="${vat_amt}">
					</td>
					<td></td>
				 </tr>
				 <tr>
					<td>3</td>
					<td>
						${acc_code}
						<input type="hidden" name="acc_code_3" value="${acc_code}">
					</td>
					<td>
						${acc_name}
						<input type="hidden" name="acc_name_3" value="${acc_name}">
					</td>
					<td>
						<div class="input-group">
						    <input type="text" name="cost_code_3" readonly="" id="cost_code_3" class="form-control">
						    <div class="input-group-btn">
						        <a class="btn btn-info btn-icon selectcostcode" row="3"><i class="icon-search4"></i></a>
						    </div>
						</div>
					</td>
					<td class="text-right">
					</td>
					<td class="text-right">
						${rept_amt}
						<input type="hidden" name="credit_3" value="${rept_amt}">
					</td>
				 </tr> 
				 <tr>
					<td>4</td>
					<td>
						${not_vat_code}
						<input type="hidden" name="acc_code_4" value="${not_vat_code}">
					</td>
					<td>
						${not_vat}
						<input type="hidden" name="acc_name_4" value="${not_vat}">
					</td>
					<td>
						<div class="input-group">
						    <input type="text" name="cost_code_4" readonly="" id="cost_code_4" class="form-control">
						    <div class="input-group-btn">
						        <a class="btn btn-info btn-icon selectcostcode" row="4"><i class="icon-search4"></i></a>
						    </div>
						</div>
					</td>
					<td class="text-right">
					</td>
					<td class="text-right">
						${vat_amt}
						<input type="hidden" name="credit_4" value="${vat_amt}">
					</td>
				 </tr>`;
		$('#rv_tr').html(tr);

		$(".selectcostcode").click(function(event) {
            var _row = $(this).attr('row');
            $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_cost").load('<?php echo base_url(); ?>share/costcode_id/'+_row);
            $('#modal_cost_code').modal('show');
        });
	});
</script>