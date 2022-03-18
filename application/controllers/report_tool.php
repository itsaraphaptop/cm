<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report_tool extends CI_Controller {

        function __construct() {

            parent::__construct();
            $this->load->model('office_m');
            $this->load->model('report_m');
            $this->load->model('datastore_m');
        }

      public function load_designer()
      {
        $this->load->view('report/stimulsoft/helper');
        $this->load->view('report/designer');
      }
      public function load_viewer()
      {
        $type = $this->uri->segment(3);
        $q =  $this->db->query("select report1 from report where module='$type'")->result();
          foreach ($q as $key => $value) {
             $report['report1'] = $value->report1;

          }
        $this->load->view('report/stimulsoft/helper');
        $this->load->view('report/viewer',$report);
      }
      public function load_helper()
      {
        $this->load->view('report/stimulsoft/helper');
      }
      public function load_handler()
      {
        $this->load->view('report/handler');
      }
      public function test_member()
      {
        // $id = 2;
        // $q = $this->db->query("select * from member where m_id='$id'")->result();
        // $this->output
        //       ->set_content_type('application/json')
        //       ->set_output(json_encode($q));
        $module="member";
        $q =  $this->db->query("select report2 from report where module='$module'")->result();
          foreach ($q as $key => $value) {
             echo  $value->report2;

          }
      }
      public function test_v()
      {
        $this->load->view('report/test_v');
      }
      public function test_post()
      {
        $id = $this->input->post('id');
        $q = $this->db->query("select * from member where m_id='$id'")->result();
        $this->output
              ->set_content_type('application/json')
                ->set_output(json_encode($q));
        $json_data['emp_data'] = json_encode($q);
        $data = array(
          'report2' =>   $json_data['emp_data']
        );
        $this->db->where('module','member');
        if ($this->db->update('report',$data)) {
          redirect('report_tool/load_viewer/member');
        }else{
          echo "ddd";
        }


      }
      public function po()
      {
        // $id = 2;
        // $q = $this->db->query("select * from member where m_id='$id'")->result();
        // $this->output
        //       ->set_content_type('application/json')
        //       ->set_output(json_encode($q));
        $module="po";
        $q =  $this->db->query("select report2 from report where module='$module'")->result();
          foreach ($q as $key => $value) {
             echo  $value->report2;

          }
      }
      public function print_po()
      {
        $id = $this->input->post('id');
        $q = $this->db->query("select * from po join po_item on po.po_pono=po_item.poi_ref where po_pono='$id'")->result();
        $this->output
              ->set_content_type('application/json')
                ->set_output(json_encode($q));
        $json_data['po_data'] = json_encode($q);
        $data = array(
          'report2' =>   $json_data['po_data']
        );
        $this->db->where('module','po');
        if ($this->db->update('report',$data)) {
          redirect('report_tool/load_viewer/po');
        }else{
          echo "ddd";
        }
      }

}
