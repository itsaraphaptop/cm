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
$id_module = 15;
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
                            <b>Construction Management</b>
                        </h5>
                    </span>
                    <ul class="icons-list">
                        <li>
                            <a href="#" data-action="collapse"></a>
                        </li>
                    </ul>
                </div>
                <ul class="navigation navigation-main navigation-accordion sidebar-default">

                    <li id="overview">
                        <a href="<?php echo base_url(); ?>management/project_status_overview">
                            <img src="<?php echo base_url(); ?>icon_cm/board.png">
                            <span>Project Status Overview</span>
                        </a>
                    </li>

                    <li id="billing">
                        <a href="<?php echo base_url(); ?>management/project_billing">
                            <img src="<?php echo base_url(); ?>icon_cm/billing.png">
                            <span>Project Billing</span>
                        </a>
                    </li>

                    <li id="inventory">
                        <a href="<?php echo base_url(); ?>management/project_inventory">
                            <img src="<?php echo base_url(); ?>icon_cm/cart.png">
                            <span>Project Inventory</span>
                        </a>
                    </li>

                    <li id="bank">
                        <a href="<?php echo base_url(); ?>management/back_management">
                            <img src="<?php echo base_url(); ?>icon_cm/bank.png">
                            <span>Bank account management</span>
                        </a>
                    </li>

                    <li id="material_price">
                        <a href="<?php echo base_url(); ?>management/material_price">
                            <img src="<?php echo base_url(); ?>icon_cm/box.png">
                            <span>Material Price</span>
                        </a>
                    </li>

                    <!--  <li id="setup_expense">
            <a href="<?php echo base_url(); ?>management/setup_expense">
					<img src="<?php echo base_url(); ?>icon_cm/box.png">
					<span>Setup Expense</span>
					</a>
					</li> -->

                    <!-- <li id="tra">
            <a href="#" class="has-ul"><img src="<?php echo base_url(); ?>icon_cm/transaction.png">
					<span>Transaction</span>
					</a>
					<ul>
						<li>
							<a id="tra_sub1" href="<?php echo base_url(); ?>index.php/management/ProjectForecastIncome">
								<i class="icon-file-text"></i>Project Forecast Income</a>
						</li>
						<li>
							<a id="tra_sub2" href="<?php echo base_url(); ?>index.php/management/ProgressSubmit">
								<i class="icon-stack-text"></i>Progress Submit</a>
						</li>
						<li>
							<a id="tra_sub3" href="<?php echo base_url(); ?>index.php/management/project_budget">
								<i class="icon-archive"></i>Project Budget</a>
						</li>
						<li>
							<a id="tra_sub4" href="<?php echo base_url(); ?>index.php/management/approveproject_budget">
								<i class="icon-checkmark-circle2"></i>Approve Project Budget</a>
						</li>
						<li>
							<a id="tra_sub5" href="<?php echo base_url(); ?>index.php/management/ViewReviseProjectBudget">
								<i class="icon-clipboard3"></i>Revise Project Budget</a>
						</li>
						<li>
							<a id="tra_sub6" href="<?php echo base_url(); ?>index.php/management/forcasrselect">
								<i class="icon-cash3"></i>Forecast Budget</a>
						</li>
						<li>
							<a id="tra_sub7" href="<?php echo base_url(); ?>index.php/management/ProjectForecastMonthly">
								<i class="icon-cash4"></i>Project Forecast Monthly</a>
						</li>


					</ul>
					</li> -->
                    <!-- <li id="inq">
                        <a href="#" class="has-ul">
                            <img src="<?php echo base_url(); ?>icon_cm/process.png">
                            <span>Inquiry</span>
                        </a>
                        <ul>
                            <li>
                                <a id="inq_sub1" href="#">
                                    <i class="icon-radio-unchecked"></i>Control Management</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/management/back_management">
							<i class="icon-radio-unchecked"></i>Bank Account Management</a>
					</li>
                            <li>
                                <a id="inq_sub2" href="#">
                                    <i class="icon-radio-unchecked"></i>Expense Management</a>
                            </li>
                            <li>
                                <a id="inq_sub3" href="#">
                                    <i class="icon-radio-unchecked"></i>Material Management</a>
                            </li>
                            <li>
                                <a id="inq_sub4" href="<?php echo base_url(); ?>accdoc/show_accdoc">
                                    <i class="icon-radio-unchecked"></i>Sammary Account</a>
                            </li>
                            <li>
                                <a id="inq_sub5" href="#">
                                    <i class="icon-radio-unchecked"></i>Material Price for P/O</a>
                            </li>
                            <li>
                                <a id="inq_sub6" href="#">
                                    <i class="icon-radio-unchecked"></i>Real Esteat Management</a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="#" class="has-ul">
                            <img src="<?php echo base_url(); ?>icon_cm/report.png">
                            <span>Report</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="icon-radio-unchecked"></i>Actual Cost</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-radio-unchecked"></i>Purchase Cost</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-radio-unchecked"></i>Summary Cost Report</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-radio-unchecked"></i>Project Cash Flow</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-radio-unchecked"></i>Forcast Cash Flow</a>
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
    $('#pm').css('background-color', '#00aeef');
    $('#pm').css('color', '#FFFFFF');
</script>

<!-- <div class="sidebar sidebar-secondary sidebar-default">
        <div class="sidebar-content">
 -->
<!-- Actions -->
<!--  <div class="sidebar-category">
            <div class="category-title">
              <span>PM</span>
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
<div class="col-xs-6">
	<a href="<?php echo base_url(); ?>index.php/management/pm_overview" type="button"
	 class="btn bg-primary btn-block btn-float btn-float-lg">
		<i class="icon-home"></i>
		<span>Home</span>
	</a>
</div>
</div>
</div>

<div class="category-content">
	<div class="row row-condensed">

		<div class="col-xs-6">
			<?php if($permission["Construction Management"][48]["read"] == 1){ ?>
			<a href="<?php echo base_url(); ?>index.php/management/project_status_overview"
			 type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-book-play"></i>
				<span>Project Status Overview</span>
			</a>
			<?php }?>

			<?php if($permission["Construction Management"][50]["read"] == 1){ ?>-->
<!--  <a href="<?php echo base_url(); ?>index.php/management/project_cashflow_account" type="button" class="btn bg-info-400 btn-block btn-float btn-float-lg">
			<i class="icon-newspaper"></i>
			<span>Project Cashflow By account</span>
			</a> -->
<?php }?>


<?php if($permission["Construction Management"][51]["read"] == 1){ ?>
<!-- <a href="<?php echo base_url(); ?>index.php/management/project_cashflow_cash" type="button" class="btn bg-purple-300 btn-block btn-float btn-float-lg">
			<i class="icon-coins"></i>
			<span>Project Cashflow by cash</span>
			</a> -->
<?php }?>

<!--  <?php if($permission["Construction Management"][52]["read"] == 1){ ?>
			<a id="inventory" href="<?php echo base_url(); ?>index.php/management/project_inventory"
			 type="button" class="btn bg-warning-400 btn-block btn-float btn-float-lg">
				<i class="icon-cart5"></i>
				<span>Project Inventory</span>
			</a>
			<script type="text/javascript">
				$("#inventory").click(function() {
							$("html").append('<div class="loading">Loading&#8230;</div>');
							setTimeout(function() {
									$(".loading").remove();
									showCalender("#fullcalendar_AC_B", json_date_income, <?= date('Y-m-d')?>);
									}, 60000);
							});
			</script>
			<?php }?>

		</div>

		<div class="col-xs-6">
			<?php if($permission["Construction Management"][53]["read"] == 1){ ?>
			<a href="<?php echo base_url(); ?>index.php/management/project_billing" class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-certificate"></i>
				<span>Project Billing</span>
			</a>
			<?php }?>

			<?php if($permission["Construction Management"][54]["read"] == 1){ ?>
			<a href="<?php echo base_url(); ?>index.php/management/back_management" type="button"
			 class="btn bg-info-400 btn-block btn-float btn-float-lg">
				<i class="icon-price-tag"></i>
				<span>Bank account management</span>
			</a>
			<?php }?>
			-->
<!--  <?php if($permission["Construction Management"][55]["read"] == 1){ ?>
			<a href="<?php echo base_url(); ?>index.php/management/office_management" type="button"
			 class="btn bg-purple-300 btn-block btn-float btn-float-lg">
				<i class="icon-spinner9"></i>
				<span>Office expense management</span>
			</a>
			<?php }?>-->

<?php if($permission["Construction Management"][56]["read"] == 1){ ?>
<!-- <a href="<?php echo base_url(); ?>index.php/management/real_management" type="button" class="btn bg-purple-300 btn-block btn-float btn-float-lg">
			<i class="icon-library2"></i>
			<span>Real estate management</span>
			</a> -->
<?php }?>

<!--  <?php if($permission["Construction Management"][57]["read"] == 1){ ?>
			<a href="<?php echo base_url(); ?>index.php/management/material_price" type="button"
			 class="btn bg-warning-400 btn-block btn-float btn-float-lg">
				<i class="icon-file-empty"></i>
				<span>Material Price</span>
			</a>
			<?php }?>


		</div>

	</div>
</div>

</div> -->



<!-- /actions -->
<!-- </div>
      </div> -->
<!-- /secondary sidebar -->