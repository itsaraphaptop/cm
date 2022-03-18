<style type="text/css">
	.tr_head{
		background: #74ebd5;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #ACB6E5, #74ebd5);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #ACB6E5, #74ebd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}

</style>
<?php 
	function gen_col_revise($array){
		$array_return = array();
		foreach ($array as $key => $value) {
			$array_return[] =  "Rev #{$value} (".($value+2).")";
		}
		return $array_return;
	}

	$new_gencol = gen_col_revise($col_revise);
?>
<table class="table table-hover" style="overflow: auto;">
	<tr class="tr_head" style="background-color: #7cacf9">
		<th>cost code</th>
		<th>Description</th>
		<th>cost code</th>
		<th>Description</th>
		<th>Contract (1)</th>
		<?php echo "<th>".implode("</th><th>", $new_gencol)."</th>";?>
		<th>Dif. (<?=end($col_revise)+3 ?>) = (<?=end($col_revise)+2 ?>) - (<?=end($col_revise)+1 ?>)  </th>
		<th>Gross Margin (<?=end($col_revise)+4 ?>) = (1) - (<?=end($col_revise)+2 ?>)</th>
		<th>Purchase Cost (PO and Non PO) (<?=end($col_revise)+5 ?>)</th>
		<th>Budget Balance (<?=end($col_revise)+6 ?>) = (<?=end($col_revise)+2 ?>) - (<?=end($col_revise)+5 ?>)</th>
		<th>Forecast Budget (<?=end($col_revise)+7 ?>)</th>
		<th>To Be Order (<?=end($col_revise)+8?>)</th>
		<th>Variance Budget (<?=end($col_revise)+9?>) = (<?=end($col_revise)+2 ?>) - (<?=end($col_revise)+7 ?>)</th>
	</tr>
	
	<?php foreach ($data as $key => $value) { ?>
		<tr style="text-align: right;">
			<td><?=($value["boq_costmat"])?></td>
			<td><?=($value["boq_costmatname"]) ?></td>
			<td><?=($value["boq_costsub"])?></td>
			<td><?=($value["boq_costsubname"])?></td>
			<td><?=number_format($value["contract"])?></td>
			<?php echo "<td>".implode("</td><td>", $value["revise_list"])."</td>";?>
			<td><?=number_format($value["dif"])?></td>
			<td><?=number_format($value["gross_margin"])?></td>
			<td><?=number_format($value["purchase_cost"])?></td>
			<td><?=number_format($value["Budget_bal"])?></td>
			<td><?=number_format($value["forecastbg"])?></td>
			<td><?=number_format($value["to_be_order"])?></td>
			<td><?=$value["variance_bg"] ?></td>
		</tr>
	<?php }?>
</table>