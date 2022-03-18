<style type="text/css" media="screen">
	.sidebar-category {
		padding-top: 50px;
	}
	.navigation {
        font-size: 11px;
    }
	#footer {
		padding-bottom: 6vh;
	}
</style>
<?php
$session_data = $this->session->userdata('sessed_in');
$id_module = 2;
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
						<h5>
							<b>PO PURCHASE</b>
						</h5>
					</span>
					<ul class="icons-list">
						<li>
							<a href="#" data-action="collapse"></a>
						</li>
					</ul>
				</div>
				<ul class="navigation navigation-main navigation-accordion sidebar-default">

					<li id="po_purchase">
						<a href="#">
							<img src="<?php echo base_url(); ?>icon_cm/po.png">
							<span>Purchase Order</span>
						</a>
						<ul>
							<li>
								<a id="new_po" href="<?php echo base_url(); ?>purchase/opencreatepo">
									<i class="icon-radio-unchecked"></i>
									<span>New PO</span>
								</a>
							</li>
							<li>
								<a id="archive_po" href="<?php echo base_url(); ?>purchase/openproject/poarchive">
									<i class="icon-radio-unchecked"></i>
									<span>PO Archive</span>
								</a>
							</li>
							<li>
								<a id="report_po" href="<?php echo base_url(); ?>purchase_report">
									<i class="icon-radio-unchecked"></i>
									<span>Report</span>
								</a>
							</li>
							<li>
								<a id="approve_po" href="<?php echo base_url(); ?>purchase/po_approve">
									<i class="icon-radio-unchecked"></i>
									<span>Approve</span>
								</a>
							</li>
							<li>
								<a id="decrement_po" href="<?php echo base_url(); ?>po_decrement">
									<i class="icon-radio-unchecked"></i>
									<span>PO Decrement</span>
								</a>
							</li>
							<!-- <li>
								<a id="revise_po" href="<?php echo base_url(); ?>po_decrement/revise">
									<i class="icon-radio-unchecked"></i>
									<span>PO Revise</span>
								</a>
							</li> -->

							<!-- <li>
								<a href="<?php echo base_url(); ?>inventory/receive_po_list_all">
									<i class="icon-radio-unchecked"></i> PO Receive And Return</a>
							</li> -->

                            <li id="compare">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Compare</span>
                                </a>
                                <ul>
									<li>
										<a id="new_rq" href="<?php echo base_url(); ?>purchase/pr_open_project/rq">
											<span>Requistion Quatation</span>
										</a>
									</li>
									<li>
										<a id="archive_rq" href="<?php echo base_url(); ?>purchase/openproject/rq" type="button">
											<span>Requistion Quatation Archive</span>
										</a>
									</li>
									<li>
										<a id="new_compare" href="<?php echo base_url(); ?>purchase/pr_open_project/cp">
											<span>Compare Price</span>
										</a>
									</li>
									<!-- <li>
										<a id="archive_compare" href="<?php echo base_url(); ?>purchase/openproject/compare" type="button">
											<span>Compare Price Archive</span>
										</a>
									</li> -->
								</ul>
							</li>
						</ul>
					</li>
					<!-- <li id="wo">
						<a href="#">
							<img src="<?php echo base_url(); ?>icon_cm/wo.png">
							<span>Work Order</span>
						</a>
						<ul>
							<li>
								<a id="new_wo" href="<?php echo base_url(); ?>contract/newcontract">
									<i class="icon-radio-unchecked"></i>
									<span>New Work Order</span>
								</a>
							</li>
							<li>
								<a id="archive_wo" href="<?php echo base_url(); ?>contract/openproject">
									<i class="icon-radio-unchecked"></i>
									<span>Work Order Archive</span>
								</a>
							</li>
							<li>
								<a id="dec_wo" href="<?php echo base_url(); ?>wo">
									<i class="icon-radio-unchecked"></i>
									<span>WO Decrement</span>
								</a>
							</li>
							<li>
								<a id="report_wo" href="<?php echo base_url(); ?>purchase_report">
									<i class="icon-radio-unchecked"></i>
									<span>Report</span>
								</a>
							</li>
							<li>
								<a id="approve_wo" href="<?php echo base_url(); ?>contract/newapprovecontract">
									<i class="icon-radio-unchecked"></i>
									<span>Approve Work Order</span>
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
	$('#po').css('background-color', '#00aeef');
	$('#po').css('color', '#FFFFFF');
</script>