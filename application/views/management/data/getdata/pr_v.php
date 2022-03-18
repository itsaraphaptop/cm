<table class="table table-hover table-xxs" id="pr_v">
	<thead>
		<tr>
			<th>No.</th>
			<th>Date.</th>
			<th>Action</th>
		</tr>
	</thead>
		
		<?php foreach ($data as $key => $item) { ?>
		<tr>
			<td><?=$item['pr_prno'];?></td>
			<td><?=$item['pr_prdate'];?></td>
			<td>
				<a target="_blank" class="label label-success" href="<?=base_url()?>pr/pr_approve/<?=$project_code?>/<?=$project_id?>">open</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script type="text/javascript">
	// $('#pr_v').DataTable();
</script>