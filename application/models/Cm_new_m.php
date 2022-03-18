<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cm_new_m extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function get_project_by_id($project_code) {
    	$this->db->select('*');
    	$this->db->from('project');
    	$this->db->where('project_code', $project_code);
    	$this->db->where('company !=', 0);
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else {
    		$res = null;
    	}

    	return $res;
    }

    public function get_project()
    {
        $this->db->select('*');
    	$this->db->from('project');
    	$this->db->where('company !=', 0);
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else {
    		$res = null;
    	}

    	return $res;
    }

    //Table รายแปลง unit_one
    public function add_unit_to_one($arr_data)
    {	
    	//Status 1 = checked จาก checkbox มา
    	if (isset($arr_data['ch'])) {
    		$arr_data['ch'] = '1';
    	}else{
    		$arr_data['ch'] = '0';
    	}

    	//RunCode โดยใช้ Id project ตามด้วย ชม.นาที ตามด้วยเลขที่รับเข้ามา
    	$runCode = $arr_data['project_code']."-".date("Hs").$arr_data['io_after'];
    	
    	$data = array(
			"project_name" => $arr_data['project_name'],
			"unit_name" => $arr_data['unit_name'],
			"draft" => $arr_data['draft'],
			"date_draft" => $arr_data['date_draft'],
			"allocation_plan" => $arr_data['allocation_plan'],
			"date_ap" =>  $arr_data['date_ap'],
			"io" =>  $arr_data['io'],
			"io_after" =>  $runCode,
			"type_house" =>  $arr_data['type_house'],
			"model_house" =>  $arr_data['model_house'],
			"num_allocation" =>  $arr_data['num_allocation'],
			"ch" =>  $arr_data['ch'],
			"area" =>  $arr_data['area'],
			"numprice" =>  $arr_data['numprice'],
			"note" =>  $arr_data['note'],
			"project_code" =>  $arr_data['project_code'],
			"user_save" =>  $arr_data['user_save'],
			"date_save" =>  $arr_data['date_save'],
			"modal" =>  $arr_data['modal']
		);

		if($this->db->insert('unit_one',$data)){
			return true;
		}else{
			return false;
		}
    }
    //Table รายแปลง unit_one

    //Table รายกลุ่ม unit_group_header
    public function add_unit_group_header($arr_data)
    {
    	$data = array(
    		"project_code" => $arr_data['project_code'],
    		"project_name" => $arr_data['project_name'],
    		"unit_name" => $arr_data['unit_name'],
    		"draft" => $arr_data['draft'],
    		"date_draft" => $arr_data['date_draft'],
    		"allocation_plan" => $arr_data['allocation_plan'],
    		"date_ap" => $arr_data['date_ap'],
    		"io" => $arr_data['io'],
    		"io_after" => $arr_data['io_after'],
    		"type_house" =>  $arr_data['type_house'],
			"model_house" =>  $arr_data['model_house'],
    		"num_unit" => $arr_data['num_unit'],
    		"area" => $arr_data['area'],
    		"user_save" => $arr_data['user_save'],
    		"date_save" => $arr_data['date_save']
    	);

    	if($this->db->insert('unit_group_header',$data)){
			return true;
		}else{
			return false;
		}
    }
    //Table รายกลุ่ม unit_group_header

    //Table รายกลุ่ม unit_group_detail
    public function add_unit_group_detail($arr_data)
    {
    	// echo "<pre>";
    	$data = array();
    	// var_dump($arr_data);
    	for ($i=0; $i < count($arr_data['unnit_detail']) ; $i++) { 
    		$data[] = array(
    			"project_code" => $arr_data['project_code'],
    			"num_unit" => $arr_data['unnit_detail'][$i],
    			"area" => $arr_data['area_detail'][$i],
    			"note" => $arr_data['note_detail'][$i],
    			"user_save" => $arr_data['user_save'],
    			"date_save" => $arr_data['date_save'],
    			"modal" => $arr_data['modal']
    		);
    	}

    	if($this->db->insert_batch('unit_group_detail',$data)){
			return true;
		}else{
			return false;
		}

    }
    //Table รายกลุ่ม unit_group_detail

    public function get_note()
    {
    	$this->db->select('*');
    	$this->db->from('note');
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else{
    		$res = null;
    	}

    	return $res;
    }


    public function get_type_house($type)
    {
    	$this->db->select('*');
    	$this->db->from('house_type');
    	$this->db->where('type', $type);
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else{
    		$res = "null";
    	}

    	return $res;
    }

    public function get_model_house($ref_type)
    {
    	$this->db->select('*');
    	$this->db->from('house_model');
    	$this->db->where('ref_type', $ref_type);
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else{
    		$res = "null";
    	}

    	return $res;
    }

    public function get_tr_one($project_code)
    {
    	$this->db->select('*');
    	$this->db->from('unit_one');
    	$this->db->join('house_type','unit_one.type_house = house_type.type_code');
    	$this->db->join('house_model','unit_one.model_house = house_model.code_model');
    	$this->db->where('unit_one.project_code', $project_code);
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else{
    		$res = "null";
    	}

    	return $res;
    }

    public function get_tr_group($project_code)
    {
    	$this->db->select('*');
    	$this->db->from('unit_group_header');
    	// $this->db->join('unit_group_detail','unit_group_header.project_code = unit_group_detail.project_code');
    	$this->db->join('house_type','unit_group_header.type_house = house_type.type_code');
    	$this->db->join('house_model','unit_group_header.model_house = house_model.code_model');
    	$this->db->where('unit_group_header.project_code', $project_code);
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else{
    		$res = "null";
    	}

    	return $res;
    }

    public function get_unit_codeOne($unit_code)
    {
    	$this->db->select('*');
    	$this->db->from('unit_one');
    	$this->db->where('io_after', $unit_code);
    	$query = $this->db->get();

    	if ($query) {
    		$res = $query->result_array();
    	}else{
    		$res = "null";
    	}

    	return $res;
    }

    public function get_unit_codeGroup($unit_code)
    {
    	$this->db->select('*');
    	// $this->db->from('');
    }
}