
<!-- Main content --> 
<?php $pjwh = $this->uri->segment(3) ; ?>
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>

							
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr"></a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">

					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
						  <?php foreach ($getproj as $key => $value) {?>
							<h5 class="panel-title">Document Issue By Warehouse Report For Project <?php echo $value->project_name; ?></h5>
							<?php } ?>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
<form  action="<?php echo base_url(); ?>inventory_export/excel_f" method="post">
	<!-- <form  action="<?php echo base_url(); ?>inventory/receive_table_stockcard_use/" method="post"> -->
							<!-- <div class="category-content text-center">
										<div id="reportrange" class="daterange-custom">
											<div class="daterange-custom-display"></div>
										</div>
									</div> -->

							<div class="row">
								<div class="form-group">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-lg-3 control-label">Start:</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="date" class="form-control pickadate-selectors" id="startdate" name="startdate" value="<?php echo date("Y-m-d") ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-lg-3 control-label">End:</label>
										<div class="col-lg-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="date" class="form-control pickadate-selectors" id="enddate" name="enddate" value="<?php echo date("Y-m-d") ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<!-- <button type="submit" name="button" id="find" class="btn btn-info"><i class="icon-search4"></i> Search</button> -->
									<a id="btntable" class="btn btn-info"><i class="icon-search4"></i> Search</a>
									
								</div>
							</div>
							</div>
							<br>
							<div class="row">
							<div class="form-group">
								<div class="col-md-6">
									
										<label class="col-lg-3 control-label">Condition :</label>
										<div class="col-lg-9">
											 <select id="material" class="select-border-color border-warning" name="material" >
												<option value="1" selected="selected">All</option>
												<option value="1" >Document No.</option>
												<option value="2" >Reference By.</option>
												<!-- <option value="3" >Date</option> -->
												<!-- <option value="4" >Reference By</option> -->
												<option value="5" >ITEM CODE</option>
												<!-- <option value="6" >Area Code</option> -->
												<!-- <option value="7" >Warehouse</option> -->
											</select>
									</div>
								</div>
								
								
								<div class="col-md-6">
									
							<label class="col-lg-3 control-label">Condition :</label>
							<div class="col-lg-9">
						<input type="text" class="form-control" id="context" name="context" value="">
									</div>
								</div>
								</div>
              
              				</div>
              <br>

              <div class="row">
              	<div class="col-md-6">
									<div class="form-group">
										<label class="col-lg-3 control-label">Project :</label>
										<div class="col-lg-9">
														<?php foreach ($getproj as $value) {?>
														<input type="text" readonly  class="form-control" value="<?php echo $value->project_name; ?>">
														<input type="hidden" class="form-control" id="project_code" name="project_code" value="<?php echo $value->project_id; ?>">
														
													<?php	} ?>

												
										</div>
									</div>
								</div>
              </div>
              <div class="row">							
				<br><br>	

							<hr>
							<div id="loadtable">
		              <div class="dataTables_wrapper no-footer">
		  						<div class="table-responsive">
									<table class="table table-striped table-bordered table-xxs">
									<thead>
										<tr>
										<th class="text-center">IC Date</th>
										<th class="text-center">Doc. No</th>
									    <th  class="text-center">Entry No.</th>
									    <th  class="text-center">Date</th>
									    <th  class="text-center">Referemce By</th>
									    <th  class="text-center">Material</th>
									    <th  class="text-center">Qty Issue</th>
									    <th  class="text-center">Qty Return</th>
									    <th  class="text-center">Qty Balance</th>
									    <th  class="text-center">Unit</th>
									    <th  class="text-center">Area</th>
									    <th  class="text-center">Code/Name</th>
									    <th  class="text-center">Qty(Cost)</th>
									    <th  class="text-center">Cost/Unit</th>
									    <th  class="text-center">Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="16" class="text-center">No data available in table</td>
										</tr>
									</tbody>
								</table>
								</div>
		          </div>
						</div>
					</div>
				</form>
          </div>
					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
			<script>
			  $('.datatable-basic').DataTable();
			</script>
			<!-- modal  โครงการ-->
			 <div class="modal fade" id="openproj" data-backdrop="false">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
			      </div>
			        <div class="modal-body">
			        <div class="panel-body">
			            <div class="row" id="modal_project">

			            </div>
			            </div>
			        </div>
			    </div>
			  </div>
			</div> <!--end modal -->

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script>
	$('#btntable').click(function() {
		var material = $('#material').val();
		var stdate = $('#startdate').val();
		var eddate = $('#enddate').val();
		var context = $('#context').val();
		var pjwh = $('#project_code').val();
		

		if ($('#material').val()!="" && $('#context').val()!="") {
			var context = $('#context').val();
			var material = $('#material').val();

			
		}else if($('#material').val()!="" && $('#context').val()==""  ){
			var context = "0";
			var material = $('#material').val();
			
		}
		if ($("#chki").val()=="fifo") {
			$('#loadtable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	    	$("#loadtable").load('<?php echo base_url(); ?>stock_issue/IssueWHAmt/'+material+'/'+stdate+'/'+eddate);
    	}else{
    		$('#loadtable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    		$("#loadtable").load('<?php echo base_url(); ?>stock_issue/IssueWHAmt/'+material+'/'+stdate+'/'+eddate+'/'+context+'/'+pjwh);
    	}
	});
		$(".openproj").click(function(){
			$('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
		});


// Initialize multiple switches
if (Array.prototype.forEach) {
   var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
   elems.forEach(function(html) {
       var switchery = new Switchery(html);
   });
}
else {
   var elems = document.querySelectorAll('.switchery');
   for (var i = 0; i < elems.length; i++) {
       var switchery = new Switchery(elems[i]);
   }
}
      $("#a").click(function(){
        if ($("#a").prop("checked")) {
            $("#chki").val("avg");
        }else{
            $("#chki").val("fifo");
        }

      });
</script>
