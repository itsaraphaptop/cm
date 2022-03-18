<style type="text/css">
	.my_bottom{
		vertical-align:bottom;
		text-align:right;		
	}
	.purchase_cost{
		cursor: pointer;
	}
	.th_head{
		text-align: right;
	}
</style>
<?php 


	function gen_col_revise($array){
		$array_return = array();
		// var_dump($array);
		if($array!= false){
			foreach ($array as $key => $value) {
				$array_return[] =  "Rev #{$value} <p class='my_bottom'> (".($value+2).")</p>";
			}
		}
		
		return $array_return;
	}

	$new_gencol = gen_col_revise($col_revise);


?>


<table class="table table-bordered datatable-fixed-left"  style="overflow: auto;width: 2500px;">
	<tr class="tr_head" style="background-color: #7cacf9">
		<th class="th_head">cost code</th>
		<th style="width: 500px;">Description</th>
		
		<th class="th_head">Contract (1)</th>
			<?php echo "<th class='th_head'>".implode("</th><th class='th_head'>", $new_gencol)."</th>";?>
		<th class="th_head" style="width: 300px;">
			Dif. <p class="my_bottom">(<?=end($col_revise)+3 ?>) = (<?=end($col_revise)+2 ?>) - (<?=end($col_revise)+1 ?>) </p> 
		</th>
		<th class="th_head" style="width: 300px;">
			Gross Margin <p class="my_bottom">(<?=end($col_revise)+4 ?>) = (1) - (<?=end($col_revise)+2 ?>)</p>
		</th>
		<th class="th_head" style="width: 300px;">
			Purchase Cost (PO and Non PO) <p class="my_bottom"> (<?=end($col_revise)+5 ?>)</p>
		</th>
		<th class="th_head" style="width: 300px;">
			Budget Balance <p class="my_bottom">(<?=end($col_revise)+6 ?>) = (<?=end($col_revise)+2 ?>) - (<?=end($col_revise)+5 ?>)</p>
		</th>
		<th class="th_head" style="width: 300px;">
			Forecast Budget <p class="my_bottom">(<?=end($col_revise)+7 ?>)</p>
		</th>
		<th class="th_head" style="width: 300px;">
			To Be Order <p class="my_bottom">(<?=end($col_revise)+8?>) = (<?=end($col_revise)+7 ?>) - (<?=end($col_revise)+5 ?>)</p>
		</th>
		<th class="th_head" style="width: 300px;">
			Variance Budget <p class="my_bottom">(<?=end($col_revise)+9?>) = (<?=end($col_revise)+2 ?>) - (<?=end($col_revise)+7 ?>)</p>
		</th>
		<th class="th_head" style="width: 300px;">
			Actual Cost <p class="my_bottom"></p>
		</th>
	</tr>

	<?php foreach ($data as $key => $item) { ?>
		<tr style="">
			<td><?=$item["newmatcode"]?></td>
			<td><?=$item["newmatnamee"]?></td>
			
			<td class="number"><?=$item["totalamtboq"]?></td>
			<?php echo "<td class='number'>".implode("</td><td class='number'>", $item["revise_list"])."</td>";?>
			
			<td class="number"><?=$item['dif']?></td>
			<td class="number"><?=$item["gross_margin"]?></td>
			<td class="number purchase_cost"  heading="<?=$heading?>" costcode="<?=$item["subcostcode"]?>"><?=$item["purchase_cost"]?></td>
			<td class="number"><?=$item["Budget_bal"]?></td>
			<td class="number"><?=$item["forecastbg"]?></td>
			<td class="number"><?=$item["to_be_order"]?></td>
			<td class="number"><?=$item["variance_bg"]?></td>
			<td class="number"><?=$item["actual_cost"]?></td>
		</tr>
	<?php }?>


</table>

<script type="text/javascript">
	$(function(){
		$("html").append('<div class="loading">Loading&#8230;</div>');
		$(".number").each(function(index, el) {
			let data = $(el).text()*1;		
			$(this).html(numberWithCommas(data));

			if(data<0){
				$(this).css('color','#f7b03d');
			}else if(data>0){
				$(this).css('color','#28c117');
				
			}

			$(this).css('text-align', 'right');
		});
		$(".loading").remove();

		$(".purchase_cost").click(function(event) {

			let project_code = '<?=$project_code?>';
			let project_id = '<?=$project_id?>';
			let heading = $(this).attr('heading');
			let costcode = $(this).attr('costcode');
			//$("#modal-body").html(heading+" "+costcode);
			// $("#modal_full").modal('show');
			//alert(project_code+" "+project_id)
			

			$.post('<?=base_url()?>management/sum_Purchase_Cost_detail', 
				{
					project_code: project_code,
					project_id:project_id,
					heading:heading,
					costcode:costcode
				}
				, function() {
				/*optional stuff to do after success */
			}).done(function(data){
				
				console.log(data);
				var detail_Purchase_Cost = jQuery.parseJSON(data);

				//$("#PO").html(detail_Purchase_Cost.po);
				// console.log(detail_Purchase_Cost.po)
				$("#PO_content_table").empty();
				$.each(detail_Purchase_Cost.po, function(index, po) {
					var po_row = `
						<tr>
							<td>${po.po_pono}</td>											
							<td>${po.po_podate}</td>
							<td>${po.po_vender}</td>
							<td>${po.poi_costcode}</td>
							<td>${po.poi_matcode}</td>
							<td>${po.poi_matname}</td>
							<td></td>
							<td class='number_modal'>${po.poi_qty}</td>
							<td>${po.poi_unit}</td>
							<td class='number_modal'>${po.poi_priceunit}</td>
							<td class='number_modal'>${po.poi_disamt}</td>
						</tr>

					`;
					$("#PO_content_table").append(po_row);

				});

				$("#WO_content_table").empty();

				$.each(detail_Purchase_Cost.wo, function(index, wo) {
					 var wo_row = `
						<tr>
							<td>${wo.lo_lono}</td>											
							<td>${wo.lodate}</td>
							<td>${wo.contactor}</td>
							<td>${wo.lo_costcode}</td>
							<td>${wo.lo_matcode}</td>
							<td>${wo.lo_matname}</td>
							<td></td>
							<td class='number_modal'>${wo.lo_qty}</td>
							<td>${wo.lo_unit}</td>
							<td class='number_modal'>${wo.lo_price}</td>
							<td class='number_modal'>${wo.total_disc}</td>
						</tr>

					`;
					$("#WO_content_table").append(wo_row);

				});

				$("#petty_cash_content_table").empty();
				$.each(detail_Purchase_Cost.pettycash, function(index, pettycash) {
					 var pettycash_row = `
					 	<tr>
							<td>${pettycash.docno}</td>											
							<td>${pettycash.docdate}</td>
							<td>${pettycash.vender}</td>
							<td>${pettycash.pettycashi_costcode}</td>
							<td></td>
							<td></td>
							<td></td>
							<td class='number_modal'></td>
							<td></td>
							<td class='number_modal'>${pettycash.pettycashi_unitprice}</td>
							<td class='number_modal'>${pettycash.pettycashi_amounttot}</td>
						</tr>

					 `;

					 $("#petty_cash_content_table").append(pettycash_row);
				});

				$("#GL_content_table").empty();
				$.each(detail_Purchase_Cost.gl, function(index, gl) {
					 var gl_row = `
					 	<tr>
							<td>${gl.vchno}</td>											
							<td>${gl.vchdate}</td>
							<td>${gl.namevendor}</td>
							<td>${gl.cust_code}</td>
							<td></td>
							<td></td>
							<td></td>
							<td class='number_modal'></td>
							<td ></td>
							<td class='number_modal'>${gl.amtdr}</td>
							<td class='number_modal'>${gl.amtcr}</td>
							<td class='number_modal'>${gl.gl_amt}</td>
						</tr>

					 `;
					 $("#GL_content_table").append(gl_row);

					 console.log(gl_row)
				});




				// add comma
				$(".number_modal").each(function(index, el) {
					let data = $(el).text()*1;		
					$(this).html(numberWithCommas(data));

					if(data<0){
						$(this).css('color','#f7b03d');
					}else if(data>0){
						$(this).css('color','#28c117');
					}

				});
				// add comma

				//$("#WO").html(detail_Purchase_Cost.wo);
				console.log(detail_Purchase_Cost.wo)
				$("#modal_full").modal('show');
			})
		});
	});
</script>

<!-- Full width modal -->
<div id="modal_full" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Detail</h5>
				
			</div>
			<div class="modal-body" id="modal-body">
					<div class="panel-body">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#PO" data-toggle="tab" aria-expanded="true">PO</a></li>
								<li class=""><a href="#WO" data-toggle="tab" aria-expanded="false">WO</a></li>
								<li class=""><a href="#petty_cash" data-toggle="tab" aria-expanded="false">petty cash</a></li>
								<li class=""><a href="#GL" data-toggle="tab" aria-expanded="false">Gl</a></li>								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="PO">
									<table class=" table table-responsive">
										<tr>
											<td>Doc No</td>											
											<td>Date</td>
											<td>Vender</td>
											<td>cost code</td>
											<td>Mat code</td>
											<td>Material / Description</td>
											<td>Material Other</td>
											<td>QTY</td>
											<td>Unit</td>
											<td>Price/Unit</td>
											<td>Amount</td>
										</tr>
										<tbody id="PO_content_table">
											
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="WO">
									<table class="table table-responsive">
										<tr>
											<td>Doc No</td>											
											<td>Date</td>
											<td>Vender</td>
											<td>cost code</td>
											<td>Mat code</td>
											<td>Material / Description</td>
											<td>Material Other</td>
											<td>QTY</td>
											<td>Unit</td>
											<td>Price/Unit</td>
											<td>Amount</td>
										</tr>
										<tbody id="WO_content_table">
											
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="petty_cash">
									<table class="table table-responsive">
										<tr>
											<td>Doc No</td>											
											<td>Date</td>
											<td>Vender</td>
											<td>cost code</td>
											<td>Mat code</td>
											<td>Material / Description</td>
											<td>Material Other</td>
											<td>QTY</td>
											<td>Unit</td>
											<td>Price/Unit</td>
											<td>Amount</td>
										</tr>
										<tbody id="petty_cash_content_table">
											
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="GL">
									<table class="table table-responsive">
										<tr>
											<td>Doc No</td>											
											<td>Date</td>
											<td>Vender</td>
											<td>cost code</td>
											<td>Mat code</td>
											<td>Material / Description</td>
											<td>Material Other</td>
											<td>QTY</td>
											<td>Unit</td>
											<td>dr</td>
											<td>cr</td>
											<td>Amount = ( dr - cr)</td>
										</tr>
										<tbody id="GL_content_table">
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- /full width modal -->