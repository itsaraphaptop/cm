<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class fixbug extends CI_Controller {
    
    public function __construct() {
    	 date_default_timezone_set( 'Asia/Bangkok' );
        parent::__construct();
        $this->load->helper(array('form', 'url','file'));
        $this->load->library('image_lib');
        $this->load->helper('date');
    }

        public function add()
        {	



        	$session_data = $this->session->userdata('logged_in');
	        $username = $session_data['username'];
	      
	        $datestring = "Y";
	        $m = "m";
							$this->db->select('*');
                              $qu = $this->db->get('fixbug');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
                                if ($res==0) {
                                   $code = date($datestring).date($m)."00"."1";
                                }
                                else
                                {
                                            $this->db->select('*');
                                            $this->db->order_by('b_id','desc');
                                            $this->db->limit('1');
                                            $q = $this->db->get('fixbug');
                                            $run = $q->result();
                                            foreach ($run as $valx)
                                            {
                                                $x1 = $valx->b_id+1;

                                            }
                                              $code = date($datestring).date($m)."00".$x1;
                                }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// email

//////////////////////////////////////////////////////////////////////////////////////////////////////////////// email


 						$data = array(
				        	'b_code' => $code,
				        	'b_subject' => $this->input->post('subj'),
				        	'b_detail' => $this->input->post('deti'),
				        	'b_date' =>date('Y-m-d',now()),
				        	'b_status' => "wait",
				        	'adduser' => $username,
				        	'adddate' => date('Y-m-d H:i:s',now()),
				        	);
				        if ($this->db->insert('fixbug',$data)) {
				        	echo "เลขที่ ".$code;
				        	redirect('index.php/help');
				        }else{
				        	return false;
				        }
        }

        public function add_bug()
        {
        	echo $this->input->post('subject');
        }

        public function delhelp()
        {
            $session_data = $this->session->userdata('logged_in');
            $username = $session_data['username'];
            $code = $this->uri->segment(3);
            $data = array(
                'b_status' => "delete",
                'deldate' => date('Y-m-d H:i:s',now()),
                'deluser' => $username
                );
            $this->db->where('b_code',$code);
            if ($this->db->update('fixbug',$data)) {
                redirect('index.php/help/list_help');
            }
            else{
                echo "error";
              
            }
        }
        public function edit()
        {
            $id = $this->input->post('code');
            $data = array(
                'b_subject' => $this->input->post('subj'),
                'b_detail' => $this->input->post('deti')
                );
            $this->db->where('b_code',$id);
            if ($this->db->update('fixbug',$data)) {
               redirect('index.php/help/list_help');
            }else{
                echo "error Edit bug";
            }
        }

      
}