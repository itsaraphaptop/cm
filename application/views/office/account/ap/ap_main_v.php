<div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ</h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="ap_main"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li>ระบบจัดการบัญชีเจ้าหนี้</li>
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
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

          <div class="row">

                  <!-- <form method="post" action="<?php echo base_url(); ?>index.php/pettycash_active/newpettycash"> -->
               
                      <div class="panel-body">
                        <!-- Tab -->
                        <div class="tabbable tab-content-bordered">
      										

        										<div class="tab-content">
                              <!-- down  -->
        											<div class="tab-pane has-padding active" id="right-tab1">
                                <div class="row" id="apv">
                                </div>
        											</div>
                              <!--/down  -->

        										</div>
									       </div>
                        <!-- /Tab -->
                      </div>

                  
                  <!-- </form> -->
                  <!-- Footer -->
                       <div class="footer text-muted">
                         © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
                       </div>
                       <!-- /footer -->
          </div>
        </div>
<!-- editrow -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script>
// $(document).ready(function(){
    $('#apv').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $('#apv').load('<?php echo base_url(); ?>ap/apv');
// });

  // $("#tabdown").click(function(){
  //   $('#apv').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  //   $('#apv').load('<?php echo base_url(); ?>ap/apv');
  // });
  // $("#tabprogress").click(function(){
  //   $('#aps').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  //   $('#aps').load('<?php echo base_url(); ?>ar/aps');
  // });
  $("#tabretention").click(function(){
    $('#apo').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $('#apo').load('<?php echo base_url(); ?>ap/open_apo');
  });
</script>
