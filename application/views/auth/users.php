<div id="modal_users" class="modal fade in" style="display: block; padding-right: 17px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h2 class="modal-title"><img src="<?php echo base_url(); ?>icon_cm/student.png"> Users Online <span class="badge bg-success-400" style="color: #66BB6A;">&nbsp;&nbsp;</span></h2>
			</div>

			<div class="modal-body">
				<table class="table_user table table-hover">
					<thead>
						<tr>
							<th style="width: 20px;">#</th>
							<th style="width: 20px;"></th>
							<th>Name</th>
							<th>E-mail</th>
							<th>Inbox</th>
							<th>Online</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($users as $key => $value) {
					?>
						<tr>
							<td><?= $i++ ?></td>
							<td>
								<img src="<?php echo base_url(); ?>profile/<?= $value['uimg'] ?>" class="img-circle img-sm" alt="">
							</td>
							<td><?= $value['m_name'] ?></td>
							<td><?= $value['m_email'] ?></td>
							<td class="text-center"><a data-toggle="modal" data-target="#MyChat"><i class=" icon-bubbles10"></i></a></td>
							<td class="text-center">
							<?php
								if ($value['LoginStatus'] != 1) {
									echo '<span class="badge bg-danger-400" style="color: #F44336;">1</span>';
								}else{
									echo '<span class="badge bg-success-400" style="color: #66BB6A;">2</span>';
								}
							?>
							</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
				<div class="col-lg-offset-4 col-lg-4" col-md-offset-4 col-md-4><a class="btn btn-info btn-block">Statics Usage</a></div>
			</div>

			<div class="modal-footer"><br/>
				<div class="col-lg-offset-4 col-lg-4" col-md-offset-4 col-md-4><button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Close</button></div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="MyChat" role="dialog">
	<div class="modal-dialog modal-md">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h1>COMING SOON!!</h1>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
// $(document).ready(function() {
    // $('.table_user').DataTable();
	$('.table_user').dataTable( {
	  "scrollY": "500px",
	  "scrollCollapse": true,
	  "paging": false,
	  "responsive": true
	} );
// } );
</script>