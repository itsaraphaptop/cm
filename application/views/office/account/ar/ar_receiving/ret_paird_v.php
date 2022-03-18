<table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
    	<tr>
    		<th class="text-center">No.</th>
	        <th class="text-center">Paid Type</th>
	        <th class="text-center">Chq.No</th>
	        <th class="text-center">Chq.Date</th>
	        <th class="text-center">Bank</th>
	        <th class="text-center">Branch</th>
	        <th class="text-center">Amount</th>
      	</tr>
    </thead>
    <tbody id="body">
	    <tr>
	    	<td>1</td>
	    	<td>
	    		<select id="paidtype" name="paidtype" class="form-control">
	    	<?php foreach ($paid as $key => $value): ?>
	    			<option value="<?= $value->id ?>"><?= $value->name ?></option>
	    	<?php endforeach ?>
	    		</select>
	    	</td>
	    	<td>
	    		<input type="text" class="form-control" id="chqno" name="chqno" required="true">
	    	</td>
	    	<td>
	    		<input type="date" class="form-control" id="chqdate" name="chqdate" required="true">
	    	</td>
	    	<td>
	    		<div class="input-group">
	                <input type="text" class="form-control" readonly="readonly" placeholder="Bank" value="" name="bankname" id="bank_name_master" required="true">
	                <input type="hidden" readonly="true" value="" class="form-control input-sm" name="pa_bankid" id="bank_id">
	                <div class="input-group-btn">
	                  <button type="button" data-toggle="modal" data-target="#master_bank"  class="openbankk btn btn-info btn-icon"><i class="icon-search4"></i></button>
	                </div>
	            </div>
	    	</td>
	    	<td>
	    		<input type="hidden" class="form-control" id="branchidd" name="branchid">
	    		<input type="text" class="form-control" id="branchd" name="branch">
	    	</td>
	    	<td>
	    		<input type="text" class="form-control" name="amount" id="amount" value="<?php echo $amt; ?>" required="true">
	    		<input type="hidden" class="form-control" name="aa" id="aa" value="<?php echo $amt; ?>">
	    	</td>
	    </tr>
	</tbody>
</table>
<br>
<a class="insrows pull-right btn btn-primary"><i class="icon-plus2"></i> Add Item</a>

<div id="master_bank" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modal_title">Bank</h4>
      </div>
      <div class="modal-body">
      	<div id="content_master_bank"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>

<script>
function master_bank_modal() {
	$("#content_master_bank").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#content_master_bank").load('<?php echo base_url(); ?>share/bank_master');
}
master_bank_modal();
</script>
<div id="modalbank">
</div>


<div id="paid_type" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modal_title">Paid Type</h4>
      </div>
      <div class="modal-body">
      	<div id="content_paid_type"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<script>
			      $(".insrows").click(function(){
			        addrow();
			      });
			        function addrow(){
			          var row = ($('#body tr').length-0)+1;
			          var tr = '<tr>'+
			          '<td>'+row+'<input type="hidden" id="chk'+row+'" name="chkd[]"></td>'+
			          '<td>'+
			          	'<select id="paidtype'+row+'" name="paidtyped[]" class="form-control">'+
			    			'<option value="1">Cheque</option>'+
			    			'<option value="2">Cash</option>'+
			    			'<option value="3">Transfer</option>'+
			    			'<option value="4">Credit Card</option>'+
			    			'<option value="5">Other</option>'+
	    				'</select>'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" class="form-control" maxlength="8" name="chq_nod[]" id="chq_no'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          '<input type="date" class="form-control"  name="chq_dated[]" id="chq_date'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          '<div class="input-group">'+
	                	'<input type="text" class="form-control" readonly="readonly" placeholder="Bank" value="" name="banknamed[]" id="pabankname'+row+'">'+
	                	'<input type="hidden" readonly="true" value="" class="form-control input-sm" name="pabankid[]" id="pabankid'+row+'">'+
	                	'<div class="input-group-btn">'+
	                  	'<button type="button" data-toggle="modal" data-target="#openbankk'+row+'"  class="openbankk btn btn-default btn-icon"><i class="icon-search4"></i></button>'+
	                	'</div>'+
	            		'</div>'+
			          '</td>'+
			          '<td>'+
			          '<input type="hidden" name="branchcode[]" id="branchiddd'+row+'" class="form-control">'+
			          '<input type="text" name="branchname[]" id="branchdd'+row+'" class="form-control">'+
			          '</td>'+
			          '<td>'+
			          '<input type="text" name="amountd[]" id="amount'+row+'" class="form-control">'+
			          '</td>'+
			          '</tr>';
			          $('#body').append(tr);
			      
			    	var modalbank = '<div class="modal fade" id="openbankk'+row+'" data-backdrop="false">'+
					    '<div class="modal-dialog modal-lg">'+
					        '<div class="modal-content">'+
								'<div class="row">'+
							    	'<div id="tabbank" class="col-md-6">'+
								        '<h4 id="hbank">Bank</h4>'+
								        '<select multiple class="form-control" id="bank'+row+'" style="height:200px;">'+
							        	'</select>'+
		    						'</div>'+
			    					'<div id="tabcost2" class="col-md-6">'+
										'<h4>Branch</h4>'+
			         					'<select multiple class="form-control" id="branchm'+row+'" style="height:200px;"></select>'+
			    					'</div>'+
			   	 					'<div id="tabcost3" class="col-md-12">'+
			         					'<h4>Bank Account</h4>'+
			        					'<select multiple class="form-control" id="accountno'+row+'" style="height:200px;">'+
			            				'</select>'+
			    					'</div>'+
								'</div>'+
								'<br>'+
								'<div class="modal-footer">'+
			  					'<button type="button" id="select'+row+'" class="btn btn-primary" data-dismiss="modal">SELECT</button>'+
			  					'<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>';
					$("#modalbank").append(modalbank);

					// $(document).ready(function() {
					$("#bank"+row).load('<?php echo base_url('data_master/getbank'); ?>');
					// });

					$("#bank"+row).change(function(){
		            var bank = $("#bank"+row).val();
		            $("#branchm"+row).load('<?php echo base_url('data_master/getbankbranch'); ?>'+'/'+bank);
		          });
				
					$("#branchm"+row).change(function(){
		            var bank = $("#bank"+row).val();
		            var branch = $("#branchm"+row).val();
		              $("#accountno"+row).load('<?php echo base_url('data_master/getacconuntno'); ?>'+'/'+bank+'/'+branch);
		          });

					$("#select"+row).click(function(){
					  var bankcode = $("#bank"+row).val();
					  var branch = $("#branchm"+row).val();
					  var accountno = $("#accountno"+row).val();
					  var url="<?php echo base_url(); ?>data_master/getbankn/"+bankcode;
						$.post(url,function(data){
				      $("#pabankid"+row).val(bankcode);
				      $("#pabankname"+row).val(data);
						});

					var url="<?php echo base_url(); ?>data_master/getbranchn/"+bankcode+"/"+branch;
				    $.post(url,function(data){
				      $("#branchdd"+row).val(data);
				      $("#branchiddd"+row).val(branch);
				    });	
					});

					$("#amount").keyup(function(){
						var a = $("#aa").val();
						var amt = $("#amount").val();
						var ta = a-amt;

						$("#amount"+row).val(ta);
					});

			      }
			    </script>
