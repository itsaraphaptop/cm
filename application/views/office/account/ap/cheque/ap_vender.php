<table class="table table-hover table-xxs table-responsive">
  <thead>
    <tr>
      <th >AP No.</th>
      <th >VAT </th>
      <th >W/H TAX</th>
      <th >Amount</th>
    </tr>
  </thead>
	<tbody id="">

		<?php  foreach ($openvd as $key) {  
      
		?>
    <tr> 
        <td><?php echo $key->api_no; ?> </td>
        <td><?php echo $key->api_vatamt; ?> </td>
        <td><?php echo $key->api_wtamt; ?> </td>
        <td><?php echo $key->api_amt; ?> </td>
    </tr>	
    <?php } ?>
	</tbody>
</table>
