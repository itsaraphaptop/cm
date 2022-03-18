
						
							
						
								<?php $q=1; 
									  $qty_bg = 0;
									  $matpricebg = 0;
									  $matamtbg = 0;
									  $labpricebg = 0;
									  $labamtbg = 0;
									  $totalamt = 0;
									  $matpriceboq = 0;
									  $matamtboq = 0;
									  $labpriceboq = 0;
									  $labamtboq = 0;
									  $totalamtboq = 0;
								foreach ($boq_i as $t_d) { 
									$qty_bg = $qty_bg+$t_d->qty_bg;
									$matpricebg = $matpricebg+$t_d->matpricebg;
									$matamtbg = $matamtbg+$t_d->matamtbg;
									$labpricebg = $labpricebg+$t_d->labpricebg;
									$labamtbg = $labamtbg+$t_d->labamtbg;
									$totalamt = $totalamt+$t_d->totalamt;
									$matpriceboq = $matpriceboq+$t_d->matpriceboq;
									$matamtboq = $matamtboq+$t_d->matamtboq;
									$labpriceboq = $labpriceboq+$t_d->labpriceboq;
									$labamtboq = $labamtboq+$t_d->labamtboq;
									$totalamtboq = $totalamtboq+$t_d->totalamtboq;
									?>
								<tr>
									<td class="text-center"><?php echo $q; ?><input type="hidden" readonly="" id="substatus<?php echo $q; ?>" name="substatus[]" class="form-control input-xs text-right" value="e" style="width: 200px;"></td>
									<td><?php
										$this->db->select('*');
										$this->db->from('bdtender_d');
										$this->db->where('bdd_tenid',$tdn);
										$this->db->where('bdd_jobno',$t_d->boq_job);
										$tender_d=$this->db->get()->result(); ?>
										<?php  foreach ($tender_d as $tender_dd) { ?>
										<?php echo $tender_dd->bdd_jobname; ?>
										<?php } ?>
										<input type="hidden" readonly="" id="job<?php echo $q; ?>" name="job[]" class="form-control input-xs text-right" value="<?php echo $t_d->boq_job; ?>" style="width: 200px;">

										<input type="hidden" readonly="" id="boq_id<?php echo $q; ?>" name="boq_id[]" class="form-control input-xs text-right" value="<?php echo $t_d->boq_id; ?>" style="width: 200px;">
									</td>
									<td><div style="width: 200px;">
										<?php echo $t_d->subcostcode; ?> || <?php echo $t_d->subcostcodename; ?>
										<input type="hidden" readonly="" id="codecostcodee<?php echo $q; ?>" name="subcostcode[]" class="form-control input-xs text-right" value="<?php echo $t_d->subcostcode; ?>" style="width: 200px;"><input type="hidden" readonly="" id="codecostnamee<?php echo $q; ?>" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->subcostcodename; ?>">
									</div></td>
									<td><div class="input-group"><input readonly="true" type="text"  id="newmatnamee<?php echo $q; ?>" name="newmatnamee[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->newmatnamee; ?>"><input readonly="true" id="newmatcode<?php echo $q; ?>" style="width: 200px;" name="newmatcode[]"  type="hidden" class="form-control input-xs text-right" style="width: 150px;" value="<?php echo $t_d->newmatcode; ?>"><span class="input-group-btn"></span></div>
									
								</td>
								<td><input id="boqcode<?php echo $q; ?>" name="boqcode[]" type="text" class="form-control input-xs text-right" value="<?php echo $t_d->boqcode; ?>" style="width: 100px;" readonly=""></td>
								<td><input id="matboqq<?php echo $q; ?>" name="matboq[]" type="text"  class="form-control input-xs text-right" value="<?php echo $t_d->matboq; ?>" style="width: 150px;" readonly=""></td>
								<td class="text-right"><div class="input-group"><input  id="unitcode<?php echo $q; ?>" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly="" value="<?php echo $t_d->unitcode; ?>" readonly=""><input  id="unitname<?php echo $q; ?>" name="unitname[]" type="text" class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo $t_d->unitname; ?>" readonly=""></div></td>
								<td style="background-color: #F0F8FF;" class="text-right"><input id="qty_bg<?php echo $q; ?>" name="qty_bg[]" type="text" value="<?php if($t_d->status=="Y"){ echo $t_d->qty_bg; }else{ echo "0"; } ?>" class="form-control input-xs text-right" style="width: 100px;"  required="" readonly="" readonly=""><input type="hidden"  id="qtyboq<?php echo $q; ?>" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo $t_d->qtyboq; ?>" readonly="">
								</td>
								<td style="background-color: #F0F8FF;" class="text-right"><input type="text" id="matpricebg<?php echo $q; ?>" name="matpricebg[]" value="<?php if($t_d->status=="Y"){ echo number_format($t_d->matpricebg,2); }else{ echo "0"; } ?>" class="form-control input-xs text-right" style="width: 100px;" readonly=""></td>
								<td style="background-color: #F0F8FF;" class="text-right"><input type="text" id="matamtbg<?php echo $q; ?>" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php if($t_d->status=="Y"){ echo number_format($t_d->matamtbg,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F0F8FF;" class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>" name="labpricebg[]" value="<?php if($t_d->status=="Y"){ echo number_format($t_d->labpricebg,2); }else{ echo "0"; } ?>" class="form-control input-xs text-right" style="width: 100px;" readonly=""></td>
								<td style="background-color: #F0F8FF;" class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status=="Y"){ echo number_format($t_d->labamtbg,2); }else{ echo "0"; } ?>" readonly=""></td>

								<td style="background-color: #F0F8FF;" class="text-right"><input type="text" id="subpricebg<?php echo $q; ?>" name="subpricebg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status=="Y"){ echo number_format($t_d->subpricebg,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F0F8FF;" class="text-right"><input type="text" id="subamtbg<?php echo $q; ?>" name="subamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status=="Y"){ echo number_format($t_d->subamtbg,2); }else{ echo "0"; } ?>" readonly=""></td>

								<td style="background-color: #F0F8FF;" class="text-right"><input type="text"  id="totalamt<?php echo $q; ?>" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status=="Y"){ echo number_format($t_d->totalamt,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text"  id="qtyboq<?php echo $q; ?>" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo $t_d->qtyboq; }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text" id="matpriceboq<?php echo $q; ?>" name="matpriceboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo number_format($t_d->matpriceboq,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text" id="matamtboq<?php echo $q; ?>" name="matamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo number_format($t_d->matamtboq,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text"  id="labpriceboq<?php echo $q; ?>" name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo number_format($t_d->labpriceboq,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text" id="labamtboq<?php echo $q; ?>" name="labamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo number_format($t_d->labamtboq,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text" id="subpriceboq<?php echo $q; ?>" name="subpriceboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo number_format($t_d->subpriceboq,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text" id="subamtboq<?php echo $q; ?>" name="subamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo number_format($t_d->subamtboq,2); }else{ echo "0"; } ?>" readonly=""></td>
								<td style="background-color: #F5FFFA;" class="text-right"><input type="text"   id="totalamtboq<?php echo $q; ?>" name="totalamtboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php if($t_d->status_boq=="Y"){ echo number_format($t_d->totalamtboq,2); }else{ echo "0"; } ?>" readonly=""></td>
								<!-- <td class="text-center"><a id="del_boq" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td> -->
								<td style="color: #BEBEBE;"><?php echo $q; ?></td>
							</tr>

							<?php $q++; } ?>



							
					