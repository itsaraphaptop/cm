<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class programmer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}
	public function datastructure()
	{
		try {
			$this->_create_table_receive_po();
			$this->_add_project_unit();
			
			if ($this->db->field_exists('computername', 'userlog')) {
				$fields = array(
					'computername' => array('type' => 'varchar', 'constraint' => '30', 'null' => true),
				);
				$this->dbforge->modify_column('userlog', $fields);
			} else {
				$fields = array(
					'computername' => array('type' => 'varchar', 'constraint' => '30', 'null' => true),
				);
				$this->dbforge->add_column('userlog', $fields);
			}
			
			if ($this->db->field_exists('boq_type', 'pr_item')) {
				$fields = array(
					'boq_type' => array('type' => 'varchar', 'constraint' => '1', 'null' => true),
				);
				$this->dbforge->modify_column('pr_item', $fields);
			} else {
				$fields = array(
					'boq_type' => array('type' => 'varchar', 'constraint' => '1', 'null' => true),
				);
				$this->dbforge->add_column('pr_item', $fields);
			}

			if ($this->db->field_exists('ap_vender_name', 'ap_billsuc_header')) {
				$fields = array(
					'ap_vender_name' => array('type' => 'varchar', 'constraint' => '200', 'null' => true),
				);
				$this->dbforge->modify_column('ap_billsuc_header', $fields);
			} else {
				$fields = array(
					'ap_vender_name' => array('type' => 'varchar', 'constraint' => '200', 'null' => true),
				);
				$this->dbforge->add_column('ap_billsuc_header', $fields);
			}

			if ($this->db->field_exists('vender_remark', 'vender')) {
				$fields = array(
					'vender_remark' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('vender', $fields);
			} else {
				$fields = array(
					'vender_remark' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('vender', $fields);
			}
			
			if ($this->db->field_exists('costlevel', 'syscode')) {
				$fields = array(
					'costlevel' => array('type' => 'varchar', 'constraint' => '2', 'null' => true),
				);
				$this->dbforge->modify_column('syscode', $fields);
			} else {
				$fields = array(
					'costlevel' => array('type' => 'varchar', 'constraint' => '2', 'null' => true),
				);
				$this->dbforge->add_column('syscode', $fields);
			}
			if ($this->db->field_exists('teamother', 'po')) {
				$fields = array(
					'teamother' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('po', $fields);
			} else {
				$fields = array(
					'teamother' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('po', $fields);
			}
			if ($this->db->field_exists('pri_unitcode', 'pr_item')) {
				$fields = array(
					'pri_unitcode' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('pr_item', $fields);
			} else {
				$fields = array(
					'pri_unitcode' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('pr_item', $fields);
			}
			if ($this->db->field_exists('pri_uniticcode', 'pr_item')) {
				$fields = array(
					'pri_uniticcode' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('pr_item', $fields);
			} else {
				$fields = array(
					'pri_uniticcode' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('pr_item', $fields);
			}
			if ($this->db->field_exists('pri_disc', 'pr_compare_detail')) {
				$fields = array(
					'pri_disc' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->modify_column('pr_compare_detail', $fields);
			} else {
				$fields = array(
					'pri_disc' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->add_column('pr_compare_detail', $fields);
			}
			if ($this->db->field_exists('pri_cr', 'pr_compare_detail')) {
				$fields = array(
					'pri_cr' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->modify_column('pr_compare_detail', $fields);
			} else {
				$fields = array(
					'pri_cr' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->add_column('pr_compare_detail', $fields);
			}
			if ($this->db->field_exists('pri_amount', 'pr_compare_detail')) {
				$fields = array(
					'pri_amount' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->modify_column('pr_compare_detail', $fields);
			} else {
				$fields = array(
					'pri_amount' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->add_column('pr_compare_detail', $fields);
			}
			if ($this->db->field_exists('pri_vender', 'pr_compare_detail')) {
				$fields = array(
					'pri_vender' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('pr_compare_detail', $fields);
			} else {
				$fields = array(
					'pri_vender' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('pr_compare_detail', $fields);
			}
			if ($this->db->field_exists('quovender', 'pr_compare_vender')) {
				$fields = array(
					'quovender' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->modify_column('pr_compare_vender', $fields);
			} else {
				$fields = array(
					'quovender' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->add_column('pr_compare_vender', $fields);
			}
			if ($this->db->field_exists('rq_disc', 'pr_compare_vender')) {
				$fields = array(
					'rq_disc' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->modify_column('pr_compare_vender', $fields);
			} else {
				$fields = array(
					'rq_disc' => array('type' => 'decimal', 'constraint' => '10,2', 'null' => true,'default' => '0.00'),
				);
				$this->dbforge->add_column('pr_compare_vender', $fields);
			}
			if ($this->db->field_exists('compare', 'pr_compare_header')) {
				$fields = array(
					'compare' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('pr_compare_header', $fields);
			} else {
				$fields = array(
					'compare' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('pr_compare_header', $fields);
			}
			if ($this->db->field_exists('subcostcodelabor', 'boq_item')) {
				$fields = array(
					'subcostcodelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('boq_item', $fields);
			} else {
				$fields = array(
					'subcostcodelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('boq_item', $fields);
			}
			if ($this->db->field_exists('subcostnamelabor', 'boq_item')) {
				$fields = array(
					'subcostnamelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('boq_item', $fields);
			} else {
				$fields = array(
					'subcostnamelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('boq_item', $fields);
			}
			if ($this->db->field_exists('compcode', 'report')) {
				$fields = array(
					'compcode' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->modify_column('report', $fields);
			} else {
				$fields = array(
					'compcode' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->add_column('report', $fields);
			}

			if ($this->db->field_exists('pr_report', 'syscode')) {
				$fields = array(
					'pr_report' => array('type' => 'varchar', 'constraint' => '1', 'null' => true,'default' => 'N'),
				);
				$this->dbforge->modify_column('syscode', $fields);
			} else {
				$fields = array(
					'pr_report' => array('type' => 'varchar', 'constraint' => '1', 'null' => true,'default' => 'N'),
				);
				$this->dbforge->add_column('syscode', $fields);
			}
			
			if ($this->db->field_exists('print_defualt', 'setup_default')) {
				$fields = array(
					'print_defualt' => array('type' => 'varchar', 'constraint' => '1', 'null' => true,'default' => 'N'),
				);
				$this->dbforge->modify_column('setup_default', $fields);
			} else {
				$fields = array(
					'print_defualt' => array('type' => 'varchar', 'constraint' => '1', 'null' => true,'default' => 'N'),
				);
				$this->dbforge->add_column('setup_default', $fields);
			}
			if ($this->db->field_exists('line_api', 'setup_default')) {
				$fields = array(
					'line_api' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('setup_default', $fields);
			} else {
				$fields = array(
					'line_api' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('setup_default', $fields);
			}

			if ($this->db->field_exists('matcodelabor', 'boq_item')) {
				$fields = array(
					'matcodelabor' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->modify_column('boq_item', $fields);
			} else {
				$fields = array(
					'matcodelabor' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->add_column('boq_item', $fields);
			}

			if ($this->db->field_exists('matnamelabor', 'boq_item')) {
				$fields = array(
					'matnamelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('boq_item', $fields);
			} else {
				$fields = array(
					'matnamelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('boq_item', $fields);
			}
			
			if ($this->db->field_exists('matcodelabor', 'boq_item_revise')) {
				$fields = array(
					'matcodelabor' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->modify_column('boq_item_revise', $fields);
			} else {
				$fields = array(
					'matcodelabor' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->add_column('boq_item_revise', $fields);
			}

			if ($this->db->field_exists('matnamelabor', 'boq_item_revise')) {
				$fields = array(
					'matnamelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('boq_item_revise', $fields);
			} else {
				$fields = array(
					'matnamelabor' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('boq_item_revise', $fields);
			}
		
			if ($this->db->field_exists('reject_remark', 'approve_po')) {
				$fields = array(
					'reject_remark' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->modify_column('approve_po', $fields);
			} else {
				$fields = array(
					'reject_remark' => array('type' => 'varchar', 'constraint' => '255', 'null' => true),
				);
				$this->dbforge->add_column('approve_po', $fields);
			}

			if ($this->db->field_exists('reject_user', 'approve_po')) {
				$fields = array(
					'reject_user' => array('type' => 'varchar', 'constraint' => '100', 'null' => true),
				);
				$this->dbforge->modify_column('approve_po', $fields);
			} else {
				$fields = array(
					'reject_user' => array('type' => 'varchar', 'constraint' => '100', 'null' => true),
				);
				$this->dbforge->add_column('approve_po', $fields);
			}

			if ($this->db->field_exists('reject_date', 'approve_po')) {
				$fields = array(
					'reject_date' => array('type' => 'datetime', 'constraint' => '0', 'null' => true),
				);
				$this->dbforge->modify_column('approve_po', $fields);
			} else {
				$fields = array(
					'reject_date' => array('type' => 'datetime', 'constraint' => '0', 'null' => true),
				);
				$this->dbforge->add_column('approve_po', $fields);
			}

			if ($this->db->field_exists('project_code', 'boq_item_revise')) {
				$fields = array(
					'project_code' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->modify_column('boq_item_revise', $fields);
			} else {
				$fields = array(
					'project_code' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->add_column('boq_item_revise', $fields);
			}
			
			if ($this->db->field_exists('boq_type', 'lo_detail')) {
				$fields = array(
					'boq_type' => array('type' => 'int', 'constraint' => '1', 'null' => true),
				);
				$this->dbforge->modify_column('lo_detail', $fields);
			} else {
				$fields = array(
					'boq_type' => array('type' => 'int', 'constraint' => '1', 'null' => true),
				);
				$this->dbforge->add_column('lo_detail', $fields);
			}

			if ($this->db->field_exists('paywithin', 'lo')) {
				$fields = array(
					'paywithin' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('lo', $fields);
			} else {
				$fields = array(
					'paywithin' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('lo', $fields);
			}

			if ($this->db->field_exists('pri_project', 'pr_item')) {
				$fields = array(
					'pri_project' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('pr_item', $fields);
			} else {
				$fields = array(
					'pri_project' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('pr_item', $fields);
			}

			if ($this->db->field_exists('poi_project', 'po_item')) {
				$fields = array(
					'poi_project' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('po_item', $fields);
			} else {
				$fields = array(
					'poi_project' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('po_item', $fields);
			}
			
			if ($this->db->field_exists('loi_project', 'lo_detail')) {
				$fields = array(
					'loi_project' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('lo_detail', $fields);
			} else {
				$fields = array(
					'loi_project' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('lo_detail', $fields);
			}
			
			if ($this->db->field_exists('wt_taxen', 'company')) {
				$fields = array(
					'wt_taxen' => array('type' => 'int', 'constraint' => '2', 'null' => true),
				);
				$this->dbforge->modify_column('company', $fields);
			} else {
				$fields = array(
					'wt_taxen' => array('type' => 'int', 'constraint' => '2', 'null' => true),
				);
				$this->dbforge->add_column('company', $fields);
			}
			
			if ($this->db->field_exists('bussiness_code', 'project')) {
				$fields = array(
					'bussiness_code' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('project', $fields);
			} else {
				$fields = array(
					'bussiness_code' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('project', $fields);
			}
			
			if ($this->db->field_exists('close_btn_pr_to_po', 'syscode')) {
				$fields = array(
					'close_btn_pr_to_po' => array('type' => 'varchar', 'constraint' => '10', 'null' => true,'default' => 'N'),
				);
				$this->dbforge->modify_column('syscode', $fields);
			} else {
				$fields = array(
					'close_btn_pr_to_po' => array('type' => 'varchar', 'constraint' => '10', 'null' => true,'default' => 'N'),
				);
				$this->dbforge->add_column('syscode', $fields);
			}

			if ($this->db->field_exists('pass', 'member')) {
				$fields = array(
					'pass' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('member', $fields);
			} else {
				$fields = array(
					'pass' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('member', $fields);
			}

			if ($this->db->field_exists('createuser', 'member')) {
				$fields = array(
					'createuser' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('member', $fields);
			} else {
				$fields = array(
					'createuser' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('member', $fields);
			}
			
			if ($this->db->field_exists('createdate', 'member')) {
				$fields = array(
					'createdate' => array('type' => 'datetime', 'constraint' => '0', 'null' => true),
				);
				$this->dbforge->modify_column('member', $fields);
			} else {
				$fields = array(
					'createdate' => array('type' => 'datetime', 'constraint' => '0', 'null' => true),
				);
				$this->dbforge->add_column('member', $fields);
			}
			
			if ($this->db->field_exists('edituser', 'member')) {
				$fields = array(
					'edituser' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->modify_column('member', $fields);
			} else {
				$fields = array(
					'edituser' => array('type' => 'varchar', 'constraint' => '10', 'null' => true),
				);
				$this->dbforge->add_column('member', $fields);
			}
			
			if ($this->db->field_exists('editdate', 'member')) {
				$fields = array(
					'editdate' => array('type' => 'datetime', 'constraint' => '0', 'null' => true),
				);
				$this->dbforge->modify_column('member', $fields);
			} else {
				$fields = array(
					'editdate' => array('type' => 'datetime', 'constraint' => '0', 'null' => true),
				);
				$this->dbforge->add_column('member', $fields);
			}

			if ($this->db->field_exists('pettycashi_project', 'pettycash_item')) {
				$fields = array(
					'pettycashi_project' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->modify_column('pettycash_item', $fields);
			} else {
				$fields = array(
					'pettycashi_project' => array('type' => 'varchar', 'constraint' => '20', 'null' => true),
				);
				$this->dbforge->add_column('pettycash_item', $fields);
			}


			$this->_alter_module();
			$this->_add_model_unit();
			$this->_add_pr_unit_detail();
			$this->_add_po_unit_detail();
			$this->_add_wo_unit_detail();
			

			echo "true";
			return true;

		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}

	}
	private function _create_table_receive_po()
	{
		$sql = file_get_contents("sql/receive_po.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
	}
	private function _alter_module()
	{
		$sql = file_get_contents("sql/module.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
	}
	private function _add_model_unit()
	{
		$sql = file_get_contents("sql/model_unit.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
	}
	private function _add_project_unit()
	{
		$sql = file_get_contents("sql/project_unit.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
	}
	private function _add_pr_unit_detail()
	{
		$sql = file_get_contents("sql/pr_unit_detail.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
	}
	private function _add_po_unit_detail()
	{
		$sql = file_get_contents("sql/po_unit_detail.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
	}
	private function _add_wo_unit_detail()
	{
		$sql = file_get_contents("sql/wo_unit_detail.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
	}
	public function truncatedata()
	{
		try {
			$this->_truncate_all_data();
			$pc = './select_file_pc';
			$this->delAllFileInfolder($pc);
			if (is_dir($pc)&&$pc!='') {
				rmdir($pc);
				
			}
			$pr = './select_file_pr';
			$this->delAllFileInfolder($pr);
			if (is_dir($pr)&&$pr!='') {
				rmdir($pr);
				
			}
			$po = './select_file_po';
			$this->delAllFileInfolder($po);
			if (is_dir($po)&&$po!='') {
				rmdir($po);
				
			}
			mkdir($pc);
			mkdir($pr);
			mkdir($po);
			echo "true";
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}

	}
	private function _truncate_all_data()
	{
		$sql = file_get_contents("sql/truncate_all_data.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
		
	}
	private function delAllFileInfolder($folder=''){
		if (is_dir($folder)&&$folder!='') {
			//Get a list of all of the file names in the folder.
			$files = glob($folder . '/*');
			
			//Loop through the file list.
			foreach($files as $file){
				//Make sure that this is a file and not a directory.
				if(is_file($file)){
					//Use the unlink function to delete the file.
					unlink($file);
				}
			}
		}
	}
}