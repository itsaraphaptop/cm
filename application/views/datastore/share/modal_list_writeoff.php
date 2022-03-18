<div class="row" id="table">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">A/C</th>
					<th class="text-center">Project / Department</th>
					<th class="text-center">System</th>
					<th class="text-center">Cost code</th>
					<th class="text-center">Budget Control</th>
					<th class="text-center">Dr</th>
					<th class="text-center">Cr.</th>
					<th class="text-center">Receive type</th>
					<th class="text-center">Decription</th>
					<th class="text-center">Ref No.</th>
					<th class="text-center">Ref.Date</th>
					<th class="text-center">Amount</th>
					<th class="text-center">%</th>
					<th class="text-center">Tax Amount</th>
					<th class="text-center">Vender</th>
					<th class="text-center">Customer</th>
					<th class="text-center">TAX</th>
					<th class="text-center">Tax No.</th>
					<th class="text-center">Tax/WT Date</th>
					<th class="text-center">Tax Description</th>
					<th class="text-center">Tax Type</th>
					<th class="text-center">Tax/Personal ID</th>
					<th class="text-center">Address</th>
					<th class="text-center">W/T No.</th>
				</tr>
			</thead>
			<tbody id="bodygl">
				<?php $n=1; $de_periond=0; foreach ($res as $key) { ?>
				<tr>
					<td><?php echo $n; ?><input type="hidden" value="Y" id="chki<?php echo $n; ?>" name="chki[]"><input type="hidden" value="" id="chkitype" name="chkitype[]"><input type="hidden" value="" id="ref" name="ref[]"></td>
					<td>
						<div class="input-group">
							
							<input _ice_ type="text" readonly="true" value="<?php echo $key->off_apcode; ?>" class="form-control input-sm" name="acc_code[]" id="acc_code<?php echo $n; ?>">
							<input type="text" style="width: 200px;" name="acc_name[]"  class="form-control" readonly="readonly" placeholder="Account Name" value="<?php echo $key->off_apname; ?>">
							<div class="input-group-btn">
								<button type="button" data-toggle="modal" data-target="#openacc<?php echo $n; ?>"  class="openacc<?php echo $n; ?> btn btn-default btn-icon"><i class="icon-search4"></i></button>
							</div>
						</div>
					</td>
					<td>
						<div class="form-group">
							<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Project Name " value="<?php echo $key->off_pjname; ?>" name="pro_name[]" id="pro_name<?php echo $n; ?>">
							<input type="hidden" _ice_ readonly="true" value="<?php echo $key->off_pjno; ?>" class="form-control input-sm" name="pro_code[]" id="pro_code<?php echo $n; ?>">
							<!-- <div class="input-group-btn">
									<button type="button" data-toggle="modal" data-target="#openpro"  class="openpro btn btn-default btn-icon"><i class="icon-search4"></i></button>
							</div> -->
						</div>
					</td>
					<?php $a = $this->db->query("select * from system where systemcode = '$key->fa_job'")->result();
						foreach ($a as $sy) {
							$systemname = $sy->systemname;
						}
					?>
					<td>
						<div class="form-group">
							<input type="text" style="width: 150px;"  class="form-control" readonly="readonly" placeholder="System Name " value="<?php echo $systemname; ?>" name="sys_name[]" id="sys_name<?php echo $n; ?>" >
							<input type="hidden" _ice_ readonly="true" value="<?php echo $key->fa_job; ?>" class="form-control input-sm" name="sys_code[]" id="sys_code<?php echo $n; ?>">
							<!-- <div class="input-group-btn">
									<button type="button" data-toggle="modal" data-target="#opensys"  class="opensys btn btn-default btn-icon"><i class="icon-search4"></i></button>
							</div> -->
						</div>
					</td>
					
					<td>
						<div class="input-group" id="origin">
							<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Code" name="costcode[]" id="aa<?php echo $n; ?>" value="<?php echo $key->off_costcode; ?>">
							<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Cost Name" name="costname[]" id="costnamei<?php echo $n; ?>" value="<?php echo $key->off_costname; ?>">
							<span class="input-group-btn" >
								<a class="costmat<?php echo $n; ?> btn btn-info btn-sm " data-toggle="modal" data-target="#costcode<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span></a>
							</span>
							<div id="costcode"></div></td>
							<td class="text-center"><div id="Budget" >-</div>
							<input value="" type="hidden" id="total_bal" name=total_bal[] type="text" />
							<input value="" type="hidden" id="boq_id" name=boq_id[] type="text" />
							<input value="" type="hidden" id="bd_tender"  name=bd_tenid[] type="text" /></td>
							<td><input type="text" style="width: 100px;" value="<?php echo $key->off_dr; ?>"  class="dr form-control text-right" value="" name="dr[]" id="dr" ac="#cr"></td>
							<td><input type="text" style="width: 100px;" value="<?php echo $key->off_cr; ?>" class="cr form-control text-right" value="" name="cr[]" id="cr" ac="#dr"></td>
							<td>
								<select class="form-control" name="paid[]" id="paid" style="width: 150px;">
									<option class="1">Bank(Chq.)</option>
									<option class="2">Cash</option>
								</select></td>
								<td>
									<input type="text" style="width: 250px;"  class="form-control" value="" name="description[]" id="description"></td>
									<td><input type="text" style="width: 100px;"  class="form-control" value="" name="refno[]" id="refno"></td>
									<td><input type="date" style="width: 150px;"  class="form-control" value="<?php echo date("Y-m-d"); ?>" name="refdates[]" id="refdate"></td>
									<td><input type="text" style="width: 100px;"  class="form-control text-right" value="<?php echo $key->off_dr+$key->off_cr; ?>" name="amt[]" id="amt"></td>
									<td><input type="text" style="width: 50px;"  class="form-control" value="" name="vat[]" id="vat"></td>
									<td><input type="text" style="width: 100px;"  class="form-control" value="" name="taxamt[]" id="taxamt"></td>
									<td><div class="input-group">
										<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Vender Name" value="" name="ven_name[]" id="ven_name">
										<input type="hidden" readonly="true" value="" class="form-control input-sm" name="ven_code[]" id="ven_code">
										<div class="input-group-btn">
											<!-- <button type="button" data-toggle="modal" data-target="#openven"  class="openven btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
										</div>
									</div></td>
									<td><div class="input-group">
										<input type="text" style="width: 200px;"  class="form-control" readonly="readonly" placeholder="Customer" value="" name="cus_name[]" id="cus_name">
										<input type="hidden" readonly="true" value="" class="form-control input-sm" name="cus_code[]" id="cus_code">
										<div class="input-group-btn">
											<!-- <button type="button" data-toggle="modal" data-target="#opencus"  class="opencus btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
										</div>
									</div></td>
									<td><select class="form-control"  id="tax" attr-id="" style="width: 100px;">
										<option class=""></option>
										<?php foreach ($setup_tax as $st1) { ?>
										<option value="<?php echo $st1->id_tax; ?>"><?php echo $st1->tax_name; ?></option>
										
										<?php } ?>
									</select>
									<!-- <input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="tax[]" id="taxs"></td> -->
									<td><input type="text" style="width: 100px;"  class="form-control" value="" name="taxnos[]" id="taxno"></td>
									<td><input type="date" style="width: 140px;" readonly="true" class="form-control" value="" name="taxdates[]" id="taxdate"></td>
									<td><select class="form-control" name="taxdesc[]" readonly="true" id="taxdes" style="width: 120px;">
										<option class=""></option>
										<?php foreach ($setup_taxdes as $st2) { ?>
										<option class="<?php echo $st2->id_taxdes; ?>"><?php echo $st2->tax_desname; ?></option>
										
										<?php } ?>
									</select></td>
									<td><select class="form-control" name="taxtype[]" readonly="true" id="taxtype" style="width: 100px;">
										<option value=""></option>
										<?php foreach ($taxtype as $s3) { ?>
										<option value="<?php echo $s3->id_taxtype; ?>"><?php echo $s3->taxtype_name; ?></option>
										
										<?php } ?>
									</select></td>
									<td><input type="text" style="width: 100px;" readonly="true" class="form-control" value="" name="taxid[]" id="taxid"></td>
									<td><input type="text" style="width: 250px;" readonly="true" class="form-control" value="" name="address[]" id="address"></td>
									<td><input type="text" style="width: 100px;"  class="form-control" value="" name="wt[]" id="wt"></td>
								</tr>
								
								
								<div class="modal fade" id="openacc<?php echo $n; ?>" data-backdrop="false">
									<div class='modal-dialog modal-lg'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												<h5 class='modal-title'>Book Account</h5>
											</div>
											<div class='modal-body'>
												<div id="acc<?php echo $n; ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<script>
								$('.openacc<?php echo $n; ?>').click(function(event) {
								$('#acc<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$("#acc<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/accchart/<?php echo $n; ?>');
								});
								</script>
								<div class="modal fade" id="openaccs<?php echo $n; ?>" data-backdrop="false">
									<div class='modal-dialog modal-lg'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												<h5 class='modal-title'>Book Account</h5>
											</div>
											<div class='modal-body'>
												<div id="accs<?php echo $n; ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<script>
								$('.openaccs<?php echo $n; ?>').click(function(event) {
								$('#accs<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$("#accs<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/accchart1/<?php echo $n; ?>');
								});
								</script>
								<div class="modal fade" id="costcode<?php echo $n; ?>" data-backdrop="false">
									<div class='modal-dialog modal-full'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												<h5 class='modal-title'>Costcode</h5>
											</div>
											<div class='modal-body'>
												<div id="modal_cost<?php echo $n; ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<script>
									
								$('.costmat<?php echo $n; ?>').click(function(){
								$('#modal_cost<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$("#modal_cost<?php echo $n; ?>").load('<?php echo base_url();?>share/costcode_id/<?php echo $n; ?>');
								});
								
								</script>
								<?php $n++;  }  ?>
								
							</tbody>
							<td colspan="6" class="text-center">Total</td>
							<td><input type="text" id="damt" style="text-align: right;" readonly="" name="sffumdr" class="form-control" style="width: 150px;" value="<?php echo $de_periond; ?>"></td>
							<td><input type="text" id="camt" style="text-align: right;" readonly="" name="sffumcr" class="form-control" style="width: 150px;" value="<?php echo $de_periond; ?>"></td>
						</tr>
					</table>
				</div>
			</div>
			<script>
			calculateSum();
			$(".dr").on("keydown keyup", function() {
			
			calculateSum();
			});
			function calculateSum() {
			var sum = 0;
			//iterate through each textboxes and add the values
			$(".dr").each(function() {
			//add only if the value is number
			if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
			sum += parseFloat($(this).val().replace(/,/g,""));
			$(this).css("background-color", "#FEFFB0");
			console.log(sum);
			//alert(sum)
			}
			// else if (this.value.length != 0){
			//     $(this).css("background-color", "red");
			// }
			});
			
			$("input#damt").val(numberWithCommas(sum));
			}
			calculateSum1();
			$(".cr").on("keydown keyup", function() {
			
			calculateSum1();
			});
			function calculateSum1() {
			var sum1 = 0;
			//iterate through each textboxes and add the values
			$(".cr").each(function() {
			//add only if the value is number
			if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
			sum1 += parseFloat($(this).val().replace(/,/g,""));
			$(this).css("background-color", "#FEFFB0");
			console.log(sum1);
			//alert(sum)
			}
			// else if (this.value.length != 0){
			//     $(this).css("background-color", "red");
			// }
			});
			
			$("input#camt").val(numberWithCommas(sum1));
			}
			</script>