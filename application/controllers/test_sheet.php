 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_sheet extends CI_Controller {
    public function __construct() {
            parent::__construct();
        }
        public function index()
        {
        //  $this->load->view('navtail/base_master/header_v');
          $this->load->view('test/testsheet_v');
          // $this->load->view('base/footer_v');
        }
        public function import_boq()
        {
          $data['bd'] = $this->uri->segment(3);
        //  $this->load->view('navtail/base_master/header_v');
          $this->load->view('bd/import_boq/import_boq_v',$data);
          // $this->load->view('base/footer_v');
        }
        
 
}
