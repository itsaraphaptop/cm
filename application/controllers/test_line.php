<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_line extends CI_Controller {
    public function __construct() {
            parent::__construct();
            $this->load->helper(array('line_oa_api'));
        }
        public function index()
        {
            $this->load->view('test/test_line_v');
        }
        public function line_post(){
            // $pushID = "U55ebca7c282122cff90fec9bb3062f5a" ;
            // $pushID = $this->input->post('to');
            // $text = $this->input->post('mm');
            // $type = $this->input->post('type');
            // $price = $this->input->post('price');
            // $pay = $this->input->post('pay');
            // $detail = $this->input->post('detail');
            // $unit = $this->input->post('unit');
            $line = "https://lineproud.herokuapp.com/botpush.php";
            $data = array( 
                "id" => "Uff4cabbb1001a9c179039898c6895d0f",
                "type" =>"message",
                "text" =>"PR-TEST-0001",
                "price" =>"TESTING LINE",
                "pay" =>"3",
                "unit" =>"4",
                "doc" =>"5",
                "compcode_line" => "6",
                "user" =>"7",
                "link" => $line,
                "base_url" => base_url()."data_master/approve_sessioninsert/"
        
            );
            // echo json_encode($data);
            // echo $line;
            line_oa_api($data,$line);
            // line_oa_api($pushID,$text,$type,$price,$pay,$detail,$unit);
            // redirect('test_line');
        }

        
 
}
