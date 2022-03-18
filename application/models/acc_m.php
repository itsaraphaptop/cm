<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class acc_m extends CI_Controller {
        public function __construct() {
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
     public function getporecnoac()
     {
        $this->db->select('*');
        $this->db->from('po_receive');
        $this->db->join('project', 'project.project_id = po_receive.project','left outer');
        $this->db->join('department','department.department_id = po_receive.department','left outer');
        $this->db->where('ic_status','full');
        $this->db->where('apv_status','no');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
     }
     public function getallpettycash()
    {
      $this->db->select('*');
      $this->db->from('pettycash');
      $this->db->join('project', 'project.project_id = pettycash.project','left outer');
      $this->db->join('department','department.department_id = pettycash.department','left outer');
      $this->db->where('status',null);
      $this->db->where('approve',"approve");
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
        public function ins_apv_h($data)
        {
        	if($this->db->insert('apv_header',$data))
        	{
        		return true;
        	}
        	else
        	{
        		return false;
        	}

        }
         public function getapvall()
        {
            $this->db->select('*');
            $this->db->order_by('apv_id','desc');
            $query = $this->db->get('apv_header');
            $res = $query->result();
            return $res;
        }
        public function getapv()
        {
            $this->db->select('*');
            $this->db->where('apv_status','wait');
            $this->db->order_by('apv_id','desc');
            $query = $this->db->get('apv_header',5);
            $res = $query->result();
            return $res;
        }
        public function getapproveapv()
        {
            $this->db->select('*');
            $this->db->where('apv_status','approve');
            $query = $this->db->get('apv_header',5);
            $res = $query->result();
            return $res;
        }
         public function getwaitapproveapv()
        {
            $this->db->select('*');
            $this->db->where('apv_status','dapprove');
            $query = $this->db->get('apv_header',5);
            $res = $query->result();
            return $res;
        }

         public function ins_apo_h($data)
        {
            if($this->db->insert('apo_header',$data))
            {
                return true;
            }
            else
            {
                return false;
            }

        }

         public function getapoall()
        {
            $this->db->select('*');
            $this->db->order_by('apo_id','desc');
            $query = $this->db->get('apo_header');
            $res = $query->result();
            return $res;
        }

        public function retrive_apvdetail($id)
        {
          $this->db->select('*');
          $this->db->where('apvi_ref',$id);
          $this->db->order_by('apvi_id','asc');
          $query = $this->db->get('apv_detail');
          $res = $query->result();
          return $res;
        }

        public function getnewapv($id)
        {
          $this->db->select('*');
          $this->db->from('apv_header');
          $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer');
          $this->db->join('department','department.department_id = apv_header.apv_department','left outer');
          $this->db->join('vender','vender.vender_name = apv_header.apv_vender','left outer');
          $this->db->where('apv_code',$id);
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
}