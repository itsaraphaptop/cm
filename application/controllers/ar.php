<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ar extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('global_m');
            $this->load->Model('auth_m');
            $this->load->model('ar_m');

           

        }
        public function main_index()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
          }

          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/main_index');
          $this->load->view('base/footer_v');
        }
        public function ar_main()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_main_v');
          $this->load->view('base/footer_v');
        }
        public function ar_down_payment()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_down_payment_v');
          $this->load->view('base/footer_v');
        }
        public function invoice_archaive()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['invoice'] = $this->ar_m->getinvoice($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/invoice_archive_v');
          $this->load->view('base/footer_v');
        }
        public function ar_edit_down_payment()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $invno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $arh = $this->ar_m->get_ar_h($invno,$compcode);
          foreach ($arh as $v) {
            $projid = $v->inv_project;
            $ownerid = $v->inv_owner;
            $data['projid'] = $v->inv_project;
            $data['ownerid'] = $v->inv_owner;
            $data['invno'] = $v->inv_no;
            $data['invdate'] = $v->inv_date;
            $data['duedate'] = $v->inv_duedate;
            $data['contact'] = $v->inv_contact;
            $data['contamt'] = $v->inv_contactamount;
            $data['vatper'] = $v->inv_vat;
            $data['wtper'] = $v->inv_wt;
            $data['period'] = $v->inv_period;
            $data['credit'] = $v->inv_credit;
          }
          $projn = $this->ar_m->project($projid,$compcode);
          foreach ($projn as $kproj) {
            $data['projname'] = $kproj->project_name;
          }
          $debn = $this->ar_m->debtor($ownerid,$compcode);
          foreach ($debn as $kdep) {
            $data['debname']= $kdep->debtor_name;
          }
          $data['resi'] = $this->ar_m->get_ar_d($invno,$compcode);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_edit_down_payment_v');
          $this->load->view('base/footer_v');
        }


        public function ar_progress_payment()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_progress_payment_v');
          $this->load->view('base/footer_v');
        }
        public function ar_retention_payment()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_retention_payment_v');
          $this->load->view('base/footer_v');
        }
        public function all_invoice()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/all_invoice_v');
          $this->load->view('base/footer_v');
        }
        public function ardown()
        {
            $this->load->view('office/account/ar/ar_down_v');
        }
        public function arprogress()
        {
          $this->load->view('office/account/ar/ar_progress_v');
        }
        public function arretention()
        {
          $this->load->view('office/account/ar/ar_retention_v');
        }
        // ar vorcher
        public function ar_vorcher()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_voucher/ar_voucher_v');
          $this->load->view('base/footer_v');
        }
        public function load_inv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['inv'] = $this->ar_m->getinvoice($compcode);
          $this->load->view('office/account/ar/ar_voucher/load_inv_v',$data);
        }
        public function load_voucher()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['voucher'] = $this->ar_m->getvoucher($compcode);
          $this->load->view('office/account/ar/ar_voucher/load_voucher_v',$data);
        }
        public function load_inv_detail()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $invno = $this->uri->segment(3);
          $data['resi'] = $this->ar_m->get_ar_d($invno,$compcode);
          $this->load->view('office/account/ar/ar_voucher/load_inv_detail_v',$data);
        }
        public function load_inv_vat()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $invno = $this->uri->segment(3);
          $data['resi'] = $this->ar_m->get_ar_d($invno,$compcode);
          $this->load->view('office/account/ar/ar_voucher/load_inv_vat_v',$data);
        }
        public function load_vou_detail()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $vou_no = $this->uri->segment(3);
          $data['de_r'] = $this->ar_m->get_ar_vou($vou_no,$compcode);
          $this->load->view('office/account/ar/ar_voucher/load_vou_detail_v',$data);
        }
        public function load_vou_vat()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $vou_no = $this->uri->segment(3);
          $data['gl_r'] = $this->ar_m->get_ar_vou($vou_no,$compcode);
          $this->load->view('office/account/ar/ar_voucher/load_vou_gl_v',$data);
        }
        public function ar_edit_vorcher()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];

          $arh = $this->ar_m->edit_ar_voucher($arno,$compcode);
          foreach ($arh as $v) {
            $data['arno'] = $v->vou_no;
            $data['ardate'] = $v->vou_date;
            $projid = $v->vou_project;
            $ownerid = $v->vou_owner;
            $data['projid'] = $v->vou_project;
            $data['vowner'] = $v->vou_owner;
            $data['invno'] = $v->vou_invno;
            $data['invdate'] = $v->vou_invdate;
            $data['duedate'] = $v->vou_invduedate;
            $data['contact'] = $v->vou_contact;
            $data['contamt'] = $v->vou_contactamount;
            $data['vatper'] = $v->vou_vat;
            $data['wtper'] = $v->vou_wt;
            $data['period'] = $v->vou_period;
            $data['credit'] = $v->vou_credit;
            $data['type'] = $v->vou_invtype;
          }
          $projn = $this->ar_m->project($projid,$compcode);
          foreach ($projn as $kproj) {
            $data['projname'] = $kproj->project_name;
          }
          $debn = $this->ar_m->debtor($ownerid,$compcode);
          foreach ($debn as $kdep) {
            $data['debname']= $kdep->debtor_name;
          }
          $data['vch'] = $this->ar_m->get_ar_gl($arno,$compcode);
          // $data['acct_no'] = $this->ar_m->get_acct_no($arno,$compcode);
          $data['resi'] = $this->ar_m->get_voucher_d($arno,$compcode);
          $data['savegl'] = $this->ar_m->get_ar_ed($arno,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_voucher/ar_edit_voucher_v');
          $this->load->view('base/footer_v');
        }
        public function ar_vorcher_archive()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['savegl'] = $this->ar_m->get_ar_ed($arno,$compcode);
          $data['res'] = $this->ar_m->getarvoucher($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/ar_voucher/ar_voucher_archive_v');
          $this->load->view('base/footer_v');
        }
        // ใบเสร็จรับเงิน
        public function receipt()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/receipt/receipt_v');
          $this->load->view('base/footer_v');
        }
        public function edit_receipt()
        {
          $rec = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $arh = $this->ar_m->edit_receipt($rec,$compcode);
          foreach ($arh as $v) {
            $data['arno'] = $v->vou_no;
            $data['ardate'] = $v->vou_date;
            $projid = $v->vou_project;
            $ownerid = $v->vou_owner;
            $data['projid'] = $v->vou_project;
            $data['vowner'] = $v->vou_owner;
            $data['invno'] = $v->vou_rvrlno;
            $data['invdate'] = $v->vou_rvrldate;
            $data['duedate'] = $v->vou_invduedate;
            $data['contact'] = $v->vou_contact;
            $data['contamt'] = $v->vou_contactamount;
            $data['vatper'] = $v->vou_vat;
            $data['wtper'] = $v->vou_wt;
            $data['period'] = $v->vou_period;
            $data['credit'] = $v->vou_credit;
            $data['taxtype'] = $v->vou_taxtype;
            $data['taxno'] = $v->vou_taxno;
          }
          $projn = $this->ar_m->project($projid,$compcode);
          foreach ($projn as $kproj) {
            $data['projname'] = $kproj->project_name;
          }
          $debn = $this->ar_m->debtor($ownerid,$compcode);
          foreach ($debn as $kdep) {
            $data['debname']= $kdep->debtor_name;
          }
          $data['resi'] = $this->ar_m->get_receipt_d($rec,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/receipt/edit_receipt_v');
          $this->load->view('base/footer_v');
        }
        public function ar_receipt_archive()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['res'] = $this->ar_m->getarreceipt($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ar/receipt/ar_receipt_archive_v');
          $this->load->view('base/footer_v');
        }

        public function invoice_down()
        {
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['pro'] = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pp'] = $this->ar_m->get_invdown_project($pro);
          $data['currency'] = $this->currency();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_down/ar_invoice_down_v');
          $this->load->view('base/footer_v');
          
        }

        public function open_invoice_down(){
          $pro = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);

              // if($res['pr_project_right'] =='true'){
              //       $res['getdep'] = $this->ar_m->getdepartment();
              // }else{
              //       $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
              // }

            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_down/open_project_invdown',$res);
            $this->load->view('base/footer_v');
        }

        public function load_invoicedown()
        {
          $id = $this->uri->segment(3);
          $data['pro'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['dow'] = $this->ar_m->invoicedown($id);
           $this->load->view('office/account/ar/ar_down/load_invoicedown_v',$data);
        }

        public function load_ret_invoicedown()
        {
          $id = $this->uri->segment(3);
          $data['id'] = $this->uri->segment(3);
          $data['per'] = $this->ar_m->load_invdown_header($id);
           $this->load->view('office/account/ar/ar_down/load_ret_invoicedown',$data);
        }

        public function ret_edit_invoicedown()
        {
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $data['no'] = $no;
          $data['period'] = $period;
          $data['ffd'] = $this->ar_m->get_invdown_detail($no,$period);
           $this->load->view('office/account/ar/ar_down/ret_invoicedown_v',$data);
        }

        public function ar_edit_invdown()
        {
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['no'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['head'] = $this->ar_m->get_invdown_header($no,$period);
          $data['det'] = $this->ar_m->get_invdown_detail($no,$period);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_down/edit_invoicedown_v');
          $this->load->view('base/footer_v');
        }

        public function open_invoice_progress(){
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
            //   if($res['pr_project_right'] =='true'){
            // $res['getdep'] = $this->ar_m->getdepartment();
            //   }else{
            // $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
            //   }
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_progress/open_project_progress',$res);
            $this->load->view('base/footer_v');
        }

        public function invoice_progress()
        {
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['pro'] = $this->uri->segment(3); 
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pp'] = $this->ar_m->get_invdown_project($pro);
          $data['currency'] = $this->currency();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/ar_invoice_progress_v');
          $this->load->view('base/footer_v');
        }

      public function ar_tradding_archive()
        {
          $pro = $this->uri->segment(3);
          // echo $pro;die();
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['pro'] = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pp'] = $this->ar_m->get_invdown_project($pro);
          $data['trad'] = $this->ar_m->tradding($pro);
          $data["array_system"] = $this->global_m->get_system_project("id",$data['pro'],false,$session_data["compcode"]);
          
          // var_dump($data["array_system"]);die();
          // var_dump($data['pro']);die();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/ar_tradding_archive_v');
          $this->load->view('base/footer_v');
        }
      public function invoice_sales()
        {
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['currency'] = $this->currency();
          $data['pro'] = $this->uri->segment(3);
          // var_dump($data['traddingh']) ;die();
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pp'] = $this->ar_m->get_invdown_project($pro);
          $data["array_system"] = $this->global_m->get_system_project("id",$data['pro'],false,$session_data["compcode"]);
          $num = $this->numrow();
          // $data['tradid'] = "I".date('Ym').sprintf("%04d",$num);

          // $data['tradid']= $this->global_m->gen_code('TR','trad_header','trad_id');
          // var_dump($data['tradid']);die();          
          // var_dump($data["array_system"]);die();
          // var_dump($data['pro']);die();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/ar_invoice_sales_v');
          $this->load->view('base/footer_v');
        }     
      public function edit_invoice_sales()
        {
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['currency'] = $this->currency();
          $data['pro'] = $this->uri->segment(3);
          $segid = $this->uri->segment(4);
          $segidd = $this->uri->segment(5);
          $data['traddingh'] = $this->ar_m->edit_tradding_h($segid);
          $data['traddingd'] = $this->ar_m->edit_tradding_d($segidd);
          // var_dump($data['traddingh']) ;die();
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pp'] = $this->ar_m->get_invdown_project($pro);
          $data["array_system"] = $this->global_m->get_system_project("id",$data['pro'],false,$session_data["compcode"]);
          $num = $this->numrow();
          $data['tradid'] = "I".date('Ym').sprintf("%04d",$num);
          // echo "<pre>";
          // var_dump($data['traddingh']);
          // die();
          // $data['tradid']= $this->global_m->gen_code('TR','trad_header','trad_id');
          // var_dump($data['tradid']);die();          
          // var_dump($data["array_system"]);die();
          // var_dump($data['pro']);die();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/ar_invoice_sales_edit');
          $this->load->view('base/footer_v');
        }
        public function numrow(){
          $this->db->select('COUNT(trad_id) AS numcount');
          $this->db->from('trad_header');
          $query = $this->db->get();
          $res = $query->result_array();
          // $this->output->enable_profiler(TRUE);
          // var_dump($res);
          $rowcount = $res[0]['numcount']+1;
          return $rowcount;
          }

        function convert($number){ 
            $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
            $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
            $number = str_replace(",","",$number); 
            $number = str_replace(" ","",$number); 
            $number = str_replace("บาท","",$number); 
            $number = explode(".",$number); 
            if(sizeof($number)>2){ 
            return 'ทศนิยมหลายตัวนะจ๊ะ'; 
            exit; 
            } 
            $strlen = strlen($number[0]); 
            $convert = ''; 
            for($i=0;$i<$strlen;$i++){ 
              $n = substr($number[0], $i,1); 
              if($n!=0){ 
                if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; } 
                elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; } 
                elseif($i==($strlen-2) AND $n==1){ $convert .= ''; } 
                else{ $convert .= $txtnum1[$n]; } 
                $convert .= $txtnum2[$strlen-$i-1]; 
              } 
            } 

            $convert .= 'บาท'; 
            if($number[1]=='0' OR $number[1]=='00' OR 
            $number[1]==''){ 
            $convert .= 'ถ้วน'; 
            }else{ 
            $strlen = strlen($number[1]); 
            for($i=0;$i<$strlen;$i++){ 
            $n = substr($number[1], $i,1); 
              if($n!=0){ 
              if($i==($strlen-1) AND $n==1){$convert 
              .= 'เอ็ด';} 
              elseif($i==($strlen-2) AND 
              $n==2){$convert .= 'ยี่';} 
              elseif($i==($strlen-2) AND 
              $n==1){$convert .= '';} 
              else{ $convert .= $txtnum1[$n];} 
              $convert .= $txtnum2[$strlen-$i-1]; 
              } 
            } 
            $convert .= 'สตางค์'; 
            } 
            return $convert; 
            }

        public function save_tradding(){
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $input = $this->input->post();
          $netamounta = $input['net_amount'];
          // $thainum = $this->convert($netamounta);
          $vatsum = str_replace(",","",$input['p_vat']);
          $totalsum = str_replace(",","",$input['net_amount']);
          // echo "<pre>";
          // var_dump($input);
          // die();

          $this->db->select('*');
          $qu = $this->db->get('trad_header');
          $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
          $yy = "Y";
          $mm = "m";
          $ar = "INV";

          if ($res==0) {
              $no_inv = $ar.date($yy).date($mm).sprintf("%04d",1);
          }else{
              $no = $res+1;
              $no_inv = $ar.date($yy).date($mm).sprintf("%04d",$no);
          }

          $insert_h = array(
                'trad_inv' => $no_inv ,
                'inv_date' => $input['inv_date'] ,
                'ref_inv' => $input['ref_invoice'] ,
                'inv_type' => $input['type'] ,
                'projectcode' => $input['projectcode'] ,
                'projectid' => $input['projectid'] ,
                'projectname' => $input['projectname'] ,
                'job_name' => $input['job_name'] ,
                'trad_curency' => $input['curency'] ,
                'trad_exchange' => $input['exchange'] ,
                'cus_projectcode' => $input['projectcode2'] ,
                'cus_projectname' => $input['projectname2'] ,
                'cr_term' => $input['cr_term'] ,
                'due_date' => $input['due_date'] ,
                'vat' => $input['selectvat'] ,
                'vatnum' => $input['vatnum'] ,
                'totalvat' => $vatsum ,
                'sum_netamount' => $totalsum ,
                'remart' => $input['remart'] ,
                'martup' => $input['markup'] ,
                'compcode' => $session_data["compcode"] ,                
                // 'thaiamount' => $thainum 
            );
          $boolen = $this->db->insert('trad_header',$insert_h);
          $id_h = $this->db->insert_id();
          if ($boolen) {
            foreach ($input['matcode'] as $key => $value) {
              $insert_d = array(
                'itrad_matcode' => $input['matcode'][$key],
                'itrad_descrip' => $input['description'][$key],
                'itrad_serno' => $input['serno'][$key],
                'itrad_costcode' => $input['costcode'][$key],
                'itrad_qty' => $input['qty'][$key],
                'itrad_nameunit' => $input['nameunit'][$key],
                'itrad_priceunit' => $input['priceunit'][$key],
                'itrad_pricesale' => $input['pricesale'][$key], 
                'itrad_amount' => $input['amount'][$key],
                'itrad_discount' => $input['discount'][$key],
                'itrad_netamount' => $input['netamount'][$key],
                'itrad_doccode' => $input['doccode'][$key],
                'itrad_system' => $input['system'][$key],
                'ref_tradid' => $id_h
              );
            $boolen_d = $this->db->insert('trad_detail',$insert_d);

            $update_status = array(
                                    'status' => 'yes'
                                  );
            $this->db->where('trading_id',$input['trading_id'][$key]);
            $this->db->update('ic_trading_d',$update_status);

            }
            if ($boolen_d) {
              echo "suscess";
                redirect('ar/ar_tradding_archive/'.$input['projectid']);
            }
          }else{
            echo "fail";
          }
        }  
        public function edit_tradding(){
          $pro = $this->uri->segment(3);
          $id_inv = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
          $input = $this->input->post();
          $netamounta = $input['net_amount'];
          $thainum = $this->convert($netamounta);
          $vatsum = str_replace(",","",$input['p_vat']);
          $totalsum = str_replace(",","",$input['net_amount']);
          $update_h = array('trad_inv' => $input['invoice_no'] ,
                            'inv_date' => $input['inv_date'] ,
                            'ref_no' => $input['ref_no'] ,
                            'ref_inv' => $input['ref_invoice'] ,
                            'date_type' => $input['date_type'] ,
                            'projectcode' => $input['projectcode'] ,
                            'projectname' => $input['projectname'] ,
                            'job_name' => $input['job_name'] ,
                            'trad_curency' => $input['curency'] ,
                            'trad_exchange' => $input['exchange'] ,
                            'trad_log' => $input['log'] ,
                            'trad_cn' => $input['cn'] ,
                            'cus_projectcode' => $input['projectcode2'] ,
                            'cus_projectname' => $input['projectname2'] ,
                            'cr_term' => $input['cr_term'] ,
                            'due_date' => $input['due_date'] ,
                            'vat' => $input['selectvat'] ,
                            'vatnum' => $input['vatnum'] ,
                            'totalvat' => $vatsum ,
                            'advance' => $input['advance'] ,
                            'totaladvance' => $input['p_advance'] ,
                            'retention' => $input['reten'] ,
                            'totalretention' => $input['p_reten'] ,
                            'sum_netamount' => $totalsum ,
                            'ar_voucherno' => $input['ar_voucherno'] ,
                            'doc_ac' => $input['doc_ac'] ,
                            'remart' => $input['remart'] ,
                            'receipt_amt' => $input['receipt_amt'] ,
                            'sale' => $input['memname'] ,
                            'martup' => $input['markup'] ,
                            'compcode' => $session_data["compcode"] ,
                            'vat_discount' => $input['vat_discount'],
                            'thaiamount' => $thainum 
                             );
          $this->db->where('trad_id', $id_inv);
          $boolen = $this->db->update('trad_header',$update_h);
          if ($boolen) {
            foreach ($input['iddetail'] as $key => $value) {
              $update_d = array(
                'itrad_matcode' => $input['matcode'][$key],
                'itrad_descrip' => $input['description'][$key],
                'itrad_serno' => $input['serno'][$key],
                'itrad_costcode' => $input['costcode'][$key],
                'itrad_qty' => $input['qty'][$key],
                'itrad_idunit' => $input['idunit'][$key],
                'itrad_nameunit' => $input['nameunit'][$key],
                'itrad_priceunit' => $input['priceunit'][$key],
                'itrad_pricesale' => $input['pricesale'][$key],
                'itrad_amount' => $input['amount'][$key],
                'itrad_discount' => $input['discount'][$key],
                'itrad_netamount' => $input['netamount'][$key],
                'itrad_doccode' => $input['doccode'][$key]
              );
            $this->db->where('itrad_id', $input['iddetail'][$key]);
            $boolen_d = $this->db->update('trad_detail',$update_d);

            }
              // echo "<pre>";
              // var_dump($update_d);die();
            if ($boolen_d) {
              echo "suscess";
              redirect('ar/ar_tradding_archive/'.$input['idpro']);
            }
          }else{
            echo "fail";
          }
          // echo 'eiei';
        } 
        public function modal_issue(){
          $pro = $this->input->post('proid');
          $data['rows'] = $this->ar_m->modal_ic_issue($pro);
          $this->load->view('office/account/ar/ar_progress/modal_issue',$data);
        }

        public function invoice_other()
        {
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['pro'] = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pp'] = $this->ar_m->get_invdown_project($pro);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/ar_invoice_other_v');
          $this->load->view('base/footer_v');
        }  

        public function load_invprogress()
        {
          $pono = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['pro'] = $this->uri->segment(3);
          $data['dow'] = $this->ar_m->invoicedown($pono);
          $this->load->view('office/account/ar/ar_progress/load_invprogress_v',$data);
        }

        public function load_ret_invprogress()
        {
          $id = $this->uri->segment(3);
          $data['id'] = $this->uri->segment(3);
          $data['per'] = $this->ar_m->load_invprogress_header($id);
           $this->load->view('office/account/ar/ar_progress/load_ret_invprogress',$data);
        }

        public function ret_edit_invprogress()
        {
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $data['no'] = $no;
          $data['period'] = $period;
          $data['ffd'] = $this->ar_m->get_invprogress_detail($no,$period);
           $this->load->view('office/account/ar/ar_progress/ret_invprogress_v',$data);
        }

        public function ar_edit_invprogress()
        {
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $read_only = $this->uri->segment(5);
          $read_only_status = true;
          
          if($read_only == "readonly"){
            $read_only_status = false;
          }else{
            $read_only_status = true;
          }
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['no'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['head'] = $this->ar_m->get_invprogress_header($no,$period);
          $data['det'] = $this->ar_m->get_invprogress_detail($no,$period);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/edit_invprogress_v',["read_only_status"=>$read_only_status]);
          $this->load->view('base/footer_v');
        }

        public function open_invoice_retention(){
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
            //   if($res['pr_project_right'] =='true'){
            // $res['getdep'] = $this->ar_m->getdepartment();
            //   }else{
            // $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
            //   }
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_retention/open_project_retention',$res);
            $this->load->view('base/footer_v');
        }

        public function invoice_retention()
        {
          $code = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['code'] = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          // $data['pp'] = $this->ar_m->invoicedown($code);
          $data['pp'] = $this->ar_m->get_invdown_project($code);
          // $data['payment_re'] = $this->ar_m->payment_re($code);
          // echo "<pre>";
          // var_dump($data['payment_re']);
          // die();
          $data['currency'] = $this->currency();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_retention/ar_invoice_retention_v');
          $this->load->view('base/footer_v');
        } 
        
        public function load_invretention()
        {
          $pono = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['pono'] = $this->uri->segment(3);
          $data['dow'] = $this->ar_m->invoicedown($pono);
          // $data['payment_re'] = $this->ar_m->payment_re($pono);
           // echo "<pre>";
          // var_dump($data['payment_re']);
          // die();
           $this->load->view('office/account/ar/ar_retention/load_retention_v',$data);
        }
        public function load_ret_invretention()
        {
          $id = $this->uri->segment(3);
          $data['id'] = $this->uri->segment(3);
          $data['per'] = $this->ar_m->load_invretention_header($id);
          $this->load->view('office/account/ar/ar_retention/load_ret_invretention_v',$data);
        }

        public function ret_edit_invretention()
        {
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $data['no'] = $no;
          $data['period'] = $period;
          $data['ffd'] = $this->ar_m->get_invretention_detail($no,$period);
           $this->load->view('office/account/ar/ar_retention/ret_invretention_v',$data);
        }
      
        public function ar_edit_invretention()
        {
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['no'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['head'] = $this->ar_m->get_invretention_header($no,$period);
          $data['det'] = $this->ar_m->get_invretention_detail($no,$period);
          // echo "<pre>";
          // var_dump($data['det']);
          // die();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_retention/edit_invretention_v');
          $this->load->view('base/footer_v');
        }

        public function ar_account()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $pro = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['proo'] = $pro;
          $data['imgu'] = $session_data['img'];
          $data['pro'] = $this->ar_m->get_receipt($pro);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_account/ar_account_v');
          $this->load->view('base/footer_v');
        }


        public function load_invaccunt()
        {
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['proo'] = $pro;
          $data['down'] = $this->ar_m->getinvdown_no($pro);
          $data['pro'] = $this->ar_m->getinvprogress_no($pro);
          $data['reten'] = $this->ar_m->getinvreten_no($pro);
          $this->load->view('office/account/ar/ar_account/load_account_v',$data);
        }
        public function load_credit()
        {
            $no = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $data['no'] = $no;
            $data['app'] = $this->ar_m->getreceipt_header2($no);
            $this->load->view('office/account/ar/credit/load_credit',$data);
        }


        public function load_inv_account()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $data['no'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['type'] = $this->uri->segment(5);
          $data['compcode'] = $compcode;
          $data['down'] = $this->ar_m->get_invdown_detail($no,$period);
          $data['pro'] = $this->ar_m->get_invprogress_detail($no,$period);
          $data['ren'] = $this->ar_m->get_invretention_detail($no,$period);
          $this->load->view('office/account/ar/ar_account/load_inv_account_v',$data);
        }

        public function ar_accountall()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['res'] = $this->ar_m->getaccount_no();
          // echo "<pre>";
          // var_dump($data['res']);
          // die();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_account/ar_accountall');
          $this->load->view('base/footer_v');
        }

        public function archive_ar_all()
        {
          $data['res'] = $this->ar_m->getaccount_all();
          $this->load->view('office/account/ar/ar_account/archive_ar_all',$data);
        }

        public function archive_ar_to()
        {
          $data['res'] = $this->ar_m->getaccount_to();
          $this->load->view('office/account/ar/ar_account/archive_ar_to',$data);
        }

        public function archive_ar_not()
        {
          $data['res'] = $this->ar_m->getaccount_no();
          $this->load->view('office/account/ar/ar_account/archive_ar_not',$data);
        }

        public function open_invdown_all()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['down'] = $this->ar_m->getinvdown_no2();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_down/ar_invdown_all');
          $this->load->view('base/footer_v');
        }

        public function archivedown_ar_all()
        {
          $data['all'] = $this->ar_m->getinvdown_all();
          $this->load->view('office/account/ar/ar_down/ar_archivedown_all',$data);
        }

        public function archivedown_ar_to()
        {
          $data['to'] = $this->ar_m->getinvdown_to();
          $this->load->view('office/account/ar/ar_down/ar_archivedown_to',$data);
        }

        public function archivedown_ar_not()
        {
          $data['no'] = $this->ar_m->getinvdown_no2();
          $this->load->view('office/account/ar/ar_down/ar_archivedown_not',$data);
        }

        public function open_invprogress_all()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pro'] = $this->ar_m->getinvprogress_no2();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/ar_invprogress_all');
          $this->load->view('base/footer_v');
        }

        public function archiveprogress_ar_all()
        {
          $data['all'] = $this->ar_m->getinvprogress_all();
          $this->load->view('office/account/ar/ar_progress/ar_archiveprogress_all',$data);
        }

        public function archiveprogress_ar_to()
        {
          $data['to'] = $this->ar_m->getinvprogress_to();
          $this->load->view('office/account/ar/ar_progress/ar_archiveprogress_to',$data);
        }

        public function archiveprogress_ar_no()
        {
          $data['no'] = $this->ar_m->getinvprogress_no2();
          $this->load->view('office/account/ar/ar_progress/ar_archiveprogress_not',$data);
        }

        public function open_retention_all()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['reten'] = $this->ar_m->getinvreten_no2();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_retention/ar_invretention_all');
          $this->load->view('base/footer_v');
        }

        public function archiveretention_ar_all()
        {
          $data['all'] = $this->ar_m->getinvreten_all();
          $this->load->view('office/account/ar/ar_retention/ar_archiveretention_all',$data);
        }

        public function archiveretention_ar_to()
        {
          $data['to'] = $this->ar_m->getinvreten_to();
          $this->load->view('office/account/ar/ar_retention/ar_archiveretention_to',$data);
        }

        public function archiveretention_ar_no()
        {
          $data['no'] = $this->ar_m->getinvreten_no2();
          $this->load->view('office/account/ar/ar_retention/ar_archiveretention_not',$data);
        }

        public function open_proreceipt(){
          $pro = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
            //   if($res['pr_project_right'] =='true'){
            // $res['getdep'] = $this->ar_m->getdepartment();
            //   }else{
            // $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
            //   }
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_receipt/open_project_receipt',$res);
            $this->load->view('base/footer_v');
        }

        public function ar_receipt()
        {
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $data['pro'] = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['pp'] = $this->ar_m->get_receipt($pro);
          $data_price = $this->ar_m->getreceipt_currency($pro);
          // $data['currency'] = $data_price[0]->currency;
          // $data['exchange'] = $data_price[0]->exchange;

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_receipt/ar_receipt_v');
          $this->load->view('base/footer_v');
        } 

        public function load_modal_append()
        { 
          $project_id = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['ar_down'] = $this->ar_m->getreceipt_header($project_id);
          $data['ar_cn'] = $this->ar_m->getcn_header($project_id);
          
          $this->load->view('office/account/ar/ar_receipt/modal_receipt_v',$data);
        }

        public function ar_receiving()
        {

          // $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          // $this->load->model('datastore_m');
          // $data['pro'] = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['paid'] = $this->global_m->paid($compcode);
          // var_dump($data['paid']);
          // die();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_receiving/ar_receiving_v');
          $this->load->view('base/footer_v');
        }

        public function load_receipt()
        { 
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['re'] = $this->ar_m->getreceiving();
          $this->load->view('office/account/ar/ar_receiving/modal_receiving_v',$data);
        }

        public function ret_receiving()
        {
          $no = $this->uri->segment(3);
          $data['no'] = $this->uri->segment(3);
          $data['re'] = $this->ar_m->load_receiving($no);

           $this->load->view('office/account/ar/ar_receiving/ret_receiving_v',$data);
        }

        public function ret_paird()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $amt = $this->uri->segment(3);
          $data['amt'] = $this->uri->segment(3);
          $data['paid'] = $this->global_m->paid($compcode);
          $this->load->view('office/account/ar/ar_receiving/ret_paird_v',$data);
        }


        public function ar_receiptall()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['re'] = $this->ar_m->getreceipt_no();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_receipt/ar_receipt_all');
          $this->load->view('base/footer_v');
        }

        public function arc_receipt_ar_all()
        {
          $data['all'] = $this->ar_m->getreceipt_all();
          $this->load->view('office/account/ar/ar_receipt/ar_arch_receipt_all',$data);
        }

        public function arc_receipt_ar_to()
        {
          $data['to'] = $this->ar_m->getreceipt_to();
          $this->load->view('office/account/ar/ar_receipt/ar_arch_receipt_to',$data);
        }

        public function arc_receipt_ar_not()
        {
          $data['no'] = $this->ar_m->getreceipt_no();
          $this->load->view('office/account/ar/ar_receipt/ar_arch_receipt_not',$data);
        }

        public function ar_receivingall()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid']; 
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['re'] = $this->ar_m->getreceiving_no();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_receiving/ar_receiving_all');
          $this->load->view('base/footer_v');
        }

        public function arc_receiving_all()
        {
          $data['all'] = $this->ar_m->getreceiving_all();
          $this->load->view('office/account/ar/ar_receiving/arch_receiving_all',$data);
        }

        public function arc_receiving_to()
        {
          $data['to'] = $this->ar_m->getreceiving_to();
          $this->load->view('office/account/ar/ar_receiving/arch_receiving_to',$data);
        }

        public function arc_receiving_not()
        {
          $data['no'] = $this->ar_m->getreceiving_no();
          $this->load->view('office/account/ar/ar_receiving/arch_receiving_not',$data);
        }

        public function ar_clear()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_clear/ar_clear_v');
          $this->load->view('base/footer_v');
        }

        public function load_clear()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['cl'] = $this->ar_m->getreceiving_no();
          $this->load->view('office/account/ar/ar_clear/load_clear_v',$data);
        }

        public function ret_clear()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $no = $this->uri->segment(3);
          $data['no'] = $this->uri->segment(3);
          $data['re'] = $this->ar_m->get_receiving_de($no);

          // echo "<pre>";
          // var_dump($data['re']);
          // die();
          
          $data['compcode'] = $compcode;
          $this->load->view('office/account/ar/ar_clear/ret_clear_v',$data);
        }

        public function ar_clearall()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arno = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['re'] = $this->ar_m->ar_clear_no();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_clear/ar_clear_all');
          $this->load->view('base/footer_v');
        }

        public function ar_clear_all()
        {
          $data['all'] = $this->ar_m->ar_clear_all();
          $this->load->view('office/account/ar/ar_clear/clear_all',$data);
        }

        public function ar_clear_to()
        {
          $data['to'] = $this->ar_m->ar_clear_to();
          $this->load->view('office/account/ar/ar_clear/clear_to',$data);
        }

        public function ar_clear_not()
        {
          $data['no'] = $this->ar_m->ar_clear_no();
          $this->load->view('office/account/ar/ar_clear/clear_not',$data);
        }

        public function ar_customer_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_customer_report.mrt&compcode=".$compcode);
        }

        public function ar_project_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_project_report.mrt&compcode=".$compcode);
        }

        public function ar_agingcus_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_agingcus_report.mrt&compcode=".$compcode);
        }

        public function ar_agingpro_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_agingpro_report.mrt&compcode=".$compcode);
        }

        public function ar_invoicebalance_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invoicebalance_report.mrt&compcode=".$compcode);
        }
        public function ar_invoice_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invoice_report.mrt&compcode=".$compcode);
        }
        public function ar_wt_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_wt_report.mrt&compcode=".$compcode);
        }
        public function ar_vat_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_vat_report.mrt&compcode=".$compcode);
        }
        public function ar_deducted_report()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_deducted_report.mrt&compcode=".$compcode);
        }
        public function ar_detail_byproject()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_detail_byproject.mrt&compcode=".$compcode);
        }
        public function ar_detail_bysale()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_detail_bysale.mrt&compcode=".$compcode);
        }
        public function ar_rvrl_voucher()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_rvrl_voucher.mrt&compcode=".$compcode);
        }
        public function ar_invdown_delete()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invdown_delete.mrt&compcode=".$compcode);
        }
        public function ar_invprojress_delete()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invprojress_delete.mrt&compcode=".$compcode);
        }
        public function ar_invretention_delete()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invretention_delete.mrt&compcode=".$compcode);
        }
        public function ar_project_withjob()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_project_withjob.mrt&compcode=".$compcode);
        }
        public function ar_project_outjob()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_project_outjob.mrt&compcode=".$compcode);
        }
        public function ar_detail_byinvoice()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_detail_byinvoice.mrt&compcode=".$compcode);
        }
        public function ar_receipt_tax()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_receipt_tax.mrt&compcode=".$compcode);
        }
        public function ar_downpayment()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_downpayment.mrt&compcode=".$compcode);
        }
        public function ar_invpro_balace()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invpro_balace.mrt&compcode=".$compcode);
        }
        public function ar_detail_invoicetrading()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_detail_invoicetrading.mrt&compcode=".$compcode);
        }
        public function open_arinvdown()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $data['no'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['head'] = $this->ar_m->get_invdown_header($no,$period);
          $data['det'] = $this->ar_m->get_invdown_detail($no,$period);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_down/open_invdown_v',$data);
          $this->load->view('base/footer_v');
        }

        public function open_arinvproress()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $data['no'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['head'] = $this->ar_m->get_invprogress_header($no,$period);
          $data['det'] = $this->ar_m->get_invprogress_detail($no,$period); 
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/open_invprogress_v',$data);
          $this->load->view('base/footer_v');
        }

        public function open_arinvretention()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $no = $this->uri->segment(3);
          $period = $this->uri->segment(4);
          $data['no'] = $this->uri->segment(3);
          $data['period'] = $this->uri->segment(4);
          $data['head'] = $this->ar_m->get_invretention_header($no,$period);
          $data['det'] = $this->ar_m->get_invretention_detail($no,$period);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_retention/open_invretention_v',$data);
          $this->load->view('base/footer_v');
        }

        public function ar_post_gl()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img']; 
          $data['gl_book'] = $this->ar_m->gl_book();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_post/ar_post_gl',$data);
          $this->load->view('base/footer_v');
        }

    public function ar_main_v()
    {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
        }

        $userid = $session_data['m_id'];
        $da['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $da['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $da['project'] = $session_data['m_project'];
        $da['imgu'] = $session_data['img'];
        $this->load->view('navtail/base_master/header_v',$da);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_invoice_v');
        $this->load->view('base/footer_v');
  }  

  public function ar_report_v()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
          redirect('/');
      }

      $userid = $session_data['m_id'];
      $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $da['imgu'] = $session_data['img'];
      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ar_v');
      $this->load->view('office/account/ar/ar_report_v');
      $this->load->view('base/footer_v');
  }  
  public function ar_invoice_v()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
          redirect('/');
      }

      $userid = $session_data['m_id'];
      $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $da['imgu'] = $session_data['img'];
      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ar_v');
      $this->load->view('office/account/ar/ar_invoice_v');
      $this->load->view('base/footer_v');
  }  
  public function ar_credit_v()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
          redirect('/');
      }

      $userid = $session_data['m_id'];
      $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $da['imgu'] = $session_data['img'];
      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ar_v');
      $this->load->view('office/account/ar/ar_credit_v');
      $this->load->view('base/footer_v');
  }  
  public function ar_account_v()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
          redirect('/');
      }

      $userid = $session_data['m_id'];
      $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $da['imgu'] = $session_data['img'];
      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ar_v');
      $this->load->view('office/account/ar/ar_account_v');
      $this->load->view('base/footer_v');
  }

  public function ar_pro_acc()
      {
        $pro = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }
            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];

            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');

            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
            //   if($res['pr_project_right'] =='true'){
            // $res['getdep'] = $this->ar_m->getdepartment();
            //   }else{
            // $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
            //   }
            
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_account/open_pro_acc',$res);
            $this->load->view('base/footer_v');
  }
        public function query_modal_acc()
        {
          $type = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['type'] = $type;
          $data['down'] = $this->ar_m->getinvdown_no();
          $data['pro'] = $this->ar_m->getinvprogress_no();
          $data['reten'] = $this->ar_m->getinvreten_no2();
          $this->load->view('office/account/ar/ar_account/query_modal_acc',$data);
        }
    public  function  open_credit(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
        }

        $userid = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/credit/credit_v');
        $this->load->view('base/footer_v');
    }
    public function load_modal_credit()
    {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $data['app'] = $this->ar_m->getreceipt_header2();
        $this->load->view('office/account/ar/credit/modal_credit_v',$data);
        //echo print_r($data);

    }
    public function load_credit_v()
    {
        $code = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $data['code'] = $code;
        $data['type'] = $type;
        $data['down'] = $this->ar_m->get_acct_d($code);
        $data['pro'] = $this->ar_m->get_acct_p($code);
        $data['ren'] = $this->ar_m->get_acct_r($code);

          $this->load->view('office/account/ar/credit/load_credit_v',$data);

    }

    public function gl_credit_v()
    {
        $code = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $data['code'] = $code;
        $data['type'] = $type;
        $data['down'] = $this->ar_m->get_acct_d($code);
        $data['pro'] = $this->ar_m->get_acct_p($code);
        $data['ren'] = $this->ar_m->get_acct_r($code);

          $this->load->view('office/account/ar/credit/gl_credit_v',$data);

    }
    
    public function open_credit_all()
    {
          $session_data = $this->session->userdata('sessed_in');
          $vendercode = $this->uri->segment(3);
          $data['vendercod'] = $vendercode;
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          if ($username=="") {
            redirect('/');
          }
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          // $data['gres'] = $this->ap_m->getapd($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/credit/open_credit');
  }

    public function view_account(){
        $pro = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $data['pro'] = $pro;
        $data['down'] = $this->ar_m->getinvdown_no($pro);
        $data['proress'] = $this->ar_m->getinvprogress_no($pro);
        $data['reten'] = $this->ar_m->getinvreten_no($pro);
        $this->load->view('office/account/ar/ar_account/view_account',$data);

    }
    public function view_receipt(){
        $pro = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $data['pro'] = $pro;
        $data['cn'] = $this->ar_m->get_view_cedit($pro);
        $data['view'] = $this->ar_m->getreceipt_header($pro);
        $this->load->view('office/account/ar/ar_receipt/view_receipt',$data);

    }
    
    public function ar_receiving_other()
        {

          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }

          $userid = $session_data['m_id'];
          $res['name'] = $session_data['m_name'];
          $res['depid'] = $session_data['m_depid'];
          $res['dep'] = $session_data['m_dep'];
          $res['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $res['project'] = $session_data['m_project'];
          $res['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$res);
          $this->load->view('navtail/base_master/tail_v');
          $res['poapprove'] = $session_data['po_approve'];
          $res['pr_project_right'] = $session_data['pr_project_right'];
          $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);

          if($res['pr_project_right'] =='true'){
                $res['getdep'] = $this->ar_m->getdepartment();
          }else{
                $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
          }
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/receiving_other/receiving_project_v',$res);
          $this->load->view('base/footer_v');
      }

      public function ar_receivingother()
        {
          $pro = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['pro'] = $this->uri->segment(3);
          $pro = $this->uri->segment(3);
          $data['type'] = $type;
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['book'] = $this->ar_m->book_v();
          $data['account'] = $this->ar_m->account_m($compcode);
          $data['proj'] = $this->ar_m->getproject($compcode);
          $data['system'] = $this->ar_m->system_m($compcode);
          $data['depart'] = $this->ar_m->department();
          $data['allcostcode'] = $this->ar_m->allcostcode();
          $data['vender'] = $this->ar_m->getvender();
          $data['customer'] = $this->ar_m->getmember();
          $data['proo'] = $this->ar_m->get_invdown_project($pro);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/receiving_other/ar_receivingother');
          $this->load->view('base/footer_v');
        }

        public function edit_journalvocher()
        {
          $no = $this->uri->segment(3);
          $sub = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['no'] =$this->uri->segment(3);
          $data['sub'] =$this->uri->segment(4);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['header'] = $this->ar_m->getjournal_header($no);
          $data['detail'] = $this->ar_m->getjournal_detail($no);
          $data['subproject'] = $this->ar_m->getjournal_subpro($sub);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/receiving_other/edit_journalvocher_v');
          $this->load->view('base/footer_v');
        }

        public function ar_active_cnnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $this->load->model('ar_m');
      $data['not'] = $this->ar_m->getcnnot($compcode);
      $this->load->view('office/account/ar/credit/ar_active_cnnot',$data);
    }

        public function ar_active_cnall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ar_m->getcnnot($compcode);
      $this->load->view('office/account/ar/credit/ar_active_cnall',$data);
    }

        public function ar_active_cnopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ar_m->getcnnot($compcode);
      $this->load->view('office/account/ar/credit/ar_active_cnopen',$data);
    }


            public function sales(){
          $pro = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
              if($res['pr_project_right'] =='true'){
            $res['getdep'] = $this->ar_m->getdepartment();
              }else{
            $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
              }
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_progress/open_project_sales',$res);
            $this->load->view('base/footer_v');
        }

        public function other(){
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }
            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];

            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ar_v'); 
            $this->load->view('office/account/ar/ar_progress/open_project_other',$res);
            $this->load->view('base/footer_v');
        }
        
        public function other_project()
        {
          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('other_header');
          $this->db->where('other_header.compcode', $session_data['compcode']);
          $this->db->where('other_header.active', '1');
          $this->db->where('other_header.ot_pro_id !=', '');
          $query = $this->db->get();
          if($query->num_rows() > 0) {
            $res['other_pro'] = $query->result();
          }else{
            $res['other_pro'] = [];
          }
          $this->load->view('office/account/ar/ar_progress/archive_other_project',$res);
        }
        
        public function other_department()
        {
          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('other_header');
          $this->db->where('other_header.compcode', $session_data['compcode']);
          $this->db->where('other_header.active', '1');
          $this->db->where('other_header.ot_department_id !=', '');
          $query = $this->db->get();
          if($query->num_rows() > 0) {
            $res['other_depart'] = $query->result();
          }else{
            $res['other_depart'] = [];
          }
          $this->load->view('office/account/ar/ar_progress/archive_other_depart',$res);
        }

        public function add_other()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }

          $userid = $session_data['m_id'];
          $res['name'] = $session_data['m_name'];
          $res['depid'] = $session_data['m_depid'];
          $res['dep'] = $session_data['m_dep'];
          $res['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $res['project'] = $session_data['m_project'];
          $res['imgu'] = $session_data['img'];
          $res['poapprove'] = $session_data['po_approve'];
          $res['currency'] = $this->currency();
          $res['incometype'] = $this->incometype();

          $this->load->view('navtail/base_master/header_v',$res);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/add_other_page',$res);
          $this->load->view('base/footer_v');
        }
        
        public function department_modal() {
          $session_data = $this->session->userdata('sessed_in');
          
          $this->db->select('*');
          $this->db->from('department');
          $this->db->where('compcode', $session_data['compcode']);

          $query = $this->db->get();
          $data['department'] = $query->result();
          $this->load->view('office/account/ar/ar_progress/content_department_modal', $data);
        }
        
        public function project_modal() {

          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('
                              project.project_id,
                              project.project_code,
                              project.project_name,
                              project.project_mcode,
                              project.project_wt,
                              project.project_vat,
                              debtor.debtor_id,
                              debtor.debtor_name,
                              debtor.debtor_credit
                          ');
          $this->db->from('project');
          $this->db->join('debtor', 'project.project_mcode = debtor.debtor_code');
          $this->db->where('project.compcode', $session_data['compcode']);

          $query = $this->db->get();
          $data['project'] = $query->result();
          $this->load->view('office/account/ar/ar_progress/content_project_modal', $data);
        }
        
        public function custommer_modal() {
          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('debtor');
          $this->db->where('compcode', $session_data['compcode']);

          $query = $this->db->get();
          $data['debtor'] = $query->result();

          $this->load->view('office/account/ar/ar_progress/content_custommer_modal', $data);
        }

        public function currency(){
          $session_data = $this->session->userdata('sessed_in');
          $this->db->select('*');
          $this->db->from('currency');
          $this->db->where('active', '1');
          $this->db->where('compcode', $session_data['compcode']);
          $query = $this->db->get();

          if ($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        function unit(){
          $data['row'] = $this->input->post('row');
          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('unit');
          $this->db->where('compcode', $session_data['compcode']);

          $query = $this->db->get();
          $data['unit'] = $query->result();

          $this->load->view('office/account/ar/ar_progress/unit_modal', $data);
        }

        function system_header(){
          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('system');
          $this->db->where('compcode', $session_data['compcode']);

          $query = $this->db->get();
          $data['system'] = $query->result();

          $this->load->view('office/account/ar/ar_progress/system_header', $data);
        }

        public function save_other()
        {

          $input = $this->input->post();
          
          
          $session_data = $this->session->userdata('sessed_in');
          $header = array( 
            'ot_code'           => $input['ot_code'],
            'ot_date'           => $input['ot_date'],
            'ot_type'           => 'service',
            'ot_tax'            => $input['tax'],
            'ot_gl'             => $input['gl'],
            'ot_pro_id'         => $input['ot_pro_id'],
            'ot_pro_code'       => $input['pro_code'],
            'ot_pro_name'       => $input['pro_name'],
            'ot_pro_id'         => $input['ot_pro_id'],
            'ot_system_id'      => $input['sys_head_id'],
            'ot_sys_name'       => $input['sys_head_name'],
            'ot_ref_no'         => $input['ot_ref_no'],
            'ot_ref_date'       => $input['ot_ref_date'],
            'ot_cus_id'         => $input['ot_cus_id'],
            'ot_cus_code'       => $input['cus_code'],
            'ot_cus_name'       => $input['cus_name'],
            'ot_crterm'         => $input['ot_crterm'],
            'ot_duedate'        => $input['ot_duedate'],
            'ot_wt'             => $input['ot_wt'],
            'ot_vat'            => $input['ot_vat'],
            'ot_currency_id'    => $input['ot_currency_id'],
            'ot_exchangrate'    => $input['ot_exchangrate'],
            'ot_type_income_id' => $input['income_id'],
            'ot_remark'         => addslashes($input['ot_remark']),
            'compcode'          => $session_data['compcode'],
            'user_create'       => $session_data['m_name'],
            'create_date'       => date('Y-m-d H:i:s'),
            'active'            => '1',
            'system_code'       => $input['sys_head_code'],
          );
          // echo "<pre>";
          // var_dump($header);
          // die();

          $insert_succ = $this->db->insert('other_header', $header);
          $header_id = $this->db->insert_id();

          if($insert_succ) {
            foreach ($input['description'] as $key => $input_detail) {
              $detail = array(
                'ref_other'      => $header_id,
                'otde_des'       => $input['description'][$key],
                'otde_qty'       => $input['qty'][$key],
                'otde_unit_id'   => $input['unit_id'][$key],
                'otde_unit_code'  => $input['unit_code'][$key],
                'otde_unit_name'  => $input['unit_name'][$key],
                'otde_priceu'    => $input['price'][$key],
                'otde_amount'    => $input['amount'][$key],
                'otde_vat'       => $input['vat'][$key],
                'otde_atamt'     => $input['wt'][$key],
                'otde_netamount' => $input['netamount'][$key],
                'compcode'       => $session_data['compcode'],
                'user_create'    => $session_data['m_name'],
                'create_date'    => date('Y-m-d H:i:s'),
                'active'         => '1',
              );
              $this->db->insert('other_detail', $detail);
            }
          }else{
            echo "ไม่สามารถเพิ่มข้อมูลได้";
          }

          redirect('ar/update_other/'.$header_id);
         
        }

        public function other_header_data($id)
        {
          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('other_header');
          $this->db->where('other_header.compcode', $session_data['compcode']);
          $this->db->where('ot_id', $id);
          $query = $this->db->get();

          if(isset($query)) {
            if ($query->num_rows() > 0) {
              $res = $query->result();
            }else{
              $res = [];
            }
          }else{
            $res = [];
          }
          return $res;
        }

        public function other_detail_data($id)
        {
          $session_data = $this->session->userdata('sessed_in');

          $this->db->select('*');
          $this->db->from('other_detail');
          $this->db->where('compcode', $session_data['compcode']);
          $this->db->where('ref_other', $id);
          $query = $this->db->get();

          if ($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }
          return $res;
        }

        public function update_other($id){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $res['name'] = $session_data['m_name'];
          $res['depid'] = $session_data['m_depid'];
          $res['dep'] = $session_data['m_dep'];
          $res['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $res['project'] = $session_data['m_project'];
          $res['imgu'] = $session_data['img'];
          $res['poapprove'] = $session_data['po_approve'];
          $res['pr_project_right'] = $session_data['pr_project_right'];

          $res['currency'] = $this->currency();
          $res['incometype'] = $this->incometype();
          $res['header'] = $this->other_header_data($id);
          $res['detail'] = $this->other_detail_data($id);
          $this->load->view('navtail/base_master/header_v',$res);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_progress/update_other_form',$res);
          $this->load->view('base/footer_v');
        }

        public function duedate()
        {
          $day = $this->uri->segment(3);
          
          $date = date('Y-m-d');
          $date1 = str_replace('-', '/', $date);
          $duedate = date('Y-m-d',strtotime($date1 . "+".$day." days"));
          echo $duedate;
        }

        public function add_income()
        {
          $this->load->view('office/account/ar/ar_progress/modal_addincome');
        }

        public function save_incometype()
        {
          $input = $this->input->post();
          $session_data = $this->session->userdata('sessed_in');

          $insert = array(
            'income_id'   => $input['income_id'],
            'income_code' => $input['income_code'],
            'income_name' => $input['income_name'],
            'compcode'    => $session_data['compcode'],
            'active'      => '1',
            'user_create' => $input['m_name'],
            'create_date' => date('Y-m-d H:i:s'),
          );

          $insert_succ = $this->db->insert('income_type', $insert);

          if ($insert_succ) {
            redirect('ar/add_other');
          }
        }

        public function incometype()
        {
          $session_data = $this->session->userdata('sessed_in');
          $this->db->select('*');
          $this->db->from('income_type');
          $this->db->where('compcode', $session_data['compcode']);
          $query = $this->db->get();

          if ($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function save_update_other()
        {
          $input = $this->input->post();
          // echo '<pre>';
          // print_r($input);die();
          $session_data = $this->session->userdata('sessed_in');
          $header = array(
            'ot_code'           => $input['ot_code'],
            'ot_date'           => $input['ot_date'],
            'ot_type'           => 'service',
            'ot_tax'            => $input['tax'],
            'ot_gl'             => $input['gl'],
            'ot_pro_id'         => $input['ot_pro_id'],
            'ot_pro_code'       => $input['pro_code'],
            'ot_pro_name'       => $input['pro_name'],
            'ot_department_id'  => $input['ot_department_id'],
            'ot_depart_code'    => $input['depart_code'],
            'ot_depart_name'    => $input['depart_name'],
            'ot_pro_id'         => $input['ot_pro_id'],
            'ot_system_id'      => $input['sys_head_id'],
            'ot_sys_name'       => $input['sys_head_name'],
            'ot_ref_no'         => $input['ot_ref_no'],
            'ot_ref_date'       => $input['ot_ref_date'],
            'ot_cus_id'         => $input['ot_cus_id'],
            'ot_cus_code'       => $input['cus_code'],
            'ot_cus_name'       => $input['cus_name'],
            'ot_crterm'         => $input['ot_crterm'],
            'ot_duedate'        => $input['ot_duedate'],
            'ot_wt'             => $input['ot_wt'],
            'ot_vat'            => $input['ot_vat'],
            'ot_currency_id'    => $input['ot_currency_id'],
            'ot_exchangrate'    => $input['ot_exchangrate'],
            'ot_type_income_id' => $input['income_id'],
            'ot_remark'         => addslashes($input['ot_remark']),
            'compcode'          => $session_data['compcode'],
            'user_create'       => $session_data['m_name'],
            'create_date'       => date('Y-m-d H:i:s'),
            'active'            => '1',
          );
          // $input['id_header_up']
          $this->db->where('ot_id', $input['id_header_up']);
          $insert_succ = $this->db->update('other_header', $header);

          if($insert_succ) {
            foreach ($input['description'] as $key => $input_detail) {
              $detail = array(
                'ref_other'      => $input['id_header_up'],
                'otde_des'       => $input['description'][$key],
                'otde_qty'       => $input['qty'][$key],
                'otde_unit_id'   => $input['unit_id'][$key],
                'otde_unit_code' => $input['unit_code'][$key],
                'otde_unit_name' => $input['unit_name'][$key],
                'otde_priceu'    => $input['price'][$key],
                'otde_amount'    => $input['amount'][$key],
                'otde_vat'       => $input['vat'][$key],
                'otde_atamt'     => $input['wt'][$key],
                'otde_netamount' => $input['netamount'][$key],
                'compcode'       => $session_data['compcode'],
                'user_create'    => $session_data['m_name'],
                'create_date'    => date('Y-m-d H:i:s'),
                'active'         => '1',
              );
              $this->db->insert('other_detail', $detail);
            }


            foreach ($input['description_up'] as $key => $input_detail) {
              $detail = array(
                'otde_des'       => $input['description_up'][$key],
                'otde_qty'       => $input['qty_up'][$key],
                'otde_unit_id'     => $input['unit_id_up'][$key],
                'otde_unit_code'  => $input['unit_code_up'][$key],
                'otde_unit_name'  => $input['unit_name_up'][$key],
                'otde_priceu'    => $input['price_up'][$key],
                'otde_amount'    => $input['amount_up'][$key],
                'otde_vat'       => $input['vat_up'][$key],
                'otde_atamt'     => $input['wt_up'][$key],
                'otde_netamount' => $input['netamount_up'][$key],
                'compcode'       => $session_data['compcode'],
                'user_edit'    => $session_data['m_name'],
                'edit_date'    => date('Y-m-d H:i:s'),
              );
              $this->db->where('otde_id', $input['id_detail_up'][$key]);
              $this->db->update('other_detail', $detail);
            }

          }else{
            echo "ไม่สามารถเพิ่มข้อมูลได้ และ แก้ไขข้อมูลได้";
          }

          redirect('ar/other');
        }

        public function del_otde_id()
        {
          $id = $this->input->post('id');
          $this->db->where('otde_id', $id);
          $del_succ = $this->db->delete('other_detail');
          if ($del_succ) {
            $res['status'] = true;
            $res['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
          }else{
            $res['status'] = false;
            $res['message'] = "ไม่สามารถลบข้อมูลได้";
          }
          echo json_encode($res);
        }
        public function del_other_id($id)
        {
            $update = array(
              'active' => '0'
            );

            $this->db->where('ot_id', $id);
            $update_succ = $this->db->update('other_header', $update);

            if ($update_succ) {
              redirect('ar/other');
            }else{
              redirect('ar/other');
            }
            
        }

        public function receipt_other()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];

            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_receipt_other/settle_other',$res);
            $this->load->view('base/footer_v');
        }

        public function receipt_other_modle(){
       

          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $data['compcode'] = $compcode;
          $net = $this->ar_m->get_code_nat($compcode);
          $data['receipt'] = $this->ar_m->get_receipt_other_all($compcode);

          foreach ($net as $key_net => $date_net) {
            $data['net_code'] = $date_net->act_code;
            $data['net_name'] = $date_net->act_name;
          }
         
          $this->load->view('office/account/ar/ar_receipt_other/modle_other',$data);
          
        }

        public function account_code(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $data['account_code'] = $this->ar_m->get_account_code($compcode);
          $this->load->view('office/account/ar/ar_receipt_other/modle_account_code',$data);
        }

        public function receipt_other_edit(){
          $ar_code = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $data['ar_header'] = $this->ar_m->get_ar_other_by_code($ar_code);
            // var_dump($data['ar_header']);
            $data['ar_detail'] = $this->ar_m->get_ar_other_detail_all($ar_code);
            

            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_receipt_other/receipt_other_edit',$data);
            $this->load->view('base/footer_v');
          
        }

        public function other_list(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $data['ar'] = $this->ar_m->get_ar_other_all($compcode);

            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_receipt_other/other_list',$data);
            $this->load->view('base/footer_v');
        }

        public function open_proreceipt_other(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }

            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
              if($res['pr_project_right'] =='true'){
            $res['getdep'] = $this->ar_m->getdepartment();
              }else{
            $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
              }
            $this->load->view('navtail/navtail_ar_v');
            $this->load->view('office/account/ar/ar_receipt/open_project_receipt_other',$res);
            $this->load->view('base/footer_v');
        }

        public function ar_receipt_other(){
          $project_id = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
            if ($username=="") {
              redirect('/');
            }

          $userid = $session_data['m_id'];
          $res['name'] = $session_data['m_name'];
          $res['depid'] = $session_data['m_depid'];
          $res['dep'] = $session_data['m_dep'];
          $res['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $res['project'] = $session_data['m_project'];
          $res['imgu'] = $session_data['img'];
          $res['getproject'] = $this->ar_m->getproject_name($project_id);
          $res['currency'] = $this->currency();
          $res['system'] = $this->ar_m->get_system($compcode);

          $yy = "Y";
          $mm = "m";
          $ss = "S";
          $bill = $this->ar_m->get_chk_bill();
          if ($bill == 0) {
            $res['s_no'] = $ss.date($yy).date($mm).sprintf("%04d",1);
          }else{
            $no = $bill+1;
            $res['s_no'] = $ss.date($yy).date($mm).sprintf("%04d",$no);
          }
          

          $this->load->view('navtail/base_master/header_v',$res);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_receipt_other/other_bill',$res);
          $this->load->view('base/footer_v');

        }

        public function ar_modal(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
            if ($username=="") {
              redirect('/');
            }
          $project_code = $this->uri->segment(3);
          $res['system'] = $this->ar_m->get_system($compcode);
          $this->load->view('office/account/ar/ar_receipt_other/ar_modal',$res);
        }

        public function ar_system(){
          $system_code = $this->uri->segment(3);
          $res['ar_list'] = $this->ar_m->get_ar_by_system($system_code);
          $this->load->view('office/account/ar/ar_receipt_other/list_ar',$res);
        }

        public function refinvoice(){

          $invoice_no = $this->input->post('invoice_no');
          $invoice = $this->ar_m->get_invoice($invoice_no);
          $invoice_id = $invoice[0]->ot_id;
          $res = $this->ar_m->get_invoice_list($invoice_id);
          echo json_encode($res);
        }

      public function ar_receivingall_other($value=''){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
          redirect('/');
        }

        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $res['poapprove'] = $session_data['po_approve'];
        $res['pr_project_right'] = $session_data['pr_project_right'];
        $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
          if($res['pr_project_right'] =='true'){
        $res['getdep'] = $this->ar_m->getdepartment();
          }else{
        $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
          }
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_receipt_other/ar_receipt_other',$res);
        $this->load->view('base/footer_v');
      }

      public function receive_money(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3);
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $res['getproject'] = $this->ar_m->getproject_name($project_id);
        $res['compcode'] = $compcode;
        $res['less_other'] = $this->ar_m->get_less_other($compcode);
        $res['currency'] = $this->currency();
        

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_receipt_other/ar_other_receive',$res);
        $this->load->view('base/footer_v');

      }

      public function get_bill_by_project(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
        $project_code = $this->uri->segment(3);
        $res['bill_list'] = $this->ar_m->get_bill($project_code,$compcode);
        $this->load->view('office/account/ar/ar_receipt_other/ar_bill',$res);
      }

      public function add_row_receive(){
        $receive_no = $this->uri->segment(3);
        $res['invoice'] = $this->ar_m->get_receive($receive_no);

        $this->load->view('office/account/ar/ar_receipt_other/model_invouce',$res);
        
      }

      public function sum_amt(){
        $ref_no = $this->input->post('ref_no');
        $res['sum_amt'] = $this->ar_m->sum_amt($ref_no);
      }

      public function get_modal_less_other(){
       $this->load->view('office/account/ar/ar_receipt_other/model_less_other');
      }

      public function ar_other_clear(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3);
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_receipt_other/ar_other_clear',$res);
        $this->load->view('base/footer_v');

      }

      public function get_modal_rv(){
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $res['rv'] = $this->ar_m->get_rv($compcode);
        $ar_arolt = $this->ar_m->get_code_nat($compcode);
        $ar_sov = $this->ar_m->get_ar_sov($compcode);
        $ar_ov = $this->ar_m->get_ar_ov($compcode);
        foreach ($ar_ov as $key_vat => $date_vat) {
            $res['vat_code'] = $date_vat->act_code;
            $res['vat'] = $date_vat->act_name;
        }
        foreach ($ar_sov as $key_net => $data_not_vat) {
            $res['not_vat_code'] = $data_not_vat->act_code;
            $res['not_vat'] = $data_not_vat->act_name;
        } 
        foreach ($ar_arolt as $key_net => $data_acc) {
            $res['acc_code'] = $data_acc->act_code;
            $res['acc_name'] = $data_acc->act_name;
        }
        $this->load->view('office/account/ar/ar_receipt_other/modal_rv',$res);
      }

      public function ar_reduce(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3);
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_reduce/reduce',$res);
        $this->load->view('base/footer_v');

      }

      public function get_inv(){
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $data['ic'] = $this->ar_m->get_inv($compcode);
        $this->load->view('office/account/ar/ar_reduce/ic_modal',$data);
      }

      public function get_inv_detail(){
        $inv_id = $this->uri->segment(3);
        $detail = $this->ar_m->get_inv_detail($inv_id);
        echo json_encode($detail);
      }
      public function get_inv_detail_receipt(){
        $inv_id = $this->uri->segment(3);
        $detail = $this->ar_m->get_inv_detail_receipt($inv_id);
        echo json_encode($detail);
      }

      public function account_code_by_rows(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $data['row'] = $this->uri->segment(3);
          $data['account_code'] = $this->ar_m->get_account_code($compcode);
          $this->load->view('office/account/ar/ar_receipt_other/modle_account_code_by_rows',$data);
      }

      public function account_code_by_rows_name(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $data['row'] = $this->uri->segment(3);
          $data['row_id'] = $this->uri->segment(4);
          $data['row_name'] = $this->uri->segment(5);
          $data['account_code'] = $this->ar_m->get_account_code($compcode);
          $this->load->view('office/account/ar/ar_receipt_other/modle_account_code_by_rows_name',$data);
      }

      

      public function ar_reduce_edit(){
        $rd_no = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3);
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $res['rd_header'] = $this->ar_m->rd_header($rd_no);
        $res['rd_detail'] = $this->ar_m->rd_detail($rd_no);

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_reduce/reduce_edit',$res);
        $this->load->view('base/footer_v');
      }

      public function ar_reduce_view(){
        $rd_no = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3);
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $res['rd_header'] = $this->ar_m->rd_header($rd_no);
        $res['rd_detail'] = $this->ar_m->rd_detail($rd_no);

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_reduce/reduce_edit',$res);
        $this->load->view('base/footer_v');
      }

      public function ar_reduce_list(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3);
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $res['rd_header'] = $this->ar_m->rd_header_list($compcode);

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_reduce/reduce_list',$res);
        $this->load->view('base/footer_v');
      }

      public function ar_trading_list(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3);
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $res['art_header'] = $this->ar_m->art_header_list($compcode);

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_trading/ar_trading',$res);
        $this->load->view('base/footer_v');
      }

      public function add_ar_trading(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3); 
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];

        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_trading/add_ar_trading',$res);
        $this->load->view('base/footer_v');
      }

      public function get_inv_receipt(){
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $data['ic'] = $this->ar_m->get_inv($compcode);
        $net = $this->ar_m->get_code_nat($compcode);
        $ar_arlt = $this->ar_m->get_code_ar_arlt($compcode);
        $ar_sov = $this->ar_m->get_ar_sov($compcode);
        $ar_rev_sale = $this->ar_m->get_ar_rev_sale($compcode);
        foreach ($ar_rev_sale as $key_vat => $date_vat) {
            $data['ar_rev_sale_code'] = $date_vat->act_code;
            $data['ar_rev_sale_name'] = $date_vat->act_name;
        }
        foreach ($ar_sov as $key_net => $data_not_vat) {
            $data['ar_sov_code'] = $data_not_vat->act_code;
            $data['ar_sov_name'] = $data_not_vat->act_name;
        } 
        foreach ($ar_arlt as $key_net => $data_acc) {
            $data['ar_arlt_code'] = $data_acc->act_code;
            $data['ar_arlt_name'] = $data_acc->act_name;
        }

        $this->load->view('office/account/ar/ar_trading/inv_modal',$data);
      }

      public function receipt_trading_edit(){
        $art_no = $this->uri->segment(3);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $project_id = $this->uri->segment(3); 
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $res['art_header'] = $this->ar_m->art_header($art_no);
        $res['art_detail'] = $this->ar_m->art_detail($art_no);
        // var_dump($res['art_header']);die();
        $inv_no = $res['art_header'][0]->acc_invno;

        $res['inv_detail'] = $this->ar_m->inv_detail($inv_no);
        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_trading/edit_ar_trading',$res);
        $this->load->view('base/footer_v');
      }

     public function open_prorject_trading(){
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $userid = $session_data['m_id'];
        $res['name'] = $session_data['m_name'];
        $res['depid'] = $session_data['m_depid'];
        $res['dep'] = $session_data['m_dep'];
        $res['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $res['project'] = $session_data['m_project'];
        $res['imgu'] = $session_data['img'];
        $this->load->view('navtail/base_master/header_v',$res);
        $this->load->view('navtail/base_master/tail_v');
        $res['poapprove'] = $session_data['po_approve'];
        $res['pr_project_right'] = $session_data['pr_project_right'];
        $res['getproj'] = $this->ar_m->getproject_user($userid,$projectid);
          if($res['pr_project_right'] =='true'){
        $res['getdep'] = $this->ar_m->getdepartment();
          }else{
        $res['getdep'] = $this->ar_m->getdepart_user($userid,$res['depid']);
          }
        $this->load->view('navtail/navtail_ar_v');
        $this->load->view('office/account/ar/ar_receipt/open_project_receipt_trading',$res);
        $this->load->view('base/footer_v');
    }

    public function inv_detail(){
      $inv_no = $this->uri->segment(3);
      $inv_type = $this->uri->segment(4);
      if ($inv_type == "down") {
        $data['inv_type'] = $inv_type;
        $data['get_inv'] = $this->ar_m->get_inv_detail_ar($inv_no);
        $this->load->view('office/account/ar/ar_down/load_invoice',$data);
      }elseif ($inv_type == "progress") {
        $data['inv_type'] = $inv_type;
        $data['get_inv'] = $this->ar_m->get_inv_detail_ar_progress($inv_no);
        $this->load->view('office/account/ar/ar_down/load_invoice_progress',$data);
      }elseif ($inv_type == "retention"){
        $data['inv_type'] = $inv_type;
        $data['get_inv'] = $this->ar_m->get_inv_detail_ar_retention($inv_no);
        $this->load->view('office/account/ar/ar_down/load_invoice_retention',$data);
      }elseif ($inv_type == "other") {
        $data['inv_type'] = $inv_type;
        $data['get_inv'] = $this->ar_m->get_inv_detail_ar_other($inv_no);
        $this->load->view('office/account/ar/ar_down/load_invoice_other',$data);
      }elseif ($inv_type == "trading") {
        $data['inv_type'] = $inv_type;
        $data['get_inv'] = $this->ar_m->get_inv_detail_ar_trading($inv_no);
        // var_dump($data['get_inv']);
        // die();
        $this->load->view('office/account/ar/ar_down/load_invoice_trading',$data);
      }else{
          echo "Not Font Type";
      }
      
    }

    public function inv_cn($no){
      $inv_no = $this->uri->segment(3);
      $data['get_inv'] = $this->ar_m->get_inv_detail_cn($inv_no);
      $this->load->view('office/account/ar/ar_down/load_invoice_cm',$data);
    }

    public function ar_receipt_trading(){
       $project_id = $this->uri->segment(3);
       var_dump($project_id);

    }

  public function load_ar_forgl(){
    $start = $this->uri->segment(3);
    $stop = $this->uri->segment(4);
    $datatype = $this->uri->segment(5);
    
    $data['start'] = $this->uri->segment(3);
    $data['stop'] = $this->uri->segment(4);
    $data['datatype'] = $this->uri->segment(5);

    
    $data['ap'] = $this->ar_m->load_ar_forgl($start,$stop,$datatype);
    $data['ap2'] = $this->ar_m->load_ar_forgl2($start,$stop,$datatype);

    $this->load->view('office/account/ar/ar_post/table_ar_to_gl',$data);
  }

  public function payment_retention(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $project_id = $this->uri->segment(3);
    $system_code = $this->uri->segment(4);
    $amt_re = $this->ar_m->count_retention($project_id,$system_code,$compcode);
    echo $amt_re;

  }

  public function list_payment_retention(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $project_id = $this->uri->segment(3);
    $system_code = $this->uri->segment(4);
    $data['list'] = $this->ar_m->list_retention($project_id,$system_code,$compcode);
    // var_dump($data['list']);
    // die();
    $this->load->view('office/account/ar/ar_retention/model_retention',$data);
  }

  public function load_certification(){
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $project_code = $this->uri->segment(3);
    $type = $this->uri->segment(4);

    $data['project_code'] = $this->uri->segment(3);
    $data['type'] = $this->uri->segment(4);

    $data['cer'] = $this->ar_m->certification_m($project_code,$type);
    $this->load->view('office/account/ar/ar_progress/load_certification',$data);
  }

  public function certificate_detail(){
    $project_code = $this->uri->segment(3);
    $s_no = $this->uri->segment(4);
    $type = $this->uri->segment(5);

    $data['project_code'] = $this->uri->segment(3);
    $data['s_no'] = $this->uri->segment(4);
    $data['type'] = $this->uri->segment(5);

    $data['cer_d'] = $this->ar_m->certificationdetail_m($project_code,$s_no,$type);


    $this->load->view('office/account/ar/ar_progress/certificate_detail',$data);
  }

    public function d_certificate_detail(){
    $project_code = $this->uri->segment(3);
    $s_no = $this->uri->segment(4);
    $type = $this->uri->segment(5);

    $data['project_code'] = $this->uri->segment(3);
    $data['s_no'] = $this->uri->segment(4);
    $data['type'] = $this->uri->segment(5);

    $data['cer_d'] = $this->ar_m->certificationdetail_m($project_code,$s_no,$type);

  
    $this->load->view('office/account/ar/ar_down/d_certificate_detail',$data);
  }

    public function r_certificate_detail(){
    $project_code = $this->uri->segment(3);
    $s_no = $this->uri->segment(4);
    $type = $this->uri->segment(5);

    $data['project_code'] = $this->uri->segment(3);
    $data['s_no'] = $this->uri->segment(4);
    $data['type'] = $this->uri->segment(5);

    $data['cer_d'] = $this->ar_m->certificationdetail_m($project_code,$s_no,$type);

    $this->load->view('office/account/ar/ar_retention/r_certificate_detail',$data);
  }

  public function ar_edit(){
    $ar_no = $this->uri->segment(3);
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    if ($username=="") {
      redirect('/');
    }
    $project_id = $this->uri->segment(3);
    $userid = $session_data['m_id'];
    $res['name'] = $session_data['m_name'];
    $res['depid'] = $session_data['m_depid'];
    $res['dep'] = $session_data['m_dep'];
    $res['projid'] = $session_data['projectid'];
    $projectid = $session_data['projectid'];
    $res['project'] = $session_data['m_project'];
    $res['imgu'] = $session_data['img'];
    $res['ar_header'] = $this->ar_m->ar_header($ar_no);
    $res['ar_detail'] = $this->ar_m->ar_detail($ar_no);
    // var_dump($res['ar_detail']);
    // die();

    $this->load->view('navtail/base_master/header_v',$res);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_ar_v');
    $this->load->view('office/account/ar/ar_edit',$res);
    $this->load->view('base/footer_v');
  }

  public function ar_receipt_edit(){
    $re_no = $this->uri->segment(3);
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    if ($username=="") {
      redirect('/');
    }
    $userid = $session_data['m_id'];
    $res['name'] = $session_data['m_name'];
    $res['depid'] = $session_data['m_depid'];
    $res['dep'] = $session_data['m_dep'];
    $res['projid'] = $session_data['projectid'];
    $projectid = $session_data['projectid'];
    $res['project'] = $session_data['m_project'];
    $res['imgu'] = $session_data['img'];
    $res['re_header'] = $this->ar_m->re_header($re_no);
    $res['re_detail'] = $this->ar_m->re_detail($re_no);
    // var_dump($res['ar_detail']);
    // die();

    $this->load->view('navtail/base_master/header_v',$res);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_ar_v');
    $this->load->view('office/account/ar/ar_receipt_edit',$res);
    $this->load->view('base/footer_v');

  }

  public function ar_receiving_edit(){
    $rl_no = $this->uri->segment(3);
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    if ($username=="") {
      redirect('/');
    }
    $userid = $session_data['m_id'];
    $res['name'] = $session_data['m_name'];
    $res['depid'] = $session_data['m_depid'];
    $res['dep'] = $session_data['m_dep'];
    $res['projid'] = $session_data['projectid'];
    $projectid = $session_data['projectid'];
    $res['project'] = $session_data['m_project'];
    $res['imgu'] = $session_data['img'];
    // $res['rl_header'] = $this->ar_m->rl_header($rl_no);
    // $res['rl_detail'] = $this->ar_m->rl_detail($rl_no);
    // var_dump($res['ar_detail']);
    // die();

    $this->load->view('navtail/base_master/header_v',$res);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_ar_v');
    $this->load->view('office/account/ar/ar_receiving_edit',$res);
    $this->load->view('base/footer_v');
  }
}
