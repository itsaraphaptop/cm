<?php
	foreach ($data as $key => $value) {
		
?>
	<div class="modal-header bg-info">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">PR Booking No : <?= $value->pb_no ?></h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-lg-6 text-center">PR Booking No : <?= $value->pb_no ?></div>
			<div class="col-lg-6 text-center">Request Date : <?= $value->pb_date ?></div>
			<div class="col-lg-6 text-center">Remark : <?= $value->pb_remark ?></div>
			<div class="col-lg-6 text-center">Delivery Date : <?= $value->pb_delivery ?></div>
		</div>
		<div class="row">
			
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>No.</td>
						<td>Material Code</td>
						<td>Material Name</td>
						<td>Cost Code</td>
						<td>Cost Name</td>
						<td>QTY</td>
						<td>Unit</td>
						<td>Store</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$i = 0;
						foreach ($data_item as $item_k => $item_v) {
					?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $item_v->mat_code ?></td>
							<td><?= $item_v->mat_name ?></td>
							<td><?= $item_v->costcode ?></td>
							<td><?= $item_v->costname ?></td>
							<td><?= $item_v->qty ?></td>
							<td><?= $item_v->unit ?></td>
							<td><?= $item_v->project_name ?></td>
						</tr>

					<?php
						}
					?>
				</tbody>
			</table>
			
		
		</div>
	</div>
	<div class="modal-footer">
		<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
	</div>

<?php
	}
?>
