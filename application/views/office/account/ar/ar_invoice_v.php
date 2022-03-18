<?php 
$session_data = $this->session->userdata('sessed_in');
$id_module = 11;
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
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">ACCOUNT RECEIVABLE (AR)  - ระบบลูกหนี้</span></h4>
      </div>
      <div class="heading-elements"></div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>ar/ar_invoice_v">ใบแจ้งหนี้ ACCOUNT INVOOICE</a></li>
      </ul>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <?php if($permission["Account Receivable"][133]["read"] == 1){?>
      <div class="col-xs-2">
        <a href="<?php echo base_url(); ?>ar/open_invoice_down" type="button" class="preload btn bg-primary btn-block btn-float btn-float-lg"><i class="glyphicon glyphicon-dashboard"></i> <span>ใบแจ้งหนี้ Dowm</span></a>
      </div>
      <?php } ?>
      <?php if($permission["Account Receivable"][134]["read"] == 1){?>
      <div class="col-xs-2">
        <a href="<?php echo base_url(); ?>ar/open_invoice_progress" type="button" class="preload btn bg-warning btn-block btn-float btn-float-lg"><i class="glyphicon glyphicon-dashboard"></i> <span>ใบแจ้งหนี้ Progress</span></a>
      </div>
      <?php } ?>
      <?php if($permission["Account Receivable"][135]["read"] == 1){?>
      <div class="col-xs-2">
        <a href="<?php echo base_url(); ?>ar/open_invoice_retention" type="button" class="preload btn bg-success btn-block btn-float btn-float-lg"><i class="glyphicon glyphicon-dashboard"></i> <span>ใบแจ้งหนี้ Retention</span></a>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

                    

                      
                    
                   
                   