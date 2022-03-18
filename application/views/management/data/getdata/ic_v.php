<table class="table table-hover table-xxs" id="ic_v">
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
			<td><?=$value["po_reccode"]?></td>
			<td><?=$value["po_recdate"]?></td>
			<td>
				<a target="_blank" class="label label-success" href="<?=base_url()?>inventory/receive_po_header/<?=$project_code?>/<?=$project_id?>">open</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script type="text/javascript">
	// $('#ic_v').DataTable();
</script>