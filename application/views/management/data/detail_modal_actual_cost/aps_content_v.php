<!-- <pre>
<?php var_dump($data)?>

</pre> -->
<table class="table table-hover">
	<thead>
		<tr class="">
			<th>AP No.</th>			
			<th>Date.</th>
			<th>Amount</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			// loop
			$sum_api_netamt = 0;

			foreach ($data as $key => $item) {				
		?>
			<tr>
				<td><?=$item["ap_code"]?></td>
				
				<td><?=$item["ap_chnodate"]?></td>
				<td><?=number_format($item["api_netamt"],2)?></td>				
				<td><a href="<?=base_url()?>ap/showap_approve/<?=$item["ap_code"]?>" class="label label-success" target="_blank">OPEN</a></td>
			</tr>
		<?php 
				$sum_api_netamt+=$item["api_netamt"]*1;
			}
			// loop
		?>
			<tr>
				<td>Summary</td>			
				<td></td>
				<td><?=number_format($sum_api_netamt,2)?></td>
				<td></td>
			</tr>
	</tbody>

</table>