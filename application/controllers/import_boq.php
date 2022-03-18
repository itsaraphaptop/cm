<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class import_boq extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library(array('cart','session'));
            $this->load->helper(array('url','html','form','file'));
            

        }

        function do_upload(){
            $pj=0;
            $pj=$this->uri->segment(3);
            $pjid=$this->uri->segment(4);
                $session_data = $this->session->userdata('sessed_in');
                $username = $session_data['username'];
                $compcode = $session_data['compcode'];
            $config['upload_path'] = './boq_upload/';
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
                    $dataexcel[$i]['boq_job'] = trim($data['cells'][$i][1]); //A
                    $dataexcel[$i]['newmatcode'] = trim($data['cells'][$i][2]); //B
                    $dataexcel[$i]['newmatnameim'] = trim($data['cells'][$i][3]); //C
                    $dataexcel[$i]['matcodelabor'] = trim($data['cells'][$i][4]); //D
                    $dataexcel[$i]['newmatnamelabor'] = trim($data['cells'][$i][5]); //E
                    $dataexcel[$i]['subcostcode'] = trim($data['cells'][$i][6]); //F
                    $dataexcel[$i]['subcostcodelabor'] = trim($data['cells'][$i][7]); //G
                    $dataexcel[$i]['boqcode'] = trim($data['cells'][$i][8]); //H
                    $dataexcel[$i]['matboq'] = trim($data['cells'][$i][9]); //I
                    $dataexcel[$i]['unitcode'] = trim($data['cells'][$i][10]); //J
                    $dataexcel[$i]['qty_bg'] = $data['cells'][$i][11]; //K
                    $dataexcel[$i]['matpricebg'] = $data['cells'][$i][12]; //L
                    $dataexcel[$i]['matamtbg'] = $data['cells'][$i][13]; //M
                    $dataexcel[$i]['labpricebg'] = $data['cells'][$i][14]; //N
                    $dataexcel[$i]['labamtbg'] = $data['cells'][$i][15]; //O
                    $dataexcel[$i]['subpricebg'] = $data['cells'][$i][16]; //P
                    $dataexcel[$i]['subamtbg'] = $data['cells'][$i][17]; //Q
                    $dataexcel[$i]['bgtotal'] = $data['cells'][$i][18]; //R
                    $dataexcel[$i]['qtyboq'] = $data['cells'][$i][19]; //S
                    $dataexcel[$i]['matpriceboq'] = $data['cells'][$i][20]; //T
                    $dataexcel[$i]['matamtboq'] = $data['cells'][$i][21]; //U
                    $dataexcel[$i]['labpriceboq'] = $data['cells'][$i][22]; //V
                    $dataexcel[$i]['labamtboq'] = $data['cells'][$i][23]; //W
                    $dataexcel[$i]['subpriceboq'] = $data['cells'][$i][24]; //X
                    $dataexcel[$i]['subamtboq'] = $data['cells'][$i][25]; //Y
                    $dataexcel[$i]['boqtotal'] = $data['cells'][$i][26]; //Z

                    // $dataexcel[$i]['subcostname'] = $data['cells'][$i][6]; 
                    // $dataexcel[$i]['subcostnamelabor'] = $data['cells'][$i][6];
                    // echo $i." - ".$data['cells'][$i][3]." <br/>";  
                          
                }
                            
                    // die();
                delete_files($upload_data['file_path']);
                $this->load->model('importexcel_boq');
                // $this->load->model('datastore_m');    
                $this->importexcel_boq->bottoexcel($dataexcel,$pj,$username,$compcode,$pjid,$i);
                // $data['boq'] = $this->importexcel_boq->getboq($compcode);
            }
            //  redirect('bd/add_boq/'.$pj.'/'.$revn.'');
                redirect('bd/addnewboq/'.$pj.'/'.$pjid.'/p');
        }
        


        function import_costcode(){
            
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $config['upload_path'] = './costcode_excel/';
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
                for ($i = 1; $i <= $data['numRows']; $i++) {

                                if($data['cells'][$i][1] == '') break;
                            $dataexcel[$i-1]['costcode1'] = $data['cells'][$i][1];
                            $dataexcel[$i-1]['costname1'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['costcode2'] = $data['cells'][$i][3];
                            $dataexcel[$i-1]['costname2'] = $data['cells'][$i][4];
                            $dataexcel[$i-1]['costcode3'] = $data['cells'][$i][5];
                            $dataexcel[$i-1]['costname3'] = $data['cells'][$i][6];
                            $dataexcel[$i-1]['costcode4'] = $data['cells'][$i][7];
                            $dataexcel[$i-1]['costname4'] = $data['cells'][$i][8];
                            $dataexcel[$i-1]['costcode5'] = $data['cells'][$i][9];
                            $dataexcel[$i-1]['costname5'] = $data['cells'][$i][10];
                            $dataexcel[$i-1]['costcode_d'] = $data['cells'][$i][11];
                            $dataexcel[$i-1]['costcode_h'] = $data['cells'][$i][12];
                            $dataexcel[$i-1]['costhead'] = $data['cells'][$i][13];      
                }
                                                        
                    
                $this->load->model('importexcel_boq');
                // $this->load->model('datastore_m');    
                $this->importexcel_boq->bottoexcelcostcode($dataexcel);
                $data['boq'] = $this->importexcel_boq->getboq($compcode);
            }
                redirect('data_master/setupcostcode_main');
        }

        


}