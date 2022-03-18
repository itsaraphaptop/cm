<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setup_wh extends CI_Controller {


public function savetype()
{
  $session_data = $this->session->userdata('sessed_in');

  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $this->load->helper('date');
  $data = array(
    'project_id' => $this->input->post('projectid'),
    'type_code' => $this->input->post('whcode'),
    'type_name' => $this->input->post('whname'),
    'compcode'=> $compcode,
    'adduser'=> $username,
    'add_dt'=> date('Y-m-d H:i:s',now()),
    );
  if($this->db->insert('ic_typearea',$data))
  {
    // redirect('setup_wh/setup_type_new/'.$this->input->post('projectid'));
    redirect('index.php/inventory_area/pvtarea/'.$this->input->post('projectid'));
  }else{
    return false;
  }
}
public function edittype()
{
    $session_data = $this->session->userdata('sessed_in');

  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $this->load->helper('date');
  $data = array(
    'type_code' => $this->input->post('whcodee'),
    'type_name' => $this->input->post('whnamee'),
    'compcode'=> $compcode,
    'edituser'=> $username,
    'edit_dt'=> date('Y-m-d H:i:s',now()),
    );
  $this->db->where('typearea_id',$this->input->post('id'));
  if($this->db->update('ic_typearea',$data))
  {
    redirect('setup_wh/setup_type_new/'.$this->input->post('projectidewhe'));
  }else{
    return false;
  }

  
}
public function deltype()
{
  $id = $this->uri->segment(3);
  $projid = $this->uri->segment(4);
  if($this->db->delete('ic_typearea',array('typearea_id'=> $id)))
  {
    redirect('setup_wh/setup_type_new/'.$projid);
  }
}

public function savewh()
{
  $session_data = $this->session->userdata('sessed_in');

  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $this->load->helper('date');
  $this->db->select('*');
  $this->db->where('project_id',$this->input->post('projectid'));
  $nums = $this->db->get('ic_proj_warehouse')->num_rows();
  $x1= $nums+1;
        if ($x1 <= 9) {
					$whnums = "00" . $x1;
				} elseif ($x1 <= 99) {
					$whnums ="0" . $x1;
				}
  $data = array(
    'project_id' => $this->input->post('projectid'),
    'whcode' => $whnums,
    'whname' => $this->input->post('whname'),
    'jobcode' => $this->input->post('whjob'),
    'compcode'=> $compcode,
    'adduser'=> $username,
    'add_dt'=> date('Y-m-d H:i:s',now()),
    );
  if($this->db->insert('ic_proj_warehouse',$data))
  {
    redirect('setup_wh/setup_warehouse_new/'.$this->input->post('projectid')."/".$this->input->post('projectcode'));
    // redirect('setup_wh/setup_type_new/'.$this->input->post('projectid'));
  }else{
    return false;
  }

  
}
public function savewh_nv()
{
  $session_data = $this->session->userdata('sessed_in');

  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $this->load->helper('date');
  $this->db->select('*');
  $this->db->where('project_id',$this->input->post('projectid'));
  $nums = $this->db->get('ic_proj_warehouse')->num_rows();
  $x1= $nums+1;
        if ($x1 <= 9) {
					$whnums = "00" . $x1;
				} elseif ($x1 <= 99) {
					$whnums ="0" . $x1;
				}
  $data = array(
    'project_id' => $this->input->post('projectid'),
    'whcode' => $whnums,
    'whname' => $this->input->post('whname'),
    'jobcode' => $this->input->post('whjob'),
    'compcode'=> $compcode,
    'adduser'=> $username,
    'add_dt'=> date('Y-m-d H:i:s',now()),
    );
  if($this->db->insert('ic_proj_warehouse',$data))
  {
    redirect('datastore/setupwarehouse/'.$this->input->post('projectid'));
    // redirect('setup_wh/setup_type_new/'.$this->input->post('projectid'));
  }else{
    return false;
  }

  
}
public function editwh()
{
    $session_data = $this->session->userdata('sessed_in');

  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $this->load->helper('date');
  $data = array(
    'whcode' => $this->input->post('whcodee'),
    'whname' => $this->input->post('whnamee'),
    'jobcode' => $this->input->post('whjobe'),
    'compcode'=> $compcode,
    'edituser'=> $username,
    'edit_dt'=> date('Y-m-d H:i:s',now()),
    );
  $this->db->where('id',$this->input->post('id'));
  if($this->db->update('ic_proj_warehouse',$data))
  {
    redirect('setup_wh/setup_warehouse_new/'.$this->input->post('projectidewhe'));
  }else{
    return false;
  }

  
}
public function editwh_nv()
{
    $session_data = $this->session->userdata('sessed_in');

  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $this->load->helper('date');
  $data = array(
    'whcode' => $this->input->post('code'),
    'whname' => $this->input->post('whname'),
    'jobcode' => $this->input->post('whjob'),
    'compcode'=> $compcode,
    'edituser'=> $username,
    'edit_dt'=> date('Y-m-d H:i:s',now()),
    );
  $this->db->where('id',$this->input->post('id'));
  if($this->db->update('ic_proj_warehouse',$data))
  {
    // redirect('setup_wh/setup_warehouse_new/'.$this->input->post('projectidewhe'));
    redirect('setup_wh/setup_warehouse_new/'.$this->input->post('projectidewhe'));
  }else{
    return false;
  }

  
}
public function delwh()
{
  $id = $this->uri->segment(3);
  $projid = $this->uri->segment(4);
  $projcode = $this->uri->segment(5);
  if($this->db->delete('ic_proj_warehouse',array('id'=> $id)))
  {
    redirect('setup_wh/setup_warehouse_new/'.$projid.'/'.$projcode);
  }
}
public function InsertDataWareHouse(){
  $session_data = $this->session->userdata('sessed_in');

  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $add = $this->input->post();


for ($i=0; $i < count($add['idi']); $i++) {
      $data = array(
       'itemno'=>$add['idi'][$i],
       'whcode' => $add['codewhi'][$i],
       'whname' => $add['whnamei'][$i],
       'jobcode' => $add['systemcodei'][$i],
       'compcode'=> $compcode,
       'adduser'=> $username,
       'project_id'=>$add['pjii'],
       'add_dt'=> $add['dtnow'],
    );

    $this->db->insert('ic_proj_warehouse',$data);
redirect('setup_wh/setup_warehouse/48');

      }
}

public function setup_warehouse()
{
  $this->load->model('datastore_m');
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $data['name'] = $session_data['m_name'];
  $compcode = $session_data['compcode'];
  $data['depid'] = $session_data['m_depid'];
  $data['dep'] = $session_data['m_dep'];
  $datata['projid'] = $session_data['projectid'];
  $projectid = $session_data['projectid'];
  $data['project'] = $session_data['m_project'];
  $data['imgu'] = $session_data['img'];
  $data['pj'] = $this->uri->segment(3);
  $pj =   $data['pj'] ;
  if ($username=="") {
    redirect('/');
  }else {
    $a = $this->uri->segment(3);
   //print "<script>alert($data[pj])</script>";
    $data['getproj'] = $this->datastore_m->getproject();
    $data['resmem'] = $this->datastore_m->getmember();
    $data['getunit'] = $this->datastore_m->getunit();
    //$data['getdep'] = $this->datastore_m->department();
     $data['getwhdata'] = $this->datastore_m->get_whdata($a); // ดึงดาต้า wh
    $this->load->view('navtail/base_angular/header_v',$data,$a);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('datastore/inventory/setup_warehouse_v');
    $this->load->view('navtail/base_angular/base_js_v',$data);
    $this->load->view('navtail/base_master/footer_v');
  }
}
public function setup_warehouse_new()
{
  $this->load->model('datastore_m');
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $data['name'] = $session_data['m_name'];
  $compcode = $session_data['compcode'];
  $data['depid'] = $session_data['m_depid'];
  $data['dep'] = $session_data['m_dep'];
  $datata['projid'] = $session_data['projectid'];
  $projectid = $session_data['projectid'];
  $data['project'] = $session_data['m_project'];
  $data['imgu'] = $session_data['img'];
  $data['pj'] = $this->uri->segment(3);
  $data['code'] = $this->uri->segment(4);
  $pj =   $data['pj'] ;
  if ($username=="") {
    redirect('/');
  }else {
    $a = $this->uri->segment(3);
    $data['code'] = $this->uri->segment(4);
   //print "<script>alert($data[pj])</script>";
    $data['getproj'] = $this->datastore_m->getproject();
    $data['resmem'] = $this->datastore_m->getmember();
    $data['getunit'] = $this->datastore_m->getunit();
    //$data['getdep'] = $this->datastore_m->department();
     $data['getwhdata'] = $this->datastore_m->get_whdata($a); // ดึงดาต้า wh
    $data['system'] = $this->datastore_m->get_project_item($data['code'],$compcode);
    $this->load->view('navtail/base_master/header_v',$data,$a);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_master_v');
    $this->load->view('datastore/inventory/setup_warehouse');
    // $this->load->view('navtail/base_angular/base_js_v',$data);
    $this->load->view('navtail/base_master/footer_v');
  }
}
public function setup_type_new()
{
  $this->load->model('datastore_m');
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $data['name'] = $session_data['m_name'];
  $compcode = $session_data['compcode'];
  $data['depid'] = $session_data['m_depid'];
  $data['dep'] = $session_data['m_dep'];
  $datata['projid'] = $session_data['projectid'];
  $projectid = $session_data['projectid'];
  $data['project'] = $session_data['m_project'];
  $data['imgu'] = $session_data['img'];
  $data['pj'] = $this->uri->segment(3);
  $pj =   $data['pj'] ;
  if ($username=="") {
    redirect('/');
  }else {
    $a = $this->uri->segment(3);
   //print "<script>alert($data[pj])</script>";
    $data['res'] = $this->datastore_m->get_ictypearea($a);
    $this->load->view('navtail/base_angular/header_v',$data);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_master_v');
    $this->load->view('datastore/inventory/setup_type_v');
    $this->load->view('navtail/base_angular/base_js_v',$data);
    $this->load->view('navtail/base_master/footer_v');
  }
}
 public function loadwarehouse()
 {
  $this->load->model('datastore_m');
  $id = $this->uri->segment(3);
  $res = $this->datastore_m->getproject_proj($id);
  foreach ($res as $key => $value) {
    $data['projid'] = $value->project_id;
    $data['projname'] = $value->project_name;
  }
  $this->load->view('datastore/inventory/setup_warehouse_n_v',$data);
 }

public function EditDataWH($whid){
  $session_data = $this->session->userdata('sessed_in');
  $compcode = $session_data['compcode'];
  $username = $session_data['username'];
  $add = $this->input->post();
$rep = $this->uri->segment(4);
      $data = array(

       'whcode' => $add['codewh'],
       'whname' => $add['whname'],
       'jobcode' => $add['systemcode'],
       'compcode'=> $compcode,
       'edituser'=> $username,
       'edit_dt'=> $add['eddtnow'],
    );
    $this->db->where('id',$whid);
    $this->db->update('ic_proj_warehouse',$data);
redirect('setup_wh/setup_warehouse/'.$rep);


}
public function DeleteDataWh($id){


   $rep = $this->uri->segment(4);
  $this->db->delete('ic_proj_warehouse',
  array(  'id' => $id));
      redirect('setup_wh/setup_warehouse/'.$rep);
}





}


?>
