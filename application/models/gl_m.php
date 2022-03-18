<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl_m extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
        public function SelectDepartment(){
          $this->db->select('*');
          $this->db->from('gl_department');
          $query = $this->db->get();
          $res = $query->result();
          return $res;

        }
      public function editshow($id_dep,$editshow){
        $this->db->where('id_dep',$id_dep);
        $q = $this->db->update('gl_department',$editshow);
        if ($q) {
          return true;
        }
      }
      public function SelectNewAccount(){
        $this->db->select('*');
        $this->db->from('ac_bookac');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }
      public function glshow($compcode){
        $this->db->select('*');
        $this->db->where("compcode",$compcode);
        $q = $this->db->get('gl_period');
        $output = $q->result();
        return $output;
      }
      public function getbook_account()
      {
        $this->db->select('*');
        $q = $this->db->get('gl_book')->result();
        return $q;
      }

      public function getjournal_header($no)
      {
        $this->db->select('*');
        $this->db->where('vchno',$no);
        $query = $this->db->get('gl_batch_header');
        $res = $query->result();
        return $res;
      }

      public function getjournal_detail($no)
      {
        $this->db->select('*');
        $this->db->where('vchno',$no);
        $query = $this->db->get('gl_batch_details');
        $res = $query->result();
        return $res;
      }


      public function getjournal()
      {
        $this->db->select('*');
        $query = $this->db->get('gl_batch_header');
        $res = $query->result();
        return $res;
      }

      public function get_account()
      {
        $this->db->select('*');
        $this->db->where('act_status',"on");
        $this->db->order_by('act_code');
        $query = $this->db->get('account_total');
        $res = $query->result();
        return $res;
      }

      public function get_project()
      {
        $this->db->select('*');
        $this->db->order_by('project_id');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
      }

      public function get_project_f()
      {
        $this->db->select('*');
        $this->db->order_by('project_id');
        $this->db->limit('1');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
      }
      public function get_project_t()
      {
        $this->db->select('*');
        $this->db->order_by('project_id','DESC');
        $this->db->limit('1');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
      }
      public function book_v()
    {
      $this->db->select('*');
      $query = $this->db->get('gl_book');
      $res = $query->result();
      return $res;
    }

      public function account_m()
    {
      $this->db->select('*');
      $this->db->where('act_status',"on");
      $query = $this->db->get('account_total');
      $res = $query->result();
      return $res;
    }

    public function getproject()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->where('project_status','normal');
        $this->db->where('compcode',$compcode);
        $this->db->order_by('project_id','desc');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
    }

    public function system_m()
    {
      $this->db->select('*');
      $query = $this->db->get('system');
      $res = $query->result();
      return $res;
    }

    public function department()
    {
        $this->db->select('*');
        $query = $this->db->get('department');
        $res = $query->result();
        return $res;
    }
    public function allcostcode()
    {
        $this->db->select('*');
        $this->db->from('cost_type');
        $this->db->join('cost_group','cost_group.ctype_code = cost_type.ctype_code');
        $this->db->join('cost_subgroup','cost_subgroup.cgroup_code = cost_group.cgroup_code AND cost_subgroup.ctype_code = cost_type.ctype_code');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
    public function getvender()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->where('compcode',$compcode);
      $this->db->order_by('vender_id','desc');
      $query = $this->db->get('vender');
      $res = $query->result();
      return $res;
    }

    public function getmember()
    {
        $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('project','project.project_id = member.m_project','left outer');
        $this->db->join('department','department.department_id = member.m_department','left outer');
        $this->db->join('emp_profile_tb','emp_profile_tb.emp_member = member.m_code','left outer');
        $this->db->join('emp_contact_tb','emp_contact_tb.emp_member = member.m_code','left outer');
        $this->db->where('member.compcode',$compcode);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function getglpost_ar($year,$month)
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->where('gl_year',$year);
      $this->db->where('gl_period',$month);
      $query = $this->db->get('gl_post_ar');
      $res = $query->result();
      return $res;
    }

    public function getglpost_ap($year,$month)
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->join('account_total','account_total.act_code = gl_post_ap.gl_actcode','left outer');
      $this->db->where('gl_year',$year);
      $this->db->where('gl_period',$month);
      $this->db->where('gl_post_ap.compcode',$compcode);
      $query = $this->db->get('gl_post_ap');
      $res = $query->result();
      return $res;
    }

     public function glvchno($glyear,$glperiod){
      $this->db->select('*');
      $this->db->where('glyear',$glyear);
      $this->db->where('glperiod',$glperiod);
      $this->db->where('post',"wait");
      $this->db->order_by('vchno','asc');

      $query = $this->db->get('gl_batch_header');
      $res = $query->result();
      return $res;
     }

     public function detail_glvchno($id,$type){

      if($type=="AP"){
      $this->db->select('*');
      $this->db->where('vchno_gl',$id);
      $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
      $this->db->join('project', 'project.project_id = ap_gl.projectid');
      $this->db->join('system', 'system.systemcode = ap_gl.systemcode');
      $this->db->order_by('ap_gl.vchno', 'asc');
      $query = $this->db->get('ap_gl');
      $res = $query->result();
      return $res;
      }else if($type=="AR"){
      $this->db->select('*');
      $this->db->where('vchno_gl',$id);
      $this->db->join('account_total', 'account_total.act_code = ar_gl.acct_no');
      $this->db->join('project', 'project.project_id = ar_gl.projectid');
      $this->db->join('system', 'system.systemcode = ar_gl.systemcode');
      $this->db->order_by('ar_gl.vchno', 'asc');
      $query = $this->db->get('ar_gl');
      $res = $query->result();
      return $res;
      }
     }

     public function setup_tax(){
      $this->db->select('*');
      $query = $this->db->get('setup_tax');
      $res = $query->result();
      return $res;
     }

     public function setup_taxdes(){
      $this->db->select('*');
      $query = $this->db->get('setup_taxdes');
      $res = $query->result();
      return $res;
     }

     public function setup_taxtype(){
      $this->db->select('*');
      $query = $this->db->get('setup_taxtype');
      $res = $query->result();
      return $res;
     }
     
     public function detail_posting_d ($year,$month){

      $this->db->select('*');
      $this->db->where('glyear',$year);
      $this->db->where('glperiod',$month);
      $this->db->where('post !=','P');
      $this->db->join('gl_batch_details','gl_batch_details.vchno = gl_batch_details.vchno');
      $gl = $this->db->get('gl_batch_header');
      $a = $gl->result();
       return $a;

       
     }

     public function detail_posting_h ($year,$month){

      $this->db->select('*');
      $this->db->where('glyear',$year);
      $this->db->where('glperiod',$month);
      $this->db->where('post !=','P');
      $gl = $this->db->get('gl_batch_header');
      $a = $gl->result();
       return $a;

       
     }
}
