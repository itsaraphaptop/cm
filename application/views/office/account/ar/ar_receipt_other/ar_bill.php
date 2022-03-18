<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Receipt No</th>
			<th>Project Code</th>
			<th>Project Name</th>
			<th>Customer Code</th>
			<th>Customer Name</th>
			<th>Date</th>
			<th>Deccripton</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i=1;
			foreach ($bill_list as $key => $value) {
		?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $value->bill_ot_no ?></td>
				<td><?= $value->bill_ot_project_code ?></td>
				<td><?= $value->bill_ot_project_name ?></td>
				<td><?= $value->bill_ot_cus_code ?></td>
				<td><?= $value->bill_ot_cus_name ?></td>
				<td><?= $value->bill_ot_date ?></td>
				<td><?= $value->bill_ot_remark ?></td>
				<td><a class="receipt btn btn-primary" bill_no="<?= $value->bill_ot_no ?>"> Select</td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>
<script type="text/javascript">
	$('.receipt').click(function(event) {
		var bill_no = $(this).attr('bill_no');
		$('#s_no').val(bill_no);
		$("#other_tr").load('<?php echo base_url(); ?>ar/add_row_receive/'+bill_no);

		$.ajax({
			url: '<?php echo base_url(); ?>ar/sum_amt',
			type: 'POST',
			data: {ref_no:bill_no },
		})
		.done(function(data) {
			var json = jQuery.parseJSON(data);
			var sum = json.sum;
			var vat = json.vat;
			$('#rept_amount').val(sum);
			$('#vat_amount').val(vat);
		});
		
		
	});
</script>
