
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
              <li><a href="index.html"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li>บันทึกใบแจ้งหนี้ (INVOICE)</li>
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
                    <div class="panel panel-flat border-top-lg border-top-success">
                      <div class="panel-heading ">
                        <h5 class="panel-title">INVOICE</h5>
                        <div class="heading-elements">
                          <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                  </ul>
                                </div>
                      </div>

                      <div class="panel-body">
                        <!-- Tab -->
                        <div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-highlight text-right">
											<li class="active"><a href="#right-tab1" data-toggle="tab" id="tabdown">Down Payment </a></li>
											<li><a href="#right-tab2" data-toggle="tab" id="tabprogress">Progress Payment</a></li>
                      <li><a href="#right-tab3" data-toggle="tab" id="tabretention">Retention Payment</a></li>
										</ul>

										<div class="tab-content">
                      <!-- down  -->
											<div class="tab-pane active" id="right-tab1">
                        <div class="row" id="down">
                        </div>
											</div>
                      <!--/down  -->

											<div class="tab-pane" id="right-tab2">
                        <div class="row" id="progress">
                        </div>
											</div>

											<div class="tab-pane" id="right-tab3">
                        <div class="row" id="retention">
                        </div>
											</div>
										</div>
									</div>
                        <!-- /Tab -->
                      </div>
                    </div>
                  <!-- </form> -->
          </div>
<!-- editrow -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script>
// $(document).ready(function(){
    $('#down').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $('#down').load('<?php echo base_url(); ?>ar/ardown');
// });

  $("#tabdown").click(function(){
    $('#down').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $('#down').load('<?php echo base_url(); ?>ar/ardown');
  });
  $("#tabprogress").click(function(){
    $('#progress').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    // $('#progress').load('<?php echo base_url(); ?>ar/arprogress');
  });
  $("#tabretention").click(function(){
    $('#retention').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    // $('#retention').load('<?php echo base_url(); ?>ar/arretention');
  });
</script>
