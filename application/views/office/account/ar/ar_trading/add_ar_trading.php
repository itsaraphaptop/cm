<div class="page-header">
	<div class="page-header">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h3>บันทึกตั้งบัญชีลูกหนี้จากใบแจ้งหนี้จากการจำหน่าย (Trading)</h3>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<a class="btn btn-info pull-right" id="select_inv" data-toggle="modal" data-target="#myModal"><i class="icon-file-plus"></i> Select</a>
				</div>
			</div>
			<form id="form_trading">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label>Invoice No.</label>
							<input type="text" name="inv_no" id="inv_no" class="form-control" readonly="true">
							<input type="hidden" name="project_id" id="project_id" >
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label>Invoice Date.</label>
							<input type="text" name="inv_date" id="inv_date" class="form-control" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label>Project Code.</label>
							<input type="text" name="project_code" id="project_code" class="form-control" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label>Project Name.</label>
							<input type="text" name="project_name" id="project_name" class="form-control" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label>Customer Code.</label>
							<input type="text" name="customer_code" id="cus_code" class="form-control" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label>Customer Name.</label>
							<input type="text" name="customer_name" id="cus_name" class="form-control" readonly="true">
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">% Vat :</label>
						<input type="text" class="form-control" name="vat" id="vat" readonly="true">
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Currency :</label>
						<input type="text" class="form-control" name="curency" id="curency" readonly="true">
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Exchange :</label>
						<input type="text" class="form-control" name="exchange" id="exchange" readonly="true">
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Cr. term :</label>
						<input type="text" class="form-control" name="cr_term" id="cr_term" readonly="true">
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Due Date :</label>
						<input type="date" class="form-control" name="due_date" id="duedate" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label class="display-block">Vat Amount :</label>
						<input type="text" name="vat_amt" id="vat_amt" class="form-control" readonly="true">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="display-block">Amount :</label>
						<input type="text" name="amt" id="amt" class="form-control" readonly="true">
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
						<label class="display-block">Net Amount :</label>
						<input type="text" name="net_amt" id="net_amt" class="form-control" readonly="true">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="form-group">
						<label class="display-block">Remark :</label>
						<textarea class="form-control" name="remark" rows="4"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-highlight">
						<li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Paid</a></li>
						<li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Invoice</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<table class="table table-bordered table-xs">
								<thead>
									<tr>
										<th>#</th>
										<th class="text-center"><div style="width:200px;"></div>System</th>
										<th class="text-center"><div style="width:80px;"></div>A/C</th>
										<th class="text-center"><div style="width:150px;"></div>A/C NAME</th>
										<th class="text-center"><div style="width:100px;"></div>Cost Code</th>
										<th class="text-center"><div style="width:150px;"></div>Debit</th>
										<th class="text-center"><div style="width:150px;"></div>Credit</th>
									</tr>
								</thead>
								<tbody id="other_tr">
								</tbody>
							</table>
						</div>
						</form>
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
											<th class="text-center"><div style="width:150px;"></div>Net Amount</th>
											<th class="text-center"><div style="width:150px;"></div>Receipt Amount (Net)</th>
										</tr>
									</thead>
									<tbody id="receive_tr">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:20px;">
							<a class="btn btn-success btn-xs pull-right" id="save_form">Save</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Invoice</h4>
      </div>
      <div class="modal-body" id="content_detail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="modal_cost_code" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cost Code</h4>
      </div>
      <div class="modal-body">
        <div id="modal_cost"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myAccount" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Account</h4>
            </div>
            <div class="modal-body">
               <div id="account_code"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$('#select_inv').click(function(event) {
	$('#content_detail').load('<?= base_url() ?>ar/get_inv_receipt');
});

$(function(){
  $("#save_form").click(function(){

       var formData = new FormData($("#form_trading")[0]); 
       

      $.ajax({
            url: '<?= base_url() ?>acc_active/add_ar_receipt_trading',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

              try{
                 console.log(data);
                 var json = jQuery.parseJSON(data);
                 if(json.status == true){

                    swal({ 
                        title: json.ar_rd,
                        text: json.message,
                        type: "success" 
                    },
                    function(){
                        window.location.href = '<?= base_url() ?>ar/receipt_trading_edit/'+json.ar_rd;
                    });
                    
                 }else{
                  
                    console.log('Error');
                 }
              }catch(e){
                    console.log(e);
              }
          },
          cache: false,
          contentType: false,
          processData: false
      });
  });
});


</script>