<table class="table table-bordered table-striped table-hover table-xxs">
    <thead>
        <tr>
            <th>Material Code</th>
            <th>Material Name</th>
            <th>Qty</th>
            <th>Unit </th>
            <th>Price </th>
            <th>remark</th>
        </tr>
    </thead>
    <tbody id="pritem">
    <?php foreach ($detail as $key => $value) {?>
        <tr>
            <td><?php echo $value->pri_matcode;?></td>
            <td><?php echo $value->pri_matname;?></td>
            <td><?php echo $value->pri_qty;?></td>
            <td><?php echo $value->pri_unit;?></td>
            <td><?php echo $value->pri_priceunit;?></td>
            <td><?php echo $value->pri_remark;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>