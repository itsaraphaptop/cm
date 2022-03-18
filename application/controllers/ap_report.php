<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ap_report extends CI_Controller {
	public function __construct() {
            parent::__construct();
            $this->load->model("apreport_m");
        }
        public function ap_taxvat()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_taxvat.mrt&compcode=$compcode");
        }

        public function ap_withholding3()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_holdtax3.mrt&compcode=$compcode");
        }

        public function ap_withholding1()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_holdtax1.mrt&compcode=$compcode");
        }

        public function ap_withholding2()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_holdtax2.mrt&compcode=$compcode");
        }

        public function ap_withholding53()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_holdtax53.mrt&compcode=$compcode");
        }

        public function ap_withholding54()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_holdtax54.mrt&compcode=$compcode");
        }

        public function ap_individual_project()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_individual_project.mrt&compcode=$compcode");
        }
        public function ap_description_address()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_description_address.mrt&compcode=$compcode");
        }
        public function ap_individual_job()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_individual_job.mrt&compcode=$compcode");
        }
        public function ap_individual_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_individual_creditor.mrt&compcode=$compcode");
        }
       	public function ap_sort_project()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_sort_project.mrt&compcode=$compcode");
        } 
        public function ap_sort_job()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_sort_job.mrt&compcode=$compcode");
        } 
        public function ap_sort_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_sort_creditor.mrt&compcode=$compcode");
        } 
        public function ap_sort_cre_pro()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_sort_cre_pro.mrt&compcode=$compcode");
        } 
        public function ap_separate_system()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_separate_system.mrt&compcode=$compcode");
        } 
        public function ap_age_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_age_creditor.mrt&compcode=$compcode");
        } 
        public function ap_conclude_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_conclude_creditor.mrt&compcode=$compcode");
        }
        public function ap_balance_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_balance_creditor.mrt&compcode=$compcode");
        }

        public function ap_balance_project()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_balance_project.mrt&compcode=$compcode");
        }

        public function ap_balance_certificate()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_balance_certificate.mrt&compcode=$compcode");
        }

        public function ap_abstract_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_abstract_creditor.mrt&compcode=$compcode");
        }
        
        public function ap_abstract_pro_cred()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_abstract_pro_cred.mrt&compcode=$compcode");
        }

        public function ap_abstract_project()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_abstract_project.mrt&compcode=$compcode");
        }

        public function ap_pay_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_pay_creditor.mrt&compcode=$compcode");
        }
        
        public function ap_classify_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_classify_creditor.mrt&compcode=$compcode");
        }

        public function ap_classify_account()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_classify_account.mrt&compcode=$compcode");
        }
        public function ap_total_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_total_creditor.mrt&compcode=$compcode");
        }

        public function ap_total_account()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_total_account.mrt&compcode=$compcode");
        }

        public function ap_description_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_description_creditor.mrt&compcode=$compcode");
        }

        public function ap_chque_bank()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_chque_bank.mrt&compcode=$compcode");
        }

        public function ap_chque_no()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_chque_no.mrt&compcode=$compcode");
        }

        public function ap_chque_project()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_chque_project.mrt&compcode=$compcode");
        }
        public function ap_chque_paid()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_chque_paid.mrt&compcode=$compcode");
        }
        public function ap_chque_pl()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_chque_pl.mrt&compcode=$compcode");
        }
        public function ap_statuschque_pl()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_statuschque_pl.mrt&compcode=$compcode");
        }
        public function ap_statuschque_no()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_statuschque_no.mrt&compcode=$compcode");
        }
        public function ap_cut_project()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cut_project.mrt&compcode=$compcode");
        }
        public function ap_cut_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cut_creditor.mrt&compcode=$compcode");
        }
        public function ap_cut_pl()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cut_pl.mrt&compcode=$compcode");
        }
        public function ap_cutsum_project()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cutsum_project.mrt&compcode=$compcode");
        }
        public function ap_cutsum_creditor()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cutsum_creditor.mrt&compcode=$compcode");
        }
        public function ap_cutsum_bank()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cutsum_bank.mrt&compcode=$compcode");
        }
        public function ap_cutsum_option()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_cutsum_option.mrt&compcode=$compcode");
        }
        public function ap_paid_pl()
        {
          $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
           $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ap_paid_pl.mrt&compcode=$compcode");
        }
        
}