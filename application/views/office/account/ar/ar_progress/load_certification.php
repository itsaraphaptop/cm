<table class="table table-xxs table-bordered datatable-basicxc3" >
<thead>
<tr style="background-color: #F5F5F5;">
<th>#</th>
<th>Doc No.</th>
<th>Period</th>
<th>Date</th>
<th>Year</th>
<th>Month</th>
<th>Project Code</th>
<th>Project Name</th>
<th>Remark</th>
<th>Amount Submit</th>
<th>Amount Certification</th>
<th>Adv. Amount</th>
<th>Ret. Amount</th>
<th>W/T. Amount</th>
<th>Vat Amount</th>
<th>Action <?php echo $type; ?></th>
</tr>
</thead>
<tbody>
	<?php $n=1; foreach ($cer as $c) { ?>
<tr>
	<td><?php echo $n; ?></td>
	<td><?php echo $c->refferent; ?></td>
	<td class="text-center"><?php echo $c->period; ?></td>
	<td><div style="width: 100px;"><?php echo $c->date_certificate; ?></div></td>
	<td><?php echo $c->year; ?></td>
	<td><?php echo $c->month; ?></td>
	<td><?php echo $c->site_no; ?></td>
	<td><?php echo $c->after_site_no; ?></td>
	<td><?php echo $c->subject_remark; ?></td>
	<td class="text-right"><?php echo $c->amount_submit; ?></td>
	<td class="text-right"><?php echo $c->amount_certificate; ?></td>
	<td class="text-right"><?php echo $c->after_avance; ?></td>
	<td class="text-right"><?php echo $c->after_retention; ?></td>
	<td class="text-right"><?php echo $c->after_wt; ?></td>
	<td class="text-right"><?php echo $c->after_vat; ?></td>
	<td><button class="opendeptor<?php echo $n;?> label bg-primary heading-text" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
  	$('#refname').val('<?php echo $c->refferent; ?>');
  	$('#invdate').val('<?php echo $c->date_certificate; ?>');

  	if('<?php echo $type; ?>'=="progress"){
  	$("#invprogress").load('<?php echo base_url(); ?>index.php/ar/certificate_detail/<?php echo $project_code; ?>/<?php echo $c->submit_no; ?>/<?php echo $type; ?>');
  	}else if('<?php echo $type; ?>'=="down"){
  	$("#invoicedown").load('<?php echo base_url(); ?>index.php/ar/d_certificate_detail/<?php echo $project_code; ?>/<?php echo $c->submit_no; ?>/<?php echo $type; ?>');
	}else if('<?php echo $type; ?>'=="retention"){
	$("#invretention").load('<?php echo base_url(); ?>index.php/ar/r_certificate_detail/<?php echo $project_code; ?>/<?php echo $c->submit_no; ?>/<?php echo $type; ?>');
	}
  });
</script>
	<?php $n++; } ?>
</tbody>
</table>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc3").DataTable();
</script>
