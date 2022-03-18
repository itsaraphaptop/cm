<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class permission extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('permission_m');
            // $this->load->library('date');

        }
        public function update_siteic_proj()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];

          $id = $this->input->post('id');
          $project_id  = $this->input->post('project_id');
          $status  = $this->input->post('status');
          // echo $project_id ." - ". $id ." - ". $status;
          $data = array(
            'project_status' => $status,
            'user_edit' => $username
          );
          $this->db->where('proj_user',$id);
          $this->db->where('project_id',$project_id);
          if($this->db->update('project_ic',$data))
          {
            //  echo $project_id ." - ". $id ." - ". $status;
            return true;
          }else{
            return false;
          }
        }
        public function updata_projecIc_by_company(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];

          $id = $this->input->post('id');
          $project_id  = $this->input->post('project_id');
          $status  = $this->input->post('status');
          return $project_id;
          // echo $project_id ." - ". $id ." - ". $status;
          // $data = array(
          //   'project_status' => $status,
          //   'user_edit' => $username
          // );
          // $this->db->where('proj_user',$id);
          // $this->db->where('project_id',$project_id);
          // if($this->db->update('project_ic',$data))
          // {
          //   //  echo $project_id ." - ". $id ." - ". $status;
          //   return true;
          // }else{
          //   return false;
          // }
        }
        public function update_company_permission(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
          $id = $this->input->post('id');
          $comp_id  = $this->input->post('comp_id');
          $status  = $this->input->post('status');
          // echo $project_id ." - ". $id ." - ". $status;
          $data = array(
            'comp_status' => $status,
            'user_edit' => $username
          );
          $this->db->where('m_user',$id);
          $this->db->where('comp_id',$comp_id);
          if($this->db->update('permission_company',$data))
          {
            return true;
          }else{
            return false;
          }
        }
        public function update_siteic()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];

          $mquery = $this->db->query('select m_id,project_id from member inner join project on project.project_id!=member.m_id');
          $mres = $mquery->result();
          foreach ($mres as $key => $value) {

            $data = array(
              'project_id' => $value->project_id,
              'proj_user' => $value->m_id,
              'project_status' => "Y",
              'compcode' => $compcode,
              'user_add' => $username
            );
            $q = $this->db->insert('project_ic',$data);
          }

          if ($q) {
            echo "Saved";
          }else{
            echo "error";
          }
        }

        public function read()
        {
        	$q = $this->permission_m->read();
        	$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
        }
        public function testjsonhr()
        {
          $this->db->select('*');
          $query = $this->db->get('member');
          $res = $query->result();
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($res));
        }
        public function update()
        {
        	$session_data = $this->session->userdata('logged_in');
        	$userlogin = $session_data['username'];
        	$json = $this->input->post('models');
        	$json = stripslashes($json);
			$json = json_decode($json);
        	foreach ($json as  $value) {
        		$id = $value->menu_id;
        		$office = $value->m_office;
        		$po = $value->m_po;
        		$ic = $value->m_ic;
        		$ap = $value->m_ap;
        		$ar = $value->m_ar;
        		$pm = $value->m_pm;
            $hr = $value->m_hr;
            $st = $value->m_st;
        		$master = $value->m_master;
            $pr_project_right = $value->pr_project_right;
        		$prapprovr = $value->pr_approve;
            $poapprovr = $value->po_approve;
                $pettycash = $value->pettycash_approve;
                $user_right = $value->user_right;

        	}
        	if ($office=="1") {
        		$of = "true";
        	}
        	else{
        		$of = "false";
        	}
        	if ($po=="1") {
        		$mpo = "true";
        	}
        	else{
        		$mpo = "false";
        	}
        	if ($ic=="1") {
        		$mic = "true";
        	}
        	else{
        		$mic = "false";
        	}
        	if ($ap=="1") {
        		$map = "true";
        	}
        	else{
        		$map = "false";
        	}
        	if ($ar=="1") {
        		$mar = "true";
        	}
        	else{
        		$mar = "false";
        	}
        	if ($pm=="1") {
        		$mpm = "true";
        	}
        	else{
        		$mpm = "false";
        	}
        	if ($master=="1") {
        		$mmaster = "true";
        	}
        	else{
        		$mmaster = "false";
        	}
        	if ($prapprovr=="1") {
        		$mprapprovr = "true";
        	}
        	else{
        		$mprapprovr = "false";
        	}
          if ($poapprovr=="1") {
            $mpoapprovr = "true";
          }
          else{
            $mpoapprovr = "false";
          }
            if ($user_right=="1") {
                $muser_right = "true";
            }
            else{
                $muser_right = "false";
            }
            if ($pettycash=="1") {
                $pc = "true";
            }
            else{
                $pc = "false";
            }
            if ($hr=="1") {
                $mhr = "true";
            }
            else{
                $mhr = "false";
            }
            if ($pr_project_right=="1") {
                $mpr_project_right = "true";
            }
            else{
                $mpr_project_right = "false";
            }
            if ($st=="1") {
                $mst = "true";
            }
            else{
                $mst = "false";
            }
            
        	$data = array(
        		'm_office' => $of,
        		'm_po' => $mpo,
        		'm_ic' => $mic,
        		'm_ap' => $map,
        		'm_ar' => $mar,
        		'm_pm' => $mpm,
            'm_hr' => $mhr,
            'm_st' => $mst,
        		'm_master' => $mmaster,
        		'pr_approve' => $mprapprovr,
            'po_approve' => $mpoapprovr,
                'pettycash_approve' => $pc,
                'pr_project_right' => $mpr_project_right,
                'user_right' => $muser_right,
        		'user_update' => $userlogin
        		);
        	$this->db->where('menu_id',$id);
        	 $this->db->update('menu_right',$data);

        		$this->output
	            ->set_content_type('application/json')
	            ->set_output(json_encode($json));


        }

        public function po_receive(){
          $id =  $this->input->post('id');
          $chk = $this->input->post('chk');
          $data=array(
            'ic_poamt_receipt' => $chk,
            );
          $this->db->where('m_user',$id);
          $this->db->update('menu_right',$data);
           echo $id;
          return true;

        }

}
