<div class="panel panel-flat border-top-lg border-top-success">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> ACCOUNT RECEIVABLE (AR) - ระบบลูกหนี้</span></h4>
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
      <div class="col-md-4">
        <h3>ใบแจ้งหนี้ (INVOICE)</h3>
        <ul>
          <li>
            <a >ใบแจ้งหนี้ตามโครงการ (INVOICE By Project)</a>
            <ul>
              <li><a href="<?php echo base_url(); ?>ar/open_invoice_down">ใบแจ้งหนี้ Down</a></li>
              <li><a href="<?php echo base_url(); ?>ar/open_invoice_progress">ใบแจ้งหนี้ Progress</a></li>
              <li><a href="<?php echo base_url(); ?>ar/open_invoice_retention">ใบแจ้งหนี้ Retention</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url(); ?>ar/ar_invoive_sale">ใบแจ้งหนี้ตามผู้ขาย (Invoice By Sale)</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_invoive_ohter">ใบแจ้งหนี้ตามอื่นๆ (Invoice Ohter)</a></li>
        </ul>
      </div>

      <div class="col-md-4">
        <h3>ใบลดหนี้ (CREDIT NOTE)</h3>
        <ul>
          <li>
            <a >ใบลดหนี้ตามโครงการ (Credit By Project)</a>
            <ul>
              <li><a href="<?php echo base_url(); ?>ar/ar_credit_down">ใบลดหนี้ Down</a></li>
              <li><a href="<?php echo base_url(); ?>ar/ar_credit_progress">ใบลดหนี้ Progress</a></li>
              <li><a href="<?php echo base_url(); ?>ar/ar_credit_retention">ใบลดหนี้ Retention</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url(); ?>ar/ar_credit_sale">ใบลดหนี้ตามผู้ขาย (Credit By Sale)</a></li>
          <li><a href="<?php echo base_url(); ?>ar/ar_credit_ohter">ใบลดหนี้ตามอื่นๆ (Credit Ohter)</a></li>
        </ul>
      </div>

      <div class="col-md-4">
        <h3>ตั้งลูกหนี้ (ACCOUNT RECEIVABLE )</h3>
        <ul>
          <li>
            <a >ตั้งลูกหนี้ตามโครงการ (Account Receivable By Project)</a>
            <ul>
              <li><a href="<?php echo base_url(); ?>ar/">ใบลดหนี้ Down</a></li>
              <li><a href="<?php echo base_url(); ?>ar/">ใบลดหนี้ Progress</a></li>
              <li><a href="<?php echo base_url(); ?>ar/">ใบลดหนี้ Retention</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url(); ?>ar/">ตั้งลูกหนี้ตามผู้ขาย (Account Receivable By Sale)</a></li>
          <li><a href="<?php echo base_url(); ?>ar/">ตั้งลูกหนี้ตามอื่นๆ (Account Receivable Ohter)</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h3>บันทึกใบเสร็จ (RAX INVOICE/ RECEPIT)</h3>
        <ul>
          <li>
            <a >บันทึกใบเสร็จตามโครงการ (Tax Invoice By Project)</a>
            <ul>
              <li><a href="<?php echo base_url(); ?>ar/">ใบลดหนี้ Down</a></li>
              <li><a href="<?php echo base_url(); ?>ar/">ใบลดหนี้ Progress</a></li>
              <li><a href="<?php echo base_url(); ?>ar/">ใบลดหนี้ Retention</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url(); ?>ar/">บันทึกใบเสร็จตามผู้ขาย (Tax Invoice By Sale)</a></li>
          <li><a href="<?php echo base_url(); ?>ar/">บันทึกใบเสร็จตามอื่นๆ (Tax Invoice Ohter)</a></li>
        </ul>
      </div>
    </div>      
</div>
