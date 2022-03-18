<table class="table table-xxs">
	<thead>
		<tr>
			<!-- <th>Select</th> -->
			<th>PR No.</th>
			<th>Material Code</th>
			<th>Material Name</th>
			<th>Cost Code</th>
			<th>Cost Name</th>
			<th>Qty</th>
			<th>Unit</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; foreach ($res as $key => $value) {?>
		<tr>
			<!-- <td><input type="checkbox" id="chkpr" name=""></td> -->
			<td><?php echo $value->pri_ref; ?></td>
			<td><?php echo $value->pri_matcode; ?></td>
			<td><?php echo $value->pri_matname; ?></td>
			<td><?php echo $value->pri_costcode; ?></td>
			<td><?php echo $value->pri_costname; ?></td>
			<th><?php echo $value->pri_qty; ?></th>
			<th><?php echo $value->pri_unit; ?></th>
			<th><button class="insprne<?php echo $n; ?> label label-primary" data-matcode="<?php echo $value->pri_matcode; ?>"> SELECT</button></th>
		</tr>
		<div>
			
		</div>
		<script>
			$('.insprne<?php echo $n; ?>').click(function(){

				var matcode = "<?php echo $value->pri_matcode; ?>";
				var matname = "<?php echo $value->pri_matname; ?>";
				var costname ="<?php echo $value->pri_costname; ?>";
				var costcode ="<?php echo $value->pri_costcode; ?>";
				var qty = "<?php echo $value->pri_qty; ?>";
				var unit = "<?php echo $value->pri_unit; ?>";
				var priceunit = "<?php echo $value->pri_priceunit; ?>";
				var amount = "<?php echo $value->pri_amount; ?>";
				var disone = "<?php echo $value->pri_discountper1; ?>";
				var distwo = "<?php echo $value->pri_discountper2; ?>";
				var distree = "<?php echo $value->pri_discountper3; ?>";
				var disfore = "<?php echo $value->pri_discountper4; ?>";
				var totdisamt = "<?php echo $value->pri_disamt; ?>";
				var vat = "<?php echo $value->pri_vat; ?>";
				var netamt ="<?php echo $value->pri_netamt; ?>";
				var remark = "<?php echo $value->pri_remark?>";
				var pr_prno = "<?php echo $value->pri_ref; ?>";
				var pri_id = "<?php echo $value->pri_id; ?>";

				var accode = "<?php echo $value->pr_assetid; ?>";
				var acname = "<?php echo $value->pr_assetname; ?>";
				var statusass = "<?php echo $value->pr_asset; ?>";


				addprrow(matcode,matname,costname,costcode,qty,unit,priceunit,amount,disone,distwo,distree,disfore,totdisamt,vat,netamt,remark,pr_prno,pri_id,accode,acname,statusass);
				$(this).closest("tr").remove();

				var url="<?php echo base_url(); ?>purchase_active/flag_pr";
		          var dataSet={
		            pr_prno : "<?php echo $value->pri_ref; ?>",
					pri_id : "<?php echo $value->pri_id; ?>",
		            };
		            $.post(url,dataSet,function(data){

		            });


			});
			function addprrow(matcode,matname,costname,costcode,qty,unit,priceunit,amount,disone,distwo,distree,disfore,totdisamt,vat,netamt,remark,pr_prno,pri_id,accode,acname,statusass)
			{
				var row = ($('#body tr').length-0)+1;
				var tr = '<tr>'+
							'<td>'+row+'</td>'+
						 	'<td class="text-center">'+
						 		'<ul class="icons-list">'+
						 			'<li><input type="checkbox" id="a'+row+'" /><input type="hidden" name="chki[]" id="chki'+row+'" value="I"></li>'+
		                            '<li><button type="button" class="editopenmatt'+row+'" data-toggle="modal" data-target="#editopenmatt'+row+'" disabled data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></button></li>'+
		                            '<li><button type="button"  id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></button></li>'+
	                          	'</ul>'+
	                          	'<input type="hidden" name="poiidi[]" value="">'+
	                          	'<input type="hidden" name="pr_prnoi[]" value="'+pr_prno+'">'+
	                          	'<input type="hidden" name="pri_id[]" value="'+pri_id+'">'+
						 	'</td>'+
							'<td ><a id="lmatcode'+row+'">'+matcode+'</a><div class="input-group"><input type="hidden" class="form-control input-xs" id="mat'+row+'" readonly value="'+matcode+'" name="matcodei[]"><div class="input-group-btn"></div></div></td>'+
							'<td ><a id="lmatname'+row+'">'+matname+'</a><input type="hidden" class="form-control input-sm" readonly name="matnamei[]" id="pri_matname'+row+'" value="'+matname+'"></td>'+
							'<td ><a id="lcostcode'+row+'">'+costcode+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_costname'+row+'" name="costnamei[]" value="'+costname+'"/><input type="hidden" class="form-control input-sm" readonly id="pri_costcode'+row+'" name="codtcodei[]" value="'+costcode+'"/></td>'+
							'<td ><a id="lqty'+row+'">'+qty+'</a><input type="hidden" class="form-control input-sm" readonly id="conversic'+row+'" name="totqtyic[]" value="1"><input type="hidden" class="form-control input-sm" readonly id="pri_qty'+row+'" name="qtyi[]" value="'+qty+'"><input type="hidden" class="form-control input-sm" readonly id="pri_qtyic'+row+'" name="qtyic[]" value="'+qty+'"></td>'+
							'<th ><a id="lunit'+row+'">'+unit+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_unit'+row+'" name="uniti[]" value="'+unit+'"><input type="hidden" class="form-control input-sm" readonly id="pri_unitic'+row+'" name="poi_unitic[]" value="'+unit+'"</th>'+
							'<th ><a id="lpriceunit'+row+'">'+priceunit+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_priceunit'+row+'" name="priceuniti[]" value="'+priceunit+'"</th>'+
							'<th ><a id="lamount'+row+'">'+amount+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_amount'+row+'" name="amounti[]" value="'+amount+'"</th>'+
							'<th ><a id="ldisperone'+row+'">'+disone+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_discountper1'+row+'" name="disconei[]" value="'+disone+'"></th>'+
							'<th ><a id="ldispertwo'+row+'">'+distwo+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_discountper2'+row+'" name="disctwoi[]" value="'+distwo+'"></th>'+
							'<th ><a id="ldispertree'+row+'">'+distree+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_discountper3'+row+'" name="discthree[]" value="'+distree+'"></th>'+
							'<th ><a id="ldisperfore'+row+'">'+disfore+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_discountper4'+row+'" name="discfour[]" value="'+disfore+'"></th>'+
							'<th ><a id="ldisamt'+row+'">0</a><input type="hidden" class="form-control input-sm" readonly id="pri_disamt'+row+'" name="disce[]" value="0"></th>'+
							'<th ><a id="ltotdisamt'+row+'">0</a><input type="hidden" class="form-control input-sm" readonly id="pri_totdisamt'+row+'" name="discamti[]" value="0"></th>'+
							'<th ><a id="lvat'+row+'">'+vat+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_vat'+row+'" name="to_vat[]" value="'+vat+'"></th>'+
							'<th ><a id="lnetamt'+row+'">'+netamt+'</a><input type="hidden" class="form-control input-sm" readonly id="pri_netamt'+row+'" name="netamti[]" value="'+netamt+'">'+
								'<input type="hidden" class="form-control input-sm" readonly id="pri_remarki'+row+'" name="poiremark[]" value="'+remark+'">'+
								'<input type="hidden" id="accode'+row+'" name="accode[]" readonly="true" class="form-control input-sm" value="">'+
                          '<input type="hidden" id="acname'+row+'" name="acname[]" readonly="true" class="form-control input-sm" value="">'+
                          '<input type="hidden" id="statusass'+row+'" name="statusass[]" readonly="true" class="form-control input-sm" value="1">'+

							'</th>'+
							'<th>'+
								'<ul class="icons-list">'+
		                            '<li><button type="button" class="editopenmatt'+row+'" data-toggle="modal" data-target="#editopenmatt'+row+'" disabled data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></button></li>'+
		                            '<li><button type="button"  id="removei'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></button></li>'+
	                          	'</ul>'+
                          	'</th>'+
						'</tr>'+
						
						'<script>'+
							'$("#a'+row+'").click(function(){'+
								'if($("#a'+row+'").prop("checked")){'+
								'$("#chki'+row+'").val("I");'+
								'$("#mat'+row+'").prop("readonly",false);'+
								'$(".openmatt'+row+'").prop("disabled",false);'+
								'$("#pri_costname'+row+'").prop("readonly",false);'+
								'$("#pri_qty'+row+'").prop("readonly",false);'+
								'$("#pri_priceunit'+row+'").prop("readonly",false);'+
								'$("#pri_amount'+row+'").prop("readonly",false);'+
								'$("#pri_discountper1'+row+'").prop("readonly",false);'+
								'$("#pri_discountper2'+row+'").prop("readonly",false);'+
								'$("#pri_discountper3'+row+'").prop("readonly",false);'+
								'$("#pri_discountper3'+row+'").prop("readonly",false);'+
								'$("#pri_discountper4'+row+'").prop("readonly",false);'+
								'$("#pri_disamt'+row+'").prop("readonly",false);'+
								'$("#pri_vat'+row+'").prop("readonly",false);'+
								'$("#pri_netamt'+row+'").prop("readonly",false);'+
								'$(".editopenmatt'+row+'").prop("disabled",false);'+
								'}else{'+
								'$("#chki'+row+'").val("");'+
								'$("#mat'+row+'").prop("readonly",true);'+
								'$(".openmatt'+row+'").prop("disabled",true);'+
								'$("#pri_costname'+row+'").prop("readonly",true);'+
								'$("#pri_qty'+row+'").prop("readonly",true);'+
								'$("#pri_priceunit'+row+'").prop("readonly",true);'+
								'$("#pri_amount'+row+'").prop("readonly",true);'+
								'$("#pri_discountper1'+row+'").prop("readonly",true);'+
								'$("#pri_discountper2'+row+'").prop("readonly",true);'+
								'$("#pri_discountper3'+row+'").prop("readonly",true);'+
								'$("#pri_discountper3'+row+'").prop("readonly",true);'+
								'$("#pri_discountper4'+row+'").prop("readonly",true);'+
								'$("#pri_disamt'+row+'").prop("readonly",true);'+
								'$("#pri_vat'+row+'").prop("readonly",true);'+
								'$("#pri_netamt'+row+'").prop("readonly",true);'+
								'$(".editopenmatt'+row+'").prop("disabled",true);'+
								'}'+
							'});'+
							'$("#remove'+row+'").click(function(){'+
							'$(this).closest("tr").remove();'+
							'var url="<?php echo base_url(); ?>purchase_active/delflag_pr";'+
					          'var dataSet={'+
					            'pr_prno : "'+pr_prno+'",'+
								'pri_id : "'+pri_id+'",'+
					            '};'+
					            '$.post(url,dataSet,function(data){'+

				            '});'+
				            '});'+
				            '$("#removei'+row+'").click(function(){'+
							'$(this).closest("tr").remove();'+
							'var url="<?php echo base_url(); ?>purchase_active/delflag_pr";'+
					          'var dataSet={'+
					            'pr_prno : "'+pr_prno+'",'+
								'pri_id : "'+pri_id+'",'+
					            '};'+
					            '$.post(url,dataSet,function(data){'+

				            '});'+
				            '});'+
						'<\/script>';
						

				$('#body').append(tr);
				
				var ff = '<div id="editopenmatt'+row+'" class="modal fade" data-backdrop="false">'+
						 '<div class="modal-dialog modal-lg">'+
							 '<div class="modal-content">'+
								 '<div class="modal-header">'+
									 '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
									 '<h5 class="modal-title">Insert PO Detail</h5>'+
								 '</div>'+
								 '<div class="modal-body">'+
				 '<div class="row">'+
						 '<div class="col-xs-6">'+
							 '<label for="">รายการซื้อ</label>'+
														 '<div class="input-group" id="error">'+
														 '<span class="input-group-addon">'+
															 '<input type="checkbox" id="chk" aria-label="กำหนดเอง">'+
														 '</span>'+
															 '<input type="text" id="newmatname'+row+'"  placeholder="เลือกรายการซื้อ" value="'+matname+'" class="form-control input-sm" disabled>'+
															 '<input type="text" id="newmatcode'+row+'"  placeholder="Material Code" value="'+matcode+'" class="form-control input-sm" disabled>'+
																 '<span class="input-group-btn" >'+
																	 '<a class="openun btn btn-primary" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> เพิ่ม</a>'+
																	 '<a class="openmatt'+row+' btn btn-primary" data-toggle="modal" data-target="#openmatt'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
																 '</span>'+
														 '</div>'+
						 '</div>'+
						 '<div class="col-xs-6">'+
													 '<label for="">รายการต้นทุน</label>'+
														 '<div class="input-group" id="errorcost">'+
															 '<input type="text" id="costnameint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+costname+'">'+
															 '<input type="text" id="codecostcodeint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+costcode+'">'+
																 '<span class="input-group-btn" >'+
																	 '<a class="modalcost'+row+' btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
																 '</span>'+
														 '</div>'+
													 '</div>'+
				 '</div>'+
				 '<div class="row">'+
						 '<div class="col-md-6">'+
							 '<div class="form-group" id="errorcost">'+
												 '<label for="qty">ปริมาณ</label>'+
												 '<input type="number" id="pqty'+row+'" name="qty"  placeholder="กรอกปริมาณ" class="form-control" value="'+qty+'">'+
							 '</div>'+
						 '</div>'+
						 '<div class="col-xs-6">'+
															 '<div class="input-group">'+
																 '<label for="unit">หน่วย</label>'+
																 '<input type="text" id="punit'+row+'" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+unit+'">'+
															 '<span class="input-group-btn" >'+
																 '<a class="openun btn btn-primary btn-sm" data-toggle="modal" id="modalunit" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
															 '</span>'+
														 '</div>'+
													 '</div>'+
				 '</div>'+
				 '<div class="row">'+
						 '<div class="col-md-3">'+
							 '<div class="form-group">'+
												 '<label for="qty">แปลงค่า IC</label>'+
												 '<input type="number" id="cpqtyic'+row+'" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">'+
							 '</div>'+
						 '</div>'+
						 '<div class="col-md-3">'+
							 '<div class="form-group">'+
												 '<label for="qty">ปริมาณ IC</label>'+
												 '<input type="text" id="pqtyic'+row+'" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="'+qty+'">'+
							 '</div>'+
						 '</div>'+
						 '<div class="col-xs-6">'+
															 '<div class="input-group">'+
																 '<label for="unit">หน่วย IC</label>'+
																 '<input type="text" id="punitic'+row+'" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+unit+'">'+
															 '<span class="input-group-btn" >'+
																 '<a class="unitic btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
															 '</span>'+
														 '</div>'+
													 '</div>'+
				 '</div>'+
					'<div class="row">'+
						 '<div class="col-md-6">'+
							 '<div class="form-group">'+
												 '<label for="price_unit">ราคา/หน่วย</label>'+
												 '<input type="text" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg" value="'+priceunit+'">'+
							 '</div>'+
						 '</div>'+
						 '<div class="col-md-6">'+
							 '<div class="form-group">'+
												 '<label for="amount">จำนวนเงิน</label>'+
												 '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control" value="'+amount+'">'+
							 '</div>'+
						 '</div>'+
				 '</div>'+
					'<div class="row">'+
							 '<div class="col-md-6">'+
								 '<div class="form-group">'+
										'<label for="endtproject">ส่วนลด 1 (%)</label>'+
										'<input type="text" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="'+disone+'"/>'+
								 '</div>'+
							 '</div>'+
									 '<div class="col-md-6">'+
										 '<div class="form-group">'+
												'<label for="endtproject">ส่วนลด 2 (%)</label>'+
												'<input type="text" id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="'+distwo+'" />'+
										 '</div>'+
									 '</div>'+
				 '</div>'+
				 '<div class="row">'+
							 '<div class="col-md-6">'+
								 '<div class="form-group">'+
										'<label for="endtproject">ส่วนลด 3 (%)</label>'+
										'<input type="text" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control" value="'+distree+'"/>'+
								 '</div>'+
							 '</div>'+
									 '<div class="col-md-6">'+
										 '<div class="form-group">'+
												'<label for="endtproject">ส่วนลด 4 (%)</label>'+
												'<input type="text" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control" value="'+disfore+'" />'+
										 '</div>'+
									 '</div>'+
				 '</div>'+
					 '<div class="row">'+
						 '<div class="col-md-6">'+
								 '<div class="form-group">'+
									'<label for="endtproject">ส่วนลดพิเศษ</label>'+
									'<input type="text" id="pdiscex'+row+'" name="discountper2" class="form-control" value="0"/>'+
								 '</div>'+
						 '</div>'+
						 '<div class="col-md-4">'+
									 '<div class="form-group">'+
										'<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
										'<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control" value="0"/>'+
										'<input type="hidden" id="pvat'+row+'" value="0">'+
									 '</div>'+
						 '</div>'+
						 '<div class="col-md-2">'+
				 '<div class="form-group">'+
						 '<a id="chkprice'+row+'" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a>'+
				 '</div>'+
			 '</div>'+
					 '</div>'+
					 '<div class="row">'+
					 			'<div class="col-md-2">'+
								 '<div class="form-group">'+
										'<label for="endtproject">vat</label>'+
										'<input type="text" id="to_vat'+row+'" name="to_vat" class="form-control" value=""/>'+
									'</div>'+
								 '</div>'+
								'<div class="col-md-2">'+
								 '<div class="form-group">'+
										'<label for="endtproject">จำนวนเงินสุทธิ</label>'+
										'<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control" value="0"/>'+
									'</div>'+
								 '</div>'+
					 '<div class="col-md-8">'+
								 '<div class="form-group">'+
										'<label for="endtproject">หมายเหตุ</label>'+
										'<input type="text" id="premark'+row+'" name="remark" class="form-control" value="'+remark+'"/>'+
								 '</div>'+
					 '</div>'+
				 '</div>'+




				 '<div>'+
				 	'<div class="row">'+
																'<div class="col-xs-6">'+
                            '<label for="">Ref. Asset Code</label>'+
                              '<div class="input-group">'+
                          '<input type="text" id="accodei'+row+'" name="accode"  readonly="true"  class="form-control input-sm" value="'+accode+'">'+
                          '<input type="text" id="acnamei'+row+'" name="acname" readonly="true"  class="form-control input-sm" value=",'+acname+'">'+
                          '<input type="hidden" id="statusassi'+row+'" name="statusass" readonly="true"  class="form-control input-sm" value="'+statusass+'">'+
                                  '<span class="input-group-btn" >'+
                                    '<a class="btn btn-info btn-sm" id="refasset'+row+'" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
                                  '</span>'+
                              '</div>'+
                            '</div>'+
																	 '<div class="col-md-6">'+
																				 '<input type="hidden" name="poid" value="">'+
																	 '</div>'+
															 '</div>'+
				 '</div>'+
								 '</div>'+
								 '<div class="modal-footer">'+
									 '<input type="hidden" name="poid" value="">'+
									 '<a id="insertpodetail'+row+'" data-dismiss="modal" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</a>'+
									 '<button class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'+
								 '</div>'+
							 '</div>'+
						 '</div>'+
					 '</div>'+
					 '<script>'+
					 '$("#cpqtyic'+row+'").keyup(function(){'+
					 '$("#pqtyic'+row+'").val($("#pqty'+row+'").val()*$("#cpqtyic'+row+'").val());'+
					 '});'+
					 '$("#chkprice'+row+'").click(function(){'+
                'var xqty = parseFloat($("#pqty'+row+'").val());'+
                'var xprice = parseFloat($("#pprice_unit'+row+'").val());'+
                'var xamount = xqty*xprice;'+
                'var xdiscper1 = parseFloat($("#pdiscper1'+row+'").val());'+
                'var xdiscper2 = parseFloat($("#pdiscper2'+row+'").val());'+
                'var xdiscper3 = parseFloat($("#pdiscper3'+row+'").val());'+
                'var xdiscper4 = parseFloat($("#pdiscper4'+row+'").val());'+
                'var xdiscper5 = parseFloat($("#pdiscex'+row+'").val());'+
                'var xvatt = parseFloat($("#vatper").val());'+
                'var xpd1 = xamount - (xamount*xdiscper1)/100;'+
                'var xpd2 = xpd1 - (xpd1*xdiscper2)/100;'+
                'var xpd3 = xpd2 - (xpd2*xdiscper3)/100;'+
                'var xpd4 = xpd3 - (xpd3*xdiscper4)/100;'+
                'var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;'+
                'var total_di = xamount-xpd4;'+
                'var xvat = parseFloat($("#vatper").val());'+
                '$("#pamount'+row+'").val(xamount);'+
                '$("#too_di'+row+'").val(total_di);'+
                '$("#to_vat'+row+'").val(xpd8);'+
                '$("#tot_vat'+row+'").val(xpd8);'+
                'if(xdiscper5 != 0){'+
                  'vxpd4 = xpd4-xdiscper5;'+
                    '$("#pdisamt'+row+'").val(vxpd4);'+
                    '$("#too_di'+row+'").val(vxpd4);'+
                    'vxpd5 = (xpd4-xdiscper5) + xpd8;'+
                    '$("#pnetamt'+row+'").val(vxpd5);'+
                  '}'+
                  'else if(xdiscper2 != 0){'+
                         '$("#pdisamt'+row+'").val(xpd4);'+
                         '$("#too_di'+row+'").val(xpd4);'+
                         'vxpd2 = xpd4 + xpd8;'+
                         '$("#pnetamt'+row+'").val(vxpd2);'+
                '}'+
                  'else if(xdiscper3 != 0){'+
                         '$("#pdisamt'+row+'").val(xpd4);'+
                         '$("#too_di'+row+'").val(xpd4);'+
                         'vxpd3 = xpd4 + xpd8;'+
                         '$("#pnetamt'+row+'").val(vxpd3);'+
                '}'+
                'else if(xdiscper4 != 0){'+
                         '$("#pdisamt'+row+'").val(xpd4);'+
                         '$("#too_di'+row+'").val(xpd4);'+
                         'vxpd5 = xpd4 + xpd8;'+
                         '$("#pnetamt'+row+'").val(vxpd5);'+
                '}'+
                
                'else'+
                '{'+
                '$("#pdisamt'+row+'").val(xpd1);'+
                '$("#too_di'+row+'").val(xpd1);'+
                    'vxpd1 = xpd4 + xpd8;'+
                    '$("#pnetamt'+row+'").val(vxpd1);'+
                '}'+
              '});'+
              '$("#insertpodetail'+row+'").click(function(){'+
                'if ($("#newmatcode'+row+'").val()!="") {'+
                '$("#pri_unit'+row+'").val($("#punit'+row+'").val());'+
                '$("#pri_unitic'+row+'").val($("#punitic'+row+'").val());'+
                '$("#lunit'+row+'").text($("#punit'+row+'").val());'+
                
                '$("#lmatcode'+row+'").text($("#newmatcode'+row+'").val());'+
                '$("#lmatname'+row+'").text($("#newmatname'+row+'").val());'+
                '$("#lcostcode'+row+'").text($("#codecostcodeint'+row+'").val());'+
                '$("#pri_costcode'+row+'").val($("#codecostcodeint'+row+'").val());'+
                '$("#pri_costname'+row+'").val($("#costnameint'+row+'").val());'+
                '$("#lqty'+row+'").text($("#pqty'+row+'").val());'+
                '$("#pri_qty'+row+'").val($("#pqty'+row+'").val());'+
                '$("#lpriceunit'+row+'").text($("#unit'+row+'").val());'+
                '$("#pri_priceunit'+row+'").val($("#unit'+row+'").val());'+
                '$("#lpriceunit'+row+'").text($("#pprice_unit'+row+'").val());'+
                '$("#pri_priceunit'+row+'").val($("#pprice_unit'+row+'").val());'+
                '$("#pri_qtyic'+row+'").val($("#pqtyic'+row+'").val());'+
                '$("#conversic'+row+'").val($("#cpqtyic'+row+'").val());'+
				'$("#lamount'+row+'").text($("#pamount'+row+'").val());'+
				'$("#pri_amount'+row+'").val($("#pamount'+row+'").val());'+
				'$("#pri_discountper1'+row+'").val($("#pdiscper1'+row+'").val());'+
				'$("#ldisperone'+row+'").text($("#pdiscper1'+row+'").val());'+

				'$("#totamtunit").text(parseFloat($("#txt_totamtunit").val())+parseFloat($("#pamount'+row+'").val()));'+
				'$("#txt_totamtunit").val(parseFloat($("#txt_totamtunit").val())+parseFloat($("#pamount'+row+'").val()));'+

				'$("#pri_discountper2'+row+'").val($("#pdiscper2'+row+'").val());'+
				'$("#ldispertwo'+row+'").text($("#pdiscper2'+row+'").val());'+
				'$("#pri_discountper3'+row+'").val($("#pdiscper3'+row+'").val());'+
				'$("#ldispertree'+row+'").text($("#pdiscper3'+row+'").val());'+
				'$("#pri_discountper4'+row+'").val($("#pdiscper4'+row+'").val());'+
				'$("#ldisperfore'+row+'").text($("#pdiscper4'+row+'").val());'+
  				'$("#ldisamt'+row+'").text($("#pdiscex'+row+'").val());'+
  				'$("#pri_disamt'+row+'").val($("#pdiscex'+row+'").val());'+
  				'$("#ltotdisamt'+row+'").text($("#pdisamt'+row+'").val());'+
  				'$("#pri_totdisamt'+row+'").val($("#pdisamt'+row+'").val());'+
  				'$("#lvat'+row+'").text($("#to_vat'+row+'").val());'+
  				'$("#pri_vat'+row+'").val($("#to_vat'+row+'").val());'+
  				'$("#lnetamt'+row+'").text($("#pnetamt'+row+'").val());'+
  				'$("#pri_netamt'+row+'").val($("#pnetamt'+row+'").val());'+
  				'$("#pri_remarki'+row+'").val($("#premark'+row+'").val());'+

  				'$("#accode'+row+'").val($("#accodei'+row+'").val());'+
  				'$("#acname'+row+'").val($("#acnamei'+row+'").val());'+
  				'$("#statusass'+row+'").val($("#statusassi'+row+'").val());'+

                    'var sumary_unit = parseFloat($("#summaryunit").val());'+
                    'var rowsum_unit = parseFloat($("#pprice_unit'+row+'").val());'+
                    'var sum_unit = sumary_unit+rowsum_unit;'+
                    '$("#summaryunit").val(sum_unit); '+

					'var sumary_amt = parseFloat($("#summaryamt").val());'+
                    'var rowsum_amt = parseFloat($("#pamount'+row+'").val());'+
                    'var sum_amt = sumary_amt+rowsum_amt;'+
                    '$("#summaryamt").val(sum_amt);  '+

					'var sumary_dis = parseFloat($("#summarydis").val());'+
                    'var rowsum_dis = parseFloat($("#pdiscex'+row+'").val());'+
                    'var sum_dis = sumary_dis+rowsum_dis;'+
                    '$("#summarydis").val(sum_dis);  '+

					'var sumary_d1 = parseFloat($("#summaryd1").val());'+
                    'var rowsum_d1 = parseFloat($("#pdiscper1'+row+'").val());'+
                    'var sum_d1 = sumary_d1+rowsum_d1;'+
                    '$("#summaryd1").val(sum_d1); '+
                    'var sumary_d2 = parseFloat($("#summaryd2").val());'+
                    'var rowsum_d2 = parseFloat($("#pdiscper2'+row+'").val());'+
                    'var sum_d2 = sumary_d2+rowsum_d2;'+
                    '$("#summaryd2").val(sum_d2);  '+

                    'var sumary_d3 = parseFloat($("#summaryd3").val());'+
                    'var rowsum_d3 = parseFloat($("#pdiscper3'+row+'").val());'+
                    'var sum_d3 = sumary_d3+rowsum_d3;'+
                    '$("#summaryd3").val(sum_d3); '+

                    'var sumary_d4 = parseFloat($("#summaryd4").val());'+
                    'var rowsum_d4 = parseFloat($("#pdiscper4'+row+'").val());'+
                    'var sum_d4 = sumary_d4+rowsum_d4;'+
                    '$("#summaryd4").val(sum_d4); '+

                    'var sumary_di = parseFloat($("#summarydi").val());'+
                    'var rowsum_di = parseFloat($("#too_di'+row+'").val());'+
                    'var sum_di = sumary_di+rowsum_di;'+
                    '$("#summarydi").val(sum_di);'+

                    'var sumary_vat = parseFloat($("#summaryvat").val());'+
                    'var rowsum_vat = parseFloat($("#to_vat'+row+'").val());'+
                    'var sum_vat = sumary_vat+rowsum_vat;'+
                    '$("#summaryvat").val(sum_vat);'+

                    'var sumary = parseFloat($("#summarytot").val());'+
                    'var rowsum = parseFloat($("#pnetamt'+row+'").val());'+
                    'var sumtot = sumary+rowsum;'+
                    '$("#summarytot").val(sumtot);'+
                '}else{'+
                  'swal({'+
                      'title: "Please Chack!",'+
                      'text: "Material Code Not Found",'+
                      'confirmButtonColor: "#2196F3"'+
                  '});'+
                   '$("#error<?php echo $n;?>").attr("class", "input-group has-error has-feedback");'+
                  '$("#newmatname<?php echo $n;?>").focus();'+
                '}'+
              '});'+
					 '<\/script>';

				$("#fff").append(ff);
				var dd = '<div class="modal fade" id="openmatt'+row+'" data-backdrop="false">'+
						  '<div class="modal-dialog modal-lg">'+
						    '<div class="modal-content">'+
						      '<div class="modal-header">'+
						        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						        '<h4 class="modal-title" id="myModalLabel">Select Material'+row+'</h4>'+
						      '</div>'+
						        '<div class="modal-body">'+
						        '<div class="panel-body">'+
						            '<div class="row" id="modal_material'+row+'">'+
						            '</div>'+
						            '</div>'+
						        '</div>'+
						    '</div>'+
						  '</div>'+
						'</div>'+
						'<script>'+
							'$(".openmatt'+row+'").click(function(){'+
							'$("#modal_material'+row+'").load("<?php echo base_url(); ?>index.php/share/material_id/'+row+'");'+
							'});'+
						'<\/script>';

				$("#ddd").append(dd);
				var ggg = '<div class="modal fade" id="costcode'+row+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
					 				   '<div class="modal-dialog modal-full">'+
					 				     '<div class="modal-content">'+
					 				       '<div class="modal-header bg-info">'+
					 				         '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
					 				         '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>'+
					 				       '</div>'+
					 				         '<div class="modal-body">'+
					 				             '<div id="modal_cost'+row+'"></div>'+
					 				         '</div>'+
					 				     '</div>'+
					 				   '</div>'+
					 				 '</div>'+
					 				 '<script>'+
					 				 	'$(".modalcost'+row+'").click(function(){'+
					 						 '$("#modal_cost'+row+'").load("<?php echo base_url(); ?>index.php/share/costcode_id/'+row+'");'+
					 					'});'+
					 				 '<\/script>';
				$("#ggg").append(ggg);
			}
		</script>
		<?php $n++; } ?>
	</tbody>
</table>
