<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_modal extends CI_Model {

	public function __construct() {
		parent::__construct();
		//Do your magic here
	}

	public function login_app_m($user = null, $pass = null) {
		$path_img = $this->config->item('path_img');
		$this->db->select("*");
		$this->db->from("member");
		$this->db->where([
			"m_user" => $user,
			"m_pass" => sha1(sha1(md5($pass))),
		]);

		$return = array();
		$return["status"] = true;
		$return["message"] = "";
		$return["data"] = array();
		$this->db->limit(1);
		$query = $this->db->get();
		$row = $query->num_rows();
		$res = $query->result_array();

		$status_permis_pr = false;
		$status_permis_po = false;
		if ($row == 1) {
			$res[0]["uimg"] = base_url() . $path_img . $res[0]['uimg'];

			// permission approve PR
			$this->db->select("member_permission.read");
			$this->db->from("member_permission");
			$this->db->where("member_permission.ref_module_id",1);
			$this->db->where("member_permission.ref_sub_module",4);
			$this->db->where("member_permission.ref_username ",$user);
			$this->db->limit(1);

			$res_approve_pr = $this->db->get()->result_array();
			$status_approve = array();
			if(isset($res_approve_pr[0])){
				
				if($res_approve_pr[0]["read"] == 1){
					$status_permis_pr = true;
				}
			}


			// permission approve PO
			$this->db->select("member_permission.read");
			$this->db->from("member_permission");
			$this->db->where("member_permission.ref_module_id",2);
			$this->db->where("member_permission.ref_sub_module",9);
			$this->db->where("member_permission.ref_username ",$user);
			$this->db->limit(1);

			$res_approve_po = $this->db->get()->result_array();
			
			if(isset($res_approve_po[0])){
				$status_approve[] = $res_approve_po[0]["read"];

				if($res_approve_po[0]["read"] == 1){
					$status_permis_po = true;
				}
			}		
			$res[0]["permission"] = array(
					"approve"=>
							array(
							"pr"=>$status_permis_pr,
							"po"=>$status_permis_po
					),
					"ic"=>true);

			$return["data"] = $res;
		} else {
			$return["status"] = false;
			$return["message"] = "";

		}

		return $return;

	}

	public function get_notify_m($user_id = null, $user_code = null) {

		// init val
		$num_item_pr = 0;
		$num_item_po = 0;
		
		//pr
		$this->db->distinct("project.project_id");
		// $this->db->select("count(*) as num_pr");
		$this->db->select("project.project_name as project_name");
		// $this->db->select("count(project.project_name) as num_pr");
		$this->db->from("approve_pr");
		$this->db->join("pr", "approve_pr.app_pr = pr.pr_prno");
		$this->db->join("project", "pr.pr_project = project.project_id");
		$this->db->where_in("pr.pr_approve", ["wait", "no"]);
		$this->db->where("approve_pr.app_midid", $user_id);
		$num_item_pr = count($this->db->get()->result_array());
		//$num_item_pr = $this->db->get()->result_array();
		//var_dump($num_item_pr);
		
		//pr

		// po
		$this->db->distinct("project.project_id");
		// $this->db->select("count(*) as num_po");
		$this->db->select("project.project_name as project_name");

		$this->db->from("approve_po");
		$this->db->join("po", "approve_po.app_pr = po.po_pono");
		$this->db->join("project", "po.po_project = project.project_id");
		$this->db->where_in("po.po_approve", ["wait", "no"]);
		$this->db->where("approve_po.app_midid", $user_id);
		$num_item_po = count($this->db->get()->result_array());
		// po

		$array_count_noit["approve"] = array("pr"=>$num_item_pr,"po"=>$num_item_po);		
		$array_count_noit["ic"] = 0;
		return $array_count_noit;
	}


	public function get_list_approve_m($m_id,$m_code,$type,$project_id = null){

		
		if($type == "pr"){

			//PR
			$this->db->select("app_pr,app_project,project_name,creatuser,creatudate");
			$this->db->from("approve_pr");
			$this->db->join("pr", "approve_pr.app_pr = pr.pr_prno");
			$this->db->join("project", "pr.pr_project = project.project_id");
			$this->db->where_in("pr.pr_approve", ["wait", "no"]);
			$this->db->where("approve_pr.app_midid",$m_id);
			$this->db->where("pr.pr_project",$project_id);
			$_item_pr = $this->db->get()->result_array();
			foreach ($_item_pr as $key => $value) {
				$_item_pr[$key]["type"] = $type;
			}

			return $_item_pr;
		
		}elseif($type == "po"){

			//PO		
			$this->db->select("app_pr,app_project,project_name,creatuser,creatudate");
			$this->db->from("approve_po");
			$this->db->join("po", "approve_po.app_pr = po.po_pono");
			$this->db->join("project", "po.po_project = project.project_id");
			$this->db->where_in("po.po_approve", ["wait", "no"]);
			$this->db->where("approve_po.app_midid", $m_id);
			$this->db->where("po.po_project",$project_id);
			$_item_po = $this->db->get()->result_array();

			foreach ($_item_po as $key => $value) {
				$_item_po[$key]["type"] = $type;
			}
			return $_item_po;
		}else{

			return false;
		}
	}

	public function get_list_project_m($m_id,$type){
		if($type == "pr"){
			//pr
			$this->db->distinct("project.project_id");
			$this->db->select("project_id, project_code, project_name");
			$this->db->from("approve_pr");
			$this->db->join("pr", "approve_pr.app_pr = pr.pr_prno");
			$this->db->join("project", "pr.pr_project = project.project_id");
			$this->db->where_in("pr.pr_approve", ["wait", "no"]);
			$this->db->where("approve_pr.app_midid", $m_id);
			$num_item_pr = $this->db->get()->result_array();

			
			foreach ($num_item_pr as $key => $item) {
				$num_item_pr[$key]["count_doc"] = count($this->get_list_approve_m($m_id,null,$type,$item["project_id"]));				
			}
			//pr
			return $num_item_pr;
		}elseif ($type == "po") {
			
			// po
			$this->db->distinct("project.project_id");
			$this->db->select("project_id, project_code, project_name");
			$this->db->from("approve_po");
			$this->db->join("po", "approve_po.app_pr = po.po_pono");
			$this->db->join("project", "po.po_project = project.project_id");
			$this->db->where_in("po.po_approve", ["wait", "no"]);
			$this->db->where("approve_po.app_midid", $m_id);
			$num_item_po = $this->db->get()->result_array();

			foreach ($num_item_po as $key => $item) {
				$num_item_po[$key]["count_doc"] = count($this->get_list_approve_m($m_id,null,$type,$item["project_id"]));				
			}
			// po
			return $num_item_po;
		}else{
			return false;
		}

	}

	  public function project_list_permission_m($m_id = null){

        
        $this->db->select('project_name,project_ic.project_status as pstatus,m_id,project.project_id as pid');
        $this->db->from('project');
        $this->db->join('project_ic', 'project_ic.project_id = project.project_id');
        $this->db->join('member', 'member.m_id = project_ic.proj_user');
        $this->db->where('proj_user', $m_id);

        //permission  project_status = Y
        $this->db->where("project_ic.project_status","Y");

        $res = $this->db->get()->result_array();
       return $res;
      
    }

    public function po_wait_po_receive($project_id = null){  

        $this->db->select("*");
        $this->db->from("po");
        $this->db->where("po_project",$project_id);
        $this->db->where("po_approve","approve");
        $this->db->where("ic_status","wait");
        $query_po = $this->db->get()->result();
        return $query_po;
              
	}
	
	public function po_wait_ic_receive($project_id = null){  
		
		$this->db->select("*");
		$this->db->from("receive_po");
		$this->db->where("project",$project_id);
		$query_ic = $this->db->get()->result();
	    return $query_ic;
					  
	}
}

/* End of file app_modal.php */
/* Location: ./application/models/app_modal.php */