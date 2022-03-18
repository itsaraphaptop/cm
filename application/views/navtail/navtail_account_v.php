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
              <span>ACCOUNT MASTER</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>

            <div class="category-content">
              <div class="row row-condensed">
              <?php if($permission["Setup Master"][80]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>index.php/data_master/setup_debtor" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-user-tie"></i> <span>Setup Debtor</span></a>
              <?php } ?>

              <?php if($permission["Setup Master"][81]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>data_master/new_bank" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-newspaper"></i> <span>Setup Bank</span></a>
              <?php } ?>

              <?php if($permission["Setup Master"][82]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>data_master/accchart_list" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-newspaper"></i> <span>Setup Account Chart</span></a>
              <?php } ?>

               <?php if($permission["Setup Master"][83]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>data_master/expensother" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-newspaper"></i> <span>Setup Expens</span></a>
              <?php } ?>

              <?php if($permission["Setup Master"][84]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>data_master/ar_option" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-list-unordered"></i> <span>Setup Option</span></a>
              <?php } ?>

              <?php if($permission["Setup Master"][148]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>data_master/master_job_desc" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class=" icon-menu6"></i> <span>Setup Job Description</span></a>
              <?php } ?>

              <?php if($permission["Setup Master"][149]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>data_master/master_job_type" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-stackoverflow"></i> <span>Setup Job Type</span></a>
              <?php } ?>
                  <!-- <a href="<?php echo base_url(); ?>data_master/vender_business" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-collaboration"></i> <span>Setup Business</span></a> -->
                   <a href="<?php echo base_url(); ?>index.php/contract/wt_contract" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-file-empty"></i> <span>Setup W/T</span></a>
              </div>

            </div>
          </div>
          <!-- /navigation -->
          <!-- Navigation -->
          <div class="sidebar-category">
            <div class="category-title">
              <span>GL MASTER</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>

            <div class="category-content">
              <div class="row row-condensed">
              <?php if($permission["Setup Master"][85]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>gl/gl_bookaccount" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-user-tie"></i> <span>Setup Book</span></a>
              <?php } ?>

              <?php if($permission["Setup Master"][86]["read"] == 1){?>
                  <a href="<?php echo base_url(); ?>gl/gl_accountperiod" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class=" icon-bookmark"></i> <span>Account Period Setup</span></a>
              <?php } ?>
              </div>

            </div>
          </div>
          <!-- /navigation -->

        </div>
      </div>
      <!-- /secondary sidebar -->
