<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class purchase_report extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('auth_m');

      
        }

    public function index()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/report_all_v');
      $this->load->view('base/footer_v');
    }

    public function report_order(){

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['getproj'] = $this->datastore_m->getprojectpr();
          $data['member'] = $this->datastore_m->getmemberr();
          $data['vender'] = $this->datastore_m->getvender();
          $data['popo'] = $this->datastore_m->getpono();
          $data['sys'] = $this->datastore_m->getsystem();
          $data['de'] = $this->datastore_m->getdepartment();
          $data['cost'] = $this->datastore_m->getpo_costcode();
          $data['mat'] = $this->datastore_m->getpo_matcode();
          $data['compimg'] = $this->datastore_m->companyimg();
          $company = $this->datastore_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          // $this->load->view('navtail/navtail_po_v');
          $this->load->view('office/po/po_report_v',$data);
          $this->load->view('base/footer_v');
        }
        public function pop_report()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
           $compcode = $session_data['compcode'];
           if ($username=="") {
             redirect('/');
           }
           $this->load->view('navtail/base_master/header_v');
           $add = $this->input->post();
           for ($i=0; $i < count($add['a']) ; $i++) {

             $query = $this->db->query("select * from ".$add['aa'][$i]." where ".$add['a'][$i]."".$add['eqir'][$i]." '".$add['valname'][$i]."'")->result();

          if ($add['aa'][$i]=="project") {
            foreach ($query as $key => $value) {
              $q1 = $this->db->query("select * from project where project_code=".$value->project_code."")->result();
              foreach ($q1 as $key => $val1) {
                echo $val1->project_name;
                echo "ddd";
              }
            } 
            
          }else if($add['aa'][$i]=="vender"){
              foreach ($query as $key => $val) {
                $q1 = $this->db->query("select * from po where po_venderid=".$val->vender_id."")->result();
                foreach ($q1 as $key => $val1) {
                  echo $val1->po_pono;
                 echo "www";
                }
              }
            }
          }
        
      }
        public function po_report()
        {

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];


          if ($username=="") {
            redirect('/');
          }
           $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $this->load->view('navtail/base_master/header_v');
          $add = $this->input->post();
          for ($i=0; $i < count($add['aa']) ; $i++) {
            if ($add['aa'][$i]=="cost") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            $this->db->where('poi_costcode',$add['valname'][$i]);
            if ($add['type'][$i] != "") {
            $this->db->where('poi_costcode',$add['valname'][$i]);
            // $this->db->group_by('project_id');
            }
            $query = $this->db->get()->result();
            }
            else if ($add['aa'][$i]=="mat") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            $this->db->where('poi_costcode',$add['valname'][$i]);
            if ($add['type'][$i] != "") {
            $this->db->where('poi_costcode',$add['valname'][$i]);
            // $this->db->group_by('project_id');
            }
            $query = $this->db->get()->result();
            }
            else if ($add['aa'][$i]=="date") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->where('po_podate',$add['dat'][$i]);
            if ($add['type'][$i] != "") {
            $this->db->where('po_podate',$add['dat'][$i]);
            // $this->db->group_by('project_id');
            }
            $query = $this->db->get()->result();
            }
            else if ($add['aa'][$i]=="project_code") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            $this->db->where($add['aa'][$i],$add['valname'][$i]);
            // if ($add['type'][$i] != "") {
            //   $this->db->where($add['aa'][$i],$add['valname'][$i]);
            // }
            // $this->db->group_by('project_id');
            $query = $this->db->get()->result();
          }
            else if ($add['aa'][$i]=="po_memid") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            $this->db->where($add['aa'][$i],$add['valname'][$i]);
            if ($add['type'][$i] != "") {
              $this->db->where($add['aa'][$i],$add['valname'][$i]);
            }
            // $this->db->group_by('project_id');
            $query = $this->db->get()->result();
          }
            else if ($add['aa'][$i]=="po_department") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            $this->db->where($add['aa'][$i],$add['valname'][$i]);
            if ($add['type'][$i] != "") {
              $this->db->where($add['aa'][$i],$add['valname'][$i]);
            }
            // $this->db->group_by('project_id');
            $query = $this->db->get()->result();
          }
            else if ($add['aa'][$i]=="po_system") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            $this->db->where($add['aa'][$i],$add['valname'][$i]);
            // if ($add['type'][$i] != "") {
            //   $this->db->where($add['aa'][$i],$add['valname'][$i]);
            // }
            // $this->db->group_by('project_id');
            $query = $this->db->get()->result();
          }
            else if ($add['aa'][$i]=="po_venderid") {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            $this->db->where($add['aa'][$i],$add['valname'][$i]);
            if ($add['type'][$i] != "") {
              $this->db->where($add['aa'][$i],$add['valname'][$i]);
            }
            // $this->db->group_by('project_id');
            $query = $this->db->get()->result();
          }

          else {
            $this->db->select('*');
            $this->db->from('po');
            $this->db->join('project','project.project_id=po.po_project');
            $this->db->join('po_item','po_item.poi_ref=po.po_pono');
            // $this->db->where($add['aa'][$i],$add['valname'][$i]);
            // if ($add['type'][$i] != "") {
            //   $this->db->where($add['aa'][$i],$add['valname'][$i]);
            // }
            // $this->db->group_by('project_id');
            $query = $this->db->get()->result();
          }
          // if ($query) {
          //     foreach ($query as $key => $vall) {
          //     $query2 = $this->db->query("select * from project join po on po.po_project=project.project_id  where project_id='$vall->po_project' ");
          //      }
          //   }else{
          //     redirect('purchase_report/po_report2');
          //   }
          // $queryy = $query2->result();
          echo   '<style>        .navbar-default{background:#1a1e58; color:#fff;}
        body{background: #ddd;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
        }
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.6929in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 15px;
    line-height: 1.5384616;
    vertical-align: top;
    border-top: 0px solid
  }
    </style>'.
    '<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="report_order" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>'.
                        '<br><br>'.
                        // '<h5 style="text-align: center;">'.'บริษัท : </h5>'.
                        // '<h5 style="text-align: center;">'.'รายงานการสั่งซื้อ'.'</h5>'.
                        //
                        '<table class="table table-bordered table-xxs" style="font-size: 12px; text-align: center;">'.
                        '<h5 style="text-align: center;">'.'บริษัท : NinjaERP COMPANY LIMITED </h5>'.
                        '<h5 style="text-align: center;">'.'รายงานการสั่งซื้อ'.'</h5>'.
                          '<thead>'.
                            '<tr class="alpha-slate">'.
                              '<th style="width: 10%;">P/O No.</th>'.
                              '<th style="width: 10%;">P/O Date</th>'.
                              '<th style="width: 10%;">Term</th>'.
                              '<th style="width: 10%;">Dell Date</th>'.
                              '<th style="width: 30%;">Material</th>'.
                              '<th style="width: 10%;">price/Unit Unit</th>'.
                              '<th style="width: 10%;">QTY</th>'.
                              '<th style="width: 10%;">Amount</th>'.
                              '<th style="width: 10%;">QTY</th>'.
                              '<th style="width: 10%;">Amount</th>'.
                              '<th style="width: 10%;">QTY</th>'.
                              '<th style="width: 10%;">Amount</th>'.
                            '</tr>'.
                          '</thead>'.

                          '<tbody >';
            // $query2 = $vall->result();
           foreach ($query as $key => $value) {
              $tot=0;  $de = $this->db->query("select * from po_item where poi_ref='$value->po_pono'");
                $rd = $de->result();
                foreach ($rd as $v) {
             echo
                '<tr >'.
                '<td>'.$value->project_name.'</td>'.
                '<td>'.$v->poi_ref.'</td>'.
                '<td>'.$value->po_podate.'</td>'.
                '<td>'.$value->po_trem.'</td>'.
                '<td>'.$value->po_deliverydate.'</td>'.
                '<td>'.$v->poi_matname.'</td>'.
                '<td style="text-align: right;">'.$v->poi_unit.'</td>'.
                '<td style="text-align: right;">'.$v->poi_qty.'</td>'.
                '<td style="text-align: right;">'.$v->poi_amount.'</td>'.
                '<td style="text-align: right;">'.$v->poi_receive.'</td>'.
                '<td style="text-align: right;">'.$v->poi_receive.'</td>'.
                '<td style="text-align: right;">'.$v->poi_qty.'</td>'.
                '<td style="text-align: right;">'.$v->poi_amount.'</td>';
            echo  '</tr>';

            }$tot=$tot+$v->poi_amount; $dat=$value->po_podate;

             // '</table>';
                          // '<script>$("#dathone").html("<label>'.$dat.'</label>");</script>';


         }
         echo
                '<tr>'.
                '<td colspan="9" class="text-center">รวม</td>'.
                '<td>'.number_format($tot,2).'</td>'.
              '</tr>';
             '</tbody>';

            echo $add['aa'][$i]."-".$add['valname'][$i];
           }
          // }


        }
        public function po_report2()
        {
          $this->load->view('navtail/base_master/header_v');
          echo   '<style>        .navbar-default{background:#1a1e58; color:#fff;}
        body{background: #ddd;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;;
        }
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            background-color: #fff;
            color: #333;
            position: relative;
        }
        .pdf-header {
            position: absolute;
            top: .5in;
            height: .6in;
            left: .5in;
            right: .5in;

        }
        .invoice-number {
            padding-top: -3in;
            float: right;
           position:relative;
        }

        .size-a4 { width: 8.3in; height: 11.6929in; }
        .size-letter { width: 8.5in; height: 11in; }
        .size-executive { width: 7.25in; height: 10.5in; }

        .company-logo {
            font-size: 11px;
            font-weight: normal;
            color: #1a1e58;
            padding-top: 50px
        }


        #example{margin-top: 30px;}
        @media print {
.navbar{display: none;}

#example{margin-top:0px;}
}
.legend_custom {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 19.5px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 15px;
    line-height: 1.5384616;
    vertical-align: top;
    border-top: 0px solid
  }
    </style>'.
    '<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <img src="http://cloudmeka.com//comp/comp_2016-01-07_9779.png" class="img-responsive" style="height:40px;">
        </div>
         <div id="navbar" class="collapse navbar-collapse">
        <a href="report_order" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-arrow-left"></i> กลับหน้าหลัก</a>
         <button type="button" class="btn btn-primary navbar-btn" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์เอกสาร</button>

        </div><!--/.nav-collapse -->
      </div>
    </nav>';
        }

    public function report_ol()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }
      $this->load->model('datastore_m');
      $userid = $session_data['m_id'];
      $da['username'] = $session_data['username'];
      $da['name'] = $session_data['m_name'];
      $data['getproj'] = $this->datastore_m->getproject();
      $data['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep'];
      $data['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $da['imgu'] = $session_data['img'];
      // $res['getproj'] = $this->datastore_m->getproject_user($userid);
      $data['getproj'] = $this->datastore_m->getprojectpett();
      $data['member'] = $this->datastore_m->getvender();
      $data['depart'] = $this->datastore_m->getdepartment();
      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report/lo_selectreport_v',$data);
      $this->load->view('base/footer_v');
    }

      public function summary_purchase()
  {
    $base_url = $this->config->item("url_report");
    redirect("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=report_po.mrt");
  }

  public function po_delete_report_v()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_delete_report_v');
      $this->load->view('base/footer_v');
        }
  public function po_delete_report_wo_v()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_delete_report__wov');
      $this->load->view('base/footer_v');
        }
    public function po_list_product()
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
        $data['approve'] = $session_data['approve'];
        //$data['po_project_right'] = $session_data['po_project_right'];
        $this->load->model('datastore_m');
        $data['imgu'] = $this->datastore_m->changeprofile($username);
        // $data['compimg'] = $this->datastore_m->companyimg();
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        // $this->load->view('navtail/navtail_po_v');
        $this->load->view('office/purchase/main/report_summary/po_list_product_v');
        $this->load->view('base/footer_v');
    }
    public function po_list_product_data(){
      $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        //input
        $date_start =  $this->input->get('datestr');
        $date_stop =  $this->input->get('dateend');
        $project_id =  $this->input->get('po_projectid');
        $po_no =  $this->input->get('po_no');
        $Balance =  $this->input->get('Balance');

        //query
        $select = "SELECT po_project,po_pono,po_podate,vender_credit,po_deliverydate,poi_matname,poi_costcode,poi_priceunit,poi_amount,poi_qty,poi_qtyic,poi_qty-poi_qtyic as balanc  FROM vender LEFT JOIN po ON po.po_venderid = vender_id LEFT JOIN po_item ON po_item.poi_ref = po.po_pono WHERE ";
        $where_pro =" po_project = '{$project_id}'";
        $where_date ="and po_podate BETWEEN '{$date_start}' and '{$date_stop}'";
        $where_pono="and po.po_pono  = '{$po_no}'";
        $where_Balance="";

        //session name
        $data = $this->session->userdata('sessed_in');
        $sess_name = $data['m_name'];

        //if
        if($date_start == "")$where_date ="";
        if($project_id == "")$where_pro ="";
        if($po_no == "")$where_pono ="";
        if($Balance == "1")$where_Balance ='AND poi_qty-poi_qtyic >= "1"';
        if($Balance == "2")$where_Balance ='AND poi_qty-poi_qtyic < "1"';

        //url
        // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
         $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
        $report_file = "po_list_product.mrt";
        $get_select ="&select={$select}";
        $get_date ="&date={$where_date}";
        $get_project ="&project={$where_pro}";
        $get_pono ="&pono={$where_pono}";
        $get_balanc ="&balance={$where_Balance}";
        $get_session ="&session_neme={$sess_name}";

        //send data
        $send= "{$urls}{$report_file}&session={$sess_name}&date1={$date_start}&date2={$date_stop}&compcode={$compcode}&proid={$project_id}";
        $base_url = $this->config->item("url_report");
        redirect($send);
    }
    public function test(){
        echo '<pre>';
            echo print_r($this->input->get());
    }
         
       public function po_delete_r()
       {  
          $date = $this->session->userdata('sessed_in');
          $sess_name = $date['m_name'];
          $add = $this->input->get();
          $datestr = $this->input->get('datestr');
          $dateend = $this->input->get('dateend');
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];
          $compcode = $data['compcode'];
          if($add['doct']=="0"){
            $datepo ="and po_podate BETWEEN '$datestr' and '$dateend'";
            $datewo ="and lodate BETWEEN '$datestr' and '$dateend'";
            if ($datestr=="") {
              $datepo ="";
            }
            if ($datestr=="") {
              $datewo ="";
            }
            $base_url = $this->config->item("url_report");
            redirect("report/viewerloadpo?module=po&typ=report&reportname=po_delete_r3.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['po_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&wherepo=".$datepo."&wherewo=".$datewo."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
          }else if($add['doct']=="1" ){
            $base_url = $this->config->item("url_report");
            redirect("report/viewerloadpo?module=po&typ=report&reportname=po_delete_r6.mrt&proid=".$add['po_projectid']."&session=".$sess_name."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
          }else if($add['doct']=="2" ){
            $base_url = $this->config->item("url_report");
            // redirect("report/viewerloadpo?module=po&typ=report&reportname=po_delete_r7.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['po_projectid']."&buyn=".$add['buyname']."&type=".$add['doct'].$add['doct']."&session=".$sess_name."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
            redirect("report/viewerloadpo?module=po&typ=report&reportname=po_delete_r7.mrt&proid=".$add['po_projectid']."&session=".$sess_name."&date1=".$datestr."&date2=".$dateend."&compcode=".$compcode);
          }else{
            $base_url = $this->config->item("url_report");
            // redire$base_url.ct("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=po_delete_r6.mrt&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['po_projectid']."&buyn=".$add['buyname']."&type=".$add['doct']);
          }
        }

        public function po_puschase_requisition()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->po_search($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_requisition_v',$ser);
      $this->load->view('base/footer_v');
    }
        public function wo_puschase_requisition()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->po_search($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_requisition_wo_v',$ser);
      $this->load->view('base/footer_v');
    }
       public function po_request_r()
          {
          $date = $this->session->userdata('sessed_in');
          $compcode = $date['compcode'];
          $sess_name = $date['m_name'];
          $docstr = $this->input->get('docstr');
          $docend = $this->input->get('docend');
          $datestr = $this->input->get('datestr');
          $dateend = $this->input->get('dateend');
          $pr_projectid = $this->input->get('pr_projectid');
          $buyname = $this->input->get('buyname');
          $status = $this->input->get('status');
          $doct = $this->input->get('doct');
          $a = $add['docstr'];
          $b = $add['docend'];
          $chk_docstr = substr($add['docstr'], 0,2);
          $chk_docend = substr($add['docend'], 0,2);
          $add = $this->input->get();
          if($b==""){
            $b=$a;
          }
          if($docend==""){
            $docend = $docstr;
          }
          $where_doc = "and po.po_pono BETWEEN '$docstr' and '$docend'";
          $where_date = "and po.po_podate BETWEEN '$datestr' and '$dateend'";
          if($add['doct']=="1"){
          
          if ($docstr=="") {
            $where_doc = "";
          }
          if ($datestr=="") {
            $where_date = "";
          }
          $get_doc = "&get_doc={$where_doc}";
          $get_date = "&get_date={$where_date}";
          $flie = "po_request_r.mrt";

            if($status=="approve" || $status==""){
              $flie = "po_request_pr_form.mrt";
            }else{
              $flie = "po_request_r.mrt";
            }
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
           $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
          $send= "{$urls}{$flie}&proid={$pr_projectid}&buyn={$buyname}&st={$status}&type={$doct}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";

          $base_url = $this->config->item("url_report");
          redirect($send);
          
          }else if($add['doct']=="2"){
              $where_doc = "and lo.lo_lono BETWEEN '$docstr' and '$docend'";
              $where_date = "and lo.lodate BETWEEN '$datestr' and '$dateend'";
              if ($docstr=="") {
                $where_doc = "";
              }
              if ($datestr=="") {
                $where_date = "";
              }
              $get_doc = "&get_doc={$where_doc}";
              $get_date = "&get_date={$where_date}";

             
              // if($status=="approve" || $status==""){
              //   $flie = "po_request_r5.mrt";
              // }else{
                $flie = "po_request_r54.mrt";
              // }
              // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
               $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
              // $send = "{$urls}{$flie}&st={$status}{$get_doc}{$get_date}&proid={$pr_projectid}&buyn={$buyname}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";
              $send= "{$urls}{$flie}&proid={$pr_projectid}&buyn={$buyname}&st={$status}&type={$doct}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";
              $base_url = $this->config->item("url_report");
              redirect($send);
          }else if($add['doct']=="0"){
            $chk_docstr = substr($docstr, 0,2);
            $chk_docend = substr($docend, 0,2);
            $docpo = "and po.po_pono >= '$docstr'";
            $docwo = "and lo.lo_lono <= '$docend'";
            if($chk_docstr == "20" && $chk_docend == "20" || $chk_docstr == "LO" && $chk_docend == "LO" || $chk_docstr == "yu" && $chk_docend == "yu"){
              $docpo = "and po.po_pono BETWEEN '$docstr' and '$docend'";
              $docwo = "and lo.lo_lono BETWEEN '$docstr' and '$docend'";
            }else if($chk_docstr == "yu" && $chk_docend == "" || $chk_docstr == "LO" && $chk_docend == "" || $chk_docstr == "20" && $chk_docend == ""){
              $docpo = "and po.po_pono = '$docstr'";
              $docwo = "and lo.lo_lono = '$docstr'";
            }else if ($chk_docstr == "LO" && $chk_docend == "20" || $chk_docstr == "LO" && $chk_docend == "yu") {
              $docpo = "and po.po_pono >= '$docend'";
              $docwo = "and lo.lo_lono <= '$docstr'";
            }else{
              $docpo = "";
              $docwo = "";
            }

            $where_date = "and po.po_podate BETWEEN ".$datestr." and ".$dateend;
            $where_date2 = "and lo.lodate BETWEEN ".$datestr." and ".$dateend;
            if($datestr==""){
              $where_date = "";
              $where_date2 = "";
            }
            $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
            $file_report ="po_request_r12.mrt";
            if($status=="approve" || $status==""){
              $file_report ="po_request_pr2.mrt";
            }

            $send= "{$urls}{$file_report}&docs={$docpo}&doce={$docwo}&get_date={$where_date}&get_date2={$where_date2}&proid={$add['pr_projectid']}&buyn={$add['buyname']}&st={$add['status']}&type={$add['doct']}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";
            $base_url = $this->config->item("url_report");
            redirect($send);
          // echo $send;
            $base_url = $this->config->item("url_report");
            // redire$base_url.ct("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=po_request_r9.mrt&docs=".$docpo."&doce=".$docwo."&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&st=".$add['status']."&type=".$add['doct']."&session=".$sess_name);
          } else{
            $base_url = $this->config->item("url_report");
            // redire$base_url.ct("stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=po_request_r4.mrt&docs=".$add['docstr']."&doce=".$add['docend']."&start=".$add['datestr']."&end=".$add['dateend']."&proid=".$add['pr_projectid']."&buyn=".$add['buyname']."&st=".$add['status']."&type=".$add['doct']);
          }
          
        }
        public function po_puschase_check()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->po_search($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_puschase_check',$ser);
      $this->load->view('base/footer_v');
    }
        public function wo_puschase_check()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->po_search($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_puschase_check_wo_v',$ser);
      $this->load->view('base/footer_v');
    }
    public function po_check_r()
          {
            $docstr = $this->input->get('docstr');
            $docend = $this->input->get('docend');
            $datestr = $this->input->get('datestr');
            $dateend = $this->input->get('dateend');
            $buyname = $this->input->get('buyname');
            $pr_projectid = $this->input->get('pr_projectid');
            $doct = $this->input->get('doct');
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];
            $compcode = $date['compcode'];

            $chk_docstr = substr($docstr, 0,2);
            $chk_docend = substr($docend, 0,2);

            if($docend==""){$docend=$docstr;}
            
            if($doct=="0"){
            //   if ($chk_docstr == "LO" && $chk_docend == "20" || $chk_docstr == "LO" && $chk_docend == "yu") {
            //     $docpo = "and po.po_pono >= '$docend'";
            //     $docwo = "and lo.lo_lono <= '$docstr'";
            //   }else{
            //     $docpo = "and po.po_pono >= '$docstr' and po.po_pono <= '$docend'";
            //     $docwo = "and lo.lo_lono <= '$docstr' and lo.lo_lono <= '$docend'";
            //   }
            //   $where_date = "and po.po_podate BETWEEN '$datestr' and '$dateend'";
            //   if($docstr==""){$docpo="";}
            //   if($datestr==""){$where_date="";}            
            //   $get_doct ="&get_doct={$docpo}";
            //   $get_doce ="&get_doce={$docwo}";
            //   $get_date ="&get_date={$where_date}"; 
            //   $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx";
            //   $file_report ="po_check1.mrt"; 
            //   $send= "{$urls}&stimulsoft_report_key={$file_report}&name={$buyname}{$get_doct}{$get_doce}{$get_date}&session={$sess_name}";
            $base_url = $this->config->item("url_report");
            //    red$base_url_url().$send);
               
            }else if($doct=="1"){
              $where_doc = "and po.po_pono >= ".$docstr." and po.po_pono <= ".$docend;
              $where_date = "and po.po_podate BETWEEN ".$datestr." and ".$dateend;
              $where_project = "and po.po_project = ".$pr_projectid;
              if($pr_projectid==""){$where_project="";}
              if($docstr==""){$where_doc="";}
              if($datestr==""){$where_date="";}            
              $get_doc ="&get_doc={$where_doc}";
              $get_date ="&get_date={$where_date}"; 
              $project = "&project={$where_project}";
              $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
              $file_report ="po_check2.mrt"; 
              $send= "{$urls}{$file_report}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}&proid={$pr_projectid}";
               $base_url = $this->config->item("url_report");
               redirect($send);

            }
            
            else if($doct=="2"){
              $where_doc = "and lo.lo_lono BETWEEN ".$docstr." and ".$docend;
              $where_date = "and lo.lodate BETWEEN ".$datestr." and ".$dateend;
              if($docstr==""){$where_doc="";}
              if($datestr==""){$where_date="";}            
              $get_doc ="&get_doc={$where_doc}";
              $get_date ="&get_date={$where_date}"; 
              $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
              $file_report ="po_check3.mrt"; 
              // $send= "{$urls}{$file_report}&name={$buyname}{$get_doc}{$get_date}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}&projectid={$pr_projectid}";
              $send= "{$urls}{$file_report}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}&proid={$pr_projectid}";
               $base_url = $this->config->item("url_report");
               redirect($send);
            }
          }
    public function view_most_amount()
        {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->vender_name($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/view_most_amount',$ser);
      $this->load->view('base/footer_v');
    }
    public function view_most_amount_wo()
        {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->vender_name($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/view_most_amount_wo',$ser);
      $this->load->view('base/footer_v');
    }
    public function view_vender_re()
        {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->vender_name($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/view_vender_re',$ser);
      $this->load->view('base/footer_v');
    }
    public function view_vender_re_wo()
        {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $ser['search'] = $this->datastore_m->vender_name($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/view_vender_re_wo',$ser);
      $this->load->view('base/footer_v');
    }
    public function vender_report()
        {
          $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
            //input
            $vender =  $this->input->get('vender');
            //gen query
            $query = "select * from vender";
            $where = 'where vender_name = "'.$vender.'"';
            $vander = $vender;
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            if($vender==""){
              $where="";
              $file_report ="vender_report.mrt";
            }else{
              $file_report ="vender_report_like.mrt";
            }
            //gen url
            $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
           
 
            $send= "{$urls}{$file_report}&query={$query}&where={$where}&session={$sess_name}&compcode={$compcode}&buyn={$vander}";
               $base_url = $this->config->item("url_report");
               redirect($send);
        }
    public function subcon_report()
        {
          $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
            //input
            $vender =  $this->input->get('vender');
            //gen query
            $query = "select * from vender";
            $where = 'where vender_name = "'.$vender.'"';
            $vander = $vender;
            //session name
            $date = $this->session->userdata('sessed_in');
            $sess_name = $date['m_name'];

            if($vender==""){
              $where="";
              $file_report ="subcon_report.mrt";
            }else{
              $file_report ="subcon_report_like.mrt";
            }
            //gen url
            $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
           
 
            $send= "{$urls}{$file_report}&query={$query}&session={$sess_name}&compcode={$compcode}&buyn={$vander}";
               $base_url = $this->config->item("url_report");
               redirect($send);
        }
    public function po_matcom_r()
       {  
          $date = $this->session->userdata('sessed_in');
          $sess_name = $date['m_name'];
           $add = $this->input->get();
          if($add['typematcom']=="P"){
            $base_url = $this->config->item("url_report");
            redirect("report/viewerloadpo?module=po&typ=report&reportname=po_matcom_r.mrt&start=".$add['typematcom']."&session=".$sess_name);
          }else{
            
          }
        }

     public function po_material_pro_v()
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
      $data['approve'] = $session_data['approve'];
      //$data['po_project_right'] = $session_data['po_project_right'];
      $this->load->model('datastore_m');
      $data['select'] = $this->datastore_m->selectcommat();
      $ser['search'] = $this->datastore_m->po_search($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      // $data['compimg'] = $this->datastore_m->companyimg();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_material_pro_v');
      $this->load->view('base/footer_v');
    }
    public function po_matpro_r()
       {  
          $date = $this->session->userdata('sessed_in');
          $sess_name = $date['m_name'];
           $add = $this->input->get();
          if($add['typematcom']=="P"){
            $base_url = $this->config->item("url_report");
            redirect("report/viewerloadpo?module=po&typ=report&reportname=po_matpro_r.mrt&start=".$add['doct']."&session=".$sess_name);
          }else{
            
          }
        }
  public function po_by_project_v()
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
      $ser['search'] = $this->datastore_m->po_search($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_by_project_v',$ser);
      $this->load->view('base/footer_v');
    }
    public function po_by_project_r(){
      $session_data = $this->session->userdata('sessed_in');
      $compcode = $session_data['compcode'];
           //input
          $pr_projectid =  $this->input->get('pr_projectid');
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');
          $po =  $this->input->get('PO');
          $Materials =  $this->input->get('Materials');
        
          echo  print_r($this->input->get());
          //query
          $where_po = "and po_item.poi_matcode = '$po'";
          $where_mat= "and po_item.poi_matname = '$Materials'";
          $where_project="and project.project_id = '$pr_projectid'";
          $where_date = '';       
          // $where_date = 'and po.po_podate BETWEEN "'.$datestr.'" AND "'.$dateend.'"';       
          
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          //if
          if($pr_projectid == ""){$where_project ="";}
          if($po == ""){$where_po ="";}
          if($Materials == ""){$where_mat ="";}     
           if($datestr == "")$where_date ='';  
          //  if($datestr == "")$where_date ='and po.po_podate BETWEEN "" AND "'.$dateend.'"';  
          //url
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
           $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
          $stockcard_file= "po_orderby_project.mrt";          

          $get_datestr ="&get_datestr={$datestr}";
          $get_dateend ="&get_dateend={$dateend}"; 
          $get_po ="&get_po={$where_po}";
          $get_date = "&get_date={$where_date}";
          $get_mat ="&get_mat={$where_mat}";    
          $get_pro_id ="&get_pro_id={$where_project}";     
          $get_session ="&get_session={$sess_name}";
          //send data
          $send= "{$urls}{$stockcard_file}&session={$sess_name}&proid={$pr_projectid}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";        
          // echo $send; 
          $base_url = $this->config->item("url_report");
          redirect($send);                  
               
        }
   public function po_by_vender_v()
        {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
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
      $ser['search'] = $this->datastore_m->vender_name($data,$compcode);
      // $ser['search'] = $this->datastore_m->po_search($data);
      $data['imgu'] = $this->datastore_m->changeprofile($username);
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_po_v');
      $this->load->view('office/purchase/main/report_summary/po_by_vender_v',$ser);
      $this->load->view('base/footer_v');
    }
      public function po_by_vender_r(){
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
           //input
          $vender =  $this->input->get('vender');
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');
          $po =  $this->input->get('PO');
          $Materials =  $this->input->get('Materials');

          echo  print_r($this->input->get());
          //query
          $where_po = "and po_item.poi_matcode = '$po'";
          $where_mat= "and po_item.poi_matname = '$Materials'";
          $where_vender="and vender_name LIKE '%$vender%'";
          $where_date = "";       
          // $where_date = "and po.po_podate BETWEEN '$datestr' AND '$dateend'";       
          
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          //if
          if($vender == ""){$where_vendert ="";}
          if($po == ""){$where_po ="";}
          if($Materials == ""){$where_mat ="";}     
           if($datestr == "")$where_date ="";  
          //  if($datestr == "")$where_date ="and po.po_podate BETWEEN '' AND '$dateend'";  
          //url
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
           $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
          $stockcard_file= "po_orderby_vender.mrt";          

          $get_datestr ="&get_datestr={$datestr}";
          $get_dateend ="&get_dateend={$dateend}"; 
          $get_po ="&get_po={$where_po}";
          $get_date = "&get_date={$where_date}";
          $get_mat ="&get_mat={$where_mat}";    
          $get_vender ="&get_vender={$where_vender}";     
          $get_session ="&get_session={$sess_name}";
          //send data
          $send= "{$urls}{$stockcard_file}&session={$sess_name}&buyn={$vender}&date1={$datestr}&date2={$dateend}&compcode={$compcode}";        
          // echo $send; 
          $base_url = $this->config->item("url_report");
          redirect($send);                  
               
        }
         public function assessment_report_v()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $this->load->model('datastore_m');
          $userid = $session_data['m_id'];
          $da['username'] = $session_data['username'];
          $da['name'] = $session_data['m_name'];
          $data['getproj'] = $this->datastore_m->getproject();
          $data['depid'] = $session_data['m_depid'];
          $da['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $this->load->model('datastore_m');
          $ser['search'] = $this->datastore_m->vender_name_assesment($data);
          // $ser['search'] = $this->datastore_m->po_search($data);
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          // $this->load->view('navtail/navtail_po_v');
          $this->load->view('office/purchase/main/report_summary/assessment_report_v',$ser);
          $this->load->view('base/footer_v');
        }
         public function assessment_report_r(){
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
           //input
          $vender =  $this->input->get('vender');
          $datestr =  $this->input->get('datestr');
          $dateend =  $this->input->get('dateend');

          echo  print_r($this->input->get());
          //query
          $where_vender="and vender_name = '$vender'";
          $where_date = "and vender_rate.createdate BETWEEN '$datestr 00:00:00' AND '$dateend 23:59:59'";       
          
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          //if
          if($vender == ""){$where_vender ="";}
           if($datestr == "")$where_date ='and vender_rate.createdate BETWEEN "" AND "'.$dateend.'"';  
          //url
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
           $urls = "report/viewerloadpo?module=po&typ=report&reportname=";
          // $stockcard_file= "report_assessment.mrt";
          // if ($vender == "") {
                      $stockcard_file= "report_assessment_all.mrt";
                    // }          

          $get_datestr ="&date1={$datestr}";
          $get_dateend ="&date2={$dateend}"; 
          $get_date = "&get_date={$where_date}";   
          $get_vender ="&buyn={$vender}";     
          $get_session ="&session={$sess_name}";
          $get_comcpode ="&compcode={$compcode}";
          //send data
          $send= "{$urls}{$stockcard_file}{$get_vender}{$get_session}{$get_datestr}{$get_dateend}{$get_comcpode}";        
          // echo $send; 
          $base_url = $this->config->item("url_report");
          redirect($send);                  
               
        }
}
