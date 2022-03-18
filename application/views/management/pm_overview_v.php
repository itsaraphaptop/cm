<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 6;
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
<div class="content-wrapper containerbox">
<div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h2>Project Management</h2>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
              <li class="active">Project Management</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>

        
  <div class="content">


          <?php if($permission["Project Report"][145]["read"] == 1){ ?>
          <div class="col-lg-2">
            <button type="button" class="btn btn-primary btn-block btn-icon btn-rounded  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="icon-stats-bars"></i> <span>Transaction</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="<?php echo base_url(); ?>index.php/management/ProjectForecastIncome"><i class="icon-gear"></i>Project Forecast Income</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/management/ProgressSubmit"><i class="icon-gear"></i>Progress Submit</a></li>
              <li><hr></li>
              <li><a href="<?php echo base_url(); ?>index.php/management/project_budget"><i class="icon-gear"></i>Project Budget</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/management/approveproject_budget"><i class="icon-gear"></i>Approve Project Budget</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/management/ViewReviseProjectBudget"><i class="icon-gear"></i>View Revise Project Budget</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/management/forcasrselect"><i class="icon-gear"></i>Project Cost Control(Forecast Budget)</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/management/ProjectForecastMonthly"><i class="icon-gear"></i>Project Forecast Monthly</a></li>
              <li><hr></li>
             <!--  <li><a href="<?php echo base_url(); ?>index.php/management/DepartmentBudget"><i class="icon-gear"></i>Department Budget</a></li> -->
            </ul>
          </div>
          <?php } ?>

          <?php if($permission["Project Report"][146]["read"] == 1){ ?>
          <div class="col-lg-2">
            <button type="button" class="btn bg-info-400 btn-block btn-icon btn-rounded  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="icon-flip-vertical2"></i> <span>Inquiry</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href=""><i class="icon-gear"></i>Project Control Management ></a></li>
              <li><a href="<?php echo base_url(); ?>index.php/management/back_management"><i class="icon-gear"></i>Bank Account Management</a></li>
              <li><a href=""><i class="icon-gear"></i>Head Office Expense Management</a></li>
              <li><a href=""><i class="icon-gear"></i>Project Material Management ></a></li>
              <li><hr></li>
              <li><a href="<?php echo base_url(); ?>accdoc/show_accdoc"><i class="icon-gear"></i>Sammary Account Document</a></li>
              <li><hr></li>
              <li><a href=""><i class="icon-gear"></i>Search Material Price for P/O</a></li>
              <li><a href=""><i class="icon-gear"></i>Real Esteat Management</a></li>
            </ul>
          </div>
          <?php } ?>

          <?php if($permission["Project Report"][147]["read"] == 1){ ?>
          <div class="col-lg-2">
            <button type="button" class="btn bg-warning-400 btn-block btn-icon btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="icon-file-empty"></i> <span>Report</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href=""><i class="icon-gear"></i>Actual Cost ></a></li>
              <li><a href=""><i class="icon-gear"></i>Purchase Cost ></a></li>
              <li><a href=""><i class="icon-gear"></i>Summary Cost Report</a></li>
              <li><a href=""><i class="icon-gear"></i>Project Cash Flow</a></li>
              <li><a href=""><i class="icon-gear"></i>Forcast Project Cash Flow By Account Basis</a></li>
            </ul>
          </div>
          <?php } ?>
  </div>

  
</div>



