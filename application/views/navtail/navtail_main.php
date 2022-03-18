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


<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default" style="z-index: 1032;">
  <div class="sidebar-content">
    <!-- Main navigation -->
    <div class="scroll_fixed foo" id="footside">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center"><a href="<?=base_url();?>calender"><img src="<?=base_url();?>icon_cm/calendar.png"><span class="badge bg-danger" style="background-color:#f4e536;margin-left:-10px;padding-top:-10px;color:#333333;">0</span></a></div>
      <div class="dropup col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center">
        
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?=base_url();?>icon_cm/file.png">
      </a>
        <ul class="dropdown-menu">
          <li><a href="<?=base_url();?>tasklist">Task list Management</a></li>
          <li><a href="<?=base_url();?>project_control">Project Control</a></li>
          <li><a href="<?=base_url();?>tasklist/data_vault">Data vault</a></li>
        </ul>

    </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center"><a href="<?=base_url();?>"><img src="<?=base_url();?>icon_cm/dot.png"></a></div>
    </div>
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <div class="category-title">
          <span><h5><b>Process Cost Control</b></h5></span>
          <ul class="icons-list">
            <li><a href="#" data-action="collapse"></a></li>
          </ul>
        </div>
        <ul class="navigation navigation-main navigation-accordion sidebar-default">
          <li>
            <a href="#"><i class="icon-stack2"></i> <span>Process Quantity Surveyor</span></a>
            <ul>
              <li><a href="<?=base_url(); ?>">Tender Information</a></li>
              <li><a href="<?=base_url(); ?>">List ofTender Information</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="icon-copy"></i> <span>Process Quantity Surveyor</span></a>
            <ul>
              <li><a href="<?=base_url(); ?>">Import BOQ</a></li>
              <li><a href="<?=base_url(); ?>">List Import BOQ</a></li>
            </ul>
          </li>
<!--           <li style="margin-top: 59vh;" id="footside">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center"><a href="<?=base_url();?>calender"><img src="<?=base_url();?>icon_cm/calendar.png"></a></div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center"><a href="<?=base_url();?>tasklist"><img src="<?=base_url();?>icon_cm/file.png"></a></div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align="center"><a href="<?=base_url();?>"><img src="<?=base_url();?>icon_cm/dot.png"></a></div>
          </li> -->
          <!-- <li> -->
            
          <!-- </li> -->
        </ul>
      </div>
    </div>
    <!-- /main navigation -->
  </div>
</div>
<!-- /main sidebar -->


<script type="text/javascript">

//   var leftInit = $(".scroll_fixed").offset().left;

// $(window).scroll(function(event) {
//     var x = 0 - $(this).scrollLeft();
    
//     $(".scroll_fixed").offset({
//         left: x + leftInit
//     });
    
</script>



