<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mat_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function get_type($type)
    {
        $this->db->select('*');
        $this->db->where('mattype_code',$type);
        $result = $this->db->get('mat_type');
        $res = $result->result();
        return $res;
    }
    function get_group_where_name($name)
    {
        $this->db->select('*');
        // $this->db->like('matgroup_code',$name);
        $this->db->like('matgroup_name',$name);
        $result = $this->db->get('mat_group');
        $res = $result->result();
        return $res;
    }
    function get_subgroup_where_name($name,$b1,$b2)
    {
        $this->db->select('*');
        // $this->db->like('matgroup_code',$name);
        $this->db->where('mattype_code',$b1);
        $this->db->where('matgroup_code',$b2);
        $this->db->like('matsubgroup_name',$name);
        $result = $this->db->get('mat_subgroup');
        $res = $result->result();
        return $res;
    }
    function get_product_where_name($name,$type,$group,$subgroup)
    {
        $this->db->select('*');
        // $this->db->like('matgroup_code',$name);
         $this->db->where('mattype_code',$type);
        $this->db->where('matgroup_code',$group);
        $this->db->where('matsubgroup_code',$subgroup);
        $this->db->like('matname',$name);

        $result = $this->db->get('mat_product');
        $res = $result->result();
        return $res;
    }
    function get_group($type,$group)
    {
        $this->db->select('*');
        $this->db->where('mattype_code',$type);
        $this->db->where('matgroup_code',$group);
        $this->db->order_by('matgroup_code','asc');
        $result = $this->db->get('mat_group');
        $res = $result->result();
        return $res;
    }
    function get_subgroup($type,$group,$sub)
    {
        $this->db->select('*');
        $this->db->where('mattype_code',$type);
        $this->db->where('matgroup_code',$group);
        $this->db->where('matsubgroup_code',$sub);
        $this->db->order_by('matsubgroup_code','asc');
        $result = $this->db->get('mat_subgroup');
        $res = $result->result();
        return $res;
    }

    function get_product($type,$group,$sub,$matcode)
    {
        $this->db->select('*');
        $this->db->where('mattype_code',$type);
        $this->db->where('matgroup_code',$group);
        $this->db->where('matsubgroup_code',$sub);
        $this->db->where('matcode',$matcode);
        $this->db->order_by('matcode','asc');
        $result = $this->db->get('mat_product');
        $res = $result->result();
        return $res;
    }
    function get_spec($type,$group,$sub,$matcode,$spec)
    {
      $this->db->select('*');
      $this->db->where('mattype_code',$type);
      $this->db->where('matgroup_code',$group);
      $this->db->where('matsubgroup_code',$sub);
      $this->db->where('matcode',$matcode);
      $this->db->where('matspec_code',$spec);
      $this->db->order_by('matspec_code','asc');
      $query = $this->db->get('mat_spec');
      $res = $query->result();
      return $res;
    }
    function get_brand($type,$group,$sub,$matcode,$spec,$brand)
    { 
      $this->db->select('*');
      $this->db->where('mattype_code',$type);
      $this->db->where('matgroup_code',$group);
      $this->db->where('matsubgroup_code',$sub);
      $this->db->where('matcode',$matcode);
      $this->db->where('matspec_code',$spec);
      $this->db->where('matbrand_code',$brand);
      $this->db->order_by('matbrand_code','asc');
      $query = $this->db->get('mat_brand');
      $res = $query->result();
      return $res;
    }
    function get_brandunit($type,$group,$sub,$matcode,$spec,$brand)
    {
      $this->db->select('*');
      $this->db->where('mattype_code',$type);
      $this->db->where('matgroup_code',$group);
      $this->db->where('matsubgroup_code',$sub);
      $this->db->where('matcode',$matcode);
      $this->db->where('matspec_code',$spec);
      $this->db->where('matbrand_code',$brand);
      $this->db->order_by('matbrand_code','asc');
      $query = $this->db->get('mat_brand');
      $res = $query->result();
      return $res;
    }
     function get_brands($type,$group,$sub,$matcode,$spec)
    { 
      $this->db->select('*');
      $this->db->where('mattype_code',$type);
      $this->db->where('matgroup_code',$group);
      $this->db->where('matsubgroup_code',$sub);
      $this->db->where('matcode',$matcode);
      $this->db->where('matspec_code',$spec);
      $this->db->order_by('matbrand_code','asc');
      $query = $this->db->get('mat_brand');
      $res = $query->result();
      return $res;
    }
    function get_matunit($type,$group,$sub,$matcode,$spec,$brand)
    { 
      $this->db->select('*');
      $this->db->where('mattype_code',$type);
      $this->db->where('matgroup_code',$group);
      $this->db->where('matsubgroup_code',$sub);
      $this->db->where('matcode',$matcode);
      $this->db->where('matspec_code',$spec);
      $this->db->where('matbrand_code',$brand);
      $this->db->order_by('matunit_code','asc');
      $query = $this->db->get('mat_unit');
      $res = $query->result();
      return $res;
    }
 function get_unit($brand)
    {
      $this->db->select('unit_name');
       $this->db->where('unit_code',$brand);
      $query = $this->db->get('unit');
      $res = $query->result();
      return $res;
    }
 function get_unitty($type,$group,$sub,$matcode,$spec,$brand,$unit)
    { 
      $this->db->select('*');
      $this->db->where('mattype_code',$type);
      $this->db->where('matgroup_code',$group);
      $this->db->where('matsubgroup_code',$sub);
      $this->db->where('matcode',$matcode);
      $this->db->where('matspec_code',$spec);
      $this->db->where('matbrand_code',$brand);
       $this->db->where('matunit_code',$unit);
      $this->db->order_by('matbrand_code','asc');
      $query = $this->db->get('mat_unit');
      $res = $query->result();
      return $res;
    }

    function get_costcode($c1,$c2,$b1)
    {
        $this->db->select('*');
        $this->db->where('ctype_code',$c1);
        $this->db->where('cgroup_code',$c2);
        $this->db->like('csubgroup_name',$b1);
        $result = $this->db->get('cost_subgroup');
        $res = $result->result();
        return $res;
    }

    function get_costtypecode($c1)
    {
        $this->db->select('*');
        $this->db->group_by('ctype_name');
        $this->db->like('ctype_name',$c1);
        $result = $this->db->get('cost_subgroup');
        $res = $result->result();
        return $res;
    }

     function get_costgroupcode($c1,$c2)
    {
        $this->db->select('*');
        $this->db->where('ctype_code',$c1);
        $this->db->like('cgroup_name',$c2);
        $this->db->group_by('cgroup_name');
        $result = $this->db->get('cost_subgroup');
        $res = $result->result();
        return $res;
    }

    function get_costcode4($c1,$c2,$c3,$b1)
    {
        $this->db->select('*');
        $this->db->where('ctype_code',$c1);
        $this->db->where('cgroup_code',$c2);
        $this->db->where('csubgroup_code',$c3);
        $this->db->like('cgroup_name4',$b1);
        $this->db->group_by('cgroup_code4');
        $result = $this->db->get('cost_subgroup');
        $res = $result->result();
        return $res;
    }

    function get_costcode5($c1,$c2,$c3,$c4,$b1)
    {
        $this->db->select('*');
        $this->db->where('ctype_code',$c1);
        $this->db->where('cgroup_code',$c2);
        $this->db->where('csubgroup_code',$c3);
        $this->db->where('cgroup_code4',$c4);
        $this->db->like('cgroup_name5',$b1);
        $this->db->group_by('cgroup_code5');
        $result = $this->db->get('cost_subgroup');
        $res = $result->result();
        return $res;
    }


  }
