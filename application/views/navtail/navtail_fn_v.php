<style type="text/css" media="screen">
    .sidebar-category {
        padding-top: 50px;
    }

    #footer {
        padding-bottom: 6vh;
    }
</style>
<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 13;
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
<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
          
            <div class="category-content no-padding">
                <div class="category-title">
                    <span>
                        <h5>
                            <b>Finace Management</b>
                        </h5>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">
                  

                    <!-- อนุมัติการตั้งหนี้ (PV) -->
                    <li>
                        <a href="#" class="has-ul">
                            <i class="icon-radio-unchecked"></i>
                            <span>Financial </span>
                        </a>
                        <ul class="hidden-ul">
                            <?php if($permission["Financial Management"][166]["read"] == 1){?>
                            <li>
                                <a href="<?php echo base_url(); ?>ap/confirm_ap">Financial</a>
                            </li>
                            <?php } ?>

                        </ul>
                    </li>
                    <!-- อนุมัติการตั้งหนี้ (PV) -->

                </ul>
                <div id="footer"></div>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>

<script type="text/javascript">
    $('#ap').css('background-color', '#00aeef');
    $('#ap').css('color', '#FFFFFF');
    // asdasd
</script>