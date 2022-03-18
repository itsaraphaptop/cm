<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class retrieve extends CI_Model {
	
	public function get_data()
	{
		$this->db->select('*');
		$this->db->from('progress_submit');
		$query = $this->db->get();

		if($query){
			$result = $query->result_array();
		}else{
			return false;
		}
		return $result;
	}

	public function get_data_byid($id)
	{
		$this->db->select('*');
		$this->db->from('progress_submit');
		$this->db->join('progress_submit_detail', 'progress_submit_detail.submit_ref = progress_submit.submit_no');
		$this->db->where('progress_submit_detail.submit_ref', $id);
		$query = $this->db->get();

		if ($query) {
			$result = $query->result_array();
		}else{
			return false;
		}

		return $result;
	}

	public function query_data_hearder($id)
	{
		$this->db->select('*');
		$this->db->from('progress_submit');
		$this->db->where('progress_submit.submit_no', $id);
		$query = $this->db->get();

		if ($query) {
			$result = $query->result_array();
		}else{
			return false;
		}

		return $result;

	}
}