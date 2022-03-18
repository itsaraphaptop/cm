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

          <!-- Actions -->
          <div class="sidebar-category">
            <div class="category-title">
              <span>Master Navigation</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>

            <div class="category-content">
              <div class="row row-condensed">
	              <a href="<?php echo base_url(); ?>data_structure/forprogrammer" type="button" class="preload btn bg-warning btn-block btn-float btn-float-lg"><i class="icon-home"></i> <span>Programmer</span></a>
	              <a href="<?php echo base_url(); ?>data_structure/setup_runnumber" type="button" class="preload btn bg-info btn-block btn-float btn-float-lg"><i class="icon-home"></i> <span>Setup RunNumber</span></a>
	              <button type="button" class="btn bg-info btn-block btn-float btn-float-lg" id="setupdefualt"><i class="icon-wrench3"></i> <span>Setup Default</span></button>
	              <a href="<?php echo base_url();?>data_structure/setup_print_form" class="btn bg-info btn-block btn-float btn-float-lg" id="setupdefualt"><i class="icon-file-empty"></i> <span>Upload Form Print</span></a>
              </div>

            </div>
          </div>
          <!-- /actions -->


          <!-- Navigation -->
          <!-- <div class="sidebar-category">
            <div class="category-title">
              <span>ACCOUNT MASTER</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>

            <div class="category-content">
              <div class="row row-condensed">
              
                  <a href="<?php echo base_url(); ?>index.php/data_master/setup_debtor" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-user-tie"></i> <span>Setup Debtor</span></a>
               

               
                  <a href="<?php echo base_url(); ?>data_master/new_bank" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-newspaper"></i> <span>Setup Bank</span></a>
                 

              </div>

            </div>
          </div> -->
          <!-- /navigation -->

        </div>
      </div>
      <!-- /secondary sidebar -->
