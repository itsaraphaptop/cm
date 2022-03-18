<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class importexcel_m extends CI_Controller {
        public function __construct() {
            parent::__construct();

        }

        function tambahuser($dataarray)
	    {
	        for($i=0;$i<count($dataarray);$i++){
	            $data = array(
	            	'm_id'=>$dataarray[$i]['id'],
	                'm_code'=>$dataarray[$i]['code'],
	                'm_name'=>$dataarray[$i]['name'],
	                'm_user'=>$dataarray[$i]['user'],
	                'm_pass'=>$dataarray[$i]['pass'],
	                'compcode'=>$dataarray[$i]['compcode'],
					'm_status'=>$dataarray[$i]['status'],
					'm_position'=>$dataarray[$i]['position'],
					'm_email'=>$dataarray[$i]['email'],
					'm_project'=>$dataarray[$i]['project'],
					'm_department'=>$dataarray[$i]['department'],
					'm_tel'=>$dataarray[$i]['tel'],
					'uimg'=>$dataarray[$i]['img'],
					'm_type'=>$dataarray[$i]['type'],
	            );
	            $this->db->insert('member', $data);
	        }
	    }


	    public function getmamber_p($compcode)
            {
              $this->db->select('*');
              $this->db->where('compcode',$compcode);
              $query = $this->db->get('member');
              $res = $query->result();
              return $res;
            }
}