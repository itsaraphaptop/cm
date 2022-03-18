<table class="table table-xxs table-hover datatable-basics" >
	<thead>
		<tr>
			<th>No.</th>
			<th>PO Code</th>
			<th>PO Name</th>
			<th width="5%">Active</th>
		</tr>
	</thead>
	<tbody>
	<?php   $n =1;?>
	<?php foreach ($popo as $valpo){ ?>
		<tr>
			<th scope="row"><?php echo $n;?></th>
			<td><?php echo $valpo->po_pono; ?></td>
			<td><button class="btncostup<?php echo $id; ?> btn btn-primary" data-dismiss="modal" data-cost_code="<?php echo $valpo->po_pono;?>">เลือก</button></td>
		</tr>

	<?php $n++; } ?>
	</tbody>
</table>
<script>
        $(".btncostup<?php echo $id;?>").click(function(){
        $("#vatnamei<?php echo $id; ?>").val($(this).data('cost_code'));
    });      
</script>
