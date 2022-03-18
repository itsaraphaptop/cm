<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pr_rpt extends CI_Controller {
      public function __construct() {
            parent::__construct();
             $this->load->model('office_m');
        }

        public function pr_report_h()
        {
          echo $this->uri->segment(3);
        //   $id = $this->uri->segment(3);
        //  $data['res'] = $this->office_m->pr_report($id);
        //  $dat = $this->office_m->pr_report_item($id);
         //
        //  $v = array_chunk($dat,10);
         //
        //   $countnum = count($v);
         //
        //   foreach($v as $key => $val)
        //   {
        //     $session_data = $this->session->userdata('sessed_in');
        //         $username = $session_data['username'];
        //         $data['name'] = $session_data['m_name'];
        //         $data['dep'] = $session_data['m_dep'];
        //         $data['projid'] = $session_data['projectid'];
        //         $data['project'] = $session_data['m_project'];
        //         $data['imgu'] = $session_data['img'];
        //     if($key == 0)
        //     {
        //       $data['resi'] = $val;
        //       $this->load->view('navtail/base_master/header_v',$data);
        //       $this->load->view('navtail/base_master/tail_v');
        //       $this->load->view('navtail/navtail_print_v');
        //       $this->load->view('office/pr/report/pr_header_v',$data);
        //     }
         //
        //     else
        //     {
        //       $data['resi'] = $val;
        //       $this->load->view('navtail/base_master/header_v',$data);
        //       $this->load->view('navtail/base_master/tail_v');
        //       $this->load->view('navtail/navtail_print_v');
        //       $this->load->view('office/pr/report/pr_footer_v',$data);
        //     }
        //   }
        }
}
