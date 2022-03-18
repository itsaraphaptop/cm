<div class="content-wrapper">
	<div class="page-header">
		<div class="content">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<h5 class="panel-title">บันทึกตัดลูกหนี้อื่นๆ (Clear A/R Other)</h5>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<a class="btn btn-primary btn-xs pull-right" id="select_rv"> <i class="icon-file-plus"></i> Select</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<form id="clear_form">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Voucher No :</label>
							<input type="text" class="form-control" name="v_no" id="v_no">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Voucher Date :</label>
							<input type="date" class="form-control" name="v_date" id="v_date">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Year :</label>
							<input type="text" class="form-control" name="year" id="year" value="<?= date('Y') ?>">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Period :</label>
							<input type="text" class="form-control" name="Period" id="Period" value="<?= date('m') ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Receipt No :</label>
							<input type="text" class="form-control" name="rv_no" id="rv_no" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Receipt Date :</label>
							<input type="date" class="form-control" name="rv_date" id="rv_date" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Project Code :</label>
							<input type="text" class="form-control" name="project_code" id="project_code" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Project Name :</label>
							<input type="text" class="form-control" name="project_name" id="project_name" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Customer Code :</label>
							<input type="text" class="form-control" name="customer_code" id="customer_code" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Customer Name :</label>
							<input type="text" class="form-control" name="customer_name" id="customer_name" readonly="true">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Receipt Net Amount :</label>
							<input type="text" class="form-control" name="rcpt_net_amt" id="rcpt_net_amt" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Currency :</label>
							<input type="text" class="form-control" name="currency" id="currency" readonly="true">
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
							<label class="display-block">Paid Net Amount :</label>
							<input type="text" class="form-control" name="paid_net_amt" id="paid_net_amt" readonly="true">
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="form-group">
							<label class="display-block">Less Other :</label>
							<input type="text" class="form-control" name="less_other" id="less_other" readonly="true">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<input type="text" class="form-control" name="to_bank" id="to_bank" readonly="true">
						</div>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
						<div class="form-group">
							<input type="text" class="form-control" name="ac_code" id="ac_code" readonly="true">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label class="display-block">Remark :</label>
							<textarea class="form-control" name="remark"></textarea>
						</div>
					</div>
				</div>
				<div class="row" style="padding-bottom:20px;">
					 <a type="button" class="btn btn-success" id="save_clear"><i class="icon-floppy-disk"></i> Save</a>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table class="table table-bordered table-xs" width="200%">
							<thead>
								<tr>
									<th>#</th>
									<!-- <th class="text-center"><div style="width:200px;"></div>System</th> -->
									<th class="text-center"><div style="width:80px;"></div>A/C</th>
									<th class="text-center"><div style="width:150px;"></div>A/C NAME</th>
									<th class="text-center"><div style="width:100px;"></div>Cost Code</th>
									<th class="text-center"><div style="width:150px;"></div>Debit</th>
									<th class="text-center"><div style="width:150px;"></div>Credit</th>
								</tr>
							</thead>
							<tbody id="rv_tr">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="rv_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" id="content"></div>
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

<script type="text/javascript">
	$('#select_rv').click(function(event) {
		$('.modal-title').html('Select Receipt');
		$('#content').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $('#content').load('<?php echo base_url(); ?>ar/get_modal_rv');
		$('#rv_Modal').modal('show');
	});

$(function(){
  $("#save_clear").click(function(){

       var formData = new FormData($("#clear_form")[0]); 
       

      $.ajax({
            url: '<?= base_url() ?>acc_active/ar_clear',
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
                        window.location.href = '<?= base_url() ?>ar/ar_other_clear';
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