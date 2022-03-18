<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class module_m extends CI_Model {
	
	public function __construct() {
            parent::__construct();
           
    }
    public function get_all_permission($username = null){
			if($username != null){
				$modules = $this->get_all_module();
				$array_module = array();
				$permission_system = array();
				foreach ($modules as $key => $module) {
					$sub_modules =  $this->get_module_by_id($module["module_id"]);
					foreach ($sub_modules as $key => $sub_module) {

	          					//get read and write by user name
	          					$this->db->select(
	          						["read","write"]
	          					);
	          					$where_array = array(
	          						"ref_username" => $username,
	          						"ref_module_id" => $module["module_id"],
	          						 "ref_sub_module" => $sub_module["sub_module_id"]
	          					);
	          					$this->db->where($where_array);
	          					$query = $this->db->get("member_permission");
	          					$res_data = $query->result_array();
	          					$read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
	          					$write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";
	          					
					          	$permission_system[$module["module_name"]][$sub_module["sub_module_id"]] =  array(
					          		//"ref_module_id" => $sub_module["ref_module"],
									//"sub_module_id" => $sub_module["sub_module_id"],
									"read" => $read	,
									"write" =>$write

					          	);

					    }// loop 1.1	

				}

				return $permission_system;
			}else{

			}

		}


	public function get_all_module(){
		 	$this->db->select('*');
	        $this->db->from('module_header');
	       	$query = $this->db->get();

	       	$res = $query->result_array();

	       	return $res ;

	       	

	}

	public function get_module_by_id($id_module){
		$this->db->select('*');
        $this->db->from('module_detail');
        $this->db->where("ref_module",$id_module);
       	$query = $this->db->get();

       	$res = $query->result_array();
       	return $res;

	}

	public function check_module_and_create_permission($username = null , $module_id  = null, $sub_module_id = null){
		if($username!=null && $module_id !=null && $sub_module_id != null){
				$this->db->where("ref_username",$username);
				$this->db->where("ref_module_id",$module_id);
				$this->db->where("ref_sub_module",$sub_module_id);
				$query = $this->db->get("member_permission");
		        $num_row = $query->num_rows();
		        
		        if($num_row == 0){
		        	$data = array(
		        		"ref_username" =>$username,
		        		"ref_module_id" =>$module_id,
		        		"ref_sub_module" =>$sub_module_id
		        	);
		        	$res = $this->db->insert("member_permission",$data);
		        	if($res){
		        		return true;
		        	}else{
		        		return false;
		        	}
		        }else{
		        	return true;
		        }
		}else{
			return false;
		}


	}

	public function get_info_user($username = null){
		$this->db->select("m_name");
		$this->db->where("m_user",$username);
		$query = $this->db->get("member");
		$res = $query->result_array();
		return 	$res[0];	

	}

}

/* End of file module_m.php */
/* Location: ./application/models/module_m.php */

