<?php foreach ($getproj as $key => $value) {?>

<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
					<div class="panel panel-flat">
						<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Area<p></p></h6>
		 
		<!--  <?php echo $value->project_name; ?> <br>
		 Project : <?php echo $value->project_code; ?>  
 -->

							<div class="heading-elements">
								<a href="<?php echo base_url(); ?>inventory_area/area" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
			         <button type="button" class="btn bg-info" data-toggle="modal" data-target="#modal_theme_info<?php echo $value->project_id; ?>"><i class="icon-plus-circle2"></i> NEW</button>

		                	</div>
						</div>

						<div class="panel-body">
						<div class="table-responsive">
						<table class="table table-striped table-xxs table-hover datatable-basic">
							<thead>
								<tr>
									<th>Area code</th>
									<th>Area name</th>
									<th>Type code</th>
									<th>Position 1</th>
									<th>Position 2</th>
									<th>Position 3</th>
									<th>Position 4</th>
									<th>Position 5</th>
									<th>Position 6</th>
									<th>Position 7</th>
									<th>Position 8</th>
									<th>Position 9</th>
									<th>Position 10</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
						<?php foreach ($getproj1 as $key1 => $value1) {?>
								<tr>

									<td><?php echo $value1->area_code; ?> </td>
									<td><?php echo $value1->area_name; ?></td>
									<td><?php echo $value1->taye_code."-".$value1->type_name; ?></td>
									<td><?php echo $value1->position1; ?></td>
									<td><?php echo $value1->position2; ?></td>
									<td><?php echo $value1->position3; ?></td>
									<td><?php echo $value1->position4; ?></td>
									<td><?php echo $value1->position5; ?></td>
									<td><?php echo $value1->position6; ?></td>
									<td><?php echo $value1->position7; ?></td>
									<td><?php echo $value1->position8; ?></td>
									<td><?php echo $value1->position9; ?></td>
									<td><?php echo $value1->position10; ?></td>
									
									<td><ul class="icons-list">
<li type="button" data-toggle="modal" data-target="#modal_theme_info1<?php echo $value1->area_code;?>"><a href="#"><i class="icon-pencil7"></i></a></li>
<li ><a href="<?php echo base_url(); ?>index.php/inventory_area/del/<?php echo $value1->id;?>/<?php echo $value1->project_id;?>"><i class="icon-trash"></i></a></li>
												
											</ul>
											</td>
										
								
				
									
								</tr>
									<?php } ?>
							</tbody>
						</table>
						</div>
						</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					<!-- /basic datatable -->


<div id="modal_theme_info<?php echo $value->project_id; ?>" class="modal fade" >
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-primary">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h2 class="modal-title">Add Area</h2>
								</div>
	<form action="<?php echo base_url(); ?>index.php/inventory_area/inspj" method="post">
									<div class="modal-body">
										<div class="form-group">
											<div class="row">
											<div class="form-group col-lg-12">
												<div class="col-sm-5">
													<label class="control-label">Project Code :</label>
											<input type="text" class="form-control" readonly="" value="<?php echo $value->project_code; ?>">
												</div>

												<div class="form-group col-lg-7">
										<label class="control-label">Project Name </label>
											<input type="text" class="form-control" readonly="" value="<?php echo $value->project_name; ?>" >
											<input type="hidden" class="form-control" name="project_id" value="<?php echo $value->project_id; ?>">
										</div>
										<div class="form-group col-lg-5">
										<label class="control-label">Area Code : </label>
											<input type="text" class="form-control" name="area_code">
										</div>
											<div class="form-group col-lg-7">
										<label class="control-label">Area Name : </label>					
											<input type="text" class="form-control" name="area_name">
										</div>

										<div class="form-group col-lg-5">
											<label class="control-label">Type Code : </label>	
											<div class="input-group">
												<input type="text" readonly="" class="form-control" id="taye_code" name="taye_code">
												<div class="input-group-btn">
													<button type="button" data-toggle="modal" data-target="#opentype" class="opentype btn btn-info"><i class="icon-search4"></i></button>
												</div>
											</div>
										</div>
										<div class="form-group col-lg-7">
											<label class="control-label">Type Name: </label>	
												<input type="text" class="form-control" readonly id="taye_name" name="taye_name">
										</div>				
									</div>
										<div class="form-group col-lg-12">
										<hr>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 1 : </label>
											<input type="text" class="form-control" name="position1">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 2 : </label>
											<input type="text" class="form-control" name="position2">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 3 : </label>
											<input type="text" class="form-control" name="position3">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 4 : </label>
											<input type="text" class="form-control" name="position4">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 5 : </label>
											<input type="text" class="form-control" name="position5">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 6 : </label>
											<input type="text" class="form-control" name="position6">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 7 : </label>
											<input type="text" class="form-control" name="position7">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 8 : </label>
											<input type="text" class="form-control" name="position8">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 9 : </label>
											<input type="text" class="form-control" name="position9">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 10 : </label>
											<input type="text" class="form-control" name="position10"> 
										</div>
													
													
									
								</div>

											</div>
										</div>
									</div>

								<div class="modal-footer form-group">
								<div class="form-group col-lg-12">
								<hr>

									<button type="submit"  class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
									
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>





<?php foreach ($getproj1 as $key1 => $value1) {?>

<div id="modal_theme_info1<?php echo $value1->area_code; ?>" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-primary">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h2 class="modal-title">Edit Area</h2>
								</div>
	<form action="<?php echo base_url(); ?>index.php/inventory_area/udpj/<?php echo $value1->area_code; ?>" method="post" id="insert">
									<div class="modal-body">
										<div class="form-group">
											<div class="row">
											<div class="form-group col-lg-12">
												<div class="col-sm-5">
													<label class="control-label">Project Code :</label>
								<input type="text" readonly=""  class="form-control" value="<?php echo $value->project_code; ?>">
												</div>
									<div class="form-group col-lg-7">
										<label class="control-label">Project Name </label>
											<input type="text" readonly="" class="form-control" value="<?php echo $value->project_name;?>" >
											<input type="hidden" class="form-control" name="project_id" value="<?php echo $value->project_id; ?>">
										</div>
										<div class="form-group col-lg-5">
										<label class="control-label">Area Code : </label>
											<input type="text" readonly="" class="form-control" name="area_code" value="<?php echo $value1->area_code; ?>">
										</div>
											<div class="form-group col-lg-7">
										<label class="control-label">Area Name : </label>					
					<input type="text" class="form-control" name="area_name" value="<?php echo $value1->area_name; ?>">
										</div>

						<div class="form-group col-lg-5">
											<label class="control-label">Type Code: </label>	
											<div class="input-group">
												<input type="text" readonly="" class="form-control" id="taye_code" name="taye_code" value="<?php echo $value1->taye_code; ?>">
												<div class="input-group-btn">
													<button type="button" data-toggle="modal" data-target="#opentype" class="opentype btn btn-info"><i class="icon-search4"></i></button>
												</div>
											</div>
										</div>
										<div class="form-group col-lg-7">
											<label class="control-label">Type Name: </label>	
												<input type="text" class="form-control" readonly id="taye_name" name="taye_name" value="<?php echo $value1->type_name; ?>">
										</div>	
									</div>
										<div class="form-group col-lg-12">
										<hr>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 1 : </label>
											<input type="text" class="form-control" name="position1" value="<?php echo $value1->position1; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 2 : </label>
											<input type="text" class="form-control" name="position2" value="<?php echo $value1->position2; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 3 : </label>
											<input type="text" class="form-control" name="position3" value="<?php echo $value1->position3; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 4 : </label>
											<input type="text" class="form-control" name="position4" value="<?php echo $value1->position4; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 5 : </label>
											<input type="text" class="form-control" name="position5" value="<?php echo $value1->position5; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 6 : </label>
											<input type="text" class="form-control" name="position6" value="<?php echo $value1->position6; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 7 : </label>
											<input type="text" class="form-control" name="position7" value="<?php echo $value1->position7; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 8 : </label>
											<input type="text" class="form-control" name="position8" value="<?php echo $value1->position8; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 9 : </label>
											<input type="text" class="form-control" name="position9" value="<?php echo $value1->position9; ?>">
										</div>
										<div class="form-group col-lg-6">
											<label class="control-label">Position 10 : </label>
											<input type="text" class="form-control" name="position10" value="<?php echo $value1->position10; ?>"> 
										</div>
													
													
									
								</div>

											</div>
										</div>
									</div>

								<div class="modal-footer form-group">
								<div class="form-group col-lg-12">
								<hr>
									<button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
									<button data-dismiss="modal" class="btn btn-danger"><i class="icon-close2"></i> Close</button>
									
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
<?php } ?>
<?php } ?>

<!-- modal  -->
 <div class="modal fade" id="opentype" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> OPEN TYPE </h4>
      </div>
        <div class="modal-body">
        <div id="modal_load">
	        	
	        </div>
	        <div class="panel-body">
	        
	        </div>
	        <div class="modal-footer">
	        <!-- <button data-dismiss="modal" class="btn btn-danger"><i class="icon-close2"></i> Close</button> -->
	        </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
	$(".opentype").click(function(){
		$("#modal_load").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$("#modal_load").load('<?php echo base_url(); ?>share/modal_ic_type_area/<?php echo $pid; ?>');
	});
	$('#mic').attr('class', 'active');
$('#mic3').attr('style', 'background-color:#dedbd8');
</script>