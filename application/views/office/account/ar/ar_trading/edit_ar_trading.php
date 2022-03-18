<div class="page-header">
	<div class="page-header">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<h3>บันทึกตั้งบัญชีลูกหนี้จากใบแจ้งหนี้จากการจำหน่าย (Trading)</h3>
				</div>
			</div>
			<form id="form_trading">
<?php
	foreach ($art_header as $art_key => $data) {
?>
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-2">
					<label><h3><?= $data->acc_no ?></h3></label>
					<input type="hidden" name="ar_id" value="<?= $data->acc_id ?>" readonly="true">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-2">
					<label>Invoice No.</label>
					<input type="text" class="form-control" value="<?= $data->acc_invno ?>" readonly="true">
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<label>Invoice Date.</label>
					<input type="text" class="form-control" value="<?= $data->acc_invdate ?>" readonly="true">
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<label>Project Code.</label>
					<input type="text" class="form-control" value="<?= $data->project_code ?>" readonly="true">
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<label>Project Name.</label>
					<input type="text" class="form-control" value="<?= $data->project_name ?>" readonly="true">
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<label>Customer Code.</label>
					<input type="text" class="form-control" value="<?= $data->acc_owner ?>" readonly="true">
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<label>Customer Name.</label>
					<input type="text" class="form-control" value="<?= $data->debtor_name ?>" readonly="true">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">% Vat :</label>
						<input type="text" class="form-control" value="<?= $data->acc_vat ?>" readonly="true">
					</div>
				</div>				
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Cr. term :</label>
						<input type="text" class="form-control"value="<?= $data->acc_credit ?>" readonly="true">
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Due Date :</label>
						<input type="date" class="form-control"value="<?= $data->acc_due ?>" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="form-group">
						<label class="display-block">Remark :</label>
						<textarea class="form-control" rows="4"><?= $data->acc_remark ?></textarea>
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Date :</label>
						<input type="date" class="form-control" name="date" value="<?= $data->acc_billdate ?>">
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Year :</label>
						<input type="text" class="form-control" id="year" name="year" value="<?= $data->year ?>">
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<div class="form-group">
						<label class="display-block">Pariod :</label>
						<input type="text" class="form-control" id="pariod" name="period" value="<?= $data->period ?>">
					</div>
				</div>
			</div>
<?php
	}
?>
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
							<?php
								$i = 0;
								foreach ($art_detail as $key => $value) {
								$i++;
							?>
								<tr>
									<td><?= $i ?></td>
									<td>
										<?= $value->systemname ?>
										<input type="hidden" value="<?= $value->systemname ?>">
										<input type="hidden" value="<?= $value->systemid ?>">
										<input type="hidden" name="art_detail_id[]" value="<?= $value->acc_id ?>">
									</td>
									<td>
										<input type="text" name="acc_code[]" id="acc_code<?= $i ?>" class="form-control" value="<?= $value->acc_codeac ?>" readonly="readonly" >
									</td>
									<td>
										<div class="input-group">
											<input type="text" class="form-control" name="acc_name[]" id="acc_name<?= $i ?>" readonly="readonly" value="<?= $value->act_name ?>">
											<div class="input-group-btn">
												<button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $i ?>')"><i class="icon-search4"></i></button>
											</div>
										</div>
									</td>
									<td>
										<div class="input-group">
											<input type="text" name="cost_code[]" readonly="true" id="cost_code_<?= $i ?>" value="<?= $value->cost_code ?>" class="form-control" >
											<div class="input-group-btn">
												<a class="btn btn-info btn-icon selectcostcode" row="<?= $i ?>"><i class="icon-search4"></i></a>
											</div>
										</div>
									</td>
									<td class="text-right">
										<input type="text" class="form-control text-right" id="debit_<?= $i ?>" readonly="readonly" value="<?= $value->acc_cr ?>">
									</td>
									<td class="text-right">
										<input type="text"class="form-control text-right" readonly="readonly" value="<?= $value->acc_dr ?>">
									</td>
								</tr>
			<?php
				}
			?>
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
							<?php
								$row = 0;
								foreach ($inv_detail as $inv_key => $inv_value) {
								$row++;
									$vat = ($data->acc_vat/100)*$inv_value->itrad_amount;
							?>
									<tr>
										<td>
											<?= $row ?>
										</td>
										<td>
											<?= $inv_value->itrad_matcode ?>
										</td>
										<td>
											<?= $inv_value->itrad_descrip ?>
										</td>
										<td class="text-right">
											<?= $inv_value->itrad_amount ?>
										</td>
										<td>
											<?= $data->acc_vat ?>
										</td>
										<td class="text-right">
											<?= $vat ?>
										</td>
										<td class="text-right">
											<?= $inv_value->itrad_amount+$vat ?>
										</td>
										<td class="text-right">
											<?= $inv_value->itrad_amount+$vat ?>
										</td>
									</tr>
							<?php
								}
							?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:20px;">
							<a class="btn btn-success btn-xs pull-right" id="save_form"><i id="icon_save" class="icon-floppy-disk"></i> Save</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal_cost_code" class="modal fade" role="dialog">
  <div class="modal-dialog modal-full">

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

function acc(id){
    $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#account_code").load(`<?php echo base_url(); ?>ar/account_code_by_rows/${id}`);
    $('#myAccount').modal('show');
}	

$(".selectcostcode").click(function(event) {
	var _row = $(this).attr('row');
    $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_cost").load('<?php echo base_url(); ?>share/costcode_id/'+_row);
    $('#modal_cost_code').modal('show');
});	


$(function(){
  $("#save_form").click(function(){

    var y = $("#year").val();
    var m = $("#pariod").val();
    $.get(`<?= base_url(); ?>data_master/check_period/${y}/${m}`, function(data) {
    }).done(function(data){
        console.log(data);
        var json = jQuery.parseJSON(data);
        if(json.status == false){
          swal({
                title: json.message,
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
              });
        }else{
          	
    $('#save_form').attr('class', 'btn btn-success disabled pull-right');
    $('#icon_save').attr('class', 'icon-spinner2 spinner');
    var formData = new FormData($("#form_trading")[0]); 
       

      $.ajax({
            url: '<?= base_url() ?>acc_active/edit_ar_receipt_trading',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

              try{
                 console.log(data);
                 var json = jQuery.parseJSON(data);
                 if(json.status == true){

                    swal({ 
                        title: "Success" ,
                        text: json.message,
                        type: "success" 
                    },
                    function(){
                        window.location.href = '<?= base_url() ?>ar/ar_trading_list';
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

        }
    });


  	
  });
});


</script>