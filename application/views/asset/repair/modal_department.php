<table class="table table-hover table table-xxs" id="depart">
	<thead>
		<tr>
			<th>No.</th>
			<th>Department Code</th>
			<th>ชื่อแผนก</th>
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
			<td><?=$value['department_code'];?></td>
			<td><?=$value['department_title'];?></td>
			<td><button class="btn btn-primary" department_id="<?=$value['department_id'];?>" onclick="dapartment($(this))" department_title="<?=$value['department_title'];?>" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#depart').DataTable();
	function dapartment(el) {
		var department_id = el.attr('department_id');
		var department_title = el.attr('department_title');
		$('#department_id').val(department_id);
		$('#department_name').val(department_title);
	}
</script>
