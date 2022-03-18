
<!-- Main content --> 
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
							<h5 class="panel-title">Report Stock  Project - <?php echo $project; ?></h5>
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
									<button onClick="window.print()"  id="print" class="btn btn-info"><i class="icon-printer2"></i> Print</button>


									<input type="submit" class="btn btn-info" name="btn_export" id="btn_export" value="ออกรายงาน">
								</div>
							</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-lg-3 control-label">Material :</label>
										<div class="col-lg-9">
											 <select id="material" class="select-border-color border-warning" name="material" >
												<option value="" selected="selected"></option>
												<?php foreach ($allmaterial as $key => $vali) {?>
													<option value="<?php echo $vali->stock_matcode; ?>"><?php echo $vali->stock_matcode; ?> - <?php echo $vali->stock_matname; ?></option>
												<?php } ?>
											</select>
									</div>
								</div>
								</div>
                <div class="col-md-6">
									<div class="form-group">
										<label class="col-lg-3 control-label">To Material :</label>
										<div class="col-lg-9">
											 <select id="materialend" class="select-border-color border-warning" name="materialend" >
												<option value="" selected="selected"></option>
												<?php foreach ($allmaterial as $key => $vali) {?>
													<option value="<?php echo $vali->stock_matcode; ?>"><?php echo $vali->stock_matcode; ?> - <?php echo $vali->stock_matname; ?></option>
												<?php } ?>
											</select> 
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
									<!-- 		<div class="input-group">
												<input type="hidden" class="form-control" placeholder="" id="project_code" name="project_code">
												<input type="text" class="form-control" placeholder="" readonly id="projectname" name="projectname">
												<div class="input-group-btn">
													<button type="button" class="openproj btn btn-default btn-icon" data-toggle="modal" data-target="#openproj"><i class="icon-search4"></i></button>
												</div>
											</div> -->
											
											
														<?php foreach ($getproj as $value) {?>
														<input type="text" readonly  class="form-control" value="<?php echo $value->project_name; ?>">
														<input type="hidden" class="form-control" id="project_code" name="project_code" value="<?php echo $value->project_id; ?>">
														
													<?php	} ?>

												
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<!-- <div class="checkbox checkbox-switchery switchery-xs">
									FIFO
							             <label>
							                <input type="checkbox"  id="a"  class="switchery"> -->
							                <input type="hidden" name="chki" id="chki" value="<?php echo $ic_type; ?>">
							              <!-- </label>
							        AVERRAGE
							            </div> -->
									</div>
							</div>
							<hr>
							<div id="loadtable">
		              <div class="dataTables_wrapper no-footer">
		  						<div class="table-responsive">
									<table class="table table-striped table-bordered table-xxs">
									<thead>
										<tr>
											<th class="text-center">IN/OUT</th>
											<th class="text-center">Project</th>
									    <th  class="text-center">Stock Date</th>
									    <th  class="text-center">Material Code</th>
									    <th  class="text-center">Material Name</th>
									    <th  class="text-center">qty</th>
									    <th  class="text-center">Unit/Price</th>
									    <th  class="text-center">Discount(%)</th>
									    <th  class="text-center">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="9" class="text-center">No data available in table</td>
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
		var pjcode = $('#project_code').val();

		if ($('#materialend').val()=="" && $('#material').val()=="") {
			var materialend = "0";
			var material = "0";
			
		}else if($('#materialend').val()!="" && $('#material').val()!="" ){
			var materialend = $('#materialend').val();
			var material = $('#material').val();
			
		}else if($('#materialend').val()=="" && $('#material').val()!=""){
			var materialend = "0";
			var material = $('#material').val();
			
		}else{
			var materialend = $('#materialend').val();
			var material = "0";
			
		}

		if ($("#chki").val()=="fifo") {
			$('#loadtable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
	    	$("#loadtable").load('<?php echo base_url(); ?>get_fifo/fifo/'+material+'/'+materialend+'/'+pjcode+'/'+stdate+'/'+eddate);
    	}else{
    		$('#loadtable').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    		$("#loadtable").load('<?php echo base_url(); ?>get_fifo/averrage/'+material+'/'+materialend+'/'+pjcode+'/'+stdate+'/'+eddate);
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
