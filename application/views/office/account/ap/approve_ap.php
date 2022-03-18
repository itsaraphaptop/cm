<div class="content-wrapper">
	<div class="content">

		<div class="panel panel-flat">
			<div class="panel-heading ">
				<h5 class="panel-title">Account Payable Approve (อนุมัติตั้งหนี้)</h5>
			</div>
			<div class="panel-body">		
				<div class="table-responsive">
					<table class="table table-hover table-borderd table-xs" id="approve">
						<thead>
							<tr>
								<th>No</th>
								<th>Vender Code</th>
								<th>Vender Name</th>
								<th>APV</th>
								<th>APO</th>
								<th>APS</th>
								<th>Select</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($venders as $key => $vender) {
						?>
							<tr>
								<td><?=$key+1;?></td>
								<td><?=$vender->vender_code;?></td>
								<td><?=$vender->vender_name;?></td>
								<td>
									<span class="label bg-success heading-text"><?=$vender->num_apv;?></span>
								</td>
								<td>
									<span class="label bg-primary-400 heading-text"><?=$vender->num_apo;?></span>
								</td>
								<td>
									<span class="label bg-info-400 heading-text"><?=$vender->num_aps;?></span>
								</td>
								<td>
									<a href="<?=base_url()?>ap/vender_by_id/<?=$vender->vender_code;?>" class="btn btn-default btn-xs">select</a>
								</td>
							</tr>
						<?php
							}
						?>
						</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
	$('#approve').DataTable();
</script>
