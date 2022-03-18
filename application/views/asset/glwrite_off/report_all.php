<!-- <div class="page-header">
          <!-- <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Home</span> - รายงาน</h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div> -->

          <!-- <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
              <li class="active">รายงาน</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div> -->

          <div class="content">

          <!-- Highlighting rows and columns -->

          <!-- <div class="col-lg-2">
<button type="button" class="btn bg-purple-300 btn-block btn-float btn-float-lg  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
<i class="icon-stats-bars"></i> <span>รายงานแยกตามโครงการและแผนก</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/report_asset"><i class="icon-gear"></i>แยกตามโครงการ/แผนก</a></li>
                    <li><a href="#"><i class="icon-gear"></i>แยกตามรหัสบัญชี</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/fa_report"><i class="icon-gear"></i>แยกตามรหัสทรัพย์สิน</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/fa_att"><i class="icon-gear"></i>แยกตามประเภททรัพย์สิน</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/selectmonth"><i class="icon-gear"></i>รายงานทรัพย์สินประจำเดือน</a></li>
                  </ul>

            </div>


                      <div class="col-lg-2">
<button type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
<i class="icon-flip-vertical2"></i> <span>รายงานการโอนทรัพย์สิน</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/report_asset_tf"><i class="icon-gear"></i>สรุปตามโครงการ/แผนก</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/fatf_report"><i class="icon-gear"></i>การโอนทรัพย์สิน</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/fafa_report"><i class="icon-gear"></i>สรุปตามทรัพย์สิน</a></li>
                    <li><a href="#"><i class="icon-gear"></i>รายงานการโอนทรัพย์สินแบบมีมูลค่า</a></li>
                   
                  </ul>

            </div>

            <div class="col-lg-2">
<button type="button" class="btn bg-warning-400 btn-block btn-float btn-float-lg  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
<i class="icon-cancel-square2"></i> <span>รายงานการ Write OFF</span>
</button>
<ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/wof_asspd"><i class="icon-gear"></i>สรุปตามโครงการ/แผนก</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/add_asset/wfassdate"><i class="icon-gear"></i>ตามการ Write OFF</a></li>              
                  </ul>

            </div> -->

<div class="container-fluid" style="margin-top:30px;">
  <div class="row">

        <div class="col-md-6">

              <!-- Title with left icon -->
              <div class="panel panel-white">
                <div class="panel-heading">
                  <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Report</h6>
                </div>

                <div class="panel-body">
                  <h3><b>1. รายงานทรัพย์สิน</b></h3>
                  <ul class="list no-margin-bottom">
                    <!-- <li><a href="<?php echo base_url(); ?>pr_report/report_summary" title="1.1 stock">1.1 Purchase Required Report</a></li> -->
         
                    <li><a href="<?php echo base_url(); ?>add_asset/depreciate_view" title="Depreciation">1.1 Depreciation</a></li>
                    <li><a href="<?php echo base_url(); ?>add_asset/asset_all_view" title="Asset All">1.2 Asset All</a></li>
                  </ul>
                  <h3><b>2. สรุปรายการแจ้งซ่อม</b></h3>
                  <ul class="list no-margin-bottom">
                    <!-- <li><a href="<?php echo base_url(); ?>pr_report/report_summary" title="1.1 stock">1.1 Purchase Required Report</a></li> -->
         
                    <li><a href="<?php echo base_url(); ?>add_asset/summary_repairs" title="Depreciation">2.1 ตารางสรุปรายการแจ้งซ่อม</a></li>
                  </ul>
                </div>
              </div>
              <!-- /title with left icon -->



            </div>

    </div>
  </div>

</div>

</div>

