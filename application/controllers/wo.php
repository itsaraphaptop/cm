<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wo extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('datastore_m');
		$this->load->Model('auth_m');
		$this->load->model('module_m');
		$this->load->helper('date');
		$this->load->Model('wo_m');
		$this->load->model('config_m');
		$session_data = $this->session->userdata('sessed_in');

	
	}

	public function index() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$data['mid'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['rows'] = $this->wo_m->wo_approve();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_wo_v', $data);
		$this->load->view('office/wo/index', $data);
		$this->load->view('base/footer_v');
	}

	public function table_wo($wo_no) {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$da['dep'] = $session_data['m_dep'];
		$da['project'] = $session_data['m_project'];
		$da['imgu'] = $session_data['img'];
		$dec_no = $this->wo_m->check_decrement_no($wo_no);
		// var_dump($wo_no);
		// echo "<br>";
		// var_dump($dec_no);

		// // echo "$po_no";
		if (count($dec_no) == 0) {
			// echo "IF";
			$da['rows'] = $this->wo_m->get_detail_wo_nohis($wo_no);
			// var_dump($da['rows']);
		} else {
			// echo "ELSE";die();
			$strDesNo = $dec_no[0]['decrement_no'];

			$da['rows'] = $this->wo_m->get_detail_wo($wo_no, $strDesNo);
			// echo "<pre>";
			// print_r($da['rows']);die();
		}
		// die();
		// echo "<pre>";
		// var_dump($da['rows']);die();
		$da['history'] = $this->wo_m->history_decrement($wo_no);
		// echo "<pre>";
		if (count($da['rows']) == 0) {
			echo "<h2 style='color:red'>ไไม่พบข้อมูล รายการในใบ WO นี้</h2>";
			die();
		}
		// print_r($da['history']);
		// $data['rows'] = $this->wo_m->get_po_table($po_no);
		$this->load->view('office/wo/table_wo', $da);
	}

	public function decrement_true() {
		$input = $this->input->post();
		// echo "<pre>";
		// print_r($input);die();
		$i = 0;
		$data = array();
		// echo $input['ref_po'];die();

		$decrement_no = $this->wo_m->check_decrement_no($input['ref_wo']);
		// die();
		// var_dump($decrement_no);die();

		// $count = count($input['decrement']);
		// var_dump($input['type']);die();
		// echo $input['type'];die();
		foreach ($input['decrement'] as $key => $value) {
			// if ($input['decrement'][$key] > 0) {
			if (count($decrement_no) == 0) {
				# code...
				$dec_no = '1';
			} else {
				if ($input['type'] == "reduce") {
					# code...
					$dec_no = $decrement_no[0]['decrement_no'];
					$dec_no++;
					// echo $dec_no;die();
				} else if ($input['type'] == "return") {
					$dec_no = $decrement_no[0]['decrement_no'];
				}
			}
			if ($input['decrement'][$key] == '0') {
				$decrement_status = "hide";
			} else {
				$decrement_status = "show";
			}

			$data[] = array(
				"ref_wo" => $input['ref_wo'],
				"wo_item_id" => $input['wo_item_id'][$key],
				"money_decre" => $input['money_decre'][$key],
				"decrement" => $input['decrement'][$key]*1,
				"balance" => $input['balance'][$key],
				"user_decrement" => $input['user_decrement'],
				"remark" => $input['remark'],
				"date_decrement" => $input['date_decrement'],
				"compcode" => $input['compcode'],
				"decrement_no" => $dec_no,
				"decrement_status" => $decrement_status,
				"type" => $input['type'],
			);

		}
		// echo "<pre>";
		// print_r($input);
		// echo "<hr>";
		// print_r($data);die();

		if ($data[0]['type'] == "reduce") {
			// echo "if";die();
			$add_history = $this->wo_m->add_decrement($data);
			$update_pr_items = $this->wo_m->update_qty_pr_items($input);
		} else if ($data[0]['type'] == "return") {
			// echo "else if";die();
			$update_pr_items = $this->wo_m->update_qty_pr_items($input);
			foreach ($data as $key => $value) {
				$this->db->where('ref_wo', $value['ref_wo']);
				$this->db->where('wo_item_id', $value['wo_item_id']);
				$this->db->where('decrement_no', $value['decrement_no']);
				$this->db->delete('decrement_wo');
			}

		} else {
			echo "Type isset";
		}
		// echo "Success!!";
		redirect('/wo');

		# code...
	}

}

/* End of file wo.php */
/* Location: ./application/controllers/wo.php */