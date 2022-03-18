<div class="content-wrapper">
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
    </div>

    <!-- <div class="heading-elements">
      <div class="heading-btn-group">
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
        <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
      </div>
    </div> -->
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
      <li>New PO</li>
  </div>
</div>
<div class="content">
  <div class="row">
    <div class="panel panel-flat border-top-lg border-top-success">
      <div class="panel-heading ">
        <h5 class="panel-title">Purchase Order System</h5>
        <div class="heading-elements">
          <ul class="icons-list">
            <!-- <li<a class="openpr btn btn-info btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบขอซื้อ</a></li> -->
            <!-- <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li> -->
          </ul>
        </div>
      </div>
      <div class="panel-body">
        <div id="loadbox">
        </div>
      </div>
    </div>
  </div>

</div>
        </div>
      </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
        $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_cmattype');
    });

</script>
