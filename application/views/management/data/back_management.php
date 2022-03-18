<?php
  function DateThai($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
  }

  $strDate = date("Y-m-d");
  // echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>
<div class="content-wrapper">



	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h2>Back Account Management</h2>
				<hr/>
				<div class="table-responsive">
					<table class="table table-bordered" id="data_master">
						<thead>
							<tr class="bg-info">
								<th class="text-center">No.</th>
								<th class="text-center">Bk. Code</th>
								<th class="text-center">
									<div style="width: 300px;">Bank.</div>
								</th>
								<th class="text-center">
									<div style="width: 100px;">Account No.</div>
								</th>
								<th class="text-center">
									<div style="width: 200px;">Account Name</div>
								</th>
								<th class="text-center">Type</th>
								<th class="text-center">Branch</th>
								<th class="text-center">A/C</th>
								<th class="text-center">
									<div style="width: 150px;">Begining Amount</div>
				</div>
				</th>
				<!-- <th class="text-center"><div style="width: 100px;">Begining Date</div></th> -->
				<th class="text-center">
					<div style="width: 150px;">Debit (1)</div>
				</th>
				<th class="text-center">
					<div style="width: 150px;">Credit (2)</div>
				</th>
				<th class="text-center">
					<div style="width: 150px;">Balance (1)-(2)</div>
				</th>
				<!-- <th class="text-center">Post Date Cheque 1</th>
                  <th class="text-center">Post Date Cheque 2</th> -->
				<th class="text-center">
					<div style="width: 150px;">Cheque to Pay / Transfer Onhand</div>
				</th>
				<th class="text-center">
					<div style="width: 150px;">Sub bal.</div>
				</th>
				<!--  <th class="text-center">Ap in Process</th> -->
				<!-- <th class="text-center">Total Bal.</th>
                  <th class="text-center">Availlabal Bal.</th> -->
				</tr>





				</thead>
				<tbody>
					<?php
      $this->db->select('*');
   
      $pjbank = $this->db->get('bank_account')->result(); 
      ?>
					<?php $n=1; foreach ($pjbank as $bankk) { ?>
					<?php
      $this->db->select('*');
      $b1 = $this->db->get('bank')->result(); 
      foreach ($b1 as $keyb1) {
       $bank_name = $keyb1->bank_name;
      }
      ?>
					<?php
      $this->db->select('*');
      $b2 = $this->db->get('bank_branch')->result(); 
       foreach ($b2 as $keyb2) {
        $branch_name = $keyb2->branch_name;
      }
      ?>

					<?php
      $this->db->select('*');
      $this->db->where('bank_no',$bankk->acc_code);
      $b3 = $this->db->get('bankforward')->result(); 
      $amt_bank = 0;
       foreach ($b3 as $keyb3) {
        $amt_bank = $amt_bank+$keyb3->amt_bank;
      }
      ?>

					<?php
      $this->db->select('*');
      $this->db->where('acc_code',$bankk->acc_code);
      $this->db->where('ap_cheque_header.ap_status',"confirm");
      $this->db->join('ap_cheque_detail','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $b4 = $this->db->get('ap_cheque_header')->result(); 
      $api_amt = 0;
      $appaid_date = "";
       foreach ($b4 as $keyb4) {
        $appaid_date = $keyb4->appaid_date;
       $api_amt = $api_amt + $keyb4->api_amt;
      }
      ?>

					<?php
      $this->db->select('*');
      $this->db->where('acc_code',$bankk->acc_code);
      $this->db->where('ap_cheque_header.ap_status',"wait");
      $this->db->join('ap_cheque_detail','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $b5 = $this->db->get('ap_cheque_header')->result(); 
      $api_amtt = 0;

       foreach ($b5 as $keyb5) {
       $appaid_date = $keyb5->appaid_date;
       $api_amtt = $api_amtt + $keyb5->api_amt;
      }
      ?>

					<tr>
						<td class="text-center">
							<?php echo $n; ?>
						</td>
						<td class="text-left">
							<?php echo $bankk->bank_code; ?>
						</td>
						<td class="text-left">
							<?php echo $bank_name; ?>
						</td>
						<td class="text-left">
							<?php echo $bankk->acc_code; ?>
						</td>
						<td class="text-left">
							<?php echo $bankk->acc_name; ?>
						</td>
						<td class="text-center">
							<?php echo $bankk->acc_type; ?>
						</td>
						<td class="text-center">
							<?php echo $branch_name; ?>
						</td>
						<td class="text-center">
							<?php echo $bankk->acc_no; ?>
						</td>
						<td class="text-right">
							<a data-toggle="modal" data-target="#begining<?php echo $bankk->acc_code; ?>">
								<?php echo number_format($amt_bank,2); ?>
							</a>
						</td>
						<!-- <td class="text-center"><div style="width: 100px;"><?php echo DateThai($bankk->branch_date); ?>
			</div>
			</td> -->
			<td class="text-right">
				<a data-toggle="modal" data-target="#begining<?php echo $bankk->acc_code; ?>">
					<?php echo number_format($amt_bank,2); ?>
				</a>
			</td>
			<td class="text-right">
				<a data-toggle="modal" data-target="#credit<?php echo $bankk->acc_code; ?>">
					<?php echo number_format($api_amt,2); ?>
				</a>
			</td>
			<td class="text-right">
				<?php echo number_format($amt_bank-$api_amt,2); ?>
			</td>
			<!-- <td class="text-center"></td> -->
			<td class="text-right">
				<div style="width: 100px;">
					<?php echo substr($appaid_date, 0,10); ?>
				</div>
			</td>
			<td class="text-right">
				<a data-toggle="modal" data-target="#creditck<?php echo $bankk->acc_code; ?>">
					<?php echo number_format($api_amtt,2); ?>
				</a>
			</td>
			<!-- <td class="text-center">เอาแค่ type APS</td>
                  <td class="text-center"></td>
                  <td class="text-center"></td>
        -->
			</tr>



			<?php $n++; } ?>
			</tbody>
			</table>
		</div>

	</div>
</div>
</div>


<?php  foreach ($pjbank as $bankk) { ?>
<div id="begining<?php echo $bankk->acc_code; ?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Begining Amount
					<?php echo $bankk->acc_code; ?>
				</h6>
			</div>

			<div class="modal-body">
				<table class="table table-hover table-bordered table-striped table-xxs" id="res">
					<thead>
						<tr>

							<th class="text-center">Project No.</th>
							<th width="20%" style="text-align: center;">Dept Code.</th>
							<th width="20%" style="text-align: center;">Column Name</th>
							<th style="text-align: center;">Amount</th>

						</tr>
					</thead>
					<?php
      $this->db->select('*');
      $this->db->where('bank_no',$bankk->acc_code);
      $bf = $this->db->get('bankforward')->result(); 
      $amt_bank = 0;
      foreach ($bf as $fb) { 
      $amt_bank = $amt_bank+$fb->amt_bank;
        ?>
					<tbody>
						<tr>
							<td class="text-center" width="10%">
								<?php echo $fb->pj_bk; ?>
							</td>
							<td class="text-center" width="10%">
								<?php echo $fb->dm_bk; ?>
							</td>
							<td class="text-center" width="50%">
								<?php echo $fb->pjdm_bank; ?>
							</td>
							<td class="text-right">
								<?php echo number_format($fb->amt_bank,2); ?>
							</td>
						</tr>
					</tbody>
					<?php  } ?>




					<tbody>
						<tr>
							<td colspan="3" class="text-center">Total</td>
							<td class="text-right">
								<?php echo number_format($amt_bank,2); ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


<div id="credit<?php echo $bankk->acc_code; ?>" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Credit
					<?php echo $bankk->acc_code; ?>
				</h6>
			</div>

			<div class="modal-body">
				<table class="table table-hover table-bordered table-striped table-xxs">
					<thead>
						<tr>
							<th class="text-right" width="10%">AP/No</th>
							<th class="text-right" class="text-right" width="10%">Cheque No. :</th>
							<th class="text-right" class="text-right" width="10%">Cheque Date. :</th>
							<th class="text-right" width="10%">Duedate</th>
							<th class="text-right" width="10%">PO/WO No.</th>
							<th class="text-right" width="10%">Tax/Inv No.</th>
							<th class="text-right" width="10%">Paid Net Amount</th>
							<th class="text-right" width="10%">Less Other</th>
							<th class="text-right" width="10%">Amount</th>
							<th class="text-right" width="10%">Advance</th>
							<th class="text-right" width="10%">Vat</th>
							<th class="text-right" width="10%">W/T Amount</th>
						</tr>
					</thead>
					<?php
      $this->db->select('*');
      $this->db->where('ap_cheque_header.acc_code',$bankk->acc_code);
      $this->db->where('ap_cheque_header.ap_status',"confirm");
      $this->db->join('ap_cheque_detail','ap_cheque_detail.api_code = ap_cheque_header.ap_code');
      $ch = $this->db->get('ap_cheque_header')->result(); 
      $api_netamt = 0;
      $api_less = 0;
      $api_amt = 0;
      $api_adv = 0;
      $api_vat = 0;
      $api_wt = 0;
      foreach ($ch as $hc) { 
$api_netamt = $api_netamt+$hc->api_netamt;
$api_less = $api_less+$hc->api_less;
$api_amt = $api_amt+$hc->api_amt;
$api_adv = $api_adv+$hc->api_adv;
$api_vat = $api_vat+$hc->api_vat;
$api_wt = $api_wt+$hc->api_wt;
        ?>
					<tbody>
						<tr>
							<td class="text-right">
								<?php echo $hc->api_no; ?>
							</td>
							<td class="text-right">
								<?php echo $hc->ap_chno; ?>
							</td>
							<td class="text-right">
								<?php echo $hc->ap_chnodate; ?>
							</td>
							<td class="text-right">
								<?php echo substr($hc->api_duedate,0,10); ?>
							</td>
							<td class="text-right">
								<?php echo $hc->api_pono; ?>
							</td>
							<td class="text-right">
								<?php echo $hc->api_inv; ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hc->api_netamt,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hc->api_less,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hc->api_amt,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hc->api_adv,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hc->api_vat,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hc->api_wt,2); ?>
							</td>
						</tr>

						<?php } ?>
						<tbody>
							<tr>
								<td colspan="4" class="text-center">Total</td>
								<td class="text-right">
									<?php echo number_format($api_netamt,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_less,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_amt,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_adv,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_vat,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_wt,2); ?>
								</td>
							</tr>
						</tbody>
				</table>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<div id="creditck<?php echo $bankk->acc_code; ?>" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Cheque to Pay
					<?php echo $bankk->acc_code; ?>
				</h6>
			</div>

			<div class="modal-body">
				<table class="table table-hover table-bordered table-striped table-xxs">
					<thead>
						<tr>
							<th class="text-right" width="10%">AP/No</th>
							<th class="text-right" width="10%">Cheque No. :</th>
							<th class="text-right" width="10%">Cheque Date. :</th>
							<th class="text-right" width="10%">Duedate</th>
							<th class="text-right" width="10%">PO/WO No.</th>
							<th class="text-right" width="10%">Tax/Inv No.</th>
							<th class="text-right" width="10%">Paid Net Amount</th>
							<th class="text-right" width="10%">Less Other</th>
							<th class="text-right" width="10%">Amount</th>
							<th class="text-right" width="10%">Advance</th>
							<th class="text-right" width="10%">Vat</th>
							<th class="text-right" width="10%">W/T Amount</th>
						</tr>
					</thead>
					<?php
      $this->db->select('*');
      $this->db->where('ap_cheque_header.acc_code',$bankk->acc_code);
      $this->db->where('ap_cheque_header.ap_status',"wait");
      $this->db->join('ap_cheque_detail','ap_cheque_detail.api_code = ap_cheque_header.ap_code');
      $chi = $this->db->get('ap_cheque_header')->result(); 
      $api_netamti = 0;
      $api_lessi = 0;
      $api_amti = 0;
      $api_advi = 0;
      $api_vati = 0;
      $api_wti= 0;
      foreach ($chi as $hci) { 
$api_netamti = $api_netamt+$hci->api_netamt;
$api_lessi = $api_less+$hci->api_less;
$api_amti = $api_amt+$hci->api_amt;
$api_advi = $api_adv+$hci->api_adv;
$api_vati = $api_vat+$hci->api_vat;
$api_wti = $api_wt+$hci->api_wt;
        ?>
					<tbody>
						<tr>
							<td class="text-right">
								<?php echo $hci->api_no; ?>
							</td>
							<td class="text-right">
								<?php echo $hci->ap_chno; ?>
							</td>
							<td class="text-right">
								<?php echo $hci->ap_chnodate; ?>
							</td>
							<td class="text-right">
								<?php echo substr($hci->api_duedate,0,10); ?>
							</td>
							<td class="text-right">
								<?php echo $hci->api_pono; ?>
							</td>
							<td class="text-right">
								<?php echo $hci->api_inv; ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hci->api_netamt,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hci->api_less,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hci->api_amt,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hci->api_adv,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hci->api_vat,2); ?>
							</td>
							<td class="text-right">
								<?php echo number_format($hci->api_wt,2); ?>
							</td>
						</tr>

						<?php } ?>
						<tbody>
							<tr>
								<td colspan="6" class="text-center">Total</td>
								<td class="text-right">
									<?php echo number_format($api_netamti,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_lessi,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_amti,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_advi,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_vati,2); ?>
								</td>
								<td class="text-right">
									<?php echo number_format($api_wti,2); ?>
								</td>
							</tr>
						</tbody>
				</table>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<?php } ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
  $('#data_master').DataTable();
  $('#bank').attr('class','active');
</script>