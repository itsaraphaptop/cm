<!-- <div class="content-wrapper">
 -->
<!-- Highlighting rows and columns -->
<div class="col-xs-12">
	<table class="table basic no-footer table-xxs">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">Tender No :</th>
				<th class="text-center">Project Name</th>
				<th width="10%" class="text-center">Status</th>
				<th hidden></th>
				<th width="10%" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
									$i= 1;
									foreach ($project_bd as $key => $value) {
								?>

			<tr>
				<td class="text-center">
					<?=$i;?>
				</td>
				<td>
					<?=$value['bd_tenid'];?>
				</td>
				<td>
					<?=$value['bd_pname'];?>
				</td>
				<td class="text-center">
					<?php
						switch ($value['bd_status']) {
							case 'win':
								echo "<label class='label label-success'>Win</label>";
								break;
							case 'wait':
								echo "<label class='label label-success'>win</label>";
								break;
							case 'close':
								echo "<label class='label label-warning'>Close</label>";
								break;
							case 'loss':
								echo "<label class='label label-danger'>Reject Join Bid</label>";
								break;
							default:
								echo "<label class='label label-info'>In Process</label>";
								break;
						}
						 ?>
				</td>
				<?php
										$this->db->select('project_id');
										$this->db->from('project');
										$this->db->where('bd_tenid', $value['bd_tenid']);
										$queryk = $this->db->get()->result();
										$project_id=0;
										foreach ($queryk as $pjj ) {
											$project_id = $pjj->project_id;
										}
									?>
				<td class="text-center" hidden>
					<?php
											if($value['type_in']=="project"){ 
											$type = "p";
											?>
					<span class="label bg-blue">Project</span>
					<?php }else{ 
											$type = "d";
											?>
					<span class="label bg-success-400">Department</span>
					<?php } ?>
				</td>
				<td class="text-center">
					<a href="<?php echo base_url(); ?>bd/boq_main/<?=$value['bd_tenid'];?>/<?php echo $project_id; ?>/0/20/<?php echo $type; ?>"
					 class="label label-primary label-xxs">
						<i class="icon-folder-open"></i> Select</a>
				</td>
			</tr>
			<?php
								$i++; ?>

			<?php } ?>

		</tbody>
	</table>
</div>
<!-- </div>
 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '100px',
			targets: [0]
		}],
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		language: {
			search: '<span>Filter:</span> _INPUT_',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: {
				'first': 'First',
				'last': 'Last',
				'next': '&rarr;',
				'previous': '&larr;'
			}
		},
		drawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
		},
		preDrawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
		}
	});
	$('.basicssss').DataTable();
	$('#mg').attr('class', 'active');
	$('#mc4').attr('style', 'background-color:#dedbd8');
</script>