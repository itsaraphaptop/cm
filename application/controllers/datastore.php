<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class datastore extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model('datastore_m');
		$this->load->helper('date');
		$this->load->library( 'image_lib' );
	}
	public function permission() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['mpm'] = $session_data['mpm'];
		$data['moffce'] = $session_data['moffce'];
		$data['mpo'] = $session_data['mpo'];
		$data['mic'] = $session_data['mic'];
		$data['map'] = $session_data['map'];
		$data['mar'] = $session_data['mar'];
		$data['mhr'] = $session_data['mhr'];
		$data['approve'] = $session_data['approve'];
		$data['master'] = $session_data['master'];
		$data['user_right'] = $session_data['user_right'];
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		} else {
			// $this->load->view('navtail/base_master/header_v');
			// $this->load->view('datastore/base/office_menu_v',$data);
			$this->load->view('datastore/base/main_v', $data);
			// $this->load->view('base/footer_v');
		}

	}
	///////////////// material
	public function addmattype() {
		$code = $this->input->post('mattypecode');
		$data = array(
			'mattype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecode'))),
			'mattype_name' => $this->input->post('mattypename'),
			'mattype_status' => 'yes',
		);
		$q = $this->db->insert('mat_type', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function editmattype() {
		$code = $this->input->post('mattypecode');
		$data = array(
			'mattype_name' => $this->input->post('mattypename'),
			'mattype_status' => 'yes',
		);
		$this->db->where('mattype_code', $code);
		$q = $this->db->update('mat_type', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function editctype() {
		$code = $this->input->post('typecode');
		$data = array(
			'ctype_name' => $this->input->post('typename'),
		);
		$this->db->where('ctype_code', $code);
		$q = $this->db->update('cost_type', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function delmattype() {
		$code = $this->input->post('mattypecode');
		$data = array(
			'mattype_code' => $code,
		);
		$this->db->delete('mat_type', $data);
		$this->db->delete('mat_group', $data);
		$this->db->delete('mat_subgroup', $data);
		$this->db->delete('mat_product', $data);
		$q = $this->db->delete('mat_spec', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function delctype() {
		$code = $this->input->post('typecode');
		$data = array(
			'ctype_code' => $code,
		);
		$this->db->delete('cost_type', $data);
		$this->db->delete('cost_group', $data);
		$q = $this->db->delete('cost_subgroup', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function getmatgruop() {
		$id = $this->uri->segment(3);
		echo "Materail Code: ";
		echo $id;
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getmat_group($id);
		$this->load->view('datastore/matcode/service_matgroup_v', $data);
	}
	public function getmatsubgroup() {
		$type = $this->uri->segment(3);
		$group = $this->uri->segment(4);
		echo "Materail Code: ";
		echo $type;
		echo "-";
		echo $group;
		$data['type'] = $this->uri->segment(3);
		$data['group'] = $this->uri->segment(4);
		$data['res'] = $this->datastore_m->getmat_subgroup($type, $group);
		$this->load->view('datastore/matcode/service_matsubgroup_v', $data);
	}
	public function getmatproductgroup() {
		$type = $this->uri->segment(3);
		$group = $this->uri->segment(4);
		$subgroup = $this->uri->segment(5);
		echo "Materail Code: ";
		echo $type;
		echo "-";
		echo $group;
		echo "-";
		echo $subgroup;
		$data['type'] = $this->uri->segment(3);
		$data['group'] = $this->uri->segment(4);
		$data['subgroup'] = $this->uri->segment(5);
		$data['res'] = $this->datastore_m->getmat_product($type, $group, $subgroup);
		$this->load->view('datastore/matcode/service_matproduct_v', $data);
	}
	public function getmatspec() {
		$type = $this->uri->segment(3);
		$group = $this->uri->segment(4);
		$subgroup = $this->uri->segment(5);
		$product = $this->uri->segment(6);
		echo "Materail Code: ";
		echo $type;
		echo "-";
		echo $group;
		echo "-";
		echo $subgroup;
		echo "-";
		echo $product;
		$data['type'] = $this->uri->segment(3);
		$data['group'] = $this->uri->segment(4);
		$data['subgroup'] = $this->uri->segment(5);
		$data['product'] = $this->uri->segment(6);
		$data['res'] = $this->datastore_m->getmat_spec($type, $group, $subgroup, $product);
		$this->load->view('datastore/matcode/service_matspec_v', $data);
	}
	public function addmatgroup() {
		$code = $this->input->post('mattypecode');
		$data = array(
			'mattype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecode'))),
			'matgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matgroupcode'))),
			'matgroup_name' => $this->input->post('matgroupname'),
			'matgroup_status' => 'yes',
		);

		$q = $this->db->insert('mat_group', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function addcgroup() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$code = $this->input->post('mattypecode');
		$data = array(
			'ctype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecode'))),
			'cgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matgroupcode'))),
			'cgroup_name' => $this->input->post('matgroupname'),
			'cgroup_status' => 'yes',
			'compcode' => $compcode,
		);
		$q = $this->db->insert('cost_group', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function editcgroup() {
		$code = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$groupname = $this->input->post('matgroupname');
		$data = array(
			'cgroup_name' => $this->input->post('matgroupname'),
			'cgroup_status' => 'yes',
		);
		$this->db->where('ctype_code', $code);
		$this->db->where('cgroup_code', $group);
		$q = $this->db->update('cost_group', $data);
		if ($q) {
			echo $group . '----' . $code . '-----' . $groupname;
			return true;
		} else {
			return false;
		}
	}
	public function delcgroup() {
		$code = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$data = array(
			'cgroup_code' => $group,
			'ctype_code' => $code,
		);
		$this->db->where('ctype_code', $code);
		$this->db->where('cgroup_code', $group);
		$this->db->delete('cost_group', $data);
		$q = $this->db->delete('cost_subgroup', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function addcsubgroup() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$sub = $this->input->post('matsubgroupcode');
		$subname = $this->input->post('matsubgroupname');
		$data = array(
			'ctype_code' => preg_replace("/[[:blank:]]+/", "", trim($type)),
			'cgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($group)),
			'csubgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($sub)),
			'csubgroup_name' => preg_replace("/[[:blank:]]+/", "", trim($subname)),
			'csubgroup_status' => 'yes',
			'cost_status' => 'N',
			'costcode_d' => '',
			'cosrcode_h' => '',
			'compcode' => $compcode,
			'costhead' => $this->input->post('type'),
		);
		$q = $this->db->insert('cost_subgroup', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function editcsubgroup() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroupcode = $this->input->post('matsubgroupcode');
		$data = array(
			'csubgroup_name' => $this->input->post('matsubgroupname'),
			'csubgroup_status' => 'yes',
			'costhead' => $this->input->post('type'),
		);
		$this->db->where('ctype_code', $type);
		$this->db->where('cgroup_code', $group);
		$this->db->where('csubgroup_code', $subgroupcode);
		$q = $this->db->update('cost_subgroup', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function delcsubgroup() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroupcode = $this->input->post('matsubgroupcode');
		$data = array(
			'cgroup_code' => $group,
			'ctype_code' => $type,
			'csubgroup_code' => $subgroupcode,
		);
		$this->db->where('ctype_code', $type);
		$this->db->where('cgroup_code', $group);
		$this->db->where('csubgroup_code', $subgroupcode);
		$q = $this->db->delete('cost_subgroup', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function editmatgroup() {
		$code = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$groupname = $this->input->post('matgroupname');
		$data = array(
			'matgroup_name' => $this->input->post('matgroupname'),
			'matgroup_status' => 'yes',
		);
		$this->db->where('mattype_code', $code);
		$this->db->where('matgroup_code', $group);
		$q = $this->db->update('mat_group', $data);
		if ($q) {
			echo $group . '----' . $code . '-----' . $groupname;
			return true;
		} else {
			return false;
		}
	}
	public function delmatgroup() {
		$code = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$data = array(
			'matgroup_code' => $group,
			'mattype_code' => $code,
		);
		$this->db->where('mattype_code', $code);
		$this->db->where('matgroup_code', $group);
		$this->db->delete('mat_group', $data);
		$this->db->delete('mat_subgroup', $data);
		$this->db->delete('mat_product', $data);
		$q = $this->db->delete('mat_spec', $data);
		if ($q) {
			echo $code;
			return true;
		} else {
			return false;
		}
	}
	public function addmatsubgroup() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$data = array(
			'mattype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecode'))),
			'matgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matgroupcode'))),
			'matsubgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matsubgroupcode'))),
			'matsubgroup_name' => $this->input->post('matsubgroupname'),
			'matsubgroup_status' => 'yes',
		);
		$q = $this->db->insert('mat_subgroup', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function editmatsubgroup() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroupcode = $this->input->post('matsubgroupcode');
		$data = array(
			'matsubgroup_name' => $this->input->post('matsubgroupname'),
			'matsubgroup_status' => 'yes',
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroupcode);
		$q = $this->db->update('mat_subgroup', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function delmatsubgroup() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroupcode = $this->input->post('matsubgroupcode');
		$data = array(
			'matgroup_code' => $group,
			'mattype_code' => $type,
			'matsubgroup_code' => $subgroupcode,
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroupcode);
		$this->db->delete('mat_subgroup', $data);
		$this->db->delete('mat_product', $data);
		$q = $this->db->delete('mat_spec', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function addmatproduct() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$data = array(
			'mattype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecode'))),
			'matgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matgroupcode'))),
			'matsubgroup_code' =>  preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matsubgroupcode'))),
			'matcode' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matproductcode'))),
			'matname' => $this->input->post('matproductname'),
			'materialcode' => $type . $group . $subgroup,
			'matstatus' => 'yes',
		);
		$q = $this->db->insert('mat_product', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function editmatproduct() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$matcode = $this->input->post('matproductcode');
		$data = array(
			'matname' => $this->input->post('matproductname'),
			'matstatus' => 'yes',
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $matcode);
		$q = $this->db->update('mat_product', $data);
		if ($q) {
			$datau = array(
				'materialname' => $this->input->post('matproductname'),
			);
			$this->db->where('mattype_code', $type);
			$this->db->where('matgroup_code', $group);
			$this->db->where('matsubgroup_code', $subgroup);
			$this->db->where('matcode', $matcode);
			$this->db->update('mat_unit', $datau);
			return true;
		} else {
			return false;
		}
	}
	public function delmatproduct() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$matcode = $this->input->post('matproductcode');
		$data = array(
			'matgroup_code' => $group,
			'mattype_code' => $type,
			'matsubgroup_code' => $subgroup,
			'matcode' => $matcode,
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $matcode);
		$this->db->delete('mat_product', $data);
		$q = $this->db->delete('mat_spec', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function addmatspec() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$product = $this->input->post('matproductcode');
		$data = array(
			'mattype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecode'))),
			'matgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matgroupcode'))),
			'matsubgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matsubgroupcode'))),
			'matcode' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matproductcode'))),
			'matspec_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matspeccode'))),
			'matspec_name' => $this->input->post('matspecname'),
			'matspec_status' => 'yes',
		);
		$q = $this->db->insert('mat_spec', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}

	public function addmatbrand() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$product = $this->input->post('matproductcode');
		$data = array(
			'mattype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecode'))),
			'matgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matgroupcode'))),
			'matsubgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matsubgroupcode'))),
			'matcode' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matproductcode'))),
			'matspec_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matspeccodesix'))),
			'matbrand_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matbrandcode'))),
			'matbrand_name' => $this->input->post('matbrandname'),
			'matunit' => $this->input->post('matunit'),
			'matspec_status' => 'yes',
			'compcode' => $compcode,
		);
		$q = $this->db->insert('mat_brand', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function editmatspec() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$product = $this->input->post('matproductcode');
		$spec = $this->input->post('matspeccode');
		$data = array(
			'matspec_name' => $this->input->post('matspecname'),
			'matspec_status' => 'yes',
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $product);
		$this->db->where('matspec_code', $spec);
		$q = $this->db->update('mat_spec', $data);
		if ($q) {
			$datau = array(
				'materialspacname' => $this->input->post('matspecname'),
			);
			$this->db->where('mattype_code', $type);
			$this->db->where('matgroup_code', $group);
			$this->db->where('matsubgroup_code', $subgroup);
			$this->db->where('matcode', $product);
			$this->db->where('matspec_code', $spec);
			$this->db->update('mat_unit', $datau);
			return true;
		} else {
			return false;
		}
	}
	public function editmatbrand() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$product = $this->input->post('matproductcode');
		$spec = $this->input->post('matspeccode');
		$brand = $this->input->post('matbrandcode');
		$data = array(
			'matbrand_name' => $this->input->post('matbrandname'),
			'matunit' => $this->input->post('matunit'),
			'matspec_status' => 'yes',
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $product);
		$this->db->where('matspec_code', $spec);
		$this->db->where('matbrand_code', $brand);
		$q = $this->db->update('mat_brand', $data);
		if ($q) {
			$datau = array(
				'materialbrandname' => $this->input->post('matbrandname'),
			);
			$this->db->where('mattype_code', $type);
			$this->db->where('matgroup_code', $group);
			$this->db->where('matsubgroup_code', $subgroup);
			$this->db->where('matcode', $product);
			$this->db->where('matspec_code', $spec);
			$this->db->where('matbrand_code', $brand);
			$this->db->update('mat_unit', $datau);
			return true;
		} else {
			return false;
		}
	}
	public function delmatspec() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$product = $this->input->post('matproductcode');
		$spec = $this->input->post('matspeccode');
		$data = array(
			'matgroup_code' => $group,
			'mattype_code' => $type,
			'matsubgroup_code' => $subgroup,
			'matcode' => $product,
			'matspec_code' => $spec,
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $product);
		$this->db->where('matspec_code', $spec);
		$q = $this->db->delete('mat_spec', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function delmatbrand() {
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$product = $this->input->post('matproductcode');
		$spec = $this->input->post('matspeccode');
		$brand = $this->input->post('matbrandcode');
		$data = array(
			'matgroup_code' => $group,
			'mattype_code' => $type,
			'matsubgroup_code' => $subgroup,
			'matcode' => $product,
			'matspec_code' => $spec,
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $product);
		$this->db->where('matspec_code', $spec);
		$this->db->where('matbrand_code', $brand);
		$q = $this->db->delete('mat_brand', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	//////////////// end material

	public function index() {
		$this->load->view('auth/login_v');
	}

	// main panel on datastore class

	public function mainview() {

	}
	public function service_mat() {

	}
	public function matcode() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['user_right'] = $session_data['user_right'];
		$this->load->view('navtail/base_master/header_v');
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('base/office_menu_v', $data);
		$this->load->view('datastore/matcode/main_v');
		$this->load->view('base/footer_v');
	}
	public function matcode_new() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];

		$this->load->view('navtail/base_master/header_v', $data);
		// $this->load->view('navtail/base_master/tail_v');
		$this->load->view('datastore/matcode/main_v');
		$this->load->view('base/footer_v');
	}
	public function costcode() {
		$this->load->model('datastore_m');
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['user_right'] = $session_data['user_right'];
		$this->load->view('navtail/base_master/header_v');
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('base/office_menu_v', $data);
		$this->load->view('datastore/costcode/main_v');
		$this->load->view('base/footer_v');
	}
	//company
	public function archive_company() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$this->load->model('online_user_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['multicomp'] = $this->online_user_m->multicomp($compcode);
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_master_v');
		$this->load->view('datastore/company/archive_comp_v');
		$this->load->view('base/footer_v');

	}
	public function setcompany() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$this->load->model('online_user_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
		$data['position_name'] = $session_data['position_name'];
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		$data['companyname'] = $session_data['companyname'];
		$data['comp_img'] = $session_data['comp_img'];
		$data['module_id'] = $this->uri->segment(3);
		$this->load->model('permission_m');
		$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
		$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
		$this->load->view('datastore/company/setcompany_v');
		$this->load->view('navtail/base_defualt/footer_new_v');

	}
	public function printcompany(){
		$session_data = $this->session->userdata('sessed_in');
		$data['m_name'] = $session_data['m_name'];
		$this->load->view('datastore/company/print_company_v',$data);
	}
	public function newcompany() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();

		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		// $this->load->model('config_m');
		// $data['vdo'] = $this->config_m->getvedioname();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');

		$this->load->view('navtail/navtail_master_v');
		// $this->load->view('datastore/company/tail_v');
		$this->load->view('datastore/company/new_comp_v', $data);

		$this->load->view('base/footer_v');
	}
	public function addcompany() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$this->load->model('online_user_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
		$data['position_name'] = $session_data['position_name'];
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		$data['companyname'] = $session_data['companyname'];
		$data['comp_img'] = $session_data['comp_img'];
		$data['module_id'] = $this->uri->segment(3);
		$this->load->model('permission_m');
		$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
		$this->load->view('navtail/base_defualt/header_v',$data);
		$this->load->view('navtail/navtail_master_new_v');
		$this->load->view('navtail/navtail_master_submodule_v');
		$this->load->view('datastore/company/add_company_v');
		$this->load->view('navtail/base_defualt/footer_new_v');
	}
	public function editcompany() {

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$this->load->model('online_user_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
		$data['position_name'] = $session_data['position_name'];
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		$data['companyname'] = $session_data['companyname'];
		$data['comp_img'] = $session_data['comp_img'];
		$data['module_id'] = $this->uri->segment(3);
		$this->load->model('permission_m');
		$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
		$data['res'] = $this->datastore_m->getcompanybycompcode($this->uri->segment(3));
		$this->load->view('navtail/base_defualt/header_v',$data);
		$this->load->view('navtail/navtail_master_new_v');
		$this->load->view('navtail/navtail_master_submodule_v');
		$this->load->view('datastore/company/edit_company_v');
		$this->load->view('navtail/base_defualt/footer_new_v');
	}
	public function company() {

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();

		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompanybycompcode($this->uri->segment(3));
		$data['user_right'] = $session_data['user_right'];
		// $this->load->model('config_m');
		// $data['vdo'] = $this->config_m->getvedioname();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');

		$this->load->view('navtail/navtail_master_v');
		// $this->load->view('datastore/company/tail_v');
		$this->load->view('datastore/company/main_v', $data);

		$this->load->view('base/footer_v');
	}
	public function setictype() {
		$id = $this->input->post('id');
		try {
			$data = array(
				'ic_type' => $this->input->post('type'),
			);
			$this->db->where('company_id', $id);
			$this->db->update('company', $data);

		} catch (Exception $e) {
			return false;
		}

	}
	public function edit_company() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$id = $this->uri->segment(3);
		$maincode = $this->input->post('maincode');
		$edt = array(
			'company_nameth' => $this->input->post('name'),
			'company_name' => $this->input->post('company_nameEN'),
			'company_taxnum' => $this->input->post('taxno'),
			'company_taxnumen' => $this->input->post('taxnoen'),
			'company_address' => $this->input->post('address1'),
			'company_address2' => $this->input->post('address2'),
			'company_address3' => $this->input->post('address3'),
			'company_add_en' => $this->input->post('address_en1'),
			'company_add_en2' => $this->input->post('address_en2'),
			'company_add_en3' => $this->input->post('address_en3'),
			'wt_tax' => $this->input->post('wttax'),
			'company_tel' => $this->input->post('tel'),
			'company_fax' => $this->input->post('fax'),
			'company_email' => $this->input->post('email'),
			'company_contact' => $this->input->post('contact'),
			'wt_taxen' => $this->input->post('wttaxen'),
			'company_telen' => $this->input->post('telen'),
			'company_faxen' => $this->input->post('faxen'),
			'company_emailen' => $this->input->post('emailen'),
			'company_contacten' => $this->input->post('contacten'),
			'useredit' => $username,
			'updatetime' => date('Y-m-d H:i:s', now()),
		);
		$this->db->where('company_id', $id);
		$upt = $this->db->update('company', $edt);

		if ($upt) {

			redirect('datastore/editcompany/' . $maincode);

		} else {

			echo "error update";

		}
	}

	public function project() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['enable'] = $this->datastore_m->count_enable();
		$data['disable'] = $this->datastore_m->count_disable();
		$data['user_right'] = $session_data['user_right'];

		if ($username == "") {
			redirect('/');
		} else {
			$this->load->view('navtail/base_master/header_v');
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('base/office_menu_v', $data);
			$this->load->view('datastore/project/main_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function vender() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['enable'] = $this->datastore_m->countveder_enable();
		$data['disable'] = $this->datastore_m->countvender_disable();
		$data['user_right'] = $session_data['user_right'];
		if ($username == "") {
			redirect('/');
		} else {
			$this->load->view('navtail/base_master/header_v');
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('base/office_menu_v', $data);
			$this->load->view('datastore/vender/main_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function user() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['getproj'] = $this->datastore_m->getproject();
		$data['getdep'] = $this->datastore_m->department();
		$data['list'] = $this->datastore_m->department();
		$data['master'] = $session_data['master'];
		$data['user_right'] = $session_data['user_right'];
		if ($username == "") {
			redirect('/');
		} else {
			$this->load->view('navtail/base_master/header_v');
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('base/office_menu_v', $data);
			$this->load->view('datastore/user/tailmenu_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function adduser() {
		$datestring = "Y";
		$m = "m";
		$this->db->select('*');
		$this->db->order_by('m_id', 'desc');
		$this->db->limit('1');
		$this->db->where('m_type', 'employee');
		$q = $this->db->get('member');
		$run = $q->result();
		foreach ($run as $valx) {
			$x1 = $valx->m_id + 1;

		}
		$no = "M" . date($datestring) . date($m) . $x1;
		$data = array(
			'm_code' => $no,
			'm_name' => $this->input->post('bname'),
			'm_user' => $this->input->post('user'),
			'm_pass' => sha1(sha1(md5($this->input->post('pass', TRUE)))),
			'm_position' => $this->input->post('ntype'),
			'm_status' => "o",
			'm_login' => $this->input->post('login'),
			'm_email' => $this->input->post('bbemail'),
			'm_project' => $this->input->post('project'),
			'm_department' => $this->input->post('department'),
			'm_tel' => $this->input->post('tel'),
			'uimg' => "no_avatar.jpgg",
		);
		$q = $this->db->insert('member', $data);
		if ($q) {
			$userright = array(
				'm_user' => $this->input->post('user'),
				'm_office' => 'true',
				'user_add' => $this->input->post('user'),
			);
			$this->db->insert('menu_right', $userright);
			echo $x1;
			return true;
		} else {
			return false;
		}
	}
	public function service_user() {
		$id = $this->uri->segment(3);
		$data['user'] = $this->datastore_m->getmember();
		$data['getproj'] = $this->datastore_m->getproject();
		$data['getdep'] = $this->datastore_m->department();
		$this->load->view('datastore/user/service_user_v', $data);
	}
	public function update_serviceuser() {
		$id = $this->input->post('id');
		$data = array(
			'm_code' => $this->input->post('ucode'),
			'm_name' => $this->input->post('uname'),
			'm_pass' => sha1(sha1(md5($this->input->post('upass')))),
			'm_user' => $this->input->post('uuser'),
			'm_tel' => $this->input->post('utel'),
			'm_status' => $this->input->post('ustatus'),
			'm_email' => $this->input->post('umail'),
			'm_department' => $this->input->post('udepart'),
			'm_project' => $this->input->post('uproject'),
		);
		$this->db->where('m_id', $id);
		$up = $this->db->update('member', $data);
		if ($up) {
			echo $id;
			return true;
		} else {
			return false;
		}
	}
	public function delete_serviceuser() {
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$this->db->delete('member', array('m_id' => $id));

		$this->db->delete('menu_right', array('m_user' => $username));
		echo $id;
		return true;
	}

	public function service_project() {
		$id = $this->uri->segment(3);
		$data['project'] = $this->datastore_m->getproject($id);
		$this->load->view('datastore/user/service_project_v', $data);
	}

	public function project_enable() {
		$data['enable'] = $this->datastore_m->getproject_enable();
		$this->load->view('datastore/project/enable_project', $data);
	}

	public function project_disable() {
		$data['disable'] = $this->datastore_m->getproject_disable();
		$this->load->view('datastore/project/disable_project', $data);
	}
	public function service_create_project() {
		$this->load->view('datastore/project/project_form_v');
	}

// codecode
	public function service_ccosttype() {
		$id = $this->uri->segment(3);
		$data['ccosttype'] = $this->datastore_m->getcost_type();
		$this->load->view('datastore/costcode/service_ccosttype_v', $data);
	}
	public function service_ccostgroup() {
		$id = $this->uri->segment(3);

		$data['ccostgroup'] = $this->datastore_m->getcost_group($id);
		$this->load->view('datastore/costcode/service_ccostgroup_v', $data);
	}
	public function service_ccostsubgroup() {
		$typeid = $this->uri->segment(3);
		$groupid = $this->uri->segment(4);
		$data['ccostsubgroup'] = $this->datastore_m->getcost_subgroup($typeid, $groupid);
		$this->load->view('datastore/costcode/service_costsubgroup_v', $data);
	}
	public function ccostgroup() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['user_right'] = $session_data['user_right'];
		$typeid = $this->uri->segment(3);
		$this->db->select('ctype_name');
		$this->db->where('ctype_code', $typeid);
		$query = $this->db->get('cost_type');
		$res = $query->result();
		foreach ($res as $val) {
			$data['tname'] = $val->ctype_name;
		}
		$data['ccostgroup'] = $this->datastore_m->getcost_group($typeid);

		if ($username == "") {
			redirect('/');
		} else {
			$this->load->view('navtail/base_master/header_v');
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('base/office_menu_v', $data);
			$this->load->view('datastore/costcode/service_ccostgroup_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function ccostsubgroup() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['user_right'] = $session_data['user_right'];
		$typeid = $this->uri->segment(3);
		$this->db->select('ctype_name');
		$this->db->where('ctype_code', $typeid);
		$query = $this->db->get('cost_type');
		$res = $query->result();
		foreach ($res as $val) {
			$data['tname'] = $val->ctype_name;
		}
		$groupid = $this->uri->segment(4);
		$this->db->select('cgroup_name');
		$this->db->where('cgroup_code', $groupid);
		$query = $this->db->get('cost_group');
		$res = $query->result();
		foreach ($res as $val) {
			$data['gname'] = $val->cgroup_name;
		}
		$data['ccostsubgroup'] = $this->datastore_m->getcost_subgroup($typeid, $groupid);

		if ($username == "") {
			redirect('/');
		} else {
			$this->load->view('navtail/base_master/header_v');
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('base/office_menu_v', $data);
			$this->load->view('datastore/costcode/service_ccostsubgroup_v', $data);
			$this->load->view('base/footer_v');
		}
	}
//matcode
	public function service_cmattype() {
		$id = $this->uri->segment(3);
		$data['cmattype'] = $this->datastore_m->getmat_type();
		$this->load->view('datastore/matcode/service_mattype_v', $data);
	}
/// add function
	public function addproject() {
		//เข้านี้
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		/// Date Helper
		$this->load->helper('date');
		$procode = $this->input->post('projno');

		$timer = time();

		// var_dump($_FILES);

		// die();
		//End Date
		$add = $this->input->post();
		// echo "<pre>";
		// var_dump($add);die();
		// echo "<pre>";
		// var_dump($add); die();



		// file upload progress

		$filename = "";
		if(isset($_FILES["userfilepro"])){
			
			if($_FILES["userfilepro"]["size"] > 0 ){
				$tempPath = $_FILES["userfilepro"]["tmp_name"];
				if(move_uploaded_file($tempPath,"project/".$_FILES["userfilepro"]["name"])){
					$filename = $_FILES["userfilepro"]["name"];
				}
			}
			
		}

		// file upload progress


		// move file img
		// if(isset($_FILES["userfilepro"])){
			$file_content = json_encode($_FILES);
			file_put_contents("files.json",$file_content);

			$post_content = json_encode($this->input->post());
			file_put_contents("post.json",$post_content);

		// }


		$data = array(
			'project_code' => $this->input->post('projno'),
			'project_department' => $this->input->post('radioprode'),
			'project_name' => $this->input->post('projname'),
			'project_worktype' => $this->input->post('worktype'),
			// 'project_type' => $this->input->post('typejob'),
			'project_cname' => $this->input->post('contact'),
			'project_address' => $this->input->post('projaddress'),
			'project_biztype' => $this->input->post('custype'),
			'project_tel' => $this->input->post('phonenumber'),
			'project_fax' => $this->input->post('fax'),
			'project_email' => $this->input->post('email'),

			'project_mcode' => $this->input->post('ownercode'),
			'project_mnameth' => $this->input->post('ownername_th'),
			'project_mnameen' => $this->input->post('ownername_en'),
			'project_maddress' => $this->input->post('owner_address'),
			'project_mtel' => $this->input->post('owner_phonenumber'),
			'project_mfax' => $this->input->post('owner_fax'),
			'project_bnameth' => $this->input->post('contractor_name_th'),
			'project_bnameen' => $this->input->post('contractor_name_en'),
			'project_baddress' => $this->input->post('contractor_address'),
			'project_btel' => $this->input->post('contractor_phonenumber'),
			'project_bfax' => $this->input->post('contractor_fax'),

			'project_detail' => $this->input->post('projectdetail'),
			'project_value' => $this->input->post('projectval'),
			'project_contract' => $this->input->post('insurcontract'),
			'project_start' => $this->input->post('startproject'),
			'project_stop' => $this->input->post('endtproject'),
			'project_engineer' => $this->input->post('projectmanager'),

			'project_wt' => $this->input->post('project_wt'),
			'project_vat' => $this->input->post('project_vat'),
			'project_budget' => $this->input->post('cbudget'),
			'project_boq' => $this->input->post('controlboq'),

			'project_advance_1' => $this->input->post('projectadvance_1'),
			'project_advance_2' => $this->input->post('projectadvance_2'),
			'project_lessadvance' => $this->input->post('projectlessadvance'),
			'project_lessadvance_2' => $this->input->post('projectlessadvance_2'),
			'project_lessretention' => $this->input->post('projectlessretention'),
			'project_lessretention_2' => $this->input->post('projectlessretention_2'),
			'project_lessretentionmethod' => $this->input->post('retentionmethod'),

			'bd_tenid' => $this->input->post('bd_tenid'),
			'bd_tenname' => $this->input->post('bd_tenname'),
			'store_center' => $this->input->post('store_center'),

			'chkconbqq' => $this->input->post('chkconbqq'),
			'controlbg' => $this->input->post('controlbg'),
			//control
			'project_create' => date('Y-m-d H:i:s', now()),
			'project_status' => 'normal',
			'project_user' => $username,
			'compcode' => $compcode,
			'project_img' => $filename,
			'acc_primary' => $this->input->post('accno'),
			'acc_secondary' => $this->input->post('acc_no'),
			'project_sub' => 'no',
			'remark_admin' => $this->input->post('admin_remark'),
			'remark_contact' => $this->input->post('contact_remark'),
			'remark_consult' => $this->input->post('consult_remark'),
			'remark_subpro' => $this->input->post('subpro_remark'),
			'gl_for_ic' => $this->input->post('chkgl'),
			'a_pr' => "1",
			'a_po' => "1",
			'a_wo' => "1",
			'a_pt' => "1",
		);

		


		$query = $this->db->insert('project', $data);
		// var_dump($query);
		$id_h = $this->db->insert_id();

		if(isset($add['chkadi'])){
			foreach ($add['chkadi'] as $key => $value) {
				$insert_adminpro = array(
					'ref_project' => $id_h, 
					'mpro_adid' => $add['chkadi'][$key],
					'mpro_adname' => $add['adminname'][$key],
					'mpro_adposition' => $add['adminposi'][$key],
					'mpro_adtel' => $add['admintel'][$key],
					'mpro_ademail' => $add['adminemail'][$key],
					'adduser' => $username,
					'active' => 'Y',
					'createdate' => date('Y-m-d H:i:s', now())
				);
				$boolen_admin = $this->db->insert('project_member',$insert_adminpro);
			} //var_dump($boolen_admin);
		}
		if(isset($add['chkconi'])){

			foreach ($add['chkconi'] as $key => $value) {
				$insert_contactpro = array(
					'ref_project' => $id_h, 
					'mpro_conid' => $add['chkconi'][$key],
					'mpro_conname' => $add['contactname'][$key],
					'mpro_conposition' => $add['adminposi'][$key],
					'mpro_contel' => $add['admintel'][$key],
					'mpro_conemail' => $add['adminemail'][$key],
					'adduser' => $username,
					'active' => 'Y',
					'createdate' => date('Y-m-d H:i:s', now())
				);
				$boolen_contact = $this->db->insert('project_member',$insert_contactpro);
			} //var_dump($boolen_contact);
			
		}


		if(isset($add['chkconsi'])){

			foreach ($add['chkconsi'] as $key => $value) {
				$insert_consultpro = array(
					'ref_project' => $id_h, 
					'mpro_consultid' => $add['chkconsi'][$key],
					'mpro_consultname' => $add['consultname'][$key],
					'mpro_consultposition' => $add['consultposi'][$key],
					'mpro_consulttel' => $add['consulttel'][$key],
					'mpro_consultemail' => $add['consultemail'][$key],
					'adduser' => $username,
					'active' => 'Y',
					'createdate' => date('Y-m-d H:i:s', now())
				);
				$boolen_consult = $this->db->insert('project_member',$insert_consultpro);
			} //var_dump($boolen_consult);
		}

		if(isset($add['chksubsi'])){
			foreach ($add['chksubsi'] as $key => $value) {
				$insert_subpro = array(
					'ref_project' => $id_h, 
					'mpro_subid' => $add['chksubsi'][$key],
					'mpro_subproname' => $add['subproname'][$key],
					'mpro_subproposition' => $add['subproposi'][$key],
					'mpro_subprotel' => $add['subprotel'][$key],
					'mpro_subproemail' => $add['subproemail'][$key],
					'adduser' => $username,
					'active' => 'Y',
					'createdate' => date('Y-m-d H:i:s', now())
				);
				$boolen_subpro = $this->db->insert('project_member',$insert_subpro);
			} //var_dump($boolen_subpro);			
		}


		// echo "<pre>";
		// print_r($data);
		// print_r($add);
		// echo '<hr>';
		for ($i = 0; $i < count($add['chki']); $i++) {
			// if ($add['job_id'][$i] != "0") {
				$data_d = array(
					'project_code' => $this->input->post('projno'),
					'projectd_job' => $add['job_id'][$i],
					'job_amount' => $add['job_amount'][$i],
					'adduser' => $username,
					'createdate' => date('Y-m-d H:i:s', now()),
					'compcode' => $compcode,
				);
				$boolen_job = $this->db->insert('project_item', $data_d);
			
		}
		// print_r($data_d);
		// die();
		//echo $this->input->post('bd_tenid');
		if($this->input->post('bd_tenid') != ""){
			//echo $this->input->post('bd_tenid');
			$data_update = array(
				"bd_status" => "win"
			);
			$this->db->where("bd_tenid",$this->input->post('bd_tenid'));
			$this->db->update("bdtender_h",$data_update);

		}

		$data_desc = array(
				'job_open' => "open"
			);
			$this->db->where("job_code",$this->input->post('typejob'));
			$this->db->update("master_jobdesc",$data_desc);


		
		if ($query) {
			$projiid = $this->datastore_m->getproj_limit();
			foreach ($projiid as $key => $pe) {
				$projjid = $pe->project_id;
			}
			$mem = $this->datastore_m->getmamber_p($compcode);
			foreach ($mem as $key => $mv) {
				$data = array(
					'project_id' => $projjid,
					'proj_user' => $mv->m_id,
					'project_status' => 'Y'
				);
				$this->db->insert('project_ic', $data);
			}

			//redirect('data_master/setup_project_main');
		} else {
			echo "error insert";
		}
		
	}

	public function addsubproject() {
		$pj = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		/// Date Helper
		$this->load->helper('date');

		$timer = time();

		//End Date
		$add = $this->input->post();
		$data = array(
			'project_code' => $this->input->post('projno'),
			'project_department' => $this->input->post('radioprode'),
			'project_name' => $this->input->post('projname'),
			'project_worktype' => $this->input->post('wordtype'),
			'project_type' => $this->input->post('typejob'),
			'project_cname' => $this->input->post('contact'),
			'project_address' => $this->input->post('address'),
			'project_biztype' => $this->input->post('custype'),
			'project_tel' => $this->input->post('phonenumber'),
			'project_fax' => $this->input->post('fax'),
			'project_email' => $this->input->post('email'),

			'project_mcode' => $this->input->post('ownercode'),
			'project_mnameth' => $this->input->post('ownername_th'),
			'project_mnameen' => $this->input->post('ownername_en'),
			'project_maddress' => $this->input->post('owner_address'),
			'project_mtel' => $this->input->post('owner_phonenumber'),
			'project_mfax' => $this->input->post('owner_fax'),
			'project_bnameth' => $this->input->post('contractor_name_th'),
			'project_bnameen' => $this->input->post('contractor_name_en'),
			'project_baddress' => $this->input->post('contractor_address'),
			'project_btel' => $this->input->post('contractor_phonenumber'),
			'project_bfax' => $this->input->post('contractor_fax'),

			'project_detail' => $this->input->post('projectdetail'),
			'project_value' => $this->input->post('projectval'),
			'project_contract' => $this->input->post('insurcontract'),
			'project_start' => $this->input->post('startproject'),
			'project_stop' => $this->input->post('endtproject'),
			'project_engineer' => $this->input->post('projectmanager'),

			'project_wt' => $this->input->post('project_wt'),
			'project_vat' => $this->input->post('project_vat'),
			'project_budget' => $this->input->post('cbudget'),
			'project_boq' => $this->input->post('controlboq'),

			'project_advance_1' => $this->input->post('projectadvance_1'),
			'project_advance_2' => $this->input->post('projectadvance_2'),
			'project_lessadvance' => $this->input->post('projectlessadvance'),
			'project_lessadvance_2' => $this->input->post('projectlessadvance_2'),
			'project_lessretention' => $this->input->post('projectlessretention'),
			'project_lessretention_2' => $this->input->post('projectlessretention_2'),
			'project_lessretentionmethod' => $this->input->post('retentionmethod'),

			'bd_tenid' => $this->input->post('bd_tenid'),
			'bd_tenname' => $this->input->post('bd_tenname'),

			'chkconbqq' => $this->input->post('chkconbqq'),
			'controlbg' => $this->input->post('controlbg'),
			//control
			'project_img' => $this->input->post('userfilepro'),
			'project_create' => date('Y-m-d H:i:s', now()),
			'project_status' => 'normal',
			'project_user' => $username,
			'compcode' => $compcode,
			'project_sub' => $pj,
			'project_substatus' => "Y",
			'remark_admin' => $this->input->post('admin_remark'),
			'remark_contact' => $this->input->post('contact_remark'),
			'remark_consult' => $this->input->post('consult_remark'),
			'remark_subpro' => $this->input->post('subpro_remark'),
			'gl_for_ic' => $this->input->post('chkgl')
		);

		$query = $this->db->insert('project', $data);
		$id_h = $this->db->insert_id();
		foreach ($add['chkadi'] as $key => $value) {
			$insert_adminpro = array(
				'ref_project' => $id_h, 
				'mpro_adid' => $add['chkadi'][$key],
				'mpro_adname' => $add['adminname'][$key],
				'mpro_adposition' => $add['adminposi'][$key],
				'mpro_adtel' => $add['admintel'][$key],
				'mpro_ademail' => $add['adminemail'][$key],
				'adduser' => $username,
				'createdate' => date('Y-m-d H:i:s', now()),
				'active' => "Y"
			);
			$boolen_admin = $this->db->insert('project_member',$insert_adminpro);
		} //var_dump($boolen_admin);
		foreach ($add['chkconi'] as $key => $value) {
			$insert_contactpro = array(
				'ref_project' => $id_h, 
				'mpro_conid' => $add['chkconi'][$key],
				'mpro_conname' => $add['contactname'][$key],
				'mpro_conposition' => $add['adminposi'][$key],
				'mpro_contel' => $add['admintel'][$key],
				'mpro_conemail' => $add['adminemail'][$key],
				'adduser' => $username,
				'createdate' => date('Y-m-d H:i:s', now()),
				'active' => "Y"
			);
			$boolen_contact = $this->db->insert('project_member',$insert_contactpro);
		} //var_dump($boolen_contact);
		foreach ($add['chkconsi'] as $key => $value) {
			$insert_consultpro = array(
				'ref_project' => $id_h, 
				'mpro_consultid' => $add['chkconsi'][$key],
				'mpro_consultname' => $add['consultname'][$key],
				'mpro_consultposition' => $add['consultposi'][$key],
				'mpro_consulttel' => $add['consulttel'][$key],
				'mpro_consultemail' => $add['consultemail'][$key],
				'adduser' => $username,
				'createdate' => date('Y-m-d H:i:s', now()),
				'active' => "Y"
			);
			$boolen_consult = $this->db->insert('project_member',$insert_consultpro);
		} //var_dump($boolen_consult);
		foreach ($add['chksubsi'] as $key => $value) {
			$insert_subpro = array(
				'ref_project' => $id_h, 
				'mpro_subid' => $add['chksubsi'][$key],
				'mpro_subproname' => $add['subproname'][$key],
				'mpro_subproposition' => $add['subproposi'][$key],
				'mpro_subprotel' => $add['subprotel'][$key],
				'mpro_subproemail' => $add['subproemail'][$key],
				'adduser' => $username,
				'createdate' => date('Y-m-d H:i:s', now()),
				'active' => "Y"
			);
			$boolen_subpro = $this->db->insert('project_member',$insert_subpro);
		}
		// echo '<pre>';
		// print_r($add);
		// echo '<hr>';
		// print_r($data);die();
		for ($i = 0; $i < count($add['jobi']); $i++) {
			if ($add['jobi'][$i] != "0") {
				$data_d = array(
					'project_code' => $this->input->post('projno'),
					'projectd_job' => $add['jobi'][$i],
					'job_amount' => $add['job_amount'][$i],
					'sub_id' => $pj,
					'adduser' => $username,
					'createdate' => date('Y-m-d H:i:s', now()),
					'compcode' => $compcode,
				);
				$this->db->insert('project_item', $data_d);
			}
		}
		if ($query) {
			$projiid = $this->datastore_m->getproj_limit();
			foreach ($projiid as $key => $pe) {
				$projjid = $pe->project_id;
			}
			$mem = $this->datastore_m->getmamber_p($compcode);
			foreach ($mem as $key => $mv) {

				$data = array(
					'project_id' => $projjid,
					'proj_user' => $mv->m_id,
				);
				$this->db->insert('project_ic', $data);
			}
			redirect('data_master/approve_prpo/'.$this->input->post('projno'));
		} else {
			echo "error insert";
		}
	}

	public function updateproject() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		/// Date Helper
		$this->load->helper('date');
		$pcode = $this->input->post('projno');
		$pid = $this->input->post('projid');
		$add = $this->input->post();
		$data = array(
			'project_code' => $this->input->post('projno'),
			'project_name' => $this->input->post('projname'),
			'project_worktype' => $this->input->post('worktype'),
			// 'project_type' => $this->input->post('typejob'),
			'project_cname' => $this->input->post('contact'),
			'project_address' => $this->input->post('address'),
			'project_biztype' => $this->input->post('custype'),
			'project_tel' => $this->input->post('phonenumber'),
			'project_fax' => $this->input->post('fax'),
			'project_email' => $this->input->post('email'),

			'project_mcode' => $this->input->post('ownercode'),
			'project_mnameth' => $this->input->post('ownername_th'),
			'project_mnameen' => $this->input->post('ownername_en'),
			'project_maddress' => $this->input->post('owner_address'),
			'project_onertel' => $this->input->post('owner_phonenumber'),
			'project_mfax' => $this->input->post('owner_fax'),
			'project_owneremail' => $this->input->post('owner_email'),

			'project_bnameth' => $this->input->post('contractor_name_th'),
			'project_bnameen' => $this->input->post('contractor_name_en'),
			'project_baddress' => $this->input->post('contractor_address'),
			'project_btel' => $this->input->post('contractor_phonenumber'),
			'project_bfax' => $this->input->post('contractor_fax'),

			'project_detail' => $this->input->post('projectdetail'),
			'project_value' => parse_num($this->input->post('projectval')),
			'project_contract' => $this->input->post('insurcontract'),
			'project_start' => $this->input->post('startproject'),
			'project_stop' => $this->input->post('endtproject'),
			'project_engineer' => $this->input->post('projectmanager'),
			// 'project_update' => date('Y-m-d H:i:s',now()),

			'project_wt' => $this->input->post('project_wt'),
			'project_vat' => $this->input->post('project_vat'),
			'project_budget' => $this->input->post('cbudget'),
			'project_boq' => $this->input->post('controlboq'),
			'project_advance_1' => $this->input->post('projectadvance_1'),
			'project_advance_2' => $this->input->post('projectadvance_2'),
			'project_lessadvance' => $this->input->post('projectlessadvance'),
			'project_lessadvance_2' => $this->input->post('projectlessadvance_2'),
			'project_lessretention' => $this->input->post('projectlessretention'),
			'project_lessretention_2' => $this->input->post('projectlessretention_2'),
			'project_lessretentionmethod' => $this->input->post('retentionmethod'),

			'bd_tenid' => $this->input->post('bd_tenid'),
			'bd_tenname' => $this->input->post('bd_tenname'),
			'chkconbqq' => $this->input->post('chkconbqq'),
			'controlbg' => $this->input->post('controlbg'),
			'project_user' => $username,
			'acc_primary' => $this->input->post('accno'),
			'acc_secondary' => $this->input->post('acc_no'),
			'remark_admin' => $this->input->post('admin_remark'),
			'remark_contact' => $this->input->post('contact_remark'),
			'remark_consult' => $this->input->post('consult_remark'),
			'remark_subpro' => $this->input->post('subpro_remark'),
			'project_department' => $this->input->post('radioprode'),
			'gl_for_ic' => $this->input->post('chkgl'),
		);
		$this->db->where('project_id', $pid);
		$q = $this->db->update('project', $data);
		for ($i = 0; $i < count($add['job_id']); $i++) {
			if ($add['chki'][$i] == "get") {
				$data_d = array(
					'project_code' => $pcode,
					'projectd_job' => $add['job_id'][$i],
					'job_amount' => parse_num($add['job_amount'][$i]),
					'edituser' => $username,
					'editdate' => date('Y-m-d H:i:s', now()),
					'compcode' => $compcode,
				);
				$this->db->where('id', $add['idi'][$i]);
				$this->db->where('project_code', $pcode);
				$this->db->update('project_item', $data_d);
			} else {
				$data_di = array(
					'project_code' => $pcode,
					'projectd_job' => $add['job_id'][$i],
					'job_amount' => parse_num($add['job_amount'][$i]),
					'adduser' => $username,
					'compcode' => $compcode,
					'createdate' => date('Y-m-d H:i:s', now()),
				);
				$this->db->where('project_code', $pcode);
				$this->db->insert('project_item', $data_di);
			}

			if($this->input->post('bd_tenid') != ""){
			//echo $this->input->post('bd_tenid');
			$data_update = array(
				"bd_status" => "win"
			);
			
			$this->db->where("bd_tenid",$this->input->post('bd_tenid'));
			$this->db->update("bdtender_h",$data_update);

			}	
		}
		
		for ($i = 0; $i < count($add['adminname']); $i++) {

			if ($add['chkadi'][$i] == "get") {
				$data_d = array(
					'ref_project' => $pid,
					'mpro_adname' => $add['adminname'][$i],
					'mpro_adposition' => $add['adminposi'][$i],
					'mpro_adtel' => $add['admintel'][$i],
					'mpro_ademail' => $add['adminemail'][$i],
					'edituser' => $username,
					'editdate' => date('Y-m-d H:i:s', now()),
					'active' => 'Y'
				);
				$this->db->where('mpro_adid', $add['addi'][$i]);
				$this->db->where('ref_project', $pid);
				$this->db->update('project_member', $data_d);
			} else {
				$data_di = array(
					'ref_project' => $pid,
					'mpro_adid' => $add['chkadi'][$i],
					'mpro_adname' => $add['adminname'][$i],
					'mpro_adposition' => $add['adminposi'][$i],
					'mpro_adtel' => $add['admintel'][$i],
					'mpro_ademail' => $add['adminemail'][$i],
					'adduser' => $username,
					'createdate' => date('Y-m-d H:i:s', now()),
					'active' => 'Y'
				);
				$this->db->insert('project_member', $data_di);
			}
		}
		for ($i = 0; $i < count($add['contactname']); $i++) {
			if ($add['chkconi'][$i] == "get") {
				$data_d = array(
					'ref_project' => $pid,
					'mpro_conname' => $add['contactname'][$i],
					'mpro_conposition' => $add['contactposi'][$i],
					'mpro_contel' => $add['contacttel'][$i],
					'mpro_conemail' => $add['contactemail'][$i],
					'edituser' => $username,
					'editdate' => date('Y-m-d H:i:s', now()),
				);
				$this->db->where('mpro_conid', $add['condi'][$i]);
				$this->db->where('ref_project', $pid);
				$this->db->update('project_member', $data_d);
			} else {
				$data_di = array(
					'ref_project' => $pid,
					'mpro_conid' => $add['chkconi'][$i],
					'mpro_conname' => $add['contactname'][$i],
					'mpro_conposition' => $add['contactposi'][$i],
					'mpro_contel' => $add['contacttel'][$i],
					'mpro_conemail' => $add['contactemail'][$i],
					'adduser' => $username,
					'createdate' => date('Y-m-d H:i:s', now()),
					'active' => 'Y'
				);
				$this->db->insert('project_member', $data_di);
			}
		}
		for ($i = 0; $i < count($add['consultname']); $i++) {
			if ($add['chkconsi'][$i] == "get") {
				$data_d = array(
					'ref_project' => $pid,
					'mpro_consultname' => $add['consultname'][$i],
					'mpro_consultposition' => $add['consultposi'][$i],
					'mpro_consulttel' => $add['consulttel'][$i],
					'mpro_consultemail' => $add['consultemail'][$i],
					'edituser' => $username,
					'editdate' => date('Y-m-d H:i:s', now()),
				);
				$this->db->where('mpro_consultid', $add['consi'][$i]);
				$this->db->where('ref_project', $pid);
				$this->db->update('project_member', $data_d);
			} else {
				$data_di = array(
					'ref_project' => $pid,
					'mpro_consultid' => $add['chkconsi'][$i],
					'mpro_consultname' => $add['consultname'][$i],
					'mpro_consultposition' => $add['consultposi'][$i],
					'mpro_consulttel' => $add['consulttel'][$i],
					'mpro_consultemail' => $add['consultemail'][$i],
					'adduser' => $username,
					'createdate' => date('Y-m-d H:i:s', now()),
					'active' => 'Y'
				);
				$this->db->insert('project_member', $data_di);
			}
		}
		for ($i = 0; $i < count($add['subproname']); $i++) {
			if ($add['chksubsi'][$i] == "get") {
				$data_d = array(
					'ref_project' => $pid,
					'mpro_subproname' => $add['subproname'][$i],
					'mpro_subproposition' => $add['subproposi'][$i],
					'mpro_subprotel' => $add['subprotel'][$i],
					'mpro_subproemail' => $add['subproemail'][$i],
					'edituser' => $username,
					'editdate' => date('Y-m-d H:i:s', now()),
				);
				$this->db->where('mpro_subid', $add['subi'][$i]);
				$this->db->where('ref_project', $pid);
				$this->db->update('project_member', $data_d);
			} else {
				$data_di = array(
					'ref_project' => $pid,
					'mpro_subid' => $add['chksubsi'][$i],
					'mpro_subproname' => $add['subproname'][$i],
					'mpro_subproposition' => $add['subproposi'][$i],
					'mpro_subprotel' => $add['subprotel'][$i],
					'mpro_subproemail' => $add['subproemail'][$i],
					'adduser' => $username,
					'createdate' => date('Y-m-d H:i:s', now()),
					'active' => 'Y'
				);
				$this->db->insert('project_member', $data_di);
			}
		}
		$this->load->library('image_lib');
		$config['upload_path'] = './project/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '20480';
		$config['max_width'] = '9999';
		$config['max_height'] = '9999';
		$rand = rand(1111, 9999);
		$date = date("Y-m-d ");
		$config['file_name'] = $date . $rand;
		$this->load->library('upload', $config);

		// Change $_FILES to new vars and loop them

		// Put each errors and upload data to an array
		$error = array();
		$success = array();

		// main action to upload each file
		foreach ($_FILES as $field_name => $file) {
			if (!$this->upload->do_upload($field_name)) {
				// if upload fail, grab error
				$error['upload'][] = $this->upload->display_errors();
			} else {
				// otherwise, put the upload datas here.
				// if you want to use database, put insert query in this loop
				$upload_data = $this->upload->data();

				// set the resize config
				$resize_conf = array(
					// it's something like "/full/path/to/the/image.jpg" maybe
					'source_image' => $upload_data['full_path'],
					// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
					// or you can use 'create_thumbs' => true option instead
					'new_image' => $upload_data['file_path'] . 'proj_' . $upload_data['file_name'],
					'width' => 600,
					'height' => 400,
				);

				// initializing
				$this->image_lib->initialize($resize_conf);

				// do it!
				if (!$this->image_lib->resize()) {
					// if got fail.
					$error['resize'][] = $this->image_lib->display_errors();
				} else {
					// otherwise, put each upload data to an array.
					$data['success'] = $upload_data;
					$this->db->select('*');
					$this->db->where('project_code', $pcode);
					$qe = $this->db->get('project');
					$re = $qe->result();
					foreach ($re as $ke) {
						$uim = $ke->project_img;
					}
					unlink($upload_data['file_path'] . $uim);
					$changeimg = array(
						'project_img' => 'proj_' . $upload_data['file_name'],
					);
					$this->db->where('project_code', $pcode);
					$q = $this->db->update('project', $changeimg);
					// unlink($upload_data['file_path'].$upload_data['file_name']);
					echo "success";
					return true;
				}
			}
		}

	}
	public function delete_row() {
		$input = $this->input->post();
		if ($input['tagetdel']=="admin") {
			$boolen = $this->db->delete('project_member', array('mpro_adid' => $input['iddel'],'ref_project' => $input['proid']));
				$response = array();
			if ($boolen) {
				$response['status'] = true; 
				$response['message'] = "สำเร็จ";
			}else{
				$response['status'] = false; 
				$response['message'] = "ไม่สำเร็จ";
			}
			// echo json_encode($response);
		}else if ($input['tagetdel']=="contact") {
			$boolen = $this->db->delete('project_member', array('mpro_conid' => $input['iddel'],'ref_project' => $input['proid']));
				$response = array();
			if ($boolen) {
				$response['status'] = true; 
				$response['message'] = "สำเร็จ";
			}else{
				$response['status'] = false; 
				$response['message'] = "ไม่สำเร็จ";
			}
			// echo json_encode($response);
		}else if ($input['tagetdel']=="consult") {
			$boolen = $this->db->delete('project_member', array('mpro_consultid' => $input['iddel'],'ref_project' => $input['proid']));
				$response = array();
			if ($boolen) {
				$response['status'] = true; 
				$response['message'] = "สำเร็จ";
			}else{
				$response['status'] = false; 
				$response['message'] = "ไม่สำเร็จ";
			}
			// echo json_encode($response);
		}else if ($input['tagetdel']=="subpro") {
			$boolen = $this->db->delete('project_member', array('mpro_subid' => $input['iddel'],'ref_project' => $input['proid']));
				$response = array();
			if ($boolen) {
				$response['status'] = true; 
				$response['message'] = "สำเร็จ";
			}else{
				$response['status'] = false; 
				$response['message'] = "ไม่สำเร็จ";
			}
			// echo json_encode($response);
		}else{
			$response['status'] = false; 
			$response['message'] = "ไม่สำเร็จ";
		}
		echo json_encode($response);
	}
	public function delete_project() {
		$projid = $this->uri->segment(3);
		$this->db->delete('project', array('project_id' => $projid));
		$this->db->delete('project_ic', array('project_id' => $projid));
		redirect('data_master/setup_project_main');
	}
	public function close_project() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$projid = $this->uri->segment(3);
		$data = array(
			'project_status' => "close",
			'edituser' => $username,
			'editdate' => date('Y-m-d H:i:s', now()),
		);
		$this->db->where('project_id', $projid);
		$this->db->where('compcode', $compcode);
		$query_update = $this->db->update('project', $data);

		if ($query_update) {

			$this->db->select('bd_tenid');
			$this->db->from('project');
			$this->db->where('project_id', $projid);
			$data = $this->db->get();
			$res = $data->result_array();

			$bd = $res[0]["bd_tenid"];
			if ($bd != NULL) {
				$data_bd = array(
					'bd_status' => "close"
				);

				$this->db->where('bd_tenid', $bd);
				$query_bd = $this->db->update('bdtender_h', $data_bd);

				$return = array();
				if ($query_bd) {
					$return['status'] 	= true;
				}else{
					$return['status'] 	= false;
				}

				echo json_encode($return);
			}else{

				$return = array();
				if ($data) {
					$return['status'] 	= true;
				}else{
					$return['status'] 	= false;
				}

				echo json_encode($return);

			}



		}

		




		// redirect('data_master/setup_project_main');
	}
	public function newvender() {
		$this->load->view('datastore/vender/create_vender_v');
	}

	public function showvender() {
		$data['res'] = $this->datastore_m->getvender();
		$this->load->view('datastore/vender/show_vender_v', $data);
	}
	public function edit_project() {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$this->load->helper('date');
		$this->db->select('*');
		$this->db->where('project_code', $id);
		$q = $this->db->get('project');
		$data['res'] = $q->result();
		$this->load->view('datastore/project/edit_project_v', $data);
	}

	public function test_print() {
		$this->load->view('datastore/base/test_print_v');
	}
	public function del_job_project() {
		$id = $this->input->post('id');
		if ($this->db->delete('project_item', array('id' => $id))) {
			echo $id;
			return true;
		} else {
			return false;
		}
	}

	public function addmatunit() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$type = $this->input->post('mattypecode');
		$group = $this->input->post('matgroupcode');
		$subgroup = $this->input->post('matsubgroupcode');
		$product = $this->input->post('matproductcode');
		$data = array(
			'mattype_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('mattypecodeu'))),
			'matgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matgroupcodeu'))),
			'matsubgroup_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matsubgroupcodeu'))),
			'matcode' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matproductcodeu'))),
			'matspec_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matspeccodesixu'))),
			'matbrand_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matbrandcodeu'))),
			// 'matbrand_name' => $this->input->post('matbrandnameu'),
			'matunit_code' => preg_replace("/[[:blank:]]+/", "", trim($this->input->post('matunitu'))),
			'matunit_name' => $this->input->post('matunitenameu'),
			'matspec_status' => 'yes',
			'materialcode' => $this->input->post('mattypecodeu') . $this->input->post('matgroupcodeu') . $this->input->post('matsubgroupcodeu') . $this->input->post('matproductcodeu') . $this->input->post('matspeccodesixu') . $this->input->post('matbrandcodeu') . $this->input->post('matunitu'),
			'materialname' => $this->input->post('matterialname'),
			'materialspacname' => $this->input->post('matnamespecname'),
			'materialbrandname' => $this->input->post('materialbrandname'),
			'compcode' => $compcode,
		);
		$a = $this->db->insert('mat_unit', $data);
		if ($a) {

			return true;
		} else {
			return false;
		}
	}

	public function editmatunit() {
		$id = $this->input->post('ematunitidue');
		$type = $this->input->post('emattypecodeu');
		$group = $this->input->post('ematgroupcodeu');
		$subgroup = $this->input->post('ematsubgroupcodeu');
		$matcode = $this->input->post('ematproductcodeu');
		$ematspeccodesixu = $this->input->post('ematspeccodesixu');
		$ematbrandcodeu = $this->input->post('ematbrandcodeu');

		$matunit = $this->input->post('ematunitu');
		$matunitename = $this->input->post('ematunitenameu');
		$data = array(
			'matunit_name' => $this->input->post('ematunitenameu'),
			'matunit_code' => $this->input->post('ematunitu'),
			'materialcode' => $type . $group . $subgroup . $matcode . $ematspeccodesixu . $ematbrandcodeu . $matunit,
			'materialname' => $this->input->post('matterialname'),
			'matspec_status' => 'yes',
		);
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $matcode);
		$this->db->where('matspec_code', $ematspeccodesixu);
		$this->db->where('matbrand_code', $ematbrandcodeu);
		$this->db->where('matunit_id', $id);
		$q = $this->db->update('mat_unit', $data);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}
	public function delditmatunit() {
		$id = $this->input->post('ematunitidue');
		$type = $this->input->post('emattypecodeu');
		$group = $this->input->post('ematgroupcodeu');
		$subgroup = $this->input->post('ematsubgroupcodeu');
		$matcode = $this->input->post('ematproductcodeu');
		$ematspeccodesixu = $this->input->post('ematspeccodesixu');
		$ematbrandcodeu = $this->input->post('ematbrandcodeu');

		$matunit = $this->input->post('ematunitu');
		$matunitename = $this->input->post('ematunitenameu');
		$tables = array('mat_unit');
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $matcode);
		$this->db->where('matspec_code', $ematspeccodesixu);
		$this->db->where('matbrand_code', $ematbrandcodeu);
		$this->db->where('matunit_id', $id);
		$q = $this->db->delete($tables);
		if ($q) {

			return true;
		} else {
			return false;
		}
	}

	public function edit_costtype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code =$this->input->post('code');

  	      $datap = array(
          'costype_name' => $this->input->post('type_name'),
          'acc_code1' => $this->input->post('acc_no'),
          'acc_code2' => $this->input->post('acc_no2'),
          'useredit' => $username,
       		'editdate' => date('Y-m-d H:i:s',now()),

      );
      $this->db->where("costtype_code",$code);
      if($this->db->update('master_costtype',$datap))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }
	public function edit_costtype_nv(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code =$this->input->post('code');

		$datap = array(
			'costype_name' => $this->input->post('type_name'),
			'acc_code1' => $this->input->post('accno'),
			// 'acc_code2' => $this->input->post('acc_no2'),
			'costtype_status' => $this->input->post('status'),
			'useredit' => $username,
			'editdate' => date('Y-m-d H:i:s',now()),
		);
      $this->db->where("costtype_code",$code);
      if($this->db->update('master_costtype',$datap))
      {
        echo $code;
		redirect('datastore/cost_type');
      }else{
        echo "error";
        return false;
      }
    }

  public function del_costtype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $code =$this->input->post('code');

  	      $datap = array(
          'comment_del' => $this->input->post('comment'),
          'costtype_status' => "D",
          'user_del' => $username,
       		'deldate' => date('Y-m-d H:i:s',now()),

      );
      $this->db->where("costtype_code",$code);
      if($this->db->update('master_costtype',$datap))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }

  public function add_costtype()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];

  	      $datap = array(
          'costype_name' => $this->input->post('name_type'),
          'costtype_code' => $this->input->post('code'),
          'acc_code1' => $this->input->post('new_acname1'),
          'acc_code2' => $this->input->post('new_acname2'),
          'costtype_status' => "Y",
          'useradd' => $username,
       		'createdate' => date('Y-m-d H:i:s',now()),
      );
      if($this->db->insert('master_costtype',$datap))
      {
        echo $code;
      }else{
        echo "error";
        return false;
      }
    }
public function add_costtype_nv(){
	$session_data = $this->session->userdata('sessed_in');
	$username = $session_data['username'];
	$compcode = $session_data['compcode'];

		$datap = array(
		'costype_name' => $this->input->post('type_name'),
		'costtype_code' => $this->input->post('code'),
		'acc_code1' => $this->input->post('accno'),
		//   'acc_code2' => $this->input->post('new_acname2'),
		'costtype_status' => $this->input->post('status'),
		'useradd' => $username,
		'createdate' => date('Y-m-d H:i:s',now()),
	);
	if($this->db->insert('master_costtype',$datap))
	{
		redirect('datastore/cost_type');
	}else{
		echo "error";
		redirect('datastore/cost_type');
		return false;
	}
}

 public function set_approve_select(){

    	$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();

		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		// $this->load->model('config_m');
		// $data['vdo'] = $this->config_m->getvedioname();
    	// var_dump('5555');
    	$pj = $this->uri->segment(3);
		$data['bk'] = $this->datastore_m->abk($pj);
    	$data['getproj'] = $this->datastore_m->getproject();
		$data['getdep'] = $this->datastore_m->department();
		// $this->load->view('navtail/base_master/header_v', $data);
		// $this->load->view('navtail/base_master/tail_v');

		// $this->load->view('navtail/navtail_master_v');
		$this->load->view('office/pr/setup_approvebk',$data);
		// $this->load->view('datastore/company/tail_v');
		// $this->load->view('datastore/company/archive_comp_v', $data);

		// $this->load->view('base/footer_v');
    }


    public function set_approve(){

    	$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();

		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		// $this->load->model('config_m');
		// $data['vdo'] = $this->config_m->getvedioname();
    	// var_dump('5555');

    	$data['getproj'] = $this->datastore_m->getproject();
		$data['getdep'] = $this->datastore_m->department();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');

		$this->load->view('navtail/navtail_master_v');
		$this->load->view('office/pr/setup_approvebk_select');
		// $this->load->view('datastore/company/tail_v');
		// $this->load->view('datastore/company/archive_comp_v', $data);

		$this->load->view('base/footer_v');
    }
    public function set_tax() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();

		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		// $data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		// $this->load->model('config_m');
		// $data['vdo'] = $this->config_m->getvedioname();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');

		$this->load->view('navtail/navtail_master_v');
		// $this->load->view('datastore/company/tail_v');
		$this->load->view('datastore/tax/setup_tax_v', $data);

		$this->load->view('base/footer_v');

	}
	public function set_tax_table() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['tax'] = $this->datastore_m->tax($compcode);

		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		// $data['res'] = $this->datastore_m->getcompany();
		$data['user_right'] = $session_data['user_right'];
		// $this->load->model('config_m');
		// $data['vdo'] = $this->config_m->getvedioname();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');

		$this->load->view('navtail/navtail_master_v');
		// $this->load->view('datastore/company/tail_v');
		$this->load->view('datastore/tax/setup_tax_table_v', $data);

		$this->load->view('base/footer_v');

	}
	public function add_tax()
	{
		$data = $this->input->post();
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// var_dump($data);die();
		$insert = array(
			'tax_name' => $data['name'],
			'compcode' => $compcode,
			'status' => "Y"
		);
		$boolen = $this->db->insert('setup_tax',$insert);
		$res = array();
		if ($boolen) {
			$res['status'] = true;
			$res['message'] = "บันทุกสำเร็จ !!";
		}else{
			$res['status'] = false;
			$res['message'] = "บันทุกไม่สำเร็จ !!";
		}
		echo json_encode($res);
	}
	public function content_modal_tax()
		{
			$id = $this->input->post('tax_id');
			// var_dump($id);die();
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			$data['tax'] = $this->datastore_m->taxfind($compcode,$id);
			// var_dump($data['tax']);die();
			$this->load->view('datastore/tax/tax_editmodal_v', $data);
		}
		public function edit_tax()
		{
			$data = $this->input->post();
			// var_dump($data);die();
			$update = array(
			'tax_name' => $data['name']
			);
			$this->db->where('id_tax',$data['id']);
			$boolen = $this->db->update('setup_tax',$update);
			$res = array();
			if ($boolen) {
				$res['status'] = true;
				$res['message'] = "บันทุกสำเร็จ !!";
			}else{
				$res['status'] = false;
				$res['message'] = "บันทุกไม่สำเร็จ !!";
			}
			echo json_encode($res);
			
		}
		public function tax_del()
		{
			$id = $this->input->post('id');
			$this->db->where('id_tax',$id);
			$this->db->update('setup_tax',['status' => "del"]);
		}
		public function set_taxdes_table() 
		{
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$compcode = $session_data['compcode'];
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['taxdes'] = $this->datastore_m->taxdes($compcode);

			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			// $data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			// $this->load->model('config_m');
			// $data['vdo'] = $this->config_m->getvedioname();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');

			$this->load->view('navtail/navtail_master_v');
			// $this->load->view('datastore/company/tail_v');
			$this->load->view('datastore/tax/setup_taxdes_table_v', $data);

			$this->load->view('base/footer_v');

		}
	public function add_taxdes()
	{
		$data = $this->input->post();
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// var_dump($data);die();
		$insert = array(
			'tax_desname' => $data['name'],
			'tax_desname_en' => $data['nameen'],
			'percent' => $data['per'],
			'compcode' => $compcode,
			'status' => "Y"
		);
		$boolen = $this->db->insert('setup_taxdes',$insert);
		$res = array();
		if ($boolen) {
			$res['status'] = true;
			$res['message'] = "บันทึกสำเร็จ !!";
		}else{
			$res['status'] = false;
			$res['message'] = "บันทึกไม่สำเร็จ !!";
		}
		echo json_encode($res);
	}
	public function content_modal_taxdes()
		{
			$id = $this->input->post('taxdes_id');
			// var_dump($id);die();
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			$data['tax'] = $this->datastore_m->taxdesfind($compcode,$id);
			// var_dump($data['tax']);die();
			$this->load->view('datastore/tax/taxdes_editmodal_v', $data);
		}
	public function edit_taxdes()
		{
			$data = $this->input->post();
			// var_dump($data);die();
			$update = array(
			'tax_desname' => $data['name'],
			'tax_desname_en' => $data['nameen'],
			'percent' => $data['per'],
			);
			$this->db->where('id_taxdes',$data['id']);
			$boolen = $this->db->update('setup_taxdes',$update);
			$res = array();
			if ($boolen) {
				$res['status'] = true;
				$res['message'] = "บันทุกสำเร็จ !!";
			}else{
				$res['status'] = false;
				$res['message'] = "บันทุกไม่สำเร็จ !!";
			}
			echo json_encode($res);
			
		}
		public function taxdes_del()
		{
			$id = $this->input->post('id');
			$this->db->where('id_taxdes',$id);
			$this->db->update('setup_taxdes',['status' => "del"]);
		}
		public function set_taxtype_table() 
		{
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$compcode = $session_data['compcode'];
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['taxtype'] = $this->datastore_m->taxtype($compcode);

			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			// $data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			// $this->load->model('config_m');
			// $data['vdo'] = $this->config_m->getvedioname();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');

			$this->load->view('navtail/navtail_master_v');
			// $this->load->view('datastore/company/tail_v');
			$this->load->view('datastore/tax/setup_taxtype_table_v', $data);

			$this->load->view('base/footer_v');

		}
		public function add_taxtype()
		{
			$data = $this->input->post();
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			// var_dump($data);die();
			$insert = array(
				'taxtype_name' => $data['name'],
				'compcode' => $compcode,
				'status' => "Y"
			);
			$boolen = $this->db->insert('setup_taxtype',$insert);
			$res = array();
			if ($boolen) {
				$res['status'] = true;
				$res['message'] = "บันทุกสำเร็จ !!";
			}else{
				$res['status'] = false;
				$res['message'] = "บันทุกไม่สำเร็จ !!";
			}
			echo json_encode($res);
		}
	public function content_modal_taxtype()
		{
			$id = $this->input->post('taxtype_id');
			// var_dump($id);die();
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			$data['tax'] = $this->datastore_m->taxtypefind($compcode,$id);
			// var_dump($data['tax']);die();
			$this->load->view('datastore/tax/taxtype_editmodal_v', $data);
		}
	public function edit_taxtype()
		{
			$data = $this->input->post();
			// var_dump($data);die();
			$update = array(
			'taxtype_name' => $data['name']
			);
			$this->db->where('id_taxtype',$data['id']);
			$boolen = $this->db->update('setup_taxtype',$update);
			$res = array();
			if ($boolen) {
				$res['status'] = true;
				$res['message'] = "บันทุกสำเร็จ !!";
			}else{
				$res['status'] = false;
				$res['message'] = "บันทุกไม่สำเร็จ !!";
			}
			echo json_encode($res);
			
		}
		public function taxtype_del()
		{
			$id = $this->input->post('id');
			$this->db->where('id_taxtype',$id);
			$this->db->update('setup_taxtype',['status' => "del"]);
		}
	
		public function jsonsystem(){
			$this->db->select('systemname as job');
			$q = $this->db->get('system')->result();
			$re = array();
			foreach ($q as $key => $value) {
				$res[] = $value->job;
			}
			$re['data'] = $res;
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($re));
		}

		public function jsoncostcode(){
			$q = $this->datastore_m->getcostcodejson();
			$re = array();
			foreach ($q as $key => $value) {
				$res[] = $value->cgroup_name5;
			}
			$re['data'] = $res;
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($re));
		}
		public function matjson() {
			$q = $this->datastore_m->getmatcodejson();
				$re = array();
			foreach ($q as $key => $value) {
				$res[] = $value->materialname;
			}
			$re['data'] = $res;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($re),100);
		}
		public function unitjson() {
			$q = $this->datastore_m->getunit();
				$re = array();
			foreach ($q as $key => $value) {
				$res[] = $value->unit_name;
			}
			$re['data'] = $res;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($re),1000);
		}
		public function getcompany(){
			$query = $this->datastore_m->getcompanyjson();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));

		}
		public function gettender(){
			$query = $this->datastore_m->bdtender_mm();
			$arr = array();
			$arr['data'] = $query;
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($arr));

		}
		public function setbu(){
			$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$this->load->model('online_user_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
		$data['position_name'] = $session_data['position_name'];
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->get_business($data['compcode']);
		$data['user_right'] = $session_data['user_right'];
		$data['companyname'] = $session_data['companyname'];
		$data['comp_img'] = $session_data['comp_img'];
		$data['module_id'] = $this->uri->segment(3);
		$this->load->model('permission_m');
		$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
		$this->load->view('navtail/base_defualt/header_v',$data);
		$this->load->view('navtail/navtail_master_new_v');
		// $this->load->view('navtail/navtail_sub_manu_new_v');
		$this->load->view('navtail/navtail_master_submodule_v');
		// $this->load->view('panel/module_all_v');
		$this->load->view('datastore/bussiness_unit/setbussiness_unit_v');
		$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function add_new_business() {

			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->get_business_by_id($this->uri->segment(3),$data['compcode']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/bussiness_unit/add_new_business_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function edit_business() {
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->get_business_by_id($this->uri->segment(3),$data['compcode']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/bussiness_unit/edit_business_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function add_business() {
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$compcode = $session_data['compcode'];
			$maincode = $this->input->post('maincode');
			$data = array(
			  'business_code'=> $this->input->post('business_code'),
			  'business_name'=> $this->input->post('business_name'),
			  // 'vat_type' => $this->input->post('vattype'),
			  'useradd' => $username,
			  'createdate' => date('Y-m-d H:i:s',now()),
			  'status' => $this->input->post('status'),
			  'compcode' => $maincode,
			);
			$this->db->insert('master_business',$data);
			redirect('datastore/setbu');
		}
		public function edit_business_active() {
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$compcode = $session_data['compcode'];
			$id = $this->input->post('id');
			$maincode = $this->input->post('maincode');
			$data = array(
			  'business_code'=> $this->input->post('business_code'),
			  'business_name'=> $this->input->post('business_name'),
			  'status' => $this->input->post('status'),
			  // 'vat_type' => $this->input->post('evattype'),
			  'useredit' => $username,
			  'updatetime' => date('Y-m-d H:i:s',now()),
			);
			$this->db->where('business_id',$id);
			$q = $this->db->update('master_business',$data);
			redirect('datastore/setbu');
		}
		public function setproject(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/project/main/setproject_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function addproject_new(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			$data['projectid'] = $this->uri->segment(3);
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['proj'] = $this->datastore_m->getproject_array($data['projectid']);
			$data['getjobtype'] = $this->datastore_m->get_job_type($data['compcode']);
			$data['getbusi'] = $this->datastore_m->get_business_active($data['compcode']);
			$data['getsystem'] = $this->datastore_m->get_system($data['compcode']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/project/main/addproject_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function editproject(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			$data['projectid'] = $this->uri->segment(3);
			$data['projectcode'] = $this->uri->segment(4);
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['proj'] = $this->datastore_m->getproject_array($data['projectid']);
			
			$data['getjobtype'] = $this->datastore_m->get_job_type($data['compcode']);
			$data['getbusi'] = $this->datastore_m->get_business_active($data['compcode']);
			$data['getsystem'] = $this->datastore_m->get_system_new($data['projectcode'],$data['compcode']);
			$data['getsystem2'] = $this->datastore_m->getsystemcompcode($data['compcode']);
			$data['getadmin'] = $this->datastore_m->getadmincontract($data['projectid'],$data['compcode']);
			$data['getconsult'] = $this->datastore_m->getconsultcontract($data['projectid'],$data['compcode']);
			$data['acprimary'] = $this->datastore_m->getaccountproject($data['proj'][0]['acc_primary'],$data['compcode']);
			$data['acsecondary'] = $this->datastore_m->getaccountproject($data['proj'][0]['acc_secondary'],$data['compcode']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/project/main/editproject_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function setupemployee(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/employee/setemployee_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function addemployee(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			$data['projectid'] = $this->uri->segment(3);
			$data['projectcode'] = $this->uri->segment(4);
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['getposition'] = $this->datastore_m->getdataposition();
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/employee/addemployee_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function editemployee(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			$data['m_id'] = $this->uri->segment(3);
			$data['m_code'] = $this->uri->segment(4);
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['getmemb'] = $this->datastore_m->getdataemployee_array($data['m_id']);
			$data['getposition'] = $this->datastore_m->getdataposition();
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/employee/editemployee_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function uploadsignature(){
			$m_id = $this->input->post('m_id');
			$config['upload_path']   = './sign/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = '204800';
			$config['max_width']     = '9999';
			$config['max_height']    = '9999';
			$rand                    = rand( 1111, 9999 );
			$date                    = date( "Y-m-d " );
			$config['file_name']     = $date . $rand;
			$this->load->library( 'upload', $config );
			$error   = array();
			$success = array();
			foreach ( $_FILES as $field_name => $file ) {
				if ( !$this->upload->do_upload( $field_name ) ) {
					$error['upload'][] = $this->upload->display_errors();
					echo "error Update";
					return true;
				} else {
					$upload_data = $this->upload->data();
					if ( !$this->image_lib->resize() ) {
					$error['resize'][] = $this->image_lib->display_errors();
					echo "error";
					return true;
					} else {
					$data['success'] = $upload_data;
					// echo "OK Good";
					// var_dump( $_FILES );
					$name_file = $upload_data['file_name'];
					// echo $name_file;
					$udp = array(
					  'sign' => $name_file
					);
					$this->db->where('m_id',$m_id);
					if($this->db->update('member',$udp))
					{
						echo $name_file;
					}else {
						echo "error Update";
					}
					return true;
					}
				}
			} 
		}
		public function setprojectjob(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/system/setup_project_job_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function editprojectjob(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->getprojectjob_array($this->uri->segment(3),$data['compcode']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/system/edit_project_job_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function addprojectjob(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/system/add_project_job_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function master_permission(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/permission/set_permission_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function getpermisstion_project(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->getnewproject_permiss($data['module_id']);
			$data['getmemb'] = $this->datastore_m->getdataemployee_array($data['module_id']);
			$data['getposition'] = $this->datastore_m->getdataposition_arr($data['getmemb'][0]['m_position']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/permission/set_permission_project2_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function master_job_type(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->getnewproject_permiss($data['module_id']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/job_type/setjobtype_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function edit_jobtype() {
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->get_job_type_array($this->uri->segment(3),$data['compcode']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/job_type/edit_jobtype_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function add_new_jobtype() {

			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/job_type/add_new_jobtype_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function cost_type() {

			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/system/setup_costtype_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function editcosttype(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->costtype_array($this->uri->segment(3),$data['compcode']);
			$data['acprimary'] = $this->datastore_m->getaccountproject($data['res'][0]['acc_code1'],$data['compcode']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/system/edit_costtype_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function addcosttype(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);						
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/system/add_costtype_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function setupunit() {

			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/unit/setup_uom_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function editunit(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$data['res'] = $this->datastore_m->getunit_array($data['module_id']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/unit/edit_uom_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function addunit(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);						
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/unit/add_uom_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function setprojectinventory(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/inventory/setproject_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function setupwarehouse(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->getcompany();
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			$this->load->view('datastore/inventory/setupwarehouse_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
		public function addwarehouse(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['system'] = $this->datastore_m->getprojectjob();
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);						
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/inventory/add_warehouse_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
		public function editwarehouse(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$data['compcode'] = $session_data['compcode'];
			if ($username == "") {
				redirect('/');
			}
			$data['username'] = $session_data['username'];
			$this->load->model('datastore_m');
			$this->load->model('online_user_m');
			$data['imgu'] = $this->datastore_m->changeprofile($username);
			$data['compimg'] = $this->datastore_m->companyimg();
			$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
			$data['position_name'] = $session_data['position_name'];
			$data['name'] = $session_data['m_name'];
			$data['dep'] = $session_data['m_dep'];
			$data['email'] = $session_data['m_email'];
			$data['project'] = $session_data['m_project'];
			$data['master'] = $session_data['master'];
			$data['res'] = $this->datastore_m->get_business($data['compcode']);
			$data['user_right'] = $session_data['user_right'];
			$data['companyname'] = $session_data['companyname'];
			$data['comp_img'] = $session_data['comp_img'];
			$data['module_id'] = $this->uri->segment(3);
			$this->load->model('permission_m');
			$data['system'] = $this->datastore_m->getprojectjob();
			$data['wh'] = $this->datastore_m->get_whdata_array($data['module_id']);
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);						
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/inventory/edit_warehouse_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}
}