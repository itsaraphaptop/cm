<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class share extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('datastore_m');
		$this->load->model('manag_m');
		$this->load->library('pagination');
	}
	public function member() {
		$data['id'] = $this->uri->segment(3);
		$data['idd'] = $this->uri->segment(4);
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$projectid = $session_data['projectid'];

		$data['res'] = $this->datastore_m->getmember_p($compcode, $projectid);
		$this->load->view('datastore/share/modal_employee_v', $data);
	}
	public function member2() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$projectid = $session_data['projectid'];

		$data['res'] = $this->datastore_m->getmember_p($compcode, $projectid);
		$this->load->view('datastore/share/modal_employee2_v', $data);
	}
	public function vender() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getvender();
		$this->load->view('datastore/share/modal_vender_v', $data);
	}
	public function vender_pt() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getvender();
		$this->load->view('datastore/share/modal_vender_pt_v', $data);
	}
	public function vender_f() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getvender();
		$this->load->view('datastore/share/modal_vender_f_v', $data);
	}
	public function vender_wt() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getvender();
		$this->load->view('datastore/share/modal_vender_wt_v', $data);
	}
	public function material() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['idd'] = $this->uri->segment(3);
		$data['allmaterial'] = $this->datastore_m->allmaterial();
		$this->load->view('datastore/share/modal_material_v', $data);
	}
	public function material_id() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['idd'] = $this->uri->segment(3);
		// $data['allmaterial'] = $this->datastore_m->allmaterial();

		$this->load->view('datastore/share/modal_material_id_v', $data);
	}
	public function material_alone() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		$res['rows'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_material_all_alone_v',$res);
	}
	public function material_id_ss() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$input = $this->input->post('name');
		$ido = $this->uri->segment(3);
		$allmaterial = $this->datastore_m->allmatbb_concat($input);
// $allmaterial = $this->db->query("select materialcode, matunit_code,matunit_name,CONCAT_WS(materialname,materialspacname,materialbrandname) as materialname from mat_unit where CONCAT_WS(materialname,materialspacname,materialbrandname) like '%$input%")->result();
		// $this->load->view('datastore/share/mmmm_v',$data);

		foreach ($allmaterial as $vali) {
			$this->db->select('matsubgroup_name');
			$this->db->where('mattype_code', $vali->mattype_code);
			$this->db->where('matgroup_code', $vali->matgroup_code);
			$this->db->where('matsubgroup_code', $vali->matsubgroup_code);
			$q = $this->db->get('mat_subgroup')->result();
			foreach ($q as $key => $value) {
				$mname = $value->matsubgroup_name;
			}
			echo "<tr>" .
			"<td>" . $vali->materialcode . "</td>" .
			"<td>" . $mname . "</td>" .
			"<td class='text-left'>" . $vali->mater . " " . $vali->matunit_name . "</td>" .
			"<td><button type='button' class='label label-primary' data-dismiss='modal' id='sel" . $vali->materialcode . "'> Select</button></td>" .
			"</tr>" .
			"<script>" .
			"$('#sel" . $vali->materialcode . "').click(function(){" .
			"$('#mat" . $ido . "').val('" . $vali->materialcode . "');" .
			"$('#newmatcode" . $ido . "').val('" . $vali->materialcode . "');" .
			"$('#newmatname" . $ido . "').val('" . $vali->mater . "');" .
			"$('#punit" . $ido . "').val('" . $vali->matunit_name . "');" .
			"$('#unit" . $ido . "').val('" . $vali->matunit_name . "');" .
			"$('#matcode" . $ido . "').val('" . $vali->materialcode . "');" .
			"$('#matnameadd" . $ido . "').val('" . $vali->mater . "');" .
				"}); </script>";
		}

		return true;
	}
	public function material_id_ss_group() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$input = $this->input->post('name');
		$ido = $this->uri->segment(3);
		$allmaterial = $this->datastore_m->allmatbb_concat_group($input);
// $allmaterial = $this->db->query("select materialcode, matunit_code,matunit_name,CONCAT_WS(materialname,materialspacname,materialbrandname) as materialname from mat_unit where CONCAT_WS(materialname,materialspacname,materialbrandname) like '%$input%")->result();
		// $this->load->view('datastore/share/mmmm_v',$data);

		foreach ($allmaterial as $vali) {
			$this->db->select('matsubgroup_name');
			$this->db->where('mattype_code', $vali->mattype_code);
			$this->db->where('matgroup_code', $vali->matgroup_code);
			$this->db->where('matsubgroup_code', $vali->matsubgroup_code);
			$q = $this->db->get('mat_subgroup')->result();
			foreach ($q as $key => $value) {
				$mname = $value->matsubgroup_name;

				$this->db->select('*');
				$this->db->select('unitprice ,sum(store_total) as total_qty');
				$this->db->where('store_matcode', $vali->materialcode);
				$this->db->where("project.store_center","1");
				$this->db->join('project', 'project.project_id = store.store_project');
				$st = $this->db->get('store')->result();
				foreach ($st as $key => $val) {
					
				}
			}
			echo "<tr>" .
			"<td>" . $vali->materialcode . "</td>" .
			"<td>" . $val->total_qty . "</td>" .
			"<td class='text-left'>" . $vali->mater . " " . $vali->matunit_name . "</td>" .
			"<td><button type='button' class='label label-primary' data-dismiss='modal' id='sel" . $vali->materialcode . "'> Select</button></td>" .
			"</tr>" .
			"<script>" .
			"$('#sel" . $vali->materialcode . "').click(function(){" .
			"$('#mat" . $ido . "').val('" . $vali->materialcode . "');" .
			"$('#newmatcode" . $ido . "').val('" . $vali->materialcode . "');" .
			"$('#newmatname" . $ido . "').val('" . $vali->mater . "');" .
			"$('#punit" . $ido . "').val('" . $vali->matunit_name . "');" .
			"$('#unit" . $ido . "').val('" . $vali->matunit_name . "');" .
			"$('#pprice_unit').val('" . $val->unitprice . "');" .
			"$('#mat_code_base').load('" . base_url() . "office/show_list/" . $vali->materialcode . "/" . $val->total_qty . "');".
			"}); </script>";
		}

		return true;
	}
	public function material_id_alone() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$input = $this->input->post('name');
		$allmaterial = $this->datastore_m->allmatbb_concat($input);

		// $this->load->view('datastore/share/mmmm_v',$data);
		$row = $this->uri->segment(3);
		

		foreach ($allmaterial as $vali) {
			$this->db->select('matsubgroup_name');
			$this->db->where('mattype_code', $vali->mattype_code);
			$this->db->where('matgroup_code', $vali->matgroup_code);
			$this->db->where('matsubgroup_code', $vali->matsubgroup_code);
			$qs = $this->db->get('mat_subgroup')->result();
			foreach ($qs as $key => $values) {
				$mnames = $values->matsubgroup_name;
			}

			$this->db->select('*');
			$this->db->select('unitprice ,sum(store_total) as total_qty');
			$this->db->where('store_matcode', $vali->materialcode);
			$this->db->where("project.store_center","1");
			$this->db->join('project', 'project.project_id = store.store_project');
			$st = $this->db->get('store')->result();
			foreach ($st as $key => $val) {
				
			}

			if ($vali->mattype_code == "C") {
				echo "<tr class='bg-danger'>" .
				"<td>" . $vali->materialcode . "</td>" .
				"<td></td>" .
				"<td class='text-left'>" . $vali->mater . " " . $vali->matunit_name . "</td>" .
				"<td><button type='button' disabled class='label label-primary' data-dismiss='modal' id='sel" . $vali->materialcode . "'> Select</button></td>" .
				"</tr>" .
				"<script>" .
				"$('#sel" . $vali->materialcode . "').click(function(){" .
				"$('#newmatcode').val('" . $vali->materialcode . "');" .
				"$('#newmatname').val('" . $vali->mater . "');" .
				"$('#mat_code_base').attr('matcode', '" . $vali->materialcode . "');" .
				"$('#unit').val('" . $vali->matunit_name . "');" .
				"$('#punitic').val('" . $vali->matunit_name . "');" .
				"$('#pprice_unit').val('" . $val->unitprice . "');" .
				"$('#mat_code_base').load('" . base_url() . "office/show_list/" . $vali->materialcode . "/" . $val->total_qty . "');".
				"}); </script>";
			} else {
				echo "<tr>" .
				"<td>" . $vali->materialcode . "</td>" .
				"<td>" . $val->total_qty . "</td>" .
				"<td class='text-left'>" . $vali->mater . " " . $vali->matunit_name . "</td>" .
				"<td><button type='button' class='label label-primary' data-dismiss='modal' id='sel" . $vali->materialcode . "'> Select</button></td>" .
				"</tr>" .
				"<script>" .
				"$('#sel" . $vali->materialcode . "').click(function(){" .
				"$('#newmatcode').val('" . $vali->materialcode . "');" .
				"$('#newmatname').val('" . $vali->mater . "');" .
				"$('#newmatcode".$row."').val('" . $vali->materialcode . "');" .
				"$('#newmatname".$row."').val('" . $vali->mater . "');" .
				"$('#mat_code_base').attr('matcode', '" . $vali->materialcode . "');" .
				"$('#unit').val('" . $vali->matunit_name . "');" .
				"$('#unitname".$row."').val('" . $vali->matunit_name . "');" .
				"$('#unitcode".$row."').val('" . $vali->matunit_code . "');" .
				"$('#matname".$row."').val('" . $vali->mater . "');" .
				"$('#matcodei".$row."').val('" . $vali->materialcode . "');" .

				"$('#punitic').val('" . $vali->matunit_name . "');" .
				"$('#pprice_unit').val('" . $val->unitprice . "');" .
				"$('#mat_code_base').load('" . base_url() . "office/show_list/" . $vali->materialcode . "/" . $val->total_qty . "');".
				"}); </script>";
			}

		}

		return true;
	}
	public function material_id_alone_group() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$input = $this->input->post('name');
		$allmaterial = $this->datastore_m->allmatbb_concat_group($input);

		// $this->load->view('datastore/share/mmmm_v',$data);

		foreach ($allmaterial as $vali) {
			$this->db->select('matsubgroup_name');
			$this->db->where('mattype_code', $vali->mattype_code);
			$this->db->where('matgroup_code', $vali->matgroup_code);
			$this->db->where('matsubgroup_code', $vali->matsubgroup_code);
			$q = $this->db->get('mat_subgroup')->result();
			foreach ($q as $key => $value) {
				$mname = $value->matsubgroup_name;
			}

			$this->db->select('*');
			$this->db->select('unitprice ,sum(store_total) as total_qty');
			$this->db->where('store_matcode', $vali->materialcode);
			$this->db->where("project.store_center","1");
			$this->db->join('project', 'project.project_id = store.store_project');
			$st = $this->db->get('store')->result();
			foreach ($st as $key => $val) {
				
			}
			
			if ($vali->mattype_code == "C") {
				echo "<tr class='bg-danger'>" .
				"<td>" . $vali->materialcode . "</td>" .
				"<td></td>" .
				"<td class='text-left'>" . $vali->mater . " " . $vali->matunit_name . "</td>" .
				"<td><button type='button' disabled class='label label-primary' data-dismiss='modal' id='sel" . $vali->materialcode . "'> Select</button></td>" .
				"</tr>" .
				"<script>" .
				"$('#sel" . $vali->materialcode . "').click(function(){" .
				"$('#newmatcode').val('" . $vali->materialcode . "');" .
				"$('#newmatname').val('" . $vali->mater . "');" .
				"$('#mat_code_base').attr('matcode', '" . $vali->materialcode . "');" .
				"$('#unit').val('" . $vali->matunit_name . "');" .
				"$('#punitic').val('" . $vali->matunit_name . "');" .
				"$('#pprice_unit').val('" . $val->unitprice . "');" .
				"$('#mat_code_base').load('" . base_url() . "office/show_list/" . $vali->materialcode . "');".
				"}); </script>";
			} else {
				echo "<tr>" .
				"<td>" . $vali->materialcode . "</td>" .
				"<td>" . $val->total_qty . "</td>" .
				"<td class='text-left'>" . $vali->mater . " " . $vali->matunit_name . "</td>" .
				"<td><button type='button' class='label label-primary' data-dismiss='modal' id='sel" . $vali->materialcode . "'> Select</button></td>" .
				"</tr>" .
				"<script>" .
				"$('#sel" . $vali->materialcode . "').click(function(){" .
				"$('#newmatcode').val('" . $vali->materialcode . "');" .
				"$('#newmatname').val('" . $vali->mater . "');" .
				"$('#mat_code_base').attr('matcode', '" . $vali->materialcode . "');" .
				"$('#unit').val('" . $vali->matunit_name . "');" .
				"$('#punitic').val('" . $vali->matunit_name . "');" .
				"$('#pprice_unit').val('" . $val->unitprice . "');" .
				"$('#mat_code_base').load('" . base_url() . "office/show_list/" . $vali->materialcode . "');".
				"}); </script>";
			}


		}

		return true;
	}
	public function matjson() {
		$q = $this->datastore_m->allmaterial();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($q));
	}

	public function material_pagination() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		//pagination settings
		$config['base_url'] = site_url('share/material_pagination');
		$config['total_rows'] = $this->datastore_m->countallmaterial();
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//call the model function to get the department data
		$data['res'] = $this->datastore_m->allmaterial_pagination($config["per_page"], $data['page']);

		$data['pagination'] = $this->pagination->create_links();

		//load the department_view
		$this->load->view('datastore/share/modal_material_pagination_v', $data);
	}
	public function costcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['allcostcode'] = $this->datastore_m->allcostcode();
		$data['id'] = $this->uri->segment(3);
		$data['flagcostcode'] = $this->datastore_m->costlevel($compcode);
		$this->load->view('datastore/share/modal_costcode_v', $data);
	}
	public function costcodeeditpt() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['allcostcode'] = $this->datastore_m->allcostcode();
		// $data['id'] = $this->uri->segment(3);
		$data['rowpt'] = $this->uri->segment(3);

		$this->load->view('datastore/share/modal_costcode_pt_v', $data);
	}

	public function costcode_id() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['n'] = $this->uri->segment(3);
		$data['n_code'] = $this->input->post();
		$data['pr_id'] = $this->uri->segment(3);
		$data['kan'] = $this->uri->segment(4);
		$data['allcostcode'] = $this->datastore_m->allcostcode();
		$data['flagcostcode'] = $this->datastore_m->costlevel($compcode);
		$this->load->view('datastore/share/modal_costcode_id_v', $data);
	}

	public function costcode_id_by_bd() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['n'] = $this->uri->segment(3);
		$data['n_code'] = $this->input->post();
		$data['pr_id'] = $this->uri->segment(4);
		$data['allcostcode'] = $this->datastore_m->allcostcode();

		$this->load->view('datastore/share/modal_costcode_id_v_by_bd', $data);
	}

	public function costcode_id_ls_bd() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['n'] = $this->uri->segment(3);
		$data['n_code'] = $this->input->post();
		$data['pr_id'] = $this->uri->segment(4);
		$data['allcostcode'] = $this->datastore_m->allcostcode();

		$this->load->view('datastore/share/modal_costcode_id_v_ls_bd', $data);
	}
	public function unit() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['getunit'] = $this->datastore_m->getunit();
		$data['x'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_unit_v',$data);
	}
	public function unit1() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['getunit'] = $this->datastore_m->getunit();
		$this->load->view('datastore/share/modal_unit_v1', $data);
	}
	public function unitid() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['m'] = $this->uri->segment(3);
		$data['getunit'] = $this->datastore_m->getunit();
		$this->load->view('datastore/share/modal_unit_id_v', $data);
	}
	public function unitid2() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['m'] = $this->uri->segment(3);
		$data['getunit'] = $this->datastore_m->getunit();
		$this->load->view('datastore/share/modal_unit_id2_v', $data);
	}
	public function unitid1() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['m'] = $this->uri->segment(3);
		$data['getunit'] = $this->datastore_m->getunit();
		$this->load->view('datastore/share/modal_unit_id_v1', $data);
	}
	public function project() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getproject();
		$this->load->view('datastore/share/modal_project_v', $data);
	}
	public function project1() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getproject();
		$this->load->view('datastore/share/modal_project_v1', $data);
	}
	public function project2() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getproject();
		$this->load->view('datastore/share/modal_project_v2', $data);
	}
	public function project_pm() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getproject();
		$this->load->view('datastore/share/modal_project_v_pm', $data);
	}
	public function doct() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getdoc_start();
		$this->load->view('datastore/share/modal_doct_v', $data);
	}
	public function project_po() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getproject_po();
		$this->load->view('datastore/share/modal_project_v', $data);
	}
	public function doct_po() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getdoc_start_po();
		$this->load->view('datastore/share/modal_doct_po_v', $data);
	}

	public function department() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['getdep'] = $this->datastore_m->department();
		$this->load->view('datastore/share/modal_department_v', $data);
	}
	public function bank() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->load->view('datastore/share/modal_bank_v');
	}

	public function getvender() {

		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$q = $this->datastore_m->getvenderjson($compcode);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($q));
	}
	public function venaddr() {
		try {
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			$vendercode = $this->input->post("vendercode");
			$this->db->select('vender_address');
			$this->db->where('vender_name', $vendercode);
			$this->db->where('compcode', $compcode);
			$query = $this->db->get('vender');
			$num = $query->num_rows();
			if ($num == 0) {
				echo $vendercode;
				return true;
			} else {

				$this->db->select('vender_address');
				$this->db->where('vender_name', $vendercode);
				$this->db->where('compcode', $compcode);
				$query = $this->db->get('vender');
				$res = $query->result();
				foreach ($res as $value) {
					$venname = $value->vender_address;
				}
				echo $venname;
				return true;
			}
		} catch (Exception $e) {
			echo $e;
		}

	}

	public function getmatcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_intmaterial_22_v', $data);
	}
	public function getmatcode22() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_intmaterial_22_v', $data);
	}
	public function getmatcode_mat() {

		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_intmaterial_22_v_mat', $data);
	}
	public function getmatcode1() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_intmaterial_vv', $data);
	}
	public function getmatcode_new() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->load->view('datastore/share/modal_intmaterial2_v');
	}
	public function debtor() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['res'] = $this->datastore_m->getdebtor($compcode);
		$this->load->view('datastore/share/modal_deptor_v', $data);
	}
	public function accchart() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_v', $data);
	}
	public function accchart1() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_v1', $data);
	}
	public function accchart_h() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['res'] = $this->datastore_m->h_acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_v1', $data);
	}
	public function accchart_h2() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['res'] = $this->datastore_m->h_acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_v3', $data);
	}
	public function accchart_acc() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['res'] = $this->datastore_m->h_acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_v1', $data);
	}
	public function accchart2() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_v2', $data);
	}
	public function accchartall() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->list_acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_all_v', $data);
	}
	public function acc_chart2() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->acc_chart($compcode);
		$this->load->view('datastore/share/modal_accchart_id', $data);
	}
	public function getjsonmat() {
		$data = $this->datastore_m->allmaterial_json();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}
	public function book() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['res_book'] = $this->datastore_m->book_v();
		$this->load->view('datastore/share/modal_book_v', $data);
	}

	public function system() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->system_m($compcode);
		// var_dump($compcode);
		$this->load->view('datastore/share/modal_system_v', $data);
	}
	public function getmatcode_popr() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_intmaterial_popr_v', $data);
	}

	public function getpono() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['popo'] = $this->datastore_m->getpono();
		$this->load->view('datastore/share/modal_pono_v', $data);
	}

	public function expensother_m() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['exp'] = $this->datastore_m->expensother();
		$data['id'] = $this->uri->segment(3);
		$this->load->view('datastore/share/modal_expensother', $data);
	}
	public function modal_pr_detail() {
		$prno = $this->uri->segment(3);
		$this->load->model('pr_m');
		$data['res'] = $this->pr_m->pr_detail_not_open_po($prno);
		$this->load->view('datastore/share/modal_pr_detail_v', $data);

	}
	public function modal_pr_detail2() {
		$prno = $this->uri->segment(3);
		$data['pono'] = $this->uri->segment(4);
		$this->load->model('pr_m');
		$data['res'] = $this->pr_m->pr_detail_not_open_po($prno);
		$this->load->view('datastore/share/modal_pr_detail2_v', $data);

	}
	public function modal_ic_type_area() {
		$pid = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->get_ictypearea($pid);
		$this->load->view('/datastore/share/modal_ic_type_area_v', $data);
	}

	public function modal_depreciation() {
		$data['res'] = $this->datastore_m->depreciation();
		$this->load->view('datastore/share/modal_depreciation', $data);
	}

	public function depreciation_detail() {
		$id = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->depreciation_detail($id);
		$this->load->view('datastore/share/depreciation_detail', $data);
	}

	public function codeasst() {
		$data['res'] = $this->datastore_m->codeasst();
		$this->load->view('datastore/share/modal_codeasst', $data);
	}

	public function adddeprecii() {
		$data['res'] = $this->datastore_m->adddeprecii();
		$this->load->view('datastore/share/modal_adddeprecii', $data);
	}

	public function insert_system() {
		$data['id'] = $this->uri->segment(3);
		$this->load->view('datastore/share/insert_system', $data);
	}

	public function asslocation() {
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->asslocation();
		$this->load->view('datastore/share/asslocation', $data);
	}
	public function asslocation2() {
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->asslocation2();
		$this->load->view('datastore/share/asslocation2', $data);
	}
	public function loadcontractor() {
		$data['id'] = $this->uri->segment(3);
		$data['dep'] = $this->datastore_m->getcontractor2();
		$data['res'] = $this->datastore_m->getcontractor($data['id']);
		$this->load->view('datastore/share/modal_contractor_v', $data);
	}
	public function loadaddcontractor() {
		$data['id'] = $this->uri->segment(3);
		$data['projectname'] = $this->datastore_m->project_name($data['id']);
		$this->load->view('datastore/share/modal_add_contractor_v', $data);
	}

	public function modalshare_asset() {
		$data['id'] = $this->uri->segment(3);
		$this->load->model('asset_m');
		$data['res'] = $this->asset_m->model_addasset();
		$this->load->view('datastore/share/modalshare_asset', $data);
	}
	public function find_project() {
		$session_data = $this->session->userdata('sessed_in');
		$input = $this->uri->segment(3);
		$res['module'] = $this->uri->segment(4);
		$userid = $session_data['m_id'];
		$projectid = $session_data['projectid'];
		$res['getproj'] = $this->datastore_m->getproject_user_find($userid, $projectid, $input);
		$this->load->view('datastore/share/find_project_v', $res);
	}

	public function find_department() {
		$session_data = $this->session->userdata('sessed_in');
		$input = $this->uri->segment(3);
		$res['getdep'] = $this->datastore_m->department_find($input);
		$this->load->view('datastore/share/find_department_v', $res);
	}
	public function modal_store_material() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['rows'] = $this->uri->segment(3);
		$data['pro'] = $this->uri->segment(4);
		$projid = $this->uri->segment(4);
		$data['res'] = $this->datastore_m->load_store_mat($projid, $compcode);
		$this->load->view('datastore/share/modal_store_material_v', $data);
	}

	public function modalexpensother() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['exp'] = $this->datastore_m->expensother_p();
		$data['emp'] = $this->datastore_m->expensother_d();
		$data['id'] = $this->uri->segment(3);

		$this->load->view('office/pettycash/pettycash_expensother_v', $data);
	}
	public function modalexpensothershare() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['exp'] = $this->datastore_m->expensother_p();
		$data['emp'] = $this->datastore_m->expensother_d();
		$data['id'] = $this->uri->segment(3);
		$data['roweditpr'] = $this->uri->segment(4);
		$this->load->view('office/pettycash/pettycash_expensother_share_v', $data);
	}

	public function costcodebtn() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['n'] = $this->uri->segment(3);
		$data['pr_id'] = $this->uri->segment(4);
		$data['allcostcode'] = $this->datastore_m->allcostcode();

		$this->load->view('datastore/share/modal_cc_lessother_v', $data);
	}

	public function aceditlot() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['n'] = $this->uri->segment(3);
		$data['pr_id'] = $this->uri->segment(4);
		$data['allcostcode'] = $this->datastore_m->allcostcode();
		$this->load->view('datastore/share/modal_cc_edit_lessother_v', $data);
	}
	public function modalac() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['m'] = $this->uri->segment(3);
		$data['getac'] = $this->datastore_m->acc_chart($compcode);
		$this->load->view('datastore/share/modalac_v', $data);
	}
	public function modalacedit() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['m'] = $this->uri->segment(3);
		$data['getac'] = $this->datastore_m->acc_chart($compcode);
		$this->load->view('datastore/share/modalac_edit_v', $data);
	}

	public function modallessother() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['m'] = $this->uri->segment(3);
		$data['getlo'] = $this->datastore_m->less_other($compcode);
		$this->load->view('datastore/share/modallessothertb_v', $data);
	}

	public function loadprdetail() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(3);
		$data['tid'] = $this->uri->segment(4);
		$data['pr'] = $this->manag_m->loadprdetail_v($id,$data['tid']);
		$this->load->view('office/purchase/main/load_datailpr_v', $data);
	}

	public function loadprdetail_wo() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);

		$data['id'] = $this->uri->segment(3);
		$data['tid'] = $this->uri->segment(4);
		$data['pr'] = $this->manag_m->loadprdetail_v($id);
		$this->load->view('office/purchase/main/load_datail_wo_v', $data);
	}

	public function modal_store_material_v() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['rows'] = $this->uri->segment(3);
		$data['pro'] = $this->uri->segment(4);
		$projid = $this->uri->segment(4);

		$this->db->select('ic_type');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('company');
		$res = $query->result();
		foreach ($res as $value) {
			$type = $value->ic_type;
		}
		$data['type'] = $type;
		if ($data['type'] == "fifo") {
			$data['res'] = $this->datastore_m->load_store_mat2($projid, $compcode);
		}else{
			$data['res'] = $this->datastore_m->load_store_mat22($projid, $compcode);
		}
		$this->load->view('datastore/share/modal_store_material_v2', $data);
	}

	public function compare_price() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['price'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->c_price($data['price']);
		$this->load->view('datastore/share/modal_compare_price', $data);
	}

	public function sub_project() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$id = $this->uri->segment(3);
		$data['getproj'] = $this->datastore_m->getsubproject($id);
		$this->load->view('datastore/share/modal_subproject_v', $data);
	}
	public function vender2() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getvender();
		$this->load->view('datastore/share/modal_vender_v2', $data);
	}

	public function poitem() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getpoitem($data['id']);
		$this->load->view('datastore/share/modal_getpoitem', $data);
	}

	public function wo_modal() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getwoitem($id);
		$this->load->view('datastore/share/modal_wo', $data);
	}

	public function modalrefpo() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->modalrefpo($id);
		$this->load->view('datastore/share/modalrefpo', $data);
	}

	public function loadpodetail() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(4);
		$data['res'] = $this->datastore_m->modalrefpo_detail($id);
		$this->load->view('datastore/share/modalrefpo_detail', $data);
	}

	public function modal_deprecation() {

		$data['res'] = $this->datastore_m->list_deprecation();

		$this->load->view('datastore/share/list_deprecation', $data);
	}

	public function modal_list_deprecation() {
		$id = $this->uri->segment(3);
		$this->load->model('gl_m');
		$data['setup_tax'] = $this->gl_m->setup_tax();
        $data['setup_taxdes']  = $this->gl_m->setup_taxdes();
        $data['taxtype'] = $this->gl_m->setup_taxtype();
		$data['res'] = $this->datastore_m->list_modal_deprecation($id);
		$this->load->view('datastore/share/modal_list_deprecation', $data);
	}

	public function accc_modal() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['row'] = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(4);
		$data['res'] = $this->datastore_m->acc_chart($compcode);
		$this->load->view('datastore/share/modal_acc', $data);
	}

	public function modal_writoff() {

		$data['res'] = $this->datastore_m->list_writoff();

		$this->load->view('datastore/share/modal_writoff', $data);
	}

	public function modal_list_writeoff() {
		$id = $this->uri->segment(3);
		$this->load->model('gl_m');
          $data['setup_tax'] = $this->gl_m->setup_tax();
          $data['setup_taxdes']  = $this->gl_m->setup_taxdes();
          $data['taxtype'] = $this->gl_m->setup_taxtype();
		$data['res'] = $this->datastore_m->modal_list_writeoff($id);
		$this->load->view('datastore/share/modal_list_writeoff', $data);
	}

	public function list_writeoff(){
		$id = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->writeoff($id);
		$this->load->view('datastore/share/list_writeoff', $data);
	}

	public function modal_ictranfer(){
		$this->load->model('gl_m');
		$data['res'] = $this->datastore_m->ic_gl();
		$data['ic'] = $this->datastore_m->ic_issue_h();
		$data['po'] = $this->datastore_m->receive_po();
		$data['book'] = $this->gl_m->book_v();
        $data['account'] = $this->gl_m->account_m();
        $data['proj'] = $this->gl_m->getproject();
        $data['system'] = $this->gl_m->system_m();
        $data['depart'] = $this->gl_m->department();
        $data['allcostcode'] = $this->gl_m->allcostcode();
        $data['vender'] = $this->gl_m->getvender();
        $data['customer'] = $this->gl_m->getmember();
        $this->load->model('gl_m');
          $data['setup_tax'] = $this->gl_m->setup_tax();
          $data['setup_taxdes']  = $this->gl_m->setup_taxdes();
          $data['taxtype'] = $this->gl_m->setup_taxtype();
		$this->load->view('datastore/share/modal_ictranfer', $data);
	}

	public function paid_type(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['paid'] = $this->datastore_m->paid($compcode);
		$this->load->view('datastore/share/paid', $data);
	}

	public function bank_master(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['bank'] = $this->datastore_m->bank_master($compcode);
		$this->load->view('datastore/share/bank', $data);
	}

	

	public function copy_gl(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['glecho'] = $this->datastore_m->copy_gl($compcode);
		$this->load->view('datastore/share/copy_gl', $data);
	}

	public function reverse(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['reverse'] = $this->datastore_m->reverse($compcode);
		$this->load->view('datastore/share/modal_reverse', $data);
	}

	public function modal_list_gl(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		 $this->load->model('gl_m');
          $data['setup_tax'] = $this->gl_m->setup_tax();
          $data['setup_taxdes']  = $this->gl_m->setup_taxdes();
          $data['taxtype'] = $this->gl_m->setup_taxtype();
		$data['res'] = $this->datastore_m->modal_copy_gl($id,$compcode);
		$this->load->view('datastore/share/modal_list_gl', $data);
	}
	
	public function modal_list_reverse(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
				 $this->load->model('gl_m');
          $data['setup_tax'] = $this->gl_m->setup_tax();
          $data['setup_taxdes']  = $this->gl_m->setup_taxdes();
          $data['taxtype'] = $this->gl_m->setup_taxtype();
		$data['res'] = $this->datastore_m->modal_copy_gl($id,$compcode);
		$this->load->view('datastore/share/modal_list_reverse', $data);
	}

	public function loadjournal(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['reverse'] = $this->datastore_m->loadjournal_m($compcode);
		$this->load->view('datastore/share/modal_journal', $data);
	}

	public function modal_list_loadjournal(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->modal_copy_gl($id,$compcode);
		$this->load->view('datastore/share/modal_list_loadjournal', $data);
	}

	public function load_pr_detail_for_wo(){
		$session_data = $this->session->userdata('sessed_in');
		$data['compcode'] = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$data['project_id'] = $this->uri->segment(4);
		$data['pr_detail'] = $this->datastore_m->pr_detail($id,$data['compcode']);
		$this->load->view('office/contract/load_pr_item_v',$data);
	}

	public function load_pr_unit_detail(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['prno'] = $this->uri->segment(3);
		$data['projectcode'] = $this->uri->segment(4);
		$data['res'] = $this->datastore_m->load_pr_unit($data['prno'],$data['projectcode']);
		$this->load->view('datastore/share/modal_pr_unit_v',$data);

	}
	public function load_pr_unit_item(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['prno'] = $this->uri->segment(3);
		$data['projectcode'] = $this->uri->segment(4);
		$data['res'] = $this->datastore_m->load_pr_unit($data['prno'],$data['projectcode']);
		$this->load->view('datastore/share/load_pr_unit_project_v',$data);
	}
	public function load_approve(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$username = $session_data['username'];

		$data['companyfix'] = $this->uri->segment(3);
		$data['m_idfix'] = $this->uri->segment(4);
		$this->load->view('navtail/base_defualt/load_approve',$data);
	}
	public function load_modal_account(){
		$this->load->view('datastore/share/modal_account_v');
	}
	public function load_modal_account_detail(){
		$this->load->view('datastore/share/modal_account_detail_v');
	}
	public function load_modal_account2(){
		$this->load->view('datastore/share/modal_account2_v');
	}
	public function getaccount(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$query = $this->datastore_m->acc_chart($compcode);
		$arr = array();
		$arr['data'] = $query;
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($arr));

	}
	public function getaccount_deta(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$query = $this->datastore_m->h_acc_chart_d($compcode);
		$arr = array();
		$arr['data'] = $query;
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($arr));

	}
	public function load_modal_project(){
		$this->load->view('datastore/share/modal_project_newv_v');
	}
	public function getprojectnew(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$query = $this->datastore_m->getproject_open($compcode);
		$arr = array();
		$arr['data'] = $query;
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($arr));

	}
	public function load_modal_uploadfile(){
		$data['m_id'] = $this->uri->segment(3);
		$data['getmemb'] = $this->datastore_m->getdataemployee_array($data['m_id']);
		$this->load->view('datastore/share/load_modal_uploadfile_v',$data);
	}
}
