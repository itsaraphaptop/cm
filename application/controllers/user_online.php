<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_online extends CI_Controller {
	public function __construct() {
            parent::__construct();
            $this->load->Model('online_user_m');         
     }

	public function get_user()
	{
		$users = $this->online_user_m->get_user_online();
		foreach ($users as $key => $user) {
			unset($users[$key]["m_pass"]);
		}
		echo json_encode($users);
		
	}

}

/* End of file user_online.php */
/* Location: ./application/controllers/user_online.php */