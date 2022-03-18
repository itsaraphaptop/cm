<div class="content">
	<!-- <?php 
		var_dump($box_list);
	?> -->
	
	<div class="panel panel-flat">
		<div class="panel-heading">
			<div class="row">
		<div class="form-group">
			<div class="col-sm-1" id="boq_cost1s"></div>
			
			<div class="col-sm-2" id="boq_cost2s"></div>
			<div class="col-sm-2" id="boq_cost3s"></div>
			<div class="col-sm-2" id="boq_cost4s"></div>
			<div class="col-sm-2" id="boq_cost5s"></div>
			<div class="col-sm-2" id="boq_cost6s"></div>
			<div class="col-sm-12"><hr></div>
		</div>
	</div>
			<h6 class="panel-title">Revise ProjectBudget</h6>
			
			<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-component">
						<li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab">Revise</a></li>
						<li><a href="#highlighted-justified-tab2" data-toggle="tab">Revise Archive</a></li>
						
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="highlighted-justified-tab1">
							<div class="row">
								<div class="col-xs-12">
									
									<button id="addboq" type="button" class="btn bg-teal-400 btn-xs">Add row</button>
									<button type="button" class="btn btn-primary btn-xs" onclick="save_revise()">Save Revise</button>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="col-xs-3">
								
								<div class="panel panel-flat">
									<div class="panel-heading">
											<ul class="dropdown-menu" style="display: block; position: static; width: 100%; margin-top: 0; float: none;">
												<?php foreach ($box_list as $key => $box): ?>										<!-- <div class="col-xs-12 col-md-12" heading_id="<?=$box['ref_bd']?>">
														<?=$box['heading']?> revise (<?=$box['revise']?>)
													</div>	 -->	
													 <li  heading_id="<?=$box['ref_bd']?>" >
													 	<a href="#">
													 		<?=$box['heading']?> revise (<?=$box['revise']?>)

													 	</a>
													 </li> 
												<?php endforeach ?>												
											</ul>
											
										
											
											<!-- รายการกล่อง พร้อมโชว์ว่า Revise ไปแล้วกี่ครั้ง  -->

										
									</div>
								</div>

								<!-- <div class="panel panel-flat">
									<div class="panel-heading">
										

										
									</div>
								</div> -->
								<script type="text/javascript">
									// $(function(){
										var head_id = ""
										$('[heading_id]').click(function(event) {
											var heading_id = $(this).attr('heading_id');
											head_id = heading_id;

											$("#heading_id").val(head_id);
											$("html").append('<div class="loading">Loading&#8230;</div>');
											list_boq_by_heading_id(heading_id);
										});

										function show_mat(row){
											$(`#modal_mat${row}`).load("<?=base_url()?>bd/material_alonee/"+(row));
										}
										function show_matt(row){
											$(`#modal_matt${row}`).load('<?=base_url()?>share/getmatcode/'+(row));
										}
										function unit(row){
											$(`#modal_unit${row}`).load('<?=base_url()?>share/unit/'+(row));
										}
										function save_revise(){
											//alert(head_id);
											// alert($("#heading_id").val());
											var conf = confirm("แน่ใจหรือไม่ที่จะทำการ revise");

											if(conf){
												$("html").append('<div class="loading">Loading&#8230;</div>');
												$("#item_revise").submit();
											}

											//var data = $("#item_revise").serializeArray();
											// $.post('<?=base_url()?>management/save_revise_new', {data: data}, function() {
										
											// }).done(function(result){
											// 	alert(result);
											// });

										}			



									// })


									function list_boq_by_heading_id(heading_id){
										//alert("list_boq_by_heading_id"+" "+heading_id)

										$.post('<?=base_url()?>management/show_item_heading_bd', {ref_bd: heading_id}, function(data, textStatus, xhr) {
											
										}).done(function(data){
											//alert(data);

											try{
												$("#add_body").empty();
												var item_bd = jQuery.parseJSON(data);
												// console.log(data)
												// alert(item_bd);
												$.each(item_bd, function(index, item) {
													 /* iterate through array or object */
													var row_item = `
													 <tr id="${index+1}">
													 	<td class="text-center">
													 		${index+1}
													 		<input name="boq_id[]" type="hidden" value="${item.boq_id}"/>
													 	</td>
													 	<td class="text-center text-size-small" >${item.systemname}<input type="hidden" readonly="" id="job${index+1}" name="job[]" class="form-control input-xs text-right" value="${item.boq_job}" style="width: 100px;"></td>
													 	<td>
													 		<div style="width: 200px;">${item.subcostcodename}</div>
													 		<input type="hidden" readonly="" id="codecostcodeejob${index+1}" name="subcostcode[]" class="form-control input-xs text-right" value="${item.subcostcode}" style="width: 200px;">
													 		<input type="hidden" readonly="" id="codecostnameejob${index+1}" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="${item.subcostcodename}">
													 	</td>
													 	<td class="text-left">
													 		<div class="input-group">
													 			<input readonly="true" type="text" id="newmatnamee${index+1}" name="newmatnamee[]" class="form-control input-xs text-right" style="width: 200px;" value="${item.newmatnamee}">
													 			<input readonly="true" id="newmatcode${index+1}" style="width: 200px;" name="newmatcode[]" value="${item.newmatcode}" type="hidden" class="form-control input-xs text-right">
														 			<span class="input-group-btn">
														 			<a class="openun${index+1} btn btn-default btn-icon" data-toggle="modal" onClick="show_mat(${index+1})" data-target="#opnewmat${index+1}"><i class="icon-search4"></i>
														 			</a>
														 			<a class="poo${index+1} btn btn-default btn-icon" data-toggle="modal" onClick="show_matt(${index+1})" data-target="#opnewmattt${index+1}"><i class="icon-search4"></i>
														 			</a>
														 			<a onClick="$('#newmatnamee${index+1},#newmatcode${index+1}').val('')" class="clearmat${index+1} btn btn-default btn-icon">
														 				<i class="glyphicon glyphicon-trash"></i>
														 			</a>
													 			</span>
													 		</div>
													 	</td>
													 	<td class="text-left">
													 		<input id="boqcode${index+1}" name="boqcode[]" type="text" class="form-control input-xs text-right" style="width: 100px;" value="${item.boqcode}">
													 	</td>
													 	<td class="text-left">
													 		<input id="matboqq${index+1}" name="matboq[]" type="text" class="form-control input-xs text-right" style="width: 150px;" value="${item.matboq}">
													 	</td>
													 	<td class="text-left">
													 		<div class="input-group">
														 		<input id="unitcode${index+1}" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly="" value="${item.unitcode}">
														 		<input id="unitname${index+1}" name="unitname[]" type="text" class="form-control input-xs text-right" style="width: 100px;" readonly="" value="${item.unitname}">
														 		<span class="input-group-btn">
														 			<span class="input-group-btn">
															 			<a class="unit${index+1} btn btn-default btn-icon" data-toggle="modal" onClick="unit(${index+1})" data-target="#unit${index+1}">
															 				<i class="icon-search4"></i>
															 			</a>
														 			</span>
														 		</span>
													 		</div>
													 	</td>
													 	<td class="text-center">
													 		<input id="qty_bg${index+1}" name="qty_bg[]" type="text" value="${item.qty_bg}" class="form-control input-xs text-right" style="width: 100px;" required="">
													 	</td>
													 	<td class="text-center">
													 		<input type="text" id="matpricebg${index+1}" name="matpricebg[]" value="${item.qtyboq}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-center">
													 		<input type="text" id="matamtbg${index+1}" name="matamtbg[]" class="form-control input-xs text-right" style="width: 100px;" readonly="" value="${item.matamtbg}">
													 	</td>
													 	<td class="text-center">
													 		<input type="text" id="labpricebg${index+1}" name="labpricebg[]" value="${item.labpricebg}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-center">
													 		<input type="text" id="labamtbg${index+1}" name="labamtbg[]" class="form-control input-xs text-right" style="width: 100px;" value="${item.labamtbg}">
													 	</td>
													 	<td class="text-center">
													 		<input type="text" id="subpricebg${index+1}" name="subpricebg[]" value="${item.subpricebg}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-center">
													 		<input type="text" id="subamtbg${index+1}" name="subamtbg[]" class="form-control input-xs text-right" style="width: 100px;" value="${item.subamtbg}">
													 	</td>
													 	<td class="text-center">
													 		<input type="text" id="totalamt${index+1}" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="${item.totalamt}">
													 	</td>
													 	<td class="text-center">
													 		<input type="hidden" id="qtyboq${index+1}" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="${item.qtyboq}">
													 	</td>
													 	<td class="text-center">
													 		<input type="hidden" id="matpriceboq${index+1}" name="matpriceboq[]" value="${item.matpriceboq}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-center">
													 		<input type="hidden" id="matamtboq${index+1}" name="matamtboq[]" value="${item.matamtboq}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-center">
													 		<input type="hidden" value="${item.labpriceboq}" id="labpriceboq${index+1}" name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-center"><input type="hidden" id="labamtboq${index+1}" name="labamtboq[]" value="${item.labamtboq}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td>
													 		<input type="hidden" value="${item.subpriceboq}" id="subpriceboq${index+1}" name="subpriceboq[]" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td>
													 		<input type="hidden" id="subamtboq${index+1}" name="subamtboq[]" value="${item.subamtboq}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-center"><input type="hidden" id="totalamtboq${index+1}" name="totalamtboq[]" value="${item.totalamtboq}" class="form-control input-xs text-right" style="width: 100px;">
													 	</td>
													 	<td class="text-left"><a id="remove${index+1}" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>
													 	</td>
													 </tr>
													`
													$("#add_body").append(row_item);

													var modal1 = '<div id="opnewmat'+(index+1)+'" class="modal fade">'+
																'<div class="modal-dialog modal-full">'+
																	'<div class="modal-content ">'+
																		'<div class="modal-header bg-info">'+
																			'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
																			'<h5 class="modal-title">เพิ่มรายการ</h5>'+
																		'</div>'+
																		'<div class="modal-body">'+
																			'<div class="row" id="modal_mat'+(index+1)+'">'+
																			'</div>'+
																		'</div>'+
																	'</div>'+
																'</div>'+
																'</div>';


													var modal2 = '<div id="opnewmattt'+(index+1)+'" class="modal fade">'+
																'<div class="modal-dialog modal-full">'+
																	'<div class="modal-content ">'+
																		'<div class="modal-header bg-info">'+
																			'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
																			'<h5 class="modal-title">เพิ่มรายการ</h5>'+
																		'</div>'+
																		'<div class="modal-body">'+
																			'<div class="row" id="modal_matt'+(index+1)+'">'+
																			'</div>'+
																		'</div>'+
																	'</div>'+
																'</div>'+
																'</div>';

													var unit = '<div id="unit'+(index+1)+'" class="modal fade">'+
																	'<div class="modal-dialog">'+
																		'<div class="modal-content ">'+
																			'<div class="modal-header bg-info">'+
																				'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
																				'<h5 class="modal-title">หน่วย</h5>'+
																			'</div>'+
																			'<div class="modal-body">'+
																				'<div class="row" id="modal_unit'+(index+1)+'">'+
																				'</div>'+
																			'</div>'+
																		'</div>'+
																	'</div>'+
																'</div>';

													$("#add_body").append(modal1);
													$("#add_body").append(modal2);
													$("#add_body").append(unit);
													
													//http://localhost/cm/index.php/bd/material_alonee/1
													
													// $(`#modal_matt${index+1}`).load('<?=base_url()?>share/getmatcode/'+(index+1));

													//script
													$('#qty_bg'+(index+1)+'').keyup(function() {
															var labpricebg = $('#labpricebg'+(index+1)+'').val().replace(/,/g,"");
															var qty_bg = $('#qty_bg'+(index+1)+'').val().replace(/,/g,"");
															var matpricebg = $('#matpricebg'+(index+1)+'').val().replace(/,/g,"");
															var total = (qty_bg*1) * (matpricebg*1) ;
															$('#matamtbg'+(index+1)+'').val(numberWithCommas(total));
															$('#totalamt'+(index+1)+'').val(numberWithCommas(total));
															$('#qtyboq'+(index+1)+'').val(numberWithCommas(qty_bg));
															
															if($('#matamtbg'+(index+1)+'').val()==0){
																var ttla = (qty_bg*1) * (labpricebg*1);
																$('#totalamt'+(index+1)+'').val(numberWithCommas(ttla));
																$('#labamtbg'+(index+1)+'').val(numberWithCommas(ttla));
															}
													});

													$('#matpricebg'+(index+1)+'').keyup(function() {
															var qty_bg =$('#qty_bg'+(index+1)+'').val().replace(/,/g,"");
															var matpricebg = $('#matpricebg'+(index+1)+'').val().replace(/,/g,"");
															var total = (qty_bg*1) * (matpricebg*1);
															$('#matamtbg'+(index+1)+'').val(numberWithCommas(total));
															$('#totalamt'+(index+1)+'').val(numberWithCommas(total));
													});
													
													$('#labpricebg'+(index+1)+'').keyup(function() {
															$('#totalamt'+(index+1)+'').val(0);
															var labpricebg = $('#labpricebg'+(index+1)+'').val().replace(/,/g,"");
															var qty_bg = $('#qty_bg'+(index+1)+'').val().replace(/,/g,"");
															var total = (qty_bg*1) * (labpricebg*1) ;
															$('#labamtbg'+(index+1)+'').val(numberWithCommas(total));
															var labamtbg = $('#labamtbg'+(index+1)+'').val().replace(/,/g,"");
															var matamtbg = $('#matamtbg'+(index+1)+'').val().replace(/,/g,"");
															var ans =  (labamtbg*1) + (matamtbg*1) ;
															$('#labamtbg'+(index+1)+'').val(numberWithCommas(total));
															$('#totalamt'+(index+1)+'').val(numberWithCommas(ans));
													});

													$('#subpricebg'+(index+1)+'').keyup(function() {

															$('#totalamt'+(index+1)+'').val(0);
															var subpricebg = $('#subpricebg'+(index+1)+'').val().replace(/,/g,"");
															var qty_bg = $('#qty_bg'+(index+1)+'').val().replace(/,/g,"");
															var total = (qty_bg*1) * (subpricebg*1) ;
															$('#subamtbg'+(index+1)+'').val(numberWithCommas(total));
															var labamtbg = $('#labamtbg'+(index+1)+'').val().replace(/,/g,"");
															var matamtbg = $('#matamtbg'+(index+1)+'').val().replace(/,/g,"");
															var subamtbg = $('#subamtbg'+(index+1)+'').val().replace(/,/g,"");
															var ans =  (labamtbg*1) + (matamtbg*1) + (subamtbg*1) ;
															$('#subamtbg'+(index+1)+'').val(numberWithCommas(total));
															$('#totalamt'+(index+1)+'').val(numberWithCommas(ans));
													});

													$('#qtyboq'+(index+1)+'').keyup(function() {
															var qtyboq =$('#qtyboq'+(index+1)+'').val().replace(/,/g,"");
															var matpriceboq = $('#matpriceboq'+(index+1)+'').val().replace(/,/g,"");
															var total = (qtyboq*1) * (matpriceboq*1) ;
															$('#matamtboq'+(index+1)+'').val(numberWithCommas(total));
															$('#totalamtboq'+(index+1)+'').val(numberWithCommas(total));
													});

													$('#matpriceboq'+(index+1)+'').keyup(function() {
															var qtyboq =$('#qtyboq'+(index+1)+'').val().replace(/,/g,"");
															var matpriceboq = $('#matpriceboq'+(index+1)+'').val().replace(/,/g,"");
															var total = (qtyboq*1) * (matpriceboq*1) ;
															$('#matamtboq'+(index+1)+'').val(numberWithCommas(total));
															$('#totalamtboq'+(index+1)+'').val(numberWithCommas(total));
													});

													$('#labpriceboq'+(index+1)+'').keyup(function() {
														$('#totalamtboq'+(index+1)+'').val(0);
														var labpriceboq = $('#labpriceboq'+(index+1)+'').val().replace(/,/g,"");
														var qtyboq = $('#qtyboq'+(index+1)+'').val().replace(/,/g,"");
														var total = qtyboq * labpriceboq ;
														$('#labamtboq'+(index+1)+'').val(total);
														var labamtboq = $('#labamtboq'+(index+1)+'').val().replace(/,/g,"");
														var matamtboq = $('#matamtboq'+(index+1)+'').val().replace(/,/g,"");
														var ans =  (labamtboq*1) + (matamtboq*1) ;
														$('#labamtboq'+(index+1)+'').val(numberWithCommas(total));
														$('#totalamtboq'+(index+1)+'').val(numberWithCommas(ans));
													});

													$('#subpriceboq'+(index+1)+'').keyup(function() {
														$('#totalamtboq'+(index+1)+'').val(0);
														var subpriceboq = $('#subpriceboq'+(index+1)+'').val().replace(/,/g,"");
														var qtyboq = $('#qtyboq'+(index+1)+'').val().replace(/,/g,"");
														var total = qtyboq * subpriceboq ;
														$('#subamtboq'+(index+1)+'').val(total);
														var labamtboq = $('#labamtboq'+(index+1)+'').val().replace(/,/g,"");
														var matamtboq = $('#matamtboq'+(index+1)+'').val().replace(/,/g,"");
														var subamtboq = $('#subamtboq'+(index+1)+'').val().replace(/,/g,"");
														var ans =  (labamtboq*1) + (matamtboq*1) + (subamtboq*1);
														$('#subamtboq'+(index+1)+'').val(numberWithCommas(total));
														$('#totalamtboq'+(index+1)+'').val(numberWithCommas(ans));
													});

													$(document).on('click', 'a#remove'+(index+1)+'', function () { // <-- changes
															var self = $(this);
															noty({
																width: 200,
																text: "Do you want to Delete?",
																type: self.data('type'),
																dismissQueue: true,
																timeout: 1000,
																layout: self.data('layout'),
																buttons: (self.data('type') != 'confirm') ? false : [
																{
																	addClass: 'btn btn-primary btn-xs',
																	text: 'Ok',
																	onClick: function ($noty) { //this = button element, $noty = $noty element
																	$noty.close();
																	self.closest('tr').remove();
																	noty({
																		force: true,
																		text: 'Deleteted',
																		type: 'success',
																		layout: self.data('layout'),
																		timeout: 1000,
																	});
																}
																},
																{
																	addClass: 'btn btn-danger btn-xs',
																	text: 'Cancel',
																	onClick: function ($noty) {
																	$noty.close();
																	noty({
																		force: true,
																		text: 'You clicked "Cancel" button',
																		type: 'error',
																		layout: self.data('layout'),
																		timeout: 1000,
																	});
																	}
																	}
																]
															});
															return false;
													});


													//script
													
													
												});
												// alert(row_item);
												$(".loading").remove();

											}catch(e){

											}
										});

										
									}


												
								</script>
							</div>

							<div class="col-xs-9">
								
								<div class="panel panel-flat">
									<div class="panel-heading">
										
											
											
										
						<div class="table-responsive">
							<form id="item_revise" method="post" action="<?=base_url()?>management/save_revise_new/<?=$type?>/<?=$tender_id?>" >
								<input type="hidden" id="heading_id" name="heading_id">
								<input type="hidden"  value="<?=$tender_id?>" name="tender_id">
							<table class="table table-hover table-striped datatable-fixed-left" >
								<thead>
									<tr>
										
										<th rowspan="2">No.</th>
										<th rowspan="2"><div style="width: 200px;">Job</div></th>
										<th rowspan="2"><div style="width: 200px;">Cost Code </div></th>
										<th rowspan="2"><div style="width: 200px;">Description</div></th>
										<th rowspan="2"><div style="width: 100px;">BOQ CODE</div></th>
										<th rowspan="2"><div style="width: 100px;">BOQ NAME</div></th>
										<th rowspan="2"><div style="width: 100px;">UNIT</div></th>
										<th colspan="8" class="text-center">Budget</th>
										<th colspan="8" class="text-center" hidden>BOQ</th>
										<th rowspan="2" class="text-center">Action</th>
									</tr>
									<tr>
										<th class="text-center">QTY</th>
										<th class="text-center">MAT. Price</th>
										<th class="text-center">MAT. Amount</th>
										<th class="text-center">LAB. Price</th>
										<th class="text-center">LAB. Amount</th>
										<th class="text-center">SUB. Price</th>
										<th class="text-center">SUB. Amount</th>
										<th class="text-center">Total</th>
										<th class="text-center" hidden>QTY </th>
										<th class="text-center" hidden>MAT. Price</th>
										<th class="text-center" hidden>MAT. Amount</th>
										<th class="text-center" hidden>LAB. Price</th>
										<th class="text-center" hidden>LAB. Amount</th>
										<th class="text-center" hidden>SUB. Price</th>
										<th class="text-center" hidden>SUB. Amount</th>
										<th class="text-center" hidden>Total</th>
									</tr>
								</thead>
								<tbody id="add_body">
									
								</tbody>
							</table>
							</form>
						</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						<div class="tab-pane" id="highlighted-justified-tab2">
							<div class="col-xs-3 col-md-3">
								
								<div class="panel panel-flat">

									<div class="panel-heading">
										
										<ul class="dropdown-menu" style="display: block; position: static; width: 100%; margin-top: 0; float: none;">
												<?php foreach ($box_list as $key => $box): ?>									
													 <li  heading_id="<?=$box['ref_bd']?>" >
													 	<a href="#">
													 		<div>
													 			<?=$box['heading']?> revise (<?=$box['revise']?>)
													 			<span hiden_revise="<?=$box['ref_bd']?>" style="float: right;cursor: pointer;" class="glyphicon glyphicon-menu-down"></span>
													 		</div>
													 		<div style="padding-left: 10px;padding-top: 3px;">
													 		<?php foreach ($box["revise_list"] as $key => $revise): ?>
													 			<div style="display: none" show_revise="<?=$box['ref_bd']?>">
													 				<input id="<?=$box['ref_bd']?><?=$revise['revise'];?>" type="checkbox" heading_check_box="<?=$box['ref_bd']?>"  value="<?=$revise['revise'];?>"> 
													 				<label for="<?=$box['ref_bd']?><?=$revise['revise'];?>"> revise # <?=$revise['revise'];?></label>
													 			</div>
													 		<?php endforeach ?>
													 		</div>
													 	</a>
													 </li> 
												<?php endforeach ?>												
											</ul>
									</div>
								</div>

								<script type="text/javascript">
									$("[heading_check_box]").click(function(){
										var headder = "";
										var heading_status = $(this).attr('heading_check_box');
										//alert(heading_status);
										var revise_array = [];
										//$("html").append('<div class="loading">Loading&#8230;</div>');
										$(`[heading_check_box!='${heading_status}']`).prop('checked',false);

										 //alert($( "[heading_check_box]:checked" ).val());

										 $( "[heading_check_box]:checked" ).each(function(index, el) {
										 		//alert($(el).val());
										 		revise_array.push($(el).val());

										 		headder = $(el).attr('heading_check_box');

										 });
										 $("html").append('<div class="loading">Loading&#8230;</div>');
										

										$.post('<?=base_url()?>management/show_revise_item_by_box/<?=$tender_id?>', {heading: headder,revise_array:revise_array}, function() {
											/*optional stuff to do after success */
										}).done(function(data){
											$(".loading").remove();											
											$("#table_revise").html(data);
										});

										
									})

									$("[hiden_revise]").click(function(event) {
										let heading = $(this).attr("hiden_revise");										
										$(`[show_revise='${heading}']`).toggle();
									});
								</script>
							</div>
							<div class="col-xs-9 col-md-9">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<div id="table_revise" style="overflow: auto;">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var total_budget = $('#total_budget').val();
			var boq = $('#boq').val();
			var cost_saving = total_budget-boq*1;
			$('#cost_saving').val(cost_saving);
			
			$('#boq, #total_budget').keyup(function(event) {
				// alert(boq);
				var boq_up = $('#boq').val();
				var to_up = $('#total_budget').val();
				var sum_up = to_up-boq_up;
				$('#cost_saving').val(sum_up);
			});
		});
		$('#revise').attr('class', 'active');
		$('#revisebudget').attr('style', 'background-color:#dedbd8');
	</script>

						<script>
						$("#addboq").click(function(){
						if ($("#systemei").val()=="") {
						swal({
						title: "Select Job  !!",
						text: "",
						confirmButtonColor: "#EA1923",
						type: "error"
						});
						}else if ($("#boq_cost1").val()=="") {
						swal({
						title: "Select Cost Level 1   !!",
						text: "",
						confirmButtonColor: "#EA1923",
						type: "error"
						});
						}else if ($("#boq_cost2").val()=="") {
						swal({
						title: "Select Cost Level 2   !!",
						text: "",
						confirmButtonColor: "#EA1923",
						type: "error"
						});
						}else if ($("#boq_cost3").val()=="") {
						swal({
						title: "Select Cost Level 3   !!",
						text: "",
						confirmButtonColor: "#EA1923",
						type: "error"
						});
						}else if ($("#boq_cost4").val()=="") {
						swal({
						title: "Select Cost Level 4   !!",
						text: "",
						confirmButtonColor: "#EA1923",
						type: "error"
						});
						}else if ($("#boq_cost5").val()=="") {
						swal({
						title: "Select Cost Level 5   !!",
						text: "",
						confirmButtonColor: "#EA1923",
						type: "error"
						});
						}else{
						insert_row();
						}
						});
					function insert_row()
					{
					var costcodetext = $('#costcodetext').val();
					var cnamecost = $('#cnamecost').val();
					var job = $('#systemei').val();
					var jobname = $('#jobname').val();
					var row = ($('#add_body tr').length)+1;
					var tr = '<tr id="'+row+'">'+

					'<td class="text-center">'+row+'</td>'+
					'<td class="text-center">'+jobname+'<input type="hidden" readonly="" id="job'+row+'" name="job[]" class="form-control input-xs text-right" value="'+job+'" style="width: 100px;"></td>'+
					'<td><div style="width: 200px;">'+cnamecost+'</div><input type="hidden" readonly="" id="codecostcodee'+row+'" name="subcostcode[]" class="form-control input-xs text-right" value="'+costcodetext+'" style="width: 200px;"><input type="hidden" readonly="" id="codecostnamee'+row+'" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="'+cnamecost+'"></td>'+
					`<td class="text-left"><div class="input-group"><input readonly="true" type="text"  id="newmatnamee${row}" name="newmatnamee[]" class="form-control input-xs text-right" style="width: 200px;"><input readonly="true" id="newmatcode${row}" style="width: 200px;" name="newmatcode[]"  type="hidden" class="form-control input-xs text-right" style="width: 150px;"><span class="input-group-btn"><a class="openun${row} btn btn-default btn-icon" data-toggle="modal" onClick="show_mat(${row});" data-target="#opnewmat${row}"><i class="icon-search4"></i></a><a class="poo${row}' btn btn-default btn-icon" data-toggle="modal" show_matt(${row}) data-target="#opnewmattt${row}"><i class="icon-search4"></i></a><a class="clearmat${row} btn btn-default btn-icon" onClick="$('#newmatnamee${row},#newmatcode${row}').val('');" ><i class="glyphicon glyphicon-trash"></i></a></span></div></td>`+
					'<td class="text-left"><input id="boqcode'+row+'" name="boqcode[]" type="text" class="form-control input-xs text-right" style="width: 100px;"></td>'+
					'<td class="text-left"><input id="matboqq'+row+'" name="matboq[]" type="text"  class="form-control input-xs text-right" style="width: 150px;"></td>'+
					'<td class="text-left"><div class="input-group"><input  id="unitcode'+row+'" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly=""><input  id="unitname'+row+'" name="unitname[]" type="text" class="form-control input-xs text-right" style="width: 100px;" readonly=""><span class="input-group-btn" ><span class="input-group-btn"><a class="unit'+row+' btn btn-default btn-icon" data-toggle="modal" onClick="unit('+row+')" data-target="#unit'+row+'"><i class="icon-search4"></i></a></span></div></td>'+
						'<td class="text-center"><input id="qty_bg'+row+'" name="qty_bg[]" type="text" value="0" class="form-control input-xs text-right" style="width: 100px;"  required=""></td>'+
						'<td class="text-center"><input type="text" id="matpricebg'+row+'" name="matpricebg[]" value="0" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>'+
						'<td class="text-center"><input type="text" id="matamtbg'+row+'" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="0"></td>'+
						'<td class="text-center"><input type="text" id="labpricebg'+row+'" name="labpricebg[]" value="0" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>'+
						'<td class="text-center"><input type="text" id="labamtbg'+row+'" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>'+

						'<td class="text-center"><input type="text" id="subpricebg'+row+'" name="subpricebg[]" value="0" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>'+
						'<td class="text-center"><input type="text" id="subamtbg'+row+'" name="subamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="0"></td>'+

						'<td class="text-center"><input type="text"  id="totalamt'+row+'" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>'+
						'<td class="text-center"><input type="text"  id="qtyboq'+row+'" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="0"></td>'+
						'<td class="text-center"><input type="text" id="matpriceboq'+row+'" name="matpriceboq[]" value="0" class="form-control input-xs text-right" style="width: 100px;"></td>'+
						'<td class="text-center"><input type="text" id="matamtboq'+row+'" name="matamtboq[]" value="0" class="form-control input-xs text-right" style="width: 100px;"></td>'+
						'<td class="text-center"><input type="text" value="0" id="labpriceboq'+row+'" name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;"></td>'+
						'<td class="text-center"><input type="text" id="labamtboq'+row+'" name="labamtboq[]" value="0"  class="form-control input-xs text-right" style="width: 100px;"></td>'+
						'<td><input type="text" value="0" id="subpriceboq'+row+'" name="subpriceboq[]" class="form-control input-xs text-right" style="width: 100px;"></td>'+
						'<td><input type="text" id="subamtboq'+row+'" name="subamtboq[]" value="0"  class="form-control input-xs text-right" style="width: 100px;"></td>'+
						'<td class="text-center"><input type="text"   id="totalamtboq'+row+'" name="totalamtboq[]" value="0" class="form-control input-xs text-right" style="width: 100px;"></td>'+
						'<td class="text-left"><a id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></td>'+

				'</tr>';
				$('#add_body').append(tr);

				$('#qty_bg'+row+'').keyup(function() {
				var labpricebg = $('#labpricebg'+row+'').val().replace(/,/g,"");
				var qty_bg = $('#qty_bg'+row+'').val().replace(/,/g,"");
				var matpricebg = $('#matpricebg'+row+'').val().replace(/,/g,"");
				var total = (qty_bg*1) * (matpricebg*1) ;
				$('#matamtbg'+row+'').val(numberWithCommas(total));
				$('#totalamt'+row+'').val(numberWithCommas(total));
				$('#qtyboq'+row+'').val(numberWithCommas(qty_bg));
				if($('#matamtbg'+row+'').val()==0){
				var ttla = (qty_bg*1) * (labpricebg*1);
				$('#totalamt'+row+'').val(numberWithCommas(ttla));
				$('#labamtbg'+row+'').val(numberWithCommas(ttla));
				}
				});
				$('#matpricebg'+row+'').keyup(function() {
				var qty_bg =$('#qty_bg'+row+'').val().replace(/,/g,"");
				var matpricebg = $('#matpricebg'+row+'').val().replace(/,/g,"");
				var total = (qty_bg*1) * (matpricebg*1);
				$('#matamtbg'+row+'').val(numberWithCommas(total));
				$('#totalamt'+row+'').val(numberWithCommas(total));
				});
				$('#labpricebg'+row+'').keyup(function() {
				$('#totalamt'+row+'').val(0);
				var labpricebg = $('#labpricebg'+row+'').val().replace(/,/g,"");
				var qty_bg = $('#qty_bg'+row+'').val().replace(/,/g,"");
				var total = (qty_bg*1) * (labpricebg*1) ;
				$('#labamtbg'+row+'').val(numberWithCommas(total));
				var labamtbg = $('#labamtbg'+row+'').val().replace(/,/g,"");
				var matamtbg = $('#matamtbg'+row+'').val().replace(/,/g,"");
				var ans =  (labamtbg*1) + (matamtbg*1) ;
				$('#labamtbg'+row+'').val(numberWithCommas(total));
				$('#totalamt'+row+'').val(numberWithCommas(ans));
				});
				$('#subpricebg'+row+'').keyup(function() {
				$('#totalamt'+row+'').val(0);
				var subpricebg = $('#subpricebg'+row+'').val().replace(/,/g,"");
				var qty_bg = $('#qty_bg'+row+'').val().replace(/,/g,"");
				var total = (qty_bg*1) * (subpricebg*1) ;
				$('#subamtbg'+row+'').val(numberWithCommas(total));
				var labamtbg = $('#labamtbg'+row+'').val().replace(/,/g,"");
				var matamtbg = $('#matamtbg'+row+'').val().replace(/,/g,"");
				var subamtbg = $('#subamtbg'+row+'').val().replace(/,/g,"");
				var ans =  (labamtbg*1) + (matamtbg*1) + (subamtbg*1) ;
				$('#subamtbg'+row+'').val(numberWithCommas(total));
				$('#totalamt'+row+'').val(numberWithCommas(ans));
				});
				$('#qtyboq'+row+'').keyup(function() {
				var qtyboq =$('#qtyboq'+row+'').val().replace(/,/g,"");
				var matpriceboq = $('#matpriceboq'+row+'').val().replace(/,/g,"");
				var total = (qtyboq*1) * (matpriceboq*1) ;
				$('#matamtboq'+row+'').val(numberWithCommas(total));
				$('#totalamtboq'+row+'').val(numberWithCommas(total));
				});
				$('#matpriceboq'+row+'').keyup(function() {
				var qtyboq =$('#qtyboq'+row+'').val().replace(/,/g,"");
				var matpriceboq = $('#matpriceboq'+row+'').val().replace(/,/g,"");
				var total = (qtyboq*1) * (matpriceboq*1) ;
				$('#matamtboq'+row+'').val(numberWithCommas(total));
				$('#totalamtboq'+row+'').val(numberWithCommas(total));
				});
				$('#labpriceboq'+row+'').keyup(function() {
				$('#totalamtboq'+row+'').val(0);
				var labpriceboq = $('#labpriceboq'+row+'').val().replace(/,/g,"");
				var qtyboq = $('#qtyboq'+row+'').val().replace(/,/g,"");
				var total = qtyboq * labpriceboq ;
				$('#labamtboq'+row+'').val(total);
				var labamtboq = $('#labamtboq'+row+'').val().replace(/,/g,"");
				var matamtboq = $('#matamtboq'+row+'').val().replace(/,/g,"");
				var ans =  (labamtboq*1) + (matamtboq*1) ;
				$('#labamtboq'+row+'').val(numberWithCommas(total));
				$('#totalamtboq'+row+'').val(numberWithCommas(ans));
				});

				$('#subpriceboq'+row+'').keyup(function() {
				$('#totalamtboq'+row+'').val(0);
				var subpriceboq = $('#subpriceboq'+row+'').val().replace(/,/g,"");
				var qtyboq = $('#qtyboq'+row+'').val().replace(/,/g,"");
				var total = qtyboq * subpriceboq ;
				$('#subamtboq'+row+'').val(total);
				var labamtboq = $('#labamtboq'+row+'').val().replace(/,/g,"");
				var matamtboq = $('#matamtboq'+row+'').val().replace(/,/g,"");
				var subamtboq = $('#subamtboq'+row+'').val().replace(/,/g,"");
				var ans =  (labamtboq*1) + (matamtboq*1) + (subamtboq*1);
				$('#subamtboq'+row+'').val(numberWithCommas(total));
				$('#totalamtboq'+row+'').val(numberWithCommas(ans));
				});
				$(document).on('click', 'a#remove'+row+'', function () { // <-- changes
				var self = $(this);
				noty({
				width: 200,
				text: "Do you want to Delete?",
				type: self.data('type'),
				dismissQueue: true,
				timeout: 1000,
				layout: self.data('layout'),
				buttons: (self.data('type') != 'confirm') ? false : [
				{
				addClass: 'btn btn-primary btn-xs',
				text: 'Ok',
				onClick: function ($noty) { //this = button element, $noty = $noty element
				$noty.close();
				self.closest('tr').remove();
				noty({
				force: true,
				text: 'Deleteted',
				type: 'success',
				layout: self.data('layout'),
				timeout: 1000,
				});
				}
				},
				{
				addClass: 'btn btn-danger btn-xs',
				text: 'Cancel',
				onClick: function ($noty) {
				$noty.close();
				noty({
				force: true,
				text: 'You clicked "Cancel" button',
				type: 'error',
				layout: self.data('layout'),
				timeout: 1000,
				});
				}
				}
				]
				});
				return false;
				});
				var boq1 = '<div id="opnewmat'+row+'" class="modal fade">'+
				'<div class="modal-dialog modal-full">'+
					'<div class="modal-content ">'+
						'<div class="modal-header bg-info">'+
							'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
							'<h5 class="modal-title">เพิ่มรายการ</h5>'+
						'</div>'+
						'<div class="modal-body">'+
							'<div class="row" id="modal_mat'+row+'">'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
				'</div>';
				$('#add_body').append(boq1);
				$(".openun"+row+"").click(function(){
				$('#modal_mat'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_mat"+row+"").load('<?php echo base_url(); ?>index.php/bd/material_alonee/'+row+'');
				});
				var boq4 = '<div id="opnewmattt'+row+'" class="modal fade">'+
				'<div class="modal-dialog modal-full">'+
					'<div class="modal-content ">'+
						'<div class="modal-header bg-info">'+
							'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
							'<h5 class="modal-title">เพิ่มรายการ</h5>'+
						'</div>'+
						'<div class="modal-body">'+
							'<div class="row" id="modal_matt'+row+'">'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
				'</div>';
				$('#add_body').append(boq4);
				$(".poo"+row+"").click(function(){
				$('#modal_matt'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
				$("#modal_matt"+row+"").load('<?php echo base_url(); ?>index.php/share/getmatcode/'+row);
				});
				var unit = '<div id="unit'+row+'" class="modal fade">'+
				'<div class="modal-dialog">'+
					'<div class="modal-content ">'+
						'<div class="modal-header bg-info">'+
							'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
							'<h5 class="modal-title">หน่วย</h5>'+
						'</div>'+
						'<div class="modal-body">'+
							'<div class="row" id="modal_unit'+row+'">'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
				'</div>';
				$('#add_body').append(unit);
				$('.unit'+row+'').click(function(){
						$('#modal_unit'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
						$("#modal_unit"+row+"").load('<?php echo base_url(); ?>share/unit/'+row+'');
				});
				}
				</script>