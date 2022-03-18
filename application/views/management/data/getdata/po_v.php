<table class="table table-hover table-xxs" id="po_v">
	<thead>
		<tr>
			<th>No.</th>
			<th>Date.</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?=$project_code?>
		<?=$project_id?>
		<?php foreach ($data as $key => $value) { ?>
		<tr>
			<td><?=$value["po_pono"]?></td>
			<td><?=$value["po_podate"]?></td>
			<td>
				<a target="_blank" class="label label-success" href="<?=base_url()?>purchase/purchase_approve/<?=$project_id?>/p/<?=$project_code?>">open</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script type="text/javascript">
	// $('#po_v').DataTable();
</script>