<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 10;
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
<div class="panel panel-flat border-top-lg border-top-success">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> ACCOUNT PAYABLE (AP) - ระบบเจ้าหนี้</span></h4>
			</div>
			<div class="heading-elements"></div>
		</div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>ar/ap_apv_v">ตั้งเจ้าหนี้ APV </a></li>
			</ul>
		</div>
	</div>
		<div class="content">
			<div class="row">
				<?php if($permission["Account Payable System"][99]["read"] == 1){?>
				<div class="col-xs-2">
					<a href="<?php echo base_url(); ?>ap/ap_main" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="glyphicon glyphicon-dashboard"></i> <span>ตั้งหนี้ร้านค้าตามปกติ</span></a>
				</div>
				<?php } ?>
				<?php if($permission["Account Payable System"][100]["read"] == 1){?>
				<div class="col-xs-2">
					<a href="<?php echo base_url(); ?>ap/ap_main_down" type="button" class="preload btn bg-info btn-block btn-float btn-float-lg"><i class="glyphicon glyphicon-dashboard"></i> <span>ตั้งหนี้เงินจ่ายล่วงหน้า</span></a>
				</div>
				<?php } ?>
				<?php if($permission["Account Payable System"][101]["read"] == 1){?>
				<div class="col-xs-2">
					<a href="<?php echo base_url(); ?>ap/ap_main_reten" type="button" class="preload btn bg-warning btn-block btn-float btn-float-lg"><i class="glyphicon glyphicon-dashboard"></i> <span>ตั้งหนี้เงินประกันสินค้า</span></a>
				</div>
				<?php } ?>
			</div>
		</div>
</div>