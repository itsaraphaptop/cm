<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userprofile extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
            $this->load->model('hr_m');
        }
        public function index()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['prof'] = $this->datastore_m->getmember_byuser($username);

          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/user_profile_v');
          $this->load->view('base/footer_v');
        }
        public function selemp()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];

          $this->load->model('hr_m');
          $da['getemp'] = $this->hr_m->selemp();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/emp_list_v');
          $this->load->view('base/footer_v');

        }

        public function edit_empp()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          // $da['prof'] = $this->datastore_m->getmember_byuser($username);
          $da['edu'] = $this->hr_m->emp_profile_m($id);
          $da['eee'] = $this->hr_m->getgroedu_m();
          $da['ccc'] = $this->hr_m->getedu_m();
          $da['con'] = $this->hr_m->emp_contact_m($id);
          $da['educ'] = $this->hr_m->emp_edu_m($id);
          $da['getemp'] = $this->hr_m->selemp();
          $da['com'] = $this->hr_m->emp_com_m($id);
          $da['ski'] = $this->hr_m->emp_skiil_m($id);
          $da['oth'] = $this->hr_m->emp_otherskill_m($id);
          $da['beh'] = $this->hr_m->emp_behave_m($id);
          $da['pro'] = $this->hr_m->getproject_m();
          $da['de'] = $this->hr_m->getdepartment_m();
          $da['poss'] = $this->hr_m->getposition_m();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/edit_emp_v');
          $this->load->view('base/footer_v');

        }
        public function gethr()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['prof'] = $this->datastore_m->getmember_byuser($username);
          $da['edu'] = $this->hr_m->getgroedu_m();
          $da['eduu'] = $this->hr_m->getedu_m();
          $da['tra'] = $this->hr_m->gettrain_m();
          $da['pro'] = $this->hr_m->getproject_m();
          $da['de'] = $this->hr_m->getdepartment_m();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
					$this->load->view('userprofile/emp_add_v');
          $this->load->view('base/footer_v');

        }

        public function showemp()
        {
          $id=$this->uri->segment(3);
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=showemp.mrt&code=$id");
        }
        public function edit_emp()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];

          // $this->load->model('hr_m');
          // $da['getemp'] = $this->hr_m->selemp();

          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/emp_edit');
          $this->load->view('base/footer_v');

        }
				public function userimgg()
				{
          $id=$this->uri->segment(3);
					$session_data = $this->session->userdata('sessed_in');
					$username = $session_data['username'];
					$da['name'] = $session_data['m_name'];
					$da['depid'] = $session_data['m_depid'];
					$da['dep'] = $session_data['m_dep'];
					$da['projid'] = $session_data['projectid'];
					$projectid = $session_data['projectid'];
					$da['project'] = $session_data['m_project'];
					$da['imgu'] = $session_data['img'];
					$this->load->model('hr_m');
					 $da['getimg'] = $this->hr_m->imguser($id);
					$this->load->view('navtail/base_master/header_v',$da);
					$this->load->view('navtail/base_master/tail_v');
					$this->load->view('userprofile/addimg_v');
					$this->load->view('base/footer_v');
				}

				public function getjob()
				{

					$session_data = $this->session->userdata('sessed_in');
					$username = $session_data['username'];
					$da['name'] = $session_data['m_name'];
					$da['depid'] = $session_data['m_depid'];
					$da['dep'] = $session_data['m_dep'];
					$da['projid'] = $session_data['projectid'];
					$projectid = $session_data['projectid'];
					$da['project'] = $session_data['m_project'];
					$da['imgu'] = $session_data['img'];

					// $this->load->model('hr_m');
					// $da['getemp'] = $this->hr_m->selemp();

						// echo "text" ;
				}

				public function rqtrule()
				{
             function DateDiff($strDate1,$strDate2)
           {
                return (strtotime($strDate2) - strtotime($strDate1))/( 60 * 60 * 24 );
           }
          $session_data = $this->session->userdata('sessed_in');
          $m_id=$session_data['m_id'];
          $da['m_id']=$session_data['m_id']; //auth
          $da['name'] = $session_data['m_name'];
          $mid = $session_data['m_id'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $mem=$this->db->query("SELECT * from member join emp_company_tb on emp_company_tb.emp_member=member.m_code where m_id='$m_id' ")->result();
          if ($mem) {
            foreach ($mem as $m) {
            $m_code = $m->m_code;
            $emp_start = $m->emp_start;
         }
         if ($emp_start!="") {
              $datenow = Date("Y-m-d");
            $cdate = DateDiff($emp_start,$datenow);

            if ($cdate >=120) {
              $datac = array(
            'emp_status' => 1,
            );
            $this->db->where('emp_member',$m_code);
            $this->db->update('emp_company_tb',$datac);
           } else{
               $datac2 = array(
            'emp_status' => 2,
            );
            $this->db->where('emp_member',$m_code);
            $this->db->update('emp_company_tb',$datac2);
            }
          }else{
                $datac2 = array(
            'emp_status' => 2,
            );
            $this->db->where('emp_member',$m_code);
            $this->db->update('emp_company_tb',$datac2);
          }  
          }
          $da['mas'] = $this->hr_m->getleave_m();
          $da['ma'] = $this->hr_m->getleave_mm();
          $da['com'] = $this->hr_m->emp_company_m($m_id);
          $da['pro'] = $this->hr_m->emp_profilee_m($m_id);
					$this->load->view('navtail/base_master/header_v',$da);
					$this->load->view('navtail/base_master/tail_v');
					$this->load->view('userprofile/emp_leave_v');
					$this->load->view('base/footer_v');
				}

        public function history()
        {

          $session_data = $this->session->userdata('sessed_in');
          $m_id=$session_data['m_id'];
          $da['m_id']=$session_data['m_id']; //auth
          $da['name'] = $session_data['m_name'];
          $mid = $session_data['m_id'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['mas'] = $this->hr_m->getleave_m();
          $da['com'] = $this->hr_m->emp_company_m($m_id);
          $da['pro'] = $this->hr_m->emp_profilee_m($m_id);
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/edit_leave_v');
          $this->load->view('base/footer_v');
        }

				// public function msgleave()
				// {
				//
				// 	// $idemp = $_REQUEST['emp_id'];
				// 	$session_data = $this->session->userdata('sessed_in');
				// 	// $username = $session_data['username'];
				// 	$da['m_id']=$session_data['m_id']; //auth
				// 	$da['name'] = $session_data['m_name'];
				// 	$mid = $session_data['m_id'];
				// 	$da['depid'] = $session_data['m_depid'];
				// 	$da['dep'] = $session_data['m_dep'];
				// 	$da['projid'] = $session_data['projectid'];
				// 	// $projectid = $session_data['projectid'];
				// 	$da['project'] = $session_data['m_project'];
				// 	$da['imgu'] = $session_data['img'];
				// 	$this->load->model('hr_m');
				// 	/$da['getl'] = $this->hr_m->getmsgleave($mid);
				// 	// $da['getrule'] = $this->hr_m->getrule($mid);
				// 	$this->load->view('navtail/base_master/header_v',$da);
				// 	$this->load->view('navtail/base_master/tail_v');
				// 	$this->load->view('userprofile/emp_lead_v');
				// 	$this->load->view('base/footer_v');
				// 	// print "<script>alert('$mid');</script>";
				// }
      public function ExportPDF()
      {
      	$id=$this->uri->segment(3);
      	 $session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
      	$da['name'] = $session_data['m_name'];
      	$da['depid'] = $session_data['m_depid'];
      	$da['dep'] = $session_data['m_dep'];
      	$da['projid'] = $session_data['projectid'];
      	$projectid = $session_data['projectid'];
      	$da['project'] = $session_data['m_project'];
      	$da['imgu'] = $session_data['img'];
      	$this->load->model('hr_m');
      	$da['getemp'] = $this->hr_m->selectempByID($id);
      	$this->load->view('navtail/base_master/header_v',$da);
      	$this->load->view('navtail/base_master/tail_v');
      	$this->load->view('userprofile/emp_report_v');
      	$this->load->view('base/footer_v');
      }

      public function edit_edu()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['edu'] = $this->hr_m->emp_profile_m($id);
          $da['id']=$this->uri->segment(3);
          $da['edu'] = $this->hr_m->getgroedu_m();
          $da['eduu'] = $this->hr_m->getedu_m();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/edit_edu_v');
          $this->load->view('base/footer_v');
        }
        public function proedit_edu()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['edu'] = $this->hr_m->emp_profile_m($id);
          $da['id']=$this->uri->segment(3);
          $da['edu'] = $this->hr_m->getgroedu_m();
          $da['eduu'] = $this->hr_m->getedu_m();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/proedit_edu_v');
          $this->load->view('base/footer_v');
        }
      public function edit_job()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['id']=$this->uri->segment(3);
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/edit_job_v');
          $this->load->view('base/footer_v');

        }

        public function proedit_job()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['id']=$this->uri->segment(3);
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/proedit_job_v');
          $this->load->view('base/footer_v');

        }

        public function edit_train()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['id']=$this->uri->segment(3);
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/edit_train_v');
          $this->load->view('base/footer_v');

        }

        public function proedit_train()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['id']=$this->uri->segment(3);
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/proedit_train_v');
          $this->load->view('base/footer_v');

        }
        public function leaveapprove()
        {
          $session_data = $this->session->userdata('sessed_in');
          $m_id=$session_data['m_id'];
          $da['m_id']=$session_data['m_id'];
          $da['name'] = $session_data['m_name'];
          $mid = $session_data['m_id'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['lea'] = $this->hr_m->getleavell();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/leave_approve_v');
          $this->load->view('base/footer_v');

        }

        public function report_leave()
        {
          $session_data = $this->session->userdata('sessed_in');
          $m_id=$session_data['m_id'];
          $da['m_id']=$session_data['m_id'];
          $da['name'] = $session_data['m_name'];
          $mid = $session_data['m_id'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['lea'] = $this->hr_m->emp_leave_m($m_id);
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/leave_report_v');
          $this->load->view('base/footer_v');

        }

        public function edit_profile()
        {
          $id=$this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          // $da['prof'] = $this->datastore_m->getmember_byuser($username);
          $da['edu'] = $this->hr_m->emp_profile_m($id);
          $da['eee'] = $this->hr_m->getgroedu_m();
          $da['ccc'] = $this->hr_m->getedu_m();
          $da['con'] = $this->hr_m->emp_contact_m($id);
          $da['educ'] = $this->hr_m->emp_edu_m($id);
          $da['getemp'] = $this->hr_m->selemp();
          $da['com'] = $this->hr_m->emp_com_m($id);
          $da['ski'] = $this->hr_m->emp_skiil_m($id);
          $da['oth'] = $this->hr_m->emp_otherskill_m($id);
          $da['beh'] = $this->hr_m->emp_behave_m($id);
          $da['pro'] = $this->hr_m->getproject_m();
          $da['de'] = $this->hr_m->getdepartment_m();
          $da['poss'] = $this->hr_m->getposition_m();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/edit_profile_v');
          $this->load->view('base/footer_v');

        }

        public function leaveall()
        {
          $session_data = $this->session->userdata('sessed_in');
          $m_id=$session_data['m_id'];
          $da['m_id']=$session_data['m_id'];
          $da['name'] = $session_data['m_name'];
          $mid = $session_data['m_id'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['le'] = $this->hr_m->getleavell();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/leave_all_v');
          $this->load->view('base/footer_v');

        }

        public function delectemp()
        {
          $session_data = $this->session->userdata('sessed_in');
          $m_id=$session_data['m_id'];
          $da['m_id']=$session_data['m_id'];
          $da['name'] = $session_data['m_name'];
          $mid = $session_data['m_id'];
          $da['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $da['projid'] = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['de'] = $this->hr_m->get_delectemp();
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('userprofile/delectemp_v');
          $this->load->view('base/footer_v');

        }
}
