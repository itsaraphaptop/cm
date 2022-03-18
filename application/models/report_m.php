 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report_m extends CI_Controller {
	  public function __construct() {
            parent::__construct();
        }

        public function query($module,$type){
            $this->db->select('*');
            $this->db->where('module',$module);
            $this->db->where('type',$type);
            $q = $this->db->get('report')->result();
            return $q;
        }
        public function query_comp($module,$type,$compcode){
            $this->db->select('*');
            $this->db->where('module',$module);
            $this->db->where('type',$type);
            $this->db->where('compcode',$compcode);
            $q = $this->db->get('report')->result();
            return $q;
        }
        public function open_report($module,$type,$reportname){
            $this->db->select('*');
            $this->db->where('module',$module);
            $this->db->where('type',$type);
            $this->db->where('report1',$reportname);
            $q = $this->db->get('report')->result();
            return $q;
        }
        public function load_report($report){
            $this->db->select('*');
            $this->db->where('report1',$report);
            $q = $this->db->get('report')->result();
            return $q;
        }
        public function allreport(){
            $this->db->select('*');
            $q = $this->db->get('report')->result();
            return $q;
        }

        public function report_po($id)
        {
        	$this->db->select('poi_ref, COUNT(poi_ref) as total');
			$this->db->group_by('poi_ref');
			$this->db->where('poi_ref',$id);
			$query = $this->db->get('po_item');
        	$res = $query->result();
        	return $res;
        }

        public function apv_report($id)
        {
            $this->db->select('*');
            $this->db->from('apv_header');
            $this->db->join('project','project.project_id = apv_header.apv_project','left outer');
            $this->db->join('department','department.department_id = apv_header.apv_department','left outer');
            $this->db->where('apv_header.apv_code',$id);
            $query = $this->db->get();
            $res = $query->result();
            return $res;

        }
         public function apo_report($id)
        {
            $this->db->select('*');
            $this->db->from('apo_header');
            $this->db->join('project','project.project_id = apo_header.apo_project','left outer');
            $this->db->join('department','department.department_id = apo_header.apo_department','left outer');
            $this->db->where('apo_header.apo_code',$id);
            $query = $this->db->get();
            $res = $query->result();
            return $res;

        }
 public function countpettycast_detail($id)
     {
         $this->db->select('*');
        $this->db->where('pettycashi_ref',$id);
        $query = $this->db->get('pettycash_item');
        $res = $query->num_rows();
        return $res;
     }
     public function getpettycash_detail($id)
     {
         $this->db->select('*');
        $this->db->where('pettycashi_ref',$id);
        $query = $this->db->get('pettycash_item');
        $res = $query->result();
        return $res;
     }
    public function getdocissue_print($id)
     {
        $this->db->select('*');
        $this->db->from('ic_issue_h');
        $this->db->join('member','member.m_id = ic_issue_h.is_reqname','left outer');
        $this->db->join('project','project.project_id = ic_issue_h.is_project','left outer');
        $this->db->join('system','system.systemid = ic_issue_h.is_system','left outer');
        $this->db->where('is_doccode',$id);
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
     public function getporec_detail($id)
     {
         $this->db->select('*');
        $this->db->where('poi_ref',$id);
        $query = $this->db->get('po_recitem');
        $res = $query->result();
        return $res;
     }
     public function countporec_detail($id)
     {
         $this->db->select('*');
        $this->db->where('poi_ref',$id);
        $query = $this->db->get('po_recitem');
        $res = $query->num_rows();
        return $res;
     }
     public function getdocbook_print($id)
      {
         $this->db->select('*');
         $this->db->from('ic_booking');
         $this->db->join('project','project.project_id = ic_booking.from_project','left outer');
         $this->db->where('book_code',$id);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
      }
      public function getdocbook_d($id)
      {
         $this->db->select('*');
         $this->db->where('ref_codetransfer',$id);
         $query = $this->db->get('ic_bookingitem');
         $res = $query->result();
         return $res;
      }
      public function load_stock_card(){
         $this->db->select('stockcard.stock_matname');
         $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
         $this->db->join('project','stockcard.stock_project = project.project_id');
         $this->db->group_by('stockcard.stock_matname');
         $query1 = $this->db->get('stockcard');  

         $this->db->select('store.wh');
         $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
         $this->db->join('project','stockcard.stock_project = project.project_id'); 
         $this->db->group_by('store.wh');
         $query2 = $this->db->get('stockcard');

         $this->db->select('stockcard.stock_matcode');
         $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
         $this->db->join('project','stockcard.stock_project = project.project_id'); 
         $this->db->group_by('stockcard.stock_matcode');
         $query3 = $this->db->get('stockcard');
         
         $res['stock_name'] = $query1->result();
         $res['stock_wh'] = $query2->result();
         $res['stock_matcode'] = $query3->result();
         return $res;
      }
      public function getprintdefualt(){
		$this->db->select('print_defualt');
		$q = $this->db->get('setup_default')->result_array();
		return $q[0]['print_defualt'];
	}

        
}
