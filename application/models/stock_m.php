<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class stock_m extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
     public function getporec()
     {
     	$this->db->select('*');
        $this->db->from('po_receive');
        $this->db->join('project', 'project.project_id = po_receive.project','left outer');
        $this->db->join('department','department.department_id = po_receive.department','left outer');
        $this->db->where('ic_status','full');
     	$query = $this->db->get();
     	$res = $query->result();
     	return $res;
     }
     public function getporec_d($id)
     {
        $this->db->select('*');
        $this->db->where('poi_ref',$id);
        $query = $this->db->get('po_item');
        $res = $query->result();
        return $res;

     }
     
     public function insicrec_h($data)
     {
        if($this->db->insert('ic_recive',$data))
        {
            return true;
        }
        else
        {
            return false;
        }
     }
     public function insicrec_d($data,$id)
     {
        if ($this->db->insert('icd_receive',$data)) {
            return true;
        }
        else
        {
            return false;
        }
     }
     public function uptpoitem_d($data,$id,$poi_id)
     {
        $this->db->where('poi_id',$poi_id);
        $this->db->where('poi_ref',$id);
        if ($this->db->update('po_item',$data)) {
            return true;
        }
        else
        {
            return false;
        }
     }
      public function uptporecitem_d($data,$id,$poi_id)
     {
        $this->db->where('poitem_id',$poi_id);
        $this->db->where('poi_ref',$id);
        if ($this->db->update('po_recitem',$data)) {
            return true;
        }
        else
        {
            return false;
        }
     }
     public function uptic_h($data,$id)
     {
        $this->db->where('ic_reccode',$id);
        if ($this->db->update('ic_recive',$data)) {
          return true;
        }
        else
        {
            return false;
        }
     }

     ///////////////// table store 
     public function getstore()
     {
        $this->db->select('*');
        $query = $this->db->get('store');
        $res = $query->result();
        return $res;
     }
     public function getstorenot()
     {
        $this->db->select('*');
        $this->db->where('store_qty !=','0');
        $query = $this->db->get('store');
        $res = $query->result();
        return $res;
     }

     /////////////////////////////////////////////////////// doc issue ใบเบิก
     public function getdocissue()
     {
        $this->db->select('*');
        $this->db->from('ic_issue_h');
        $this->db->join('member','member.m_id = ic_issue_h.is_reqname','left outer');
        $this->db->join('project','project.project_id = ic_issue_h.is_project','left outer');
        $this->db->join('system','system.systemid = ic_issue_h.is_system','left outer');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
     }
      
     public function getdocissue_d($id)
     {
        $this->db->select('*');
        $this->db->where('isi_doccode',$id);
        $query = $this->db->get('ic_issue_d');
        $res = $query->result();
        return $res;
     }
     
}
