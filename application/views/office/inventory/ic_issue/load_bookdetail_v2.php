<?php $n=1; foreach ($item2 as $value) {
 ?>
<tr>
  <td><?php echo $n; ?></td>
  <td>
    <?php echo $value->mat_code; ?>
    <input type="hidden" name="matcodei[]" value="<?php echo $value->mat_code; ?>" />
    <input type="text" name="id[]" value="<?php echo $value->store_id; ?>" />
  </td>
  <td>
    <?php echo $value->mat_name; ?>
    <input type="hidden" name="matnamei[]" value="<?php echo $value->mat_name; ?>" />
  </td>
  <td>
    <?php echo $value->whname; ?>
    <input type="hidden" name="whcodei[]" value="<?php echo $value->wh; ?>" />
    <input type="hidden" name="whnamei[]" value="<?php echo $value->wh; ?>" />
  </td>
  <td>
    <?php echo $value->qty_total; ?>
    <input type="hidden" name="store_total[]" value="<?php echo $value->qty_total; ?>" />
  </td>
  <td>
    <?php echo $value->qty; ?>
    <input type="hidden" name="qtyi[]" value="<?php echo $value->qty; ?>" />
  </td>
  <td>
    <?php echo $value->unit; ?>
    <input type="hidden" name="uniti[]" value="<?php echo $value->unit; ?>" />
      <input type="hidden" name="costcodei[]" value="<?php echo $value->costcode; ?>" />
    <input type="hidden" name="costnamei[]" value="<?php echo $value->costname; ?>" />
    <input type="hidden" name="remarki[]" value="<?php echo $value->remark; ?>" />
    <input type="hidden" name="accode[]" value="" />
    <input type="hidden" name="acname[]" value="" />
    <input type="hidden" name="statusass[]" value="" />
    <input type="hidden" name="unitpricei[]" value="<?php echo $value->priceunit; ?>" />
    <input type="hidden" name="tounitpricei[]" value="<?php echo $value->priceunit*$value->qty;; ?>" />
  </td>

</tr>
<?php $n++;   } ?>