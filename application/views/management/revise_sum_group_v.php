<table class="table table-hover">
	<tr class="tr_head" style="background-color: #7cacf9">
		<th>
			Group
		</th>
		
		<th>
			Description
		</th>
		<th>
			Contract (1)
		</th>
	</tr>
	<?php foreach ($data as $key => $item) { ?>
		<tr style="font-weight: bold;">
			<td><?=$item[0]["sub_code"]?></td>
			
			<td><?=$item[0]["sub_name"]?></td>
			<td><?=$item[0]["summary"]?></td>
		</tr>

			
	<?php }?>



</table>

<?php 

	//var_dump($data);
?>