
<table class="table table-hover ">
	<thead>
		<tr class="">
			<th>No.</th>		
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
				<td><?=$item["inv_no"]?></td>
				<td><?=$item["inv_date"]?></td>				
				<td ><?=number_format($item["inv_progressamt"],2)?></td>
				<td><a href="<?=base_url()?>ar/ar_edit_invprogress/<?=$item["inv_no"]?>/<?=$item["inv_period"]?>/readonly" class="label label-success" target="_blank">OPEN</a></td>
			</tr>
		<?php 
		$sum += ($item["inv_progressamt"]*1);
			}
			// loop
		?>
			<tr>
				<td>Summary</td>
				<td></td>
				<td><?=number_format($sum,2)?></td>
				<td></td>
			</tr>
	</tbody>

</table>