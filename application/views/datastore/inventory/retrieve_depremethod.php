<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Depreciation Method</h4>
    </div>
    <div class="heading-elements">
      <div class="heading-btn-group">
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
      </div>
    </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">Depreciation Method</li>
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
    <div class="content">
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Depreciation Method</h6>
          <div class="heading-elements">
            <a  type="button" href="<?php echo base_url(); ?>inventory_area/assetexpensetype"  class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>
          </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
          <div class="panel-body">
            <table class="table table-xxs table-hover datatable-basic" >
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Cost Code</th>
                  <th>Maintenance Name</th>
                  <th>Next Due</th>
                  <th>Alert Before</th>
                  <th>Next Mile</th>
                  <th>จัดการ</th>
                </tr>
              </thead>
              <tbody>
                <?php  $n =1; foreach ($res as $m){ ?>
                <tr>
                  <th scope="row"><?php echo $n;?></th>
                  <td><?php echo $m->de_costid; ?></td>
                  <td><?php echo $m->de_maintenance; ?></td>
                  <td><?php echo $m->de_due; ?></td>
                  <td><?php echo $m->de_before; ?></td>
                  <td><?php echo $m->de_mile; ?></td>
                  <td>
                      <a href="<?php echo base_url(); ?>inventory_area/assetexpensetype_edit/<?=  $m->de_id; ?>" >
                        <i class="icon-pencil7"></i>
                      </a>
                  </td>
                </tr>
                <script>
                $(".opendeptor<?php echo $n;?>").click(function(event) {
                $("#codecostcodeint").val("<?php echo $m->de_costid; ?>");
                $("#costnameint").val("<?php echo $m->de_costname; ?>");
                $("#de_maintenance").val("<?php echo $m->de_maintenance; ?>");
                $("#de_due").val("<?php echo $m->de_due; ?>");
                $("#de_before").val("<?php echo $m->de_before; ?>");
                $("#de_mile").val("<?php echo $m->de_mile; ?>");
                
                $("#codecostcodeint").prop('disabled', true);
                $("#costnameint").prop('disabled', true);
                $("#de_maintenance").prop('disabled', true);
                $("#de_due").prop('disabled', true);
                $("#de_before").prop('disabled', true);
                $("#de_mile").prop('disabled', true);
                $("#costttttt").prop('disabled', true);
                $("#insertpodetail").prop('disabled', true);
                if(1==<?php echo $m->de_lock; ?>){
                $("#de_lock").prop("checked",true);
                }else if(2==<?php echo $m->de_lock; ?>){
                $("#de_lock1").prop("checked",true);
                }else if(3==<?php echo $m->de_lock; ?>){
                $("#de_lock2").prop("checked",true);
                }
                });
                
                </script>
                <?php $n++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>