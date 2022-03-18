<table class="table table-hover table-xxs" id="po_approve_v">
	<thead>
		<tr>
			<th>No.</th>
			<th>Date.</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!-- <?=$project_code?>
		<?=$project_id?> -->
		
		<?php foreach ($data as $key => $value) { ?>
		<tr>
			<td><?php echo $value["po_pono"];?></td>
			<td><?php echo $value["po_podate"];?></td>
		
			<td>
				<a target="_blank" class="label label-success" href="<?=base_url()?>inventory/receive_po_list/<?=$project_code?>/<?=$project_id?>/p">open</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script type="text/javascript">
	// $('#po_vapprove_v').DataTable();
</script>