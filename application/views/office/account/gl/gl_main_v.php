<style type="text/css" media="screen">
	.sidebar-category {
		padding-top: 50px;
	}
</style>
<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 7;
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
							<b>General Vouncher</b>
						</h5>
					</span>
					<ul class="icons-list">
						<li>
							<a href="#" data-action="collapse"></a>
						</li>
					</ul>
				</div>
				<ul class="navigation navigation-main navigation-accordion sidebar-default">

					<li id="journal">
						<a href="<?php echo base_url(); ?>gl/journalvocher">
							<i class="icon-radio-unchecked"></i>
							<span>Journal Voucher</span>
						</a>
					</li>
					<!-- <li id="journal">
						<a href="<?php echo base_url(); ?>gl/show_post_v">
							<i class="icon-radio-unchecked"></i>
							<span>Archive Post</span>
						</a>
					</li> -->
					<li id="general">
						<a href="<?php echo base_url(); ?>gl_tran/gl_ledger">
							<i class="icon-radio-unchecked"></i>
							<span>General Ledger Posting</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>gl_tran/report_vocher">
							<i class="icon-radio-unchecked"></i>
							<span>Report</span>
						</a>
					</li>

					<!-- <li id="">
            <a href="<?php echo base_url(); ?>gl/jourvou">
					<i class="icon-radio-unchecked"></i>
					<span>Journal Voucher (New)</span>
					</a>
					</li> -->

					<li id="">
						<a href="<?php echo base_url(); ?>gl/other_module">
							<i class="icon-radio-unchecked"></i>
							<span>Voucher from Other Module</span>
						</a>
					</li>

				</ul>
			</div>
		</div>
		<!-- /main navigation -->
	</div>
</div>


<script type="text/javascript">
	$('#gl').css('background-color', '#00aeef');
	$('#gl').css('color', '#FFFFFF');
</script>
<!-- Actions -->
<!-- <div class="sidebar-category">
            <div class="category-title">
              <span>Transaction</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse" class=""></a></li>
              </ul>
            </div>

            <div class="category-content" style="display: block;">
              <div class="row row-condensed">
                  <a href="<?php echo base_url(); ?>panel/officemanage" type="button" class="preload btn bg-warning btn-block btn-float btn-float-lg">
<i class="icon-home"></i>
<span>Dashboard</span>
</a>
<?php if($permission["General Ledger System"][60]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl/journalvocher" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-file-plus"></i>
	<span>Journal Vocher</span>
</a>
<a href="<?php echo base_url(); ?>gl_tran/gl_ledger" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-file-plus"></i>
	<span>General Ledger Posting</span>
</a>
<?php } ?>-->
<!-- 
                  <?php if($permission["General Ledger System"][58]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl_tran/journal_vocher" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-file-plus"></i>
	<span>Journal Vocher</span>
</a>
<?php } ?>-->

<!-- <?php if($permission["General Ledger System"][59]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl_tran/genalral_ledger_posting" type="button"
 class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-archive"></i>
	<span>General Ledger Posting</span>
</a>
<?php } ?>-->



<!-- <?php if($permission["General Ledger System"][61]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl_tran/print_vocher" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-file-plus"></i>
	<span>Print Journal Vocher </span>
</a>
<?php } ?>-->

<!--   <?php if($permission["General Ledger System"][62]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl_tran/report_vocher" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-file-plus"></i>
	<span>Report </span>
</a>
<?php } ?>

</div>

</div>
</div> -->
<!-- <div class="sidebar-category">
            <div class="category-title">
              <span>Master</span>
              <ul class="icons-list">
                <li><a href="#" data-action="collapse" class=""></a></li>
              </ul>
            </div>

            <div class="category-content" style="display: block;">
              <div class="row row-condensed">

              <?php if($permission["General Ledger System"][63]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl/Create_Department" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-file-plus"></i>
	<span>Setup Department</span>
</a>
<?php } ?>

<?php if($permission["General Ledger System"][64]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl/Account_Period_Setup" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-archive"></i>
	<span>Account_Period_Setup</span>
</a>
<?php } ?>-->
<!-- 
                <?php if($permission["General Ledger System"][65]["read"] == 1){?>
<a href="<?php echo base_url(); ?>gl/BookAccountDATA" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg">
	<i class="icon-file-plus"></i>
	<span>book ac</span>
</a>
<?php } ?>-->

<!--   <a href="http://www.demo2.cloudmeka.com/data_master/setupunit" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-file-plus"></i> <span>Setup Unit</span></a>
                  <a href="http://www.demo2.cloudmeka.com/index.php/data_master/setupcostcode" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-stats-bars"></i> <span>Setup CostCode</span></a>
                  <a href="http://www.demo2.cloudmeka.com/data_master/setupemployee" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="fa fa-users" aria-hidden="true"></i> <span>Setup Employee</span></a>
                  <a href="http://www.demo2.cloudmeka.com/index.php/pr/archive_pr" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg disabled"><i class="icon-archive"></i> <span>Setup Company</span></a>
                  <a href="http://www.demo2.cloudmeka.com/index.php/data_master/setup_permision" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="icon-archive"></i> <span>Setup Permission</span></a>

              </div>

            </div>
          </div> 
           actions


          Navigation

          navigation -->

<!--  div> -->
<!-- </div> -->