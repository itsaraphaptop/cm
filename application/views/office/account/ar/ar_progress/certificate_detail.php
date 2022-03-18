<style>
.no_border {
color: #2b2828;
background-color: rgba(85, 85, 85, 0);
border: aliceblue;
text-align: center;
width: 100px;
}
.ww {
width: 100px;
text-align: center;
}
</style>
<div class="table-responsive" id="invprogress">
	<table class="table table-hover table-bordered table-striped table-xxs">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">System Type</th>
				<th class="text-center">Progress Amount</th>
				<th class="text-center">Less Advance</th>
				<th class="text-center">VAT</th>
				<th class="text-center">Less Retention</th>
				<th class="text-center">Less W/T</th>
				<th class="text-center">Net Amount</th>
				<th class="text-center">Receipt Amount</th>
				<th class="text-center">Ref. No.</th>
				<th class="text-center">Cer No.</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php $n=1; foreach ($cer_d as $d) { ?>
				<tr>
					<td><?php echo $n; ?></td>
					<?php
					$session_data = $this->session->userdata('sessed_in');
					$compcode = $session_data['compcode'];
					$this->db->select('*');
					$this->db->where('systemcode',$d->projectd_job);
					$this->db->where('compcode',$compcode);
					$this->db->from('system');
					$query = $this->db->get()->result();
					foreach ($query as $key) {
					?>
					<td class="text-center">
						<?php echo $key->systemname; ?><input type="hidden" name="system[]" id="system" value="<?php echo $key->systemcode ?>"></td>
						<?php
						}
						?>
						<td>
							<input style="text-align: center;" type="text" name="progressamt[]" id="progressamt<?php echo $n; ?>" value="<?php echo $d->amount_cer; ?>" class="form-control">
							<input type="hidden" name="topro[]" id="topro<?php echo $n; ?>" value="<?php echo $d->job_amount; ?>" class="form-control">
						</td>
						<td><input class="no_border" type="text" name="lessadvance[]" id="lessadvance<?php echo $n; ?>" value="" ></td>
						<td> <input class="no_border" type="text" name="vati[]" id="vati<?php echo $n; ?>" value="" ></td>
						<td><input class="no_border" type="text" name="lessretention[]" id="lessretention<?php echo $n; ?>" value="" ></td>
						<td><input class="no_border" type="text" name="lesswti[]" id="lesswti<?php echo $n; ?>" value="" ></td>
						<td><input class="no_border" readonly="" type="text" id="netamti<?php echo $n; ?>" name="netamti[]"  value="" ></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<script>
					$("#progressamt<?php echo $n; ?>").keyup(function(){
					
					var down = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var todd = parseFloat($("#topro<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var vat = parseFloat($("#vatper").val());
					var lessadv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var tolessadv = (down*lessadv/100);
					var vatamt = (down-tolessadv)*vat/100;
					var lesswt = (down-tolessadv)*wt/100;
					var tolessref = (down*lessref/100);
					var total = down-tolessadv+vatamt-tolessref-lesswt;
					// $("#progressamt<?php echo $n; ?>").val(down);
					$("#vati<?php echo $n; ?>").val(vatamt.toFixed(4));
					$("#lessadvance<?php echo $n; ?>").val(tolessadv.toFixed(4));
					$("#lessretention<?php echo $n; ?>").val(tolessref.toFixed(4));
					$("#lesswti<?php echo $n; ?>").val(lesswt.toFixed(4));
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					var sumary_downamt = parseFloat($("#sumdownamt").val());
					var rowsum_downamt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var sum_downamt = sumary_downamt+rowsum_downamt;
					$("#sumdownamt").val(sum_downamt);
					var sumary_vati = parseFloat($("#sumvati").val());
					var rowsum_vati = parseFloat($("#vati<?php echo $n; ?>").val());
					var sum_vati = sumary_vati+rowsum_vati;
					$("#sumvati").val(sum_vati);
					var sumary_beforewti = parseFloat($("#sumbeforewti").val());
					var rowsum_beforewti = parseFloat($("#beforewti<?php echo $n; ?>").val());
					var sum_beforewti = sumary_beforewti+rowsum_beforewti;
					$("#sumbeforewti").val(sum_beforewti);
					var sumary_lesswti = parseFloat($("#sumlesswti").val());
					var rowsum_lesswti = parseFloat($("#lesswti<?php echo $n; ?>").val());
					var sum_lesswti = sumary_lesswti+rowsum_lesswti;
					$("#sumlesswti").val(sum_lesswti);
					var sumary_netamti = parseFloat($("#sumnetamti").val());
					var rowsum_netamti = parseFloat($("#netamti<?php echo $n; ?>").val());
					var sum_netamti = sumary_netamti+rowsum_netamti;
					$("#sumnetamti").val(sum_netamti);
					});
					
					$("#lessadvance<?php echo $n; ?>").keyup(function(){
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var adv = parseFloat($("#lessadvance<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var vat = parseFloat($("#vatper").val());
					var lessref = parseFloat($("#less_ref").val());
					var amt_adv = (amt-adv);
					var vatamt = amt*vat/100;
					var lesswt = amt_adv*wt/100;
					var tolessref = (amt*lessref/100);
					var total = amt_adv+vatamt-tolessref-lesswt;
					$("#vati<?php echo $n; ?>").val(vatamt.toFixed(4));
					$("#lesswti<?php echo $n; ?>").val(lesswt.toFixed(4));
					$("#netamti<?php echo $n; ?>").val(tolessref.toFixed(4));
					});
					$("#vati<?php echo $n; ?>").keyup(function(){
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var vat = parseFloat($("#vati<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var adv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var amt_adv = (amt*adv/100);
					var lesswt = amt_adv*wt/100;
					var tolessref = (amt*lessref/100);
					var total = amt-amt_adv+vat-tolessref-lesswt;
					$("#lesswti<?php echo $n; ?>").val(lesswt.toFixed(4));
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					});
					$("#lesswti<?php echo $n; ?>").keyup(function(){
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var wti = parseFloat($("#lesswti<?php echo $n; ?>").val());
					var vat = parseFloat($("#vatper").val());
					var lessadv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var tolessadv = (amt*lessadv/100);
					var vatamt = (amt-tolessadv)*vat/100;
					var tolessref = (amt*lessref/100);
					var total = amt-tolessadv+vatamt-tolessref-wti;
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					});
					$("#lessretention<?php echo $n; ?>").keyup(function(){
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var ret = parseFloat($("#lessretention<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var vat = parseFloat($("#vatper").val());
					var lessadv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var tolessadv = (amt*lessadv/100);
					var vatamt = (amt-tolessadv)*vat/100;
					var lesswt = amt*wt/100;
					var total = amt-tolessadv+vatamt-ret-lesswt;
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					});
					var down = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var todd = parseFloat($("#topro<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var vat = parseFloat($("#vatper").val());
					var lessadv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var tolessadv = (down*lessadv/100);
					var vatamt = (down-tolessadv)*vat/100;
					var lesswt = (down-tolessadv)*wt/100;
					var tolessref = (down*lessref/100);
					var total = down-tolessadv+vatamt-tolessref-lesswt;
					// $("#progressamt<?php echo $n; ?>").val(down);
					$("#vati<?php echo $n; ?>").val(vatamt.toFixed(4));
					$("#lessadvance<?php echo $n; ?>").val(tolessadv.toFixed(4));
					$("#lessretention<?php echo $n; ?>").val(tolessref.toFixed(4));
					$("#lesswti<?php echo $n; ?>").val(lesswt.toFixed(4));
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					var sumary_downamt = parseFloat($("#sumdownamt").val());
					var rowsum_downamt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var sum_downamt = sumary_downamt+rowsum_downamt;
					$("#sumdownamt").val(sum_downamt);
					var sumary_vati = parseFloat($("#sumvati").val());
					var rowsum_vati = parseFloat($("#vati<?php echo $n; ?>").val());
					var sum_vati = sumary_vati+rowsum_vati;
					$("#sumvati").val(sum_vati);
					var sumary_beforewti = parseFloat($("#sumbeforewti").val());
					var rowsum_beforewti = parseFloat($("#beforewti<?php echo $n; ?>").val());
					var sum_beforewti = sumary_beforewti+rowsum_beforewti;
					$("#sumbeforewti").val(sum_beforewti);
					var sumary_lesswti = parseFloat($("#sumlesswti").val());
					var rowsum_lesswti = parseFloat($("#lesswti<?php echo $n; ?>").val());
					var sum_lesswti = sumary_lesswti+rowsum_lesswti;
					$("#sumlesswti").val(sum_lesswti);
					var sumary_netamti = parseFloat($("#sumnetamti").val());
					var rowsum_netamti = parseFloat($("#netamti<?php echo $n; ?>").val());
					var sum_netamti = sumary_netamti+rowsum_netamti;
					$("#sumnetamti").val(sum_netamti);
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var adv = parseFloat($("#lessadvance<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var vat = parseFloat($("#vatper").val());
					var lessref = parseFloat($("#less_ref").val());
					var amt_adv = (amt-adv);
					var vatamt = amt*vat/100;
					var lesswt = amt_adv*wt/100;
					var tolessref = (amt*lessref/100);
					var total = amt_adv+vatamt-tolessref-lesswt;
					$("#vati<?php echo $n; ?>").val(vatamt.toFixed(4));
					$("#lesswti<?php echo $n; ?>").val(lesswt.toFixed(4));
					$("#netamti<?php echo $n; ?>").val(tolessref.toFixed(4));
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var vat = parseFloat($("#vati<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var adv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var amt_adv = (amt*adv/100);
					var lesswt = amt_adv*wt/100;
					var tolessref = (amt*lessref/100);
					var total = amt-amt_adv+vat-tolessref-lesswt;
					$("#lesswti<?php echo $n; ?>").val(lesswt.toFixed(4));
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var wti = parseFloat($("#lesswti<?php echo $n; ?>").val());
					var vat = parseFloat($("#vatper").val());
					var lessadv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var tolessadv = (amt*lessadv/100);
					var vatamt = (amt-tolessadv)*vat/100;
					var tolessref = (amt*lessref/100);
					var total = amt-tolessadv+vatamt-tolessref-wti;
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					var amt = parseFloat($("#progressamt<?php echo $n; ?>").val());
					var ret = parseFloat($("#lessretention<?php echo $n; ?>").val());
					var wt = parseFloat($("#wh").val());
					var vat = parseFloat($("#vatper").val());
					var lessadv = parseFloat($("#less_adv").val());
					var lessref = parseFloat($("#less_ref").val());
					var tolessadv = (amt*lessadv/100);
					var vatamt = (amt-tolessadv)*vat/100;
					var lesswt = amt*wt/100;
					var total = amt-tolessadv+vatamt-ret-lesswt;
					$("#netamti<?php echo $n; ?>").val(total.toFixed(4));
					</script>
					<?php $n++; } ?>
				</tr>
			</tbody>
		</table>