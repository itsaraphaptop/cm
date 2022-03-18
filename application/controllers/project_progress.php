<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_progress extends CI_Controller {

	public function index(){


		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compcode'] = $session_data['compcode'];
		
	
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v');
		$this->load->view('office/pr/project_progress/project_progress_v');
		$this->load->view('base/footer_v');
	}

	public function system_type($project_code=null){

		$this->load->Model('project_progress_m');
		$data['system'] = $this->project_progress_m->system($project_code);
		$data['system_ref'] = $this->project_progress_m->system_progress($project_code);
		$data['project_code'] = $project_code;
		$this->load->view('office/pr/project_progress/system_type',$data);

	}

	public function boq($project_code=null){

		$this->load->Model('project_progress_m');
		$data['boq'] = $this->project_progress_m->boq_by_project($project_code);
		$this->load->view('office/pr/project_progress/boq',$data);

	}

	public function tab_letter()
	{
		$this->db->select('*');
		$this->db->from('wysiwyg');
		$this->db->limit(1);
		$query = $this->db->get();
		$html = $query->result();
		$data['rows'] = $html[0];
		$this->load->view('office/pr/project_progress/tab_letter_v', $data);
	}

	public function save_text_wysiwyg()
	{
		$input 	= $this->input->post('data');
		$id 	= $this->input->post('id');
		// var_dump($input);
		// var_dump($id);
		$data = array(
			'text_message' => $input
		);

		$this->db->where('w_id', $id);
		$success = $this->db->update('wysiwyg', $data); 

		$res = array();
		if ($success) {

			$res['status'] 	= true;
			$res['message'] = "บันทึกสำเร็จ";

		}else{

			$res['status'] 	= false;
			$res['message'] = "ไม่สามารบันทึกได้";

		}

		echo json_encode($res);

	}

	public function add_system(){

        $input = $this->input->post();

        foreach ($input['chki'] as $key => $data) {
    
			$data = array(
						'system_code' => $input['bd_jobno'][$key],
						'system_name' => $input['bd_jobname'][$key],
						'system_amount' => $input['bd_amount'][$key],
						'ref_project_code' => $input['project_code']
						);

			$query = $this->db->insert('project_progres_system', $data);
			
        }

        $return = array();
		if ($query) {
			$return['status'] 	= true;
			$return['message'] 	= 'เพิ่มข้อมูลเรียบร้อยแล้ว';
			$return['link'] 	= 'เพิ่มข้อมูลเรียบร้อยแล้ว';
		}else{
			$return['status'] 	= false;
			$return['message'] 	= 'เพิ่มข้อมูลไม่สำเร็จ';
		}

		echo json_encode($return);


    }

		public function tab_file_page($projectid)
	{
		$this->db->select('*');
		$this->db->from('file_uploads');
		$this->db->where('ref_project', $projectid);
		$query = $this->db->get();
		if ($query) {
			$data['rows'] = $query->result();
		}else{
			$data['rows'] = null;
		}
		$this->load->view('office/pr/project_progress/tab_files_v', $data);
	}

	public function download_file($id)
	{
		$this->load->helper('download');
		$this->db->select('name');
		$this->db->from('file_uploads');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query) {
			$res = $query->result();
			$name = $res[0]->name;
			$data = file_get_contents(base_url().'uploads_file/'.$name);
			force_download($name, $data);
		}else{
			echo "string";
		}
	}

	public function save_files()
	{
		$temp_file = "uploads_file/";
		$project_code = $this->input->post("project_code");
        $date = date("Ymdhis");
        if (isset($_FILES['file']['name'])) {
        	// print_r($_FILES);
        	foreach ($_FILES['file']['name'] as $key => $files) {

        		// var_dump($_FILES['file']['name'][$key]);
        		// var_dump($_FILES['file']['type'][$key]);
        		// var_dump($_FILES['file']['tmp_name'][$key]);
        		// var_dump($_FILES['file']['error'][$key]);
        		// var_dump($_FILES['file']['size'][$key]);
				// if($_FILES['file']['name'][$key]>0){
					if(move_uploaded_file($_FILES['file']["tmp_name"][$key],$temp_file.$date."_".$_FILES['file']["name"][$key])){
						$file_name = $date."_".$_FILES['file']["name"][$key];
						// echo "upload";
						$data = array(
							'name' => $file_name,
							'ref_project' => $project_code
						);
						$this->db->insert('file_uploads', $data);
						$res['status'] 	= true;
						$res['message'] = "บันทึกสำเร็จ";

					}else{
						$res['status'] 	= false;
						$res['message'] = "ไม่มีไฟล์ที่ต้องการอัพโหลด";
					}
				// }
        	}

        } else {
        	$res['status'] 	= true;
			$res['message'] = "Please choose a file";
        }

        echo json_encode($res);

	}

	public function tab_submit()
	{
		$this->load->view('office/pr/project_progress/tab_submit_v');
	}

}


/* End of file project_progress.php */
/* Location: ./application/controllers/project_progress.php */ ?>