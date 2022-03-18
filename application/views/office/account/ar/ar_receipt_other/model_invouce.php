<?php
	$i=1;
	$amt_total = 0;
	foreach ($invoice as $key => $value) {
?>
	<tr>
		<td><?= $i++ ?></td>
		<td><?= $value->invoice_no ?></td>
		<td><?= $value->invoice_des ?></td>
		<td><?= $value->bill_amount ?></td>
		<td><?= $value->bill_vat ?></td>
		<td><?= $value->bill_vat_amt ?></td>
		<td><?= $value->bill_wt ?></td>
		<td><?= $value->bill_wt_amt ?></td>
		<td><?= $value->bill_amount+$value->bill_vat_amt ?></td>
		<td><?= $value->bill_amount_receipt ?></td>
	</tr>
<?php
	}
?>