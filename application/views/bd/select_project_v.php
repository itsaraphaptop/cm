<!-- <div class="content-wrapper">
 -->
<!-- Highlighting rows and columns -->
<div class="col-xs-12">
	<table class="table basic no-footer table-xxs">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th width="20%" class="text-center">Tender No :</th>
				<th class="text-center">Project Name</th>
				<th width="10%" class="text-center">Status</th>
				<th class="text-center">Control BOQ</th>
				<th class="text-center">Control Budget</th>
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
					<?=$value['bdid'];?>
				</td>
				<td>
					<?=$value['bd_pname'];?>
				</td>
				
					<?php
						switch ($value['bd_status']) {
							case 'win':
								echo "<td class='text-center'><label class='label label-success'>Win</label></td> ";
								break;
							case 'wait':
								echo "<td class='text-center'><label class='label label-success'>Win</label></td>";
								break;
							case 'close':
								echo "<td class='text-center'><label class='label label-warning'>Close</label></td>";
								break;
							case 'loss':
								echo "<td class='text-center'><label class='label label-danger'>Reject Join Bid</label></td>";
								break;
							default:
								echo "<td class='text-center'><label class='label label-info'>In Process</label></td>";
								break;
					} 
					
					if ($value['chkconbqq']=="1") {
						echo "<td class='text-center'><label class='label label-success'>Control</label></td>";
					}elseif($value['chkconbqq']=="0"){
						echo "<td class='text-center'><label class='label label-warning'>Not Control</label></td>";
					}else{
						echo "<td class='text-center'><label class='label label-warning'>Not Control</label></td>";
					}
					if ($value['controlbg']=="2") {
						echo "<td class='text-center'><label class='label label-success'>Control</label></td>";
					}elseif($value['controlbg']=="1"){
						echo "<td class='text-center'><label class='label label-warning'>Not Control</label></td>";
					}else{
						echo "<td class='text-center'><label class='label label-warning'>Not Control</label></td>";

					}?>
				
	
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
					<a href="<?php echo base_url(); ?>bd/boq_main/<?=$value['bdid'];?>/<?php echo $value['project_id']; ?>/0/20/<?php echo $type; ?>"
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
	$('.basic').DataTable();
	$('#mg').attr('class', 'active');
	$('#mc4').attr('style', 'background-color:#dedbd8');
</script>