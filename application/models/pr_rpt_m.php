<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pr_rpt_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function report_pr_id($id)
    {
      $this->db->select('pri_ref, COUNT(pri_ref) as total');
  $this->db->group_by('pri_ref');
  $this->db->where('pri_ref',$id);
  $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;
    }
    public function report_pr_h($id)
    {
      $this->db->select('*');
      $this->db->from('pr');
      $this->db->join('project','project.project_id=pr.pr_project','left outer');
      $this->db->join('department','department.department_id=pr.pr_department','left outer');
      $this->db->where('pr_prno',$id);
      $query = $this->db->get();
      $res = $query->result();
      return $res;
    }
    public function report_pr($id)
    {
      $this->db->select('*');
  $this->db->where('pri_ref',$id);
  $query = $this->db->get('pr_item');
      $res = $query->result();
      return $res;
    }
    public function companyimgbycompcode($compcode)
    {
        $this->db->select('*');
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('company');
        $res = $query->result();
        foreach ($res as $value) {
            $img = $value->comp_img;

        }
        return $img;
    }
}
