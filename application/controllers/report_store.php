<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report_store extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('office_m');
            $this->load->model('report_m');
            $this->load->model('datastore_m');
        }

        public function report_stock()
       {
         $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
             $data['name'] = $session_data['m_name'];
             $data['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $data['project'] = $session_data['m_project'];
             $data['imgu'] = $session_data['img'];

         $id = $this->uri->segment(3);
         $pono = $this->uri->segment(4);
         $data['res'] = $this->report_m->getdocissue_print($id);
         $data['resi'] = $this->report_m->getdocissue_d($id);
            
              $this->db->select('*');
             $this->db->where('isi_doccode',$id);
             $query = $this->db->get('ic_issue_d');
             $res = $query->num_rows();
             if ($res<=5) {
               $this->load->view('navtail/base_master/header_v',$data);
               $this->load->view('navtail/base_master/tail_v');
               $this->load->view('navtail/navtail_print_v');
             $this->load->view('office/inventory/report/report_docissue_v',$data);
         }
         else{
           $chk = $this->report_m->getdocissue_d($id);
            $v = array_chunk($chk,20);

             $countnum = count($v);
           foreach($v as $key => $val)
           {

             if($key == 0)
             {
               $data['resitem'] = $val;
               $this->load->view('navtail/base_master/header_v',$data);
               $this->load->view('navtail/base_master/tail_v');
               $this->load->view('navtail/navtail_print_v');
               $this->load->view('office/inventory/report/re_docissue_header_v',$data);
             }
             else
             {
               $data['resitem'] = $val;
               $this->load->view('navtail/base_master/header_v',$data);
               $this->load->view('navtail/base_master/tail_v');
               $this->load->view('navtail/navtail_print_v');
               $this->load->view('office/inventory/report/re_docissue_center_v',$data);
             }
           }

         }

       }
       public function report_booking()
      {
        $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $data['name'] = $session_data['m_name'];
            $data['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $data['project'] = $session_data['m_project'];
            $data['imgu'] = $session_data['img'];

        $id = $this->uri->segment(3);
        $data['res'] = $this->report_m->getdocbook_print($id);
            $data['resi'] = $this->report_m->getdocbook_d($id);
            //$res = $this->report_m->countdocissue_d($id);
             $this->db->select('*');
            $this->db->where('ref_codetransfer',$id);
            $query = $this->db->get('ic_bookingitem');
            $res = $query->num_rows();
            if ($res<=5) {
              $this->load->view('navtail/base_master/header_v',$data);
              $this->load->view('navtail/base_master/tail_v');
              $this->load->view('navtail/navtail_print_v');
            $this->load->view('office/inventory/booking/report/report_docbook_v',$data);
        }
        else{
          $chk = $this->report_m->getdocbook_d($id);
           $v = array_chunk($chk,20);

            $countnum = count($v);
          foreach($v as $key => $val)
          {

            if($key == 0)
            {
              $data['resitem'] = $val;
              $this->load->view('navtail/base_master/header_v',$data);
              $this->load->view('navtail/base_master/tail_v');
              $this->load->view('navtail/navtail_print_v');
              $this->load->view('office/inventory/booking/report/re_docbook_header_v',$data);
            }
            else
            {
              $data['resitem'] = $val;
              $this->load->view('navtail/base_master/header_v',$data);
              $this->load->view('navtail/base_master/tail_v');
              $this->load->view('navtail/navtail_print_v');
              $this->load->view('office/inventory/booking/report/re_docbook_center_v',$data);
            }
          }

        }

      }
  
  }
