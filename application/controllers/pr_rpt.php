<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pr_rpt extends CI_Controller {
      public function __construct() {
            parent::__construct();
             $this->load->model('office_m');
             $this->load->model('pr_rpt_m');
        }

        public function pr_report_h()
        {
          $session_data = $this->session->userdata('sessed_in');
          $id = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['username'] = $session_data['m_name'];
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
          $data['sign'] = $session_data['sign'];
          $data['compimg'] = $this->pr_rpt_m->companyimgbycompcode($compcode);
          $data['res'] = $this->pr_rpt_m->report_pr_h($id);
            $res = $this->pr_rpt_m->report_pr_id($id);
          // $data['resi'] = $this->office_m->po_report_item($id);
          // $this->load->view('navtail/base_master/header_v',$data);
          // $this->load->view('navtail/base_master/tail_v');
          // $this->load->view('navtail/navtail_print_v');
          $dat = $this->pr_rpt_m->report_pr($id);
          foreach ($res as  $value) {
            $tot = $value->total;
          }
          if ($tot<=8) {
            $data['resi'] = $this->pr_rpt_m->report_pr($id);
            $this->load->view('office/pr/report/pr_master_v',$data);
          }
          else
        	{
              $v = array_chunk($dat,8);
              $countnum = count($v);
              foreach($v as $key => $val)
      				{
      					if($key == 0)
      					{
      						$data['resi'] = $val;
                $this->load->view('office/pr/report/pr_header_v',$data);
                }elseif($key == 1){
                  $data['key']= 1;
                  $data['dd'] = $key;
      						$data['resi'] = $val;
                  $data['dat'] = $tot;
      						$this->load->view('office/pr/report/pr_report_page2_v',$data);
                }elseif($key == 2){
                  $data['key']= 2;
                  $data['dd'] = $key;
                  $data['resi'] = $val;
                  $data['dat'] = $tot;
                  $this->load->view('office/pr/report/pr_report_page3_v',$data);
                }elseif($key == 3){
                  $data['key']= 3;
                  $data['dd'] = $key;
                  $data['resi'] = $val;
                    $data['dat'] = $tot;
                  $this->load->view('office/pr/report/pr_report_page4_v',$data);
                }elseif($key == 4){
                  $data['key']= 4;
                  $data['dd'] = $key;
                  $data['resi'] = $val;
                    $data['dat'] = $tot;
                  $this->load->view('office/pr/report/pr_report_page5_v',$data);
                }elseif($key == 5){
                  $data['key']= 5;
                  $data['dd'] = $key;
                  $data['resi'] = $val;
                    $data['dat'] = $tot;
                  $this->load->view('office/pr/report/pr_report_page6_v',$data);
                }elseif($key == 6){
                  $data['key']= 6;
                  $data['dd'] = $key;
                  $data['resi'] = $val;
                    $data['dat'] = $tot;
                  $this->load->view('office/pr/report/pr_report_page7_v',$data);
                }elseif($key == 7){
                  $data['key']= 7;
                  $data['dd'] = $key;
                  $data['resi'] = $val;
                    $data['dat'] = $tot;
                  $this->load->view('office/pr/report/pr_report_page8_v',$data);
                }elseif($key == 8){
                  $data['key']= 8;
                  $data['dd'] = $key;
                  $data['resi'] = $val;
                    $data['dat'] = $tot;
                  $this->load->view('office/pr/report/pr_report_page9_v',$data);
                }else{
                  $data['key']= 9;
                  $data['dd'] = $key;
      						$data['resi'] = $val;
                    $data['dat'] = $tot;
      						$this->load->view('office/pr/report/pr_footer_v',$data);
      					}


      				}
            }

        }
        
}
