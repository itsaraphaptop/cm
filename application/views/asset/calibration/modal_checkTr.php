<table class="table table-hover table table-xxs" id="checkTr">
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
			<td><button class="btn btn-primary" checkBy_code_tr="<?=$value['m_code'];?>" checkBy_name_tr="<?=$value['m_name'];?>" onclick="member_tr($(this))" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#checkTr').DataTable();
	var paste = "<?=$asset;?>";
	function member_tr(el) {
		// var checkBy_code = el.attr('checkBy_code');
		var checkBy_name_tr = el.attr('checkBy_name_tr');
		// $('#user_check').val(checkBy_code);
		$('#user_check'+paste).val(checkBy_name_tr);
	}
</script>