<table class="table table-hover table table-xxs" id="asset">
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
			<td><?=$value['fa_assetcode'];?></td>
			<td><?=$value['fa_asset'];?></td>
			<td><button class="btn btn-primary" asset_brand="<?=$value['fa_all1'];?>" asset_ser="<?=$value['fa_sr'];?>" asset_code="<?=$value['fa_assetcode'];?>" asset_name="<?=$value['fa_asset'];?>" onclick="asset($(this))" data-dismiss="modal">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#asset').DataTable();
	// band_pro
	// ser_no_pro
	// num_id_pro
	var paste = "<?=$asset;?>";
	function asset(el) {
		var asset_code = el.attr('asset_code');
		var asset_name = el.attr('asset_name');
		var asset_ser = el.attr('asset_ser');
		var asset_brand = el.attr('asset_brand');
		$('#asset_pro'+paste).val(asset_name);
		$('#band_pro'+paste).val(asset_brand);
		$('#ser_no_pro'+paste).val(asset_ser);
		$('#num_id_pro'+paste).val(asset_code);
		// el.parent().parent().remove();
	}
</script>