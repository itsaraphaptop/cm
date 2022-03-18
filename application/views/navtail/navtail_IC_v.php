<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 9;
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
<!-- Secondary sidebar -->
      <div class="sidebar sidebar-secondary sidebar-default">
        <div class="sidebar-content">

          <!-- Navigation -->
          <div class="sidebar-category">
            <div class="category-title">
              <span>Inventory MASTER</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>

            <div class="category-content">
              <div class="row row-condensed">
                  <?php if($permission["Setup Master"][87]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/data_master/cost_type" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-price-tag2"></i> <span>Setup Cost Type</span></a>
                  <?php } ?>
                  
                  <?php if($permission["Setup Master"][88]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/data_master/select_project_type" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-home7"></i> <span>Setup Type</span></a>
                  <?php } ?>

                  <?php if($permission["Setup Master"][89]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/data_master/select_project" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-home7"></i> <span>Setup WareHouse</span></a>
                   <?php } ?>

                   <?php if($permission["Setup Master"][90]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/inventory_area/area" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-direction  "></i> <span>Setup Area</span></a>
                  <?php } ?>

                  <?php if($permission["Setup Master"][91]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/ap/lessother" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="fa fa-money"></i> <span>Setup Less Other</span></a>
                   <?php } ?>

                   <?php if($permission["Setup Master"][92]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/inventory_area/depreciation" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-coins"></i><span>Setup Depreciation Method</span></a>
                   <?php } ?>

                    <?php if($permission["Setup Master"][93]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/inventory_area/assettype" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-magazine  "></i><span>Setup Asset Type</span></a>
                   <?php } ?>

                   <?php if($permission["Setup Master"][94]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/inventory_area/assetexpensetype" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="fa fa-genderless"></i> <span>Setup Asset Expense Type</span></a>
                  <?php } ?>

                    <?php if($permission["Setup Master"][95]["read"] == 1){?>
                      <a href="<?php echo base_url(); ?>index.php/inventory_area/assetlocation" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="fa fa-bank"></i> <span>Setup Asset Location</span></a>
                   <?php } ?>
               

                    <?php if($permission["Setup Master"][97]["read"] == 1){?>
                   <!--    <a href="<?php echo base_url(); ?>index.php/bd/bd_owner" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-graduation2"></i> <span>Owner</span></a> -->
                    <?php } ?>
            
                    <?php if($permission["Setup Master"][98]["read"] == 1){?>
                     <!--  <a href="<?php echo base_url(); ?>index.php/bd/bd_bom" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-graduation2"></i> <span>Bill of Meterial(BOM)</span></a> -->
                    <?php } ?>

              </div>

            </div>
          </div>
          <!-- /navigation -->

        </div>
      </div>
      <!-- /secondary sidebar -->
