<table class="table table-hover table table-xxs" id="Mytable3">
	<thead>
		<tr>
			<th>No.</th>
			<th>ชื่อร้านค้า</th>
			<th>ที่อยู่ร้านค้า</th>
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
			<td><button class="btn btn-primary" m_code="<?=$value['m_code'];?>" m_name="<?=$value['m_name'];?>" onclick="member($(this))" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#Mytable3').DataTable();

	function member(el) {
		var m_code = el.attr('m_code');
		var m_name = el.attr('m_name');
		$('#m_code').val(m_code);
		$('#m_name').val(m_name);
	}
</script>

