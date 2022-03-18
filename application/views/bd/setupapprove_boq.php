<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<!-- <div class="content-wrapper">
 -->
					<!-- Highlighting rows and columns -->
					<!-- <h1>Approve BILL OF QUALITY (BOQ)</h1> -->
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-checkbox-checked"></i> Approve BILL OF QUALITY (BOQ)
							<p></p>
						</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table basic table-hover no-footer table-xxs table-striped">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th width="20%" class="text-center">Tender No :</th>
										<th class="text-center">Project Name</th>
										<!-- <th class="text-center">Status</th> -->
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
										<!-- <td class="text-center">
							<?php
											if($value['bd_bdstats']==1){
										echo "In Process";
										}else if($value['bd_bdstats']==2){
										echo "Wait";
										}else if($value['bd_bdstats']==3){
										echo "Reject Join Bid";
										} ?>
										</td> -->
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
										<td class="text-center">
											<a href="<?php echo base_url(); ?>bd/approve_billof/<?=$value['bd_tenid'];?>/<?php echo $project_id; ?>"
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
					</div>
				</div>
			</div>
		</div>
	</div>
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
		$('.basic').DataTable();
		$('#boq').attr('class', 'active');
		$('#approve_bg').attr('style', 'background-color:#dedbd8');
	</script>
</div>