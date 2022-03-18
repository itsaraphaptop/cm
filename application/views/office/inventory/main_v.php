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
<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<div class="heading-elements">
					
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="#">INVENTORY SYSTEM</a></li>
					</div>
				</div>
				<!-- /page header -->
				<div class="content">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
							<?php if($permission["Inventory Control"][28]["read"] == 1){?>
								<a href="<?php echo base_url(); ?>inventory/openreceive/po" class="preload btn bg-info-400 btn-block btn-float btn-float-lg"><b><i class="icon-file-plus"></i></b><span> ยืนยันการรับของ (PO)</span></a>
								<?php }?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<?php if($permission["Inventory Control"][29]["read"] == 1){?>
								<a href="<?php echo base_url(); ?>inventory/openreceive/n" class="btn bg-info-400 btn-block btn-float btn-float-lg"><b><i class="icon-file-plus"></i></b><span> บันทึกรับวัสดุ (IC)</span></a>
							<?php }?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<?php if($permission["Inventory Control"][30]["read"] == 1){?>
								<a href="<?php echo base_url(); ?>inventory/open_booking/open" class="btn bg-info-400 btn-block btn-float btn-float-lg"><b><i class="icon-file-upload"></i></b><span> บันทึกจองวัสดุ</span></a></a>
							<?php }?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<?php if($permission["Inventory Control"][32]["read"] == 1){?>
								<a href="<?php echo base_url(); ?>inventory/open_booking/list" class="btn bg-info-400 btn-block btn-float btn-float-lg"><b><i class="icon-file-upload"></i></b><span> คืนจองวัสดุ</span></a>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
							<?php if($permission["Inventory Control"][31]["read"] == 1){?>
								<a href="<?php echo base_url(); ?>inventory/main_issue_project" class="btn bg-info-400 btn-block btn-float btn-float-lg"><b><i class="icon-file-upload"></i></b><span> บันทึกเบิกวัสดุ</span></a>
								<?php }?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<?php if($permission["Inventory Control"][35]["read"] == 1){?>
								<a href="<?php echo base_url(); ?>inventory/open_transfer/open" class="btn bg-info-400 btn-block btn-float btn-float-lg"><b><i class="icon-file-upload"></i></b><span> บันทึกโอนย้ายวัสดุ</span></a>
								<?php }?>
							</div>
						</div>
					</div>
					
					
				</div><!-- /content area -->
				
</div>


