<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class area_model extends CI_Model {
    

  
  public function getproject_user1($project_id)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('project_id',$project_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

  public function getproject_user2($project_id)
    {
        $this->db->select('*');
        $this->db->from('ic_proj_area');
        $this->db->join('ic_typearea','ic_typearea.type_code = ic_proj_area.taye_code');
        $this->db->where('ic_proj_area.project_id',$project_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

   public function ud1($area_code,$ud1)
    {
      $this->db->where('area_code',$area_code);
      $q1 = $this->db->update('ic_proj_area',$ud1);
      if ($q1) {
        return true;
      }
    }


}