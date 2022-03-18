<div class="content-wrapper">
	<div class="page-header">
		<div class="content">
			<div class="panel-heading">
			<?php
				foreach ($getproject as $key => $value) {
			?>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h5 class="panel-title">บันทึกรับเงินตามใบเสร็จอื่น ๆ (AR Other)</h5>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<a class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#myModal"> <i class="icon-file-plus"></i> Select</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<form id="form_receive">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Receipt No. :</label>
							<input type="text" class="form-control" name="v_no" placeholder="Receipt No" value="">
							<input type="hidden" name="s_no" id="c" >
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Project Code. :</label>
							<input type="text" class="form-control" name="project_code" id="project_code" readonly="true" value="<?= $value->project_code ?>">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Project name. :</label>
							<input type="text" class="form-control" name="project_name" readonly="true" value="<?= $value->project_name ?>">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Customer Code. :</label>
							<input type="text" class="form-control" name="customer_code" readonly="true" value="<?= $value->project_mcode ?>">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">

						<div class="form-group">
							<label class="display-block">Customer Name. :</label>
							<input type="text" class="form-control" name="customer_name" readonly="true" value="<?= $value->project_mnameth ?>">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Rept. Amount :</label>
							<input type="text" class="form-control" readonly="true" name="rept_amount" id="rept_amount">
							<input type="hidden" name="vat_amount" id="vat_amount">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Less Other :</label>
							<div class="input-group">
								<input type="text" class="form-control" name="less_other_price" id="less_other_price" readonly="readonly">
								<input type="hidden" class="form-control" name="less_other_id" id="less_other_id" readonly="readonly">
								<input type="text" class="form-control" name="less_other_name" id="less_other_name_ot" readonly="readonly">
								<div class="input-group-btn">
									<button type="button" class="btn btn-info btn-icon" onclick="less_other(compcode='<?= $compcode ?>')"><i class="icon-search4"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Currency :</label>
							<div class="input-group">
								<input type="text" class="form-control" name="currency_name" id="currency_name" readonly="readonly">
								<input type="hidden" class="form-control" name="currency_id" id="currency_id" readonly="readonly">
								<div class="input-group-btn">
									<button type="button" class="btn btn-info btn-icon" data-toggle="modal" data-target="#currency_modal"><i class="icon-search4"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Exchange :</label>
							<input type="text" class="form-control" name="v_exchanges">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label>Remark :</label>
							<textarea name="remark" id="remark" class="form-control" rows="4"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-4">
						<div class="form-group">
							<label>To Bank A/C :</label>
							<div class="input-group">
								<input type="text" class="form-control" name="bankname" id="bankname" readonly="readonly">
								<input type="hidden" name="branch" id="branch">
								<input type="hidden" name="acno" id="acno">
								<input type="hidden" name="acid" class="acid">
								<div class="input-group-btn">
									<button type="button" class="btn btn-info btn-icon" id="bank_list"><i class="icon-search4" data-toggle="modal" data-target="#bank_all"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label>Voucher Date :</label>
							<input type="date" class="form-control" name="v_date">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="panel-body">
						<div class="tabbable">
							<ul class="nav nav-tabs nav-tabs-highlight">
								<li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Paid</a></li>
								<li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Invoice</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">
									<div class="row" style="padding-bottom:20px;">
										<a class="btn btn-info" id="add_row">Add row</a>
									</div>
									<table class="table table-bordered table-xs">
										<thead>
											<tr>
												<th>#</th>
												<th>Paid Type</th>
												<th>Chq. No.</th>
												<th>Chq. Date.</th>
												<th>Bank</th>
												<th>Branch</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody id="list_paid">
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="tab2">
									<div class="table-responsive">
										<table class="table table-bordered table-xs" width="200%" >
											<thead>
												<tr>
													<th>#</th>
													<th class="text-center"><div style="width:150px;"></div>Invoice No.</th>
													<th class="text-center"><div style="width:100px;"></div>Descriptiom</th>
													<th class="text-center"><div style="width:150px;"></div>Amount</th>
													<th class="text-center"><div style="width:10px;"></div>%VAT</th>
													<th class="text-center"><div style="width:150px;"></div>VAT</th>
													<th class="text-center"><div style="width:10px;"></div>%W/T</th>
													<th class="text-center"><div style="width:150px;"></div>W/T</th>
													<th class="text-center"><div style="width:150px;"></div>Net Amount</th>
													<th class="text-center"><div style="width:150px;"></div>Receipt Amount (Net)</th>
												</tr>
											</thead>
											<tbody id="other_tr">
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			?>
				<div class="row">
					<div><a id="save_receive" class="btn btn-success">Save</a></div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ใบเสร็จอื่น ๆ</h4>
      </div>
      <div class="modal-body">
      	<div id="content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div id="less_other" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modal_title">Less Other</h4>
      </div>
      <div class="modal-body">
      	<div id="content_less_other"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div id="less_other_type" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Less Other</h4>
      </div>
      <div class="modal-body">
      	<table class="table table-bordered">
      		<thead>
      			<tr>
      				<th>#</th>
      				<th>Name</th>
      				<th>Action</th>
      			</tr>
      		</thead>
      		<tbody>
      	<?php
      		$i=1;
      		foreach ($less_other as $key => $value) {
      	?>
      		<tr>
      			<td><?= $i++ ?></td>
      			<td><?= $value->less_name ?></td>
      			<td><a class="btn btn-primary btn-xs" 
      				onclick="add_less(name='<?= $value->less_name ?>',id='<?= $value->id_lessother ?>')" data-dismiss="modal">Select</a></td>
      		</tr>
      	<?php
      		}
      	?>
      		</tbody>
      	</table>

      	
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div id="currency_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Currency</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Name</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php
        		    $ii=1;
        			foreach ($currency as $currency_key => $value_c) {
        		?>
        			<tr>
        				<td><?= $ii++; ?></td>
        				<td><?= $value_c->currency_name_en ?></td>
        				<td><a class="btn btn-primary btn-xs" onclick="add_cry(id='<?= $value_c->currency_id ?>',name='<?= $value_c->currency_name_en ?>')" data-dismiss="modal">Select</a></td>
        			</tr>
        		<?php
        			}
        		?>
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="bank_all" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bank</h4>
      </div>
      <div class="modal-body">
      	<div id="content_bank"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
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

<div id="master_bank" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
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



<script type="text/javascript">

	function select_bill() {
		var project_code = $('#project_code').val();
        $("#content").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content").load('<?php echo base_url(); ?>ar/get_bill_by_project/'+project_code);
	}

	function master_bank_modal() {
		$("#content_master_bank").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_master_bank").load('<?php echo base_url(); ?>share/master_bank');
	}
	function paid_type_modal() {
		$("#content_paid_type").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_paid_type").load('<?php echo base_url(); ?>share/paid_type');
	}
	master_bank_modal();
	paid_type_modal();
	select_bill();




	$('#master_bank_modal').click(function(event) {
		
	});
	$('#paid_type_modal').click(function(event) {
		$("#content_paid_type").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_paid_type").load('<?php echo base_url(); ?>share/paid_type');
	});


	function add_less(name,id) {
		$('#less_id').val(id);
		$('#less_name').val(name);
	}


	

	function less_other(compcode) {
		$("#content_less_other").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_less_other").load('<?php echo base_url(); ?>ar/get_modal_less_other/'+compcode);
        $('#less_other').modal('show');
	}

	function add_cry(id,name) {
		$('#currency_id').val(id);
		$('#currency_name').val(name);
	}

	$('#bank_list').click(function(event) {
		$("#content_bank").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#content_bank").load('<?php echo base_url(); ?>share/bank');
	});

	$('#add_row').click(function(event) {
		var amt = ($('#rept_amount').val()*1);
		var lo_price = ($('#less_other_price').val()*1);
		var n = $('#list_paid tr').length;
		var row = n+1;
		var tr = `<tr>
					<td>${row}</td>
					<td>
						<div class="input-group">
							<input type="text" class="form-control" name="paid[]" id="paid" readonly="readonly">
							<input type="hidden" name="paid_id[]" id="paid_id">
							<div class="input-group-btn">
								<button type="button" class="btn btn-info btn-icon" id="paid_type_modal" data-toggle="modal" data-target="#paid_type"><i class="icon-search4"></i></button>
							</div>
						</div>
					</td>
					<td><input type="text" name="chq_no[]" class="form-control"></td>
					<td><input type="date" name="chq_date[]" class="form-control"></td>
					<td>
						<div class="input-group">
							<input type="text" class="form-control" name="bank_name[]" id="bank_name" readonly="readonly">
							<input type="hidden" name="bank_id[]" id="bank_id">
							<div class="input-group-btn">
								<button type="button" class="btn btn-info btn-icon" id="master_bank_modal" data-toggle="modal" data-target="#master_bank"><i class="icon-search4"></i></button>
							</div>
						</div>
					</td>
					<td><input type="text" name="branch_paid[]" class="form-control"></td>
					<td><input type="text" name="amount_paid[]" class="form-control text-right" value="${amt-lo_price}"></td>
				  </tr>`;
		$('#list_paid').append(tr);
	});

$(function(){
  $("#save_receive").click(function(){

       var formData = new FormData($("#form_receive")[0]); 

         $.ajax({
            url: '<?= base_url() ?>acc_active/add_receive',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

              try{
                 console.log(data);

                 var json = jQuery.parseJSON(data);
                 if(json.status == true){

                    swal({ 
                        title: 'Success',
                        text: json.message,
                        type: "success" 
                    },
                    function(){
                        window.location.href = '<?= base_url() ?>ar/ar_receivingall_other';
                    });
                    
                 }else{
                  
                    $.simplyToast(json.message, 'danger');
                 }
              }catch(e){
                    $.simplyToast(e, 'danger');
              }
          },
          cache: false,
          contentType: false,
          processData: false
      });
  });
});

</script>