 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class testreport extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->model('office_m');
            $this->load->model('report_m');
        }

        public function po_report()
        {

        	$res = $this->office_m->po_report_item();
        	foreach ($variable as $value) {
        		
        	}
        }
}