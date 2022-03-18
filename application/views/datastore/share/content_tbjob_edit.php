<?php $n=1; foreach ($rows as $key => $value) { ?>
	<tr>
		<td>
			<?php echo $n;?>
			<input type="hidden" name="project_id[]" value="<?php echo $value['project_id']; ?>">
			<input type="hidden" name="ud_id[]" value="<?php echo $value['id']; ?>">
		</td>
		<td>

			<?php
		$this->db->select('*');
		$this->db->from('system');
		$this->db->where('systemcode',$value['projectd_job']);
		$tender_d=$this->db->get()->result(); ?>
		<?php  foreach ($tender_d as $tender_dd) { ?>
		<?php echo $tender_dd->systemname; ?>
		<?php } ?>
			<input type="hidden" name="projectd_job[]" value="<?php echo $value['projectd_job']; ?>">
		</td>
		<td><input type="text" class="form-control input-xs job_amount  text-right" name="job_amount[]" id="job_amount<?php echo $n;?>" value="<?= number_format($value['job_amount'],2)?>" readonly></td>
		<td><input type="text" class="form-control txt input-xs number text-right sumcer" name="amount_cer[]" id="amount_cer<?php echo $n;?>" value="<?php if($value['amount_cer']==0){echo 0;}else{echo number_format($value['amount_cer'],2);}?>" readonly></td>
		<td hidden>
			<?php 
				if ($value['import'] == "0") {
					$check = "";
					$checkbox_val = 0;
				}elseif ($value['import'] == "1") {
					$check="checked";
					$checkbox_val = 1;
				}
			?>

			<input type="checkbox" class="ch" input="input<?=$value['id']; ?>" <?=$check;?>>
			<input type="hidden" name="import[]" class="ch" value="<?=$checkbox_val;?>" id="input<?=$value['id']; ?>">
		</td>
	</tr>
	<script>
	function calculateSum() {
		var sum = 0;
		//iterate through each textboxes and add the values
		$(".txt").each(function() {
			//add only if the value is number
			if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
				sum += parseFloat($(this).val().replace(/,/g, ""));
				$(this).css("background-color", "#FEFFB0");
				console.log(sum);
				//alert(sum)
			}
			// else if (this.value.length != 0){
			//     $(this).css("background-color", "red");
			// }
		});

		$("#total_job_sumcer").val(numberWithCommas(sum));
	}
		 $('#s_cer').click(function(event) {
			  $('#cstatus').val('W')
			  $(".sumcer").prop('readonly',false);
               var job_amount = $('#job_amount<?php echo $n;?>').val();
               $('#amount_cer<?php echo $n;?>').val(job_amount);

               var sumjob = 0;
				$('.sumcer').each(function() {
					// sumjob += ($(this).val()*1);
					if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
						sumjob += parseFloat($(this).val().replace(/,/g, ""));
						// $(this).css("background-color", "#FEFFB0");
						console.log(sumjob);
						$("#total_job_sumcer").val(numberWithCommas(sumjob));
						$('#sumjob_sumcer').val(numberWithCommas(sumjob));
						//alert(sum)
					}
				});
				
				//Script sum Total Amount Submit in tabjob

				//Script sum Total Amount Certificate in tabjob
				$('.sumcer').keyup(function(event) {
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

					
					var sum = 0;
					if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
						sum += parseFloat($(this).val().replace(/,/g, ""));
						$(this).css("background-color", "#FEFFB0");
						console.log(sum);
						$("#total_job_sumcer").val(numberWithCommas(sum));
						$('#sumjob_sumcer').val(numberWithCommas(sum));
						//alert(sum)
					}
					// var sumcer = 0;
					// $('.sumcer').each(function() {
					//     sumcer += ($(this).val()*1);
					// });
					// $('#total_job_sumcer').html(numberWithCommas(sumcer));
					// $('#sumjob_sumcer').val(sumcer);
				});
				//Script sum Total Amount Certificate in tabjob

				//Script sum Total Amount Submit in tabjob
				var job_amount = 0;
				$('.job_amount').each(function() {
					// job_amount += ($(this).val()*1);
						if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
						job_amount += parseFloat($(this).val().replace(/,/g, ""));
						$(this).css("background-color", "#FEFFB0");
						console.log(job_amount);
						$("#total_job_amount").val(numberWithCommas(job_amount));
						$('#sumjob_amount').val(numberWithCommas(job_amount));
						//alert(sum)
					}
				});
				$('#total_job_amount').val(numberWithCommas(job_amount));
				$('#sumjob_amount').val(numberWithCommas(job_amount));
				//Script sum Total Amount Submit in tabjob

				//Script sum Total Amount Certificate in tabjob
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

					
					var sum = 0;
					if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
						sum += parseFloat($(this).val().replace(/,/g, ""));
						$(this).css("background-color", "#FEFFB0");
						console.log(sum);
						$("#total_job_amount").val(numberWithCommas(sum));
						$('#sumjob_amount').val(numberWithCommas(sum));
						// $("#total_job_sumcer").val(numberWithCommas(sum));
						// $('#sumjob_sumcer').val(numberWithCommas(sum));
						//alert(sum)
					}
					// var job_amount = 0;
					// $('.job_amount').each(function() {
					// 	job_amount += ($(this).val()*1);
					// });
					// $('#total_job_amount').html(numberWithCommas(job_amount));
					// $('#sumjob_amount').val(job_amount);
				});
				var now = new Date();

				var day = ("0" + now.getDate()).slice(-2);
				var month = ("0" + (now.getMonth() + 1)).slice(-2);

				var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

				$('#cdate').val(today)
		});
	</script>
<?php $n++; } ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		 $(".job_amount").prop('readonly',true);
		//  $("#after_avance").val().replace(/,/g, "");
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

		//Script sum Total Amount Submit in tabjob
		var sumjobs = 0;
	    $('.sumcer').each(function() {
	        sumjobs += parseFloat($(this).val().replace(/,/g, ""));
			console.log(sumjobs);
	    });
	    $('#total_job_sumcer').val(numberWithCommas(sumjobs));
	    $('#sumjob_sumcer').val(numberWithCommas(sumjobs));
		//Script sum Total Amount Submit in tabjob

		//Script sum Total Amount Certificate in tabjob
	    $('.sumcer').keyup(function(event) {
		    var sumcer = 0;
		    $('.sumcer').each(function() {
		        sumcer += ($(this).val()*1);
		    });
		    $('#total_job_sumcer').val(numberWithCommas(sumcer));
		    $('#sumjob_sumcer').val(sumcer);
	    });
	    //Script sum Total Amount Certificate in tabjob

		//Script sum Total Amount Submit in tabjob
		var job_amount = 0;
	    $('.job_amount').each(function() {
	       job_amount += parseFloat($(this).val().replace(/,/g, ""));
	    });
	    $('#total_job_amount').val(numberWithCommas(job_amount));
		$('#sumjob_amount').val(numberWithCommas(job_amount));
		//Script sum Total Amount Submit in tabjob

		//Script sum Total Amount Certificate in tabjob
	    $('.job_amount').keyup(function(event) {
		    var job_amount = 0;
		    $('.job_amount').each(function() {
		        job_amount += ($(this).val()*1);
		    });
		    $('#total_job_amount').val(numberWithCommas(job_amount));
		    $('#sumjob_amount').val(numberWithCommas(job_amount));
	    });
	    //Script sum Total Amount Certificate in tabjob

	});
</script>