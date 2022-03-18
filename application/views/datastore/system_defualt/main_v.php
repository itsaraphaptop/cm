<style type="text/css">
	.form-horizontal .control-label[class*=col-lg-] {
		padding: 0px !important;
	}
	label {
		text-align: right !important;
	}
</style>

<?php if(isset($zzz)&&is_array($zzz) ): ?>
	<?php foreach ($zzz as $key) { ?>
<div class="">
	<div class="col-lg-12" >
		<div class="">
			<div class="panel-heading form-horizontal">
				<div class="row   panel panel-default border-grey">				
					<form method="post" action="<?php echo base_url();?>index.php/syscode_active/update_syscode/<?php echo $key->sys_code ?>">
						<div class="col-lg-12">					
							<div class="form-group">
								<!-- <label class="control-label col-lg-2">Syscode</label> -->
								<div class="col-lg-6">
									<input type="hidden" name="syscode" id="syscode" value="<?php echo $key->sys_code ?>" class="form-control" readonly>
								</div> 
								<div class="col-lg-6">
									 <div class="checkbox">
						                    <?php $q = $this->db->query("select valuess from master_checking where keyss='pr_material_check'")->result();
						                    	$cck = "";
						                            foreach ($q as $k) {
						                              $cck = $k->valuess;
						                            }
						                             if ($cck=="Y") {
						                             ?>
						                      <label>
						                        <input type="checkbox" class="chkprmat styled" checked>
						                         <input type="hidden" value="Y" id="chkprmat">
						                        เปิด PR กำหนด material เอง
						                      </label>
						                      <?php }else{?>
												<label>
						                        <input type="checkbox" class="chkprmat styled">
						                         <input type="hidden" value="" id="chkprmat">
						                        เปิด PR กำหนด material เอง
						                      </label>
						                        <?php } ?>

						                    </div>
								</div>

							</div>
						</div>
			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-component">
						<li class="active"><a href="#basic-rounded-tab1" data-toggle="tab">AP</a></li>
						<li><a href="#basic-rounded-tab2" data-toggle="tab">AR</a></li>
					</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="basic-rounded-tab1">
						<div class="col-lg-12">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ต้นทุนชื่อวัสดุ:<br>
								MATERIAL COST - OUTSIDE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_cost_mat" readonly="" id="pac_cost_mat" value="<?php echo $key->pac_cost_mat?>" class="form-control">
									<div class="input-group-btn">
										<a class="open1 btn btn-info btn-icon" data-toggle="modal" data-target="#open1"><i class="icon-search4"></i></a>
									</div>
								</div>
									
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ต้นทุนค่ารับเหมาช่วง:<br>SUBCONTRACTOR COST-OUTSIDE DEDUCT MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_cost_cont" readonly="" id="pac_cost_cont" value="<?php echo $key->pac_cost_cont ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open2 btn btn-info btn-icon" data-toggle="modal" data-target="#open2"><i class="icon-search4"></i></a>
									</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">DEDUCT MATERIAL:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_cost_cont_mat" readonly="" id="pac_cost_cont_mat" value="<?php echo $key->pac_cost_cont_mat ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open3 btn btn-info btn-icon" data-toggle="modal" data-target="#open3"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ต้นทุนค่าใช้จ่ายทั่วไป: <br>
								GENERAL COST - OUTSIDE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_costexpens_ex" readonly="" id="pac_costexpens_ex" value="<?php echo $key->pac_costexpens_ex ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open4 btn btn-info btn-icon" data-toggle="modal" data-target="#open4"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ค่าใช้จ่ายอื่นๆ ค้างจ่าย:<br>ACCRUED OTHER EXPENSES</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_expens" id="pac_expens" readonly="" value="<?php echo $key->pac_expens ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open5 btn btn-info btn-icon" data-toggle="modal" data-target="#open5"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีซื้อ:<br>INPUT VAT - CURRENT YEAR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_taxvat_due" readonly="" id="pac_taxvat_due" value="<?php echo $key->pac_taxvat_due ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open6 btn btn-info btn-icon" data-toggle="modal" data-target="#open6"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C VAT NO DOCUMENT TAX:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_taxvat_nodoc" readonly="" id="pac_taxvat_nodoc" value="<?php echo $key->pac_taxvat_nodoc ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open7 btn btn-info btn-icon" data-toggle="modal" data-target="#open7"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีซื้อไม่ครบกำหนด:<br>SUSPENSE INPUT VAT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_taxvat_nodue" readonly="" id="pac_taxvat_nodue" value="<?php echo $key->pac_taxvat_nodue ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open8 btn btn-info btn-icon" data-toggle="modal" data-target="#open8"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้การค้า ค่าวัสดุ:<br>A/P TRADE-LOCAL MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_inmat" readonly="" id="pac_vender_inmat" value="<?php echo $key->pac_vender_inmat ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open9 btn btn-info btn-icon" data-toggle="modal" data-target="#open9"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้การค้า-ในประเทศ อื่นๆ:<br>A/P TRADE-LOCAL OTHERS</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_inoth" readonly="" id="pac_vender_inoth" value="<?php echo $key->pac_vender_inoth ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open10 btn btn-info btn-icon" data-toggle="modal" data-target="#open10"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เงินจ่ายล่วงหน้าให้แก่ผู้รับเหมาช่วง:<br>ADVANCE TO SUBCONTRACTOR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_dow" readonly="" id="pac_vender_dow" value="<?php echo $key->pac_vender_dow ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open11 btn btn-info btn-icon" data-toggle="modal" data-target="#open11"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้การค้า-ในประเทศ ผู้รับเหมาช่วง:<br>A/P TRADE-LOCAL SUBCONTRACTOR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_incont" readonly="" id="pac_vender_incont" value="<?php echo $key->pac_vender_incont ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open12 btn btn-info btn-icon" data-toggle="modal" data-target="#open12"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้เงินประกันผลงาน-ผู้รับเหมาช่วง:<br>ACCOUNTS PAYABLE-RETENTION (SUBCONTRACTOR)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_retcont" readonly="" id="pac_vender_retcont" value="<?php echo $key->pac_vender_retcont ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open13 btn btn-info btn-icon" data-toggle="modal" data-target="#open13"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เงินจ่ายล่วงหน้าให้แก่เจ้าหนี้การค้า-ค่าวัสดุ:<br>ADVANCE TO SUPPLIER-MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_down_apv" readonly="" id="pac_down_apv" value="<?php echo $key->pac_down_apv ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open14 btn btn-info btn-icon" data-toggle="modal" data-target="#open14"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้เงินประกันผลงาน-ค่าวัสดุ:<br>ACCOUNT PAYABLE-RETENTION (MATERIAL)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_ret_apv" readonly="" id="pac_ret_apv" value="<?php echo $key->pac_ret_apv ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open15 btn btn-info btn-icon" data-toggle="modal" data-target="#open15"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก รืที่จ่ายค้างจ่าย-บุคคล (ภงด.3):<br>ACCRUED W/T-NON JURISTIC (3)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_3" readonly="" id="pac_whtax_3" value="<?php echo $key->pac_whtax_3 ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open16 btn btn-info btn-icon" data-toggle="modal" data-target="#open16"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่าย-นิติบุคคล (ภงด.53):<br>ACCRUED W/T-NON JURISTIC (53)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_53" readonly="" id="pac_whtax_53" value="<?php echo $key->pac_whtax_53 ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open17 btn btn-info btn-icon" data-toggle="modal" data-target="#open17"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่ายค้างจ่าย-นิติบุคคล (ภงด.1):<br>ACCRUED W/T-NON JURISTIC (1)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_1" readonly="" id="pac_whtax_1" value="<?php echo $key->pac_whtax_1 ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open18 btn btn-info btn-icon" data-toggle="modal" data-target="#open18"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่ายค้างจ่าย-นิติบุคคล (ภงด.2):<br>ACCRUED W/T-NON JURISTIC (2)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_2" readonly="" id="pac_whtax_2" value="<?php echo $key->pac_whtax_2 ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open19 btn btn-info btn-icon" data-toggle="modal" data-target="#open19"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่ายค้างจ่าย-นิติบุคคล (ภงด.54):<br>ACCRUED W/T-NON JURISTIC (54)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_54" readonly="" id="pac_whtax_54" value="<?php echo $key->pac_whtax_54 ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open20 btn btn-info btn-icon" data-toggle="modal" data-target="#open20"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C สินค้าคงเหลือ-เครื่องจักรและอปุกรณ์:<br>INVENTORY-MAINEQUIPMENT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_item_bal" readonly="" id="pac_item_bal" value="<?php echo $key->pac_item_bal ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open21 btn btn-info btn-icon" data-toggle="modal" data-target="#open21"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C Post Dated Cheque:<br></label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_chqpost" readonly="" id="pac_chqpost" value="<?php echo $key->pac_chqpost ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open22 btn btn-info btn-icon" data-toggle="modal" data-target="#open22"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- close tab1 -->


				<div class="tab-pane" id="basic-rounded-tab2">
					<div class="col-lg-12">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้การค้า-ในประเทศ:<br>ACCOUNT RECEIVABLES LOCEL-OTHER</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arlt" readonly="" id="ar_arlt" value="<?php echo $key->ar_arlt ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open23 btn btn-info btn-icon" data-toggle="modal" data-target="#open23"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้การค้า-อื่นๆ:<br>ACCOUNT RECEIVABLES OTHER</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arolt" readonly="" id="ar_arolt" value="<?php echo $key->ar_arolt ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open24 btn btn-info btn-icon" data-toggle="modal" data-target="#open24"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้ประกันผลงานตามสัญญาก่อสร้าง:<br>ACCOUNT RECEIVABLE-RETENTION (SUBCONTRACTOR)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arr" readonly="" id="ar_arr" value="<?php echo $key->ar_arr ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open25 btn btn-info btn-icon" data-toggle="modal" data-target="#open25"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีเงินได้นิติบุคคลหัก ณ.ที่จ่ายตั้งพัก:<br>W/T DEDUCTED AT SOURCE-SUSPENSE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_wtdss" readonly="" id="ar_wtdss" value="<?php echo $key->ar_wtdss ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open26 btn btn-info btn-icon" data-toggle="modal" data-target="#open26"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีเงินได้นิติบุคคลหัก ณ.ที่จ่าย-ปีปัจจุบัน:<br>W/T DEDUCTED AT SOURCE-CURRENT YEAR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_wtdsc" readonly="" id="ar_wtdsc" value="<?php echo $key->ar_wtdsc ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open27 btn btn-info btn-icon" data-toggle="modal" data-target="#open27"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">เงินรับล่วงหน้าจากลูกค้าตามสัญญาก่อสร้าง:<br>ADVANCE RECEIVED FROM CUSTOMERS-SUBCONTRACTOR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arcs" readonly="" id="ar_arcs" value="<?php echo $key->ar_arcs ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open28 btn btn-info btn-icon" data-toggle="modal" data-target="#open28"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีขายยังไม่ครบกำหนดชำระ:<br>SUSPENSE OUTPUT VAT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_sov" readonly="" id="ar_sov" value="<?php echo $key->ar_sov ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open29 btn btn-info btn-icon" data-toggle="modal" data-target="#open29"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีขาย-ปีปัจจุบัน:<br>OUTPUT VAT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_ov" readonly="" id="ar_ov" value="<?php echo $key->ar_ov ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open30 btn btn-info btn-icon" data-toggle="modal" data-target="#open30"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">รายได้ตั้งพัก:<br>PROGRESS PAYMENT RECEIVED</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_ppr" readonly="" id="ar_ppr" value="<?php echo $key->ar_ppr ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open31 btn btn-info btn-icon" data-toggle="modal" data-target="#open31"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">เช็ครับล่วงหน้า:<br>POST DATE CHEQUE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_prechq" readonly="" id="ar_prechq" value="<?php echo $key->ar_prechq ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open32 btn btn-info btn-icon" data-toggle="modal" data-target="#open32"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">รายได้อื่นๆ:<br>OTHER INCOMES</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_aroin" readonly="" id="ar_aroin" value="<?php echo $key->ar_aroin ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open33 btn btn-info btn-icon" data-toggle="modal" data-target="#open33"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้ประกันผลงานตามสัญญาซื้อขาย:<br>ACCOUNT RECEIVABLE-RETENTION (MATERIAL)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_ret_sale" readonly="" id="ar_ret_sale" value="<?php echo $key->ar_ret_sale ?>"  class="form-control">
									<div class="input-group-btn">
										<a class="open34 btn btn-info btn-icon" data-toggle="modal" data-target="#open34"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">เงินรับล่วงหน้าจากลูกค้าตามสัญญาซื้อขาย:<br>ADVANCE RECEIVED FROM CUSTOMERS-MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_down_sale" readonly="" id="ar_down_sale" value="<?php echo $key->ar_down_sale ?>"  class="form-control">
									<div class="input-group-btn">
										<a class="open35 btn btn-info btn-icon" data-toggle="modal" data-target="#open35"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ต้นทุนค่าวัสดุ:<br>COST OF MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_cost_sale" readonly="" id="ar_cost_sale" value="<?php echo $key->ar_cost_sale ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open36 btn btn-info btn-icon" data-toggle="modal" data-target="#open36"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">รายได้จากการขายสินค้า:<br>SALE INCOMES</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_rev_sale" readonly="" id="ar_rev_sale" value="<?php echo $key->ar_rev_sale ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open37 btn btn-info btn-icon" data-toggle="modal" data-target="#open37"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">สินค้าคงเหลือ-วัสดุก่อสร้าง:<br>INVENTORY-MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_stock" readonly="" id="ar_stock" value="<?php echo $key->ar_stock ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open38 btn btn-info btn-icon" data-toggle="modal" data-target="#open38"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">PROFIT AND LOSS EXCHANGE RATE:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="plexc_ac_code" readonly="" id="plexc_ac_code" value="<?php echo $key->plexc_ac_code ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open39 btn btn-info btn-icon" data-toggle="modal" data-target="#open39"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้อื่นจากการขายทรัพย์สิน:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_cust" readonly="" id="fa_cust" value="<?php echo $key->fa_cust ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open40 btn btn-info btn-icon" data-toggle="modal" data-target="#open40"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ขาดทุนจากการขายทรัพย์สิน:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_loss" readonly="" id="fa_loss" value="<?php echo $key->fa_loss ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open41 btn btn-info btn-icon" data-toggle="modal" data-target="#open41"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">กำไรจากการขายทรัพย์สิน:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_profit" readonly="" id="fa_profit" value="<?php echo $key->fa_profit ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open42 btn btn-info btn-icon" data-toggle="modal" data-target="#open42"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ค่าใช้จ่ายทรัพย์สินสูญหาย:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_cut" readonly="" id="fa_cut" value="<?php echo $key->fa_cut ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open43 btn btn-info btn-icon" data-toggle="modal" data-target="#open43"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">MA ต้นทุนค่าของ:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ma_cost_ic" readonly="" id="ma_cost_ic" value="<?php echo $key->ma_cost_ic ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open44 btn btn-info btn-icon" data-toggle="modal" data-target="#open44"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">MA ต้นทุนค่าแรง:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ma_cost_lab" readonly="" id="ma_cost_lab" value="<?php echo $key->ma_cost_lab ?>" class="form-control">
									<div class="input-group-btn">
										<a class="open45 btn btn-info btn-icon" data-toggle="modal" data-target="#open45"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					</div>
				</div>
			</div>
						<div class="form-group col-md-12" align="right">
						  	<button type="submit" class="btn bg-success btn-sm"><i class="icon-floppy-disk"></i> save</button>
						  	<a id="fa_close" href="<?php echo base_url(); ?>data_master" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
						  	<!-- <button type="reset" class="btn btn-info btn-sm">reset</button> -->
						</div>						
						</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>


<?php else : ?>
	<div class="content">
	<h6 class="content-group text-semibold">Setup System Defualt</h6>
	<div class="col-lg-12" >
		<div class="panel panel-flat">
			<div class="panel-heading form-horizontal">
				<div class="row">
					<form method="post" action="<?php echo base_url();?>index.php/syscode_active/insert_syscode">
						<div class="col-lg-12">	
							<div class="form-group">
								<label class="control-label col-lg-2">Syscode</label>
								<div class="col-lg-2">
									<input type="text" name="syscode" id="syscode"  class="form-control" readonly>
								</div> 
								<div class="col-lg-8">
									<input typ ="text" class="form-control" name="" value="">
								</div>

							</div>
						</div>
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ต้นทุนชื่อวัสดุ:<br>
								MATERIAL COST - OUTSIDE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_cost_mat" id="pac_cost_mat" class="form-control">
									<div class="input-group-btn">
										<a class="open1 btn btn-info btn-icon" data-toggle="modal" data-target="#open1"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ต้นทุนค่ารับเหมาช่วง:<br>SUBCONTRACTOR COST-OUTSIDE DEDUCT MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_cost_cont" id="pac_cost_cont" class="form-control">
									<div class="input-group-btn">
										<a class="open2 btn btn-info btn-icon" data-toggle="modal" data-target="#open2"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">DEDUCT MATERIAL:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_cost_cont_mat" id="pac_cost_cont_mat"class="form-control">
									<div class="input-group-btn">
										<a class="open3 btn btn-info btn-icon" data-toggle="modal" data-target="#open3"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ต้นทุนค่าใช้จ่ายทั่วไป: <br>
								GENERAL COST - OUTSIDE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_costexpens_ex" id="pac_costexpens_ex"  class="form-control">
									<div class="input-group-btn">
										<a class="open4 btn btn-info btn-icon" data-toggle="modal" data-target="#open4"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ค่าใช้จ่ายอื่นๆ ค้างจ่าย:<br>ACCRUED OTHER EXPENSES</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_expens" id="pac_expens"class="form-control">
									<div class="input-group-btn">
										<a class="open5 btn btn-info btn-icon" data-toggle="modal" data-target="#open5"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีซื้อ:<br>INPUT VAT - CURRENT YEAR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_taxvat_due" id="pac_taxvat_due" class="form-control">
									<div class="input-group-btn">
										<a class="open6 btn btn-info btn-icon" data-toggle="modal" data-target="#open6"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C VAT NO DOCUMENT TAX:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_taxvat_nodoc" id="pac_taxvat_nodoc" class="form-control">
									<div class="input-group-btn">
										<a class="open7 btn btn-info btn-icon" data-toggle="modal" data-target="#open7"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีซื้อไม่ครบกำหนด:<br>SUSPENSE INPUT VAT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_taxvat_nodue" id="pac_taxvat_nodue" class="form-control">
									<div class="input-group-btn">
										<a class="open8 btn btn-info btn-icon" data-toggle="modal" data-target="#open8"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้การค้า ค่าวัสดุ:<br>A/P TRADE-LOCAL MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_inmat" id="pac_vender_inmat"class="form-control">
									<div class="input-group-btn">
										<a class="open9 btn btn-info btn-icon" data-toggle="modal" data-target="#open9"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้การค้า-ในประเทศ อื่นๆ:<br>A/P TRADE-LOCAL OTHERS</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_inoth" id="pac_vender_inoth" class="form-control">
									<div class="input-group-btn">
										<a class="open10 btn btn-info btn-icon" data-toggle="modal" data-target="#open10"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เงินจ่ายล่วงหน้าให้แก่ผู้รับเหมาช่วง:<br>ADVANCE TO SUBCONTRACTOR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_dow" id="pac_vender_dow"  class="form-control">
									<div class="input-group-btn">
										<a class="open11 btn btn-info btn-icon" data-toggle="modal" data-target="#open11"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้การค้า-ในประเทศ ผู้รับเหมาช่วง:<br>A/P TRADE-LOCAL SUBCONTRACTOR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_incont" id="pac_vender_incont" class="form-control">
									<div class="input-group-btn">
										<a class="open12 btn btn-info btn-icon" data-toggle="modal" data-target="#open12"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้เงินประกันผลงาน-ผู้รับเหมาช่วง:<br>ACCOUNTS PAYABLE-RETENTION (SUBCONTRACTOR)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_vender_retcont" id="pac_vender_retcont" class="form-control">
									<div class="input-group-btn">
										<a class="open13 btn btn-info btn-icon" data-toggle="modal" data-target="#open13"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เงินจ่ายล่วงหน้าให้แก่เจ้าหนี้การค้า-ค่าวัสดุ:<br>ADVANCE TO SUPPLIER-MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_down_apv" id="pac_down_apv"  class="form-control">
									<div class="input-group-btn">
										<a class="open14 btn btn-info btn-icon" data-toggle="modal" data-target="#open14"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C เจ้าหนี้เงินประกันผลงาน-ค่าวัสดุ:<br>ACCOUNT PAYABLE-RETENTION (MATERIAL)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_ret_apv" id="pac_ret_apv"  class="form-control">
									<div class="input-group-btn">
										<a class="open15 btn btn-info btn-icon" data-toggle="modal" data-target="#open15"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก รืที่จ่ายค้างจ่าย-บุคคล (ภงด.3):<br>ACCRUED W/T-NON JURISTIC (3)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_3" id="pac_whtax_3"  class="form-control">
									<div class="input-group-btn">
										<a class="open16 btn btn-info btn-icon" data-toggle="modal" data-target="#open16"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่าย-นิติบุคคล (ภงด.53):<br>ACCRUED W/T-NON JURISTIC (53)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_53" id="pac_whtax_53"  class="form-control">
									<div class="input-group-btn">
										<a class="open17 btn btn-info btn-icon" data-toggle="modal" data-target="#open17"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่ายค้างจ่าย-นิติบุคคล (ภงด.1):<br>ACCRUED W/T-NON JURISTIC (1)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_1" id="pac_whtax_1"  class="form-control">
									<div class="input-group-btn">
										<a class="open18 btn btn-info btn-icon" data-toggle="modal" data-target="#open18"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่ายค้างจ่าย-นิติบุคคล (ภงด.2):<br>ACCRUED W/T-NON JURISTIC (2)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_2" id="pac_whtax_2"  class="form-control">
									<div class="input-group-btn">
										<a class="open19 btn btn-info btn-icon" data-toggle="modal" data-target="#open19"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C ภาษีเงินได้ หัก ณ ที่จ่ายค้างจ่าย-นิติบุคคล (ภงด.54):<br>ACCRUED W/T-NON JURISTIC (54)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_whtax_54" id="pac_whtax_54"  class="form-control">
									<div class="input-group-btn">
										<a class="open20 btn btn-info btn-icon" data-toggle="modal" data-target="#open20"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C สินค้าคงเหลือ-เครื่องจักรและอปุกรณ์:<br>INVENTORY-MAINEQUIPMENT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_item_bal" id="pac_item_bal"  class="form-control">
									<div class="input-group-btn">
										<a class="open21 btn btn-info btn-icon" data-toggle="modal" data-target="#open21"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">A/C Post Dated Cheque:<br></label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="pac_chqpost" id="pac_chqpost"  class="form-control">
									<div class="input-group-btn">
										<a class="open22 btn btn-info btn-icon" data-toggle="modal" data-target="#open22"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>


						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้การค้า-ในประเทศ:<br>ACCOUNT RECEIVABLES LOCEL-OTHER</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arlt" id="ar_arlt"  class="form-control">
									<div class="input-group-btn">
										<a class="open23 btn btn-info btn-icon" data-toggle="modal" data-target="#open23"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้การค้า-อื่นๆ:<br>ACCOUNT RECEIVABLES OTHER</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arolt" id="ar_arolt"  class="form-control">
									<div class="input-group-btn">
										<a class="open24 btn btn-info btn-icon" data-toggle="modal" data-target="#open24"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้ประกันผลงานตามสัญญาก่อสร้าง:<br>ACCOUNT RECEIVABLE-RETENTION (SUBCONTRACTOR)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arr" id="ar_arr"  class="form-control">
									<div class="input-group-btn">
										<a class="open25 btn btn-info btn-icon" data-toggle="modal" data-target="#open25"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีเงินได้นิติบุคคลหัก ณ.ที่จ่ายตั้งพัก:<br>W/T DEDUCTED AT SOURCE-SUSPENSE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_wtdss" id="ar_wtdss" class="form-control">
									<div class="input-group-btn">
										<a class="open26 btn btn-info btn-icon" data-toggle="modal" data-target="#open26"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีเงินได้นิติบุคคลหัก ณ.ที่จ่าย-ปีปัจจุบัน:<br>W/T DEDUCTED AT SOURCE-CURRENT YEAR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_wtdsc" id="ar_wtdsc" class="form-control">
									<div class="input-group-btn">
										<a class="open27 btn btn-info btn-icon" data-toggle="modal" data-target="#open27"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">เงินรับล่วงหน้าจากลูกค้าตามสัญญาก่อสร้าง:<br>ADVANCE RECEIVED FROM CUSTOMERS-SUBCONTRACTOR</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_arcs" id="ar_arcs" class="form-control">
									<div class="input-group-btn">
										<a class="open28 btn btn-info btn-icon" data-toggle="modal" data-target="#open28"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีขายยังไม่ครบกำหนดชำระ:<br>SUSPENSE OUTPUT VAT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_sov" id="ar_sov" class="form-control">
									<div class="input-group-btn">
										<a class="open29 btn btn-info btn-icon" data-toggle="modal" data-target="#open29"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ภาษีขาย-ปีปัจจุบัน:<br>OUTPUT VAT</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_ov" id="ar_ov"  class="form-control">
									<div class="input-group-btn">
										<a class="open30 btn btn-info btn-icon" data-toggle="modal" data-target="#open30"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">รายได้ตั้งพัก:<br>PROGRESS PAYMENT RECEIVED</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_ppr" id="ar_ppr" class="form-control">
									<div class="input-group-btn">
										<a class="open31 btn btn-info btn-icon" data-toggle="modal" data-target="#open31"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">เช็ครับล่วงหน้า:<br>POST DATE CHEQUE</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_prechq" id="ar_prechq"  class="form-control">
									<div class="input-group-btn">
										<a class="open32 btn btn-info btn-icon" data-toggle="modal" data-target="#open32"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">รายได้อื่นๆ:<br>OTHER INCOMES</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_aroin" id="ar_aroin" class="form-control">
									<div class="input-group-btn">
										<a class="open33 btn btn-info btn-icon" data-toggle="modal" data-target="#open33"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้ประกันผลงานตามสัญญาซื้อขาย:<br>ACCOUNT RECEIVABLE-RETENTION (MATERIAL)</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_ret_sale" id="ar_ret_sale"  class="form-control">
									<div class="input-group-btn">
										<a class="open34 btn btn-info btn-icon" data-toggle="modal" data-target="#open34"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">เงินรับล่วงหน้าจากลูกค้าตามสัญญาซื้อขาย:<br>ADVANCE RECEIVED FROM CUSTOMERS-MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_down_sale" id="ar_down_sale"   class="form-control">
									<div class="input-group-btn">
										<a class="open35 btn btn-info btn-icon" data-toggle="modal" data-target="#open35"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ต้นทุนค่าวัสดุ:<br>COST OF MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_cost_sale" id="ar_cost_sale"  class="form-control">
									<div class="input-group-btn">
										<a class="open36 btn btn-info btn-icon" data-toggle="modal" data-target="#open36"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">รายได้จากการขายสินค้า:<br>SALE INCOMES</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_rev_sale" id="ar_rev_sale"  class="form-control">
									<div class="input-group-btn">
										<a class="open37 btn btn-info btn-icon" data-toggle="modal" data-target="#open37"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">สินค้าคงเหลือ-วัสดุก่อสร้าง:<br>INVENTORY-MATERIAL</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ar_stock" id="ar_stock" class="form-control">
									<div class="input-group-btn">
										<a class="open38 btn btn-info btn-icon" data-toggle="modal" data-target="#open38"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">Profit and loss Exchange Rate:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="plexc_ac_code" id="plexc_ac_code"  class="form-control">
									<div class="input-group-btn">
										<a class="open39 btn btn-info btn-icon" data-toggle="modal" data-target="#open39"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ลูกหนี้อื่นจากการขายทรัพย์สิน:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_cust" id="fa_cust"  class="form-control">
									<div class="input-group-btn">
										<a class="open40 btn btn-info btn-icon" data-toggle="modal" data-target="#open40"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ขาดทุนจากการขายทรัพย์สิน:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_loss" id="fa_loss"  class="form-control">
									<div class="input-group-btn">
										<a class="open41 btn btn-info btn-icon" data-toggle="modal" data-target="#open41"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">กำไรจากการขายทรัพย์สิน:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_profit" id="fa_profit"  class="form-control">
									<div class="input-group-btn">
										<a class="open42 btn btn-info btn-icon" data-toggle="modal" data-target="#open42"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">ค่าใช้จ่ายทรัพย์สินสูญหาย:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="fa_cut" id="fa_cut" class="form-control">
									<div class="input-group-btn">
										<a class="open43 btn btn-info btn-icon" data-toggle="modal" data-target="#open43"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">MA ต้นทุนค่าของ:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ma_cost_ic" id="ma_cost_ic"  class="form-control">
									<div class="input-group-btn">
										<a class="open44 btn btn-info btn-icon" data-toggle="modal" data-target="#open44"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-8">MA ต้นทุนค่าแรง:</label>
								<div class="col-lg-4">
								<div class="input-group">
									<input type="text" name="ma_cost_lab" id="ma_cost_lab"  class="form-control">
									<div class="input-group-btn">
										<a class="open45 btn btn-info btn-icon" data-toggle="modal" data-target="#open45"><i class="icon-search4"></i></a>
									</div>
								</div>
								</div>
							</div>
						</div>
					
						<div class="form-group col-md-12" align="right">
						  	<button type="submit" class="btn bg-success btn-sm"><i class="icon-floppy-disk"></i> save</button>
						  	<button type="reset" class="btn btn-info btn-sm">reset</button>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>
<?php endif ;  ?>

<?php for ($i=0; $i <=45 ; $i++) { ?>
	  <!-- Basic modal -->
					<div id="open<?php echo $i; ?>" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Select Account <?php echo $i; ?></h5>
								</div>

								<div class="modal-body">
								 <div id="load<?php echo $i; ?>"></div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /basic modal -->

					<script type="text/javascript">
					$(".open<?php echo $i; ?>").click(function(){
						$("#load<?php echo $i; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
						$("#load<?php echo $i; ?>").load("<?php echo base_url(); ?>syscode/load_acc/<?php echo $i; ?>");
					});
					</script>
<?php } ?>


<script>
  $(".chkprmat").click(function(){
    if($("#chkprmat").val()=="Y"){
      $("#chkprmat").val("");
    }else{
      $("#chkprmat").val("Y");
    }
     var url="<?php echo base_url(); ?>data_master2/pr_material_check";
      var dataSet={
          chkprmat: $("#chkprmat").val(),
        };
      $.post(url,dataSet,function(data){

      });
    });
</script>