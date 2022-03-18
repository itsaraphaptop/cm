<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class asset_m extends CI_Model {


public function ud($assetcode,$ud)
{
  $this->db->where('idimg',$assetcode);
  $q = $this->db->update('imgrecords',$ud);
  if ($q) {
    return true;
  }
}

public function ud1($assetcode,$ud1)
{
  $this->db->where('assetcode',$assetcode);
  $q1 = $this->db->update('records',$ud1);
  if ($q1) {
    return true;
  }
}


public function load_detail($assetcode)
{
  $this->db->select('*');
  $this->db->where('assetcode',$assetcode);
  $q = $this->db->get('records');
  $res = $q->result();
  return $res;
}
public function load_detail_img($assetcode)
{
  $this->db->select('*');
  $this->db->where('assetcode',$assetcode);
  $q = $this->db->get('imgrecords');
  $res = $q->result();
  return $res;
}
public function load_detail_imgBIG($assetcode)
{
  $this->db->select('*');
  $this->db->where('assetcode',$assetcode);
  $this->db->order_by('idimg','asc');
  $this->db->limit(1);
  $q = $this->db->get('imgrecords');
  $res = $q->result();
  return $res;
}
    public function all()
{
    $this->db->select('*');
    $q = $this->db->get('records');

    $output = $q->result();
    return $output;
}
  public function type()
{
    $this->db->select('*');
    $q = $this->db->get('asset_type');
    $type = $q->result();
    return $type;
}

public function type_pj()
{
    $this->db->select('*');
    $q = $this->db->get('project');
    $type_pj = $q->result();
    return $type_pj;
}
public function depart()
{
    $this->db->select('*');
    $q = $this->db->get('department');
    $type_pj = $q->result();
    return $type_pj;
}
 public function ass_location()
{
    $this->db->select('*');
    $this->db->where('location',1);
    $this->db->where('status',"Y");
    $q = $this->db->get('ass_location');
    $type = $q->result();
    return $type;
}
//  public function ass_location2()
// {
//     $this->db->select('*');
//     $this->db->where('location',2);
//     $this->db->where('status',"Y");
//     $q = $this->db->get('ass_location');
//     $type = $q->result();
//     return $type;
// }
public function asset_type()
{
    $this->db->select('*');
    $this->db->where('status',null);
    $q = $this->db->get('asset_type');
    $type = $q->result();
    return $type;
}

public function retrieve_depremethod()
{
    $this->db->select('*');
    $this->db->where('status',null);
    $q = $this->db->get('depre_method');
    $type = $q->result();
    return $type;
}

public function retrieve_view($id)
{
    $this->db->select('*');  
    $this->db->from('depre_method');  
    $this->db->where('de_id', $id); 
    $query = $this->db->get()->result();
    return $query;
}

public function model_addasset()
{
    $this->db->select('*');
    $this->db->order_by("fa_assetcode", "asc");

    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}
public function model_addassets()
{
    $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
    $this->db->select('*');
    // $this->db->where('fa_projectid',$pro);
    $this->db->where('compcode', $compcode);
    $this->db->order_by("fa_assetcode", "asc");
    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}
public function detailasset($id)
{
    $this->db->select('*');
    $this->db->where('assetcode',$id);
    $q = $this->db->get('asset_item');
    $type = $q->result();
    return $type;
}

public function transfer_retrive()
{
    $this->db->select('*');
    $q = $this->db->get('transfer');
    $type = $q->result();
    return $type;
}
public function transfer_retrive_detail($id)
{
    $this->db->select('*');
    $this->db->where('transfer_code',$id);
    $q = $this->db->get('transfer_item');
    $type = $q->result();
    return $type;
}

public function imgassetcode_model($id)
{
    $this->db->select('*');
    $this->db->where('ass_code',$id);
    $q = $this->db->get('ass_img');
    $type = $q->result();
    return $type;
}

public function depreciation_model($id)
{
    $this->db->select('*');
    $this->db->where('status',1);
    $this->db->where('fa_assdate <=',"$id");
    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}
public function retrivedepreciation()
{
    $this->db->select('*');
    $q = $this->db->get('depreciation');
    $type = $q->result();
    return $type;
}

public function retrivedepreciation_detail($id)
{
    $this->db->select('*');
    $this->db->where('de_code',$id);
    $q = $this->db->get('depreciation_item');
    $type = $q->result();
    return $type;
}


public function depreciationdel($id)
{
    $this->db->select('*');
    $this->db->where('de_code',$id);
    $q = $this->db->get('depreciation');
    $type = $q->result();
    return $type;
}

public function transfer_print_model($id)
{
    $this->db->select('*');
    $this->db->where('transfer_code',$id);
    $q = $this->db->get('transfer');
    $type = $q->result();
    return $type;
}

public function print_asset($id)
{
    $this->db->select('*');
    $this->db->where('fa_assetcode',$id);
    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}

public function loadwgl($id)
{
    $this->db->select('*');
    $this->db->where('fa_assetcode',$id);
    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}

public function retrive_gl()
{
    $this->db->select('*');
    $q = $this->db->get('fa_writeoff');
    $type = $q->result();
    return $type;
}

public function retrive_glitem($id)
{
    $this->db->select('*');
    $this->db->where('de_code',$id);
    $q = $this->db->get('fa_writeoffitem');
    $type = $q->result();
    return $type;
}

public function model_addassetproject($id)
{
    $this->db->select('*');
    $this->db->where('fa_projectid',$id);
    $this->db->where('fa_status !=',"3");
    $this->db->order_by("fa_assetcode", "asc");
    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}
public function model_addassetde($id)
{
    $this->db->select('*');
    $this->db->where('fa_departmentid',$id);
    $this->db->where('fa_status !=',"3");
    $this->db->order_by("fa_assetcode", "asc");
    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}

public function count_model()
{
    $this->db->select('*');
    $q = $this->db->get('count_h');
    $type = $q->result();
    return $type;
}

public function count_modeld($id)
{
    $this->db->select('*');
    $this->db->where('cod_code',$id);
    $q = $this->db->get('count_d');
    $type = $q->result();
    return $type;
}
public function depreciation_model2($id)
{   
    $this->db->select('*');
    // $this->db->select_sum('fa_amount');
    $this->db->where('status',1);
    $this->db->where('fa_assdate <=',"$id");
    $q = $this->db->get('asset');
    $type = $q->result();
    return $type;
}

    public function getproject_user($username,$id)
        {
            $this->db->select('*');
            $this->db->from('project');
            $this->db->join('project_ic','project_ic.project_id = project.project_id');
            $this->db->join('member','member.m_id = project_ic.proj_user');
            $this->db->where('proj_user',$username);
            $this->db->where('project_ic.project_status',"Y");
            $this->db->where('project.project_status',"normal");
            $this->db->order_by('project.project_id','desc');
            $query = $this->db->get();
            $res = $query->result();
            return $res;
        }
}
