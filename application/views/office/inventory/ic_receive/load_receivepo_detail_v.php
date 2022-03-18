
<div class="table-responsive">
<table class="tablew table table-bordered table-striped table-xxs">
	<thead>
		<tr>
			<th>No.</th>
			<th>Material Code</th>
			<th>Material Name</th>
			<th width="10%">Warehouse</th>
			<th>QTY (PO)</th>
			<th>Unit (PO)</th>
			<th>Cost Code</th>	
			<th width="10%">Conv.(IC)</th>	
			<th width="10%">Qty (IC)</th>	
			<th>Unit (IC)</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1;  foreach ($resi as $key => $value) {
		?>
		<tr>
			<td><?php echo $n;?></td>
			<td><?php echo $value->poi_matcode; ?><input type="hidden" name="matcode[]" value="<?php echo $value->poi_matcode; ?>"/></td>
			<td><?php echo $value->poi_matname; ?><input type="hidden" name="matname[]" value="<?php echo $value->poi_matname; ?>"/></td>
			<td><?php echo $value->ic_warehouse; ?>
			<?php ?>
				<select class="form-control" required id="warehouse<?php echo $n;?>" name="war[]">
					<option value=""></option>
						<?php if ($porijectid=="") {?>
								<option value="DEPOVERHEAD">OVERHEAD</option>
						<?php }else{?>
							<?php foreach ($getwarehouse as $valueddd) {?>
							
								<option  value="<?php echo $valueddd->whcode; ?>"><?php echo $valueddd->whname; ?></option>
							<?php	} ?>
						<?php } ?>		
				</select>
			<input type="hidden" readonly="" class="form-control" name="warehouse[]" id="warehouses<?php echo $n;?>" value=""/>
			</td>

			<td><?php echo $value->poi_qty; ?><input type="hidden" name="qty[]" id="qtyg<?php echo $value->poi_id;?>" value="<?php echo $value->poi_qty; ?>"/></td>
			<td><?php echo $value->poi_unit; ?><input type="hidden" name="unit[]" value="<?php echo $value->poi_unit; ?>"/></td>
			<td><?php echo $value->poi_costcode; ?><input type="hidden" name="costcode[]" value="<?php echo $value->poi_costcode; ?>"/><input type="hidden" name="costname[]" value="<?php echo $value->poi_costname; ?>"/>

			<td><input type="number" class="form-control" name="cqtyic[]" id="cqtyic<?php echo $value->poi_id;?>" value="<?php echo $value->poi_qtyic; ?>"></td>
			<td>
				<input type="number" readonly class="form-control" name="pqtyic[]" id="pqtyic<?php echo $value->poi_id;?>" value="<?php echo $value->poi_qty*$value->poi_qtyic; ?>">
			</td>
			<td><?php echo $value->poi_unitic; ?> 
				<input type="hidden" value="<?php echo $value->poi_unitic; ?>" name="uniticii[]">

				<input type="hidden" name="disamt[]" value="<?php echo $value->poi_disamt;?>"/>

				<input type="hidden" name="priceunit[]" value="<?php echo ($value->poi_priceunit);?>"/></td>

				<input type="hidden" name="inputreceipt[]" value="<?php echo $value->poi_qty;?>"/>
				<input type="hidden" name="balance[]" value="<?php echo $value->poi_receivetot?>"/>
				
				<input type="hidden" name="amount[]" value="<?php echo $value->poi_amount;?>"/>
				<input type="hidden" name="dis1[]" value="<?php echo $value->poi_discountper1;?>"/>
				<input type="hidden" name="dis2[]" value="<?php echo $value->poi_discountper2?>"/>
				
				<input type="hidden" name="vat[]" value="<?php echo $value->poi_vat;?>"/>
				<input type="hidden" name="netamt[]" value="<?php echo $value->poi_netamt;?>"/>
				<input type="hidden" name="disex[]" value="<?php echo $value->poi_disamt;?>"/>
				<input type="hidden" name="chki[]" value="Y">
				<input type="hidden" name="poid[]" value="<?php echo $value->poi_id; ?>">
				<input type="hidden" name="poi_receivedate[]" value="<?php echo $value->poi_receivedate; ?>">
				
			</td>
		</tr>

		<script>
		console.log(<?php echo $key; ?>);
			$("#cqtyic<?php echo $value->poi_id;?>").keyup(function(){
				var qty =  parseFloat($("#qtyg<?php echo $value->poi_id;?>").val());
				var conv = parseFloat($("#cqtyic<?php echo $value->poi_id;?>").val());
				var sum = parseFloat(qty*conv);
				$("#pqtyic<?php echo $value->poi_id;?>").val(sum);
			});
			$("#warehouse<?php echo $n;?>").change(function(){
				var a = 1;
				var b = parseInt($("#ggg").val());
				var c = parseInt(b+a);
				$("#ggg").val(c);
				var wh = $("#warehouse<?php echo $n;?>").val();
				// alert(wh);
				var wh_repl = wh.split('-');
				$("#warehouses<?php echo $n;?>").val(wh);
				// $("#whcode<?php echo $n;?>").val(wh_repl[0]);
				$("#warehouse<?php echo $n;?>").prop('disabled',true);
			});
		</script>
		<?php $n++; } ?>
	</tbody>
</table>
<input type="hidden" id="ggg" value="1">
<input type="hidden" id="cck" value="<?php echo $n; ?>">
</div>
<script type="text/javascript">

	$("#saveh").click(function(){
		if ($("#ggg").val()!=$("#cck").val()) {
			swal({
				title: "Please Select Warehouse!!",
				text: "Not Save",
				confirmButtonColor: "#FF0000",
				type: "error"
			});
		}else if ($("#pqtyic<?php echo $value->poi_id;?>").val()==0) {
			swal({
				title: "Please Select Conv.(IC)!!",
				text: "Not Save",
				confirmButtonColor: "#FF0000",
				type: "error"
			});
		
		}else{
			var frm = $('#savepost');
				    frm.submit(function (ev) {
				        $.ajax({
				            type: frm.attr('method'),
				            url: frm.attr('action'),
				            data: frm.serialize(),
				            				success: function (data) {
												swal({
											            title: "No :"+data,
											            text: "Save Completed!!.",
											            // confirmButtonColor: "#66BB6A",
											            type: "success"
											        });
												$("#docno").val(data);
												$("#docdate").prop("readonly",true);
												$("#invco").prop("readonly",true);
												$("#invdate").prop("readonly",true);
												$("#dono").prop("readonly",true);
												$("#dodate").prop("readonly",true);
												$("#saveh").prop("disabled",true);	
												$("#print").prop("disabled",false);
												setTimeout(function() {
													// window.location.href = "<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=receipt_ic.mrt&doccode="+data+"&compcode=<?=$compcode;?>";
													window.location.href = "<?php echo base_url(); ?>report/viewerload?type=ic&typ=receipt_ic&var1="+$.trim(data)+"&var2=<?=$compcode;?>";
													}, 500);
												$("#print").click(function(){
												setTimeout(function() {
													// window.location.href = "<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=receipt_ic.mrt&doccode="+data+"&compcode=<?=$compcode;?>";
													window.location.href = "<?php echo base_url(); ?>report/viewerload?type=ic&typ=receipt_ic&var1="+$.trim(data)+"&var2=<?=$compcode;?>";
													}, 500);
												});
				            }
				        });
				        ev.preventDefault();

				    });




	 $("#savepost").submit(); //Submit  the FORM
		}
					
	});
	
</script>