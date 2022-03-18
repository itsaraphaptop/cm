<div class="panel panel-flat border-top-lg border-top-success">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> ACCOUNT RECEIVABLE (AR) - รายงานลูกหนี้ทั้งหมด (REPORT AR)</span></h4>
      </div>
      <div class="heading-elements"></div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li><a href="#">ACCOUNT RECEIVABLE (AR)</a></li>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-2">
        <button type="button" class="btn bg-teal-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" data-toggle="dropdown"> <i class="icon-reading"></i> ใบทั้งหนี้ทั้งหมด <i class="icon-arrow-down15"></i></button>
        <ul class="dropdown-menu dropdown-menu-right">
           <li><a class="preload" href="<?php echo base_url(); ?>ar/open_invdown_all">ใบแจ้งหนี้เงินดาวน์ทั้งหมด</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ar/open_invprogress_all">ใบแจ้งหนี้ค่างวดงานทั้งหมด</a></li>
          <li><a class="preload" href="<?php echo base_url(); ?>ar/open_retention_all">ใบแจ้งหนีเบิกคืนเงินประกันทั้งหมด </a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/ar_accountall"  type="button" class="btn bg-danger btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-profile"></i> <span>ตั้งบัญชีลูกหนี้ทั้งหมด</span></a>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/ar_receiptall"  type="button" class="btn bg-primary btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-reading"></i> <span>บันทึกใบเสร็จรับเงิน</span></a>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/ar_receivingall"  type="button" class="btn bg-success-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-files-empty"></i> <span>รับเงินตามใบเสร็จทั้งหมด</span></a>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/ar_clearall"  type="button" class="btn bg-slate-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-address-book"></i> <span>บันทึกตัดลูกหนี้ทั้งหมด</span></a>
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <button type="button" class="btn bg-teal-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" data-toggle="dropdown"> <i class="icon-file-minus"></i> รายงานการลบเอกสาร <i class="icon-arrow-down15"></i></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a  href="<?php echo base_url(); ?>ar/ar_invdown_delete">ใบแจ้งหนี้เงินดาวน์ (Invoice Down)</a></li>
          <li><a  href="<?php echo base_url(); ?>ar/ar_progres_delete">ใบแจ้งหนี้ค่างวดงาน (Invoice Progres</a></li>
          <li><a  href="<?php echo base_url(); ?>ar/ar_retention_delete">ใบแจ้งหนี้เบิกคืนเงินประกัน (Invoice Retention)</a></li>
          <li><a  href="<?php echo base_url(); ?>ar/ar_receipt_tax">ใบเสร็จรับเงิน/ใบกำกับภาษี Receipt and Tax Invoice</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_rvrl_voucher">ใบสำคัญรับ RV/RL Voucher</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn bg-danger btn-block btn-xlg btn-icon btn-rounded btn-labeled" data-toggle="dropdown"><i class="icon-price-tag"></i> รายงานการรับเงิน <i class="icon-arrow-down15"></i></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a  href="<?php echo base_url(); ?>ar/ar_project_withjob">รายละเอียดแต่ละโครงการ-ระบบงาน By Project with Job</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_project_outjob">รายละเอียดรับเหมาแต่ละโครงการ By Project without Job</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_detail_byproject">ใบแจ้งหนี้ทั้งหมดแยกตามโครงการ Detail by Project</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_detail_bysale">ใบแจ้งหนี้ทั้งหมดแยกตามผู้ขาย Detail by Sale</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_detail_byinvoice">ใบแจ้งหนี้ทั้งหมดแยกตามใบแจ้งหนี้ Detail by Invoice</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_downpayment">เงินดาวน์/เงินมัดจำ Down Payment Report</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_invpro_balace">ค่างวดงาน Invoice Progress Balance</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_detail_invoicetrading">รายงานใบแจ้งหนี้งานขาย Detail Invoice Trading</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn bg-primary btn-block btn-xlg btn-icon btn-rounded btn-labeled" data-toggle="dropdown"> <i class="icon-file-text2"></i> รายงานลูกหนี้คงเหลือ <i class="icon-arrow-down15"></i></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a  href="<?php echo base_url(); ?>ar/ar_agingcus_report">รายละเอียดจำแนกอายุหนี้ ตามลูกหนี้ Aging Report By Customer</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_agingpro_report">รายละเอียดจำแนกอายุหนี้ ตามโครงการ Aging Report By Project</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_invoicebalance_report">รายงานใบแจ้งหนี้คงค้าง ตามโครงการ By Project</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_invoice_report">แยกตามเลขที่แจ้งหนี้</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn bg-success-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" data-toggle="dropdown"> <i class="icon-copy"></i> รายงานลูกหนี้รายตัว <i class="icon-arrow-down15"></i></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a  href="<?php echo base_url(); ?>ar/ar_customer_report">รายงานลูกหนี้รายตัว By Idnividal Customer</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_project_report">รายงานลูกหนี้รายตัว By Project</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn bg-slate-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" data-toggle="dropdown"> <i class="icon-book2"></i> รายงานภาษี <i class="icon-arrow-down15"></i></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a  href="<?php echo base_url(); ?>ar/ar_vat_report">ภาษีมูลค่าเพิ่ม</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_wt_report">ภาษีถูกหัก ณ ที่ จ่าย</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_deducted_report">แยกตามโครงการ</a></li>
        </ul>
      </div>
    </div>

   <!-- <div class="row"> -->
    <!--       <div class="col-md-4">
        <h3>รายงานบัญชีแยกประเภท</h3>
          <ul>
            <li><a href="<?php echo base_url(); ?>ar/ar_voucher_nogl">ตามเลขที่ใบสำคัญ By Voucher No</a></li>
            <li><a href="<?php echo base_url(); ?>ar/ar_summary">สรุป Summary</a></li>
          </ul>
      </div> -->
      <!-- <div class="col-md-4">
        <h3>รายงานบัญชีรายวัน</h3>
          <ul>
            <li><a href="<?php echo base_url(); ?>ar/ar_voucher_no">ตามเลขที่ใบสำคัญ By Voucher No</a></li>
          </ul>
      </div> -->
    <!-- </div>     -->
</div>


