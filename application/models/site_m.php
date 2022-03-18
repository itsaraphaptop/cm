<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class site_m extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }


    public function allmaterial()
        {
            $this->db->select('*');
            $this->db->from('mat_product');
            $this->db->join('mat_subgroup','mat_subgroup.matsubgroup_code = mat_product.matsubgroup_code');
            $this->db->join('mat_group','mat_group.matgroup_code = mat_product.matgroup_code AND mat_group.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code');
            $this->db->join('mat_type','mat_type.mattype_code = mat_group.mattype_code AND mat_type.mattype_code = mat_subgroup.mattype_code AND mat_type.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_subgroup.mattype_code AND mat_subgroup.mattype_code = mat_product.mattype_code');
           
            $query = $this->db->get();
            $res = $query->result();
                return $res;
        }
    public function allcostcode()
    {
        $this->db->select('');
        $this->db->from('cost_type');
        $this->db->join('cost_group','cost_group.ctype_code = cost_type.ctype_code');
        $this->db->join('cost_subgroup','cost_subgroup.cgroup_code = cost_group.cgroup_code AND cost_subgroup.ctype_code = cost_type.ctype_code');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
    ////////////////////////
    /////////  PR  ////////
    //////////////////////
     public function getallpr($id)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
      $this->db->join('department','department.department_id = pr.pr_department','left outer');
      $this->db->order_by('pr_prid','desc');
      $this->db->where('pr_project',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function getpr_h()
    {
    	$this->db->select('*');
    	$query = $this->db->get('pr');
    	$res = $query->result();
    	return $res;
    }
    public function getpr_d($siteid,$prno)
    {
    	$this->db->select('*');
    	$this->db->where('pr_no',$prno);
    	$query = $this->db->get('pr_item');
    	$res = $query->result();
    	return $res;
    }
     public function getpr_approveall()   ////  PR อนุมัติแล้ว office
    {
        $this->db->select('*');
        $this->db->where('pr_approve','approve');
        $query = $this->db->get('pr');
        $res = $query->result();
        return $res;
    }
    public function getpr_waitall()  //// pr ยังไม่ได้อนุมัติ office
    {
        $this->db->select('*');
        $this->db->where('pr_approve','wait');
        $query = $this->db->get('pr');
        $res = $query->result();
        return $res;
    }
    public function getpr_approve($id)   ////  PR อนุมัติแล้ว
    {
    	$this->db->select('*');
        $this->db->where('pr_project',$id);
    	$this->db->where('pr_approve','approve');
    	$query = $this->db->get('pr');
    	$res = $query->result();
    	return $res;
    }
	public function getpr_wait($id)  //// pr ยังไม่ได้อนุมัติ
    {
    	$this->db->select('*');
        $this->db->from('pr');
        $this->db->join('project', 'project.project_id = pr.pr_project','left outer');
        $this->db->join('department','department.department_id = pr.pr_department','left outer');
        $this->db->where('pr_project',$id);
    	$this->db->where('pr_approve','wait');
    	$query = $this->db->get();
    	$res = $query->result();
    	return $res;
    }
    public function getpr_sendapprove($id)   ////  PR ส่งอนุมัติ
    {
        $this->db->select('*');
        $this->db->where('pr_project',$id);
        $this->db->where('pr_approve','no');
        $query = $this->db->get('pr');
        $res = $query->result();
        return $res;
    }


    ////////////////////////
    ///// PRETTY CASH  ////
    //////////////////////
    public function getpettycash_h()
    {
    	$this->db->select('*');
    	$query = $this->db->get('pettycash');
    	$res = $query->result();
    	return $res;
    }
    public function getpettycash_d()
    {
    	$this->db->select('*');
    	$query = $this->db->get('pettycash_item');
    	$res = $query->result();
    	return $res;
    }

    ////////////////////////
    ///// RECEIVE  ////
    //////////////////////
    public function getreceive()
    {

    }

    ////////////////////////
    ///////// STOCK  //////
    //////////////////////
    public function getstock()
    {

    }


    public function getproject($id)
    {
        $this->db->select('*');
        $this->db->where('project_id',$id);
        $query = $this->db->get('project');
        $res = $query->result();
        return $res;
    }
     public function getmember($id)
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('project','project.project_id = member.m_project','left outer');
        $this->db->where('m_user',$id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
     public function getmemberall($id)
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->join('project','project.project_id = member.m_project','left outer');
        $this->db->where('m_project',$id);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
    public function getunit()
    {
      $this->db->select('*');
      $query = $this->db->get('unit');
      $res = $query->result();
      return $res;
    }


}