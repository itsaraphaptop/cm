<style type="text/css">
#footer{
  padding-bottom: 6vh;
}
</style>
<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 3;
$username = $session_data["username"];
$this->db->select('*');
$this->db->from('module_detail');
$this->db->join('module_header', 'module_detail.ref_module = module_header.module_id');
$this->db->where("ref_module",$id_module);
$query = $this->db->get();

$res_modules = $query->result_array();
//var_dump($res_modules);

        $array_module = array();
        $permission = array();
        
          $sub_modules =  $res_modules;
          foreach ($sub_modules as $key => $sub_module) {

                      //get read and write by user name
                      $this->db->select(
                        ["read","write"]
                      );
                      $where_array = array(
                        "ref_username" => $username,
                        "ref_module_id" => $id_module,
                         "ref_sub_module" => $sub_module["sub_module_id"]
                      );
                      $this->db->where($where_array);
                      $query = $this->db->get("member_permission");
                      $res_data = $query->result_array();
                      $read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
                      $write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";
                      
                      $permission[$sub_module["module_name"]][$sub_module["sub_module_id"]] =  array(
                        //"ref_module_id" => $sub_module["ref_module"],
                  //"sub_module_id" => $sub_module["sub_module_id"],
                  "read" => $read ,
                  "write" =>$write

                      );

              }// loop 1.1  

?>

<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
  <div class="sidebar-content">
    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <div class="category-title">
          <span><h5><b>FIX ASSET</b></h5></span>
          <ul class="icons-list">
            <li><a href="#" data-action="collapse"></a></li>
          </ul>
        </div>
        <ul class="navigation navigation-main navigation-accordion sidebar-default">
          
          <li id="add_asset">
            <a href="<?php echo base_url(); ?>add_asset"><img src="<?php echo base_url(); ?>icon_cm/notes.png"> <span>Asset Records</span></a>
          </li> 

          <li id="transfer_asset">
            <a href="<?php echo base_url(); ?>asset_transfer"><img src="<?php echo base_url(); ?>icon_cm/car.png"> <span>Asset Transfer</span></a>
          </li>

          <li id="depreciation">
            <a href="<?php echo base_url(); ?>add_depreciation"><img src="<?php echo base_url(); ?>icon_cm/calculator.png"> <span>Depreciation Calculation</span></a>
          </li>

          <!-- <li id="repair">
            <a href="<?php echo base_url(); ?>add_asset/repair_view"><img src="<?php echo base_url(); ?>icon_cm/repair.png"> <span>Repair</span></a>
          </li> -->

          <li id="maintenance">
            <a href="<?php echo base_url(); ?>add_asset/maintenance"><img src="<?php echo base_url(); ?>icon_cm/maintenance.png"> <span>other expenses on Assets</span></a>
          </li>

          <li id="write">
            <a href="<?php echo base_url(); ?>add_asset/write_off"><img src="<?php echo base_url(); ?>icon_cm/write.png"> <span>Write Off Asset</span></a>
          </li>

          <li id="count">
            <a href="<?php echo base_url(); ?>add_asset/count"><img src="<?php echo base_url(); ?>icon_cm/count.png"> <span>Asset Counting</span></a>
          </li>

          <!-- <li id="approved">
            <a href="<?php echo base_url(); ?>add_asset/approve_fa"><img src="<?php echo base_url(); ?>icon_cm/approved.png"> <span>Approved</span></a>
          </li> -->

          <!-- <li id="external">
            <a href="<?php echo base_url(); ?>add_asset/calibration_view"><img src="<?php echo base_url(); ?>icon_cm/law.png"> <span>External Calibration</span></a>
          </li>
 -->
          <li>
            <a href="<?php echo base_url(); ?>add_asset/reportall"><img src="<?php echo base_url(); ?>icon_cm/report.png"> <span>Report</span></a>
          </li>

         <!--  <li id="set_up">
            <a href="<?php echo base_url(); ?>add_asset/repair_asset"><img src="<?php echo base_url(); ?>icon_cm/setup.png"> <span>Set Up Approve</span></a>
          </li> -->

        </ul>
        <div id="footer"></div>
      </div>
    </div>
    <!-- /main navigation -->
  </div>
</div>



<script type="text/javascript">
  $('#fa').css('background-color', '#00aeef');
  $('#fa').css('color','#FFFFFF');
</script>
      <!-- <div class="sidebar sidebar-secondary sidebar-default">
        <div class="sidebar-content"> -->

          <!-- Actions -->
          <!-- <div class="sidebar-category">
            <div class="category-title">
              <span>Fix Asset</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>
<div class="category-content">
            <div class="row row-condensed">
			<div class="col-xs-12">
	              	<a href="<?php echo base_url(); ?>panel/officemanage" type="button" class="preload btn bg-warning btn-block btn-float btn-float-lg"><i class="icon-home"></i> <span>Dashboard</span></a>
	              </div>
            </div>
</div>
            <div class="category-content">
              <div class="row row-condensed">

                <div class="col-xs-6">

                  <?php if($permission["Fix Asset Management"][21]["read"] == 1){ ?>
                      <a href="<?php echo base_url(); ?>add_asset" type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg"><i class="icon-magazine"></i> <span>  การเพิ่มทะเบียนทรัพย์สิน</span></a>
                  <?php } ?>

                  <?php if($permission["Fix Asset Management"][23]["read"] == 1){ ?>
                      <a href="<?php echo base_url(); ?>asset_transfer" type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg"><i class="icon-truck"></i> <span>Asset Transfer</span></a>
                   <?php } ?>

                  <?php if($permission["Fix Asset Management"][24]["read"] == 1){ ?> 
                      <a href="<?php echo base_url(); ?>add_depreciation" type="button" class="btn bg-purple-300 btn-block btn-float btn-float-lg"><i class="icon-coins"></i> <span>Depreciation Calculation</span></a>
                  <?php } ?>
                      <a href="<?php echo base_url(); ?>add_asset/repair_view"  class="btn bg-purple-300 btn-block btn-float btn-float-lg" type="button"><i class="icon-hammer-wrench"></i> <span>Repair</span></a></a>
                      <a href="<?php echo base_url(); ?>add_asset/calibration_view"  class="btn bg-purple-300 btn-block btn-float btn-float-lg" type="button"><i class="icon-law"></i> <span>External Calibration</span></a></a>

                </div>

            <div class="col-xs-6">

                 <?php if($permission["Fix Asset Management"][22]["read"] == 1){ ?>
                      <a href="<?php echo base_url(); ?>add_asset/maintenance" class="btn bg-info-400 btn-block btn-float btn-float-lg"><i class="icon-wrench3"></i> <span>other expenses on Assets</span></a>
                  <?php } ?>

                  <?php if($permission["Fix Asset Management"][25]["read"] == 1){ ?>
                      <a href="<?php echo base_url(); ?>add_asset/write_off" type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg"><i class="icon-cart5"></i> <span>Write Off Asset</span></a>
                 <?php } ?>

                 <?php if($permission["Fix Asset Management"][26]["read"] == 1){ ?>
                    <a href="<?php echo base_url(); ?>add_asset/count" type="button" class="btn bg-purple-300 btn-block btn-float btn-float-lg"><i class="icon-cart5"></i> <span>Asset Counting</span></a>
                 <?php } ?>
                   <a href="<?php echo base_url(); ?>add_asset/approve_fa" type="button" class="btn bg-success btn-block btn-float btn-float-lg"><i class="icon-checkmark-circle2"></i> <span>Approve</span></a>



                   </div>
                   <div class="col-xs-12"><hr></div>
            <div class="col-xs-6">
            <?php if($permission["Fix Asset Management"][27]["read"] == 1){ ?>
                <a href="<?php echo base_url(); ?>add_asset/reportall"  class="btn bg-warning-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-stats-bars"></i> <span>Report</span></a>
            <?php } ?>
                <a href="<?php echo base_url(); ?>add_asset/repair_asset" type="button" class="btn bg-success btn-block btn-float btn-float-lg"><i class="icon-checkmark-circle2"></i> <span>Set Up Approve</span></a>
             
            </div>

              </div>
            </div>

          </div>

 -->

          <!-- /actions -->
      <!--   </div>
      </div> -->
      <!-- /secondary sidebar -->
 