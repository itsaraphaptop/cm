<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GanttResourceAssignments extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
        }
        public function index()
        {
          $result = $this->db->get('GanttResourceAssignments')->result();
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
            $TaskID = $value->TaskID;
            $ResourceID = $value->ResourceID;
            $Units = $value->Units;
          }
          $data = array(
            'ID' => $ID,
            'TaskID' => $TaskID,
            'ResourceID' => $ResourceID,
            'Units' => $Units,
          );
          $this->db->insert('GanttResourceAssignments',$data);

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
                'TaskID' => $value->PredecessorID,
                'ResourceID' => $value->SuccessorID,
                'Units' => $value->Type,
              );
              $this->db->where('ID',$value->ID);
              $this->db->update('GanttResourceAssignments',$data);
            }else{
              $data = array(
                'ID' => $ID,
                'TaskID' => $value->PredecessorID,
                'SuccessorID' => $value->SuccessorID,
                'Unit' => $value->Type,
              );
              $this->db->where('ID',$value->ID);
              $this->db->update('GanttResourceAssignments',$data);
            }
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
        }

        public  function  Destroy()
        {
          $json = $this->input->post('models');
          $json = stripslashes($json);
          $json = json_decode($json);
          foreach ($json as  $value) {
            $this->db->delete('GanttResourceAssignments', array('ID' => $value->ID));
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
        }


}
