<table class="table table-xxs">
	<thead>
		<tr>
			<!-- <th>Select</th> -->
			<th>PR No.</th>
			<th>Material Code</th>
			<th>Material Name</th>
			<th>Cost Code</th>
			<th>Cost Name</th>
			<th>Qty</th>
			<th>Unit</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; foreach ($res as $key => $value) {?>
		<tr>
			<!-- <td><input type="checkbox" id="chkpr" name=""></td> -->
			<td><?php echo $value->pri_ref; ?></td>
			<td><?php echo $value->pri_matcode; ?></td>
			<td><?php echo $value->pri_matname; ?></td>
			<td><?php echo $value->pri_costcode; ?></td>
			<td><?php echo $value->pri_costname; ?></td>
			<th><?php echo $value->pri_qty; ?></th>
			<th><?php echo $value->pri_unit; ?></th>
			<th><button class="insprne<?php echo $n; ?> label label-primary" data-matcode="<?php echo $value->pri_matcode; ?>"><?php echo $value->pri_id;?> SELECT</button></th>
		</tr>
		<div>
			
		</div>
		<script>
			$('.insprne<?php echo $n; ?>').click(function(){

				var url="<?php echo base_url(); ?>purchase_active/flag_pr";
		          var dataSet={
		            pr_prno : "<?php echo $value->pri_ref; ?>",
					pri_id : "<?php echo $value->pri_id; ?>",
		            };
		            $.post(url,dataSet,function(data){

		            });

		           var url="<?php echo base_url(); ?>purchase_active2/editpo";
		          var dataSet={
		          	pono : "<?php echo $pono; ?>",
		            pr_prno : "<?php echo $value->pri_ref; ?>",
					pri_id : "<?php echo $value->pri_id; ?>",
					matcode: "<?php echo $value->pri_matcode; ?>",
					poi_matname: "<?php echo $value->pri_matname; ?>",
					poi_costcode: "<?php echo $value->pri_costcode; ?>",
					poi_costname: "<?php echo $value->pri_costname; ?>",
					poi_qty: "<?php echo $value->pri_qty; ?>",
					poi_unit: "<?php echo $value->pri_unit; ?>",
					poi_priceunit: "<?php echo $value->pri_priceunit; ?>",
		            };
		            $.post(url,dataSet,function(data){
		            	
		            }); 
		            // setTimeout(function() {
					// 	window.location.href = "<?php echo base_url(); ?>purchase/editpo/<?php echo $pono; ?>";
					// }, 100);

			});
		
		</script>
		<?php $n++; } ?>
	</tbody>
</table>
