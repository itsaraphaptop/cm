<table class="table table-hover table-bordered table-striped table-xxs">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">Vender Name</th>
										<th class="text-center">Date</th>
										<th class="text-center"><div style="width: 250px;">Material Code</div></th>
										<th class="text-center"><div style="width: 250px;">Material Name</div></th>
										<th class="text-center">Cost Code</th>
										<th class="text-center">Qty</th>
										<th class="text-center">Unit</th>
										<th class="text-center">Price/Unit</th>
										<th class="text-center">Amount</th>
										<th class="text-center">Disc.(%)</th>
										<th class="text-center">Disc.Amount</th>
										<th class="text-center">Total Disc</th>
										<th class="text-center">Vat Amount</th>
										<th class="text-center">Net Amount</th>
										
									</tr>
								</thead>
								<tbody>
								
									<?php $n=1; foreach ($res as $cp) { ?>
									<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $cp->po_vender; ?></td>
									<td><?php echo $cp->usercreate; ?></td>
									<td><?php echo $cp->poi_matcode; ?></td>
									<td><?php echo $cp->poi_matname; ?> <?php echo $cp->remark_mat; ?></td>
									<td><?php echo $cp->poi_costcode; ?></td>
									<td class="text-right"><?php echo $cp->poi_qty; ?></td>
									<td class="text-right"><?php echo $cp->poi_unit; ?></td>
									<td class="text-right" style="color: red;"><?php echo number_format($cp->poi_priceunit,2); ?></td>
									<td class="text-right"><?php echo number_format($cp->poi_amount,2); ?></td>
									<td class="text-right"><?php echo $cp->poi_discountper1+$cp->poi_discountper2+$cp->poi_discountper3+$cp->poi_discountper4; ?></td>
									<td class="text-right"><?php echo number_format($cp->poi_disce,2); ?></td>
									<td class="text-right"><?php echo number_format($cp->poi_disamt,2); ?></td>
									<td class="text-right"><?php echo number_format($cp->poi_vat,2); ?></td>
									<td class="text-right"><?php echo number_format($cp->poi_netamt,2); ?></td>
									
									</tr>
									<?php $n++; } ?>
								
									
								</tbody>
								
								</table>