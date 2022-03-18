<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php $i=1;
	foreach ($paid as $key => $value) {
?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $value->name ?></td>
			<td>
				<button class="btn btn-primary btn-xs" onclick="add_paid('<?= $value->id ?>','<?= $value->name ?>')" data-dismiss="modal">Select</button>
			</td>
		</tr>
<?php
	}
?>
	</tbody>
</table>

<script type="text/javascript">
	function add_paid(id,name) {
		$('#paid_id').val(id);
		$('#paid').val(name);
	}
</script>


