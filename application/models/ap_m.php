<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ap_m extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }
        public function openpo($proid)
        {
          $this->db->select('*');
         $this->db->from('receive_po');
         $this->db->join('project', 'project.project_id = receive_po.project','left outer');
         // $this->db->join('department','department.department_id = receive_po.department','left outer');
         $this->db->join('receive_poitem', 'receive_poitem.poi_ref = receive_po.po_reccode','left outer');
         $this->db->join('vender', 'vender.vender_id = receive_po.venderid');
         $this->db->join('system', 'system.systemcode = receive_po.system');
         $this->db->where('apv_status','no');
         $this->db->where('project_id',$proid);
         $this->db->order_by('po_reccode','ASC');
         $this->db->group_by("poi_ref");
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function receipt_po_full()
        {
          $this->db->select('*');
           $this->db->from('po');
           $this->db->join('project', 'project.project_id = po.po_project','left outer');
           $this->db->join('department','department.department_id = po.po_department','left outer');
           $this->db->where('ic_status','full');
           $this->db->where('apv_open','no');
           $query = $this->db->get();
           $res = $query->result();
           return $res;
        }

         public function receive_loi()
        {
          $this->db->select('*');
          $this->db->from('lo');
          $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
          $this->db->join('department','department.department_id = lo.department','left outer');
          $this->db->join('vender','vender.vender_id = lo.contact','left outer');
          $this->db->where('lo.status',"wait");
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
        public function geteditapv($apvno)
        {
          $this->db->select('*');
          $this->db->from('apv_header');
          $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer');
          $this->db->join('department','department.department_id = apv_header.apv_department','left outer');
          $this->db->where('apv_code',$apvno);
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
        public function geteditapv_i($apvno)
        {
          $this->db->select('*');
          $this->db->where('apvi_ref',$apvno);
          $query = $this->db->get('apv_detail');
          $res = $query->result();
          return $res;
        }

        public function apglwhere($apvno)
        {
          $this->db->select('*');
          $this->db->join('account_total','account_total.act_code = ap_gl.acct_no','left outer');
          $this->db->where('vchno',$apvno);
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
        }

        public function companyimgbycompcode($compcode)
        {
            $this->db->select('*');
            $this->db->where('compcode',$compcode);
            $query = $this->db->get('company');
            $res = $query->result();
            foreach ($res as $value) {
                $img = $value->comp_img;

            }
            return $img;
        }
        public function getallpettycash($id)
       {
         $this->db->select('*');
         $this->db->from('pettycash');
         $this->db->join('project', 'project.project_id = pettycash.project','left outer');
         $this->db->join('department','department.department_id = pettycash.department','left outer');
         $this->db->where('memid',$id);
         $this->db->where('status',null);
         $this->db->where('approve',"approve");
         $query = $this->db->get();
         $res = $query->result();
         return $res;
       }
       public function getpettycashid($id)
      {
        $this->db->select('*');
        $this->db->from('pettycash');
        $this->db->join('project', 'project.project_id = pettycash.project','left outer');
        $this->db->join('department','department.department_id = pettycash.department','left outer');
        $this->db->where('memid',$id);
        $this->db->where('status',null);
        $this->db->where('approve',"wait");
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }
      public function getpettycashadvto($memid,$name)
      {
        $this->db->select('*');
        $this->db->from('pettycash');
        $this->db->join('project', 'project.project_id = pettycash.project','left outer');
        $this->db->join('department','department.department_id = pettycash.department','left outer');
        $this->db->where('memid',$memid);
        $this->db->where("advname LIKE '%$name%'");
        $this->db->where('status',null);
        $this->db->where('approve',"wait");
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }
       public function getpettycash_d($id)
       {
         $this->db->select('*');
         $this->db->where('pettycashi_ref',$id);
         $this->db->order_by('pettycashi_id','asc');
         $query = $this->db->get('pettycash_item');
         $res = $query->result();
         return $res;
       }
       public function geteditapopv($apono,$compcode)
       {
         $this->db->select('*');
         $this->db->from('pv_apo_header');
         $this->db->join('project', 'project.project_id = pv_apo_header.apo_project','left outer');
         $this->db->join('department','department.department_id = pv_apo_header.apo_department','left outer');
         $this->db->join('member','member.m_id = pv_apo_header.apo_member','left outer');
         $this->db->join('vender','vender.vender_id = pv_apo_header.apo_vender','left outer');
         $this->db->where('apo_code',$apono);
         $this->db->where('pv_apo_header.compcode',$compcode);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
       }
       public function getapo_dpv($apono,$compcode)
       {
         $this->db->select('*, count(doci_ref) as total');
         $this->db->where('doci_ref',$apono);
         $this->db->where('compcode',$compcode);
         $this->db->order_by('doci_id','asc');
         $query = $this->db->get('pv_apo_detail');
         $res = $query->result();
         return $res;
       }
       public function getapo_dp($apono,$compcode)
       {
         $this->db->select('*');
         $this->db->where('doci_ref',$apono);
         $this->db->where('compcode',$compcode);
         $query = $this->db->get('pv_apo_detail');
         $res = $query->result();
         return $res;
       }
       public function geteditapo($apono,$compcode)
       {
         $this->db->select('*');
         $this->db->from('apo_header');
         $this->db->join('project', 'project.project_id = apo_header.apo_project','left outer');
         $this->db->join('department','department.department_id = apo_header.apo_department','left outer');
         $this->db->where('apo_code',$apono);
         $this->db->where('apo_header.compcode',$compcode);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
       }
       public function getapo_d($apono,$compcode)
       {
         $this->db->select('*');
         $this->db->where('apo_ref',$apono);
         $this->db->where('compcode',$compcode);
         $this->db->order_by('apo_id','asc');
         $query = $this->db->get('apo_item');
         $res = $query->result();
         return $res;
       }
       public function getapproveapv($compcode)
       {
         $query = $this->db->query("SELECT
            	apv_header.apv_id,
            	apv_header.apv_code,
            	apv_header.apv_date,
            	apv_header.apv_pono,
            	apv_header.apv_vender,
            	apv_header.apv_type,
            	apv_header.apv_do,
            	apv_header.apv_inv,
            	apv_header.apv_duedate,
            	apv_header.apv_crterm,
            	apv_header.apv_project,
            	apv_header.apv_system,
            	apv_header.apv_department,
            	apv_header.apv_netamt,
            	apv_header.apv_vat,
            	apv_header.apv_totamt,
            	apv_header.apv_useradd,
            	apv_header.apv_useredit,
            	apv_header.apv_userdel,
            	apv_header.apv_timeupdate,
            	apv_header.apv_status,
            	apv_header.apv_dateapprove,
            	apv_header.compcode,
            	vender.vender_code
            FROM
            	apv_header
            INNER JOIN vender ON vender.vender_name = apv_header.apv_vender where apv_header.compcode = '$compcode' and apv_header.apv_status='wait'
            GROUP BY
            apv_header.apv_vender"
          );
         $res = $query->result();
         return $res;
       }

       public function getap_union()
       {
        $query = $this->db->query('SELECT apv_code as code,apv_vender as payto,apv_date as date ,apv_pono as docno ,apv_do as apdo,apv_inv as inv,apv_duedate as duedate, apv_crterm as crterm FROM apv_header  UNION
                                   SELECT apo_code as code,m_name as payto,apo_date as date, apo_prref as docno ,apo_do as apdo,apo_inv as inv,apo_duedate as duedate, apo_crterm as crterm FROM pv_apo_header left outer join member on member.m_id = pv_apo_header.apo_vender');
        $res = $query->result();
        return $res;
       }
       public function get_ap_archive()
       {
        $query = $this->db->query('select apv_code as code,apv_vender as payto,apv_date as date ,apv_pono as docno ,apv_do as apdo,apv_inv as inv,apv_duedate as duedate, apv_crterm as crterm from apv_header');
         $res = $query->result();
        return $res;
       }
       public function getapv_approve_byvender($vendercode,$compcode)
       {
         $query = $this->db->query("SELECT
          apv_header.apv_code,
          apv_header.apv_date,
          apv_header.apv_pono,
          apv_header.apv_vender,
          apv_header.apv_status,
          apv_header.apv_project
          FROM
          apv_header
          INNER JOIN vender ON vender.vender_name = apv_header.apv_vender
          where apv_header.compcode = '$compcode' and  vender.vender_code = '$vendercode' and apv_header.apv_status ='wait'
          GROUP BY
          apv_header.apv_code
          ");
        $res = $query->result();
        return $res;
       }
       public function getaps_approve_byvender($vendercode,$compcode)
       {
         $query = $this->db->query("SELECT * FROM
          aps_header
          INNER JOIN vender ON vender.vender_id = aps_header.aps_contact
          where aps_header.compcode = '$compcode' and  vender.vender_id = '$vendercode' and aps_header.aps_status ='wait'
          GROUP BY
          aps_header.aps_code
          ");
        $res = $query->result();
        return $res;
       }
       public function getapproveapo($compcode)
       {
         $this->db->select('*');
         $this->db->from('apo_header');
         $this->db->join('member','member.m_name = apo_header.apo_vender','left outer');
         $this->db->join('vender','vender.vender_name = apo_vender','left outer');
         $this->db->where('apo_status','wait');
         $this->db->where('apo_header.compcode',$compcode);
         $query = $this->db->get();
         $res = $query->result();
         return $res;

       }
       public function getapo_approve_byvender($vendercode,$compcode)
       {
         $query = $this->db->query("SELECT
                                      apo_header.apo_code,
                                      apo_header.apo_date,
                                      apo_header.apo_prref,
                                      apo_header.apo_vender,
                                      apo_header.apo_status
                                      FROM
                                      apo_header
                                      LEFT OUTER JOIN vender ON vender.vender_name = apo_header.apo_vender
                                      LEFT OUTER JOIN member ON member.m_name = apo_header.apo_vender
                                      where vender.vender_code = '$vendercode' OR member.m_code='$vendercode' and apo_header.compcode = '$compcode' and apo_header.apo_status ='wait'
                                      GROUP BY
                                      apo_header.apo_code
                                      ");
        $res = $query->result();
        return $res;
       }
       public function edit_pv_other($id)
       {
         $this->db->select('*');
         $this->db->from('pv_apo_header');
         $this->db->join('member','member.m_id = pv_apo_header.apo_member','left outer');
         $this->db->join('vender','vender.vender_id = pv_apo_header.apo_vender','left outer');
         $this->db->join('project', 'project.project_id = pv_apo_header.apo_project','left outer');
         $this->db->join('department','department.department_id = pv_apo_header.apo_department','left outer');
         $this->db->where('pv_apo_header.apo_code',$id);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
       }
       public function load_pv_detail_other($id)
       {
         $this->db->select('*');
         $this->db->from('pv_apo_detail');
         $this->db->join('member','member.m_id = pv_apo_detail.doci_member','left outer');
         $this->db->where('doci_ref',$id);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
       }
       public function getpv($compcode)
       {
        $query = $this->db->query("select * from pv_apo_header where compcode='$compcode'");
        $res = $query->result();
         return $res;
       }
       public function load_aps_loi($id)
       {
        $this->db->select('*');
        $this->db->where('aps_lono',$id);
        $query = $this->db->get('aps_header');
        $res = $query->result();
        return $res;
       }
       public function load_aps_loip($id,$period)
       {
        $this->db->select('*');
        $this->db->where('aps_lono',$id);
        $this->db->limit($period);
        $query = $this->db->get('aps_header');
        $res = $query->result();
        return $res;
       }
       public function getaps($code,$compcode)
       {
        $this->db->select('*');
        $this->db->where('aps_code',$code);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('aps_header');
        $res = $query->result();
        return $res;
       }
       public function getapsnot($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer');
          $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer');
          $this->db->where('aps_status',"wait");
          $this->db->where('aps_header.compcode',$compcode);
          $query = $this->db->get('aps_header');
          $res = $query->result();
          return $res;
        }

        public function getapsall($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer');
          $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer');
          $this->db->where('aps_status !=',"delete");
          $this->db->where('aps_header.compcode',$compcode);
          $query = $this->db->get('aps_header');
          $res = $query->result();
          return $res;
        }

        public function getapsopen($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer');
          $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer');
          $this->db->where('aps_status',"paid");
          $this->db->where('aps_header.compcode',$compcode);
          $query = $this->db->get('aps_header');
          $res = $query->result();
          return $res;
        }
       public function aps_gl($apscode)
       {
        $this->db->select('*');
        $this->db->where('vchno',$apscode);
        $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
        $this->db->order_by('id_apgl', 'ASC');
        $query = $this->db->get('ap_gl');
        $res = $query->result();
        return $res;
       }
       public function load_approve_aps($compcode)
       {
        $this->db->select('*');
        $this->db->from('aps_header');
        $this->db->join('vender','vender.vender_id = aps_header.aps_contact','left outer');
        $this->db->where('aps_header.compcode',$compcode);
        $this->db->where('aps_header.aps_status','wait');
        $this->db->group_by("aps_contact");
        $query = $this->db->get();
        $res = $query->result();
        return $res;
       }
       public function load_pv_aps($id,$compcode)
       {
        $this->db->select('*');
        $this->db->from('aps_header');
        $this->db->join('vender','vender.vender_id = aps_header.aps_contact','left outer');
        $this->db->where('aps_contact',$id);
        $this->db->where('aps_header.compcode',$compcode);
        $this->db->where('aps_header.aps_status','wait');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
       }
       public function project_name($id,$compcode)
       {
        $this->db->select("project_name");
        $this->db->where('project_id',$id);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
       }

       public function geteditaps($apsno)
        {
          $this->db->select('*');
          $this->db->from('aps_header');
          $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer');
          $this->db->where('aps_code',$apsno);
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
        public function geteditaps_i($apsno)
        {
          $this->db->select('*');
          $this->db->where('apsi_ref',$apsno);
          $query = $this->db->get('aps_detail');
          $res = $query->result();
          return $res;
        }
        public function getapv($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender','left outer');
          $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer');
          $this->db->where('apv_status',"wait");
          $this->db->where('apv_header.compcode',$compcode);
          $query = $this->db->get('apv_header');
          $res = $query->result();
          return $res;
        }

        public function getapv_all($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender','left outer');
          $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer');
          $this->db->where('apv_status !=','del');
          $this->db->order_by('apv_code','ASC');
          $this->db->where('apv_header.compcode',$compcode);
          $query = $this->db->get('apv_header');
          $res = $query->result();
          return $res;
        }

        public function getapv_open($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender','left outer');
          $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer');
          $this->db->where('apv_status',"paid");
          $this->db->order_by('apv_code','ASC');
          $this->db->where('apv_header.compcode',$compcode);
          $query = $this->db->get('apv_header');
          $res = $query->result();
          return $res;
        }

        public function getapv2()
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_id = apv_header.apv_vender');
          $this->db->where('apv_status',"wait");
          $this->db->group_by('apv_vender');
          $query = $this->db->get('apv_header');
          $res = $query->result();
          return $res;
        }

        public function getapd()
        {
          $session_data = $this->session->userdata('sessed_in');
          $this->db->select('*');
          $this->db->from('ap_down_header');
          $this->db->join('vender', 'vender.vender_code = ap_down_header.apd_vender','left outer');
          $this->db->join('project', 'project.project_id = ap_down_header.apd_project','left outer');
          $this->db->where('ap_down_header.apd_status',"wait");
          $query = $this->db->get();
          $res = $query->result();

          return $res;
        }

        public function getapdopen($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = ap_down_header.apd_vender','left outer');
          $this->db->join('project', 'project.project_id = ap_down_header.apd_project','left outer');          
          $this->db->where('apd_status',"paid");
          $this->db->where('ap_down_header.compcode',$compcode);
          $query = $this->db->get('ap_down_header');
          $res = $query->result();
          return $res;
        }

        public function getapdall($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = ap_down_header.apd_vender','left outer');
          $this->db->join('project', 'project.project_id = ap_down_header.apd_project','left outer');
          $this->db->where('apd_status !=',"delete");
          $this->db->where('ap_down_header.compcode',$compcode);
          $query = $this->db->get('ap_down_header');
          $res = $query->result();
          return $res;
        }

         public function edit_apvcn() {
           $this->db->select('*');
         $this->db->from('apv_header');
         $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer'); 
         $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender','left outer'); 
         $this->db->join('system', 'system.systemcode = apv_header.apv_system','left outer'); 
         $this->db->join('po', 'po.po_pono = apv_header.apv_pono');
         $this->db->where('cn =',"no");
         $this->db->where('gl_status',"N");
         $this->db->where('apv_status',"wait");
         $query = $this->db->get();
         $res = $query->result();
         return $res;         
        }

        public function edit_apdcn() {
         $this->db->select('*');
         $this->db->from('ap_down_header');
         $this->db->join('project', 'project.project_id = ap_down_header.apd_project','left outer'); 
         $this->db->join('system', 'system.systemcode = ap_down_header.apd_system','left outer'); 
         $this->db->join('vender', 'vender.vender_code = ap_down_header.apd_vender','left outer');
         $this->db->join('po', 'po.po_pono = ap_down_header.ref_po_code');
         $this->db->where('cn =',"no");
         $this->db->where('gl_status',"N");
         $this->db->where('apd_status',"wait");
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function edit_aprcn() {
         $this->db->select('*');
         $this->db->from('ap_ret_header');
         $this->db->join('project', 'project.project_id = ap_ret_header.apr_project','left outer'); 
         $this->db->join('system', 'system.systemcode = ap_ret_header.apr_system','left outer'); 
         $this->db->join('vender', 'vender.vender_code = ap_ret_header.apr_vender','left outer'); 
         $this->db->join('po', 'po.po_pono = ap_ret_header.po_code');
         $this->db->where('cn =',"no");
         $this->db->where('gl_status',"N");
        $this->db->where('apr_status',"wait");
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }


        public function getapr()
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = ap_ret_header.apr_vender','left outer');
          $this->db->join('project', 'project.project_id = ap_ret_header.apr_project','left outer');
          $this->db->where('apr_status',"wait");
          $this->db->order_by('apr_code', 'ASC');
          $query = $this->db->get('ap_ret_header');
          $res = $query->result();
          return $res;
        }

        public function getaprall()
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = ap_ret_header.apr_vender','left outer');
          $this->db->join('project', 'project.project_id = ap_ret_header.apr_project','left outer');
          $this->db->where('apr_status !=',"delete");
          $this->db->order_by('apr_code', 'ASC');
          $query = $this->db->get('ap_ret_header');
          $res = $query->result();
          return $res;
        }

        public function getapropen()
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = ap_ret_header.apr_vender','left outer');
          $this->db->join('project', 'project.project_id = ap_ret_header.apr_project','left outer');
          $this->db->where('apr_status',"paid");
          $this->db->order_by('apr_code', 'ASC');
          $query = $this->db->get('ap_ret_header');
          $res = $query->result();
          return $res;
        }

        public function getbill()
        {
          $this->db->select('*');
          $this->db->join('project', 'project.project_code = aps_header.aps_project','left outer');
          $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer');
          $this->db->where('aps_status',"wait");
          $query = $this->db->get('aps_header');
          $res = $query->result();
          return $res;
        }

        public function aps_all()
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = aps_header.aps_contact','left outer');
          $query = $this->db->get('aps_header');
          $res = $query->result();
          return $res;
        }

        public function ap_gl($vchno,$compcode)
        {
          $this->db->select('*');
          $this->db->where('compcode',$compcode);
          $this->db->where('vchno',$vchno);
          $this->db->where('amtdr !=','0');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
        }

        public function getyears($y,$p,$t,$vas,$vae,$ds,$de,$cc)
        {
          if($cc=='n') {
            $this->db->select('*');
            $this->db->from('ap_gl');
            $this->db->where('glyear',$y);
            $this->db->where('glperiod',$p);
            $this->db->where('doctype',$t);
            $q = $this->db->get();
            $run = $q->result();
            return $run;
          }else {
            $this->db->select('*');
            $this->db->from('ap_gl');
            $this->db->order_by('vchno','desc');
            $this->db->where('glyear',$y);
            $this->db->where('glperiod',$p);
            $this->db->where('doctype',$t);
            $this->db->where('vchno >=',$vas);
            $this->db->where('vchno <=',$vae);
            $this->db->where('vchdate >=',$ds);
            $this->db->where('vchdate <=',$de);
            $q = $this->db->get();
            $run = $q->result();
            return $run;
          }
        }
        public function getgln($y,$p){
          $this->db->select('*');
          $this->db->from('ap_gl');
          $this->db->order_by('vchno','desc');
          $this->db->where('glyear',$y);
          $this->db->where('glperiod',$p);
          $this->db->where('completegl','Y');
          $q = $this->db->get();
          $run = $q->result();
          return $run;
        }

        public function getsum($y,$p,$t,$vas,$vae,$ds,$de,$cc)
        {
          if($cc=='n') {
          $this->db->select('sum(amtdr) as total_amtdr,sum(amtcr) as total_amtcr',false);
          $this->db->from('ap_gl');
          $this->db->where('glyear',$y);
          $this->db->where('glperiod',$p);
          $this->db->where('doctype',$t);
          $q = $this->db->get();
          $run = $q->result();
          return $run;
          }else {
            $this->db->select('sum(amtdr) as total_amtdr,sum(amtcr) as total_amtcr',false);
            $this->db->from('ap_gl');
            $this->db->order_by('vchno','desc');
            $this->db->where('glyear',$y);
            $this->db->where('glperiod',$p);
            $this->db->where('doctype',$t);
            $this->db->where('vchno >=',$vas);
            $this->db->where('vchno <=',$vae);
            $this->db->where('vchdate >=',$ds);
            $this->db->where('vchdate <=',$de);
            $q = $this->db->get();
            $run = $q->result();
            return $run;
          }
        }

        public function getsumtr($y,$p)
        {
          $this->db->select('sum(amtdr) as total_amtdr,sum(amtcr) as total_amtcr',false);
          $this->db->from('ap_gl');
          $this->db->where('glyear',$y);
          $this->db->where('glperiod',$p);
          $this->db->where('completegl','Y');
          $q = $this->db->get();
          $run = $q->result();
          return $run;
        }

        public function report_aps($aps_code,$aps_lono,$aps_period)
        {
          $this->db->select('*');
          $this->db->from('aps_header');
          $this->db->where('aps_code',$aps_code);
          $this->db->where('aps_lono',$aps_lono);
          $this->db->where('aps_period',$aps_period);
          $this->db->join('vender', 'vender.vender_id = aps_header.aps_contact');
          $this->db->join('aps_detail', 'aps_detail.apsi_ref = aps_header.aps_code');
          $q = $this->db->get();
          $run = $q->result();
          return $run;
        }

        public function apgl()
        {
          $this->db->select('*');
          $this->db->group_by('vchno');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
        }


        public function ap_bill()
        {
          $this->db->select('*');
          $this->db->where('ap_status',"N");
          $this->db->join('vender', 'vender.vender_id = ap_billsuc_header.ap_bill_vender','left outer');
          $this->db->join('project', 'project.project_id = ap_billsuc_header.ap_bill_project','left outer');
          $this->db->join('lo', 'lo.lo_lono = ap_billsuc_header.ap_bill_contractno','left outer');
          $query = $this->db->get('ap_billsuc_header');
          $res = $query->result();
          return $res;
        }

        public function rec_bill()
        {
          $this->db->select('*');
          $this->db->where('cn',"no");
          $this->db->where('aps_status',"wait");
          $this->db->where('gl_status',"N");
         $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer'); 
         $this->db->join('aps_detail', 'aps_detail.apsi_ref = aps_header.aps_code','left outer');
         $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer');
        //  $this->db->group_by('apsi_ref');
         $this->db->order_by('aps_code','asc');
         $query = $this->db->get('aps_header');
         $res = $query->result();
         return $res;
        }

        public function ap_bills()
        {

          $this->db->select('*');
          $this->db->from('ap_billsuc_header');
          $this->db->join('ap_billsuc_detail', 'ap_billsuc_detail.api_bill_ref = ap_billsuc_header.ap_bill_contractno');
          $q = $this->db->get();
          $run = $q->result();
          return $run;
        }

        public function retrive_poi($no,$array_no_po)
        {
          $this->db->select('*');
          // $this->db->where('poi_ref',$no);
          $this->db->where_in('poi_ref',$array_no_po);
          $this->db->order_by('poi_id','asc');
          $query = $this->db->get('receive_poitem');
          $res = $query->result();
          return $res;
        }

        public function retrive_poi2($no)
        {
          $this->db->select('*');
          $this->db->join('receive_po', 'receive_po.po_reccode = receive_poitem.poi_ref');
          $this->db->where('poi_ref',$no);
          $this->db->group_by('poi_ref');
          $this->db->order_by('poi_id','asc');
          $query = $this->db->get('receive_poitem');
          $res = $query->result()[0];
          return $res;
          
        }

        //by ball
        public function retrive_poi3($no)
        {
          $this->db->select('*');
          $this->db->join('receive_po', 'receive_po.po_reccode = receive_poitem.poi_ref');
          $this->db->where('poi_ref',$no);
          $query = $this->db->get('receive_poitem');
          $res = $query->result();
          return $res;
          
        }
        //by ball

        public function ret_poi($no,$array)
        {
          $this->db->select('poi_qty,poi_unit,poi_priceunit,poi_amount,poi_disamt,poi_vat,poi_netamt,poi_discountper1,poi_discountper2,poi_vatper,poi_unitic,poi_totqtyic,poi_qtyic,poi_matname,poi_matcode,poi_ref,poi_costname,poi_costcode');
          // $this->db->where('poi_ref',$no);
          $this->db->where_in('poi_ref',$array);
          $this->db->order_by('poi_id','asc');
          $query = $this->db->get('receive_poitem');
          $res = $query->result();
          return $res;
        }

        public function ret_poi2($no,$array)
        {
          $this->db->select('po_reccode,venderid,project,system,taxno,taxdate,duedate,term,po_pono,ap_status,sum(poi_amount*poi_vat)/100 as dis_tovat,sum(poi_vat) as chqvat,(taxno REGEXP "[A-z0-9-]") as group_taxno');
          $this->db->join('receive_po', 'receive_po.po_reccode = receive_poitem.poi_ref');
          // $this->db->where('poi_ref',$no);
          // SELECT sum(poi_amount*poi_vat)/100 as dis_tovat,sum(poi_vat) as chqvat from receive_poitem where poi_ref = '$povat->po_reccode'
          $this->db->where_in('poi_ref',$array);
          // $this->db->group_by('poi_ref');
          $this->db->group_by('group_taxno');
          $this->db->order_by('poi_id','asc');
          $query = $this->db->get('receive_poitem');
          $res = $query->result();
          // echo "<pre>";
          // var_dump($res);
          return $res;
        }

        public function ap_bill_de($no)
        {
          $this->db->select('*');
          $this->db->join('ap_billsuc_header', 'ap_billsuc_header.ap_bill_code = ap_billsuc_detail.ap_bill_no');
          $this->db->where('ap_bill_no',$no);          
          $query = $this->db->get('ap_billsuc_detail');
          $res = $query->result();
          return $res;
        }

        public function ap_less_other()
        {
          $this->db->select('*');
          $this->db->join('account_total', 'account_total.act_code = less_other.less_ac');
          $this->db->where('status',"Y");
          $query = $this->db->get('less_other');
          $res = $query->result();
          return $res;
        }
        public function ap_bill_he($no)
        {
          $this->db->select('*');
          $this->db->where('ap_bill_code',$no);
          $query = $this->db->get('ap_billsuc_header');
          $res = $query->result();
          return $res;
        }

        public function less_other($no)
        {
          $this->db->select('*');
          $this->db->where('id_bill',$no);
          $query = $this->db->get('bill_lessother');
          $res = $query->result();
          return $res;
        }

          public function ap_bill_aps($no)
        {
             $this->db->select('*');
        $this->db->from('aps_header');
        $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer'); 
        $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer'); 
        $this->db->join('aps_detail', 'aps_detail.apsi_ref = aps_header.aps_code'); 
        $this->db->group_by('apsi_ref');
        $this->db->where('aps_code',$no);
        $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

         public function ap_bill_aps2($no)
        {
             $this->db->select('*');
        $this->db->from('aps_header');
        $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer'); 
        $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer'); 
        $this->db->where('aps_code',$no);
        $query = $this->db->get();
         $res = $query->result();
         return $res;
        }


        public function load_pettycash_m()
        {
          $this->db->from('pettycash');
         // $this->db->join('member','member.m_id = pv_apo_header.apo_member','left outer');
         // $this->db->join('vender','vender.vender_id = pv_apo_header.apo_vender','left outer');
         // $this->db->join('project', 'project.project_id = pettycash.project','left outer');
         $this->db->join('department','department.department_id = pettycash.department','left outer');
         $this->db->where('status','wait');
         $this->db->where('approve','approve');
        $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function getpettycash_m($no,$proj)
        {
          $this->db->select('*');
         $this->db->from('pettycash');
         $this->db->join('project', 'project.project_id = pettycash.project','left outer');
         $this->db->join('pettycash_item', 'pettycash_item.pettycashi_ref = pettycash.docno');
         $this->db->where('docno',$no);
         $this->db->where('pettycashi_project',$proj);
         $this->db->where('project_id',$proj);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function getpettycash_expense_m($no,$proj)
        {
          $this->db->select('*');
         $this->db->from('pettycash_item');
         // $this->db->join('account_total', 'account_total.act_code = pettycash_item.pettycashi_accode','left outer');
         $this->db->where('pettycashi_ref',$no);
         $this->db->where('pettycashi_project',$proj);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function printpettycash_m()
        {
         $this->db->select('*');
         $this->db->from('pettycash_item');         
         $this->db->join('pettycash', 'pettycash.docno = pettycash_item.pettycashi_ref');
         $this->db->join('ap_pettycash_header', 'ap_pettycash_header.doc_no = pettycash_item.pettycashi_ref');
         $this->db->where('vender_type',1);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function edit_apv()
        {
         $this->db->select('*');
         $this->db->from('apv_header');
         $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer'); 
         $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender','left outer'); 
         $this->db->where('apv_status',"wait");
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

       

        public function edit_aps()
        {
         $this->db->select('*');
         $this->db->from('aps_header');
         $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer');
         $this->db->where('aps_status',"wait"); 
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function edit_apo()
        {
         $this->db->select('*');
         $this->db->from('ap_pettycash_expense');
         $this->db->join('vender', 'vender.vender_code = ap_pettycash_expense.ex_vender');
         $this->db->join('ap_pettycash_header', 'ap_pettycash_header.ap_no= ap_pettycash_expense.ex_ref');
         $this->db->where('ap_pettycash_expense.cn','no'); 
         $this->db->order_by('ex_ref','asc');
         $this->db->group_by('ex_ref');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function edit_apo2($dt)
        {
         $this->db->select('*');
         $this->db->from('ap_pettycash_expense');
         $this->db->join('ap_expensother', 'ap_expensother.expens_code = ap_pettycash_expense.ex_expenscode');
         $this->db->join('ap_pettycash_header', 'ap_pettycash_header.ap_no= ap_pettycash_expense.ex_ref');
         $this->db->join('vender', 'vender.vender_code = ap_pettycash_expense.ex_vender');
         $this->db->where('ex_ref',$dt); 
          $this->db->where('ap_pettycash_expense.cn','no'); 
          
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }


         public function reduce_apo($pono)
        {
        $this->db->select('*');
        $this->db->from('ap_pettycash_expense');
        $this->db->join('ap_pettycash_header', 'ap_pettycash_header.ap_no= ap_pettycash_expense.ex_ref');
        $this->db->where('ex_id',$pono);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
        }

        public function get_apv($pono,$type)
        {
         $this->db->select('*');
         $this->db->from('apv_header');
         $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer'); 
         $this->db->where('apv_code',$pono);
         $this->db->where('apv_type',$type);
        $this->db->where('apv_status !=',"del");
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function get_vender()
        {
         $query = $this->db->query("
            SELECT apv_vender,vender_name FROM apv_header JOIN vender on vender.vender_code= apv_header.apv_vender where apv_status= 'wait' and status = 'approve' 
            UNION
            SELECT apr_vender,vender_name FROM ap_ret_header JOIN vender on vender.vender_code= ap_ret_header.apr_vender where apr_status='wait' and status = 'approve' 
            UNION
            SELECT apd_vender,vender_name FROM ap_down_header JOIN vender on vender.vender_code= ap_down_header.apd_vender where apd_status= 'wait'  and status = 'approve' 
            UNION
            SELECT aps_vender,vender_name FROM aps_header JOIN vender on vender.vender_code= aps_header.aps_vender where aps_status= 'wait'  and status = 'approve' 
            UNION
            SELECT ap_vendor,vender_name FROM ap_pettycash_header JOIN vender on vender.vender_code= ap_pettycash_header.ap_vendor where ap_status='wait' and status = 'approve' 
            -- UNION
            -- SELECT cns_payto,vender_name FROM cns_header JOIN vender on vender.vender_code= cns_header.cns_payto where cns_status='wait'
            -- UNION
            -- SELECT cnv_vender,vender_name FROM cnv_header JOIN vender on vender.vender_code= cnv_header.cnv_vender where cnv_status='wait'
            -- UNION
            -- SELECT cno_vender,vender_name FROM cno_header JOIN vender on vender.vender_code= cno_header.cno_vender where cno_status='wait'
          ");
          $res = $query->result();
          return $res;
        }

        public function get_bank()
        {
         $this->db->select('*');
         $this->db->from('bank');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function get_all($vender)
        {
         $this->db->select('*');
         $this->db->from('apv_header');
         $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer'); 
         $this->db->where('apv_vender',$vender);
         $this->db->where('apv_status','wait');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

         public function get_all1($vender)
        {
         $this->db->select('*');
         $this->db->from('aps_header');
         $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer');
         $this->db->where('aps_vender',$vender);
         $this->db->where('aps_status','wait');
      
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

         public function get_all2($vender)
        {
         $this->db->select('*');
         $this->db->from('ap_down_header');
         $this->db->join('project', 'project.project_id = ap_down_header.apd_project','left outer'); 
         $this->db->where('apd_vender',$vender);
         $this->db->where('apd_status','wait');
         $this->db->where('status','approve');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function get_all3($vender)
        {
         $this->db->select('*');
         $this->db->from('ap_ret_header');
         $this->db->join('project', 'project.project_id = ap_ret_header.apr_project','left outer'); 
         $this->db->where('apr_vender',$vender);
         $this->db->where('apr_status','wait');
         $this->db->where('status','approve');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }
        public function get_all4($vender)
        {
         $this->db->select('*');
         $this->db->from('ap_pettycash_header');
         $this->db->join('project', 'project.project_id = ap_pettycash_header.ap_project','left outer'); 
         $this->db->where('ap_vendor',$vender);
         $this->db->where('ap_status','wait');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function get_cns($vender)
        {
         $this->db->select('*');
         $this->db->from('cns_header');
         $this->db->join('project', 'project.project_id = cns_header.cns_project','left outer'); 
         $this->db->where('cns_payto',$vender);
         $this->db->where('cns_status','wait');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function get_cnv($vender)
        {
         $this->db->select('*');
         $this->db->from('cnv_header');
         $this->db->join('project', 'project.project_id = cnv_header.cnv_project','left outer'); 
         $this->db->where('cnv_vender',$vender);
         $this->db->where('cnv_status','wait');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function get_cno($vender)
        {
          $this->db->select('*');
        //  $this->db->select('*, sum(cno_detail.cnoi_disamt) as sum_dis');
          $this->db->from('cno_header');
          // $this->db->join('cno_detail', 'cno_header.cno_code = cno_detail.cnoi_ref');
          $this->db->where('cno_header.cno_vender', $vender);
          $this->db->where('cno_header.cno_status','wait');
          $query = $this->db->get();
          // $res = $query->result();
          if ($query->num_rows() > 0) {
            $data = $query->result();
            foreach ($query->result() as $key => $value) {
              $data[$key]->sum_dis =  $this->detail_cno($value->cno_code);
              $data[$key]->cnoi_ref =  $value->cno_code;
            }
          }else{
            $data = [];
          }
        
        return $data;
        //  var_dump($query->num_rows());
        }

        public function detail_cno($ref)
        {
          $this->db->select('sum(cno_detail.cnoi_netamt) as sum_dis');
          $this->db->from('cno_detail');
          $this->db->where('cnoi_ref', $ref);
          $query = $this->db->get();
          if($query->num_rows() > 0){
            $res = $query->result()[0]->sum_dis;
          }else{
            $res ='';
          }

          return $res;
        }

        // public function cno_code($ref)
        // {
        //   $this->db->select('cnoi_ref');
        //   $this->db->from('cno_detail');
        //   $this->db->where('cnoi_ref', $ref);
        //   $query = $this->db->get();
        //   if($query->num_rows() > 0){
        //     $res = $query->result()[0]->cnoi_ref;
        //   }else{
        //     $res ='';
        //   }

        //   return $res;
        // }
        public function get_ap_approve_he($code)
        {
         $this->db->select('*');
         $this->db->from('ap_cheque_header');
         $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
         $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');  
         $this->db->where('ap_code',$code);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }
        public function get_ap_approve_de($code)
        {
         $this->db->select('*');
         $this->db->from('ap_cheque_detail');
         $this->db->where('api_code',$code);
         $query = $this->db->get();
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


    public function getpay()
        {
          $this->db->select('*');
          $this->db->from('ap_cheque_detail');
          $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
          $this->db->where('ap_status',"confirm");
          $this->db->group_by('ap_code','desc');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

    public function getcheque_m($code)
        {
         $this->db->select('*');
         $this->db->from('ap_cheque_header');
         $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
         $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer'); 
         $this->db->join('ap_cheque_gl','ap_cheque_gl.ac_apcode=ap_cheque_header.ap_code'); 
         $this->db->where('ap_code',$code);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }


    public function getapoall($compcode)
    {
     $this->db->select('*');
     $this->db->from('ap_pettycash_header');
    $this->db->join('vender', 'vender.vender_code = ap_pettycash_header.ap_vendor');
    $this->db->join('project', 'project.project_id = ap_pettycash_header.ap_project','left outer');
    // $this->db->join('department','department.department_id = ap_pettycash_header.ap_department','left outer');
     $this->db->where('ap_status !=',"delete"); 
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function getaponot($compcode)
    {
     $this->db->select('*');
     $this->db->from('ap_pettycash_header');
    $this->db->join('vender', 'vender.vender_code = ap_pettycash_header.ap_vendor');
    $this->db->join('project', 'project.project_id = ap_pettycash_header.ap_project');
    // $this->db->join('department','department.department_id = ap_pettycash_header.ap_department','left outer');
     $this->db->where('ap_status',"wait"); 
     $this->db->group_by('ap_pettycash_header.ap_no');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function getapoopen($compcode)
    {
     $this->db->select('*');
     $this->db->from('ap_pettycash_header');
    $this->db->join('vender', 'vender.vender_code = ap_pettycash_header.ap_vendor');
    $this->db->join('project', 'project.project_id = ap_pettycash_header.ap_project','left outer');
    // $this->db->join('department','department.department_id = ap_pettycash_header.ap_department','left outer');
     $this->db->where('ap_status',"paid"); 
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function getchqnot($compcode)
    {
      $this->db->select('*');
      $this->db->from('ap_cheque_detail');
      $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');
      $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
      $this->db->where('ap_cheque_header.ap_status',"confirm");
      $this->db->where('ap_cheque_header.compcode',$compcode);
      $this->db->group_by('ap_code','desc');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function getchqall($compcode)
    {
      $this->db->select('*');
      $this->db->from('ap_cheque_detail');
      $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');
      $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
      $this->db->where('ap_cheque_header.ap_status !=',"delete")->or_where("ap_cheque_header.ap_status !=","wait");
      $this->db->where('ap_cheque_header.compcode',$compcode);
      $this->db->group_by('ap_code','desc');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function getchqopen($compcode)
    {
      $this->db->select('*');
      $this->db->from('ap_cheque_detail');
      $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');
      $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
      $this->db->where("ap_cheque_header.ap_status","complete");
      $this->db->where('ap_cheque_header.compcode',$compcode);
      $this->db->group_by('ap_code','desc');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function chqopen($compcode)
    {
      $this->db->select('*');
      $this->db->from('ap_cheque_detail');
      $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');
      $this->db->join('bank','bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
      $this->db->where("ap_cheque_header.ap_status ","wait");
      $this->db->where('ap_cheque_header.compcode',$compcode);
      $this->db->group_by('ap_code','desc');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function getpvnot($compcode)
    {
      $this->db->select('*');
      $this->db->from('ap_cheque_detail');
      $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');
      $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
      $this->db->where('ap_cheque_header.ap_status',"wait");
      $this->db->where('ap_cheque_header.compcode',$compcode);
      $this->db->group_by('ap_code','desc');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function getpvopen($compcode)
    {
      $this->db->select('*');
      $this->db->from('ap_cheque_detail');
      $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');
      $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
      $this->db->where('ap_cheque_header.ap_status',"confirm");
      $this->db->where("ap_pl !=","");
      $this->db->where('ap_cheque_header.compcode',$compcode);
      $this->db->group_by('ap_code','desc');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

        public function getclearall($compcode)
    {
      $this->db->select('*');
      $this->db->from('ap_cheque_detail');
      $this->db->join('ap_cheque_header','ap_cheque_header.ap_code = ap_cheque_detail.api_code');
      $this->db->join('vender', 'vender.vender_code = ap_cheque_header.ap_vender','left outer');
      $this->db->join('bank', 'bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
      $this->db->where('ap_status',"complete");
      $this->db->where('ap_cheque_header.compcode',$compcode);
      $this->db->group_by('ap_code','desc');
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

    public function printpettycash_wt()
    {
     $this->db->select('*');
     $this->db->from('ap_pettycash_expense');         
     $this->db->join('vender', 'vender.vender_code = ap_pettycash_expense.ex_vender');
     $this->db->join('ap_pettycash_header','ap_pettycash_header.ap_no = ap_pettycash_expense.ex_ref');
     $this->db->where('ex_wt !=',0);
     $this->db->where('ap_status',"confirm");
     $query = $this->db->get();
     $res = $query->result();
     return $res;
    }

   public function aps_printwt()
  {
    $this->db->select('*');
    $this->db->from('aps_header');   
    $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender');
    $this->db->where('aps_status',"confirm");
    $this->db->where('aps_wt !=',0);
    $query = $this->db->get();
    $res = $query->result();
    return $res;
  }

  public function get_cheque($code)
        {
         $this->db->select('*');
         $this->db->select_sum('api_amt');
         $this->db->select_sum('api_adv');
         $this->db->select_sum('api_vatamt');
         $this->db->select_sum('api_wtamt');
         $this->db->select_sum('api_netamt');
         $this->db->from('ap_cheque_header');
         $this->db->join('vender','vender.vender_code = ap_cheque_header.ap_vender','left outer');
         $this->db->join('ap_cheque_detail','ap_cheque_detail.api_code = ap_cheque_header.ap_code');
         $this->db->join('bank','bank.bank_code = ap_cheque_header.ap_bank_id','left outer');
         $this->db->where('ap_cheque_header.ap_status',"wait");
         $this->db->where('ap_code',$code);
         $this->db->group_by('ap_code');
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }

        public function rec_apo($no)
        {
          $this->db->select('*');
          $this->db->join('ap_pettycash_header', 'ap_pettycash_header.ap_no = ap_pettycash_expense.ex_ref','left outer');
          $this->db->where('ex_ref',$no);
          $this->db->group_by('ex_ref');
          $query = $this->db->get('ap_pettycash_expense');
          $res = $query->result();
          return $res;
        }

        public function ed_apo($code)
        {
          $this->db->select('*');
          $this->db->join('ap_pettycash_header', 'ap_pettycash_header.ap_no = ap_pettycash_expense.ex_ref','left outer');
          $this->db->join('vender', 'vender.vender_code = ap_pettycash_expense.ex_vender','left outer');          
          $this->db->where('ex_ref',$code);
          $this->db->group_by('ex_ref');
          $query = $this->db->get('ap_pettycash_expense');
          $res = $query->result();
          return $res;
        }

        public function apo_gl($code)
        {
          $this->db->select('*');            
          $this->db->where('vchno',$code);         
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
        }

        public function ed_apo_h($code)
        {
          $this->db->select('*');
          $this->db->join('project', 'project.project_id = ap_pettycash_header.ap_project','left outer');
          $this->db->join('system', 'system.systemid = ap_pettycash_header.ap_system','left outer');              
          $this->db->where('ap_no',$code);
          $query = $this->db->get('ap_pettycash_header');
          $res = $query->result();
          return $res;
        }

        public function get_apv_h($code)
        {
          $this->db->select('*');
          $this->db->join('system', 'system.systemcode = apv_header.apv_system','left outer');
          $this->db->join('department', 'department.department_id = apv_header.apv_department','left outer');
          $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer');
          $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender','left outer');
          $this->db->where('apv_code',$code);
          $query = $this->db->get('apv_header');
          $res = $query->result();
          return $res;
        } 

        public function get_apv_gl($code,$type)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->join('account_total','account_total.act_code = ap_gl.acct_no');
          $this->db->join('apv_header', 'apv_header.apv_code = ap_gl.vchno');
          $this->db->where('vchno',$code);
          $this->db->where('doctype',$type);
          $this->db->where('account_total.compcode',$compcode);
          $this->db->where('apv_header.compcode',$compcode);
          $this->db->order_by('gltype','ASC ');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
        }
        public function get_apv_d($code)
        {
          $this->db->select('*');
          // $this->db->join('account_total','account_total.act_code = ap_gl.acct_no');
          // $this->db->join('apv_header', 'apv_header.apv_code = ap_gl.vchno');
          $this->db->where('apvi_ref',$code);
          $query = $this->db->get('apv_detail');
          $res = $query->result();
          return $res;
        }

        public function get_apv_t($code)
        {
          $this->db->select('*');
          $this->db->join('apv_header', 'apv_header.apv_code = ap_tax.ap_code');
          $this->db->join('vender', 'vender.vender_code = ap_tax.vender_id');
          $this->db->where('ap_code',$code);
          $query = $this->db->get('ap_tax');
          $res = $query->result();
          return $res;
        }

        public function get_apv_v($ven)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender');
          $this->db->where('vender_code',$ven);
          $query = $this->db->get('apv_header');
          $res = $query->result();
          return $res;
        }

        public function get_apd_h($code)
        {
          $this->db->select('*');
          $this->db->join('system', 'system.systemcode = ap_down_header.apd_job','left outer');
          $this->db->join('department', 'department.department_id = ap_down_header.apd_dep','left outer');
          $this->db->join('project', 'project.project_id = ap_down_header.apd_project','left outer');
          $this->db->join('vender', 'vender.vender_code = ap_down_header.apd_vender','left outer');
          $this->db->where('apd_code',$code);
          $query = $this->db->get('ap_down_header');
          $res = $query->result();
          return $res;
        } 

        public function get_apd_gl($code,$type)
        {
          $this->db->select('*');
          $this->db->from('ap_gl');
          $this->db->join('account_total','account_total.act_code = ap_gl.acct_no');
          $this->db->join('ap_down_header', 'ap_down_header.apd_code = ap_gl.vchno');
          $this->db->where('vchno',$code);
          $this->db->where('doctype',$type);
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function get_apd_d($code)
        {
          $this->db->select('*');
          $this->db->where('apdi_ref',$code);
          $query = $this->db->get('ap_down_detail');
          $res = $query->result();
          return $res;
        }
        public function get_apd_t($code)
        {
          $this->db->select('*');
          $this->db->join('ap_down_header', 'ap_down_header.apd_code = ap_tax.ap_code');
          $this->db->join('vender', 'vender.vender_code = ap_tax.vender_id');
          $this->db->where('apd_code',$code);
          $query = $this->db->get('ap_tax');
          $res = $query->result();
          return $res;
        }

        public function get_apr_h($code)
        {
          $this->db->select('*');
          $this->db->join('system', 'system.systemcode = ap_ret_header.apr_system','left outer');
          $this->db->join('project','project.project_id=ap_ret_header.apr_project','left outer');
          $this->db->join('vender', 'vender.vender_code = ap_ret_header.apr_vender','left outer');
          $this->db->where('apr_code',$code);
          $query = $this->db->get('ap_ret_header');
          $res = $query->result();
          return $res;
        } 

        public function get_apr_gl($code,$type)
        {
          $this->db->select('*');
          $this->db->join('account_total','account_total.act_code = ap_gl.acct_no');
          $this->db->join('ap_ret_header', 'ap_ret_header.apr_code = ap_gl.vchno');
          $this->db->where('vchno',$code);
          $this->db->where('doctype',$type);
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
        }

        public function get_apr_d($code)
        {
          $this->db->select('*');
          $this->db->where('apri_ref',$code);
          $query = $this->db->get('ap_ret_detail');
          $res = $query->result();
          return $res;
        }

         public function get_aps_gl($code,$type)
        {
          $this->db->select('*');
          $this->db->join('account_total','account_total.act_code = ap_gl.acct_no');
          $this->db->join('aps_header', 'aps_header.aps_code = ap_gl.vchno');
          $this->db->where('vchno',$code);
          $this->db->where('doctype',$type);
          $this->db->order_by('costcode','DESC');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
        }

        public function get_aps_h($code)
        {
          $this->db->select('*');
          $this->db->join('system', 'system.systemcode = aps_header.aps_system','left outer');
          $this->db->join('project', 'project.project_id = aps_header.aps_project','left outer');
          $this->db->join('vender', 'vender.vender_code = aps_header.aps_vender','left outer');
          $this->db->where('aps_code',$code);
          $query = $this->db->get('aps_header');
          $res = $query->result();
          return $res;
        } 

        public function get_aps_d($code)
        {
          $this->db->select('*');
          $this->db->where('apsi_ref',$code);
          $query = $this->db->get('aps_detail');
          $res = $query->result();
          return $res;
        }
        public function getapv_reduce($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cnv_header.cnv_vender','left outer');
          $this->db->join('project', 'project.project_id = cnv_header.cnv_project','left outer');
          $this->db->where('cnv_status',"wait");
          $this->db->order_by('cnv_code','ASC');
          $this->db->where('cnv_header.compcode',$compcode);
          $query = $this->db->get('cnv_header');
          $res = $query->result();
          return $res;
        }

        public function getapv_reduce_all($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cnv_header.cnv_vender','left outer');
          $this->db->join('project', 'project.project_id = cnv_header.cnv_project','left outer');
          $this->db->order_by('cnv_code','ASC');
          // $this->db->order_by('cnv_id', 'DESC');
          $this->db->where('cnv_header.compcode',$compcode);
          $query = $this->db->get('cnv_header');
          $res = $query->result();
          return $res;
        }
        public function getapv_reduce_open($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cnv_header.cnv_vender','left outer');
          $this->db->join('project', 'project.project_id = cnv_header.cnv_project','left outer');
          $this->db->where('cnv_status',"paid");
          $this->db->order_by('cnv_code','ASC');
          $this->db->where('cnv_header.compcode',$compcode);
          $query = $this->db->get('cnv_header');
          $res = $query->result();
          return $res;
        }

        public function getaps_reduce($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cns_header.cns_payto','left outer');
          $this->db->join('project', 'project.project_id = cns_header.cns_project','left outer');
          $this->db->where('cns_status',"wait");
          $this->db->order_by('cns_code','ASC');
          $this->db->where('cns_header.compcode',$compcode);
          $query = $this->db->get('cns_header');
          $res = $query->result();
          return $res;
        }

        public function getaps_reduce_all($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cns_header.cns_payto','left outer');
          $this->db->join('project', 'project.project_id = cns_header.cns_project','left outer');
          $this->db->order_by('cns_code','ASC');
          $this->db->where('cns_header.compcode',$compcode);
          $query = $this->db->get('cns_header');
          $res = $query->result();
          return $res;
        }

        public function getaps_reduce_open($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cns_header.cns_payto','left outer');
          $this->db->join('project', 'project.project_id = cns_header.cns_project','left outer');
          $this->db->order_by('cns_code','ASC');
          $this->db->where('cns_status',"paid");
          $this->db->where('cns_header.compcode',$compcode);
          $query = $this->db->get('cns_header');
          $res = $query->result();
          return $res;
        }

        public function getapo_reduce($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cno_header.cno_vender','left outer');
          $this->db->join('project', 'project.project_id = cno_header.cno_project','left outer');
          $this->db->where('cno_status',"wait");
          // $this->db->order_by('cns_header','ASC');
          $this->db->where('cno_header.compcode',$compcode);
          $query = $this->db->get('cno_header');
          $res = $query->result();
          return $res;
        }

        public function getapo_reduce_all($compcode)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cno_header.cno_vender','left outer');
          $this->db->join('project', 'project.project_id = cno_header.cno_project','left outer');
          // $this->db->where('cno_status',"wait");
          $this->db->where('cno_header.compcode',$compcode);
          $query = $this->db->get('cno_header');
          $res = $query->result();
          return $res;
        }

        public function cnv_gl($code, $compcode)
        {
          $this->db->select('ap_gl.*, account_total.act_name');
          $this->db->from('ap_gl');
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->where('ap_gl.vchno', $code);
          $this->db->where('ap_gl.compcode', $compcode);
          $query = $this->db->get();

          if ($query->num_rows() > 0) {
            $datas = $query->result();
            $petten = array(
              'VENDER',
              'VAT',
              'AMOUNT'
            );

            $res = array();

            foreach ($datas as $key => $data) {
              foreach ($petten as $key => $value) {
                if ($data->gltype == $petten[$key]) {
                  $res[] = $datas[$key];
                  break;
                }
              }
            }

          }else{
            $res = [];
          }

          return $res;
        }

        public function cns_gl($code, $compcode)
        {
          $this->db->select('ap_gl.*, account_total.act_name');
          $this->db->from('ap_gl');
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->where('ap_gl.vchno', $code);
          $this->db->where('ap_gl.compcode', $compcode);
          $query = $this->db->get();

          if ($query->num_rows() > 0) {
            $datas = $query->result();
            $petten = array(
              'VENDER',
              'VAT',
              'AMOUNT'
            );

            $res = array();

            foreach ($datas as $key => $data) {
              foreach ($petten as $key => $value) {
                if ($data->gltype == $petten[$key]) {
                  $res[] = $datas[$key];
                  break;
                }
              }
            }

          }else{
            $res = [];
          }

          return $res;
        }

        public function cno_gl($code, $compcode)
        {
          $this->db->select('ap_gl.*, account_total.act_name');
          $this->db->from('ap_gl');
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->where('ap_gl.vchno', $code);
          $this->db->where('ap_gl.compcode', $compcode);
          $query = $this->db->get();

          if ($query->num_rows() > 0) {
            $datas = $query->result();
            $petten = array(
              'VENDER',
              'VAT',
              'AMOUNT'
            );

            $res = array();

            foreach ($datas as $key => $data) {
              foreach ($petten as $key => $value) {
                if ($data->gltype == $petten[$key]) {
                  $res[] = $datas[$key];
                  break;
                }
              }
            }

          }else{
            $res = [];
          }

          return $res;
        }

        public function cnv_tax($code, $compcode)
        {
          $this->db->select('*');
          $this->db->from('ap_cnv_tax');
          $this->db->join('vender', 'vender.vender_code = ap_cnv_tax.vender_id');
          $this->db->where('ref_cnv_code', $code);
          $query = $this->db->get();

          if ($query->num_rows() > 0 ) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function cns_tax($code, $compcode)
        {
          $this->db->select('*');
          $this->db->from('cns_tax');
          $this->db->join('vender', 'vender.vender_code = cns_tax.vender_code');
          $this->db->where('ref_cns_code', $code);
          $query = $this->db->get();

          if ($query->num_rows() > 0 ) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function cnv_head($code, $compcode)
        {
          $this->db->select('
            cnv_header.*, 
            vender.vender_name, 
            system.systemname, 
            project.project_name
          ');
          $this->db->from('cnv_header');
          $this->db->join('vender', 'vender.vender_code = cnv_header.cnv_vender');
          $this->db->join('system', 'system.systemcode = cnv_header.cnv_system');
          $this->db->join('project', 'project.project_id = cnv_header.cnv_project');
          $this->db->where('cnv_header.cnv_code', $code);
          $this->db->where('cnv_header.compcode', $compcode);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result()[0];
          }else{
            $res = [];
          }

          return $res;
        }

        public function cns_head($code, $compcode)
        {
          $this->db->select('
            cns_header.*, 
            vender.vender_name, 
            system.systemname, 
            project.project_name
          ');
          $this->db->from('cns_header');
          $this->db->join('vender', 'vender.vender_code = cns_header.cns_payto');
          $this->db->join('system', 'system.systemcode = cns_header.cns_system');
          $this->db->join('project', 'project.project_id = cns_header.cns_project');
          $this->db->where('cns_header.cns_code', $code);
          $this->db->where('cns_header.compcode', $compcode);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result()[0];
          }else{
            $res = [];
          }

          return $res;
        }

        public function cno_head($code, $compcode)
        {
          $this->db->select('
            cno_header.*, 
            vender.vender_name, 
            system.systemname, 
            project.project_name
          ');
          $this->db->from('cno_header');
          $this->db->join('vender', 'vender.vender_code = cno_header.cno_vender');
          $this->db->join('system', 'system.systemcode = cno_header.cno_system');
          $this->db->join('project', 'project.project_id = cno_header.cno_project');
          $this->db->where('cno_header.cno_code', $code);
          $this->db->where('cno_header.compcode', $compcode);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result()[0];
          }else{
            $res = [];
          }

          return $res;
        }

        public function get_cns_h($code)
        {
          $this->db->select('*');
          $this->db->join('vender', 'vender.vender_code = cns_header.cns_payto','left outer');
          $this->db->join('project', 'project.project_id = cns_header.cns_project','left outer');
          $this->db->join('system', 'system.systemcode = cns_header.cns_system','left outer');
          $this->db->where('cns_code',$code);
          $query = $this->db->get('cns_header');
          $res = $query->result();
          return $res;
        }

        public function get_cno_h($code)
        {
          $this->db->select('*');
          // $this->db->join('cno_detail', 'cno_detail.cnoi_ref = cno_header.cno_code','left outer');
          $this->db->join('vender', 'vender.vender_code = cno_header.cno_vender','left outer');
          $this->db->join('project', 'project.project_id = cno_header.cno_project','left outer');
          $this->db->join('system', 'system.systemcode = cno_header.cno_system','left outer');
          $this->db->where('cno_code',$code);
          $query = $this->db->get('cno_header');
          $res = $query->result();
          return $res;
        }

        public function cno_detail($code)
        {
          $session = $this->session->userdata('sessed_in');
          $this->db->select('*');
          $this->db->from('cno_header');
          $this->db->join('cno_detail', 'cno_header.cno_code = cno_detail.cnoi_ref');
          $this->db->where('cno_detail.cnoi_ref', $code);
          $this->db->where('cno_header.compcode', $session['compcode']);

          $query = $this->db->get();

          if ($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function edit_cno_rec($code)
        {
          $this->db->select('*');
          $this->db->where('cnoi_ref',$code);
          $query = $this->db->get('cno_detail');
          $res = $query->result();
          return $res;
        }

        public function edit_cno($code)
        {
          $this->db->select('*');
          $this->db->where('cnoi_id',$code);
          $query = $this->db->get('cno_detail');
          $res = $query->result();
          return $res;
        }

        public function get_currency($comp)
        {
          $this->db->select('*');
          $this->db->where('compcode',$comp);
          $query = $this->db->get('currency');
          $res = $query->result_array();
          return $res;
        }

        public function get_wt()
        {
          $this->db->select('*');
          $query = $this->db->get('setupwt');
          $res = $query->result_array();
          return $res;
        }


        public function get_apvp($comp)
        {
          $this->db->select('*');
          $this->db->where('compcode',$comp);
          $this->db->where('active',"Y");
          $query = $this->db->get('ap_vender_pull');
          $res = $query->result_array();
          return $res;
        }

        public function tab_gl_aps($code)
        {
          $session = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('ap_gl');
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->where('vchno', $code);
          $this->db->where('account_total.compcode', $session['compcode']);
          $this->db->order_by('ap_gl.id_apgl', 'ASC');
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function tab_progress_aps($code)
        {
          $session = $this->session->userdata('sessed_in');

          $this->db->select('aps_detail.*, mat_unit.materialname');
          $this->db->from('aps_detail');
          $this->db->join('mat_unit', 'mat_unit.materialcode = aps_detail.apsi_matcode');
          $this->db->where('aps_detail.apsi_ref', $code);
          $this->db->where('aps_detail.compcode', $session['compcode']);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function tab_tax_aps($code)
        {
          $this->db->select('ap_tax.*, vender.vender_name');
          $this->db->from('ap_tax');
          $this->db->join('vender', 'vender.vender_code = ap_tax.vender_id');
          $this->db->where('ap_tax.ap_code', $code);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }
        public function get_lo($code)
        {
          $this->db->select('aps_billno');
          $this->db->from('aps_header');
          $this->db->where('aps_code', $code);
          $this->db->limit(1);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result()[0]->aps_billno;
          }else{
            $res = '';
          }

          return $res;
        }

        public function tab_less_aps($code)
        {
          $bill = $this->get_lo($code);

          $this->db->select('*');
          $this->db->from('bill_lessother');
          $this->db->where('bill_lessother.id_bill', $bill);
          $query = $this->db->get();

          if($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

         public function load_ap_forgl($start,$stop,$datatype){
          if($datatype=="all"){
          $this->db->select('*');
          $this->db->where('ap_gl.vchdate >=', $start);
          $this->db->where('ap_gl.vchdate <=', $stop);
          $this->db->where('ap_gl.status',NULL);
          $this->db->group_by('ap_gl.acct_no');
          $this->db->group_by('ap_gl.costcode');
          $this->db->group_by('ap_gl.projectid');
          $this->db->group_by('ap_gl.systemcode');  
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->join('project', 'project.project_id = ap_gl.projectid');
          $this->db->join('system', 'system.systemcode = ap_gl.systemcode');
          $this->db->join('vender', 'vender.vender_code = ap_gl.vendor_id');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
          }else{
          $this->db->select('*');
          $this->db->where('ap_gl.vchdate >=', $start);
          $this->db->where('ap_gl.vchdate <=', $stop);
          $this->db->where('ap_gl.doctype', $datatype);
          $this->db->where('ap_gl.status',NULL);
          $this->db->group_by('ap_gl.acct_no');
          $this->db->group_by('ap_gl.costcode');
          $this->db->group_by('ap_gl.projectid');
          $this->db->group_by('ap_gl.systemcode');  
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->join('project', 'project.project_id = ap_gl.projectid');
          $this->db->join('system', 'system.systemcode = ap_gl.systemcode');
          $this->db->join('vender', 'vender.vender_code = ap_gl.vendor_id');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
          }
         }


         public function load_ap_forgl2($start,$stop,$datatype){
           if($datatype=="all"){
          $this->db->select('*');
          $this->db->where('ap_gl.vchdate >=', $start);
          $this->db->where('ap_gl.vchdate <=', $stop);
          $this->db->where('ap_gl.status',NULL); 
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->join('project', 'project.project_id = ap_gl.projectid');
          $this->db->join('system', 'system.systemcode = ap_gl.systemcode');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
           }else{
          $this->db->select('*');
          $this->db->where('ap_gl.vchdate >=', $start);
          $this->db->where('ap_gl.vchdate <=', $stop);
          $this->db->where('ap_gl.doctype', $datatype);
          $this->db->where('ap_gl.status',NULL); 
          $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
          $this->db->join('project', 'project.project_id = ap_gl.projectid');
          $this->db->join('system', 'system.systemcode = ap_gl.systemcode');
          $query = $this->db->get('ap_gl');
          $res = $query->result();
          return $res;
          }
         }

         public function gl_book(){
          $this->db->select('*');
          $this->db->where('gl_book.bookcode',"0004"); 
          $query = $this->db->get('gl_book');
          $res = $query->result();
          return $res;
         }

}
