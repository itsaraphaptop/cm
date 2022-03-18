<?php defined('BASEPATH') OR exit('No direct script access allowed');

class New_permission extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('module_m');
		$this->load->Model('datastore_m');
	}

	public function index() {
		$permission = $this->module_m->get_permission("ikool009", 2);
		echo "<pre>";
		var_dump($permission);
		//echo "<pre>";
		//$this->module_m->get_all_permission("admin");

		// echo $json;

		// var_dump($array);
	}
	public function get_module_name($module_id = null) {
		$this->db->select(["module_id", 'module_name']);
		if ($module_id != null) {

			$this->db->where("module_id", $module_id);
		}
		$this->db->limit(1);
		$query = $this->db->get('module_header');
		$res = $query->result_array();

		return $res[0]["module_name"];
	}

	public function get_all_module_name() {
		$this->db->select(["module_id", 'module_name']);
		$query = $this->db->get('module_header');
		$res = $query->result_array();

		return $res;
	}

	public function edit_permission($username = null) {
		$session_data = $this->session->userdata('sessed_in');

		if ($username != null) {
			$modules = $this->module_m->get_all_module();
			$array_module = array();
			$permission_system = array();
			$info_user = $this->module_m->get_info_user($username);

			// check init_permission
			//$this->init_permission(null,$username);
			// loop 1 find all module

			foreach ($modules as $key => $module) {
				$sub_modules = $this->module_m->get_module_by_id($module["module_id"]);
				$array_module[] = array(
					"module_id" => $module["module_id"],
					"module_name" => $module["module_name"],
				);
				foreach ($sub_modules as $key => $sub_module) {

					//get read and write by user name
					$this->db->select(
						["read", "write"]
					);
					$where_array = array(
						"ref_username" => $username,
						"ref_module_id" => $module["module_id"],
						"ref_sub_module" => $sub_module["sub_module_id"],
					);
					$this->db->where($where_array);
					$query = $this->db->get("member_permission");
					$res_data = $query->result_array();
					$read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
					$write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";

					$permission_system[$module["module_name"]][$sub_module["sub_module_name"]] = array(
						"ref_module_id" => $sub_module["ref_module"],
						"sub_module_id" => $sub_module["sub_module_id"],
						"read" => $read,
						"write" => $write,

					);

				} // loop 1.1

			} // loop 1

			$data["permission"] = $permission_system;
			$data["array_module"] = $array_module;
			$data['imgu'] = $session_data['img'];
			$data['name'] = $session_data['m_name'];
			$data['user_info'] = $info_user;
			// push $permission_system to view

			$this->load->view('navtail/base_master/header_v');
			$this->load->view('navtail/base_master/tail_v', $data);
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/base/edit_permission', $data, FALSE);

			$this->load->view('navtail/base_master/footer_v');

		} else {
			echo " error : not found username";
		}

	}
	public function edit_permissionnew($username = null) {
		$session_data = $this->session->userdata('sessed_in');

		if ($username != null) {
			$modules = $this->module_m->get_all_module();
			$array_module = array();
			$permission_system = array();
			$info_user = $this->module_m->get_info_user($username);

			// check init_permission
			//$this->init_permission(null,$username);
			// loop 1 find all module

			foreach ($modules as $key => $module) {
				$sub_modules = $this->module_m->get_module_by_id($module["module_id"]);
				$array_module[] = array(
					"module_id" => $module["module_id"],
					"module_name" => $module["module_name"],
				);
				foreach ($sub_modules as $key => $sub_module) {

					//get read and write by user name
					$this->db->select(
						["read", "write"]
					);
					$where_array = array(
						"ref_username" => $username,
						"ref_module_id" => $module["module_id"],
						"ref_sub_module" => $sub_module["sub_module_id"],
					);
					$this->db->where($where_array);
					$query = $this->db->get("member_permission");
					$res_data = $query->result_array();
					$read = (isset($res_data[0]["read"]) == true) ? $res_data[0]["read"] : "N/A";
					$write = (isset($res_data[0]["write"]) == true) ? $res_data[0]["write"] : "N/A";

					$permission_system[$module["module_name"]][$sub_module["sub_module_name"]] = array(
						"ref_module_id" => $sub_module["ref_module"],
						"sub_module_id" => $sub_module["sub_module_id"],
						"read" => $read,
						"write" => $write,

					);

				} // loop 1.1

			} // loop 1

			$data["permission"] = $permission_system;
			$data["array_module"] = $array_module;
			$data['imgu'] = $session_data['img'];
			$data['name'] = $session_data['m_name'];
			$data['user_info'] = $info_user;
			// push $permission_system to view

			$this->load->view('navtail/base_master/header_v');
			// $this->load->view('navtail/base_master/tail_v', $data);
			// $this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/base/edit_permission', $data, FALSE);

			// $this->load->view('navtail/base_master/footer_v');

		} else {
			echo " error : not found username";
		}

	}

	public function update_permission_by_item($username = null) {
		$return = array();
		if ($username != null || $username != "") {
			$type = $this->input->post("type");
			$data = $this->input->post("data");

			if ($type != null || $type != "") {
				$check_found_permission = $this->module_m->check_module_and_create_permission($username, $data["ref_module_id"], $data["ref_sub_module"]);
				if ($check_found_permission) {
					$this->db->where(
						array(
							"ref_module_id" => $data["ref_module_id"],
							"ref_sub_module" => $data["ref_sub_module"],
							"ref_username" => $username,
						)
					);
					$res = $this->db->update("member_permission", array(
						$type => $data["value"],
					)
					);

					if ($res) {
						$return["status"] = true;
						$return["message"] = "update item success";

					} else {
						$return["status"] = false;
						$return["message"] = "update item error";
					}
				} else {
					$return["status"] = false;
					$return["message"] = "check permission error";
				}
			} else {
				$return["status"] = false;
				$return["message"] = "error not found type";
			}

		} else {
			$return["status"] = false;
			$return["message"] = "not fond user";

		}

		print json_encode($return);

	}

	public function update_permission_all_module($username = null) {

		if ($username != null) {

			$data = array();
			$return = array();
			$data = $this->input->post("data_array");
			$type = $this->input->post("type");
			// echo $username;
			// echo "<hr>";
			// echo "<pre>";
			// print_r($data);

			if ($type != null || $type != "") {
				if ($type == "read") {

					foreach ($data as $key => $value) {
						$check_found_permission = $this->module_m->check_module_and_create_permission($username, $value["ref_module_id"], $value["ref_sub_module"]);
						if ($check_found_permission) {

							$this->db->where("ref_module_id", $value["ref_module_id"]);
							$this->db->where("ref_sub_module", $value["ref_sub_module"]);
							$this->db->where("ref_username", $username);
							$this->db->update("member_permission", array(
								$type => $value["value"],
							)
							);
						} else {
							$return['status'] = false;
							$return['message'] = "update permission error !!!";
							echo json_encode($return);
							return false;

						}

					} //loop foreach
					$return['status'] = true;
					$module_name = $this->get_module_name($data[0]["ref_module_id"]);
					$return['message'] = "update permission {$type} all module {$module_name}";
					echo json_encode($return);
					return true;
				} elseif ($type == "write") {

					foreach ($data as $key => $value) {
						$check_found_permission = $this->module_m->check_module_and_create_permission($username, $value["ref_module_id"], $value["ref_sub_module"]);
						if ($check_found_permission) {

							$this->db->where("ref_module_id", $value["ref_module_id"]);
							$this->db->where("ref_sub_module", $value["ref_sub_module"]);
							$this->db->where("ref_username", $username);
							$this->db->update("member_permission", array(
								$type => $value["value"],
							)
							);
						} else {
							$return['status'] = false;
							$return['message'] = "update permission error !!!";
							echo json_encode($return);
							return false;

						}
					} //loop foreach

					$return['status'] = true;
					$module_name = $this->get_module_name($data[0]["ref_module_id"]);
					$return['message'] = "update permission {$type} all module {$module_name}";
					echo json_encode($return);
					return true;
				} else {
					$return['status'] = false;
					$return['message'] = "Not Found Type Error!!";
					echo json_encode($return);
					return false;
				}
			} else {
				$return['status'] = false;
				$return['message'] = "Not Found Type !!";
				echo json_encode($return);
				return false;
			}
		} else {
			$return['status'] = false;
			$return['message'] = "Not Found Username !!";
			echo json_encode($return);
		}
	} // end function pdate_permission_all_module

	public function report_permission() {
		$session_data = $this->session->userdata('sessed_in');
		$data['imgu'] = $session_data['img'];
		$data['name'] = $session_data['m_name'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_master_v');
		$module_info = $this->get_all_module_name();
		$member = $this->datastore_m->getmember();

		$this->load->view('Report_permission/report_permission_v', ["module" => $module_info, "member" => $member]);
		$this->load->view('navtail/base_master/footer_v');
	}

	public function show_report() {

		$input = $this->input->post();
		$session_data = $this->session->userdata('sessed_in');

		unset($input["DataTables_Table_0_length"]);
		// check is null key array
		$username_array = (isset($input["m_code"]) ? $input["m_code"] : []);
		// init array
		$array_all_data = array();
		// loop all module_id
		if(isset($input['module_id'])){
			foreach ($input['module_id'] as $key => $module_id) {
				// get all sub module find by id
				$sub_module = $this->module_m->get_module_by_id($module_id);
				// loop sub module
				foreach ($sub_module as $key2 => $sub_m) {
					//loop // userattay
					foreach ($username_array as $key3 => $user) {
						$this->db->select("read");
						$this->db->where("ref_username", $user);
						$this->db->where("ref_module_id", $sub_m["ref_module"]);
						$this->db->where("ref_sub_module", $sub_m["sub_module_id"]);
						$this->db->limit(1);
						$query = $this->db->get("member_permission");
						$res = (isset($query->result_array()[0]) ? $query->result_array()[0] : ["read" => "0"]);
						//$array_all_data[$input['module_name'][$key]][$sub_m["sub_module_name"]]["read"][] = ($res["read"] == 1) ? "TRUE" : "";
						$array_all_data[$input['module_name'][$key]][$sub_m["sub_module_name"]]["read"][] = $res["read"];

					}

				}

			}
			
		}else{
			echo "no data";
		}
		// debug $username_array
		// var_dump($username_array);
		// debug $array_all_data
		// var_dump($array_all_data);
		$data['imgu'] = $session_data['img'];
		$data['name'] = $session_data['m_name'];

		$this->load->view('navtail/base_master/header_v');
		$this->load->view('navtail/base_master/tail_v', $data);
		$this->load->view('navtail/navtail_master_v');
		$this->load->view('Report_permission/show_report_permission', ["all_data" => $array_all_data, "user_array" => $username_array]);
		$this->load->view('navtail/base_master/footer_v');

	}
	public function report_permission_projects(){
		$session_data = $this->session->userdata('sessed_in');
		$data['imgu'] = $session_data['img'];
		$data['name'] = $session_data['m_name'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_master_v');
		//$module_info = $this->get_all_module_name();
		$this->db->select("project_id,project_name");
		$query_project =  $this->db->get("project");

		$project_all = $query_project->result_array();
		$member = $this->datastore_m->getmember();

		$this->load->view('Report_permission/show_report_permission_projects', ["member" => $member,"projects" => $project_all]);
		$this->load->view('navtail/base_master/footer_v');

	}

	public function active_permission_projects(){
		
		$input= $this->input->post();
		$session_data = $this->session->userdata('sessed_in');
		$array_pack = array();
		if($input["type"] == "by_project"){
			unset($input["tb_projects_length"]);
			if(isset($input["projects"])){
					
				foreach ($input["projects"] as $index => $project) {
					//$array_pack[""]
					$project_id = explode(",", $project)[0];
					$project_name = explode(",", $project)[1];
					$this->db->select("member.m_name as name");
					$this->db->from('project');
					$this->db->join('project_ic', 'project_ic.project_id = project.project_id');
					$this->db->join('member', 'project_ic.proj_user = member.m_id');
					$this->db->where("project.project_id",$project_id);
					$this->db->where("project_ic.project_status","Y");
					$this->db->order_by("member.m_id","ASC");
					
					$query = $this->db->get();
					$res= $query->result_array();
					
					$local_array = array(
						"head" => $project_name,
						"detail" => $res
					);

					$array_pack[] = $local_array;
					
				}
				//var_dump($array_pack);
			}else{
				//echo "ไม่พบข้อมูล Project";
			}
		}elseif($input["type"] == "by_empolyee"){
			unset($input["tb_employee_length"]);
			if(isset($input["employee_id"])){

				foreach ($input["employee_id"] as $index => $employee) {
					$employee_id = explode(",", $employee)[0];
					$employee_name = explode(",", $employee)[1];
					$this->db->select("project.project_name as name");
					$this->db->from("member");
					$this->db->join('project_ic', 'member.m_id = project_ic.proj_user');
					$this->db->join('project', 'project_ic.project_id = project.project_id');
					$this->db->order_by("project.project_id","ASC");
					$this->db->where("project_ic.project_status","Y");
					$this->db->where("project_ic.proj_user",$employee_id);
					$query = $this->db->get();
					$res= $query->result_array();

					$local_array = array(
						"head" => $employee_name,
						"detail" => $res
					);
					$array_pack[] = $local_array;

				}
				//var_dump($array_pack);

			}else{
				//echo "ไม่พบข้อมูล Employee";
			}

		}else{
			echo "ข้อมูลไม่ถูกต้อง";
		}

		
		$data['imgu'] = $session_data['img'];
		$data['name'] = $session_data['m_name'];


		//show view 
		$this->load->view('navtail/base_master/header_v');
		$this->load->view('navtail/base_master/tail_v', $data);
		$this->load->view('navtail/navtail_master_v');
		$this->load->view('Report_permission/show_report_permission_projects_v',["data" => $array_pack ,"type" => $input["type"]]);
		$this->load->view('navtail/base_master/footer_v');
		//show view 
	}

	
} /* End of file New_permission */
