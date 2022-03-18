<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hr_m extends CI_Controller {
	  public function __construct() {
            parent::__construct();

        }

        public function selemp()
        {
        	$this->db->select('*');
        $this->db->from('emp_profile_tb');
        $this->db->join('emp_company_tb', 'emp_company_tb.emp_member = emp_profile_tb.emp_member');
        $this->db->join('emp_contact_tb','emp_contact_tb.emp_member = emp_company_tb.emp_member','left');
        $this->db->join('emp_edu_tb','emp_edu_tb.emp_member = emp_contact_tb.emp_member','left');
        $this->db->join('emp_skill_tb','emp_skill_tb.emp_member = emp_profile_tb.emp_member','left');
        $this->db->join('emp_otherskill_tb','emp_otherskill_tb.emp_member = emp_skill_tb.emp_member','left');
        $this->db->join('emp_behave_tb','emp_behave_tb.emp_member = emp_otherskill_tb.emp_member','left');
        $this->db->group_by('emp_profile_tb.emp_member');
        $this->db->where('emp_stat',1);
        $query = $this->db->get();
        return $query->result();

        }

public function selectempByID($empid){
    $this->db->select('*');
        $this->db->from('emp_profile_tb');
        $this->db->join('emp_company_tb', 'emp_company_tb.emp_member = emp_profile_tb.emp_member', 'left');
        $this->db->join('emp_contact_tb','emp_contact_tb.emp_member = emp_company_tb.emp_member','left');
        $this->db->join('emp_edu_tb','emp_edu_tb.emp_member = emp_contact_tb.emp_member','left');
        $this->db->join('emp_skill_tb','emp_skill_tb.emp_member = emp_profile_tb.emp_member','left');
        $this->db->join('emp_otherskill_tb','emp_otherskill_tb.emp_member = emp_skill_tb.emp_member','left');
        $this->db->join('emp_behave_tb','emp_behave_tb.emp_member = emp_otherskill_tb.emp_member','left');
        $this->db->where('emp_profile_tb.emp_member',$empid);
        $this->db->group_by('emp_profile_tb.emp_member');
        $query = $this->db->get();
        return $query->result();
}

public function imguser($idemp){
				$this->db->select('*');
				$this->db->from('emp_profile_tb');
				$this->db->where('emp_profile_tb.emp_member',$idemp);
				$query = $this->db->get();
				return $query->result();
}

public function getleave($idemp){
		$this->db->select('emp_leave.*');
		$this->db->from('emp_leave');
		$this->db->where('emp_leave.emp_id',$idemp);
		$query = $this->db->get();
		return $query->result();
}

public function getrule($mid){
		$this->db->select('emp_leave_rule.*');
		$this->db->from('emp_leave_rule');
		$this->db->where('emp_leave_rule.emp_id',$mid);
		$query = $this->db->get();
		return $query->result();
}
public function getmsgleave($mid){
	$testa = array('emp_leave.emp_lead' =>$mid,'emp_leave.status'=>'0');
$this->db->select('emp_leave.*,member.m_name');
$this->db->from('emp_leave');
 $this->db->join('member','emp_leave.emp_id = member.m_id', 'left');
$this->db->where($testa);
// $this->db->where('emp_leave.status',0);
$q = $this->db->get();
return $q->result();
}

    public function getedu_m(){
        $this->db->select('*');
        $this->db->from('educational_ins');
        $query = $this->db->get();
        return $query->result();
    }

    public function getgroedu_m(){
        $this->db->select('*');
        $this->db->from('educational');
        $query = $this->db->get();
        return $query->result();
    }

    public function gettrain_m(){
        $this->db->select('*');
        $this->db->from('training');
        $query = $this->db->get();
        return $query->result();
    }

    public function getproject_m(){
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('project_status','normal');
        $query = $this->db->get();
        return $query->result();
    }

    public function getdepartment_m(){
        $this->db->select('*');
        $this->db->from('department');
        $query = $this->db->get();
        return $query->result();
    }

    public function getposition_m(){
        $this->db->select('*');
        $this->db->from('m_position');
        $query = $this->db->get();
        return $query->result();
    }

    public function emp_profile_m($id){
        $this->db->select('*');
        $this->db->from('emp_profile_tb');
        $this->db->join('emp_company_tb','emp_company_tb.emp_member = emp_profile_tb.emp_member');
        $this->db->where('emp_company_tb.emp_member',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function emp_contact_m($id){
        $this->db->select('*');
        $this->db->from('emp_contact_tb');
        $this->db->join('emp_company_tb','emp_company_tb.emp_member = emp_contact_tb.emp_member');
        $this->db->where('emp_contact_tb.emp_member',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function emp_edu_m($id){
        $this->db->select('*');
        $this->db->from('emp_edu_tb');
        $this->db->join('emp_company_tb','emp_company_tb.emp_member = emp_edu_tb.emp_member');
        $this->db->join('educational','educational.groedu_code = emp_edu_tb.edu_level');
        $this->db->join('educational_ins','educational_ins.edu_code = emp_edu_tb.edu_name');
        $this->db->where('emp_edu_tb.emp_member',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function emp_com_m($id){
        $this->db->select('*');
        $this->db->from('emp_company_tb');
        $this->db->where('emp_company_tb.emp_member',$id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function emp_skiil_m($id){
        $this->db->select('*');
        $this->db->from('emp_skill_tb');
        $this->db->join('emp_company_tb','emp_company_tb.emp_member = emp_skill_tb.emp_member');
        $this->db->where('emp_skill_tb.emp_member',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function emp_otherskill_m($id){
        $this->db->select('*');
        $this->db->from('emp_otherskill_tb');
        $this->db->join('emp_company_tb','emp_company_tb.emp_member = emp_otherskill_tb.emp_member');
        $this->db->where('emp_otherskill_tb.emp_member',$id);
        $query = $this->db->get();
        return $query->result();
    }


    public function emp_behave_m($id){
        $this->db->select('*');
        $this->db->from('emp_behave_tb');
        $this->db->where('emp_member',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function emp_company_m($m_id){
        $this->db->select('*');
        $this->db->from('emp_company_tb');
        $this->db->join('member','member.m_code = emp_company_tb.emp_member');
        $this->db->where('member.m_id',$m_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function emp_profilee_m($m_id){
        $this->db->select('*');
        $this->db->from('emp_profile_tb');
        $this->db->join('member','member.m_code = emp_profile_tb.emp_member');
        $this->db->where('member.m_id',$m_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getleavell(){
        $this->db->select('*');
        $this->db->join('master_leave','master_leave.le_id = emp_leave.type_master','left outer');
        $this->db->join('emp_profile_tb','emp_profile_tb.emp_member = emp_leave.emp_member','left outer');
        $this->db->from('emp_leave');
        $query = $this->db->get();
        return $query->result();
    }
    public function getleave_m(){
        $this->db->select('*');
        $this->db->from('master_leave');
        $query = $this->db->get();
        return $query->result();
    }
    public function getleave_mm(){
        $this->db->select('*');
        $this->db->from('master_leave');
        $this->db->where('type_leave !=',3);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_delectemp(){
        $this->db->select('*');
        $this->db->join('emp_profile_tb','emp_profile_tb.emp_member = emp_company_tb.emp_member','left outer');
        $this->db->join('m_position','m_position.id = emp_company_tb.emp_position','left outer');
        $this->db->join('project','project.project_id = emp_company_tb.emp_project','left outer');
        $this->db->join('department','department.department_id = emp_company_tb.emp_department','left outer');
        $this->db->where('emp_company_tb.emp_stat',03);
        $query = $this->db->get('emp_company_tb');
        return $query->result();
    }
}
