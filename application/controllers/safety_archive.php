<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class safety_archive extends CI_Controller {
      public function __construct() {
            parent::__construct();
            
        }

   public function addEmp()
        {
         $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $add = $this->input->post();

        	if($add['ddsex']=='0'){
        		$uimg = 'example0.png' ;
        	}else{
        		$uimg = 'example1.jpg' ;
        	}
               $data = array(
                  'firstname' => $add['fname'],
                  'lastname' => $add['lname'],
                  'nickname' => $add['nname'],
                  'sex_st' => $add['ddsex'],
                  'cityzen_st' => $add['cardid'],
                  'typeblood' => $add['typeblood'],
                  'hm_h' => $add['huhight'],
                  'hm_w' => $add['huweight'],
                  'bd_st' => $add['bdate'],
                  'work_type' => '1',
                  'nation' => $add['nttype'],
                  'religion' => $add['religion'],
                  'status_st' => $add['ddsingle'],
                  'email'=> $add['humail'],
                  'phonenum' => $add['phone'],
                  'add_st' => $add['addressst'], //address
                  'addby' => $username,
                  'add_date' => date('Y-m-d H:i:s'),
                  'compcode' => $compcode,
                  'user_img' => $uimg
                
                  );

                $this->db->insert('safety_first',$data);
               
               
         
            redirect('safety/employee_list');
         

        


        }
         public function EditEmp()
        {
         $session_data = $this->session->userdata('sessed_in');
         	$idtest = $this->uri->segment(3);
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $add = $this->input->post();
        	// echo 'fname'.$idtest;
        	
               $data = array(
                  'firstname' => $add['fname'.$idtest],
                  'lastname' => $add['lname'.$idtest],
                  'nickname' => $add['nname'.$idtest],
                  'sex_st' => $add['ddsex'.$idtest],
                  'cityzen_st' => $add['cardid'.$idtest],
                  'typeblood' => $add['typeblood'.$idtest],
                  'hm_h' => $add['huhight'.$idtest],
                  'hm_w' => $add['huweight'.$idtest],
                  'bd_st' => $add['bd'.$idtest],
                  // 'work_type' => '1',
                  'nation' => $add['nttype'.$idtest],
                  'religion' => $add['religion'.$idtest],
                  'status_st' => $add['ddsingle'.$idtest],
                  'email'=> $add['humail'.$idtest],
                  'phonenum' => $add['phone'.$idtest],
                  'add_st' => $add['addressst'.$idtest], //address
                  'editby' => $username,
                  'edit_date' => date('Y-m-d H:i:s')
                  // 'compcode' => $compcode
                
                  );
               	$this->db->where('id_st',$idtest);
                $this->db->update('safety_first',$data);
            	redirect('safety/employee_list');


        


        }


}
