<?php 
	//var_dump($data);	
?>

<table class="table table-hover">
	<thead>
		<tr class="">
			<th>APV No.</th>
			<th>P/O No.</th>
			<th>Date.</th>
			<th>Amount</th>
			<th>type</th>
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
				<td><?=$item["apv_code"]?></td>
				<td><?=$item["apv_pono"]?></td>
				<td><?=$item["date"]?></td>
				<td ><?=number_format($item["amount"],2)?></td>
				<td><?=$item["type"]?></td>
				<td><a href="<?=base_url()?>ap/ap_edit_apv/<?=$item["apv_code"]?>" class="label label-success" target="_blank">OPEN</a></td>
			</tr>
		<?php
			$sum+= ($item["amount"]*1);
			}
			// loop
		?>
			<tr>
				<td>Summary</td>
				<td></td>
				<td></td>
				<td ><?=number_format($sum,2)?></td>
				<td></td>
				<td></td>
			</tr>
	</tbody>

</table>