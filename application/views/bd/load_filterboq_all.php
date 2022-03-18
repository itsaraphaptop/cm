<?php $q=1; 

								foreach ($td_boq as $t_d) { 
									
									?>
								<tr>
									<td class="text-center"><?php echo $q; ?><input type="hidden" readonly="" id="substatus<?php echo $q; ?>" name="substatus[]" class="form-control input-xs text-right" value="E" style="width: 200px;">

									</td>
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
										<?php echo $t_d->subcostcodename; ?>
										<input type="hidden" readonly="" id="codecostcodee<?php echo $q; ?>" name="subcostcode[]" class="form-control input-xs text-right" value="<?php echo $t_d->subcostcode; ?>" style="width: 200px;"><input type="hidden" readonly="" id="codecostnamee<?php echo $q; ?>" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->subcostcodename; ?>">
									</div></td>
									<td><div class="input-group"><input readonly="true" type="text"  id="newmatnamee<?php echo $q; ?>" name="newmatnamee[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->newmatnamee; ?>"><input readonly="true" id="newmatcode<?php echo $q; ?>" style="width: 200px;" name="newmatcode[]"  type="hidden" class="form-control input-xs text-right" style="width: 150px;" value="<?php echo $t_d->newmatcode; ?>"> <span class="input-group-btn"><a class="openunl<?php echo $q; ?> btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmatl<?php echo $q; ?>"><i class="icon-search4"></i></a><a class="pool<?php echo $q; ?> btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmatttl<?php echo $q; ?>"><i class="icon-search4"></i></a><a class="clearmat<?php echo $q; ?> btn btn-default btn-icon" ><i class="glyphicon glyphicon-trash"></i></a></span> </div>
									
								</td>
									 <script>
			                        $('.clearmat<?php echo $q; ?>').click(function(event) {
			                           
			                            $('#newmatnamee<?php echo $q; ?>').val('');
			                            $('#newmatcode<?php echo $q; ?>').val('');
			                        });
			                    </script>
								<td><input id="boqcode<?php echo $q; ?>" name="boqcode[]" type="text" class="form-control input-xs text-right" value="<?php echo $t_d->boqcode; ?>" style="width: 100px;"></td>
								<td><input id="matboqq<?php echo $q; ?>" name="matboq[]" type="text"  class="form-control input-xs text-right" value="<?php echo $t_d->matboq; ?>" style="width: 150px;"></td>
								<td class="text-right"><div class="input-group"><input  id="unitcode<?php echo $q; ?>" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly="" value="<?php echo $t_d->unitcode; ?>"><input  id="unitname<?php echo $q; ?>" name="unitname[]" type="text" class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo $t_d->unitname; ?>"><span class="input-group-btn" ><span class="input-group-btn"><a class="unitt<?php echo $q; ?> btn btn-default btn-icon" data-toggle="modal" data-target="#unitl<?php echo $q; ?>"><i class="icon-search4"></i></a></span></div></td>
								<td class="text-right"><input id="qty_bg<?php echo $q; ?>" name="qty_bg[]" type="text" value="<?php echo $t_d->qty_bg; ?>" class="form-control input-xs text-right" style="width: 100px;"  required="">
								</td>
								<td class="text-right"><input type="text" id="matpricebg<?php echo $q; ?>" name="matpricebg[]" value="<?php echo number_format($t_d->matpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
								<td class="text-right"><input type="text" id="matamtbg<?php echo $q; ?>" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo number_format($t_d->matamtbg,2); ?>"></td>
								<td class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>" name="labpricebg[]" value="<?php echo number_format($t_d->labpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
								<td class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labamtbg,2); ?>"></td>

								<td class="text-right"><input type="text" id="subpricebg<?php echo $q; ?>" name="subpricebg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subpricebg,2); ?>"></td>
								<td class="text-right"><input type="text" id="subamtbg<?php echo $q; ?>" name="subamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subamtbg,2); ?>"></td>

								<td class="text-right"><input type="text"  id="totalamt<?php echo $q; ?>" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->totalamt,2); ?>"></td>
								<td class="text-right"><input type="hidden"  id="qtyboq<?php echo $q; ?>" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo $t_d->qtyboq; ?>"></td>
								<td class="text-right"><input type="hidden" id="matpriceboq<?php echo $q; ?>" name="matpriceboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->matpriceboq,2); ?>"></td>
								<td class="text-right"><input type="hidden" id="matamtboq<?php echo $q; ?>" name="matamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->matamtboq,2); ?>"></td>
								<td class="text-right"><input type="hidden"  id="labpriceboq<?php echo $q; ?>" name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labpriceboq,2); ?>"></td>
								<td class="text-right"><input type="hidden" id="labamtboq<?php echo $q; ?>" name="labamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labamtboq,2); ?>"></td>
								<td class="text-right"><input type="hidden" id="subpriceboq<?php echo $q; ?>" name="subpriceboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subpriceboq,2); ?>"></td>
								<td class="text-right"><input type="hidden" id="subamtboq<?php echo $q; ?>" name="subamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subamtboq,2); ?>"></td>
								<td class="text-right"><input type="hidden"   id="totalamtboq<?php echo $q; ?>" name="totalamtboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->totalamtboq,2); ?>"></td>
								<td class="text-center"><a id="del_boq" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>
								<td ><?php echo $q; ?>

									<div id="unitl<?php echo $q; ?>" class="modal fade">
										<div class="modal-dialog">
											<div class="modal-content ">
												<div class="modal-header bg-info">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">หน่วย</h5>
												</div>
												<div class="modal-body">
													<div class="row" id="modal_unitl<?php echo $q; ?>">
													</div>
												</div>
											</div>
										</div>
										</div>

							<div id="opnewmatl<?php echo $q; ?>" class="modal fade">
							<div class="modal-dialog modal-full">
								<div class="modal-content ">
									<div class="modal-header bg-info">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h5 class="modal-title">เพิ่มรายการ</h5>
									</div>
									<div class="modal-body">
										<div class="row" id="modal_matl<?php echo $q; ?>">
										</div>
									</div>
								</div>
							</div>
							</div>
							
					<div id="opnewmatttl<?php echo $q; ?>" class="modal fade">
						<div class="modal-dialog modal-full">
							<div class="modal-content ">
								<div class="modal-header bg-info">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">เพิ่มรายการ</h5>
								</div>
								<div class="modal-body">
									<div class="row" id="modal_mattl<?php echo $q; ?>">
									</div>
								</div>
							</div>
						</div>
						</div>
				

								</td>
							</tr>


							<script>
							$('#qty_bg<?php echo $q; ?>').keyup(function() {
							var labpricebg = $('#labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var matpricebg = $('#matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qty_bg*1) * (matpricebg*1) ;
							$('#matamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamt<?php echo $q; ?>').val(numberWithCommas(total));
							$('#qtyboq<?php echo $q; ?>').val(numberWithCommas(qty_bg));
							if($('#matamtbg<?php echo $q; ?>').val()==0){
							var ttla = (qty_bg*1) * (labpricebg*1);
							$('#totalamt<?php echo $q; ?>').val(numberWithCommas(ttla));
							$('#labamtbg<?php echo $q; ?>').val(numberWithCommas(ttla));
							}
							});
							$('#matpricebg<?php echo $q; ?>').keyup(function() {
							var qty_bg =$('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var matpricebg = $('#matpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qty_bg*1) * (matpricebg*1);
							$('#matamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamt<?php echo $q; ?>').val(numberWithCommas(total));
							});
							$('#labpricebg<?php echo $q; ?>').keyup(function() {
							$('#totalamt<?php echo $q; ?>').val(0);
							var labpricebg = $('#labpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qty_bg*1) * (labpricebg*1) ;
							$('#labamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							var labamtbg = $('#labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var matamtbg = $('#matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var ans =  (labamtbg*1) + (matamtbg*1) ;
							$('#labamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamt<?php echo $q; ?>').val(numberWithCommas(ans));
							});
							$('#subpricebg<?php echo $q; ?>').keyup(function() {
							$('#totalamt<?php echo $q; ?>').val(0);
							var subpricebg = $('#subpricebg<?php echo $q; ?>').val().replace(/,/g,"");
							var qty_bg = $('#qty_bg<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qty_bg*1) * (subpricebg*1) ;
							$('#subamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							var labamtbg = $('#labamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var matamtbg = $('#matamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var subamtbg = $('#subamtbg<?php echo $q; ?>').val().replace(/,/g,"");
							var ans =  (labamtbg*1) + (matamtbg*1) + (subamtbg*1) ;
							$('#subamtbg<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamt<?php echo $q; ?>').val(numberWithCommas(ans));
							});
							$('#qtyboq<?php echo $q; ?>').keyup(function() {
							var qtyboq =$('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matpriceboq = $('#matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qtyboq*1) * (matpriceboq*1) ;
							$('#matamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							});
							$('#matpriceboq<?php echo $q; ?>').keyup(function() {
							var qtyboq =$('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matpriceboq = $('#matpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = (qtyboq*1) * (matpriceboq*1) ;
							$('#matamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							});
							$('#labpriceboq<?php echo $q; ?>').keyup(function() {
							$('#totalamtboq<?php echo $q; ?>').val(0);
							var labpriceboq = $('#labpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var qtyboq = $('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = qtyboq * labpriceboq ;
							$('#labamtboq<?php echo $q; ?>').val(total);
							var labamtboq = $('#labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matamtboq = $('#matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var ans =  (labamtboq*1) + (matamtboq*1) ;
							$('#labamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(ans));
							});

							$('#subpriceboq<?php echo $q; ?>').keyup(function() {
							$('#totalamtboq<?php echo $q; ?>').val(0);
							var subpriceboq = $('#subpriceboq<?php echo $q; ?>').val().replace(/,/g,"");
							var qtyboq = $('#qtyboq<?php echo $q; ?>').val().replace(/,/g,"");
							var total = qtyboq * subpriceboq ;
							$('#subamtboq<?php echo $q; ?>').val(total);
							var labamtboq = $('#labamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var matamtboq = $('#matamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var subamtboq = $('#subamtboq<?php echo $q; ?>').val().replace(/,/g,"");
							var ans =  (labamtboq*1) + (matamtboq*1) + (subamtboq*1);
							$('#subamtboq<?php echo $q; ?>').val(numberWithCommas(total));
							$('#totalamtboq<?php echo $q; ?>').val(numberWithCommas(ans));
							});
							
							$('#num').val('<?php echo $q; ?>');
							</script>



			
				<script>
				
				$('.unitt<?php echo $q; ?>').click(function(){
				$('#modal_unitl<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_unitl<?php echo $q; ?>").load('<?php echo base_url(); ?>share/unit/<?php echo $q; ?>');
				});
				
				</script>

				<script>
				
				$(".openunl<?php echo $q; ?>").click(function(){
				$('#modal_matl<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_matl<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/bd/material_alonee/<?php echo $q; ?>');
				});
				</script>

				<script>
				
				$(".pool<?php echo $q; ?>").click(function(){
				$('#modal_mattl<?php echo $q; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_mattl<?php echo $q; ?>").load('<?php echo base_url(); ?>index.php/share/getmatcode/<?php echo $q; ?>');
				});
				</script>
							<?php $q++; } ?>
