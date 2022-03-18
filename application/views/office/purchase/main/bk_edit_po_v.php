<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li>New PO</li>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<form method="post" action="<?php echo base_url(); ?>purchase_active/editpo">
				<div class="content">
					<div class="row">
						<div class="panel panel-flat border-top-lg border-top-success">
							<div class="panel-heading ">
								<h5 class="panel-title">Purchase Order System</h5>
								<div class="heading-elements">
									<ul class="icons-list">
										<!-- <li<a class="openpr btn btn-info btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> àÅ×Í¡ãº¢Í«×éÍ</a></li> -->
										<!-- <li><a data-action="reload"></a></li>
										<li><a data-action="close"></a></li> -->
									</ul>
								</div>
							</div>
<?php foreach ($res as $key => $v) {
	$poid = $v->po_id;
	$pono = $v->po_pono;
	$prreqname = $v->po_prname;
	$prmemid = $v->po_memid;
	$podate = $v->po_podate;
	$prno = $v->po_prno;
	$projid = $v->po_project;
	$dpid = $v->po_department;
	$system = $v->po_system;
	$venname = $v->po_vender;
	$venid = $v->po_venderid;
	$qprojname = $this->db->query("select project_name from project where project_id='$v->po_project'");
	$qpres = $qprojname->result();
	foreach ($qpres as $pe) {
		$projectname = $pe->project_name;
	}
	$qpdp = $this->db->query("select department_title from department where department_id='$v->po_department'");
	$qdpres = $qpdp->result();
	foreach ($qdpres as $de) {
			$departname = $de->department_title;
	}
	$term = $v->po_trem;
	$contact = $v->po_contact;
	$contactno = $v->po_contactno;
	$quono = $v->po_quono;
	$delidate = $v->po_deliverydate;
	$place = $v->po_place;
	$remark = $v->po_remark;
} ?>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3">
                    <div class="form-group">
                      <label class="display-block text-semibold" data-i18n="nav.posystem.pono" data-i18n-target="span"><span>&nbsp;</span></label>
                      <input type="text" name="pono" id="pono" class="ppono form-control" placeholder="PO No." readonly="true" value="<?php echo $pono; ?>">
                    </div>
                  </div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="display-block text-semibold">PR Requsition:</label>
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
											</span>
											<input type="text" class="form-control" readonly value="<?php echo $prreqname; ?>"  name="memname" id="memname" >
											<input type="hidden" name="memid" id="memid" value="<?php echo $prmemid; ?>">
											<div class="input-group-btn">
											<button type="button" class="openemp btn btn-default btn-icon" data-toggle="modal" data-target="#open"><i class="icon-search4"></i></button>
											</div>
										</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label data-i18n="nav.posystem.podate" data-i18n-target="span"><span></span></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control daterange-single" id="pcdate" name="pcdate" value="<?php echo $podate; ?>">
											</div>
										</div>
									</div>
									<div class="col-md-3">
					          <div class="form-group">
					            <label for="prno">PR No.</label>
					            <input type="text" name="prno" id="prno"  class="form-control input-sm" value="<?php echo $prno; ?>">
					          </div>
					        </div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
										 <label class="display-block text-semibold">Project:</label>
										 <div class="input-group">
											 <span class="input-group-btn">
												 <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
											 </span>
											 	<input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php if($projid==""){echo "";}else{ echo $projectname;} ?>" name="projectname" id="projectname">
												<input type="hidden" readonly="true" value="<?php echo $projid; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
											 <div class="input-group-btn">
												 <!-- <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
											 </div>
									 	</div>
									 </div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="display-block text-semibold">Department:</label>
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
											</span>
											<input type="text" class="form-control" readonly="readonly" placeholder="Department" value="<?php if($dpid==""){echo "";}else{echo $departname;} ?>"  name="depname" id="depname" >
											<input type="hidden" readonly="true" value="<?php echo $dpid; ?>" class="form-control input-sm input-sm" name="depid" id="depid">
											<div class="input-group-btn">
												<!-- <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
												</ul>
											</div>
										</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="code">System</label>
											<select class="form-control" name="system" id="system">
												<?php foreach ($item as $key => $value) {
                                    $q = $this->db->query("select * from system where systemcode='$value->projectd_job'")->result();
                                    foreach ($q as $key => $v) {  ?>
                                  <option value="<?php echo $value->projectd_job; ?>"><?php echo $v->systemname; ?></option>
                                <?php } } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="display-block text-semibold">Vender:</label>
											<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
											</span>
											<input type="text" class="form-control" readonly   name="vender" id="vender" value="<?php echo  $venname; ?>">
											<input type="hidden" name="venderid" id="venderid" value="<?php echo $venid; ?>">
											<div class="input-group-btn">
											<a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
											</div>
										</div>
										</div>
									</div>
									<div class="col-md-1">
										<label>VAT:</label>
									        <div class="input-group">
									          <input type="text" class="form-control text-center" id="vatper" name="vatper[]" placeholder="7%" value="7">
									          <span class="input-group-addon">%</span>
									        </div>
									</div>
									<div class="col-md-3">
					          <div class="form-group">
					            <label for="team">Credit term</label>
					            <input type="text" required="" name="team"  id="team" class="form-control" value="<?php echo $term; ?>">
					          </div>
					        </div>
									<div class="col-md-3">
				            <div class="form-group">
				              <label for="contact">Tel.</label>
				              <input type="text" name="contact" id="tel" class="form-control" value="<?php echo $contact; ?>">
				            </div>
				          </div>
								</div>
								<div class="row">
									<div class="col-md-3">
				            <div class="form-group">
				              <label for="contactno">Contact No.</label>
				              <input type="text" name="contactno" id="contactno"  class="form-control" value="<?php echo $contactno; ?>">
				            </div>
				        	</div>
									<div class="col-md-3">
					          <div class="form-group">
					            <label for="quono">Quotation No.</label>
					            <input type="text" name="quono" id="quono"  class="form-control" value="<?php echo $quono; ?>">
					          </div>
					        </div>
									<div class="col-md-3">
										<label for="deliverydate">Due Date.</label>
					          <div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar22"></i></span>
					            <input type="text" name="deliverydate" class="form-control daterange-single" id="deliverydate" value="<?php echo $delidate; ?>">
					          </div>
					        </div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Place Deliverry</label>
											<textarea name="place" class="form-control" rows="4" cols="40"><?php echo $place; ?></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Additional message</label>
											<textarea name="remark" class="form-control" rows="4" cols="40"><?php echo $remark; ?></textarea>
										</div>
									</div>
								</div>
								<!--  -->
								<div class="table-responsive">
								<style type="text/css">
									.tablew {
  width: 150%;
  max-width: 500%;
}
								</style>
								<!-- <div class="row" id="table" > -->
									<table class="tablew table-hover table-bordered table-striped table-xxs">
										<thead>
											<tr>
												<th>No.</th>
												<th class="text-center" style="width: 300px;">Select</th>
												<th>Material Code</th>
												<th class="text-center">Material Name</th>
												<th class="text-center">Cost Code</th>
												<th>Qty</th>
												<th>Unit</th>
												<th>Price/Unit</th>
												<th>Amount</th>
												<th>Disc.1(%)</th>
						                        <th>Disc.2(%)</th>
						                        <th>Disc.3(%)</th>
						                        <th>Disc.4(%)</th>
						                        <th>Disc.Amt</th>
						                        <th>Total Disc</th>
						                        <th>Total Vat</th>
						                        <th>Total</th>
						                        <th>Action</th>
											</tr>
										</thead>
										<tbody id="body">
										<?php $n=1; 
										$totamtunit=0;
										$totdi1=0;
										$totdi2=0;
										$totdi3=0;
										$totdi4=0;
										$totdisc=0; 
										$totamt=0; 
										$totvat=0; 
										$totdi=0; 
										foreach ($poi as $p) {?>
											<tr>
												<td><?php echo $n;?></td>
												<?php if($p->poi_chk!=""){ ?>
												<td width="3%" class="text-center">
													 <div class="checkbox checkbox-switchery switchery-xs">
										            <label>
										                <input type="checkbox" checked="checked" id="a<?php echo $n; ?>"  class="switchery">
										                <input type="hidden" name="chki[]" id="chki<?php echo $n;?>" value="Y">
																		<input type="hidden" id="poiidi<?php echo $n;?>" name="poiidi[]" value="<?php echo $p->poi_id; ?>">
										              </label>
										            </div>
												</td>
												<?php }else{?>
												<td width="3%" class="text-center">
													 <div class="checkbox checkbox-switchery switchery-xs">
										            <label>
										                <input type="checkbox" id="a<?php echo $n; ?>"  class="switchery">
										                <input type="hidden" name="chki[]" id="chki<?php echo $n;?>" value="Y">
																		<input type="hidden" name="poiidi[]" value="<?php echo $p->poi_id; ?>">
										              </label>
										            </div>
												</td>
												<?php }?>
												<td id="smatcode<?php echo $n; ?>"><?php echo $p->poi_matcode; ?>

												</td>
												<td id="smatname<?php echo $n; ?>"  style="width: 500px;"><?php echo $p->poi_matname; ?>

												</td>
												<td id="scostname<?php echo $n; ?>"><?php echo $p->poi_costcode; ?>
													<input type="hidden" name="costnamei[]" value="<?php echo $p->poi_costname; ?>">
													<input type="hidden" name="codtcodei[]" value="<?php echo $p->poi_costcode; ?>">
												</td>
												<td id="sqtyi<?php echo $n; ?>"><?php echo number_format($p->poi_qty); ?>
													<input type="hidden" name="qtyi[]" value="<?php echo $p->poi_qty; ?>">
												</td>
												<td id="sunit<?php echo $n; ?>"><?php echo $p->poi_unit; ?>
													<input type="hidden" name="uniti[]" value="<?php echo $p->poi_unit; ?>">
												</td>
												<td id="spriceunit<?php echo $n; ?>"><?php echo $p->poi_priceunit; ?>
													<input type="hidden" name="priceuniti[]" value="<?php echo $p->poi_priceunit; ?>">
												</td>
												<td id="samount<?php echo $n; ?>"><?php echo number_format($p->poi_amount,2); ?>
													<input type="hidden" name="amounti[]" value="<?php echo $p->poi_amount; ?>">
												</td>
												<td id="sdisone<?php echo $n; ?>"><?php echo $p->poi_discountper1; ?>
													<input type="hidden" name="disconei[]" value="<?php echo $p->poi_discountper1; ?>">
												</td>
												<td id="sdistwo<?php echo $n; ?>"><?php echo $p->poi_discountper2 ?>
													<input type="hidden" name="disctwoi[]" value="<?php echo $p->poi_discountper2; ?>">
												</td>
												<td id="sdisthree<?php echo $n; ?>"><?php echo $p->poi_discountper3 ?>
													<input type="hidden" name="discthree[]" value="<?php echo $p->poi_discountper3; ?>">
												</td>
												<td id="sdisfour<?php echo $n; ?>"><?php echo $p->poi_discountper4 ?>
													<input type="hidden" name="discfour[]" value="<?php echo $p->poi_discountper4; ?>">
												</td>

												<td id="sdisce<?php echo $n; ?>"><?php echo $p->poi_disce; ?>
													<input type="hidden" name="disce[]" value="<?php echo $p->poi_disce; ?>">
												</td>

												<td id="sdisamt<?php echo $n; ?>"><?php echo $p->poi_disamt; ?>
													<input type="hidden" name="discamti[]" value="<?php echo $p->poi_disamt; ?>">
												</td>
												<td id="total_vat<?php echo $n; ?>"><?php echo number_format($p->poi_vat,2); ?><input type="hidden" name="to_vat[]" value="<?php echo $p->poi_vat; ?>">
												</td>
												<td id="snetamt<?php echo $n; ?>"><?php echo number_format($p->poi_netamt,2); ?>
													<input type="hidden" name="netamti[]" value="<?php echo $p->poi_netamt; ?>">
												</td>
												<td>
													<ul class="icons-list">
							    					<li><a data-toggle="modal" data-target="#edit<?php echo $n;?>" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
							    					<li><a data-popup="tooltip" id="remove<?php echo $p->pri_id; ?>" title="Remove"><i class="icon-trash"></i></a></li>
							    					<!-- <li><a href="#" data-popup="tooltip" title="Options"><i class="icon-cog7"></i></a></li> -->
							    				</ul>
													<input type="hidden" name="matcodei[]" id="matcodetext<?php echo $n;?>" value="<?php echo $p->poi_matcode; ?>">
													<input type="hidden" name="matnamei[]" id="matnametext<?php echo $n;?>" value="<?php echo $p->poi_matname; ?>">
												</td>
											</tr>

											<!-- Full width modal -->
																 <div id="edit<?php echo $n; ?>" class="modal fade" data-backdrop="false">
																	 <div class="modal-dialog modal-lg">
																		 <div class="modal-content">
																			 <div class="modal-header">
																				 <button type="button" class="close" data-dismiss="modal">&times;</button>
																				 <h5 class="modal-title">Edit <?php echo $p->poi_matname;?></h5>
																			 </div>

																			 <div class="modal-body">

															 <div class="row">
																	 <div class="col-xs-6">
																		 <label for="">Material</label>
																		 <?php if ($p->poi_matcode=="") {?>
																								 <div class="input-group has-error" id="error<?php echo $n;?>">
																								 <span class="input-group-addon">
																									 <input type="checkbox" id="chk" aria-label="¡ÓË¹´àÍ§">
																								 </span>
																									 <input type="text" id="newmatname<?php echo $n; ?>"  placeholder="àÅ×Í¡ÃÒÂ¡ÒÃ«×éÍ" class="form-control input-sm" value='<?php echo $p->poi_matname; ?>'>
																									 <input type="text" id="newmatcode<?php echo $n; ?>"  placeholder="àÅ×Í¡ÃÒÂ¡ÒÃ«×éÍ" class="form-control input-sm" value="<?php echo $p->poi_matcode; ?>">
																										 <span class="input-group-btn" >
																											 <a class="insertnewmat<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#insertmatnew<?php echo $n;?>"><span class="glyphicon glyphicon-plus"></span> Search</a>
																											 <!-- <a class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> Search</a> -->
																										 </span>
																								 </div>
																								 <?php }else{ ?>
																									 <div class="input-group" id="error<?php echo $n;?>">
																									 <span class="input-group-addon">
																										 <input type="checkbox" id="chk" aria-label="¡ÓË¹´àÍ§">
																									 </span>
																										 <input type="text" id="newmatname<?php echo $n; ?>"  placeholder="àÅ×Í¡ÃÒÂ¡ÒÃ«×éÍ" class="form-control input-sm" value="<?php echo $p->poi_matname; ?>">
																										 <input type="text" id="newmatcode<?php echo $n; ?>"  placeholder="àÅ×Í¡ÃÒÂ¡ÒÃ«×éÍ" class="form-control input-sm" value="<?php echo $p->poi_matcode; ?>">
																											 <span class="input-group-btn" >
																												 <a class="insertnewmat<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#insertmatnew<?php echo $n;?>"><span class="glyphicon glyphicon-plus"></span> Search</a>
																												 <!-- <a class="openun<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat<?php echo $n;?>"><span class="glyphicon glyphicon-search"></span> Search</a> -->
																											 </span>
																									 </div>
																								 <?php } ?>
																	 </div>
																	 <div class="col-xs-6">
																								 <label for="">Cost</label>
																									 <div class="input-group">
																										 <input type="text" id="costnameint<?php echo $n; ?>" readonly="true" placeholder="àÅ×Í¡ÃÒÂ¡ÒÃµé¹·Ø¹" class="form-control input-sm" value="<?php echo $p->poi_costname; ?>">
																										 <input type=text id="codecostcodeint<?php echo $n; ?>" readonly="true" placeholder="àÅ×Í¡ÃÒÂ¡ÒÃµé¹·Ø¹" class="form-control input-sm" value="<?php echo $p->poi_costcode; ?>">
																											 <span class="input-group-btn" >
																												 <a class="costcode<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode<?php echo $n;?>"><span class="glyphicon glyphicon-search"></span> Search</a>
																											 </span>
																									 </div>
																								 </div>
															 </div>
															 <div class="row">
																	 <div class="col-md-6">
																		 <div class="form-group">
																							 <label for="qty">QTY</label>
																							 <input type="text" id="pqty<?php echo $n; ?>" name="qty"  placeholder="¡ÃÍ¡»ÃÔÁÒ³" class="form-control" value="<?php echo $p->poi_qty; ?>">
																		 </div>
																	 </div>
																	 <div class="col-xs-6">
																										 <div class="input-group">
																											 <label for="unit">Unit</label>
																											 <input type="text" id="punit<?php echo $n; ?>" name="punit" readonly="true" placeholder="¡ÃÍ¡Ë¹èÇÂ" class="form-control input-sm" value="<?php echo $p->poi_unit; ?>">
																										 <span class="input-group-btn" >
																											 <a class="unit<?php echo $n;?> btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit<?php echo $n;?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> Search</a>
																										 </span>
																									 </div>
																								 </div>
															 </div>
																<div class="row">
																	 <div class="col-md-6">
																		 <div class="form-group">
																							 <label for="price_unit">Price Unit</label>
																							 <input type="text" id="pprice_unit<?php echo $n; ?>"  name="price_unit" placeholder="¡ÃÍ¡ÃÒ¤Ò/Ë¹èÇÂ" class="form-control border-danger border-lg" value="<?php echo $p->poi_priceunit; ?>">
																		 </div>
																	 </div>
																	 <div class="col-md-6">
																		 <div class="form-group">
																							 <label for="amount">Amount</label>
																							 <input type="text" id="pamount<?php echo $n; ?>" readonly="true" name="amount" placeholder="¡ÃÍ¡¨Ó¹Ç¹à§Ô¹" class="form-control" value="<?php echo $p->poi_amount; ?>">
																		 </div>
																	 </div>
															 </div>
																<div class="row">
																		 <div class="col-md-3">
																			 <div class="form-group">

																					<label for="endtproject">Discount 1 (%)</label>
																					<input type='text' id="pdiscper1<?php echo $n; ?>" name="discountper1" placeholder="¡ÃÍ¡Discount" class="form-control" value="<?php echo $p->poi_discountper1; ?>" />
																			 </div>
																			 </div>
																				<div class="col-md-3">
																					 <div class="form-group">
																							<label for="endtproject">Discount 2 (%)</label>
																							<input type='text' id="pdiscper2<?php echo $n; ?>" name="discountper2" placeholder="¡ÃÍ¡Discount" class="form-control" value="<?php echo $p->poi_discountper2; ?>" />
																					 </div>
																				 </div>
																				 <div class="col-md-3">
																					 <div class="form-group">
																							<label for="endtproject">Discount 3 (%)</label>
																							<input type='text' id="pdiscper3<?php echo $n; ?>" name="discountper3" placeholder="¡ÃÍ¡Discount" class="form-control" value="<?php echo $p->poi_discountper3; ?>" />
																					 </div>
																					 </div>
																			<div class="col-md-3">
																					 <div class="form-group">
																							<label for="endtproject">Discount 4 (%)</label>
																							<input type='text' id="pdiscper4<?php echo $n; ?>" name="discountper4" placeholder="¡ÃÍ¡Discount" class="form-control" value="<?php echo $p->poi_discountper4; ?>" />
																					 </div>
																				 </div>
															 </div>
																 <div class="row">
																	 <div class="col-md-6">
																			 <div class="form-group">
																				<label for="endtproject">Extra Discount</label>
																				<input type='text' id="pdiscex<?php echo $n; ?>" name="discountper2" class="form-control" value="<?php echo $p->poi_disce; ?>"/>
																			 </div>
																	 </div>
																	 <div class="col-md-4">
																				 <div class="form-group">
																					<label for="endtproject">Before Discount Amount</label>
																					<input type='text' id="pdisamt<?php echo $n; ?>" name="disamt" class="form-control" value="<?php echo $p->poi_disamt; ?>"/>
																					<input type="hidden" id="pvat<?php echo $n; ?>" value="0">
																				 </div>
																	 </div>
																	 <div class="col-md-2">
															 <div class="form-group">
																	 <a id="chkprice<?php echo $n; ?>" class="btn btn-primary" style="margin-top:25px;">Check Price</a>
															 </div>
														 </div>
																 </div>
																 <div class="row">
																 <div class="col-md-4">
																 <div class="form-group">
												                    <label for="endtproject">vat</label>

												                    <input type='text' id="to_vat<?php echo $n; ?>" name="to_vat" class="form-control" value="<?php echo $p->poi_vat; ?>" readonly="true"/>
												                </div>
																			 
																			 </div>
																			<div class="col-md-4">
																			 <div class="form-group">
																					<label for="endtproject">Net Amount</label>

																					<input type='text' id="pnetamt<?php echo $n; ?>" name="netamt" class="form-control" value="<?php echo $p->poi_netamt; ?>"/>
																				</div>
																			 </div>
																 </div>
															 <div class="row">
																 <div class="col-md-12">
																			 <div class="form-group">
																					<label for="endtproject">Discription</label>

																					<input type='text' id="premark<?php echo $n; ?>" name="eremark" class="form-control" value="<?php echo $p->poi_remark; ?>"/>
																			 </div>
																 </div>
															 </div>

																<div class="row">
																<div class="col-xs-6">
                            <label for="">Ref. Asset Code</label>
                              <div class="input-group">
                          <input type="text" id="accode<?php echo $n; ?>" name="accode"  readonly="true"  class="form-control input-sm" value="<?php echo $p->po_assetid; ?>">
                          <input type="text" id="acname<?php echo $n; ?>" name="acname" readonly="true"  class="form-control input-sm" value="<?php echo $p->po_assetname; ?>">
                          <input type="hidden" id="statusass<?php echo $n; ?>" name="statusass" readonly="true"  class="form-control input-sm" value="<?php echo $p->po_asset; ?>">
                                  <span class="input-group-btn" >
                                    <a class="btn btn-info btn-sm" id="refasset<?php echo $n; ?>" data-toggle="modal" data-target="#refass<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                  </span>
                              </div>
                            </div>
																	 <div class="col-md-6">
																				 <input type="hidden" name="poid" value="">

																	 </div>
															 </div>
																			 </div>
																			 <div class="modal-footer">
																				 <a id="insertpodetail<?php echo $n; ?>"  data-dismiss="modal" class="btn btn-primary">Insert</a>
																				 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
																				 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
																			 </div>
																		 </div>
																	 </div>
																 </div>
																 <!-- /full width modal -->
<div class="modal fade" id="refass<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
      </div>
        <div class="modal-body">
            <div class="row" id="refasscode<?php echo $n; ?>">
             </div>

        </div>
    </div>
  </div>
</div>

<script>
$('#refasset<?php echo $n; ?>').click(function(){
   $('#refasscode<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#refasscode<?php echo $n; ?>").load('<?php echo base_url(); ?>share/modalshare_asset/<?php echo $n; ?>');
 });
</script>
																 <div class="modal fade" id="openunit<?php echo $n;?>" data-backdrop="false">
											           <div class="modal-dialog">
											             <div class="modal-content">
											               <div class="modal-header bg-info">
											                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											                 <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
											               </div>
											                 <div class="modal-body">
											                     <div id="modal_unit<?php echo $n;?>"></div>
											                 </div>
											             </div>
											           </div>
											         </div><!-- end modal matcode and costcode -->
											         <script>
											         $(".unit<?php echo $n;?>").click(function(){
											          $('#modal_unit<?php echo $n;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
											          $("#modal_unit<?php echo $n;?>").load('<?php echo base_url(); ?>index.php/share/unitid/<?php echo $n; ?>');
											        });
											         </script>
																 <script>


																 $("#chkprice<?php echo $n; ?>").click(function(){
                var xqty = parseFloat($("#pqty<?php echo $n; ?>").val());
                var xprice = parseFloat($("#pprice_unit<?php echo $n; ?>").val());
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($("#pdiscper1<?php echo $n; ?>").val());
                var xdiscper2 = parseFloat($("#pdiscper2<?php echo $n; ?>").val());
                var xdiscper3 = parseFloat($("#pdiscper3<?php echo $n; ?>").val());
                var xdiscper4 = parseFloat($("#pdiscper4<?php echo $n; ?>").val());
                var xdiscper5 = parseFloat($("#pdiscex<?php echo $n; ?>").val());
                var xvatt = parseFloat($("#vatper").val());
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                var total_di = xamount-xpd4;
                var xvat = parseFloat($("#vatper").val());
                $("#pamount<?php echo $n; ?>").val(xamount);
                $("#too_di<?php echo $n; ?>").val(total_di);
                $("#to_vat<?php echo $n; ?>").val(xpd8);
                $("#tot_vat<?php echo $n; ?>").val(xpd8);
                if(xdiscper5 != 0){
                  vxpd4 = xpd4-xdiscper5;
                    $("#pdisamt<?php echo $n; ?>").val(vxpd4);
                    $("#too_di<?php echo $n; ?>").val(vxpd4);
                    vxpd5 = (xpd4-xdiscper5) + xpd8;
                    $("#pnetamt<?php echo $n; ?>").val(vxpd5);
                  }
                  else if(xdiscper2 != 0){
                         $("#pdisamt<?php echo $n; ?>").val(xpd4);
                         $("#too_di<?php echo $n; ?>").val(xpd4);
                         vxpd2 = xpd4 + xpd8;
                         $("#pnetamt<?php echo $n; ?>").val(vxpd2);
                }
                  else if(xdiscper3 != 0){
                         $("#pdisamt<?php echo $n; ?>").val(xpd4);
                         $("#too_di<?php echo $n; ?>").val(xpd4);
                         vxpd3 = xpd4 + xpd8;
                         $("#pnetamt<?php echo $n; ?>").val(vxpd3);
                }
                else if(xdiscper4 != 0){
                         $("#pdisamt<?php echo $n; ?>").val(xpd4);
                         $("#too_di<?php echo $n; ?>").val(xpd4);
                         vxpd5 = xpd4 + xpd8;
                         $("#pnetamt<?php echo $n; ?>").val(vxpd5);
                }
             
                else
                {
                $("#pdisamt<?php echo $n; ?>").val(xpd1);
                $("#too_di<?php echo $n; ?>").val(xpd1);
                    vxpd1 = xpd4 + xpd8;
                    $("#pnetamt<?php echo $n; ?>").val(vxpd1);
                }
              });
																	 $("#insertpodetail<?php echo $n; ?>").click(function(){
																		 if ($("#newmatcode<?php echo $n; ?>").val()!="") {
																			 $("#smatname<?php echo $n; ?>").html('<a class="editable editable-clicks">'+$("#newmatname<?php echo $n; ?>").val()+'</a>');
																			  $("#smatcode<?php echo $n; ?>").html('<a class="editable editable-clicks">'+$("#newmatcode<?php echo $n; ?>").val()+'</a>');
																			  $("#matnametext<?php echo $n;?>").val($('#newmatname<?php echo $n; ?>').val());
																				  $("#matcodetext<?php echo $n;?>").val($('#newmatcode<?php echo $n; ?>').val());
																			 $("#scostname<?php echo $n; ?>").html('<a class="editable editable-clicks">'+$("#costnameint<?php echo $n; ?>").val()+'</a><input type="hidden" name="codtcodei[]" value='+$("#codecostcodeint<?php echo $n; ?>").val()+'><input type="hidden" name="costnamei[]" value='+$("#costnameint<?php echo $n; ?>").val()+'>');
																			 $("#sqtyi<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pqty<?php echo $n; ?>").val()+"</a><input type='hidden' name='qtyi[]' value="+$("#pqty<?php echo $n; ?>").val()+">");
																			 $("#spriceunit<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pprice_unit<?php echo $n; ?>").val()+"</a><input type='hidden' name='priceuniti[]' value="+$("#pprice_unit<?php echo $n; ?>").val()+">");
																			 $("#sunit<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#punit<?php echo $n; ?>").val()+"</a><input type='hidden' name='uniti[]' value="+$("#punit<?php echo $n; ?>").val()+">");
																			 $("#samount<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pamount<?php echo $n; ?>").val()+"</a><input type='hidden' name='amounti[]' value="+$("#pamount<?php echo $n; ?>").val()+">");
																			 $("#sdisone<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscper1<?php echo $n; ?>").val()+"</a><input type='hidden' name='disconei[]' value="+$("#pdiscper1<?php echo $n; ?>").val()+">");
																			 $("#sdistwo<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscper2<?php echo $n; ?>").val()+"</a><input type='hidden' name='disctwoi[]' value="+$("#pdiscper2<?php echo $n; ?>").val()+">");
																			 $("#sdisthree<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscper3<?php echo $n; ?>").val()+"</a><input type='hidden' name='discthree[]' value="+$("#pdiscper3<?php echo $n; ?>").val()+">");
																			 $("#sdisfour<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscper4<?php echo $n; ?>").val()+"</a><input type='hidden' name='discfour[]' value="+$("#pdiscper4<?php echo $n; ?>").val()+">");
																			 $("#sdisce<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdiscex<?php echo $n; ?>").val()+"</a><input type='hidden' name='disce[]' value="+$("#pdiscex<?php echo $n; ?>").val()+">");

																			 $("#sdisamt<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdisamt<?php echo $n; ?>").val()+"</a><input type='hidden' name='discamti[]' value="+$("#pdisamt<?php echo $n; ?>").val()+">");

																			 $("#svat<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pdisamt<?php echo $n; ?>").val()+"</a><input type='hidden' name='disamt[]' value="+$("#pdisamt<?php echo $n; ?>").val()+">");

																			 $("#total_vat<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#to_vat<?php echo $n; ?>").val()+"</a><input type='hidden' name='to_vat[]' value="+$("#to_vat<?php echo $n; ?>").val()+">");

																			 $("#snetamt<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pnetamt<?php echo $n; ?>").val()+"</a><input type='hidden' name='netamti[]' value="+$("#pnetamt<?php echo $n; ?>").val()+"><input type='hidden' name='accode[]' value="+$("#accode<?php echo $n; ?>").val()+"><input type='hidden' name='acname[]' value="+$("#acname<?php echo $n; ?>").val()+"><input type='hidden' name='statusass[]' value="+$("#statusass<?php echo $n; ?>").val()+">");
																		 }else{


																			 alert("Please Select Meterial Code");
																			 $("#newmatname<?php echo $n;?>").focus();
																		 }
																	 });
														       $("#a<?php echo $n; ?>").click(function(){
														         if ($("#a<?php echo $n; ?>").prop("checked")) {
														             $("#chki<?php echo $n;?>").val("Y");
														         }else{
														             $("#chki<?php echo $n;?>").val("");
														         }

														       });
														     </script>
																 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/bootbox.min.js"></script>
		                           	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
																 <script>
																 // Alert combination
																 $('#remove<?php echo $p->pri_id; ?>').on('click', function() {
																 	var idp = $('#poiidi<?php echo $n;?>').val();
																		 swal({
																				 title: "Are you sure?",
																				 text: "Deleted "+idp,
																				 type: "warning",
																				 showCancelButton: true,
																				 confirmButtonColor: "#EF5350",
																				 confirmButtonText: "Yes, delete it!",
																				 cancelButtonText: "No, cancel pls!",
																				 closeOnConfirm: false,
																				 closeOnCancel: false
																		 },
																		 function(isConfirm){
																				 if (isConfirm) {
																						var url="<?php echo base_url(); ?>purchase_active/del_poi";
																						var dataSet={
																							id: "<?php echo $p->pri_id; ?>",
																							code: "<?php echo $p->poi_ref; ?>",
																							item: "<?php echo $p->poi_id; ?>",
																							prno: "<?php echo $prno; ?>"
																							};
																							$.post(url,dataSet,function(data){


																						$(this).closest('tr').remove();
																						 swal({
																									 title: "Deleted!",
																									 text: data,
																									 confirmButtonColor: "#66BB6A",
																									 type: "success"
																						 });
																					});
																				 }
																				 else {
																						 swal({
																								 title: "Cancelled",
																								 text: "Your imaginary file is safe :)",
																								 confirmButtonColor: "#2196F3",
																								 type: "error"
																						 });
																				 }
																				   window.location.href = "<?php echo base_url(); ?>purchase/editpo/<?php echo $p->poi_ref; ?>";
																		 });
																 });
																 </script>
																 <!-- modal  á¼¹¡-->
															 	 <div class="modal fade" id="insertmatnew<?php echo $n;?>" data-backdrop="false">
															 		<div class="modal-dialog modal-full">
															 			<div class="modal-content">
															 				<div class="modal-header">
															 					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															 					<h4 class="modal-title" id="myModalLabel">New Material</h4>
															 				</div>
															 					<div class="modal-body">
															 					<div class="panel-body">
															 							<div class="row" id="modal_newmat<?php echo $n;?>">

															 							</div>
															 							</div>
															 					</div>
															 			</div>
															 		</div>
															 	</div> <!--end modal -->
															 	<script>
															 		$(".insertnewmat<?php echo $n;?>").click(function(){
															 			$("#modal_newmat<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
															 			$("#modal_newmat<?php echo $n;?>").load('<?php echo base_url(); ?>share/getmatcode/<?php echo $n; ?>');
															 		});
															 	</script>

																<div class="modal fade" id="costcode<?php echo $n;?>" data-backdrop="false">
																 <div class="modal-dialog modal-full">
																	 <div class="modal-content">
																		 <div class="modal-header">
																			 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			 <h4 class="modal-title" id="myModalLabel">Select CostCode</h4>
																		 </div>
																			 <div class="modal-body">
																			 <div class="panel-body">
																					 <div class="row" id="modal_costcode<?php echo $n;?>">

																					 </div>
																					 </div>
																			 </div>
																	 </div>
																 </div>
															 </div> <!--end modal -->
															 <script>
																 $(".costcode<?php echo $n;?>").click(function(){
																	 $("#modal_costcode<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
																	 $("#modal_costcode<?php echo $n;?>").load('<?php echo base_url(); ?>share/costcode_id/<?php echo $n; ?>');
																 });
															 </script>

															 <div class="modal fade" id="opnewmat<?php echo $n;?>" data-backdrop="false">
																<div class="modal-dialog modal-full">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			<h4 class="modal-title" id="myModalLabel">Select Material</h4>
																		</div>
																			<div class="modal-body">
																			<div class="panel-body">
																					<div class="row" id="modal_matkk<?php echo $n;?>">

																					</div>
																					</div>
																			</div>
																	</div>
																</div>
															</div> <!--end modal -->
															<script>
																$(".openun<?php echo $n;?>").click(function(){
																	$("#modal_matkk<?php echo $n;?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
																	$("#modal_matkk<?php echo $n;?>").load('<?php echo base_url(); ?>share/material_id/<?php echo $n; ?>');
																});
															</script>
											<?php $n++;
											$totamtunit = $totamtunit+$p->poi_amount;
											$totdi1 = $totdi1+$p->poi_discountper1;
											$totdi2 = $totdi2+$p->poi_discountper2;
											$totdi3 = $totdi3+$p->poi_discountper3;
											$totdi4 = $totdi4+$p->poi_discountper4;
											$totdisc = $totdisc+$p->poi_disce;
											$totdi = $totdi+$p->poi_disamt;
											$totvat = $totvat+$p->poi_vat;
											$totamt = $totamt+$p->poi_netamt;
										} ?>
										
										</tbody>
										<tbody>
											<tr>
											<td colspan="8" class="text-center">Summary</td>
											<td><span id="totamtunit"><?php echo number_format($totamtunit,2); ?></span><input type="hidden" id="txt_totamtunit" name="" value="<?php echo $totamtunit; ?>"></td>
											<td><span id="totdi1"><?php echo number_format($totdi1,2); ?><span><input type="hidden" id="txt_totdi1" name="" value="<?php echo $totdi1; ?>"></td>
											<td><span id="totdi2"><?php echo number_format($totdi2,2); ?></span><input type="hidden" id="txt_totdi2" name="" value="<?php echo $totdi2; ?>"></td>
											<td><?php echo number_format($totdi3,2); ?></td>
											<td><?php echo number_format($totdi4,2); ?></td>
											<td><?php echo number_format($totdisc,2); ?></td>
											<td><?php echo number_format($totdi,2); ?></td>
											<td><?php echo number_format($totvat,2); ?></td>
											<td><?php echo number_format($totamt,2); ?></td>
											<td></td>
										</tr>
										</tbody>
									</table>
								<!-- </div> -->
								<!--  -->
								
								<div id="fff"></div>
								<div id="ddd"></div>
								<div id="ggg"></div>
								</div>
								<br>
								<div class="text-right">
								  <a href="<?php echo base_url(); ?>purchase/opencreatepo" class="btn btn-default btn-xs"><i class="icon-plus22"></i> New</a>
								  <a data-toggle="modal" id="inst" data-target="#insertrowpr" class="btn btn-default btn-xs"><i class="icon-stackoverflow"></i> ADD PR DETAIL</a>
		              <a data-toggle="modal" data-target="#insertrow" class="btn btn-default btn-xs disabled"><i class="icon-stackoverflow"></i> ADD Rows</a>
		              <button type="submit" class="preload btn btn-info btn-xs"><i class="icon-floppy-disk position-left"></i> Save </button>
									<!-- <a href="<?php echo base_url(); ?>purchase/report_po/<?php echo $pono; ?>" class="btn btn-default btn-xs"><i class="icon-printer4"></i> Print</a> -->
									<a class="btn btn-primary btn-xs" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=po.mrt&pp=<?php echo $poid; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i> Print</a>
		              <a href="<?php echo base_url(); ?>purchase/po_archive" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
								</div>
							
						</div>
					</div>

					</form>

				</div>
					<!-- /Content area -->
</div>
<!-- /Main content -->
<!-- modal  â¤Ã§¡ÒÃ-->
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
<!-- modal  á¼¹¡-->
 <div class="modal fade" id="opendepart" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_department">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<!-- Full width modal -->
				 <div id="openpr" class="modal fade" data-backdrop="false">
					 <div class="modal-dialog modal-lg">
						 <div class="modal-content">
							 <div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal">&times;</button>
								 <h5 class="modal-title">Select Purchase Requsition</h5>
							 </div>

							 <div class="modal-body">
								 <div id="loadpr">

								 </div>
							 </div>
							 <br>
							 <div class="modal-footer">
								 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
								 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
							 </div>
						 </div>
					 </div>
				 </div>
				 <!-- /full width modal -->
				 <!-- Full width modal -->
				 				 <div id="openvender" class="modal fade" data-backdrop="false">
				 					 <div class="modal-dialog modal-lg">
				 						 <div class="modal-content">
				 							 <div class="modal-header">
				 								 <button type="button" class="close" data-dismiss="modal">&times;</button>
				 								 <h5 class="modal-title">Select Vender</h5>
				 							 </div>

				 							 <div class="modal-body">
				 								 <div id="loadvender">

				 								 </div>
				 							 </div>
				 							 <br>
				 							 <div class="modal-footer">
				 								 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
				 								 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
				 							 </div>
				 						 </div>
				 					 </div>
				 				 </div>
				 				 <!-- /full width modal -->
<script>
	$(".openproj").click(function(){
      $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });
    $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
		$(".openpr").click(function(){
      $('#loadpr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#loadpr").load('<?php echo base_url(); ?>purchase/load_pr');
    });
		$(".ven").click(function(){
			$("#loadvender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
		});
</script>
 <div id="insertrowpr" class="modal fade" data-backdrop="false">
						 <div class="modal-dialog modal-full">
							 <div class="modal-content">
								 <div class="modal-header">
									 <button type="button" class="close" data-dismiss="modal">&times;</button>
									 <h5 class="modal-title">Insert PR Detail</h5>
								 </div>

								 <div class="modal-body" id="prdetail">

								 </div>
								 <div class="modal-footer">
								 	<button class="btn btn-default btn-xs" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
								 </div>
							</div>
						</div>
					</div>

					<script>
						$("#inst").click(function(){
							$("#prdetail").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
							$("#prdetail").load('<?php echo base_url(); ?>share/modal_pr_detail2/'+$("#prno").val()+"/"+$("#pono").val());
						});
					</script>
					
<!-- Full width modal -->
					 <div id="insertrow" class="modal fade" data-backdrop="false">
						 <div class="modal-dialog modal-lg">
							 <div class="modal-content">
								 <div class="modal-header">
									 <button type="button" class="close" data-dismiss="modal">&times;</button>
									 <h5 class="modal-title">Insert PO Detail</h5>
								 </div>

								 <div class="modal-body">

				 <div class="row">
						 <div class="col-xs-6">
							 <label for="">Material</label>
														 <div class="input-group">
														 <span class="input-group-addon">
															 <input type="checkbox" id="chk" aria-label="¡ÓË¹´àÍ§">
														 </span>
															 <input type="text" id="newmatname"  placeholder="" class="form-control input-sm">
															 <input type="hidden" id="newmatcode"  placeholder="" class="form-control input-sm">
																 <span class="input-group-btn" >
																	 <!-- <a class="insertnewmat btn btn-primary btn-sm" data-toggle="modal" data-target="#insertmatnew"><span class="glyphicon glyphicon-plus"></span> à¾ÔèÁ</a> -->
																	 <a class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> Search</a>
																 </span>
														 </div>
						 </div>
						 <div class="col-xs-6">
													 <label for="">Cost</label>
														 <div class="input-group">
															 <input type="text" id="costnameint" readonly="true" placeholder="" class="form-control input-sm">
															 <input type="hidden" id="codecostcodeint" readonly="true" placeholder="" class="form-control input-sm">
																 <span class="input-group-btn" >
																	 <a class="modalcost btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> Search</a>
																 </span>
														 </div>
													 </div>
				 </div>
				 <div class="row">
						 <div class="col-md-6">
							 <div class="form-group">
												 <label for="qty">QTY</label>
												 <input type="text" id="pqty" name="qty"  placeholder="¡ÃÍ¡»ÃÔÁÒ³" class="form-control" value="0">
							 </div>
						 </div>
						 <div class="col-xs-6">
															 <div class="input-group">
																 <label for="unit">Unit</label>
																 <input type="text" id="punit" name="punit" readonly="true" placeholder="¡ÃÍ¡Ë¹èÇÂ" class="form-control input-sm">
															 <span class="input-group-btn" >
																 <a class="openun btn btn-primary btn-sm" id="modalunit" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> Search</a>
															 </span>
														 </div>
													 </div>
				 </div>
					<div class="row">
						 <div class="col-md-6">
							 <div class="form-group">
												 <label for="price_unit">Price Unit</label>
												 <input type="text" id="pprice_unit"  name="price_unit" placeholder="¡ÃÍ¡ÃÒ¤Ò/Ë¹èÇÂ" class="form-control" value="0">
							 </div>
						 </div>
						 <div class="col-md-6">
							 <div class="form-group">
												 <label for="amount">Amount</label>
												 <input type="text" id="pamount" readonly="true" name="amount" placeholder="¡ÃÍ¡¨Ó¹Ç¹à§Ô¹" class="form-control" value="0">
							 </div>
						 </div>
				 </div>
					<div class="row">
							 <div class="col-md-3">
								 <div class="form-group">

										<label for="endtproject">Discount 1 (%)</label>
										<input type='text' id="pdiscper1" name="discountper1" placeholder="" class="form-control" value="0"/>
								 </div>
							 </div>
							 <div class="col-md-3">
								 <div class="form-group">
										<label for="endtproject">Discount 2 (%)</label>
										<input type='text' id="pdiscper2" name="discountper2" placeholder="" class="form-control" value="0" />
								 </div>
							 </div>
							 <div class="col-md-3">
								 <div class="form-group">

										<label for="endtproject">Discount 3 (%)</label>
										<input type='text' id="pdiscper3" name="discountper3" placeholder="" class="form-control" value="0"/>
								 </div>
							 </div>
							 <div class="col-md-3">
								 <div class="form-group">
										<label for="endtproject">Discount 4 (%)</label>
										<input type='text' id="pdiscper4" name="discountper4" placeholder="" class="form-control" value="0" />
								 </div>
							 </div>
				 </div>
					 <div class="row">
						 <div class="col-md-6">
								 <div class="form-group">
									<label for="endtproject">Extra Amount Discount</label>
									<input type='text' id="pdiscex" name="discountper2" class="form-control" value="0"/>
								 </div>
						 </div>
						 <div class="col-md-4">
									 <div class="form-group">
										<label for="endtproject">Before Discount Amount</label>
										<input type='text' id="pdisamt" name="pdisamt" class="form-control" value="0"/>
										<input type="hidden" id="pvat" value="0">
									 </div>
						 </div>
						 <div class="col-md-2">
				 <div class="form-group">
						 <a id="chkpricee" class="btn btn-primary" style="margin-top:25px;">Check</a>
				 </div>
			 </div>
					 </div>
					 <div class="row">
								<div class="col-md-4">
								 <div class="form-group">
										<label for="endtproject">Net Amount</label>

										<input type='text' id="pnetamt" name="netamt" class="form-control" value="0"/>
									</div>
								 </div>
					 </div>
				 <div class="row">
					 <div class="col-md-12">
								 <div class="form-group">
										<label for="endtproject">Discription</label>

										<input type='text' id="premark" name="iremark" class="form-control"/>
								 </div>
					 </div>
				 </div>

					<div class="row">
						 <div class="col-md-6">
									 <input type="hidden" name="poid" value="">
									 <a id="insertpodetail" data-dismiss="modal"  class="btn btn-primary">Insert</a>
									 <button class="btn btn-default" data-dismiss="modal">Cancel</button>
						 </div>
				 </div>
								 </div>
								 <div class="modal-footer">
									 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
									 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
								 </div>
							 </div>
						 </div>
					 </div>
					 <!-- /full width modal -->

					 					 <!--  -->
					 					 <div id="opnewmat" class="modal fade">
					 						<div class="modal-dialog modal-full">
					 							<div class="modal-content ">
					 								<div class="modal-header">
					 									<button type="button" class="close" data-dismiss="modal">&times;</button>
					 									<h5 class="modal-title">Add Material</h5>
					 								</div>
					 									<div class="modal-body">
					 											<div class="row" id="modal_mat"></div>

					 									</div>
					 							</div>
					 						</div>
					 						</div>
					 						<script>
					 						$(".openun").click(function(){
					 							 $('#modal_mat').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
					 							 $("#modal_mat").load('<?php echo base_url(); ?>index.php/share/material_id');
					 						 });
					 						</script>
					 					 <!-- modal àÅ×Í¡Ë¹èÇÂ -->
					 					  <div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					 					   <div class="modal-dialog modal-lg">
					 					     <div class="modal-content">
					 					       <div class="modal-header">
					 					         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					 					         <h4 class="modal-title" id="myModalLabel">Add Unit</h4>
					 					       </div>
					 					         <div class="panel-body">
					 					             <div id="modal_unit">

					 					             </div>
					 					         </div>
					 					     </div>
					 					   </div>
					 					 </div> <!--end modal -->
					 					 <div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					 				   <div class="modal-dialog modal-full">
					 				     <div class="modal-content">
					 				       <div class="modal-header bg-info">
					 				         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					 				         <h4 class="modal-title" id="myModalLabel">Add Cost</h4>
					 				       </div>
					 				         <div class="modal-body">
					 				             <div id="modal_cost"></div>
					 				         </div>
					 				     </div>
					 				   </div>
					 				 </div><!-- end modal matcode and costcode -->
					 					 <!-- /full width modal -->
					 					 <div class="modal fade" id="insertmatnew" data-backdrop="false">
					 					  <div class="modal-dialog modal-full">
					 					 	 <div class="modal-content">
					 					 		 <div class="modal-header">
					 					 			 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					 					 			 <h4 class="modal-title" id="myModalLabel">New Material</h4>
					 					 		 </div>
					 					 			 <div class="modal-body">
					 					 			 <div class="panel-body">
					 					 					 <div class="row" id="modal_newmat">

					 					 					 </div>
					 					 					 </div>
					 					 			 </div>
					 					 	 </div>
					 					  </div>
					 					 </div> <!--end modal -->
					 					 <script>
					 					 $("#modalunit").click(function(){
					 		     		 $('#modal_unit').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
					 		     		 $("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
					 		  			  });
					 					 $(".insertnewmat").click(function(){
					 					 	 $("#modal_newmat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
					 					 	 $("#modal_newmat").load('<?php echo base_url(); ?>share/getmatcode_new');
					 					  });
					 						$(".modalcost").click(function(){
					 						 $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
					 						 $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
					 					 });
					 					 </script>
					