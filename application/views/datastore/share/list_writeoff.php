<table class="table" >
<thead>
<tr>
<th>Asset Code</th>
<th>Asset Name</th>
<th>Write Off Date</th>
<th>Remark</th>
<th>Project/Department</th>
<th>Job</th>
<th>Amount</th>
<th>Vat</th>
<th>Net Amount</th>
</tr>
</thead>
<tbody>
	<?php foreach ($res as $key) { ?>
	<tr>
		<td><?php echo $key->off_asscode; ?></td>
		<td><?php echo $key->off_assname; ?></td>
		<td><?php echo $key->off_date; ?></td>
		<td><?php echo $key->off_remark; ?></td>
		<td><?php echo $key->off_pjname; ?></td>
		<td><?php 
		$a = $this->db->query("select * from system where systemcode = '$key->fa_job'")->result(); 
		foreach ($a as $sy) {
		echo $systemname = $sy->systemname;
							}
				?>	
		</td>
		<td><?php echo $key->off_amt; ?></td>
		<td><?php echo $key->off_vat; ?></td>
		<td><?php echo $key->off_netam; ?></td>
	</tr>
	<?php } ?>
</tbody>
</table>