
<?php $n=1; foreach ($res as $key => $value) {
	// $sum_amount = array_sum($res[$value['job_amount']]);
?>
<tr>
	<td><?php echo $n; ?><input type="hidden" name="project_id[]" value="<?php echo $value['id']; ?>"></td>
	<td>
		<?php
		 $session_data = $this->session->userdata('sessed_in');
		 $username = $session_data['username'];
		 $compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('system');
		$this->db->where('systemcode',$value['projectd_job']);
		$this->db->where('compcode',$compcode);
		$tender_d=$this->db->get()->result(); ?>
		<?php  foreach ($tender_d as $tender_dd) { ?>
		<?php echo $tender_dd->systemname; ?>
		<?php } ?>
		
	
	<input type="hidden" name="projectd_job[]" value="<?php echo $value['projectd_job']; ?>">
	</td>
	<td>
	<!-- <?php echo number_format($value['job_amount']); ?> -->
	 <input type="text" class="job_amount formatnum form-control input-xs number  text-right" name="job_amount[]" value="<?php echo $value['job_amount']; ?>"></td>
	<td>
		<input type="text" name="amount_cer[]" class="formatnum form-control input-xs number sumcer text-right" value="0.00" disabled>
	</td>
	<td hidden>
		<input type="checkbox" class="ch" input="input<?php echo $value['id']; ?>">
		<input type="hidden" name="import[]" class="ch" value="0" id="input<?php echo $value['id']; ?>">
	</td>
</tr>
<?php $n++; } ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		//Script sum Total Amount Submit in tabjob
		var sumjob = 0;
	    $('.job_amount').each(function() {
	        sumjob += ($(this).val()*1);
	    });
	    $('#total_job_amount').html(numberWithCommas(sumjob));
	    $('#sumjob_amount').val(sumjob);
	    //Script sum Total Amount Submit in tabjob
	    
	    //process after_avance
	    var avance = $('#avance').val();
	    var after_avance = ((sumjob*avance)/100*1);
	    $('#after_avance').val(after_avance);
		//process after_avance

		//process after_retention
		var retention = $('#retention').val();
		var after_retention = ((after_avance*retention)/100*1);
		$('#after_retention').val(after_retention);
		//process after_retention

		//process after W/T
		var wt = $('#wt').val();
		var after_wt = (((sumjob-after_avance)*wt/100)*1);
		$('#after_wt').val(after_wt);
		//process after W/T

		//process after_vat
		var vat = $('#vat').val();
		var after_vat = (((sumjob*vat)/100)*1);
		$('#after_vat').val(after_vat);
		//process after_vat

		//process net_amount
		var net_amount = ((sumjob-after_avance-after_retention-after_wt)+after_vat*1);
		$('#net_amount').val(net_amount);
		//process net_amount

		//key up net_amount
		$('#after_vat').keyup(function(event) {
			var after_vat_key =$(this).val();
			var net_amount_key = ((sumjob-after_avance-after_retention-after_wt)+after_vat_key*1);
			$('#net_amount').val(net_amount_key);
		});
		//key up net_amount
	    
	    //Script sum Total Amount Certificate in tabjob
	    $('.sumcer').keyup(function(event) {
		    var sumcer = 0;
		    $('.sumcer').each(function() {
		        sumcer += ($(this).val()*1);
		    });
		    $('#total_job_sumcer').html(numberWithCommas(sumcer));
		    $('#sumjob_sumcer').val(sumcer);
	    });
	    $('.job_amount').keyup(function(event) {
			if (event.which >= 37 && event.which <= 40) {
				event.preventDefault();
			}

			var currentVal = $(this).val();
			var testDecimal = testDecimals(currentVal);
			if (testDecimal.length > 1) {
				console.log("You cannot enter more than one decimal point");
				currentVal = currentVal.slice(0, -1);
			}
			$(this).val(replaceCommas(currentVal));
		    var sumcer = 0; var down = 0; var vat = 0; var retention = 0; var wt = 0;
		    $('.job_amount').each(function() {
		        sumcer += parseFloat($(this).val().replace(/,/g, "")*1);
		        down += sumcer*parseFloat($($("#avance")).val().replace(/,/g, "")*1)/100;
		        vat += sumcer*parseFloat($($("#vat")).val().replace(/,/g, "")*1)/100;
		        retention += sumcer*parseFloat($($("#retention")).val().replace(/,/g, "")*1)/100;
		        wt += sumcer*parseFloat($($("#wt")).val().replace(/,/g, "")*1)/100;
				

		    });
		    $('#total_job_amount').val(numberWithCommas(sumcer));
		    $('#sumjob_amount').val(numberWithCommas(sumcer));
		    $('#after_avance').val(numberWithCommas(down));
		    $('#after_vat').val(numberWithCommas(vat));
		    $('#after_retention').val(numberWithCommas(retention));
		    $('#after_wt').val(numberWithCommas(wt));
		    $('#net_amount').val(numberWithCommas(sumcer-down-vat-retention-wt));
	    });
	    //Script sum Total Amount Certificate in tabjob

		//Script checkbox chang value
		$('.ch').click(function(event) {
			var attr = $(this).attr('input');
			var id = $('#'+attr).val();
			// console.log(id);
			if (id == 0) {
				$('#'+attr).val('1');
			}else if(id == 1){
				$('#'+attr).val('0');
			}
		});
		//Script checkbox chang value

		
		

	});
</script>