<?php foreach ($rows as $key => $value) { $i=1;?>
<tr>
      <td><?=$i;?></td>
      <td><?=$value['boq_job'];?></td>
      <td><?=$value['boq_mcode'];?></td>
      <td style="width: 200px;"><?=$value['boq_mname'];?></td>
      <td><?=$value['boq_subcode'];?></td>
      <td><?=$value['boq_subname'];?></td>
      <td><?=$value['boq_costmat'];?></td>
      <td><?=$value['boq_costsub'];?></td>
      <td><?=$value['boq_costsubname'];?></td>
      <td><?=$value['boq_bom'];?></td>
      <td><?=$value['boq_ucode'];?></td>
      <td><?=$value['boq_uname'];?></td>
      <td><?=number_format($value['boq_budget_qty']);?></td>
      <td><?=number_format($value['boq_budget_price']);?></td>
      <td><?=number_format($value['boq_budget_amt']);?></td>
      <td><?=number_format($value['boq_lab_price']);?></td>
      <td><?=number_format($value['boq_lab_amt']);?></td>
      <td>555</td>
      <td>555</td>
</tr>
<?php $i++;} ?>
