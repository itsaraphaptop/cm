<?php	
$this->db->select('*');
$this->db->from('bdtender_d');
$this->db->join('system','bdtender_d.bdd_jobno = system.systemcode');
$this->db->where('bdd_tenid',$tid);
$this->db->where('system.compcode',$compcode);
$teder=$this->db->get()->result();
?>

<div class="form-group row">
	<label class="col-xl-3 col-lg-3 col-form-label">System Job:</label>
	
	<div id="jobrow">
	<?php $n=1; foreach ($teder as $key) { ?>
	<div class="job col-lg-9 col-xl-12 job">
		<div class="form-group row">
			<div class="col-lg-6">
				<div class="input-group">
					<input class="form-control form-control-lg form-control-solid" type="text" readonly="readonly" value="<?php echo $key->systemname; ?>" readonly=""><input type="hidden" name="job_id[]" readonly="" value="<?php echo $key->systemcode; ?>">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control form-control-lg form-control-solid text-right" readonly="readonly" name="job_amount[]" value="<?php echo number_format($key->bdd_amount,2); ?>">
				</div>
			</div>
			<!-- <div class="col-lg-2">
				<a class="btn font-weight-bold btn-danger btn-icon delrow">
					<i class="la la-remove"></i>
				</a>
			</div> -->
		</div>
	</div>
	<?php $n++; } ?>
</div>

<script type="text/javascript">
	projectval_total = 0;
	$("[name='job_amount[]']").each(function(index, el) {
		var val = parseFloat($(el).val().replace(/,/g, ""));
		projectval_total+= (val*1);
		$("#projectval").val(numberWithCommas(projectval_total));
	});

		$("[name='job_amount[]']").keyup(function(event) {
		var projectval_total = 0;
			$("[name='job_amount[]']").each(function(index, el) {
				var val = parseFloat($(el).val().replace(/,/g, ""));
				projectval_total+= (val*1);
				
			});

			$("#projectval").val(numberWithCommas(projectval_total));
	});
</script>