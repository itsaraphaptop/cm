<div class="row">
	<table class="basic table table-hover table-xxs datatable-basicc">
	  	<thead>
		    <tr>
		      	<th>No.</th>
		      	<th>Account Code</th>
		      	<th>Account Name</th>
		      	<th>Owner/Customer</th>
		      	<th>Dr</th>
		      	<th>Cr</th>
		    </tr>
	  	</thead>
		<tbody>
			
			<tr>
				<?php $i=1; foreach ($glar as $key => $value) { ?>
				<td><?php echo $i; ?></td>
				<td><?php echo $value->gl_type; ?></td>
				<td><?php echo $value->act_name; ?></td>
				<td><?php echo $value->debtor_name; ?></td>
				<td align="right"><?php echo $value->gl_dr; ?></td>
				<td align="right"><?php echo $value->gl_cr; ?></td>
			</tr>
			<?php $i++;} ?>
			<tr>
				<?php $i=1; foreach ($glap as $key => $vap) { ?>
				<td><?php echo $i; ?></td>
				<td><?php echo $vap->gl_type; ?></td>
				<td><?php echo $vap->act_name; ?></td>
				<td><?php echo $vap->debtor_name; ?></td>
				<td align="right"><?php echo $vap->gl_dr; ?></td>
				<td align="right"><?php echo $vap->gl_cr; ?></td>
			</tr>
			<?php $i++;} ?>
			<?php foreach ($sumar as $key => $sar) { ?>
			<tr>
				<td colspan="4"><b>Summary</b></td>
				<td align="right"><b><u><?php echo $sar->dr; ?></u></b></td>
				<td align="right"><b><u><?php echo $sar->cr; ?></u></b></td>
				<?php } ?>
			</tr>
			<?php foreach ($sumap as $key => $sap) { ?>
			<tr>
				<td colspan="4"><b>Summary</b></td>
				<td align="right"><b><u><?php echo $sap->dr; ?></u></b></td>
				<td align="right"><b><u><?php echo $sap->cr; ?></u></b></td>
				<?php } ?>
			</tr>
		</tbody>
	</table>
</div>