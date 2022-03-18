<div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Home</span> - รายงานการ Write OFF : แยกตามโครงการ/แผนก</h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
              <li class="active">รายงานการ Write OFF : แยกตามโครงการ/แผนก</li>
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
        </div>

        <div class="col-md-6">
      <div class="panel panel-flat">
           <div class="panel-heading">
           <h4><span class="text-semibold"></span>Project</h4>
           <br>
           <table class="table table-xxs table-hover datatable-basicxcxxxxxx">
                <thead>
                  <tr>
                    <th>Project Code</th>
                    <th>Project Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($pj as $key) { ?>
                     <tr>
                    <td><?php echo $key->project_code; ?></td>
                    <td><?php echo $key->project_name; ?></td>
                    
                    <td><a href="<?php echo base_url(); ?>index.php/add_asset/report_woffassetpj/<?php echo $key->project_code; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                  </tr>

                      <?php } ?>
                                  </tbody>
              </table>
               <br> <br>
           </div>
           </div>
           </div>


            <div class="col-md-6">
      <div class="panel panel-flat">
           <div class="panel-heading">
           <h4><span class="text-semibold"></span>Departmaent</h4>
            <br>
           <table class="table table-xxs table-hover datatable-basicxcxxxxxx">
                <thead>
                  <tr>
                    <th>Department Code</th>
                    <th>Department Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($dm as $key1) { ?>
                     <tr>
                    <td><?php echo $key1->department_code; ?></td>
                    <td><?php echo $key1->department_title; ?></td>
                    
                    <td><a href="<?php echo base_url(); ?>index.php/add_asset/report_woffassetde/<?php echo $key1->department_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                  </tr>

                      <?php } ?>
                                  </tbody>
              </table>
               <br> <br>
           </div>
           </div>
           </div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxcxxxxxx").DataTable();
</script>



