<table class="table table-hover">
	<thead>
		<tr class="">
			<th>JV No.</th>			
			<th>Date.</th>
			<th>Dr.</th>
			<th>Cr.</th>			
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			// loop
			$sum_dr = 0;
			$sum_cr = 0;

			foreach ($data as $key => $item) {				
		?>
			<tr>
				<td><?=$item["vchno"]?></td>
				
				<td><?=$item["vchdate"]?></td>
				<td ><?=number_format($item["amtdr"],2)?></td>
				<td ><?=number_format($item["amtcr"],2)?></td>			
				<td><a href="<?=base_url()?>gl_tran/edit_journalvocher/<?=$item["vchno"]?>/readonly" class="label label-success" target="_blank">OPEN</a></td>
			</tr>
		<?php 
				$sum_dr+=($item["amtdr"]*1);
				$sum_cr+=($item["amtcr"]*1);
			}
			// loop
		?>
			<tr>
				<td>Summary</td>
				
				<td></td>
				<td ><?=number_format($sum_dr,2)?></td>
				<td ><?=number_format($sum_cr,2)?></td>
				<td></td>
			</tr>
	</tbody>

</table>