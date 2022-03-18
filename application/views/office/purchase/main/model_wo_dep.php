


<div id="v_dep" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">ใบขอซื้อ</h4>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-hover table-xxs datatable-basic">
					<thead>
						<tr>
							<th width="20%">No.PR</th>
							<th width="20%">Pr Date</th>
							<th width="30%">Name Requsition</th>
							<th width="10%">Attach</th>
							<th width="20%">Actions</th>
						</tr>
					</thead>
					<tbody id="dep_vv">
				<?php
					foreach ($data as $key => $value) {
							
				?>
					<tr>
						<td><?= $value->pr_prno; ?></td>
						<td class="text-left"><?= $value->pr_prdate; ?></td>
						<td class="text-left"><?= $value->pr_reqname; ?></td>
					<td>
						<?php 	$this->db->select( '*' );
								$this->db->where( 'pr_ref', $value->pr_prno );
								$this->db->where( 'user', $value->compcode );
								$q = $this->db->get( 'select_file_pr' )->num_rows(); {?>
							<?php if($q==0){?>
								<i></i>
							<?php}else{?>
							
							<a href="#" id="popover-show" data-placement="bottom" data-html="true"><i class="icon-attachment"></i></a>
								<script>
								var id_pr = "<?= $value->pr_prno; ?>"
								$.post('<?php echo base_url(); ?>purchase/loadfile', {
									id_pr: id_pr
								}, function() {}).done(function(data) {
									// $('#view_pr').html(data);
									$('#popover-show').popover({
									title: 'Attach File',
									content: data,
									trigger: 'click'
								}).on('shown.bs.popover', function() {
									// alert('Shown event fired.')
								});
								});
								
								</script>
							
						
							<?php } ?>
							<?php } ?>
					</td>
						<td style="text-align: center;" ><a href="<?php echo base_url(); ?>pr/openpr/<?= $value->pr_prno; ?>" target="_blank"><i class="icon-folder-open"></i></a></td>
					</tr>
				<?php
					}
				?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '10px',
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
	$('.datatable-basic').DataTable();

</script>