<?php $n=1; foreach ($item as $value) {
 ?>
<tr>
  <td><?php echo $n; ?></td>
  <td>
    <?php echo $value->mat_code; ?>
  </td>
  <td>
    <?php echo $value->mat_name; ?>
  </td>
  <td>
    <?php echo $value->whname; ?>

  </td>
  <td>
    <?php echo $value->qty_total; ?>

  </td>
  <td>
    <?php echo $value->qty; ?>

  </td>
  <td>
    <?php echo $value->unit; ?>
  </td>

</tr>
<?php $n++;   } ?>