<table class="table table-bordered table-xs">
	<thead>
		<tr>
			<th>#</th>
			<th>Code</th>
			<th>Name</th>
			<th>Standard</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php $i=1;
	foreach ($bank as $key => $value) {
?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $value->code_bank ?></td>
			<td><?= $value->name_th ?></td>
			<td><?= $value->code_standard ?></td>
			<td>
				<button class="btn btn-primary btn-xs" onclick="add_bank(id='<?= $value->id ?>',name='<?= $value->name_th ?>',code='<?= $value->code_bank ?>',standard='<?= $value->code_standard ?>')" data-dismiss="modal">Select</button>
			</td>
		</tr>
<?php
	}
?>
	</tbody>
</table>

<script type="text/javascript">
	function add_bank(id,name) {
		// $('#bank_id').val(id);
		// $('#bank_paid').val(id);
		// $('#bank_name').val(name);
		$('#bank_name_master').val(name);

		$('#bankcode').val(code);
		// $('#bankname').val(name);
	}
</script>


