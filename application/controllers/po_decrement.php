<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class po_decrement extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('office_m');
		$this->load->model('datastore_m');
		$this->load->model('po_m');
		$this->load->Model('auth_m');
		$this->load->library("pagination");

	
	}

	public function index() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();

		// $data['po'] = $this->po_m->po_department();
		$data['rows'] = $this->po_m->get_po();
		// echo "<pre>";
		// print_r($data['rows']);die();

		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v', $data);
		$this->load->view("office/podecrement/po_decrement");
		$this->load->view('base/footer_v');
	}

	public function table_po($po_no) {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$da['dep'] = $session_data['m_dep'];
		$da['project'] = $session_data['m_project'];
		$da['imgu'] = $session_data['img'];
		$dec_no = $this->po_m->check_decrement_no($po_no);
		// var_dump($dec_no);
		// echo "$po_no";
		if (count($dec_no) == 0) {
			$da['rows'] = $this->po_m->get_detail_pr_nohis($po_no);
			// var_dump($da['rows']);
		} else {
			// echo "ELSE";
			$strDesNo = $dec_no[0]['decrement_no'];

			$da['rows'] = $this->po_m->get_detail_pr($po_no, $strDesNo);
			// print_r($da['rows']);die();
		}

		if (count($da['rows']) == 0) {
			echo "<h2 style='color:red'>ไม่พบข้อมูล รายการในใบ PO นี้</h2>";
			die();
		}

		$da['history'] = $this->po_m->history_decrement($po_no);
		// echo "<pre>";
		// print_r($da['history']);
		// $data['rows'] = $this->po_m->get_po_table($po_no);
		$this->load->view('office/podecrement/table_po_decre', $da);
	}

	public function decrement_true() {
		$input = $this->input->post();
		// echo "<pre>";
		// print_r($input);die();
		$i = 0;
		$data = array();
		// echo $input['ref_po'];die();

		$decrement_no = $this->po_m->check_decrement_no($input['ref_po']);
		// die();
		// var_dump($decrement_no);die();
		$is_decrement_pr = array(
			'is_decrement' => 'yes'
		);
		
		$this->db->where('po_pono', $input['ref_po']);
		$this->db->update('po', $is_decrement_pr);
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
				"ref_po" => $input['ref_po'],
				"po_item_id" => $input['po_item_id'][$key],
				"qty" => $input['qty'][$key],
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

		if ($data[0]['type'] == "reduce") {

			$add_history = $this->po_m->add_decrement($data);
			$update_pr_items = $this->po_m->update_qty_po_items($input);
		} else if ($data[0]['type'] == "return") {
			// echo "string";die();
			$update_pr_items = $this->po_m->update_qty_po_items($input);
			foreach ($data as $key => $value) {
				$this->db->where('ref_po', $value['ref_po']);
				$this->db->where('po_item_id', $value['po_item_id']);
				$this->db->where('decrement_no', $value['decrement_no']);
				$this->db->delete('decrement_po');
			}

		} else {
			echo "Type isset";
		}

		redirect('/po_decrement');

		# code...
	}

		public function revise() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['rows'] = $this->po_m->get_porevise();
		$typereport = "po";
		$data['reporttype'] = $this->po_m->get_report($typereport);

		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view("office/podecrement/po_revise");
		$this->load->view('base/footer_v');
		}


}