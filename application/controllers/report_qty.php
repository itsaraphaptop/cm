<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report_qty extends CI_Controller {
      public function __construct() {
            parent::__construct();
           
            $this->load->Model('datastore_m');
            $this->load->Model('office_m');
            $this->load->Model('inventory_m');
        }
 public function report_matqty()

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
                    $this->load->view('office/inventory/po_receive/report/mat_qty_v');
                    $this->load->view('base/footer_v');

                }	

                public function open_qty()
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
            $this->load->view('office/inventory/po_receive/report/qty_pj_v',$res);
            // }
            $this->load->view('base/footer_v');
        }



        public function open_qtyamt()

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
            $this->load->view('office/inventory/po_receive/report/form_ic/openpj_qtyamount_v',$res);
            // }
            $this->load->view('base/footer_v');
                   

                }

                public function report_qtyamt()

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
                    $this->load->view('office/inventory/po_receive/report/qtyandamt_v');
                    $this->load->view('base/footer_v');

                }	
  public function report_warehouse()

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
                    $this->load->view('office/inventory/po_receive/report/form_ic/stokjobandwarehouse_v');
                    $this->load->view('base/footer_v');

                }	

public function open_warehouse()
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
            $this->load->view('office/inventory/po_receive/report/form_ic/open_pjwarehouse_v',$res);
            // }
            $this->load->view('base/footer_v');
        }

 public function open_ssbap()

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
                    $this->load->view('office/inventory/po_receive/report/form_ic/summary_stock_v');
                    $this->load->view('base/footer_v');

                }


public function open_pjwh()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/open_wh_v',$res);
            // }
            $this->load->view('base/footer_v');
                }


public function report_wh()

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
                    $data['getwh'] = $this->datastore_m->get_whdata($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/report/form_ic/report_wh_v');
                    $this->load->view('base/footer_v');

                }

                public function open_stock_issueDoc()

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
                    $this->load->view('office/inventory/po_receive/report/form_ic/stock_issue31_v');
                    $this->load->view('base/footer_v');

                }

                public function open_stock_issueDocAmount()

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
                    $this->load->view('office/inventory/po_receive/report/form_ic/stock_issueamount_v');
                    $this->load->view('base/footer_v');

                }

                public function open_isipj()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/open_isiproject_v',$res);
            // }
            $this->load->view('base/footer_v');
                }

                public function open_isipjamount()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/open_isiprojectamount_v',$res);
            // }
            $this->load->view('base/footer_v');
                }

public function areaqty()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/open_pjarea_v',$res);
            // }
            $this->load->view('base/footer_v');



}
public function Area_Qty()

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
                    $this->load->view('office/inventory/po_receive/report/form_ic/area_qty_v');
                    $this->load->view('base/footer_v');

                }
public function ref_qty()

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
                    $this->load->view('office/inventory/po_receive/report/form_ic/issue_ref_qty_v');
                    $this->load->view('base/footer_v');

                }

 public function ref_pj_opqty()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/pj_ref_qty_v',$res);
            // }
            $this->load->view('base/footer_v');
                }


                public function ref_pj_opamt()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/pj_refamt_op_v',$res);
            // }
            $this->load->view('base/footer_v');
                }

                public function ref_amt()

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
                    $data['getwh'] = $this->datastore_m->get_whdata($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/report/form_ic/ref_amt_v');
                    $this->load->view('base/footer_v');

                }

                public function whqty_pj_op()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/wh_qty_pj_v',$res);
            // }
            $this->load->view('base/footer_v');
                }

                public function wh_qty()

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
                    $data['getwh'] = $this->datastore_m->get_whdata($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/report/form_ic/wh_qty_v');
                    $this->load->view('base/footer_v');

                }

                 public function whqty_amt_pj_op()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/wh_pj_qty_amount_v',$res);
            // }
            $this->load->view('base/footer_v');

                }


 public function wh_qtyamt()

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
                    $data['getwh'] = $this->datastore_m->get_whdata($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/report/form_ic/wh_qtyamt_v');
                    $this->load->view('base/footer_v');

                }




			public function op_rcqty()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/wh_rc_qty_v',$res);
            // }
            $this->load->view('base/footer_v');

                }

                public function wh_rc_qty()

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
                    $data['getwh'] = $this->datastore_m->get_whdata($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/report/form_ic/wh_rc_qty_vform');
                    $this->load->view('base/footer_v');

                }

                public function op_tt()

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
            
            $this->load->view('office/inventory/po_receive/report/form_ic/op_pjtt_v',$res);
            // }
            $this->load->view('base/footer_v');

                }


 public function tt_to()

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
                    $data['getwh'] = $this->datastore_m->get_whdata($pjseg);
                    $this->load->view('navtail/base_master/header_v',$data);
                    // $this->load->view('navtail/base_angular/core_v.php',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('navtail/navtail_ic_menu_v');
                    $this->load->view('office/inventory/po_receive/report/form_ic/tt_v');
                    $this->load->view('base/footer_v');

                }

}