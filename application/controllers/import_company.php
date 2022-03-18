<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class import_company extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library(array('cart','session'));
            $this->load->helper(array('url','html','form','file'));

        }

       
        function do_upload(){
                $session_data = $this->session->userdata('sessed_in');
                $username = $session_data['username'];
                $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1
                $data = $this->excel_reader->sheets[0] ;
                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadcompany($data);
            }
                redirect('datastore/archive_company');
        }

        function do_upload_employee(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['m_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['m_name'] = $data['cells'][$i][2];
                $dataexcel[$i]['m_user'] = $data['cells'][$i][3];
                $dataexcel[$i]['m_pass'] = $data['cells'][$i][4];
                $dataexcel[$i]['m_position'] = $data['cells'][$i][5];
                $dataexcel[$i]['m_type'] = $data['cells'][$i][6];
                $dataexcel[$i]['m_email'] = $data['cells'][$i][7];
                $dataexcel[$i]['m_tel'] = $data['cells'][$i][8];
                
                     
                }
                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploademployee($data);
            }
                redirect('data_master/setupemployee');
        }
        function do_upload_systemjobtype(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['systemcode'] = $data['cells'][$i][1];
                $dataexcel[$i]['systemname'] = $data['cells'][$i][2];
                     
                }
                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadpjjob($dataexcel);
            }
                redirect('data_master/setupsystem');
        }
        function do_upload_acchart(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['act_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['act_name'] = $data['cells'][$i][2];
                $dataexcel[$i]['act_header'] = $data['cells'][$i][3];
                $dataexcel[$i]['act_acc_h'] = $data['cells'][$i][4];
                     
                }
                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadacchart($dataexcel);
            }
                redirect('data_master/accchart_list');
        }
        function do_upload_bankaccount(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['bank_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['branch_code'] = $data['cells'][$i][2];
                $dataexcel[$i]['acc_name'] = $data['cells'][$i][3];
                $dataexcel[$i]['acc_type'] = $data['cells'][$i][4];
                     
                }
                // Sheet 2 bank branch
                $data2 = $this->excel_reader->sheets[1] ;
                $dataexcel2 = Array();
                for ($i = 2; $i <= $data2['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel2[$i]['bank_code'] = $data2['cells'][$i][1];
                $dataexcel2[$i]['branch_code'] = $data2['cells'][$i][2];
                $dataexcel2[$i]['branch_name'] = $data2['cells'][$i][3];
                $dataexcel2[$i]['branch_address'] = $data2['cells'][$i][4];
                     
                }
                // Sheet 3 bank
                $data3 = $this->excel_reader->sheets[2] ;
                $dataexcel3 = Array();
                for ($i = 2; $i <= $data3['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel3[$i]['bank_code'] = $data3['cells'][$i][1];
                $dataexcel3[$i]['bank_name'] = $data3['cells'][$i][2];
                $dataexcel3[$i]['bank_address'] = $data3['cells'][$i][3];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadaccbank($dataexcel,$dataexcel2,$dataexcel3);
            }
                redirect('data_master/new_bank');
        }
        function do_upload_optional_pay(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['op_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['op_name'] = $data['cells'][$i][2];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadoptional($dataexcel);
            }
                redirect('data_master/ar_option');
        }
        function do_upload_setupwt(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['id_wt'] = $data['cells'][$i][1];
                $dataexcel[$i]['name_wt'] = $data['cells'][$i][2];
                $dataexcel[$i]['per_wt'] = $data['cells'][$i][3];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadwtsetup($dataexcel);
            }
                redirect('contract/wt_contract');
        }
        function do_upload_venderlist(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['vender_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['vender_name'] = $data['cells'][$i][2];
                $dataexcel[$i]['vender_address'] = $data['cells'][$i][3];
                $dataexcel[$i]['vender_tel'] = $data['cells'][$i][4];
                $dataexcel[$i]['vender_fax'] = $data['cells'][$i][5];
                $dataexcel[$i]['vender_tax'] = $data['cells'][$i][6];
                $dataexcel[$i]['vender_taxtype'] = $data['cells'][$i][7];
                $dataexcel[$i]['vender_credit'] = $data['cells'][$i][8];
                $dataexcel[$i]['vender_sale'] = $data['cells'][$i][9];
                $dataexcel[$i]['vender_size'] = $data['cells'][$i][10];
                $dataexcel[$i]['vender_type'] = $data['cells'][$i][11];
                $dataexcel[$i]['vat'] = $data['cells'][$i][12];
                $dataexcel[$i]['mobile'] = $data['cells'][$i][13];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadvenderlist($dataexcel);
            }
                redirect('data_master/vender_list');
        }
        function do_upload_expense(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['expens_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['expens_name'] = $data['cells'][$i][2];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadexpense($dataexcel);
            }
                redirect('data_master/expensother');
        }
        function do_upload_lessother(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['id_lessother'] = $data['cells'][$i][1];
                $dataexcel[$i]['less_name'] = $data['cells'][$i][2];
                $dataexcel[$i]['less_ac'] = $data['cells'][$i][3];
                $dataexcel[$i]['less_costcode'] = $data['cells'][$i][4];
                $dataexcel[$i]['less_tax'] = $data['cells'][$i][5];
                $dataexcel[$i]['less_taxtype'] = $data['cells'][$i][6];
                $dataexcel[$i]['less_costname'] = $data['cells'][$i][7];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadlessother($dataexcel);
            }
                redirect('ap/lessother');
        }
        function do_upload_debtor (){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['debtor_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['debtor_name'] = $data['cells'][$i][2];
                $dataexcel[$i]['debtor_address'] = $data['cells'][$i][3];
                $dataexcel[$i]['debtor_tel'] = $data['cells'][$i][4];
                $dataexcel[$i]['debtor_fax'] = $data['cells'][$i][5];
                $dataexcel[$i]['debtor_tax'] = $data['cells'][$i][6];
                $dataexcel[$i]['debtor_taxtype'] = $data['cells'][$i][7];
                $dataexcel[$i]['debtor_credit'] = $data['cells'][$i][8];
                $dataexcel[$i]['debtor_sale'] = $data['cells'][$i][9];
                $dataexcel[$i]['debtor_worktype'] = $data['cells'][$i][10];
                $dataexcel[$i]['debtor_size'] = $data['cells'][$i][11];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploaddebtor($dataexcel);
            }
                redirect('data_master/setup_debtor');
        }
        function do_upload_acctbank (){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './uploads_file/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = 'true';       
            $this->load->library('upload', $config);
                    

            if (!$this->upload->do_upload())
            {
                    $errors = $this->upload->display_errors();
                echo $errors;
                
            }
            else
            {
                $data = array('error' => false);
                $upload_data = $this->upload->data();

                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('UTF-8');

                $file =  $upload_data['full_path'];
                $this->excel_reader->read($file);
                error_reporting(E_ALL ^ E_NOTICE);

                // Sheet 1 bank account
                $data = $this->excel_reader->sheets[0] ;
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['bookcode'] = $data['cells'][$i][1];
                $dataexcel[$i]['booknamz'] = $data['cells'][$i][2];
                $dataexcel[$i]['gl_type'] = $data['cells'][$i][3];
                     
                }

                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadglbook($dataexcel);
            }
                redirect('gl/gl_bookaccount');
        }


}