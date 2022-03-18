<table class="table table-hover table table-xxs" id="Mytable1">
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
			<td><?=$value['vender_name'];?></td>
			<td><?=$value['vender_address'];?></td>
			<td><button class="btn btn-primary" vender_id="<?=$value['vender_id'];?>" vender_name="<?=$value['vender_name'];?>" onclick="vender($(this))" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#Mytable1').DataTable();
	function vender(el) {
		var vender_id = el.attr('vender_id');
		var vender_name = el.attr('vender_name');
		$('#vender_id').val(vender_id);
		$('#vender_name').val(vender_name);
	}
</script>
