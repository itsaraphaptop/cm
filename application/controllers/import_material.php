<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class import_material extends CI_Controller {
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
                $dataexcel = Array();
                for ($i = 2; $i <= $data['numRows']; $i++) {

                // if($data['cells'][$i][2] == '') break;
                $dataexcel[$i]['matunit_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['matunit_name'] = $data['cells'][$i][2];
                $dataexcel[$i]['matspec_code'] = $data['cells'][$i][3];
                
                $dataexcel[$i]['matspec_status'] = $data['cells'][$i][4];
                $dataexcel[$i]['mattype_code'] = $data['cells'][$i][5];
                $dataexcel[$i]['matgroup_code'] = $data['cells'][$i][6];
                $dataexcel[$i]['matsubgroup_code'] = $data['cells'][$i][7];
                $dataexcel[$i]['matcode'] = $data['cells'][$i][8];
                $dataexcel[$i]['matbrand_code'] = $data['cells'][$i][9];
                $dataexcel[$i]['compcode'] = $data['cells'][$i][10];
                $dataexcel[$i]['materialcode'] = $data['cells'][$i][11];          
                $dataexcel[$i]['materialname'] = $data['cells'][$i][12];          
                $dataexcel[$i]['materialspacname'] = $data['cells'][$i][13];          
                $dataexcel[$i]['materialbrandname'] = $data['cells'][$i][14];          
                }
                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadmat($dataexcel);
            }
                redirect('data_master/newmatcode');
        }
        function do_upload_unit(){
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
                $dataexcel[$i]['unit_code'] = $data['cells'][$i][1];
                $dataexcel[$i]['unit_name'] = $data['cells'][$i][2];
                $dataexcel[$i]['compcode'] = $data['cells'][$i][3];
                     
                }
                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                $this->importexcel_boq->uploadunit($dataexcel);
            }
                redirect('data_master/setupunit');
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
                $this->importexcel_boq->uploademployee($dataexcel);
            }
                // redirect('data_master/setupemployee');
        }


}