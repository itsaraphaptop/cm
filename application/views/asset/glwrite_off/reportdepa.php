<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$id);
$query=$this->db->get()->result();
?>
 <?php  foreach ($query as $b) { 
 $department_id = $b->department_id;
 $department_title = $b->department_title;
 } ?>
<div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Home</span> - รายงานทรัพย์สิน : แยกตามแผนก</h4>
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
              <li class="active">รายงานทรัพย์สิน : แยกตามโครงการ/แผนก</li>
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

   <div class="content">

          <!-- Highlighting rows and columns -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h4 class="panel-title">รายงานทรัพย์สิน : แยกตามแผนก</h4>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

            <div class="panel-body">
<form action="<?php echo base_url(); ?>index.php/asset_active/reportfa_d" method="post">
              <div class="row">
                <div class="form-group">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Start:</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="date" class="form-control pickadate-selectors" id="startdate" name="startdate">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-lg-3 control-label">End:</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="date" class="form-control pickadate-selectors" id="enddate" name="enddate">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                 
                  <button type="submit" class="btn btn-info"><i class="icon-printer2"></i> Submit</button>
                </div>
              </div>
              </div>
              <br>

              <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <label class="col-lg-2 control-label">Department :</label>
                    <div class="col-lg-5">
                    <input type="text" readonly="" class="form-control" value="<?php echo $department_title; ?>">
                            <input type="hidden" class="form-control" id="departmentid" name="departmentid" value="<?php echo $department_id; ?>">                     
                    </div>
                    <span class="input-group-btn">
                      <a href="<?php echo base_url(); ?>index.php/asset_active/reportfa_departall/<?php echo $department_id; ?>" class="btn btn-info btn-sm"><span class="icon-shredder"></span> ทรัพย์สินทั้งหมด</a>
                            </span>
                  </div>

               
                </div> 
              </div>

               <div class="row">

              <div class="col-lg-6">
              <div class="form-group">
                    <label class="col-lg-2 control-label">&nbsp;</label><br><br>
                    <div class="col-lg-4">
                   <label class="radio-inline">
                      <input type="radio" name="type" id="type1" value="1">
                      Asset Code
                    </label>

                    <label class="radio-inline">
                      <input type="radio" name="type" id="type2" value="2">
                      Asset type
                    </label>
                    </div>
                    </div>
                    </div>
  
              </div>

              <div class="row">
                <div class="col-lg-3" id="assethide1">
                    <div class="input-group">
                    <input type="text" class="form-control input-sm" name="atc" id="fa_assetcode" readonly="">
                    <input type="text" class="form-control input-sm" name="atcn" id="fa_asset" readonly="">
                    <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#retrieve" class="retrieve btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
              </div>

               <div class="col-lg-3" id="assethide2">
                    <div class="input-group">
                   <input type="text" class="form-control input-sm" name="att" id="att" readonly="">
                    <input type="text" class="form-control input-sm" name="attn" id="attn" readonly="">
                    <span class="input-group-btn">
                       <button type="button" data-toggle="modal" data-target="#asset" class="asset btn btn-default btn-icon btn-xs"><i class="icon-search4"></i></button>
                    </span>
                    </div>
              </div>
              </div>
              <hr>

        </div>
        
          </div>

        </div>

        </form>

        <script>
           $("div#assethide1").hide();
           $("div#assethide2").hide();
        </script>

        <script>

           $("#type1").click(function(){
            $("div#assethide1").show();
           $("div#assethide2").hide();

            });

           $("#type2").click(function(){

            $("div#assethide1").hide();
            $("div#assethide2").show();

            
            });
        </script>

        <div class="modal fade" id="retrieve" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายการบันทึกทรัพย์สิน</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="retrievee">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> 
<script>
  $(".retrieve").click(function(){
       $('#retrievee').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
       $("#retrievee").load('<?php echo base_url(); ?>index.php/add_asset/model_addasset');
     });
</script>    


<div class="modal fade" id="asset" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Asset Type</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="type">

            </div>
            </div>
        </div>
    </div>
  </div>
</div>

        <script>
      $(".asset").click(function(){
       $('#type').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
       $("#type").load('<?php echo base_url(); ?>index.php/share/codeasst');
     });
</script>