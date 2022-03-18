<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup New Owner / Customer
							<p></p>
						</h5>
						<div class="heading-elements">
							<!-- <a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
							<i class="icon-arrow-left13"></i> Back</a> -->
							<a type="button" href="<?php echo base_url(); ?>data_master/new_debtor" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
					</div>


					<div class="panel-body">
						<form action="<?php echo base_url(); ?>datastore_active/addnewdebtor" method="post"
						 class="form-horizontal">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-1">
										<div class="form-group">
											<label class="col-sm-3 control-label">Business Size :</label>
											<div class="col-sm-9">
												<div class="form-group">
													<label class="radio-inline">
														<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="L" checked="checked"> Large
													</label>

													<label class="radio-inline">
														<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="M"> Middle
													</label>

													<label class="radio-inline">
														<input type="radio" name="bizsize" id="radio-inline-left" class="styled" value="S"> Small
													</label>
												</div>
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Business :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" name="vbusiness" id="vbusiness" placeholder="Business Name" type="text">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">TAX ID :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" id="vtexid" name="vtexid" placeholder="TAX ID" type="text">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">TAX Type :</label>
											<div class="col-sm-6">
												<div class="form-group">
													<select class="form-control input-sm" id="vtextype" name="vtextype">
														<option value="1">ภ.ง.ด.2</option>
														<option value="2">ภ.ง.ด.3</option>
														<option value="3">ภ.ง.ด.53</option>
														<option value="4">ภ.ง.ด.54</option>
														<option value="5">ภ.ง.ด.1</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Owner Code :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" id="debcode" name="debcode" readonly placeholder="Vender Code" type="text">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Owner Name :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" id="vname" name="vname" placeholder="Vender Name" type="text">
											</div>
										</div>

									</div>


									<div class="col-sm-5">
										<div class="form-group">
											<label class="col-sm-3 control-label">Business Status :</label>
											<div class="col-sm-6">
												<div class="checkbox checkbox-switch">
													<label>
														<input type="checkbox" name="bizstatus" data-on-color="success" data-off-color="default" data-on-text="ACTIVE" data-off-text="Blacklist"
														 class="switch" checked="checked">
													</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Telephone :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" name="vtel" placeholder="Telephone" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">FAX :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" name="vfax" placeholder="FAX" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Credit Term :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" name="vcr" placeholder="Credit Term" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Sale Contact :</label>
											<div class="col-sm-6">
												<input class="form-control input-sm" name="vsale" placeholder="Sale Contact" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Address :</label>
											<div class="col-sm-6">
												<textarea class="form-control input-sm" id="vaddr" name="vaddr" cols="50" rows="4" placeholder="Vender Address"></textarea>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-sm-9 text-right">
												<div class="form-group">
													<button class="save btn btn-success btn-sm">
														<i class="icon-floppy-disk"></i> Save</button>
													<a id="fa_close" href="<?php echo base_url(); ?>data_master/setup_debtor" class="btn bg-danger">
														<i class="icon-close2"></i> Close</a>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</form>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>


<script>
	$(".switch").bootstrapSwitch();
	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});
	$('#ma').attr('class', 'active');
	$('#ma8').attr('style', 'background-color:#dedbd8');
</script>