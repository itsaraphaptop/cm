<table class="table table-bordered table-striped table-xxs">
	<thead>
		<tr>
			<th>R/C Code.</th>
			<th>R/C Date</th>
			<th>P/O No.</th>
			<th>Tax No.</th>
			<th>Tax Date</th>
			<th>D/O No.</th>
			<th>Vender Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; foreach ($res as $key => $value) {
			$q = $this->db->query("select project_code,project_name from project where project_id='$value->project'")->result();
			foreach($q as $v)
			{
				$project_code = $v->project_code;
				$project_name = $v->project_name;
			}
			$ven = $this->db->query("select vender_code,vender_name from vender where vender_id='$value->venderid'")->result();
			foreach($ven as $ve)
			{
				$vcode = $ve->vender_code;
				$vname = $ve->vender_name;
			}
		?>
		<tr>
			<td><?php echo $value->po_reccode; ?></td>
			<td><?php echo $value->po_recdate; ?></td>
			<td><?php echo $value->po_pono; ?></td>
			<td><?php echo $value->taxno; ?></td>
			<td><?php echo $value->taxdate; ?></td>
			<td><?php echo $value->docode; ?></td>
			<td><?php echo $value->vendername; ?></td>
			<td><button class="sel<?php echo $value->po_recid; ?> label label-primary" data-dismiss="modal"> Select</button></td>
		</tr>
	
	<script>
		$(".sel<?php echo $value->po_recid; ?>").click(function(){
			$("#duedate").val("<?php echo $value->po_recdate; ?>");
			$("#rcno").val("<?php echo $value->po_reccode; ?>");
			$("#projectname").val("<?php echo $project_name?>");
			$("#projectcode").val("<?php echo $project_code; ?>");
			$("#projectid").val("<?php echo $value->project_id; ?>");
			$("#pono").val("<?php echo $value->po_pono;?>");
			$("#systemcode").val("<?php echo $value->systemcode;?>");
			$("#system").val("<?php echo $value->systemname;?>");
			$("#supplierid").val("<?php echo $value->venderid;?>");
			$("#suppliercode").val("<?php echo $vcode;?>");
			$("#suppliername").val("<?php echo $value->vendername;?>");
			$("#invco").val("<?php echo $value->taxno;?>");
			$("#invdate").val("<?php echo $value->taxdate;?>");
			$("#dono").val('<?php echo $value->docode;?>');
			$("#dodate").val("<?php echo $value->dodate;?>");
			$("#docdate").val("<?php echo $value->po_recdate;?>");
			
			$("#flag").val("<?php echo $value->flag_control; ?>");
			$("#loadrecv").html('<div class="container"><p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></div>');
			$("#loadrecv").load('<?php echo base_url(); ?>inventory/receive_po_detail/<?php echo $value->po_reccode;?>/<?php echo $value->project_id; ?>');
			$("#saveh").prop("disabled",false);
		});
	</script>
		
		<?php $n++; } ?>
	</tbody>
</table>