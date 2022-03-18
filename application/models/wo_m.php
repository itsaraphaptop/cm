<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wo_m extends CI_Model {

	public function wo_approve()
	{
		$this->db->select('*');
		$this->db->from('lo');
		$this->db->join('system', 'system.systemid = lo.system');
		$this->db->where('status', 'approve');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function check_decrement_no($wo_no) 
	{
		// var_dump($wo_no);
		$this->db->select('decrement_no');
		$this->db->from('decrement_wo');
		$this->db->order_by('decrement_no', 'desc');
		$this->db->where('ref_wo', $wo_no);
		$this->db->limit(1);
		$query = $this->db->get();
		// ///ทำcheck

		if ($query) {
			$res = $query->result_array();

		} else {
			$res = null;
		}

		return $res;
	}

	public function get_detail_wo_nohis($wo_no) {
		$this->db->select('*');
		$this->db->from('lo_detail');
		$this->db->where('lo_ref', $wo_no);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}

		return $res;
	}

	public function history_decrement($wo_no) {
		$this->db->select('*');
		$this->db->from('lo_detail');
		$this->db->join('decrement_wo', 'decrement_wo.wo_item_id = lo_detail.lo_idd');
		// $this->db->order_by('decrement.pr_item_id', 'asc');
		// $this->db->where('decrement.decrement_status', 'show');
		$this->db->where('decrement_wo.ref_wo', $wo_no);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}

		return $res;
	}

	public function add_decrement($arr_data) {

		$query = $this->db->insert_batch('decrement_wo', $arr_data);
		if ($query) {
			$res = true;
		} else {
			$res = false;
		}

		return $res;
	}

	public function update_qty_pr_items($arr_data) {
		$this->db->trans_begin();
		$status = true;
		foreach ($arr_data['money_decre'] as $key => $value) {
			$data = array(
				"ap_billsucamout" => $arr_data['balance'][$key],
				"previousamount" => $arr_data['ap_billsucamout'][$key],
			);
			// var_dump($data);die();
			$this->db->where('lo_idd', $arr_data['wo_item_id'][$key]);
			$query = $this->db->update('lo_detail', $data);

			if ($query) {
				$status = true;
			} else {
				$status = false;
				break;
			}
		}

		if ($status === true) {
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}

		return $status;
	}

	public function get_detail_wo($wo_no, $dec_no) {
		$this->db->select('*');
		$this->db->from('decrement_wo');
		$this->db->join('lo_detail', 'lo_detail.lo_idd = decrement_wo.wo_item_id');
		$this->db->where('decrement_wo.ref_wo', $wo_no);
		$this->db->where('decrement_wo.decrement_no', $dec_no);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
			// var_dump($res);
		} else {
			$res = null;
		}

		return $res;
	}
}

/* End of file wo_m.php */
/* Location: ./application/models/wo_m.php */