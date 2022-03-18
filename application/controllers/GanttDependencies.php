<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GanttDependencies extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
        }
        public function index()
        {
          $result = $this->db->get('ganttdependencies')->result();
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
        }
        public function Create()
        {
          $json = $this->input->post('models');
          $json = stripslashes($json);
          $json = json_decode($json);
          foreach ($json as $value) {
            $ID = $value->ID;
            $PredecessorID = $value->PredecessorID;
            $SuccessorID = $value->SuccessorID;
            $Type = $value->Type;
          }
          $data = array(
            'ID' => $ID,
            'PredecessorID' => $PredecessorID,
            'SuccessorID' => $SuccessorID,
            'Type' => $Type,
          );
          $this->db->insert('ganttdependencies',$data);

          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        }

        public function Update()
        {
           $json = $this->input->post('models');
          $json = stripslashes($json);
          $json = json_decode($json);
          foreach ($json as $value) {
            if ($value->ID!=null) {
              $data = array(
                'PredecessorID' => $value->PredecessorID,
                'SuccessorID' => $value->SuccessorID,
                'Type' => $value->Type,
              );
              $this->db->where('ID',$value->ID);
              $this->db->update('ganttdependencies',$data);
            }else{
              $data = array(
                'ID' => $ID,
                'PredecessorID' => $value->PredecessorID,
                'SuccessorID' => $value->SuccessorID,
                'Type' => $value->Type,
              );
              $this->db->where('ID',$value->ID);
              $this->db->update('ganttdependencies',$data);
            }
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        }

        public  function  Destroy()
        {
          $json = $this->input->post('models');
          $json = stripslashes($json);
          $json = json_decode($json);
          foreach ($json as  $value) {
            $this->db->delete('ganttdependencies', array('ID' => $value->ID));
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
        }

        
        public function Member(){
          

          $result = $this->db->get('GanttResources')->result();
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));

        }

}
