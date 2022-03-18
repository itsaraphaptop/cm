<style type="text/css" media="screen">
    .navigation {
        font-size: 11px;
    }

    .sidebar-category {
        padding-top: 50px;
    }
</style>
<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 4;
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
                            <b>Inventory Management</b>
                        </h5>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">

                    <li id="imp">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/box.png">
                            <span>Inventory Management</span>
                        </a>
                        <ul>
                            <li id="goods_receive">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>PO Receive</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_sub1" href="<?php echo base_url(); ?>inventory/openreceive/po">
                                            </i>
                                            <span>PO Receive</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub2" href="<?php echo base_url(); ?>inventory/openreceive/archivepo">
                                            <span>Archive PO Receive</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li id="inventory_receive">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>IC Receive</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_sub3" href="<?php echo base_url(); ?>inventory/openreceive/n">
                                            <span>IC Receive</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub4" href="<?php echo base_url(); ?>inventory/openreceive/a">
                                            <span>Archive IC Receive</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li id="receive_ohter">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Receive Other</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_sub13" href="<?php echo base_url(); ?>inventory/openreceipt/n">
                                            </i>
                                            <span>Receive Other</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub14" href="<?php echo base_url(); ?>inventory/openreceipt/t">
                                            <span>Archive Receive Other</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub15" href="<?php echo base_url(); ?>inventory/openreceipt/a">
                                            <span>Approve Receive Other</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li id="reservation">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Boooking</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_sub5" href="<?php echo base_url(); ?>inventory/open_booking/open">
                                            <span>Boooking</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub6" href="<?php echo base_url(); ?>inventory/document_issue_archive/u">
                                            <span>Archive Boooking</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub13" href="<?php echo base_url(); ?>inventory/open_booking/app">
                                            <span>Approve Boooking</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- <li id="trading">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Trading</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_trading_7" href="<?php echo base_url(); ?>inventory/main_trading_project">
                                            <span>Trading</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_trading_8" href="<?php echo base_url(); ?>inventory/document_issue_archive/t">
                                            <span>Archive Trading</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->

                            <li id="issue">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Issue</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_sub7" href="<?php echo base_url(); ?>inventory/main_issue_project">
                                            <span>Issue</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub8" href="<?php echo base_url(); ?>inventory/document_issue_archive/b">
                                            <span>Archive Issue</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li id="materials">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Transfer</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_sub9" href="<?php echo base_url(); ?>inventory/open_transfer/open">
                                            <span>Transfer</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub10" href="<?php echo base_url(); ?>inventory/archive_edit_transfer_store">
                                            <span>Archive Transfer </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub101" href="<?php echo base_url(); ?>inventory/open_transfer_approve/open">
                                            <span>Approve Transfer </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li id="receive">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Receive Transfer</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="imp_sub11" href="<?php echo base_url(); ?>inventory/archive_transfer_store">
                                            <span>Receive Transfer</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="imp_sub12" href="<?php echo base_url(); ?>inventory/archive_receive_transfer_store">
                                            <span>Archive Receive Transfer</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <!--   <li>
                    <a href="#"><img src="<?php echo base_url(); ?>icon_cm/setup.png">
					<span>Adjust Inventory Management</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>inventory/pro_return_ic">
								<i class="icon-radio-unchecked"></i>
								<span>Return Inventory from Purchase </span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>inventory/open_booking/list">
								<i class="icon-radio-unchecked"></i>
								<span>Return Boooking Documents</span>
							</a>
						</li>
					</ul>
					</li> -->
                    <li id="report">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>icon_cm/report.png">
                            <span>Inventory Report</span>
                        </a>
                        <ul>
                            <!-- <li>
                                <a href="#" class="has-ul">
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Inventory Management Report</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url(); ?>inventory/openreceive/archivepo">
                                            <i class="icon-file-text"></i>
                                            <span>PO Receive Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>inventory_report/stock_in_v">
                                            <i class="icon-file-text"></i>
                                            <span>IC Receipt Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>inventory/document_issue_archive/u">
                                            <i class=" icon-file-minus2"></i>
                                            <span>Boooking Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>inventory_report/stock_out_v">
                                            <i class=" icon-file-minus2"></i>
                                            <span>Issue Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>inventory/archive_edit_transfer_store">
                                            <i class=" icon-file-text"></i>
                                            <span>Transfer Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class=" icon-file-text"></i>
                                            <span>Receive Transfer Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>inventory/retrive_transfer_store/all">
                                            <i class=" icon-file-text"></i>
                                            <span>Inventory for Transfer</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->

                            <li id="icreport">
                                <a>
                                    <i class="icon-radio-unchecked"></i>
                                    <span>Inventory Report</span>
                                </a>
                                <ul>
                                    <li>
                                        <a id="reportstoccard" href="<?php echo base_url(); ?>inventory_report/stock_card_v">
                                            <i class="icon-file-text"></i>
                                            <span>Report Stock Card</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="stockbalance" href="<?php echo base_url(); ?>inventory_report/stock_balance_view">
                                            <i class="icon-file-text"></i>
                                            <span>Report Stock Balance</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="stockaudit" href="<?php echo base_url(); ?>inventory_report/store_report_view">
                                            <i class="icon-file-text"></i>
                                            <span>Stock Store Audit Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="stockcostall" href="<?php echo base_url(); ?>inventory_report/stock_cost_view" title="Stock Cost All Project">
                                            <i class="icon-file-text"></i>
                                            <span>Report Stock Cost All Project</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>

















<!-- Secondary sidebar -->
<!--   <div class="sidebar sidebar-secondary sidebar-default">
        <div class="sidebar-content"> -->

<!-- Actions -->
<!-- <div class="sidebar-category">
            <div class="category-title">
              <span>Inventory Control</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse"></a></li>
              </ul>
            </div>
             <div class="category-content">
            <div class="row row-condensed">
			<div class="col-xs-6">
	              	<a href="<?php echo base_url(); ?>panel/officemanage" type="button" class="preload btn bg-warning btn-block btn-float btn-float-lg">
<i class="glyphicon glyphicon-dashboard"></i>
<span>Dashboard</span>
</a>
</div>
<div class="col-md-6">
	<a href="<?php echo base_url(); ?>inventory/open" type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg">
		<i class="icon-home"></i>
		<span>หน้าหลัก</span>
	</a>
</div>
</div>
</div>
<div class="category-content">
	<div class="row row-condensed">
		<div class="col-xs-6">
			<?php if($permission["Inventory Control"][28]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/openreceive/po" type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-plus"></i>
				<span>ยืนยันการรับของ (PO)</span>
			</a>
			<?php }?>

			<?php if($permission["Inventory Control"][30]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/open_booking/open" type="button"
			 class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-clipboard2"></i>
				<span>บันทึกจองวัสดุ</span>
			</a>
			<?php }?>
		</div>

		<div class="col-xs-6">
			<?php if($permission["Inventory Control"][29]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/openreceive/n" type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-plus"></i>
				<span>รับของเข้าคลัง (IC)</span>
			</a>
			<?php }?>
			<?php if($permission["Inventory Control"][31]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/main_issue_project" type="button"
			 class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class=" icon-file-minus"></i>
				<span>บันทึกเบิกวัสดุ </span>
			</a>
			<?php }?>

		</div>
	</div>
</div>
<div class="category-content">
	<div class="row row-condensed">
		<div class="col-xs-6">
			<?php if($permission["Inventory Control"][33]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/openreceive/archivepo" type="button"
			 class="btn bg-purple-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-text"></i>
				<span>รายการรับวัสดุ (PO)</span>
			</a>
			<?php }?>

			<?php if($permission["Inventory Control"][40]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/document_issue_archive/u" type="button"
			 class="btn bg-purple-400 btn-block btn-float btn-float-lg">
				<i class=" icon-file-minus2"></i>
				<span>รายการจองวัสดุ</span>
			</a>
			<?php }?>

			<?php if($permission["Inventory Control"][32]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/open_booking/list" type="button"
			 class="btn bg-danger btn-block btn-float btn-float-lg">
				<i class="icon-sync"></i>
				<span> คืนจอง (Return)</span>
			</a>
			<?php }?>
		</div>

		<div class="col-xs-6">
			<?php if($permission["Inventory Control"][34]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/openreceive/a" type="button" class="btn bg-purple-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-text"></i>
				<span>รายการรับวัสดุ (IC)</span>
			</a>
			<?php }?>

			<?php if($permission["Inventory Control"][40]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/document_issue_archive/b" type="button"
			 class="btn bg-purple-400 btn-block btn-float btn-float-lg">
				<i class=" icon-file-minus2"></i>
				<span>รายการเบิกวัสดุ</span>
			</a>
			<?php }?>
			<?php if($permission["Inventory Control"][161]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/pro_return_ic" type="button" class="btn bg-danger btn-block btn-float btn-float-lg">
				<i class="icon-sync"></i>
				<span> คืนเบิก (Return IC)</span>
			</a>
			<?php }?>
		</div>
	</div>
</div>



<div class="category-content">
	<div class="row row-condensed">
		<div class="col-xs-6">
			<?php if($permission["Inventory Control"][35]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/open_transfer/open" type="button"
			 class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-upload"></i>
				<span>บันทึกโอนย้าย</span>
			</a>
			<?php }?>

			<?php if($permission["Inventory Control"][37]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/archive_edit_transfer_store" type="button"
			 class="btn bg-purple-300 btn-block btn-float btn-float-lg">
				<i class=" icon-file-text"></i>
				<span>รายการโอนย้ายวัสดุ</span>
			</a>
			<?php }?>
		</div>

		<div class="col-xs-6">
			<?php if($permission["Inventory Control"][36]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/archive_transfer_store" type="button"
			 class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-download"></i>
				<span>รับโอนย้ายวัสดุ</span>
			</a>
			<?php }?>

			<?php if($permission["Inventory Control"][38]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/retrive_transfer_store/all" type="button"
			 class="btn bg-purple-300 btn-block btn-float btn-float-lg">
				<i class=" icon-file-text"></i>
				<span>รายการโอนย้ายทั้งหมด</span>
			</a>
			<?php }?>
		</div>
	</div>
</div>

<div class="category-content">
	<div class="row row-condensed">
		<div class="col-md-6">
			<?php if($permission["Inventory Control"][39]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/stock_menu" type="button" class="preload btn bg-warning btn-block btn-float btn-float-lg">
				<i class="icon-stats-bars"></i>
				<span>Report
					<br>&nbsp;</span>
			</a>
			<?php }?>
		</div>
		<div class="col-md-6">
			<?php if($permission["Inventory Control"][153]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/open_adjust" type="button" class="btn bg-success-400 btn-block btn-float btn-float-lg">
				<i class="icon-reply"></i>
				<span>Adjust Cost
					<br>&nbsp;</span>
			</a>
			<?php }?>
		</div>

	</div>
</div>

<div class="category-content">
	<div class="row row-condensed">
		<div class="col-xs-6">
			<?php if($permission["Inventory Control"][41]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/main_store_list" type="button" class="btn bg-purple-300 btn-block btn-float btn-float-lg">
				<i class="icon-file-text2"></i>
				<span>วัสดุคงคลัง</span>
			</a>
			<?php }?>
		</div>
		<div class="col-xs-6">

			<?php if($permission["Inventory Control"][42]["read"] == 1){?>
			<a href="<?php echo base_url(); ?>inventory/archive_transfer_store" type="button"
			 class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-plus"></i>
				<span>รายงานรายการวัสดุ</span>
			</a>
			<?php }?>
		</div>


	</div>
</div>






</div> -->
<!-- /actions -->
<!-- <br><br>       
          
        </div>
      </div> -->
<!-- /secondary sidebar -->






<script type="text/javascript">
    $('#ic').css('background-color', '#00aeef');
    $('#ic').css('color', '#FFFFFF');
</script>