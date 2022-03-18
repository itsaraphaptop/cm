<div class="dataTables_wrapper no-footer">
<div class="table-responsive">
<table class="table table-striped table-xs">
<thead>
  <tr>
    <th  class="text-center">Stock Date</th>
    <th  class="text-center">Material Name</th>
    <th  class="text-center">Type</th>
    <th  class="text-center">Receive</th>
    <th  class="text-center">Issue</th>
    <th  class="text-center">Srock Balance</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($res as $value) {?>
    <tr>
      <td><h6><?php echo $value->stock_date; ?></h6></td>
      <td><?php echo $value->stock_matname; ?></td>
      <td><?php echo $value->stock_type; ?></td>
      <td><?php echo $value->stock_qty; ?></td>
      <td><?php echo $value->stock_qty; ?></td>
      <td class="text-center"><?php echo $value->stock_qty; ?></td>
    </tr>
  <?php } ?>
</tbody>
</table>
</div>
</div>
