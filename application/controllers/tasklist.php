<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class tasklist extends CI_Controller {
	public function __construct() {
	parent::__construct();
	$this->load->model('datastore_m');
	$this->load->helper('directory');
	
	
	}
	public function index(){
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$data['dep'] = $session_data['m_dep'];
		$data['mtype'] = $session_data['mtype'];
		$data['m_id'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['imgu'] = $session_data['img'];
		// check get permission unsuccessful
		if ($data['username'] == "") {
		redirect('/');
		}else{
		$data['navSide'] = true;

		$data['task'] = $this->datastore_m->task_h($data['m_id']);
		$data['project'] = $this->datastore_m->allproject();
		$data['map'] = directory_map('./file_tmp');
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_main');
		$this->load->view('panel/tasklist_v',$data);
		$this->load->view('base/footer_v');
		}
	}

	public function data_vault(){
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$data['dep'] = $session_data['m_dep'];
		$data['mtype'] = $session_data['mtype'];
		$data['m_id'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['imgu'] = $session_data['img'];
		// check get permission unsuccessful
		if ($data['username'] == "") {
		redirect('/');
		}else{
		$data['navSide'] = true;

		$data['task'] = $this->datastore_m->task_h($data['m_id']);
		$data['project'] = $this->datastore_m->allproject();
		$data['map'] = directory_map('./file_tmp');
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_main');
		$this->load->view('panel/tasklist',$data);
		$this->load->view('base/footer_v');
		}
	}

	public function tasklist_detail(){
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$data['dep'] = $session_data['m_dep'];
		$data['mtype'] = $session_data['mtype'];
		$data['m_id'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['imgu'] = $session_data['img'];
		// check get permission unsuccessful
		if ($data['username'] == "") {
		redirect('/');
		}else{
		$data['navSide'] = true;
		$this->load->view('panel/tasklist_detail',$data);
		}
	}

	public function createFolder_1(){
		$create = mkdir('file_tmp/'.$_POST['name'], 0700, true);

	    $return = array();
	    if($create){
	        $return['status']  = true;
	        $return['message'] = "สร้างโฟลเดอร์สำเร็จ";
	    }else{
	        $return['status']  = false;
	        $return['message'] = "ไม่สามารถสร้างโฟลเดอร์ได้";
	    }
	    echo json_encode($return);

	}
	public function createFolder(){

		$name = $_POST['name'];
		$path = $_POST['path'];
		$path_file = $path.'/'.$name;
		$create = mkdir('file_tmp/'.$path.'/'.$name, 0700, true);

	    $return = array();
	    if($create){
	        $return['status']  = true;
	        $return['message'] = "สร้างโฟลเดอร์สำเร็จ";
	        $return['path'] = $path_file;
	    }else{
	        $return['status']  = false;
	        $return['message'] = "ไม่สามารถสร้างโฟลเดอร์ได้";
	    }
	    echo json_encode($return);

	}

	public function createFile_1(){

		$return = array();
		$move = "file_tmp/";
		if (move_uploaded_file($_FILES["file_up"]["tmp_name"],$move.$_FILES["file_up"]["name"])) {
			$return['status'] 	= true;
			$return['message'] 	= 'เพิ่มไฟล์เรียบร้อยแล้ว';
			$return['name'] 	= $_FILES['file_up']['name'];
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'ไม่สำเร็จ';
			// $return['name'] 	= $_FILES['file_up']['tmp_name'];
		}

		echo json_encode($return);
		
	}

	public function createFile(){

		$return = array();
		$move = "file_tmp/";
		$move .= $_POST['path'].'/';

		if (move_uploaded_file($_FILES["file_up"]["tmp_name"],$move.$_FILES["file_up"]["name"])) {
			$return['status'] 	= true;
			$return['message'] 	= 'เรียบร้อยแล้ว';
			$return['path'] 	= $move;
			$return['name'] 	= $_FILES['file_up']['name'];
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'ไม่สำเร็จ';
			// $return['name'] 	= $_FILES['file_up']['tmp_name'];
		}

		echo json_encode($return);
		
	}

	public function download_file(){
		$this->load->helper('download');
		$post = $this->input->post();
		var_dump($post);
		$url = $post['path'];
		$file = $post['name'];
		// var_dump($file);
		$data = file_get_contents('file_tmp/'.$url);
		force_download($file, $data);
		// force_download(FCPATH.'file_tmp/'.$url.'/'.$file, null);	
	}
	public function download_file_tmp(){
		$this->load->helper('download');
		$post = $this->input->post();
		var_dump($post);
		// $url = $post['path'];
		$file = $post['name'];
		// var_dump($file);
		$data = file_get_contents('file_tmp/'.$file);
		force_download($file, $data);
		// force_download(FCPATH.'file_tmp/'.$url.'/'.$file, null);	
	}
}