							<table class="table table-hover table-bordered table-striped table-xxs">
										<thead>
											<tr>
												<th>No.</th>
												<th>Material Code</th>
												<th>Material Name</th>
												<th>Cost Code</th>
												<th>Qty</th>
												<th>Unit</th>
												<th>Price/Unit</th>
												<th>Amount</th>
												<th>Disc.(%)</th>
												<th>Disc.Amount</th>
												<th>Total Disc</th>
												<th>Vat Amount</th>
												<th>Net Amount</th>
												<th>Active</th>
											</tr>
										</thead>
										<tbody id="top">
											
										</tbody>
										<tbody>
										<?php $n=1; foreach ($res as $p) { ?>
										<tr>
										<td><?php echo $n; ?></td>
										<td id="smatcode<?php echo $n; ?>"><?php echo $p->poi_matcode; ?>
										</td>
										<td id="smatname<?php echo $n; ?>" ><?php echo $p->poi_matname; ?>
										</td>
										<td id="scostname<?php echo $n; ?>"><?php echo $p->poi_costcode; ?>
											<input type="hidden" name="costnamei[]" value="<?php echo $p->poi_costname; ?>">
											<input type="hidden" name="codtcodei[]" value="<?php echo $p->poi_costcode; ?>">
										</td>
										<td id="sqtyi<?php echo $n; ?>"><?php echo number_format($p->poi_qty); ?>
											<input type="hidden" name="qtyi[]" value="<?php echo $p->poi_qty; ?>">
										</td>
										<td id="sunit<?php echo $n; ?>"><?php echo $p->poi_unit; ?>
											<input type="hidden" name="uniti[]" value="<?php echo $p->poi_unit; ?>">
										</td>
										<td id="spriceunit<?php echo $n; ?>">
											<input class='txt1 form-control input-sm text-right' type='text' id='amounti<?php echo $n; ?>' name='amounti[]' value="<?php echo $p->poi_priceunit; ?>" readonly>
										</td>
										<td id="samount<?php echo $n; ?>">
											<input class="txt1 form-control input-sm text-right" type="text" id="amounti1" name="amounti[]" value="<?php echo $p->poi_amount; ?>" readonly="">
										</td>
										<td id="sdisone<?php echo $n; ?>">
											<input class='form-control input-sm text-right' type='text' name='disci5[]' id='disci5<?php echo $n; ?>' value="<?php echo $p->poi_discountper1+$p->poi_discountper2+$p->poi_discountper3+$p->poi_discountper4; ?>" readonly>
											<input class='form-control input-sm text-right' type='hidden' name='disci1[]' id='disci1<?php echo $n; ?>' value="<?php echo $p->poi_discountper1; ?>" readonly>
											<input class='form-control input-sm text-right' type='hidden' name='disci2[]' id='disci2<?php echo $n; ?>' value="<?php echo $p->poi_discountper2; ?>" readonly>
											<input class='form-control input-sm text-right' type='hidden' name='disci3[]' id='disci3<?php echo $n; ?>' value="<?php echo $p->poi_discountper3; ?>" readonly>
											<input class='form-control input-sm text-right' type='hidden' name='disci4[]' id='disci4<?php echo $n; ?>' value="<?php echo $p->poi_discountper4; ?>" readonly>
										</td>
										<!-- <td id="sdistwo<?php echo $n; ?>"><input class='form-control input-sm' type='text' name='disci2[]' id='disci2<?php echo $n; ?>' value="<?php echo $p->poi_discountper2; ?>" readonly>
										</td>
										<td id="sdisthree<?php echo $n; ?>"><input class='form-control input-sm' type='text' name='disci3[]' id='disci3<?php echo $n; ?>' value="<?php echo $p->poi_discountper3; ?>" readonly>
										</td>
										<td id="sdisfour<?php echo $n; ?>"><input class='form-control input-sm' type='text' name='disci4[]' id='disci4<?php echo $n; ?>' value="<?php echo $p->poi_discountper4; ?>" readonly>
										</td> -->
										<td id="sdisce<?php echo $n; ?>">
											<input type='text' class='txt2 form-control input-sm text-right' name='disamti[]'  id='zum1<?php echo $n; ?>' value="<?php echo $p->poi_disce; ?>" readonly>
										</td>
										<td id="sdisamt<?php echo $n; ?>">
											<input type='text' class='txt3 form-control input-sm text-right' name='too_di[]' id='zum2<?php echo $n; ?>' value="<?php echo $p->poi_disamt; ?>" readonly>
										</td>
										<td id="total_vat<?php echo $n; ?>">
											<input type='text' class='txt4 form-control input-sm text-right' name='to_vat[]' id='zum3<?php echo $n; ?>' value="<?php echo $p->poi_vat; ?>" readonly>
										</td>
										<td id="snetamt<?php echo $n; ?>">
											<input type='text' class='txt5 form-control input-sm text-right' name='netamti[]' id='zum4<?php echo $n; ?>' value="<?php echo $p->poi_netamt; ?>" readonly>
										</td>
										<td><a type="button" class="label label-primary"><i class="icon-folder-open"></i> REVISE</a></td>
										</tr>
										<?php $n++; } ?>
										
										</tbody>

										<tr>
											<td colspan="6" class="text-center">Summary</td>
											
											<!-- <td></td> -->
											<td><div style="width: 100px;"><input type="text" readonly class="form-control input-sm text-right" id="summaryunit" name="summaryunit" value="0"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly class="form-control input-sm text-right" id="summaryamt" name="summaryamt" value="0"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly class="form-control input-sm text-right" id="summaryd1" name="summaryd1" value="0"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly class="form-control input-sm text-right" id="summarydis" name="summarydis"  value="0"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly class="form-control input-sm text-right" id="summarydi" name="summarydi" value="0"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly class="form-control input-sm text-right" id="summaryvat" name="summaryvat" value="0"></div></td>
											<td><div style="width: 100px;"><input type="text" readonly class="form-control input-sm text-right" id="summarytot" name="summarytot" value="0"></div></td>
											<td></td>
											<!-- <td><label id="summarytot"></label></td> -->
											
										</tr>
									</table>