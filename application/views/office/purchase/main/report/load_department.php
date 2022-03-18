<table class="table table-xxs table-hover datatable-basics" >
	<thead>
		<tr>
			<th>No.</th>
			<th>รหัส po</th>
			<th>ชื่อ po</th>
			<th width="5%">จัดการ</th>
		</tr>
	</thead>
	<tbody>
	<?php   $n =1;?>
	<?php foreach ($depart as $valpo){ ?>
		<tr>
			<th scope="row"><?php echo $n;?></th>
			<td><?php echo $valpo->department_code; ?></td>
			<td><?php echo $valpo->department_title; ?></td>
			<td><button class="btncostup<?php echo $id; ?> btn btn-primary" data-dismiss="modal" data-cost_code="<?php echo $valpo->department_id;?>" data-name="<?php echo $valpo->department_title;?>">เลือก</button></td>
		</tr>

	<?php $n++; } ?>
	</tbody>
</table>
<script>
        $(".btncostup<?php echo $id;?>").click(function(){
        $("#eq").val("department");


        $("#vatnamei<?php echo $id; ?>").val($(this).data('name'));
    });      
</script>
