<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class email extends CI_Controller {

	protected $title = "News";
	protected $topic = "ข่าวสาร";

      public function __construct() {
            parent::__construct();
            $this->load->helper('date');
            $this->load->model('programmer_m');
        }
			public function sentmail()
			{
				$a = "itsaraphap@outlook.com";
				$b = "test";
				$c = "test";
				$this->_sendmail($a,$b,$c);
			}

			public function load_setup_email()
	        {
	          $session_data = $this->session->userdata('sessed_in');
	          $compcode = $session_data['compcode'];
	          $data['count'] =  $this->programmer_m->count_email($compcode);
	          $data['res'] = $this->programmer_m->setemail($compcode);

	          $this->load->view('datastore/system_defualt/load_setup_email_v',$data);
	        }

	        public function save_change() {
	        	
	          	try {
	          		$session_data = $this->session->userdata('sessed_in');
		          	$compcode = $session_data['compcode'];
		          	$username = $session_data['username'];
	          		$add = $this->input->post();
	          		$count = $this->programmer_m->count_email($compcode);
	          		if ($count==1) {
	          			$data = array(
	          			'email_from' => $add['femal'],
						'from_name' => $add['fname'],
						'smtp_host' => $add['smtphost'],
						'smtp_port' => $add['smtpport'],
						'smtp_user' => $add['emailuser'],
						'smtp_password' => $add['emailpass'],
						'useredit' => $username,
						'editdate' => date('Y-m-d H:i:s',now()),
	          			);
	          			$this->db->where('compcode',$compcode);
	          			$this->db->update('email',$data);
	          		}else{
	          			$data = array(
	          			'email_from' => $add['femal'],
						'from_name' => $add['fname'],
						'smtp_host' => $add['smtphost'],
						'smtp_port' => $add['smtpport'],
						'smtp_user' => $add['emailuser'],
						'smtp_password' => $add['emailpass'],
						'compcode' => $compcode,
						'useradd' => $username,
	          			);
	          		$this->db->insert('email',$data);
	          		}

	          	} catch (Exception $e) {
	          		var_dump($e->getMessage());
	          	}
	        }

	        public function count() {
	        		$session_data = $this->session->userdata('sessed_in');
	          		$compcode = $session_data['compcode'];
	          		echo $this->programmer_m->count_email($compcode);
			}
			
			public function _sendmail($email,$title_email,$message){
				$session_data = $this->session->userdata('sessed_in');
	          	$compcode = $session_data['compcode'];
				$username = $session_data['username'];
				$setmail = $this->programmer_m->setemail($compcode);
				$this->load->library('user_agent');  /// เรียกใช้ user agent class
				$this->load->library('email');

				$config['useragent'] = 'Construction'; // กำหนดส่งจากอะไร เช่น ใช่ชื่อเว็บเรา
				$config['protocol'] = 'smtp';  // สามารถกำหนดเป็น mail , sendmail และ smtp
				$config['smtp_host'] = $setmail[0]['smtp_host'];
				$config['smtp_user'] = $setmail[0]['smtp_user'];
				$config['smtp_pass'] = $setmail[0]['smtp_password'];
				$config['smtp_port'] = $setmail[0]['smtp_port'];
				$config['charset'] = 'utf-8';
				$config['smtp_crypto'] = 'tls'; // รูปแบบการเข้ารหัส กำหนดได้เป้น tls และ ssl
				$config['mailtype'] = 'html'; // กำหนดได้เป็น text หรือ html
		
				$this->email->initialize($config);
				
				$this->email->set_newline("\r\n");

 
				$this->email->from($setmail[0]['email_from'], $setmail[0]['from_name']);
				$this->email->to($email); //ส่งถึงใคร
				$this->email->cc(''); //cc ใคร
				$this->email->bcc(''); //bcc ใคร
				 
				$this->email->subject($title_email); //หัวข้อของอีเมล
				$this->email->message($message); //เนื้อหาของอีเมล

				$result = $this->email->send();
				// echo $this->email->print_debugger();
			}
			public function testconnnection(){
				$add = $this->input->post();
				echo print_r($add);
				// $a = "test";
				// $b = "test";
				// // $this->load->library('email');
				// $this->_testsendmail($add['femail'],$a,$b);
				return true;
			}
			public function testsendmail(){
				$session_data = $this->session->userdata('sessed_in');
	          	$compcode = $session_data['compcode'];
				$username = $session_data['username'];
				// $setmail = $this->programmer_m->setemail($compcode);
				$this->load->library('user_agent');  /// เรียกใช้ user agent class
				$this->load->library('email');
				$add = $this->input->post();
				$config['useragent'] = 'Construction'; // กำหนดส่งจากอะไร เช่น ใช่ชื่อเว็บเรา
				$config['protocol'] = 'smtp';  // สามารถกำหนดเป็น mail , sendmail และ smtp
				// $config['smtp_port']='465';
				$config['smtp_timeout']='30';
				$config['smtp_host'] = $add['smtphost'];
				$config['smtp_user'] = $add['emailuser'];
				$config['smtp_pass'] = $add['emailpass'];
				$config['smtp_port'] = $add['smtpport'];
				$config['charset'] = 'utf-8';
				$config['smtp_crypto'] = 'tls'; // รูปแบบการเข้ารหัส กำหนดได้เป้น tls และ ssl
				$config['mailtype'] = 'html'; // กำหนดได้เป็น text หรือ html
		
				$this->email->initialize($config);
				
				$this->email->set_newline("\r\n");

 
				$this->email->from($add['emailuser']);
				$this->email->to($add['emailuser']); //ส่งถึงใคร
				$this->email->cc(''); //cc ใคร
				$this->email->bcc(''); //bcc ใคร
				 
				$this->email->subject("testing connection"); //หัวข้อของอีเมล
				$this->email->message("testing connection successful"); //เนื้อหาของอีเมล

				$result = $this->email->send();
				if ($result) {
					echo "connection successful";
				}else{
					echo "connection Fail";
					echo $this->email->print_debugger();
				}
			}
			public function _zend($aa){
				echo $aa."<br/>";
				echo "xxxx";
			}
}
