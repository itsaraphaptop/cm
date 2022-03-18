<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class costcode_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function subgroupcostname($type,$group,$subgroup,$subgroup4,$subgroup5)
    {
    	$this->db->select('*');
    	$this->db->where('ctype_code',$type);
    	$this->db->where('cgroup_code',$group);
    	$this->db->where('csubgroup_code',$subgroup);
        $this->db->where('cgroup_code4',$subgroup4);
        $this->db->where('cgroup_code5',$subgroup5);
    	$q = $this->db->get('cost_subgroup')->result();
    	return $q;
    }
    public function subgroupcostname3($type,$group,$subgroup)
    {
    	$this->db->select('*');
    	$this->db->where('ctype_code',$type);
    	$this->db->where('cgroup_code',$group);
    	$this->db->where('csubgroup_code',$subgroup);
    	$q = $this->db->get('cost_subgroup')->result_array();
    	return $q;
    }
    public function subgroupcostname4($type,$group,$subgroup,$subgroup4)
    {
    	$this->db->select('*');
    	$this->db->where('ctype_code',$type);
    	$this->db->where('cgroup_code',$group);
    	$this->db->where('csubgroup_code',$subgroup);
        $this->db->where('cgroup_code4',$subgroup4);
    	$q = $this->db->get('cost_subgroup')->result_array();
    	return $q;
    }
    public function checkcostlevel($compcode){
        $this->db->select("costlevel");
        $this->db->where('sys_code',$compcode);
        $query = $this->db->get('syscode')->result_array();
        return $query;
    }
}