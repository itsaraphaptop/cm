<div class="form-horizontal bbom">
	<table class="table table-hover" id="tbTender">
		<thead>
			<tr>
				<th>No. </th>
				<th>Bom Code</th>
				<th>BOM Description</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="matbaran">
		<?php
			$i = 0;
			foreach ($data as $key => $value) {
			$i++;
				// var_dump($value['id']);
		?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $value['bom_code'] ?></td>
				<td><?= $value['bom_descrip'] ?></td>
				<td><button class="btn btn-info add_bom<?= $i ?>" mat_code="<?= $value['bom_code'] ?>" >เลือก</button></td>
			</tr>
<script type="text/javascript">
	$('.add_bom<?= $i ?>').click(function(event) {
		var bomdis = "<?= $value['bom_descrip'] ?>";
		$('.bbom').html('<p>กำลังโหลดข้อมูล จาก '+bomdis+'</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
		// var id_mat = $(this).attr('mat_code');
		// $.get('<?=base_url()?>bd/show_bom_detail/'+id_mat+'/<?php echo $tdn; ?>/<?= $value['bom_code'] ?>/<?php echo $id; ?>', function(data) {
		// 	$("#add_body").append(data);
		// });
		 swal({
			title: "Are you sure?",
			text: "You will not be able to recover Data BOQ!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#66BB6A",
			confirmButtonText: "Yes, Copy it!",
			cancelButtonText: "No, cancel pls!",
			closeOnConfirm: false,
			closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
				var bomcode = "<?= $value['bom_code'] ?>";
				var tdn = "<?=$tdn;?>";
				var pcode = "<?=$projectcode?>";
				var url = "<?php echo base_url(); ?>bd/cobom/"+bomcode+"/"+tdn+"/"+pcode;
				var dataSet = {
				};
				$.post(url, dataSet, function(data) {
					if (data == "true") {
						swal({
							title: "Completed!",
							text: "Copy Data BOQ.",
							confirmButtonColor: "#66BB6A",
							type: "success"
						});
						window.location.href="<?php echo base_url();?>bd/addnewboq/<?php echo $tdn;?>/<?=$projectcode;?>/p";
					} else {
						swal({
							title: "error",
							text: "Error Copy Data BOQ :)",
							confirmButtonColor: "#2196F3",
							type: "error"
						});
					}
				});
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
	});
</script>
			
		<?php
			}
		?>
		</tbody>
	</table>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript">
	$('#tbTender').DataTable();
</script>