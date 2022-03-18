<table class="table table-hover table table-xxs" id="prepare">
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
			<td><button class="btn btn-primary" prepareBy_code="<?=$value['m_code'];?>" prepareBy_name="<?=$value['m_name'];?>" onclick="member($(this))" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#prepare').DataTable();

	function member(el) {
		var prepareBy_code = el.attr('prepareBy_code');
		var prepareBy_name = el.attr('prepareBy_name');
		$('#prepareBy_code').val(prepareBy_code);
		$('#prepareBy_name').val(prepareBy_name);
	}
</script>