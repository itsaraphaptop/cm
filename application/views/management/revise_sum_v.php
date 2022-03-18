<table class="table table-hover">
	<tr class="tr_head" style="background-color: #7cacf9">
		<th>
			Group
		</th>
		<th>
			Sub-Group
		</th>
		<th>
			Description
		</th>
		<th>
			Contract (1)
		</th>
	</tr>
	<?php foreach ($data as $key => $item) { ?>
		<tr style="font-weight: bold; background-color: #f2f9e5">
			<td><?=$item[0]["sub_code"]?></td>
			<td></td>
			<td><?=$item[0]["sub_name"]?></td>
			<td><?=number_format($item[0]["summary"])?></td>
		</tr>

			<?php foreach($item as $key => $item_sub_group) { ?>
				<tr>
					<?php if($key!=0){?>
							<td></td>
							<td><?=$item_sub_group["sub_code"]?></td>
							<td><?=$item_sub_group["sub_name"]?></td>
							<td><?=number_format($item_sub_group["summ"])?></td>

					<?php }?>
				</tr>
			<?php }?>
	<?php }?>



</table>

<?php 

	//var_dump($data);
?>