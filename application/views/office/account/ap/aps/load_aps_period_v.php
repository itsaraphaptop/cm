

<?php $n=1; foreach ($apsloi as $e) {
$apsd = $this->db->query("select * from aps_detail where apsi_ref='$e->aps_code'");
$resi = $apsd->result();
?>
		<tr>
			<td><?php echo $n; ?></td>
			<td><?php echo $e->aps_period; ?></td>
			<?php foreach ($resi as $r) {?>
			<td><?php echo $r->apsi_costname; ?></td>
			<td><?php echo $r->apsi_matname; ?></td>
			<td><?php echo $r->apsi_qty; ?></td>
			<td><?php echo $r->apsi_unit; ?></td>
			<td><?php echo number_format($r->apsi_amount,2); ?></td>
			<?php } ?>
		</tr>
<?php $n++; } ?>