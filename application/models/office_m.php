<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class office_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    //////////////////////////
    ///  PO AND LOI
    /////////////////////////
    public function getlineid($username,$compcode)
    {
      $this->db->select('lineid,m_email,m_name');
      $this->db->where('m_id',$username);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('member');
      $res = $query->result_array();
      return $res;
     
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
    public function receive_po()
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('project', 'project.project_id = po.po_project','left outer');
      $this->db->join('department','department.department_id = po.po_department','left outer');
      $this->db->join('system','system.systemid = po.po_system','left outer');
      $this->db->order_by('po_approve','asc');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function retrive_po($id)
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('project','project.project_id = po.po_project','left outer');
      $this->db->join('department','department.department_id = po.po_department','left outer');
      $this->db->join('system','system.systemid = po.po_system','left outer');
      $this->db->where('po_pono',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function retrive_poi_receive($id)
    {
      $this->db->select('*');
      $this->db->where('poi_ref',$id);
      $this->db->order_by('poi_id','asc');
      $query = $this->db->get('receive_poitem');
      $res = $query->result();
      return $res;
    }
    public function retrive_poi($id)
    {
      $this->db->select('*');
      $this->db->where('poi_ref',$id);
      $this->db->order_by('poi_id','asc');
      $query = $this->db->get('po_item');
      $res = $query->result();
      return $res;
    }
    public function retrive_openpri($id)
    {
      $this->db->select('*');
      $this->db->where('pri_ref',$id);
      $this->db->order_by('pri_id','asc');
      $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;
    }
     public function retrive_openpri_po($id,$po)
    {
      $this->db->select('*');
      $this->db->where('pri_ref',$id);
      $this->db->where('pri_pono',$po);
      $this->db->order_by('pri_id','asc');
      $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;
    }
    public function retrive_openprinull($id)
    {
      $this->db->select('*');
      $this->db->where('pri_ref',$id);
      $this->db->where('pri_status',null);
      $this->db->order_by('pri_id','asc');
      $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;
    }
    public function retrive_openprihh($id)
    {
      $this->db->select('*');
      $this->db->where('pri_ref',$id);
      $this->db->where('pri_status',null);
      $this->db->where('pri_pono','no');
      $this->db->order_by('pri_id','asc');
      $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;
    }
    public function receive_loi($username,$code,$type)
    {
      if($type=="p"){
      $this->db->select('*');
      $this->db->from('lo');
      $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
      // $this->db->join('department','department.department_id = lo.department','left outer');
      $this->db->join('vender','vender.vender_id = lo.contact','left outer');
      $this->db->join('member','member.m_name = lo.user','left outer');
      $this->db->where('projectcode',$code);
      // $this->db->where('lo.user',$username);
      // $this->db->where('lo.status !=',"delete");
      $query = $this->db->get();
      $res = $query->result();
      }else{
      $this->db->select('*');
      $this->db->from('lo');
      // $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
      $this->db->join('department','department.department_id = lo.dpid','left outer');
      $this->db->join('vender','vender.vender_id = lo.contact','left outer');
      $this->db->join('member','member.m_name = lo.user','left outer');
      $this->db->where('dpid',$code);
      // $this->db->where('lo.user',$username);
      $query = $this->db->get();
      $res = $query->result();
      }
      
      return $res;
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
       public function count_user()
       {
         $this->db->select('*');
         $this->db->where('m_type',"employee");
         $query = $this->db->get('member');
         $result = $query->num_rows();
         return $result;
       }
    public function countpo()
    {
      $this->db->select('*');
      $query = $this->db->get('po');
      $result = $query->num_rows();
      return $result;
    }
    public function countpoproj($id)
    {
      $this->db->select('*');
      $this->db->where('po_project',$id);
      $query = $this->db->get('po');
      $result = $query->num_rows();
      return $result;
    }

    public function countpr()
    {
      $this->db->select('*');
      $query = $this->db->get('pr');
      $result = $query->num_rows();
      return $result;
    }

    public function getpo_h()
    {
    	$this->db->select('*');
    	$query = $this->db->get('po');
    	$res = $query->result();
    	return $res;
    }
    public function getpo_detail($id)
    {
    	$this->db->select('*');
    	$query = $this->db->get('po_item');
    	$res = $query->result();
    	return $res;
    }
    public function getlo()
    {
    	$this->db->select('*');
    	$query = $this->db->get('lo');
    	$res = $query->result();
    	return $res;
    }

    function get_projectname($id)
    {
        $this->db->select('project_name');
         $this->db->where('project_id',$id);
        $query = $this->db->get('project');
        $result = $query->result();

    return $result;
    }

    function get_dep($id)
    {
        $this->db->select('department_title');
         $this->db->where('department_id',$id);
        $query = $this->db->get('department');
        $result = $query->result();

    return $result;
    }


    public function getwaitpoapprove()
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('project', 'project.project_id = po.po_project','left outer');
      $this->db->join('department','department.department_id = po.po_department',"left outer");
      $this->db->join('system','system.systemid = po.po_system','left outer');
      $this->db->where('po.po_status','enable');
      $this->db->where('po.po_open','no');
      $this->db->where('po.po_approve','wait');
      $this->db->order_by('po_id','desc');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }

    //////////////////////////
    ///  PR
    /////////////////////////
    public function getprapprove()
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department',"left outer");
      $this->db->where('pr.pr_status','enable');
      $this->db->where('pr.po_open','no');
      $this->db->where('pr.pr_approve','approve');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function retrive_pri($id)
    {
      $this->db->select('*');
      $this->db->where('pri_ref',$id);
      $this->db->order_by('pri_id','asc');
      $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;
    }
    public function getwaitprapprove()
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department',"left outer");
      $this->db->where('pr.pr_status','enable');
      $this->db->where('pr.po_open','no');
      $this->db->where('pr.pr_approve','wait');
      $this->db->order_by('pr.pr_prid','desc');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getallpr()
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->order_by('pr_prid','asc');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getshowpr($id)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr.pr_prno',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }

    public function getshowbk($id)
    {
      $this->db->select('*');
      $this->db->from('pr_booking');
      $this->db->join('project', 'project.project_id = pr_booking.prbk_project','left outer');
      $this->db->join('member', 'member.m_id = pr_booking.prbk_member','left outer');
      // $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->where('pr_booking.prbk_no',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    //////////////////////////////////////////////////
    ////////  Petty Cash
    ///////////////////////////////////////
    public function getpettycash_d($id)
    {
      $this->db->select('*');
      $this->db->where('pettycashi_ref',$id);
      $this->db->order_by('pettycashi_id','asc');
      $query = $this->db->get('pettycash_item');
      $res = $query->result();
      return $res;
    }
    public function getallpettycash()
    {
      $this->db->select('*');
      $this->db->from('pettycash');
      $this->db->join('project', 'project.project_id = pettycash.project','left outer');
      $this->db->join('department','department.department_id = pettycash.department','left outer');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getpetty_h($id)
    {
      $this->db->select('*');
      $this->db->from('pettycash');
      $this->db->join('project', 'project.project_id = pettycash.project','left outer');
      $this->db->join('department','department.department_id = pettycash.department','left outer');
      $this->db->where('docno',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    ///  stock
    /////////////////////////
    public function getpolist($id)
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('project', 'project.project_id = po.po_project','left outer');
      $this->db->join('department', 'department.department_id = po.po_department','left outer');
      $this->db->where('project.project_code',$id);
      // $this->db->or_where('po.po_department',$id);
      $this->db->where('po.po_approve','approve');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getpolist_all()
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('project', 'project.project_id = po.po_project','left outer');
      // $this->db->join('department', 'department.department_id = po.po_department','left outer');
      // $this->db->where('project.project_code',$id);
      // $this->db->or_where('po.po_department',$id);
      $this->db->where('po.po_approve','approve');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function geticlist($id)
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      $this->db->from('receive_po');
      $this->db->join('project', 'project.project_id = receive_po.project','left outer');
      // $this->db->join('department', 'department.department_id = receive_po.department','left outer');
      $this->db->join('system', 'system.systemcode = receive_po.system','left outer');
      $this->db->where('project.project_code',$id);
      $this->db->where('receive_po.return',null);
      $this->db->where('receive_po.ic_status',"open");
      $this->db->where('receive_po.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
     public function getpolistdep($id)
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('department', 'department.department_id = po.po_department','left outer');
      $this->db->where('department_id',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getporece($id)
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('po_item', 'po_item.pr_no = po.po_prno','left outer');
      $this->db->join('project', 'project.project_id = po.po_project','left outer');
      // $this->db->join('department', 'department.department_id = po.po_department','left outer');
      $this->db->join('system','system.systemcode = po.po_system','left outer');
      $this->db->where('po_pono',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }

    public function getporece_dep($id)
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('po_item', 'po_item.pr_no = po.po_prno','left outer');
      $this->db->join('department', 'department.department_id = po.po_department','left outer');
      $this->db->join('system','system.systemcode = po.po_system','left outer');
      $this->db->where('po_pono',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
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
    function getpo_view($id)
    {
        $this->db->select('*');
        $this->db->where('po_pono',$id);
        $this->db->order_by('po_poid','desc');
        $this->db->limit('1');
        $query = $this->db->get('po');
        return $query->result();
    }
    function getproject_id($id)
    {
        $this->db->select('*');
        $this->db->where('project_id',$id);
        $query = $this->db->get('project');
        return $query->result();
    }
//////////////////////////////
///////////report pr
/////////////////////////////
    public function pr_report($id)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department',"left outer");
      $this->db->join('system','system.systemcode = pr.pr_system','left outer');
      $this->db->where('pr_prno',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function pr_report_item ($id)
    {
      $this->db->select('*');
      $this->db->where('pri_ref',$id);
      $query = $this->db->get('pr_item');
      $res =  $query->result();
      return $res;
    }
//////////////////////////////
///////////report po
/////////////////////////////
    public function po_report($id)
    {
      $this->db->select('*');
      $this->db->from('po');
      $this->db->join('project', 'project.project_id = po.po_project','left outer');
      $this->db->join('department','department.department_id = po.po_department',"left outer");
      $this->db->join('system','system.systemcode = po.po_system','left outer');
      $this->db->join('vender','vender.vender_name = po.po_vender','left outer');
      $this->db->where('po_pono',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function po_report_item ($id)
    {
      $this->db->select('*');
      $this->db->where('poi_ref',$id);
      $this->db->where('poi_chk','Y');
      $query = $this->db->get('po_item');
      $res =  $query->result();
      return $res;
    }
    //////////////////////////////
///////////report petty cash
/////////////////////////////
    public function pc_report($id)
    {
      $this->db->select('*');
      $this->db->from('pettycash');
      $this->db->join('project', 'project.project_id = pettycash.project','left outer');
      $this->db->join('department','department.department_id = pettycash.department',"left outer");
      $this->db->join('system','system.systemcode = pettycash.system','left outer');
      $this->db->join('vender','vender.vender_name = pettycash.vender','left outer');
      $this->db->where('docno',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function pc_report_item ($id)
    {
      $this->db->select('*');
      $this->db->where('pettycashi_ref',$id);
      $query = $this->db->get('pettycash_item');
      $res =  $query->result();
      return $res;
    }


    ////////////////////////////////////// แก้ไข ใบรับสินค้า
 public function getpo_receive_po($id)
        {
          $this->db->select('*');
          $this->db->from('receive_po');
          $this->db->join('project','project.project_id = receive_po.project','left outer');
          $this->db->join('department','department.department_id = receive_po.department','left outer');
          $this->db->where('po_reccode',$id);
          $query = $this->db->get();
          $res = $query->result();
          return $res;

        }
    public function getpo_receive($id)
        {
          $this->db->select('*');
          $this->db->from('po_receive');
          $this->db->join('project','project.project_id = po_receive.project','left outer');
          $this->db->join('department','department.department_id = po_receive.department','left outer');
          $this->db->where('po_reccode',$id);
          $query = $this->db->get();
          $res = $query->result();
          return $res;

        }
        public function getpo_receiveitem_po($id)
        {
          $this->db->select('*');
          $this->db->where('poi_ref',$id);
          $query = $this->db->get('receive_poitem');
          $res = $query->result();
          return $res;

        }
    public function getpo_receiveitem($id)
        {
          $this->db->select('*');
          $this->db->where('poi_ref',$id);
          $query = $this->db->get('po_recitem');
          $res = $query->result();
          return $res;

        }
        public function get_warehouse($pjid)
        {
          $this->db->select('*');
          $this->db->where('project_id',$pjid);
          $result = $this->db->get('ic_proj_warehouse')->result();
          return $result;
        }
         public function getpo_edit($id)
            {
              $this->db->select('*');
              $this->db->where('po_pono',$id);
              $query = $this->db->get('po_receive');
              $res = $query->result();
              return $res;

            }
            function getprtopo($prno)
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project','project.project_id=pr.pr_project','left outer');
        $this->db->join('department','department.department_id=pr.pr_department','left outer');
        $this->db->where('pr_department',$prno);
        $this->db->where('pr_status','enable');
        $this->db->where('pr_approve','approve');
        $this->db->where('po_open','no');
        $this->db->where('pr.compcode',$compcode);
        $this->db->where('pr.purchase_type !=','3');
        $this->db->order_by('pr_prid','desc');

        $res = $this->db->get();
        return $res->result();
    }
    public function project($id)
    {
      $query = $this->db->query("select project_name from project where project_id='$id'")->result();
        return $query;
    }
     public function project_system($id)
    {
      $query = $this->db->query("select project_name from project where project_id='$id'")->result();
        return $query;
    }
    public function menu_right()
    {
      $session_data = $this->session->userdata('sessed_in');
                $username = $session_data['username'];
                $this->db->select("*");
                $this->db->where('m_user',$username);
                $query = $this->db->get('menu_right');
                $res = $query->result();

                return $res;
    }


    public function pucost($costcode,$costname,$too_di,$type_cost,$idpo_item){
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];

      $this->db->select('*');
      $this->db->where('costcode_d',$costcode);
      $result = $this->db->get('cost_subgroup')->result();
      $cost1 = "";
      $cost2 = "";
      $cost3 = "";
      $cost4 = "";
      $cost5 = "";
      $cosrcode_h = "";
      $order = "";
      $id_poitem = "";
      $costhead = "";
      $module = "";
      foreach ($result as $s) {
        $cost1 = $s->ctype_code;
        $cost2 = $s->cgroup_code;
        $cost3 = $s->csubgroup_code;
        $cost4 = $s->cgroup_code4;
        $cost5 = $s->cgroup_code5;
        $order = $s->order;
        $costhead = $s->costhead;
        $cosrcode_h = $s->cosrcode_h;
      }

      $p = array(
          'cost1' => $cost1,
          'cost2' => $cost2,
          'cost3' => $cost3,
          'cost4' => $cost4,
          'cost5' => $cost5,
          'costcode' => $costcode,
          'costname' => $costname,
          'cost' => $too_di,
          'order' => $order,
          'id_poitem' => $idpo_item,
          'costhead' => $costhead,
          'module' => "PO",
          'cosrcode_h' => $cosrcode_h,
          'type' => $type_cost,
          'compcode' => $compcode,
      );
      $this->db->insert('pucost', $p);

      if($order=="1"){

      }else if($order=="2"){
          $this->db->select('*');
          $this->db->where('costcode_d',$cosrcode_h);
          $c4 = $this->db->get('cost_subgroup')->result();
          $f_cost1 = "";
          $f_cost2 = "";
          $f_cost3 = "";
          $f_cost4 = "";
          $f_cost5 = "";
          $f_costcode = "";
          $f_costname = "";
          $f_cosrcode_h = "";
          $f_order = "";
          $f_id_poitem = "";
          $f_costhead = "";
          
          foreach ($c4 as $f) {
          $f_cost1 = $f->ctype_code;
          $f_cost2 = $f->cgroup_code;
          $f_cost3 = $f->csubgroup_code;
          $f_cost4 = $f->cgroup_code4;
          $f_cost5 = $f->cgroup_code5;
          $f_costcode = $f->costcode_d;
          $f_costname = $f->cgroup_name5;
          $f_cosrcode_h = $f->cosrcode_h;
          $f_order = $f->order;
          $f_costhead = $f->costhead;
          
          }

          $c4_f = array(
          'cost1' => $f_cost1,
          'cost2' => $f_cost2,
          'cost3' => $f_cost3,
          'cost4' => $f_cost4,
          'cost5' => $f_cost5,
          'costcode' => $f_costcode,
          'costname' => $f_costname,
          'cost' => "0",
          'order' => $f_order,
          'costhead' => $f_costhead,
          'module' => "PO",
          'cosrcode_h' => $f_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c4_f);
      }else if($order=="3"){
          $this->db->select('*');
          $this->db->where('costcode_d',$cosrcode_h);
          $c4 = $this->db->get('cost_subgroup')->result();
          $f_cost1 = "";
          $f_cost2 = "";
          $f_cost3 = "";
          $f_cost4 = "";
          $f_cost5 = "";
          $f_costcode = "";
          $f_costname = "";
          $f_cosrcode_h = "";
          $f_order = "";
          $f_id_poitem = "";
          $f_costhead = "";
          
          foreach ($c4 as $f) {
          $f_cost1 = $f->ctype_code;
          $f_cost2 = $f->cgroup_code;
          $f_cost3 = $f->csubgroup_code;
          $f_cost4 = $f->cgroup_code4;
          $f_cost5 = $f->cgroup_code5;
          $f_costcode = $f->costcode_d;
          $f_costname = $f->cgroup_name5;
          $f_cosrcode_h = $f->cosrcode_h;
          $f_order = $f->order;
          $f_costhead = $f->costhead;
          
          }

          $c4_f = array(
          'cost1' => $f_cost1,
          'cost2' => $f_cost2,
          'cost3' => $f_cost3,
          'cost4' => $f_cost4,
          'cost5' => $f_cost5,
          'costcode' => $f_costcode,
          'costname' => $f_costname,
          'cost' => "",
          'order' => $f_order,
          'costhead' => $f_costhead,
          'module' => "PO",
          'cosrcode_h' => $f_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c4_f);
      ///////////////////////////////////////////////////
          $this->db->select('*');
          $this->db->where('costcode_d',$f_cosrcode_h);
          $c3 = $this->db->get('cost_subgroup')->result();
          $t_cost1 = "";
          $t_cost2 = "";
          $t_cost3 = "";
          $t_cost4 = "";
          $t_cost5 = "";
          $t_costcode = "";
          $t_costname = "";
          $t_cosrcode_h = "";
          $t_order = "";
          $t_id_poitem = "";
          $t_costhead = "";
          
          foreach ($c3 as $t) {
          $t_cost1 = $t->ctype_code;
          $t_cost2 = $t->cgroup_code;
          $t_cost3 = $t->csubgroup_code;
          $t_cost4 = $t->cgroup_code4;
          $t_cost5 = $t->cgroup_code5;
          $t_costcode = $t->costcode_d;
          $t_costname = $t->cgroup_name5;
          $t_cosrcode_h = $t->cosrcode_h;
          $t_order = $t->order;
          $t_costhead = $t->costhead;
          
          }

          $c3_t = array(
          'cost1' => $t_cost1,
          'cost2' => $t_cost2,
          'cost3' => $t_cost3,
          'cost4' => $t_cost4,
          'cost5' => $t_cost5,
          'costcode' => $t_costcode,
          'costname' => $t_costname,
          'cost' => "",
          'order' => $t_order,
          'costhead' => $t_costhead,
          'module' => "PO",
          'cosrcode_h' => $t_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c3_t);
      }else if($order=="4"){
       $this->db->select('*');
          $this->db->where('costcode_d',$cosrcode_h);
          $c4 = $this->db->get('cost_subgroup')->result();
          $f_cost1 = "";
          $f_cost2 = "";
          $f_cost3 = "";
          $f_cost4 = "";
          $f_cost5 = "";
          $f_costcode = "";
          $f_costname = "";
          $f_cosrcode_h = "";
          $f_order = "";
          $f_id_poitem = "";
          $f_costhead = "";
          
          foreach ($c4 as $f) {
          $f_cost1 = $f->ctype_code;
          $f_cost2 = $f->cgroup_code;
          $f_cost3 = $f->csubgroup_code;
          $f_cost4 = $f->cgroup_code4;
          $f_cost5 = $f->cgroup_code5;
          $f_costcode = $f->costcode_d;
          $f_costname = $f->cgroup_name5;
          $f_cosrcode_h = $f->cosrcode_h;
          $f_order = $f->order;
          $f_costhead = $f->costhead;
          
          }

          $c4_f = array(
          'cost1' => $f_cost1,
          'cost2' => $f_cost2,
          'cost3' => $f_cost3,
          'cost4' => $f_cost4,
          'cost5' => $f_cost5,
          'costcode' => $f_costcode,
          'costname' => $f_costname,
          'cost' => "",
          'order' => $f_order,
          'costhead' => $f_costhead,
          'module' => "PO",
          'cosrcode_h' => $f_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c4_f);
      ///////////////////////////////////////////////////
          $this->db->select('*');
          $this->db->where('costcode_d',$f_cosrcode_h);
          $c3 = $this->db->get('cost_subgroup')->result();
          $t_cost1 = "";
          $t_cost2 = "";
          $t_cost3 = "";
          $t_cost4 = "";
          $t_cost5 = "";
          $t_costcode = "";
          $t_costname = "";
          $t_cosrcode_h = "";
          $t_order = "";
          $t_id_poitem = "";
          $t_costhead = "";
          
          foreach ($c3 as $t) {
          $t_cost1 = $t->ctype_code;
          $t_cost2 = $t->cgroup_code;
          $t_cost3 = $t->csubgroup_code;
          $t_cost4 = $t->cgroup_code4;
          $t_cost5 = $t->cgroup_code5;
          $t_costcode = $t->costcode_d;
          $t_costname = $t->cgroup_name5;
          $t_cosrcode_h = $t->cosrcode_h;
          $t_order = $t->order;
          $t_costhead = $t->costhead;
          
          }

          $c3_t = array(
          'cost1' => $t_cost1,
          'cost2' => $t_cost2,
          'cost3' => $t_cost3,
          'cost4' => $t_cost4,
          'cost5' => $t_cost5,
          'costcode' => $t_costcode,
          'costname' => $t_costname,
          'cost' => "",
          'order' => $t_order,
          'costhead' => $t_costhead,
          'module' => "PO",
          'cosrcode_h' => $t_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c3_t);

      ///////////////////////////////////////////////////
          $this->db->select('*');
          $this->db->where('costcode_d',$t_cosrcode_h);
          $c2 = $this->db->get('cost_subgroup')->result();
          $tw_cost1 = "";
          $tw_cost2 = "";
          $tw_cost3 = "";
          $tw_cost4 = "";
          $tw_cost5 = "";
          $tw_costcode = "";
          $tw_costname = "";
          $tw_cosrcode_h = "";
          $tw_order = "";
          $tw_id_poitem = "";
          $tw_costhead = "";
          
          foreach ($c2 as $tw) {
          $tw_cost1 = $tw->ctype_code;
          $tw_cost2 = $tw->cgroup_code;
          $tw_cost3 = $tw->csubgroup_code;
          $tw_cost4 = $tw->cgroup_code4;
          $tw_cost5 = $tw->cgroup_code5;
          $tw_costcode = $tw->costcode_d;
          $tw_costname = $tw->cgroup_name5;
          $tw_cosrcode_h = $tw->cosrcode_h;
          $tw_order = $tw->order;
          $tw_costhead = $tw->costhead;
          
          }

          $c2_tw = array(
          'cost1' => $tw_cost1,
          'cost2' => $tw_cost2,
          'cost3' => $tw_cost3,
          'cost4' => $tw_cost4,
          'cost5' => $tw_cost5,
          'costcode' => $tw_costcode,
          'costname' => $tw_costname,
          'cost' => "",
          'order' => $tw_order,
          'costhead' => $tw_costhead,
          'module' => "PO",
          'cosrcode_h' => $tw_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c2_tw);

       ///////////////////////////////////////////////////   
      }else if($order=="5"){

          $this->db->select('*');
          $this->db->where('costcode_d',$cosrcode_h);
          $c4 = $this->db->get('cost_subgroup')->result();
          $f_cost1 = "";
          $f_cost2 = "";
          $f_cost3 = "";
          $f_cost4 = "";
          $f_cost5 = "";
          $f_costcode = "";
          $f_costname = "";
          $f_cosrcode_h = "";
          $f_order = "";
          $f_id_poitem = "";
          $f_costhead = "";
          
          foreach ($c4 as $f) {
          $f_cost1 = $f->ctype_code;
          $f_cost2 = $f->cgroup_code;
          $f_cost3 = $f->csubgroup_code;
          $f_cost4 = $f->cgroup_code4;
          $f_cost5 = $f->cgroup_code5;
          $f_costcode = $f->costcode_d;
          $f_costname = $f->cgroup_name5;
          $f_cosrcode_h = $f->cosrcode_h;
          $f_order = $f->order;
          $f_costhead = $f->costhead;
          
          }

          $c4_f = array(
          'cost1' => $f_cost1,
          'cost2' => $f_cost2,
          'cost3' => $f_cost3,
          'cost4' => $f_cost4,
          'cost5' => $f_cost5,
          'costcode' => $f_costcode,
          'costname' => $f_costname,
          'cost' => "",
          'order' => $f_order,
          'costhead' => $f_costhead,
          'module' => "PO",
          'cosrcode_h' => $f_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c4_f);
      ///////////////////////////////////////////////////
          $this->db->select('*');
          $this->db->where('costcode_d',$f_cosrcode_h);
          $c3 = $this->db->get('cost_subgroup')->result();
          $t_cost1 = "";
          $t_cost2 = "";
          $t_cost3 = "";
          $t_cost4 = "";
          $t_cost5 = "";
          $t_costcode = "";
          $t_costname = "";
          $t_cosrcode_h = "";
          $t_order = "";
          $t_id_poitem = "";
          $t_costhead = "";
          
          foreach ($c3 as $t) {
          $t_cost1 = $t->ctype_code;
          $t_cost2 = $t->cgroup_code;
          $t_cost3 = $t->csubgroup_code;
          $t_cost4 = $t->cgroup_code4;
          $t_cost5 = $t->cgroup_code5;
          $t_costcode = $t->costcode_d;
          $t_costname = $t->cgroup_name5;
          $t_cosrcode_h = $t->cosrcode_h;
          $t_order = $t->order;
          $t_costhead = $t->costhead;
          
          }

          $c3_t = array(
          'cost1' => $t_cost1,
          'cost2' => $t_cost2,
          'cost3' => $t_cost3,
          'cost4' => $t_cost4,
          'cost5' => $t_cost5,
          'costcode' => $t_costcode,
          'costname' => $t_costname,
          'cost' => "",
          'order' => $t_order,
          'costhead' => $t_costhead,
          'module' => "PO",
          'cosrcode_h' => $t_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c3_t);

      ///////////////////////////////////////////////////
          $this->db->select('*');
          $this->db->where('costcode_d',$t_cosrcode_h);
          $c2 = $this->db->get('cost_subgroup')->result();
          $tw_cost1 = "";
          $tw_cost2 = "";
          $tw_cost3 = "";
          $tw_cost4 = "";
          $tw_cost5 = "";
          $tw_costcode = "";
          $tw_costname = "";
          $tw_cosrcode_h = "";
          $tw_order = "";
          $tw_id_poitem = "";
          $tw_costhead = "";
          
          foreach ($c2 as $tw) {
          $tw_cost1 = $tw->ctype_code;
          $tw_cost2 = $tw->cgroup_code;
          $tw_cost3 = $tw->csubgroup_code;
          $tw_cost4 = $tw->cgroup_code4;
          $tw_cost5 = $tw->cgroup_code5;
          $tw_costcode = $tw->costcode_d;
          $tw_costname = $tw->cgroup_name5;
          $tw_cosrcode_h = $tw->cosrcode_h;
          $tw_order = $tw->order;
          $tw_costhead = $tw->costhead;
          
          }

          $c2_tw = array(
          'cost1' => $tw_cost1,
          'cost2' => $tw_cost2,
          'cost3' => $tw_cost3,
          'cost4' => $tw_cost4,
          'cost5' => $tw_cost5,
          'costcode' => $tw_costcode,
          'costname' => $tw_costname,
          'cost' => "",
          'order' => $tw_order,
          'costhead' => $tw_costhead,
          'module' => "PO",
          'cosrcode_h' => $tw_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c2_tw);

       ///////////////////////////////////////////////////
          $this->db->select('*');
          $this->db->where('costcode_d',$tw_cosrcode_h);
          $c1 = $this->db->get('cost_subgroup')->result();
          $o_cost1 = "";
          $o_cost2 = "";
          $o_cost3 = "";
          $o_cost4 = "";
          $o_cost5 = "";
          $o_costcode = "";
          $o_costname = "";
          $o_cosrcode_h = "";
          $o_order = "";
          $o_id_poitem = "";
          $o_costhead = "";
          
          foreach ($c1 as $o) {
          $o_cost1 = $o->ctype_code;
          $o_cost2 = $o->cgroup_code;
          $o_cost3 = $o->csubgroup_code;
          $o_cost4 = $o->cgroup_code4;
          $o_cost5 = $o->cgroup_code5;
          $o_costcode = $o->costcode_d;
          $o_costname = $o->cgroup_name5;
          $o_cosrcode_h = $o->cosrcode_h;
          $o_order = $o->order;
          $o_costhead = $o->costhead;
          
          }

          $c1_o = array(
          'cost1' => $o_cost1,
          'cost2' => $o_cost2,
          'cost3' => $o_cost3,
          'cost4' => $o_cost4,
          'cost5' => $o_cost5,
          'costcode' => $o_costcode,
          'costname' => $o_costname,
          'cost' => "",
          'order' => $o_order,
          'costhead' => $o_costhead,
          'module' => "PO",
          'cosrcode_h' => $o_cosrcode_h,
          'compcode' => $compcode,
          'id_poitem' => $idpo_item,
      );
      $this->db->insert('pucost', $c1_o);
      }


      
    }


    public function del_pucost($id){
      $this->db->where('id_poitem', $id);
      $this->db->delete('pucost');
    }


    public function get_pr_line_chart()
    {
      $q = $this->db->query('select DATE_FORMAT(pr_prdate,"%m/%d/%y")as date, count(pr_prdate) as alpha FROM (`pr`) WHERE DATE_FORMAT(pr_prdate,"%m") =  MONTH(CURDATE()) GROUP BY date(pr_prdate)')->result();
      return $q;
    }

    public function get_pc_line_chart()
    {
      $q = $this->db->query('select DATE_FORMAT(docdate,"%m/%d/%y")as date, count(docdate) as alpha FROM (`pettycash`) WHERE DATE_FORMAT(docdate,"%m") =  MONTH(CURDATE()) GROUP BY date(docdate)')->result();
      return $q;
    }
    public function get_pr_donut_chart($compcode){
      $q = $this->db->query('select pr_approve, count(pr_prid) as countpr from `pr` where compcode="'.$compcode.'" group by pr_approve')->result();
      return $q;
    }
    public function get_pc_donut_chart(){
      $q = $this->db->query('select approve, count(doc_id) as countpc from pettycash group by approve')->result();
      return $q;
    }
    public function getuserapprovepr($prno){
      $q = $this->db->query('select * from approve_pr where app_pr = "'.$prno.'"')->result_array();
      return $q;
    }
    public function getuserapprovepo($pono){
      $q = $this->db->query('select * from approve_po where app_pr = "'.$pono.'"')->result_array();
      return $q;
    }

}
