<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class jsonr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('datastore_m');
        $this->load->model('manag_m');
    }
    public function getboq()
    {

        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $bd = $this->uri->segment(3);
        $this->db->select('boq_bd,boq_job,subcostcode,subcostcodename,newmatnamee,newmatcode,unitcode,unitname,qty_bg,matpricebg,matamtbg,labpricebg,labamtbg,totalamt');
        $this->db->where('boq_bd',$bd);
        $q = $this->db->get('boq_item')->result();
        // $q = $this->datastore_m->getvenderjson($compcode);
        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($q));
    }
    public function boqCreate()
    {
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $json = $this->input->post('models');
      $json = stripslashes($json);
      $json = json_decode($json);
      foreach ($json as $key => $value) {
         $data = array(
        'boq_mcode' => $value->boq_mcode,
        'boq_job' => $value->boq_job,
        // 'vender_address' => $value->vender_address,
        // 'vender_tel' => $value->vender_tel,
        // 'vender_fax' => $value->vender_fax,
        // 'vender_tax' => $value->vender_tax,
        // 'vender_taxtype' => $value->vender_taxtype,
        // 'vender_credit' => $value->vender_credit,
        // 'vender_sale' => $value->vender_sale,
        // 'vender_size' => $value->vender_size,
        // 'vender_type' => $value->vender_type,
        // 'vat' => $value->vat,
        // 'compcode' => $compcode
      );
      $this->db->insert('boq_item',$data);
      }
    }
  public function getvender()
    {

        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $q = $this->datastore_m->getvenderjson($compcode);
        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($q));
    }
    public function venderCreate()
    {
       $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
      $json = $this->input->post('models');
      $json = stripslashes($json);
      $json = json_decode($json);
      foreach ($json as $key => $value) {
         $data = array(
        'vender_code' => $value->vender_code,
        'vender_name' => $value->vender_name,
        'vender_address' => $value->vender_address,
        'vender_tel' => $value->vender_tel,
        'vender_fax' => $value->vender_fax,
        'vender_tax' => $value->vender_tax,
        'vender_taxtype' => $value->vender_taxtype,
        'vender_credit' => $value->vender_credit,
        'vender_sale' => $value->vender_sale,
        'vender_size' => $value->vender_size,
        'vender_type' => $value->vender_type,
        'vat' => $value->vat,
        'compcode' => $compcode
      );
      $this->db->insert('vender',$data);
      }
    }
    public function venderUpdate()
    {
       $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
      $json = $this->input->post('models');
      $json = stripslashes($json);
      $json = json_decode($json);
        foreach ($json as $key => $value) {
            $data = array(
              'vender_code' => $value->vender_code,
              'vender_name' => $value->vender_name,
              'vender_address' => $value->vender_address,
              'vender_tel' => $value->vender_tel,
              'vender_fax' => $value->vender_fax,
              'vender_tax' => $value->vender_tax,
              'vender_taxtype' => $value->vender_taxtype,
              'vender_credit' => $value->vender_credit,
              'vender_sale' => $value->vender_sale,
              'vender_size' => $value->vender_size,
              'vender_type' => $value->vender_type,
              'vat' => $value->vat,
              'compcode' => $compcode
        );
        $this->db->where('vender_code',$value->vender_code);
        $this->db->update('vender',$data);
      }
    
    }
    public function venderDestroy()
    {
      $json = $this->input->post('models');
      $json = stripslashes($json);
      $json = json_decode($json);
        foreach ($json as $key => $value) {
        
        $this->db->where('vender_code',$value->vender_code);
        $this->db->delete('vender');
      }
    
    }
    public function getmember()
    {
      $this->FIX_PHP_CORSS_ORIGIN();
      $q=$this->db->query("select * from member")->result();
      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($q));

    }

    public function dateproject()
    {
      $this->FIX_PHP_CORSS_ORIGIN();
     $project_id = $this->uri->segment(3);
      $json_chart = $this->manag_m->datesumproject($project_id);
      //var_dump($q) ;
      echo json_encode($json_chart);
        // $this->output
        //   ->set_content_type('application/json')
        //   ->set_output(json_encode($json_chart)); 

    }





    public function show_json_finance(){
      $this->FIX_PHP_CORSS_ORIGIN();
      $project_id = $this->uri->segment(3);
      $json_finance = $this->manag_m->get_finance_m($project_id);

      echo json_encode($json_finance);

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

    public function show_calender(){
      $this->FIX_PHP_CORSS_ORIGIN();
      $this->db->select('heading as title,datestart as start,datestopp as end,color,id');
      $this->db->from('schedule');
      $this->db->where('status',"0");
      $query = $this->db->get()->result();
      

      echo json_encode($query);

    }

    public function show_calender_where(){
      $session_data = $this->session->userdata('sessed_in');
      $m_id = $session_data['m_id'];
      $this->FIX_PHP_CORSS_ORIGIN();
      $this->db->select('heading as title,datestart as start,datestopp as end,color,id');
      $this->db->from('schedule');
      $this->db->where('status',"1");
      $this->db->where('rights',$m_id);
      $query = $this->db->get()->result();
      

      echo json_encode($query);

    }

    public function calender_alert(){
      $session_data = $this->session->userdata('sessed_in');
      $m_id = $session_data['m_id'];
      $this->FIX_PHP_CORSS_ORIGIN();
      $this->db->select('heading,chk,id,notice');
      $this->db->from('schedule');
      $this->db->where('status',"0");
      $this->db->where('rights',$m_id);
      $this->db->where('chk',"1");
      $this->db->where('notice',date('Y-m-d'));
      // $this->db->where('timenotice <=',date('H:i:s'));

      $query = $this->db->get()->result();
      
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($query));

     

    }

    public function calender_alertt(){
      $session_data = $this->session->userdata('sessed_in');
      $m_id = $session_data['m_id'];
      $this->FIX_PHP_CORSS_ORIGIN();
      $this->db->select('heading,chk,id,notice');
      $this->db->from('schedule');
      $this->db->where('status',"1");
      $this->db->where('chk',"1");
      $this->db->where('notice',date('Y-m-d'));
      // $this->db->where('timenotice <=',date('H:i:s'));

      $query = $this->db->get()->result();

      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($query));

    }

      public function chk_task(){
      $session_data = $this->session->userdata('sessed_in');
      $m_id = $session_data['m_id'];
      $this->FIX_PHP_CORSS_ORIGIN();
      $this->db->select('task_d.id,task_d.sub_task,task_d.date_task');
      $this->db->from('task_h');
      $this->db->join('task_d','task_h.ref_task = task_d.refd_task');
      $this->db->where('date_task',date('Y-m-d'));
      $this->db->where('member_task',$m_id);
      $this->db->where('task_d.chk',"0");
      $query = $this->db->get()->result();

      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($query));

    }

    public function test_calender(){
      $this->load->view('panel/test_calender');
    }

    public function testapi()
    {
      $obj = file_get_contents('php://input');
      $edata = json_decode($obj);
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($edata));
    }

    public function getbusiness_unit(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['compcode'] = $session_data['compcode'];
      $query = $this->datastore_m->get_business($data['compcode']);
      $arr = array();
      $arr['data'] = $query;
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($arr));
    }
    public function getdataprojrct(){
			$query = $this->datastore_m->getnewproject();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));

		}
    public function getdataprojrct_permis(){
			$query = $this->datastore_m->getnewproject_permiss();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));

		}
    public function getdataprojrct_permis_fecth(){
			$query = $this->datastore_m->getnewproject_permiss();
			$arr = array();
			$arr = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));

		}
    public function getdatasubprojrct(){
      $query = $this->datastore_m->getprojectsub();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    public function getdataemployee(){
      $query = $this->datastore_m->getdataemployee();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    public function getdatapermission(){
      $query = $this->datastore_m->getdataemployee_active();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    public function getprojectjob(){
      $query = $this->datastore_m->getprojectjob();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    public function getbusjobtype(){
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $query = $this->datastore_m->get_job_type($compcode);
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    public function gecosttype(){
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $query = $this->datastore_m->costtype($compcode);
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    public function getuom(){
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $query = $this->datastore_m->getunit();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    public function getwhdata(){
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
      $project_id = $this->uri->segment(3);
      $query = $this->datastore_m->get_whdata($project_id);
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));
    }
    
}
