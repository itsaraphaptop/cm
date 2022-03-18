<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class management_active extends CI_Controller {

          public function __construct() {
            parent::__construct();
            $this->load->helper('date');
            $this->load->model('manag_m');
            $this->load->model('progress_submit');
            $this->load->helper('my_parse_num_helper');
            $this->load->helper(array('form', 'url', 'file','notify_message'));
            $this->load->library('image_lib');
        }
        public function index(){
          $array = $this->get_mouth_of_year("2017-09-01","2017-11-30");
          var_dump($array);
        }

        public function gen_unique($code , $tbname, $column)
        {
          $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get($tbname);
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

          if ($res==0) {
               return $smcode = $code.date($datestring).date($mm)."000"."1";
                $sm_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by($column,'desc');
               // $this->db->order_by('progress_submit.submit_no','desc');
               $this->db->limit('1');
               $q = $this->db->get($tbname);
               // $q = $this->db->get('progress_submit');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id_submit+1;
               }

               if ($x1<=9) {
                  return $smcode = $code.date($datestring).date($mm)."000".$x1;
                  $sm_item = $x1;
               }
               elseif ($x1<=99) {
                 return $smcode = $code.date($datestring).date($mm)."00".$x1;
                 $sm_item = $x1;
               }
               elseif ($x1<=999) {
                 return $smcode = $code.date($datestring).date($mm)."0".$x1;
                 $sm_item = $x1;
               }
             }
        }



        public function progress_submit_add()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $arr_form = $this->input->post();
          if ($arr_form['event_type'] == "add") {
            $datestring = "Y";
             $mm = "m";
             $dd = "d";
             $code = "Sm-";
             $this->db->select('*');
             $qu = $this->db->get('progress_submit');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

          if ($res==0) {
                $smcode = $code.date($datestring).date($mm)."000"."1";
                $sm_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id_submit','desc');
               // $this->db->order_by('progress_submit.submit_no','desc');
               $this->db->limit('1');
               $q = $this->db->get('progress_submit');
               // $q = $this->db->get('progress_submit');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id_submit+1;
               }

               if ($x1<=9) {
                   $smcode = $code.date($datestring).date($mm)."000".$x1;
                  $sm_item = $x1;
               }
               elseif ($x1<=99) {
                  $smcode = $code.date($datestring).date($mm)."00".$x1;
                 $sm_item = $x1;
               }
               elseif ($x1<=999) {
                  $smcode = $code.date($datestring).date($mm)."0".$x1;
                 $sm_item = $x1;
               }
             }
          }else if ($arr_form['event_type'] == "edit") {
            $smcode = $arr_form['refferent'];
          }
           


          
          // init value
            $arr_header = [
              'submit_no' => $smcode,
              'refferent' => $arr_form['refferent'],
              'date' => $arr_form['date'],
              'year' => $arr_form['year'],
              'month' => $arr_form['month'],
              'payment_type' => $arr_form['payment_type'],
              'site_no' => $arr_form['site_no'],
              'after_site_no' => $arr_form['after_site_no'],
              'customer' => $arr_form['customer'],
              'after_customer' => $arr_form['after_customer'],
              'subject_remark' => $arr_form['subject_remark'],
              'period' => $arr_form['period'],
              'amount_submit' => parse_num($arr_form['amount_submit']),
              'amount_certificate' => parse_num($arr_form['amount_certificate']),
              'avance' => parse_num($arr_form['avance']),
              'after_avance' => parse_num($arr_form['after_avance']),
              'vat' => parse_num($arr_form['vat']),
              'after_vat' => parse_num($arr_form['after_vat']),
              'currency' => parse_num($arr_form['currency']),
              'exchang' => parse_num($arr_form['exchang']),
              'retention' => parse_num($arr_form['retention']),
              'after_retention' => parse_num($arr_form['after_retention']),
              'wt' => parse_num($arr_form['wt']),
              'after_wt' => parse_num($arr_form['after_wt']),
              'net_amount' => parse_num($arr_form['net_amount']),
              'printletter' => $arr_form['printletter'],
              'date_certificate' => $arr_form['cdate'],
              'status' => $arr_form['cstatus'],
            ];

          if ($arr_form['event_type'] == "add") {
            // echo $arr_form['event_type'];
            // $smcode = $this->gen_unique('SM','progress_submit', 'progress_submit');
            // $arr_header['submit_no'] = $smcode;
            //Insert table progress_submit
            // $this->progress_submit->add_progress_header($arr_header);
            //Insert table progress_submit
            $this->db->insert('progress_submit',$arr_header);
            //Insert table progress_submit_detail
          for ($i=0; $i < count($arr_form['projectd_job']); $i++) {
              if (parse_num($arr_form['job_amount'][$i])<=0) {

              }else{
                $arr_body = array(
                  'submit_ref' => $smcode,
                  'project_id' => $arr_form['project_id'][$i],
                  'projectd_job' => $arr_form['projectd_job'][$i],
                  // 'amount_cer' => parse_num($arr_form['amount_cer'][$i]),
                  'job_amount' => parse_num($arr_form['job_amount'][$i]),
                  'import' => $arr_form['import'][$i]
                );
                $this->progress_submit->add_progress_body($arr_body);
              }
          }
            //Insert table progress_submit_detail
            $file_pgs = './select_file_pgsubmit';
            if (!file_exists($file_pgs)) {
              mkdir($file_pgs, 0700, true);
            }
            if (isset($_FILES['userfile']['name'])) {
              $config['upload_path'] = './select_file_pgsubmit/';
              $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|rar|docx|xls|pdf|zip|xlsx';
              $config['max_size'] = '204800';
              $config['max_width'] = '9999';
              $config['max_height'] = '9999';
              $rand = rand(1111, 9999);
              $date = date("Y-m-d ");
              $config['file_name'] = $date . $rand;
              $error = array();
              $success = array();
              $this->load->library('upload', $config);
              foreach ($_FILES as $field_name => $file) {
                if (!$this->upload->do_upload($field_name)) {
                  $error['upload'][] = $this->upload->display_errors();
                } else {
                  $upload_data = $this->upload->data();
                  if (!$this->image_lib->resize()) {
                    $error['resize'][] = $this->image_lib->display_errors();
                  } else {
                    $data['success'] = $upload_data;
                    $select_file_pgs = array(
                      'name_file' => $upload_data['file_name'],
                      'pgs_ref' => $smcode,
                      'date' => date('y-m-d'),
                      'time' => date('H:i:s'),
                      'user' => $compcode,
                    );
                    $query = $this->db->insert('select_file_pgsubmit', $select_file_pgs);
                  }
                }
              }
              echo $smcode;
              // return true;
        
            } else {
              echo "ไม่มีไฟล์";
              // return true;
            }
            redirect('management/ProgressSubmitEdit/'.$smcode.'/pgsub');
          }else if ($arr_form['event_type'] == "edit") {
           // echo $arr_form['event_type'];
           
            $eee =  $this->progress_submit->update_progress_header($arr_header,$arr_form['refferent']);
           for ($i=0; $i < count($arr_form['projectd_job']); $i++) {
            $arr_body = array(
              'submit_ref' => $smcode,
              'project_id' => $arr_form['project_id'][$i],
              'projectd_job' => $arr_form['projectd_job'][$i],
              'amount_cer' => parse_num($arr_form['amount_cer'][$i]),
              'job_amount' => parse_num($arr_form['job_amount'][$i]),
              'import' => $arr_form['import'][$i],

            );
              $this->progress_submit->update_progress_body($arr_body,$arr_form['ud_id'][$i]);
            }
            $this->db->where('submit_no', $arr_form['submit_no']);
            unset($arr_header["submit_no"]);
            $this->db->update('progress_submit', $arr_header);
             $file_pgs = './select_file_pgsubmit';
             if (!file_exists($file_pgs)) {
              mkdir($file_pgs, 0700);
            }
            redirect('management/ProgressSubmitEdit/'.$smcode.'/pgsub');
          }else {
            echo "Not event_type";
          }
          // $this->db->insert('progress_submit',$arr_header);
          
        
        }
        public function forcastinsert(){
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $add = $this->input->post();
          $pjcode = $this->uri->segment(3);
              for ($i=0; $i < count($add['boq_id']); $i++) {
              $data = array(
                'forecastbg' => $add['forcashbudget'][$i],
                'forecastremark' => $add['remarkforcast'][$i],              
                );
                $this->db->where('boq_id',$add['boq_id'][$i]);
                $this->db->update('boq_item',$data);

                 
               }

               $dataa = array(
               'forcast_useredit' => $username ."/". date('d-m-Y H:i:s'),
               'project_detail' =>$add['project_detail'],
               );
               $this->db->where('project_code',$pjcode);
               $this->db->update('project',$dataa);

               redirect('management/forcast/'.$pjcode);
            
    }

      public function approvebudget(){
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $add = $this->input->post();
            $pjcode = $this->uri->segment(3);

              $dataa = array(
               'approve_bg' => $add['approve_bg'],
               'approve_user' => $username ."/". date('d-m-Y H:i:s'),
               'project_detail' =>$add['project_detail'],
               );
               $this->db->where('project_code',$pjcode);
               $this->db->update('project',$dataa);
               if($add['approve_bg'] == 1){
                  $revise_budget_status = $this->revise_budget($pjcode);

               }else{
                  $revise_budget_status = true;
               }

               if($revise_budget_status){ 
                
                  redirect('management/approve_pbg/'.$pjcode);
               }else{
                  echo "การ revise_budget ผิดพลาด";
               }
               

      }
      //ikool009
      public function revise_budget($pjcode){
          // get revice project
        
          $this->db->select("bd_tenid,revise");
          $this->db->where("project_code",$pjcode);
          $this->db->limit(1);
          $query = $this->db->get("project");
          $res = $query->result_array();
          $bd_tenid = 0;
          $revise = 0;
          if(isset($res[0])){
            $revise = $res[0]["revise"];
            $bd_tenid = $res[0]["bd_tenid"];
          }

          //check duplicate revice
          $this->db->select("*"); 
          $this->db->where("boq_project",$bd_tenid);
          $this->db->where("revise",$revise);
          $query = $this->db->get("boq_item_revise");
          $row = $query->num_rows();
          //check duplicate revice

          if($row != 0){
              return true;
          }
          
          if($bd_tenid !== 0){
            
              $this->db->select("*");
              $this->db->where("boq_project",$bd_tenid);
              $query = $this->db->get("boq_item");
              $res = $query->result_array();
              //var_dump($res);
              $this->db->trans_begin();
              $status_insert = true;
              foreach ($res as $key => $value) {
                $value["revise"] = $revise; 

                $bool_insert = $this->db->insert("boq_item_revise",$value);
                if(!$bool_insert){
                  $status_insert = false;
                  break;
                }

              }

              if($status_insert){
                $this->db->trans_commit();
                return true;

              }else{
                $this->db->trans_rollback();
                return false;
              }

          }else{
              return false;
          }
          
          // get revice project


      }

      public function budget(){
          $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $add = $this->input->post();
            $pjcode = $this->uri->segment(3);

              $dataa = array(
               'revise' => $add['revisenum'],
               'approve_bg' => $add['numrevise'],
               'project_detail' =>$add['project_detail'],
               'revise_user' => $username ."/". date('d-m-Y H:i:s'),
               );
               $this->db->where('project_code',$pjcode);
               $this->db->update('project',$dataa);

           for ($i=0; $i < count($add['boq_id']); $i++) {
              $data = array(
                'controlcost' => $add['poi_control'][$i],
                'controlcostuser' => $username,
                'controlcostdate' => date('d-m-Y H:i:s'),             
                );
                $this->db->where('boq_id',$add['boq_id'][$i]);
                $this->db->update('boq_item',$data);

                 
               }


               redirect('management/project_budget2/'.$pjcode);

      }


      public function bd_controlbudget(){

  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  $boq_control = $this->uri->segment(3);
  $boq_id = $this->uri->segment(4);

  $ins = array(
    'chkcontroll' => $boq_control,
    );
  $this->db->where('boq_id',$boq_id);
  $q = $this->db->update('boq_item',$ins);
}
 
 public function delless(){
  $id = $this->uri->segment(3);
  $pj = $this->uri->segment(4);
  $this->db->where('id', $id);
  $this->db->delete('lessother');

  redirect('management/forcast_compart/'.$pj);
}


      public function income(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $pj = $this->uri->segment(3);
            $add = $this->input->post();
              for ($i=0; $i < count($add['year']); $i++) {
                if($add['chki'][$i]=="Y"){
                  $data = array(
                     'pj' => $pj,
                     'year' => $add['year'][$i],
                     'month' => $add['month'][$i],
                     'payment' => $add['payment'][$i],
                     'amount' => $add['amount'][$i],
                     'advanced' => $add['advanced'][$i],
                     'vat' => $add['vat'][$i],
                     'retention' => $add['retention'][$i],
                     'wt' => $add['wt'][$i],
                     'netex' => $add['netex'][$i],
                     'netin' => $add['netin'][$i],
                     'addate' => date('d-m-Y H:i:s'),
                     'useradd' => $username,
                            );
                  $this->db->insert('lessother',$data);
                  
               }else if($add['chki'][$i]=="X"){
                $data1 = array(
                     'pj' => $pj,
                     'year' => $add['year'][$i],
                     'month' => $add['month'][$i],
                     'payment' => $add['payment'][$i],
                     'amount' => $add['amount'][$i],
                     'advanced' => $add['advanced'][$i],
                     'vat' => $add['vat'][$i],
                     'retention' => $add['retention'][$i],
                     'wt' => $add['wt'][$i],
                     'netex' => $add['netex'][$i],
                     'netin' => $add['netin'][$i],
                    
                            );
                  $this->db->where('id',$add['idwhere'][$i]);
                  $this->db->update('lessother',$data1);
                  
               
              }
             

          }
           redirect('management/forcast_compart/'.$pj);
}

    
      // dev by ice 
    
      public function  get_json_to_calender(){
         $this->FIX_PHP_CORSS_ORIGIN();
         $json_res_calendar = $this->manag_m->income_to_calendar();
         echo json_encode($json_res_calendar);

      }


      public function get_josn_Graph_Income_Expen(){
        $this->FIX_PHP_CORSS_ORIGIN();
        // controller and view => management/project_cashflow_account
        $res_json = $this->manag_m->getGraph_Income_Expen();
        echo json_encode($res_json);


      }

      public function json_to_calender_Cut_off_receipt(){
          $this->FIX_PHP_CORSS_ORIGIN();
          $json_res = $this->manag_m->getCalender_fn_Cut_off_receipt();
          echo json_encode($json_res);

      }

      public function get_json_Graph_Cashflow_Account(){
          $this->FIX_PHP_CORSS_ORIGIN();
          $json_res = $this->manag_m->getJson_tochart_cashflow_cash();
          echo json_encode($json_res);

      }

      private function FIX_PHP_CORSS_ORIGIN(){

      //http://stackoverflow.com/questions/18382740/cors-not-working-php
      if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }

        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

            exit(0);
        }

    }

    public function content_tbboq($projectcode)
    {
      $data['rows'] = $this->progress_submit->getdata_boq($projectcode);
      $this->load->view('datastore/share/content_tbboq', $data);
    }

    public function content_tbjob($projectcode)
    {
      $data['res'] = $this->progress_submit->getdata_progress($projectcode);
      $this->load->view('datastore/share/content_tbjob', $data);
    }

    public function master_cf()
    {
      $add = $this->input->post();
      $data_h = array(
        'code' => $add['code'],
        'description' => $add['detail_cf']
      );
      if ($this->db->insert('master_cf_head',$data_h)) {
          foreach ($add['pj_code'] as $key => $value) {
              $data_d = array(
                'cf_head_ref' => $add['code'],
                'project_code' =>$add['pj_code'][$key],
                'project_name' =>  $add['pj_name'][$key]
              );
              $this->db->insert('master_cf_detail',$data_d);
            
          }

      }

      redirect("management/project_cashflow_account");

    }
    // AR chart column 1.1
    function over_view_project($project = null , $sub_project = null){

        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];

        $this->db->select("bd_tenid,project_id,project_sub,project_start,project_stop");
        $this->db->where("project_code",$project);
        $this->db->where("compcode",$compcode);
        $this->db->limit(1);
        $res =  $this->db->get("project")->result_array();
        
        $ten_id = 0;
        $project_id = 0;
        $json_chart1 = [];
        $json_chart2 = [];
        $date_start = date("Y-m-d");
        $date_end = date("Y-m-d");
      
        $Contract = array();
        
        
        if(count($res)>0){
            $ten_id = $res[0]["bd_tenid"];
            $project_id = $res[0]["project_id"];
            $date_start = $res[0]["project_start"];
            $date_end = $res[0]["project_stop"];
        }

        $array_mouth = $this->get_mouth_of_year($date_start,$date_end);
        
        $res = null;
       
        $array_income = array(); 
        $this->db->select("sum(project_value) as sum_project_value");
        $this->db->where("project_id",$project_id);
        $this->db->where("compcode",$compcode);
        $res = $this->db->get("project")->result_array();
        $val_income = 0 ;

          if(count($res) > 0){
            $val_income = $res[0]["sum_project_value"];
          }

        $array_income[] = $val_income ;



        $this->db->select("project_id");
        $this->db->where("project_sub",$project_id);
        $this->db->where("compcode",$compcode);
        $res_project_sub = $this->db->get("project")->result_array();
        //echo "<pre>";

        // foreach ($res_project_sub as $key => $item) {                  
        //   $this->db->select("sum(project_value) as sum_project_value");
        //   $this->db->where("project_id",$item["project_id"]);
        //   $res = $this->db->get("project")->result_array();
        //   $array_income[] = $res[0]["sum_project_value"];
         
        // }
        
        
        $this->db->select("sum(ar_invprogress_detail.inv_progressamt) as progressamt_sum");
       
        $this->db->from("ar_invprogress_header");
        $this->db->join("ar_invprogress_detail","ar_invprogress_header.inv_no=ar_invprogress_detail.inv_ref");
        $this->db->where("ar_invprogress_header.compcode",$compcode);
        $this->db->where("ar_invprogress_header.inv_project",$project_id);
        $res_progressamt_sum = $this->db->get()->result_array();

        $value_progressamt_sum = 0;

        foreach ($res_progressamt_sum as $key => $item) {
          $value_progressamt_sum = $item["progressamt_sum"];
        }

          $content_table = array();
           
          foreach ($array_mouth as $months_index => $month) {
                // $this->db->select();
                //echo $year."-".$months_index."<br>";

                $this->db->select("sum(ar_invprogress_detail.inv_progressamt) as progressamt_sum");
                $this->db->from("ar_invprogress_header");
                $this->db->join("ar_invprogress_detail","ar_invprogress_header.inv_no=ar_invprogress_detail.inv_ref");
                $this->db->where("ar_invprogress_header.compcode",$compcode);
                $this->db->where("ar_invprogress_header.inv_project",$project_id);
                // $this->db->where("compcode",$compcode);
                $this->db->like("inv_date",$month);
                $res_progressamt_sum_mount = $this->db->get()->result_array();
                //var_dump($res_progressamt_sum_mount);
                  $content_table[] = array(
                      "month" => $month,
                      "amount"=> $res_progressamt_sum_mount[0]["progressamt_sum"]*1 
                  );

          }

        $Contract["category"] = "Contract";
        $Contract["value"] = array_sum($array_income)-$value_progressamt_sum*1;
        $Contract["color"] = "#7bd5fc";
          //var_dump($content_table);
        $Income["category"] = "Income";
        $Income["value"] = $value_progressamt_sum*1;
        $Income["color"] = "#acf98b";


        $json_chart1[] =$Contract;
        $json_chart1[] =$Income;

        //echo $year;
        $chart1["chart1_1"] =  $json_chart1;
        $chart1["content_table"] = $content_table;
        $box[] = $chart1;
        $box["project_code"] = $project;
        $box["project_id"] = $project_id;
        $box["master_contract"] = array_sum($array_income);
        echo json_encode($box);


    }


    function get_mouth_of_year($date_start,$date_end){
      // $date_start = "2017-08-31";
      // $date_end = "2020-1-24";
      $runing = 0;

      $array_date_start = explode("-", $date_start);
      $array_date_end = explode("-", $date_end);
      $months = array("01"  => 'JAN',  
                            "02"  => 'FED',  
                            "03"  => 'MAR',  
                            "04"  => 'APR',  
                            "05"  => 'MAY',  
                            "06"  => 'JUN',  
                            "07"  => 'JUL',  
                            "08"  => 'AUG',  
                            "09"  => 'SEP',  
                            "10" => 'OCT',  
                            "11" => 'NOV',  
                            "12" => 'DEC' 
                      );

      $start_m = $array_date_start[1];
      $end_m = $array_date_end[1]*1;
     
      $array_all=array();
      for ($year = $array_date_start[0]; $year <= $array_date_end[0]; $year++) {
            
              for ($runing = $start_m*1 ; $runing <= 12 ; $runing++) { 
                 
                  if($runing <=9){
                    $month_num = "0".$runing;
                  }else{
                    $month_num = $runing;
                  }

                  
                  $array_all[] = $year."-".$month_num;
                  if($year == $array_date_end[0] && $runing==$end_m){
                      
                      break;
                  }
              }
              //check end month
              if($runing >= 12){
                  $start_m = 1;

              }
                  
      }
      

      return $array_all;
    }

    // AR detail column 1.1 tab 1
    public function json_chart_detail_ar($project_id=null,$project_start=null,$project_stop=null){

        //echo $project_id;
        $array_mouth = $this->get_mouth_of_year($project_start,$project_stop);

        //var_dump($array_mouth);
        $this->db->select("project_id");
        $this->db->where("project_sub",$project_id);
        $res_project_sub = $this->db->get("project")->result_array();

        //var_dump($res_project_sub);
        //echo "<pre>";
        $json = array();
        $json["categories"] = $array_mouth;
        $json["data"] = array();
        //echo $project_id;
        $chart1 = array();
        $chart2 = array();
        $chart1["name"] = "Contract";
        $chart2["name"] = "BG VO";
        //echo "<pre>";
        $array_sub = array();

        foreach ($res_project_sub as $index_sub => $item_sub) {
            $array_sub[] = $item_sub["project_id"];
        }
        $array_sub[]="no";
        //var_dump($array_sub);
        foreach ($array_mouth as $key => $month) {

                // Contract
                $this->db->select("sum(ar_invprogress_detail.inv_progressamt) as progressamt_sum");
                $this->db->from("ar_invprogress_header");
                $this->db->join("ar_invprogress_detail","ar_invprogress_header.inv_no=ar_invprogress_detail.inv_ref");
                $this->db->where("ar_invprogress_header.inv_project",$project_id);
                $this->db->like("inv_date",$month);
                $res = $this->db->get()->result_array();
                $chart1["data"][] = $res[0]["progressamt_sum"]*1;
                //Contract

                //BG VO
                $this->db->select("sum(ar_invprogress_detail.inv_progressamt) as progressamt_sum");
                $this->db->from("ar_invprogress_header");
                $this->db->join("ar_invprogress_detail","ar_invprogress_header.inv_no=ar_invprogress_detail.inv_ref");
                $this->db->where_in("ar_invprogress_header.inv_project",$array_sub);
                $this->db->like("inv_date",$month);
                $res_sub = $this->db->get()->result_array();
                
                $chart2["data"][] = $res_sub[0]["progressamt_sum"]*1;

                //BG VO

        }
        $json["data"][] = $chart1;
        $json["data"][] = $chart2;
        echo json_encode($json);




    }
    // AR vo detail column 1.1 tab 2
      public function json_chart_detail_ar_vo($project_id=null,$project_start=null,$project_stop=null){
            //echo $project_id;
            //var_dump($array_mouth);
            $this->db->select("project_id,project_name");
            $this->db->where("project_sub",$project_id);
            $res_project_sub = $this->db->get("project")->result_array();

            // array all mouth
            //echo "<pre>";
            $json = array();
            $array_mouth = $this->get_mouth_of_year($project_start,$project_stop);
            $json["categories"] = $array_mouth;
            $json["data"] = array();

            foreach ($res_project_sub as $key => $info_sub_project) {
                $array_project["name"] = $info_sub_project["project_name"];
                foreach ($array_mouth as $key => $mouth_year) {
                      $this->db->select("sum(ar_invprogress_detail.inv_progressamt) as progressamt_sum");
                      $this->db->from("ar_invprogress_header");
                      $this->db->join("ar_invprogress_detail","ar_invprogress_header.inv_no=ar_invprogress_detail.inv_ref");
                      $this->db->where("ar_invprogress_header.inv_project",$info_sub_project["project_id"]);
                      $this->db->like("inv_date",$mouth_year);
                      $res = $this->db->get()->result_array();
                        $array_project["data"][] = $res[0]["progressamt_sum"]*1;

                }
                  $json["data"][] = $array_project;
                $array_project["data"] = array();
                 
            }

            echo json_encode($json);
      }

      public function booking_cost($project_code=null){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];

          $this->db->select("bd_tenid,project_id,project_sub,project_start,project_stop");
          $this->db->where("project_code",$project_code);
          $this->db->where("project_code.compcode",$compcode);
          $this->db->limit(1);
          $res =  $this->db->get("project")->result_array();
          // echo $project_code;
          // var_dump($res);
          $json = array();
          $ten_id = 0;
          $project_id = "no";
          $json_chart1 = [];
          $project_start = date("Y-m");
          $project_stop =  date("Y-m");
         
          $Contract = array();
          $res_project_sub = array();
        
        if(count($res)>0){
            
            $project_id = $res[0]["project_id"];
            $ten_id = $res[0]["bd_tenid"];
            $project_start = $res[0]["project_start"];
            $project_stop = $res[0]["project_stop"];
            
        }

        // var_dump($ten_id);
         
        $array_mouth = $this->get_mouth_of_year($project_start,$project_stop);
        //var_dump($array_mouth);


        $array_bg = array(); 
        // $this->db->select("sum(project_value) as sum_project_value");
        // $this->db->where("project_id",$project_id);
        // $res = $this->db->get("project")->result_array();

        $this->db->select("sum(boq_budget_total) as sum_budget_total");
        $this->db->where("boq_project",$ten_id);
        $this->db->where("boq_item.compcode",$compcode);
        $res = $this->db->get("boq_item")->result_array();
        // var_dump($res);
        $val_income = 0 ;
        if(count($res) > 0){
          $val_income = $res[0]["sum_budget_total"];
        }
          $array_bg[] = $val_income ;
          
          // $this->db->select("project_id");
          // $this->db->where("project_sub",$project_id);
          // $res_project_sub = $this->db->get("project")->result_array();
          

          // income project sub
          // foreach ($res_project_sub as $key => $item) {                  
          //   $this->db->select("sum(project_value) as sum_project_value");
          //   $this->db->where("project_id",$item["project_id"]);
          //   $res = $this->db->get("project")->result_array();
          //   // category 1
          //   $array_bg[] = $res[0]["sum_project_value"];
           
          // }
         // var_dump($array_bg);

          

          array_push($res_project_sub, array("project_id"=>$project_id));
            // var_dump($res_project_sub);
          $project_all = array();
          foreach ($res_project_sub as $key => $value) {
              $project_all[] = $value["project_id"];
          }
         // $project_all[] = "99999999999999";
          // var_dump( $project_all);
          // income project sub
          // var_dump($project_all);
          $array_sum_value = array();
          $sum_apv = 0;
          foreach ($array_mouth as $key => $mount) {
             

                // apv

                  // normal
                  $this->db->select("sum(apvi_amount) as sum_apvi_amount");
                  $this->db->from("apv_header");              
                  $this->db->join('apv_detail', 'apv_header.apv_code=apv_detail.apvi_ref');
                  $this->db->where_in("apv_header.apv_project",$project_all);
                  $this->db->where("apv_header.apv_status !=","delete");
                  $this->db->where("apv_header.compcode",$compcode);
                  $this->db->like("apv_header.apv_date",$mount);
                  $result_sum_apvi_amount = $this->db->get()->result_array()[0]["sum_apvi_amount"]*1;
                  // normal

                  //down
                  // $this->db->select("sum(apd_amount) as sum_apd_amount");
                  // $this->db->where_in("ap_down_header.apd_project",$project_all);
                  // $this->db->like("ap_down_header.apd_date",$mount);
                  // $result_sum_apd_amount = $this->db->get("ap_down_header")->result_array()[0]["sum_apd_amount"]*1;
                  //down

                  // retention
                  // $this->db->select("sum(apr_amount) as sum_apr_amount");
                  // $this->db->where_in("ap_ret_header.apr_project",$project_all);
                  // $this->db->like("ap_ret_header.apr_date",$mount);
                  // $result_sum_apr_amount = $this->db->get("ap_ret_header")->result_array()[0]["sum_apr_amount"]*1;
                  // retention

                    // $sum_apv = ($result_sum_apvi_amount+$result_sum_apd_amount+$result_sum_apr_amount);
                    $sum_apv = ($result_sum_apvi_amount);

                 // apv

                // apo pettycash
                $this->db->select("sum(ex_amt) as sum_ex_amt");
                $this->db->from("ap_pettycash_header");
                $this->db->join("ap_pettycash_expense","ap_pettycash_header.ap_no=ap_pettycash_expense.ex_ref");
                $this->db->where("ap_pettycash_header.ap_no !=","");
                $this->db->where("ap_pettycash_header.compcode",$compcode);
                $this->db->where_in("ap_pettycash_header.ap_project",$project_all);
                $this->db->like("ap_pettycash_header.ap_date",$mount);
                $result_sum_ap_amount = $this->db->get()->result_array()[0]["sum_ex_amt"]*1;
                // apo pettycash

                // aps wo
                $this->db->select("SUM(apsi_amount) as sum_apsi_amount");
                $this->db->from("aps_header");
                $this->db->join("aps_detail","aps_header.aps_code=aps_detail.apsi_ref");
                $this->db->where_in("aps_header.aps_project",$project_all);
                $this->db->where("aps_header.aps_status !=","delete");
                $this->db->where("aps_header.compcode",$compcode);
                $this->db->like("aps_header.aps_duedate",$mount);
                $result_sum_apsi_amount = $this->db->get()->result_array()[0]["sum_apsi_amount"]*1;
                // aps wo

                // gl
                $this->db->select("SUM(amtdr) as sum_amtdr");
                $this->db->from("gl_batch_header");
                $this->db->join("gl_batch_details","gl_batch_header.vchno=gl_batch_details.vchno");
                $this->db->where_in("gl_batch_details.project_id",$project_all);
                $this->db->where("gl_batch_header.compcode",$compcode);
                $this->db->like("gl_batch_header.vchdate",$mount);
                $result_sum_sum_amtdr= $this->db->get()->result_array()[0]["sum_amtdr"]*1;
                // gl


                $booking = ($sum_apv+$result_sum_ap_amount+$result_sum_apsi_amount+$result_sum_sum_amtdr);
                $content_table[] = array(
                    "mount"=>$mount,
                    "sum"=>$booking,
                    "apv"=>$sum_apv,
                    "apo"=>$result_sum_ap_amount,
                    "aps"=>$result_sum_apsi_amount,
                    "gl"=>$result_sum_sum_amtdr
                );
                $array_sum_booking[] = $booking;


          }
          
          $bg = array_sum($array_bg)-array_sum($array_sum_booking);
          //var_dump($array_sum_booking);
          $Contract["category"] = "Budget";
          // income all project contract + project sub 
          $Contract["value"] =  ($bg<0) ? 0 : $bg;
          // $Contract["value"] = array_sum($array_income);
          $Contract["color"] = "#7bd5fc";

          $booking_cost["category"] = "booking";
          $booking_cost["value"] = array_sum($array_sum_booking);
          $booking_cost["color"] = "#ff9999";

            $json_chart1["chart_donut"][]  = $Contract;
            $json_chart1["chart_donut"][] = $booking_cost;
            $json_chart1["content_table"] = $content_table;
            $json_chart1["master_bg"] = array_sum($array_bg);
            echo json_encode($json_chart1);

      }


      public function actual_cost_chart($project_code=null){
          $this->db->select("bd_tenid,project_id,project_sub,project_start,project_stop");
          $this->db->where("project_code",$project_code);
          $this->db->limit(1);
          $res =  $this->db->get("project")->result_array();
          
          $ten_id = 0;
          $project_id = "no";
          $project_start = date("Y-m");
          $project_stop =  date("Y-m");

          $json_chart1 = [];
          $res_project_sub = array();
         
          $Contract = array();
        
        
        if(count($res)>0){
            
            $project_id = $res[0]["project_id"];
            $ten_id = $res[0]["bd_tenid"];
            $project_start = $res[0]["project_start"];
            $project_stop = $res[0]["project_stop"];

        }else{
         die();
        }

        
        $array_mouth = $this->get_mouth_of_year($project_start,$project_stop);
       


        $array_bg = array(); 
        $this->db->select("sum(boq_budget_total) as sum_budget_total");
        $this->db->where("boq_project",$ten_id);
        $res = $this->db->get("boq_item")->result_array();

        $val_income = 0 ;
        if(count($res) > 0){
          $val_income = $res[0]["sum_budget_total"];
        }

          $array_bg[] = $val_income ;
         
          // die();

          // $this->db->select("project_id");

          // $this->db->where("project_sub",$project_id);
          // $res_project_sub = $this->db->get("project")->result_array();
          //echo "<pre>";


          //array_push($res_project_sub, array("project_id"=>$project_id));

          // foreach ($res_project_sub as $key => $item) {                  
          //   $this->db->select("sum(project_value) as sum_project_value");
          //   //echo $item["bd_tenid"];
          //   $this->db->where("project_id",$item["project_id"]);
          //   $res = $this->db->get("project")->result_array();
          //   $array_income[] = $res[0]["sum_project_value"];
           
          // }
           // var_dump($array_income);
           // die();

           array_push($res_project_sub, array("project_id"=>$project_id));
          $project_all = array();
          foreach ($res_project_sub as $key => $value) {
              $project_all[] = $value["project_id"];
          }
          // $project_all[] = "99999999999999";

          // var_dump($project_all);
          $content_table = array();
          $array_sum_gl = array();
          
          foreach ($array_mouth as $key => $mount) {

            
                // gl
                  $this->db->select("SUM(amtdr) as sum_amtdr");
                  // $this->db->select("*");
                  $this->db->from("gl_batch_header");
                  $this->db->join("gl_batch_details","gl_batch_header.vchno=gl_batch_details.vchno");
                  $this->db->like("gl_batch_header.vchdate",$mount);
                  $this->db->where_in("gl_batch_details.project_id",$project_all);
                  $result_sum_sum_amtdr= $this->db->get()->result_array()[0]["sum_amtdr"]*1;                                
                // gl

                  $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                  $this->db->from("ap_cheque_header");
                  $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
                  $this->db->like("ap_cheque_header.ap_chnodate",$mount);
                  $this->db->where_in("ap_cheque_detail.api_project",$project_all);
                  $this->db->where("ap_cheque_detail.api_type","apv");
                  $result_sum_api_netamt_apv= $this->db->get()->result_array()[0]["sum_api_netamt"]*1;

                  $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                  $this->db->from("ap_cheque_header");
                  $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
                  $this->db->like("ap_cheque_header.ap_chnodate",$mount);
                  $this->db->where_in("ap_cheque_detail.api_project",$project_all);
                  $this->db->where("ap_cheque_detail.api_type","apo");
                  $result_sum_api_netamt_apo= $this->db->get()->result_array()[0]["sum_api_netamt"]*1;

                  $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                  $this->db->from("ap_cheque_header");
                  $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
                  $this->db->like("ap_cheque_header.ap_chnodate",$mount);
                  $this->db->where_in("ap_cheque_detail.api_project",$project_all);
                  $this->db->where("ap_cheque_detail.api_type","aps");
                  $result_sum_api_netamt_aps= $this->db->get()->result_array()[0]["sum_api_netamt"]*1;

                  //var_dump($result_sum_api_netamt);
                  // select SUM(ap_cheque_detail.api_netamt) as sum_api_netamt FROM ap_cheque_header INNER JOIN ap_cheque_detail on(ap_cheque_header.ap_code = ap_cheque_detail.api_code)
                  $sum_all = ($result_sum_api_netamt_apv+$result_sum_api_netamt_apo+$result_sum_api_netamt_aps+$result_sum_sum_amtdr);
                  $actual_cost_sum[] = $sum_all;
                 
                  $content_table[] = array(
                      "mount"=>$mount,
                      "apv"=>$result_sum_api_netamt_apv,
                      "apo"=>$result_sum_api_netamt_apo,
                      "aps"=>$result_sum_api_netamt_aps,
                      "gl"=>$result_sum_sum_amtdr,
                      "sum"=>$sum_all

                  );


          }  
         

         

          $bg = array_sum($array_bg)-array_sum($actual_cost_sum);
          $Contract["category"] = "Budget";
          $Contract["value"] = ($bg<0) ? 0 : $bg;
          $Contract["color"] = "#7bd5fc";

          $actual_cost["category"] = "Actual_cost";
          $actual_cost["value"] = array_sum($actual_cost_sum);
          $actual_cost["color"] = "#f49842";




            $json_chart1[] = $Contract;
            $json_chart1[] = $actual_cost;

            $json["content_table"] = $content_table;
            $json["chart"] = $json_chart1;
            $json["master_bg"] = array_sum($array_bg);

            echo json_encode($json);

      }

       public function add_forecastmonthly(){ 

        $input = $this->input->post(); 
        $res = $this->manag_m->forecastmonth($input); 

        if ($res != NULL) { 

          redirect("management/ProjectForecastMonthly_edit/$res"); 

        }else{ 

          echo "error"; 
          redirect("management/ProjectForecastMonthly"); 
           
        } 

         
      }

      public function edit_forecastmonthly(){

        $input = $this->input->post();
        $res = $this->manag_m->forecastmonth_edit($input);

        if ($res != NULL) {

          redirect("management/ProjectForecastMonthly_edit/$res");

        }else{

          echo "error";
          redirect("management/ProjectForecastMonthly");
          
        }

        
      }

      public function get_detail_booking(){
       
      // array(3) { ["mouth"]=> string(7) "2017-12" ["type_group"]=> string(3) "apv" ["project_id"]=> string(2) "88" }
       $month = $this->input->post("mouth");
       $type_group = $this->input->post("type_group");
       $project_id = $this->input->post("project_id");
       $res = array();
          if($type_group == "apv"){
               // type = apv
                          
                  // get data apv normal
                  $this->db->select("apv_code,apv_pono,apvi_amount,apv_date");
                  $this->db->from("apv_header");              
                  $this->db->join('apv_detail', 'apv_header.apv_code=apv_detail.apvi_ref');
                  $this->db->where("apv_header.apv_project",$project_id);
                  $this->db->like("apv_header.apv_date",$month);
                  $result_apvi_amount = $this->db->get()->result_array();

                  // var_dump($result_apvi_amount);
                  foreach ($result_apvi_amount as $key => $item_apvi_amount) {
                      $res[] = array(
                          "apv_code" => $item_apvi_amount["apv_code"],
                          "apv_pono" => $item_apvi_amount["apv_pono"],
                          "amount" => $item_apvi_amount["apvi_amount"],
                          "date"=> $item_apvi_amount["apv_date"],
                          "type"=> "Normal"
                      );
                  }
                  // get data apv normal


                  //get data apv down
                  // $this->db->select("apd_code,apd_date,apd_amount");
                  // $this->db->where("ap_down_header.apd_project",$project_id);
                  // $this->db->like("ap_down_header.apd_date",$month);
                  // $result_sum_apd_amount = $this->db->get("ap_down_header")->result_array();
                  
                  // foreach ($result_sum_apd_amount as $key => $item_apd_amount) {
                  //     $res[] = array(
                  //       "apv_code" => $item_apd_amount["apd_code"],
                  //       "apv_pono"=> "",
                  //       "amount" => $item_apd_amount["apd_amount"],
                  //       "date" => $item_apd_amount["apd_date"],
                  //       "type"=> "Down"
                  //     );
                  // }
                  //get data apv down 


                  //get data apv Retention
                  // $this->db->select("apr_code,apr_date,apr_amount");
                  // $this->db->where("ap_ret_header.apr_project",$project_id);
                  // $this->db->like("ap_ret_header.apr_date",$month);
                  // $result_sum_apd_amount = $this->db->get("ap_ret_header")->result_array();
                  
                  // foreach ($result_sum_apd_amount as $key => $item_apd_amount) {
                  //     $res[] = array(
                  //       "apv_code" => $item_apd_amount["apr_code"],
                  //       "apv_pono"=> "",
                  //       "amount" => $item_apd_amount["apr_amount"],
                  //       "date" => $item_apd_amount["apr_date"],
                  //       "type"=> "Retention"
                  //     );
                  // }
                  //get data apv Retention 



             
              $this->load->view("management/data/detail_modal_booking/apv_content_v",["data"=>$res]);
              // type = apv

          }elseif($type_group == "apo"){
              // type = apo

                // get data
                $this->db->select("*");
                $this->db->from("ap_pettycash_header");
                $this->db->join("ap_pettycash_expense","ap_pettycash_header.ap_no=ap_pettycash_expense.ex_ref");
                $this->db->where("ap_pettycash_header.ap_no !=","");
                $this->db->where("ap_pettycash_header.ap_project",$project_id);
                $this->db->like("ap_pettycash_header.ap_date",$month);
                $result_sum_api_netamt_apo = $this->db->get()->result_array();
                // get data

              $this->load->view("management/data/detail_modal_booking/apo_content_v",["data"=>$result_sum_api_netamt_apo]);
                
              // type = apo
          }elseif($type_group == "aps"){
              // type = aps

                // get data
                $this->db->select("*");
                $this->db->from("aps_header");
                $this->db->join("aps_detail","aps_header.aps_code=aps_detail.apsi_ref");
                $this->db->where("aps_header.aps_project",$project_id);
                $this->db->like("aps_header.aps_duedate",$month);
                $result_sum_aps = $this->db->get()->result_array();
                //get data
               
                $this->load->view("management/data/detail_modal_booking/aps_content_v",["data"=>$result_sum_aps]);
                


              // type = aps
          }elseif($type_group == "gl"){
               // type = gl

                //get data
                $this->db->select("*");
                $this->db->from("gl_batch_header");
                $this->db->join("gl_batch_details","gl_batch_header.vchno=gl_batch_details.vchno");
                $this->db->where("gl_batch_details.project_id",$project_id);
                $this->db->like("gl_batch_header.vchdate",$month);
                $result_gl = $this->db->get()->result_array();
                // get data
               // echo $project_id;
                // echo $month;
                //var_dump($result_gl);
                 $this->load->view("management/data/detail_modal_booking/gl_content_v",["data"=>$result_gl]);

               // type = gl
          }else{

            //error
            echo "type not found";
            //error
          }                              
      }

      public function get_detail_actual_cost(){
          $month = $this->input->post("mouth");
           $type_group = $this->input->post("type_group");
           $project_id = $this->input->post("project_id");
           


           if($type_group == "apv"){
                    
                    // $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                    $this->db->select("*");
                    $this->db->from("ap_cheque_header");
                    $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
                    $this->db->like("ap_cheque_header.ap_chnodate",$month);
                    $this->db->where("ap_cheque_detail.api_project",$project_id);
                    $this->db->where("ap_cheque_detail.api_type","apv");
                    $result_apv= $this->db->get()->result_array();
                    
                    $this->load->view("management/data/detail_modal_actual_cost/apv_content_v",["data"=>$result_apv]);

           }elseif($type_group == "apo"){

                    // $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                    $this->db->select("*");
                    $this->db->from("ap_cheque_header");
                    $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
                    $this->db->like("ap_cheque_header.ap_chnodate",$month);
                    $this->db->where("ap_cheque_detail.api_project",$project_id);
                    $this->db->where("ap_cheque_detail.api_type","apo");
                    $result_apo= $this->db->get()->result_array();

                    $this->load->view("management/data/detail_modal_actual_cost/apo_content_v",["data"=>$result_apo]);
           }elseif($type_group == "aps"){
               
                    // $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                    $this->db->select("*");
                    $this->db->from("ap_cheque_header");
                    $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
                    $this->db->like("ap_cheque_header.ap_chnodate",$month);
                    $this->db->where("ap_cheque_detail.api_project",$project_id);
                    $this->db->where("ap_cheque_detail.api_type","aps");
                    $result_apo= $this->db->get()->result_array();

                    $this->load->view("management/data/detail_modal_actual_cost/aps_content_v",["data"=>$result_apo]);

           }elseif($type_group == "gl"){
               // type = gl
                    //get data
                    $this->db->select("*");
                    $this->db->from("gl_batch_header");
                    $this->db->join("gl_batch_details","gl_batch_header.vchno=gl_batch_details.vchno");
                    $this->db->where("gl_batch_details.project_id",$project_id);
                    $this->db->like("gl_batch_header.vchdate",$month);
                    $result_gl = $this->db->get()->result_array();
                    // get data                   
                     $this->load->view("management/data/detail_modal_booking/gl_content_v",["data"=>$result_gl]);
               // type = gl
           }else{

           }
      }

      public function get_detail_progress(){
            $input = $this->input->post();
            // var_dump($input);

            $project_id = $input["project_id"];  
            $month = $input["month"];
            // $this->db->select("sum(ar_invprogress_detail.inv_progressamt) as progressamt_sum");
            $this->db->select("*");
            $this->db->from("ar_invprogress_header");
            $this->db->join("ar_invprogress_detail","ar_invprogress_header.inv_no=ar_invprogress_detail.inv_ref");
            $this->db->where("ar_invprogress_header.inv_project",$project_id);
            $this->db->like("inv_date",$month);
            $res_progressamt = $this->db->get()->result_array();
            // var_dump($res_progressamt);

            $this->load->view("management/data/detail_modal_progress/progress_content_v",["data"=>$res_progressamt]);
      }


      public function get_detail_pading(){
            $type = $this->input->post("type");
            $project_id = $this->input->post("project_id");
            $project_code = $this->input->post("project_code");
              
              if($type == "pr"){

                  // pr wait for approve 
                  $this->db->select("*");
                  $this->db->from("pr");
                  $this->db->where("pr_project",$project_id);
                  $this->db->where("pr_approve","wait");
                  $query_pr = $this->db->get()->result_array();
                  $arrayData['pr'] = $query_pr;
                  // pr wait for approve
                  $data = $arrayData['pr'];
                  // var_dump($data);
                  $this->load->view("management/data/getdata/pr_v",["data"=>$data,"project_code"=>$project_code,"project_id"=>$project_id]);


              }elseif($type == "pr_approve"){

                   // pr approve wait open PO 
                  $this->db->select("*");
                  $this->db->from("pr");
                  $this->db->where("pr_project",$project_id);
                  $this->db->where("pr_approve","approve");
                  $this->db->where("po_open","no");
                  $query_pr = $this->db->get()->result_array();
                  $arrayData['pr_approve'] = $query_pr;

                  // pr approve wait open PO
                   $data = $arrayData['pr_approve'];
                  
                  $this->load->view("management/data/getdata/pr_approve_v",["data"=>$data,"project_code"=>$project_code,"project_id"=>$project_id]);

              }elseif($type == "po"){
                  // po wait approve
                  $this->db->select("*");
                  $this->db->from("po");
                  $this->db->where("po_project",$project_id);
                  $this->db->where("po_approve","wait");
                  $query_po = $this->db->get()->result_array();
                 
                  $arrayData['po'] = $query_po;
                  // po wait approve
                    $data = $arrayData['po'];
                  
                   $this->load->view("management/data/getdata/po_v",["data"=>$data,"project_code"=>$project_code,"project_id"=>$project_id]);

              }elseif($type == "po_approve"){

                  // po wait approve
                  $this->db->select("*");
                  $this->db->from("po");
                  $this->db->where("po_project",$project_id);
                  $this->db->where("po_approve","approve");
                  $this->db->where("ic_status","wait");
                  $query_po = $this->db->get()->result_array();

                  $arrayData['po_approve'] = $query_po;
                  // po wait approve
                   $data =  $arrayData['po_approve'];
                  


                   $this->load->view("management/data/getdata/po_approve_v",["data"=>$data,"project_code"=>$project_code,"project_id"=>$project_id]);
              }elseif($type == "ic"){
                  // $this->db->select("COUNT(po_reccode) as count_ic");
                  $this->db->select("*");
                  $this->db->from("receive_po");
                  $this->db->where("project",$project_id);
                  $this->db->where("ic_status","open");
                  $query_ic = $this->db->get()->result_array();
                  
                  $arrayData['ic'] = $query_ic;
                  $data =  $arrayData['ic'];
                  

                  $this->load->view("management/data/getdata/ic_v",["data"=>$data,"project_code"=>$project_code,"project_id"=>$project_id]);
              }else{
                echo  "ไม่พบข้อมูล";
              }


      }


      public function count_pu(){
        
        $project_id = $this->input->post("project_id");
        $cost_code = $this->input->post("cost_code");

        $this->db->select('SUM(poi_amount) as po_amount');
        $this->db->where('po_project',$project_id);
        $this->db->where('poi_costcode',$cost_code);
        $this->db->join('po','po.po_pono = po_item.poi_ref');
        $po = $this->db->get('po_item')->result();
        $po_amount = $po[0]->po_amount;


        $this->db->select('SUM(total_disc) as wo_amount');
        $this->db->where('projectcode',$project_id);
        $this->db->where('lo_costcode',$cost_code);
        $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
        $wo = $this->db->get('lo_detail')->result();
        $wo_amount = $wo[0]->wo_amount;

        $this->db->select('SUM(pettycashi_unitprice) as pc_amount');
        $this->db->where('project',$project_id);
        $this->db->where('pettycashi_costcode',$cost_code);
        $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
        $pc = $this->db->get('pettycash_item')->result();
        $pc_amount = $pc[0]->pc_amount;

        $sum = $pc_amount+$wo_amount+$po_amount;
        $return = array();
        $return['cost']   = $cost_code;
        $return['sum']   = $sum;
        echo json_encode($sum);
      }

      public function insert_expase(){
        $add = $this->input->post();
         $data = array
            (
            'exac_code' => $add['exac_code'],
            'exac_nameth' => $add['exac_nameth'],
            'exac_nameen' => $add['exac_nameen'],
            'exac_costcode' => $add['exac_costcode'],
            'exac_costname' => $add['exac_costname'],
            'exac_accost' => $add['exac_accost'],
            'exac_acname' => $add['exac_acname'],
            'exac_accodeex' => $add['exac_accodeex'],
            'exac_acnameex' => $add['exac_acnameex'],
            'exac_type' => $add['exac_type'],
            );
           $this->db->insert('pc_expense',$data);
           redirect('management/setup_expense');

      }

      public function del_submit(){
        $submit_no = $this->uri->segment(3);

        $this->db->where('submit_no', $submit_no);
        $this->db->delete('progress_submit');

        $this->db->where('submit_ref', $submit_no);
        $this->db->delete('progress_submit_detail');

        redirect('management/ProgressSubmit');
      }

}