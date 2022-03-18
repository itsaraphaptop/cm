<style type="text/css">
	table {
	    border-collapse: collapse;
	    width: 100%;
	}

	th {
	    height: 50px;
	}
</style>
<div class="content-wrapper">
    <div class="page-header">
	    <div class="page-header-content">
	      <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
	    </div>
    </div>
	<div class="content">
		<div class="panel panel-flat">
		  	<div class="panel-heading">
		  		<h4 class="panel-title"> เจ้าหนี้คงเหลือยกมา</h4>
			</div>
  			<div class="panel-body">
  			  <!-- <div class="col-sm-12"> -->
  			  	<div class="pull-right">
  					<button type="button" class="btn btn-info" id="addrow">Add rows</button>
  				</div>
  			  <!-- </div> -->
  			  <br><br>
  			  <form action="<?=base_url();?>ap/add_vender_carry" method="post">
  				<div id="apv" class="table-responsive">	
		          <table class="basic table table-hover table-xxs" style="width: 5000px;">
		            <thead>
		              <tr>
		                <th style="width: 1%;">No.</th>
		                <th style="width: 2%;">Vender Code</th>
		                <th style="width: 4%;">Vender Name</th>
		                <th style="width: 1%;">CN</th>
		                <th style="width: 3%;">Invoice/TAX</th>
		                <th style="width: 1%;">TAX</th>
		                <th style="width: 2%;">Inv./TAX date</th>
		                <th style="width: 2%;">Due date</th>
		                <th style="width: 3%;">P/O No.</th>
		                <th style="width: 3%;">Data type</th>
		                <th style="width: 2%;">Voucher No.</th>
		                <th style="width: 2%;">Voucher date</th>
		                <th style="width: 3%;">A/C Vender</th>
		                <th style="width: 4%;">Project</th>
		                <th style="width: 2%;">System code</th>
		                <th style="width: 3%;">System name</th>
		                <th style="width: 3%;">Currency</th>
		                <th style="width: 2%;">Exchange</th>
		                <th style="width: 3%;">Amount</th>
		                <th style="width: 3%;">Deduct Material</th>
		                <th style="width: 2%;">% Avd.</th>
		                <th style="width: 3%;">Adr. Amount</th>
		                <th style="width: 3%;">Amt. after Adv</th>
		                <th style="width: 2%;">% VAT</th>
		                <th style="width: 4%;">VAT Amount</th>
		                <th style="width: 2%;">% Ret.</th>
		                <th style="width: 4%;">Ret. Amount</th>
		                <th style="width: 3%;">W/T Code</th>
		                <th style="width: 2%;">% W/T</th>
		                <th style="width: 4%;">W/T Amount</th>
		                <th style="width: 4%;">Net Amount</th>
		                <th style="width: 5%;">Remark</th>
		                <th style="width: 3%;">Doc No.</th>
		                <th style="width: 3%;">Approve Payment Amt</th>
		                <th style="width: 4%;">Paid Amount</th>
		                <th style="width: 2%;">Action</th>
		              </tr>
		            </thead>
		            <tbody id="bodytable">
		            <?php foreach ($apvp as $key => $value) {
		            	
		            ?>

		              <tr class="trdel">
		                <td>
		                	<?=$key+1;?>
		                	<input type="hidden" name="idrow[]" value="<?=$value['apvp_id']?>">
		                	<input type="hidden" name="chkupd[]" value="update">	
		                </td>
		                <td>
		                	<input id="vencode<?=$key?>" type="text" class="form-control" name="vender_code_upd[]" value="<?=$value['vender_code']?>" readonly="">
		                </td>
		                <td>
		                	<div class="input-group">
		                		<input id="venname<?=$key?>" type="text" class="form-control input-sm" name="vender_name_upd[]" value="<?=$value['vender_name']?>" readonly="">
		                		<span class="input-group-btn">
	                       			<button type="button" data-toggle="modal" onclick="showModal($(this))" row-id='<?=$key?>' class="ven btn btn-default btn-icon btn-xs"><i class="icon-search4"></i>
	                       			</button>
                       			</span>
                       		</div>
                       	</td>
		                <td>
		                	<input type="checkbox" name="" idchk-cu="<?=$key;?>" onclick="checkcu($(this))" 
		                		<?php 
		                			$check_value = 0; 
		                			if($value['cn']==1){
		                				echo "checked";
		                				$check_value = 1;
		                			} 
		                		?>
		                	/>
		                	<input type="hidden" class="cncheck<?=$key;?>" name="cn_upd[]" value="<?=$check_value;?>">
		                </td>
		                <td><input type="text" value="<?=$value['invoice_tax']?>" name="invoice_tax_upd[]" class="form-control"></td>
		                <td>
		                	<input type="checkbox" name="" idchk-tax="<?=$key;?>" onclick="checktax($(this))"
			                	<?php $check_tax = 0; 
			                		  if($value['tax']==1){
			                		  	echo "checked";
			                		  	$check_tax = 1;
			                		  } 
			                	?>
		                	/>
		                	<input type="hidden" class="taxcheck<?=$key;?>" name="tax_upd[]" value="<?=$check_tax;?>">
		                </td>
		                <td><input type="date" name="inv_taxdate_upd[]" value="<?=$value['inv_taxdate']?>" class="form-control"></td>
		                <td><input type="date" name="due_date_upd[]" value="<?=$value['due_date']?>" class="form-control"></td>
		                <td><input type="text" name="po_no_upd[]" value="<?=$value['po_no']?>" class="form-control"></td>
		                <td><select class="form-control" name="data_type_upd[]">
		                	<option value="normal">Normal</option>
		                </select></td>
		                <td><input type="text" name="voucher_no_upd[]" value="<?=$value['voucher_no']?>" class="form-control"></td>
		                <td><input type="date" name="voucher_date_upd[]" value="<?=$value['voucher_date']?>" class="form-control"></td>
		                <td><input type="text" name="ac_vender_upd[]" value="<?=$value['ac_vender']?>" class="form-control"></td>
		                <td>
		                	<div class="input-group">
		                		<input type="text" class="form-control input-sm" value="<?=$value['project']?>" id="pjn<?=$key?>" name="proj_upd[]" readonly="">
		                		<span class="input-group-btn">
	                       			<button type="button" data-toggle="modal" onclick="proModal($(this))" pro-id='<?=$key?>' class="openproj btn btn-default btn-icon btn-xs"><i class="icon-search4"></i>
	                       			</button>
                       			</span>
                       		</div>
		                </td>
		                <td><input type="text" id="bd_jobno<?=$key?>" class="form-control" value="<?=$value['systemcode']?>" name="systemcode_upd[]" readonly=""></td>
		                <td>
		                	<div class="input-group">
		                		<input type="text" id="bd_jobname<?=$key?>" class="form-control input-sm" value="<?=$value['systemname']?>" name="systemname_upd[]" readonly="">
		                		<span class="input-group-btn">
	                       			<button type="button" data-toggle="modal" onclick="systemModal($(this))" system-id='<?=$key?>' class="openproj btn btn-default btn-icon btn-xs"><i class="icon-search4"></i>
	                       			</button>
                       			</span>
                       		</div>
		                </td>
		                <td>
		                	<select class="form-control" name="currency_upd[]">
			                	<?php foreach ($currency as $key => $crc) { ?>
			                		<option <?php if($value['currency']==$crc['currency_code']){echo "selected='selected'";}?> value="<?=$crc['currency_code']?>"><?=$crc['currency_name_en']?></option>
			                	<?php } ?>
		                	</select>
		            	</td>
		                <td><input type="text" name="exchange_upd[]" value="<?=$value['exchange']?>" class="form-control"></td>
		                <td><input type="text" name="amount_upd[]" value="<?=number_format($value['amount']*1,2);?>" class="form-control"  style="text-align: right;"></td>
		                <td><input type="text" name="deduct_material_upd[]" value="<?=$value['deduct_material']?>" class="form-control"></td>
		                <td><input type="text" name="per_avd_upd[]" value="<?=$value['per_avd']?>" class="form-control"></td>
		                <td><input type="text" name="adr_amount_upd[]" value="<?=number_format($value['adr_amount']*1,2)?>" class="form-control" style="text-align: right;"></td>
		                <td><input type="text" name="amt_after_adv_upd[]" value="<?=$value['amt_after_adv']?>" class="form-control"></td>
		                <td><input type="text" name="per_vat_upd[]" value="<?=$value['per_vat']?>" class="form-control"></td>
		                <td><input type="text" name="vat_amount_upd[]" value="<?=number_format($value['vat_amount']*1,2)?>" class="form-control" style="text-align: right;"></td>
		                <td><input type="text" name="per_ret_upd[]" value="<?=$value['per_ret']?>" class="form-control"></td>
		                <td><input type="text" name="ret_amount_upd[]" value="<?=number_format($value['ret_amount']*1,2)?>" class="form-control" style="text-align: right;"></td>
		                <td>
		                	<select class="form-control" name="wt_code_upd[]">
			                	<?php foreach ($wt as $key => $wtval) { ?>
			                		<!-- <input type="text" name="" value="<?php var_dump($wtval); ?>"> -->
			                		<option <?php if ($value['wt_code']==$wtval['id_wt']) {
			                			echo "selected='selected'";
			                		}?> value="<?=$wtval['id_wt']?>"><?=$wtval['name_wt']?></option>
			                	<?php } ?>
		                	</select>
		            	</td>
		                <td><input type="text" name="per_wt_upd[]" value="<?=$value['per_wt']?>" class="form-control"></td>
		                <td><input type="text" name="wt_amount_upd[]" value="<?=number_format($value['wt_amount']*1,2)?>" class="form-control" style="text-align: right;"></td>
		                <td><input type="text" name="net_amount_upd[]" value="<?=number_format($value['net_amount']*1,2)?>" class="form-control" style="text-align: right;"></td>
		                <td><input type="text" name="remark_upd[]" value="<?=$value['remark']?>" class="form-control"></td>
		                <td><input type="text" name="doc_no_upd[]" value="<?=$value['doc_no']?>" class="form-control"></td>
		                <td><input type="text" name="ap_amt_upd[]" value="<?=$value['ap_amt']?>" class="form-control"></td>
		                <td><input type="text" name="paid_amount_upd[]" value="<?=number_format($value['paid_amount']*1,2)?>" class="form-control" style="text-align: right;"></td>
		                <td><a class="delete label label-danger del" id-row="<?=$value['apvp_id']?>">Delete</a></td>
		              </tr>
		              <?php } ?>
		            </tbody>
		          </table>
		        </div>
		        <br><br>
		        <button type="submit" class="btn btn-success pull-right" >Save</button>
		       </form>
		    </div>
  			</div>
  		</div>
  	</div>
</div>
<script type="text/javascript">
	
</script>
<div id="openvender" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Select Vender</h5>
        </div>
        <div class="modal-body">
          <div id="loadvender">
          </div>
        </div>
        <br>
        <div class="modal-footer">
          <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
          <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
        </div>
      </div>
    </div>
  </div>
  <div id="openproj" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Select Project</h5>
        </div>
        <div class="modal-body">
          <div id="loadproject">
          </div>
        </div>
        <br>
        <div class="modal-footer">
          <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
          <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
        </div>
      </div>
    </div>
  </div>
  <div id="opensystem" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Select System</h5>
        </div>
        <div class="modal-body">
          <div id="loadsystem">
          </div>
        </div>
        <br>
        <div class="modal-footer">
          <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
          <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
        </div>
      </div>
    </div>
  </div>
<script>
	

	function checkcu(event)
	{
		var val = event.prop('checked');
		var id = event.attr('idchk-cu');
		if (val===true) {
			$('.cncheck'+id).val('1');
		}else{
			$('.cncheck'+id).val('0');
		}
	}
	function checktax(event)
	{
		var val = event.prop('checked');
		var id = event.attr('idchk-tax');
		if (val===true) {
			$('.taxcheck'+id).val('1');
		}else{
			$('.taxcheck'+id).val('0');
		}
	}
	// $(".ven").click(function(){
	//   $("#loadvender").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
	//   $("#loadvender").load('<?php echo base_url(); ?>share/vender');
	// });
		$('.delete').click(function(event) {
				var row_id = $(this).attr('id-row');
				// alert(row_id);
				// $(this).parent().parent().remove();
        		var row_el = $(this).parent().parent();
        			swal({
						  title: "ยืนยันการลบ?",
						  text: "เมื่อทำการยืนยันแล้วจะไม่สามารถเอาขอมูลกลับคืนได้!",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "Yes, delete it!",
						  closeOnConfirm: false
						},
						function(){
						  $.post('<?=base_url();?>ap/del_apvp/'+row_id, function() {
        					}).done(function(data){
        						// alert(data);
        						var json_res = jQuery.parseJSON(data);
        						if (json_res.status==true) {
        							swal(json_res.message, " ", "success");
        							row_el.remove();
        						}else{
        							swal(json_res.message, " ", "error");
        						}
							});
        				});
        	});
		// adrows
        $("#addrow").click(function() {
        	var return_row = addrow();
        	get_currency(return_row)
        	
        	get_wt(return_row)

        });
        function addrow()
        {	
        	// var tbodyrow = $('#bodytable tr').length;
        	var row = ($('#bodytable tr').length-0)+1;
        	var tr = `<tr class="numrow">
		                <td>
		                	${row}
		                	<input type="hidden" name="chkins[]" value="insert">
		                </td>
		                <td><input id="vendercode${row}" type="text" class="form-control" name="vender_code[]" readonly=""></td>
		                <td>
		                	<div class="input-group">
		                		<input id="venname${row}" type="text" class="form-control input-sm" name="vender_name[]" readonly="">
		                		<span class="input-group-btn">
	                       			<button type="button" onclick="showModal($(this))" row-id='${row}' data-toggle="modal"  class="ven btn btn-default btn-icon btn-xs"><i class="icon-search4"></i>
	                       			</button>
                       			</span>
                       		</div>
                       	</td>
		                <td><input type="checkbox" name="cn[]" value="1"></td>
		                <td><input type="text" name="invoice_tax[]" class="form-control"></td>
		                <td><input type="checkbox" name="tax[]" value="1"></td>
		                <td><input type="date" name="inv_taxdate[]" class="form-control"></td>
		                <td><input type="date" name="due_date[]" class="form-control"></td>
		                <td><input type="text" name="po_no[]" class="form-control"></td>
		                <td><select class="form-control" name="data_type[]">
		                	<option value="normal">Normal</option>
		                </select></td>
		                <td><input type="text" name="voucher_no[]" class="form-control"></td>
		                <td><input type="date" name="voucher_date[]" class="form-control"></td>
		                <td><input type="text" name="ac_vender[]" class="form-control"></td>
		                <td>
		                	<div class="input-group">
		                		<input type="text" id="pjn${row}" class="form-control input-sm" name="proj[]" readonly="">
		                		<span class="input-group-btn">
	                       			<button type="button" data-toggle="modal" onclick="proModal($(this))" pro-id='${row}' class="openproj btn btn-default btn-icon btn-xs"><i class="icon-search4"></i>
	                       			</button>
                       			</span>
                       		</div>
		                </td>
		                <td><input type="text" id="bd_jobno${row}" class="form-control" name="systemcode[]" readonly=""></td>
		                <td>
		                	<div class="input-group">
		                		<input type="text" id="bd_jobname${row}" class="form-control input-sm" name="systemname[]" readonly="">
		                		<span class="input-group-btn">
	                       			<button type="button" data-toggle="modal" onclick="systemModal($(this))" system-id='${row}' class="btn btn-default btn-icon btn-xs"><i class="icon-search4"></i>
	                       			</button>
                       			</span>
                       		</div>
		                </td>
		                <td><select class="form-control" id="currency-${row}" name="currency[]">
		                	
		                </select></td>
		                <td><input type="text" name="exchange[]" class="form-control"></td>
		                <td><input type="text" name="amount[]" class="form-control"></td>
		                <td><input type="text" name="deduct_material[]" class="form-control"></td>
		                <td><input type="text" name="per_avd[]" class="form-control"></td>
		                <td><input type="text" name="adr_amount[]" class="form-control"></td>
		                <td><input type="text" name="amt_after_adv[]" class="form-control"></td>
		                <td><input type="text" name="per_vat[]" class="form-control"></td>
		                <td><input type="text" name="vat_amount[]" class="form-control"></td>
		                <td><input type="text" name="per_ret[]" class="form-control"></td>
		                <td><input type="text" name="ret_amount[]" class="form-control"></td>
		                <td><select class="form-control" id="wtattr-${row}" name="wt_code[]">
		                	
		                </select></td>
		                <td><input type="text" name="per_wt[]" class="form-control"></td>
		                <td><input type="text" name="wt_amount[]" class="form-control"></td>
		                <td><input type="text" name="net_amount[]" class="form-control"></td>
		                <td><input type="text" name="remark[]" class="form-control"></td>
		                <td><input type="text" name="doc_no[]" class="form-control"></td>
		                <td><input type="text" name="ap_amt[]" class="form-control"></td>
		                <td><input type="text" name="paid_amount[]" class="form-control"></td>
		                <td><a class="deleteadd label label-danger">Delete</a></td>
		              </tr>`;
        	$('#bodytable').append(tr);
        	$('.deleteadd').click(function(event) {
        		$(this).parent().parent().remove();
        	});

        	return row;

        }
        // close adrow admin
        // $(".ven").click(function(){alert(row);}

        function showModal(el){
        	var row_id =el.attr("row-id");
        	$("#loadvender").html(row_id);
        	$("#loadvender").load(`<?php echo base_url(); ?>share/vender/${row_id}`);
        		// alert(`<?php echo base_url(); ?>share/vender/${row_id}`)

        	$("#openvender").modal('show');
        }
        function proModal(el){
        	var pro_id =el.attr("pro-id");
        	$("#loadproject").html(pro_id);
        	$("#loadproject").load(`<?php echo base_url(); ?>share/project/${pro_id}`);
        		// alert(`<?php echo base_url(); ?>share/vender/${row_id}`)

        	$("#openproj").modal('show');
        }
        function systemModal(el){
        	var system_id =el.attr("system-id");
        	$("#loadsystem").html(system_id);
        	$("#loadsystem").load(`<?php echo base_url(); ?>share/system/${system_id}`);
        		// alert(`<?php echo base_url(); ?>share/vender/${row_id}`)

        	$("#opensystem").modal('show');
        }
        function get_currency(row){
        	$.get('<?php echo base_url(); ?>ap/get_currency_con', function() {
        			
    		}).done(function(data){
    			
    			var currencys = jQuery.parseJSON(data);
    			
    			$.each(currencys, function(index, el) {
    				  $("#currency-"+row).append(`<option value="${el.currency_code}">${el.currency_name_en}</option>`);
    			});
    			
    		});
        }
        function get_wt(row){
        	$.get('<?php echo base_url(); ?>ap/get_wt_con', function() {
        			
    		}).done(function(data){
    			
    			var wts = jQuery.parseJSON(data);
    			
    			$.each(wts, function(index, el) {
    				  $("#wtattr-"+row).append(`<option value="${el.id_wt}">${el.name_wt}</option>`);
    			});
    			
    		});
        }

      //   	$.get('<?php echo base_url(); ?>ap/get_currency_con', function() {
        			
    		// }).done(function(data){
    		// 	alert(data)
    		// });


</script>
					