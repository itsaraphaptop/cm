<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class count_m extends CI_Controller {

        function __construct() {

            parent::__construct();
        }
        public function sumpo()
        {
                    $this->db->select_sum('poi_netamt','potot');
                    $oo = $this->db->get('po_item');
                    $ores = $oo->result();
                    return $ores;
        }
        public function countprapprove()
        {
        	$this->db->select('*');
        	$this->db->where('pr_approve','approve');
        	$query = $this->db->get('pr');
        	$res = $query->num_rows();
        	return $res;
        }
        public function countprdisapprove()
        {
        	$this->db->select('*');
        	$this->db->where('pr_approve','wait');
        	$query = $this->db->get('pr');
        	$res = $query->num_rows();
        	return $res;
        }
         public function countpr()
        {
          $this->db->select('*');
          $query = $this->db->get('pr');
          $result = $query->num_rows();
          return $result;
        }

        public function countprapproveproj($projid)
        {
          $this->db->select('*');
          $this->db->where('pr_project',$projid);
          $this->db->where('pr_approve','approve');
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
        public function countprdisapproveproj($projid)
        {
          $this->db->select('*');
          $this->db->where('pr_project',$projid);
          $this->db->where('pr_approve','wait');
          $query = $this->db->get('pr');
          $res = $query->num_rows();
          return $res;
        }
         public function countprproj($projid)
        {
          $this->db->select('*');
          $this->db->where('pr_project',$projid);
          $query = $this->db->get('pr');
          $result = $query->num_rows();
          return $result;
        }

     public function countpr_p($id)
    {
      $this->db->select('*');
      $this->db->where('pr_project',$id);
      $query = $this->db->get('pr');
      $result = $query->num_rows();
      return $result;
    }
        public function countprapprove_p($id)
        {
            $this->db->select('*');
            $this->db->where('pr_approve','approve');
            $this->db->where('pr_project',$id);
            $query = $this->db->get('pr');
            $res = $query->num_rows();
            return $res;
        }
        public function countprdisapprove_p($id)
        {
            $this->db->select('*');
            $this->db->where('pr_approve','wait');
            $this->db->where('pr_project',$id);
            $query = $this->db->get('pr');
            $res = $query->num_rows();
            return $res;
        }

        public function count_user()
       {
         $this->db->select('*');
         $this->db->where('m_type',"employee");
         $query = $this->db->get('member');
         $result = $query->num_rows();
         return $result;
       }
       public function projall($compcode)
       {
         $this->db->select('*');
         $this->db->where('compcode',$compcode);
         $query = $this->db->get('project');
         $result = $query->num_rows();
         return $result;
       }
       public function poall($compcode)
       {
         $this->db->select('*');
         $this->db->where('compcode',$compcode);
         $query = $this->db->get('po');
         $result = $query->num_rows();
         return $result;
       }
       public function poappall($compcode)
       {
         $this->db->select('*');
         $this->db->where('compcode',$compcode);
         $this->db->where('po_approve','approve');
         $this->db->where('apv_open','yes');
         $query = $this->db->get('po');
         $result = $query->num_rows();
         return $result;
       }
       public function powait($compcode)
       {
         $this->db->select('*');
         $this->db->where('compcode',$compcode);
         $this->db->where('po_approve','wait');
         $query = $this->db->get('po');
         $result = $query->num_rows();
         return $result;
       }
       public function getemp()
       {
         $this->db->select('*');
         $this->db->order_by('m_id','desc');
         $this->db->limit(1);
         $query = $this->db->get('member');
         $res = $query->result();
         return $res;
       }
       public function countinv($compcode)
       {
         $this->db->select('*');
         $this->db->where('compcode',$compcode);
         $query = $this->db->get('ar_inv_header');
         $result = $query->num_rows();
         return $result;
       }

       public function license()
       {
        $otherdb = $this->load->database('db2', TRUE);
 $query = $otherdb->select('compcode, license')->get('license');
  return $query;
       }
}
