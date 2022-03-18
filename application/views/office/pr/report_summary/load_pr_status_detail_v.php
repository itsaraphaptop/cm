<table class="table table-bordered table-xxs">
	<thead>
		<tr>
			<th>Maeterail Code</th>
			<th>Maeterail Name</th>
			<th>Cost Code</th>
			<th>PR QTY</th>
			<th>PO QTY</th>
			<th>PR Outstanding</th>
			<th>Unit</th>
			<th class="info"></th>
			<th class="info">P/O Contract No.</th>
			<th class="info">PO Date</th>
			<th class="info">PO Dur.(Day)</th>
			<th class="info">Supplier</th>
			<th class="info">PO Qty</th>
			<th class="info">PO Unit</th>

		</tr>
	</thead>
	<tbody >
		<?php foreach ($res as $key => $value) {
			$po=$this->db->query("select * from po join po_item on po_item.poi_ref=po.po_pono where po.po_prno='$value->pri_ref'")->result();
			foreach ($po as $key => $v) {
				$diff = $this->db->query("select datediff('$v->po_podate','$prdate') as diffdate")->result();
					foreach ($diff as $key => $a) {
						$diffdate= $a->diffdate;
					}
				$pono = $v->po_pono;
				$podate = $v->po_podate;
				$po_vender = $v->po_vender;
				$poi_qty = $v->poi_qty;
				$unit = $v->poi_unit;
			}
			
		if ($value->pri_status=="open") {
		?>
		<tr class="text-success">
			<td><?php echo $value->pri_matcode ?></td>
			<td><?php echo $value->pri_matname ?></td>
			<th><?php echo $value->pri_costcode; ?></th>
			<td><?php echo $value->pri_qty ?></td>
			<td><?php echo $value->poi_qty; ?></td>
			<td><?php $prqty = $value->pri_qty; $poqty=$value->poi_qty; $totqty = $prqty-$poqty; echo number_format($totqty,4); ?></td>
			<td><?php echo $value->pri_unit; ?></td>
			<td class="info">P/O</td>
			<td class="info"><?php echo $pono; ?></td>
			<td class="info"><?php echo $podate; ?></td>
			<td class="info text-center"><?php echo $diffdate; ?></td>
			<td class="info"><?php echo $po_vender ?></td>
			<td class="info"><?php echo $poi_qty; ?></td>
			<td class="info"><?php echo $unit; ?></td>

		</tr>
		<?php }else{ ?>
		<tr>
			<td><?php echo $value->pri_matcode ?></td>
			<td><?php echo $value->pri_matname ?></td>
			<th><?php echo $value->pri_costcode; ?></th>
			<td><?php echo $value->pri_qty ?></td>
			<td><?php echo $value->poi_qty; ?></td>
			<td><?php $prqty = $value->pri_qty; $poqty=$value->poi_qty; $totqty = $prqty-$poqty; echo number_format($totqty,4); ?></td>
			<td><?php echo $value->pri_unit; ?></td>
			<td class="info"></td>
			<td class="info"></td>
			<td class="info"></td>
			<td class="info"></td>
			<td class="info"></td>
			<td class="info"></td>
			<td class="info"></td>
		</tr>
		<?php } } ?>
	</tbody>
</table>