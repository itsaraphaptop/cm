<table class="table table-hover datatable-basic">
	<thead>
		<tr>
			<th>รหัสโครงการ</th>
			<th>ชื่อโครงการ</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			
			foreach ($project as $key => $value) {
				
		?>
			<tr>
				<td><?= $value['project_code'] ?></td>
				<td><?= $value['project_name'] ?></td>
				<td>
					<button class="selected btn btn-info btn-xxs" project_code="<?= $value['project_code'] ?>" project_name="<?= $value['project_name'] ?>" onclick="myFunction()" >
						เลือก
					</button>
				</td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script type="text/javascript">
	$('.datatable-basic').DataTable();


	function myFunction() {
		var code = $(this).attr('project_code');
		alert(code);
	}
	// $('.selected').click(function(event) {
	// 	project_id = $(this).attr('project_code');
	// 	var name = $(this).attr('project_name');
	// 	$('#name_pj').val(name);

	// });

</script>

<!-- data-dismiss="modal" -->