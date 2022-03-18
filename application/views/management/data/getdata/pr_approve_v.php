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
			<td><?=$value["pr_prno"]?></td>
			<td><?=$value["pr_prdate"]?></td>
			<td>
				<a target="_blank" class="label label-success" href="<?=base_url()?>purchase/openpo/<?=$project_id?>/p">open</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script type="text/javascript">
	// $('#po_v').DataTable();
</script>