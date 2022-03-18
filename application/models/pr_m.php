<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pr_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function count_all_receive()
    {
        return 0;
    }
    function count_error_receive()
    {
        return 0;
    }
    public function pr_count_row()
    {
        $this->db->select('*');
        $qu = $this->db->get('pr');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
        return $res;
    }
    public function npr_count_row($compcode,$projectid)
    {
        $this->db->select('*');
        $this->db->where('pr_project',$projectid);
        $this->db->where('compcode',$compcode);
        $qu = $this->db->get('pr');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
        return $res;
    }

    public function pb_count_row()
    {
        $this->db->select('*');
        $qu = $this->db->get('pr_booking');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
        return $res;
    }

    public function pr_count_bk()
    {
        $this->db->select('*');
        $qu = $this->db->get('pr_booking');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
        return $res;
    }
    function get_pr_project($id)
    {
         $this->db->select('*');
         $this->db->where('pr_project',$id);
         $this->db->where('pr_status','enable');
        $query = $this->db->get('pr');
        $result = $query->result();

        return $result;
    }
    function get_pr_project_approve($id)
    {
         $this->db->select('*');
         $this->db->where('pr_project',$id);
         $this->db->where('pr_approve','wait');
        $query = $this->db->get('pr');
        $result = $query->result();

        return $result;
    }
    function get_pr_num($id)
    {
         $this->db->select('pr_prid');
         $this->db->where('pr_status','enable');
         $this->db->where('pr_project',$id);
        $query = $this->db->get('pr');
        $result = $query->num_rows();

        return $result;
    }
    function get_pr_waitapprove($id)
    {
          $this->db->select('pr_prid');
         $this->db->where('pr_approve','wait');
         $this->db->where('pr_project',$id);
        $query = $this->db->get('pr');
        $result = $query->num_rows();

        return $result;

    }
    function get_receive_num($id)
    {
         $this->db->select('por_id');
         $this->db->where('por_status','enable');
          $this->db->where('por_project',$id);
        $query = $this->db->get('po_r');
        $result = $query->num_rows();

        return $result;
    }
  function getpr_num()
    {
        $this->db->select('*');
        $this->db->order_by('pr_prid','desc');
        $this->db->limit('1');
        $query = $this->db->get('pr');
        return $query->result();
    }
  function ngetpr_num($month,$compcode,$projectid)
    {
        $this->db->select('month(pr_prdate) as pr_prdate');
        $this->db->where('month(pr_prdate)',$month);
        $this->db->where('pr_project',$projectid);
        $this->db->where('compcode',$compcode);
        $this->db->order_by('pr_prid','desc');
        $this->db->limit('1');
        $query = $this->db->get('pr');
        return $query->result_array();
    }
  function cgetpr_num($month,$compcode,$projectid)
    {
        $this->db->select('*');
        $this->db->where('month(pr_prdate)',$month);
        $this->db->where('pr_project',$projectid);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('pr');
        return $query->num_rows();
    }

    function getpb_num()
    {
        $this->db->select('*');
        $this->db->order_by('prbk_id','desc');
        $this->db->limit('1');
        $query = $this->db->get('pr_booking');
        return $query->result();
    }

    function getbk_num()
    {
        $this->db->select('*');
        $this->db->order_by('prbk_id','desc');
        $this->db->limit('1');
        $query = $this->db->get('pr_booking');
        return $query->result();
    }

        function getpr_view($id)
    {
        $this->db->select('*');
        $this->db->where('pr_prno',$id);
        $this->db->order_by('pr_prid','desc');
        $this->db->limit('1');
        $query = $this->db->get('pr');
        return $query->result();
    }

     function getpr()
    {
        $this->db->select('*');
        $this->db->order_by('pr_prid','desc');
        $res = $this->db->get('pr');
        return $res->result();
    }
    function getprtopo()
    {
        $this->db->select('*');
        $this->db->where('pr_status','enable');
        $this->db->where('pr_approve','approve');
        $this->db->order_by('pr_prid','desc');
        $res = $this->db->get('pr');
        return $res->result();
    }

       function getprtopoid($id)
    {
        $this->db->select('*');
        $this->db->where('pr_status','enable');
        $this->db->where('pr_approve','approve');
        $this->db->where('pr_prno',$id);
        $this->db->order_by('pr_prid','desc');
        $res = $this->db->get('pr');
        return $res->result();
    }

    function getpr_item($id)
    {
        $this->db->select('*');
        $this->db->where('pri_ref',$id);
        $query = $this->db->get('pr_item');
        return $query->result();
    }
      function getpr_itemi($id,$pj)
    {
        $this->db->select('*');
        $this->db->where('pri_ref',$id);
        $this->db->where('pri_project',$pj);
        $query = $this->db->get('pr_item');
        return $query->result();
    }
    function getpr_itemitem($id,$project)
    {
        $this->db->select('*');
        $this->db->where('pri_ref',$id);
        $this->db->where('pri_project',$project);
        $query = $this->db->get('pr_item');
        return $query->result();
    }
    function getbk_itemi($id)
    {
        $this->db->select('*');
        $this->db->where('prbki_ref',$id);
        $query = $this->db->get('pr_booking_item');
        return $query->result();
    }

    function getpr_runno()
    {
        $this->db->select('*');
        $query = $this->db->get('prefix');
        return $query->result();

    }


    function encode_64($data)
    {
        $base_64 = base64_encode($data);
        $url = rtrim($base_64, '=');
        return $url;
    }
    function decode_64($url_param)
    {
        $base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);
        $data = base64_decode($base_64);
        return $data;
    }

     function getedit_pr($id,$projecid)
    {
        $this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
        $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('pr_prno',$id);
        $this->db->where('pr_project',$projecid);
        $this->db->order_by('pr_prid','desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function getprfile($id,$compcode)
    {
      $this->db->select('name_file');
      $this->db->where('pr_ref',$id);
      $this->db->where('user',$compcode);
      $q = $this->db->get('select_file_pr')->result();
      return $q;
    }

     function getedit_bk($id)
    {
        $this->db->select('*');
        $this->db->from('pr_booking');
        $this->db->join('project', 'project.project_id = pr_booking.prbk_project','left outer');
        // $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('prbk_no',$id);
        $this->db->order_by('prbk_id','desc');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getallpr()
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }

    public function getprproj($projid,$flag)
    {
       $session_data = $this->session->userdata('sessed_in');
       $compcode = $session_data['compcode'];
      if($flag=='p'){
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      // $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_project',$projid);
      $this->db->where('pr.compcode',$compcode);
      // $this->db->where('pr_status','enable');
      // $this->db->order_by('pr_prdate', 'desc');
      // $this->db->order_by('pr_prid', 'desc');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    if($flag=='d'){
      $this->db->select('*');
      $this->db->from('pr');
      // $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_department',$projid);
      $this->db->where('pr.compcode',$compcode);
      // $this->db->where('pr.pr_status','enable');
      $query = $this->db->get();
      $res = $query->result();
      return $res;

    }
    }
    public function getprprojall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->where('pr_status','enable');
      $this->db->where('pr.compcode',$compcode);
      $this->db->join('project', 'project.project_id = pr.pr_project','left');
      $this->db->join('department','department.department_id = pr.pr_department','left');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
     public function getprproj_status($projid,$status)
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      if ($status=="") {
        $this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
        // $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('pr_project',$projid);
        // $this->db->where('pr_approve',$status);
        // $this->db->where('pr_status','enable');
        $this->db->where('pr.compcode',$compcode);
        $this->db->order_by('pr_prdate','desc');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }else{

        $this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
        // $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('pr_project',$projid);
        $this->db->where('pr_approve',$status);
        // $this->db->where('pr_status','enable');
        $this->db->where('pr.compcode',$compcode);
        $this->db->order_by('pr_prdate','desc');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }
     
    }
    public function getprproj_status_all($status)
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_approve',$status);
      $this->db->where('pr_status','enable');
      $this->db->where('pr.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getprproj_status_poopen($projid,$status,$po)
   {
     $session_data = $this->session->userdata('sessed_in');
     $compcode = $session_data['compcode'];
     $this->db->select('*');
     $this->db->from('pr');
     $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
     $this->db->join('department','department.department_id = pr.pr_department','left outer');
     $this->db->where('pr_project',$projid);
     $this->db->where('pr_approve',$status);
     $this->db->where('po_open',$po);
     $this->db->where('pr_status','enable');
     $this->db->where('pr.compcode',$compcode);
     $query = $this->db->get();
     $res = $query->result();
     return $res;
   }
     public function getprproj_status_poopen_all($status,$po)
   {
     $session_data = $this->session->userdata('sessed_in');
     $compcode = $session_data['compcode'];
     $this->db->select('*');
     $this->db->from('pr');
     $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
     $this->db->join('department','department.department_id = pr.pr_department','left outer');
     $this->db->where('pr_approve',$status);
     $this->db->where('po_open',$po);
     $this->db->where('pr_status','enable');
     $this->db->where('pr.compcode',$compcode);
     $query = $this->db->get();
     $res = $query->result();
     return $res;
   }
     public function getallprapprove()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_approve','approve');
      $this->db->where('pr.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
     public function getallprwait()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_approve','wait');
      $this->db->where('pr.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
     public function getallprt()
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getwait_approve()
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_approve','wait');
      $this->db->or_where('pr_approve','approve');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallprwaitproj($projid)
   {
     $this->db->select('*');
     $this->db->from('pr');
     $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
     $this->db->join('department','department.department_id = pr.pr_department','left outer');
     $this->db->where('pr_project',$projid);
     $this->db->where('pr_approve','wait');
     $this->db->where('po_open','no');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
   }
   public function getallprwaitdep($projid)
  {
    $this->db->select('*');
    $this->db->from('pr');
    $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
    $this->db->join('department','department.department_id = pr.pr_department','left outer');
    $this->db->where('pr_department',$projid);
    $this->db->where('pr_approve','wait');
    $query = $this->db->get();
    $res = $query->result();
    return $res;
  }
   public function getallprwait5($projid)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_project',$projid);
      $this->db->where('pr_approve','wait');
      $this->db->order_by('pr_prid','desc');
      $this->db->where('po_open','no');
      $this->db->limit('10');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallprwait5_dep($projid)
     {
       $this->db->select('*');
       $this->db->from('pr');
       $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
       $this->db->join('department','department.department_id = pr.pr_department','left outer');
       $this->db->where('pr_department',$projid);
       $this->db->where('pr_approve','wait');
       $this->db->order_by('pr_prid','desc');
       $this->db->limit('10');
       $query = $this->db->get();
       $res = $query->result();
       return $res;
     }
    public function getallprdirectorwait5()
     {
       $this->db->select('*');
       $this->db->from('pr');
       $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
       $this->db->join('department','department.department_id = pr.pr_department','left outer');
       $this->db->where('pr_approve','pmapprove');
       $this->db->order_by('pr_prid','desc');
       $this->db->limit('10');
       $query = $this->db->get();
       $res = $query->result();
       return $res;
     }
    public function getallprdirectorwait5w($projid)
     {
       $this->db->select('*');
       $this->db->from('pr');
       $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
       $this->db->join('department','department.department_id = pr.pr_department','left outer');
       $this->db->where('pr_project',$projid);
       $this->db->where('pr_approve !=','approve');
       $this->db->where('pr_approve !=','disapprove');
       $this->db->order_by('pr_prid','desc');
       $this->db->where('po_open','no');
       $this->db->limit('10');
       $query = $this->db->get();
       $res = $query->result();
       return $res;
     }
     public function getallprdirectorwait5w_dep($projid)
      {
        $this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
        $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('pr_project',$projid);
        $this->db->where('pr_approve','wait');
        $this->db->order_by('pr_prid','desc');
        $this->db->limit('10');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }
    public function getallprwait5n()
     {
       $this->db->select('*');
       $this->db->from('pr');
       $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
       $this->db->join('department','department.department_id = pr.pr_department','left outer');
       // $this->db->where('pr_project',$projid);
       $this->db->where('pr_approve','wait');
       $this->db->order_by('pr_prid','desc');
       $this->db->limit('10');
       $query = $this->db->get();
       $res = $query->result();
       return $res;
     }
    public function getallpraprrove5($projidc)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_project',$projidc);
      $this->db->where('pr_approve','approve');
      $this->db->order_by('approve_date','desc');
      $this->db->where('po_open','no');
      $this->db->limit('100');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallpraprrove5_dep($projid)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_department',$projid);
      $this->db->where('pr_approve','approve');
      $this->db->order_by('approve_date','desc');
      $this->db->limit('10');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallprpmaprrove5($projid)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_project',$projid);
      $this->db->where('pr_approve !=','wait');
      $this->db->order_by('approve_date','desc');
      $this->db->where('po_open','no');
      $this->db->limit('10');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallprpmaprrove5_dep($projid)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_department',$projid);
      $this->db->where('pr_approve !=','wait');
      $this->db->order_by('approve_date','desc');
      $this->db->limit('10');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallpraprrove5n()
      {
        $this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
        $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('pr_approve !=','approve');
        $this->db->order_by('approve_date','desc');
        $this->db->limit('10');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

    public function getmember($username,$compcode)
    {
      $this->db->select('*');
      $this->db->where('m_user',$username);
      $this->db->where('compcode',$compcode);
      
      $query = $this->db->get('member');
      $res = $query->result();
      return $res;
    }

    public function getprdetail($pr,$compcode){
      $this->db->select('pri_matname,pri_qty,pri_unit');
      $this->db->where('pri_ref',$pr);
      $this->db->where('compcode',$compcode);
      $res = $this->db->get('pr_item')->result();
      return $res;
    }


    
    public function getlineid($username,$compcode)
    {
      $this->db->select('m_name,lineid,m_email');
      $this->db->where('m_id',$username);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('member')->result_array();
      return  $query;
     
     
    }

    public function getname($username,$compcode){
      $this->db->select('m_name');
      $this->db->where('m_id',$username);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('member');
      $res = $query->result();
      foreach ($res as $key => $value) {
        return $value->m_name;
      }
    }

    public function numpr()
    {
      $this->db->select('app_id');
      $this->db->order_by('app_id','desc');
      $this->db->limit(1);
      $num = $this->db->get('approve_pr')->result();
      foreach ($num as $key => $value) {
        return $value->app_id;
      }
    }

    public function pr_detail_not_open_po($prno)
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('pr_item','pr_item.pri_ref = pr.pr_prno','left outer');
      $this->db->where('pr_approve','approve');
      $this->db->where('pri_status','no');
      $this->db->where('pr.compcode',$compcode);
      $q = $this->db->get()->result();

      return $q;
    }

    public function countwait_project($year,$mount,$compcode,$modal,$project)
    {
      $this->db->select('count(bi_project) as wait,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_project',$project);
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }
    public function countwait_department($year,$mount,$compcode,$modal,$dep)
    {
      $this->db->select('count(bi_department) as wait,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_department',$dep);
      // $this->db->where('bi_status','wait');
      $res = $this->db->get('bi_views_department')->result();
      return $res;
    }


    public function countappove_project($year,$mount,$compcode,$modal,$project)
    {
      $this->db->select('count(bi_project) as approve,bi_approve,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_project',$project);
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }

    public function countappove_department($year,$mount,$compcode,$modal,$dep)
    {
      $this->db->select('count(bi_department) as approve,bi_approve,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_department',$dep);
      $res = $this->db->get('bi_views_department')->result();
      return $res;
    }

    public function apppr($pjcode){
      $this->db->select('*');
      $this->db->from('approve_pr');
      $this->db->where('app_project',$pjcode);
      // $this->db->where('type',"C");
      $this->db->group_by('app_pr'); 
      $qpj=$this->db->get()->result();
      return $qpj;
    }
    public function apppruser($pjcode,$username,$prno){
      $this->db->select('*');
      $this->db->from('approve_pr');
      $this->db->where('app_project',$pjcode);
      $this->db->where('app_pr',$prno);
      // $this->db->where('type',"C");
      // $this->db->group_by('app_pr'); 
      $qpj=$this->db->get()->result();
      return $qpj;
    }

    public function getpr_line($prno){
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->where('pr.pr_prno',$prno);
      $query = $this->db->get();
      $res = $query->result_array();
      return $res;
    }

    public function allproject_prstatus($id,$user) {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('approve_pr','approve_pr.app_pr = pr.pr_prno');
      $this->db->join('project', 'project.project_id = pr.pr_project');
      $this->db->where('pr_project', $id);
      $this->db->where('app_midid',$user);
      $this->db->where('pr_approve', 'approve');
      $this->db->group_by('pr_prno');
      $res = $this->db->get()->result();
      return $res;
    }
    public function chkpoopen($prno){
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->where('pr_prno',$prno);
      $res = $this->db->get();
      return count($res);
    }
}
