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
								'<?=$value->trad_exchange?>',
								'<?=$value->totalvat?>',
								'<?=$value->sum_netamount?>',
								'<?=$value->projectid?>',
								'<?=$value->job_name?>')">
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
	function select_inv(inv_id,trad_inv,inv_date,projectcode,projectname,cus_projectcode,cus_projectname,cr_term,duedate,vat,curency,exchange,amt_vat,amt_net,project_id,system_code) {
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
		$('#duedate').val(duedate);
		$('#vat_amt').val(amt_vat);
		$('#net_amt').val(amt_net);
		$('#amt').val(amt_net-amt_vat);
		$('#project_id').val(project_id);

		$.get(`<?= base_url() ?>ar/get_inv_detail_receipt/${inv_id}`, function() {
		}).done(function(data) {
			// var amt = 0 ;
			// var net_amt = 0;
			// var vat_amt = 0;
			var system_id = '';
			var system_name = '';
			var json = jQuery.parseJSON(data);
			// console.log(json);
			$.each(json, function(index, val) {
				var amount  = val.itrad_netamount*1;
				var vat_c = vat*1;
				var vat_total = (vat_c/100)*amount;
				var vat_round = Math.round(vat_total);
				// vat_amt = vat_round;
				// net_amt = amount+vat_round;
				// amt = amount;
				system_id = val.itrad_system;
				system_name = val.systemname;
				var tr = `<tr>
							<td>
								${index+1}
								<input type="hidden" value="${val.itrad_system}">
							</td>
							<td>
								${trad_inv}
							</td>
							<td>
								${val.itrad_descrip}
							</td>
							<td class="text-right">
								${val.itrad_amount}
							</td>
							<td>
								${vat_c}
							</td>
							<td class="text-right">
								${vat_round}
							</td>
							<td class="text-right">
								${amount+vat_total}
							</td>
							<td class="text-right">
								${amount+vat_total}
							</td>
						  </tr>`;
				$('#receive_tr').append(tr);
			});

			// ลูกหนี้ ในประเทศ
			var ar_arlt_code = '<?= $ar_arlt_code ?>';
			var ar_arlt_name = '<?= $ar_arlt_name ?>';
			//
			// ภาษียังไม่ครบ
			var ar_sov_code = '<?= $ar_sov_code ?>';
			var ar_sov_name = '<?= $ar_sov_name ?>';
			//
			// รายได้จากการขาย
			var ar_rev_sale_code = '<?= $ar_rev_sale_code ?>';
			var ar_rev_sale_name = '<?= $ar_rev_sale_name ?>';
			//
			var tr_paid = `<tr>
                        <td>1</td>
                        <td>
                            ${system_name}
                            <input type="hidden" class="form-control" name="system_name[]" readonly="readonly" value="${system_name}">
                            <input type="hidden" class="form-control" name="system_id[]" readonly="readonly" value="${system_id}">
                            <input type="hidden" class="form-control" name="system_code[]" readonly="readonly" value="${system_code}">
                        </td>
                        <td>
                            <input type="text" name="acc_code[]" id="acc_code1" class="form-control" value="${ar_arlt_code}" readonly="readonly" >
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="acc_name[]" id="acc_name1" readonly="readonly" value="${ar_arlt_name}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="acc('1')"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="cost_code[]" readonly="" id="cost_code_1" class="form-control">
                                <div class="input-group-btn">
                                    <a class="btn btn-info btn-icon selectcostcode" row="1"><i class="icon-search4"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">
                            <input type="text" class="form-control text-right" name="debit[]" id="debit_1" readonly="readonly" value="${amt_net}">
                        </td>
                        <td class="text-right">
                        	<input type="text" name="credit[]" class="form-control text-right" readonly="readonly" value="0">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            ${system_name}
                            <input type="hidden" class="form-control" name="system_name[]"  readonly="readonly" value="${system_name}">
                            <input type="hidden" class="form-control" name="system_id[]" readonly="readonly" value="${system_id}">
                            <input type="hidden" class="form-control" name="system_code[]" readonly="readonly" value="${system_code}">
                        </td>
                        <td>
                            <input type="text" name="acc_code[]" id="acc_code2" class="form-control" value="${ar_sov_code}" readonly="readonly" >
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="acc_name[]" id="acc_name2" readonly="readonly" value="${ar_sov_name}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="acc('2')"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="cost_code[]" readonly="" id="cost_code_2" class=" form-control">
                                <div class="input-group-btn">
                                    <a class="btn btn-info btn-icon selectcostcode" row="2"><i class="icon-search4"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">
                        	<input type="text" name="debit[]" class="form-control text-right" readonly="readonly" value="0">
                        </td>
                        <td class="text-right">
                            <input type="text" class="form-control form-control text-right" name="credit[]" id="credit_2" readonly="readonly" value="${amt_vat}">
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            ${system_name}
                            <input type="hidden" class="form-control" name="system_name[]" readonly="readonly" value="${system_name}">
                            <input type="hidden" class="form-control" name="system_id[]" readonly="readonly" value="${system_id}">
                            <input type="hidden" class="form-control" name="system_code[]" readonly="readonly" value="${system_code}">
                        </td>
                        <td>
                            <input type="text" name="acc_code[]" id="acc_code3" class="form-control" value="${ar_rev_sale_code}" readonly="readonly" >
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="acc_name[]" id="acc_name3" readonly="readonly" value="${ar_rev_sale_name}">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-icon" onclick="acc('3')"><i class="icon-search4"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input type="text" name="cost_code[]" readonly="" id="cost_code_3" class="form-control">
                                <div class="input-group-btn">
                                    <a class="btn btn-info btn-icon selectcostcode" row="3"><i class="icon-search4"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">
                        	<input type="text" name="debit[]" class="form-control text-right" readonly="readonly" value="0">
                        </td>
                        <td>
                            <input type="text" class="form-control text-right" name="credit[]" id="credit_3" readonly="readonly" value="${amt_net-amt_vat}">
                        </td>
                   </tr>`;
        		$('#other_tr').html(tr_paid);

	        $(".selectcostcode").click(function(event) {
	            var _row = $(this).attr('row');
	            $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
	            $("#modal_cost").load('<?php echo base_url(); ?>share/costcode_id/'+_row);
	            $('#modal_cost_code').modal('show');
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
	function acc(id){
        $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#account_code").load(`<?php echo base_url(); ?>ar/account_code_by_rows/${id}`);
        $('#myAccount').modal('show');
	}	
</script>
