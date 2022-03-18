<table class="table table-hover table table-xxs" id="check">
	<thead>
		<tr>
			<th>No.</th>
			<th>Code</th>
			<th>Name</th>
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
			<td><?=$value['m_code'];?></td>
			<td><?=$value['m_name'];?></td>
			<td><button class="btn btn-primary" checkBy_code="<?=$value['m_code'];?>" checkBy_name="<?=$value['m_name'];?>" onclick="member($(this))" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#check').DataTable();

	function member(el) {
		var checkBy_code = el.attr('checkBy_code');
		var checkBy_name = el.attr('checkBy_name');
		$('#checkBy_code').val(checkBy_code);
		$('#checkBy_name').val(checkBy_name);
	}
</script>