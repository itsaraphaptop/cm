

<div class="panel panel-flat border-top-lg border-top-success">
  <div class="page-header">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">ACCOUNT RECEIVABLE (AR)  - ระบบลูกหนี้</span></h4>
      </div>
      <div class="heading-elements"></div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>ar/ar_invoice_v">ใบแจ้งหนี้ ACCOUNT INVOOICE</a></li>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/open_invoice_down"  type="button" class="btn bg-success-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"><i class="icon-file-plus"></i> <span>ใบแจ้งหนี้ Dowm</span></a>
      </div> 
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/open_invoice_progress" type="button" class="btn bg-warning-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"><i class="icon-file-plus"></i> <span>ใบแจ้งหนี้ Progress</span>
        </a>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/open_invoice_retention" type="button" class="btn bg-info-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"><i class="icon-file-plus"></i> <span>ใบแจ้งหนี้ Retention</span>
        </a>
      </div>
    </div> 
<br>
  <div class="row">
            <div class="col-lg-2">
<button type="button" class="btn bg-info-400 btn-block btn-icon btn-rounded  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<i class="icon-flip-vertical2"></i> <span> ใบแจ้งหนี้ (INVOICE)</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                   <li><a class="preload" href="<?php echo base_url(); ?>ar/open_invoice_down"> ใบแจ้งหนี้เงินดาวน์ (Invoice Down)</a></li>
                        <li><a class="preload" href="<?php echo base_url(); ?>ar/open_invdown_all"> รายการใบแจ้งหนี้เงินดาวน์ทั้งหมด (Invoice Down)</a></li>
                        <li><a class="preload" href="<?php echo base_url(); ?>ar/open_invoice_progress"> ใบแจ้งหนี้ค่างวดงาน (Invoice Progress)</a></li>
                        <li><a class="preload" href="<?php echo base_url(); ?>ar/open_invprogress_all"> รายการใบแจ้งหนี้ค่างวดงานทั้งหมด (Invoice Progress)</a></li>
                        
                  </ul>

            </div>

                        <div class="col-lg-3">
<button type="button" class="btn bg-info-400 btn-block btn-icon btn-rounded  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<i class="icon-flip-vertical2"></i> <span>บันทึกตั้งบัญชีลูกหนี้ (Account Receivable)</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                     <li><a href="<?php echo base_url(); ?>ar/ar_account">บันทึกตั้งบัญชีลูกหนี้ (Account Receivable)</a></li>
                        <li><a href="<?php echo base_url(); ?>ar/ar_accountall">รายการตั้งบัญชีลูกหนี้ทั้งหมด (Account Receivable)</a></li>
                        <li><a class="preload" href="<?php echo base_url(); ?>ar/open_invoice_retention"> ใบแจ้งหนี้เบิกคืนเงินประกัน (Invoice Retention)</a></li>
                        <li><a class="preload" href="<?php echo base_url(); ?>ar/open_retention_all"> รายการใบแจ้งหนีเบิกคืนเงินประกันทั้งหมด (Invoice Retention)</a></li>
                  </ul>

            </div>

                        <div class="col-lg-2">
<button type="button" class="btn bg-info-400 btn-block btn-icon btn-rounded  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<i class="icon-flip-vertical2"></i> <span>บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                   <li><a class="preload" href="<?php echo base_url(); ?>ar/open_proreceipt">บันทึกใบเสร็จรับเงิน/ใบกำกับภาษี (Tax Invoice/ Receipt)</a></li>
                        <li><a href="<?php echo base_url(); ?>ar/ar_receiptall">รายการบันทึกใบเสร็จรับเงิน/ใบกำกับภาษีทั้งหมด (Tax Invoice/ Receipt)</a></li>
                  </ul>

            </div>


             <div class="col-lg-2">
<button type="button" class="btn bg-info-400 btn-block btn-icon btn-rounded  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<i class="icon-flip-vertical2"></i> <span>บันทึกรับเงินตามใบเสร็จ</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                   <li><a class="preload" href="<?php echo base_url(); ?>ar/ar_receiving">บันทึกรับเงินตามใบเสร็จ (AR Receiving)</a></li>
                        <li><a href="<?php echo base_url(); ?>ar/ar_receivingall">รายการบันทึกรับเงินตามใบเสร็จทั้งหมด (AR Receiving)</a></li>
                  </ul>

            </div>


                         <div class="col-lg-2">
<button type="button" class="btn bg-info-400 btn-block btn-icon btn-rounded  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<i class="icon-flip-vertical2"></i> <span>บันทึกตัดลูกหนี้</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                   <li><a class="preload" href="<?php echo base_url(); ?>ar/ar_clear">บันทึกตัดลูกหนี้ (Clear A/R)</a></li>
                        <li><a href="<?php echo base_url(); ?>ar/ar_clearall">รายการบันทึกตัดลูกหนี้ทั้งหมด (Clear A/R)</a></li>
                  </ul>

            </div>


    </div>

    <br>

    <div class="row">
      
      <div class="col-md-2">
        <a href="<?php echo base_url(); ?>ar/ar_post_gl" type="button" class="btn bg-info-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-file-plus"></i> <span>Post To GL System</span>
        </a>
      </div>


           <div class="col-lg-2">
<a href="<?php echo base_url(); ?>management/reportar" type="button" class="btn bg-info-400 btn-block btn-xlg btn-icon btn-rounded btn-labeled" aria-expanded="true"> <i class="icon-file-plus"></i> <span>รายงานลูกหนี้</span></a></div>


            </div>
            
  </div>
                    

                      
                    
                   
                   