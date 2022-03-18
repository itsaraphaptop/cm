<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
		<div class="content">
			<div class="panel panel-flat">
				<div class="panel-heading">
				<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Asset Expense Type<p></p></h6>
					<div class="heading-elements">
						<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
						<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=assetexpense.mrt" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
						<a type="button" data-toggle="modal" data-target="#newasset" class="newasset btn btn-info"><i class="icon-plus-circle2"></i> New</a>
					</div>

				</div>
				
				<div class="panel-body">
					<div class="table-responsive">
					<table class="basic table table-hover table-striped table-xxs datatable-basic">
						<thead>
							<tr>
								<th>Cost Code</th>
								<th>Cost Name</th>
								<th>Maintenance Name</th>
								<th>Next Due (Day)</th>
								<th>Alert Before (Day)</th>
								<th>Next Mile</th>
								<th>Lock Alert</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($res as $key ) { ?>
							<tr>
								<td><?php echo $key->de_costid; ?></td>
								<td><?php echo $key->de_costname; ?></td>
								<td><?php echo $key->de_maintenance; ?></td>
								<td><?php echo $key->de_due; ?></td>
								<td><?php echo $key->de_before ;?></td>
								<td><?php echo $key->de_mile; ?></td>
								<td>
									<?php 
									if ($key->de_lock == 1) {
										echo "None";
									}elseif ($key->de_lock == 2) {
										echo "Date";
									}else{
										echo "Mile";
									} ?>
										
									</td>
								<td style="text-align: center;">
									<a  type="button" data-toggle="modal" data-target="#editasset<?php echo $key->de_id; ?>"><i class="icon-pencil7"></i></a>
									<a href="<?php echo base_url(); ?>asset_active/ediasset/<?php echo $key->de_id; ?>" ><i class="glyphicon glyphicon-trash"></i></a></td>
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

<div id="newasset" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header btn-primary">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h5 class="modal-title">Setup Asset Expense Type</h5>
		    </div>
			<form action="<?php echo base_url(); ?>asset_active/depremethod" method="post" id="insert">
				<div class="modal-body">
					<div class="row">
			  			<div class="col-xs-6">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Cost Code</label>
				  				<div class="input-group ">
									<input type="hidden" class="form-control " name="de_costid" id="codecostcodeint" readonly="true">
									<input type="text"
									class="form-control " name="de_costname" id="costnameint" readonly="true">
									<span class="input-group-btn" >
										<a class="modalcost btn btn-info btn-sm" data-toggle="modal" data-target="#costcode" id="costttttt"><span class="glyphicon glyphicon-search"></span></a>
									</span>
								</div>
				  			</div>
			  			</div>
			  			<div class="col-xs-6">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Maintenance Name</label>
				  				<input type="text" class="form-control " id="de_maintenance" name="de_maintenance">
				  			</div>
			  			</div>
					</div>
					<div class="row">
			  			
			  			<div class="col-xs-4">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Next Due</label>
				  				<input type="text" class="form-control " id="de_due" name="de_due">
				  			</div>
			  			</div>
			  			<div class="col-xs-4">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Alert Before</label>
				  				<input type="text" class="form-control " id="de_before" name="de_before">
				  			</div>
			  			</div>
			  			<div class="col-xs-4">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Next Mile</label>
				  				<input type="text" class="form-control " id="de_mile" name="de_mile">
				  			</div>
			  			</div>
					</div>
					<div class="row">
			  			<div class="col-xs-4">
				  			<div class="form-group">
								<label class="display-block">Lock alert:</label>
								<label class="radio-inline">
									<input type="radio" name="de_lock" id="de_lock" class="styled" value="1">
									None
								</label>
								<label class="radio-inline">
									<input type="radio" name="de_lock" id="de_lock1" class="styled" value="2">
									Date
								</label>
								<label class="radio-inline">
									<input type="radio" name="de_lock" id="de_lock2" class="styled" value="3">
									Mile
								</label>
                			</div>
			  			</div>

					</div>
					<div class="modal-footer">
						<button type="submit" id="saveadd" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
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
				<h4 class="modal-title" id="myModalLabel">Cost Code</h4>
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
<?php foreach ($res as $key ) { ?>
<div id="editasset<?php echo $key->de_id; ?>" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header btn-primary">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h5 class="modal-title">Setup Asset Expense Type</h5>
		    </div>
			<form action="<?php echo base_url(); ?>asset_active/depremethod_edit/<?php echo $key->de_id; ?>" method="post" id="insert">
				<div class="modal-body">
					<div class="row">
			  			<div class="col-xs-6">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Cost Code</label>
				  				<div class="input-group ">
									<input type="hidden" class="form-control " name="de_costid" id="codecostcodeint<?php echo $key->de_id; ?>" readonly="true" value="<?php echo $key->de_costid; ?>">
									<input type="text"
									class="form-control " name="de_costname" id="costnameint<?php echo $key->de_id; ?>" readonly="true" value="<?php echo $key->de_costname; ?>">
									<span class="input-group-btn" >
										<a class="modalcost<?php echo $key->de_id; ?> btn btn-info btn-sm" data-toggle="modal" data-target="#costcode<?php echo $key->de_id; ?>" id="costttttt"><span class="glyphicon glyphicon-search"></span></a>
									</span>
								</div>
				  			</div>
			  			</div>
			  			<div class="col-xs-6">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Maintenance Name</label>
				  				<input type="text" class="form-control " value="<?php echo $key->de_maintenance; ?>" id="de_maintenance" name="de_maintenance">
				  			</div>
			  			</div>
					</div>
					<div class="row">
			  			
			  			<div class="col-xs-4">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Next Due</label>
				  				<input type="text" class="form-control " value="<?php echo $key->de_due; ?>" id="de_due" name="de_due">
				  			</div>
			  			</div>
			  			<div class="col-xs-4">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Alert Before</label>
				  				<input type="text" value="<?php echo $key->de_before; ?>" class="form-control " id="de_before" name="de_before">
				  			</div>
			  			</div>
			  			<div class="col-xs-4">
				  			<div class="form-group">
				  				<label calss="display-block text-semibold">Next Mile</label>
				  				<input type="text" value="<?php echo $key->de_mile; ?>" class="form-control " id="de_mile" name="de_mile">
				  			</div>
			  			</div>
					</div>
					<div class="row">
			  			
			  			<div class="col-xs-4">
				  			<div class="form-group">
								<label class="display-block">Lock alert:</label>
								<select type="text" class="form-control input-sm" id="de_lock" name="de_lock">
                 					<?php if($key->de_lock == '1'){ ?><option value="1" selected>None</option><?php } else { ?><option value="1">None</option><?php }?>

                 					<?php if($key->de_lock == '2'){ ?><option value="2" selected>Date</option><?php } else { ?><option value="2">Date</option><?php }?>

                 					<?php if($key->de_lock == '3'){ ?><option value="3" selected>Mile</option><?php } else { ?><option value="3">Mile</option><?php }?>
                 				</select>
                			</div>
			  			</div>

					</div>
					<div class="modal-footer">
						<button type="submit" id="saveadd" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
					</div>
				</div>
			</form>
	    </div>
	</div>
</div>
<div class="modal fade" id="costcode<?php echo $key->de_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Cost Code</h4>
			</div>
			<div class="modal-body">
				<div id="modal_cost<?php echo $key->de_id; ?>"></div>
			</div>
		</div>
	</div>
</div>
<script>
	$(".modalcost<?php echo $key->de_id; ?>").click(function(){
 	$('#modal_cost<?php echo $key->de_id; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
 	$("#modal_cost<?php echo $key->de_id; ?>").load('<?php echo base_url(); ?>index.php/share/costcode_id/<?php echo $key->de_id; ?>');
});
</script>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '200px',
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
$('#mfa3').attr('style', 'background-color:#dedbd8');
</script>