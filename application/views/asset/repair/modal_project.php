<table class="table table-hover table table-xxs" id="Project">
	<thead>
		<tr>
			<th>No.</th>
			<th>Project Code</th>
			<th>ชื่อโครงการ</th>
			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = 1;
			foreach ($rows as $key => $value) { 
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value['project_code'];?></td>
			<td><?=$value['project_name'];?></td>
			<td><button class="btn btn-primary" project_id="<?=$value['project_id'];?>" onclick="project($(this))" project_name="<?=$value['project_name'];?>" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#Project').DataTable();
	function project(el) {
		var project_id = el.attr('project_id');
		var project_name = el.attr('project_name');
		$('#project_id').val(project_id);
		$('#project_name').val(project_name);
	}
</script>
