<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mater_hr extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('hr_m');
        }

        public function edu_type()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $compcode = $session_data['compcode'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $datata['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        if ($username=="") {
          redirect('/');
        }else {
          $data['res'] = $this->hr_m->getedu_m();
          $this->load->view('navtail/base_angular/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('datastore/hr/edu_type_v');
          // $this->load->view('navtail/base_angular/base_js_v',$data);
          $this->load->view('navtail/base_master/footer_v');
        }
      }

      public function ground_edu()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $compcode = $session_data['compcode'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $datata['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        if ($username=="") {
          redirect('/');
        }else {
          $data['res'] = $this->hr_m->getgroedu_m();
          $this->load->view('navtail/base_angular/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('datastore/hr/groundedu_type_v');
          // $this->load->view('navtail/base_angular/base_js_v',$data);
          $this->load->view('navtail/base_master/footer_v');
        }
      }

      public function train_type()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $compcode = $session_data['compcode'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $datata['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        if ($username=="") {
          redirect('/');
        }else {
          $data['res'] = $this->hr_m->gettrain_m();
          $this->load->view('navtail/base_angular/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('datastore/hr/train_type_v');
          // $this->load->view('navtail/base_angular/base_js_v',$data);
          $this->load->view('navtail/base_master/footer_v');
        }
      }
      
      public function leave_type()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $compcode = $session_data['compcode'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $datata['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        if ($username=="") {
          redirect('/');
        }else {
          $data['res'] = $this->hr_m->getleave_m();
          $this->load->view('navtail/base_angular/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('datastore/hr/leave_type_v');
          // $this->load->view('navtail/base_angular/base_js_v',$data);
          $this->load->view('navtail/base_master/footer_v');
        }
      }


  public function addedu()
    {
      $data = array(
        'edu_code'=> $this->input->post('edu_code'),
        'edu_name'=> $this->input->post('edu_name'),
        'eduname_eng'=> $this->input->post('eduname_eng'),
        'edu_major'=> $this->input->post('edu_major'),
        'edu_addre'=> $this->input->post('edu_addre'),
        'type'=> $this->input->post('type'),
      );
      $q = $this->db->insert('educational_ins',$data);
      if ($q) {
        redirect('mater_hr/edu_type');
      }else {
        redirect('mater_hr/edu_type');
      }
    }

    public function addgroudedu()
    {
      $data = array(
        'groedu_code'=> $this->input->post('groedu_code'),
        'groedu_name'=> $this->input->post('groedu_name'),
      );
      $q = $this->db->insert('educational',$data);
      if ($q) {
        redirect('mater_hr/ground_edu');
      }else {
        redirect('mater_hr/ground_edu');
      }
    }

    public function addtrain()
    {
      $data = array(
        'train_code'=> $this->input->post('train_code'),
        'train_name'=> $this->input->post('train_name'),
        'train_ins'=> $this->input->post('train_ins'),
        'train_tel'=> $this->input->post('train_tel'),
        'train_fax'=> $this->input->post('train_fax'),
        'train_detail'=> $this->input->post('train_detail'),
      );
      $q = $this->db->insert('training',$data);
      if ($q) {
        redirect('mater_hr/train_type');
      }else {
        redirect('mater_hr/train_type');
      }
    }

    public function del_edugro() {
     
    $id = $this->uri->segment(3);
    $this->db->delete('educational', array('groedu_id' => $id));
      redirect('mater_hr/ground_edu');
    }

    public function del_edu() {
     
    $id = $this->uri->segment(3);
    $this->db->delete('educational_ins', array('edu_id' => $id));
      redirect('mater_hr/edu_type');
    }

    public function del_train() {
     
    $id = $this->uri->segment(3);
    $this->db->delete('training', array('train_id' => $id));
      redirect('mater_hr/train_type');
    }

    public function upd_edu(){
      $id = $this->uri->segment(3);
      $add_edu = $this->input->post();
      $ins_edu = array(
          'edu_code' => $add_edu['edu_code'],
          'edu_name' => $add_edu['edu_name'],
          'eduname_eng' => $add_edu['eduname_eng'],
          'edu_major' => $add_edu['edu_major'],
          'edu_addre' => $add_edu['edu_addre'],
          'type' => $add_edu['type'],  
      );
            $this->db->where('edu_id',$id);
            $this->db->update('educational_ins',$ins_edu);     
      redirect('mater_hr/edu_type');
    }

    public function updtrain(){
      $id = $this->uri->segment(3);
      $add_edu = $this->input->post();
      $ins_edu = array(
          'train_code' => $add_edu['train_code'],
          'train_name' => $add_edu['train_name'],
          'train_ins' => $add_edu['train_ins'],
          'train_tel' => $add_edu['train_tel'],
          'train_fax' => $add_edu['train_fax'],
          'train_detail' => $add_edu['train_detail'],  
      );
            $this->db->where('train_id',$id);
            $this->db->update('training',$ins_edu);     
      redirect('mater_hr/train_type');
    }  

    public function updgroudedu(){
      $id = $this->uri->segment(3);
      $add_edu = $this->input->post();
      $ins_edu = array(
          'groedu_code' => $add_edu['groedu_code'],
          'groedu_name' => $add_edu['groedu_name'],
      );
            $this->db->where('groedu_id',$id);
            $this->db->update('educational',$ins_edu);     
      redirect('mater_hr/ground_edu');
    }  

    // public function addleave()
    // {
    //   $data = array(
    //     'type_leave'=> $this->input->post('type_leave'),
    //     'sick_leave'=> $this->input->post('sick_leave'),
    //     'vacation_leave'=> $this->input->post('vacation_leave'),
    //     'personal_leave'=> $this->input->post('personal_leave'),
    //     'maternity_leave'=> $this->input->post('maternity_leave'),
    //     'military_leave'=> $this->input->post('military_leave'),
    //     'ordination_leave'=> $this->input->post('ordination_leave'),
    //   );
    //   $q = $this->db->insert('master_leave',$data);
    //   if ($q) {
    //     redirect('mater_hr/leave_type');
    //   }else {
    //     redirect('mater_hr/leave_type');
    //   }
    // }

    public function upd_leave(){
      $id = $this->uri->segment(3);
      $add_leave = $this->input->post();
      $d_leave = array(
          'name_leave' => $add_leave['name_leave'],
          'day_leave' => $add_leave['day_leave'],
      );
            $this->db->where('le_id',$id);
            $this->db->update('master_leave',$d_leave);     
      redirect('mater_hr/leave_type');
    }


    public function del_leave() {
     
    $id = $this->uri->segment(3);
    $this->db->delete('master_leave', array('le_id' => $id));
      redirect('mater_hr/leave_type');
    }

    public function addleave()
    {
      $data = array(
        'name_leave'=> $this->input->post('name_leave'),
        'day_leave'=> $this->input->post('day_leave'),
        'type_leave'=> '1'
      );
      $q = $this->db->insert('master_leave',$data);
      if ($q) {
        redirect('mater_hr/leave_type');
      }else {
        redirect('mater_hr/leave_type');
      }
    }
   
}