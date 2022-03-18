<style type="text/css" media="screen">
    .sidebar-category {
        padding-top: 50px;
    }
</style>

<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 5;
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
                    <span>
                        <h5>
                            <b>Cost Control</b>
                        </h5>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">

                    <li id="boq">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/boq.png">
                            <span>BOQ</span>
                        </a>
                        <ul>
                            <li>
                                <a id="setup_bill" href="<?php echo base_url(); ?>bd/bd_tender">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Tender Project </span>
                                </a>
                            </li>
                            <li>
                                <a id="archive_boq" href="<?php echo base_url(); ?>bd/view_boqall">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Archive Tender</span>
                                </a>
                            </li>
                             <li>
                                <a id="bill" href="<?php echo base_url(); ?>bd/boq_openProject">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Bill of Quatity (BOQ)</span>
                                </a>
                            </li>
                            <li>
                                <a id="approve_bg" href="<?php echo base_url(); ?>bd/setup_boq">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Approve Budget / BOQ</span>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                    <li id="bom">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/bom.png">
                            <span>BOM</span>
                        </a>
                        <ul>
                            <li>
                                <a id="add_bom" href="<?php echo base_url(); ?>bd/master_bom">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup BOM</span>
                                </a>
                            </li>
                            <!-- <li>
								<a id="setup_bom" href="<?php echo base_url(); ?>data_master/setup_project_main">
									<i class="icon-radio-unchecked"></i>
									<span>Setup Project</span>
								</a>
							</li> -->
                            <li>
                                <a id="archive-bom" href="<?php echo base_url(); ?>bd/archive_bom">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Archive BOM</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-ul">
                            <img src="<?php echo base_url(); ?>icon_cm/excel.png">
                            <span>Template</span>
                        </a>
                        <ul class="hidden-ul">
                            <li>
                                <a href="<?php echo base_url();?>folder_boq/template BOQ.xls" download>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>BOQ</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="revise">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/bom.png">
                            <span>Revise Project Budget</span>
                        </a>
                        <ul>
                            <li>
                                <a id="revisebudget" href="<?php echo base_url(); ?>management/ViewReviseProjectBudget">
                                     <i class="icon-radio-unchecked"></i>
                                    <span>Revise Project Budget</span>
                                </a>
                            </li>
                             <li>
                                <a id="revise_approve" href="<?php echo base_url(); ?>bd/setup_boq_revise">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Approve revise</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<script type="text/javascript">
    $('#cc').css('background-color', '#00aeef');
    $('#cc').css('color', '#FFFFFF');
</script>