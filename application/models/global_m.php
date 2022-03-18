<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class global_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}
	public function paid($compcode)
	{
		$this->db->select('*');
		$this->db->from("type_paid");
		$this->db->where("compcode", $compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function gen_code($word, $table, $column_pk)
	{
		$datestring = "Y";
		$mm = "m";
		$dd = "d";

		$this->db->select('*');
		$qu = $this->db->get($table);
		$res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

		if ($res == 0) {
			$code = $word . date($datestring) . date($mm) . "000" . "1";
			$aps_item = "1";
		} else {
			$this->db->select('*');
			$this->db->order_by($column_pk, 'desc');
			$this->db->limit('1');
			$q = $this->db->get($table);
			$run = $q->result_array();

			foreach ($run as $valx) {
                // var_dump($valx);
                // exit();
				$x1 = $valx['id'] + 1;
			}

			if ($x1 <= 9) {
				$code = $word . date($datestring) . date($mm) . "000" . $x1;
				$aps_item = $x1;
			} elseif ($x1 <= 99) {
				$code = $word . date($datestring) . date($mm) . "00" . $x1;
				$aps_item = $x1;
			} elseif ($x1 <= 999) {
				$code = $word . date($datestring) . date($mm) . "0" . $x1;
				$aps_item = $x1;
			}
		}

		return $code;
	}


	public function gen_code_pb($word, $table, $column_pk)
	{
		$datestring = "Y";
		$mm = "m";
		$dd = "d";

		$this->db->select('*');
		$qu = $this->db->get($table);
		$res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

		if ($res == 0) {
			$code = $word . date($datestring) . date($mm) . "000" . "1";
			$aps_item = "1";
		} else {
			$this->db->select('*');
			$this->db->order_by($column_pk, 'desc');
			$this->db->limit('1');
			$q = $this->db->get($table);
			$run = $q->result_array();

			foreach ($run as $valx) {
                // var_dump($valx);
                // exit();
				$x1 = $valx['pb_id'] + 1;
			}

			if ($x1 <= 9) {
				$code = $word . date($datestring) . date($mm) . "000" . $x1;
				$aps_item = $x1;
			} elseif ($x1 <= 99) {
				$code = $word . date($datestring) . date($mm) . "00" . $x1;
				$aps_item = $x1;
			} elseif ($x1 <= 999) {
				$code = $word . date($datestring) . date($mm) . "0" . $x1;
				$aps_item = $x1;
			}
		}

		return $code;
	}

    // ice dev 17/8/2017
	public function get_system_project($type = null, $code = null, $json = null, $comp_code = null)
	{
    	// type 1 code , 2 id 	
		$this->db->select(["system.systemcode as value", "system.systemname as name"]);

		if ($type == "code") {
			$this->db->from('project_item');
			$this->db->join('system', 'project_item.projectd_job = system.systemcode');
			$this->db->where('system.compcode', $comp_code);
			$this->db->where("project_item.project_code", $code);
			$query = $this->db->get();
			$res = $query->result_array();
		} elseif ($type == "id") {
			$this->db->from('project_item');
			$this->db->join('project', 'project_item.project_code = project.project_code');
			$this->db->join('system', 'project_item.projectd_job = system.systemcode');
			$this->db->where('system.compcode', $comp_code);
			$this->db->where("project.project_id", $code);
			$query = $this->db->get();
			$res = $query->result_array();
		} else {
			$res = false;
			$this->db->from('system');
			$this->db->where('system.compcode', $comp_code);
			$query = $this->db->get();
			$res = $query->result_array();
		}
    	//return $type;

		if ($json == true) {
			return json_encode($res);
		} else {
			return $res;

		}

	}

}