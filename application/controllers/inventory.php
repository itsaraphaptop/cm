<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inventory extends CI_Controller {
      public function __construct() {
            parent::__construct();
            $this->load->Model('datastore_m');
            $this->load->Model('office_m');
            $this->load->Model('inventory_m');
           
        }

        public function main_index()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $userid = $session_data['m_id'];
            if ($username=="") {
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
            $data['menu'] = $this->inventory_m->dash_poreceive($compcode);
            $data['panel'] = $this->inventory_m->dash_panel_show($compcode);
            $this->load->view('navtail/base_master/header_v',$data);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('office/inventory/main_index');
            $this->load->view('base/footer_v');
        }
        public function setup_dash()
        {
            $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $minper = $this->input->post('minper');
            $q = $this->inventory_m->upd_setup_min_per($minper,$compcode);
            if ($q) {
               echo "success";
               return true;
            }else{
                echo "not update";
                return true;
            }

        }
        public function load_dash_low_material()
        {
            $session_data = $this->session->userdata('sessed_in');
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
            $compcode = $session_data['compcode'];
            $data['projectdata'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode);
            $data['material'] = $this->inventory_m->materialdashlow($compcode);
            $data['minper'] = $this->inventory_m->mat_min_per($compcode);
            $this->load->view('office/inventory/load_low_material_dash_v',$data);

        }
        public function load_dash_material()
        {
            $session_data = $this->session->userdata('sessed_in');
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
            $compcode = $session_data['compcode'];
            $data['projectdata'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode);
            $data['material'] = $this->inventory_m->materialdash($compcode);
            // $data['material'] = $this->inventory_m->materialdash($compcode);
            $this->load->view('office/inventory/load_all_material_dash_v',$data);

        }


        public function open()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
                        if ($username=="") {
                            redirect('/');
                        }

                        $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            // $this->load->view('office/inventory/main_v');
            // if ($projectid=="") {
            //     $res['getdep'] = $this->datastore_m->department();
            //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
            // }else{
                // $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
                // $this->load->view('office/inventory/po_receive/open_project_v',$res);
            // }
            $this->load->view('base/footer_v');
        }
        public function openreceive()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];

                        if ($username=="") {
                            redirect('/');
                        }
            $res['open'] = $this->uri->segment(3);
                        $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $pro = $session_data['projectid'];
            $res['compcode'] = $session_data['compcode'];
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            // if ($projectid=="") {
            //     $res['getdep'] = $this->datastore_m->department();
            //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
            // }else{
            $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode);
            $res['getdep'] = $this->datastore_m->getdepartment();
            $this->load->view('office/inventory/po_receive/open_project_v',$res);
            // }
            $this->load->view('base/footer_v');
        }

        public function open_stockcard()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
                        if ($username=="") {
                            redirect('/');
                        }

                        $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
            $this->load->view('office/inventory/po_receive/report/select_pj_v',$res);
            // }
            $this->load->view('base/footer_v');
        }

                function archive_po_receive()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $da['compimg'] = $this->datastore_m->companyimg();

                    $id = $this->uri->segment(3);
                    $data['res'] = $this->office_m->getpolist($id);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/archive_po_receive_v',$data);
                    $this->load->view('base/footer_v');
                }
                function archive_receive_po()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['name'] = $session_data['m_name'];
                    // $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    // $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    // $da['compimg'] = $this->datastore_m->companyimg();

                    $id = $this->uri->segment(3);
                    $projectsegment = $this->uri->segment(4);
                    $flag = $this->uri->segment(5);
                    if ($flag=="p") {
                       $red = $this->datastore_m->getproject_proj($projectsegment);
                        foreach ($red as $vg) {
                            $data['projectsegment'] = $vg->project_code;
                            $data['projname'] = $vg->project_name;
                        }
                    }else{
                        $red = $this->datastore_m->alldep_postatus1_where($projectsegment);
                        foreach ($red as $vg) {
                            $data['projectsegment'] = $vg->department_code;
                            $data['projname'] = $vg->department_title;
                        }
                    }
                    
                    $data['res'] = $this->inventory_m->retrive_by_po($id,$compcode);
                    // $data['resi'] = $this->inventory_m->po_receive_detail($id,$compcode);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/archive_po_receive_by_po_v',$data);
                    $this->load->view('base/footer_v');
                }
                function archive_po_receive_po()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['name'] = $session_data['m_name'];
                    // $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    // $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    // $da['compimg'] = $this->datastore_m->companyimg();

                    $id = $this->uri->segment(3);
                    $projectsegment = $this->uri->segment(4);
                    $red = $this->datastore_m->getproject_proj($projectsegment);
                    foreach ($red as $vg) {
                        $data['projectsegment'] = $vg->project_code;
                        $data['projname'] = $vg->project_name;
                    }
                    $data['res'] = $this->inventory_m->retrive_ic_retrive_by_po($id,$compcode);
                    // $data['resi'] = $this->inventory_m->po_receive_detail($id,$compcode);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/archive_po_receive_by_po_v',$data);
                    $this->load->view('base/footer_v');
                }
                function archive_po_receive_in_ic()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['name'] = $session_data['m_name'];
                    // $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    // $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    // $da['compimg'] = $this->datastore_m->companyimg();

                    $id = $this->uri->segment(3);
                    $projectsegment = $this->uri->segment(4);
                    $red = $this->datastore_m->getproject_proj($projectsegment);
                    foreach ($red as $vg) {
                        $data['projectsegment'] = $vg->project_code;
                        $data['projname'] = $vg->project_name;
                    }
                    
                    $data['res'] = $this->inventory_m->retrive_ic_retrive_by_project($projectsegment,$compcode);
                    // $data['res'] = $this->inventory_m->retrive_ic_retrive_by_po($id,$compcode);
                    // $data['resi'] = $this->inventory_m->po_receive_detail($id,$compcode);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/archive_po_receive_in_ic_v',$data);
                    $this->load->view('base/footer_v');
                }
                function archive_po_receive_project()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];

                    $project_code = $this->uri->segment(3);
                    $project_id = $this->uri->segment(4);
                    $red = $this->datastore_m->getproject_proj($project_id);
                    foreach ($red as $vg) {
                        $data['projectsegment'] = $vg->project_code;
                        $data['projname'] = $vg->project_name;
                    }
                    $data['res'] = $this->inventory_m->retrive_ic_retrive_by_project($project_id,$compcode);
                    // $data['resi'] = $this->inventory_m->po_receive_detail($id,$compcode);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/archive_po_receive_by_project_v',$data);
                    $this->load->view('base/footer_v');
                }
                function archive_po_project()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $data['compcode'] = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];

                    $project_code = $this->uri->segment(3);
                    $project_id = $this->uri->segment(4);
                    $red = $this->datastore_m->getproject_proj($project_id);
                    foreach ($red as $vg) {
                        $data['projectsegment'] = $vg->project_code;
                        $data['projname'] = $vg->project_name;
                    }
                    $data['res'] = $this->inventory_m->retrive_popo_retrive_by_project($project_id,$data['compcode']);
                    // $data['resi'] = $this->inventory_m->po_receive_detail($id,$compcode);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/archive_po_receive_po_by_project_v',$data);
                    $this->load->view('base/footer_v');
                }
        public function receive_po_list()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $data['depid'] = $session_data['m_depid'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];
             // $da['compimg'] = $this->datastore_m->companyimg();
             $chk = $this->uri->segment(5);
             $data['chk_type'] = $chk;
             // if ($chk == "p") {

                $pro = $this->uri->segment(4);
                $data['id'] = $this->uri->segment(3);
                $data['iid'] = $this->uri->segment(4);
                $data['res'] = $this->office_m->getpolist($data['id']);
                $projectname = $this->office_m->get_projectname($data['iid']);
                // $data['open'] = $this->inventory_m->getreceive_all($pro);
                $data['open'] = $this->inventory_m->getreceive_all($pro);
                foreach ($projectname as $key => $value) {
                $data['projectname'] = $value->project_name;
                }
                $this->load->view('navtail/base_master/header_v',$da);
                $this->load->view('navtail/base_master/tail_v');
                $this->load->view('navtail/navtail_ic_menu_v');
                $this->load->view('office/inventory/po_receive/receive_po_list_v',$data);
                $this->load->view('base/footer_v');
                 
             // }else{

             //    $dep_id = $this->uri->segment(4);
             //    $data['open'] = $this->inventory_m->getreceive_dep($dep_id);
             //    $this->load->view('navtail/base_master/header_v',$da);
             //    $this->load->view('navtail/base_master/tail_v');
             //    $this->load->view('navtail/navtail_ic_menu_v');
             //    $this->load->view('office/inventory/po_receive/receive_po_list_v',$data);
             //    $this->load->view('base/footer_v');

             // }
        }
        public function receive_po_list_all()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $data['depid'] = $session_data['m_depid'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];
             // $da['compimg'] = $this->datastore_m->companyimg();

             // $data['id'] = $this->uri->segment(3);
             // $data['iid'] = $this->uri->segment(4);
             $data['res'] = $this->office_m->getpolist_all();
             // $projectname = $this->office_m->get_projectname($data['iid']);
             // foreach ($projectname as $key => $value) {
             //    $data['projectname'] = $value->project_name;
             // }
             $this->load->view('navtail/base_master/header_v',$da);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/po_receive/receive_po_list_all_v',$data);
             $this->load->view('base/footer_v');
        }
        public function receive_ic_list()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $data['depid'] = $session_data['m_depid'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];
             // $da['compimg'] = $this->datastore_m->companyimg();

             $data['id'] = $this->uri->segment(3);
             $data['iid'] = $this->uri->segment(4);
             $data['res'] = $this->office_m->geticlist($data['id']);
             $this->load->view('navtail/base_master/header_v',$da);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/po_receive/receive_ic_list_v',$data);
             $this->load->view('base/footer_v');
        }
        public function receive_po_header()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];

             $id = $this->uri->segment(3);
             $data['id'] = $this->uri->segment(3);
             $pjid = $this->uri->segment(4);
             $data['pjid'] = $this->uri->segment(4);
             // $data['res'] = $this->office_m->getporece($id);
             $data['res'] = $this->office_m->geticlist($id);
             $data['resi'] = $this->office_m->retrive_poi_receive($id);
             $data['getwarehouse'] = $this->office_m->get_warehouse($pjid);
             $data['po_edit'] = $this->office_m->getpo_edit($id);
             $this->load->view('navtail/base_master/header_v',$da);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/po_receive/receive_po_header_v',$data);
             $this->load->view('base/footer_v');
        }
        public function receive_po_detail()
        {
             $session_data = $this->session->userdata('sessed_in');
             $data['compcode'] = $session_data['compcode'];
            $reccode = $this->uri->segment(3);
            $data['porijectid'] = $this->uri->segment(4);
            $data['getwarehouse'] = $this->office_m->get_warehouse($data['porijectid']);
            $data['resi'] = $this->inventory_m->receive_po_detail($reccode,$data['compcode']);
            $this->load->view('office/inventory/ic_receive/load_receivepo_detail_v',$data);
        }
        public function receive_header()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
             $data['compcode'] = $session_data['compcode'];
             $data['icamt'] = $session_data['ic_poamt'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];

             $chk = $this->uri->segment(5);

                $id = $this->uri->segment(3);
                $pjid = $this->uri->segment(4);
                $data['res'] = $this->office_m->getporece($id);
                $data['resi'] = $this->office_m->retrive_poi($id);
                $data['getwarehouse'] = $this->office_m->get_warehouse($pjid);
                $data['po_edit'] = $this->office_m->getpo_edit($id);
                $data['pj_name'] = $this->office_m->get_projectname($pjid);
                $data['system'] = $this->inventory_m->get_systemname($id);
                $this->load->view('navtail/base_master/header_v',$da);
                $this->load->view('navtail/base_master/tail_v');
                $this->load->view('navtail/navtail_ic_menu_v');
                $this->load->view('office/inventory/po_receive/receive_header_v',$data);
                $this->load->view('base/footer_v');
                 
            
        }
         public function edit_receive_po_header()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
             $data['compcode'] = $session_data['compcode'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $data['depid'] = $session_data['m_depid'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];
             $da['compimg'] = $this->datastore_m->companyimg();

             $id = $this->uri->segment(3);
             $pono = $this->uri->segment(4);
             $data['saveedit'] = $this->uri->segment(5);
             $data['res'] = $this->office_m->getporece($pono);
             $data['resi'] = $this->office_m->getpo_receiveitem_po($id);
             $data['po_rec'] = $this->office_m->getpo_receive_po($id);
             $this->load->view('navtail/base_master/header_v',$da);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/po_receive/edit_receive_v',$data);
             $this->load->view('base/footer_v');
        }
        public function receive_po_other()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];

             $data['id'] = $this->uri->segment(3);
             $projectname = $this->office_m->project($data['id']);
             foreach ($projectname as $key => $value) {
                $data['projectname'] = $value->project_name;
             }

             $data['projectcode'] = $this->uri->segment(4);
             $projectcode = $this->uri->segment(4);
             $data['item'] =  $this->db->query("select * from project_item where project_code='$projectcode'")->result();
             $data['getwarehouse'] = $this->office_m->get_warehouse($data['id']);
             $this->load->view('navtail/base_master/header_v',$da);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/po_receive/receive_po_other_v',$data);
             $this->load->view('base/footer_v');
        }
        public function edit_receive_po_other()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $data['depid'] = $session_data['m_depid'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];
             $da['compimg'] = $this->datastore_m->companyimg();

             $id = $this->uri->segment(3);
             $data['projectcode'] = $this->uri->segment(4);
             // $data['saveedit'] = $this->uri->segment(5);
             $data['resi'] = $this->office_m->getpo_receiveitem($id);
             $data['po_rec'] = $this->office_m->getpo_receive($id);
             $this->load->view('navtail/base_master/header_v',$da);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/po_receive/edit_receive_other_v',$data);
             $this->load->view('base/footer_v');
        }
        public function print_inventory()
        {
            $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $data['depid'] = $session_data['m_depid'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];
             $da['compimg'] = $this->datastore_m->companyimg();
           
            $id = $this->uri->segment(3);
             $pono = $this->uri->segment(4);
             $data['res'] = $this->office_m->getporece($pono);
             $data['resi'] = $this->office_m->getpo_receiveitem($id);
             $data['po_rec'] = $this->office_m->getpo_receive($id);

            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('navtail/navtail_print_v');
            $this->load->view('office/inventory/po_receive/print_inventory',$data);
        }
                ////////////// Document Issue /////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////
        public function main_issue_project(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            if ($username=="") {
                redirect('/');
            }
            $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compimg'] = $this->datastore_m->companyimg();
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            // if ($projectid=="") {
            //     $res['getdep'] = $this->datastore_m->department();
            //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
            // }else{
                    $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode);
                    $this->load->view('office/inventory/ic_issue/open_project_v',$res);
            // }
            $this->load->view('base/footer_v');
        }

        public function main_trading_project(){
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
                redirect('/');
            }
            $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compimg'] = $this->datastore_m->companyimg();
            $da['trading'] = "trading";
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            // if ($projectid=="") {
            //     $res['getdep'] = $this->datastore_m->department();
            //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
            // }else{
                    $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
                    $this->load->view('office/inventory/trading/open_project_v',$res);
            // }
            $this->load->view('base/footer_v');
        }
        public function new_doc_issue(){   ///// เปิดหน้า ใบเบิกวัสดุ
        
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
                redirect('/');
            }
            $da['username'] = $session_data['username'];
            $data['compcode'] = $session_data['compcode'];
            $da['name'] = $session_data['m_name'];

            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            // $data['projid'] = $session_data['projectid'];
            $data['projid'] = $this->uri->segment(3);
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compimg'] = $this->datastore_m->companyimg();
            $data['getunit'] = $this->datastore_m->getunit();
            $data['getarea'] = $this->inventory_m->getarea();
            $data['getwh'] = $this->inventory_m->getwh();
             $res = $this->datastore_m->getproject_proj($data['projid']);
             foreach ($res as $key => $value) {
                $data['projectnamea'] = $value->project_name;
                $data['projectida'] = $value->project_id;
                $data['project_co'] = $value->project_code;
                $data['item'] =  $this->db->query("select * from project_item where project_code='$value->project_code'")->result();
              }
             
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('office/inventory/ic_issue/doc_issue_v',$data);
            $this->load->view('base/footer_v');
        }

        public function edit_issue(){
             $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            if ($username=="") {
                redirect('/');
            }
            $data['username'] = $session_data['username'];
            $data['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $data['dep'] = $session_data['m_dep'];
            $projectid = $session_data['projectid'];
            $data['project'] = $session_data['m_project'];
            $data['imgu'] = $session_data['img'];

            $code  = $this->uri->segment(3);
            $this->db->select('*');
            $this->db->where('is_doccode',$code);
            $data['header'] = $this->db->get('ic_issue_h')->result_array();
            $data['item'] = $this->inventory_m->getarcissue($code,$compcode);
            $getproj = $this->datastore_m->getproject_proj($data['header'][0]['is_project']);
            foreach ($getproj as $key => $value) {
               $data['projectname'] = $value->project_name;
            }
            $data['detail'] = $this->inventory_m->issue_detail($data['header'][0]['is_project'],$data['header'][0]['is_system'],$code,$compcode);
            $this->load->view('navtail/base_master/header_v',$data);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('office/inventory/ic_issue/edit_doc_issue_v');
            $this->load->view('base/footer_v');
        }

        public function new_doc_trading(){   ///// เปิดหน้า ใบเบิกวัสดุ
        
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
                redirect('/');
            }
            $da['username'] = $session_data['username'];
            $da['name'] = $session_data['m_name'];

            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            // $data['projid'] = $session_data['projectid'];
            $data['projid'] = $this->uri->segment(3);
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compimg'] = $this->datastore_m->companyimg();
            $data['getunit'] = $this->datastore_m->getunit();
            $data['getarea'] = $this->inventory_m->getarea();
            $data['getwh'] = $this->inventory_m->getwh();
             $res = $this->datastore_m->getproject_proj($data['projid']);
             foreach ($res as $key => $value) {
                $data['projectnamea'] = $value->project_name;
                $data['projectida'] = $value->project_id;
                $data['project_co'] = $value->project_code;
                $data['item'] =  $this->db->query("select * from project_item where project_code='$value->project_code'")->result();
              }
             
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('office/inventory/trading/doc_trading_v',$data);
            $this->load->view('base/footer_v');
        }
                public function load_modal_mat_store()  ///// LOAD รายการใน store ใบเบิกวัสดุ
                {
                    $projectid = $this->uri->segment(3);
                    // $this->db->select('*');
            // $this->db->where('store_qty !=','0');
            // $query = $this->db->get('store');
            // $data['mat'] = $query->result();
                    $data['mat'] = $this->inventory_m->getstoreprojsum($projectid);

                    $this->load->view('office/inventory/ic_issue/load_mat_store_v',$data);
                }
                public function document_issue_archive()
                {   $type = $this->uri->segment(3);
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    $userid = $session_data['m_id'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['type'] = $type;
                    $data['getproj'] = $this->inventory_m->getproject_user($userid,$projectid,$compcode);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/ic_issue/doc_issue_project_v',$data);
                    $this->load->view('base/footer_v');

                }

                public function document_issue_list()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $this->uri->segment(3);
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['res'] = $this->inventory_m->getdocissue($projectid);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/ic_issue/doc_issue_list_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function main_store_list()
            {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $res['username'] = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $userid = $session_data['m_id'];
                    $da['name'] = $session_data['m_name'];

                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $da['compimg'] = $this->datastore_m->companyimg();
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    // if ($projectid=="") {
                    //     $res['getdep'] = $this->datastore_m->department();
                    //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
                    // }else{
                            $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
                            $this->load->view('office/inventory/main_store/open_project_v',$res);
                    // }
                    $this->load->view('base/footer_v');
            }
                public function store_list()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $project_code = $this->uri->segment(3);
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $compcode = $session_data['compcode'];
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['compcode'] = $session_data['compcode'];
                    $data['res'] = $this->inventory_m->getstoreprojsum($project_code);
                    $data['cbooking'] = $this->inventory_m->countbooking($project_code);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/store_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function store_list_update()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $project_code = $this->uri->segment(3);
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['res'] = $this->inventory_m->getstoreprojsum($project_code);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/store_edit_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function stock_card()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['res'] = $this->inventory_m->stockcard();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/stockcard/stockcard_v',$data);
                    $this->load->view('base/footer_v');

                }

                public function service_table_stockcard()
                {
                    $startdate = $this->uri->segment(3);
                    $enddate = $this->uri->segment(4);
                    $material = $this->uri->segment(5);
                    $data['res'] = $this->inventory_m->stockcardwhere($startdate,$enddate,$material);
                    $this->load->view('office/inventory/stockcard/load_table_stockcard_v',$data);
                }
                public function open_transfer()
                {
                        $session_data = $this->session->userdata('sessed_in');
                        $username = $session_data['username'];
                        $compcode = $session_data['compcode'];
                        $res['username'] = $session_data['username'];
                        if ($username=="") {
                            redirect('/');
                        }
                        $res['flag'] = $this->uri->segment(3);
                        $userid = $session_data['m_id'];
                        $da['name'] = $session_data['m_name'];

                        $data['depid'] = $session_data['m_depid'];
                        $da['dep'] = $session_data['m_dep'];
                        $data['projid'] = $session_data['projectid'];
                        $projectid = $session_data['projectid'];
                        $da['project'] = $session_data['m_project'];
                        $da['imgu'] = $session_data['img'];
                        $da['compimg'] = $this->datastore_m->companyimg();
                        $this->load->view('navtail/base_master/header_v',$da);
                        $this->load->view('navtail/base_master/tail_v');
                        $this->load->view('navtail/navtail_ic_menu_v');
                        // if ($projectid=="") {
                        //     $res['getdep'] = $this->datastore_m->department();
                        //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
                        // }else{
                                $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode);
                                $this->load->view('office/inventory/transfer/open_project_v',$res);
                        // }
                        $this->load->view('base/footer_v');
                }
                public function open_transfer_approve()
                {
                        $session_data = $this->session->userdata('sessed_in');
                        $username = $session_data['username'];
                        $compcode = $session_data['compcode'];
                        $res['username'] = $session_data['username'];
                        if ($username=="") {
                            redirect('/');
                        }
                        $res['flag'] = $this->uri->segment(3);
                        $userid = $session_data['m_id'];
                        $da['name'] = $session_data['m_name'];

                        $data['depid'] = $session_data['m_depid'];
                        $da['dep'] = $session_data['m_dep'];
                        $data['projid'] = $session_data['projectid'];
                        $projectid = $session_data['projectid'];
                        $da['project'] = $session_data['m_project'];
                        $da['imgu'] = $session_data['img'];
                        $da['compimg'] = $this->datastore_m->companyimg();
                        $this->load->view('navtail/base_master/header_v',$da);
                        $this->load->view('navtail/base_master/tail_v');
                        $this->load->view('navtail/navtail_ic_menu_v');
                        // if ($projectid=="") {
                        //     $res['getdep'] = $this->datastore_m->department();
                        //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
                        // }else{
                                $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode);
                                $this->load->view('office/inventory/transfer/open_project_approve_v',$res);
                        // }
                        $this->load->view('base/footer_v');
                }
                public function transfer_store()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $data['projsegment'] = $this->uri->segment(3);
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['getproj'] = $this->datastore_m->getproject_center($data['projsegment']);
                    $data['getprojall'] = $this->datastore_m->getproject_m();
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer_store_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function edit_transfer_store()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $data['compcode'] = $session_data['compcode'];
                    $transfercode =$this->uri->segment(3);
                    $data['transfercode'] = $transfercode;
                    if ($username=="") {
                        redirect('/');
                    }
                    $data['username'] = $session_data['username'];
                    $data['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $data['project'] = $session_data['m_project'];
                    $data['imgu'] = $session_data['img'];

                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    // $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $data['res'] = $this->inventory_m->gettransfer_code($transfercode,$data['compcode']);

                    // var_dump($data['res']);
                     foreach ($data['res'] as $key => $val) {
                        $from_project = $val->from_project;
                        $data['from_project'] = $val->from_project;
                        $to_project = $val->to_project;
                        $data['date'] = $val->date_transfer;
                        $data['name'] = $val->name_transfer;
                        $data['address'] = $val->address_transfer;
                        $data['remark'] = $val->remark;
                        $data['message'] = $val->message;
                    }
                        $data['resi'] = $this->inventory_m->gettransfer_item($transfercode,$data['compcode'],$to_project);

                    $data['getproj'] = $this->datastore_m->getproject_proj($from_project);
                    $data['getprojto'] = $this->datastore_m->getproject_proj($to_project);
                    $this->load->view('navtail/base_master/header_v',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/edit_transfer_store_v');
                    $this->load->view('base/footer_v');

                }
                public function archive_transfer_store()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    $userid = $session_data['m_id'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $data['username'] = $session_data['username'];
                    $data['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $data['project'] = $session_data['m_project'];
                    $data['imgu'] = $session_data['img'];
                    $data['getproj'] = $this->datastore_m->getproject();
                //   $data['getproj'] = $this->inventory_m->getproject_user($userid,$projectid);
                    $this->load->view('navtail/base_master/header_v',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer/archive_transfer_v');
                    $this->load->view('base/footer_v');

                }
                public function archive_edit_transfer_store()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    $userid = $session_data['m_id'];
                    $m_name = $session_data['m_name'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $compcode = $session_data['compcode'];
                    $data['username'] = $session_data['username'];
                    $data['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $data['project'] = $session_data['m_project'];
                    $data['imgu'] = $session_data['img'];
                    $data['userid'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    // $data['allcostcode'] = $this->datastore_m->allcostcode();
                    // $data['getproj'] = $this->inventory_m->getproject_user($userid,$projectid);
                    $data['codeic'] = $this->inventory_m->getic_tranfer_m($m_name,$compcode);
                    $this->load->view('navtail/base_master/header_v',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer/archive_edit_transfer_v');
                    $this->load->view('base/footer_v');

                }
                public function archive_receive_transfer_store()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    $userid = $session_data['m_id'];
                    $m_name = $session_data['m_name'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $compcode = $session_data['compcode'];
                    $data['username'] = $session_data['username'];
                    $data['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $data['project'] = $session_data['m_project'];
                    $data['imgu'] = $session_data['img'];
                    $data['userid'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    // $data['allcostcode'] = $this->datastore_m->allcostcode();
                    // $data['getproj'] = $this->inventory_m->getproject_user($userid,$projectid);
                    $data['codeic'] = $this->inventory_m->getic_tranfer_m($m_name,$compcode);
                    $this->load->view('navtail/base_master/header_v',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer/archive_receive_transfer_v');
                    $this->load->view('base/footer_v');

                }
                public function retrive_transfer_store()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $userid = $session_data['m_id'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    // $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    // $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    // $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $id = $this->uri->segment(3);

                    if ($id=="all") {
                        $data['res'] = $this->inventory_m->gettransfer_header_add($compcode);
                    }else{
                        $data['res'] = $this->inventory_m->gettransfer_header_by_projid($id,$compcode);
                        foreach ($data['res'] as $key => $value) {
                            $from_project = $value->from_project;
                            $to_project = $value->to_project;
                        }
                        $getprojfrom = $this->datastore_m->getproject_proj($from_project);
                        foreach ($getprojfrom as $k) {
                            $data['getproj'] = $k->project_name;
                        }
                        $to = $this->datastore_m->getproject_proj($to_project);
                        foreach ($to as $e) {
                            $data['getprojto'] = $e->project_name;
                        }
                    }
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer/retrive_transfer_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function receive_transfer_store()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $userid = $session_data['m_id'];
                    $compcode = $session_data['compcode'];
                    $data['compcode'] = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $id = $this->uri->segment(3);
                    $flags = $this->uri->segment(4);
                    if ($flags=="archive") {
                        $data['res'] = $this->inventory_m->gettransfer_header_by_projid($id,$compcode);
                    }else{
                        // $data['res'] = $this->inventory_m->gettransfer_header_by_projid($id,$compcode);
                        $data['res'] = $this->inventory_m->gettransfer_header_receive_by_projid($id,$compcode);
                    }
                    foreach ($data['res'] as $key => $value) {
                        $from_project = $value->from_project;
                        $to_project = $value->to_project;
                        $data['to_project'] = $value->to_project;
                    }
                    if ($data['res'] ==null) {
                        
                    }else{
                        $getprojfrom = $this->datastore_m->getproject_proj($from_project);
                        foreach ($getprojfrom as $k) {
                            $data['getproj'] = $k->project_name;
                        }
                        $to = $this->datastore_m->getproject_proj($to_project);
                        foreach ($to as $e) {
                            $data['getprojto'] = $e->project_name;
                        }
                    }
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer/receive_transfer_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function archive_receive_transfer_project()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $userid = $session_data['m_id'];
                    $compcode = $session_data['compcode'];
                    $data['compcode'] = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    // $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $id = $this->uri->segment(3);
                    $data['res'] = $this->inventory_m->gettransfer_header_receive_by_projid($id,$compcode);
                    foreach ($data['res'] as $key => $value) {
                        $from_project = $value->from_project;
                        $to_project = $value->to_project;
                        $data['to_project'] = $value->to_project;
                    }
                    if ($data['res'] ==null) {
                        
                    }else{
                        $getprojfrom = $this->datastore_m->getproject_proj($from_project);
                        foreach ($getprojfrom as $k) {
                            $data['getproj'] = $k->project_name;
                        }
                        $to = $this->datastore_m->getproject_proj($to_project);
                        foreach ($to as $e) {
                            $data['getprojto'] = $e->project_name;
                        }
                    }
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer/archive_receive_transfer_project_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function receive_transfer_approve()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $userid = $session_data['m_id'];
                    $compcode = $session_data['compcode'];
                    $data['compcode'] = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    // $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    $data['allcostcode'] = $this->datastore_m->allcostcode();
                    $id = $this->uri->segment(3);
                    $data['id'] = $this->uri->segment(3);
                    $data['res'] = $this->inventory_m->gettransfer_approve($id,$compcode);
                    foreach ($data['res'] as $key => $value) {
                        $from_project = $value->from_project;
                        $to_project = $value->to_project;
                        $data['to_project'] = $value->to_project;
                    }
                    if ($data['res'] ==null) {
                        
                    }else{
                        $getprojfrom = $this->datastore_m->getproject_proj($from_project);
                        foreach ($getprojfrom as $k) {
                            $data['getproj'] = $k->project_name;
                        }
                        $to = $this->datastore_m->getproject_proj($to_project);
                        foreach ($to as $e) {
                            $data['getprojto'] = $e->project_name;
                        }
                    }
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/transfer/receive_transfer_approve_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function load_transfer_detail()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $trnno = $this->uri->segment(3);
                    $data['proj'] = $this->uri->segment(4);
                    $data['approve'] = $this->uri->segment(5);
                    $data['compcode'] = $compcode;
                    $data['resi'] = $this->inventory_m->gettranfer_detail($trnno,$compcode);
                    
                    $this->load->view('office/inventory/transfer/load_transfer_detail_v',$data);
                }
                public function load_transfer_receive_detail()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $trnno = $this->uri->segment(3);
                    $data['proj'] = $this->uri->segment(4);
                    $data['approve'] = $this->uri->segment(5);
                    $data['compcode'] = $compcode;
                    $data['resi'] = $this->inventory_m->gettranfer_detail($trnno,$compcode);
                    
                    $this->load->view('office/inventory/transfer/load_transfer_receive_detail_v',$data);
                }
                public function load_modal_mat_store_by_project()  ///// LOAD รายการใน store ใบเบิกวัสดุ
                {
                    $projectid = $this->uri->segment(3);
                    // $this->db->select('*');
                    // $this->db->where('store_qty !=','0');
                    // $this->db->where('store_project',$projectid);
                    // $query = $this->db->get('store');
                    // $data['mat'] = $query->result();
                    $data['mat'] = $this->inventory_m->getstoreprojsum($projectid);
                    $this->load->view('office/inventory/store_matcode_by_project_v',$data);


                }
                public function load_modal_mat_store_by_projecttransfer()  
                {
                    $projectid = $this->uri->segment(3);
                    $whcode = $this->uri->segment(4);
                    // $this->db->select('*');
                    // $this->db->where('store_qty !=','0');
                    // $this->db->where('store_project',$projectid);
                    // $query = $this->db->get('store');
                    // $data['mat'] = $query->result();
                    $data['mat'] = $this->inventory_m->getstoreprojtranfer_wh($projectid,$whcode);
                    $this->load->view('office/inventory/store_matcode_by_project_v',$data);


                }
                // booking

                public function booking()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['mid'] = $session_data['m_id'];
                    $da['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $projid = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $id = $this->uri->segment(3);
                    $da['id'] = $this->uri->segment(3);
                    $data['getproj'] = $this->datastore_m->getproject_center($id);
                    $data['getprojall'] = $this->datastore_m->getproject();
                    $da['item'] = $this->datastore_m->getproject_system($id);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    // $this->load->view('base/kendo_css');
                    $this->load->view('office/inventory/booking/booking_store_v',$data);
                    // $this->load->view('base/kendo_js');
                    $this->load->view('base/footer_v');

                }
                public  function load_material_book()
                {
                    $project = $this->uri->segment(3);
                    $data['proj_id'] =$this->uri->segment(4);
                    $data['res'] = $this->inventory_m->store_center($project);
                    $this->load->view('office/inventory/booking/load_material_v',$data);
                }
                public function edibooking()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $booking_code = $this->uri->segment(3);
                    $data['res'] = $this->inventory_m->getbooking_code($booking_code,$compcode);
                    $res = $this->inventory_m->getbooking_code($booking_code,$compcode);
                    $data['resi'] = $this->inventory_m->getbooking_detaill($booking_code,$compcode);
                    foreach ($res as $key => $value) {
                        $project_id = $value->from_project;
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['getproj'] = $this->datastore_m->getproject_proj($project_id);
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    $data['allcostcode'] = $this->datastore_m->allcostcode();

                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/booking/edit_booking_store_v',$data);
                    $this->load->view('base/footer_v');

                }
                public function booking_approve() {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $data['username'] = $session_data['username'];
                    $data['compcode'] = $session_data['compcode'];
                    $data['position'] = $session_data['m_position'];
                    $data['m_id']= $session_data['m_id'];
                    if ($username == "") {
                        redirect('/');
                    }

                    $data['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $depid = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    // $projid = $session_data['projectid'];
                    $data['projid']= $this->uri->segment(3);
                    $data['projidc'] = $this->uri->segment(4);
                    $data['project'] = $session_data['m_project'];
                    $this->load->model('datastore_m');
                    $data['imgu'] = $session_data['img'];
                    $data['approve'] = $session_data['approve'];
                    $data['pr_project_right'] = $session_data['pr_project_right'];
                    $data['compimg'] = $this->datastore_m->companyimg();
                    $data['getpr'] = $this->inventory_m->getallprwaitproj($data['projid']);
                    $data['getappov'] = $this->inventory_m->getallpraprrove5($data['projidc']);
                    $data['getpmappov'] = $this->inventory_m->getallprpmaprrove5($data['projid']);
                    $data['getwait'] = $this->inventory_m->getallprwait5($data['projid']);
                    $data['getpmwait'] = $this->inventory_m->getallprdirectorwait5w($data['projid']);
                    $this->load->view('navtail/base_master/header_v',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/booking/approve_booking_seq_v');
                    // $this->load->view('office/pr/pr_approve_dep_v',$data);

                    $this->load->view('base/footer_v');
                }
                public function approve_pj_bk(){
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    $id = $this->uri->segment(3);
                    $pr = $this->uri->segment(4);
                    $pj = $this->uri->segment(5);
                    $sequence = $this->uri->segment(6);
                    $pjid = $this->uri->segment(7);
                  
                    // Get line id
                    // if ($sequence > 1) {
                    //   $pushID = $this->inventory_m->getbkseq($pr,$compcode,$sequence);
                    // }else{
                    //   $pushID = $this->inventory_m->getapproveid($id,$compcode);
                    // }
                    // Get line id
                    // var_dump($app_middid);
                    //   die();
                    $data = array(
                        'status' => "yes",
                        'app_date' =>date('Y-m-d'),
                        'app_time' => date('H:i:s'),
                      );
                    $this->db->where('app_id',$id);
                    $this->db->update('approve_bk',$data);

                    $this->db->select('*');
                    $this->db->from('approve_bk');
                    $this->db->where('app_project',$pj);
                    $this->db->where('app_pr',$pr);
                    $this->db->where('app_sequence',$sequence);
                    $numz=$this->db->get()->num_rows(); 
      
      
                    if($numz<"1"){
                      $dataz = array(
                        'status' => "yes",
                        'app_date' =>date('Y-m-d'),
                        'app_time' => date('H:i:s'),
                      );
                      $this->db->where('app_pr',$pr);
                      $this->db->where('app_sequence',$sequence);
                      $this->db->update('approve_bk',$dataz);
                      //  line alert
                        // $approvename = $this->datastore_m->getname($pushID,$compcode);
                        
                        // $message = "อนุมัติ ลำดับที่ {$sequence} \n";
                        // $message .= "Doc type : IC BOOKING\n";
                        // $message .= "Doc No : {$pr}\n";
                        // $message .= "status : Approve\n";
                        
                        // $message .= "-----------------------------------------\n";
                        // $n=1;
                        // $resd = $this->inventory_m->getbooking_item($pr,$compcode);
                        // foreach ($resd as $key => $value) {
                        //   $message .= $key+$n.". ".$value->mat_name." จำนวน ".$value->qty." ".$value->unit."\n";
                        //   $message .= "-----------------------------------------\n";
                        // }
                        // $message .= "Approve by : ". $username."\n";
                        // $message .= base_url('inventory/approve_pj_bk/'.($id+1).'/'.$pr.'/'.$pj.'/'.$sequence.'/'.$pjid);
                        // line_alert($pushID,$message);
                        // line alert
                      }
      
                      
                
      
                    $datap = array(
                        'status' => "approve",
                        'app_date' =>date('Y-m-d'),
                        'app_time' => date('H:i:s'),
                      );
                    $this->db->where('app_pr',$pr);
                    $this->db->where('app_sequence <',$sequence);
                    $this->db->update('approve_bk',$datap);
      
                 
                  
      
                    $this->db->select('*');
                    $this->db->from('approve_bk');
                    $this->db->where('app_project',$pj);
                    $this->db->where('app_pr',$pr);
                    $this->db->where('status =','no'); 
                    $numx=$this->db->get()->num_rows(); 
                      
                    $year = date('Y');
                    $mount = date('m');
                    $modal="pr";
      
                    if($numx=="0"){
                      $datax = array(
                        'approve' => "approve",
                      
                      );
                      $this->db->where('book_code',$pr);
                      $this->db->update('ic_booking',$datax);
                      // //  line alert
                    
                      // $messagef = "อนุมัติ ลำดับที่ k {$sequence} สุดท้าย \n";
                      // $messagef .= "Doc type : PR\n";
                      // $messagef .= "Doc No : {$pr}\n";
                      // $messagef .= "status : Approve\n";
                      // // $messagef .= "Number of items : ".count($add['qtyi'])."\n";
                      // $messagef .= "-----------------------------------------\n";
                      // $n=1;
                      // for ($i=0; $i < count($add['qtyi']); $i++) {
                      //   $messagef .= $i+$n.". ".$add['matnamei'][$i]." จำนวน ".parse_num($add['qtyi'][$i])." ". parse_num($add['uniti'][$i])."\n";
                      //   $messagef .= "-----------------------------------------\n";
                      // }
                      // $messagef .= "Approve by : ". $username."\n";
                      // // $messagef .= "Approve : ".$approvename;
                      // line_alert($pushID_t,$messagef);
                      // // line alert
      
      
      
                      $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$pjid);
                      foreach ($count as $key => $value) {
                        $bi_approve = $value->bi_approve;
                        $approve = $value->approve;
                        $bi_wait = $value->bi_wait;
                      }
                      // var_dump($count);
                      // die();
                      if ($approve == 0) {
                        $view = array(
                            'bi_modal'    => "pr",
                            'bi_year'     => $year,
                            'bi_month'    => $mount,
                            'bi_approve'     => 1,
                            'compcode'  => $compcode,
                            'bi_project'  => $pjid,
                          );
                        $this->db->insert('bi_views_project',$view);
                      }else{
                      $view = array(
                            'bi_wait'     => @$bi_wait-1,
                            'bi_approve'     => @$bi_approve+1,
                          );
                        $this->db->where('bi_project',$pjid);
                        $this->db->where('bi_modal',$modal);
                        $this->db->where('bi_month',$mount);
                        $this->db->where('bi_year',$year);
                        $this->db->update('bi_views_project',$view);
                    }
                  
                  }
                    redirect('inventory/booking_approve/'.$pj.'/'.$pjid);
                  
      
                }
                public function retrive_booking(){
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $proid = $this->uri->segment(3);
                    $data['projid'] = $this->uri->segment(3);
                    $data['booking'] = $this->inventory_m->getbooking_issue($compcode,$proid);
                    $this->load->view('office/inventory/ic_issue/retrive_booking_v',$data);

                }

                public function retrive_booking_trading(){
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $proid = $this->uri->segment(3);
                    $data['projid'] = $this->uri->segment(3);
                    $data['booking'] = $this->inventory_m->getbooking_trading($compcode,$proid);
                    $this->load->view('office/inventory/ic_issue/retrive_booking_v',$data);

                }
                public function archive_trading()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $da['username'] = $session_data['username'];
                    $da['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject();
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $this->uri->segment(3);
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $data['res'] = $this->inventory_m->getdoctrading($projectid);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/trading/doc_trading_list_v',$data);
                    $this->load->view('base/footer_v');
                }
                public function open_booking()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $userid = $session_data['m_id'];
                    $da['name'] = $session_data['m_name'];

                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $res['flag'] = $this->uri->segment(3);
                    $res['compcode'] = $compcode;
                    // if ($projectid=="") {
                    //     $res['getdep'] = $this->datastore_m->department();
                    //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
                    // }else{
                    $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid,$compcode);
                    $this->load->view('office/inventory/booking/open_project_v',$res);
                    // }
                    $this->load->view('base/footer_v');
                }
                public function archive_booking_list()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    $compcode = $session_data['compcode'];
                    $proj  = $this->uri->segment(3);
                    if ($username=="") {
                        redirect('/');
                    }
                    $userid = $session_data['m_id'];
                    $da['name'] = $session_data['m_name'];
                    $res['proj'] = $proj;
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $da['compimg'] = $this->datastore_m->companyimg();
                    $dproname = $this->datastore_m->getproject_proj($proj);
                    foreach ($dproname as $key => $value) {
                        $da['project_name'] = $value->project_name;
                        $da['project_code'] = $value->project_code;
                    }
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $res['getbooking'] = $this->inventory_m->getbooking_project($proj,$compcode);
                    $getbooking = $this->inventory_m->getbooking_project($proj,$compcode);
                    
                    if ($getbooking == null) {
                       echo "1";
                    }else{
                        foreach ($getbooking as $key => $vitem) {
                            $ref = $vitem->book_code;
                        }
                        $res['item'] = $this->inventory_m->getbooking_item($ref);
                    }
                        
                    
                    $this->load->view('office/inventory/booking/archive_booking_v',$res);
                    $this->load->view('base/footer_v');
                }
                public function load_bookdetail()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $bookno = $this->uri->segment(3);
                    $projid = $this->uri->segment(4);
                    $data['projid'] = $this->uri->segment(4);
                    $data['item'] = $this->inventory_m->getbooking_detail($bookno,$compcode,$projid);
                    $this->load->view('office/inventory/ic_issue/load_bookdetail_v',$data);
                }
                public function load_bookdetail2()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $bookno = $this->uri->segment(3);
                    $projid = $this->uri->segment(4);
                    $data['projid'] = $this->uri->segment(4);
                    $data['item2'] = $this->inventory_m->getbooking_detail2($bookno,$compcode,$projid);
                    $this->load->view('office/inventory/ic_issue/load_bookdetail_v2',$data);
                }
                public function report_receive()
                {
                    $pjseg = $this->uri->segment(3);
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $data['ic_type'] = $session_data['ic_type'];
                    $data['username'] = $session_data['username'];
                    $data['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject_proj($pjseg);
                    // $data['resmem'] = $this->datastore_m->getmember();
                    // $data['getunit'] = $this->datastore_m->getunit();
                    // $data['getdep'] = $this->datastore_m->department();
                    $data['depid'] = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $data['project'] = $session_data['m_project'];
                    $data['imgu'] = $session_data['img'];
                    // $data['res'] = $this->inventory_m->retrive_stockcard();
                    // $data['allmaterial'] = $this->datastore_m->allmaterial();
                    $data['allmaterial'] = $this->datastore_m->allmaterials($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/report/summary_report_v');
                    $this->load->view('base/footer_v');

                }
                public function report_stock_tran_move()
                {
                    $pjseg = $this->uri->segment(3);
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    } 
                    $data['ic_type'] = $session_data['ic_type'];
                    $data['username'] = $session_data['username'];
                    $data['name'] = $session_data['m_name'];
                    $data['getproj'] = $this->datastore_m->getproject_proj($pjseg);
                    $data['depid'] = $session_data['m_depid'];
                    $data['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $data['project'] = $session_data['m_project'];
                    $data['imgu'] = $session_data['img'];
                    $data['res'] = $this->inventory_m->retrive_stockcard();
                    $data['allmaterial'] = $this->datastore_m->allmaterials($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/stockcard/report_stocktm_v');
                    $this->load->view('base/footer_v');

                }
                public function receive_table_stockcard()
                {
                    $startdate = $this->uri->segment(3);
                    $enddate = $this->uri->segment(4);
                    $material = $this->uri->segment(5);
                    $materialend = $this->uri->segment(6);
                    $project = $this->uri->segment(7);
                    if ($material!="" && $materialend!="") {
                        $data['res'] = $this->inventory_m->retrive_po_recive($startdate,$enddate,$material,$materialend,$project);
                    }else{
                        $data['res'] = $this->inventory_m->retrive_po_recive_like($startdate,$enddate,$material,$materialend,$project);
                        echo "dd";
                    }
                    $this->load->view('office/inventory/stockcard/load_table_stockcard_v',$data);
                }
                public function receive_table_stockcard_use()
                {
                    function DateThai($strDate)
          {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
          }
          // $start = $this->uri->segment(3);
          // $end = $this->uri->segment(4);
          $matcode = $this->input->post('material');
          $matcodeend = $this->input->post('materialend');
          // $pproj = $this->uri->segment(5);
                    if ($matcodeend=="") {
                        $this->db->select('*');
              $this->db->order_by('stock_date','asc');
              $this->db->where('stock_matcode',$matcode);
              $this->db->group_by('stock_matcode');
              $query = $this->db->get('stockcard');
              $get_fifo = $query->result();
                    }else {
              $this->db->select('*');
              $this->db->order_by('stock_date','asc');
              $this->db->where('stock_matcode >=',$matcode);
              $this->db->where('stock_matcode <=',$matcodeend);
              $this->db->group_by('stock_matcode');
              $query = $this->db->get('stockcard');
              $get_fifo = $query->result();
                    }
                    $this->load->view('navtail/base_master/header_v');
          foreach ($get_fifo as $k=> $ke) {
            echo "<h2>".$ke->stock_matcode."-".$ke->stock_matname."</h2>";
            echo "<table class='table table-hover table-bordered table-xxs'>";
            echo "<thead><tr><td>Stock Type</td><td>Stock Name</td><td>stock Date</td><td>QTY</td><td>Unit Price</td><td>Price</td><td>Total Qty</td><td>Total Price</td></tr></thead>";
          $tot = 0;
          $qty = 0;




          $qq = $this->db->query("select * from stockcard where stock_matcode='$ke->stock_matcode'");
          $fifo = $qq->result();
          foreach ($fifo as $value) {

            if ($value->stock_type=="issue") {
              $qty = $qty-$value->stock_qty;
              $tot = $tot-$value->stock_netamt;
                echo "<tbody><tr><td><span class='label label-primary'>".$value->stock_type."</span></td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".DateThai($value->stock_date)."</td><td>-".$value->stock_qty."</td><td>".$value->stock_priceunit."</td><td>-".$value->stock_netamt."</td><td>".$qty."</td><td>".$tot."</td></tr></tbody>";

            }else{
            $qty = $qty+$value->stock_qty;
            $tot = $tot+$value->stock_netamt;
              echo "<tr><td><span class='label label-primary'>".$value->stock_type."</span></td><td>".$value->stock_matcode."--".$value->stock_matname."</td><td>".DateThai($value->stock_date)."</td><td>".$value->stock_qty."</td><td>".$value->stock_priceunit."</td><td>".$value->stock_netamt."</td><td>".$qty."</td><td>".$tot."</td></tr>";

            }

          }
          echo "</table>";

        }
                $this->load->view('base/footer_v');
                }
                function load_detail_po_receive()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $id = $this->uri->segment(3);
                    $data['resi'] = $this->inventory_m->po_receive_detail($id,$compcode);
                    $this->load->view('office/inventory/po_receive/receive_po_list_v',$data);
                }

                 public function stock_menu()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['resmem'] = $this->datastore_m->getmember();
          // $data['getunit'] = $this->datastore_m->getunit();
          // $data['getdep'] = $this->datastore_m->department();
          // $data['allmaterial'] = $this->datastore_m->allmaterial();
          // $data['allcostcode'] = $this->datastore_m->allcostcode();
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          // $data['compimg'] = $this->datastore_m->companyimg();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ic_menu_v');
          $this->load->view('office/inventory/po_receive/report/menu_stockcard_v');
          $this->load->view('base/footer_v');
        }

public function stock_tran()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
                        if ($username=="") {
                            redirect('/');
                        }

                        $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
            $this->load->view('office/inventory/stockcard/stock_tran_move_v',$res);
            // }
            $this->load->view('base/footer_v');
        }
        public function find_project()
        {
            $session_data = $this->session->userdata('sessed_in');
            $input = $this->uri->segment(3);
            $userid = $session_data['m_id'];
            $projectid = $session_data['projectid'];
            $res['getproj'] = $this->datastore_m->getproject_user_find($userid,$projectid,$input);
            $this->load->view('office/inventory/ic_issue/find_project_v',$res);
        } 
        public function load_receive_po()
        {
            $projid = $this->uri->segment(3);
            $data['res'] = $this->office_m->geticlist($projid);
            $this->load->view('office/inventory/ic_receive/load_receivepo_v',$data);
        }
        public function gettowh()
        {
            // $ffq = $this->db->query("select * from ic_proj_warehouse where project_id='$'")->result();
            $this->db->select('*');
            $this->db->where('project_id',$this->input->post('toproject'));
            $qq = $this->db->get('ic_proj_warehouse')->result();
            echo $qq;
            return true;
        }
        public function gl_bookdetail()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $compcode = $session_data['compcode'];
                    $bookno = $this->uri->segment(3);
                    $projid = $this->uri->segment(4);
                    $data['projid'] = $this->uri->segment(4);
                    $data['item'] = $this->inventory_m->getbooking_detail($bookno,$compcode,$projid);
                    $this->load->view('office/inventory/ic_issue/gl_bookdetail_v',$data);
                }

        public function receive_load()
            {
                $session_data = $this->session->userdata('sessed_in');
                $compcode = $session_data['compcode'];
                $pro = $this->uri->segment(3);
                $type = $this->uri->segment(4);
                $data['type'] = $type;
                $data['pro'] = $pro;
                if ($type == "all") {
                    $data['open'] = $this->inventory_m->getreceive_all($pro);
                }elseif ($type == "reall") {
                    $data['open'] = $this->inventory_m->getreceive_reall($pro);
                }elseif ($type == "some") {
                    $data['open'] = $this->inventory_m->getreceive_some($pro);
                }elseif ($type == "wait") {
                    $data['open'] = $this->inventory_m->getreceive_wait($pro);
                }
                $this->load->view('office/inventory/ic_issue/receive_load',$data);
            }

            public function pro_return_ic()
                {
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $userid = $session_data['m_id'];
                    $da['name'] = $session_data['m_name'];

                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $da['compimg'] = $this->datastore_m->companyimg();
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');

                    $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
                     $this->load->view('office/inventory/ic_receive/pro_return_ic',$res);

                    $this->load->view('base/footer_v');
                }

                public function return_ic_v()
                {   
                    $pro = $this->uri->segment(3);
                    $session_data = $this->session->userdata('sessed_in');
                    $username = $session_data['username'];
                    if ($username=="") {
                        redirect('/');
                    }
                    $userid = $session_data['m_id'];
                    $da['name'] = $session_data['m_name'];
                    $data['depid'] = $session_data['m_depid'];
                    $da['dep'] = $session_data['m_dep'];
                    $data['projid'] = $session_data['projectid'];
                    $projectid = $session_data['projectid'];
                    $da['project'] = $session_data['m_project'];
                    $da['imgu'] = $session_data['img'];
                    $da['pro'] = $pro;
                    $da['getproj'] = $this->datastore_m->getreturn_issue_h($pro);
                    $da['ss'] = $this->datastore_m->getreturn_issue($pro);
                    $this->load->view('navtail/base_master/header_v',$da);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                     $this->load->view('office/inventory/ic_receive/return_ic_v');
                    $this->load->view('base/footer_v');
                }

    public function open_adjust()
        {
            $pro = $this->uri->segment(3);
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
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);

              if($res['pr_project_right'] =='true'){
                    $res['getdep'] = $this->datastore_m->getdepartment();
              }else{
                    $res['getdep'] = $this->datastore_m->getdepart_user($userid,$res['depid']);
              }

            $this->load->view('navtail/navtail_ic_menu_v',$res);
            $this->load->view('office/inventory/adjust/adjust_pro_v');
            $this->load->view('base/footer_v');
        }
    public function ic_adjust_v()
        {
            $code = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            if ($username=="") {
                redirect('/');
            }
            $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['code'] = $code;
            // $da['po'] = $this->datastore_m->getpo_receive_m($code,$compcode);
            $da['res'] = $this->datastore_m->getreceive_m($code,$compcode);
            $da['store'] = $this->datastore_m->getreceive_store_m($code,$compcode);
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('office/inventory/adjust/ic_adjust_v');
            $this->load->view('base/footer_v');
        }
    public function view_receive_po()
        {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $pro;
            $da['view'] = $this->inventory_m->getview_po_m($pro,$compcode);
            $this->load->view('office/inventory/adjust/view_receive_po',$da);

    }
    public function view_receive_ic()
        {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $pro;
            $da['view'] = $this->inventory_m->getview_ic_m($pro,$compcode);
            $this->load->view('office/inventory/adjust/view_receive_ic',$da);

    }

    public function modal_archive_po()
        {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $pro;
            $da['view'] = $this->inventory_m->getarchive_po_m($pro,$compcode);
            $this->load->view('office/inventory/adjust/view_archive_po',$da);

    }
    public function modal_archive()
        {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $pro;
            $da['view'] = $this->inventory_m->getarchive_m($pro,$compcode);
            $this->load->view('office/inventory/adjust/view_modal_archive',$da);

    }

    public function openreceipt()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            if ($username=="") {
                redirect('/');
            }
            $res['open'] = $this->uri->segment(3);
            $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $pro = $session_data['projectid'];
            $res['compcode'] = $session_data['compcode'];
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $res['getproj'] = $this->inventory_m->getproject_user($userid,$projectid,$compcode);
            $this->load->view('office/inventory/receipt_other/open_project_v',$res);
            $this->load->view('base/footer_v');
        }

        public function archive_receive_ohter()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
                         if ($username=="") {
                             redirect('/');
                         }
             $da['name'] = $session_data['m_name'];
             $da['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $da['project'] = $session_data['m_project'];
             $da['imgu'] = $session_data['img'];

             $data['id'] = $this->uri->segment(3);
             $projectname = $this->office_m->project($data['id']);
             foreach ($projectname as $key => $value) {
                $data['projectname'] = $value->project_name;
             }
             $data['res'] = $this->datastore_m->getreceive_app($data['id']);
             $this->load->view('navtail/base_master/header_v',$da);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/receipt_other/archive_receive_ohter',$data);
             $this->load->view('base/footer_v');
        }
          
         public function view_receive()
        {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $pro;
            $da['view'] = $this->datastore_m->getreceive_app($pro);
            $this->load->view('office/inventory/receipt_other/view_receive',$da);

        }   
        public function archive_receive_ohter_all()
        {
             $session_data = $this->session->userdata('sessed_in');
             $username = $session_data['username'];
             $data['compcode'] = $session_data['compcode'];
                         if ($username=="") {
                             redirect('/');
                         }
             $data['name'] = $session_data['m_name'];
             $data['dep'] = $session_data['m_dep'];
             $data['projid'] = $session_data['projectid'];
             $projectid = $session_data['projectid'];
             $data['project'] = $session_data['m_project'];
             $data['imgu'] = $session_data['img'];

             $data['pro'] = $this->uri->segment(3);
             $projectname = $this->office_m->project($data['pro']);
             foreach ($projectname as $key => $value) {
                $data['projectname'] = $value->project_name;
             }
             $data['res'] = $this->datastore_m->getreceive_app_all($data['pro']);
             $this->load->view('navtail/base_master/header_v',$data);
             $this->load->view('navtail/base_master/tail_v');
             $this->load->view('navtail/navtail_ic_menu_v');
             $this->load->view('office/inventory/receipt_other/archiveall_receive_ohter');
             $this->load->view('base/footer_v');
        }

        public function edit_receive_ohter(){
            $othcode = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $username = $session_data['username'];
            if ($username=="") {
                redirect('/');
            }
            $data['name'] = $session_data['m_name'];
            $data['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $data['project'] = $session_data['m_project'];
            $data['imgu'] = $session_data['img'];
            $data['res'] = $this->datastore_m->getreceive_app_all($othcode);
            $this->load->view('navtail/base_master/header_v',$data);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('office/inventory/receipt_other/edit_receive_ohter_v');
            $this->load->view('base/footer_v');
        }

         public function view_receiveall()
        {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $pro;
            $da['view'] = $this->datastore_m->getreceive_app_all($pro);
            $this->load->view('office/inventory/receipt_other/view_receive_all',$da);
        }

        public function view_unbooking()
        {
            $projid = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $projid;
            $da['view'] = $this->datastore_m->load_store_mat2($projid,$compcode);
            $this->load->view('office/inventory/adjust/view_unbooking',$da);

    }
    public function view_booking()
        {
            $proid = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $proid;
            $da['view'] = $this->inventory_m->getbooking($compcode,$proid);
            $this->load->view('office/inventory/adjust/view_booking',$da);

    }
    public function view_unbooking_all()
        {
            $id = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $id;
            $da['view'] = $this->inventory_m->getbooking_project($id,$compcode);
            $this->load->view('office/inventory/adjust/view_unbooking_all',$da);

    }

    public function view_return_ic()
        {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $pro;
            $da['view'] = $this->datastore_m->getreturn_issue_h($pro,$compcode);
            $this->load->view('office/inventory/adjust/view_return_ic',$da);

    }
    public function view_transfer_store()
        {
            $projid = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['pro'] = $projid;
            $da['view'] = $this->inventory_m->gettransfer_header_by_projid($projid,$compcode);
            $this->load->view('office/inventory/adjust/view_transfer_store',$da);

    }

    public function document_bookinng_list()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            if ($username=="") {
                redirect('/');
            }
            $da['username'] = $session_data['username'];
            $da['name'] = $session_data['m_name'];
            $data['getproj'] = $this->datastore_m->getproject();
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $projectid = $this->uri->segment(3);
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $data['getbooking'] = $this->inventory_m->gettbooking_m($projectid,$compcode);
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_ic_menu_v');
            $this->load->view('office/inventory/booking/doc_bookinng_list_v',$data);
            $this->load->view('base/footer_v');

        }

    public function mat_booking()
    {
            $mat = $this->uri->segment(3);
            $wh = $this->uri->segment(4);
            $pro = $this->uri->segment(5);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $da['mat'] = $mat;
            $da['wh'] = $wh;
            $da['pro'] = $pro;
            $da['view'] = $this->inventory_m->mat_booking_m($mat,$wh,$compcode,$pro);
            $da['summary'] = $this->inventory_m->sumbooking_m($mat,$wh,$pro);
            $this->load->view('office/inventory/view_mat_booking',$da);
    }
    public function mat_qtyin()
    {
        $mat = $this->uri->segment(3);
        $wh = $this->uri->segment(4);
        $pro = $this->uri->segment(5);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $da['mat'] = $mat;
        $da['wh'] = $wh;
        $da['pro'] = $pro;
        $da['view'] = $this->inventory_m->mat_qtyin_m($mat,$wh,$pro);
        $da['summary'] = $this->inventory_m->summat_qtyin_m($mat,$wh,$pro);
        $this->load->view('office/inventory/view_mat_qtyin',$da);
    }

    public function mat_upbook()
    {
        $mat = $this->uri->segment(3);
        $wh = $this->uri->segment(4);
        $pro = $this->uri->segment(5);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $da['mat'] = $mat;
        $da['wh'] = $wh;
        $da['pro'] = $pro;
        $da['view'] = $this->inventory_m->mat_upbook_m($mat,$wh,$pro);
        $da['summary'] = $this->inventory_m->summat_upbook_m($mat,$wh,$pro);
        $this->load->view('office/inventory/view_mat_upbook',$da);
    }

    // public function receive_po_dep(){     
    //         $store_matcode = "PO05010A102001061";
    //         $Total = 120;
    //         $sum_qty = 0;
    //         $array_temp = array();
    //         $box = array();
    //         $array_total = array();
    //         $box_total = array();

    //         $this->db->select("store_id,store_qty,unitprice,unbooking");
    //         $this->db->where("store_matcode",$store_matcode);
    //         $this->db->where("store_project",84);
    //         $res_array = $this->db->get("store")->result_array();
            
    //         foreach ($res_array as $index => $row) {
    //             $sum_qty+=$row["store_qty"];
                
    //             if($sum_qty >= $Total){
                    
    //                 $array_total["index"] = $row["store_id"];                
    //                 $array_total["qty"] = ($sum_qty-$Total < 0) ? 0 : $sum_qty-$Total;
    //                 $array_total["unitprice"] = $row["unitprice"];
    //                 $box_total[] = $array_total;
    //                 break;
    //             }else{
                   

    //                 $array_total["index"] = $row["store_id"];                    
    //                 $array_total["qty"] = ($row["store_qty"]-$Total < 0) ? 0 : $row["store_qty"]-$Total;
    //                 $array_total["unitprice"] = $row["unitprice"];
    //                 $box_total[] = $array_total;
    //             }              
    //         }
    //         $this->db->trans_begin();
    //         $status = true;
    //         foreach ($box_total as $key => $value) {
    //              $data = array(
    //                 "store_qty" => $value["qty"],
    //                 "store_total" => $value["qty"],
    //                 "unbooking" => ($res_array[$key]["store_qty"] - $value["qty"])
    //              );
               
    //              $this->db->where("store_matcode",$store_matcode);
    //              $this->db->where("store_project",84);
    //              $this->db->where("store_id",$value["index"]);
    //              $res_query = $this->db->update("store",$data);

    //              if($res_query!=true){
    //                 $status = false;
    //                 break;
    //              }
    //         }


    //         if($status){
    //             $this->db->trans_commit();
    //         }else{
    //              $this->db->trans_rollback();
    //         }
    // }

    public function approve_booking_v()
    {
            $pro = $this->uri->segment(3);
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }
            $res['pro'] = $pro;
            $userid = $session_data['m_id'];
            $res['name'] = $session_data['m_name'];
            $res['depid'] = $session_data['m_depid'];
            $res['dep'] = $session_data['m_dep'];
            $res['projid'] = $session_data['projectid'];
            $projectid = $session_data['projectid'];
            $res['project'] = $session_data['m_project'];
            $res['imgu'] = $session_data['img'];
            $this->load->view('navtail/base_master/header_v',$res);
            $this->load->view('navtail/base_master/tail_v');
            $res['poapprove'] = $session_data['po_approve'];
            $res['pr_project_right'] = $session_data['pr_project_right'];
            $res['view'] = $this->inventory_m->approve_booking_m($pro);
            $this->load->view('navtail/navtail_ic_menu_v',$res);
            $this->load->view('office/inventory/booking/approve_booking_v',$res);
            $this->load->view('base/footer_v');
        }
    public function detail_booking()
    {
        $code = $this->uri->segment(3);
        $pro = $this->uri->segment(4);

        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $da['code'] = $code;
        $da['pro'] = $pro;
        $da['det'] = $this->inventory_m->detail_booking_m($code,$pro);
        $this->load->view('office/inventory/booking/detail_booking_v',$da);
    }
    public function cancel_booking()
    {
        $code = $this->uri->segment(3);
        $pro = $this->uri->segment(4);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $da['code'] = $code;
        $da['pro'] = $pro;
        $da['det'] = $this->inventory_m->detail_booking_m($code,$pro);
        $this->load->view('office/inventory/booking/cancel_booking_v',$da);
    }
    
    public function bookdetail()
    {
        $matcode = $this->uri->segment(3);
        $matid = $this->uri->segment(4);
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $da['matcode'] = $matcode;
        $da['matid'] = $matid;
        // $da['det'] = $this->inventory_m->detail_booking_m($code,$pro);
        $this->load->view('office/inventory/booking/book_detail_v',$da);
    }


    public function modal_transfer($project_id){
        
        $data['ic_booking'] = $this->inventory_m->list_booking_m($project_id);
        $this->load->view('office/inventory/booking/modal_transfer',$data);

    }

    public function transfer_add(){

        $booking_no = $this->input->post('code');
        $ic_booking = $this->inventory_m->list_booking_itme_m($booking_no);
        
        $return = array();
        foreach ($ic_booking as $key => $data) {

            // var_dump($data);
            $return[$key]['matcode']   = $data->mat_code;
            $return[$key]['matname']  = $data->mat_name;
            $return[$key]['costcode']  = $data->costcode;
            $return[$key]['costname']  = $data->costname;
            $return[$key]['qty']  = $data->qty;
            $return[$key]['wh']  = $data->wh;
            $return[$key]['price_unit']  = $data->priceunit;
            $return[$key]['unit']  = $data->unit;
            $return[$key]['store_id']  = $data->store_id;
            $return[$key]['tot']  = $data->qty * $data->priceunit;
            
            
        }

        echo json_encode($return);


    }
    public function reject_pj_bk(){
        $id = $this->uri->segment(3);
        $pr = $this->uri->segment(4);
        $pj = $this->uri->segment(5);
        $sequence = $this->uri->segment(6);
        $pjid = $this->uri->segment(7);

        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $add = $this->input->post();
        $data = array(
            'approve' => "reject",
            'reject_remark' => $add['rejectap_prove'],
            'reject_date' => date('Y-m-d'),
            'reject_user' => $username,
           
          );
        $this->db->where('book_code',$pr);
        $q = $this->db->update('ic_booking',$data);


         $data_reject = array(
            'status' => "reject",
            'reject_remark' => $add['rejectap_prove'],
            'reject_date' => date('Y-m-d'),
           
          );
        $this->db->where('app_pr',$pr);
        $this->db->update('approve_bk', $data_reject);

        redirect('inventory/booking_approve/'.$pj.'/'.$pjid);
      }


 }