			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Home - Approve Project Budget</span></h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="<?php echo base_url(); ?>bd/bd_tender">Approve Project Budget</a></li>
					</div>
				</div>

				<form action="<?php echo base_url(); ?>index.php/bd_active/bd_pjtender" method="post">
				<div class="content">
				<div class="panel panel-flat">
						<div class="panel-heading">
						

                  <div class="row">
                  	<div class="col-md-1">
                    <div class="form-group">
                    <label class="control-label">Project Name :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                  <div class="col-md-3">
                  <label class="control-label">&nbsp;</label>
                    <div class="input-group">
                    
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    <span class="input-group-btn">
                      <button type="button" data-toggle="modal" data-target="#asset" class="asset btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Ref. Code</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Start</label>
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                        
                  </div>

                    <div class="row">
                  	   	<div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Total Budget :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">BOQ :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Ref. Code :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Cost Saving :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                    <div class="col-md-1">
                    <div class="form-group">
                    <label class="control-label">Approve :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="" value="NO">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <br>
                    <label class="control-label">
                      <input type="checkbox" name="bd_type" id="bd_type1"   onclick="return false;">
                      Control BOQ
                    </label>

             
                    
                  </div>
                  </div>

                 
                  </div>

                  <div class="row">
                  	<div class="col-md-2">
                  	<label class="control-label">Revise</label>
                    <div class="input-group">
                    <span class="input-group-btn">
                     <a type="button" id="Revise" class="btn btn-info btn-xs">Revise</a>
                    </span>
                   
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Description :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Forecast Budget :</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>

                  </div>

                  <div class="row">
                  	 <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Start Date :</label>
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" >
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname">
                    
                  </div>
                  </div>

                  <div class="col-md-1">
                    <div class="form-group">
                    <label class="control-label">Month</label>
                    <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>
					

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Project Worktype :</label>
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>


                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Progress :</label>
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                    
                  </div>
                  </div>
					

                  </div>


						</div>
						</div>
							<div class="panel panel-flat">
								
								<div class="panel-body">
								<div class="text-right">
                          <a href="#" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                          <!-- <a  id="addtorow"  class="btn btn-default"><i class="icon-stackoverflow"></i> ADD Rows</a> -->
                          <button type="submit" class="preload btn btn-info"><i class="icon-floppy-disk position-left"></i> Save </button>
                          <a href="" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                        </div>
								</div>

							</div>
							<div class="panel panel-flat">
								
								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-top top-divided">
											<li class="active"><a href="#top-divided-tab1" data-toggle="tab"><i class="icon-file-text"></i> 1 Budget Cost</a></li>
											<li><a href="#top-divided-tab2" data-toggle="tab"><i class="icon-lifebuoy"></i> 2 Cost Code</a></li>
											<li><a href="#top-divided-tab3" data-toggle="tab"><i class="icon-compass4"></i> 3 Cost Code Summary</a></li>
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="top-divided-tab1">
							<div class="table-responsive">
							<table class="table table-bordered table-framed">
								<thead>
									<tr>
									
										<th class="text-center">G-code</th>
										<th class="text-center">Sub-Code</th>
										<th class="text-center">Description</th>
										<th class="text-center">General</th>
										<th class="text-center">Material(M)</th>
										<th class="text-center">LABOUR(L)</th>
										<th class="text-center">SUBcontractor(S)</th>
										<th class="text-center">Total(1)</th>
										<th class="text-center">BOQ(2)</th>
										<th class="text-center">COST-SAVING (2) - (1)</th>
										<th class="text-center">Payment Submit</th>
										<th class="text-center">Payment Certificete</th>
										<th class="text-center">Payment Bal.Submit</th>

									</tr>
								</thead>
								<tbody>
								</tbody>
								<tr>
									<td colspan="3" class="text-center">Total</td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td colspan="3"></td>
								</tr>
								</table></div>
											</div>

											<div class="tab-pane" id="top-divided-tab2">
											<div class="table-responsive">
												<table class="table table-bordered table-framed">
								<thead>
									<tr>
									
										<th class="text-center">No</th>
										<th class="text-center">Contorl</th>
										<th class="text-center">Cost Code</th>
										<th class="text-center">Cost Name</th>
										<th class="text-center">BOQ</th>
										<th class="text-center">Budget</th>
										<th class="text-center">By</th>
										<th class="text-center">Modify Date</th>
										

									</tr>
								</thead>
								<tbody>
								</tbody>
								<tr>
									<td colspan="4" class="text-center">Total</td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td colspan="2"></td>
									
								</table>
											</div>
											</div>

											<div class="tab-pane" id="top-divided-tab3">
											<div class="table-responsive">
												<table class="table table-bordered table-framed">
								<thead>
									<tr>
									
										<th class="text-center">No</th>
										<th class="text-center">Control</th>
										<th class="text-center">% Control</th>
										<th class="text-center">Cost Code</th>
										<th class="text-center">Cost Name</th>
										<th class="text-center">Material</th>
										<th class="text-center">Labour</th>
										<th class="text-center">Subconstractor</th>
										<th class="text-center">Overhead</th>
										<th class="text-center">Total Budget Cost</th>
										<th class="text-center">This Budget Control</th>
										<th class="text-center">Contract Cost</th>
										<th class="text-center">Total PU Cost(Use)</th>
										<th class="text-center">PU - Meterial</th>
										<th class="text-center">PU - Labour</th>
										<th class="text-center">PU - Overhead</th>
										<th class="text-center">Budget Control Bal.</th>
										<th class="text-center">Forecast Budget</th>
										<th class="text-center">By</th>
										<th class="text-center">Modify Date</th>
										<th class="text-center"></th>
										<th class="text-center">Controlper By</th>
										<th class="text-center">Control Date</th>


									</tr>
								</thead>
								<tbody>
								</tbody>


								<tr>
									<td colspan="5" class="text-center">Total</td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td class="text-center"><input type="text" class="form-control input-sm" id="" name="" readonly=""></td>
									<td colspan="5" class="text-center"></td>

								</tr>
							
								</table>
								

								</div></div>

											
										</div>
									</div>
								</div>
							</div>


						</div>

		
				
				
						</form>