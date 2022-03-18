<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th><b>No.</b></th>
			<th><b>System</b></th>
			<th><b>Cost Code</b></th>
			<th><b>Amount</b></th>
		</tr>
	</thead>
	<tbody>
			<?php
				$i=1;
				foreach ($boq as $key => $value) {
			?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $value->systemname ?></td>
					<td><?= $value->costcode ?></td>
					<td><?= $value->cost ?></td>
				</tr>
			<?php
				$i++;
				}

			?>
	</tbody>
</table>
