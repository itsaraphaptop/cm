<style type="text/css">
.sidebar-category {
    padding-top: 50px;
}

.navigation-main {
    font-size: 11px;
}

#footer {
    padding-bottom: 6vh;
}

.navigation>li ul li p {
    padding: 10px 10px;
    padding-left: 51px;
    min-height: 40px;
}

.navigation li p>i {
    float: left;
    top: 0;
    margin-top: 2px;
    margin-right: 15px;
    -webkit-transition: opacity 0.2s ease-in-out;
    -o-transition: opacity 0.2s ease-in-out;
    transition: opacity 0.2s ease-in-out;
}
</style>
<?php
$session_data = $this->session->userdata('sessed_in');
$id_module = 11;
$username = $session_data["username"];
$this->db->select('*');
$this->db->from('module_detail');
$this->db->join('module_header', 'module_detail.ref_module = module_header.module_id');
$this->db->where("ref_module", $id_module);
$query = $this->db->get();

$res_modules = $query->result_array();
//var_dump($res_modules);

$array_module = array();
$permission = array();

$sub_modules = $res_modules;
foreach ($sub_modules as $key => $sub_module) {

	//get read and write by user name
	$this->db->select(
		["read", "write"]
	);
	$where_array = array(
		"ref_username" => $username,
		"ref_module_id" => $id_module,
		"ref_sub_module" => $sub_module["sub_module_id"],
	);
	$this->db->where($where_array);
	$query = $this->db->get("member_permission");
	$res_data = $query->result_array();
	$read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
	$write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";

	$permission[$sub_module["module_name"]][$sub_module["sub_module_id"]] = array(
		//"ref_module_id" => $sub_module["ref_module"],
		//"sub_module_id" => $sub_module["sub_module_id"],
		"read" => $read,
		"write" => $write,

	);

} // loop 1.1

?>
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <div class="category-title">
                    <span>
                        <h6>
                            <b>Master Configuration</b>
                        </h6>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">

                    <li id="mg" class="nav_ms">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/marter.png">
                            <span>Master Genaral</span>
                        </a>
                        <ul>
                            <li>
                                <a id="mc1" href="<?php echo base_url(); ?>datastore/archive_company">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Company</span>
                                </a>
                            </li>
                            <li>
                                <a id="mc2" href="<?php echo base_url(); ?>data_master/bussiness_unit">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Business Unit</span>
                                </a>
                            </li>


                            <li>
                                <a id="mc3" href="<?php echo base_url(); ?>data_master/setup_project_main">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Project</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a id="mc4" href="<?php echo base_url(); ?>data_master/department">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Department</span>
                                </a>
                            </li> -->
                            <li>
                                <a id="mc5" href="<?php echo base_url(); ?>data_master/setupemployee">
                                    <i class="icon-radio-unchecked" aria-hidden="true"></i>
                                    <span>Setup Employee</span>
                                </a>
                            </li>
                            <li>
                                <a id="mc0" href="<?php echo base_url(); ?>data_master/setupsystem">
                                    <i class="icon-radio-unchecked" aria-hidden="true"></i>
                                    <span>Setup Project Job</span>
                                </a>
                            </li>
                            <li>
                                <a id="mc6" href="<?php echo base_url(); ?>data_master/setup_permision">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Permission</span>
                                </a>
                            </li>
                            <li>
                                <!-- <a id="mc7" href="<?php echo base_url(); ?>data_master/master_job_desc">
						<i class=" icon-menu6"></i>
						<span>Setup Job system</span>
						</a> -->
                                <!-- <p id="mc7"><i class=" icon-menu6"></i> <span>Setup Job system</span></p> -->
                            </li>
                            <!--  <li>
                <a id="mc8" href="<?php echo base_url(); ?>new_permission/report_permission">
					<i class="fa fa-users"></i>
					<span>Report Permssion Module</span>
					</a>
					</li> -->
                            <!-- <li>
                <a id="mc9" href="<?php echo base_url(); ?>new_permission/report_permission_projects">
					<i class="fa fa-users"></i>
					<span>Report Permssion Projects</span>
					</a>
					</li> -->
                            <li>
                                <a id="mc10" href="<?php echo base_url(); ?>data_master/master_job_type">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Business Job Type</span>
                                </a>
                            </li>
                            <li>
                                <a id="mc11" href="<?php echo base_url(); ?>data_master/cost_type">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Cost Type</span>
                                </a>
                            </li>
                            <li>
                                <a id="mc12" href="<?php echo base_url(); ?>data_master/setup_runnumber">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Running</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li id="mcc" class="nav_ms">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/control.png">
                            <span>Master Cost Control (CC)</span>
                        </a>
                        <ul>
                            <li>
                                <a id="mcc1" href="<?php echo base_url(); ?>data_master/setupcostcode_main">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup CostCode</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li id="mpr" class="nav_ms">
                        <a id="mpr1" href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/pr.png">
                            <span>Master Purchase Requisition</span>
                        </a>
                    </li> -->
                    <li id="mpo" class="nav_ms">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/po.png">
                            <span>Master Purchase Order</span>
                        </a>
                        <ul>
                            <li>
                                <a id="mpo1" href="<?php echo base_url(); ?>data_master/newmatcode">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Material</span>
                                </a>
                            </li>
                            <li>
                                <a id="mpo2" href="<?php echo base_url(); ?>data_master/setupunit">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Unit</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="mic" class="nav_ms">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/box.png">
                            <span>Master Inventory Control</span>
                        </a>
                        <ul>
                            <li>
                                <a id="mic1" href="<?php echo base_url(); ?>data_master/select_project">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup WareHouse</span>
                                </a>
                            </li>
                            <li>
                                <a id="mic2" href="<?php echo base_url(); ?>data_master/select_project_type">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Type</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a id="mic3" href="<?php echo base_url(); ?>inventory_area/area">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Area</span>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                    <li id="mfa" class="nav_ms">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/count.png">
                            <span>Master Fix Asset (FA)</span>
                        </a>
                        <ul>
                            <li>
                                <a id="mfa1" href="<?php echo base_url(); ?>inventory_area/depreciation">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Depreciation Method</span>
                                </a>
                            </li>
                            <li>
                                <a id="mfa2" href="<?php echo base_url(); ?>inventory_area/assettype">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Asset Type</span>
                                </a>
                            </li>
                            <li>
                                <a id="mfa3" href="<?php echo base_url(); ?>inventory_area/assetexpensetype">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Asset Expense Type</span>
                                </a>
                            </li>
                            <li>
                                <a id="mfa4" href="<?php echo base_url(); ?>inventory_area/assetlocation">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Asset Location</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="ma" class="nav_ms">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/billing.png">
                            <span>Master Account (AC)</span>
                        </a>
                        <ul>
                            <li>
                                <a id="mc2" href="<?php echo base_url(); ?>syscode" type="button">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup System Default</span>
                                </a>
                            </li>
                            <li>
                                <a id="mc12" href="<?php echo base_url(); ?>data_master/currency">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Currency</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a id="mc13" href="<?php echo base_url(); ?>datastore/set_tax">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup TAX</span>
                                </a>
                            </li> -->
                            <li>
                                <a id="mc14" href="<?php echo base_url(); ?>data_master/add_bank_mester">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Bank</span>
                                </a>
                            </li>
                            <li>
                                <a id="mc15" href="<?php echo base_url(); ?>data_master/add_paid_mester">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Paid</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma1" href="<?php echo base_url(); ?>data_master/new_bank">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Account Bank</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma2" href="<?php echo base_url(); ?>data_master/accchart_list">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Account Chart</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma3" href="<?php echo base_url(); ?>data_master/ar_option">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Option Type</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma4" href="<?php echo base_url(); ?>contract/wt_contract">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup W/T</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma5" href="<?php echo base_url(); ?>data_master/vender_list">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Vender / Sub</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma6" href="<?php echo base_url(); ?>data_master/expensother">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Expens</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma7" href="<?php echo base_url(); ?>ap/lessother">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Less Other</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma8" href="<?php echo base_url(); ?>data_master/setup_debtor">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Owner / Customer</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a id="ma9" href="#">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Owner / Customer</span>
                                </a>
                            </li> -->
                            <li>
                                <a id="ma10" href="<?php echo base_url(); ?>gl/gl_bookaccount">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Account Book</span>
                                </a>
                            </li>
                            <li>
                                <a id="ma11" href="<?php echo base_url(); ?>gl/gl_accountperiod">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Setup Period Account</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div id="footer"></div>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>


<script type="text/javascript">
$('#mc').css('background-color', '#00aeef');
$('#mc').css('color', '#FFFFFF');
</script>