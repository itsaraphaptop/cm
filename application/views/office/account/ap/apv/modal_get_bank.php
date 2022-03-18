
  <table class="table table-xxs table-hover datatable-basicxc" >
	  <thead>
	    <tr>
	      <th width="10%">#</th>
	      <th width="20%">Supplier Code</th>
	      <th>Supplier</th>
	      <th width="10%" class="text-center">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php $n=1; foreach ($gbank as $b) {
				
			?>
	    <tr>
	        <th><?php echo $n; ?></th>
	        <td><?php echo $b->bank_code; ?></td>
	        <td><?php echo $b->bank_name; ?></td>
	        <td><button class="btnre<?php echo $n; ?> label label-xs label-primary" 
	        data-bank_code<?php echo $n; ?>="<?php echo $b->bank_code; ?>" 
	        data-bank_name<?php echo $n; ?>="<?php echo $b->bank_name; ?>"
	        data-dismiss="modal">Select</button></td>
	          
	    </tr>
   <script>
   $(".btnre<?php echo $n; ?>").click(function(){
    
     $("#bank_id").val($(this).data("bank_code<?php echo $n; ?>"));
     $("#bankname").val($(this).data("bank_name<?php echo $n; ?>"));
    
     loadass();
   });
  
   </script>
 <?php  $n++; } ?>
	  	
	  </tbody>
	</table>
<script>
  $(".datatable-basicxc").DataTable();
</script>
      