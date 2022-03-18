<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inventory_area extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
						$this->load->model('area_model');
        }

        public function area(){
        	$session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
             $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
          	$da['imgu'] = $session_data['img'];
          	$da['compcode'] = $session_data['compcode'];
          	$da['compimg'] = $this->datastore_m->companyimg();
						if ($username=="") {
							redirect('/');
						}
						$userid = $session_data['m_id'];
						$projectid = $session_data['projectid'];
						$res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
						$this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_master_v');
            $this->load->view('datastore/inventory/open_projectarea_v',$res);
            $this->load->view('base/footer_v');
        }

         public function pvtarea(){

         
        	$session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
             
             $da['name'] = $session_data['m_name'];
			       $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
			       $da['project'] = $session_data['m_project'];
          	$da['imgu'] = $session_data['img'];
          	$da['compcode'] = $session_data['compcode'];
          	$da['compimg'] = $this->datastore_m->companyimg();
						if ($username=="") {
							redirect('/');
						}
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
            $project_id = $this->uri->segment(3);
            $res['pid'] = $this->uri->segment(3);
            $res['getproj'] = $this->area_model->getproject_user1($project_id);
            $res['getproj1'] = $this->area_model->getproject_user2($project_id);

	   
						$this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
      			$this->load->view('navtail/navtail_master_v');
      			$this->load->view('datastore/inventory/areapv',$res);
						$this->load->view('base/footer_v');
        }



 public function inspj(){

$session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
             $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compcode'] = $session_data['compcode'];
            $da['compimg'] = $this->datastore_m->companyimg();
            if ($username=="") {
              redirect('/');
            }
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
             $project_id = $this->input->post('project_id');

 
         $ins = array(
            'project_id'=>$this->input->post('project_id'),
            'area_code'=>$this->input->post('area_code'),
            'area_name'=>$this->input->post('area_name'),
            'taye_code'=>$this->input->post('taye_code'),
            'position1'=>$this->input->post('position1'),
            'position2'=>$this->input->post('position2'),    
            'position3'=>$this->input->post('position3'),    
            'position4'=>$this->input->post('position4'),    
            'position5'=>$this->input->post('position5'),            
            'position6'=>$this->input->post('position6'),    
            'position7'=>$this->input->post('position7'),    
            'position8'=>$this->input->post('position8'),    
            'position9'=>$this->input->post('position9'),    
            'position10'=>$this->input->post('position10'),    
      
            'useradd'=>$username,
            'createdate'=>date('Y-m-d'),
            'compcode'=>$da['compcode']
          );



           $this->db->insert('ic_proj_area',$ins);
 redirect('inventory_area/pvtarea/'.$project_id);
}



public function udpj(){
  $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
             $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compcode'] = $session_data['compcode'];
            $da['compimg'] = $this->datastore_m->companyimg();
            if ($username=="") {
              redirect('/');
            }
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
          $project_id = $this->input->post('project_id');

    $add1 = $this->input->post();

         $ins2 = array(
          'project_id' => $add1['project_id'],
          'area_code' => $add1['area_code'],
          'area_name' => $add1['area_name'],
          'taye_code' => $add1['taye_code'],
          'position1' => $add1['position1'],
          'position2' => $add1['position2'], 
          'position3' => $add1['position3'], 
          'position4' => $add1['position4'], 
          'position5' => $add1['position5'], 
          'position6' => $add1['position6'], 
          'position7' => $add1['position7'], 
          'position8' => $add1['position8'], 
          'position9' => $add1['position9'], 
          'position10' => $add1['position10'],  
            'useredit'=>$username, 
            'editdate'=>date('Y-m-d')
  );
            $this->load->model('area_model');
            $this->area_model->ud1($add1['area_code'],$ins2);
        
  redirect('inventory_area/pvtarea/'.$project_id);

}


  public function depreciation(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
     $da['name'] = $session_data['m_name'];
    $data['depid'] = $session_data['m_depid'];
    $da['dep'] = $session_data['m_dep'];
    $data['projid'] = $session_data['projectid'];
    $da['project'] = $session_data['m_project'];
    $da['imgu'] = $session_data['img'];
    $da['compcode'] = $session_data['compcode'];
    $da['compimg'] = $this->datastore_m->companyimg();
    if ($username=="") {
      redirect('/');
    }
    $userid = $session_data['m_id'];
    $projectid = $session_data['projectid'];
    $project_id = $this->input->post('project_id');
    $da['depre'] = $this->datastore_m->depreciation();

    $this->load->view('navtail/base_master/header_v',$da);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_master_v');
    $this->load->view('datastore/inventory/depreciation');    
    $this->load->view('base/footer_v');
  }

  public function open_depre(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $da['name'] = $session_data['m_name'];
    $data['depid'] = $session_data['m_depid'];
    $da['dep'] = $session_data['m_dep'];
    $data['projid'] = $session_data['projectid'];
    $da['project'] = $session_data['m_project'];
    $da['imgu'] = $session_data['img'];
    $da['compcode'] = $session_data['compcode'];
    $da['compimg'] = $this->datastore_m->companyimg();
    if ($username=="") {
      redirect('/');
    }
    $userid = $session_data['m_id'];
    $projectid = $session_data['projectid'];
    $project_id = $this->input->post('project_id');
    $da['id'] = $this->uri->segment(3);
    $da['depre_h'] = $this->datastore_m->depre_header($da['id']);
    $da['depre_det'] = $this->datastore_m->depre_detail($da['id']);

    $this->load->view('navtail/base_master/header_v',$da);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_master_v');
    $this->load->view('datastore/inventory/open_depre');    
    $this->load->view('base/footer_v');
  }


  public function new_depre(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $da['name'] = $session_data['m_name'];
    $data['depid'] = $session_data['m_depid'];
    $da['dep'] = $session_data['m_dep'];
    $data['projid'] = $session_data['projectid'];
    $da['project'] = $session_data['m_project'];
    $da['imgu'] = $session_data['img'];
    $da['compcode'] = $session_data['compcode'];
    $da['compimg'] = $this->datastore_m->companyimg();
    if ($username=="") {
      redirect('/');
    }
    $userid = $session_data['m_id'];
    $projectid = $session_data['projectid'];
    $project_id = $this->input->post('project_id');
    
    $this->load->view('navtail/base_master/header_v',$da);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_master_v');
    $this->load->view('datastore/inventory/new_depre');    
    $this->load->view('base/footer_v');
  }

public function assettype(){

      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $data['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $data['project'] = $session_data['m_project'];
      $data['imgu'] = $session_data['img'];
      $data['compcode'] = $session_data['compcode'];
      $data['compimg'] = $this->datastore_m->companyimg();
      if ($username=="") {
        redirect('/');
      }
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->asset_type();
      $userid = $session_data['m_id'];
      $projectid = $session_data['projectid'];
       $project_id = $this->input->post('project_id');
      $this->load->view('navtail/base_master/header_v', $data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_master_v');
      $this->load->view('datastore/inventory/assettype',$data);    
      $this->load->view('base/footer_v');
}

public function assetexpensetype(){
  $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
             $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compcode'] = $session_data['compcode'];
            $da['compimg'] = $this->datastore_m->companyimg();
            if ($username=="") {
              redirect('/');
            }
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
             $project_id = $this->input->post('project_id');
             $this->load->model('asset_m');
            $da['res'] = $this->asset_m->retrieve_depremethod();
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_master_v');
            $this->load->view('datastore/inventory/assetexpensetype');    
            $this->load->view('base/footer_v');
}

public function assetexpensetype_edit(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $data['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $data['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $data['project'] = $session_data['m_project'];
      $data['imgu'] = $session_data['img'];
      $data['compcode'] = $session_data['compcode'];
      $data['compimg'] = $this->datastore_m->companyimg();
      if ($username=="") {
      redirect('/');
      }
      $userid = $session_data['m_id'];
      $projectid = $session_data['projectid'];
      $project_id = $this->input->post('project_id');
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->retrieve_view($id);

      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_master_v');
      $this->load->view('datastore/inventory/assetexpensetype_edit');
      $this->load->view('base/footer_v');
}

public function assetexpensetype_v(){

      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $da['imgu'] = $session_data['img'];
      $da['compcode'] = $session_data['compcode'];
      $da['compimg'] = $this->datastore_m->companyimg();
      if ($username=="") {
      redirect('/');
      }
      $userid = $session_data['m_id'];
      $projectid = $session_data['projectid'];
      $project_id = $this->input->post('project_id');
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->retrieve_depremethod();
           
      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_master_v');
      $this->load->view('datastore/inventory/retrieve_depremethod',$data);   
      $this->load->view('base/footer_v');
  
}

public function assetlocation(){
  $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
             $da['name'] = $session_data['m_name'];
      $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compcode'] = $session_data['compcode'];
            $da['compimg'] = $this->datastore_m->companyimg();
            if ($username=="") {
              redirect('/');
            }
            $this->load->model('asset_m');
            $data['res'] = $this->asset_m->ass_location();
            // $data['res1'] = $this->asset_m->ass_location2();
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
             $project_id = $this->input->post('project_id');
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_master_v');
            $this->load->view('datastore/inventory/assetlocation',$data);    
            $this->load->view('base/footer_v');
}

 public function del() {
     
    $id = $this->uri->segment(3);
    $project_id = $this->uri->segment(4);
    $this->db->delete('ic_proj_area', array('id' => $id));
      redirect('inventory_area/pvtarea/'.$project_id);
  }


   }