<style type="text/css" media="screen">
    .sidebar-category {
        padding-top: 50px;
    }
</style>

<?php
$session_data = $this->session->userdata('sessed_in');
$id_module = 1;
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
                            <b>Petty Cash</b>
                        </h5>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">

                    <li id="pc">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/petty_cash.png">
                            <span>Petty Cash</span>
                        </a>
                        <ul>
                            <li>
                                <a id="new_pc" href="<?php echo base_url(); ?>petty_cash/openproject">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>New Petty Cash</span>
                                </a>
                            </li>
                            <li>
                                <a id="archive_pc" href="<?php echo base_url(); ?>petty_cash/openproject_archive">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Petty Cash Archive</span>
                                </a>
                            </li>
                            <li>
                                <a id="pc_view" href="<?php echo base_url(); ?>petty_cash/pc">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Approve Petty Cash</span>
                                </a>
                            </li>
                            <li>
                                <a id="pc_report" href="<?php echo base_url(); ?>petty_cash/pc_summary">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Petty Cash Report</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li id="account_i">
                        <a href="#" class="has-ul">
                            <img src="<?php echo base_url(); ?>icon_cm/prograss_sub.png">
                            <span>Progress Subcontractor</span>
                        </a>
                        <ul>
                            <li>
                                <a id="prograss" href="<?php echo base_url(); ?>pr/open_billsubc">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Progress Subcontractor</span>
                                </a>
                            </li>
                        </ul>
                    </li> -->

                    <!-- <li id="project_h">
                        <a href="#" class="has-ul">
                            <img src="<?php echo base_url(); ?>icon_cm/invoice.png">
                            <span>Project Progress</span>
                        </a>
                        <ul>
                            <li>
                                <a id="project_d" href="<?php echo base_url(); ?>management/ProgressSubmit">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Project Progress</span>
                                </a>
                            </li>
                        </ul>
                    </li> -->

                </ul>
                <div id="footer"></div>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>


<script type="text/javascript">
    $('#pr').css('background-color', '#00aeef');
    $('#pr').css('color', '#FFFFFF');
</script>