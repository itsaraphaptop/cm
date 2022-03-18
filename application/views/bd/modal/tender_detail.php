<h6>ระบบงาน</h6>
<table class="table table-bordered table-xxs table-hover">
	<thead>
		<tr>
			<td width="5px;">No.</td>
			<td>Job</td>
			<td width="20%">Job Amount</td>
		</tr>
	</thead>
	<tbody>
		<?php
		
		$this->db->select('*');
		$this->db->from('bdtender_d');
		$this->db->join('system','bdtender_d.bdd_jobno = system.systemcode');
		$this->db->where('bdd_tenid',$tid);
		$this->db->where('system.compcode',$compcode);
		$teder=$this->db->get()->result();
		?>
		<?php $n=1; foreach ($teder as $key) { ?>
		
		<tr>
		
			<td><?php echo $n; ?><input type="hidden" name="chki[]" value="i"></td>
			<td><input class="form-control input-sm" type="text" value="<?php echo $key->systemname; ?>" readonly=""><input type="hidden" name="job_id[]" readonly="" value="<?php echo $key->systemcode; ?>"></td>
			<td><input type="text" class="form-control input-sm" name="job_amount[]" value="<?php echo $key->bdd_amount; ?>"></td>
			</tr>
			<?php $n++; } ?>
		</tbody>
	</table>
	<script type="text/javascript">
		projectval_total = 0;
		$("[name='job_amount[]']").each(function(index, el) {
          var val = $(el).val();
          projectval_total+= (val*1);
          $("#projectval").val(projectval_total);
      });

		 $("[name='job_amount[]']").keyup(function(event) {
           var projectval_total = 0;
              $("[name='job_amount[]']").each(function(index, el) {
                  var val = $(el).val();
                  projectval_total+= (val*1);
                  
              });

              $("#projectval").val(projectval_total);
        });
	</script>