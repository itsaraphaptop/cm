<div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
    <div class="row">
<li class="active">
                      <a href="#" class="has-ul"><span>รายงานลูกหนี้</span></a>
                      <ul class="hidden-ul" style="display: block;">
                        <!-- <li>
                          <a href="#" class="has-ul">รายงานการลบเอกสาร</a>
                          <ul class="hidden-ul">
                            <li><a href="<?=base_url() ?>ar/ar_invdown_delete">ใบแจ้งหนี้เงินดาวน์ (Invoice Down)</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_progres_delete">ใบแจ้งหนี้ค่างวดงาน (Invoice Progres</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_retention_delete">ใบแจ้งหนี้เบิกคืนเงินประกัน (Invoice Retention)</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_receipt_tax">ใบเสร็จรับเงิน/ใบกำกับภาษี Receipt and Tax Invoice</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_rvrl_voucher">ใบสำคัญรับ RV/RL Voucher</a></li>
                          </ul>
                        </li> -->
                        <li>
                          <a href="#" class="has-ul">รายงานใบแจ้งหนี้และการรับเงิน</a>
                          <ul class="hidden-ul">
                            <li><a href="<?=base_url() ?>ar/ar_project_withjob">รายละเอียดแต่ละโครงการ-ระบบงาน By Project with Job</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_project_outjob">รายละเอียดรับเหมาแต่ละโครงการ By Project without Job</a></li>
                            <!-- <li><a href="<?=base_url() ?>ar/ar_detail_byproject">ใบแจ้งหนี้ทั้งหมดแยกตามโครงการ Detail by Project</a></li> -->
                            <!-- <li><a href="<?=base_url() ?>ar/ar_detail_bysale">ใบแจ้งหนี้ทั้งหมดแยกตามผู้ขาย Detail by Sale</a></li> -->
                            <!-- <li><a href="<?=base_url() ?>ar/ar_detail_byinvoice">ใบแจ้งหนี้ทั้งหมดแยกตามใบแจ้งหนี้ Detail by Invoice</a></li> -->
                            <!-- <li><a href="<?=base_url() ?>ar/ar_downpayment">เงินดาวน์/เงินมัดจำ Down Payment Report</a></li> -->
                            <li><a href="<?=base_url() ?>ar/ar_invpro_balace">ค่างวดงาน Invoice Progress Balance</a></li>
                            <!-- <li><a href="<?=base_url() ?>ar/ar_detail_invoicetrading">รายงานใบแจ้งหนี้งานขาย Detail Invoice Trading</a></li> -->
                          </ul>
                        </li>
                        <li>
                          <a href="#" class="has-ul">รายงานลูกหนี้รายตัว</a>
                          <ul class="hidden-ul">
                            <li><a href="<?=base_url() ?>ar/ar_customer_report">รายงานลูกหนี้รายตัว By Idnividal Customer</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_project_report">รายงานลูกหนี้รายตัว By Project</a></li>

                          </ul>
                        </li>
                        <li>
                          <a href="#" class="has-ul">รายงานลูกหนี้คงเหลือ</a>
                          <ul class="hidden-ul">
                            <!-- <li><a href="<?=base_url() ?>ar/ar_agingcus_report">รายละเอียดจำแนกอายุหนี้ ตามลูกหนี้ Aging Report By Customer</a></li> -->
                            <li><a href="<?=base_url() ?>ar/ar_agingpro_report">รายละเอียดจำแนกอายุหนี้ ตามโครงการ Aging Report By Project</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_invoicebalance_report">รายงานใบแจ้งหนี้คงค้าง ตามโครงการ By Project</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_invoice_report">แยกตามเลขที่แจ้งหนี้</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#" class="has-ul">รายงานภาษี</a>
                          <ul class="hidden-ul">
                            <!-- <li><a href="<?=base_url() ?>ar/ar_vat_report">ภาษีมูลค่าเพิ่ม</a></li> -->
                            <li><a href="<?=base_url() ?>ar/ar_wt_report">ภาษีถูกหัก ณ ที่ จ่าย</a></li>
                            <li><a href="<?=base_url() ?>ar/ar_deducted_report">แยกตามโครงการ</a></li>
                          </ul>
                        </li>
                        <!-- <li> -->
                          <!-- <a href="#" class="has-ul">รายงานบัญชีแยกประเภท</a> -->
                          <!-- <ul class="hidden-ul"> -->
                            <!-- <li><a href="<?=base_url() ?>ar/ar_voucher_nogl">ตามเลขที่ใบสำคัญ By Voucher No</a></li> -->
                            <!-- <li><a href="<?=base_url() ?>ar/ar_summary">สรุป Summary</a></li> -->
                          <!-- </ul> -->
                        <!-- </li> -->
                        <!-- <li>
                          <a href="#" class="has-ul">รายงานบัญชีรายวัน</a>
                          <ul class="hidden-ul">
                            <li><a href="<?=base_url() ?>ar/ar_voucher_no">ตามเลขที่ใบสำคัญ By Voucher No</a></li>
                          </ul>
                        </li> -->
                        
                        <li>
            <a href="#" class="has-ul"><span>รายงานแบบสรุป</span></a>
            <ul class="hidden-ul">
              <!-- <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_project">รายงานเรียงตามโครงการ/แผนก</a></li> -->
              <!-- <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_job">รายงานเรียงตาม Job</a></li> -->
              <!-- <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_creditor">รายงานเรียงตามเจ้าหนี้</a></li> -->
              <!-- <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_cre_pro">รายงานตามเจ้าหนี้และโครงการ/แผนก</a></li> -->
              <!-- <li><a href="<?php echo base_url(); ?>ap_report/ap_separate_system">ยอดตั้งหนี้แต่ละโครงการ (จำแนกระบบงาน)/แผนก</a></li> -->
            </ul>
          </li>
                      </ul>
                    </li>

</div>

            </div>