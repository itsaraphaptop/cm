				<table class="table table-hover table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>

                               <th style="text-align: center;">No.</th>
                               <th style="text-align: center;">Ac Code</th>   
                               <th style="text-align: center;">Account Name</th>
                               <th style="text-align: center;">Cost Code</th>
                               <th style="text-align: center;">Cost Name</th>
                               <th style="text-align: center;">Debit (Dr)</th>
                               <th style="text-align: center;">Credit (Cr)</th>
                               
                               
                      </tr>
                    </thead>
                    <tbody id="bodygl">
				<?php $n=1;
					  $off_dr = 0;
					  $off_cr = 0;
				foreach ($res as $key) { 
					$off_dr = $off_dr + $key->off_dr;
					$off_cr = $off_cr + $key->off_cr;
					?>
				<tr>                 
				<td style="text-align: center;"><?php echo $n; ?></td>  
				<td style="text-align: center;"><?php echo $key->off_apcode; ?></td>  
				<td><?php echo $key->off_apname; ?></td>  
				<td><?php echo $key->off_costcode; ?></td>  
				<td><?php echo $key->off_costname; ?></td>  
				<td style="text-align: right;"><?php echo $key->off_dr; ?></td>  
				<td style="text-align: right;"><?php echo $key->off_cr; ?></td>  
				 
				</tr>
				<?php $n++; } ?>
				</tbody>
				<tr>
					<td style="text-align: center;" colspan="5">Total</td>
					<td style="text-align: right;"><?php echo $off_dr; ?></td>
					<td style="text-align: right;"><?php echo $off_cr; ?></td>
				</tr>
				<script>
					$(".savee").hide();
					$("#insertrow").hide();
					$("#gl").hide();
				</script>
				</table>