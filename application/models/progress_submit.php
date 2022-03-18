<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class progress_submit extends CI_Model
{
	public function __construct() {
        parent::__construct();
    }

    public function add_progress_header($arr_data)
    {   
        
        if($this->db->insert('progress_submit',$arr_data)){
            return true;
        }else{
            return false;
        }
    }

    public function add_progress_body($arr_data)
    {   
        if($this->db->insert('progress_submit_detail',$arr_data)){
            return true;
        }else{
            return false;
        }
    }

    public function update_progress_header($arr_data,$id)
    {   
        $this->db->where('submit_no', $id);
        unset($arr_data["submit_no"]);
        $this->db->update('progress_submit', $arr_data);
    }

    public function update_progress_body($arr_data,$id)
    {   
        $this->db->where('progress_submit_detail.id', $id);
        unset($arr_data["submit_ref"]);
        $this->db->update('progress_submit_detail', $arr_data);
    }

    public function getdata_progress($projectcode)
    {
        $this->db->select('*');
        $this->db->from('project_item');
        $this->db->where('project_code', $projectcode);
       
        $query = $this->db->get();

        if ($query) {
            $result = $query->result_array();
        }else{
            $result = null;
        }
            return $result;

    }

    public function getdata_boq($projectcode)
    {
        $this->db->select('*');
        $this->db->from('boq_item');
        $this->db->join('project','boq_item.boq_project = project.bd_tenid');
        $this->db->where('project.project_code', $projectcode);

        $query = $this->db->get();

        if ($query) {
            $result = $query->result_array();
        }else {
            $result = null;
        }
            return $result;
    }

}