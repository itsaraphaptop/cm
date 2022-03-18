<?php foreach ($res as $key => $value) {
$ic_type = $value->ic_type;
$start_accost = $value->start_accost;
$end_accost = $value->end_accost;
$startrev = $value->startrev;
$endrev = $value->endrev;
$glrap = $value->glrap;
$startexp = $value->startexp;
$endexp = $value->endexp;
$acdate = $value->acdate;
$chkvat = $value->chkvat;
$glrar = $value->glrar;
$dptandproj = $value->dptandproj;
$chkpostgl = $value->auto_post_gl;
} ?>

<form id="formpost" name="formpost" action="<?php echo base_url(); ?>syscode_active/acc_defualt" method="post">
<div class="row">
<div class="col-lg-4">
<div class="row">
	<div class="form-group">
		<label class="col-lg-3 control-label">A/C COST:</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="start_cost" name="startcost" value="<?php echo $start_accost; ?>" class="form-control">
						<div class="input-group-btn">
							<a class="open46 btn btn-info btn-icon" data-toggle="modal" data-target="#open46"><i class="icon-search4"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="end_cost" name="endcost" value="<?php echo $end_accost; ?>" class="form-control">
						<div class="input-group-btn">
							<a class="open47 btn btn-info btn-icon" data-toggle="modal" data-target="#open47"><i class="icon-search4"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="form-group">
		<label class="col-lg-3 control-label">A/C REVENUE:</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="start_rev" name="startrev" value="<?php echo $startrev; ?>" class="form-control">
						<div class="input-group-btn">
							<a class="open48 btn btn-info btn-icon" data-toggle="modal" data-target="#open48"><i class="icon-search4"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" id="end_rev" name="endrev" value="<?php echo $endrev; ?>" class="form-control">
						<div class="input-group-btn">
							<a class="open49 btn btn-info btn-icon" data-toggle="modal" data-target="#open49"><i class="icon-search4"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="form-group">
		<label class="col-lg-5 control-label">GL Retention AP:</label>
		<div class="col-lg-7">
			<label class="radio-inline">
			<input type="radio" class="styled"<?php if ($glrap=="ap") { echo "checked='checked'";}?> name="glrap" value="ap">
				AP
			</label>
			<label class="radio-inline">
			<input type="radio" class="styled"<?php if ($glrap=="paid") { echo " checked='checked'";}?> name="glrap" value="paid">
				Paid (PL/PV)
			</label>
			
		</div>
	</div>
</div>
<div class="row">
	<div class="form-group">
		<label class="col-lg-5 control-label">GL Auto Post :</label>
		<div class="col-lg-7">
							<?php if ($chkpostgl=="Y") {?>
								<input type="checkbox" id="chkatpost" checked="checked">
							<?php }else{?>
								<input type="checkbox" id="chkatpost">
							<?php } ?>
								
								<input type="hidden" id="chkglautopost" value="<?php echo $chkvat; ?>" name="chkglautopost">
						
			
		</div>
	</div>
</div>
</div>
<div class="col-lg-4">
	<div class="row">
		<div class="form-group">
			<label class="col-lg-3 control-label">A/C Expense:</label>
			<div class="col-lg-9">
				<div class="row">
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" id="start_exp" name="startexp" value="<?php echo $startexp; ?>" class="form-control">
							<div class="input-group-btn">
								<a class="open50 btn btn-info btn-icon" data-toggle="modal" data-target="#open50"><i class="icon-search4"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" id="end_exp" name="endexp" value="<?php echo $endexp; ?>" class="form-control">
							<div class="input-group-btn">
								<a class="open51 btn btn-info btn-icon" data-toggle="modal" data-target="#open51"><i class="icon-search4"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<br>
	<div class="row">
		<div class="form-group">
		<label class="col-lg-3 control-label">Start A/C Date:</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-calendar22"></i></span>
						<input type="text" name="acdate" value="<?php echo $acdate; ?>" class="form-control daterange-single">
					</div>
				</div>
				<div class="col-md-6">
						<div class="checkbox">
							<label>
							<?php if ($chkvat=="Y") {?>
								<input type="checkbox" id="chk" checked="checked">
							<?php }else{?>
								<input type="checkbox" id="chk">
							<?php } ?>
								
								<input type="hidden" id="chkvat" value="<?php echo $chkvat; ?>" name="chkvat">
								A/C VAT
							</label>
						</div>
					</div>
			</div>
		</div>
	</div>
	</div>
	<br>
<div class="row">
	<div class="form-group">
		<label class="col-lg-3 control-label">AR:</label>
		<div class="col-lg-9">
			<label class="radio-inline">
			<input type="radio" class="styled"<?php if ($glrar=="ar") { echo " checked='checked'";}?> name="glrar" value="ar">
				AR
			</label>
			<label class="radio-inline">
			<input type="radio" class="styled"<?php if ($glrar=="receipt") { echo " checked='checked'";}?> name="glrar" value="receipt">
				Receipt (RL/RV)
			</label>
			
			<!-- <label class="radio-inline">
			<?php if ($glrar=="Receipt") {?>
				<input type="radio" class="styled" name="glrar" value="Receipt" checked="checked">
				Receipt (RL/RV)
			<?php }else{ ?>
				<input type="radio" class="styled" name="glrar" value="Receipt">
				Receipt (RL/RV)
			<?php } ?>
			</label> -->
		</div>
	</div>
</div>
</div>
<div class="col-lg-4">
	<!-- <div class="form-group">
		<label class="col-lg-3 control-label"></label>
		<div class="col-md-9 panel panel-default border-grey">
			<label class="radio-inline">
			<?php if ($dptandproj=="dpt") {?>
				<input type="radio" name="flagdpprj" value="dpt" class="styled" checked="checked"> Department Only
			<?php }else{?>
				<input type="radio" name="flagdpprj" value="dpt" class="styled"> Department Only
			<?php } ?>
				
			</label>
			<label class="radio-inline">
			<?php if ($dptandproj=="dptandprj") {?>
				<input type="radio" name="flagdpprj" value="dptandprj" class="styled" checked="checked"> Department And Project
			<?php }else{?>
				<input type="radio" name="flagdpprj" value="dptandprj" class="styled"> Department And Project
			<?php } ?>
				
			</label>
		</div>
	</div> -->
	<div class="form-group">
		<label class="col-lg-4 control-label">Inentory Cost :</label>
		<div class="col-md-5">
			<label class="radio-inline">
			<?php if ($ic_type=="avg") {
				echo "Average";?>
				<!-- <input type="radio" name="iccost" value="avg" class="styled" checked="checked"> Average -->
			<?php }else{ echo "FIFO"; ?>
				<!-- <input type="radio" name="iccost" value="avg" class="styled"> Average -->
			<?php } ?>
				
			</label>
			<!-- <label class="radio-inline">
			<?php if ($ic_type=="fifo") {?>
				<input type="radio" name="iccost" value="fifo" class="styled" checked="checked"> FIFO
			<?php }else{?>
				<input type="radio" name="iccost" value="fifo" class="styled"> FIFO
			<?php } ?>
				
			</label> -->
		</div>
	</div>
</div>

</div>
<?php for ($i=45; $i <=51 ; $i++) { ?>
	  <!-- Basic modal -->
					<div id="open<?php echo $i; ?>" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Select Account <?php echo $i; ?></h5>
								</div>

								<div class="modal-body">
								 <div id="load<?php echo $i; ?>"></div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /basic modal -->

					<script type="text/javascript">
					$(".open<?php echo $i; ?>").click(function(){
						$("#load<?php echo $i; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
						$("#load<?php echo $i; ?>").load("<?php echo base_url(); ?>syscode/load_acc/<?php echo $i; ?>");
					});
					</script>
<?php } ?>
<legend></legend>
<div class="row">
	<div class="modal-footer">
		<button type="button" id="saveh" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
		<a id="fa_close" href="<?php echo base_url(); ?>data_master" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
	</div>
</div>
</form>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
 <script>
 $('.daterange-single').daterangepicker({
        singleDatePicker: true,
         locale: {
            format: 'YYYY-MM-DD'
        }
    });
 $("#chk").click(function(){
 	if ($("#chk").prop("checked")) {
            $("#chkvat").val("Y");
        }else{
            $("#chkvat").val("");
        }
 });
 $("#chkatpost").click(function(){
 	if ($("#chkatpost").prop("checked")) {
            $("#chkglautopost").val("Y");
        }else{
            $("#chkglautopost").val("");
        }
 });
$("#saveh").click(function(e){
	var frm = $('#formpost');
	frm.submit(function (ev) {
				 $.ajax({
				     type: frm.attr('method'),
				     url: frm.attr('action'),
				     data: frm.serialize(),
				         success: function (data) {
					swal({
						title: "Save Completed!!.",
						text: "",
						confirmButtonColor: "#66BB6A",
						type: "success"
					});
						
				     }
				 });
				 ev.preventDefault();
	});
	 $("#formpost").submit(); //Submit  the FORM
});

 </script>