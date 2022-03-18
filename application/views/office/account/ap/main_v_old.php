<div class="panel panel-flat border-top-lg border-top-success">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> ACCOUNT PAYABLE (AP) - ระบบเจ้าหนี้</span></h4>
      </div>
      <div class="heading-elements"></div>
    </div>
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>ar/ap_apv_v">ตั้งเจ้าหนี้ APV </a></li>
      </ul>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ap/ap_main"  type="button" class="btn bg-success-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-file-plus"></i> <span>ตั้งหนี้ร้านค้าตามปกติ</span></a>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ap/ap_main_down" type="button" class="btn bg-warning-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-file-plus"></i> <span>ตั้งหนี้เงินจ่ายล่วงหน้า</span></a>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ap/ap_main_reten" type="button" class="btn bg-info-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-file-plus"></i> <span>ตั้งหนี้เงินประกันสินค้า</span></a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>ระบบเจ้าหนี้ (AP)</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href=""><i class="icon-gear"></i><b>ตั้งเจ้าหนี้ (Vender)</b></a></li>
          <li><a href=""><hr></a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_main">ตั้งหนี้ร้านค้าตามปกติ (Normal Vender)</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/all_apv">รายการตั้งหนี้ร้านค้าตามปกติทั้งหมด (Normal Vender)</a></li>
          <li><hr></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_main_down">ตั้งหนี้เงินจ่ายล่วงหน้า เงินมัดจำ (Down Vender)</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/all_apv_down">รายการตั้งหนี้เงินจ่ายล่วงหน้าทั้งหมด (Down Vender)</a></li>
          <li><hr></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_main_reten">ตั้งหนี้การจ่ายคืนเงินประกันสินค้า (Retention Vender)</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/all_apv_reten">รายการตั้งหนี้การจ่ายคืนเงินประกันสินค้าทั้งหมด (Retention Vender)</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>ตั้งหนี้รับวางบิลตามใบสั่งจ้าง</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_main_bill">ตั้งหนี้รับวางบิลตามใบสั่งจ้าง</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ap/all_bill" type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded" aria-expanded="true"> <i class="icon-file-plus"></i> <span>รายการตั้งหนี้รับวางบิลตามใบสั่งจ้าง</span></a>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ap/ap_main_editbill" type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded" aria-expanded="true"> <i class="icon-file-plus"></i> <span>แก้ไขบางข้อมูลจากการตั้งหนี้</span></a>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="icon-file-empty"></i> <span>ตั้งเจ้าหนี้ (Petty Cash)</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap_petty/ap_pettycash">ตั้งเจ้าหนี้ (Petty Cash)</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap_petty/ap_pettycash_all">รายการตั้งเจ้าหนี้้ทั้งหมด (Petty Cash)</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>บันทึกการลดหนี้</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_reduce_apv">ลดหนี้จาก APV</a></li>
        </ul>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>บันทึกการลดหนี้</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_reduce_aps">ลดหนี้จาก APS</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>บันทึกการลดหนี้</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_reduce_apo">ลดหนี้จาก APO</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span> บันทึกชำระเจ้าหนี้ (PV)</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap/apv_approve"> บันทึกชำระเจ้าหนี้</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_approve_report">รายการชำระจ่ายเจ้าหนี้ทั้งหมด (All AC)</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap_cheque/apv_ch_approve">บันทึกยืนยันการจ่ายเช็ค</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_pvapprove_report">รายการบันทึกยืนยันการจ่ายเช็คทั้งหมด (All PV)</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>บันทึกตัดเจ้าหนี้ / บันทึกรับใบกำกับภาษีย้อนหลัง</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap_cheque/clear_ap">บันทึกตัดเจ้าหนี้</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/ap_clearapprove_report">รายการบันทึกตัดเจ้าหนี้ทั้งหมด (All Clear)</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap_cheque/receipt_tax">บันทึกรับใบกำกับภาษีย้อนหลัง</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>พิมพ์หนังสือรับรองหัก ณ ที่จ่าย</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>ap_petty/ap_pettycash_print">พิมพ์หนังสือรับรองหัก ณ ที่จ่าย APO</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ap/aps_print">พิมพ์หนังสือรับรองหัก ณ ที่จ่าย APS</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ap/post_to_gl_system" type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" aria-expanded="true"> <i class="icon-file-plus"></i> <span>Post To GL System</span></a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ap/work_flow" type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" aria-expanded="true"> <i class="icon-file-plus"></i> <span>กระบวนการบันทึกในโปรแกรม (Work Flow)</span></a>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span> รายงาน (Report)</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a class="preload" href="<?php echo base_url(); ?>management/pettycash_report">Petty Cash Report</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>management/pettycash_report_group">PettyCash Report By CostCode</a></li>
          <li><a class="has-ul" href="#">รายงานการจ่ายชำระหนี้</a>
          <li><hr></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_paid_pl">ตามเลขที่ PV/PL</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานทะเบียนเช็ค</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><b>ทะเบียนเช็ค</b></li>
          <li><hr></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_chque_bank">ตามเลขที่บัญชีธนาคาร</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_chque_no">ตามเลขที่เช็ค</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_chque_project">ตามโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_chque_paid">ยอดรวมของการจ่าย</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_chque_pl">ยอดรวมของการจ่าย ตาม PL/PV</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานสถานะเช็ค</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_statuschque_pl">ตามเลขที่ PL/PV</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_statuschque_no">ตามเลขที่เช็ค</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานการตัดเจ้าหนี้</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><b>แบบมีรายละเอียด</b></li>
          <li><hr></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_cut_project">รายงานเรียงตามโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_cut_creditor">รายงานเรียงตามชื่อเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_cut_pl">รายงานเรียงตามเลขที่ PL/PV</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>แบบสรุป</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_cutsum_project">รายงานเรียงตามโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_cutsum_creditor">รายงานเรียงตามชื่อเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_cutsum_bank">รายงานเรียงตามธนาคาร</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_cutsum_option">รายงานเรียงตามประเภทการจ่าย</a></li>
        </ul>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานภาษี</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_taxvat">รายงานภาษีซื้อ</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานภาษีหัก ณ ที่จ่าย</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding1">ภ.ง.ด. 1</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding2">ภ.ง.ด. 2</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding3">ภ.ง.ด. 3</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding53">ภ.ง.ด. 53</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding54">ภ.ง.ด. 54</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานละเอียดเจ้าหนี้</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_withholding1">ภ.ง.ด. 1</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_description_address">เจ้าหนี้คงเหลือพร้อมชื่อที่อยู่</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานเจ้าหนี้รายตัว</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_individual_project">รายงานเรียงตามโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_individual_job">รายงานเรียงตาม Job</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_individual_creditor">รายงานเรียงตามเจ้าหนี้</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานแบบสรุป</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_project">รายงานเรียงตามโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_job">รายงานเรียงตาม Job</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_creditor">รายงานเรียงตามเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_sort_cre_pro">รายงานตามเจ้าหนี้และโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_separate_system">ยอดตั้งหนี้แต่ละโครงการ (จำแนกระบบงาน)/แผนก</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานเจ้าหนี้คงเหลือ จำแนกตามอายุหนี้</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_age_creditor">รายงานตามเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_conclude_creditor">สรุปตามเจ้าหนี้</a></li>
        </ul>
      </div>    
    </div>
    <br>
    <div class="row">
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>รายงานเจ้าหนี้คงเหลือ</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_balance_creditor">ตามเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_balance_project">ตามโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_balance_certificate">ตามใบสำคัญจ่าย</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_abstract_creditor">สรุปตามเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_abstract_pro_cred">สรุปตามเจ้าหนี้จำแนกโครงการ/แผนก</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_abstract_project">สรุปตามโครงการ</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_pay_creditor">สรุปกำหนดจ่าย และแยกตามเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_creditor_sum">ตามเจ้าหนี้ สรุปรวมจำนวนเงิน</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_summit">รายงานยอดยกมา</a></li>
        </ul>
      </div>
      <div class="col-lg-2">
        <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="icon-file-empty"></i> <span>บัญชีแยกประเภท</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="<?php echo base_url(); ?>ap_report/ap_classify_creditor">บัญชีแยกประเภทและแยกตามเจ้าหนี้</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_classify_account">สรุปรวมเดบิทและเครดิตแต่ละบัญชี</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_total_creditor">สรุปรวมแต่ละเจ้าหนี้ แยกตามบัญชี</a></li>
          <li><a href="<?php echo base_url(); ?>ap_report/ap_total_account">สรุปรวมแต่ละบัญชี แยกตามเจ้าหนี้</a></li>
        </ul>
      </div>
    </div>
</div>
<!--  </li>
  </ul> -->
<!--  </div>
  </div>
  </div>
  </div> -->
