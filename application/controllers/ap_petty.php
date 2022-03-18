<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ap_petty extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model("ap_m");
            $this->load->helper('date');
        }

        public function ap_pettycash()
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
          $this->load->view('office/account/ap/pv_other/ap_other_v');
          $this->load->view('base/footer_v');
        }

        public function load_pettycash()
        {
          // pettycash
          $data['pe'] = $this->ap_m->load_pettycash_m();
          // echo '<pre>';
          // print_r($data['pe']);die();
          $this->load->view('office/account/ap/ap_petty/load_modal_petty_v',$data);
        }

        public function load_petty_gl()
        {
        	$no = $this->uri->segment(3);
          $proj = $this->uri->segment(4);
        	$data['no'] = $no;
          $data['pe'] = $this->ap_m->getpettycash_expense_m($no,$proj);
          $this->load->view('office/account/ap/ap_petty/ret_gl_v',$data);
        }  

        public function load_petty_expense()
        {
          
        	$no = $this->uri->segment(3);
          $proj = $this->uri->segment(4);
        	$data['no'] = $no;
          $data['pe'] = $this->ap_m->getpettycash_m($no,$proj);
          $this->load->view('office/account/ap/ap_petty/ret_expense_v',$data);
        } 

        public function load_petty_center()
        {          
          $no = $this->uri->segment(3);
          $proj = $this->uri->segment(4);
          $data['no'] = $no;
          $data['pe'] = $this->ap_m->getpettycash_m($no,$proj);
          $this->load->view('office/account/ap/ap_petty/ret_center_v',$data);
        } 

        public function get_procode($id)
        {
          $this->db->select('project_code');
          $this->db->from('project');
          $this->db->where('project_id', $id);
          $query = $this->db->get();

          if ($query) {
            $res = $query->result_array()[0]['project_code'];
          }else {
            $res = '';
          }
          
          return $res;
        }

        public function add_pettycash()
        {          
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $apocode = $this->input->post('code');
          $add = $this->input->post();

          $project_code = $this->get_procode($add['projectid']);

          try {
            $daa = array(
              'status' => "paid"
            );

            $this->db->where("docno", $add['docno']);
            $this->db->update('pettycash', $daa);
            // echo '<pre>';
            // print_r($add);
            // die();
             
              $data = array(
                'ap_no' => $add['code'],
                'ap_date' => $add['ardate'],
                'doc_no' => $add['docno'],
                'doc_date' => $add['docdate'],
                'ap_vendor' => $add['venderid'],
                'ap_project' => $add['projectid'],
                // 'ap_department' => $add['decode'],
                // 'ap_type' => $add['ap_type'],
                // 'ap_paiddate' => $add['paiddate'],
                // 'ap_voutype' => $add['voutype'],
                // 'ap_refno' => $add['refno'],
                // 'ap_acvou' => $add['acvou'],
                // 'ap_currency' => $add['currency'],
                // 'ap_exchange' => $add['exchange'],
                'ap_year' => $add['ap_year'],
                'ap_period' => $add['period'],
                'ap_todr' => $add['todr'],
                'ap_tocr' => $add['tocr'],
                'ap_system' => $add['jobcode'],
                'ap_crterm' => $add['crterm'],
                'ap_remark' => $add['remark'],
                'ap_status' => 'wait',
                'ap_type' => 'apo',
                // 'ex_wtcode' => $add['apowt'],
                'gl_status'      => 'N',
                'cn'    => 'no',
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode,
                'status' => "wait",
              );

              $this->db->insert('ap_pettycash_header', $data);
    
              for ($i=0; $i < count($add['cost_amount']); $i++) {
                if ($add['cost_amount'][$i]!="") {
                  $data_d = array(
                    'cost_ref' => $add['code'],
                    'cost_project' => $add['cost_project'][$i],
                    'cost_costcode' => $add['cost_costcode'][$i],
                    'cost_amount' => $add['cost_amount'][$i],
                    'compcode' => $compcode,
                    'useradd' => $username,
                    'createdate' => date('Y-m-d H:i:s',now()),
                  );
                  $this->db->insert('ap_pettycash_cost',$data_d);
                }
                else{
                }
              }

              for ($i=0; $i < count($add['gl_dr']); $i++) {
                if ($add['gl_dr'][$i]!="") {
                  $data_g = array(
                    'vchno' => $add['code'],
                    'doctype' => 'apo',
                    'costcode' => $add['gl_costcode'][$i],
                    'acct_no' => $add['gl_expenscode'][$i],
                    'amtdr' => $add['gl_dr'][$i],
                    'amtcr' => $add['gl_cr'][$i],
                    'systemcode' => $add['jobcode'],
                    'projectid' => $add['projectid'],
                    'glyear'    => $add['ap_year'],
                    'glperiod'  => $add['period'],
                    // 'dptid'  => $add['decode'],
                    'completegl'    => "N",
                    'duedate' => $add['docdate'],
                    'compcode' => $compcode,
                    'adduser' => $username,
                    'vendor_id' => $add['venderid'],
                    'createdate' => date('Y-m-d H:i:s',now()),
                    'vchdate'    => $add['ardate'],
                    'gltype' => $add['gl_type'][$i],
                    'ref_pettycashi_id' => $add['ref_pettycashi_id'][$i],
                  );
                  $this->db->insert('ap_gl',$data_g);
                }
                else{
                }
              }

              for ($i=0; $i < count($add['ex_amt']); $i++) {
                if ($add['ex_amt'][$i]!="") {
                  $data_e = array(
                    'ex_ref' => $add['code'],
                    'ex_costcode' => $add['ex_costcode'][$i],
                    'ex_expenscode' => $add['ex_expenscode'][$i],
                    'ex_vender' => $add['ex_venderid'][$i],
                    // 'ex_des' => $add['ex_des'][$i],
                    'ex_taxno' => $add['ex_taxno'][$i],
                    'ex_typetax' => $add['ex_typetax'][$i],
                    // 'ex_datetax' => $add['ex_datetax'][$i],
                    'ex_costcode' => $add['ex_costcode'][$i],
                    'ex_amt' => $add['ex_amt'][$i],
                    'ex_vat' => $add['ex_vat'][$i],
                    'ex_tovat' => $add['ex_tovat'][$i],
                    'ex_wt' => $add['ex_wt'][$i],
                    'ex_towt' => $add['ex_towt'][$i],
                    'ex_adv'    => 0,
                    'cn'    => 'no',
                    'ex_ret'    => 0,
                    'ex_netamt' => $add['ex_netamt'][$i],
                    'ex_remark' => $add['ex_remark'][$i],
                    'sub_costcode' => $add['sub_cost'][$i],
                    'compcode' => $compcode,
                    'useradd' => $username,
                    'createdate' => date('Y-m-d H:i:s',now()),
                  );
                  $this->db->insert('ap_pettycash_expense',$data_e);
                  
                }
              }

              
              for ($i=0; $i < count($add['ex_taxno']); $i++) {
                if ($add['ex_taxno'][$i]!="") {
                $datatax = array(
                'ap_code'    => $add['code'],
                'ap_taxno'   => $add['ex_taxno'][$i],
                'ap_taxdate' => $add['ex_datetax'][$i],
                'project_id' => $add['projectid'],
                'vender_id'  => $add['venderid'],
                'ap_period'  => $add['period'],
                'ap_year'    => $add['ap_year'],
                'ap_type'    => 'apo',
                'ap_amount'  => $add['ex_amt'][$i],
                'ap_vatper'     => $add['ex_vat'][$i],
                'ap_amtvat'     => $add['ex_tovat'][$i],
                'ap_netamt'  => $add['ex_amt'][$i] - $add['ex_tovat'][$i],
                );
                $this->db->insert('ap_tax',$datatax);
              }
                }

          } catch (Exception $e) {
             echo $e;
          }
        }

        public function ap_pettycash_print()
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
          $data['rep'] = $this->ap_m->printpettycash_wt();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/pv_other/ap_print_nothwh');
          $this->load->view('base/footer_v');
        }

        public function ap_pettycash_all()
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
          $data['rep'] = $this->ap_m->edit_apo();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('office/account/ap/pv_other/ap_pettycash_all');
          $this->load->view('base/footer_v');
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

    public function ap_active_apoopen()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['open'] = $this->ap_m->getapoopen($compcode);
      $this->load->view('office/account/ap/ap_petty/ap_active_apoopen',$data);
    }

    public function ap_active_aponot()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['username'] = $session_data['m_name'];
      $compcode = $session_data['compcode'];
      $data['not'] = $this->ap_m->getaponot($compcode);
      $this->load->view('office/account/ap/ap_petty/ap_active_aponot',$data);
    }




}