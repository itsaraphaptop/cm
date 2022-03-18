<div class="content">
<div class="panel panel-body">
		<div class="table-responsive">
	  		<table class="basic table table-hover table-xxs datatable-basic">
			  	<thead>
				    <tr>
				      	<th>Project/Department Name</th>
				      	<th>Type</th>
				      	<th>Code</th>
				      	<th>Year</th>
				      	<th>Period</th>
				      	<th>Active</th>
				    </tr>
			  	</thead>
				 <tbody>
				    <tr>
				    	 <?php foreach ($glar as $ar) {?>
				    	<td><?php echo $ar->project_name; ?></td>
				      	<td><?php echo $ar->gl_type; ?></td>
				      	<td><?php echo $ar->gl_refcode; ?></td>
				      	<td><?php echo $ar->gl_year; ?></td>
				      	<td><?php echo $ar->gl_period; ?></td>
				      	<td><a  type="button" data-toggle="modal" data-target="#opens<?php echo $ar->gl_refcode; ?>"><i class="opens icon-folder-open"></i></a></td>

				    </tr>
				    <?php } ?>
				    <tr>
				    	 <?php foreach ($glap as $ap) {?>
				    	<td><?php echo $ap->project_name; ?></td>
				      	<td><?php echo $ap->gl_type; ?></td>
				      	<td><?php echo $ap->gl_refcode; ?></td>
				      	<td><?php echo $ap->gl_year; ?></td>
				      	<td><?php echo $ap->gl_period; ?></td>
				      	<td><a  type="button" data-toggle="modal" data-target="#opensap<?php echo $ap->gl_refcode; ?>"><i class="opensap icon-folder-open"></i></a></td>

				    </tr>
				    <?php } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>
<?php foreach ($glar as $vv) {?>
			<div id="opens<?php echo $vv->gl_refcode; ?>" class="modal fade" data-backdrop="false">
			  	<div class="modal-dialog modal-lg">
			    	<div class="modal-content">
			      		<div class="modal-header btn-primary">
			        		<button type="button" class="close" data-dismiss="modal">&times;</button>
			        		<h5 class="modal-title">View Post GL</h5>
			      		</div>
			      		<div class="modal-body" id="loadview<?php echo $vv->gl_refcode; ?>">

			      		</div>
			      	</div>
			    </div>
		  	</div>

<script>
	$(".opens").click(function(){
			$("#loadview<?php echo $vv->gl_refcode; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$("#loadview<?php echo $vv->gl_refcode; ?>").load('<?php echo base_url(); ?>gl/load_view_v/<?php echo $vv->gl_refcode; ?>');
		});
</script>
	<?php } ?>
<?php foreach ($glap as $app) {?>
			<div id="opensap<?php echo $app->gl_refcode; ?>" class="modal fade" data-backdrop="false">
			  	<div class="modal-dialog modal-lg">
			    	<div class="modal-content">
			      		<div class="modal-header btn-primary">
			        		<button type="button" class="close" data-dismiss="modal">&times;</button>
			        		<h5 class="modal-title">View Post GL</h5>
			      		</div>
			      		<div class="modal-body" id="loadviewap<?php echo $app->gl_refcode; ?>">

			      		</div>
			      	</div>
			    </div>
		  	</div>

<script>
	$(".opensap").click(function(){
			$("#loadviewap<?php echo $app->gl_refcode; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$("#loadviewap<?php echo $app->gl_refcode; ?>").load('<?php echo base_url(); ?>gl/load_view_v/<?php echo $app->gl_refcode; ?>');
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
   $('.basicc').DataTable();
</script>
