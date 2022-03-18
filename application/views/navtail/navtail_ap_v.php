<style type="text/css" media="screen">
    .sidebar-category {
        padding-top: 50px;
    }

    #footer {
        padding-bottom: 6vh;
    }
</style>
<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 11;
$username = $session_data["username"];
$this->db->select('*');
$this->db->from('module_detail');
$this->db->join('module_header', 'module_detail.ref_module = module_header.module_id');
$this->db->where("ref_module",$id_module);
$query = $this->db->get();

$res_modules = $query->result_array();
//var_dump($res_modules);

        $array_module = array();
        $permission = array();
        
          $sub_modules =  $res_modules;
          foreach ($sub_modules as $key => $sub_module) {

                      //get read and write by user name
                      $this->db->select(
                        ["read","write"]
                      );
                      $where_array = array(
                        "ref_username" => $username,
                        "ref_module_id" => $id_module,
                         "ref_sub_module" => $sub_module["sub_module_id"]
                      );
                      $this->db->where($where_array);
                      $query = $this->db->get("member_permission");
                      $res_data = $query->result_array();
                      $read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
                      $write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";
                      
                      $permission[$sub_module["module_name"]][$sub_module["sub_module_id"]] =  array(
                        //"ref_module_id" => $sub_module["ref_module"],
                  //"sub_module_id" => $sub_module["sub_module_id"],
                  "read" => $read ,
                  "write" =>$write

                      );

              }// loop 1.1  
?>
<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <!-- <div class="category-content no-padding">
        <div class="category-title category-collapsed">
          <span><h5><b>ACCOUNT PAYABLE</b></h5></span>
          <ul class="icons-list">
            <li><a href="#" data-action="collapse"></a></li>
          </ul>
        </div>
        <ul class="navigation navigation-main navigation-accordion sidebar-default" style="display: none;">

          <li>
            <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>สีฟ้า</span></a>
            <ul class="hidden-ul">

              <li><a href="<?php echo base_url(); ?>ap/ap_apv_v">
			<i class="icon-file-plus"></i>ตั้งเจ้าหนี้ APV</a>
			</li>

			<li>
				<a href="<?php echo base_url(); ?>ap/ap_main_bill">
					<i class="icon-file-plus"></i>ตั้งหนี้ตามใบสั่งจ้าง APS</a>
			</li>

			<li>
				<a href="<?php echo base_url(); ?>ap_petty/ap_pettycash">
					<i class="icon-file-plus"></i>
					<span>ตั้งเจ้าหนี้อื่นๆ APO </span>
				</a>
			</li>

			</ul>
			</li>

			<li>
				<a href="#" class="has-ul">
					<i class="icon-radio-unchecked"></i>
					<span>สีม่วง</span>
				</a>
				<ul class="hidden-ul">
					<li>
						<a href="<?php echo base_url(); ?>ap/ap_reduce_apv">
							<i class="icon-file-minus"></i> ลดหนี้ APV</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap/ap_reduce_aps">
							<i class="icon-file-minus"></i> ลดหนี้ APS</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap/ap_reduce_apo">
							<i class="icon-file-minus"></i> ลดหนี้ APO</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap/reduce_apv_report">
							<i class="icon-file-minus"></i> รายงานลดหนี้ APV ทั้งหมด</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap/reduce_aps_report">
							<i class="icon-file-minus"></i> รายงานลดหนี้ APS ทั้งหมด</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap/reduce_apo_report">
							<i class="icon-file-minus"></i> รายงานลดหนี้ APO ทั้งหมด</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#" class="has-ul">
					<i class="icon-radio-unchecked"></i>
					<span>สีเขียว</span>
				</a>
				<ul class="hidden-ul">
					<li>
						<a href="<?php echo base_url(); ?>ap/apv_approve">
							<i class="icon-coin-dollar"></i> บันทึกชำระเจ้าหนี้</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap_cheque/apv_ch_approve">
							<i class="icon-checkmark4"></i>
							<span>บันทึกยืนยันการจ่ายเช็ค</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" class="has-ul">
					<i class="icon-radio-unchecked"></i>
					<span>สีเขียวขี้ม้า</span>
				</a>
				<ul class="hidden-ul">
					<li>
						<a href="<?php echo base_url(); ?>ap/ap_main_editbill">
							<i class=" icon-pencil7"></i> แก้ไขข้อมูลการตั้งหนี้</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap_cheque/clear_ap">
							<i class="icon-user-minus"></i>
							<span>บันทึกตัดเจ้าหนี้</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" class="has-ul">
					<i class="icon-radio-unchecked"></i>
					<span>สีเขียวเข้ม</span>
				</a>
				<ul class="hidden-ul">
					<li>
						<a href="<?php echo base_url(); ?>ap_petty/ap_pettycash_print">
							<i class="icon-printer"></i>
							<span>พิมพ์หนังสือรับรองหัก APO</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap/post_to_gl_system">
							<i class="icon-upload"></i>
							<span>Post To GL System</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>ap/aps_print">
							<i class="icon-printer"></i>
							<span>พิมพ์หนังสือรับรองหัก APS</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap/ap_report_v">
					<i class="icon-stats-bars"></i>
					<span>Report</span>
				</a>
			</li>
			</ul>
		</div> -->
            <div class="category-content no-padding">
                <div class="category-title">
                    <span>
                        <h5>
                            <b>ACCOUNT PAYABLE</b>
                        </h5>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">
                    <?php if($permission["Account Payable System"][102]["read"] == 1){?>
                    <!-- ระบบเจ้าหนี้ (AP) -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>ระบบเจ้าหนี้ (AP)</span>
                        </a>
                        <ul class="hidden-ul">
                            <?php if($permission["Account Payable System"][99]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_main">ตั้งหนี้จากการรับสินค้า PO</a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/all_apv">รายการตั้งหนี้ร้านค้าตามปกติทั้งหมด
                                    (Normal Vender)</a>
                            </li>
                            <?php if($permission["Account Payable System"][100]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_main_down">ตั้งหนี้เงินจ่ายล่วงหน้า เงินมัดจำ
                                    (Down Vender)</a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/all_apv_down">รายการตั้งหนี้เงินจ่ายล่วงหน้าทั้งหมด
                                    (Down Vender)</a>
                            </li>
                            <?php if($permission["Account Payable System"][101]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_main_reten">ตั้งหนี้การจ่ายคืนเงินประกันสินค้า
                                    (Retention Vender)</a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/all_apv_reten">รายการตั้งหนี้การจ่ายคืนเงินประกันสินค้าทั้งหมด
                                    (Retention Vender)</a>
                            </li>
                        </ul>
                    </li>
                    <!-- ระบบเจ้าหนี้ (AP) -->
                    <?php } ?>

                    <?php if($permission["Account Payable System"][103]["read"] == 1){?>
                    <!-- ตั้งหนี้รับวางบิลตามใบสั่งจ้าง -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>ตั้งหนี้รับวางบิลตามใบสั่งจ้าง</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_main_bill">ตั้งหนี้รับวางบิลตามใบสั่งจ้าง</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/all_bill">
                                    <span>รายการตั้งหนี้รับวางบิลตามใบสั่งจ้าง</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- ตั้งหนี้รับวางบิลตามใบสั่งจ้าง -->
                    <?php } ?>

                    <?php if($permission["Account Payable System"][105]["read"] == 1){?>
                    <!-- ตั้งเจ้าหนี้ (Petty Cash) -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>ตั้งเจ้าหนี้ (Petty Cash)</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ap_petty/ap_pettycash">ตั้งเจ้าหนี้ (Petty Cash)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_petty/ap_pettycash_all">รายการตั้งเจ้าหนี้้ทั้งหมด
                                    (Petty Cash)</a>
                            </li>
                        </ul>
                    </li>
                    <!-- ตั้งเจ้าหนี้ (Petty Cash) -->
                    <?php } ?>

                    <?php if($permission["Account Payable System"][104]["read"] == 1){?>
                    <!-- แก้ไขบางข้อมูลจากการตั้งหนี้ -->
                    <li>
                        <a href="<?php echo base_url(); ?>ap/ap_main_editbill">
                            <i class="icon-radio-unchecked"></i>
                            <span>แก้ไขบางข้อมูลจากการตั้งหนี้</span>
                        </a>
                    </li>
                    <!-- แก้ไขบางข้อมูลจากการตั้งหนี้ -->
                    <?php } ?>




                    <!-- บันทึกการลดหนี้ -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกการลดหนี้</span>
                        </a>
                        <ul class="hidden-ul">
                            <?php if($permission["Account Payable System"][107]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_reduce_apv">ลดหนี้จาก APV</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/reduce_apv_report">รายงานลดหนี้จาก APV ทั้งหมด</a>
                            </li>
                            <?php } ?>
                            <?php if($permission["Account Payable System"][108]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_reduce_aps">ลดหนี้จาก APS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/reduce_aps_report">รายงานลดหนี้จาก APS ทั้งหมด</a>
                            </li>
                            <?php } ?>

                            <?php if($permission["Account Payable System"][109]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_reduce_apo">ลดหนี้จาก APO</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/reduce_apo_report">รายงานลดหนี้จาก APO ทั้งหมด</a>
                            </li>
                            <?php } ?>


                        </ul>
                    </li>
                    <!-- บันทึกการลดหนี้ -->

                    <!-- อนุมัติการตั้งหนี้ (PV) -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>อนุมัติการตั้งหนี้ </span>
                        </a>
                        <ul class="hidden-ul">
                            <?php if($permission["Account Payable System"][114]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/confirm_ap">อนุมัติการตั้งหนี้</a>
                            </li>
                            <!-- <li><a href="<?php echo base_url(); ?>ap/confirm_ap_re">รายการบันทึกอนุมัติการตั้งหนี้ทั้งหมด </a>
				</li> -->
                            <?php } ?>

                        </ul>
                    </li>
                    <!-- อนุมัติการตั้งหนี้ (PV) -->

                    <!-- บันทึกชำระเจ้าหนี้ (PV) -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกชำระเจ้าหนี้ (PV)</span>
                        </a>
                        <ul class="hidden-ul">
                            <?php if($permission["Account Payable System"][110]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/apv_approve">บันทึกชำระเจ้าหนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_report">รายการชำระจ่ายเจ้าหนี้ทั้งหมด (All AC)</a>
                            </li>
                            <?php } ?>
                            <?php if($permission["Account Payable System"][114]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_cheque/apv_ch_approve">บันทึกยืนยันการจ่ายเช็ค</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_pvapprove_report">รายการบันทึกยืนยันการจ่ายเช็คทั้งหมด
                                    (All PV)</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_cheque/get_project">สถานะเช็ค</a>
                            </li>
                            <?php } ?>

                        </ul>
                    </li>
                    <!-- บันทึกชำระเจ้าหนี้ (PV) -->




                    <!-- บันทึกตัดเจ้าหนี้ / บันทึกรับใบกำกับภาษีย้อนหลัง -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>บันทึกตัดเจ้าหนี้ / บันทึกรับใบกำกับภาษีย้อนหลัง</span>
                        </a>
                        <ul class="hidden-ul">
                            <?php if($permission["Account Payable System"][112]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_cheque/clear_ap">บันทึกตัดเจ้าหนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/ap_approve_report">รายการบันทึกตัดเจ้าหนี้ทั้งหมด
                                    (All Clear)</a>
                            </li>
                            <?php } ?>
                            <?php if($permission["Account Payable System"][115]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_cheque/receipt_tax">บันทึกรับใบกำกับภาษีย้อนหลัง</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url();?>ap/ap_vender_carry">
                            <i class="icon-radio-unchecked"></i>
                            <span>รายงานเจ้าหนี้คงเหลือยกมา</span>
                        </a>
                    </li>

                    <!-- รายงานรวมทั้งหมด -->
                    <li>

                        <a href="#" class="has-ul" id="report">
                            <i class="icon-radio-unchecked"></i>
                            <span>รายงานทั้งหมด</span>
                        </a>
                        <ul class="hidden-ul" id="rp1">
                            <li id="r1">
                                <a href="<?php echo base_url(); ?>ap_cheque/view_report_certificate">รายงานใบสำคัญ</a>
                            </li>
                            <li id="r2">
                                <a href="<?php echo base_url(); ?>ap_cheque/view_contractor_bill">รายงานการรับวางบิลผู้รับเหมา</a>
                            </li>
                            <li id="r3">
                                <a href="<?php echo base_url(); ?>ap_cheque/view_debt_repayment">รายงานการจ่ายชำระหนี้</a>
                            </li>
                            <li id="r4">
                                <a href="<?php echo base_url(); ?>ap_cheque/view_ap_cheque">รายงานทะเบียนเช็ค</a>
                            </li>
                            <li id="r4-1">
                                <a href="#" class="has-ul">
                                    </i>
                                    <span>รายงานสถานะเช็ค</span>
                                </a>
                                <ul class="hidden-ul">
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_statuschque_pl">ตามเลขที่ PL/PV</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_statuschque_no">ตามเลขที่เช็ค</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="r5">
                                <a href="<?php echo base_url(); ?>ap_cheque/view_debt_vender">รายงานการตัดเจ้าหนี้</a>
                            </li>
                            <li id="r5-1">
                                <a href="#" class="has-ul">
                                    <span>แบบสรุป</span>
                                </a>
                                <ul class="hidden-ul">
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_cutsum_project">รายงานเรียงตามโครงการ/แผนก</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_cutsum_creditor">รายงานเรียงตามชื่อเจ้าหนี้</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_cutsum_bank">รายงานเรียงตามธนาคาร</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_cutsum_option">รายงานเรียงตามประเภทการจ่าย</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li id="r6"><a href="<?php echo base_url(); ?>ap_cheque/view_withholding_taxes_val">รายงานภาษีหัก ณ ที่จ่าย</a>
				</li> -->
                            <li id="r6">
                                <a href="#" class="has-ul">
                                    </i>
                                    <span>รายงานภาษีหัก ณ ที่จ่าย</span>
                                </a>
                                <ul class="hidden-ul">
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_withholding1">ภ.ง.ด. 1</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_withholding2">ภ.ง.ด. 2</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_withholding3">ภ.ง.ด. 3</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_withholding53">ภ.ง.ด. 53</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_withholding54">ภ.ง.ด. 54</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="r7">
                                <a href="#" class="has-ul">
                                    <span>รายงานเจ้าหนี้รายตัว</span>
                                </a>
                                <ul class="hidden-ul">
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_individual_project">รายงานเรียงตามโครงการ/แผนก</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_individual_job">รายงานเรียงตาม
                                            Job</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_individual_creditor">รายงานเรียงตามเจ้าหนี้</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li id="r7"><a href="<?php echo base_url(); ?>ap_cheque/">รายงานเจ้าหนี้รายตัว</a>
				</li> -->
                            <!-- <li id="r8"><a href="<?php echo base_url(); ?>ap_cheque/">รายงานเจ้าหนี้รายตัว(จำแนกตามอายุหนี้)</a>
				</li> -->
                            <li id="r8">
                                <a href="#" class="has-ul">
                                    <span>รายงานเจ้าหนี้คงเหลือ (จำแนกตามอายุหนี้)</span>
                                </a>
                                <ul class="hidden-ul">
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_age_creditor">รายงานตามเจ้าหนี้</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_conclude_creditor">สรุปตามเจ้าหนี้</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li id="r9"><a href="<?php echo base_url(); ?>ap_cheque/">รายงานเจ้าหนี้คงเหลือ</a>
				</li> -->
                            <!-- <li id="r10"><a href="<?php echo base_url(); ?>ap_cheque/">รายงานบัญชีแยกประเภท</a>
				</li> -->
                            <!-- บัญชีแยกประเภท -->
                            <!-- test -->
                            <li id="r10">
                                <a href="#" class="has-ul">
                                    <span>บัญชีแยกประเภท</span>
                                </a>
                                <ul class="hidden-ul">
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_classify_creditor">บัญชีแยกประเภทและแยกตามเจ้าหนี้</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_classify_account">สรุปรวมเดบิทและเครดิตแต่ละบัญชี</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_total_creditor">สรุปรวมแต่ละเจ้าหนี้
                                            แยกตามบัญชี</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_total_account">สรุปรวมแต่ละบัญชี
                                            แยกตามเจ้าหนี้</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- บัญชีแยกประเภท -->
                            <li id="r11">
                                <a href="<?php echo base_url(); ?>ap_cheque/view_daily_book_val">รายงานสมุดรายวัน AP</a>
                            </li>
                            <li id="r12">
                                <a href="<?php echo base_url(); ?>ap_cheque/cost_pro_val/1">รายงานสรุปต้นทุนโครงการ</a>
                                <!-- <ul class="hidden-ul">
                      <li><a href="<?php echo base_url(); ?>ap_cheque/cost_pro_val/1">ตาม Cost Code</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>ap_cheque/cost_pro_val/2">รายละเอียดแต่ละ Cost Code</a>
				</li>
				</ul> -->
                            </li>
                            <li id="r13">
                                <a href="<?php echo base_url(); ?>ap_cheque/view_buy_tax_val">รายงานภาษีซื้อ</a>
                            </li>
                            <li>
                                <a href="#" class="has-ul">
                                    <span>รายงานรายละเอียดเจ้าหนี้</span>
                                </a>
                                <ul class="hidden-ul">
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_withholding1">ภ.ง.ด. 1</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>ap_report/ap_description_address">เจ้าหนี้คงเหลือพร้อมชื่อที่อยู่</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- บันทึกตัดเจ้าหนี้ / บันทึกรับใบกำกับภาษีย้อนหลัง -->


                    <!-- <?php if($permission["Account Payable System"][113]["read"] == 1){?>-->
                    <!-- พิมพ์หนังสือรับรองหัก ณ ที่จ่าย -->
                    <!-- <li>
            <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>พิมพ์หนังสือรับรองหัก ณ ที่จ่าย</span></a>
            <ul class="hidden-ul">
              <li><a href="<?php echo base_url(); ?>ap_petty/ap_pettycash_print">พิมพ์หนังสือรับรองหัก ณ ที่จ่าย APO</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap/aps_print">พิมพ์หนังสือรับรองหัก ณ ที่จ่าย APS</a>
			</li>
			</ul>
			</li> -->
                    <!-- พิมพ์หนังสือรับรองหัก ณ ที่จ่าย -->
                    <!-- <?php } ?>

			<?php if($permission["Account Payable System"][114]["read"] == 1){?>
			<li>
				<a href="<?php echo base_url(); ?>ap/post_to_gl_system">
					<i class="icon-radio-unchecked"></i>
					<span>Post To GL System</span>
				</a>
			</li>
			<?php } ?>-->


                    <!-- <?php if($permission["Account Payable System"][115]["read"] == 1){?>-->
                    <!-- กระบวนการบันทึกในโปรแกรม (Work Flow) -->
                    <!-- <li><a href="<?php echo base_url(); ?>ap/work_flow">
			<i class="icon-radio-unchecked"></i>
			<span>กระบวนการบันทึกในโปรแกรม (Work Flow)</span>
			</a>
			</li> -->
                    <!-- กระบวนการบันทึกในโปรแกรม (Work Flow) -->
                    <!-- <?php } ?>-->

                    <!-- <?php if($permission["Account Payable System"][116]["read"] == 1){?>-->
                    <!-- รายงาน (Report) -->
                    <!-- <li>
            <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>รายงาน (Report)</span></a>
            <ul class="hidden-ul"> -->
                    <!-- <li><a href="<?php echo base_url(); ?>management/pettycash_report">Petty Cash Report</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>management/pettycash_report_group">PettyCash Report By CostCode</a>
			</li>
			<li>
				<a href="#">รายงานการจ่ายชำระหนี้ ตามเลขที่ PV/PL</a>
			</li> -->
                    <!-- แบบสรุป -->
                    <!-- <li>
                <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>แบบสรุป</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_cutsum_project">รายงานเรียงตามโครงการ/แผนก</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_cutsum_creditor">รายงานเรียงตามชื่อเจ้าหนี้</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_cutsum_bank">รายงานเรียงตามธนาคาร</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_cutsum_option">รายงานเรียงตามประเภทการจ่าย</a>
			</li>
			</ul>
			</li> -->
                    <!-- แบบสรุป -->
                    <!-- รายงานเจ้าหนี้คงเหลือ จำแนกตามอายุหนี้ -->
                    <!-- <li>
                <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>รายงานเจ้าหนี้คงเหลือ จำแนกตามอายุหนี้</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_age_creditor">รายงานตามเจ้าหนี้</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_conclude_creditor">สรุปตามเจ้าหนี้</a>
			</li>
			</ul>
			</li> -->
                    <!-- รายงานเจ้าหนี้คงเหลือ จำแนกตามอายุหนี้ -->
                    <!-- รายงานสถานะเช็ค -->
                    <!-- <li>
                <a href="#" class="has-ul"></i> <span>รายงานสถานะเช็ค</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_statuschque_pl">ตามเลขที่ PL/PV</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_statuschque_no">ตามเลขที่เช็ค</a>
			</li>
			</ul>
			</li> -->
                    <!-- รายงานสถานะเช็ค -->
                    <!-- รายงานภาษีหัก ณ ที่จ่าย -->
                    <!-- <li>
                <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>รายงานภาษีหัก ณ ที่จ่าย</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding1">ภ.ง.ด. 1</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_withholding2">ภ.ง.ด. 2</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_withholding3">ภ.ง.ด. 3</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_withholding53">ภ.ง.ด. 53</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_withholding54">ภ.ง.ด. 54</a>
			</li>
			</ul>
			</li> -->
                    <!-- รายงานภาษีหัก ณ ที่จ่าย -->
                    <!-- รายงานการตัดเจ้าหนี้ -->
                    <!-- <li>
                <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>รายงานการตัดเจ้าหนี้</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_cut_project">รายงานเรียงตามโครงการ/แผนก</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_cut_creditor">รายงานเรียงตามชื่อเจ้าหนี้</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_cut_pl">รายงานเรียงตามเลขที่ PL/PV</a>
			</li>
			</ul>
			</li> -->
                    <!-- รายงานการตัดเจ้าหนี้ -->
                    <!-- รายงานภาษี -->
                    <!-- <li>
                <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>รายงานภาษี</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_taxvat">รายงานภาษีซื้อ</a>
			</li>
			</ul>
			</li> -->
                    <!-- รายงานภาษี -->
                    <!-- รายงานละเอียดเจ้าหนี้ -->
                    <!-- <li>
                <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>รายงานรายละเอียดเจ้าหนี้</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding1">ภ.ง.ด. 1</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_description_address">เจ้าหนี้คงเหลือพร้อมชื่อที่อยู่</a>
			</li>
			</ul>
			</li> -->
                    <!-- รายงานละเอียดเจ้าหนี้ -->
                    <!-- รายงานเจ้าหนี้รายตัว -->
                    <!-- <li>
                <a href="#" class="has-ul"><i class="icon-radio-unchecked"></i> <span>รายงานเจ้าหนี้รายตัว</span></a>
                <ul class="hidden-ul">
                  <li><a href="<?php echo base_url(); ?>ap_report/ap_individual_project">รายงานเรียงตามโครงการ/แผนก</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_individual_job">รายงานเรียงตาม Job</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>ap_report/ap_individual_creditor">รายงานเรียงตามเจ้าหนี้</a>
			</li>
			</ul>
			</li> -->
                    <!-- รายงานเจ้าหนี้รายตัว -->
                    <!-- </ul>
          </li> -->
                    <!-- รายงาน (Report) -->





                    <!-- รายงานแบบสรุป -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>รายงานแบบสรุป</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_sort_project">รายงานเรียงตามโครงการ/แผนก</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_sort_job">รายงานเรียงตาม Job</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_sort_creditor">รายงานเรียงตามเจ้าหนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_sort_cre_pro">รายงานตามเจ้าหนี้และโครงการ/แผนก</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_separate_system">ยอดตั้งหนี้แต่ละโครงการ
                                    (จำแนกระบบงาน)/แผนก</a>
                            </li>
                        </ul>
                    </li>
                    <!-- รายงานแบบสรุป -->
                    <!-- รายงานเจ้าหนี้คงเหลือ -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>รายงานเจ้าหนี้คงเหลือ</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_balance_creditor">ตามเจ้าหนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_balance_project">ตามโครงการ/แผนก</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_balance_certificate">ตามใบสำคัญจ่าย</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_abstract_creditor">สรุปตามเจ้าหนี้</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_abstract_pro_cred">สรุปตามเจ้าหนี้จำแนกโครงการ/แผนก</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_abstract_project">สรุปตามโครงการ</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>ap_report/ap_pay_creditor">สรุปกำหนดจ่าย
                                    และแยกตามเจ้าหนี้</a>
                            </li>
                            <!-- <li><a href="<?php echo base_url(); ?>ap_report/ap_creditor_sum">ตามเจ้าหนี้ สรุปรวมจำนวนเงิน</a>
			</li> -->
                            <!-- <li><a href="<?php echo base_url(); ?>ap_report/ap_summit">รายงานยอดยกมา</a>
			</li> -->
                        </ul>
                    </li>
                    <!-- รายงานเจ้าหนี้คงเหลือ -->
                    <?php } ?>

                    <li>
                        <a href="<?php echo base_url();?>ap/post_ap_to_gl">
                            <i class="icon-radio-unchecked"></i>
                            <span>POST AP TO GL</span>
                        </a>
                    </li>
                </ul>
                <div id="footer"></div>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>

<script type="text/javascript">
    $('#ap').css('background-color', '#00aeef');
    $('#ap').css('color', '#FFFFFF');
    // asdasd
</script>