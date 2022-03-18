<div class="form-horizontal">
    <table class="table table-hover table-striped table-xxs">
        <thead>
            <tr>
                <th>No.</th>
                <th>Material Code</th>
                <th>Material Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>QTY</th>
                <th>Unit Code</th>
                <th>Unit Name</th>
                <th>Price/Unit</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody id="matbaran">
            <?php
			$i = 0;
			$price = 0;
			$qty = 0;
			foreach ($data as $key => $value) {
			$i++;
				// var_dump($value['id']);
			$price = $price+$value['price'];
			$qty = $qty+$value['qty'];
		?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $value['mat_code'] ?>
                </td>
                <td>
                    <?= $value['mat_name'] ?>
                </td>
                <td>
                    <?php
						if ($value['type'] === "M") {
							echo "Material";
						}else{
							echo "Labor/Subc.";
						}
					?>
                </td>
                <td>
                    <?= $value['desc'] ?>
                </td>
                <td>
                    <?= $value['qty'] ?>
                </td>
                <td>
                    <?= $value['unit_code'] ?>
                </td>
                <td>
                    <?= $value['unit_name'] ?>
                </td>
                <td class="text-right">
                    <?= number_format($value['price'],2) ?>
                </td>
                <td class="text-right">
                    <?= number_format($value['qty']*$value['price'],2) ?>
                </td>
            </tr>
            <?php
			}
		?>
            <tr>
                <td colspan="8" class="text-center">Total</td>
                <td class="text-right">
                    <?= number_format($price,2) ?>
                </td>
                <td class="text-right">
                    <?= number_format($qty*$price,2) ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<!-- array(2) {
  [0]=>
  array(10) {
    ["id"]=>
    string(1) "1"
    ["ref_bom_code"]=>
    string(13) "BOM2017080001"
    ["mat_code"]=>
    string(17) "PB020100100100034"
    ["type"]=>
    string(1) "M"
    ["desc"]=>
    string(0) ""
    ["qty"]=>
    string(3) "500"
    ["unit_code"]=>
    string(3) "034"
    ["price"]=>
    string(2) "10"
    ["mat_name"]=>
    string(74) " เสาเข็ม I ขนาด 0.12 ม. ยาว 6 เมตร  "
    ["unit_name"]=>
    string(9) "ต้น"
  }
  [1]=>
  array(10) {
    ["id"]=>
    string(1) "2"
    ["ref_bom_code"]=>
    string(13) "BOM2017080001"
    ["mat_code"]=>
    string(17) "PB030100101001044"
    ["type"]=>
    string(1) "M"
    ["desc"]=>
    string(0) ""
    ["qty"]=>
    string(2) "30"
    ["unit_code"]=>
    string(3) "034"
    ["price"]=>
    string(1) "5"
    ["mat_name"]=>
    string(72) " ไม้ยูคาลิปตัส ขนาด 1 1/2"x2.50 ม.  "
    ["unit_name"]=>
    string(9) "ต้น"
  }
} -->