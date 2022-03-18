<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GanttTasks extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
        }
        public function index()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['compcode'] = $session_data['compcode'];
          $projid = $this->uri->segment(3);
          $this->db->select('*');
          $this->db->where('project_code',$projid);
          $query = $this->db->get('gantttasks');
          $result = $query->result();
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
        }
        public function Create()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $projid = $this->uri->segment(3);
          $json = $this->input->post('models');
          $json = stripslashes($json);
          $json = json_decode($json);
          foreach ($json as $value) {
            $ID = $value->ID;
            $Title = $value->Title;
            $ParentID = $value->ParentID;
            $OrderID = $value->OrderID;
            $Start = $value->Start;
            $End = $value->End;
            $PercentComplete = $value->PercentComplete;
            if ($value->Summary!=1) {
              $Summary = "false";
            }else{
              $Summary = "true";
            }
            if ($value->Expanded!=1) {
              $Expanded = "false";
            }else{
              $Expanded = "true";
            }

          }
           $this->db->select("id");
          $this->db->order_by('id','desc');
          $this->db->limit(1);
          $q = $this->db->get('gantttasks');
          $res = $q->result();
          foreach ($res as $key => $val) {
            $num = $val->id;
          }

          $data = array(
            'ID' => $num+1,
            'Title' => $Title,
            'ParentID' => $ParentID,
            'OrderID' => $OrderID,
            'Start' => $Start,
            'End' => $End,
            'PercentComplete' => $PercentComplete,
            'Summary' => $Summary,
            'Expanded' => $Expanded,
            'project_code' => $projid,
            'compcode' => $compcode
          );
          $this->db->insert('gantttasks',$data);
          // $reasult = $this->db->get('gantttasks')->result();
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        }
        public function Update()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $projid = $this->uri->segment(3);
          $json = $this->input->post('models');
          $json = stripslashes($json);
          $json = json_decode($json);
          foreach ($json as $value) {
            if ($value->Summary!=1) {
              $Summary = "false";
            }else{
              $Summary = "true";
            }
            if ($value->Expanded!=1) {
              $Expanded = "false";
            }else{
              $Expanded = "true";
            }
              $data = array(
                'Title' => $value->Title,
                'ParentID' => $value->ParentID,
                'OrderID' => $value->OrderID,
                'Start' => $value->Start,
                'End' => $value->End,
                'PercentComplete' => $value->PercentComplete,
                'Summary' => $Summary,
                'Expanded' => $Expanded,
                'project_code' => $projid,
                'compcode' => $compcode
              );
              $this->db->where('ID', $value->ID);
              $this->db->update('gantttasks',$data);


          }


          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
        }

        public function Destroy()
        {
          $json = $this->input->post('models');
          $json = stripslashes($json);
          $json = json_decode($json);
          foreach ($json as  $value) {
            $this->db->delete('gantttasks', array('ID' => $value->ID));
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
        }

}
