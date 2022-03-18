
<table class="table table-hover ">
	<thead>
		<tr class="">
			<th>APO No.</th>		
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
				<td><?=$item["ap_no"]?></td>
				<td><?=$item["ap_date"]?></td>				
				<td ><?=number_format($item["ex_amt"],2)?></td>
				<td><a href="<?=base_url()?>ap/ap_edit_apo/<?=$item["ap_no"]?>/apo" class="label label-success" target="_blank">OPEN</a></td>
			</tr>
		<?php 
		$sum += ($item["ex_amt"]*1);
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