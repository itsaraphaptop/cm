<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ar_m extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function option_type()
    {
      $this->db->select('*');
      return $this->db->get('option_type')->result();  
    }
    
    public function get_ar_h($no,$compcode)
    {
      $this->db->select('*');
      $this->db->where('inv_no',$no);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('ar_inv_header');
      $res = $query->result();
      return $res;
    }
    public function get_ar_d($arno,$compcode)
    {
      $this->db->select('*');
      $this->db->where('inv_ref',$arno);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('ar_inv_detail');
      $res = $query->result();
      return $res;
    }
    public function get_ar_vou($vou_no,$compcode)
    {
      $this->db->select('*');
      $this->db->where('vou_ref',$vou_no);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('ar_voucher_detail');
      $res = $query->result();
      return $res;
    }
    public function get_ar_de($no)
    {
      $this->db->select('*');
      $this->db->where('inv_ref',$no);
      // $this->db->where('compcode',$compcode);
      $query = $this->db->get('ar_inv_detail');
      $res = $query->result();
      return $res;
    }
    public function get_ar_gl($no)
    {
      $this->db->select('*');
      $this->db->where('vchno',$no);
      // $this->db->where('compcode',$compcode);
      $this->db->join('ar_inv_detail','ar_inv_detail.inv_ref=ar_gl.vchno');
      $query = $this->db->get('ar_gl');
      $res = $query->result();
      return $res;
    }
     public function get_ar_ed($arno)
    {
      $this->db->select('*');
      $this->db->where('vou_no',$arno);
      $this->db->join('project','project.project_id=ar_voucher_header.vou_project');
      $this->db->join('debtor','debtor.debtor_code=ar_voucher_header.vou_owner');
      $this->db->join('ar_gl','ar_gl.vchno=ar_voucher_header.vou_no');
      $this->db->join('ar_voucher_detail','ar_voucher_detail.vou_ref=ar_voucher_header.vou_no');
      $query = $this->db->get('ar_voucher_header');
      $res = $query->result();
      return $res;
    }
    public function project($id,$compcode)
    {
      $this->db->select('project_name');
      $this->db->where('project_id',$id);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }
    public function debtor($id,$compcode)
    {
      $this->db->select('*');
      $this->db->where('debtor_code',$id);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('debtor');
      $res = $query->result();
      return $res;
    }
    public function tradding($pro)
    {
      // echo $pro;die();
      $this->db->select('*');
      $this->db->from('trad_header');
      $this->db->join('project','project.project_code=trad_header.projectcode');
      $this->db->join('system','system.systemcode=trad_header.job_name');
      $this->db->where('project.project_id',$pro);
      $query = $this->db->get();
      $res = $query->result_array();

      // $this->output->enable_profiler(TRUE);
      return $res;
    }
    public function companyimgbycompcode($compcode,$id)
    {
        $this->db->select('*');
        $this->db->from('ar_inv_header');
        $this->db->join('project','project.project_id=ar_inv_header.inv_project','left outer');
        $this->db->join('ar_inv_detail','ar_inv_detail.inv_ref = ar_inv_header.inv_no');
        $this->db->join('company','company.compcode = ar_inv_header.compcode');
        $this->db->join('debtor','debtor.debtor_code = ar_inv_header.inv_owner');
        $this->db->where('ar_inv_header.compcode',$compcode);
        $this->db->where('ar_inv_header.inv_no',$id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
    public function voucher_report($compcode,$id)
    {
        $this->db->select('*');
        $this->db->from('ar_voucher_header');
        $this->db->join('project','project.project_id=ar_voucher_header.vou_project','left outer');
        $this->db->join('company','company.compcode = ar_voucher_header.compcode');
        $this->db->join('debtor','debtor.debtor_code = ar_voucher_header.vou_owner');
        $this->db->where('ar_voucher_header.compcode',$compcode);
        $this->db->where('ar_voucher_header.vou_no',$id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function receipt_report($compcode,$id)
    {
        $this->db->select('*');
        $this->db->from('ar_receipt_header');
        $this->db->join('project','project.project_id=ar_receipt_header.vou_project','left outer');
        $this->db->join('company','company.compcode = ar_receipt_header.compcode');
        $this->db->join('debtor','debtor.debtor_code = ar_receipt_header.vou_owner');
        $this->db->where('ar_receipt_header.compcode',$compcode);
        $this->db->where('ar_receipt_header.vou_no',$id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function receipt_name($id)
    {
        $this->db->select('*');
        $this->db->from('ar_gl');
        $this->db->join('account_total','account_total.act_code=ar_gl.acct_no');
        $this->db->join('ar_receipt_header','ar_receipt_header.vou_no = ar_gl.vchno');
        $this->db->where('ar_gl.vchno',$id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function acctno_name($id)
    {
        $this->db->select('*');
        $this->db->from('ar_gl');
        $this->db->join('account_total','account_total.act_code=ar_gl.acct_no');
        $this->db->join('ar_voucher_header','ar_voucher_header.vou_no = ar_gl.vchno');
        $this->db->where('ar_gl.vchno',$id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
    
    public function getinvoice($compcode)
    {
      $this->db->select('*');
      $this->db->from('ar_inv_header');
      $this->db->join('project','project.project_id=ar_inv_header.inv_project','left outer');
      $this->db->join('debtor','debtor.debtor_code=ar_inv_header.inv_owner','left outer');
      $this->db->where('ar_inv_header.inv_status',null);
      $this->db->where('ar_inv_header.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getvoucher($compcode)
    {
      $this->db->select('*');
      $this->db->from('ar_voucher_header');
      $this->db->join('project','project.project_id=ar_voucher_header.vou_project','left outer');
      $this->db->join('debtor','debtor.debtor_code=ar_voucher_header.vou_owner','left outer');
      $this->db->where('ar_voucher_header.vou_status',null);
      $this->db->where('ar_voucher_header.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }

    public function edit_ar_voucher($id,$compcode)
    {
      $this->db->select('*');
      $this->db->where('vou_no',$id);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('ar_voucher_header');
      $res = $query->result();
      return $res;
    }
    public function getarvoucher($compcode)
    {
      $this->db->select('*');
      $this->db->from('ar_voucher_header');
      $this->db->join('project','project.project_id=ar_voucher_header.vou_project','left outer');
      $this->db->join('debtor','debtor.debtor_code=ar_voucher_header.vou_owner','left outer');
      $this->db->where('ar_voucher_header.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function get_voucher_d($arno,$compcode)
    {
      $this->db->select('*');
      $this->db->where('vou_no',$arno);
      // $this->db->where('compcode',$compcode);
      // $this->db->join('ar_gl','ar_gl.vchno=ar_voucher_header.vou_no');
      $this->db->join('ar_voucher_detail','ar_voucher_detail.vou_ref=ar_voucher_header.vou_no');
      $query = $this->db->get('ar_voucher_header');
      $res = $query->result();
      return $res;
    }
    public function get_acct_no($no,$compcode)
    {
      $this->db->select('*');
      $this->db->where('vchno',$no);
      $this->db->join('account_total','account_total.act_code=ar_gl.acct_no');
      $query = $this->db->get('ar_gl');
      $res = $query->result();
      return $res;
    }
    public function edit_receipt($id,$compcode)
    {
      $this->db->select('*');
      $this->db->where('vou_no',$id);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('ar_receipt_header');
      $res = $query->result();
      return $res;
    }
    public function get_receipt_d($rec,$compcode)
    {
      $this->db->select('*');
      $this->db->where('vou_ref',$rec);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('ar_receipt_detail');
      $res = $query->result();
      return $res;
    }
    public function getarreceipt($compcode)
    {
      $this->db->select('*');
      $this->db->from('ar_receipt_header');
      $this->db->join('project','project.project_id=ar_receipt_header.vou_project','left outer');
      $this->db->join('debtor','debtor.debtor_code=ar_receipt_header.vou_owner','left outer');
      $this->db->where('ar_receipt_header.compcode',$compcode);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }


    public function invoicedown($id) 
      {
        $this->db->select('*,sum(ar_invretention_detail.inv_retentionamt) as payment_system');
        $this->db->where('project.project_id',$id);
        $this->db->where('ar_invretention_header.inv_project',$id);
        // $this->db->join('project_item','project_item.project_code=project.project_code');
        $this->db->join('ar_invretention_header','ar_invretention_header.inv_project=project.project_id');
        $this->db->join('ar_invretention_detail','ar_invretention_header.inv_no = ar_invretention_detail.inv_ref');
        // $this->db->join('system','ar_invretention_detail.inv_system = system.systemname');
        $this->db->group_by('ar_invretention_detail.inv_system');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;


         
          // $this->db->where('ar_invretention_header.inv_project',$id);
          // $this->db->group_by('ar_invretention_detail.inv_system');
      }

    

    public function getproject_user($username,$id)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('project_ic','project_ic.project_id = project.project_id');
        $this->db->join('member','member.m_id = project_ic.proj_user');
        $this->db->where('project_ic.proj_user',$username);
        $this->db->where('project_ic.project_status',"Y");
        $this->db->where('project.project_department',"1");
        $this->db->where('project.project_status',"normal");
        $this->db->order_by('project.project_id','desc');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function getdepartment()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $this->db->select('*');
      // $this->db->where('compcode',$compcode);
      $this->db->where('project.project_department',"2");
      $this->db->where('project.project_status !=', 'close');
      $this->db->where('project.project_sub', 'no');
      $this->db->order_by('project_code','desc');
      $query = $this->db->get('project');
      $res = $query->result();
      return $res;
    }

    public function getdepart_user($username)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('member','member.m_id = project_ic.proj_user');
        $this->db->where('project.project_department',"2");
        $this->db->where('project.project_status !=', 'close');
        $this->db->where('project.project_sub', 'no');
        $this->db->where('m_id',$username);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function get_invdown_project($pro)
        {
          $this->db->select('*');
          $this->db->where('project_id',$pro);
          $query = $this->db->get('project');
          $res = $query->result();
          return $res;
        } 

    public function load_invdown_header($id)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id = ar_invdown_header.inv_project');
          $this->db->where('inv_project',$id);
          $this->db->where('inv_status','N');
          $query = $this->db->get('ar_invdown_header');
          $res = $query->result();
          return $res;
        }

    public function get_invdown_header($no,$period)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_invdown_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invdown_header.inv_owner','left outer');
          $this->db->join('currency','currency.currency_id = ar_invdown_header.currency');
          $this->db->where('inv_no',$no);
          $this->db->where('inv_period',$period);
          $query = $this->db->get('ar_invdown_header');
          $res = $query->result();
          return $res;
        } 


    public function get_invdown_detail($no,$period)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->join('system','system.systemcode = ar_invdown_detail.inv_system');
          $this->db->where('inv_ref',$no);
          $this->db->where('inv_period',$period);
          $this->db->where('ar_invdown_detail.compcode',$compcode);
          $this->db->where('system.compcode',$compcode);
          $this->db->where('inv_netamt !=',0);
          $query = $this->db->get('ar_invdown_detail');
          $res = $query->result();
          return $res;
        }

    public function load_invprogress_header($id)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id = ar_invprogress_header.inv_project');
          $this->db->where('inv_project',$id);
          $query = $this->db->get('ar_invprogress_header');
          $res = $query->result();
          return $res;
        }

    public function get_invprogress_detail($no,$period)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->join('system','system.systemcode = ar_invprogress_detail.inv_system');
          $this->db->where('inv_ref',$no);
          $this->db->where('inv_period',$period);
          $this->db->where('inv_netamt !=',0);
          $this->db->where('system.compcode',$compcode);
          $query = $this->db->get('ar_invprogress_detail');
          $res = $query->result();
          return $res;
        }

    public function get_invprogress_header($no,$period)
        {
          $this->db->select('*');
          $this->db->join('currency','currency.currency_id = ar_invprogress_header.currency');
          $this->db->where('inv_no',$no);
          $this->db->where('inv_period',$period);
          $query = $this->db->get('ar_invprogress_header');
          $res = $query->result();
          return $res;
        }

    public function invretention($code)
      {
        $this->db->select('*');
        $this->db->where('project.project_code',$code);
        $this->db->join('project_item','project_item.project_code=project.project_code');
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
      }

      public function load_invretention_header($id)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id = ar_invretention_header.inv_project');
          $this->db->where('inv_project',$id);
          $query = $this->db->get('ar_invretention_header');
          $res = $query->result();
          return $res;
        }

        public function get_invretention_detail($no,$period)
        {
          $this->db->select('*');
          $this->db->join('system','system.systemcode = ar_invretention_detail.inv_system');
          $this->db->where('inv_ref',$no);
          $this->db->where('inv_period',$period);
          // $this->db->where('inv_netamt !=',0);
          $query = $this->db->get('ar_invretention_detail');
          $res = $query->result();
          return $res;
        }

        public function get_invretention_header($no,$period)
        {
          $this->db->select('*');
          $this->db->join('currency','currency.currency_id = ar_invretention_header.currency');
          $this->db->where('inv_no',$no);
          $this->db->where('inv_period',$period);
          $query = $this->db->get('ar_invretention_header');
          $res = $query->result();
          return $res;
        }

        public function getinvdown_no($pro)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invdown_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invdown_header.inv_owner','left outer');
          $this->db->from('ar_invdown_header');
          $this->db->where('inv_project',$pro);
          $this->db->where('inv_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvdown_no2()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invdown_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invdown_header.inv_owner','left outer');
          $this->db->from('ar_invdown_header');
          $this->db->where('inv_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvdown_to()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invdown_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invdown_header.inv_owner','left outer');
          $this->db->from('ar_invdown_header');
          $this->db->where('inv_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvdown_all()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invdown_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invdown_header.inv_owner','left outer');
          $this->db->where('inv_status !=','D');
          $this->db->from('ar_invdown_header');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }


        public function getinvprogress_no($pro)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invprogress_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invprogress_header.inv_owner','left outer');
          $this->db->from('ar_invprogress_header');
          $this->db->where('inv_project',$pro);
          $this->db->where('inv_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvprogress_no2()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invprogress_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invprogress_header.inv_owner','left outer');
          $this->db->from('ar_invprogress_header');
          $this->db->where('inv_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvprogress_to()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invprogress_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invprogress_header.inv_owner','left outer');
          $this->db->from('ar_invprogress_header');
          $this->db->where('inv_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvprogress_all()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invprogress_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invprogress_header.inv_owner','left outer');
          $this->db->from('ar_invprogress_header');
          $this->db->where('inv_status !=','D');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvreten_no($pro)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invretention_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invretention_header.inv_owner','left outer');
          $this->db->from('ar_invretention_header');
          $this->db->where('inv_project',$pro);
          $this->db->where('inv_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvreten_no2()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invretention_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invretention_header.inv_owner','left outer');
          $this->db->from('ar_invretention_header');
          $this->db->where('inv_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }


        public function getinvreten_all()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_invretention_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invretention_header.inv_owner','left outer');
          $this->db->from('ar_invretention_header');
          $this->db->where('inv_status !=','D');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvreten_to()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_invretention_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invretention_header.inv_owner','left outer');
          $this->db->from('ar_invretention_header');
          $this->db->where('inv_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvdown_ar()
        {
          $this->db->select('*');
          $this->db->from('ar_invdown_header');
          $this->db->where('inv_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvpro_ar()
        {
          $this->db->select('*');
          $this->db->from('ar_invprogress_header');
          $this->db->where('inv_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getinvreten_ar()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_account_header.acc_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_account_header.acc_owner','left outer');
          $this->db->from('ar_invretention_header');
          $this->db->where('inv_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getaccount_no()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_account_header.acc_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_account_header.acc_owner','left outer');
          $this->db->from('ar_account_header');
          $this->db->where('acc_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getaccount_to()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_account_header.acc_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_account_header.acc_owner','left outer');
          $this->db->from('ar_account_header');
          $this->db->where('acc_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getaccount_all()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_account_header.acc_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_account_header.acc_owner','left outer');
          $this->db->from('ar_account_header');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getaccount_he($no)
        {
          $this->db->select('*');
          $this->db->where('acc_no',$no);
          $this->db->from('ar_account_header');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getaccount_de($no)
        {
          $this->db->select('*');
          $this->db->where('acc_ref',$no);
          $this->db->from('ar_account_detail');
          $this->db->order_by('acc_systemcode');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function get_receipt($pro)
        {
          $this->db->select('*');
          $this->db->join('debtor','debtor.debtor_code=project.project_id','left outer');
          $this->db->where('project_id',$pro);
          $query = $this->db->get('project');
          $res = $query->result();
          return $res;
        } 
        public function getreceipt_header($no)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_account_header.acc_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_account_header.acc_owner','left outer');
          $this->db->where('ar_account_header.acc_status','N');
          $this->db->where('ar_account_header.acc_project',$no);
          $query = $this->db->get('ar_account_header');
          $res = $query->result();
          return $res;
        }
        public function getreceipt_header2()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_account_header.acc_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_account_header.acc_owner','left outer');
          $this->db->where('acc_status','N');
          $this->db->where('status_cn','N');
          $this->db->order_by('acc_invtype');
          $query = $this->db->get('ar_account_header');
          $res = $query->result();
          return $res;
        } 

        public function getreceiving()
        {
          $this->db->select('*');
          $this->db->where('vou_status','N');
          $query = $this->db->get('ar_receipt_header');
          $res = $query->result();
          return $res;
        }  

        public function load_receiving($no)
        {
          $this->db->select('*');
          $this->db->where('vou_status','N');
          $this->db->where('vou_no',$no);
          $this->db->join('ar_receipt_detail','ar_receipt_detail.vou_ref=ar_receipt_header.vou_no');
          $query = $this->db->get('ar_receipt_header');
          $res = $query->result();
          return $res;
        } 

        public function getreceipt_no()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_receipt_header.vou_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_receipt_header.vou_owner','left outer');
          $this->db->from('ar_receipt_header');
          $this->db->where('vou_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getreceipt_to()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_receipt_header.vou_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_receipt_header.vou_owner','left outer');
          $this->db->from('ar_receipt_header');
          $this->db->where('vou_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getreceipt_all()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_receipt_header.vou_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_receipt_header.vou_owner','left outer');
          $this->db->from('ar_receipt_header');
          $this->db->where('vou_status !=','D');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getreceiving_no()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_receiving_header.vou_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_receiving_header.vou_owner','left outer');
          $this->db->from('ar_receiving_header');
          $this->db->where('vou_status','N');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getreceiving_to()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_receiving_header.vou_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_receiving_header.vou_owner','left outer');
          $this->db->from('ar_receiving_header');
          $this->db->where('vou_status','Y');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function getreceiving_all()
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_receiving_header.vou_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_receiving_header.vou_owner','left outer');
          $this->db->from('ar_receiving_header');
          $this->db->where('vou_status !=','D');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function get_receiving($no)
        {
          $this->db->select('*');
          $this->db->where('vou_no',$no);
          $this->db->from('ar_receiving_header');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function get_receiving_de($no)
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->join('system', 'system.systemcode = ar_receiving_detail.vou_system');
          $this->db->join('ar_receiving_header','ar_receiving_header.vou_no=ar_receiving_detail.vou_ref');
          $this->db->where('vou_ref',$no);
          $this->db->where('system.compcode',$compcode);
          $this->db->from('ar_receiving_detail');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }


        public function ar_clear_all()
        {
          $this->db->select('*');
          $this->db->where('cl_status !=','D');
          $this->db->join('project','project.project_code=ar_clear_header.cl_project','left outer');
          $this->db->from('ar_clear_header');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
        public function ar_clear_to()
        {
          $this->db->select('*');
          $this->db->where('cl_status','Y');
          $this->db->join('project','project.project_code=ar_clear_header.cl_project','left outer');
          $this->db->from('ar_clear_header');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }
        public function ar_clear_no()
        {
          $this->db->select('*');
          $this->db->where('cl_status','N');
          $this->db->join('project','project.project_code=ar_clear_header.cl_project','left outer');
          $this->db->from('ar_clear_header');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function open_arinvdown($no,$period)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_invdown_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invdown_header.inv_owner','left outer');
          $this->db->join('ar_receiving_header','ar_receiving_header.vou_vno=ar_invdown_header.inv_receipt','left outer');
          $this->db->where('inv_status','Y');
          $this->db->where('inv_no',$no);
          $this->db->where('inv_period',$period);
          $query = $this->db->get('ar_invdown_header');
          $res = $query->result();
          return $res;
        }

        public function open_arinvproress($no,$period)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_invprogress_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invprogress_header.inv_owner','left outer');
          $this->db->join('ar_receiving_header','ar_receiving_header.vou_vno=ar_invprogress_header.inv_receipt','left outer');
          $this->db->where('inv_status','Y');
          $this->db->where('inv_no',$no);
          $this->db->where('inv_period',$period);
          $query = $this->db->get('ar_invprogress_header');
          $res = $query->result();
          return $res;
        }

        public function open_arinvretention($no,$period)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_code=ar_invretention_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_invretention_header.inv_owner','left outer');
          $this->db->join('ar_receiving_header','ar_receiving_header.vou_vno=ar_invretention_header.inv_receipt','left outer');
          $this->db->where('inv_status','Y');
          $this->db->where('inv_no',$no);
          $this->db->where('inv_period',$period);
          $query = $this->db->get('ar_invretention_header');
          $res = $query->result();
          return $res;
        }

         public function get_acct_d($code)
        {
          $this->db->select('*');
          $this->db->join('ar_invdown_detail','ar_invdown_detail.inv_ref=ar_account_header.acc_invno');
          $this->db->join('system','ar_invdown_detail.inv_system=system.systemcode');
          $this->db->where('inv_downamt !=','0');
          $this->db->where('acc_status','N');
          $this->db->where('acc_no',$code);
          $query = $this->db->get('ar_account_header');
          $res = $query->result();
          return $res;
        }
         public function get_acct_p($code)
        {
          $this->db->select('*');
          $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_ref=ar_account_header.acc_invno');
          $this->db->where('acc_status','N');
          $this->db->where('inv_progressamt !=','0');
          $this->db->where('acc_no',$code);
          $query = $this->db->get('ar_account_header');
          $res = $query->result();
          return $res;
        }
         public function get_acct_r($code)
        {
          $this->db->select('*');
          $this->db->join('ar_invretention_detail','ar_invretention_detail.inv_ref=ar_account_header.acc_invno');
          $this->db->where('acc_status','N');
          $this->db->where('inv_retentionamt !=','0');
          $this->db->where('acc_no',$code);
          $query = $this->db->get('ar_account_header');
          $res = $query->result();
          return $res;
        }
         public function get_view_account($pro)
        {
          $this->db->select('*');
          $this->db->where('inv_status','N');
          // $this->db->where('inv_retentionamt !=','0');
          $this->db->where('inv_project',$pro);
          $query = $this->db->get('ar_invdown_header');
          $res = $query->result();
          return $res;
        }

         public function get_view_cedit($pro)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_credit_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_credit_header.inv_owner','left outer');
          // $this->db->where('inv_status','N');
          $this->db->where('inv_project',$pro);
          $query = $this->db->get('ar_credit_header');
          $res = $query->result();
          return $res;
        }

  public function system_m($compcode)
    {
      $this->db->select('*');
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('system');
      $res = $query->result();
      return $res;
    }

    public function getproject($compcode)
    {
        $this->db->select('*');
        $this->db->where('project_status','normal');
        $this->db->where('compcode',$compcode);
        $this->db->order_by('project_id','desc');
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

    public function getjournal_header($no)
      {
        $this->db->select('*');
        $this->db->join('project','project.project_id = ar_batch_header.project_id','left outer');        
        $this->db->where('vchno',$no);
        $query = $this->db->get('ar_batch_header');
        $res = $query->result();
        return $res;
      }

      public function getjournal_detail($no)
      {
        $this->db->select('*');
        $this->db->where('vchno',$no);
        $query = $this->db->get('ar_batch_detail');
        $res = $query->result();
        return $res;
      }


       public function getjournal_subpro($sub)
      {
        $this->db->select('*');
        $this->db->join('project','project.project_id = ar_batch_header.subproject_id','left outer');        
        $this->db->where('subproject_id',$sub);
        $query = $this->db->get('ar_batch_header');
        $res = $query->result();
        return $res;
      }

      public function get_ar_journal($no)
        {
         $this->db->select('*');
         $this->db->from('ar_batch_header');
         $this->db->join('bank', 'bank.bank_code = ar_batch_header.bankid','left outer');
         $this->db->join('bank_branch', 'bank_branch.branch_code = ar_batch_header.branchid','left outer');
         $this->db->where('vchno',$no);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }
      public function getcnnot($compcode)
        {
         $this->db->select('*');
         $this->db->from('ar_credit_header');
         $this->db->join('project', 'project.project_id = ar_credit_header.inv_project','left outer');
         $this->db->join('vender', 'vender.vender_code = ar_credit_header.inv_owner','left outer');
         $this->db->where('ar_credit_header.compcode',$compcode);
         $query = $this->db->get();
         $res = $query->result();
         return $res;
        }
      public function get_costcode()
       {
        $compcode = $this->session->userdata('sessed_in')['compcode'];
        return $compcode;
       }
      // public function modal_ic_issue($id){
      //   $this->db->select('*');
      //   $this->db->from('ic_issue_h');
      //   $this->db->join('ic_issue_d', 'ic_issue_h.is_doccode = ic_issue_d.isi_doccode');
      //   $this->db->where('ic_issue_h.compcode',$this->get_costcode());
      //   $this->db->where('ic_issue_h.is_project',$id);
      //   $query = $this->db->get();
      //   $res = $query->result_array();
      //   return $res;
      // }
      public function modal_ic_issue($id){
        $this->db->select('*');
        $this->db->from('ic_trading_h');
        $this->db->join('ic_trading_d', 'ic_trading_h.trading_doccode = ic_trading_d.trading_doccode');
        $this->db->where('ic_trading_h.compcode',$this->get_costcode());
        $this->db->where('ic_trading_d.status','no');
        $this->db->where('ic_trading_h.trading_project',$id);
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
      }
      
      public function edit_tradding_h($id){
        $this->db->select('*');
        $this->db->from('trad_header');
        $this->db->join('system','trad_header.job_name = system.systemcode');
        $this->db->join('currency','trad_header.trad_curency = currency.currency_id');
        $this->db->where('trad_header.compcode',$this->get_costcode());
        $this->db->where('trad_header.trad_inv',$id);
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
      }
      public function edit_tradding_d($id){
        $this->db->select('*');
        $this->db->from('trad_detail');
        $this->db->where('trad_detail.ref_tradid',$id);
        $query = $this->db->get();
        $res = $query->result_array();
        return $res;
      }

      public function get_receipt_other_all($compcode){
        $this->db->select('*, sum(otde_vat) as vat_total, sum(otde_amount) as amount ');
        $this->db->from('other_header');
        $this->db->join('other_detail','other_detail.ref_other = other_header.ot_id');
        $this->db->join('income_type','income_type.income_id = other_header.ot_type_income_id');
        $this->db->join('currency','currency.currency_id = other_header.ot_currency_id');
        $this->db->join('system','system.systemid = other_header.ot_system_id');
        $this->db->join('project','project.project_code = other_header.ot_pro_code');
        $this->db->group_by('other_header.ot_id'); 
        $this->db->where('other_header.compcode',$compcode);
        $this->db->where('other_header.active','1');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      } 

      public function get_code_nat($compcode){
        $this->db->select('ar_arolt');
        $this->db->from('syscode');
        $this->db->where('sys_code',$compcode);
        $query = $this->db->get();
        $res = $query->result();

        $code_net = $res[0]->ar_arolt;
        $this->db->select('act_code,act_name');
        $this->db->from('account_total');
        $this->db->where('act_code',$code_net);
        $this->db->where('compcode',$compcode);
        $query_net = $this->db->get();
        $res_net = $query_net->result();
        return $res_net;

      }

      public function get_code_ar_arlt($compcode){
        $this->db->select('ar_arlt');
        $this->db->from('syscode');
        $this->db->where('sys_code',$compcode);
        $query = $this->db->get();
        $res = $query->result();

        $code_net = $res[0]->ar_arlt;
        $this->db->select('act_code,act_name');
        $this->db->from('account_total');
        $this->db->where('act_code',$code_net);
        $this->db->where('compcode',$compcode);
        $query_net = $this->db->get();
        $res_net = $query_net->result();
        return $res_net;

      }

      public function get_ar_sov($compcode){
        $this->db->select('ar_sov');
        $this->db->from('syscode');
        $this->db->where('sys_code',$compcode);
        $query = $this->db->get();
        $res = $query->result();

        $code_net = $res[0]->ar_sov;
        $this->db->select('act_code,act_name');
        $this->db->from('account_total');
        $this->db->where('act_code',$code_net);
        $this->db->where('compcode',$compcode);
        $query_net = $this->db->get();
        $res_net = $query_net->result();
        return $res_net;

      }

      public function get_ar_ov($compcode){
        $this->db->select('ar_ov');
        $this->db->from('syscode');
        $this->db->where('sys_code',$compcode);
        $query = $this->db->get();
        $res = $query->result();

        $code_net = $res[0]->ar_ov;
        $this->db->select('act_code,act_name');
        $this->db->from('account_total');
        $this->db->where('act_code',$code_net);
        $this->db->where('compcode',$compcode);
        $query_net = $this->db->get();
        $res_net = $query_net->result();
        return $res_net;

      }

      public function get_ar_rev_sale($compcode){
        $this->db->select('ar_rev_sale');
        $this->db->from('syscode');
        $this->db->where('sys_code',$compcode);
        $query = $this->db->get();
        $res = $query->result();

        $code_net = $res[0]->ar_rev_sale;
        $this->db->select('act_code,act_name');
        $this->db->from('account_total');
        $this->db->where('act_code',$code_net);
        $this->db->where('compcode',$compcode);
        $query_net = $this->db->get();
        $res_net = $query_net->result();
        return $res_net;

      }

      public function get_account_code($compcode){
        $this->db->select('act_code,act_name,act_header');
        $this->db->from('account_total');
        $this->db->where('compcode',$compcode);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_ar_other_all($compcode){
        $this->db->select('*');
        $this->db->from('ar_account_other_header');
        $this->db->where('compcode',$compcode);
        $this->db->where('active','1');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_ar_other_by_code($ar_code){
        $this->db->select('*');
        $this->db->from('ar_account_other_header');
        $this->db->join('currency','currency.currency_id = ar_account_other_header.curency');
        $this->db->where('ar_no',$ar_code);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_ar_other_detail_all($ar_code){
        $this->db->select('*');
        $this->db->from('ar_accourt_othen_detail');
        $this->db->where('ref_ar_no',$ar_code);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function getproject_name($project_id){
        $this->db->select('project_id,project_code,project_name,project_mcode,project_mnameth');
        $this->db->from('project');
        $this->db->where('project_id',$project_id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_ar_by_project($project_code){
        $this->db->select('*');
        $this->db->from('ar_accourt_othen_detail');
        $this->db->where('ref_ar_no',$ar_code);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_system($compcode){
        $this->db->select('*');
        $this->db->from('system');
        $this->db->where('compcode',$compcode);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }


       public function get_ar_by_system($system_id){
        $this->db->select('*');
        $this->db->from('ar_account_other_header');
        $this->db->where('system_id',$system_id);
        $this->db->where('active','1');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_invoice(){
        $this->db->select('ot_id');
        $this->db->from('other_header');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_invoice_list($invoice_id){
        $this->db->select('*');
        $this->db->from('other_detail');
        $this->db->join('other_header','other_header.ot_id = other_detail.ref_other');
        $this->db->where('ref_other',$invoice_id);
        $this->db->where('status_bill','1');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_chk_bill(){
        $this->db->select('*');
        $qu = $this->db->get('bill_other_header');
        $res = $qu->num_rows();
        return $res;
      }

      public function get_bill($project_code,$compcode){
        $this->db->select('*');
        $this->db->from('bill_other_header');
        $this->db->where('bill_ot_project_code',$project_code);
        $this->db->where('active',1);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_receive($receive_no){
        $this->db->select('*');
        $this->db->from('bill_other_detail');
        $this->db->where('bill_ref_no',$receive_no);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function sum_amt($ref_no){
        $this->db->select('sum(bill_amount) asamount,sum(bill_vat_amt) vat');
        $this->db->from('bill_other_detail');
        $this->db->where('bill_ref_no',$ref_no);
        $query = $this->db->get();
        $res = $query->result();
        $return = array();
        $return['sum'] = $res[0]->asamount+$res[0]->vat;
        $return['vat'] = $res[0]->vat;
        
        echo json_encode($return);
      }

      public function get_less_other($compcode){
        $this->db->select('*');
        $this->db->from('less_other');
        $this->db->where('compcode',$compcode);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
      }

      public function get_rv($compcode){
        $this->db->select('*');
        $this->db->from('receipt_header');
        $this->db->where('compcode',$compcode);
        $this->db->where('active',1);
        $query = $this->db->get();
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


        public function get_arvp($comp)
        {
          $this->db->select('*');
          $this->db->where('compcode',$comp);
          $this->db->where('active',"Y");
          $query = $this->db->get('ar_vender_pull');
          $res = $query->result_array();
          return $res;
        }

        public function get_inv($compcode){
          $this->db->select('*');
          $this->db->from('trad_header');
          $this->db->join('currency','currency.currency_id = trad_header.trad_curency');
          $this->db->where('trad_header.compcode',$compcode);
          $this->db->where('trad_header.active_ar','1');
          $query = $this->db->get();
          $res = $query->result();
          return $res;
        }

        public function get_inv_detail($inv_id){
          $this->db->select('*');
          $this->db->from('trad_detail');
          $this->db->where('itrad_id',$inv_id);
          $res = $this->db->get()->result();
          return $res;
        }

        public function get_inv_detail_receipt($inv_id){
          $this->db->select('*');
          $this->db->from('trad_detail');
          $this->db->join('system','trad_detail.itrad_system = system.systemid');
          $this->db->where('trad_detail.ref_tradid',$inv_id);
          $res = $this->db->get()->result();
          return $res;
        }

        public function rd_header($rd_no){
          $this->db->select('*');
          $this->db->from('reduce_trading_header');
          $this->db->where('rd_no',$rd_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function rd_detail($rd_no){
          $this->db->select('*');
          $this->db->from('reduce_trading_detail');
          $this->db->where('ref_rd_no',$rd_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function rd_header_list($compcode){
          $this->db->select('*');
          $this->db->from('reduce_trading_header');
          $this->db->where('compcode',$compcode);
          $this->db->where('active','1');
          $res = $this->db->get()->result();
          return $res;
        }

        public function art_header($art_no){
          $this->db->select('*');
          $this->db->from('ar_account_header');
          $this->db->join('project','ar_account_header.acc_project = project.project_id');
          $this->db->join('debtor','ar_account_header.acc_owner = debtor.debtor_code');
          $this->db->where('acc_no',$art_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function art_detail($art_no){
          $this->db->select('*');
          $this->db->from('ar_account_detail');
          $this->db->join('account_total','ar_account_detail.acc_codeac = account_total.act_code');
          $this->db->join('system','ar_account_detail.acc_systemcode = system.systemcode');
          $this->db->where('acc_ref',$art_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function inv_detail($inv_no){
          $this->db->select('trad_id');
          $this->db->from('trad_header');
          $this->db->where('trad_inv',$inv_no);
          $query = $this->db->get()->result();
          // var_dump($query);die();
          $trad_id = $query[0]->trad_id;

          $this->db->select('*');
          $this->db->from('trad_detail');
          $this->db->where('ref_tradid',$trad_id);
          $res = $this->db->get()->result();
          return $res;
        }
        public function art_header_list($compcode){
          $this->db->select('*');
          $this->db->from('ar_account_header');
          $this->db->join('project','ar_account_header.acc_project = project.project_id');
          $this->db->join('debtor','ar_account_header.acc_owner = debtor.debtor_code');
          $this->db->where('ar_account_header.compcode',$compcode);
          $this->db->where('acc_invtype','trading');
          $res = $this->db->get()->result();
          return $res;
        }

        public function getreceipt_currency($no){
          $this->db->select('currency,exchange');
          $this->db->from('ar_invdown_header');
          $this->db->where('inv_project',$no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function get_inv_detail_ar($inv_no){
          $this->db->select('*');
          $this->db->from('ar_invdown_header');
          $this->db->join('ar_invdown_detail','ar_invdown_header.inv_no = ar_invdown_detail.inv_ref');
          $this->db->join('system','ar_invdown_detail.inv_system = system.systemcode');
          $this->db->where('ar_invdown_header.inv_no',$inv_no);
          $this->db->where('ar_invdown_detail.active','1');
          $res = $this->db->get()->result();
          return $res;
        }

        public function get_inv_detail_ar_progress($inv_no){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->from('ar_invprogress_header');
          $this->db->join('ar_invprogress_detail','ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref');
          $this->db->join('system','ar_invprogress_detail.inv_system = system.systemcode');
          $this->db->where('ar_invprogress_detail.active','1');
          $this->db->where('inv_no',$inv_no);
          $this->db->where('system.compcode',$compcode);
          $res = $this->db->get()->result();
          return $res;
        }

        public function get_inv_detail_ar_retention($inv_no){
          $this->db->select('*');
          $this->db->from('ar_invretention_header');
          $this->db->join('ar_invretention_detail','ar_invretention_header.inv_no = ar_invretention_detail.inv_ref');
          $this->db->join('system','ar_invretention_detail.inv_system = system.systemcode');
          $this->db->where('ar_invretention_detail.active','1');
          $this->db->where('inv_no',$inv_no);
          $res = $this->db->get()->result();
          return $res;
        } 

        public function get_inv_detail_ar_other($inv_no){
          $this->db->select('*');
          $this->db->from('other_header');
          $this->db->join('other_detail','other_header.ot_id = other_detail.ref_other');
          $this->db->join('system','other_header.ot_system_id = system.systemcode');
          $this->db->where('ot_code',$inv_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function get_inv_detail_ar_trading($inv_no){
          $this->db->select('*,sum(itrad_amount) as amt');
          $this->db->from('trad_header');
          $this->db->join('trad_detail','trad_header.trad_id = trad_detail.ref_tradid');
          $this->db->join('system','trad_header.job_name = system.systemcode');
          $this->db->group_by('trad_detail.ref_tradid');
          $this->db->where('trad_inv',$inv_no);
          $res = $this->db->get()->result();
          return $res;
        }



        public function getcn_header($no)
        {
          $this->db->select('*');
          $this->db->join('project','project.project_id=ar_credit_header.inv_project','left outer');
          $this->db->join('debtor','debtor.debtor_code=ar_credit_header.inv_owner','left outer');
          // $this->db->where('acc_status','N');
          $this->db->where('inv_project',$no);
          $query = $this->db->get('ar_credit_header');
          $res = $query->result();
          return $res;
        }

        public function get_inv_detail_cn($no){
          $this->db->select('*');
          $this->db->from('ar_credit_header');
          $this->db->join('ar_credit_detail','ar_credit_header.inv_no = ar_credit_detail.inv_ref');
          $this->db->join('system','ar_credit_detail.inv_system = system.systemcode');
          $this->db->where('ar_credit_header.inv_no',$no);
          // $this->db->where('ar_invdown_detail.active','1');
          $res = $this->db->get()->result();
          return $res;
        }

        public function load_ar_forgl($start,$stop,$datatype){
          if($datatype=="all"){
          $this->db->select('*');
          $this->db->where('ar_gl.vchdate >=', $start);
          $this->db->where('ar_gl.vchdate <=', $stop);
          $this->db->where('ar_gl.status',NULL);
          $this->db->group_by('ar_gl.acct_no');
          $this->db->group_by('ar_gl.costcode');
          $this->db->group_by('ar_gl.projectid');
          $this->db->group_by('ar_gl.systemcode');  
          $this->db->join('account_total', 'account_total.act_code = ar_gl.acct_no');
          $this->db->join('project', 'project.project_id = ar_gl.projectid');
          $this->db->join('system', 'system.systemcode = ar_gl.systemcode');
          $this->db->join('debtor', 'debtor.debtor_code = ar_gl.vendor_id');
          $query = $this->db->get('ar_gl');
          $res = $query->result();
          return $res;
          }else{
          $this->db->select('*');
          $this->db->where('ar_gl.vchdate >=', $start);
          $this->db->where('ar_gl.vchdate <=', $stop);
          $this->db->where('ar_gl.doctype', $datatype);
          $this->db->where('ar_gl.status',NULL);
          $this->db->group_by('ar_gl.acct_no');
          $this->db->group_by('ar_gl.costcode');
          $this->db->group_by('ar_gl.projectid');
          $this->db->group_by('ar_gl.systemcode');  
          $this->db->join('account_total', 'account_total.act_code = ar_gl.acct_no');
          $this->db->join('project', 'project.project_id = ar_gl.projectid');
          $this->db->join('system', 'system.systemcode = ar_gl.systemcode');
          $this->db->join('debtor', 'debtor.debtor_code = ar_gl.vendor_id');
          $query = $this->db->get('ar_gl');
          $res = $query->result();
          return $res;
          }
         }


         public function load_ar_forgl2($start,$stop,$datatype){
           if($datatype=="all"){
          $this->db->select('*');
          $this->db->where('ar_gl.vchdate >=', $start);
          $this->db->where('ar_gl.vchdate <=', $stop);
          $this->db->where('ar_gl.status',NULL); 
          $this->db->join('account_total', 'account_total.act_code = ar_gl.acct_no');
          $this->db->join('project', 'project.project_id = ar_gl.projectid');
          $this->db->join('system', 'system.systemcode = ar_gl.systemcode');
          $query = $this->db->get('ar_gl');
          $res = $query->result();
          return $res;
           }else{
          $this->db->select('*');
          $this->db->where('ar_gl.vchdate >=', $start);
          $this->db->where('ar_gl.vchdate <=', $stop);
          $this->db->where('ar_gl.doctype', $datatype);
          $this->db->where('ar_gl.status',NULL); 
          $this->db->join('account_total', 'account_total.act_code = ar_gl.acct_no');
          $this->db->join('project', 'project.project_id = ar_gl.projectid');
          $this->db->join('system', 'system.systemcode = ar_gl.systemcode');
          $query = $this->db->get('ar_gl');
          $res = $query->result();
          return $res;
          }
         }

        public function gl_book(){
          $this->db->select('*');
          $this->db->where('gl_book.bookcode',"0005"); 
          $query = $this->db->get('gl_book');
          $res = $query->result();
          return $res;
         }

         public function count_retention($project_id,$system_code,$compcode){
          $this->db->select('sum(amt_retention) as amt');
          $this->db->where('payment_retention.project_id',$project_id); 
          $this->db->where('payment_retention.system_code',$system_code); 
          $this->db->where('payment_retention.compcode',$compcode); 
          $this->db->group_by('system_code');
          $query = $this->db->get('payment_retention');
          $res = $query->result();
          // return $res;
            if (empty($res)) {
              return 0;
            }else{
              return $res[0]->amt;
            }
         }

         public function list_retention($project_id,$system_code,$compcode){
          $this->db->select('*');
          $this->db->join('system','system.systemcode = payment_retention.system_code ');
          $this->db->join('project','project.project_id = payment_retention.project_id ');
          $this->db->where('payment_retention.project_id',$project_id); 
          $this->db->where('payment_retention.system_code',$system_code); 
          $this->db->where('payment_retention.compcode',$compcode); 
          $query = $this->db->get('payment_retention');
          $res = $query->result();
          return $res;
         }

         public function certification_m($project_code,$type){
          
          $this->db->select('*');
          $this->db->where('progress_submit.site_no',$project_code); 
          $this->db->where('progress_submit.status','W'); 
          $this->db->where('progress_submit.payment_type',$type); 
          $query = $this->db->get('progress_submit');
          $res = $query->result();
          return $res;
          
         }

        public function certificationdetail_m($project_code,$s_no,$type){
          
          $this->db->select('*'); 
          $this->db->where('progress_submit_detail.submit_ref',$s_no);
          // $this->db->where('progress_submit_detail.amount_cer !=','0');  
          $query = $this->db->get('progress_submit_detail');
          $res = $query->result();
          return $res;
          
        }

        public function payment_re($id){
          $this->db->select('sum(ar_invretention_detail.inv_retentionamt) as payment_system'); 
          $this->db->join('ar_invretention_detail','ar_invretention_header.inv_no = ar_invretention_detail.inv_ref');
          $this->db->where('ar_invretention_header.inv_project',$id);
          $this->db->group_by('ar_invretention_detail.inv_system');
          $query = $this->db->get('ar_invretention_header');
          $res = $query->result();
          return $res;
        }

        public function ar_header($ar_no){
          $this->db->select('*');
          $this->db->from('ar_account_header');
          $this->db->join('project','ar_account_header.acc_project = project.project_id');
          $this->db->join('debtor','ar_account_header.acc_owner = debtor.debtor_code');
          $this->db->where('ar_account_header.acc_no',$ar_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function ar_detail($ar_no){
          $this->db->select('*');
          $this->db->from('ar_account_detail');
          $this->db->join('system','ar_account_detail.acc_systemcode = system.systemcode');
          // $this->db->join('account_total','ar_account_detail.acc_codeac = account_total.act_code');
          $this->db->where('ar_account_detail.acc_ref',$ar_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function re_header($re_no){
          $this->db->select('*');
          $this->db->from('ar_receipt_header');
          $this->db->join('project','ar_receipt_header.vou_project = project.project_id');
          $this->db->join('debtor','ar_receipt_header.vou_owner = debtor.debtor_code');
          $this->db->where('ar_receipt_header.vou_no',$re_no);
          $res = $this->db->get()->result();
          return $res;
        }

        public function re_detail($re_no){
          $this->db->select('*');
          $this->db->from('ar_receipt_detail');
          $this->db->join('system','ar_receipt_detail.vou_system = system.systemcode');
          $this->db->where('ar_receipt_detail.vou_ref',$re_no);
          $res = $this->db->get()->result();
          return $res;
        }

        // public function rl_header($rl_no){
        //   $this->db->select('*');
        //   $this->db->from('ar_receiving_header');
        //   $this->db->join('system','ar_receipt_detail.vou_system = system.systemcode');
        //   // $this->db->where('ar_receipt_detail.vou_ref',$re_no);
        //   $res = $this->db->get()->result();
        //   return $res;
        // }


}
