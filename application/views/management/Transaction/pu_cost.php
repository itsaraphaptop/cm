
<table class="table table-bordered table-striped">
	<thead class="bg-info">
		<tr>
			<th>Type</th>
			<th>PO No.</th>
			<th>Cost Code</th>
			<th>Cost</th>
			<th>Cost Type</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sum = array();
			foreach ($po as $po_key => $po_data) {
		?>
			<tr>
				<td>PO</td>
				<td><?= $po_data->po_pono ?></td>
				<td><?= $po_data->poi_costcode ?></td>
				<td>
					<?php 
						if ($po_data->type_cost == 1) {
							echo "MATERIAL";
						}elseif ($po_data->type_cost == 2) {
							echo "LABOR";
						}else{
							echo "SUB CON";
						}
					?>
				</td>
				<td><?= number_format($po_data->poi_amount,2) ?></td>
			</tr>
		<?php
			$sum[] = $po_data->poi_amount;
			}
		?>
		<?php
			foreach ($wo as $wo_key => $wo_data) {
		?>
			<tr>
				<td>WO</td>
				<td><?= $wo_data->lo_lono ?></td>
				<td><?= $wo_data->lo_costcode ?></td>
				<td>
					<?php 
						if ($wo_data->type_cost == 1) {
							echo "MATERIAL";
						}elseif ($wo_data->type_cost == 2) {
							echo "LABOR";
						}else{
							echo "SUB CON";
						}
					?>
				</td>
				<td><?= number_format($wo_data->total_disc,2) ?></td>
			</tr>
		<?php
			$sum[] = $wo_data->total_disc;
			}
		?>
		<?php
				foreach ($pc as $pc_key => $pc_data) {
		?>
					<tr>
						<td>PC</td>
						<td><?= $pc_data->pettycashi_costcode ?></td>
						<td><?= $pc_data->docno ?></td>
						<td>
							<?php 
								if ($pc_data->type_cost == 1) {
									echo "MATERIAL";
								}elseif ($pc_data->type_cost == 2) {
									echo "LABOR";
								}else{
									echo "SUB CON";
								}
							?>
						</td>
						<td><?= number_format($pc_data->pettycashi_unitprice,2) ?></td>
					</tr>
		<?php
				$sum[] = $pc_data->pettycashi_unitprice;
				}
		
		?>
		<tr>
			<td colspan="4"><b>Total Cost</b></td>
			<td><?= number_format(array_sum($sum),2) ?></td>
 		</tr>
	</tbody>
</table>


	