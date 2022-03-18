<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>เลขที่ใบสั่งจ้าง</th>
<th>ชื่อผู้รับจ้างช่วง / บริษัท</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
	<?php $n=1; foreach ($res as $key ) { ?>
	<tr>
	<td><?php echo $n; ?></td>
	<td><?php echo $key->lo_lono; ?></td>	
	<td><?php echo $key->contactor; ?></td>	
	<td><button class="btncostup<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
	</tr>
	<?php $n++; } ?>
</tbody>
</table>

<?php $n=1; foreach ($res as $key ) { ?>
<script>
    $(".btncostup<?php echo $n;?>").click(function(){
    	
        $('#wo').val("<?php echo $key->lo_lono; ?>");
    });      
</script>
<?php $n++; } ?>