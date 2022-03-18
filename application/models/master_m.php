<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class master_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function insdpt($input, $compcode)
    {
    	$data = array(
            'department_code' => $input['li_dptcode'],
            'department_title' => $input['li_dpt'],
            'compcode' => $compcode,
            'control_bqq' => $input['control_bqq'],
            'control_bg' => $input['control_bg'],
            'tender_no' => $input['bd_tenid'],
    		'project_name' => $input['bd_tenname']
    		);
        $res = $this->db->insert('department',$data);
    	if($res)
    	{
    		return true;
    	}else{
    		return false;
    	}
    }
    public function editdpt($input,$compcode)
    {
    	$data = array(
            'department_code'  =>$input['li_dptcode'],
    		'department_title' => $input['li_dpt'],
            'compcode'         => $compcode,
            'control_bqq'      => $input['control_bqq'],
            'control_bg'       => $input['control_bg'],
            'tender_no'        => $input['tender_no'],
            'project_name'     => $input['project_name']
    		);
    	$this->db->where('department_id',$input['li_id']);
    	if($this->db->update('department',$data))
    	{
    		return true;
    	}else{
    		return false;
    	}
    }
    public function getdpt()
    {
    	$this->db->select('department_id,department_code,department_title');
    	$q = $this->db->get('department')->result();
    	return $q;
    }

    public function currency_list()
    {
        $session_data = $this->session->userdata('sessed_in');
        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where('compcode', $session_data['compcode']);
        $this->db->where('active', '1');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $res = $query->result();
        }else{
            $res = [];
        }

        return $res;
    }
    public function find_costcode($lv1,$lv2,$lv3,$lv4,$lv5)
    {
        $session_data = $this->session->userdata('sessed_in');
        $this->db->select('csubgroup_id');
        $this->db->from('cost_subgroup');
        $this->db->where('ctype_code',$lv1);
        $this->db->where('cgroup_code',$lv2);
        $this->db->where('csubgroup_code',$lv3);
        $this->db->where('cgroup_code4',$lv4);
        $this->db->where('cgroup_code5',$lv5);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $res = $query->result_array();
        }else{
            $res = [];
        }

        return $res;
    }
    public function findproid($code)
    {
        $this->db->select('project_id');
        $this->db->from('project');
        $this->db->where('project_code',$code);
        $query = $this->db->get();
        if($query->num_rows()>0){
            $res = $query->result_array();
        }else{
            $res = [];
        }
        return $res;
    }
}