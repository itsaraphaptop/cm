<table class="table table-xxs">
	<thead>
		<tr>
			<th width="5%">#</th>
			<th width="5%"></th>
			<th width="10%">Account Code</th>
			<th width="20%">Account Name</th>
			<th width="20%">Cost Code</th>
			<th width="auto">Material</th>
			<th width="10%">Dr</th>
			<th width="10%">Cr</th>
		</tr>
	</thead>
	<tbody>
               
                 <?php   $n =1; foreach ($poitem as $val) {
					
									 $query = $this->db->query("select accno,accname from cost_subgroup where csubgroup_code='$costcode'");
									 $res = $query->result();
									 $queven = $this->db->query("select accno,accname from vender where vender_id='$vendid'");
									 $resven = $queven->result();

							 ?>
               <tr>
                <td scope="row"><?php echo $n;?><input type="hidden" name="item_apv[]" value="<?php echo $n; ?>"></td>
								<td><input type="text" value="AMOUNT" id="type" class="form-control" name="type[]"></td>
								<?php foreach ($res as $value) {?>
									<td><div class="input-group"><input type="text" class="form-control input-sm" name="accno_gl[]" id="accno<?php echo $n; ?>" value="<?php echo $value->accno; ?>"><div class="input-group-btn"><button type="button" class="accopen<?php echo $n;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button></div></div></td>
									<td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $n; ?>" name="accountname_gl[]" value="<?php echo $value->accname; ?>"/></td>
								 <?php } ?>
								 <td><input type="text" class="form-control input-sm" readonly name="costcode_gl[]" id="costcode<?php echo $n;?>" value="<?php echo $val->poi_costcode; ?>"/></td>
                 				<td><input type="text" class="form-control input-sm" readonly name="matname_gl[]" id="matname<?php echo $n;?>" value="<?php echo $val->poi_matname; ?>"/>
                 				<input type="hidden" class="form-control input-sm" readonly name="matcode_gl[]" id="matcode<?php echo $n;?>" value="<?php echo $val->poi_matcode; ?>"/>
                 				</td>
								<td>
									<input type="text" class="form-control input-sm" name="drtot_gl[]" id="drtoti<?php echo $n; ?>" value="<?php echo ($val->poi_amount*$val->poi_vat/100)+$val->poi_netamt; ?>">
								</td>
                				<td>
									 <input type="text" class="form-control input-sm" name="crtot_gl[]" id="crtoti<?php echo $n; ?>" value="0.00">
									 <input type="hidden" name="vatper_gl[]" value="<?php if($val->poi_vat==""){echo "0";}else{echo $val->poi_vat;} ?>"
								</td><input type="hidden" name="vatamt_gl[]" value="<?php echo ($val->poi_amount*$val->poi_vat/100); ?>"
               </tr>
							 <div id="accopen<?php echo $n;?>" class="modal fade">
							 	<div class="modal-dialog modal-lg">
							 		<div class="modal-content">
							 			<div class="modal-header bg-primary">
							 				<button type="button" class="close" data-dismiss="modal">&times;</button>
							 				<h5 class="modal-title">Account <?php echo $n; ?></h5>
							 			</div>

							 			<div class="modal-body">
							 				<div class="loadaccchart<?php echo $n;?>">

							 				</div>
							 			</div>
							 			<div class="modal-footer">
							 				<!-- <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
							 				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a> -->
							 			</div>
							 		</div>
							 	</div>
							 </div>
							 <script>
							 $(".accopen<?php echo $n;?>").click(function(){
							 $('.loadaccchart<?php echo $n;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
							 $(".loadaccchart<?php echo $n;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $n; ?>');
							 });
							 </script>
                 <?php
                   $n++; $i=$n; $totcr=$totcr+($val->poi_amount*$val->poi_vat/100)+$val->poi_netamt;} ?>
									 <tr>
										  <?php foreach ($resven as $e) {?>
										 <td><?php echo $i; ?><input type="hidden" name="item_apvg" value="<?php echo $n; ?>"></td>
										 <td><input type="text" value="VENDER" id="type" class="form-control" name="type[]"></td>
										 <td><div class="input-group"><input type="text" class="form-control input-sm" name="accnog" id="accno<?php echo $i; ?>" value="<?php echo $e->accno; ?>"><div class="input-group-btn"><button type="button" class="accopen<?php echo $i;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button></div></div></td>
										 <td><input type="text" class="form-control input-sm" readonly name="accountnameg" id="accountname<?php echo $i; ?>" value="<?php echo $e->accname; ?>"/></td>
										 <?php } ?>
										 <td><input type="text" class="form-control input-sm" readonly id="costcode<?php echo $i;?>" name="costcodeg" ></td>
										 <td><input type="text" class="form-control input-sm" readonly id="matname<?php echo $i; ?>" name="matnameg" ></td>
										 <td><input type="text" class="form-control input-sm" name="drtotig" id="drtoti<?php echo $i; ?>" value="0.00"></td>
										 <td>
										 <input type="text" class="form-control input-sm" name="crtotig" id="crtoti<?php echo $i; ?>" value="<?php echo $totcr; ?>">
										 <!-- <input type="text" class="form-control input-sm" name="crtotig" id="crtoti<?php echo $i; ?>" value="<?php echo number_format($totcr,2); ?>"> --></td>
									 </tr>
                 <tr>
                   <td colspan="6" class='text-center'>Total</td>
									 <td><?php echo number_format($totcr,2); ?></td>
									 <td><?php echo number_format($totcr,2); ?></td>
                 </tr>
             </tbody>
</table>

<div id="accopen<?php echo $i;?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Account <?php echo $i; ?></h5>
			</div>

			<div class="modal-body">
				<div class="loadaccchart<?php echo $i; ?>">

				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
				<a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>
<script>
$(".accopen<?php echo $i;?>").click(function(){
$('.loadaccchart<?php echo $i;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$(".loadaccchart<?php echo $i;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $i; ?>');
});
</script>
