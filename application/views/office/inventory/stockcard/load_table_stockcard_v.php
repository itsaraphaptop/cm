<div class="dataTables_wrapper no-footer">
<div class="table-responsive">
<table class="table table-striped table-xs">
<thead>
  <tr>
    <th class="text-center">IN/OUT</th>
    <th class="text-center">Project</th>
    <th  class="text-center">Stock Date</th>
    <th  class="text-center">Material Code</th>
    <th  class="text-center">Material Name</th>
    <th  class="text-center">qty</th>
    <th  class="text-center">Unit/Price</th>
    <th  class="text-center">Discount(%)</th>
    <th  class="text-center">Total</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($res as $value) {
$q = $this->db->query("select project_name from project where project_id='$value->stock_project'");
$re = $q->result();
    ?>
    <tr>
      <?php if($value->stock_type=="receive"){ ?>
        <th><span class="label label-info">Stock IN</span></th>
      <?php }else{ ?>
          <th><span class="label label-danger">Stock OUT</span></th>
      <?php } ?>
      <?php foreach ($re as $key => $val) {?>
      <td><?php echo $val->project_name; ?></td>
      <?php } ?>
      <td><h6><?php echo $value->stock_date; ?></h6></td>
      <td><?php echo $value->stock_matcode; ?></td>
      <td><?php echo $value->stock_matname; ?></td>
      <td><?php echo $value->stock_qty; ?></td>
      <td><?php echo number_format($value->stock_priceunit,2); ?></td>
      <td><?php if($value->stock_discountper1==""){}elseif($value->stock_discountper1=="0"){}else{ echo $value->stock_discountper1."%";  } ?></td>
      <td class="text-center"><?php echo number_format($value->stock_netamt,2); ?></td>
    </tr>
  <?php } ?>
</tbody>
</table>
</div>
</div>
