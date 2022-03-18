<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class costcode extends CI_Controller {

        function __construct() {

            parent::__construct();
            $this->load->model('costcode_m');
        }

        public function getcostcode()
        {
            $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
          	$type = $this->uri->segment(3);
          	$group = $this->uri->segment(4);
          	$sub = $this->uri->segment(5);
            $sub4 = $this->uri->segment(6);
            $sub5 = $this->uri->segment(7);
            $costchk = $this->costcode_m->checkcostlevel($compcode);
            switch ($costchk[0]['costlevel']) {
              case '3':
                $sname =  $this->costcode_m->subgroupcostname3($type,$group,$sub);
                echo trim($sname[0]['csubgroup_name']);
                break;
              case '4':
                $sname =  $this->costcode_m->subgroupcostname4($type,$group,$sub,$sub4);
                if ($sname[0]['cgroup_name4']!=NULL) {
                  echo trim($sname[0]['csubgroup_name']);
                }else{
                  echo trim($sname[0]['cgroup_name4']);
                }
                break;
              case '5':
                $sname =  $this->costcode_m->subgroupcostname($type,$group,$sub,$sub4,$sub5);
                foreach ($sname as $s) {
                  echo trim($s->cgroup_name5);
                }
                break;
            }
          	return true;
        }
    }