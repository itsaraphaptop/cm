<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ap_cheque extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('cheque_m');

        }
        public function newcheque()
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
          $this->load->view('office/account/ap/cheque/ap_pay_chq_v');
          $this->load->view('base/footer_v');
        }

        public function printcheque()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $ref = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];

          $data['print'] = $this->cheque_m->printcheck($ref);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/cheque/print_cheque');
          $this->load->view('base/footer_v');

        }

        public function archivecheque()
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
          $data['che'] = $this->cheque_m->arc_che();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/cheque/archivecheque_v');
          $this->load->view('base/footer_v');
        }


        function report_che()
        {
          $session_data = $this->session->userdata('sessed_in');
          $id = $this->uri->segment(3);
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
          $data['chee'] = $this->cheque_m->report_chequee($id);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/cheque/report_cheque');
          
          $this->load->view('base/footer_v');
        }


        public function apv_ch_approve()
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
          $data['getch'] = $this->cheque_m->get_cheque();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/cheque/apv_ch_approve',$data);
          $this->load->view('base/footer_v');
        }


        public function apv_ch_approve_v()
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
          $data['gcheq'] = $this->cheque_m->chequemodal($pono);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/cheque/apv_ch_approve_v',$data);
          $this->load->view('base/footer_v');
        }

        public function opencheque()
        {
          $data['opench'] = $this->cheque_m->get_cheque();
            $this->load->view('office/account/ap/cheque/modal_cheque',$data);
        }

        public function ap_confirm_cheque()
          { 
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
            try {
              $datav = array(
                'apv_status' => "confirm",
                'apv_pl' => $add['ap_pl']  
                );
                $this->db->where('apv_checkno',$add['ap_code']);
                $this->db->update('apv_header',$datav);

                $datas = array(
                  'aps_status' => "confirm",
                  'aps_pl' => $add['ap_pl'],
                  'aps_wtcode' => $add['ap_wtcode']   
                  );
                $this->db->where('aps_checkno',$add['ap_code']);
                $this->db->update('aps_header',$datas);

                $datad = array(
                  'apd_status' => "confirm",
                  'apd_pl' => $add['ap_pl'] 
                  );
                $this->db->where('apd_checkno',$add['ap_code']);
                $this->db->update('ap_down_header',$datad);

                $datar = array(
                  'apr_status' => "confirm",
                  'apr_pl' => $add['ap_pl'] 
                  );
                $this->db->where('apr_checkno',$add['ap_code']);
                $this->db->update('ap_ret_header',$datar);

                $datap = array(
                  'ap_status' => "confirm",
                  'ap_pl' => $add['ap_pl'] 
                  );
                $this->db->where('ap_checkno',$add['ap_code']);
                $this->db->update('ap_pettycash_header',$datap);

              $dataap = array(
              'ap_status' => "confirm", 
              'aphold_vat' => $add['holdv'],
              'appaid_date' => $add['pdate'],
              'ap_pl' => $add['ap_pl'],  
              );
              $this->db->where('ap_code',$add['ap_code']);
              $this->db->update('ap_cheque_header',$dataap);

              for ($i=0; $i < count($add['tax_no']); $i++) {
                if ($add['tax_no'][$i]!="") {
                $datatax = array(
                'ap_code'    => $add['ap_code'],
                'ap_taxno'   => $add['tax_no'][$i],
                'ap_taxdate' => $add['tax_date'][$i],
                'project_id' => $add['api_project'],
                'vender_id'  => $add['ap_vender'],
                'ap_period'  => $add['period'],
                'ap_year'    => $add['year'],
                // 'ap_type'    => 'apo',
                'ap_amount'  => $add['amount'][$i],
                'ap_vatper'     => $add['percent'][$i],
                'ap_amtvat'     => $add['vatt'][$i],
                'ap_netamt'  => $add['amount'][$i] + $add['vatt'][$i],
                );
                $this->db->insert('ap_tax',$datatax);
              }
                }

            redirect('ap_cheque/apv_ch_approve/');
           } catch (Exception $e) {
               echo $e;
            }
         }

      public function clear_ap()
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
          $data['clap'] = $this->cheque_m->clear_ap();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/cheque/clear_ap',$data);
          $this->load->view('base/footer_v');
        }

      public function receipt_tax()
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
          $data['gcheq'] = $this->cheque_m->clear_ap();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/cheque/receipt_tax',$data);
          $this->load->view('base/footer_v');
        }

        public function openclear()
        { 
          $data['opencl'] = $this->cheque_m->clear_ap();
          $this->load->view('office/account/ap/cheque/modal_clear',$data);
        }


        public function openclear2()
        { 
          $no = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $data['no'] = $no;     
          $data['type'] = $type;       
          $data['opencl2'] = $this->cheque_m->clear_ap2($no,$type);
          $this->load->view('office/account/ap/cheque/gl_clear',$data);
        }



        public function openap2()
        { 

          $no = $this->uri->segment(3);
          $code = $this->uri->segment(4);
          $data['no'] = $no;     
          $data['code'] = $code;         
          $data['openvd'] = $this->cheque_m->chequemodal($no,$code);
            $this->load->view('office/account/ap/cheque/ap_vender',$data);
        }

        public function openaptax()
        { 

          $no = $this->uri->segment(3);
          $data['no'] = $no;             
          $data['openvd'] = $this->cheque_m->chequemodal2($no);
            $this->load->view('office/account/ap/cheque/tax_clear',$data);
        }


        public function opentax()
        { 
          $data['opencltax'] = $this->cheque_m->clear_tax();
            $this->load->view('office/account/ap/cheque/modal_cleartax',$data);        
        }

        public function taxdoc2()
        { 
          $no = $this->uri->segment(3);
           $data['no'] = $no; 
          $data['taxdoc2'] = $this->cheque_m->clear_tax2($no);
            $this->load->view('office/account/ap/cheque/tax_invdoc',$data);
        }


        public function ap_confirm_tax()
          { 
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $code = $this->input->post('code');
          $add = $this->input->post();
            try {
              $datav = array(
              'aphold_vat' => "confirm", 
              );
              $this->db->where('ap_code',$add['ap_no']);
              $this->db->update('ap_cheque_header',$datav);

              for ($i=0; $i < count($add['tax_no']); $i++) {
                if ($add['tax_no'][$i]!="") {
                $datatax = array(
                'ap_code'    => $add['ap_no'],
                'ap_taxno'   => $add['tax_no'][$i],
                'ap_taxdate' => $add['tax_date'][$i],
                'project_id' => $add['api_project'],
                'vender_id'  => $add['ap_vender'],
                'ap_period'  => $add['period'],
                'ap_year'    => $add['year'],
                'ap_amount'  => $add['amount'][$i],
                'ap_vatper'  => $add['percent'][$i],
                'ap_amtvat'  => $add['vatt'][$i],
                'ap_netamt'  => $add['amount'][$i] + $add['vatt'][$i],
                );
                $this->db->insert('ap_tax',$datatax);
                }
              }

            redirect('ap_cheque/receipt_tax/');
           } catch (Exception $e) {
               echo $e;
            }
         }

        public function taxgldoc()
        { 
          $no = $this->uri->segment(3);
          $data['no'] = $no; 
          $data['taxgl'] = $this->cheque_m->taxgldoc($no);
            $this->load->view('office/account/ap/cheque/tax_gldoc',$data);
        }

        public function confirm_vender()
          { 
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $add = $this->input->post();
            $type = $this->input->post('apitype');
            $code = $this->input->post('apino');
            $apid = $this->input->post('apid');
            foreach ($add['ac_drr'] as $key => $value) {
              $data = array(
                'vchno'     => $add['apino'],
                'vchdate'   => $add['ded_vchdate'],
                'doctype'   => 'pvpl',
                'acct_no'   => $add['ac_syscode'][$key],
                'amtdr'     => $add['ac_drr'][$key],
                'amtcr'     => $add['ac_crr'][$key],
                'glyear'    => $add['ded_glyear'],
                'glperiod'  => $add['ded_glperiod'],
                'vendor_id' => $add['vender_id'],
              );
              $this->db->insert('ap_gl', $data);
            }
            // add gl_post_system
            // $status = true;
            // $this->db->trans_begin();
              // for ($i=0; $i < count($add['ac_drr']); $i++) {
              //       $datag = array(
              //         'gl_refcode' => $add['ac_apcode'][$i],
              //         'gl_actcode' => $add['ac_syscode'][$i],
              //         'gl_dr' => $add['ac_drr'][$i],
              //         'gl_cr' => $add['ac_crr'][$i],
              //         'useradd' => $username,
              //         'adddate' => $add['ded_vchdate'],
              //         'gl_date' => $add['ded_vchdate'],
              //         'gl_year' => $add['ded_glyear'],
              //         'gl_period' => $add['ded_glperiod'],
              //         'compcode' => $compcode,
              //         'gl_type' => "PL",
              //         'status'  => "N"
              //       );
              //       $bool_insert = $this->db->insert('gl_post_system',$datag);
              //       if($bool_insert){
                      
              //       }else{
              //         $status = false;
              //         break;
              //       }
              // }
            //   if($status){
            //     $this->db->trans_commit();
            //   }else{
            //     $this->db->trans_rollback();
            //   } 
            // add gl_post_system  
            try {
               $datav = array(
                'apv_status' => "complete",
                );
                $this->db->where('apv_checkno',$code);
                $this->db->update('apv_header',$datav);

                $datas = array(
                  'aps_status' => "complete",
                  );
                $this->db->where('aps_checkno',$code);
                $this->db->update('aps_header',$datas);

                $datad = array(
                  'apd_status' => "complete",
                  );
                $this->db->where('apd_checkno',$code);
                $this->db->update('ap_down_header',$datad);

                $datar = array(
                  'apr_status' => "complete",
                  );
                $this->db->where('apr_checkno',$code);
                $this->db->update('ap_ret_header',$datar);

                $datap = array(
                  'ap_status' => "complete",
                  );
                $this->db->where('ap_checkno',$code);
                $this->db->update('ap_pettycash_header',$datap);
                
                $petty = $this->db->query("SELECT * from ap_pettycash_header where ap_status ='complete' ")->result();
                foreach ($petty as $pety) {
                  $pp = array(
                  'status' => "complete",
                  );
                $this->db->where('docno',$pety->doc_no);
                $this->db->update('pettycash',$pp);
                }
              $datav = array(
              'ap_status' => "complete",
              'ded_datevender' => $add['ded_vchdate'],
              'ded_yearvender' => $add['ded_glyear'],
              'ded_periodvender' => $add['ded_glperiod'],
              // 'cl_date' => $add['cl_date'],
              );
              $this->db->where('ap_code',$code);
              $status = $this->db->update('ap_cheque_header',$datav);
              echo json_encode(["status" => $status]);
            //redirect('ap_cheque/clear_ap/');
           } catch (Exception $e) {
               echo $e;
            }
  
         }

        public function get_project()
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
          $data['gproject'] = $this->cheque_m->get_project();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/cheque/project_ch',$data);
          $this->load->view('base/footer_v');
        }

        public function openstatus()
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
          $data['status'] = $this->cheque_m->get_status($pono);

          $this->load->view('navtail/base_master/header_v', $data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v', $data);
          $this->load->view('office/account/ap/cheque/ch_status',$data);
          $this->load->view('base/footer_v');
        }

        public function chq_cancle2()
          { 
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
            try {
              $datav = array(
                'canc_chqno' => $add['canc_no'],
                'ap_chno' => $add['ch_no'],
                'ap_chnodate' => $add['ch_date'],
                'canc_date' => $add['canc_date'],
                'chq_canc' => 'N',
                'usercanc' => $username,
                );
                $this->db->where('ap_code',$add['code']);
                $this->db->update('ap_cheque_header',$datav);              

            redirect('ap/ap_report/');
           } catch (Exception $e) {
               echo $e;
            }
        }

         public function chq_canc()
          { 
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
            try {
              $datav = array(
                'ap_status' => 'wait',
                );
                $this->db->where('ap_code',$add['code']);
                $this->db->update('ap_cheque_header',$datav);              

            redirect('ap/ap_pvapprove_report/');
           } catch (Exception $e) {
               echo $e;
            }
         }

         public function view_cheque()
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
          $no = $this->uri->segment(3);
          $data['no'] = $no;           
          $data['openvd'] = $this->cheque_m->chequemodal($no);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/ap/cheque/view_conch',$data);
          $this->load->view('base/footer_v');
        }

        public function view_report_certificate()
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
          $this->load->view('office/ap/report/certificate_view',$data);
          $this->load->view('base/footer_v');
        }          
        public function report_certificate()
        {
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_certificate.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function report_certificate_summary()
        {
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_certificate_summary.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function view_contractor_bill()
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
          $this->load->view('office/ap/report/contractor_bill_view',$data);
          $this->load->view('base/footer_v');
        }
        public function report_contact_bill_pro()
        {
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_bill_contact_pro.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function report_contact_bill_ven()
        {
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_bill_contact_ven.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function view_debt_repayment()
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
          $this->load->view('office/ap/report/debt_repayment_view',$data);
          $this->load->view('base/footer_v');
        }
        public function report_debt_repayment_pvpl()
        {
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_debt_repayment_pvpl.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function report_debt_repayment_pro()
        {
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_debt_repayment_pro.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function report_debt_repayment_prodetail()
        {
            
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_debt_repayment_prodetail.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function view_ap_cheque()
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
          $this->load->view('office/ap/report/ap_cheque_view',$data);
          $this->load->view('base/footer_v');
        }
        public function report_ap_cheque()
        {
            $post = $this->input->post('paystatus');
            //session name 
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_ap_cheque.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}&status={$post}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function view_debt_vender()
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
          $this->load->view('office/ap/report/debt_vender_view',$data);
          $this->load->view('base/footer_v');
        }
        public function view_debt_vender_val()
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
          $compcode = $session_data['compcode'];
          $data['vender'] = $this->cheque_m->vender_data($compcode);
          $data['project'] = $this->cheque_m->project_data($compcode);
          $data['system'] = $this->cheque_m->system_data($compcode);
          $data['ap'] = $this->cheque_m->ap_data();
          $data['pl'] = $this->cheque_m->pl_data();
          $data['bank'] = $this->cheque_m->bank_data($compcode);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/debt_vender_val',$data);
          $this->load->view('base/footer_v');
        }
        public function report_debt_vender()
        {
            //post
            $post = $this->input->post();
            $inputvender = $post['vender'];
            $inputpro = $post['pro'];
            $inputsystem = $post['system'];
            $inputbank = $post['bank'];
            $inputchkno1 = $post['chkno1'];
            $inputchkno2 = $post['chkno2'];
            $inputplno1 = $post['plno1'];
            $inputplno2 = $post['plno2'];
            $inputchkdate1 = $post['chkdate1'];
            $inputchkdate2 = $post['chkdate2'];
            $inputcleardate1 = $post['cleardate1'];
            $inputcleardate2 = $post['cleardate2'];
            //where
            $wherevender = "and ap_cheque_header.ap_vender = '$inputvender'";
            if ($inputvender=="") {$wherevender="";}
            $wherepro = "and ap_cheque_detail.api_project = '$inputpro'";if ($inputpro=="") {$wherepro="";}
            $wheresystem = "and systemcode = '$inputsystem'";if ($inputsystem=="") {$wheresystem="";}
            $wherebank = "and bank = '$inputbank'";if ($inputbank=="") {$wherebank="";}

            $wherecode = "";
            if ($inputchkno1!="" and $inputchkno2!="") {
              $wherecode = "and ap_cheque_header.ap_code between '$inputchkno1' and '$inputchkno2'";
            }else if ($inputchkno1=="" and $inputchkno2!="") {
              $wherecode = "and ap_cheque_header.ap_code between '' and '$inputchkno2'";
            }else if($inputchkno1!="" and $inputchkno2==""){
              $wherecode = "and ap_cheque_header.ap_code = '$inputchkno1'";
            }else{}

            $wherepl = "";
            if ($inputplno1!="" and $inputplno2!="") {
              $wherepl = "and ap_cheque_header.ap_pl between '$inputplno1' and '$inputplno2'";
            }else if ($inputplno1=="" and $inputplno2!="") {
              $wherepl = "and ap_cheque_header.ap_pl between '' and '$inputplno2'";
            }else if($inputplno1!="" and $inputplno2==""){
              $wherepl = "and ap_cheque_header.ap_pl = '$inputplno1'";
            }else{}

            $wheredatechk = "";
            if ($inputchkdate1!="" and $inputchkdate2!="") {
              $wheredatechk = "and ap_cheque_header.ap_pl between '$inputchkdate1' and '$inputchkdate2'";
            }else if ($inputchkdate1=="" and $inputchkdate2!="") {
              $wheredatechk = "and ap_cheque_header.ap_pl between '' and '$inputchkdate2'";
            }else if($inputchkdate1!="" and $inputchkdate2==""){
              $wheredatechk = "and ap_cheque_header.ap_pl = '$inputchkdate1'";
            }else{}

            $wheredatepl = "";
            if ($inputcleardate1!="" and $inputcleardate2!="") {
              $wheredatepl = "and ap_cheque_header.ded_datevender between '$inputcleardate1 00:00:00' and '$inputcleardate2 00:00:00'";
            }else if ($inputcleardate1=="" and $inputcleardate2!="") {
              $wheredatepl = "and ap_cheque_header.ded_datevender between '' and '$inputcleardate2 00:00:00'";
            }else if($inputcleardate1!="" and $inputcleardate2==""){
              $wheredatepl = "and ap_cheque_header.ded_datevender = '$inputcleardate1 00:00:00'";
            }else{}

            //url
            $vender = "&vender={$wherevender}";
            $pro = "&pro={$wherepro}";
            $system = "&system={$wheresystem}";
            $code = "&code={$wherecode}";
            $plno = "&plno={$wherepl}";
            $bank = "&bank={$wherebank}";
            $dateap = "&dateap={$wheredatechk}";
            $datepl = "&datepl={$wheredatepl}";

            //session name 
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_debt_vender.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}{$vender}{$pro}{$system}{$code}{$plno}{$bank}{$dateap}{$datepl}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function view_debt_vender_all()
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
          $compcode = $session_data['compcode'];
          $data['vender'] = $this->cheque_m->vender_data($compcode);
          $data['project'] = $this->cheque_m->project_data($compcode);
          $data['system'] = $this->cheque_m->system_data($compcode);
          $data['ap'] = $this->cheque_m->ap_data();
          $data['pl'] = $this->cheque_m->pl_data();
          $data['bank'] = $this->cheque_m->bank_data($compcode);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/debt_vender_all',$data);
          $this->load->view('base/footer_v');
        }
        public function report_debt_vender_all()
        {
            $post = $this->input->post();
            $inputvender = $post['vender'];
            $inputpro = $post['pro'];
            $inputsystem = $post['system'];
            //where
            $wherevender = "and ap_cheque_header.ap_vender = '$inputvender'";if ($inputvender=="") {$wherevender="";}
            $wherepro = "and ap_cheque_detail.api_project = '$inputpro'";if ($inputpro=="") {$wherepro="";}
            $wheresystem = "and systemcode = '$inputsystem'";if ($inputsystem=="") {$wheresystem="";}
            //session name 
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            //url
            $vender = "&vender={$wherevender}";
            $pro = "&pro={$wherepro}";
            $system = "&system={$wheresystem}";

            //gen url
            $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_debt_vender_all.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}{$vender}{$pro}{$system}";
               $base_url = $this->config->item("url_report");
               redirect($base_url.$send);
        }
        public function view_withholding_taxes_val()
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
          // $data['proid'] = $proid;
          $compcode = $session_data['compcode'];
          // $data['vender'] = $this->cheque_m->vender_data($compcode);
          // $data['project'] = $this->cheque_m->project_data($compcode);
          // $data['system'] = $this->cheque_m->system_data($compcode);
          // $data['ap'] = $this->cheque_m->ap_data();
          // $data['pl'] = $this->cheque_m->pl_data();
          // $data['bank'] = $this->cheque_m->bank_data($compcode);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/withholding_taxes_val',$data);
          $this->load->view('base/footer_v');
        }
        public function view_withholding_taxes_data()
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
          // $data['proid'] = $proid;
          $compcode = $session_data['compcode'];
          // $data['vender'] = $this->cheque_m->vender_data($compcode);
          // $data['project'] = $this->cheque_m->project_data($compcode);
          // $data['system'] = $this->cheque_m->system_data($compcode);
          // $data['ap'] = $this->cheque_m->ap_data();
          // $data['pl'] = $this->cheque_m->pl_data();
          // $data['bank'] = $this->cheque_m->bank_data($compcode);
          $data['input'] = $this->input->post();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/withholding_taxes_data',$data);
          $this->load->view('base/footer_v');
        }  
        public function report_withholding_taxes()
        {
            $post = $this->input->post();
            var_dump($post);die();
            //session name 
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];
            $base_url = "http://report.sourcework.co/";
            //gen url
            $urls = "index.php?stimulsoft_client_key=ViewerFx";
            $file_report ="report_withholding_taxes.mrt";
 
            $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
               redirect($base_url.$send);
        }
        public function view_buy_tax_val()
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
          // $data['proid'] = $proid;
          $compcode = $session_data['compcode'];
          // $data['vender'] = $this->cheque_m->vender_data($compcode);
          // $data['project'] = $this->cheque_m->project_data($compcode);
          // $data['system'] = $this->cheque_m->system_data($compcode);
          // $data['ap'] = $this->cheque_m->ap_data();
          // $data['pl'] = $this->cheque_m->pl_data();
          // $data['bank'] = $this->cheque_m->bank_data($compcode);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/sales_tax_val',$data);
          $this->load->view('base/footer_v');
        }
        public function view_sales_tax_newvat()
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
          // $data['proid'] = $proid;
          $compcode = $session_data['compcode'];
          // $data['vender'] = $this->cheque_m->vender_data($compcode);
          // $data['project'] = $this->cheque_m->project_data($compcode);
          // $data['system'] = $this->cheque_m->system_data($compcode);
          // $data['ap'] = $this->cheque_m->ap_data();
          // $data['pl'] = $this->cheque_m->pl_data();
          $data['input'] = $this->input->post();
          $datatype = $this->input->post('data');
          $year = $this->input->post('year');
          $month = $this->input->post('month');
          if ($month=='1'||$month=='2'||$month=='3'||$month=='4'||$month=='5'||$month=='6'||$month=='7'||$month=='8'||$month=='9') {
            $month = "0".$month;
          }
          //  var_dump($datatype);die();
          $month_only = $this->input->post('month_only');
          if ($datatype==1) {
            if ($month_only==1) {
            $data['apv'] = $this->cheque_m->apv_data_where($compcode,$year,$month);   
            }else{
            $data['apv'] = $this->cheque_m->apv_data($compcode);
              // var_dump($compcode.$year.$month);die();
            }
          }else{
            if ($month_only==1) {
            $data['apv'] = $this->cheque_m->apv_exis_where($compcode,$year,$month);   
            }else{
            $data['apv'] = $this->cheque_m->apv_exis($compcode);
              // var_dump($compcode.$year.$month);die();
            }
          }
          
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/view_sales_tax_newvat',$data);
          $this->load->view('base/footer_v');
        }
        public function existing_ap()
        {
          $input = $this->input->post();
          echo "<pre>";
          // var_dump($input);die();
            foreach ($input['chkapv'] as $key => $loopchk) {
               if ($loopchk == 1) {
                 $update = array(
                    'existing' => $input['existing'][$key]
                 );
                $this->db->where('apv_id',$input['apv_id'][$key]);
                $this->db->update('apv_header',$update);
               }

            }
            redirect('ap_cheque/view_buy_tax_val');
            // die();
            // foreach ($input['chkapv'] as $key => $value) {
            //   $insert = array(
            //         'existing' => $input['existing'][$key]
            //   );
            // }
            // echo "<pre>";
            // var_dump($insert);
        }
        public function preview_tax_sale()
        { 
            $res = array();
            $res['status'] = true;
            $where = "";
            $input = $this->input->post('array');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            // var_dump($input);die();
            if ($input===false) {
              $res['message'] = "กรุณาเลือกแถวที่ต้องการดู !";
              $res['status'] = false;
              // echo json_encode($res) ;die();
            }else{
              if(count($input)>0){
                //var_dump($input);
                $where_in = "'".implode("','", $input)."'";
                $where = "and apv_header.apv_id IN ({$where_in})";
                $res['message'] = "";
                // var_dump($where);die();
                
              }else{
                
              }
            }
            // var_dump($input);die();
                $date = $this->session->userdata('sessed_in');
                $sess_name = $date['m_name'];
                $yearwhere = "&yearwhere={$year}";
                $monthwhere = "&monthwhere={$month}";
                //get config url
                $base_url = $this->config->item("url_report");

                // path_report##

                // dev
                // $urls = base_url()."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";

                // prod
                $urls = "{$base_url}index.php?stimulsoft_client_key=ViewerFx";
                $file_report ="report_ap_taxsale.mrt";
     
                $send = "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}&whereap={$where}{$yearwhere}{$monthwhere}";
               
                // redirect($base_url.$send);

             
                 $res['url'] = $send;  
                 echo json_encode($res);
            // die();
            
            
            //gen url
            // $urls = "index.php?stimulsoft_client_key=ViewerFx";
            // $file_report ="report_withholding_taxes.mrt";
 
            // $send= "{$urls}&stimulsoft_report_key={$file_report}&session={$sess_name}";
            //    redirect($base_url.$send);
        }
        public function view_daily_book_val()
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
          $compcode = $session_data['compcode'];
          $data['ap'] = $this->cheque_m->voucherno_ap($compcode);
          $data['pro'] = $this->cheque_m->project_data($compcode);
          // echo "<pre>";
          // var_dump($data['pro']);die();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/daily_book_val',$data);
          $this->load->view('base/footer_v');
        }
        public function report_daily_book()
        {
          $input = $this->input->post();
          $year = $input['year'];
          $period = $input['period'];
          $codevouc = $input['code_vouc'];
          $datevouc = $input['date_vouc'];
          $idpro = $input['id_pro'];
          // var_dump($input);die();
          $session_data = $this->session->userdata('sessed_in');
          $sess_name = $session_data['m_name'];
          //get config url
          $base_url = $this->config->item("url_report");
          $period = $input['period'];
          if ($input['period']=="01"||$input['period']=="02"||$input['period']=="03"||$input['period']=="04"||$input['period']=="05"||$input['period']=="06"||$input['period']=="07"||$input['period']=="08"||$input['period']=="09") {
            $period = substr($input['period'], 1,1);
          }
          // var_dump($period);die();
          // where
          $whereyear = "";
          $whereperiod = "";
          $wherecodevouc = "";
          $wheredatevouc = "";
          $whereidpro = "";
          if ($input['year'] != "") {
            $whereyear = "and ap_gl.glyear = '$year'";
          }
          if ($input['period'] != "") {
            $whereperiod = "and ap_gl.glperiod = '$period'";
          }
          if ($input['code_vouc'] != "") {
            $wherecodevouc = "and ap_gl.vchno = '$codevouc'";
          }
          if ($input['date_vouc'] != "") {
            $wheredatevouc = "and ap_gl.vchdate = '$datevouc'";
          }
          if ($input['id_pro'] != "") {
            $whereidpro = "and ap_gl.projectid = '$idpro'";
          }
          $sendyear = "&whereyear=$whereyear";
          $sendperiod = "&whereperiod=$whereperiod";
          $sendcodevouc = "&wherecodevouc=$wherecodevouc";
          $senddatevouc = "&wheredatevouc=$wheredatevouc";
          $sendidpro = "&whereidpro=$whereidpro";
          // var_dump($sendyear." ".$sendperiod." ".$sendcodevouc." ".$senddatevouc." ".$sendidpro);die();
          // dev
          // $urls = base_url()."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";

          // prod
          $urls = "{$base_url}index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $file_report ="report_daily_book.mrt";
     
          $send = "{$urls}{$file_report}&session={$sess_name}{$sendyear}{$sendperiod}{$sendcodevouc}{$senddatevouc}{$sendidpro}";
          // var_dump($send);die();    
          redirect($send);
        }
        public function cost_pro_val()
        {
          $val = $this->uri->segment(3);

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
          $data['val'] = $val;
          // var_dump($data['val']);die();
          $compcode = $session_data['compcode'];
          $data['system'] = $this->cheque_m->system_data($compcode);
          $data['pro'] = $this->cheque_m->project_data($compcode);
          // echo "<pre>";
          // var_dump($data['pro']);die();

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/ap/report/cost_pro_val',$data);
          $this->load->view('base/footer_v');
        }
        public function report_cost_pro_c()
        { 
          $input = $this->input->post();
          $session_data = $this->session->userdata('sessed_in');
          $sess_name = $session_data['m_name'];
          $year = $input['year'];
          $period = $input['period'];
          $codesystem = $input['code_system'];
          $idpro = $input['id_pro'];
          // var_dump($input);die();
          $type = $input['valuetype'];
          // echo "<pre>";
          // var_dump($input);die();
          $base_url = $this->config->item("url_report");
          // dev
          $urls = base_url()."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          // prod
          // $urls = "{$base_url}index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          //where
          $whereyear = "";
          $whereperiod = "";
          $whereidpro = "";
          $wheresystem = "";
          if ($input['year'] != "") {
            $whereyear = "and ap_gl.glyear = '$year'";
          }
          if ($input['period'] != "") {
            $whereperiod = "and ap_gl.glperiod = '$period'";
          }
          if ($input['id_pro'] != "") {
            $whereidpro = "and ap_gl.projectid = '$idpro'";
          }
          if ($input['code_system'] != "") {
            $whereidpro = "and ap_gl.systemcode = '$codesystem'";
          }
          $sendyear = "&whereyear=$whereyear";
          $sendperiod = "&whereperiod=$whereperiod";
          $sendsystem = "&wheresystem=$wheresystem";
          $sendidpro = "&whereidpro=$whereidpro";
          if ($type==1) {
            $file_report ="report_cost_pro_c.mrt";
          }else{
            $file_report ="report_cost_pro_c.mrt";
          }
        
          $send = "{$urls}{$file_report}&session={$sess_name}{$sendyear}{$sendperiod}{$sendsystem}{$sendidpro}";
          // var_dump($send);die();    
          redirect($send);
        }
}
