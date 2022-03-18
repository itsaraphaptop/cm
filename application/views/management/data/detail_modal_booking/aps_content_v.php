<table class="table table-hover">
	<thead>
		<tr class="">
			<th>APS No.</th>
			<th>Date.</th>
			<th>Amount</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			// loop
		$sum = 0;
			foreach ($data as $key => $item) {				
		?>
			<tr>
				<td><?=$item["aps_code"]?></td>
				
				<td><?=$item["aps_duedate"]?></td>
				<td ><?=number_format($item["apsi_amount"],2)?></td>
				
				<td><a href="<?=base_url()?>ap/ap_edit_aps/<?=$item["aps_code"]?>/aps" class="label label-success" target="_blank">OPEN</a></td>
			</tr>
		<?php 
			$sum+=($item["apsi_amount"]*1);
			}
			// loop
		?>
			<tr>
				<td>Summary</td>
				
				<td></td>
				<td ><?=number_format($sum,2)?></td>
				
				<td></td>
			</tr>
	</tbody>

</table>