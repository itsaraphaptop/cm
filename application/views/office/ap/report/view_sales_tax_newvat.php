<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<?php $month = sprintf("%02d",$input['month']); ?>
						<!-- <<p><?php var_dump($input);
						// sprintf("%02d",$month);
						?></p> -->
						<!-- <?php var_dump($month); ?> -->
						<input type="hidden" id="year-now" value="<?=$input['year']?>">
						<input type="hidden" id="month-now" value="<?=$month?>">
						<h3 class="control-label">ข้อมูลรายงานที่ต้องการกระทบยอด</h3>
					</div>
				</div>
				<form action="<?=base_url();?>ap_cheque/existing_ap" method="post">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="table-responsive">	
						          <table class="basic table table-hover table-xxs" style="width: 3000px;">
						            <thead>
						              <tr>
						              	<th style="width: 1%; text-align: center;">Select</th>
						              	<th style="width: 1%; text-align: center;">No.</th>
						              	<th style="width: 2%; text-align: center;">Vch. Date</th>
						              	<th style="width: 2%; text-align: center;">Tax Date</th>
						              	<th style="width: 2%; text-align: center;">Tax/Invoice No.</th>
						              	<th style="width: 4%; text-align: center;">Vender</th>
						              	<th style="width: 2%; text-align: center;">Tax ID</th>
						              	<th style="width: 2%; text-align: center;">Branch No.</th>
						              	<th style="width: 2%; text-align: center;">Module</th>
						              	<th style="width: 1%; text-align: center;">Type</th>
						              	<th style="width: 3%; text-align: center;">Vch. No.</th>
						              	<th style="width: 4%; text-align: center;">Ref Project/Department</th>
						              	<th style="width: 3%; text-align: center;">Amount</th>
						              	<th style="width: 2%; text-align: center;">% VAT</th>
						              	<th style="width: 1%; text-align: center;">VAT Amount</th>
						              	<th style="width: 2%; text-align: center;">Net Amount</th>
						              	<th style="width: 1%; text-align: center;">Year</th>
						              	<th style="width: 1%; text-align: center;">Month</th>
						              	<th style="width: 1%; text-align: center;"></th>
						              	<th style="width: 1%; text-align: center;">Ref.</th>
						              	<th style="width: 2%; text-align: center;">Add by</th>
						              	<th style="width: 2%; text-align: center;">Add Date</th>
						              	<th style="width: 2%; text-align: center;">Item Nono</th>
						              </tr>
						          	</thead>
						          	<tbody>
						          	<?php $chk = 0; foreach ($apv as $key => $value) { ?>
						          	  <tr>
						          		<td>
						          			<input type="checkbox" class="chkrow" id="<?=$value['apv_id'];?>" idchk="<?=$key?>" onclick="check($(this))" <?php if ($input['data']==2) {
						          				echo "checked disabled";
						          			}
						          			if ($input['data']==2) {
						          			 	$chk = 1;
						          			 } 
						          			?>/>
						          			<input type="hidden" class="pre check<?=$key?>" name="chkapv[]" value="<?=$chk?>">
						          			<input type="hidden" name="existing[]" value="<?php echo $input['year'].'-'.$month;?>">
						          			<input type="hidden" name="apv_id[]" value="<?=$value['apv_id'];?>">
						          		</td>
						          		<td><?=$key+1?></td>
						          		<td><?=$value['apv_date']; ?></td>
						          		<td><?=$value['apvi_taxdate']; ?></td>
						          		<td><?=$value['apvi_taxno']; ?></td>
						          		<td><?=$value['vender_name']; ?></td>
						          		<td><?=$value['apvi_taxid']; ?></td>
						          		<td></td>
						          		<td style="text-align: center;">AP</td>
						          		<td style="text-align: center;">R</td>
						          		<td><?=$value['apv_code']; ?></td>
						          		<td><?=$value['project_name']; ?></td>
						          		<td style="text-align: right;"><?=number_format($value['apv_netamt'],2); ?></td>
						          		<td style="text-align: right;"><?=number_format($value['apv_vatper'],2); ?></td>
						          		<td style="text-align: right;"><?=number_format($value['apv_vat'],2); ?></td>
						          		<td style="text-align: right;"><?=number_format($value['apv_totamt'],2); ?></td>
						          		<td style="text-align: center;"><?=$value['apv_glyear']; ?></td>
						          		<td style="text-align: center;"><?=$value['apv_glperiod']; ?></td>
						          		<td></td>
						          		<td></td>
						          		<td></td>
						          		<td></td>
						          		<td></td>
						          	  </tr>
						          	  <?php } ?>
						          	</tbody>
						          </table>
						      </div>
							</div>
						</div>
					</div>
					<br>
						<div class="form-group col-sm-12" style="text-align: right; ">
							<button class="btn btn-info btn-xs" type="button" id="preview">Preview</button>
							<?php if ($input['data']==2) {
								echo '<button class="btn btn-info btn-xs" id="print" type="button">Print</button>';
							} ?>
							<?php if ($input['data']==1) {
								echo '<button class="btn btn-success btn-xs" type="submit">Save</button>';
							} ?>
							
							<a href="<?=base_url();?>ap_cheque/view_sales_tax_val" type="button" class="btn btn-danger btn-xs">Close</a>
						</div>
				</form>	
			</div>
		</div>
	</div>
</div>
<?php 
$chk = 0; foreach ($apv as $key => $value1) 
	{
		$apv_glyear = $value['apv_glyear'];
		$apv_glperiod = $value['apv_glperiod'];
	}
?>
		<script type="text/javascript">
			function check(event)
			{
				var val = event.prop('checked');
				var id = event.attr('idchk');
				// alert(id);
				if (val===true) {
					$('.check'+id).val('1');
				}else{
					$('.check'+id).val('0');
				}
			}
			$('#preview').click(function(event) {
				location.href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_ap_taxsale_pre.mrt&year=<?php echo $apv_glyear;?>&month=<?php echo $apv_glperiod;?>"
			});
			$('#print').click(function(event) {
				var year = $('#year-now').val();
				var month = $('#month-now').val();
				// alert(year);
				var array = [];
				$('.chkrow').each(function(index, el) {
					// console.log(el);
					// console.log(el.checked);
					if (el.checked===true) {
						array.push(el.getAttribute('id'));
					}
				});

				$.post('<?=base_url();?>ap_cheque/preview_tax_sale', {array: array ,year : year,month : month}, function() {}).done(function(data){
					// alert(data);
					var res = jQuery.parseJSON(data);
					// console.log(res);
					if(res.status == true){
						swal("เลือกสำเร็จ !!",res.message,"success");
						

						$(".confirm").click(function(){
							
							location.href=res.url;
						})

						// alert(res.url);

					}else{
						swal("Error",res.message,"error");

					}
				});
			});
		</script>