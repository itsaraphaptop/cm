<style type="text/css">
.col-md-3.fixed {
    width:17.5%;
}
</style>
<script type="text/javascript">
	var project_id = 0;
</script>
<div class="content-wrapper">
	<div class="">
    	<div class="panel panel-flat">
	      	<div class="panel-heading">
	      		<div class="row">
	      			<!-- <div class="col-md-12"> -->
	      				<div class="col-md-2">
	      					<label>Progress Input</label>
	      				</div>
	      				<div class="col-md-10">
							<div class="progress">
								<div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 95%">
									<span class="sr-only">95% Complete (info)</span>
								</div>
							</div>
	      				</div>
	      			<!-- </div> -->
	      		</div>
	      		<div class="row">
	      			<h3>Project/Department Progress Payment</h3>
	      		</div>
	      		<div class="row form-group">
	      			<div class="col-md-5 form-group">
	      				<div class="col-md-2">
	      					<label>Project/Department</label>
	      				</div>
	      				<div class="col-md-10">
	      					<div class="input-group">
								<input type="text" id="name_pj" class="form-control" placeholder="Right spinner">
								<span id="project_all" class="input-group-addon" style="cursor:pointer" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-search"></i>
								</span>
							</div>
	      				</div>
	      			</div>
	      			<div class="col-md-7 form-group">
	      				<div class="col-md-4">
	      					<label>Refferenet Document. No:</label>
	      				</div>
	      				<div class="col-md-8">
							<input type="text" class="form-control" placeholder="Right spinner">
	      				</div>
	      			</div>
	      			<div class="col-md-5 form-group">
	      				<div class="col-md-2">
	      					<label>Deptor</label>
	      				</div>
	      				<div class="col-md-10">
	      					<div class="input-group">
								<input type="text" class="form-control" placeholder="Right spinner">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
							</div>
	      				</div>
	      			</div>
	      			<div class="col-md-7 form-group">
	      				<div class="col-md-4">
	      					<label>Refferenet Document. Date:</label>
	      				</div>
	      				<div class="col-md-8">
							<input type="text" class="form-control" placeholder="Right spinner">
	      				</div>
	      			</div>
      				<div class="col-md-4 form-group">
      					<div class="col-md-4">
      						<label>Payment Type</label>
      					</div>
      					<div class="col-md-8">
      						<select class="form-control">
      							<option>1</option>
      							<option>2</option>
      							<option>3</option>
      						</select>
      					</div>
      				</div>
      				<div class="col-md-4 form-group">
      					<div class="col-md-3">
      						<label>Period :</label>
      					</div>
      					<div class="col-md-8">
      						<input type="text" name="" class="form-control">
      					</div>
      				</div>
      				<div class="col-md-4 form-group">
      					<div class="col-md-4">
      						<label>Submit Amount</label>
      					</div>
      					<div class="col-md-8">
      						<input type="text" name="" class="form-control">
      					</div>
      				</div>
      				<div class="col-md-4">
      					<div class="col-md-4">
      						<label>System Type.</label>
      					</div>
      					<div class="col-md-8">
      						<select class="form-control">
      							<option>1</option>
      							<option>2</option>
      							<option>3</option>
      						</select>
      					</div>
      				</div>
      				<div class="col-md-2">
      					
      				</div>
      				<div class="col-md-6">
      					<div class="col-md-4">
      						<label>Submit Certificate Amount</label>
      					</div>
      					<div class="col-md-8">
      						<input type="text" name="" class="form-control">
      					</div>
      				</div>
	      		</div>
	      		<div class="row">
	                <div class="col-md-3 fixed"><button class="btn btn-success btn-block">Save</button></div>
	                <div class="col-md-3 fixed"><button class="btn btn-info btn-block">Edit</button></div>
	                <div class="col-md-3 fixed" style="width: 30%">
	                	<div class="col-md-4">Net Amount </div><div class="col-md-8">
	                		<input type="text" name="" class="form-control">
	                	</div>
	                </div>
	                <div class="col-md-3 fixed"><button class="btn btn-danger btn-block">Delete</button></div>
	                <div class="col-md-3 fixed"><button class="btn btn-warning btn-block">Cancel</button></div>
	      		</div>
	      	</div>
	      	<div class="panel-body">
				<div class="panel panel-flat">
					<div class="panel-body">
						<div class="tabbable">
							<ul class="nav nav-tabs nav-tabs-top">
								<li class="active"><a href="#import_boq" data-toggle="tab">Import BOQ</a></li>
								<li>
									<a id="system_type_h" href="#system_type" data-toggle="tab">System Type</a>
								</li>
								<li id="boq_h"><a href="#boq" data-toggle="tab">BOQ</a></li>
								<li><a href="#attach_file" id="attach_file_h" data-toggle="tab">Attach file</a></li>
								<li><a href="#letter" id="letter_h" data-toggle="tab">letter</a></li>
								<li><a href="#submit" id="submit_h" data-toggle="tab">submit</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane active" id="import_boq">
									<a id="import_boq_d" class="btn btn-info">
										Import BOQ
									</a>
								</div>

								<div class="tab-pane" id="system_type">
									<div id="system_d"></div>
								</div>

								<div class="tab-pane" id="boq">
									<div id="boq_d"></div>
								</div>

								<div class="tab-pane" id="attach_file">
									<div id="attach_file_d"></div>
								</div>
								<div class="tab-pane" id="letter">
									<div id="letter_d"></div>
								</div>								
								<div class="tab-pane" id="submit">
									<div id="submit_d"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
	      	</div>
    	</div>
  	</div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">โครงการ</h4>
      </div>
      <div class="modal-body">
        <div id="modal_project"></div>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
	$('#submit_h').click(function(event) {
		$('#submit_d').html('<h1>loadding....</h1>');
		$('#submit_d').load('<?php echo base_url();?>project_progress/tab_submit');
	});
	$('#letter_h').click(function(event) {
		$('#letter_d').html('<h1>loadding....</h1>');
		$('#letter_d').load('<?php echo base_url();?>project_progress/tab_letter');
	});

	$('#attach_file_h').click(function(event) {
		$('#attach_file_d').html('<h1>loadding....</h1>');
		$('#attach_file_d').load('<?php echo base_url();?>project_progress/tab_file_page/'+project_id);
	});

	$('#import_boq_d').click(function(event) {
		 window.location = '<?=base_url()?>bd/boq_openProject';
	});

	$('#system_type_h').click(function(event) {
		$('#system_d').load('<?php echo base_url();?>project_progress/system_type/'+project_id);
	});

	$('#project_all').click(function(event) {
		$('#modal_project').load('<?php echo base_url();?>share/project');
	});

	$('#boq_h').click(function(event) {
		$('#boq_d').load('<?php echo base_url();?>project_progress/boq/'+project_id);
	});

</script>


