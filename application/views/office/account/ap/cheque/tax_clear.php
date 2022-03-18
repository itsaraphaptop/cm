<table class="table table-hover table-xxs table-responsive">
  <thead>
    <tr>
      <th width="25%">Vender Name</th>
      <th>Tax ID</th>
      <th>Branch No.</th>
      <th>Tax Invoice No.</th>
      <th>Amount</th>
      <th>VAT</th>
    </tr>
  </thead>
	<tbody id="">
		<?php  foreach ($openvd as $val) { }
    $qevb = $this->db->query("select * from vender where vender_code='$val->ap_vender'");
    $rvenb = $qevb->result();
    foreach ($rvenb as $dd) {  }
			
 				?>
 				<tr> 
        <td><?php echo $dd->vender_name; ?> </td>
        <td><?php echo $dd->vender_tax; ?> </td>
        <td><?php ?></td>
        <td>
          <input type="text" name="taxinv" value="<?php echo $val->api_inv; ?>" class="form-control">
          <input type="hidden" name="vender_id" value="<?php echo $val->ap_vender; ?>" class="form-control">
        </td>
        <td><?php echo $val->api_netamt; ?> </td>
        <td><?php echo $val->api_vatamt; ?> </td>
    </tr> 
	</tbody>
</table>
