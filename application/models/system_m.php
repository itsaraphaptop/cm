<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class system_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function acccode()
    {
    	$this->db->select('*');
        $this->db->where('act_status',"on");
    	$q = $this->db->get('account_total')->result();
    	return $q;
    }

    //create system
      public function inssystem($cs,$ns)
    {
        $data = array(
            'systemcode' => $cs,
            'systemname' => $ns,
            );
        if($this->db->insert('system',$data))
        {
            return true;
        }else{
            return false;
        }
    }
      public function editsystem($e_cs,$e_ids,$e_sn)
    {
        $data = array(
            'systemcode' => $e_cs,
            'systemname' => $e_sn,
            );
        $this->db->where('systemid',$e_ids);
        if($this->db->update('system',$data))
        {
            return true;
        }else{
            return false;
        }
    }
}