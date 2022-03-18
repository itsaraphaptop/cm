<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ap extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model("datastore_m");
            $this->load->model("ap_m");
        }

        public function main_index()
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
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/main_index');
          $this->load->view('base/footer_v');
        }

        public function ap_main()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username == "") {
            redirect('/');
          }
          $da['name'] = $session_data['m_name'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $projectid = $session_data['projectid'];
          $userid = $session_data['m_id'];
          $projectid = $session_data['projectid'];
          $da['imgu'] = $session_data['img'];
          $dd['approve'] = $session_data['approve'];
          $dd['pr_project_right'] = $session_data['pr_project_right'];
          $res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
          if ($dd['pr_project_right'] == 'true') {
            $res['getdep'] = $this->datastore_m->getdepartment();
          } else {

            $res['getdep'] = $this->datastore_m->getdepart_user($userid, $da['depid'],$compcode);
          }
          $this->load->view('navtail/base_master/header_v', $da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v', $dd);
          $this->load->view('office/account/ap/apv/open_project_v', $res);
          // $this->load->view('office/account/ap/apv/new_apv_v'); 
          $this->load->view('base/footer_v');
        }

        public function ap_main_pro()
        {
          $proid = $this->uri->segment(3);
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
          $data['proid'] = $proid;

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/apv/new_apv_v');
          $this->load->view('base/footer_v');
        }
        
        public function ap_main_down()
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
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_down/ap_main_d');
          $this->load->view('base/footer_v');
        }

        public function ap_main_reten()
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
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_retention/ap_main_t');
          $this->load->view('base/footer_v');
        }

        public function ap_main_bill()
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
          $this->load->model('ap_m');
          $data['rep'] = $this->ap_m->ap_bills();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_bill/ap_main_bill');
          $this->load->view('base/footer_v');
        }

        public function ret_bill()
        {
          $no = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $deduct = $this->uri->segment(5);
          $data['deduct']=$deduct;
          $data['no']=$no;
          $data['type']=$type;
          $data['de'] = $this->ap_m->ap_bill_de($no);
          $data['he'] = $this->ap_m->ap_bill_he($no);
          $this->load->view('office/account/ap/ap_bill/ret_bill_v',$data);
        }

        public function ret_bill2()
        {
          $data['de'] = $this->ap_m->ap_bills();
            $this->load->view('office/account/ap/ap_bill/ret_bill_v2',$data);
        }

        public function recaps_bill()
        {
          $no = $this->uri->segment(3);
          $data['no']=$no;
          $data['recaps'] = $this->ap_m->ap_bill_aps($no);
          $data['recaps2'] = $this->ap_m->ap_bill_aps2($no);
            $this->load->view('office/account/ap/ap_reduce_aps/load_crdr_recaps',$data);
        }


        public function rec_apo()
        {
          $no = $this->uri->segment(3);
          $data['no']=$no;
          $data['res'] = $this->ap_m->rec_apo($no);
            $this->load->view('office/account/ap/ap_reduce_apo/load_crdr_recapo',$data);
        }

        public function apv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];

          $data['compimg'] = $this->datastore_m->companyimg();
          $this->load->view('office/account/ap/apv/new_apv_v',$data);
        }
        public function openpo()
        {
          $proid = $this->uri->segment(3);
          $data['openpo'] = $this->ap_m->openpo($proid);
            $this->load->view('office/account/ap/apv/modal_po_receipt_v',$data);
        }


        public function load_modal_loi()
        {
          $data['loadloi'] = $this->ap_m->receive_loi();
          $this->load->view('office/account/ap/aps/load_modal_loi_v',$data);
        }
        public function load_meterial()
        {
          $pono = $this->uri->segment(3);
          $array_po_no = $this->input->post("array");
          $data['poitem'] = $this->ap_m->retrive_poi($pono,$array_po_no);
          $this->load->view('office/account/ap/apv/load_material_v2',$data);
        }
      
         public function load_crdr_edit()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $vchno = $this->uri->segment(3);
          $data['vchno'] = $this->uri->segment(3);
          $data['vendid'] = $this->uri->segment(4);
          $data['apvgl'] = $this->ap_m->ap_gl($vchno,$compcode);
          $this->load->view('office/account/ap/apv/load_crdr_edit_v',$data);

        }
        public function edit_apv()
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
          $apvno = $this->uri->segment(3);
          $data['vendid'] = $this->uri->segment(4);
          $data['editapv'] = $this->ap_m->geteditapv($apvno);
          $data['apvmatitem'] = $this->ap_m->geteditapv_i($apvno);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/apv/edit_apv_v',$data);
          $this->load->view('base/footer_v');

        }
        public function delapv()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $docno = $this->uri->segment(3);
          $data = array(
            'apv_status' => "del"
            );
          $this->db->where('apv_code',$docno);
          $q = $this->db->update('apv_header',$data);
          if ($q) {
            redirect('ap/all_apv');
          }
        }
        public function print_apv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $apvno = $this->uri->segment(3);
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
           $data['compimg'] = $this->ap_m->companyimgbycompcode($compcode);
          $da['editapv'] = $this->ap_m->geteditapv($apvno);
          $da['apvmatitem'] = $this->ap_m->geteditapv_i($apvno);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_print_v');
          $this->load->view('office/account/ap/apv/report/apv_report_v',$da);

          $this->load->view('base/footer_v');
        }
        public function open_aps()
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
          $data['compcode'] = $session_data['compcode'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/aps/new_aps_v');
          $this->load->view('base/footer_v');
        }
        public function edit_aps()
        {
          $apscode = $this->uri->segment(3);
          $lono =  $this->uri->segment(4);
          $period =  $this->uri->segment(5);
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
          $data['compcode'] = $session_data['compcode'];
          $data['apsh'] = $this->ap_m->getaps($apscode,$compcode);
          $data['apsloi'] = $this->ap_m->load_aps_loip($lono,$period);
          $data['apsgl'] = $this->ap_m->aps_gl($apscode);
          $this->load->view('office/account/ap/aps/load_aps_period_v',$data);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/aps/edit_aps_v');
          $this->load->view('base/footer_v');
        }
        public function load_aps_period()
        {
          $lono = $this->uri->segment(3);
          $data['apsloi'] = $this->ap_m->load_aps_loi($lono);
          $this->load->view('office/account/ap/aps/load_aps_period_v',$data);
        }
        public function new_pv_other()
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
          $data['compcode'] = $session_data['compcode'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/pv_other/new_pv_other_v');
          $this->load->view('base/footer_v');
        }
        public function edit_pv_other()
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
          $data['compcode'] = $session_data['compcode'];
          $id = $this->uri->segment(3);
          $data['res'] = $this->ap_m->edit_pv_other($id);
          $data['resi'] = $this->ap_m->load_pv_detail_other($id);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/pv_other/edit_pv_other_v');
          $this->load->view('base/footer_v');
        }

        public function open_apo()
        {
          $this->load->view('office/account/ap/apo/new_apo_v');
        }
        public function modal_pettycash()
        {
            $session_data = $this->session->userdata('sessed_in');
          $data['compcode'] = $session_data['compcode'];
          $data['pettycash'] = $this->ap_m->getallpettycash();
          $this->load->view('office/account/ap/apo/modal_pettycash_v',$data);
        }
        public function load_table_pettycash()
        {
          $memid = $this->uri->segment(3);
          $data['compimg'] = $this->datastore_m->companyimg();
            $data['pettycash'] = $this->ap_m->getpettycashid($memid);
            $this->load->view('office/account/ap/apo/table_pettycash_v',$data);
        }
        public function load_table_add_pettycash()
        {
          $memid = $this->uri->segment(3);
          $data['compimg'] = $this->datastore_m->companyimg();
            $data['pettycash'] = $this->ap_m->getpettycashid($memid);
            $this->load->view('office/account/ap/pv_other/load_detail_add_pettycash_v',$data);
        }
        public function load_table_filterby_advname_pettycash()
        {
          $memid = $this->uri->segment(3);
          $advname = $this->uri->segment(4);
          $data['compimg'] = $this->datastore_m->companyimg();
            $data['pettycash'] = $this->ap_m->getpettycashadvto($memid,$advname);
              $this->load->view('office/account/ap/apo/table_pettycash_v',$data);
        }
        public function load_pettycash_detail()
        {
          $id = $this->uri->segment(3);
          $data['resi'] = $this->ap_m->getpettycash_d($id);
          $this->load->view('office/account/ap/apo/load_pettycashdetail_v',$data);
        }
        public function print_apo()
        {
          $session_data = $this->session->userdata('sessed_in');
          $apono = $this->uri->segment(3);
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
           $data['compimg'] = $this->ap_m->companyimgbycompcode($compcode);
          $data['editapo'] = $this->ap_m->geteditapo($apono,$compcode);
          $data['apoitem'] = $this->ap_m->getapo_d($apono,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_print_v');
          $this->load->view('office/account/ap/apo/report/apo_report_v');

          $this->load->view('base/footer_v');
        }
        public function print_apopv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $apono = $this->uri->segment(3);
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
           $data['compimg'] = $this->ap_m->companyimgbycompcode($compcode);
          $data['editapo'] = $this->ap_m->geteditapopv($apono,$compcode);
          // $data['apoitem'] = $this->ap_m->getapo_dpv($apono,$compcode);
          $res = $this->ap_m->getapo_dpv($apono,$compcode);
          foreach ($res as  $value) {
            $tot = $value->total;
          }
          // $this->load->view('navtail/base_master/headerprint_v',$data);
          // $this->load->view('navtail/base_master/tail_v');
          // $this->load->view('navtail/navtail_print_v');
          $dat = $this->ap_m->getapo_dp($apono,$compcode);
          $total = 0;
          foreach ($dat as $ke) {
            $total = $total+$ke->doci_netamt;
          }
            if ($tot<=10) {
               $data['apoitem'] = $this->ap_m->getapo_dp($apono,$compcode);
                $this->load->view('office/account/ap/pv_other/apo_report_master_v',$data);
            }else{
          $v = array_chunk($dat,10);
          $countnum = count($v);

          foreach($v as $key => $val)
          {
            if($key == 0)
            {
              $data['apoitem'] = $val;
              $data['total2'] = $total;
              $data['dat'] = $tot;
            $this->load->view('office/account/ap/pv_other/apo_report_v',$data);
            // foreach ($val as $key => $v) {
            //   echo "<p>".$v->doci_pcno."</p>";
            // }

            }elseif($key == 1){
              $data['key']= 1;
              // $data['dd'] = $key;
              $data['apoitem'] = $val;
              $data['dat'] = $tot;
              $data['total2'] = $total;
              $this->load->view('office/account/ap/pv_other/apo_report2_v',$data);
              // foreach ($val as $key => $v) {
              //   echo "<p>".$v->doci_pcno."</p>";
              // }
            }elseif($key == 2){
              $data['key']= 2;
              // $data['dd'] = $key;
              $data['apoitem'] = $val;
              $data['dat'] = $tot;
              $data['total2'] = $total;
              $this->load->view('office/account/ap/pv_other/apo_report_2_v',$data);
              // foreach ($val as $key => $v) {
              //   echo "<p>".$v->doci_pcno."</p>";
              // }
            }elseif($key == 3){
              $data['key']= 3;
              // $data['dd'] = $key;
              $data['apoitem'] = $val;
              $data['dat'] = $tot;
              $data['total2'] = $total;
              $this->load->view('office/account/ap/pv_other/apo_report_3_v',$data);
              // foreach ($val as $key => $v) {
              //   echo "<p>".$v->doci_pcno."</p>";
              // }
            }elseif($key == 4){
              $data['key']= 4;
              // $data['dd'] = $key;
              $data['apoitem'] = $val;
              $data['dat'] = $tot;
              $data['total2'] = $total;
              $this->load->view('office/account/ap/pv_other/apo_report_4_v',$data);
              // foreach ($val as $key => $v) {
              //   echo "<p>".$v->doci_pcno."</p>";
              // }
            }
          }

          // $this->load->view('office/account/ap/pv_other/apo_report_v',$data);
              }
          // $this->load->view('base/footer_v');
        }

         public function print_approveapvpv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $apono = $this->uri->segment(3);
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
          $data['compimg'] = $this->ap_m->companyimgbycompcode($compcode);
          $data['editapo'] = $this->ap_m->geteditapopv($apono,$compcode);
          $data['apoitem'] = $this->ap_m->getapo_dpv($apono,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_print_v');
          $this->load->view('office/account/ap/apv/report/apv_pv_report_v');

          $this->load->view('base/footer_v');
        }
        public function ap_list()
        {
          $session_data = $this->session->userdata('sessed_in');
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
          $data['res'] = $this->ap_m->getap_union();
          $data['res'] = $this->ap_m->get_ap_archive();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/ap_archive_v');

          $this->load->view('base/footer_v');
        }
         public function ap_pv_list()
        {
          $session_data = $this->session->userdata('sessed_in');
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
          $data['res'] = $this->ap_m->getpv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/ap_archive_pv_v');

          $this->load->view('base/footer_v');
        }
        public function apv_approve()
        {
          $session_data = $this->session->userdata('sessed_in');
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
          $data['gvender'] = $this->ap_m->get_vender();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/apv/approve_apv_v',$data);
          $this->load->view('base/footer_v');
        }
        public function approve_apv_form()
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
          $data['res'] = $this->ap_m->getapv_approve_byvender($vendercode,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/apv/approve_apv_form_v');
          $this->load->view('base/footer_v');
        }
        public function edit_approvr_apv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $vendercode = $this->uri->segment(3);
          $data['pvno'] = $this->uri->segment(4);
          $id = $this->uri->segment(4);
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
          // $data['res'] = $this->ap_m->getapv_approve_byvender($vendercode,$compcode);
          //$data['resi'] = $this->ap_m->load_pv_detail_other($id);
          $data['res'] = $this->ap_m->edit_pv_other($id);
          $data['resi'] = $this->ap_m->load_pv_detail_other($id);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/apv/edit_approve_apv_form_v');
          $this->load->view('base/footer_v');
        }
        public function edit_approve_aps()
        {
          $session_data = $this->session->userdata('sessed_in');
          $vendercode = $this->uri->segment(3);
          $data['pvno'] = $this->uri->segment(4);
          $id = $this->uri->segment(4);
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
          // $data['res'] = $this->ap_m->getapv_approve_byvender($vendercode,$compcode);
          //$data['resi'] = $this->ap_m->load_pv_detail_other($id);
          $data['res'] = $this->ap_m->edit_pv_other($id);
          $data['resi'] = $this->ap_m->load_pv_detail_other($id);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/aps/edit_approve_aps_form_v');
          $this->load->view('base/footer_v');
        }
        public function apo_approve()
        {
          $session_data = $this->session->userdata('sessed_in');
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
          $data['res'] = $this->ap_m->getapproveapo($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/apo/approve_apo_list_v');
          $this->load->view('base/footer_v');
        }
        public function aps_approve()
        {
          $session_data = $this->session->userdata('sessed_in');
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
          $data['res'] = $this->ap_m->load_approve_aps($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/aps/approve_aps_list_v');
          $this->load->view('base/footer_v');
        }
        public function aps_approve_form()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          $venderid = $this->uri->segment(3);
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
          $data['res'] = $this->ap_m->load_pv_aps($venderid,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/aps/pv_aps_form_v');
          $this->load->view('base/footer_v');
        }
        public function modal_apv_approve()
        {
          $session_data = $this->session->userdata('sessed_in');
          $vendercode = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $data['res'] = $this->ap_m->getapv_approve_byvender($vendercode,$compcode);

          $this->load->view('office/account/ap/apv/modal_apv_approve_v',$data);
        }
        public function modal_aps_approve()
        {
          $session_data = $this->session->userdata('sessed_in');
          $vendercode = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $data['res'] = $this->ap_m->getaps_approve_byvender($vendercode,$compcode);

          $this->load->view('office/account/ap/aps/modal_apv_approve_v',$data);
        }
         public function modal_load_apv_approve()
        {
          $session_data = $this->session->userdata('sessed_in');
          $vendercode = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $data['res'] = $this->ap_m->getapv_approve_byvender($vendercode,$compcode);

          $this->load->view('office/account/ap/apv/load_modal_apv_approve_v',$data);
        }

        public function approve_apo_form()
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
          $data['res'] = $this->ap_m->getapo_approve_byvender($vendercode,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/apo/approve_apo_form_v');
          $this->load->view('base/footer_v');
        }
        public function modal_apo_approve()
        {
          $session_data = $this->session->userdata('sessed_in');
          $vendercode = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $data['res'] = $this->ap_m->getapo_approve_byvender($vendercode,$compcode);

          $this->load->view('office/account/ap/apo/modal_apo_approve_v',$data);
        }

        public function chq_prepair()
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
          // $data['res'] = $this->ap_m->getapo_approve_byvender($vendercode,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/cheque/cheque_v');
          $this->load->view('base/footer_v');
        }
        public function cash_prepair()
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
          // $data['res'] = $this->ap_m->getapo_approve_byvender($vendercode,$compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/cheque/cash_v');
          $this->load->view('base/footer_v');
        }

        public function all_apv()
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
          $data['res'] = $this->ap_m->getapv($compcode);
          $data['all'] = $this->ap_m->getapv_all($compcode);
          $data['ope'] = $this->ap_m->getapv_open($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/apv/archive_apv_v');
          $this->load->view('base/footer_v');
        }

        public function post_to_gl_system()
        {
          $session_data = $this->session->userdata('sessed_in');
          //$vendercode = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          //$data['res'] = $this->ap_m->getapv_approve_byvender($vendercode,$compcode);
          //$data['getcase1']=$this->ap_active->retrieve_ap();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/ap_post_gl');
          $this->load->view('base/footer_v');
        }

        public function ptgls_table()
        {

          $session_data = $this->session->userdata('sessed_in');
          //$vendercode = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $yearsel=$this->uri->segment(3);
          $period=$this->uri->segment(4);
          $typedata=$this->uri->segment(5);
          $vastart = $this->uri->segment(6);
          $vaend = $this->uri->segment(7);
          $dstart = $this->uri->segment(8);
          $dend= $this->uri->segment(9);
          $cc = $this->uri->segment(10);
          $data['res'] = $this->ap_m->getyears($yearsel,$period,$typedata,$vastart,$vaend,$dstart,$dend,$cc);
          $data['sum'] = $this->ap_m->getsum($yearsel,$period,$typedata,$vastart,$vaend,$dstart,$dend,$cc);
          $this->load->view('office/ap/ptgls_table_v',$data);
        }

        // public function GLtransY()
        // {
        //   $session_data = $this->session->userdata('sessed_in');
        //   //$vendercode = $this->uri->segment(3);
        //   $username = $session_data['username'];
        //   $data['user'] = $session_data['m_name'];
        //   $compcode = $session_data['compcode'];
        //   $userid = $session_data['m_id'];
        //   $data['name'] = $session_data['m_name'];
        //   $data['depid'] = $session_data['m_depid'];
        //   $data['dep'] = $session_data['m_dep'];
        //   $data['projid'] = $session_data['projectid'];
        //   $projectid = $session_data['projectid'];
        //   $data['project'] = $session_data['m_project'];
        //   $data['imgu'] = $session_data['img'];
        //   //$data['res'] = $this->ap_m->getapv_approve_byvender($vendercode,$compcode);
        //   //$data['getcase1']=$this->ap_active->retrieve_ap();
        //   // $this->load->view('navtail/base_master/header_v',$data);
        //   // $this->load->view('navtail/base_master/tail_v');
        //   $this->load->view('office/ap/glspost_v',$data);
        //   // $this->load->view('base/footer_v');
        //
        // }

        public function gl_trantb()
        {
                    $session_data = $this->session->userdata('sessed_in');
                    //$vendercode = $this->uri->segment(3);
                    $username = $session_data['username'];
                    $data['user'] = $session_data['m_name'];
                    $compcode = $session_data['compcode'];
                    $userid = $session_data['m_id'];
                    $data['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $data['project'] = $session_data['m_project'];
                    $data['imgu'] = $session_data['img'];
                    $yearsel=$this->uri->segment(3);
                    $period=$this->uri->segment(4);

                    $data['run'] = $this->ap_m->getgln($yearsel,$period);
                    $data['sum'] = $this->ap_m->getsumtr($yearsel,$period);
                    $this->load->view('office/ap/glspost_v',$data);
          // $data['run'] = $this->ap_m->getgln($yearsel,$period);
          // $this->load->view('office/ap/glspost_v',$data);
        }

        public function report_ap()
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
          $apvno = $this->uri->segment(3);
          $data['vendid'] = $this->uri->segment(4);
          $data['editapv'] = $this->ap_m->geteditapv($apvno);
          $data['apvmatitem'] = $this->ap_m->geteditapv_i($apvno);
          $data['apglwhere'] = $this->ap_m->apglwhere($apvno);

          $this->load->view('office/account/ap/apv/report/report_av',$data);
          $this->load->view('base/footer_v');
        }
        public function all_aps()
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
          $data['res'] = $this->ap_m->getapv($compcode);
          $data['aps'] = $this->ap_m->aps_all();


          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/aps/archive_aps_v');
          $this->load->view('base/footer_v');
        }

        public function report_aps()
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
          $aps_code = $this->uri->segment(3);
          $aps_lono = $this->uri->segment(4);
          $aps_period = $this->uri->segment(5);
          $data['reportaps'] = $this->ap_m->report_aps($aps_code,$aps_lono,$aps_period);



          $this->load->view('office/account/ap/aps/report/report_aps',$data);
          $this->load->view('base/footer_v');
        }
        public function open_billsubc()
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
          $data['compcode'] = $session_data['compcode'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pr_v');
          $this->load->view('office/account/ap/aps/bill_subcon_v');
          $this->load->view('base/footer_v');
        }



        public function open_bill()
        {
          $data['reportaps'] = $this->ap_m->ap_bill();
          $this->load->view('office/account/ap/ap_bill/modal_bill_v',$data);
        }
   
        public function rec_aps()
        {
          $data['aps'] = $this->ap_m->rec_bill();
            $this->load->view('office/account/ap/ap_reduce_aps/modal_receipt_recaps',$data);
        }


        public function lessother(){
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
          $data['compcode'] = $session_data['compcode'];
          $data['de'] = $this->ap_m->ap_less_other();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_master_v');
          $this->load->view('office/account/ap/aps/lessother');
          $this->load->view('base/footer_v');
        }

        public function progress_bill()
        {
          $no = $this->uri->segment(3);
          $data['no']=$no;
          $data['de'] = $this->ap_m->ap_bill_de($no);
            $this->load->view('office/account/ap/ap_bill/progress_bill_v',$data);
        }

        public function less_bill()
        {
          $no = $this->uri->segment(3);
          $data['no']=$no;
          $data['head'] = $this->ap_m->less_other($no);
            $this->load->view('office/account/ap/ap_bill/less_bill_v',$data);
        }

        public function tax_bill()
        {
          $no = $this->uri->segment(3);
          $data['no']=$no;
          $data['de'] = $this->ap_m->ap_bill_de($no);
            $this->load->view('office/account/ap/ap_bill/tax_bill_v',$data);
        }
        
        public function tax_list($ap_code)
        {
          $session = $this->session->userdata('sessed_in');
          $this->db->select('*');
          $this->db->from('ap_tax');
          $this->db->join('vender', 'vender.vender_code = ap_tax.vender_id');
          $this->db->where('ap_code', $ap_code);
          $query = $this->db->get();

          if($query->num_rows() > 0){
            $data['tax_lists'] = $query->result();
          }else{
            $data['tax_lists'] = [];
          }
  
          $this->load->view('office/account/ap/tax_list',$data);
        }

        public function openpor()
        {
          $data['apv'] = $this->ap_m->edit_apvcn();
          $data['apd'] = $this->ap_m->edit_apdcn();
          $data['apr'] = $this->ap_m->edit_aprcn();
          // echo '<pre>';
          // print_r($data['apv']);
          // print_r($data['apd']);
          // print_r($data['apr']);
          // die();
          $this->load->view('office/account/ap/ap_reduce_apv/modal_po_receipt_rec',$data);
        }

        public function load_crdr()
        {
          $array = $this->input->post("array");
          $vatamt = $this->input->post("vatamt");
          $netamt = $this->input->post("netamt");
          $down = $this->input->post("downn");
          $reten = $this->input->post("retenn");
           $pono = $this->uri->segment(3);
          // var_dump($array);
           // echo "<pre>";
          
              $data = array();
              $data['poitem'] = $this->ap_m->ret_poi($pono,$array);
              $data['poivat'] = $this->ap_m->ret_poi2($pono,$array);
              $data['vatamt'] = $vatamt;
              $data['netamt'] = $netamt;
              $data['down'] = $down;
              $data['reten'] = $reten;
              // var_dump($data['poivat']);
              $data["array"] = $array;
          // foreach ($array as $key => $pono) {
          //     //var_dump($data);
          //     $data["data"][] = $data_sub;
          //     //echo "<br><br><br>";
          // }
          //var_dump($data);
          $data['setup'] = $this->setup_reten_sys();
          $data['no'] = $this->uri->segment(3);
          $data['vendid'] = $this->uri->segment(4);
          
          $this->load->view('office/account/ap/apv/load_crdr_v2',$data);
       }

       public function get_po_deatil($po_no){
       
          $this->db->select("*");
          // $this->db->select("receive_poitem.poi_vatper as vat,project.project_name,receive_po.vendername,receive_po.taxno,receive_po.docode,receive_po.duedate,system.systemname,project.project_id,vender.vender_code,receive_po.term,receive_po.po_reccode,receive_po.po_pono,system.systemcode,system.systemname,receive_po.po_recdate,receive_poitem.poi_vat as tvat,receive_poitem.poi_netamt as amt,receive_po.taxdate as taxdate");

          $this->db->from("receive_po");
          $this->db->join("vender","receive_po.venderid=vender.vender_id");
          $this->db->join("receive_poitem","receive_po.po_reccode=receive_poitem.poi_ref");
          $this->db->join("system","receive_po.system=system.systemcode");
          $this->db->join("project","receive_po.project=project.project_id");
          $this->db->where("receive_po.po_pono",$po_no);
          $this->db->order_by("poi_vatper","DESC");
          $this->db->limit(1);
          // ice
          $res = $this->db->get()->result_array();

          // var_dump($res);
          echo json_encode($res);


        // SELECT receive_poitem.poi_vatper as vat FROM receive_po inner JOIN receive_poitem on(receive_po.po_reccode=receive_poitem.poi_ref) WHERE receive_po.po_pono = "200-0034" ORDER BY poi_vatper DESC limit 1

       }



        public function load_vat()
        {
          $pono = $this->uri->segment(3);
          $downper = $this->uri->segment(4);

          $data['no'] = $pono;
          // $data['poitemvat'] = $this->ap_m->retrive_poi2($pono);
          $array = $this->input->post();
          $data = array();

          foreach ($array['array'] as $key => $value) {
            // $data['poitemvat'][$key] = $this->ap_m->retrive_poi2($value);
            $data['poitemvat'][$key] = array(
              'ver_id'   => $this->get_data_tax('venderid', $value),
              'ver_name' => $this->get_data_tax('vendername', $value),
              // 'tax_id'   => $this->get_data_tax('', $value),
              'vatper'   => $this->get_vatper($value),
              'tax_date' => $this->get_data_tax('taxdate', $value),
              'tax_no'   => $this->get_data_tax('taxno', $value),
              'sum_amt'  => $this->sum_qty_receive($value)
            );
          }
          // sort($data['poitemvat']);
          $data['downper'] = $downper;

          // $output = json_encode($data['poitemvat']);

          // file_put_contents("test_tax",$output);
          // echo '<pre>';
          // print_r($data);die();
          $this->load->view('office/account/ap/apv/load_vat_v2',$data);
        }

        public function get_vatper($poi_ref) 
        {
          $this->db->select('poi_vatper');
          $this->db->from('receive_poitem');
          $this->db->where('poi_ref', $poi_ref);
          $query  = $this->db->get();
          if($query) {
            $res = $query->result()[0]->poi_vatper;
          }else{
            $res = '';
          }
          return $res;
        }
        
        public function get_data_tax($colname, $poi_ref)
        {
          // parent for load_vat
          $this->db->select($colname);
          $this->db->from('receive_po');
          $this->db->where('po_reccode', $poi_ref);
          $query  = $this->db->get();
          if($query) {
            $res = $query->result()[0]->$colname;
          }else{
            $res = '';
          }
          return $res;
          // parent for load_vat7        
        }

        public function sum_qty_receive($poi_ref)
        {
          // parent for load_vat
          $this->db->select('poi_priceunit, poi_receive');
          $this->db->from('receive_poitem');
          $this->db->where('poi_ref', $poi_ref);
          $query = $this->db->get();
          $sum = 0;
          if($query->num_rows() > 0) {
            foreach ($query->result() as $key => $value) {
              $sum += $value->poi_priceunit * $value->poi_receive;
            }
          }
          
          return $sum;
          // parent for load_vat
        }

        public function rec_meterial()
        {
          $pono = $this->uri->segment(3);
          $data['no'] = $pono; 
          $data['poitem'] = $this->ap_m->retrive_poi($pono);
           $this->load->view('office/account/ap/ap_reduce_apv/load_material_rec',$data);
        }

        public function rec_meterialaps()
        {
          $pono = $this->uri->segment(3);
          $data['no'] = $pono; 
          $data['poitem'] = $this->ap_m->ap_bill_aps($pono);
           $this->load->view('office/account/ap/ap_reduce_aps/load_material_recaps',$data);
        }
        
        public function rec_meterial_apo()
        {
          $pono = $this->uri->segment(3);
          $data['no'] = $pono; 
          $data['poitem'] = $this->ap_m->retrive_poi($pono);
           $this->load->view('office/account/ap/ap_reduce_apo/load_material_recapo',$data);
        }
        
        public function rec_crdr()
        {
          
          $data['pono'] = $this->uri->segment(3);
          $data['type'] = $this->uri->segment(4);
          $this->load->view('office/account/ap/ap_reduce_apv/load_crdr_rec',$data);
        }

        public function rec_crdr_apo()
        {
          $pono = $this->uri->segment(3);
          $data['no'] = $pono;
          $data['res'] = $this->ap_m->reduce_apo($pono);
          $this->load->view('office/account/ap/ap_reduce_apo/capo',$data);
        }
    
        public function all_apv_down()
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
          $data['gres'] = $this->ap_m->getapd($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_down/archive_apd_v');
          $this->load->view('base/footer_v');
        }


        public function all_apv_reten()
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
          $data['rres'] = $this->ap_m->getapr();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_retention/archive_apr_v');
          $this->load->view('base/footer_v');
        }


        public function all_bill()
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
          $data['bres'] = $this->ap_m->getbill();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_bill/archive_bill');
          $this->load->view('base/footer_v');
        }



        public function ap_main_editbill()
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
          $data['compcode'] = $session_data['compcode'];
          $data['eapv'] = $this->ap_m->edit_apv();          
          $data['dapd'] = $this->ap_m->getapd();
          $data['rapr'] = $this->ap_m->getapr();
          $data['eaps'] = $this->ap_m->edit_aps();
          $data['eapo'] = $this->ap_m->edit_apo();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_edit',$data);
          $this->load->view('base/footer_v');
        }

        public function ap_reduce_apv()
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
          $data['compcode'] = $session_data['compcode'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_reduce_apv/ap_reduce_apv',$data);
          $this->load->view('base/footer_v');
        }

        public function ap_reduce_aps()
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
          $data['compcode'] = $session_data['compcode'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_reduce_aps/ap_reduce_aps',$data);
          $this->load->view('base/footer_v');
        }

        public function ap_reduce_apo()
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
          $data['compcode'] = $session_data['compcode'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_reduce_apo/ap_reduce_apo',$data);
          $this->load->view('base/footer_v');
        }

        public function openapo()
        {
          $data['apo'] = $this->ap_m->edit_apo();
          $this->load->view('office/account/ap/ap_reduce_apo/modal_receipt_recapo',$data);
        }

        public function openapodetail()
        {
          $dt = $this->uri->segment(3);
          $data['apo'] = $this->ap_m->edit_apo2($dt);
          $this->load->view('office/account/ap/ap_reduce_apo/modal_receipt_recapo2',$data);
        }

        public function openbank()
        {
          $data['gbank'] = $this->ap_m->get_bank();
            $this->load->view('office/account/ap/apv/modal_get_bank',$data);
        }

        public function openall()
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
          $data['compcode'] = $session_data['compcode'];
          $pono = $this->uri->segment(3);
          $data['no'] = $pono;
          $data['gall'] = $this->ap_m->get_all($pono);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/apv/approve_apv_all',$data);
          $this->load->view('base/footer_v');           
        }

        public function bank_name($code_bank)
        {
          $session = $this->session->userdata('sessed_in');
          $this->db->select('bank_name');
          $this->db->from('bank');
          $this->db->where('bank_code', $code_bank);
          $this->db->where('bank.compcode', $session['compcode']);
          $this->db->limit(1);
          $query = $this->db->get();

          if($query->num_rows() >0 ){
            $res = $query->result()[0]->bank_name;
          }else{
            $res = '';
          }
          return $res;
        }

        public function branch_name($code_bank, $branch_code)
        {
          $session = $this->session->userdata('sessed_in');
          $this->db->select('branch_name');
          $this->db->from('bank_branch');
          $this->db->where('bank_code', $code_bank);
          $this->db->where('branch_code', $branch_code);
          $this->db->where('bank_branch.compcode', $session['compcode']);
          $this->db->limit(1);
          $query = $this->db->get();

          if($query->num_rows() >0 ){
            $res = $query->result()[0]->branch_name;
          }else{
            $res = '';
          }
          return $res;
        }

        public function openallmodal()
        {
          
          $vender = $this->uri->segment(3);
          $data['vender'] = $vender; 
          $data['apv'] = $this->ap_m->get_all($vender);
          foreach ($data['apv'] as $key => $apv) {
            $data['apv'][$key]->bank_name = $this->bank_name($apv->bank_code);
            $data['apv'][$key]->branch_name = $this->branch_name($apv->bank_code, $apv->branch_code);
          }
          // echo '<pre>';
          // print_r($data['apv']);die();
          $data['aps'] = $this->ap_m->get_all1($vender);
          $data['apd'] = $this->ap_m->get_all2($vender);
          $data['apr'] = $this->ap_m->get_all3($vender);
          $data['apo'] = $this->ap_m->get_all4($vender);
          $data['cns'] = $this->ap_m->get_cns($vender);
          $data['cnv'] = $this->ap_m->get_cnv($vender);
          $data['cno'] = $this->ap_m->get_cno($vender);
          // print_r($data['cno']);die();
          $this->load->view('office/account/ap/apv/modal_apv_approve_all',$data);
           
        }
        public function showap_approve()
        {
          $code = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
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
          $data['he'] = $this->ap_m->get_ap_approve_he($code);
          $data['de'] = $this->ap_m->get_ap_approve_de($code);
          // echo '<pre>';
          // print_r($data['de']);die();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/apv/showap_approve_v');
          $this->load->view('base/footer_v');
        }
        public function modal_project()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $data['getproj'] = $this->ap_m->getproject();
           $this->load->view('office/account/ap/ap_modal_project_v',$data);
        }

         public function ap_approve_report()
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
          // $data['not'] = $this->ap_m->getchqnot($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/cheque/report_pay');
          $this->load->view('base/footer_v');
        }


        public function work_flow()
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
          $data['compcode'] = $session_data['compcode'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/apv/work_flow',$data);
          $this->load->view('base/footer_v');
        }

        public function ap_cheque_report()
      {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $userid = $session_data['m_id'];
      if ($username=="") {
        redirect('/');
      }
      $code = $this->uri->segment(3);
      $data['code'] = $code;
      $data['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $data['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $data['project'] = $session_data['m_project'];
      $data['imgu'] = $session_data['img'];
      $data['res'] = $this->ap_m->getcheque_m($code);
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('office/account/ap/cheque/ap_cheque_report');
      $this->load->view('base/footer_v');
    }

    public function ap_active_apvnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $data['compcode'] = $session_data['compcode'];
      $data['not'] = $this->ap_m->getapv($data['compcode']);
      $this->load->view('office/account/ap/apv/ap_active_apvnot',$data);

    }

    public function ap_active_apvopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['compcode'] = $session_data['compcode'];
      $data['open'] = $this->ap_m->getapv_open($compcode);
      $this->load->view('office/account/ap/apv/ap_active_apvopen',$data);

    }

    public function ap_active_apvall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['compcode'] = $session_data['compcode'];
      $data['all'] = $this->ap_m->getapv_all($compcode);
      $this->load->view('office/account/ap/apv/ap_active_apvall',$data);

    }

    public function ap_active_apdall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['compcode'] = $session_data['compcode'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getapdall($compcode);
      $this->load->view('office/account/ap/ap_down/ap_active_apdall',$data);
    }

    public function ap_active_apdnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getapd($compcode);
      $this->load->view('office/account/ap/ap_down/ap_active_apdnot',$data);
    }

    public function ap_active_apdopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getapdopen($compcode);
      $this->load->view('office/account/ap/ap_down/ap_active_apdopen',$data);
    }

    public function ap_active_apropen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getapropen($compcode);
      $this->load->view('office/account/ap/ap_retention/ap_active_apropen',$data);
    }

     public function ap_active_aprall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getaprall($compcode);
      $this->load->view('office/account/ap/ap_retention/ap_active_aprall',$data);
    }

     public function ap_active_aprnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getapr($compcode);
      $this->load->view('office/account/ap/ap_retention/ap_active_aprnot',$data);
    }

    public function ap_active_apsnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getapsnot($compcode);
      $this->load->view('office/account/ap/ap_bill/ap_active_apsnot',$data);
    }

    public function ap_active_apsopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getapsopen($compcode);
      $this->load->view('office/account/ap/ap_bill/ap_active_apsopen',$data);
    }

    public function ap_active_apsall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getapsall($compcode);
      $this->load->view('office/account/ap/ap_bill/ap_active_apsall',$data);
    }

    public function ap_active_apoall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getapoall($compcode);
      $this->load->view('office/account/ap/ap_petty/ap_active_apoall',$data);
    }

    public function ap_active_aponot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $data['compcode'] = $session_data['compcode'];
      $data['not'] = $this->ap_m->getaponot($data['compcode']);
      $this->load->view('office/account/ap/ap_petty/ap_active_aponot',$data);
    }

    public function ap_active_apoopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getapoopen($compcode);
      $this->load->view('office/account/ap/ap_petty/ap_active_apoopen',$data);
    }

    public function ap_active_chqopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getchqopen($compcode);
      $this->load->view('office/account/ap/cheque/ap_active_chqopen',$data);
    }

    public function ap_pvopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->chqopen($compcode);
      $this->load->view('office/account/ap/cheque/ap_pvopen',$data);
    }

    public function ap_active_chqnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getchqnot($compcode);
      $this->load->view('office/account/ap/cheque/ap_active_chqnot',$data);
    }

    public function ap_active_chqall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getchqall($compcode);
      $this->load->view('office/account/ap/cheque/ap_active_chqall',$data);
    }

     public function ap_pvapprove_report()
        {
          $session_data = $this->session->userdata('sessed_in');
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
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/cheque/ap_active_report');
          $this->load->view('base/footer_v');
        }

        public function ap_report()
        {
          $session_data = $this->session->userdata('sessed_in');
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
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/cheque/ap_report');
          $this->load->view('base/footer_v');
        }

    public function ap_active_pvnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getpvnot($compcode);
      $this->load->view('office/account/ap/cheque/ap_active_pvnot',$data);
    }

    public function ap_active_pvall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getchqopen($compcode);
      $this->load->view('office/account/ap/cheque/ap_active_pvall',$data);
    }

    public function ap_active_pvopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getpvopen($compcode);
      $this->load->view('office/account/ap/cheque/ap_active_pvopen',$data);
    }

    public function ap_clearapprove_report()
      {
        $session_data = $this->session->userdata('sessed_in');
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
        $data['all'] = $this->ap_m->getclearall($compcode);
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('office/account/ap/cheque/ap_clearapprove_report');
        $this->load->view('base/footer_v');
      }

      public function aps_print()
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
          $this->load->model('ap_m');
          $data['rep'] = $this->ap_m->aps_printwt();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_bill/aps_printwt');
          $this->load->view('base/footer_v');
        }

    public function loadpv()
    {
      $code = $this->uri->segment(3);
      $amt = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['code'] = $code;
      $data['aa'] = $amt;
      $data['open'] = $this->ap_m->get_cheque($code);
      $this->load->view('office/account/ap/cheque/loadpv',$data);
    }
    public function ap_main_v()
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
        $this->load->view('navtail/navtail_ap_v');
        $this->load->view('office/account/ap/main_v');
        //$this->load->view('base/footer_v');
  }

  public function ap_apv_v()
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
        $this->load->view('navtail/navtail_ap_v');
        $this->load->view('office/account/ap/ap_apv_v');
        $this->load->view('base/footer_v');
        }

        public function show_chq_canc()
        {
          $code = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
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
          $data['he'] = $this->ap_m->get_ap_approve_he($code);
          $data['de'] = $this->ap_m->get_ap_approve_de($code);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/apv/showchq_canc');
          $this->load->view('base/footer_v');
        }

        public function ap_edit_apv()
        {
          $code = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $pro_id = $this->uri->segment(6);
          $session_data = $this->session->userdata('sessed_in');
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
          $data['gll'] = $this->ap_m->get_apv_gl($code,$type);
          $data['he'] = $this->ap_m->get_apv_h($code);
          $data['detail'] = $this->ap_m->get_apv_d($code);
          $data['tax'] = $this->ap_m->get_apv_t($code);
          $data['pro_id'] = $pro_id;
          $data['code'] = $this->uri->segment(3);
          $data['type'] = $this->uri->segment(4);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/apv/ap_edit_apv');
          $this->load->view('base/footer_v');
        }

        public function ap_edit_apd()
        {
          $code = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
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
          // Gl Tab 
          // TAX Tab
          // data Header
          $data['amount_check'] = $this->amount_check($code);
          $data['header'] = $this->data_header_down($code);
          // echo '<pre>';
          // print_r($data['header']);die();
          $data['gl_tab'] = $this->gl_tab($code, $type);
          $data['tax_tab'] = $this->tax_tab($code);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_down/apd_edit_v');
          $this->load->view('base/footer_v');
        }

        public function tax_tab($code) {
          $this->db->select('*');
          $this->db->from('ap_down_detail');
          $this->db->where('ap_down_detail.apdi_ref', $code);
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function amount_check($code) {
          $this->db->select('ref_po_id');
          $this->db->from('ap_down_header');
          $this->db->where('apd_code', $code);
          $query1 = $this->db->get();

          if($query1->num_rows() > 0) {
            $po_id = $query1->result()[0]->ref_po_id;
            $this->db->select('down, sumdown');
            $this->db->from('po');
            $this->db->where('po_id', $po_id);
            $query2 = $this->db->get();

            if($query2->num_rows() > 0) {
              $query2->result();
              foreach ($query2->result() as $key => $value) {
                $res = $value->down - $value->sumdown;
              }
            }
          }

          return $res;
        }

        public function date($day) {
          $date1 = str_replace('-', '/', date('Y-m-d'));
          $tomorrow = date('Y-m-d',strtotime($date1 . "+{$day} days"));

          echo $tomorrow;
        }

        public function data_header_down($code) {
          $this->db->select('*');
          $this->db->from('ap_down_header');
          $this->db->join('vender', 'vender.vender_code = ap_down_header.apd_vender');
          $this->db->join('project', 'project.project_id = ap_down_header.apd_project');
          $this->db->where('ap_down_header.apd_code', $code);
          $this->db->limit(1);
          $query = $this->db->get();
          if($query->num_rows() > 0) {
            $res = $query->result()[0];
          }else{
            $res = [];
          }

          return $res;
        }

        public function gl_tab($code, $type) {
          $this->db->select('*');
          $this->db->from('ap_gl');
          $this->db->join('account_total','ap_gl.acct_no = account_total.act_code');
          $this->db->where('vchno', $code);
          $this->db->where('doctype', $type);
          $this->db->order_by('id_apgl', 'ASC');
          $query = $this->db->get();

          if($query->num_rows() > 0 ){
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function ap_edit_apo()
        {
          $code = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
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
          $data['gll'] = $this->ap_m->ed_apo($code);
          $data['he'] = $this->ap_m->ed_apo_h($code);
          $data['gl'] = $this->ap_m->apo_gl($code);
          $data['tax'] = $this->ap_m->get_apd_t($code);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_petty/ap_edit_apo');
          $this->load->view('base/footer_v');
        }

        public function ap_edit_apr()
        {
          $code = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
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
          $data['gll'] = $this->ap_m->get_apr_gl($code,$type);
          $data['amount_check'] = $this->amount_check_ret($code);
          $data['header'] = $this->data_header_ret($code);
          $data['gl_tab'] = $this->gl_tab($code,$type);
          $data['tax_tab'] = $this->tax_tab_apr($code);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_retention/apr_edit_v');
          $this->load->view('base/footer_v');
        }

        public function tax_tab_apr($code) {
          $this->db->select('*');
          $this->db->from('ap_ret_detail');
          $this->db->where('ap_ret_detail.apri_ref', $code);
          $query = $this->db->get();
          if ($query->num_rows() > 0) {
            $res = $query->result();
          }else{
            $res = [];
          }

          return $res;
        }

        public function amount_check_ret($code) {
          $this->db->select('po_id');
          $this->db->from('ap_ret_header');
          $this->db->where('apr_code', $code);
          $query1 = $this->db->get();

          if($query1->num_rows() > 0) {
            $po_id = $query1->result()[0]->po_id;
            $this->db->select('retention, sumretention');
            $this->db->from('po');
            $this->db->where('po_id', $po_id);
            $query2 = $this->db->get();

            if($query2->num_rows() > 0) {
              $query2->result();
              foreach ($query2->result() as $key => $value) {
                $res = $value->retention - $value->sumretention;
              }
            }
          }

          return $res;
        }

        public function data_header_ret($code) {
          $this->db->select('*');
          $this->db->from('ap_ret_header');
          $this->db->join('vender', 'vender.vender_code = ap_ret_header.apr_vender');
          $this->db->join('project', 'project.project_id = ap_ret_header.apr_project');
          $this->db->where('ap_ret_header.apr_code', $code);
          $this->db->limit(1);
          $query = $this->db->get();
          if($query->num_rows() > 0) {
            $res = $query->result()[0];
          }else{
            $res = [];
          }

          return $res;

        }

        public function ap_edit_aps()
        {
          $code = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
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
          // $data['gll'] = $this->ap_m->get_aps_gl($code,$type);
          $data['he'] = $this->ap_m->get_aps_h($code);
          // $data['detail'] = $this->ap_m->get_aps_d($code);
          $data['gl'] = $this->ap_m->tab_gl_aps($code);
          $data['detail'] = $this->ap_m->tab_progress_aps($code);
          $data['tax'] = $this->ap_m->tab_tax_aps($code);
          $data['less'] = $this->ap_m->tab_less_aps($code);
          // var_dump($data['less']);die();
          // $data['tax'] = $this->ap_m->get_apd_t($code);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_bill/aps_edit_v');
          $this->load->view('base/footer_v');
        }
        public function reduce_apv_report()
        {
          $session_data = $this->session->userdata('sessed_in');
          $apvno = $this->uri->segment(3);
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
          $data['all'] = $this->ap_m->companyimgbycompcode($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_reduce_apv/reduce_apv_report');
          $this->load->view('base/footer_v');
        }

    public function ap_reduce_apvnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getapv_reduce($compcode);
      $this->load->view('office/account/ap/ap_reduce_apv/ap_reduce_apvnot',$data);

    }

    public function ap_reduce_apvall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getapv_reduce_all($compcode);
      $this->load->view('office/account/ap/ap_reduce_apv/ap_reduce_apvall',$data);

    }

    public function ap_reduce_apvopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getapv_reduce_open($compcode);
      $this->load->view('office/account/ap/ap_reduce_apv/ap_reduce_apvopen',$data);
    }

    public function cnv_edit_reduce()
    {
      $code = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
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
      // $data['gll'] = $this->ap_m->get_cnv_gl($code,$type);
      // $data['he'] = $this->ap_m->get_cnv_h($code);

      $data['cnv_head'] = $this->ap_m->cnv_head($code, $session_data['compcode']);
      $data['cnv_gl'] = $this->ap_m->cnv_gl($code, $session_data['compcode']);
      $data['cnv_tax'] = $this->ap_m->cnv_tax($code, $session_data['compcode']);
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ap_v');
      $this->load->view('office/account/ap/ap_reduce_apv/cnv_edit_v');
      $this->load->view('base/footer_v');
    }

    public function reduce_aps_report()
    {
      $session_data = $this->session->userdata('sessed_in');
      $apvno = $this->uri->segment(3);
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
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ap_v');
      $this->load->view('office/account/ap/ap_reduce_aps/reduce_aps_report');
      $this->load->view('base/footer_v');
    }

    public function ap_reduce_apsnot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getaps_reduce($compcode);
      $this->load->view('office/account/ap/ap_reduce_aps/ap_reduce_apsnot',$data);

    }
    public function ap_reduce_aps_all()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getaps_reduce_all($compcode);
      $this->load->view('office/account/ap/ap_reduce_aps/ap_reduce_asvall',$data);
    }
    public function ap_reduce_apsopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getaps_reduce_open($compcode);
      $this->load->view('office/account/ap/ap_reduce_aps/ap_reduce_apsopen',$data);
    }

    public function reduce_apo_report()
        {
          $session_data = $this->session->userdata('sessed_in');
          $apvno = $this->uri->segment(3);
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
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/ap_reduce_apo/reduce_apo_report');
          $this->load->view('base/footer_v');
        }
        
    public function ap_reduce_aponot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getapo_reduce($compcode);
      $this->load->view('office/account/ap/ap_reduce_apo/ap_reduce_aponot',$data);
    }

    public function ap_reduce_apoall()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getapo_reduce_all($compcode);
      $this->load->view('office/account/ap/ap_reduce_apo/ap_reduce_apo_all',$data);
    }
    public function ap_reduce_apoopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['all'] = $this->ap_m->getapo_reduce_all($compcode);
      $this->load->view('office/account/ap/ap_reduce_apo/ap_reduce_apoopen',$data);
    }

    public function cns_edit_reduce()
    {
      $code = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
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
      $data['cns_head'] = $this->ap_m->cns_head($code, $session_data['compcode']);
      $data['cns_gl'] = $this->ap_m->cns_gl($code, $session_data['compcode']);
      $data['cns_tax'] = $this->ap_m->cns_tax($code, $session_data['compcode']);

      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ap_v');
      $this->load->view('office/account/ap/ap_reduce_aps/cns_edit_v');
      $this->load->view('base/footer_v');
    }



    public function cno_edit_reduce()
    {
      $code = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
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
      // print_r($code);die();
      // $data['gll'] = $this->ap_m->get_cnv_gl($code,$type);
      // echo '<pre>';
      $data['cno_head'] = $this->ap_m->get_cno_h($code);
      // $data['cno_head'] = $this->ap_m->cno_head($code, $session_data['compcode']);
      $data['cno_de'] = $this->ap_m->cno_detail($code);
      $data['bun'] = array();
      foreach ($data['cno_de'] as $key => $value) {
        $data['bun'][$key] = $this->bun_apgl($code);
      }
      // print_r($data['bun']);die();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ap_v');
      $this->load->view('office/account/ap/ap_reduce_apo/cno_edit_v');
      $this->load->view('base/footer_v');
    }

    public function bun_apgl($code)
    {
      $this->db->select('ap_gl.*, account_total.act_name');
      $this->db->from('ap_gl');
      $this->db->join('account_total', 'account_total.act_code = ap_gl.acct_no');
      $this->db->where('vchno', $code);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        $res = $query->result();
      }else{
        $res = [];
      }
      return $res;
    }

    public function opencno()
    {
      $code = $this->uri->segment(3);
      $data['apo'] = $this->ap_m->edit_cno_rec($code);
        $this->load->view('office/account/ap/ap_reduce_apo/modal_rec_cno',$data);
    }

    public function rec_cno()
    {
      $code = $this->uri->segment(3);
      $data['apo'] = $this->ap_m->edit_cno ($code);                       
      $this->load->view('office/account/ap/ap_reduce_apo/gl_cno',$data);
    }

    public function cnv_open_reduce()
    {
      $code = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
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
      $data['cnv_head'] = $this->ap_m->cnv_head($code, $session_data['compcode']);
      $data['cnv_gl'] = $this->ap_m->cnv_gl($code, $session_data['compcode']);
      $data['cnv_tax'] = $this->ap_m->cnv_tax($code, $session_data['compcode']);
      // echo '<pre>';
      // print_r($data['cnv_tax']);die();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ap_v');
      $this->load->view('office/account/ap/ap_reduce_apv/cnv_open_v');
      $this->load->view('base/footer_v');
    }

    public function get_cnv_tax($code)
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

    public function cns_open_reduce()
    {
      $code = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
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
      $data['gll'] = $this->ap_m->get_cnv_gl($code,$type);
      $data['he'] = $this->ap_m->get_cns_h($code);
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ap_v');
      $this->load->view('office/account/ap/ap_reduce_aps/cns_open_v');
      $this->load->view('base/footer_v');
    }

    public function cno_open_reduce()
    {
      $code = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $session_data = $this->session->userdata('sessed_in');
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
      $data['gll'] = $this->ap_m->get_cnv_gl($code,$type);
      $data['he'] = $this->ap_m->get_cno_h($code);
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_ap_v');
      $this->load->view('office/account/ap/ap_reduce_apo/cno_open_v');
      $this->load->view('base/footer_v');
    }

    public function openproject() {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    if ($username == "") {
      redirect('/');
    }
    $da['name'] = $session_data['m_name'];
    $da['depid'] = $session_data['m_depid'];
    $da['dep'] = $session_data['m_dep'];
    $data['projid'] = $session_data['projectid'];
    $da['project'] = $session_data['m_project'];
    $projectid = $session_data['projectid'];
    $userid = $session_data['m_id'];
    $projectid = $session_data['projectid'];
    $da['imgu'] = $session_data['img'];
    $dd['approve'] = $session_data['approve'];
    $dd['pr_project_right'] = $session_data['pr_project_right'];
    $res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid);
    if ($dd['pr_project_right'] == 'true') {
      $res['getdep'] = $this->datastore_m->getdepartment();
    } else {

      $res['getdep'] = $this->datastore_m->getdepart_user($userid, $da['depid']);
    }
    $this->load->view('navtail/base_master/header_v', $da);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_pr_v', $dd);
    $this->load->view('office/account/ap/apv/open_project_v', $res);
    $this->load->view('base/footer_v');
  }
    public function ap_report_v()
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
        $this->load->view('navtail/navtail_ap_v');
        $this->load->view('office/account/ap/ap_report_view');
        $this->load->view('base/footer_v');
  }

     public function confirm_ap()
      {
        $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username == "") {
            redirect('/');
          }
          $da['name'] = $session_data['m_name'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $projectid = $session_data['projectid'];
          $userid = $session_data['m_id'];
          $projectid = $session_data['projectid'];
          $da['imgu'] = $session_data['img'];
          $dd['approve'] = $session_data['approve'];
          $dd['pr_project_right'] = $session_data['pr_project_right'];
          $data['venders'] = $this->list_vender();
          // $array = array();
          // echo '<pre>';
          // print_r($data['venders']);
          foreach ($data['venders'] as $key => $value) {
            $data['venders'][$key]->num_apv = $this->count_apv($value->vender_code)->num_apv + $this->count_apd($value->vender_code)->num_apd + $this->count_apr($value->vender_code)->num_apr;
            $data['venders'][$key]->num_apo = $this->count_apo($value->vender_code)->num_apo;
            $data['venders'][$key]->num_aps = $this->count_aps($value->vender_code)->num_aps;
            // var_dump($this->count_apo($value->vender_code)->num_apo);
            // var_dump($this->count_aps($value->vender_code)->num_aps);
          }
          // print_r($data['venders']);
          // die();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v', $dd);
          $this->load->view('office/account/ap/approve_ap',$data);
          $this->load->view('base/footer_v');
  }
  public function count_apd($vender_code) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('COUNT("id") as num_apd');
    $this->db->from('ap_down_header');
    $this->db->where('apd_vender', $vender_code);
    $this->db->where('compcode', $session['compcode']);
    $this->db->where('status', 'wait');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      $res = $query->result()[0];
    }else{
      $res = [];
    }

    return $res;
  }

  public function count_apr($vender_code) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('COUNT("id") as num_apr');
    $this->db->from('ap_ret_header');
    $this->db->where('apr_vender', $vender_code);
    $this->db->where('compcode', $session['compcode']);
    $this->db->where('status', 'wait');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      $res = $query->result()[0];
    }else{
      $res = [];
    }

    return $res;
  }

  public function count_apv($vender_code) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('COUNT("apv_id") as num_apv');
    $this->db->from('apv_header');
    $this->db->where('apv_vender', $vender_code);
    $this->db->where('compcode', $session['compcode']);
    $this->db->where('status', 'wait');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      $res = $query->result()[0];
    }else{
      $res = [];
    }

    return $res;
  }
  public function count_apo($vender_code) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('COUNT("ap_id") as num_apo');
    $this->db->from('ap_pettycash_header');
    $this->db->where('ap_vendor', $vender_code);
    $this->db->where('compcode', $session['compcode']);
    $this->db->where('status', 'wait');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      $res = $query->result()[0];
    }else{
      $res = [];
    }

    return $res;
  }
  public function count_aps($vender_code) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('COUNT("aps_id") as num_aps');
    $this->db->from('aps_header');
    $this->db->where('aps_vender', $vender_code);
    $this->db->where('compcode', $session['compcode']);
    $this->db->where('status', 'wait');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      $res = $query->result()[0];
    }else{
      $res = [];
    }

    return $res;
  }

  public function list_vender()
  {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from('vender');
    $this->db->where('vender.compcode', $session['compcode']);
    $query = $this->db->get();
    if($query->num_rows() > 0){
      $res = $query->result();
    }else{
      $res = [];
    }

    return $res;
  }

  public function ap_approve_apv_o_s()
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
        $da['username'] =  $session_data['username'];
        $da['m_id'] = $session_data['m_id'];
        $da['pjcode'] = $this->uri->segment(3);
        $da['pjid'] = $this->uri->segment(4);
        $da['type'] = $this->uri->segment(5);
        $this->load->view('navtail/base_master/header_v',$da);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_ap_v');
        $this->load->view('office/account/ap/ap_approve_apv_o_s');
        $this->load->view('base/footer_v');
  }

  public function podown()
  {
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('po.*, vender.vender_tax, vender.vender_credit, vender.vender_code');
    $this->db->from('po');
    $this->db->join('vender', 'po.po_venderid = vender.vender_id');
    $this->db->where('po.down !=', '0');
    // $this->db->where('po.down', 'po.sumdown');
    $this->db->where('po_approve', 'approve');
    $this->db->where('po.compcode', $session_data['compcode']);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      $data['rows'] = $query->result();
      foreach ($data['rows'] as $key => $value) {
        if ($value->down*1 == $value->sumdown*1) {
          unset($data['rows'][$key]);
        }
      }
    }else{
      $data['rows'] = [];
    }
    // $this->load->view('navtail/base_master/header_v');
    $this->load->view('office/account/ap/ap_down/content_podown', $data);
  }
  
  public function poretention()
  {
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('po.*, vender.vender_tax, vender.vender_credit, vender.vender_code');
    $this->db->from('po');
    $this->db->join('vender', 'po.po_venderid = vender.vender_id');
    $this->db->where('po.retention !=', '0');
    // $this->db->where('po.retention =', 'po.sumretention');
    $this->db->where('po_approve', 'approve');
    $this->db->where('po.compcode', $session_data['compcode']);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      $data['rows'] = $query->result();
      // $data_new = array();
      foreach ($data['rows'] as $key => $value) {
        if ($value->retention*1 == $value->sumretention*1) {
          unset($data['rows'][$key]);
        }
      }
    }else{
      $data['rows'] = [];
    }

    $this->load->view('office/account/ap/ap_down/content_poretention', $data);
  }

  public function set_sys_new() {
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('account_total.act_name, syscode.pac_taxvat_due');
    $this->db->from('syscode');
    $this->db->join('account_total', 'account_total.act_code = syscode.pac_taxvat_due');
    $this->db->limit(1);
    $query = $this->db->get();
    if($query->num_rows() > 0) {
      $res['data'] = $query->result()[0];
    }else{
      $res['data'] = '';
    }
    echo json_encode($res);

  }

  public function set_sys_old() {
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('account_total.act_name, syscode.pac_taxvat_nodue');
    $this->db->from('syscode');
    $this->db->join('account_total', 'account_total.act_code = syscode.pac_taxvat_nodue');
    $this->db->limit(1);
    $query = $this->db->get();
    if($query->num_rows() > 0) {
      $res['data'] = $query->result()[0];
    }else{
      $res['data'] = '';
    }
    echo json_encode($res);

  }
  public function wait_approve($table, $vender_code, $col_vender, $col_status) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($col_vender, $vender_code);
    $this->db->where($col_status, 'wait');
    $this->db->where('compcode', $session['compcode']);
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      $res = $query->result();
    }else{
      $res = [];
    }

    return $res;
  }

  public function get_venderByCode($vender_code)
  {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from('vender');
    $this->db->where('vender_code', $vender_code);
    $this->db->where('compcode', $session['compcode']);
    $this->db->limit(1);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      $res = $query->result()[0];
    }else{
      $res =[];
    }

    return $res;
  }

  public function bank() {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from('bank');
    $this->db->where('compcode', $session['compcode']);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      $res = $query->result();
    }else{
      $res =[];
    }

    return $res;
  }
  public function vender_by_id($vender_code)
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
    $da['username'] =  $session_data['username'];
    $da['m_id'] = $session_data['m_id'];
    $data['vender'] = $this->get_venderByCode($vender_code);
    $data['banks'] = $this->bank();
    $data['apvs'] = $this->wait_approve('apv_header', $vender_code, 'apv_vender', 'status');
    $data['apds'] = $this->wait_approve('ap_down_header', $vender_code, 'apd_vender', 'apd_status');
    $data['aprs'] = $this->wait_approve('ap_ret_header', $vender_code, 'apr_vender', 'status');
    $data['apos'] = $this->wait_approve('ap_pettycash_header', $vender_code, 'ap_vendor', 'status');
    $data['apss'] = $this->wait_approve('aps_header', $vender_code, 'aps_vender', 'status');
    // echo '<pre>';

    foreach ($data['apvs'] as $key => $apv) {
      $data['apvs'][$key]->taxno_con = $this->tax_date($apv->apv_code, 'apv_detail', 'apvi_taxno', 'apvi_ref');
      $data['apvs'][$key]->taxdate_con = $this->tax_date($apv->apv_code, 'apv_detail', 'apvi_taxdate', 'apvi_ref');
    }

    foreach ($data['apds'] as $key => $apd) {
      $data['apds'][$key]->taxno_con = $this->tax_date($apd->apd_code, 'ap_down_detail', 'apdi_tax', 'apdi_ref');
      $data['apds'][$key]->taxdate_con = $this->tax_date($apd->apd_code, 'ap_down_detail', 'apdi_taxdate', 'apdi_ref');
    }

    foreach ($data['aprs'] as $key => $apr) {
      $data['aprs'][$key]->taxno_con = $this->tax_date($apr->apr_code, 'ap_ret_detail', 'apri_tiv', 'apri_ref');
      $data['aprs'][$key]->taxdate_con = $this->tax_date($apr->apr_code, 'ap_ret_detail', 'apri_taxdate', 'apri_ref');
    }

    foreach ($data['apss'] as $key => $aps) {
      $data['apss'][$key]->taxno_con = $this->tax_date($aps->aps_code, 'ap_tax', 'ap_taxno', 'ap_code');
      $data['apss'][$key]->taxdate_con = $this->tax_date($aps->aps_code, 'ap_tax', 'ap_taxdate', 'ap_code');
    }
    // aps_code

    // print_r($data['apvs']);
    // print_r($data['apos']);
    // print_r($data['apss']);
    // die();

    $this->load->view('navtail/base_master/header_v',$da);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_ap_v');
    $this->load->view('office/account/ap/ap_approve', $data);
    $this->load->view('base/footer_v');
  }

  public function tax_date($apv_code, $table, $colsel, $whcol) {
    // param 1 apcode
    // param 2 table name
    // param 3 select column
    // param 4 column where
    $this->db->select($colsel);
    $this->db->from($table);
    $this->db->where($whcol, $apv_code);
    $query = $this->db->get();
    if($query->num_rows() > 0){
      foreach ($query->result() as $key => $date) {
        $data[] = $date->$colsel;
      }
      $res = implode(',', $data);
    }else{
      $res = '';
    }

    return $res;
  }

  public function update_approve() {
    $input = $this->input->post();
    $session = $this->session->userdata('sessed_in');

    $res = array();
    if ($input['type'] == 'apv') {
      $apv_approve = array(
        'status' => 'approve',
        'bank_code' => $input['bank_code'],
        'branch_code' => $input['branch_code'],
        'acc_code' => $input['acc_code'],
        'user_approve' => $session['m_id'],
        'date_approve' => date('Y-m-d H:i:s')
      );
      $this->db->where('apv_id', $input['id']);
      $this->db->where('compcode', $session['compcode']);
      $succ_apv =$this->db->update('apv_header', $apv_approve);
      if($succ_apv) {
        $res['status'] = true;
        $res['message'] = "Approve Success";
        $res['id'] = 'apv'.$input['id'];
      }else{
        $res['status'] = false;
        $res['message'] = "Can't Approve";
      }
    }else if($input['type'] == 'apo') {
      $apo_approve = array(
        'status' => 'approve',
        'bank_code' => $input['bank_code'],
        'branch_code' => $input['branch_code'],
        'acc_code' => $input['acc_code'],
        'user_approve' => $session['m_id'],
        'date_approve' => date('Y-m-d H:i:s')
      );
      $this->db->where('ap_id', $input['id']);
      $this->db->where('compcode', $session['compcode']);
      $succ_apo =$this->db->update('ap_pettycash_header', $apo_approve);
      if($succ_apo) {
        $res['status'] = true;
        $res['message'] = "Approve Success";
        $res['id'] = 'apo'.$input['id'];
      }else{
        $res['status'] = false;
        $res['message'] = "Can't Approve";
      }
    }else if($input['type'] == 'aps') {
      $aps_approve = array(
        'status' => 'approve',
        'bank_code' => $input['bank_code'],
        'branch_code' => $input['branch_code'],
        'acc_code' => $input['acc_code'],
        'user_approve' => $session['m_id'],
        'date_approve' => date('Y-m-d H:i:s')
      );
      $this->db->where('aps_id', $input['id']);
      $this->db->where('compcode', $session['compcode']);
      $succ_aps =$this->db->update('aps_header', $aps_approve);
      if($succ_aps) {
        $res['status'] = true;
        $res['message'] = "Approve Success";
        $res['id'] = 'aps'.$input['id'];
      }else{
        $res['status'] = false;
        $res['message'] = "Can't Approve";
      }
    }else if($input['type'] == 'apd') {
      $apd_approve = array(
        'status' => 'approve',
        'bank_code' => $input['bank_code'],
        'branch_code' => $input['branch_code'],
        'acc_code' => $input['acc_code'],
        'user_approve' => $session['m_id'],
        'date_approve' => date('Y-m-d H:i:s')
      );
      $this->db->where('id', $input['id']);
      $this->db->where('compcode', $session['compcode']);
      $succ_apd =$this->db->update('ap_down_header', $apd_approve);
      if($succ_apd) {
        $res['status'] = true;
        $res['message'] = "Approve Success";
        $res['id'] = 'apd'.$input['id'];
      }else{
        $res['status'] = false;
        $res['message'] = "Can't Approve";
      }
    }else if($input['type'] == 'apr') {
      $apr_approve = array(
        'status' => 'approve',
        'bank_code' => $input['bank_code'],
        'branch_code' => $input['branch_code'],
        'acc_code' => $input['acc_code'],
        'user_approve' => $session['m_id'],
        'date_approve' => date('Y-m-d H:i:s')
      );
      $this->db->where('id', $input['id']);
      $this->db->where('compcode', $session['compcode']);
      $succ_apr =$this->db->update('ap_ret_header', $apr_approve);
      if($succ_apr) {
        $res['status'] = true;
        $res['message'] = "Approve Success";
        $res['id'] = 'apr'.$input['id'];
      }else{
        $res['status'] = false;
        $res['message'] = "Can't Approve";
      }
    }else {
      $res['status'] = false;
      $res['message'] = "Undefined type update";
    }

    echo json_encode($res);
  }
  
  public function branch($bank_code) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from('bank_branch');
    $this->db->where('bank_code', $bank_code);
    $this->db->where('compcode', $session['compcode']);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      $data['rows'] = $query->result();
    }else{
      $data['rows'] = [];
    }

    $this->load->view('office/account/ap/branch_sel', $data);
  }

  public function bank_accountSel($branch_code) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from('bank_account');
    $this->db->where('branch_code', $branch_code);
    $this->db->where('compcode', $session['compcode']);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      $data['rows'] = $query->result();
    }else{
      $data['rows'] = [];
    }

    $this->load->view('office/account/ap/bank_account', $data);
  }

  public function tax_concat($ap_code) {
    $this->db->select('apdi_tax');
    $this->db->from('ap_down_detail');
    $this->db->where('apdi_ref', $ap_code);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      // $res = $query->result();
      $res = array();
      foreach ($query->result() as $key => $value) {
        $res[] = $value->apdi_tax;
      }
    }else{
      $res = [];
    }
    $data = implode($res, ', ');
    return $data;
  }

  public function check_advance($po_no, $less_down) {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from('ap_down_header');
    $this->db->join('po','po.po_pono = ap_down_header.ref_po_code');
    $this->db->where('ap_down_header.ref_po_code', $po_no);
    $this->db->where('ap_down_header.compcode', $session['compcode']);
    $query = $this->db->get();
    $data['less_down'] = $less_down;
    if($query->num_rows() > 0) {
      $data['rows'] = $query->result();

      foreach ($query->result() as $key => $value) {
        $data['rows'][$key]->taxs = $this->tax_concat($value->apd_code);
      }
    }else{
      $data['rows'] = [];
    }
    
    $this->load->view('office/account/ap/check_lessadvance', $data);
  }


  public function less_advance_master() {
    $data['val'] = $this->uri->segment(3);
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('account_total.act_name, syscode.pac_down_apv');
    $this->db->from('syscode');
    $this->db->join('account_total', 'account_total.act_code = syscode.pac_down_apv');
    $this->db->limit(1);
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      $data['row'] = $query->result();
    }else{
      $data['row'] = [];
    }
    // var_dump($data['row']);die();
    $this->load->view('office/account/ap/less_advance_master', $data);
  }

  public function setup_reten_sys() {
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('company.glrap');
    $this->db->from('company');
    $this->db->where('compcode', $session_data['compcode']);
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      $res = $query->result()[0]->glrap;
    }else{
      $res = '';
    }

    return $res;
  }

  public function less_retention_master() {
    $data['val'] = $this->uri->segment(3);
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('account_total.act_name, syscode.pac_ret_apv');
    $this->db->from('syscode');
    $this->db->join('account_total', 'account_total.act_code = syscode.pac_ret_apv');
    $this->db->limit(1);
    $query = $this->db->get();
    $data['setup'] = $this->setup_reten_sys();
    if($query->num_rows() > 0) {
      $data['row'] = $query->result();
    }else{
      $data['row'] = [];
    }
    // var_dump($data['row']);die();
    $this->load->view('office/account/ap/less_retention_master', $data);
  }

  public function limit_downreten($po_no) {
    $po = urlencode($po_no);
    $session_data = $this->session->userdata('sessed_in');
    $this->db->select('down, sumdown, retention, sumretention');
    $this->db->from('po');
    // $this->db->join('ap_down_header', 'ap_down_header.ref_po_code = po.po_no');
    $this->db->where('po_pono', $po_no);
    $this->db->where('compcode', $session_data['compcode']);
    $query = $this->db->get();
    $res = array();
    if($query->num_rows() > 0) {
      $data = $query->result()[0];

      $res['status'] = true;
      $res['down'] = $data->down - $data->sumdown;
      $res['reten'] = $data->retention - $data->sumretention;
      
    }else{
      $res['stats'] = false;
    }

    echo json_encode($res);
  }

  function modal_account($acc_code, $acc_name, $id)
  {
    $session = $this->session->userdata('sessed_in');
    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('compcode', $session['compcode']);
    $query = $this->db->get();

    if ($query->num_rows() >0) {
      $data['rows'] = $query->result();
    }else{
      $data['rows'] = [];
    }

    $data['acc_code'] = $acc_code; 
    $data['acc_name'] = $acc_name; 
    $data['id'] = $id; 

    $this->load->view('office/account/ap/modal_account', $data);
  }
  public function ap_vender_carry()
        {
          $proid = $this->uri->segment(3);
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
          $data['proid'] = $proid;
          $data['apvp'] = $this->get_apvp_con();
          $data['currency'] = $this->get_currency_con(false);
          $data['wt'] = $this->get_wt_con(false);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/vender_carry_v');
          $this->load->view('base/footer_v');
        }
  public function add_vender_carry()
  {
    // $input = $this->input->post();
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $input = $this->input->post();
    $ins = $this->input->post('chkins');
    $upd = $this->input->post('chkupd');
    // echo "<pre>";
    // var_dump($input);die();
      foreach ($input['chkins'] as $key => $value) {
        // var_dump($input['vender_code']);
      // die();
      $insert = array(
          'vender_code' => $input['vender_code'][$key],
          'vender_name' => $input['vender_name'][$key],
          'cn' => $input['cn'][$key],
          'invoice_tax' => $input['invoice_tax'][$key],
          'tax' => $input['tax'][$key],
          'inv_taxdate' => $input['inv_taxdate'][$key],
          'due_date' => $input['due_date'][$key],
          'po_no' => $input['po_no'][$key],
          'data_type' => $input['data_type'][$key],
          'voucher_no' => $input['voucher_no'][$key],
          'voucher_date' => $input['voucher_date'][$key],
          'ac_vender' => $input['ac_vender'][$key],
          'project' => $input['proj'][$key],
          'systemcode' => $input['systemcode'][$key],
          'systemname' => $input['systemname'][$key],
          'currency' => $input['currency'][$key],
          'exchange' => $input['exchange'][$key],
          'amount' => $input['amount'][$key],
          'deduct_material' => $input['deduct_material'][$key],
          'per_avd' => $input['per_avd'][$key],
          'adr_amount' => $input['adr_amount'][$key],
          'amt_after_adv' => $input['amt_after_adv'][$key],
          'per_vat' => $input['per_vat'][$key],
          'vat_amount' => $input['vat_amount'][$key],
          'per_ret' => $input['per_ret'][$key],
          'ret_amount' => $input['ret_amount'][$key],
          'wt_code' => $input['wt_code'][$key],
          'per_wt' => $input['per_wt'][$key],
          'wt_amount' => $input['wt_amount'][$key],
          'net_amount' => $input['net_amount'][$key],
          'remark' => $input['remark'][$key],
          'doc_no' => $input['doc_no'][$key],
          'ap_amt' => $input['ap_amt'][$key],
          'paid_amount' => $input['paid_amount'][$key],
          'compcode' => $compcode,
          'active' => "Y"

        );
        
        $boolen =$this->db->insert('ap_vender_pull', $insert);
      }
      // echo "<pre>";
      // var_dump($insert);die();
      foreach ($input['chkupd'] as $key => $value) {
        // var_dump($input['vender_code']);
      // die();
      $update = array(
          'vender_code' => $input['vender_code_upd'][$key],
          'vender_name' => $input['vender_name_upd'][$key],
          'cn' => $input['cn_upd'][$key],
          'invoice_tax' => $input['invoice_tax_upd'][$key],
          'tax' => $input['tax_upd'][$key],
          'inv_taxdate' => $input['inv_taxdate_upd'][$key],
          'due_date' => $input['due_date_upd'][$key],
          'po_no' => $input['po_no_upd'][$key],
          'data_type' => $input['data_type_upd'][$key],
          'voucher_no' => $input['voucher_no_upd'][$key],
          'voucher_date' => $input['voucher_date_upd'][$key],
          'ac_vender' => $input['ac_vender_upd'][$key],
          'project' => $input['proj_upd'][$key],
          'systemcode' => $input['systemcode_upd'][$key],
          'systemname' => $input['systemname_upd'][$key],
          'currency' => $input['currency_upd'][$key],
          'exchange' => $input['exchange_upd'][$key],
          'amount' => $input['amount_upd'][$key],
          'deduct_material' => $input['deduct_material_upd'][$key],
          'per_avd' => $input['per_avd_upd'][$key],
          'adr_amount' => $input['adr_amount_upd'][$key],
          'amt_after_adv' => $input['amt_after_adv_upd'][$key],
          'per_vat' => $input['per_vat_upd'][$key],
          'vat_amount' => $input['vat_amount_upd'][$key],
          'per_ret' => $input['per_ret_upd'][$key],
          'ret_amount' => $input['ret_amount_upd'][$key],
          'wt_code' => $input['wt_code_upd'][$key],
          'per_wt' => $input['per_wt_upd'][$key],
          'wt_amount' => $input['wt_amount_upd'][$key],
          'net_amount' => $input['net_amount_upd'][$key],
          'remark' => $input['remark_upd'][$key],
          'doc_no' => $input['doc_no_upd'][$key],
          'ap_amt' => $input['ap_amt_upd'][$key],
          'paid_amount' => $input['paid_amount_upd'][$key],
          'compcode' => $compcode,
          'active' => "Y"

        );
        $this->db->where('apvp_id',$input['idrow'][$key]);
        $boolen =$this->db->update('ap_vender_pull', $update);
      }
      // echo "<pre>";
      // var_dump($update);die();

    redirect('ap/ap_vender_carry');
  }
  public function del_apvp($idrow)
  {   
      // var_dump($idrow);die();
      $update = array('active' => 'del');
      $this->db->where('apvp_id',$idrow);
      $boolen = $this->db->update('ap_vender_pull', $update);
      // var_dump($boolen);die();
      $res = array();
      if($boolen)
      {
        $res['status'] = true;
        $res['message'] = "ลบสำเร็จ !!";
      }else{
        $res['status'] = false;
        $res['message'] = "ลบไม่สำเร็จ !!";
      }
      echo json_encode($res);
  }
  public function get_currency_con($status_json = true)
  {
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $data['currency'] = $this->ap_m->get_currency($compcode);
    // echo "<pre>";
    if($status_json == true){
       echo json_encode($data['currency']);
    }else{
      return $data['currency'];
    }
    // var_dump($data['currency']);
  }
  public function get_wt_con($status_json = true)
  {
    $data['wt'] = $this->ap_m->get_wt();
    // echo "<pre>";
    if($status_json == true){
      echo json_encode($data['wt']);
    }else{
      return $data['wt'];
    }
    
    // echo "<pre>";
    // var_dump($data['wt']);
  }

    public function post_ap_to_gl(){
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
          $data['gl_book'] = $this->ap_m->gl_book();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/post_ap_to_gl');
          $this->load->view('base/footer_v');
  }

  public function get_apvp_con()
  {
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $data = $this->ap_m->get_apvp($compcode);
    return $data;
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
    // print_r($res);
  }

    public function load_ap_forgl()
    {
      $start = $this->uri->segment(3);
      $stop = $this->uri->segment(4);
      $datatype = $this->uri->segment(5);
      
      $data['start'] = $this->uri->segment(3);
      $data['stop'] = $this->uri->segment(4);
      $data['datatype'] = $this->uri->segment(5);

      
      $data['ap'] = $this->ap_m->load_ap_forgl($start,$stop,$datatype);
      $data['ap2'] = $this->ap_m->load_ap_forgl2($start,$stop,$datatype);

      $this->load->view('office/account/ap/table_ap_to_gl',$data);
  }

  public function petty_gl($ref_vcho, $ref_pettycash)
  {
    $this->db->select('ap_gl.*, account_total.act_name');
    $this->db->from('ap_gl');
    $this->db->join('account_total', 'ap_gl.acct_no = account_total.act_code');
    $this->db->where('ap_gl.ref_pettycashi_id', $ref_pettycash);
    $this->db->where('ap_gl.vchno', $ref_vcho);
    $this->db->order_by('id_apgl', 'ASC');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      $data['rows'] = $query->result();
    }else{
      $data['rows'] = [];
    }

    // echo json_encode($res);
    $this->load->view('office/account/ap/petty_gl',$data);
  }

  public function del_Tax($col_id,$tax_id, $table) {

    $this->db->where($col_id, $tax_id);
    $status = $this->db->delete($table);
    $res = array();
    if ($status) {
      $res['status']  = true;
      $res['message'] = "Deleted Success ^_^";
    }else {
      $res['status']  = false;
      $res['message'] = "Deleted Unsuccess T^T";
    }

    echo json_encode($res);
  }

}


