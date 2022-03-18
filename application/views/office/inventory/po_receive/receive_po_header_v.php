<style type="text/css">
  selelct:required {
  box-shadow: 4px 4px 20px rgba(200, 0, 0, 0.85);

}
</style>
<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
				<!-- /page header -->
				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">

						<div class="panel-body">
							 <form name="savepost" id="savepost" method="post" action="<?php echo base_url(); ?>index.php/inventory_active/insert_po_receivenew">

							<div class="col-md-12 text-right">
							  <ul class="icons-list">
						      <li><button type="button" class="open btn btn-info" data-toggle="modal" data-target="#open"><i class="icon-file-plus"></i> Select</button></li>
						     </ul>
							</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>IC Date</label>
											<input type="date" class="form-control" readonly id="icdate" name="icdate" value="<?php echo date("Y-m-d");?>"/>
										</div>
									</div>
									<input type="hidden" name="flag" id="flag">
									<div class="col-md-3">
										<div class="form-group">
											<label>Project Code</label>
											<input type="hidden" class="form-control" id="projectid"  name="projectid">
											<input type="text" class="form-control" readonly id="projectcode"  name="projectcode">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Project Name</label>
											<input type="text" class="form-control" readonly id="projectname" name="projectname">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Doc No</label>
											<div class="form-group">
												<input type="text" class="form-control" readonly id="docno" name="docno">
												<input type="hidden" class="form-control" id="duedate" name="duedate">
											</div>
										</div>
									</div>
										<input type="hidden" class="form-control" id="docdate" name="docdate">
									<div class="col-md-3">
										<div class="form-group">
											<label>R/C No.</label>
											<div class="form-group">
												<input type="text" class="form-control" readonly id="rcno" readonly name="rcno">
											</div>
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label>PO No.</label>
											<div class="form-group">
												<input type="text" class="form-control" readonly id="pono" name="pono">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>System Type</label>
											<div class="form-group">
												<input type="text" class="form-control" readonly id="system" name="system">
												<input type="hidden" class="form-control" readonly id="systemcode" name="systemcode">
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Supplier Name</label>
											<input type="text" class="form-control" readonly id="suppliername" name="suppliername">
											<input type="hidden" class="form-control" readonly id="suppliercode"  name="suppliercode">
											<input type="hidden" class="form-control" id="supplierid"  name="supplierid">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Invoice No.</label>
											<div class="form-group">
												<input type="text" class="form-control" id="invco" name="invco">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Invoice Date</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="date" class="form-control" id="invdate" name="invdate">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>D/O No.</label>
											<div class="form-group">
												<input type="text" class="form-control" id="dono" name="dono">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">


											<label>D/O Date</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="date" class="form-control" id="dodate" name="dodate">
											</div>
										</div>
									</div>
								</div>
								<!--<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Remark.</label>
											<div class="form-group">
												<textarea class="form-control" id="remark" name="remark" rows="4"></textarea>
											</div>
										</div>
									</div>
								</div>-->
								<div id="loadrecv">
									<table class="table table-bordered table-striped table-xxs">
										<thead>
											<tr>
												<th>No.</th>
												<th>Material Code</th>
												<th>Material Name</th>
												<th>Warehouse</th>
												<th>QTY</th>
												<th>Unit Name</th>
												<th>Cost Code</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="7" class="text-center">Not Data</td>
											</tr>
										</tbody>
									</table>
								</div>
								
							</form>
						</div><!-- /panel-body rows and columns -->
						
						<div class="modal-footer">
							<div class="form-group">	
							<a type="button" href="<?php echo base_url(); ?>inventory/receive_po_header/<?php echo $id."/".$pjid; ?>" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>
								<button type="button" id="print" class="btn btn-info" disabled><i class=" icon-printer4"></i> Print</button>
								<button type="button" id="saveh" class="btn btn-success" disabled><i class="icon-floppy-disk"></i> Save</button>
								<a href="<?php echo base_url(); ?>inventory/openreceive/n" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
							</div>
						</div>

					</div><!-- /highlighting rows and columns -->
					
				</div><!-- /content area -->
				
</div>

      <!-- modal  modal open-->
 <div class="modal fade" id="open">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Open Ref P/O Receive</h4>
      </div>
        <div class="modal-body">
        	<div class="panel-body">
	            <div class="row" id="openporeceive">
	            <div class="container">
	            	<p></p>
	            	<div class="progress">
	            		<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
	            	</div>
	            </div>
	            </div>
            </div>
        </div>
        <div class="modal-footer">
        	<!-- <button class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button> -->
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script type="text/javascript">

	$(".open").click(function(){
		$(".open").hide();
		$("#openporeceive").load('<?php echo base_url() ?>inventory/load_receive_po/<?php echo $id; ?>');
	});

	  $('#inventory_receive').attr('class', 'active');
      $('#imp_sub3').attr('style', 'background-color:#dedbd8')
</script>

