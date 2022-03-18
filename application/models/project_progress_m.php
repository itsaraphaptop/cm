<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class project_progress_m extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    public function system($code){

        $this->db->select('*');
        $this->db->join('system','system.systemid = projectd_job');
        $this->db->where('project_code',$code);
        $query = $this->db->get('project_item');
        $res = $query->result();
        return $res;

    }

    public function boq_by_project($project_code){

        $this->db->select('bd_tenid');
        $this->db->where('project_code',$project_code);
        $query = $this->db->get('project');
        $res = $query->result();
        $bd = $res[0]->bd_tenid;

        if ($bd != NULL) {

            $this->db->select('*');
            $this->db->where('boq_code',$bd);
            $this->db->join('system','system.systemid = system');
            $query_bd = $this->db->get('boq_cost');
            $res_bd = $query_bd->result();
            return $res_bd;


        }
        
    }

    public function system_progress($code){

        $this->db->select('*');
        $this->db->where('ref_project_code',$code);
        $query = $this->db->get('project_progres_system');
        $res = $query->result();
        return $res;

    }

   
}