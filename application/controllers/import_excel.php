<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class import_excel extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library(array('cart','session'));
            $this->load->helper(array('url','html','form','file'));
            

        }

        function do_upload()
            {
                  $session_data = $this->session->userdata('sessed_in');
                  $username = $session_data['username'];
                  $compcode = $session_data['compcode'];
                $config['upload_path'] = './temp_upload/';
                $config['allowed_types'] = 'xls';
                        
                $this->load->library('upload', $config);
                        

                if ( ! $this->upload->do_upload())
                {
                    $data = array('error' => $this->upload->display_errors());
                    
                }
                else
                {
                    $data = array('error' => false);
                    $upload_data = $this->upload->data();

                    $this->load->library('excel_reader');
                    $this->excel_reader->setOutputEncoding('CP1251');

                    $file =  $upload_data['full_path'];
                    $this->excel_reader->read($file);
                    error_reporting(E_ALL ^ E_NOTICE);

                    // Sheet 1
                    $data = $this->excel_reader->sheets[0] ;
                                $dataexcel = Array();
                    for ($i = 1; $i <= $data['numRows']; $i++) {

                                    if($data['cells'][$i][1] == '') break;
                                    $dataexcel[$i-1]['id'] = $data['cells'][$i][1];
                                    $dataexcel[$i-1]['code'] = $data['cells'][$i][2];
                                    $dataexcel[$i-1]['name'] = $data['cells'][$i][3];
                                    $dataexcel[$i-1]['user'] = $data['cells'][$i][4];
                                    $dataexcel[$i-1]['pass'] = $data['cells'][$i][5];
                                    $dataexcel[$i-1]['status'] = $data['cells'][$i][6];
                                    $dataexcel[$i-1]['position'] = $data['cells'][$i][7];
                                    $dataexcel[$i-1]['type'] = $data['cells'][$i][8];
                                    $dataexcel[$i-1]['email'] = $data['cells'][$i][10];
                                    $dataexcel[$i-1]['project'] = $data['cells'][$i][11];
                                    $dataexcel[$i-1]['department'] = $data['cells'][$i][12];
                                    $dataexcel[$i-1]['tel'] = $data['cells'][$i][13];
                                    $dataexcel[$i-1]['img'] = $data['cells'][$i][14];
                                    $dataexcel[$i-1]['compcode'] = $data['cells'][$i][15];

                    }
                                
                                
                    delete_files($upload_data['file_path']);
                    $this->load->model('importexcel_m');
                    $this->load->model('datastore_m');    
                    $this->importexcel_m->tambahuser($dataexcel);
                    $data['user'] = $this->importexcel_m->getmamber_p($compcode);
                }
                redirect('data_master/setupemployee');
            }


}