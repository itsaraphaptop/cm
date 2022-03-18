<?php
	echo "<pre>";
	foreach ($detail as $key => $value) {

	$mat_code = $value->itrad_matcode;

	}
?>

<script type="text/javascript">
	var mat_code = '<?= $mat_code ?>';
	var tr = `<tr>
				<td>${mat_code}<td>
			  </tr>
			 `;
	$('#lsit').append(tr);
// lsit

</script>

<!-- 
["itrad_id"]=>
  string(1) "1"
  ["ref_tradid"]=>
  string(1) "1"
  ["itrad_matcode"]=>
  string(14) "MB010200201001"
  ["itrad_descrip"]=>
  string(26) "หินเบอร์ 2"
  ["itrad_serno"]=>
  string(0) ""
  ["itrad_costcode"]=>
  string(0) ""
  ["itrad_qty"]=>
  string(1) "2"
  ["itrad_idunit"]=>
  string(0) ""
  ["itrad_nameunit"]=>
  string(11) "ลบ.ม."
  ["itrad_priceunit"]=>
  string(7) "1500.00"
  ["itrad_pricesale"]=>
  string(7) "1500.00"
  ["itrad_amount"]=>
  string(7) "3000.00"
  ["itrad_discount"]=>
  string(4) "0.00"
  ["itrad_netamount"]=>
  string(7) "3000.00"
  ["itrad_doccode"]=>
  string(10) "O201803073"
  ["itrad_system"]=>
  NULL
 -->