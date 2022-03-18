<table class="table table-striped table-hover table-xxs">
	<thead>
		<tr>
			<th>Booking Code</th>
			<th>Booking Date</th>
			<th>Booking Status</th>
			<th>Remark</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($ic_booking as $key => $value) {
		?>
			<tr>
				<td><?= $value->book_code ?></td>
				<td><?= $value->date_book ?></td>
				<td>
					<?php
						if($value->type_ic == "transfer"){
							echo '<span class="label bg-blue">transfer</span>';
						}else{
							echo '<span class="label bg-warning">transfer from PR</span>';
						}
					?>
				</td>
				<td><?= $value->remark ?></td>
				<td><span class="select_ic label bg-success" ic_code="<?= $value->book_code ?>" address="<?= $value->address_book ?>" pj_id="<?= $value->to_project ?>" pj_name="<?= $value->project_name ?>" style="cursor:pointer">select</span></td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>

<script type="text/javascript">
	$('.select_ic').click(function(event) {
		$('.select_ic').remove();
		var code = $(this).attr('ic_code');

		$('#now_project').val($(this).attr('pj_name'));
		$('#ckktoproject').val($(this).attr('pj_id'));
		$('#place').val($(this).attr('address'));
		$('#chksave').val('save');
		$('#b_no').val(code);
		$('#body').empty();
		// $('#toproject').attr('disabled', 'true');
		$.ajax({
			url: '<?= base_url() ?>inventory/transfer_add',
			type: 'POST',
			data: {code: code},
		})
		.done(function(data) {
			var json = jQuery.parseJSON(data);
			
			$.each(json, function(index, val) {
				var tr_add = '<tr>'+
							 '<td>'+(index+1)+'</td>'+
							 '<td>'+val.costcode+'<input type="hidden" name="costcodei[]" value="'+val.costcode+'">'+
							 '</td>'+
							 '<td>'+val.matcode+'<input type="hidden" name="matcodei[]" value="'+val.matcode+'">'+
							 '</td>'+
							 '<td>'+val.matname+'<input type="hidden" name="matnamei[]" value="'+val.matname+'">'+
							 '</td>'+
							 '<td>'+val.wh+'<input type="hidden" name="whformi[]" value="'+val.wh+'">'+
							 '</td>'+
							 '<td>'+val.qty+'<input type="hidden" name="qtyi[]" value="'+val.qty+'">'+
							 '</td>'+
							 '<td>'+val.unit+'<input type="hidden" name="uniti[]" value="'+val.unit+'">'+
							 '</td>'+
							 '<td>'+val.price_unit+'<input type="hidden" name="unitprincei[]" value="'+val.price_unit+'">'+
							 '</td>'+
							 '<td>'+'<input type="text" class="form-control input-xs" name="remarki[]" value="" />'+
							 '</td>'+
							 '<td>'+
							 '<input type="hidden" name="store_id[]" value="'+val.store_id+'">'+
							 '<input type="hidden" name="costnamei[]" value="'+val.costname+'">'+
							 '<input type="hidden" name="tot[]" value="'+val.tot+'" />'+
							 '<input type="hidden" name="jobcode[]" value="" />'+
							 '<input type="hidden" name="jobname[]" value="" />'+
							 '<a id="delete1" class="noty-runner">'+
							 '<i class="icon-trash"></i>'+
							 '</a>'+
							 '</td>'+
							 '</tr>';
				$('#body').append(tr_add);
			});
		});
	});
</script>