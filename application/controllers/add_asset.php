<style type="text/css" media="screen">
.sidebar-category{
  padding-top: 50px;
}  
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_asset extends CI_Controller {

    public function __construct() {
            parent::__construct();
            $this->load->Model('auth_m');

            
    }

    public function main_index()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['compcode'] = $session_data['compcode'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $this->load->model('asset_m');
      // $res['getproj'] = $this->asset_m->getproject_user($userid,$projectid);
      $this->load->view('navtail/base_master/header_v',$res);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_fa_v');
      // $this->load->view('asset/main_index');
      $this->load->view('base/footer_v');
    }
    public function index()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['compcode'] = $session_data['compcode'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $this->load->model('asset_m');
      // $res['getproj'] = $this->asset_m->getproject_user($userid,$projectid);
      $this->load->view('navtail/base_master/header_v',$res);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_fa_v');
      $this->load->view('asset/add_asset_v');
      $this->load->view('base/footer_v');

    }

    public function add_assets()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      if ($username=="") {
        redirect('/');
      }
      $pro = $this->uri->segment(3);
      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['compcode'] = $session_data['compcode'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $res['pro'] = $pro;
      $this->load->model('asset_m');
      $this->load->view('navtail/base_master/header_v',$res);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_fa_v');
      $this->load->view('asset/add_asset_v');
      $this->load->view('base/footer_v');

    }

    public function load_detail()
    {
      $assetcode = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->load_detail($assetcode);
      $data['resi'] = $this->asset_m->load_detail_img($assetcode);
      $data['resbig'] = $this->asset_m->load_detail_imgBIG($assetcode);
       $data['type_pj'] = $this->asset_m->type_pj();
      $this->load->view('asset/load_detail_v',$data);
    }

    public function load_detail1()
    {
      $assetcode = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->load_detail($assetcode);
      $data['resi'] = $this->asset_m->load_detail_img($assetcode);
       $data['resbig'] = $this->asset_m->load_detail_imgBIG($assetcode);

      $this->load->view('asset/load_detail_v1',$data);
    }

    public function retrieve_depremethod(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->retrieve_depremethod();
      $this->load->view('datastore/inventory/retrieve_depremethod',$data);
    }

     public function model_addasset(){
      // $pro = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addassets();
      $this->load->view('asset/model_addasset',$data);
    }

     public function model_addre(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addasset();
      $this->load->view('asset/model_addre',$data);
    }

     public function model_copy(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addasset();
      $this->load->view('asset/modal_assetcopy',$data);
    }

     public function model_detailasset(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->detailasset($id);
      $this->load->view('asset/asset_detail',$data);
    }

    public function transfer_retrive(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->transfer_retrive();
      $this->load->view('asset/transfer_retrive',$data);
    }
    public function transfer_retrive_detail(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->transfer_retrive_detail($id);
      $this->load->view('asset/transfer_retrive_detail',$data);
    }

     public function ass_img(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->imgassetcode_model($id);
      $this->load->view('asset/imgassetcode',$data);
    }

    public function depreciation(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->depreciation_model($id);
      $this->load->view('asset/depreciation',$data);
    }

      public function retrivedepreciation(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->retrivedepreciation();
      $this->load->view('asset/model_retrivedepreciation',$data);
    }

     public function retrivedepreciation_detail(){
      $this->load->model('asset_m');
      $id = $this->uri->segment(3);
      $data['res'] = $this->asset_m->retrivedepreciation_detail($id);
      $this->load->view('asset/detail_retrivedepreciation',$data);
    }


    public function maintenance()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $this->load->view('navtail/base_master/header_v',$res);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_fa_v');
      $this->load->view('asset/maintenance');
      $this->load->view('base/footer_v');

    }

      public function model_maintenance(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addasset();
      $this->load->view('asset/model_maintenance',$data);
    }

  public function save_maintenance(){
      $this->load->model('asset_m');
      $data['id'] = $this->uri->segment(3);
      $data['name'] = $this->uri->segment(4);
      $data['res'] = $this->asset_m->model_addasset();
      $this->load->view('asset/save_maintenance',$data);
    }

     public function show_maintenance(){
      $this->load->model('asset_m');
      $data['id'] = $this->uri->segment(3);
      $data['res'] = $this->asset_m->model_addasset();
      $this->load->view('asset/show_maintenance',$data);
    }

     public function transfer_print(){
      $this->load->model('asset_m');
      $id = $this->uri->segment(3);
      $data['res'] = $this->asset_m->transfer_print_model($id);
      $this->load->view('asset/transfer_print',$data);
    }
  public function ass_print(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->print_asset($id);
      $this->load->view('asset/print_asset',$data);
    }

    public function write_off(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
    $this->load->view('navtail/base_master/header_v',$res);
    $this->load->view('navtail/base_master/tail_v');
    $this->load->view('navtail/navtail_fa_v');
    $this->load->view('asset/write_off');
    $this->load->view('base/footer_v');
   }
   public function reportall(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];

       $this->load->model('asset_m');
      $data['pj'] = $this->asset_m->type_pj();
      $data['dm'] = $this->asset_m->depart();
   $this->load->view('navtail/base_master/header_v',$res);
   $this->load->view('navtail/base_master/tail_v');
   $this->load->view('navtail/navtail_fa_v');
   $this->load->view('asset/glwrite_off/report_all',$data);
   $this->load->view('base/footer_v');
   }
   public function report_asset(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];

       $this->load->model('asset_m');
      $data['pj'] = $this->asset_m->type_pj();
      $data['dm'] = $this->asset_m->depart();
   $this->load->view('navtail/base_master/header_v',$res);
   $this->load->view('navtail/base_master/tail_v');
   $this->load->view('navtail/navtail_fa_v');
   $this->load->view('asset/report_asset',$data);
   $this->load->view('base/footer_v');
   }

     public function model_fixasset(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addasset();
      $this->load->view('asset/model_fixasset',$data);
    }

     public function loadwgl(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['id'] = $this->uri->segment(3);
      $data['res'] = $this->asset_m->loadwgl($id);
      $this->load->view('asset/glwrite_off/load_gl',$data);
    }

public function report_assetpj(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/glwrite_off/reporproject',$data);
       $this->load->view('base/footer_v');
}

public function report_assetde(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/glwrite_off/reportdepa',$data);
       $this->load->view('base/footer_v');
}

     public function retrive_gl(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->retrive_gl();
      $this->load->view('asset/glwrite_off/retrive_gl',$data);
    }

      public function retrive_glitem(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->retrive_glitem($id);
      $this->load->view('asset/glwrite_off/retrive_glitem',$data);
    }

      public function maintenance_print(){
      $this->load->model('asset_m');
      $data['id'] = $this->uri->segment(3);
      $this->load->view('asset/maintenance_print',$data);
    }

    public function count(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/count_asset',$data);
       $this->load->view('base/footer_v');
}

     public function count_asset(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addassetproject($id);
      $this->load->view('asset/model_count_asset',$data);
    }

     public function count_assetde(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addassetde($id);
      $this->load->view('asset/model_count_assetdepart',$data);
    }

      public function count_assetall(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addassetproject($id);
      $this->load->view('asset/table_asset',$data);
    }

     public function count_assetdeall(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->model_addassetde($id);
      $this->load->view('asset/table_assetdepart',$data);
    }

      public function count_re(){
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->count_model();
      $this->load->view('asset/count_re',$data);
    }

      public function count_red(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->count_modeld($id);
      $this->load->view('asset/count_red',$data);
    }

     public function fa_report(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];

       $this->load->model('asset_m');
      $data['pj'] = $this->asset_m->type_pj();
      $data['dm'] = $this->asset_m->depart();
   $this->load->view('navtail/base_master/header_v',$res);
   $this->load->view('navtail/base_master/tail_v');
   $this->load->view('navtail/navtail_fa_v');
   $this->load->view('asset/report/fa_report',$data);
   $this->load->view('base/footer_v');
   }

        public function fa_att(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];

       $this->load->model('asset_m');
      $data['pj'] = $this->asset_m->type_pj();
      $data['dm'] = $this->asset_m->depart();
   $this->load->view('navtail/base_master/header_v',$res);
   $this->load->view('navtail/base_master/tail_v');
   $this->load->view('navtail/navtail_fa_v');
   $this->load->view('asset/report/fa_att',$data);
   $this->load->view('base/footer_v');
   }

   public function report_asset_tf(){
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];

       $this->load->model('asset_m');
      $data['pj'] = $this->asset_m->type_pj();
      $data['dm'] = $this->asset_m->depart();
   $this->load->view('navtail/base_master/header_v',$res);
   $this->load->view('navtail/base_master/tail_v');
   $this->load->view('navtail/navtail_fa_v');
   $this->load->view('asset/report_tranfer',$data);
   $this->load->view('base/footer_v');
   }

   public function report_asset_tfpj(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report/reporttf_pj',$data);
       $this->load->view('base/footer_v');
}

public function report_asset_tfde(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report/reporttf_de',$data);
       $this->load->view('base/footer_v');
}

public function fatf_report(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report/fatf_report',$data);
       $this->load->view('base/footer_v');
}

public function fafa_report(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report/fafa_report',$data);
       $this->load->view('base/footer_v');
}

public function wfassdate(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);

       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report_woff/wfassdate',$data);
       $this->load->view('base/footer_v');
}

public function wof_asspd(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->model('asset_m');
      $data['pj'] = $this->asset_m->type_pj();
      $data['dm'] = $this->asset_m->depart();
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report_woff/wof_asspd',$data);
       $this->load->view('base/footer_v');
}


public function report_woffassetpj(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report_woff/report_woffassetpj',$data);
       $this->load->view('base/footer_v');
}

public function report_woffassetde(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report_woff/report_woffassetde',$data);
       $this->load->view('base/footer_v');
}

public function selectmonth(){
  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $data['id'] = $this->uri->segment(3);
       $this->load->view('navtail/base_master/header_v',$res);
       $this->load->view('navtail/base_master/tail_v');
       $this->load->view('navtail/navtail_fa_v');
       $this->load->view('asset/report_woff/selectmonth',$data);
       $this->load->view('base/footer_v');
}

public function depreciation_gl(){
      $id = $this->uri->segment(3);
      $this->load->model('asset_m');
      $data['res'] = $this->asset_m->depreciation_model2($id);
      $this->load->view('asset/depreciation_gl',$data);
    }
    public function depreciate_view()
        {
          
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->mat_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_fa_v');
          $this->load->view('office/pr/report_summary/depreciate_view',$ser);
          $this->load->view('base/footer_v');
        }
         public function depreciate_r(){
          //input
          $mat_year =  $this->input->get('year');
          //query
          $where_year = "{$mat_year}";
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          //if
          if($mat_year == "")$where_year =date("Y");   
          //url
          $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $depreciate_file = "depreciate_report2.mrt";
          //getdata
          $year ="&year={$where_year}";
          $get_session ="&get_session={$sess_name}";  
          //send data
          $send= "{$urls}{$depreciate_file}{$year}{$get_session}";
          $base_url = $this->config->item("url_report");
          redirect($base_url.$send);         
        }
        public function asset_all_view(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->asset_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_fa_v');
          $this->load->view('office/inventory/report/assetall_view',$ser);
          $this->load->view('base/footer_v');
        }
      public function asset_all_r(){
        $get1 = $this->input->get('status');
        $get2 = $this->input->get('asset_name');
        $get3 = $this->input->get('fa_atype');
        $get4 = $this->input->get('lo_pro');
        $get5 = $this->input->get('lo_dep');
        $get6 = $this->input->get('use_name');
        $data = $this->session->userdata('sessed_in');
        $sess_name = $data['m_name']; 
        $get_session ="&get_session={$sess_name}"; 
        $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
        $file = "asset_all.mrt";
        $send= "{$urls}{$file}&where1={$get1}&where2={$get2}&where3={$get3}&where4={$get4}&where5={$get5}&where6={$get6}{$get_session}";
          $base_url = $this->config->item("url_report");
          redirect($base_url.$send); 
      }

      public function repair()
      {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }


          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $this->load->model('global_m');
          $data['code_run'] = $this->global_m->gen_code('RP', 'repair', 'id');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->mat_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_fa_v');
          $this->load->view('asset/repair/index');
          $this->load->view('base/footer_v');
      }

      public function vender_modal()
      {
        $this->load->model('datastore_m');
        $data['rows'] = $this->datastore_m->verder_all();
        $this->load->view('asset/repair/modal_vender', $data);
      }

      public function asset_modal($type_asset, $id)
      {
        $this->load->model('datastore_m');
        if ($type_asset == "p") {
          $data['rows'] = $this->datastore_m->asset_project($id);
        }else{
          $data['rows'] = $this->datastore_m->asset_department($id);
        }
        $this->load->view('asset/repair/modal_asset', $data);
      }

      public function project_modal()
      {
        $this->load->model('datastore_m');
        $data['rows'] = $this->datastore_m->project_all();
        $this->load->view('asset/repair/modal_project', $data);
      }      

      public function department_modal()
      {
        $this->load->model('datastore_m');
        $data['rows'] = $this->datastore_m->department_all();
        $this->load->view('asset/repair/modal_department', $data);
      }    

      public function member_modal()
      {
        $this->load->model('datastore_m');
        $data['rows'] = $this->datastore_m->member_all();
        $this->load->view('asset/repair/modal_member', $data);
      }

      public function add_repair()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];

        $input = $this->input->post();

        // var_dump($input['vender_id']);
        $arr_head = array(
          'vender_id'       => $input['vender_id'],
          'vender_name'     => $input['vender_name'],
          'code_usernotify' => $input['code_usernotify'],
          'user_notify'     => $input['user_notify'],
          'num'             => $input['num'],
          'date_doc'        => $input['date_doc'],
          'note'            => $input['note'],
          'user_add'        => $data['name'],
          'time_add'        => date("Y-m-d H:i:s"),
          'approve'         => 'wait',
          'project_id'      => $input['project_id'],
          'project_name'    => $input['project_name'],
          'department_id'   => $input['department_id'],
          'department_name' => $input['department_name'],
          'status_ative'    => 'ative',
          'code_doc'        => $input['code_doc'],
          'type'            => $input['type']
        );

        $insert_head = $this->db->insert('repair', $arr_head);
        $insertId   = $this->db->insert_id();
        
        if ($insert_head) {
          foreach ($input['fa_code'] as $key => $value) {
            $array_detail[] = array(
              'fa_code'       => $input['fa_code'][$key],
              'ref_reair'     => $insertId,
              'fa_name'       => $input['fa_name'][$key],
              'repair_name'   => $input['repair_name'][$key],
              'problem'       => $input['problem'][$key],
              'status_repair' => $input['status_repair'][$key],
              'another'       => $input['another'][$key],
              'status_ative'  => 'ative',
              'date_succ'     => $input['date_succ'][$key],
              'date_succ_rel' => $input['date_succ_rel'][$key],
              'code_doc'      => $input['code_doc'],
            );
          }

          $inser_detail = $this->db->insert_batch('repair_detail', $array_detail);

          $this->db->select('*');
          $this->db->where('approve_project',"Repair");
          $this->db->where('type', "FA");
          $query = $this->db->get('approve')->result();
          foreach ($query as $qq) {
    
              $aprrove = array(
                'app_pr' =>  $input['code_doc'],
                'app_project' => $qq->approve_project,
                'app_sequence' => $qq->approve_sequence,
                'app_midid' => $qq->approve_mid,
                'app_midname' => strtolower($qq->approve_mname),
                'lock' => $qq->approve_lock,
                'status' => "no",
                'type' => "C",
                'cost' => $qq->approve_cost,
                'creatuser' => $username,
                'creatudate' => date('y-m-d'),
                'compcode' => $compcode,
                );
                $this->db->insert('approve_fa',$aprrove);
         
          }

          if ($inser_detail) {
            redirect('/add_asset/repair_view');
          }else{
            echo "ไม่สามารถ Insert Detail ได้";
          }

        }else{
          echo 'ไม่สามารถ Insert head ได้';
        }
      }

      public function repair_view()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];

        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

        $data['data'] = $this->datastore_m->repair_all();
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/repair/view');
        $this->load->view('base/footer_v');
      }

      
      public function form_repair_edit($repair_id)
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];

        $this->load->model('datastore_m');
        $data['imgu']       = $this->datastore_m->changeprofile($username);
        $data['data']       = $this->datastore_m->get_repair_list($repair_id);
        $data['repair_id']  = $repair_id;
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/repair/form_repair_edit',$data);
        $this->load->view('base/footer_v');
      }

      public function edit_repair()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

        $input = $this->input->post();
        // print_r($input);
        // die();
        $array_head = array();
        $array_detail = array();
        // foreach ($input['vender_id'] as $key => $value) {
          $array_head = array(
            'vender_id'       => $input['vender_id'],
            'vender_name'     => $input['vender_name'],
            'code_usernotify' => $input['code_usernotify'],
            'user_notify'     => $input['user_notify'],
            'note'            => $input['note'],
            'project_id'      => $input['project_id'],
            'project_name'    => $input['project_name'],
            'department_id'   => $input['department_id'],
            'department_name' => $input['department_name'],
            'user_edit'       => $data['name'],
            'time_edit'       => date("Y-m-d H:i:s"),
          ); 
        // }     
        
        $this->db->where('id', $input['id']);
        $update_head = $this->db->update('repair', $array_head);   

        if ($update_head) {

            foreach ($input['fa_code_old'] as $key => $value) {
              $array_detail = array(
                'problem'       => $input['problem_old'][$key],
                'status_repair' => $input['status_repair_old'][$key],
                'another'       => $input['another_old'][$key],
                'repair_name'   => $input['repair_name_old'][$key],
                'date_succ'     => $input['date_succ_old'][$key],
                'date_succ_rel' => $input['date_succ_rel_old'][$key],
              ); 

              $this->db->where('fa_code', $input['fa_code_old'][$key]);
              $this->db->update('repair_detail', $array_detail); 
            }
          if (isset($input['fa_code'])) {
            foreach ($input['fa_code'] as $key => $value) {
              $array_detail_new[] = array(
                'fa_code'       => $input['fa_code'][$key],
                'ref_reair'     => $input['id'],
                'fa_name'       => $input['fa_name'][$key],
                'repair_name'   => $input['repair_name'][$key],
                'problem'       => $input['problem'][$key],
                'status_repair' => $input['status_repair'][$key],
                'another'       => $input['another'][$key],
                'status_ative'  => 'ative',
                'date_succ'     => $input['date_succ'][$key],
                'date_succ_rel' => $input['date_succ_rel'][$key],
                'code_doc'      => $input['code_doc'],
              );
            }
            $this->db->insert_batch('repair_detail', $array_detail_new);
          }


            redirect('add_asset/repair_view');

        }else{
          echo "error";
        }
      }

      public function save_repair_form()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);


        $input = $this->input->post();

        // echo "<pre>";
        // print_r($input);
        // die();

        $array_head = array();
        $array_detail = array();
        // foreach ($input['vender_id'] as $key => $value) {
          $array_head = array(
            'vender_id'       => $input['vender_id'],
            'vender_name'     => $input['vender_name'],
            'code_usernotify' => $input['code_usernotify'],
            'user_notify'     => $input['user_notify'],
            'note'            => $input['note'],
            'project_id'      => $input['project_id'],
            'project_name'    => $input['project_name'],
            'department_id'   => $input['department_id'],
            'department_name' => $input['department_name'],
            'status_ative'    => 'disable',
            'user_edit'       => $data['name'],
            'time_edit'       => date("Y-m-d H:i:s"),
          ); 
        // }     
        
        $this->db->where('id', $input['id']);
        $update_head = $this->db->update('repair', $array_head);  

        if ($update_head) {

            foreach ($input['status'] as $key => $value) {
              $array_detail = array(
                'problem'       => $input['problem_old'][$key],
                'status_repair' => $input['status_repair_old'][$key],
                'another'       => $input['another_old'][$key],
                'repair_name'   => $input['repair_name_old'][$key],
                'date_succ'     => $input['date_succ_old'][$key],
                'date_succ_rel' => $input['date_succ_rel_old'][$key],
                'status'        => $input['status'][$key],
              ); 

              $this->db->where('fa_code', $input['fa_code_old'][$key]);
              $this->db->update('repair_detail', $array_detail); 
            }

            foreach ($input['status'] as $key => $value) {
              $update_asset = array(
                'fa_status' => $input['status'][$key],
              );

              $this->db->where('fa_assetcode', $input['fa_code_old'][$key]);
              $this->db->update('asset', $update_asset); 
            }
            redirect('add_asset/save_repair');

        }else{
          echo "error";
        }


      }

      public function report_repair($repair_id)
      {
        $value = "repair.id = '$repair_id'";
        $where = "&where={$value}";
        $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
        $stockcard_file= "report_fa_check.mrt";

        $send= "{$urls}{$stockcard_file}{$where}";
        $base_url = $this->config->item("url_report");
        redirect($base_url.$send);
      }

      
      public function del_repair($repair_id)
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

          $data = array(
            'user_del' => $data['name'],
            'time_del' => date("Y-m-d H:i:s"),
            'status_ative' => 'disable',
          );

          $this->db->where('id', $repair_id);
          $del_head = $this->db->update('repair', $data);

          $return = array();

          if ($del_head) {

            $this->db->where('ref_reair', $repair_id);
            $del_detail = $this->db->update('repair_detail', $data);

            if ($del_detail) {
                $return['status'] = true;
                $return['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
            }else{
                $return['status'] = false;
                $return['message'] = "ไม่สามารถลบรายการได้";
            }
          }else{
            $return['status'] = false;
            $return['message'] = 'ไม่สามารถลบใบแจ้งซ่อมได้';
          }

          echo json_encode($return);
      }      

      public function del_repair_byItem($byItem_id)
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);
        
          $data = array(
            'user_del' => $data['name'],
            'time_del' => date("Y-m-d H:i:s"),
            'status_ative' => 'disable',
          );

          $return = array();

          $this->db->where('fa_code', $byItem_id);
          $update = $this->db->update('repair_detail', $data);

          if ($update) {
              $return['status'] = true;
              $return['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
          }else{
              $return['status'] = false;
              $return['message'] = "ไม่สามารถลบรายการได้";
          }

          echo json_encode($return);
      }

        public function repair_asset()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];

        $this->load->model('datastore_m');
        $data['f'] = $this->datastore_m->afa();
        $data['imgu'] = $this->datastore_m->changeprofile($username);

        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/repair/repair_asset');
        $this->load->view('base/footer_v');
      }

      public function save_repair()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);
        $data['data'] = $this->datastore_m->repair_approve();

        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/repair/view_repair');
        $this->load->view('base/footer_v');
      }

      public function noti_repair($repair_id)
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);
        $data['data'] = $this->datastore_m->get_repair_list($repair_id);
        $data['repair_id']  = $repair_id;
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/repair/form_saverepair',$data);
        $this->load->view('base/footer_v');
      }

      public function approve_fa()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['m_id'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);
    
        $data['username'] = $session_data['username'];
        $data['m_id'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/repair/approve_fa',$data);
        $this->load->view('base/footer_v');
      }

      public function calibration()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['m_id'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);
        //runcode CB
        $data['username'] = $session_data['username'];
        $data['m_id'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $this->load->Model('global_m');
        $data['cb_code'] = $this->global_m->gen_code('CB','calibration_head','id');

        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/calibration/calibration_v');
        $this->load->view('base/footer_v');        
      }

      public function member_modal_prepare()
      {
        $this->load->model('datastore_m');
        $data['rows'] = $this->datastore_m->member_all();
        $this->load->view('asset/calibration/modal_prepare', $data);
      }      

      public function member_modal_check()
      {
        $this->load->model('datastore_m');
        $data['rows'] = $this->datastore_m->member_all();
        $this->load->view('asset/calibration/modal_check', $data);
      }

      public function asset_byitem($id, $asset_id, $type)
      {
        $this->load->model('datastore_m');
        if ($type == 'p') {
          $data['rows'] = $this->datastore_m->measurement_tool_pro($id);
        }else if ($type == 'd') {
          $data['rows'] = $this->datastore_m->measurement_tool_depart($id);
        }
          $data['asset'] = $asset_id;
        $this->load->view('asset/calibration/modal_asset_byItem', $data);
      }

      public function modal_checkTr($asset_id)
      {
        $this->load->model('datastore_m');
        $data['rows'] = $this->datastore_m->member_all();
        $data['asset'] = $asset_id;
        $this->load->view('asset/calibration/modal_checkTr', $data);
      }

      public function add_calibration()
      {

        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['m_id'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

        $input = $this->input->post();
        $array_head = array();
        $array_deatail_pro = array();

        // die();
        $array_head = array(
            'cb_code'         => $input['ec_code'],
            'prepareby_name'  => $input['prepareBy_name'],
            'prepareby_code'  => $input['prepareBy_code'],
            'checkby_name'    => $input['checkBy_name'],
            'checkby_code'    => $input['checkBy_code'],
            'approve'         => 'wait',
            'status_active'   => 'active',
            'user_add'        => $data['name'],
            'time_add'        => date("Y-m-d H:i:s"),
          );

        $insert_head  = $this->db->insert('calibration_head', $array_head);
        $insertId     = $this->db->insert_id();

        if ($insert_head) {
          foreach ($input['pro_name'] as $key_p => $value_p) {
            $array_deatail_pro = array(
              'ref_cail'        => $insertId,
              'project_id'      => $input['pro_id'][$key_p],
              'name'            => $input['pro_name'][$key_p],
              'asset_id'        => $input['num_id_pro'][$key_p],
              'asset_name'      => $input['asset_pro'][$key_p],
              'band_name'       => $input['band_pro'][$key_p],
              'serail_number'   => $input['ser_no_pro'][$key_p],
              'cali_period'     => $input['cali_period_pro'][$key_p],
              'cali_date'       => $input['cali_date_pro'][$key_p],
              'next_cali_date'  => $input['next_cali_date_pro'][$key_p],
              'cali_check'      => $input['cali_check_pro'][$key_p],
              'mana_asset'      => $input['mana_asset_pro'][$key_p],
              'user_check'      => $input['user_check_pro'][$key_p],
              'user_add'        => $data['name'],
              'time_add'        => date("Y-m-d H:i:s"),
              'type'            => 'p',
              'status_active'   => 'active',
            );

            $this->db->insert('calibration_detail', $array_deatail_pro);
          }

          foreach ($input['depart_id'] as $key_d => $value_d) {     
            $array_detail_depart = array(
              'ref_cail'        => $insertId,
              'project_id'      => $input['depart_id'][$key_d],
              'name'            => $input['depart_name'][$key_d],
              'asset_id'        => $input['num_id_depart'][$key_d],
              'asset_name'      => $input['asset_depart'][$key_d],
              'band_name'       => $input['band_depart'][$key_d],
              'serail_number'   => $input['ser_no_depart'][$key_d],
              'cali_period'     => $input['cali_period_depart'][$key_d],
              'cali_date'       => $input['cali_date_depart'][$key_d],
              'next_cali_date'  => $input['next_cali_date_depart'][$key_d],
              'cali_check'      => $input['cali_check_depart'][$key_d],
              'mana_asset'      => $input['mana_asset_depart'][$key_d],
              'user_check'      => $input['user_check_depart'][$key_d],
              'user_add'        => $data['name'],
              'time_add'        => date("Y-m-d H:i:s"),
              'type'            => 'd',
              'status_active'   => 'active',
            );

            $this->db->insert('calibration_detail', $array_detail_depart);
          }

          $this->db->select('*');
          $this->db->where('approve_project',"Repair");
          $this->db->where('type', "FA");
          $query = $this->db->get('approve')->result();
          foreach ($query as $qq) {
    
              $aprrove = array(
                'app_pr' =>  $input['ec_code'],
                'app_project' => 'calibration',
                'app_sequence' => $qq->approve_sequence,
                'app_midid' => $qq->approve_mid,
                'app_midname' => strtolower($qq->approve_mname),
                'lock' => $qq->approve_lock,
                'status' => "no",
                'type' => "C",
                'cost' => $qq->approve_cost,
                'creatuser' => $username,
                'creatudate' => date('y-m-d'),
                'compcode' => $compcode,
                );
                $this->db->insert('approve_fa',$aprrove);
         
          }

          // echo "Insert Success!!!";
          redirect('add_asset/calibration_view');
        }else{
          echo "ไม่สามารถ Insert ได้";
        }


      }

      public function calibration_view()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['m_id'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

        $data['data'] = $this->datastore_m->calibration_all();
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/calibration/calibration_view');
        $this->load->view('base/footer_v');   

      }

      public function del_cali($cali_id)
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

          $data = array(
            'user_del' => $data['name'],
            'time_del' => date("Y-m-d H:i:s"),
            'status_active' => 'disable',
          );

          $this->db->where('id', $cali_id);
          $del_head = $this->db->update('calibration_head', $data);

          $return = array();

          if ($del_head) {

            $this->db->where('ref_cail', $cali_id);
            $del_detail = $this->db->update('calibration_detail', $data);

            if ($del_detail) {
                $return['status'] = true;
                $return['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
            }else{
                $return['status'] = false;
                $return['message'] = "ไม่สามารถลบรายการได้";
            }
          }else{
            $return['status'] = false;
            $return['message'] = 'ไม่สามารถลบใบแจ้งซ่อมได้';
          }

          echo json_encode($return);
      } 

      public function formedit_cali($id)
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

        $data['data'] = $this->datastore_m->calibration_byid($id);
        $data['id_bin'] = $id;
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/calibration/from_cali_edit');
        $this->load->view('base/footer_v'); 
      }

      public function edit_calibration()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

        $input = $this->input->post();
        // echo "<pre>";
        if (isset($input['status_save'])) {
          # code...
          $array_head = array(
            'prepareby_name'  => $input['prepareBy_name'],
            'prepareby_code'  => $input['prepareBy_code'],
            'checkby_name'    => $input['checkBy_name'],
            'checkby_code'    => $input['checkBy_code'],
            'status_active'   => 'disable',
            'user_edit'       => $data['name'],
            'time_edit'       => date("Y-m-d H:i:s"),
          );
          $this->db->where('id', $input['id_bin']);
          $update_head = $this->db->update('calibration_head', $array_head);  
        }else{

          $array_head = array(
              'prepareby_name'  => $input['prepareBy_name'],
              'prepareby_code'  => $input['prepareBy_code'],
              'checkby_name'    => $input['checkBy_name'],
              'checkby_code'    => $input['checkBy_code'],
              'user_edit'       => $data['name'],
              'time_edit'       => date("Y-m-d H:i:s"),
            ); 
          // }     
          // print_r($array_head);
          $this->db->where('id', $input['id_bin']);
          $update_head = $this->db->update('calibration_head', $array_head);  
        }
        // print_r($input);
        // die();

        if ($update_head) {
          foreach ($input['pro_id_old'] as $k_old => $v_old) {
            $arr_detail_old = array(
                  'project_id'      => $input['pro_id_old'][$k_old],
                  'name'            => $input['name_old'][$k_old],
                  'asset_id'        => $input['num_id_pro_old'][$k_old],
                  'asset_name'      => $input['asset_pro_old'][$k_old],
                  'band_name'       => $input['band_pro_old'][$k_old],
                  'serail_number'   => $input['ser_no_pro_old'][$k_old],
                  'cali_period'     => $input['cali_period_old'][$k_old],
                  'cali_date'       => $input['cali_date_old'][$k_old],
                  'next_cali_date'  => $input['next_cali_date_old'][$k_old],
                  'cali_check'      => $input['cali_check_old'][$k_old],
                  'mana_asset'      => $input['mana_asset_old'][$k_old],
                  'user_check'      => $input['user_check_old'][$k_old],
                  'user_add'        => $data['name'],
                  'time_add'        => date("Y-m-d H:i:s"),
                  'type'            => $input['type_old'][$k_old],
            );

            $this->db->where('id', $input['asset_id'][$k_old]);
            $this->db->update('calibration_detail', $arr_detail_old);
          }

          // print_r($arr_detail_old);
          // die();
          if (isset($input['pro_id'])) {
            foreach ($input['pro_id'] as $k => $v) {
              $arr_detail = array(
                'project_id'      => $input['pro_id'][$k],
                'ref_cail'        => $input['id_bin'],
                'name'            => $input['pro_name'][$k],
                'asset_id'        => $input['num_id_pro'][$k],
                'asset_name'      => $input['asset_pro'][$k],
                'band_name'       => $input['band_pro'][$k],
                'serail_number'   => $input['ser_no_pro'][$k],
                'cali_period'     => $input['cali_period_pro'][$k],
                'cali_date'       => $input['cali_date_pro'][$k],
                'next_cali_date'  => $input['next_cali_date_pro'][$k],
                'cali_check'      => $input['cali_check_pro'][$k],
                'mana_asset'      => $input['mana_asset_pro'][$k],
                'user_check'      => $input['user_check_pro'][$k],
                'user_add'        => $data['name'],
                'time_add'        => date("Y-m-d H:i:s"),
                'type'            => $input['type'][$k],
                'status_active'   => 'active'
              );

            $this->db->insert('calibration_detail', $arr_detail);

            }
          }

          if (isset($input['status_save'])) {
            redirect('add_asset/list_save_cali');
          }

          redirect('add_asset/calibration_view');

      }
    }

    public function del_cali_item($cali_id)
    {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        if ($username=="") {
            redirect('/');
          }
        $data['mid'] = $session_data['m_id'];
        $data['name'] = $session_data['m_name'];
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['approve'] = $session_data['approve'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);

          $data = array(
            'user_del' => $data['name'],
            'time_del' => date("Y-m-d H:i:s"),
            'status_active' => 'disable',
          );


          $return = array();


          $this->db->where('id', $cali_id);
          $del_detail = $this->db->update('calibration_detail', $data);

          if ($del_detail) {
              $return['status'] = true;
              $return['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
          }else{
              $return['status'] = false;
              $return['message'] = "ไม่สามารถลบรายการได้";
          }


          echo json_encode($return);
    }
    public function summary_repairs(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->repair_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_fa_v');
          $this->load->view('office/inventory/report/summary_repairs_view',$ser);
          $this->load->view('base/footer_v');
        }
      public function summary_repairs_r(){
        $get1 = $this->input->get('project');
        $get2 = $this->input->get('department');
        $get3 = $this->input->get('year');
        $get4 = $this->input->get('month');
        $get5 = $this->input->get('status');
        $data = $this->session->userdata('sessed_in');
        $sess_name = $data['m_name']; 
        $get_session ="&get_session={$sess_name}";
        if($get5=="1"){$get5 = "approve";}
        if($get5=="2"){$get5 = "repair";}
        if($get5=="3"){$get5 = "writeoff";}
        if($get4=="1"){$get4="01"; $m="มกราคม";}
        if($get4=="2"){$get4="02"; $m="กุมภาพันธ์";;}
        if($get4=="3"){$get4="03"; $m="มีนาคม";;}
        if($get4=="4"){$get4="04"; $m="เมษายน";;}
        if($get4=="5"){$get4="05"; $m="พฤษภาคม";;}
        if($get4=="6"){$get4="06"; $m="มิถุนายน";;}
        if($get4=="7"){$get4="07"; $m="กรกฎาคม";;}
        if($get4=="8"){$get4="08"; $m="สิงหาคม";;}
        if($get4=="9"){$get4="09"; $m="กันยายน";;}
        if($get4=="10"){$m="ตุลาคม";;}
        if($get4=="11"){$m="พฤษจิกายน";;}
        if($get4=="12"){$m="ธันวาคม";;}
        $datewhere = "and repair.time_add BETWEEN '$get3-$get4-01' and '$get3-$get4-31'";
        $prowhere = "and project_name = '$get1'";
        $depwhere = "and department_name = '$get2'";
        if($get1==""){$prowhere="";}
        if($get2==""){$depwhere="";}
        $getdate="&getdate={$datewhere}";
        $getpro="&getpro={$prowhere}";
        $getdep="&getdep={$depwhere}";
        $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
        $file = "summary_repair.mrt";
        $send= "{$urls}{$file}{$getdate}{$getpro}{$dep}&where5={$get5}&getmonth={$m}&getyear={$get3}{$get_session}";
          $base_url = $this->config->item("url_report");
          redirect($base_url.$send); 
        }

        public function calibration_r($data){
          $get = "and calibration_head.id = '$data'";
          $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $file = "calibration_report.mrt";
          $send= "{$urls}{$file}&where={$get}";
            $base_url = $this->config->item("url_report");
            redirect($base_url.$send); 
        }

        public function list_save_cali()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $data['data'] = $this->datastore_m->calibration_approve();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_fa_v');
          $this->load->view('asset/calibration/list_save_cali');
          $this->load->view('base/footer_v'); 
        }

        public function form_save_cali($cali_id)
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);

          $data['data'] = $this->datastore_m->calibration_byid($cali_id);
          $data['id_bin'] = $cali_id;
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_fa_v');
          $this->load->view('asset/calibration/form_save_cali');
          $this->load->view('base/footer_v'); 
        }

        public function time_cali($date_one, $date_two)
        {
          $date1=date_create($date_one);
          $date2=date_create($date_two);
          $diff=date_diff($date1,$date2);
          
          echo json_encode($diff);
        }
}