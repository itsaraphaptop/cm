<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cm_new extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// $this->load->Model('datastore_m');
		$this->load->Model('Cm_new_m');
	}
	public function form1() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username=="") {
			redirect('/');
		}else {
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v',$da);
	     	$this->load->view('navtail/base_master/tail_v');
	  		// $this->load->view('navtail/navtail_pr_v');
	        // $this->load->view('office/pr/open_project_approve_v');
	     	$this->load->view('base/footer_v');
			$this->load->view('cm/viewFrom1');
			//Go to From
		}
	}

	public function unit() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username=="") {
			redirect('/');
		}else {

            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v',$da);
	     	$this->load->view('navtail/base_master/tail_v');
			$this->load->view('cm/unit');
	     	$this->load->view('base/footer_v');
			//Go to From
		}
	}

	public function add_convert($id) {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username=="") {
			redirect('/');
		}else {
			
			$res['rows'] = $this->Cm_new_m->get_project_by_id($id);
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v',$da);
	     	$this->load->view('navtail/base_master/tail_v');
			$this->load->view('cm/add_convert', $res);
	     	$this->load->view('base/footer_v');
			//Go to From
		}
	}

	public function add_unit($id) {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username=="") {
			redirect('/');
		}else {
			$res['rows'] = $this->Cm_new_m->get_project_by_id($id);
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v',$da);
	     	$this->load->view('navtail/base_master/tail_v');
			$this->load->view('cm/add_unit', $res);
	     	$this->load->view('base/footer_v');
			//Go to From
		}
	}

	public function project_all() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username=="") {
			redirect('/');
		}else {
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
          	$projectid = $session_data['projectid'];
            $res['rows'] = $this->Cm_new_m->get_project();
			$this->load->view('navtail/base_master/header_v',$da);
	     	$this->load->view('navtail/base_master/tail_v');
	  		// $this->load->view('navtail/navtail_pr_v');
	        // $this->load->view('office/pr/open_project_approve_v');
			$this->load->view('cm/project_all', $res);
	     	$this->load->view('base/footer_v');
			//Go to From
		}
	}

	public function add_unit_one()
	{
		$input = $this->input->post();
		// if ($this->input->post('type') == "insert") {
		// 	$res = $this->Cm_new_m->add_unit_to_one($input);
		// 	if ($res) {
		// 		echo "Insert Successful!!!";
		// 	}else{
		// 		echo "insert Error!!!";
		// 	}
		// }
		if ($this->input->post('modal') == "one" && $this->input->post('type') == "insert") {

			$res = $this->Cm_new_m->add_unit_to_one($input);

			if ($res) {
				redirect('Cm_new/unit/'.$this->input->post('project_code'));
			}else{
				echo "insert Error!!!";
			}
		}else if($this->input->post('modal') == "group" && $this->input->post('type') == "insert") {

			$res_head = $this->Cm_new_m->add_unit_group_header($input);
			$res_detail = $this->Cm_new_m->add_unit_group_detail($input);

			if ($res_head && $res_detail) {
				redirect('Cm_new/unit/'.$this->input->post('project_code'));
			}else{
				echo "insert Error!!!";
			}
			echo "<pre>";
			print_r($input);
			echo "</pre>";
		}

	}

	public function check_unit_unique()
	{
		$input = $this->input->post("word");
		$type = $this->input->post("type");
		// print_r($input);
		// echo $input;
		$return = array();
		if ($type = "one") {
			//Query Table
		}else if ($type = "noone") {
			//Query Table
		}else{
			$return['status'] = "false";
			$return['massage'] = "";
		}

		echo json_encode($return);
	}

	public function select_note()
	{
		$return = array();
		$res = $this->Cm_new_m->get_note();
		if ($res) {
			$return['status'] = "true";
			$return['data'] = $res;
		}else{
			$return['status'] = "false";
			$return['message'] = "null query on table note";
		}

		echo json_encode($return);
	}

	// fnc select ประเภทบ้าน
    public function tpye_house($type)
    {
    	$return = array();
    	// get_type_house	
    	$res = $this->Cm_new_m->get_type_house($type);

    	if ($res) {
    		$return['status'] = true;
    		$return['data'] = $res;
    	}else{
    		$return['status'] = false;
    		$return['message'] = "null query";
    	}

    	echo json_encode($return);

    }
    // end fnc select ประเภทบ้าน

    // fnc select แบบบ้าน
    public function model_house($ref_type)
    {
    	$return = array();
    	// get_model_house
    	$res = $this->Cm_new_m->get_model_house($ref_type);

    	if ($res) {
    		$return['status'] = true;
    		$return['data'] = $res;
    	}else{
    		$return['status'] = false;
    		$return['message'] = "null query";
    	}

    	echo json_encode($return);
    }
    // end fnc select แบบบ้าน

    public function tb_one($project_code)
    {
    	$return = array();

    	$data['rows'] = $this->Cm_new_m->get_tr_one($project_code);

    	$this->load->view('cm/table_one', $data);
    }

    public function tb_group($project_code)
    {
    	$data['rows'] = $this->Cm_new_m->get_tr_group($project_code);
    	
    	$this->load->view('cm/table_group', $data);
    }

    public function show_unit($unit_code='', $type_unit='')
    {
    	echo "string";
  //   	$session_data = $this->session->userdata('sessed_in');
		// $username = $session_data['username'];
		// $da['name'] = $session_data['m_name'];
		// if ($username=="") {
		// 	redirect('/');
		// }else {

		// 	if ($type_unit == "one") {
		// 		$data['rows'] = $this->Cm_new_m->get_unit_codeOne($unit_code);
		// 		// echo "string1";
		// 	}else if($type_unit == "group"){
		// 		$data['rows'] = $this->Cm_new_m->get_unit_codeGroup($unit_code);
		// 	}else{
		// 		// echo "error";
		// 	}

  //           $data['depid'] = $session_data['m_depid'];
  //           $da['dep'] = $session_data['m_dep'];
  //           $data['projid'] = $session_data['projectid'];
  //           $projectid = $session_data['projectid'];
  //           $da['project'] = $session_data['m_project'];
  //           $da['imgu'] = $session_data['img'];
    		
		// 	$this->load->view('navtail/base_master/header_v',$da);
	 //     	$this->load->view('navtail/base_master/tail_v');
		// 	$this->load->view('cm/show_unit', $data);
	 //     	$this->load->view('base/footer_v');
		// 	// Go to From
		// }
    }
}