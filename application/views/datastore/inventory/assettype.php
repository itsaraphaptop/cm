<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Asset Type<p></p></h6>
			<div class="heading-elements">
				<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
				<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=assettype.mrt&comp=<?php echo "$compcode" ?>" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
				<a type="button" data-toggle="modal" data-target="#modal_theme_primary" class="modal_theme_primary btn btn-info"><i class="icon-plus-circle2"></i> New</a>
			</div>

		</div>
								
		<div class="panel-body">
		<div class="table-responsive">
						<table class="table table-striped table-xxs table-hover datatable-basic">
							<thead>
								<tr>
									<th>A/C Code</th>
									<th>Asset type(TH) :</th>
									<!-- <th>Asset type(Eng)</th> -->
									<th>A/C Asset</th>
									<th>A/C Depreciation</th>
									<th>A/C Cost</th>
									<th>A/C Acc. Deprecition</th>
									<th>Cost Code</th>
									<!-- <th>Cost Name</th> -->
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($res as $key ) { ?>
								<tr>
									<td><?php echo $key->at_code; ?></td>
									<td><?php echo $key->at_typet; ?></td>
									<!-- <td><?php echo $key->at_typee; ?></td> -->
									<td><?php echo $key->at_aca; ?></td>
									<td><?php echo $key->at_acd; ?></td>
									<td><?php echo $key->at_cost; ?></td>
									<td><?php echo $key->at_acacc ;?></td>
									<td><?php echo $key->at_namecost; ?></td>
									<!-- <td><?php echo $key->at_namecost; ?></td> -->
									<td style="text-align: center;">
									<a  type="button" data-toggle="modal" data-target="#edittype<?php echo $key->at_code; ?>"><i class="icon-pencil7"></i></a>
									<a href="<?php echo base_url(); ?>index.php/asset_active/delassettype/<?php echo $key->at_code; ?>" ><i class="glyphicon glyphicon-trash"></i></a></td>
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

				<div id="modal_theme_primary" class="modal fade">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-primary">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h6 class="modal-title">Asset Type</h6>
								</div>
								<form method="post" id="formasset" action="<?php echo base_url(); ?>index.php/asset_active/insertassettype">
								<div class="modal-body">
								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
							          <label class="col-lg-2 control-labelt">Asset Code:</label>
							            <div class="col-lg-4">
							              <input type="text" value="" class="form-control" id="at_code" name="at_code" placeholder="">
							            </div>
							        </div>
								</div>
								</div>
								<br>
								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
							          <label class="col-lg-2 control-labelt">Asset Name (TH):</label>
							            <div class="col-lg-4">
							              <input type="text" value="" class="form-control" id="at_typet" name="at_typet" placeholder="">
							            </div>

							          <label class="col-lg-2 control-labelt">Asset Name(ENG):</label>
							            <div class="col-lg-4">
							              <input type="text" value="" class="form-control" id="at_typee" name="at_typee" placeholder="">
							            </div>
							        </div>
								</div>
								</div>
<br>
								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
							          	<label class="col-lg-2 control-labelt">A/C Asset:</label>
							            <div class="input-group ">
							            	<input type="hidden" readonly="" class="form-control " name="at_acaid" id="at_acaid1">
											<input type="text" readonly="" class="form-control " name="at_aca" id="at_codename1">
											<span class="input-group-btn" >
                                   				<a class="ac btn btn-info " data-toggle="modal" data-target="#ac"><span class="glyphicon glyphicon-search"></a>
                                   			</span>
                                   		</div>
							        </div>
								</div>
								</div>

								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
							          	<label class="col-lg-2 control-labelt">A/C Depreciation:</label>
							            <div class="input-group ">
							            	<input type="hidden" readonly="" class="form-control " name="at_acdid" id="at_acdid2">
											<input type="text" readonly="" class="form-control " name="at_acd" id="at_codename2">
											<span class="input-group-btn" >
                                   				<a class="at btn btn-info " data-toggle="modal" data-target="#at"><span class="glyphicon glyphicon-search"></a>
                                   			</span>
                                   		</div>
							        </div>
								</div>
								</div>

								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
							          	<label class="col-lg-2 control-labelt">A/C Cost:</label>
							            <div class="input-group ">
							            	<input type="hidden" readonly="" class="form-control " name="at_costid" id="at_costid3">
											<input type="text" readonly="" class="form-control " name="at_cost" id="at_codename3">
											<span class="input-group-btn" >
                                   				<a class="costacc btn btn-info " data-toggle="modal" data-target="#costacc"><span class="glyphicon glyphicon-search"></span></a>
                                   			</span>
                                   		</div>
							        </div>
								</div>
								</div>

								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
							          	<label class="col-lg-2 control-labelt">A/C Acc. Deprecition:</label>
							            <div class="input-group ">
							            	<input type="hidden" readonly="" class="form-control " name="at_acaccid" id="at_acaccid4">
							            	<input type="text" readonly="" class="form-control " name="at_acacc" id="at_codename4">
											<span class="input-group-btn" >
				                       			<a class="deacc btn btn-info " data-toggle="modal" data-target="#deacc"><span class="glyphicon glyphicon-search"></span></a>
				                    		</span>
                                   		</div>
							        </div>
								</div>
								</div>

								<div class="row">
								<div class="col-md-12">
									<div class="form-group">
							          	<label class="col-lg-2 control-labelt">Cost Code:</label>
							            <div class="input-group ">
							            	<input type="hidden" readonly="" class="form-control " name="costcode" id="codecostcode">
							            	<input type="text" readonly="" class="form-control " name="costname" id="codenamecost">
											<span class="input-group-btn" >
				                       			<a class="costt btn btn-info " data-toggle="modal" data-target="#costt"><span class="glyphicon glyphicon-search"></span></a>
				                    		</span>
                                   		</div>
							        </div>
								</div>
								</div>
							        <div class="modal-footer">
							          <button type="button" id="saveasset" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
							          <button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
							        </div>

							    </div>
								</form>
							</div>
						</div>
				</div>


<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
               </div>
                 <div class="modal-body">
                     <div id="modal_cost"></div>
                 </div>
             </div>
           </div>
         </div>


         <script>
         	  $(".modalcost").click(function(){
             $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
           });
         </script>

<div class="modal fade" id="ac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
               </div>
                 <div class="modal-body">
                     <div id="acc"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
         	  $(".ac").click(function(){
             $('#acc').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#acc").load('<?php echo base_url(); ?>index.php/share/accchart/1');
           });
         </script>




         <div class="modal fade" id="at" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
               </div>
                 <div class="modal-body">
                     <div id="att"></div>
                 </div>
             </div>
           </div>
         </div>

           <script>
         	  $(".at").click(function(){
             $('#att').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#att").load('<?php echo base_url(); ?>index.php/share/accchart/2');
           });
         </script>

<div class="modal fade" id="costacc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
               </div>
                 <div class="modal-body">
                     <div id="costaccc"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
         	  $(".costacc").click(function(){
             $('#costaccc').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#costaccc").load('<?php echo base_url(); ?>index.php/share/accchart/3');
           });
         </script>

<div class="modal fade" id="deacc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
               </div>
                 <div class="modal-body">
                     <div id="deaccc"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
         	  $(".deacc").click(function(){
             $('#deaccc').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#deaccc").load('<?php echo base_url(); ?>index.php/share/accchart/4');
           });
         </script>
<div class="modal fade" id="costt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Cost Code</h4>
               </div>
                 <div class="modal-body">
                     <div id="decost"></div>
                 </div>
             </div>
           </div>
         </div>
         <script>
         	  $(".costt").click(function(){
             $('#decost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#decost").load('<?php echo base_url(); ?>index.php/share/costcode');
           });
         </script>


<?php foreach ($res as $key ) { ?>
<div id="edittype<?php echo $key->at_code; ?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Asset Type</h6>
			</div>
			<form method="post" id="formasset" action="<?php echo base_url(); ?>index.php/asset_active/edit_assettype/<?php echo $key->at_code; ?>">
				<div class="modal-body">
					<div class="row">
					<div class="col-md-12">
					<div class="form-group">
						<label class="col-lg-2 control-labelt">Asset Code:</label>
						<div class="col-lg-4">
							<input type="text" readonly="" value="<?php echo $key->at_code; ?>" class="form-control" id="at_code" name="at_code" placeholder="">
						</div>
					</div>
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-md-12">
					<div class="form-group">
						<label class="col-lg-2 control-labelt">Asset Name (TH):</label>
						<div class="col-lg-4">
							<input type="text" value="<?php echo $key->at_typet; ?>" class="form-control" id="at_typet" name="at_typet" placeholder="">
						</div>
						<label class="col-lg-2 control-labelt">Asset Name(ENG):</label>
						<div class="col-lg-4">
							<input type="text" value="<?php echo $key->at_typee; ?>" class="form-control" id="at_typee" name="at_typee" placeholder="">
						</div>
					</div>
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-md-12">
					<div class="form-group">
						<label class="col-lg-2 control-labelt">A/C Asset:</label>
						<div class="input-group ">
							<input type="hidden" readonly="" class="form-control " name="at_acaid" id="at_acaid1<?php echo $key->at_code; ?>" value="<?php echo $key->at_acaid; ?>">
							<input type="text" readonly="" class="form-control " name="at_aca" id="at_codename1<?php echo $key->at_code; ?>" value="<?php echo $key->at_aca; ?>">
							<span class="input-group-btn" >
								<a class="ac<?php echo $key->at_code; ?> btn btn-info " data-toggle="modal" data-target="#ac<?php echo $key->at_code; ?>"><span class="glyphicon glyphicon-search"></a>
							</span>
						</div>
					</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
					<div class="form-group">
						<label class="col-lg-2 control-labelt">A/C Depreciation:</label>
						<div class="input-group ">
							<input type="hidden" readonly="" class="form-control " name="at_acdid" id="at_acdid2<?php echo $key->at_code; ?>" value="<?php echo $key->at_acdid; ?>">
							<input type="text" readonly="" class="form-control " name="at_acd" id="at_codename2<?php echo $key->at_code; ?>" value="<?php echo $key->at_acd; ?>">
							<span class="input-group-btn" >
								<a class="at<?php echo $key->at_code; ?> btn btn-info " data-toggle="modal" data-target="#at<?php echo $key->at_code; ?>"><span class="glyphicon glyphicon-search"></a>
							</span>
						</div>
					</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
					<div class="form-group">
						<label class="col-lg-2 control-labelt">A/C Cost:</label>
						<div class="input-group ">
							<input type="hidden" readonly="" class="form-control " name="at_costid" id="at_costid3<?php echo $key->at_code; ?>" value="<?php echo $key->at_costid; ?>">
							<input type="text" readonly="" class="form-control " name="at_cost" id="at_codename3<?php echo $key->at_code; ?>" value="<?php echo $key->at_cost; ?>">
							<span class="input-group-btn" >
								<a class="costacc<?php echo $key->at_code; ?> btn btn-info " data-toggle="modal" data-target="#costacc<?php echo $key->at_code; ?>"><span class="glyphicon glyphicon-search"></span></a>
							</span>
						</div>
					</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
					<div class="form-group">
						<label class="col-lg-2 control-labelt">A/C Acc. Deprecition:</label>
						<div class="input-group ">
							<input type="hidden" readonly="" class="form-control " name="at_acaccid" id="at_acaccid4<?php echo $key->at_code; ?>" value="<?php echo $key->at_acaccid; ?>">
							<input type="text" readonly="" class="form-control " name="at_acacc" id="at_codename4<?php echo $key->at_code; ?>" value="<?php echo $key->at_acacc; ?>">
							<span class="input-group-btn" >
								<a class="deacc<?php echo $key->at_code; ?> btn btn-info " data-toggle="modal" data-target="#deacc<?php echo $key->at_code; ?>"><span class="glyphicon glyphicon-search"></span></a>
							</span>
						</div>
					</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-12">
									<div class="form-group">
							          	<label class="col-lg-2 control-labelt">Cost Code:</label>
							            <div class="input-group ">
							            	<input type="hidden" readonly="" class="form-control " name="costcode" id="codecostcode<?php echo $key->at_code; ?>" value="<?php echo $key->at_idcost; ?>">
							            	<input type="text" readonly="" class="form-control " name="costname" id="codenamecost<?php echo $key->at_code; ?>" value="<?php echo $key->at_namecost; ?>">
											<span class="input-group-btn" >
				                       			<a class="costt<?php echo $key->at_code; ?> btn btn-info " data-toggle="modal" data-target="#costt<?php echo $key->at_code; ?>"><span class="glyphicon glyphicon-search"></span></a>
				                    		</span>
                                   		</div>
							        </div>
					</div>
								</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="ac<?php echo $key->at_code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
       </div>
         <div class="modal-body">
             <div id="acc<?php echo $key->at_code; ?>"></div>
         </div>
     </div>
   </div>
</div>
<div class="modal fade" id="at<?php echo $key->at_code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
       </div>
         <div class="modal-body">
             <div id="att<?php echo $key->at_code; ?>"></div>
         </div>
     </div>
   </div>
</div>
<div class="modal fade" id="glyphicon<?php echo $key->at_code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
       </div>
         <div class="modal-body">
             <div id="glyphicon<?php echo $key->at_code; ?>"></div>
         </div>
     </div>
   </div>
</div>
<div class="modal fade" id="costacc<?php echo $key->at_code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
       </div>
         <div class="modal-body">
             <div id="costacct<?php echo $key->at_code; ?>"></div>
         </div>
     </div>
   </div>
</div>
<div class="modal fade" id="deacc<?php echo $key->at_code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Account Chart</h4>
       </div>
         <div class="modal-body">
             <div id="deacct<?php echo $key->at_code; ?>"></div>
         </div>
     </div>
   </div>
</div>
<div class="modal fade" id="costt<?php echo $key->at_code; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	 <div class="modal-content">
	   <div class="modal-header bg-info">
	     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	     <h4 class="modal-title" id="myModalLabel">Cost Code</h4>
	   </div>
	     <div class="modal-body">
	         <div id="decost<?php echo $key->at_code; ?>"></div>
	     </div>
	 </div>
	</div>
</div>
<script>
$(".ac"+<?php echo $key->at_code; ?>).click(function(){
 	$('#acc'+<?php echo $key->at_code; ?>).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 	$("#acc"+<?php echo $key->at_code; ?>).load('<?php echo base_url(); ?>index.php/share/accchart/1'+<?php echo $key->at_code; ?>);
});

$(".at"+<?php echo $key->at_code; ?>).click(function(){
 	$('#att'+<?php echo $key->at_code; ?>).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 	$("#att"+<?php echo $key->at_code; ?>).load('<?php echo base_url(); ?>index.php/share/accchart/2'+<?php echo $key->at_code; ?>);
});

$(".costacc"+<?php echo $key->at_code; ?>).click(function(){
 	$('#costacct'+<?php echo $key->at_code; ?>).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 	$("#costacct"+<?php echo $key->at_code; ?>).load('<?php echo base_url(); ?>index.php/share/accchart/3'+<?php echo $key->at_code; ?>);
});
$(".deacc"+<?php echo $key->at_code; ?>).click(function(){
 	$('#deacct'+<?php echo $key->at_code; ?>).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 	$("#deacct"+<?php echo $key->at_code; ?>).load('<?php echo base_url(); ?>index.php/share/accchart/4'+<?php echo $key->at_code; ?>);
});
$(".costt"+<?php echo $key->at_code; ?>).click(function(){
 	$('#decost'+<?php echo $key->at_code; ?>).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 	$("#decost"+<?php echo $key->at_code; ?>).load('<?php echo base_url(); ?>index.php/share/costcode_id/'+<?php echo $key->at_code; ?>);
});
</script>
<?php } ?>
<script>					

 $("#saveasset").click(function(){
  	if ($("#at_code").val()=="") {
	    swal({
	        title: "กรุณากรอกรหัส!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else if ($("#at_typet").val()=="") {
	    swal({
	        title: "กรุณากรอกชื่!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else if ($("#at_acaid1").val()=="") {
	    swal({
	        title: "กรุณาเลือก A/C Asse!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else if ($("#at_acd2").val()=="") {
	    swal({
	        title: "กรุณาเลือก A/C Depreciation!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else if ($("#at_cost3").val()=="") {
	    swal({
	        title: "กรุณาเลือก A/C Cost!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else if ($("#at_acaccid4").val()=="") {
	    swal({
	        title: "กรุณาเลือก A/C Acc. Deprecition!!.",
	        text: "",
	        confirmButtonColor: "#EA1923",
	        type: "error"
	    });
   	}else{
	    var frm = $('#formasset');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                        swal({
                                  title: "Save Completed!!",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                        setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>inventory_area/assettype";
                        }, 500); 
                    }
                });
                ev.preventDefault();
            });
   		$("#formasset").submit();
   	}
});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '150px',
         targets: [ 0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.basic').DataTable();
$('#mfa').attr('class', 'active');
$('#mfa2').attr('style', 'background-color:#dedbd8');
</script>