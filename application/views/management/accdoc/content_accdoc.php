<h1>Account Document Year : <?=$year;?></h1>
<table class="table table-hover table-bordered" id="myTable">
	<thead>
		<tr class="bg-info">
			<th rowspan="2" class="text-center">Months</th>
			<th colspan="8" class="text-center">Document</th>
			<th rowspan="2" class="text-center">Total</th>
		</tr>
		<tr class="bg-info">
			<th class="text-center">APV/CNV</th>
			<th class="text-center">APS/CNS</th>
			<th class="text-center">APO/CNO</th>
			<th class="text-center">Cheque</th>
			<th class="text-center">PL</th>
			<th class="text-center">AR</th>
			<th class="text-center">RV</th>
			<th class="text-center">JV</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$m = array('01','02','03','04','05','06','07','08','09','10','11','12');
			$i = 0;
			foreach ($rows as $key => $value) {
				foreach ($value as $k => $v) {
		?>
		<tr>
			<td><?=strtoupper($v['mounth']);?></td>
			<td class="text-center"><?= ($v['colone'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="APV/CNV" type="col1" year="'.$year.'">'.$v['colone'].'</a>' : '<a style="cursor:default;color:black;">'.$v['colone'].'</a>';?></td>
			<td class="text-center"><?= ($v['coltwo'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="APS/CNS" type="col2" year="'.$year.'">'.$v['coltwo'].'</a>' : '<a style="cursor:default;color:black;">'.$v['coltwo'].'</a>';?></td>
			<td class="text-center"><?= ($v['colthree'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="APO/CNO" type="col3" year="'.$year.'">'.$v['colthree'].'</a>' : '<a style="cursor:default;color:black;">'.$v['colthree'].'</a>';?></td>
			<td class="text-center"><?= ($v['colfour'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="Cheque" type="col4" year="'.$year.'">'.$v['colfour'].'</a>' : '<a style="cursor:default;color:black;">'.$v['colfour'].'</a>';?></td>
			<td class="text-center"><?= ($v['colfive'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="PL" type="col5" year="'.$year.'">'.$v['colfive'].'</a>' : '<a style="cursor:default;color:black;">'.$v['colfive'].'</a>';?></td>
			<td class="text-center"><?= ($v['colsix'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="AR" type="col6" year="'.$year.'">'.$v['colsix'].'</a>' : '<a style="cursor:default;color:black;">'.$v['colsix'].'</a>';?></td>
			<td class="text-center"><?= ($v['colseven'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="RV" type="col7" year="'.$year.'">'.$v['colseven'].'</a>' : '<a style="cursor:default;color:black;">'.$v['colseven'].'</a>';?></td>
			<td class="text-center"><?= ($v['coleight'] > 0) ? '<a href="#" class="num" mounth="'.$m[$i].'" col="JV" type="col8" year="'.$year.'">'.$v['coleight'].'</a>' : '<a style="cursor:default;color:black;">'.$v['coleight'].'</a>';?></td>
			<td class="text-center"><?=$v['colone']+$v['coltwo']+$v['colthree']+$v['colfour']+$v['colfive']+$v['colsix']+$v['colseven']+$v['coleight'];?></td>
		</tr>
		<?php
				}
			$i++;
			}
		?>
	</tbody>
</table>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="modal-title"></h4>
			</div>
			<div class="modal-body" id="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
$(".num").click(function(event) {
	$('#modal-body').empty();
	var mounth 	= $(this).attr('mounth');
	var type 	= $(this).attr('type');
	var year 	= $(this).attr('year');
	var tilte	= $(this).attr('col');
	// alert("mounth = "+mounth+" , "+" type = "+type);
	$.post('<?php echo base_url(); ?>accdoc/content_in_modal', {mounth: mounth, type: type, year: year}, function() {
	}).done(function(data){
		$("#modal-title").html(tilte);
		$("#modal-body").html(data);
		$('#myModal').modal('show');
		// alert(data);
	});
});
</script>